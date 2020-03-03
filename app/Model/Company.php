<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = 'companies';
    protected $fillable = [
        'name', 'address', 'website', 'user_id',
    ];

    protected $appends = ['value', 'text'];

    public function getValueAttribute()
    {
        return $this->id;
    }

    public function getTextAttribute()
    {
        return $this->name;
    }
}
