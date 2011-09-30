<?php

$Name = $_POST['name'];
$New = "/uploads/" . substr(md5($Name), 0, 8) . "-" . substr(uniqid(), -4, 4) . "." . substr($Name, -3, 3);

file_put_contents("./last_file.txt", $New);

rename("./tmpuploads/$Name", ".$New");

echo $New;

?>