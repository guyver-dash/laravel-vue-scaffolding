<?php

namespace App\Model;

use App\Scopes\Employees\CompanyScope;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'firstname', 'lastname', 'company_id', 'phone',
    ];
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new CompanyScope);
    }
    public function company()
    {
        return $this->hasOne('App\Model\Company', 'id', 'company_id');
    }

    public function user()
    {

        return $this->hasOne('App\Model\User', 'id', 'user_id');
    }

}
