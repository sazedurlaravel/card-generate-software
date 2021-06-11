<?php

use App\Models\Card;

function generateCardNumber() {
    $permitted_chars = '0123456789';
    $number = substr(str_shuffle($permitted_chars), 0, 6); // better than rand()

    // call the same function if the barcode exists already
    if (cardNumberExists($number)) {
        return generateCardNumber();
    }

    // otherwise, it's valid and can be used
    return $number;
}

function cardNumberExists($number) {
    // query the database and return a boolean
    // for instance, it might look like this in Laravel
    return Card::where('card_number', $number)->exists();
}

function generatePinNumber() {
    $permitted_chars = '0123456789';
    $number = substr(str_shuffle($permitted_chars), 0, 6); // better than rand()

    // call the same function if the barcode exists already
    if (pinNumberExists($number)) {
        return generatePinNumber();
    }

    // otherwise, it's valid and can be used
    return $number;
}

function pinNumberExists($number) {
    // query the database and return a boolean
    // for instance, it might look like this in Laravel
    return Card::where('pin_number', $number)->exists();
}