<?php

namespace App\Helpers;


function time_local($time)
{
    $dateString = $time;
    $timestamp = strtotime($dateString);

    // Tetapkan bahasa lokal ke Bahasa Indonesia
    setlocale(LC_TIME, 'id_ID');

    // Mendapatkan nama hari dalam bahasa Indonesia
    $dayName = strftime("%A", $timestamp);

    // Mendapatkan jam dan menit dalam format 01:21
    $time = date("H:i", $timestamp);

    $waktu =  "$dayName, $time WIB"; // Output: Rabu, 01:21 WIB

    return $waktu;
}
