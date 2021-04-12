<?php

namespace App\Models;
use App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_id',
        'street_address',
        'city',
        'country'   
    ];
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}