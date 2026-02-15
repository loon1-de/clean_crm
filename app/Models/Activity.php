<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'tenant_id',
        'deal_id',
        'type',
        'note',
    ];

    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }
}
