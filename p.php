<?php 

function anagram($w, $w2){ return (count_chars($w, 1) === count_chars($w2, 1)) ?? false;} 
