<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @param $input
 * @return string
 */
function base32_encode($input)
{
    if (function_exists('dalamar_base32_encode')){
        return dalamar_base32_encode($input);
    }

    static $asc = array();
    $base32_alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
    $output = '';
    //$position         = 0;
    $stored_data = 0;
    $stored_bit_count = 0;
    $index = 0;
    $len_input = strlen($input);
    while ($index < $len_input) {
        if (!isset($asc[$input[$index]])) {
            $asc[$input[$index]] = ord($input[$index]);
        }

        $stored_data <<= 8;
        $stored_data += $asc[$input[$index]];
        $stored_bit_count += 8;
        $index += 1;

        //take as much data as possible out of storedData
        while ($stored_bit_count >= 5) {
            $stored_bit_count -= 5;
            $output .= $base32_alphabet[$stored_data >> $stored_bit_count];
            $stored_data &= ((1 << $stored_bit_count) - 1);
        }
    } //while

    //deal with leftover data
    if ($stored_bit_count > 0) {
        $stored_data <<= (5 - $stored_bit_count);
        $output .= $base32_alphabet[$stored_data];
    }
    return $output;
}

/**
 * @param $input
 * @return string
 */
function base32_decode($input)
{
    if (empty($input)) {
        return $input;
    }

    if (function_exists('dalamar_base32_decode')){
        return dalamar_base32_decode($input);
    }
    static $asc = array();
    $output = '';
    $v = 0;
    $vbits = 0;
    $i = 0;
    $input = strtolower($input);
    $j = strlen($input);
    while ($i < $j) {

        if (!isset($asc[$input[$i]])) {
            $asc[$input[$i]] = ord($input[$i]);
        }

        $v <<= 5;
        if ($input[$i] >= 'a' && $input[$i] <= 'z') {
            $v += ($asc[$input[$i]] - 97);
        } elseif ($input[$i] >= '2' && $input[$i] <= '7') {
            $v += (24 + $input[$i]);
        } else {
            exit(1);
        }
        $i++;

        $vbits += 5;
        while ($vbits >= 8) {
            $vbits -= 8;
            $output .= chr($v >> $vbits);
            $v &= ((1 << $vbits) - 1);
        }
    }
    return $output;
}