<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizQuestionOptions extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quiz_question_options';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id',
        'quiz_option_title',
        'is_correct_answer',
        'is_active'
    ];
    
    /**
     * Get the client details
     */
    public function question()
    {
        return $this->belongsTo('App\QuizQuestion');
    }
    
}
