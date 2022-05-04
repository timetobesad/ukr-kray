<?php

    if(isset($_POST['action']) && !empty($_POST['action']))
    {
        switch($_POST['action'])
        {
            case 'uploadTmp':
                resizeImg($_FILES['img'], 500, 700);
                break;
        }
    }

    function resizeImg($file, $width, $height)
    {
		$origSize = getimagesize($file['tmp_name']);

        $origW = $origSize[0];
		$origH = $origSize[1];
		
		if($origW < $origH)
			$coff =  $origW / $width;
		else
			$coff = $origH / $height;
		
		$img = imagecreatetruecolor($width, $height);
		
		$bgColor = imagecolorallocate($img, 255, 255, 255);
		
		$newW = $origW / $coff;
		$newH = $origH / $coff;
		
		$dsX = ($width - $newW) / 2;
		$dxY = ($height - $newH) / 2;
		
		$tmpImg = imagecreatefromjpeg($file['tmp_name']);
		
		imagecopyresized($img, $tmpImg,  $dsX, $dxY, 0, 0, $newW, $newH, $origW, $origH);
		
		imagepng($img, 'dest.png');
    }

?>