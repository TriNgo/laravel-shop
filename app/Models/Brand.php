<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'short_description', 'image', 'status'
    ];
}
