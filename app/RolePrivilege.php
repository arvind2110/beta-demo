<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePrivilege extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role_privileges';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'privilege_id',
        'is_active'
    ];
    
    /**
     * Get the role that user has
     */
    public function role()
    {
        return $this->belongsTo('App\UserRole');
    }
    
    /**
     * Get the user details
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
