<?php 

namespace App\Repository\Interfaces;

interface AppInterface
{
    public static function findAll(array $columns = []);
    
    public static function findById($id);
    
    public static function create(array $data);
    
    public static function update(array $data, $id);
    
    public static function delete($id);
}