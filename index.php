<?php
include_once ("funcao/Redimensiona.php");

if (isset($_POST['acao']) && $_POST['acao']=="cadastrar"){
	
	$foto = $_FILES['foto'];	
	$redim = new Redimensiona();
	$src=$redim->Redimensionar($foto, 150, "images");
	
}

?>
<html>
<head>
<title>Teste</title>
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
	<label>Foto <input type="file" name="foto" /></label>    
    <input type="submit" value="Enviar" />
    <input type="hidden" name="acao" value="cadastrar" />
</form>
<?php
if (isset($_POST['acao']) && $_POST['acao']=="cadastrar"){
	echo "<img src=\"$src\">";
}
?>
</body>
</html>