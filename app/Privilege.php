<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'privileges';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'privilege_name',
        'is_active'
    ];

}
