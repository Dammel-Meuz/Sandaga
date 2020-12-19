<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'categories_id',
        'users_id',
        'name',
        'image',
        'description',
        'characteristic',
        'quantity',
        'prix',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
