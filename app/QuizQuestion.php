<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quiz_questions';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question',
        'complexity',
        'tags',
        'is_multiple_choice',
        'is_public',
        'is_active'
    ];   

}
