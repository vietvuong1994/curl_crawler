<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'test');

class DB_con
{	
	private $db;
	function __construct()
	{
	  	$dsn = "mysql:host=".DB_SERVER.";dbname=".DB_NAME;
		// Set options
		$options = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
		// Create a new PDO instanace
		try {
		$this->db = new PDO($dsn, DB_USER, DB_PASS, $options);
		}
		// Catch any errors
		catch (PDOException $e) {
		echo $e->getMessage();
		exit();
		}
	}
	
	public function insert($title,$date,$content)
	{
		$database = $this->db;
		$stmt = $database->prepare('INSERT INTO curl_crawler (title, date, content)
		values (:title, :date, :content)');
		$data = array('title'=>$title, 'date'=>$date, 'content'=> $content);
		$stmt->execute($data);
		
	}
	 
	public function select()
	{
		$database = $this->db;
	  	$stmt = $database->prepare("SELECT title, date, content from curl_crawler ORDER BY id DESC LIMIT 1");
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		$resultSet = $stmt->fetchAll();
		return $resultSet;
	}
}
?>