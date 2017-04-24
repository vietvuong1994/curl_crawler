<?php
	include 'database.php';
	include 'crawler.php';
	if(isset($_POST['url'])){
		$url = $_POST['url'];
		if (strpos($_POST['url'], 'vnexpress.net/tin-tuc') !== false) {
		    $html = new VnexpressCrawler;
		}
		else {
			$html = new VietnamnetCrawler;
		}
		
		$title = $html->getTitle($url,$html->classtitle);
		$date = $html->getTitle($url,$html->classdate);
		$content = $html->getTitle($url,$html->classcontent);

		$data = new DB_con;
		$insert = $data -> insert($title,$date,$content);

		$data = new DB_con;
		$select = $data -> select();
		$result = json_encode($select);
		echo $result;
	}
?> 
