<?php 
	
	//file system
	$file = 'quotes.txt';

	//opening a file for reading
	$handle = fopen($file, 'a+'); // https://www.w3schools.com/php/func_filesystem_fopen.asp

	//read the file
	//echo fread($handle, filesize($file));
	//echo fread($handle, 112);

	//read a single line
	//echo fgets($handle);
	//echo fgets($handle);
	
	//read a single character
	//echo fgetc($handle);
	//echo fgetc($handle);

	//write to a file
	//fwrite($handle, "\nEverything popular is wrong");

	fclose($handle);

	unlink('test.txt');

 ?>