<?php
namespace App\Repository;

use App\Repository\Interfaces\PrivilegeInterface;
use App\Privilege;

class PrivilegeRepository implements PrivilegeInterface
{

    /**
     * Find all privileges
     * 
     * @param array $columns
     * @return Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function findAll(array $columns = [])
    {
        return (! empty($columns)) ? Privilege::all($columns) : Privilege::all();
    }

    /**
     * Find privilege by Id
     * 
     * @param int $id
     */
    public static function findById($id)
    {
        return Privilege::find($id);
    }

    /**
     * Create privilege
     * 
     * @param array $data
     * @return \App\User|NULL
     */
    public static function create(array $data)
    {
        $privilege = new Privilege();
        
        $fillables = $privilege->getFillable();
        
        foreach ($data as $columnName => $columnValue) {
            if (in_array($columnName, $fillables)) {
                $privilege->{$columnName} = $columnValue;
            }
        }
        
        if ($privilege->save()) {
            return $privilege;
        }
        
        return null;
    }

    /**
     * Update privilege
     * 
     * @param array $data
     * @param int $id
     * @return unknown|NULL
     */
    public static function update(array $data, $id)
    {
        $privilege = Privilege::find($id);
        
        if (count($privilege) > 0) {
            $fillables = $privilege->getFillable();
            
            foreach ($data as $columnName => $columnValue) {
                if (in_array($columnName, $fillables)) {
                    $privilege->{$columnName} = $columnValue;
                }
            }
            
            if ($privilege->save()) {
                return $privilege;
            }
        }
        
        return null;
    }

    /**
     * Delete privilege
     * 
     * @param int $id
     * @return boolean
     */
    public static function delete($id)
    {
        $privilege = Privilege::find($id);
        
        if (count($privilege) > 0) {
            return $privilege->delete();
        }
        
        return false;
    }

    /**
     * Get privileges
     * 
     * @param array $where
     * @param string $isPaginate
     * @param number $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function getPrivileges(array $where = [], $isPaginate = false, $page = 1)
    {
        $privileges = Privilege::query();
        
        if (! empty($where)) {
            foreach ($where as $columnName => $columnValue) {
                $privileges->where($columnName, $columnValue);
            }
        }
        
        if ($isPaginate) {
            return $privileges->paginate(config('constants.global.RECORDS_PER_PAGE'));
        } else {
            return $privileges->get();
        }
    }
}