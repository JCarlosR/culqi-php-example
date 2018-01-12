<?php

$mensajeLog = "";

$mensajeLog .= print_r($_POST,true) . "\r\n";

if(strlen($mensajeLog)>0){
$filename = "pruebasConfirmacion.txt";
$fp = fopen($filename, "a");
if($fp) {
fwrite($fp, $mensajeLog, strlen($mensajeLog));
fclose($fp);
}
?>
<html>
<h1>this is the post</h1

<?php

echo $mensajeLog; 

?>

</html>
<?php
}



?>
