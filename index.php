<?php
	if (!isset($_GET['alias']))
	{
		die("Welcome to the URL shortener!");
	}
	
	$alias = htmlspecialchars($_GET['alias']);
		
	if (!$urls = file_get_contents("urls.json"))
	{
		die("Couldn't read urls.json!");
	}
	
	$urls = json_decode($urls, true);
	
	if (array_key_exists($alias, $urls))
	{
		header("Location: " . $urls[$alias]);
	}
	
	echo "URL /$alias not found!";
?>