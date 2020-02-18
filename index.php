<?php
session_start();

include_once './inc/quiz.php';
include_once './inc/class/Answers.php';
include_once './inc/class/PostData.php';
include_once './inc/questions.php';



// Session
// session_destroy();

if (isset($_POST['id'])) {
    $post = new PostData();
    $post->pushToSession();
};

// var_dump($_SESSION['answered']);

$answers = new Answers($questions);
$answers->sortAnsweredByKey();
$answers->getUnansweredRandomNum();

$question = $questions[$answers->rand];

include_once './inc/html_blocks/header.php';
?>

<div id="quiz-box">
    <?php
    if (isset($_GET['score'])) {
        $answers->checkAllQuestions();
        echo "<h1>You Got $answers->result Questions Correct</h1>";
    } else if (isset($_POST['id'])) {
        $result = $answers->checkLastQuestion();
        echo $result ? "<h4>You got it right! Hurray</h4>" : "<h4>Boo! You are wrong!</h4>";
    }

    ?>
    <p class="breadcrumbs">Question <?php echo $answers->length . ' of ' . count($questions); ?></p>
    <p class="quiz">What is <?php echo $question['leftAdder'] . ' + ' .  $question['rightAdder']; ?>?</p>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $answers->rand; ?>" />
        <?php
        $nums = array_slice($question, 2);
        shuffle($nums);
        foreach ($nums as $num)
            echo "<input type='submit' class='btn' name='answer' value='$num' />";
        ?>
    </form>
    <?php
    if ($answers->length == count($questions)) { ?>
        <a href="<?php $_SERVER["PHP_SELF"]; ?>?score" class="btn">Show score</a>
        <a href="<?php $_SERVER["PHP_SELF"]; ?>" class="btn">Continue</a>
    <?php }; ?>

</div>
<?php
include_once './inc/html_blocks/footer.php';
