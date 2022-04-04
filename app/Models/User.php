<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    //Accessors
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getAddressAttribute($value)
    {
        return $value . ', India';
    }

    //Mutators
    public  function setNameAttribute($value)
    {
        if (substr($value, 0, 3) == 'Mr.') {
            $this->attributes['name'] = $value;
        } else {
            $this->attributes['name'] = "Mr. " . $value;
        }
    }
}