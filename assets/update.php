<?php 
/*****************
* C-File Browser *
*    Updater     *
*****************/

$update_url = "https://raw.githubusercontent.com/outout14/c-file-browser/update/last_version.php";

if (!copy($update_url, "assets/last_version.php")) 
{
?>
	<div class="update">
    <p><?php echo $update_error;?></p>
	</div>
<?php
}
else
{
	//copy($update_url, "assets/last_version.php");
	include("assets/last_version.php");
	
	if($last > $version)
	{
		?>
		<div class="update">
		<p><a href=\"https://github.com/outout14/c-file-browser\"><i class="fa fa-newspaper-o" aria-hidden="true"></i> - <?php echo $lang_update ?></a></p>
		</div>
		<?php 
	}
}
