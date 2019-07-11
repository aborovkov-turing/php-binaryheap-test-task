<?php


function array_median(array $input): ?double
{
    if(!$input) return null;

    sort($input);

}