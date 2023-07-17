<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absence extends Model
{
    use HasFactory;

    protected $fillable=[
        'status',
        'date',
        // 'updated_at'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
