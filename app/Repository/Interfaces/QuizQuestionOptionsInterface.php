<?php 

namespace Application\Repository\Interfaces;

interface QuizQuestionOptionsInterface extends AppInterface
{
    public static function getQuizQuestionOptions(array $where = [], $isPaginate = false, $page = 1);
}