<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\enums\UserStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use SebastianBergmann\CodeCoverage\Node\Builder;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    // protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'family',
        'email',
        'mobile',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getUserStatusAttribute()
    {
        switch ($this->status) {
            case UserStatus::Active->value:
                return 'فعال';
                break;
            case UserStatus::InActive->value:
                return 'غیرفعال';
                break;
            case UserStatus::Banned->value:
                return  'بن شده';
                break;
            default:
                'هیچکدام';
        }
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->family;
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    protected function scopeUserStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // protected static function boot()
    // {
    //     return parent::boot();
    //     static::addGlobalScope('status', function (Builder $builder) {
    //         $builder->where('status', UserStatus::Active->value)
    //             ->where('email_verified_at', '!=', null);
    //     });
    // }
}
