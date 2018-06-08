<?php
namespace App\Repository;

use App\UserRole;
use App\Repository\Interfaces\UserRoleInterface;

class UserRoleRepository implements UserRoleInterface
{

    /**
     * Find all user roles
     * 
     * @param array $columns
     * @return Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function findAll(array $columns = [])
    {
        return (! empty($columns)) ? UserRole::all($columns) : UserRole::all();
    }

    /**
     * Find user role by Id
     * 
     * @param int $id
     */
    public static function findById($id)
    {
        return UserRole::find($id);
    }

    /**
     * Create user role
     * 
     * @param array $data
     * @return \App\User|NULL
     */
    public static function create(array $data)
    {
        $user = new UserRole();
        
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
     * Update user role
     * 
     * @param array $data
     * @param int $id
     * @return unknown|NULL
     */
    public static function update(array $data, $id)
    {
        $userRole = UserRole::find($id);
        
        if (count($userRole) > 0) {
            $fillables = $userRole->getFillable();
            
            foreach ($data as $columnName => $columnValue) {
                if (in_array($columnName, $fillables)) {
                    $userRole->{$columnName} = $columnValue;
                }
            }
            
            if ($userRole->save()) {
                return $userRole;
            }
        }
        
        return null;
    }

    /**
     * Delete user role
     * 
     * @param int $id
     * @return boolean
     */
    public static function delete($id)
    {
        $userRole = UserRole::find($id);
        
        if (count($userRole) > 0) {
            return $userRole->delete();
        }
        
        return false;
    }

    /**
     * Get user roles
     * 
     * @param array $where
     * @param string $isPaginate
     * @param number $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function getUserRoles(array $where = [], $isPaginate = false, $page = 1)
    {
        $userRoles = UserRole::query();
        
        if (! empty($where)) {
            foreach ($where as $columnName => $columnValue) {
                $userRoles->where($columnName, $columnValue);
            }
        }
        
        if ($isPaginate) {
            return $userRoles->paginate(config('constants.global.RECORDS_PER_PAGE'));
        } else {
            return $userRoles->get();
        }
    }
}