<?php
class Answers
{
    private $questions;
    private $answered;
    private $length;
    private $rand;

    public function __construct($questions)
    {
        if (empty($_SESSION['answered']))
            $_SESSION['answered'];

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
        $allKeys = array_keys($this->questions);
        $answeredKeys = array_keys($this->answered);
        $diff = array_diff($allKeys, $answeredKeys);
        $diff = array_values($diff);
        $rand = rand(0, count($diff) - 1);
        $this->rand =  $diff[$rand];
    }
}
