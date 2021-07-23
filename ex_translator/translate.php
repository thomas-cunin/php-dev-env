<?php

require 'index.php';

function translate($content, $direction)
{
    $content = strtolower($content);
    $dictionnaire = array(
        'toEnglish' => array(
            'mot' => 'word',
            'ordinateur' => 'computer'
        ),
        'toFrench' => array(
            'word' => 'mot',
            'computer' => 'ordinateur'
        )
    );

    if (isset($dictionnaire[$direction][$content])) {
        return $dictionnaire[$direction][$content];
    } else {
        return "Ce mot n'est pas connu dans notre dictionnaire :(";
    }
};

function imageUrl($direction){
    if ($direction == 'toFrench') {
        return './img/fr.png';
    }
    else {
        return './img/eng.png';
    }
}


