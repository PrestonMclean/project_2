<?php
// Generate random questions
function randomQuestionGenerator () {
    // Get random numbers to add
    $temp = [];
    // get random numbers to add
    switch ($_POST['dificulty']) {
      case 'easy':
        $temp['leftAdder'] = pow((rand(5, 95)),0);
        $temp['rightAdder'] = pow((rand(5, 95)),0);
        break;
      case 'hard':
        $temp['leftAdder'] = pow((rand(5, 95)),4);
        $temp['rightAdder'] = pow((rand(5, 95)),4);
        break;
      case 'nomal':
      default:
        $temp['leftAdder'] = pow((rand(5, 95)),1);
        $temp['rightAdder'] = pow((rand(5, 95)),1);
        break;
    }
    // Calculate correct answer
    $temp['correctAnswer'] = ($temp['leftAdder'] + $temp['rightAdder']);
    $random1;
    $random2;
    // get random numbers that non zero and unique
    do {
      // make sure the incorrect answers are not negative and close to the correct answer
      if (10 > $temp['correctAnswer']) {
        $random1 = rand(-1, 5);
        $random2 = rand(-1, 5);
      } elseif (10 >= (.25*$temp['correctAnswer'])) {
        $random1 = rand(-(.15*$temp['correctAnswer']), 10);
        $random2 = rand(-(.15*$temp['correctAnswer']), 10);
      } else {
        $random1 = rand(-10, 10);
        $random2 = rand(-10, 10);
      }
    } while (($random1 == $random2) || ($random1 == 0) || ($random2 == 0));

    // add the random numbers to the answer to get the wrong answers
    $temp['firstIncorrectAnswer'] = ($temp['correctAnswer'] + $random1);
    $temp['secondIncorrectAnswer'] = ($temp['correctAnswer'] + $random2);
    // return the array
    return $temp;
}
