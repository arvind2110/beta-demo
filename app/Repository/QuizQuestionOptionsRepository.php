<?php
namespace Application\Repository;

use App\QuizQuestionOptions;
use Application\Repository\Interfaces\QuizQuestionOptionsInterface;

class QuizQuestionOptionsRepository implements QuizQuestionOptionsInterface
{

    /**
     * Find all quiz questions
     * 
     * @param array $columns
     * @return Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function findAll(array $columns = [])
    {
        return (! empty($columns)) ? QuizQuestionOptions::all($columns) : QuizQuestionOptions::all();
    }

    /**
     * Find quiz by Id
     * 
     * @param int $id
     */
    public static function findById($id)
    {
        return QuizQuestionOptions::find($id);
    }

    /**
     * Create user
     * 
     * @param array $data
     * @return \App\User|NULL
     */
    public static function create(array $data)
    {
        $questionOption = new QuizQuestionOptions();
        
        $fillables = $questionOption->getFillable();
        
        foreach ($data as $columnName => $columnValue) {
            if (in_array($columnName, $fillables)) {
                $questionOption->{$columnName} = $columnValue;
            }
        }
        
        if ($questionOption->save()) {
            return $questionOption;
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
        $questionOption = QuizQuestionOptions::find($id);
        
        if (count($questionOption) > 0) {
            $fillables = $questionOption->getFillable();
            
            foreach ($data as $columnName => $columnValue) {
                if (in_array($columnName, $fillables)) {
                    $questionOption->{$columnName} = $columnValue;
                }
            }
            
            if ($questionOption->save()) {
                return $questionOption;
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
        $questionOption = QuizQuestionOptions::find($id);
        
        if (count($questionOption) > 0) {
            return $questionOption->delete();
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
        $questionOptions = QuizQuestionOptions::query();
        
        if (! empty($where)) {
            foreach ($where as $columnName => $columnValue) {
                $questionOptions->where($columnName, $columnValue);
            }
        }
        
        if ($isPaginate) {
            return $questionOptions->paginate(config('constants.global.RECORDS_PER_PAGE'));
        } else {
            return $questionOptions->get();
        }
    }
}