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
}

$answers = new Answers($questions);
$answers->sortAnsweredByKey();
$answers->getUnansweredRandomNum();

$question = $questions[$answers->rand];
include_once './inc/html_blocks/header.php';
?>

<div id="quiz-box">
    <p class="breadcrumbs">Question <?php echo $answers->length . ' of ' . count($questions); ?></p>
    <p class="quiz">What is <?php echo $question['leftAdder']; ?> + <?php echo $question['rightAdder']; ?>?</p>
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo $answers->rand; ?>" />
        <?php
        $nums = array_slice($question, 2);
        shuffle($nums);
        foreach ($nums as $num)
            echo "<input type='submit' class='btn' name='answer' value='$num' />";
        ?>
    </form>
</div>
<?php
include_once './inc/html_blocks/footer.php';
