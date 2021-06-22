<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['store_id', 'sub_category_id', 'name', 'price','stock','description','photo'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
