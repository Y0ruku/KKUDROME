<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Contract extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [ //ใช่กับหน้า accountuser
    'user_id',
    'room_id',
    'start_date',
    'end_date',
    'status'
];

     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
