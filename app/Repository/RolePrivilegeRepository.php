<?php
namespace Application\Repository;

use App\RolePrivilege;
use Application\Repository\Interfaces\RolePrivilegeInterface;

class RolePrivilegeRepository implements RolePrivilegeInterface
{

    /**
     * Find all role privileges
     * 
     * @param array $columns
     * @return Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function findAll(array $columns = [])
    {
        return (! empty($columns)) ? RolePrivilege::all($columns) : RolePrivilege::all();
    }

    /**
     * Find role privilege by Id
     * 
     * @param int $id
     */
    public static function findById($id)
    {
        return RolePrivilege::find($id);
    }

    /**
     * Create role privilege
     * 
     * @param array $data
     * @return \App\User|NULL
     */
    public static function create(array $data)
    {
        $rolePrivilege = new RolePrivilege();
        
        $fillables = $rolePrivilege->getFillable();
        
        foreach ($data as $columnName => $columnValue) {
            if (in_array($columnName, $fillables)) {
                $rolePrivilege->{$columnName} = $columnValue;
            }
        }
        
        if ($rolePrivilege->save()) {
            return $rolePrivilege;
        }
        
        return null;
    }

    /**
     * Update role privilege
     * 
     * @param array $data
     * @param int $id
     * @return unknown|NULL
     */
    public static function update(array $data, $id)
    {
        $rolePrivilege = RolePrivilege::find($id);
        
        if (count($rolePrivilege) > 0) {
            $fillables = $rolePrivilege->getFillable();
            
            foreach ($data as $columnName => $columnValue) {
                if (in_array($columnName, $fillables)) {
                    $rolePrivilege->{$columnName} = $columnValue;
                }
            }
            
            if ($rolePrivilege->save()) {
                return $rolePrivilege;
            }
        }
        
        return null;
    }

    /**
     * Delete role privilege
     * 
     * @param int $id
     * @return boolean
     */
    public static function delete($id)
    {
        $rolePrivilege = RolePrivilege::find($id);
        
        if (count($rolePrivilege) > 0) {
            return $rolePrivilege->delete();
        }
        
        return false;
    }

    /**
     * Get role privileges
     * 
     * @param array $where
     * @param string $isPaginate
     * @param number $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function getPrivileges(array $where = [], $isPaginate = false, $page = 1)
    {
        $rolePrivileges = RolePrivilege::query();
        
        if (! empty($where)) {
            foreach ($where as $columnName => $columnValue) {
                $rolePrivileges->where($columnName, $columnValue);
            }
        }
        
        if ($isPaginate) {
            return $rolePrivileges->paginate(config('constants.global.RECORDS_PER_PAGE'));
        } else {
            return $rolePrivileges->get();
        }
    }
}