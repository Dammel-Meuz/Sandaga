<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'categories_id',
        'name',
        'url_img',
        'description',
        'characteristic',
        'quantity',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
