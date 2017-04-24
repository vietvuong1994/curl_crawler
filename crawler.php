<?php 
	include "simple_html_dom.php";
	class Web_Crawler{
 
	    var $html_content = '';
	 
	    function getTitle($link, $att_title){
	        if($this->html_content==''){
	            $html = file_get_html($link);
	            $this->html_content = $html;
	        }else{
	            $html = $this->html_content;
	        }
	 
	        foreach($html->find($att_title) as $e){
	            $title = $e->innertext;
	        }
	        return $title;
	    }

	    function getDate($link, $att_date){
	    	if($this->html_content==''){
	    		$html = file_get_html($link);
	    		$this->html_content = $html;
	    	}
	    	else{
	    		$html = $this->html_content;
	    	}

	    	foreach ($html->find($att_date) as $e){
	    		$date = $e->innertext;
	    	}
	    	return $date;
	    }
	    function  getContent($link, $att_content){
	        if($this->html_content==''){
	            $html = file_get_html($link);
	            $this->html_content = $html;
	        }else{
	            $html = $this->html_content;
	        }
	 
	        foreach($html->find($att_content) as $e){
	            $content_html = $e->innertext;
	        }
	 		
	        return $content_html;
	    }
	}
	class VnexpressCrawler extends Web_Crawler{
		var $classtitle = 'div.title_news h1';
		var $classdate = 'div.block_timer';
		var $classcontent = 'div.fck_detail';
	}

	class VietnamnetCrawler extends Web_Crawler{
		var $classtitle = 'h1.title';
		var $classdate = 'span.ArticleDate';
		var $classcontent = 'div#ArticleContent';
	}

	// $vne = new VnexpressCrawler;
	// $title = $vne->getTitle('http://vnexpress.net/tin-tuc/the-gioi/phan-tich/nguy-co-tu-cach-tung-don-hoa-mu-doi-pho-trieu-tien-cua-trump-3573739.html',$vne->classtitle);
	// echo $title;

	// $vne = new VietnamnetCrawler;
	// $title = $vne->getContent('http://vietnamnet.vn/vn/giai-tri/thoi-trang/fast-and-furious-8-man-nhan-voi-dan-my-nhan-boc-lua-368300.html',$vne->classcontent);
	// echo $title;

?>