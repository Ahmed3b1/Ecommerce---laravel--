<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;


class User extends Authenticatable
{

    use CausesActivity;


    public function actions()
    {
        return $this->hasMany(Activity::class, 'causer_id')->where('causer_type', self::class);
    }


    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'country',
        'address',
        'phone',
        'imagepath',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function orders(){

        return $this->hasMany(Order::class) ;

    }

}
