<?php

class QuestionLottery
{
    private $index = 0;
    private $questions;
    private $totalOfQuestion;

    public function __construct($questions)
    {
        shuffle($questions);
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

    public function getAnswered()
    {
        return $this->index + 1;
    }
    public function getTotal()
    {
        return $this->totalOfQuestion;
    }
    public function getQuestion()
    {
        return $this->questions[$this->index];
    }
}
// Generate random questions


// Loop for required number of questions

// Get random numbers to add

// Calculate correct answer

// Get incorrect answers within 10 numbers either way of correct answer
// Make sure it is a unique answer

// Add question and answer to questions array
