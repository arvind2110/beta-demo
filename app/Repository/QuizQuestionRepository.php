<?php
namespace Application\Repository;

use Application\Repository\Interfaces\QuizQuestionInterface;
use App\QuizQuestion;

class QuizQuestionRepository implements QuizQuestionInterface
{

    /**
     * Find all quiz questions
     * 
     * @param array $columns
     * @return Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function findAll(array $columns = [])
    {
        return (! empty($columns)) ? QuizQuestion::all($columns) : QuizQuestion::all();
    }

    /**
     * Find quiz by Id
     * 
     * @param int $id
     */
    public static function findById($id)
    {
        return QuizQuestion::find($id);
    }

    /**
     * Create user
     * 
     * @param array $data
     * @return \App\User|NULL
     */
    public static function create(array $data)
    {
        $question = new QuizQuestion();
        
        $fillables = $question->getFillable();
        
        foreach ($data as $columnName => $columnValue) {
            if (in_array($columnName, $fillables)) {
                $question->{$columnName} = $columnValue;
            }
        }
        
        if ($question->save()) {
            return $question;
        }
        
        return null;
    }

    /**
     * Update quiz
     * 
     * @param array $data
     * @param int $id
     * @return unknown|NULL
     */
    public static function update(array $data, $id)
    {
        $question = QuizQuestion::find($id);
        
        if (count($question) > 0) {
            $fillables = $question->getFillable();
            
            foreach ($data as $columnName => $columnValue) {
                if (in_array($columnName, $fillables)) {
                    $question->{$columnName} = $columnValue;
                }
            }
            
            if ($question->save()) {
                return $question;
            }
        }
        
        return null;
    }

    /**
     * Delete quiz
     * 
     * @param int $id
     * @return boolean
     */
    public static function delete($id)
    {
        $question = QuizQuestion::find($id);
        
        if (count($question) > 0) {
            return $question->delete();
        }
        
        return false;
    }

    /**
     * Get quizes
     * 
     * @param array $where
     * @param string $isPaginate
     * @param number $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function getQuizQuestions(array $where = [], $isPaginate = false, $page = 1)
    {
        $questions = QuizQuestion::query();
        
        if (! empty($where)) {
            foreach ($where as $columnName => $columnValue) {
                $questions->where($columnName, $columnValue);
            }
        }
        
        if ($isPaginate) {
            return $questions->paginate(config('constants.global.RECORDS_PER_PAGE'));
        } else {
            return $questions->get();
        }
    }
}