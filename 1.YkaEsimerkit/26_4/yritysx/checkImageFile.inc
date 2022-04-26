<?php
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["tiedosto"]["tmp_name"]);
		if($check !== false) {
			$viesti= "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			$viesti= "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($talletuspolku.$tiedosto)) {
		$viesti.= "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["tiedosto"]["size"] > 500000) {
		$viesti.= "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($tiedostotyyppi != "jpg" && $tiedostotyyppi != "png" && $tiedostotyyppi != "jpeg" && $tiedostotyyppi != "gif" ) {
		$viesti.= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
?>