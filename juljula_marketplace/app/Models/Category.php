<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'image',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function ads()
    {
        return $this->hasMany(Advertisement::class);
    }

    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    //scope
    public function scopeCategoryMultimedia($query)
    {
        return $query->where('name', 'multimedia')->first();
    }
    public function scopeCategoryImmobilier($query)
    {
        return $query->where('name', 'immobilier')->first();
    }
}
