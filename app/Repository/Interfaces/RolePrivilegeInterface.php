<?php 

namespace Application\Repository\Interfaces;

interface RolePrivilegeInterface extends AppInterface
{
    public static function getRolePrivileges(array $where = [], $isPaginate = false, $page = 1);
}