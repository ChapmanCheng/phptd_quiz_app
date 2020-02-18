<?php
class PostHandler
{
    private $id;
    private $answer;

    function __construct()
    {
        $this->id =  filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $this->answer = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_NUMBER_INT);
    }

    public function getAnswer()
    {
        return array($this->id => $this->answer);
    }
    public function pushToAnswered()
    {
        $_SESSION['answered'][$this->id] =  $this->answer;
    }
}
