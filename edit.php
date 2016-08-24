<?php 
//Includes\\
include('settings.php');
include('assets/lang/'.$lang.'.php');

/*****************
* C-File Browser *
* Delete system  *
*****************/
if(!isset($_GET['file']))
{
	header('Location: index.php');
}

$file = $_GET['file'];

/* DELETE SYS */
if (isset ($_GET['delete']))
{
if (isset ($_GET['confirm']))
{
	if (file_exists($file))
	{
		if (is_dir($file))
		{
			rmdir($file);
		}
		else
		{
		unlink($file);
		}
		if(isset($_GET['page']))
		{
		header('Location: index.php?page='.$_GET['page'].'&alert=delete&file='.$file);
		}
		else 
		{
			header('Location: index.php?alert=delete&file='.$file);
		}
	}
	else
	{
	echo "Error 404 !";
	}
}
?>
<!doctype html>
<html lang="<?php echo $lang; ?>">
<head>
  <meta charset="iso-8859-1">
  <title>C-File Browser - <?php echo $delete_page ?></title>
  <meta name="description" content="C-File Browser">
  <link rel="stylesheet" href="assets/style.css">
  <script src="https://use.fontawesome.com/2db6bae040.js"></script>
</head>
<body>

<h1>C-File Browser</h1>

<div class="message">
<div class="message-content">
<p><?php echo $confirm_delete_text ?></p>
<p><a href="edit.php?delete&file=<?php echo $_GET['file']?>&confirm" class="yes"><?php echo $yes ?></a> <!-- < Yes | No > --> <a href="index.php" class="no"><?php echo $no ?></a>
</div>
</div>
</body>
</html>
<?php 
}
elseif(isset($_GET['rename']) and !isset($_POST['newname']))
{
	?>
<!doctype html>
<html lang="<?php echo $lang; ?>">
<head>
  <meta charset="iso-8859-1">
  <title>C-File Browser - <?php echo $rename_page ?></title>
  <meta name="description" content="C-File Browser">
  <link rel="stylesheet" href="assets/style.css">
  <script src="https://use.fontawesome.com/2db6bae040.js"></script>
</head>
<body>

<h1>C-File Browser</h1>

<div class="message">
<div class="message-content">
<p><?php echo $rename_text  ?></p>

<?php if (!isset($_GET['page']))
{
?>
<form name="formulaire" action="edit.php?rename&confirm&file=<?php echo $_GET['file'] ?>" method="post">
<?php 
}
elseif(isset($_GET['page']))
{
?>
<form name="formulaire" action="edit.php?rename&confirm&file=<?php echo $_GET['file'] ?>&page=<?php echo $_GET['page'] ?>" method="post">
<?php 
}
?>
<input type="text" name="newname" class="input-a">
<p><a href="#" onClick=formulaire.submit() class="yes"><?php echo $lang_sumbit ?></a> <!-- < Yes | No > --> <a href="index.php" class="no"><?php echo $cancel ?></a>
</form>

</div>
</div>
</body>
</html>
<?php
}
elseif(isset($_GET['rename']) and isset($_POST['newname']))
{
	{
	/* File or folder ? */
	$file_explode = explode(".", $_GET['file']);
	if(isset($file_explode['1']))
	{
		/* FILE */
		if(isset($_GET['page']))
		{
		$newname = $_GET['page']."/".$_POST['newname'];
		rename($_GET['file'], $newname.".".$file_explode['1']);
		header('Location: index.php?page='.$_GET['page'].'&alert=rename&file='.$file.'&newname='.$_POST['newname']);
		}
		else
		{
		rename($_GET['file'],$_POST['newname'].".".$file_explode['1']);
		header('Location: index.php?alert=rename&file='.$file.'&newname='.$_POST['newname']);		
		}
	}
	elseif(!isset($file_explode['1']))
	{
		/* FOLDER */
		if(isset($_GET['page']))
		{
		$newname = $_GET['page']."/".$_POST['newname'];
		rename($_GET['file'], $newname);
		header('Location: index.php?page='.$_GET['page'].'&alert=rename&file='.$file.'&newname='.$_POST['newname']);
		}
		elseif(!isset($_GET['page'])) 
		{
		rename($_GET['file'],$_POST['newname']);
		header('Location: index.php?alert=rename&file='.$file.'&newname='.$_POST['newname']);			
		}
	}
}
}
?>