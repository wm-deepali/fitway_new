<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhoWeAre extends Model
{
    protected $table = 'who_we_are';

    protected $fillable = ['description', 'url'];
}