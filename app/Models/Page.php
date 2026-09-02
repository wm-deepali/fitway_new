<?php
// app/Models/Page.php

namespace App\Models;

use App\Traits\HasSeo;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasSeo;

    protected $fillable = ['name', 'slug'];
}