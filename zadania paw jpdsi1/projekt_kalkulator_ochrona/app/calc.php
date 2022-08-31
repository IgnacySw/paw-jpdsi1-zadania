<?php

require_once dirname(__FILE__).'/../config.php';
include _ROOT_PATH . '/app/security/check.php';

//pobranieParametrow
function getParams(&$x, &$y, &$op) {
    $x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
    $y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;
}

//validacja
function validate(&$x, &$y, &$op, &$info) {
    if (!(isset($x) && isset($y) && isset($op))) {
        return false;
    }

    if ($x == "") {
        $info [] = 'Nie podano ilosci lat posiadania samochodu!';
    }
    if ($y == "") {
        $info [] = 'Nie podano ilosci lat posiadania prawa jazdy!';
    }
	if ($op == "") {
        $info [] = 'Nie podano rodzaju samochodu!';
    }
	if ($op >= 5) {
            $info [] = 'Bledny zapis rodzaju samochodu!';
        return false;
		}
    if (count($info) != 0)
        return false;


    if (empty($info)) {
        if (!is_numeric($x)) {
            $info [] = 'Bledny zapis lat posiadania samochodu!';
        }
        if (!is_numeric($y)) {
            $info [] = 'Bledny zapis lat posiadania prawa jazdy!';
        } 
		if (!is_numeric($op)) {
            $info [] = 'Bledny zapis rodzaju samochodu!';
        }
    }
	
    if (count($info) != 0)
        return false;

    if (empty($info)) {
        if ($y  <= $x) {
            $info [] = 'Nie mozesz posiadac dluzej samochodu, niz prawa jazdy!';
        }
    }
    if (count($info) != 0)
        return false;
    else
        return true;
}



//obliczenia
function process(&$x, &$y, &$op, &$info, &$outcome) {
    global $role;

    if ($role == 'admin') {
		
	
		
        
    } else if ($op == 1) {
        $info [] = 'Tylko administrator może jeździć suvem!';
    }
    if (count($info) != 0)
        return false;

    $outcome = ( ( $op + 10) * 1000) / ($x * $y);
    $outcome = intval($outcome);
}


$x = null;
$y = null;
$op = null;
$outcome = null;
$info = array();

getParams($x, $y, $op);
if (validate($x, $y, $op, $info)) {
    process($x, $y, $op, $info, $outcome);
}

include 'calc_view.php';