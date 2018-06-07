<?php
namespace Application\Repository;

use Application\Repository\Interfaces\UserQuizQuestionAnswerMappingInterface;
use App\UserQuizQuestionAnswerMapping;

class UserQuizQuestionAnswerMappingRepository implements UserQuizQuestionAnswerMappingInterface
{

    /**
     * Find all quiz questions
     * 
     * @param array $columns
     * @return Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function findAll(array $columns = [])
    {
        return (! empty($columns)) ? UserQuizQuestionAnswerMapping::all($columns) : UserQuizQuestionAnswerMapping::all();
    }

    /**
     * Find quiz by Id
     * 
     * @param int $id
     */
    public static function findById($id)
    {
        return UserQuizQuestionAnswerMapping::find($id);
    }

    /**
     * Create user
     * 
     * @param array $data
     * @return \App\User|NULL
     */
    public static function create(array $data)
    {
        $userQuestionAnswers = new UserQuizQuestionAnswerMapping();
        
        $fillables = $userQuestionAnswers->getFillable();
        
        foreach ($data as $columnName => $columnValue) {
            if (in_array($columnName, $fillables)) {
                $userQuestionAnswers->{$columnName} = $columnValue;
            }
        }
        
        if ($userQuestionAnswers->save()) {
            return $userQuestionAnswers;
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
        $userQuestionAnswers = UserQuizQuestionAnswerMapping::find($id);
        
        if (count($userQuestionAnswers) > 0) {
            $fillables = $userQuestionAnswers->getFillable();
            
            foreach ($data as $columnName => $columnValue) {
                if (in_array($columnName, $fillables)) {
                    $userQuestionAnswers->{$columnName} = $columnValue;
                }
            }
            
            if ($userQuestionAnswers->save()) {
                return $userQuestionAnswers;
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
        $userQuestionAnswers = UserQuizQuestionAnswerMapping::find($id);
        
        if (count($userQuestionAnswers) > 0) {
            return $userQuestionAnswers->delete();
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
        $userQuestionAnswers = UserQuizQuestionAnswerMapping::query();
        
        if (! empty($where)) {
            foreach ($where as $columnName => $columnValue) {
                $userQuestionAnswers->where($columnName, $columnValue);
            }
        }
        
        if ($isPaginate) {
            return $userQuestionAnswers->paginate(config('constants.global.RECORDS_PER_PAGE'));
        } else {
            return $userQuestionAnswers->get();
        }
    }
}