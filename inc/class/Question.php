<?php

class Question
{
    private $questions;
    private $index;
    private $q;
    private $total;

    public function __construct($questions, $index)
    {
        $this->index = $index;
        $this->q = $questions[$index];
        $this->total = count($questions);
    }
    public function __get($name)
    {
        if (isset($this->{$name}))
            return $this->{$name};
    }
    private function getRandomNo()
    {
        rand(0, count($this->questions) - 1);
    }
}
// Generate random questions


// Loop for required number of questions

// Get random numbers to add

// Calculate correct answer

// Get incorrect answers within 10 numbers either way of correct answer
// Make sure it is a unique answer

// Add question and answer to questions array
