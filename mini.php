<?php

    $filename = "bg.html";
    $handle = fopen($filename, "r");
    $html = fread($handle, filesize($filename));
    fclose($handle);

    // Regular expression variables
    $nameRegex = '/([a-zA-Z]|[[:space:]]|[Dr.])*(?=<\/title>)/';
    $eduRegex = '/([a-zA-Z]|[[:space:]]|,)*(?=<\/p><\/div>)/';
    $researchRegex = '/([a-zA-Z]|[[:space:]]|,)*(?=<\/p><\/div>)/';
    $emailRegex = '/[[:space:]]([a-zA-Z]*)@([a-zA-Z]*)\.(com|edu|net)/';
    $webRegex = '/(https:\/\/cs.txstate.edu\/accounts\/profiles\/[a-z0-9]*)/';


    function getMatches ($string, $regex) {
        preg_match_all($regex, $string, $array);
        return $array[0];
    }
?>