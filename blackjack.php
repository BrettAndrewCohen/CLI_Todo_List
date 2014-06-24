<?php

$hand = array('A-H', '5-D', 'K-C', 'A-S', '4-H');

function getTotal($hand)
{
    $total = 0;

    // loop through hand and calculate total value
    // use "explode" function to separate card suit and value
    // aces count as 11 unless you are over 21 and then they count as 1
    // K, Q, and J count as 10
    // numeric cards count as their value

    foreach ($hand as $card)
    {
        var_dump(explode('-', $card));
    }

    return $total;
}

echo getTotal($hand) . PHP_EOL;