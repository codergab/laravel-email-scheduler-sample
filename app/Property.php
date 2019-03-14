<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function allProps()
    {
        return $this->all();
    }
}
