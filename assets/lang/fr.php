<?php
/*****************
* C-File Browser *
*     French     *
*****************/
/* All pages */
$yes = "Oui";
$no = "Non";
$cancel = "Annuler";
$lang_sumbit = "Envoyer";
/* Index page */
$lang_view = "Affichage du dossier ";
$parent_folder = "principal";
$none_file = "Il n'y as pas de fichier ici";
$folder = "Dossier";
$lang_file = "Fichier";
$lang_remove = "Supprimer";
$lang_edit = "Renomer";
$lang_refresh = "Actualiser";
$lang_back = "Retour";
$lang_index = "Retourner au début";

/* ALERT */
if(isset($_GET['alert']) and isset($_GET['file']))
{
	/* File or folder ? */
	$file_explode = explode(".", $_GET['file']);
	if(isset($file_explode['1']))
	{
		$lang_remove_true = "Le fichier ".@$_GET['file']." à bien été supprimé !";
		$lang_rename_true = "Le fichier ".@$_GET['file']." à bien été renomé en ".@$_GET['newname']." !";
	}
	elseif(!isset($file_explode['1']))
	{
		$lang_remove_true = "Le dossier ".@$_GET['file']." à bien été supprimé !";
		$lang_rename_true = "Le dossier ".@$_GET['file']." à bien été renomé en ".@$_GET['newname']." !";
	}
}


/* Delete page & rename page */
if(isset($_GET['file']) and !isset($_GET['alert']))
{
$delete_page = "Page de supression de fichier";
$rename_page = "Page de renomage de fichier ";
	/* File or folder ? */
	$file_explode = explode(".", $_GET['file']);
	if(isset($file_explode['1']))
	{
		$confirm_delete_text = "Êtes vous sur de vouloir supprimer le fichier ".$_GET['file'];
	}
	elseif(!isset($file_explode['1']))
	{
		$confirm_delete_text = "Êtes vous sur de vouloir supprimer le dossier ".$_GET['file'];
	}

	/* File or folder ? */
	$file_explode = explode(".", $_GET['file']);
	if(isset($file_explode['1']))
	{
		$rename_text = "En quoi voulez vous renomer le fichier ".$_GET['file']."?";
	}
	elseif(!isset($file_explode['1']))
	{
		$rename_text = "En quoi voulez vous renomer le dossier ".$_GET['file']."?";
	}
}

/* Update page */
$update_error = "Impossible de télécharger le fichier de mise à jours.";
$lang_update = "Une nouvelle version de C-File browser est disponbile ! Télécharchez la sur notre Github ! ";
?>