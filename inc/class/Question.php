<?php

class Question
{
    public $index = 0;
    public $q;
    public $total;

    public function __construct($questions)
    {
        $index = rand(0, count($questions) - 1);
        $keys = array_keys($_SESSION['answered']);
        if (isset($_SESSION['answered'])) {
        }


        $question = $questions[$index];
        $total =  count($questions);

        $this->index = $index;
        $this->q = $question;
        $this->total = $total;
    }
}
// Generate random questions


// Loop for required number of questions

// Get random numbers to add

// Calculate correct answer

// Get incorrect answers within 10 numbers either way of correct answer
// Make sure it is a unique answer

// Add question and answer to questions array
