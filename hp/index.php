<?php require_once "./uploader/phpuploader/include_phpuploader.php" ?>
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pic2Cloud | Kostenloser Bilder-Upload</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>
<link rel="stylesheet" type="text/css" media="all" href="http://opensource.steffenhollstein.de/static/projects/modalbox/css/jquery.modalbox.css" />	
<script type="text/javascript" src="http://opensource.steffenhollstein.de/static/projects/modalbox/js/jquery.modalbox-latest-min.js"></script>	
</head>
<body>
<div id="top_menu">
                    <ul class="menu">
                        <li><a href="index.html" class="nav">Startseite</a></li>
                        <li><a href="#" class="nav">Upload</a></li>
                        <li><a href="#" class="nav">Login/Registrierung</a></li>
                        <li><a href="gallery.html" class="nav">Gallery</a></li>
                    </ul>
</div>
<div id="main_content">
	<div id="top_banner">
    <a href="index.html"><img src="images/logo.png" height="130" alt="home" title="Pic2Cloud" border="0" class="logo" /></a>
    </div>

    <div id="page_content_left">
    	<div class="title">
        Herzlich Willkommen auf Pic2Cloud.de!
        </div>
        <div class="content_text">
        	<?php
				$uploader=new PhpUploader();

				$uploader->MultipleFilesUpload=false;
				$uploader->InsertText="Bild hochladen (Maximal 5MB)";

				$uploader->MaxSizeKB=1024000 / 2;	
				$uploader->AllowedFileExtensions="jpeg,jpg,gif,png";

				$uploader->ProgressTextTemplate = "%F%.. %P% %SEND% / %SIZE% , %KBPS% , %T% Sekunden verbleiben.";
				$uploader->SaveDirectory="./tmpuploads";

				$uploader->Render();
			?>
        </div>
    </div>

	<script type='text/javascript'>
	function CuteWebUI_AjaxUploader_OnTaskComplete(task)
	{
		$.ajax({
		   type: "POST",
		   url: "move_file.php",
		   data: "name=" + task.FileName,
		   success: function(msg){
			_Uploaded(msg);
		     
		   }
		 });
	}
	
	function _Uploaded(msg) {
		jQuery.fn.modalBox({ 
			directCall : {
				data : "<img src='http://tabletpress.net/smiley.jpg' style='width: 75px; height: 75px;' /><h1 style='margin-left: -3px;'>Bild hochgeladen</h1><p style='color: black; '><font size='6'>Der Link zum Bild: <a target='_blank' href='." + msg + "'>Bild</a></font></p>",
				setWidthOfModalLayer : 800
		}});
		
	}
	</script>
    
    <div id="page_content_right">
    	<div class="title">
        Lezter Upload
        </div>
        <div class="content_text">
        </div>
        <div class="content_text">
        <a href="#"><img src="<?php echo file_get_contents("./last_file.txt"); ?>" width="100" height="100"  alt="pic" title="Lezter Upload" class="gallery" /></a>
        </div>
    </div>
    
    
    <div id="page_bottom">
<hr color="gray" height="0">
	<center><font size="1" color="gray">&copy; 2011 Pic2Cloud.de - Pic2Cloud ist von Projekt von <a style="text-decoration:none;" target="_blank" href="http://www.2cloud-network.de/">2Cloud-Network</a>.</font></center>
    </div>
		
</div>
<div id="footer">
<div id="footer_content">
<div id="copyrights">

</div>
<div id="madeby">
</div>
</div>

</div>
</body>
</html>