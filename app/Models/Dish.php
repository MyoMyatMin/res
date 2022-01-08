<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
        $query
        ->where('name', 'like', '%'.$search.'%')
        );
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
