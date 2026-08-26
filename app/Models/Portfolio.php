<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['cat_id', 'name', 'description', 'image'];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'cat_id');
    }
}