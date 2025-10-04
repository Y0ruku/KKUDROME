<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function bills()
{
    return $this->hasMany(Bill::class);
}

    public function repairs()
    {
        return $this->hasMany(Repair::class);
    }
   
}
