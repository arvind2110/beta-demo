<?php 

namespace App\Repository\Interfaces;

interface ClientInterface extends AppInterface
{
    public static function getClients(array $where = [], $isPaginate = false, $page = 1);
}