<?php
session_start();

include_once './inc/quiz.php';
include_once './inc/questionLottery.php';
include_once './inc/questions.php';

// Session
if (empty($_SESSION)) {
    // init if session is empty 
    $_SESSION['lottery'] = new QuestionLottery($questions);
}

$lottery = new QuestionLottery($questions);
$q = $lottery->getQuestion();

include_once './inc/html_blocks/header.php';
?>
<div id="quiz-box">
    <p class="breadcrumbs"><?php echo 'Question ' . $lottery->getAnswered() . ' of ' . $lottery->getTotal(); ?></p>
    <p class="quiz"><?php echo "What is $q[leftAdder] + $q[rightAdder]?"; ?></p>
    <form action="<?php echo "index.php?count=$count"; ?>" method="post">
        <input type="hidden" name="id" value="0" />
        <?php
        $nums = array_slice($q, 2);
        shuffle($nums);
        foreach ($nums as $num)
            echo "<input type='submit' class='btn' name='answer' value='$num' />"
        ?>
    </form>
</div>
<?php include_once './inc/html_blocks/footer.php'; ?>