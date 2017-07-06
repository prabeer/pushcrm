<?php
include_once ('functions.php');
$uri = htmlentities ( $_SERVER ['REQUEST_URI'] );
$u = explode ( '/', $uri );
$uri = $u ['1'];
//$root_path = xssafe($_SERVER ['DOCUMENT_ROOT']);
//echo $uri;
if (!defined('URI')) define ( 'URI', $uri );
class database {
	
	private $types = array (
			"VIEW",
			"EDIT" 
	);
	private $QueryType;
	private $error;
	public static $path;
	private $dbarray = array (
			'dbdriver' => 'mysql',
			'dbhost' => '127.0.0.1',
			'dbname',
			'dbuser',
			'dbpass' 
	);
	private $conn;
	var $type;
	var $database;
	var $username;
	var $password;
	var $file;
	private static $Viewdb = 'ViewDB.php';
	private static $Updatedb = 'UpdateDB.php';
	
	public static function init_path() {
		self::$path = ROOTPATH."/".URI."/includes/";
		return self::$path;
	}
	public function __construct($type) {
		 
		if (is_string ( $type )) {
			if (in_array ( strtoupper ( $type ), $this->types )) {
				$this->QueryType = $type;
				$this->dbfile ();
				$this->connectDB ();
			} else {
				die ( "Type Not Defined" );
			}
		} else {
			die ( "Wrong Type Defined" );
		}
	}
	private function dbfile() {
		if ($this->QueryType == 'VIEW') {
			$file = $this::$Viewdb;
		} elseif ($this->QueryType == 'EDIT') {
			$file = $this::$Updatedb;
		}
		if (isset ( $file ) && ! empty ( $file )) {
			$file = "{$this::init_path()}" . $file;
			if (file_exists ( $file )) {
				require $file;
				// echo strlen($username);
				if (! empty ( $database ) && ! empty ( $username ) && strlen ( $username ) > 0) {
					if (is_string ( $database ) || is_string ( $username ) || is_string ( $password )) {
						$this->dbarray ['dbname'] = $database;
						$this->dbarray ['dbuser'] = $username;
						$this->dbarray ['dbpass'] = $password;
					} else {
						die ( 'Invalid DB arguments' );
					}
				} else {
					die ( 'Invalid DB arguments' );
				}
			} else {
				die ( 'DBfile not found at:' . $file );
			}
		}
	}
	private function connectDB() {
		$host = $this->dbarray ['dbdriver'] . ":host=" . $this->dbarray ['dbhost'] . ";dbname=" . $this->dbarray ['dbname'];
		try {
			$this->conn = new PDO ( $host, $this->dbarray ['dbuser'], $this->dbarray ['dbpass'] );
			$this->conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch ( PDOException $e ) {
			echo 'ERROR: ' . $e->getMessage ();
		}
	}
	public function query_result($query_state, array $data = null, $security = 'ENFORCE') {
		// $query_state = strtoupper ( $query_state );
		$b = explode ( " ", $query_state );
		$a = strtoupper ( $b [0] );
		$query_type = replace ( 'ALBHABETS', $a );
		if ($query_type == "SELECT" && $this->QueryType == 'VIEW') {
			try {
				$STH = $this->conn->prepare ( $query_state );
				$STH->setFetchMode ( PDO::FETCH_ASSOC );
				if (empty ( $data )) {
					$STH->execute ();
				} else {
					foreach ( $data as $key => $value ) {
						$data [$key] = str_replace ( ';', "", $value );
					}
					
					$STH->execute ( $data );
				}
				
				$result = $STH->fetchAll ();
				return $result;
			} catch ( PDOException $e ) {
				return 'ERROR: ' . $e->getMessage ();
			}
		} else if ((($query_type == "UPDATE") || ($query_type == "INSERT")) && $this->QueryType == 'EDIT') {
			
			try {
				$STH = $this->conn->prepare ( $query_state );
				if (! empty ( $data )) {
					foreach ( $data as $key => $value ) {
						
						$data [$key] = str_replace ( ';', '', $value );
					}
					
					$result = $STH->execute ( $data );
					if ($result == 1) {
						$result = $STH->rowCount ();
					}
				} else {
					if ($security == 'ENFORCE') {
						die ( "Provide data in proper format" );
					} elseif ($security == 'REMOVE') {
						$result = $STH->execute ( $data );
						if ($result == 1) {
							$result = $STH->rowCount ();
						}
					} else {
						die ( "Provide data in proper format" );
					}
				}
				return $result;
			} catch ( PDOException $e ) {
				return 'ERROR: ' . $e->getMessage ();
			}
		} else if ($query_type == "DELETE") {
			die ( "Delete query not allwed" );
		} else {
			//echo $query_type;
			die ( "Invalid Query:".$query_type );
		}
	}
	public function conn_close() {
		$this->conn = null;
	}
}
