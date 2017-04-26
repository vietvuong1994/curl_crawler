<?php
	include 'database.php';
	include 'crawler.php';
	if(isset($_POST['url'])){
		$url = $_POST['url'];
		if (strpos($_POST['url'], 'vnexpress.net/tin-tuc') !== false) {
		    $html = new VnexpressCrawler($url);
		}
		else {
			$html = new VietnamnetCrawler($url);
		}
		
		$title = $html->getTitle($html->title);
		$date = $html->getTitle($html->date);
		$content = $html->getTitle($html->content);

		$data = new DB_con;
		$insert = $data -> insert($title,$date,$content);

		$data = new DB_con;
		$select = $data -> select();
		$result = json_encode($select);
		echo $result;
	}
?>
