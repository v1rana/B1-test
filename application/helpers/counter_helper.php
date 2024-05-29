<?php


    defined('BASEPATH') OR exit('No direct script access allowed.');

    if ( ! function_exists('count_visitor')) {
        function count_visitor()  {

            $visitorCount = '';
            $newVisitorCount = '';


            $visitorCount       = read_file('./logs/counter.txt');
            $newVisitorCount    = $visitorCount+1;

            $res = write_file('./logs/counter.txt', $newVisitorCount);
            if($res === TRUE){
                return $newVisitorCount;
            } else {
                return $visitorCount;
            }
        }
    }