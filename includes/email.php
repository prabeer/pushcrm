<?php
include_once 'functions.php';
require 'email_files/dkim.php';
class emailsender {
	private $to;
	private $cc;
	private $bcc;
	private $message;
	private $subject;
	private $mail_type;
	private $email_headers;
	private $from;
	private $sendername;
	public function __construct($to, $subject = NULL, $message = NULL, $from = NULL, $sendername = NULL, $cc = NULL, $bcc = NULL) {
		$this->set_mail_to ( $to );
		$this->set_mail_subject ( $subject );
		$this->set_mail_message ( $message );
		$this->set_mail_from ( $sendername, $from );
		// $this->email_header ();
		
		$this->send_mail ();
	}
	private function set_mail_to($to) {
		if (email_check ( $to )) {
			$this->to = $to;
		} else {
			die ( "Invalid Email ID" );
		}
	}
	private function set_mail_subject($subject) {
		if (replace_spl_char ( $subject ) != "") {
			$this->subject = xssafe ( replace_spl_char ( $subject ) );
		} else {
			$this->subject = "";
		}
	}
	private function set_mail_message($message) {
		if (($message) != "") {
			$this->message = $message;
		} else {
			$this->message = "";
		}
	}
	private function set_mail_from($sendername, $from) {
		if (email_check ( $from )) {
			$this->from = $from;
			$this->sendername = $sendername;
		} else {
			$this->from = "webmaster@info.com";
		}
	}
	/*
	 * private function email_header() {
	 * $headers = "From: \"$this->sendername\"<$this->from>\n" . "To: $this->to\n" . "Reply-To: $this->from\n" . "Content-Type: text/html\n" . "MIME-Version: 1.0";
	 * if ($this->cc != "") {
	 * $headers .= 'Cc: ' . $this->cc . "\n";
	 * }
	 *
	 * BuildDNSTXTRR ();
	 *
	 * $headers = AddDKIM ( $headers, $this->subject, $this->message ) . $headers;
	 *
	 * $this->email_header = $headers;
	 * }
	 */
	private function send_mail() {
		$to = $this->to;
		$sender = $this->from;
		$subject = $this->subject;
		$body = $this->message; 
		$sendernamevl = $this->sendername;
		
		// Nothing to configure below
		
		// require 'dkim.php' ;
		
		BuildDNSTXTRR ();
		
		$headers = "From: \"$sendernamevl\" <$sender>\r\n" . "To: $to\r\n" . "Reply-To: $sender\r\n" . "Content-Type: text/html\r\n" . "MIME-Version: 1.0";
		$headers = AddDKIM ( $headers, $subject, $body ) . $headers;
		
		// echo $body;
		// Some Unix MTA has a bug and add redundant \r breaking some DKIM implementation
		// Based on your configuration, you may want to comment the next line
		 $headers=str_replace("\r\n","\n",$headers) ;
		
		$result = mail ( $to, $subject, $body, $headers, "-f $sender" );
		if (! $result)
			die ( "Cannot send email to $to" );
	}
}

?>