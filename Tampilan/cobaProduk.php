<?php 

$arr = [1,2,3,4];

if (isset($_POST['submit'])) {
	echo  $_POST['submit'];
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<?php foreach($arr as $a){ ?>
	<form method="POST" action="">
		<button type="submit" name="submit" value="<?php echo $a; ?>"><?php echo $a; ?></button>
	</form>
<?php } ?>

</body>
</html>