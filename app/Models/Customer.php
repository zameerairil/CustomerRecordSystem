<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $table='customer';

    protected $fillable = [
        'name', 'contact','email','category','noplate','insutype','commrate','expiry'];
}
