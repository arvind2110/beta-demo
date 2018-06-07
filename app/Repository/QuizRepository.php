<?php
namespace Application\Repository;

use Application\Repository\Interfaces\QuizInterface;
use App\Quiz;

class QuizRepository implements QuizInterface
{

    /**
     * Find all quizes
     * 
     * @param array $columns
     * @return Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function findAll(array $columns = [])
    {
        return (! empty($columns)) ? Quiz::all($columns) : Quiz::all();
    }

    /**
     * Find quiz by Id
     * 
     * @param int $id
     */
    public static function findById($id)
    {
        return Quiz::find($id);
    }

    /**
     * Create user
     * 
     * @param array $data
     * @return \App\User|NULL
     */
    public static function create(array $data)
    {
        $quiz = new Quiz();
        
        $fillables = $quiz->getFillable();
        
        foreach ($data as $columnName => $columnValue) {
            if (in_array($columnName, $fillables)) {
                $quiz->{$columnName} = $columnValue;
            }
        }
        
        if ($quiz->save()) {
            return $quiz;
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
        $quiz = Quiz::find($id);
        
        if (count($quiz) > 0) {
            $fillables = $quiz->getFillable();
            
            foreach ($data as $columnName => $columnValue) {
                if (in_array($columnName, $fillables)) {
                    $quiz->{$columnName} = $columnValue;
                }
            }
            
            if ($quiz->save()) {
                return $quiz;
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
        $quiz = Quiz::find($id);
        
        if (count($quiz) > 0) {
            return $quiz->delete();
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
    public static function getUsers(array $where = [], $isPaginate = false, $page = 1)
    {
        $quizes = Quiz::query();
        
        if (! empty($where)) {
            foreach ($where as $columnName => $columnValue) {
                $quizes->where($columnName, $columnValue);
            }
        }
        
        if ($isPaginate) {
            return $quizes->paginate(config('constants.global.RECORDS_PER_PAGE'));
        } else {
            return $quizes->get();
        }
    }
}