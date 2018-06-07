<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clients';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_name',
        'client_description',
        'client_logo',
        'is_active'
    ];

}
