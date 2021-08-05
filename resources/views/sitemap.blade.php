<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">


<url>
  <loc>{{route('mainpage')}}</loc>
  <lastmod>{{ $mainpage_date->tz('GMT')->toAtomString() }}</lastmod>
  <priority>1.00</priority>
</url>
<url>
  <loc>{{route('page', 'contacts')}}</loc>
  <lastmod>{{ $contacts_date->tz('GMT')->toAtomString() }}</lastmod>
  <priority>0.90</priority>
</url>
{{-- <url>
  <loc>{{route('stmap')}}</loc>
  <lastmod>{{ $mainpage_date->tz('GMT')->toAtomString() }}</lastmod>
  <priority>1.00</priority>
</url> --}}
{{-- pages --}}
@foreach ($pages as $page)
    <url>
      <loc>{{route('page', $page->slug )}}</loc>
      <lastmod>{{ $page->updated_at->tz('GMT')->toAtomString() }}</lastmod>
      <priority>0.90</priority>
    </url>
@endforeach



</urlset>
