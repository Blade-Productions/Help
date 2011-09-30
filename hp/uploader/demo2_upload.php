<?php require_once "phpuploader/include_phpuploader.php" ?>
<?php
$uploader=new PhpUploader();

$mvcfile=$uploader->GetValidatingFile();

if($mvcfile->FileName=="accord.bmp")
{
	$uploader->WriteValidationError("My custom error : Invalid file name. ");
	exit(200);
}

//USER CODE:

$targetfilepath= "savefiles/myprefix_" . $mvcfile->FileName;
if( is_file ($targetfilepath) )
	unlink($targetfilepath);
$mvcfile->MoveTo( $targetfilepath );

$uploader->WriteValidationOK();

?>