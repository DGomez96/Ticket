<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    //Fillables
    protected $fillable = [
        'description',
        'user_id ',
        'status',
        'res_id',
        'created_at',
        'updated_at'
    ];

    //funciones

    public function getUser(){
        return $this->hasOne('App\Models\User','id');
    }


}
