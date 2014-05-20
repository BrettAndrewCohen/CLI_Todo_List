<?php

function list_items($list) {

    $listofitems = '';

    foreach ($list as $key => $listitem) {
      
      $listofitems .= "[" . ($key + 1) . "]" . $listitem . PHP_EOL;
    
    }
    return $listofitems;
}

function get_input($upper = false) {

    $result = trim(fgets(STDIN));
    return $upper ? strtoupper($result) : $result;

    // if ($upper) {
    // return strtoupper($result);
    // } 
    // else {
    // return $result;
    // }
}

function sort_menu($items) {
    echo '(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered : ';

    $input = get_input(TRUE);

        if ($input == 'A') {
            asort($items);
        } elseif ($input == 'Z') {
            arsort($items);
        } elseif ($input == 'O') {
            ksort($items);
        } elseif ($input == 'R') {
            krsort ($items);
        }
    return $items;
}

// Create array to hold list of todo items
$items = array();

// The loop!

do {

echo list_items($items);
 
    // Show the menu options
    echo '(N)ew item, (R)emove item, (Q)uit, (S)ort, : ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = get_input(TRUE);

    // Check for actionable input
    if ($input == 'N') {
        // Ask for entry
        echo 'Enter item: ';
        $listitem = get_input();
        echo 'Would you like to put this item at the (B)eginning? ';
        $input = get_input(TRUE);
        // Add entry to list array
        if($input == 'B') {
            array_unshift($items, $listitem);
        } else {
            //this adds the item to the end of an array. 
            $items[] = $listitem;
        }
    } elseif ($input == 'R') {
        // Remove which item?
        echo 'Enter item number to remove: ';
        // Get array key
        $key = get_input();
        // Remove from array
        unset($items[$key -1]);
        // Reset all the items in the array to start at index 1
        $items = array_values($items);
    } elseif ($input == 'S') {
        $items = sort_menu($items);
    } elseif ($input == 'F') {
        array_shift($items);
    } elseif ($input == 'L') {
        array_pop($items);
    }

// Exit when input is (Q)uit
} while($input != 'Q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);