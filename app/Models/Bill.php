<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bill extends Model
{
    use HasFactory;
    use SoftDeletes;
    

     public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
    protected $fillable = ['contract_id', 'amount', 'due_date', 'status'];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
       public function room()
    {
        return $this->belongsTo(Room::class);
    }

}
