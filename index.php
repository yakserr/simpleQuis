<?php
// create array of array for question
$questions = [
    [
        "question"  => "What is the most used programming language in 2021 ?",
        "answers"   => ["C++", "Java", "Python", "PHP"],
        "correct"   => "Python"
    ],
    [
        "question"  => "What does HTML stand for ?",
        "answers"   => ["Hyper Text Markup Language", "Cascading Style Sheet", "Jason Object Notation", "Application Programming Interface"],
        "correct"   => "Hyper Text Markup Language"
    ]
];

if (isset($_POST['submit'])) {
    $score = 0;
    $num = 0;
    // check if the answer is same the correct answer
    foreach ($questions as $key => $value) {
        if ($_POST['answer' . $num] == $value['correct']) {
            $score++;
            $num++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz App</title>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer></script>
</head>

<body>
    <div class="quiz-container" id="quiz">
        <?php if (isset($score)) { ?>
            <h2> You Answered correctly at <?php echo $score; ?>/<?php echo count($questions); ?></h2> <button onClick="window.location.href = window.location.href">Reload</button>
        <?php } else { ?>
            <div class="timer">
                <div class="timer-item">
                    <span class="timer-item-text">Time&nbsp;</span>
                    <span class="timer-item-value" id="timer">00:00</span>
                </div>
            </div>
            <form action="" method="post">
                <!--Looping questions-->
                <?php for ($i = 0; $i < count($questions); $i++) { ?>
                    <div class="quiz-header">
                        <h2 id="question"><?= $questions[$i]['question'] ?></h2>
                        <ul>
                            <li>
                                <input type="radio" id="a<?= $i ?>" name="answer<?= $i ?>" class="answer" value="<?= $questions[$i]['answers'][0] ?>" />
                                <label id="a_text" for="a<?= $i ?>"><?= $questions[$i]['answers'][0] ?></label>
                            </li>
                            <li>
                                <input type="radio" id="b<?= $i ?>" name="answer<?= $i ?>" class="answer" value="<?= $questions[$i]['answers'][1] ?>" />
                                <label id="b_text" for="b<?= $i ?>"><?= $questions[$i]['answers'][1] ?></label>
                            </li>
                            <li>
                                <input type="radio" id="c<?= $i ?>" name="answer<?= $i ?>" class="answer" value="<?= $questions[$i]['answers'][2] ?>" />
                                <label id="c_text" for="c<?= $i ?>"><?= $questions[$i]['answers'][2] ?></label>
                            </li>
                            <li>
                                <input type="radio" id="d<?= $i ?>" name="answer<?= $i ?>" class="answer" value="<?= $questions[$i]['answers'][3] ?>" />
                                <label id="d_text" for="d<?= $i ?>"><?= $questions[$i]['answers'][3] ?></label>
                            </li>
                        </ul>
                    </div>
                    <hr class="line">
                    </hr>
                    <!--End for-->
                <?php } ?>
                <button type="submit" id="submit" name="submit">Submit </button>
            </form>
        <?php } ?>
    </div>
</body>

</html>