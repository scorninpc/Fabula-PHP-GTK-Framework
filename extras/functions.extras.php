<?php

	// -----------------------------------------------------------------------------------------------------------------
	// Deleta um diretório recursivamente
	// @since rev 1
	function rrmdir($dir) 
	{
		// Verifica se é um diretório
		// @since rev 1
		if(is_dir($dir)) 
		{
			// Percorre os arquivos do diretório
			// @since rev 1
			$objects = scandir($dir);
			foreach($objects as $object) 
			{
				// Pula os controles
				// @since rev 1
				if($object != "." && $object != "..") 
				{
					// Verifica se é um diretório para recursar
					// @since rev 1
					if(filetype($dir . "/" . $object) == "dir") 
					{
						rrmdir($dir."/".$object); 
					}
					else
					{ 
						unlink($dir."/".$object);
					}
				}
			}
			
			// Limpa os objetos
			// @since rev 1
			reset($objects);
			rmdir($dir);
		}
	} 

	// -----------------------------------------------------------------------------------------------------------------
	// Cria Thumbs com GD
	// @since rev 1
	function makeThumb($path, $size, $mime=FALSE) 
	{
		// Verifica se é uma imagem
		// @since rev 1
		if($mime === FALSE)
		{
			$mime = mime_content_type($path);
		}
		
		if(strpos($mime, "jpeg") !== FALSE)
		{
			$buffer = imagecreatefromjpeg($path);
		}
		elseif(strpos($mime, "bmp") !== FALSE)
		{
			$buffer = imagecreatefrombmp($path);
		}
		elseif(strpos($mime, "gif") !== FALSE)
		{
			$buffer = imagecreatefromgif($path);
		}
		elseif(strpos($mime, "png") !== FALSE)
		{
			$buffer = imagecreatefrompng($path);
		}
		else
		{
			return FALSE;
		}
		
		if($buffer === FALSE) 
		{
			return FALSE;
		}
		
	
		// Busca o tamanho da imagem
		// @since rev 1
		$x = $origem_x = ImagesX($buffer);
		$y = $origem_y = ImagesY($buffer);
		
		// Verifica qual deve ser a proporção
		// @since rev 1
		if($x >= $y)
		{
			if($x > $size)
			{
				$x1 = (int)($x * ($size / $x));
				$y1 = (int)($y * ($size / $x));
			}
			else
			{
				$x1 = $x;
				$y1 = $y;
			}
		}
		else
		{
			if($y > $size)
			{
				$x1 = (int)($x * ($size / $y));
				$y1 = (int)($y * ($size / $y));
			}
			else
			{
				$x1 = $x;
				$y1 = $y;
			}
		}
		
		// Muda o tamanho da imagem
		// @since rev 1
		$image = ImageCreateTrueColor($x1, $y1);
		if($image === FALSE)
		{
			return FALSE;
		}
		ImageCopyResampled($image, $buffer, 0, 0, 0, 0, $x1 + 1, $y1 + 1, $origem_x, $origem_y);

		// Libera recursos
		// @since rev 1
		ImageDestroy($buffer);
		
		// Retorna o resource
		// @since rev 1
		return $image;
	} 
