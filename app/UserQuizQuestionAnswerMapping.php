<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuizQuestionAnswerMapping extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quiz_user_question_answers_mapping';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'quiz_id',
        'question_id',
        'answer_id',
        'is_active'
    ];
    
    /**
     * Get the user details
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * Get the quiz details
     */
    public function quiz()
    {
        return $this->belongsTo('App\Quiz');
    }
    
    /**
     * Get the quiz details
     */
    public function question()
    {
        return $this->belongsTo('App\QuizQuestion');
    }
   
}
