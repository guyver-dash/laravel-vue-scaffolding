<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'firstname', 'lastname', 'company_id', 'email', 'phone'
    ];

    public function company(){

        return $this->hasOne('App\Model\Company', 'id', 'company_id');
    }
}
