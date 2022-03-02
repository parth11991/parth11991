<?php

$needle = "London, England, uk";
$haystack = array(
    1 => array("London", "Ontario", "Canada"),
    8 => array("Greater London", "England", "UK"),
    4 => array("London", "England", "United Kingdom"),
    9 => array("London", "California", "United States")
);

echo best_match($needle, $haystack);

function best_match($needle, $haystack)
{
    $score = 0;
    foreach ($haystack as  $key => $value )
    {
        $text = implode(", ", $value);
        similar_text($needle, $text, $newscore);
        if ($newscore > $score) 
        {
            $score = $newscore;
            $index = $key;
        }
    }

    echo $index;

    $score = number_format($score,2);
    echo "<br> Best match is at index: $index with score: $score%"; //Result show with format

}
