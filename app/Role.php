<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'label'];

    public function abilities()
    {
        return $this->belongsToMany(Ability::class)->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function allowTo($ability)
    {
        $this->abilities()->sync($ability, false);
    }
}
