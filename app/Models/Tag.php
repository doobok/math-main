<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Tag extends Model
{
    use HasFactory;
    use Translatable;

    protected $translatable = ['title', 'name'];

    public function subjects()
    {
        return $this->morphedByMany(Subject::class, 'tagable');
    }
}
