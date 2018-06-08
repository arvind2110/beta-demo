<?php 

namespace App\Repository\Interfaces;

interface QuizQuestionInterface extends AppInterface
{
    public static function getQuizQuestions(array $where = [], $isPaginate = false, $page = 1);
}