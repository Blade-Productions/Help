<?php require_once "phpuploader/include_phpuploader.php" ?>
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>PHP Upload - Selecting multiple files for upload</title>
	<link href="demo.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="demo">
        <h2>Selecting multiple files for upload</h2>
        <p> Select multiple files in the file browser dialog then upload them at once (Allowed file types: <span style="color:red">jpg, gif, png, zip</span>).
		</ul>
		<?php
			$uploader=new PhpUploader();
			
			$uploader->MultipleFilesUpload=true;
			$uploader->InsertText="Upload Multiple File (Max 10M)";
			
			$uploader->MaxSizeKB=1024000;	
			$uploader->AllowedFileExtensions="jpeg,jpg,gif,png,zip";
			
			//Where'd the files go?
			//$uploader->SaveDirectory="/myfolder";
			
			$uploader->Render();
		?>	
		
	<script type='text/javascript'>
	function CuteWebUI_AjaxUploader_OnTaskComplete(task)
	{
		var div=document.createElement("DIV");
		div.innerHTML=task.FileName + " is uploaded!";
		document.body.appendChild(div);
	}
	</script>		
	</div>
</body>
</html>
