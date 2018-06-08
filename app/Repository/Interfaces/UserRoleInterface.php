<?php 

namespace App\Repository\Interfaces;

interface UserRoleInterface extends AppInterface
{
    const ADMIN_USER_ID = 1;

    const SUB_ADMIN_USER_ID = 2;
    
    const USER_ID = 3;
    
    const TEMP_USER_ID = 4;
    
    public static function getUserRoles(array $where = [], $isPaginate = false, $page = 1);
}