<?php
define('HOST','localhost');
define('DBNAME','lib_database');
define('CHARSET','utf8');
define('USER','root');
define('PWD','');

class ConnectionDB {
	private static $pdo = null;

	private function __construct() {}

	public static function getInstance() {
		if(!isset(self::$pdo)) {
			try {
				$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',PDO::ATTR_PERSISTENT => TRUE);
				self::$pdo = new PDO("mysql:host=".HOST."; dbname=".DBNAME."; charset=".CHARSET.";",USER,PWD,$options);
				self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
				print "Error: ".$e->getMessage();
			}
		}
		return self::$pdo;
	}
}
?>
