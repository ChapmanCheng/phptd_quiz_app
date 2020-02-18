<?php
session_start();

include_once './inc/quiz.php';
include_once './inc/class/QuestionsHandler.php';
include_once './inc/class/PostData.php';
include_once './inc/class/Question.php';
include_once './inc/questions.php';

// Session
/**
 * ! Deprecated
 * if (empty($_SESSION['answered'])) {
 *  new QuestionsHandler($questions);
 * }
 */



// session_destroy();
// if (isset($_POST['id'])) {
//     $postData = new PostData();
//     $postData->saveToSession();
// }


$question = new Question($questions);

include_once './inc/html_blocks/header.php';

echo '
    <div id="quiz-box">
        <p>question index is ' . $question->index . ' -- delete this -- </p>
        <p class="breadcrumbs">Question ' . 1 . ' of ' . $question->total . '</p>
        <p class="quiz">What is ' . $question->q['leftAdder'] . ' + ' . $question->q['rightAdder'] . '?</p>
        <form action="index.php" method="post">
            <input type="hidden" name="id" value="' . $question->index . '" />';

$nums = array_slice($question->q, 2);
shuffle($nums);
foreach ($nums as $num)
    echo "<input type='submit' class='btn' name='answer' value='$num' />";

echo '</form></div>';
include_once './inc/html_blocks/footer.php';
