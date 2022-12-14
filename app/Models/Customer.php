<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query->where(fn($query) => $query->where('name', 'like', '%' . $search . '%')
        )
        );
    }

    public function shoppings()
    {
        return $this->hasMany(Shopping::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
