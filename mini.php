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

    $name = getMatches($html, $nameRegex);
    $education = getMatches($html, $eduRegex);
    $research = getMatches($html, $researchRegex);
    $email = getMatches($html, $emailRegex);
    $webpage = getMatches($html, $webRegex);

    echo "Name:", $name[0], PHP_EOL;
    echo "Education: ", $education[2], PHP_EOL;
    echo "Research interests: ", $research[0], PHP_EOL;
    echo "Email:", $email[0], PHP_EOL;
    echo "Webpage: ", $webpage[0], PHP_EOL;

    function getMatches ($string, $regex) {
        preg_match_all($regex, $string, $array);
        return $array[0];
    }
?>