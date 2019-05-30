<?php


function createAlphabet($letterToStopAt)

    {
        $letters = range('A', 'Z');
        $lettersSoFar = ''; //empty string - stores loops of range before letter to stop at
        $counter = 0; //loop counter that calculates spaces in the middle of the diamond
        $counter2 = array_search($letterToStopAt, $letters); //loop counter -> needle in haystack -> looking for
        $output = '';//sticks all outputs together

        foreach ($letters as $letter) {
            if ($letter == $letterToStopAt) { //stops at letter to stop at
                $counter += 2; //add 2 to counter (spaces inside diamoned for each letter in loop)
                $output .= $letterToStopAt . str_repeat('&nbsp;', $counter) . $letterToStopAt . '<br>'; //no spaces on left, letter to stop at, amount of spaces in middle, letter
                $output .= $lettersSoFar; // all of the bottom of the diamond - mirror
                return $output;//stop loop and return output
            } else {
                if ($letter == 'A') {
                    $lettersSoFar = str_repeat('&nbsp;', $counter2) . $letter . '<br>'; //if letter = A, defines spaces to the left of A, based on letters so far -> 0
                    $output .= $lettersSoFar; // 0
                } else { //all the rows except A and letter to stop at
                    $counter += 2; //centre spacing - add 2 to variable each time
                    $counter2 --; //left hand spacing - subtract 1 from variable each time
                    $lettersSoFar = str_repeat('&nbsp;', $counter2) . $letter . str_repeat('&nbsp;', $counter) . $letter . '<br>' . $lettersSoFar; //override letters so far, counter2 letters going down, letters so far on the end reverses using counter and counter 2
                    $output .= str_repeat('&nbsp;', $counter2) . $letter . str_repeat('&nbsp;', $counter) . $letter . '<br>'; // echoing the current row of the top half of the diamond .= concatinates the next row of the diamond onto the output
                }

            }
        }
}

echo createAlphabet('H');

?>