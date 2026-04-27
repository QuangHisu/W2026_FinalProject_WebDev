<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = ['name','address','city','postal_code','phone','email'];

    public function fullAddress(): string
    {
        return trim("{$this->address}, {$this->city}, {$this->postal_code}");
    }

    public function orders(){
        return $this->hasMany('App\Models\Order');
    }
}
