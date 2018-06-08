<?php
namespace App\Repository;

use App\Client;
use App\Repository\Interfaces\ClientInterface;

class ClientRepository implements ClientInterface
{

    /**
     * Find all clients
     * 
     * @param array $columns
     * @return Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function findAll(array $columns = [])
    {
        return (! empty($columns)) ? Client::all($columns) : Client::all();
    }

    /**
     * Find client by Id
     * 
     * @param int $id
     */
    public static function findById($id)
    {
        return Client::find($id);
    }

    /**
     * Create client
     * 
     * @param array $data
     * @return \App\User|NULL
     */
    public static function create(array $data)
    {
        $client = new Client();
        
        $fillables = $client->getFillable();
        
        foreach ($data as $columnName => $columnValue) {
            if (in_array($columnName, $fillables)) {
                $client->{$columnName} = $columnValue;
            }
        }
        
        if ($client->save()) {
            return $client;
        }
        
        return null;
    }

    /**
     * Update client
     * 
     * @param array $data
     * @param int $id
     * @return unknown|NULL
     */
    public static function update(array $data, $id)
    {
        $client = Client::find($id);
        
        if (count($client) > 0) {
            $fillables = $client->getFillable();
            
            foreach ($data as $columnName => $columnValue) {
                if (in_array($columnName, $fillables)) {
                    $client->{$columnName} = $columnValue;
                }
            }
            
            if ($client->save()) {
                return $client;
            }
        }
        
        return null;
    }

    /**
     * Delete client
     * 
     * @param int $id
     * @return boolean
     */
    public static function delete($id)
    {
        $client = Client::find($id);
        
        if (count($client) > 0) {
            return $client->delete();
        }
        
        return false;
    }

    /**
     * Get clients
     * 
     * @param array $where
     * @param string $isPaginate
     * @param number $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|Ambigous <\Illuminate\Database\Eloquent\Collection, multitype:\Illuminate\Database\Eloquent\static >
     */
    public static function getClients(array $where = [], $isPaginate = false, $page = 1)
    {
        $clients = Client::query();
        
        if (! empty($where)) {
            foreach ($where as $columnName => $columnValue) {
                $clients->where($columnName, $columnValue);
            }
        }
        
        if ($isPaginate) {
            return $clients->paginate(config('constants.global.RECORDS_PER_PAGE'));
        } else {
            return $clients->get();
        }
    }
}