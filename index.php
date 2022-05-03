<?php
	header ('content-type: image/svg+xml'); 
	header('cache-control: max-age=0, no-cache, no-store, must-revalidate');
	date_default_timezone_set("UTC");
	$filename="counter";
	$myfile = fopen($filename, "a+");
	$data=0;
	if(filesize($filename)) $data=intval(fread($myfile, filesize($filename)));
	ftruncate($myfile, 0);
	rewind($myfile);
	if(preg_match("/github-camo/i", $_SERVER['HTTP_USER_AGENT']))$data=strval($data+1);
	else $data=strval($data);
	fwrite($myfile, $data);
	fclose($myfile);
?>
<svg xmlns="http://www.w3.org/2000/svg" width="<?php echo (strlen(str_replace(" ", "",$data))*8)+89;?>" height="20">
	<rect width="81" height="20" fill="#555"/>
	<rect x="81" width="<?php echo (strlen(str_replace(" ", "",$data))*8)+6;?>" height="20" fill="#97ca00"/>
	<text x="41.5" y="14" fill="#fff" text-anchor="middle" font-size="11" font-family="DejaVu Sans">Profile views</text>
	<text x="<?php echo (strlen(str_replace(" ", "",$data))*4)+84;?>" y="14" fill="#fff" text-anchor="middle" font-size="11" font-family="DejaVu Sans"><?php echo number_format($data, 0, "", " ");?></text>
</svg>
