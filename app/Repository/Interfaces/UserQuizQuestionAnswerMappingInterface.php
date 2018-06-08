<?php 

namespace App\Repository\Interfaces;

interface UserQuizQuestionAnswerMappingInterface extends AppInterface
{
    public static function getUserQuizQuestionAnswerMappings(array $where = [], $isPaginate = false, $page = 1);
}