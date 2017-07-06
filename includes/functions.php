
<?php
// error_reporting(0);
// ------Replacement Function --------------//
function replace($type, $val) {
	if (strtoupper ( $type ) == "USERNAME" or strtoupper ( $type ) == "TABLE") {
		// ---underscore and alphanumeric check, used in username, table names ---------
		return preg_replace ( '/[^\w-]/', '', $val );
	} else if (strtoupper ( $type ) == "ALBHABETS") {
		// ---underscore and alphanumeric check, used in username, table names ---------
		return preg_replace ( '/[^a-zA-Z]/', "", $val );
	} else if (strtoupper ( $type ) == "SPACEBETS") {
		// ---underscore and alphanumeric check, used in username, table names ---------
		return preg_replace ( '/[^a-zA-Z0-9 ]/', "", $val );
	} else if (strtoupper ( $type ) == "NUMBERS") {
		// ---underscore and alphanumeric check, used in username, table names ---------
		return preg_replace ( '/[^0-9]/', "", $val );
	} else if (strtoupper ( $type ) == "PARA") {
		// ---underscore and alphanumeric check, used in username, table names ---------
		return preg_replace ( '/[^A-Za-z0-9, @%.\-]/', "", $val );
	} else if (strtoupper ( $type ) == "SEARCH") {
		// ---underscore and alphanumeric check, used in username, table names ---------
		return str_replace ( ' ', '-', preg_replace ( '/[^A-Za-z0-9\ +_\-]/', "", $val ) );
	} else if (strtoupper ( $type ) == "URL") {
		// ---underscore and alphanumeric check, used in username, table names ---------
		return str_replace ( " ", "-", preg_replace ( '/\s\s+/', ' ', preg_replace ( '/[^a-zA-Z0-9 ]-/', "", $val ) ) );
	} else {
		return 'Invalid Filter';
	}
}
function redirect($url) {
	echo '<script>window.location="' . $url . '";</script>';
	// header ( "HTTP/1.1 301 Moved Permanently" );
	// header ( "Location: " . $url );
	exit ();
}
function reload_page() {
	echo '<script>location.reload();</script>';
	// header ( "HTTP/1.1 301 Moved Permanently" );
	// header ( "Location: " . $url );
	exit ();
}
// email verification
function email_check($email) {
	return ( bool ) filter_var ( $email, FILTER_VALIDATE_EMAIL );
}
// replace first value
function str_replace_first($from, $to, $subject) {
	$from = '/' . preg_quote ( $from, '/' ) . '/';
	
	return preg_replace ( $from, $to, $subject, 1 );
}
// --------------base64 to img-----------
function base64_to_jpeg($img_string, $file_location) {
	$ifp = fopen ( $file_location, "wb" );
	
	$data = explode ( ',', $base64_string );
	
	fwrite ( $ifp, base64_decode ( $data [1] ) );
	fclose ( $ifp );
	
	return $output_file;
}

