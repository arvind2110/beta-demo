<?php 

namespace Application\Repository\Interfaces;

interface PrivilegeInterface extends AppInterface
{
    public static function getPrivileges(array $where = [], $isPaginate = false, $page = 1);
}