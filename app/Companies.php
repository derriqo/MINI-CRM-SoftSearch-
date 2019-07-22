<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    
    protected $fillable = [
        'company_name',
        'email',
        'logo',
        'website'
    ];
}