// -----------Image Compressor-------------------------------
function img_compress($file, $max_width = null, $max_height = null, $percent = null, $quality = 75, $save = null, $file_location = null) {
	$source_pic = $file;
	
	if (($max_width == null) || ($max_width == "")) {
		$max_width = 200;
	}
	if (($max_height == null) || ($max_height == "")) {
		$max_height = 200;
	}
	
	list ( $width, $height, $image_type ) = getimagesize ( $file );
	
	switch ($image_type) {
		case 1 :
			$src = imagecreatefromgif ( $file );
			break;
		case 2 :
			$src = imagecreatefromjpeg ( $file );
			break;
		case 3 :
			$src = imagecreatefrompng ( $file );
			break;
		default :
			return '';
			break;
	}
	
	$x_ratio = $max_width / $width;
	$y_ratio = $max_height / $height;
	
	if (($width <= $max_width) && ($height <= $max_height)) {
		$tn_width = $width;
		$tn_height = $height;
	} elseif (($x_ratio * $height) < $max_height) {
		$tn_height = ceil ( $x_ratio * $height );
		$tn_width = $max_width;
	} else {
		$tn_width = ceil ( $y_ratio * $width );
		$tn_height = $max_height;
	}
	
	$tmp = imagecreatetruecolor ( $tn_width, $tn_height );
	
	/* Check if this image is PNG or GIF, then set if Transparent */
	if (($image_type == 1) or ($image_type == 3)) {
		imagealphablending ( $tmp, false );
		imagesavealpha ( $tmp, true );
		$transparent = imagecolorallocatealpha ( $tmp, 255, 255, 255, 127 );
		imagefilledrectangle ( $tmp, 0, 0, $tn_width, $tn_height, $transparent );
	}
	imagecopyresampled ( $tmp, $src, 0, 0, 0, 0, $tn_width, $tn_height, $width, $height );
	
	/*
	 * imageXXX() only has two options, save as a file, or send to the browser.
	 * It does not provide you the oppurtunity to manipulate the final GIF/JPG/PNG file stream
	 * So I start the output buffering, use imageXXX() to output the data stream to the browser,
	 * get the contents of the stream, and use clean to silently discard the buffered contents.
	 */
	
	ob_start ();
	
	switch ($image_type) {
		case 1 :
			imagegif ( $tmp );
			break;
		case 2 :
			imagejpeg ( $tmp, NULL, $quality );
			break; // best quality
		case 3 :
			imagepng ( $tmp, NULL, $quality );
			break; // no compression
		default :
			echo '';
			break;
	}
	
	$final_image = ob_get_contents ();
	
	ob_end_clean ();
	// header('Content-Type: image/jpeg');
	return $final_image;
}
// replace special characters
function replace_spl_char($val) {
	if (is_string ( $val )) {
		return preg_replace ( '/[\x00-\x1F\x80-\xFF]/', '', $val );
	} else if (is_array ( $val )) {
		foreach ( $val as $key => $value ) {
			$arr [$key] = preg_replace ( '/[\x00-\x1F\x80-\xFF]/', '', $value );
		}
		return $arr;
	}
}
function fullescape($in) {
	$out = '';
	for($i = 0; $i < strlen ( $in ); $i ++) {
		$hex = dechex ( ord ( $in [$i] ) );
		if ($hex == '')
			$out = $out . urlencode ( $in [$i] );
		else
			$out = $out . '%' . ((strlen ( $hex ) == 1) ? ('0' . strtoupper ( $hex )) : (strtoupper ( $hex )));
	}
	$out = str_replace ( '+', '%20', $out );
	$out = str_replace ( '_', '%5F', $out );
	$out = str_replace ( '.', '%2E', $out );
	$out = str_replace ( '-', '%2D', $out );
	return $out;
}

