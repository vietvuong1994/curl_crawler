<?php 
	
	class Web_Crawler{

	    function getTitle($link, $att_title){
	        $ch = curl_init($link);
			curl_setopt($ch, CURLOPT_URL,$link);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
			 
			$result = curl_exec($ch);
			 
			curl_close($ch);
			
			$document = new \DomDocument('1.0', 'UTF-8');
			libxml_use_internal_errors(true);
			$document->loadHTML($result);
			libxml_use_internal_errors(false);
			$xpath = new DomXPath($document);
			$data = $xpath->query($att_title);
			return $data[0]->textContent;
	    }

	    function getDate($link, $att_date){
	    	$ch = curl_init($link);
			curl_setopt($ch, CURLOPT_URL,$link);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
			 
			$result = curl_exec($ch);
			 
			curl_close($ch);
			
			$document = new \DomDocument('1.0', 'UTF-8');
			libxml_use_internal_errors(true);
			$document->loadHTML($result);
			libxml_use_internal_errors(false);
			$xpath = new DomXPath($document);
			$data = $xpath->query($att_date);
			return $data[0]->textContent;
	    }
	    function getContent($link, $att_content){
	        $ch = curl_init($link);
			curl_setopt($ch, CURLOPT_URL,$link);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
			 
			$result = curl_exec($ch);
			 
			curl_close($ch);
			
			$document = new \DomDocument('1.0', 'UTF-8');
			libxml_use_internal_errors(true);
			$document->loadHTML($result);
			libxml_use_internal_errors(false);
			$xpath = new DomXPath($document);
			$data = $xpath->query($att_content);
			return $data[0]->textContent;
	    }
	}
	class VnexpressCrawler extends Web_Crawler{
		var $title = '//div[@class="title_news"]';
		var $date = '//div[@class="block_timer left txt_666"]';
		var $content = '//div[@class="fck_detail width_common block_ads_connect"]';
	}

	class VietnamnetCrawler extends Web_Crawler{
		var $title = '//h1[@class="title"]';
		var $date = '//span[@class="ArticleDate"]';
		var $content = '//div[@id="ArticleContent"]';
	}

	// $vne = new VnexpressCrawler;
	// $title = $vne->getContent('http://vnexpress.net/tin-tuc/the-gioi/phan-tich/nguy-co-tu-cach-tung-don-hoa-mu-doi-pho-trieu-tien-cua-trump-3573739.html',$vne->title);
	// echo($title) ;

	// $vne = new VietnamnetCrawler;
	// $title = $vne->getContent('http://vietnamnet.vn/vn/giai-tri/thoi-trang/fast-and-furious-8-man-nhan-voi-dan-my-nhan-boc-lua-368300.html',$vne->content);
	// echo $title;

?>