<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'date', 'status', 'overdue_completion'
    ];

    protected $appends = [
        'hour'
    ];

    public function getDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
    }

    public function getHourAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['date'])->format('H:i');
    }
}