// -- XSS Safe Function------------------///
function xssafe($data, $encoding = 'UTF-8') {
	$data = stripcslashes ( replace_spl_char ( $data ) );
	return htmlspecialchars ( $data, ENT_QUOTES | ENT_HTML401, $encoding );
}
// -------------------URL Senitize----------------------
function esc_url($url) {
	if ('' == $url) {
		return $url;
	}
	
	$url = preg_replace ( '|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url );
	
	$strip = array (
			'%0d',
			'%0a',
			'%0D',
			'%0A' 
	);
	$url = ( string ) $url;
	
	$count = 1;
	while ( $count ) {
		$url = str_replace ( $strip, '', $url, $count );
	}
	
	$url = str_replace ( ';//', '://', $url );
	
	$url = htmlentities ( $url );
	
	$url = str_replace ( '&amp;', '&#038;', $url );
	$url = str_replace ( "'", '&#039;', $url );
	
	if ($url [0] !== '/') {
		// We're only interested in relative links from $_SERVER['PHP_SELF']
		return '';
	} else {
		return $url;
	}
}
// ------------------ROOTPATH------------//
define ( 'ROOTPATH', $_SERVER ['DOCUMENT_ROOT'] );

// --------------------- password hashing and verification-------------------------------
function isPartUppercase($password) {
	return ( bool ) preg_match ( '/[A-Z]/', $password );
}
function isPartLower($password) {
	return ( bool ) preg_match ( '/[a-z]/', $password );
}
function isNumber($password) {
	return ( bool ) preg_match ( '/[0-9]/', $password );
}
function haslength($password, $Uplen = 32, $Lolen = 6) {
	if (strlen ( $password ) > $Uplen || strlen ( $password ) < $Lolen) {
		return false;
	} else {
		return true;
	}
}
/*
 * function password_varifying($password, $hash) {
 * if (password_verify ( $password, $hash )) {
 * return true;
 * } else {
 * return false;
 * }
 * }
 * function password_hashing($password) {
 * $password = replace_spl_char ( $password );
 * // echo $password;
 * if (isPartUppercase ( $password )) {
 * if (isPartLower ( $password )) {
 * if (isNumber ( $password )) {
 * if (haslength ( $password )) {
 * $options = array('cost' => 10 );
 * $pass_hash = password_hash ( $password, PASSWORD_BCRYPT, $options );
 *
 * return $pass_hash;
 * } else {
 * return $error = 'Password Length not valid';
 * }
 * } else {
 * return $error = 'Password does not contain numbers';
 * }
 * } else {
 * return $error = 'LowerCase not Exists';
 * }
 * } else {
 * return $error = 'UpperCase not Exists';
 * }
 * }
 */
function password_hashing($password) {
	$password = replace_spl_char ( $password );
	// echo $password;
	
	if (haslength ( $password )) {
		for($i = 0; $i < 8; $i ++) {
			$key = hash ( 'sha512', $password );
		}
		$pass_hash = $key;
		
		return $pass_hash;
	} else {
		echo 'Password Length not valid';
		return false;
	}
}
function password_varifying($password, $hash) {
	for($i = 0; $i < 8; $i ++) {
		$key = hash ( 'sha512', $password );
	}
	$pass_hash = $key;
	// echo $pass_hash;
	if ($key === $hash) {
		return true;
	} else {
		return false;
	}
}
// -----------------utf8_to_extended_ascii------------------
function utf8_to_extended_ascii($str, &$map) {
	// find all multibyte characters (cf. utf-8 encoding specs)
	$matches = array ();
	if (! preg_match_all ( '/[\xC0-\xF7][\x80-\xBF]+/', $str, $matches ))
		return $str; // plain ascii string
			             
	// update the encoding map with the characters not already met
	foreach ( $matches [0] as $mbc )
		if (! isset ( $map [$mbc] ))
			$map [$mbc] = chr ( 128 + count ( $map ) );
		
		// finally remap non-ascii characters
	return strtr ( $str, $map );
}
function levenshtein_utf8($s1, $s2) {
	$charMap = array ();
	$s1 = utf8_to_extended_ascii ( $s1, $charMap );
	$s2 = utf8_to_extended_ascii ( $s2, $charMap );
	return levenshtein ( $s1, $s2 );
}
function levenshtein_para($val, $cmp) {
	$lev_dist = 0;
	$itr = 0;
	$val = preg_replace ( '/[^a-zA-Z0-9]/', " ", $val );
	$cmp = preg_replace ( '/[^a-zA-Z0-9]/', " ", $cmp );
	if (strpos ( $val, ' ' ) !== false) {
		$val_array = explode ( ' ', $val );
	} else {
		$val_array = array (
				$val 
		);
	}
	if (strpos ( $cmp, ' ' ) !== false) {
		$cmp_array = explode ( ' ', $cmp );
	} else {
		$cmp_array = array (
				$cmp 
		);
	}
	foreach ( $val_array as $value ) {
		foreach ( $cmp_array as $value1 ) {
			$lev_dist = $lev_dist + levenshtein_utf8 ( (strtoupper ( $value )), (strtoupper ( $value1 )) );
			$itr = $itr + 1;
		}
	}
	return round ( ($lev_dist / $itr) * 100, 3 );
}
// -------------- Key Generator ----------------------
function key_generator() {
	$random_string = chr ( mt_rand ( 65, 90 ) ) . chr ( mt_rand ( 65, 90 ) ) . chr ( mt_rand ( 65, 90 ) ) . chr ( mt_rand ( 65, 90 ) ) . chr ( mt_rand ( 65, 90 ) . rand ( 1, 9 ) . rand ( 0, 9 ) . rand ( 0, 9 ) . rand ( 0, 9 ) . rand ( 0, 9 ) ); //
	$key = ($random_string);
	for($i = 0; $i < 5; $i ++) {
		$key = hash ( 'sha512', $key );
	}
	return $key;
}
// ---------------------------------------------------

//
function fileUploader($file, $file_type, $dir = 'uploads') {
	$file_name = md5 ( date ( "Ymdhisa" ) . $file ["name"] );
	$target_dir = $dir . "/";
	$target_file = $target_dir . basename ( $file_name );
	$uploadOk = 1;
	$imageFileType = pathinfo ( $file ["name"], PATHINFO_EXTENSION );
	// Check if image file is a actual image or fake image
	if (isset ( $_POST ["submit"] )) {
		$check = getimagesize ( $file ["tmp_name"] );
		if ($check !== false) {
			echo "File is an image - " . $check ["mime"] . ".";
			$uploadOk = 1;
		} else {
			// return FALSE;
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists ( $target_file )) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if (($file ["size"] > 50000000)||($file ["size"] > max_file_upload_in_bytes())) {
		echo "Sorry, your file is too large:".max_file_upload_in_bytes();
		$uploadOk = 0;
	}
	// Allow certain file formats
	if (is_array ( $file_type )) {
		if (! in_array ( $imageFileType, $file_type )) {
			echo "Sorry, only APK files are allowed.";
			$uploadOk = 0;
		}
	} else {
		if ($imageFileType != $file_type) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		
		echo "Sorry, your file was not uploaded.";
		return FALSE;
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file ( $file ["tmp_name"], $target_file . '.' . $imageFileType )) {
			return $file_name . '.' . $imageFileType;
			echo "The file " . basename ( $file ["name"] ) . " has been uploaded.";
		} else {
			if (! is_dir ( $dir )) {
				die ( $dir . " Dir not exists" );
			}
			if (! is_writeable ( $target_file . '.' . $imageFileType )) {
				echo $target_file . '.' . $imageFileType;
				die ( "Cannot write to destination file" );
			}
			
			echo "Sorry, there was an error uploading your file.";
			return FALSE;
		}
	}
}

function encryptor($action, $string) {
	$output = false;
	
	$encrypt_method = "AES-256-CBC";
	// pls set your unique hashing key
	$secret_key = 'gobler';
	$secret_iv = 'gobler123';
	
	// hash
	$key = hash ( 'sha256', $secret_key );
	
	// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	$iv = substr ( hash ( 'sha256', $secret_iv ), 0, 16 );
	
	// do the encyption given text/string/number
	if ($action == 'encrypt') {
		$output = openssl_encrypt ( $string, $encrypt_method, $key, 0, $iv );
		$output = base64_encode ( $output );
	} else if ($action == 'decrypt') {
		// decrypt the given text/string/number
		$output = openssl_decrypt ( base64_decode ( $string ), $encrypt_method, $key, 0, $iv );
	}
	
	return $output;
}
function error_logger($error, $page = "", $error_level = "5") {
	;
}
function is_empty($val) {
	if (isset ( $val )) {
		if (is_string ( $val )) {
			$val = trim ( $val );
		}
		if (($val === null) or ($val === "") or ($val === 0) or ($val === "0")) {
			return true;
		} else {
			return false;
		}
	} else {
		return true;
	}
}
function return_bytes($val) {
	$val = trim($val);
	$last = strtolower($val[strlen($val)-1]);
	switch($last)
	{
		case 'g':
			$val *= 1024;
		case 'm':
			$val *= 1024;
		case 'k':
			$val *= 1024;
	}
	return $val;
}

function max_file_upload_in_bytes() {
	//select maximum upload size
	$max_upload = return_bytes(ini_get('upload_max_filesize'));
	//select post limit
	$max_post = return_bytes(ini_get('post_max_size'));
	//select memory limit
	$memory_limit = return_bytes(ini_get('memory_limit'));
	// return the smallest of them, this defines the real limit
	return min($max_upload, $max_post, $memory_limit);
}
