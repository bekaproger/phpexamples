<?php 
/* 
The best way to find if a two words are anagrams (conatain exactly same characters)

*/
function anagram(string $w, string $w2) : bool
{
  return (count_chars($w, 1) == count_chars($w2, 1));
} 
