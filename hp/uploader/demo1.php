<?php require_once "phpuploader/include_phpuploader.php" ?>
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Demo 1 - use SaveDirectory property</title>
</head>
<body>
	<div>
	
<hr/>
	
	<?php
		$uploader=new PhpUploader();
		
		$uploader->MultipleFilesUpload=true;
		$uploader->InsertText="Select multiple files (Max 1000M)";
		
		$uploader->MaxSizeKB=1024000;
		$uploader->AllowedFileExtensions="*.jpg,*.png,*.gif,*.bmp,*.txt,*.zip,*.rar";
		
		$uploader->SaveDirectory="savefiles";
		
		$uploader->FlashUploadMode="Partial";
		
		$uploader->Render();
		
	?>
	
	</div>
		
	<script type='text/javascript'>
	function CuteWebUI_AjaxUploader_OnTaskComplete(task)
	{
		var div=document.createElement("DIV");
		var link=document.createElement("A");
		link.setAttribute("href","savefiles/"+task.FileName);
		link.innerHTML="You have uploaded file : savefiles/"+task.FileName;
		link.target="_blank";
		div.appendChild(link);
		document.body.appendChild(div);
	}
	</script>
	
</body>
</html>