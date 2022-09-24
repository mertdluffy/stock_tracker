<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    use HasFactory;

    protected $fillable = ['name','amount','item_id','customer_id','cost'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
