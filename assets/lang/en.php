<?php
/*****************
* C-File Browser *
*    English     *
*****************/
/* All pages */
$yes = "Yes";
$no = "No";
$cancel = "Cancel";
$lang_sumbit = "Sumbit";
/* Index page */
$lang_view = "Folder view ";
$parent_folder = "main";
$none_file = "There're no files here";
$folder = "Folder";
$lang_file = "File";
$lang_remove = "Delete";
$lang_edit = "Rename";
$lang_refresh = "Actualize";
$lang_back = "Back";
$lang_index = "Back to index folder";

/* ALERT */
if(isset($_GET['alert']) and isset($_GET['file']))
{
	/* File or folder ? */
	$file_explode = explode(".", $_GET['file']);
	if(isset($file_explode['1']))
	{
		$lang_remove_true = "The file ".@$_GET['file']." been deleted !";
		$lang_rename_true = "The file ".@$_GET['file']." been renamed in ".@$_GET['newname']." !";
	}
	elseif(!isset($file_explode['1']))
	{
		$lang_remove_true = "The folder ".@$_GET['file']." been deleted !";
		$lang_rename_true = "The folder ".@$_GET['file']." been renamed in ".@$_GET['newname']." !";
	}
}


/* Delete page & rename page */
if(isset($_GET['file']) and !isset($_GET['alert']))
{
$delete_page = "File deletion page ";
$rename_page = "File renaming page ";
	/* File or folder ? */
	$file_explode = explode(".", $_GET['file']);
	if(isset($file_explode['1']))
	{
		$confirm_delete_text = "Are you sure you want to delete the file ".$_GET['file'];
	}
	elseif(!isset($file_explode['1']))
	{
		$confirm_delete_text = "Are you sure you want to delete the folder ".$_GET['file'];
	}

	/* File or folder ? */
	$file_explode = explode(".", $_GET['file']);
	if(isset($file_explode['1']))
	{
		$rename_text = "What you want to rename the file ".$_GET['file']."?";
	}
	elseif(!isset($file_explode['1']))
	{
		$rename_text = "What you want to rename the file ".$_GET['file']."?";
	}
}

/* Update page */
$update_error = "Unable to download the update file.";
$lang_update = "A new version of C-File browser is available! Download our Github !";
?>