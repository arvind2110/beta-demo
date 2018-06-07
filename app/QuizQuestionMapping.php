<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizQuestionMapping extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quiz_questions_mapping';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quiz_id',
        'question_id',
        'is_active'
    ];
    
    /**
     * Get the quiz details
     */
    public function quiz()
    {
        return $this->belongsTo('App\Quiz');
    }
   
}
