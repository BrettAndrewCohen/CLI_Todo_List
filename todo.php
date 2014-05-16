<?php

// List array items formatted for CLI
// Return string of list items separated by newlines.
// Should be listed [KEY] Value like this:
// [1] TODO item 1
// [2] TODO item 2 - blah
// DO NOT USE ECHO, USE RETURN

function list_items($list) {

    $listofitems = '';

    foreach ($list as $key => $listitem) {
        if($key == 0) {
            $key = 1;
        } else {
            $key++;
        }
        $listofitems .= "[{$key}] {$listitem}\n";
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
    // $result;
    // }
}

// Create array to hold list of todo items
$items = array();

// The loop!

do {

echo list_items($items);
 
    // Show the menu options
    echo '(N)ew item, (R)emove item, (Q)uit : ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = get_input(TRUE);

    // Check for actionable input
    if ($input == 'N') {
        // Ask for entry
        echo 'Enter item: ';
        // Add entry to list array
        $items[] = get_input();
    } elseif ($input == 'R') {
        // Remove which item?
        echo 'Enter item number to remove: ';
        // Get array key
        $key = get_input();
        // Remove from array
        unset($items[--$key]);
        // Reset all the items in the array to start at index 1
        $items = array_values($items);

    }
// Exit when input is (Q)uit
} while($input != 'Q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);