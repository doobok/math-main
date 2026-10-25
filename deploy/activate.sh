#!/usr/bin/env bash
# Runs on the server inside a freshly uploaded release: links shared state, installs deps, migrates, switches `current`.
# Uploads (Voyager, blog images) live in /var/www/tm/public; storage/app/public and public/storage both point there.
# Rollback: ln -sfn /var/www/tm/releases/<previous> /var/www/tm/current && sudo systemctl reload php8.1-fpm
set -euo pipefail

REL=$1
SHA=${2:-unknown}
APP=/var/www/tm
SHARED=$APP/shared
UPLOADS=$APP/public
PHP=php8.1
KEEP=5

# First run: storage used to live inside each release; take it over from the one in service.
if [ ! -d "$SHARED/storage" ]; then
    mkdir -p "$SHARED"
    cp -a "$APP/current/storage" "$SHARED/storage"
fi

cd "$REL"
rm -rf storage
ln -sfn "$SHARED/storage" storage
ln -sfn "$APP/.env" .env
ln -sfn "$UPLOADS" public/storage

$PHP /usr/local/bin/composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-progress
$PHP artisan migrate --force
echo "$SHA" > REVISION

# mv -T over a temporary link makes the switch atomic: no request sees a half-switched `current`.
ln -sfn "$REL" "$APP/current.next"
mv -T "$APP/current.next" "$APP/current"

sudo -n /usr/bin/systemctl reload php8.1-fpm
$PHP artisan queue:restart

cd "$APP/releases"
ls -1 | sort | head -n -$KEEP | xargs -r rm -rf
echo "deployed $SHA -> $REL"
