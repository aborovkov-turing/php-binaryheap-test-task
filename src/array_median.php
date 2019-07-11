<?php


function array_median(array $input): ?float
{
    if(!$input) return null;

    $size = count($input);
    sort($input);

    if ($size % 2) return (float) $input[$size / 2];


}