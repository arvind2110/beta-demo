<?php 

namespace Application\Repository\Interfaces;

interface QuizQuestionMappingInterface extends AppInterface
{
    public static function getQuizQuestionMappings(array $where = [], $isPaginate = false, $page = 1);
}