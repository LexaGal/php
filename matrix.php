<form name="formNM" method="GET" action="<?=$_SERVER['PHP_SELF']?>">
n:<input type="text" name="n">
m:<input type="text" name="m">
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

$n = isset($_GET['n']) ? $_GET['n'] : 0;
$m = isset($_GET['m']) ? $_GET['m'] : 0;

if ($n != 0 and $m != 0) {	
	echo "n: ".$n."<br/>";
	echo "m: ".$m."<br/>";
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
			echo "<input type = 'text' style = 'width: 50px;' name = 'arr[]'/>";
		}
		echo "<br/><input type='submit'/>";
		echo "</form>";
	}
	else {
		echo "n,m > 1 and n,m < 10";
	}
	$_SESSION["M"] = $numM;
}
$arr = isset($_GET['arr']) ? $_GET['arr'] : null;
if ($arr != null) {	
	$i = 0;
	$M = $_SESSION["M"]; 
	
	echo "Array: ";
	foreach ($arr as $index => $value) {		
		if (is_numeric($value)) {
						
			if ($i % $M == 0) {
				echo "<br/>";
			}
			
			echo $value;
			$l = strlen($value);
			for ($counter = 0; $counter < 10 - $l; $counter++) {
				echo "&nbsp";
			}
			
			$val = toNumber($value);
			
			if ($val != null and $val > 0) {
				$s = $s + $val;				
			}
		}
		$i++;
	}
	echo "<br/>Sum: ".$s;
}
?> 
