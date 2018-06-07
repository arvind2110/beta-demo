<?php 

namespace Application\Repository\Interfaces;

interface AppInterface
{
    public static function findAll($columns = []);
    
    public static function findById($id);
    
    public static function create(array $data);
    
    public static function update(array $data, $id);
    
    public static function delete($id);
}