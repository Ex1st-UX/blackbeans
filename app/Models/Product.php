<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category() {
        return $this->hasOne('App\Models\Category');
    }

    public function sku() {
        return $this->hasOne('App\Models\Sku');
    }
}
