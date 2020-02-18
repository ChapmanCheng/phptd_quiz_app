<?php
class PostData
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
    public function pushToSession()
    {
        $_SESSION['answered'][$this->id] =  $this->answer;
        // print_r($_SESSION);
        // ksort($_SESSION['answered'], SORT_NUMERIC);
    }
}
