<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function windNotes()
    {
        return $this->hasMany(WindNote::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function calendarEvents()
    {
        return $this->hasMany(CalendarEvent::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function notefavorites()
    {
        return $this->hasMany(NoteFavorite::class);
    }

    public function departures()
    {
        return $this->hasMany(Departure::class, 'user_id');
    }

    public function intraDepartures()
    {
        return $this->hasMany(Departure::class, 'intra_user_id');
    }

    public function claims()
    {
        return $this->hasMany(IntraClaim::class, 'user_id');
    }

    public function intraClaims()
    {
        return $this->hasMany(IntraClaim::class, 'intra_user_id');
    }
}
