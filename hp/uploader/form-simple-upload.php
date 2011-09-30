<?php require_once "phpuploader/include_phpuploader.php" ?>
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>PHP Upload - Simple Upload with Progress</title>
	<link href="demo.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="demo">
        <h2>Simple Upload with Progress</h2>
        <p> A basic sample demonstrating the use of the Upload control (Allowed file types: <span style="color:red">jpg, gif, png, zip</span>).
		</ul>
		<?php
			$uploader=new PhpUploader();
			
			$uploader->MultipleFilesUpload=false;
			$uploader->InsertText="Upload File (Max 10M)";
			
			$uploader->MaxSizeKB=1024000;	
			$uploader->AllowedFileExtensions="jpeg,jpg,gif,png,zip";
			
			//Where'd the files go?
			//$uploader->SaveDirectory="/myfolder";
			
			$uploader->Render();
		?>	
		
	<script type='text/javascript'>
	function CuteWebUI_AjaxUploader_OnTaskComplete(task)
	{
		alert(task.FileName + " is uploaded!");
	}
	</script>		
	</div>
</body>
</html>
