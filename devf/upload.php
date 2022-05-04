<?php

	include_once('../class/misc.class.php');

    if(isset($_POST['action']) && !empty($_POST['action']))
    {
        switch($_POST['action'])
        {
            case 'uploadTmp':
                resizeImg($_FILES['img'], 500, 700);
                break;
			case 'deleteTemp';
        }
    }

    function resizeImg($file, $width, $height)
    {
		$response = array('status' => 'error');
		
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
		
		switch($file['type'])
		{
			case 'image/png':
				$tmpImg = imagecreatefrompng($file['tmp_name']);
			break;
			case 'image/jpeg':
				$tmpImg = imagecreatefromjpeg($file['tmp_name']);
			break;
			case 'image/bmp':
				$tmpImg = imagecreatefromwbmp($file['tmp_name']);
			break;
		}
		
		$tmpImg = imagecreatefromjpeg($file['tmp_name']);
		
		imagecopyresized($img, $tmpImg,  $dsX, $dxY, 0, 0, $newW, $newH, $origW, $origH);
		
		$fileName = 'img/menu/'.Misc::genericTitle().'.png';
		
		imagepng($img, '../'.$fileName);
		
		$response['status'] = 'success';
		$response['path'] = $fileName;
		
		echo json_encode($response);
    }

?>