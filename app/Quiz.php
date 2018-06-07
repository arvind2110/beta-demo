<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quiz_master';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'quiz_title',
        'quiz_details',
        'quiz_date',
        'quiz_start_time',
        'quiz_duration',
        'quiz_question_count',
        'quiz_status',
        'is_active'
    ];
    
    /**
     * Get the client details
     */
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    
    /**
     * Get the questions for quiz.
     */
    public function quizQuestionMappings()
    {
        return $this->hasMany('App\QuizQuestion', 'quiz_id', 'id');
    }
    
}
