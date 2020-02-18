<?php

class QuestionLottery
{
    private $questions;
    public $q;
    public $totalOfQuestion;

    public function __construct($questions)
    {
        $this->questions = $questions;
        $this->totalOfQuestion = count($questions);
    }

    public function printOutQuestions()
    {
        foreach ($this->questions as $question) {
            print_r($question);
            echo '<br />';
        }
    }

    public function getRandomQuestions()
    {
        $count = count($this->questions);
        $rand = rand(0, $count - 1);
        $this->q = $this->questions[$rand];
    }
}
// Generate random questions


// Loop for required number of questions

// Get random numbers to add

// Calculate correct answer

// Get incorrect answers within 10 numbers either way of correct answer
// Make sure it is a unique answer

// Add question and answer to questions array
