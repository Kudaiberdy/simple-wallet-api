<?php

if (!function_exists('convert_to_cents')) {
    function convert_to_cents(float $amount): int
    {
        return (int)(round($amount, 2) * 100);
    }
}
