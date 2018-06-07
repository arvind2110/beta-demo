<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'role_id',
        'email',
        'password',
        'first_name',
        'last_name',
        'middle_name',
        'gender',
        'dob',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];
    
    /**
     * Get the role that user has
     */
    public function role()
    {
        return $this->belongsTo('App\UserRole');
    }
    
    /**
     * Get the client that user has
     */
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
