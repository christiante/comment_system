<?php

include_once './SecurityChecker.php';
$checker = new SecurityChecker();

$checkText='fuck you little bitch suck my dick';

$check = $checker ->wordsFilter($checkText);
echo $check;

$checkText2=' ou un texte totalement innocent';

$check2 = $checker ->wordsFilter($checkText2);
echo '<br/>';
echo $check2;