<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PasswordReset extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = ['token'];

    public static function boot()
    {
        parent::boot();

        static::creating(function($record) {
            $record->created_at = Carbon::now();
        });
    }
}
