<form name="formNM" method="GET" action="<?=$_SERVER['PHP_SELF']?>">
n:<input type="text" value="3" name="n">
m:<input type="text" value="3" name="m">
a:<input type="text" value="5" name="a">
<input type="submit">
</form>

<?php

session_start();

function toNumber($val) {
    if (is_numeric($val)) {
        $int = (int)$val;
        $float = (float)$val;

        $val = ($int == $float) ? $int : $float;
        return $val;
    } else {
        echo "Cannot cast ".$val." to a number";
        return null;
    }
}

function quicksort( $array ) {
    if( count( $array ) < 2 ) {
        return $array;
    }
    $left = $right = array( );
    reset( $array );
    $pivot_key  = key( $array );
    $pivot  = array_shift( $array );
    foreach( $array as $k => $v ) {
        if( $v < $pivot ) {
            $left[$k] = $v;
		}
        else {
            $right[$k] = $v;
		}
    }
    return array_merge(quicksort($left), array($pivot_key => $pivot), quicksort($right));
}

function sortArrays($values, $sums, $N, $A) {
	// print_r($sums);
	$i = 0;
	foreach ($sums as $index => $value) {		
		if ($value > $A) {
		// echo "<br/>";
		// echo print_r($values[$i]);
		$values[$i] = quicksort($values[$i]);	
		// echo print_r($values[$i]);
		// for ($j = 0; $j < $count($values[$i]); $j++) {
			//echo $values[$i][$j];
		}
	$i++;
	}
	return $values;
}

function printSortedArrays($values) {
	foreach ($values as $index => $array) {		
		foreach ($array as $index => $value) {		
			echo $value;
				$l = strlen($value);
				for ($counter = 0; $counter < 10 - $l; $counter++) {
					echo "&nbsp";
				}
		}
		echo "<br/>";
	}
}

$n = isset($_GET['n']) ? $_GET['n'] : 0;
$m = isset($_GET['m']) ? $_GET['m'] : 0;
$a = isset($_GET['a']) ? $_GET['a'] : 0;

if ($n != 0 and $m != 0) {	
	echo "n: ".$n."<br/>";
	echo "m: ".$m."<br/>";
	
	if (!is_numeric($a)) {
		echo "a is numeric"; 
		return;
	}
	$_SESSION['A'] = intval($a);
	
	if (!ctype_digit($n) or !ctype_digit($m)) {
		echo "n,m are ints and n,m > 1 and n,m < 10";
		return;
	}
	$numN = intval($n);
	$numM = intval($m);
	if ($numN > 0 and $numN <= 10 and $numM > 0 and $numM <= 10) { 
		echo "<form name='inputForm' method='GET' action=''>";
		for ($counter = 0; $counter < $numN * $numM; $counter++) {
			if ($counter % $numM == 0) {
				echo "</br>";
			}
			echo "<input type = 'text' value = '1' style = 'width: 50px;' name = 'arr[]'/>";
		}
		echo "<br/><input type='submit'/>";
		echo "</form>";
	}
	else {
		echo "n,m > 1 and n,m < 10";
	}
	$_SESSION["M"] = $numM;
	$_SESSION["N"] = $numN;
}
$arr = isset($_GET['arr']) ? $_GET['arr'] : null;
if ($arr != null) {	
	$sums = array();
	$vals = array();
	$values = array();
	$j = 0;
	$i = 0;
	$M = $_SESSION["M"]; 
	$N = $_SESSION["N"]; 
	$A = $_SESSION['A'];

	echo "Matix: <br/>";
	foreach ($arr as $index => $value) {		
		if (is_numeric($value)) {
			
			if ($i != 0 and $i % $M == 0) {
				echo "Line sum of positive: ".$sums[$j]."<br/>";
				
				$values[$j] = $vals;
				// print_r($values[$j]);
				$vals = array();

				$j++;
			}
			echo $value;
			$l = strlen($value);
			for ($counter = 0; $counter < 10 - $l; $counter++) {
				echo "&nbsp";
			}
			
			$val = toNumber($value);
			
			// if ($val != null) {
				
				array_push($vals, $val); 

				if ($val > 0) {
					$sums[$j] += $val;				
				}
			// }
		}
		$i++;
	}
	
	$values[$j] = $vals;
	// print_r($values[$j]);
	$vals = array();
	
	echo "Line sum of positive: ".$sums[$j];
	
	$values = sortArrays($values, $sums, $N, $A);
	
	echo "<br/>Matrix sorted:<br/>";
	printSortedArrays($values);
}
?> 
