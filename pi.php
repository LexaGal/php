<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<?php
	setlocale(LC_ALL, "ru_Ru.UTF-8");
	header("Content-Type: text/html; charset=UTF-8");
	$url = "http://data.mf.grsu.by/fox/forum.grodno.net.htm";
	// $url = iconv("UTF-8", "windows-1251", $url);
	
	$text = file_get_contents($url);
	
	// $text = "9 8 0 8 222 фывапро  dd  ffgh длполд длпо";
	$patt = "!action=viewprofile;username=[а-яА-Я]+\"[\s]*rel=\"nofollow\">[\s]*([а-яА-Я]+)[\s]*<\/a>!u"; 
    // $patt = "!([а-яА-Я]+)!u";  
	// $patt = "!([0-9]+)!";
	// preg_match_all("/<[Aa][\s]{1}[^>]*[Hh][Rr][Ee][Ff][^=]*=[ '\"\s]*([^ \"'>\s#]+)[^>]*>/", $text, $matches);
    
	preg_match_all($patt, $text, $matches);
	
	// echo "сми";
	$urls = $matches[1];
    for ($i = 0; $i < count($urls); $i++)
    echo $urls[$i]."<br/>";
?>