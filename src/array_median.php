<?php


function array_median(array $input): ?float
{
    if(!$input) return null;

    $size = count($input);

    sort($input);

    if ($size % 2) return (float) $input[$size / 2];
    else return (float) ($input[$size / 2] + $input[($size / 2) - 1]) / 2;

}