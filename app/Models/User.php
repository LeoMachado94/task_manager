<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $roles = [
        1   => 'Colaborador',
        98   => 'Administrador',
        99  => 'Super Administrador'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'biography',
        'birthdate',
        'phone',
        'gender',
        'avatar',
        'level_access',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function address()
    {
        return $this->hasMany(UserAddress::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\HasMany|object|null
     */
    public function personalAddress()
    {
        return $this->address()->where('address_type', 1)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\HasMany|object|null
     */
    public function professionalAddress()
    {
        return $this->address()->where('address_type', 2)->first();
    }

    public function setBirthdateAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['birthdate'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        } else {
            $this->attributes['birthdate'] = null;
        }
    }

    public function getBirthdateAttribute($value)
    {
        if (!empty($value)) {
            return Carbon::create($value)->format('d/m/Y');
        }
        return null;
    }

    public function getAvatarAttribute($value)
    {
        if (empty($value)) {
            return 'assets/images/no-user-image.jpg';
        }
        return $value;
    }

    public function isAdmin()
    {
        if ($this->level_access === 98) {
            return true;
        }
        return false;
    }

    public function isSuperAdmin()
    {
        if ($this->level_access === 99) {
            return true;
        }
        return false;
    }

    public function getRole()
    {
        return $this->roles[$this->level_access];
    }
}
