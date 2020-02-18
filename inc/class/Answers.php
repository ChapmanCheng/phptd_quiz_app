<?php
class Answers
{
    private $questions;
    private $answered;
    private $length;
    private $rand;
    private $result;

    public function __construct($questions)
    {
        if (empty($_SESSION['answered']))
            $_SESSION['answered'] = array();

        $this->questions = $questions;
        $this->answered = $_SESSION['answered'];
        $this->length = count($this->answered);
    }
    public function __get($name)
    {
        if (isset($this->{$name}))
            return $this->{$name};
    }

    public function getAnsweredKey()
    {
        print_r($this->answered);
    }
    public function sortAnsweredByKey()
    {
        ksort($this->answered, SORT_NUMERIC);
    }
    public function getUnansweredRandomNum()
    {
        if (count($this->answered) != 10) {

            $allKeys = array_keys($this->questions);
            $answeredKeys = array_keys($this->answered);
            $diff = array_diff($allKeys, $answeredKeys);
            $diff = array_values($diff);
            $rand = rand(0, count($diff) - 1);
            $this->rand =  $diff[$rand];
        } else {
            $rand = rand(0, count($this->questions) - 1);
            $this->rand = $rand;
        }
    }
    public function checkLastQuestion()
    {
        $id = $_POST['id'];
        $answer = $_POST['answer'];

        return $this->questions[$id]['correctAnswer'] == $answer ? 1 : 0;
    }
    public function checkAllQuestions()
    {
        $correctAnswers = array_map(function ($qt) {
            return $qt['correctAnswer'];
        }, $this->questions);
        $result = array_intersect($correctAnswers, $this->answered);
        $this->result = count($result);
    }
}
