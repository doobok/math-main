<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Subject extends Model
{
    use HasFactory;
    use Translatable;

    protected $translatable = ['title', 'description', 'h1', 'name', 'promodesc', 'text'];
}
