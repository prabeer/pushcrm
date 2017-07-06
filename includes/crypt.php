<?php
function generate_cert() {
	$privateKey = openssl_pkey_new ( array (
			'private_key_bits' => 2048, // Size of Key.
			'private_key_type' => OPENSSL_KEYTYPE_RSA 
	) );
	// Save the private key to private.key file. Never share this file with anyone.
	openssl_pkey_export_to_file ( $privateKey, 'private.key' );
	
	// Generate the public key for the private key
	$a_key = openssl_pkey_get_details ( $privateKey );
	// Save the public key in public.key file. Send this file to anyone who want to send you the encrypted data.
	file_put_contents ( 'public.key', $a_key ['key'] );
	
	// Free the private Key.
	openssl_free_key ( $privateKey );
}
function encrypt_data($data, $cert) {
	// Data to be sent

	
	// echo 'Plain text: ' . $plaintext;
	// Compress the data to be sent
	$plaintext = gzcompress ( $data );
	
	// Get the public Key of the recipient
	//Use only absolute path for $cert = 'file:///path/to/public.key'
	if (file_exists ( $cert )) {
		$publicKey = openssl_pkey_get_public ( $cert );
		$a_key = openssl_pkey_get_details ( $publicKey );
		
		// Encrypt the data in small chunks and then combine and send it.
		$chunkSize = ceil ( $a_key ['bits'] / 8 ) - 11;
		$output = '';
		
		while ( $plaintext ) {
			$chunk = substr ( $plaintext, 0, $chunkSize );
			$plaintext = substr ( $plaintext, $chunkSize );
			$encrypted = '';
			if (! openssl_public_encrypt ( $chunk, $encrypted, $publicKey )) {
				die ( 'Failed to encrypt data' );
			}
			$output .= $encrypted;
		}
		openssl_free_key ( $publicKey );
		
		// This is the final encrypted data to be sent to the recipient
		$encrypted = $output;
		return $encrypted;
	} else {
		die ( 'Certificate not found' );
	}
}

// Get the private Key
function decrypt_data($encdata, $cert) {
	
	//Use only absolute path for $cert = 'file:///path/to/private.key'
	if (! $privateKey = openssl_pkey_get_private ( $cert )) {
		die ( 'Private Key failed' );
	}
	$a_key = openssl_pkey_get_details ( $privateKey );
	
	// Decrypt the data in the small chunks
	$chunkSize = ceil ( $a_key ['bits'] / 8 );
	$output = '';
	$encrypted = $encdata;
	while ( $encrypted ) {
		$chunk = substr ( $encrypted, 0, $chunkSize );
		$encrypted = substr ( $encrypted, $chunkSize );
		$decrypted = '';
		if (! openssl_private_decrypt ( $chunk, $decrypted, $privateKey )) {
			die ( 'Failed to decrypt data' );
		}
		$output .= $decrypted;
	}
	openssl_free_key ( $privateKey );
	
	// Uncompress the unencrypted data.
	$output = gzuncompress ( $output );
	
	return $output;
}
