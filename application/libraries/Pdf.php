<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct() {
        parent::__construct(        $orientation = 'P',
                                    $unit = 'mm',
                                    $format = 'A4',
                                    $unicode = true,	
                                    $encoding = 'UTF-8',
                                    $diskcache = false
                            );

                                           
    }

}