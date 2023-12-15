<?php
	if (!isset($_GET['alias']))
	{
		http_response_code(400);
		die("No URL requested!");
	}

	$alias = htmlspecialchars($_GET['alias']);

	if (!$urls = file_get_contents("urls.json"))
	{
		http_response_code(500);
		die("urls.json is empty or doesn't exist!");
	}

	if (!$urls = json_decode($urls, 1))
	{
		http_response_code(500);
		die("Syntax error in urls.json!");
	}

	if (!array_key_exists($alias, $urls))
	{
		http_response_code(404);
		die("/$alias not found!");
	}

	header("Location: " . $urls[$alias]);
?>
