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

// check if an answer has been submited
if ($_POST['answer'] == '' || !(isset($_POST['answer']))) {
  // check if all question have been asked
  if ((count($_SESSION['previousQuestions'])) == ($numberOfQuestions)) {
    // reset previousQuestions array to a empty array
    $_SESSION['previousQuestions'] = [];
    $showScore = true;
  } else {
    $showScore = false;
    // loop as long as $i is a question that has already been asked
    do {
      // generate a random number in the range of indexes of the quetions array
      $i = rand(0,($numberOfQuestions-1));
    } while (in_array($i, $_SESSION['previousQuestions']));
    // add $i to the end of previousQuestions
    array_push($_SESSION['previousQuestions'],$i);
    // make a string of the question at $questions[$i]
    $currentQuestion =  $_SESSION['questions'][$i]['leftAdder'] . " + " . $_SESSION['questions'][$i]['rightAdder'];
    // question number being shown
    $questionNumber = (count($_SESSION['previousQuestions']));
    // make an array of the answer choises
    $_SESSION['answersArray'] = [
      $_SESSION['questions'][$i]['correctAnswer'],
      $_SESSION['questions'][$i]['firstIncorrectAnswer'],
      $_SESSION['questions'][$i]['secondIncorrectAnswer']
    ];

    // mix up the answer choises
    shuffle($_SESSION['answersArray']);
  }
