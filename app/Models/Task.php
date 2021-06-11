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
        'hour',
        'date_full'
    ];

    public function getDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
    }

    public function getHourAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['date'])->format('H:i');
    }

    public function getDateFullAttribute()
    {
        return $this->attributes['date'];
    }

    public function getDescriptionAbbr()
    {
        if(!empty($this->description) && strlen($this->description) > 150) {
            return substr($this->description, 0, 150).'...';
        }
        return $this->description;
    }

    public function getTitleAbbr()
    {
        if(!empty($this->title) && strlen($this->title) > 30) {
            return substr($this->title, 0, 30).'...';
        }
        return $this->title;
    }

    public function delayed()
    {
        if (Carbon::now()->format('Y-m-d H:i:s') > $this->date_full) {
            return true;
        }
        return false;
    }

}
