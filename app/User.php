<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function generateUserCode(Faker $faker){
        $regex = '[A-Za-z0-9]{10}';
        $code = $faker->regexify($regex);
        $relative_user = User::where('code', '=', $code)->first();

        while ($relative_user) {
            $code = $faker->regexify($regex);
            $relative_user = User::where('code', '=', $code)->first();
        }

        return $code;
    }

    public function watchedUsers(){
        return $this->hasMany('App\WatchedUser');
    }
}
