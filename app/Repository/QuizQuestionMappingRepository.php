<?php
namespace Application\Repository;

use Application\Repository\Interfaces\QuizQuestionMappingInterface;
use App\QuizQuestionMapping;

class QuizQuestionMappingRepository implements QuizQuestionMappingInterface
{

    /**
     * Find all quiz questions
     * 
     * @param array $columns
     * @return Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function findAll(array $columns = [])
    {
        return (! empty($columns)) ? QuizQuestionMapping::all($columns) : QuizQuestionMapping::all();
    }

    /**
     * Find quiz by Id
     * 
     * @param int $id
     */
    public static function findById($id)
    {
        return QuizQuestionMapping::find($id);
    }

    /**
     * Create user
     * 
     * @param array $data
     * @return \App\User|NULL
     */
    public static function create(array $data)
    {
        $quizQuestionMapping = new QuizQuestionMapping();
        
        $fillables = $quizQuestionMapping->getFillable();
        
        foreach ($data as $columnName => $columnValue) {
            if (in_array($columnName, $fillables)) {
                $quizQuestionMapping->{$columnName} = $columnValue;
            }
        }
        
        if ($quizQuestionMapping->save()) {
            return $quizQuestionMapping;
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
        $quizQuestionMapping = QuizQuestionMapping::find($id);
        
        if (count($quizQuestionMapping) > 0) {
            $fillables = $quizQuestionMapping->getFillable();
            
            foreach ($data as $columnName => $columnValue) {
                if (in_array($columnName, $fillables)) {
                    $quizQuestionMapping->{$columnName} = $columnValue;
                }
            }
            
            if ($quizQuestionMapping->save()) {
                return $quizQuestionMapping;
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
        $quizQuestionMapping = QuizQuestionMapping::find($id);
        
        if (count($quizQuestionMapping) > 0) {
            return $quizQuestionMapping->delete();
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
    public static function getQuizQuestionMappings(array $where = [], $isPaginate = false, $page = 1)
    {
        $quizQuestionMappings = QuizQuestionMapping::query();
        
        if (! empty($where)) {
            foreach ($where as $columnName => $columnValue) {
                $quizQuestionMappings->where($columnName, $columnValue);
            }
        }
        
        if ($isPaginate) {
            return $quizQuestionMappings->paginate(config('constants.global.RECORDS_PER_PAGE'));
        } else {
            return $quizQuestionMappings->get();
        }
    }
}