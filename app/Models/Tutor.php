<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Tutor extends Model
{
    use HasFactory;
    use Translatable;

    protected $translatable = ['name', 'text'];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'tagable');
    }

}
