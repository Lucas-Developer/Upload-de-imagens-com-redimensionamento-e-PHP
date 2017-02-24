Upload de imagens com redimensionamento e PHP


O código é bem simples e pode fazer o redimensionamento de imagens no formato gif, jpeg e png.

Os nomes das fotos são gerados utilizando o uniqid e ainda são criptografados com o md5, assim criando o nome da imagem de forma que nunca se repita e fique criptografada.

Abaixo tem a classe que faz o upload da imagem e redimensiona a mesma. Para a utilização basta instanciar a classe e chamar o método Redimensionar onde vão ser enviados os dados da imagem, a largura que se deseja que a imagem tenha e a pasta onde será salva a imagem.

**********

<?php
class Redimensiona{
	
	public function Redimensionar($imagem, $largura, $pasta){
		
		$name = md5(uniqid(rand(),true));
		
		if ($imagem['type']=="image/jpeg"){
			$img = imagecreatefromjpeg($imagem['tmp_name']);
		}else if ($imagem['type']=="image/gif"){
			$img = imagecreatefromgif($imagem['tmp_name']);
		}else if ($imagem['type']=="image/png"){
			$img = imagecreatefrompng($imagem['tmp_name']);
		}
		$x   = imagesx($img);
		$y   = imagesy($img);
		$autura = ($largura * $y)/$x;
		
		$nova = imagecreatetruecolor($largura, $autura);
		imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $autura, $x, $y);
		
		if ($imagem['type']=="image/jpeg"){
			$local="$pasta/$name".".jpg";
			imagejpeg($nova, $local);
		}else if ($imagem['type']=="image/gif"){
			$local="$pasta/$name".".gif";
			imagejpeg($nova, $local);
		}else if ($imagem['type']=="image/png"){
			$local="$pasta/$name".".png";
			imagejpeg($nova, $local);
		}		
		
		imagedestroy($img);
		imagedestroy($nova);	
		
		return $local;
	}
}
?>

**********
