<?php 

namespace App\Repository\Interfaces;

interface UserInterface extends AppInterface
{
    public static function getUsers(array $where = [], $isPaginate = false, $page = 1);
}