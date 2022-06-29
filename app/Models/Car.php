<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'brand', 'km', 'color', 'details', 'image'
    ];

}
