<form name="formNM" method="GET" action="<?=$_SERVER['PHP_SELF']?>">
s:<input type="text" value="absabcababacosactabn" name="s">
<input type="submit">
</form>

<?php

$s = isset($_GET['s']) ? $_GET['s'] : null;
echo "s = ".$s."</br>";
$s1 = str_ireplace("ab", "bb", $s);
echo "s1 = ".$s1;
if (strcmp($s, $s1) === 0) {
    echo "</br>".$s." равнa ".$s1." - заменять нечего";
}

?>