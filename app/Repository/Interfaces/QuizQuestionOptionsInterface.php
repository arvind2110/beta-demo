<?php 

namespace App\Repository\Interfaces;

interface QuizQuestionOptionsInterface extends AppInterface
{
    public static function getQuizQuestionOptions(array $where = [], $isPaginate = false, $page = 1);
}