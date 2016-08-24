<?php 
//Includes\\
include('settings.php');
?>
<?php 
if(isset($_GET['page']))
{
	$dir = $_GET['page'];
}
elseif(!isset($_GET['page']))
{
	$dir = "$base_dir";
}
else
{
	echo "error";
}
include('assets/lang/'.$lang.'.php');
?>
<html lang="<?php echo $lang; ?>">
<head>
  <meta charset="iso-8859-1">
  <title>C-File Browser</title>
  <meta name="description" content="C-File Browser">
  <link rel="stylesheet" href="assets/style.css">
  <script src="https://use.fontawesome.com/2db6bae040.js"></script>
</head>
<body>

<!-- Include Update sys -->
<?php include('assets/update.php');?>

<!-- REFRESH -->
<div class="back">
<p><a href="#!" onclick="history.go(-1);"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo $lang_back?></a></br>
<a href="index.php"><i class="fa fa-backward" aria-hidden="true"></i> <?php echo $lang_index ?></a></p>
</div>

<!-- REFRESH -->
<div class="refresh">
<p><a href="<?php echo $_SERVER['REQUEST_URI'] ?>"><i class="fa fa-refresh" aria-hidden="true"></i> <?php echo $lang_refresh ?></a></p>
</div>


<h1>C-File Browser</h1>
<?php 
if($dir == ".")
{
	echo "<h2>".$lang_view.$parent_folder.".</h2>";
}
else 
{
	echo "<h2>".$lang_view.$dir.".</h2>"; 
}
?>


<!-- Show folder and files -->
<div class="box">
 <?php
	$d = dir("$dir");
	while($entry = $d->read()) {
	$explode = explode(".", $entry);
	$nom_fichier = $explode['0'];
	@$extension = $explode['1'];
	if($nom_fichier != "" and !empty($extension))
	{
	//Si fichier : 
	?>
	<?php 
	if(isset($_GET['page']))
	{
		$actual_page = $_GET['page'];
		echo "<a href=\"$actual_page/$nom_fichier.$extension\">\n";
	}
	elseif(!isset($_GET['page']))
	{
		echo "<a href=\"$nom_fichier.$extension\">\n";
	}
	?>
		<div class="file">
			<p><i class="fa fa-file" aria-hidden="true"></i></br>
			<span class="title"><?php echo $nom_fichier.".".$extension ?></span></br>
			<span class="type"><?php echo $lang_file ?></span></p>
			</a>
			<div class="actions">
			<ul>
			<?php
			if(!isset($_GET['page']))
			{?>
			<li><p><a href="edit.php?delete&file=<?php echo $entry ?>"><i class="fa fa-trash" aria-hidden="true"></i> <?php echo $lang_remove ?></a></li>
			<li><p><a href="edit.php?rename&file=<?php echo $entry ?>"><i class="fa fa-pencil" aria-hidden="true"></i> <?php echo $lang_edit ?> </a></li>
			<?php
			}
			elseif(isset($_GET['page']))
			{
				?>
				<li><p><a href="edit.php?delete&file=<?php echo $_GET['page']."/".$entry ?>&page=<?php echo $_GET['page'] ?>"><i class="fa fa-trash" aria-hidden="true"></i> <?php echo $lang_remove ?></a></li>
				<li><p><a href="edit.php?rename&file=<?php echo $_GET['page']."/".$entry ?>&page=<?php echo $_GET['page'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i> <?php echo $lang_edit ?> </a></li>
				<?php 
			}
			?>
			</ul>
			</div>
		</div>
	<?php 
	}
	elseif($nom_fichier != "" and empty($extension)) 
	{
	//Si dossier
	?>
	
	<?php 
	if(isset($_GET['page']))
	{
		$actual_page = $_GET['page'];
		echo "<a href=\"?page=$actual_page/$nom_fichier\">\n";
	}
	elseif(!isset($_GET['page']))
	{
		echo "<a href=\"?page=$nom_fichier\">\n";
	}
		?>
		<div class="folder">
			<p><i class="fa fa-folder" aria-hidden="true"></i></br>
			<span class="title"><?php echo $nom_fichier?></span></br>
			<span class="type"><?php echo $folder?></span></p>
			<div class="actions-folder">
			<ul>
			<?php
			if(!isset($_GET['page']))
			{?>
			<li><p><a href="edit.php?delete&file=<?php echo $entry ?>"><i class="fa fa-trash" aria-hidden="true"></i> <?php echo $lang_remove ?></a></li>
			<li><p><a href="edit.php?rename&file=<?php echo $entry ?>"><i class="fa fa-pencil" aria-hidden="true"></i> <?php echo $lang_edit ?> </a></li>
			<?php
			}
			elseif(isset($_GET['page']))
			{
				?>
				<li><p><a href="edit.php?delete&file=<?php echo $_GET['page']."/".$entry ?>&page=<?php echo $_GET['page'] ?>"><i class="fa fa-trash" aria-hidden="true"></i> <?php echo $lang_remove ?></a></li>
				<li><p><a href="edit.php?rename&file=<?php echo $_GET['page']."/".$entry ?>&page=<?php echo $_GET['page'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i> <?php echo $lang_edit ?> </a></li>
				<?php 
			}
			?>
			</ul>
			</div>
		   	</a>
		</div>
	<?php
	}
	}
	$d->close();
?>

</div>
<!-- End show folder and files -->

<?php
if(isset($_GET['alert']) and isset($_GET['file']))
{	
if($_GET['alert'] == "delete")
{
?>
<div class="alert">
<p><i class="fa fa-check" aria-hidden="true"></i> <?php echo $lang_remove_true ?></p>
</div>
<?php
}
elseif($_GET['alert'] == "rename")
{
?>
<div class="alert">
<p><i class="fa fa-check" aria-hidden="true"></i> <?php echo $lang_rename_true ?></p>
</div>
<?php
}
}
?>
</body>
</html>