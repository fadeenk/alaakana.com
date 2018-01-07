<div id="temp_header">
        <div id="site_title">
        	<a href="" rel="nofollow">D<span>R.</span> A<span>LAA</span> K<span>ANA</span></a>
        </div>
<?php
		$currentPage = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
		$currentPage = 'href="'.$currentPage.'"';
		$final = str_replace($currentPage, $currentPage.' class="selected"',$currentPage); //add marked
		$menu = file_get_contents(__DIR__ .'/menu.inc'); //fetch menu
		echo (str_replace($currentPage,$final,$menu)); //update menu
		?>
