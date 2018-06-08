<?php
namespace App\Repository;

use App\Repository\Interfaces\UserInterface;
use App\User;

class UserRepository implements UserInterface
{

    /**
     * Find all users
     * 
     * @param array $columns
     * @return Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function findAll(array $columns = [])
    {
        return (! empty($columns)) ? User::all($columns) : User::all();
    }

    /**
     * Find user by Id
     * 
     * @param int $id
     */
    public static function findById($id)
    {
        return User::find($id);
    }

    /**
     * Create user
     * 
     * @param array $data
     * @return \App\User|NULL
     */
    public static function create(array $data)
    {
        $user = new User();
        
        $fillables = $user->getFillable();
        
        foreach ($data as $columnName => $columnValue) {
            if (in_array($columnName, $fillables)) {
                $user->{$columnName} = $columnValue;
            }
        }
        
        if ($user->save()) {
            return $user;
        }
        
        return null;
    }

    /**
     * Update user
     * 
     * @param array $data
     * @param int $id
     * @return unknown|NULL
     */
    public static function update(array $data, $id)
    {
        $user = User::find($id);
        
        if (count($user) > 0) {
            $fillables = $user->getFillable();
            
            foreach ($data as $columnName => $columnValue) {
                if (in_array($columnName, $fillables)) {
                    $user->{$columnName} = $columnValue;
                }
            }
            
            if ($user->save()) {
                return $user;
            }
        }
        
        return null;
    }

    /**
     * Delete user
     * 
     * @param int $id
     * @return boolean
     */
    public static function delete($id)
    {
        $user = User::find($id);
        
        if (count($user) > 0) {
            return $user->delete();
        }
        
        return false;
    }

    /**
     * Get users
     * 
     * @param array $where
     * @param string $isPaginate
     * @param number $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function getUsers(array $where = [], $isPaginate = false, $page = 1)
    {
        $users = User::query();
        
        if (! empty($where)) {
            foreach ($where as $columnName => $columnValue) {
                $users->where($columnName, $columnValue);
            }
        }
        
        if ($isPaginate) {
            return $users->paginate(config('constants.global.RECORDS_PER_PAGE'));
        } else {
            return $users->get();
        }
    }
}