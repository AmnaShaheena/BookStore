<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search Books</title>
</head>
<body>
<?php
//get the db connection file
require_once 'conf/dbconf.php';
require_once 'myfunc/func.php';

if (isset($_GET['book_id']) && $_GET['book_id'] != '') {
	GetDetails($_GET['book_id'],$connect);
}

?>

	

</body>
</html>
