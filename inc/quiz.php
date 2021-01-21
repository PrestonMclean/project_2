<?php
// Start the session
session_start();


include("generate_questions.php");

$numberOfQuestions = 10;

// count how many questions there are in questions array


$toast;
$showtoast = false;

$showScore = false;

// the current index of the question in questions array
$i;

// string asking to add two numbers
$currentQuestion;

// the index in thw answersArray of the right answer
$correctAnswer;

// seting session variables to empty arrays
if (!(isset($_SESSION['previousQuestions']))) {
  $_SESSION['previousQuestions'] = [];
  $showScore = false;
}
if (!(isset($_SESSION['answersArray']))) {
  $_SESSION['answersArray'] = [];
}

// set score to 0 on the first question
if ($_SESSION['previousQuestions'] == []) {
  $_SESSION['score'] = 0;
  for ($i=0;$i< $numberOfQuestions; $i++) {
    $_SESSION['questions'][$i] = randomQuestionGenerator();
  }
}
