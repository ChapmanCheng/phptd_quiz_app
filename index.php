<?php
session_start();
include_once './inc/quiz.php';
include_once './inc/questionLottery.php';
include_once './inc/questions.php';

$lottery = new QuestionLottery($questions);
$lottery->getRandomQuestions();

$q = $lottery->q;
print_r($q);

include_once './inc/html_blocks/header.php';
?>
<div id="quiz-box">
    <p class="breadcrumbs">Question # of #</p>
    <p class="quiz"><?php echo "What is $q[leftAdder] + $q[rightAdder]?"; ?></p>
    <form action="index.html" method="post">
        <input type="hidden" name="id" value="0" />
        <?php
        $choices = array_slice($q, 2);
        shuffle($choices);
        foreach ($choices as $num)
            echo "<input type='submit' class='btn' name='answer' value='$num' />"
        ?>
    </form>
</div>
<?php include_once './inc/html_blocks/footer.php'; ?>