<?php 

namespace Application\Repository\Interfaces;

interface UserRoleInterface extends AppInterface
{
    public static function getUserRoles(array $where = [], $isPaginate = false, $page = 1);
}