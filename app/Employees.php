<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [

            'first_name',
            'last_name',
            'email',
            'phone_number',
            'company_id'
        ];
}
