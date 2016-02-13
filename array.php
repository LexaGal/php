<form name="formN" method="GET" action="<?=$_SERVER['PHP_SELF']?>">
n:<input type="text" name="n">
<input type="submit">
</form>

<?php
echo "фыва";
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
if ($n != 0) {	
echo "n: ".$n."<br/>";
	if (!ctype_digit($n)) {
		echo "n is int and n > 1 and n < 30";
		return;
	}
	$num = intval($n);
	if ($num > 0 and $num <= 30) { 
		echo "<form name='inputForm' method='GET' action=''>";
		for ($counter = 0; $counter < $num; $counter++) {
			if ($counter % 5 == 0) {
				echo "</br>";
			}
			echo "<input type = 'text' style = 'width: 50px;' name = 'arr[]'/>";
		}
		echo "<br/><input type='submit'/>";
		echo "</form>";
	}
	else {
		echo "n > 1 and n < 30";
	}
}
$arr = isset($_GET['arr']) ? $_GET['arr'] : null;
if ($arr != null) {	
echo "Array: ";
	foreach ($arr as $index => $value) {		
		if (is_numeric($value)) {
			echo $value." ";
			$val = toNumber($value);
			
			if ($val != null and $val > 0) {
				$s = $s + $val;				
			}
		}
	}
	echo "<br/>Sum: ".$s;
}
?> 
