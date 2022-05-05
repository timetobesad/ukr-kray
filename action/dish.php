<?php

	include_once('../config.php');
	
	if(!isset($_SESSION['admin-access']) || !isset($_POST['action']))
	{
		header('Location: /');
		die();
	}
	
	include_once('../class/dish.class.php');
	
		include_once('../class/misc.class.php');

    if(isset($_POST['action']) && !empty($_POST['action']))
    {
        switch($_POST['action'])
        {
            case 'uploadTmp':
                resizeImg($_FILES['img'], 500, 700);
                break;
			case 'deleteTemp';
				deleteImg($path);
				break;
        }
    }

    function resizeImg($file, $width, $height)
    {
		$response = array('status' => 'error');
		
		$origSize = getimagesize($file['tmp_name']);

        $origW = $origSize[0];
		$origH = $origSize[1];
		
		if($origW < $width || $origH < $height)
		{
			$response['msg'] = 'Мінімальний розмір зображення має бути 500х700';
		}
		
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
			default:
				$response['msg'] = 'Даний формат не підтримується';
				die(json_encode($response));
			break;
		}
		
		imagecopyresized($img, $tmpImg,  $dsX, $dxY, 0, 0, $newW, $newH, $origW, $origH);
		
		$fileName = 'img/menu/'.Misc::genericTitle().'.png';
		
		imagepng($img, '../'.$fileName);
		
		$response['status'] = 'success';
		$response['path'] = $fileName;
		
		echo json_encode($response);
    }
	
	function deleteImg($path)
	{
		$response = array('status' => 'success');
		
		/*try
			unlink($path);
		catch(Exception $ex)
			$response = array('status' => 'error', 'msg' => $ex-getMessage();*/
			
		echo json_encode($response);
	}

?>