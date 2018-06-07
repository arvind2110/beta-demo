<?php 

namespace Application\Repository\Interfaces;

interface QuizInterface extends AppInterface
{
    public static function getQuizes(array $where = [], $isPaginate = false, $page = 1);
}