<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'name',
        'email',
        'phone',
    ];

    protected static function booted()
    {
        static::creating(function ($contact) {
            if (Auth::check()) {
                $contact->tenant_id = Auth::user()->tenant_id;
            }
        });
    }
}
