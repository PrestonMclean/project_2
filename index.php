<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <?php include("inc/quiz.php");?>
</head>
<body>
    <div class="container">
        <div id="quiz-box">
          <?php
          if ($showtoast) {
            //show toast, question number, and the question
            echo ("
                  <p><b>$toast</b></p>
                  <p class='breadcrumbs'>Question $questionNumber of $numberOfQuestions</p>
                  <p class='quiz'>$currentQuestion</p>
                  <form action='index.php' method='post'>");
                    // find the correct answer useing $correctAnswer and add the class correct to the input
                    if ($correctAnswer == 0) {
                      echo ("<input type='button' class='btn correct' name='next' value=" . $_SESSION['answersArray'][0] . ">");
                    } else {
                      echo ("<input type='button' class='btn' name='next' value=" . $_SESSION['answersArray'][0] . ">");
                    }
                    if ($correctAnswer == 1) {
                      echo ("<input type='button' class='btn correct' name='next' value=" . $_SESSION['answersArray'][1] . ">");
                    } else {
                      echo ("<input type='button' class='btn' name='next' value=" . $_SESSION['answersArray'][1] . ">");
                    }
                    if ($correctAnswer == 2) {
                      echo ("<input type='button' class='btn correct' name='next' value=" . $_SESSION['answersArray'][2] . ">");
                    } else {
                      echo ("<input type='button' class='btn' name='next' value=" . $_SESSION['answersArray'][2] . ">");
                    }
            echo  ("<input type='submit' class='btn' name='next' value=next />
                  </form>");
          }
          else {
            if ($showScore) {
            // show the score
            echo "<h2>you got " . $_SESSION['score'] . " out of $numberOfQuestions</h2>";
            // display dificulty choices and try again button
            echo "<form action='index.php' method='post'>
                <input type='radio' class='btn' name='dificulty' value='easy' />
                <label for='easy'><b>easy</b></label><br>
                <input type='radio' class='btn' name='dificulty' value='normal' />
                <label for='nomal'><b>nomal</b></label><br>
                <input type='radio' class='btn' name='dificulty' value='hard' />
                <label for='hard'><b>hard</b></label><br>
                <input type='submit' class='btn' name='again' value='try again' /></form>";
          }else {
            // display the question number, question, and the answer choices
            echo ("<p class='breadcrumbs'>Question $questionNumber of $numberOfQuestions</p>
                  <p class='quiz'>$currentQuestion</p>
                  <form action='index.php' method='post'>
                    <input type='Submit' class='btn' name='answer' value=" . $_SESSION['answersArray'][0] . ">
                    <input type='submit' class='btn' name='answer' value=" . $_SESSION['answersArray'][1] . ">
                    <input type='submit' class='btn' name='answer' value=" . $_SESSION['answersArray'][2] . ">
                  </form>");
          }
        }
          ?>
        </div>
    </div>
</body>
</html>
