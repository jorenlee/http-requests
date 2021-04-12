<?php

namespace App\Models;
use App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'city',
        'country',
        'job_title'       
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    
    public function set_addresses($address){
        $this->address_id = $address->id;
        return $this->save();
    }
}