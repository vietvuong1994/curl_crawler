
<!DOCTYPE html>
<style type="text/css">
	span{
		color: red;
	}
</style>
<html>
<head>
	<title>test</title>
</head>
<body>
<h2>url</h2><input type="text" id="url"><br>
<span>Nhập link vnexpress.net/tin-tuc hoặc vietnamnet.vn/vn</span><br>
<input type="submit" value="GET" onclick="getcurl()">

<div>
	<h2>title</h2>
	<hr>
	<div class="title"></div>
	<h2>date</h2>
	<hr>
	<div class="date"></div>
	<h2>content</h2>
	<hr>
	<div class="content"></div>
</div>
</body>
</html>
<script src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript">
//------------vnexpress.net/tin-tuc/--------------///
var link1 = "vnexpress.net/tin-tuc";
var link2 = "vietnamnet.vn/vn"
function getcurl(){
	var url = $('#url').val();
	if(url.indexOf(link1) != -1 || url.indexOf(link2) != -1){
		$.ajax({
	        url : "ajaxcurl.php",
	        type : "post",
	        dataType:"json",
	        data :{
	        	url: url,
	        },
	        success : function (result){
				$('.title').html(result[0].title);
				$('.date').html(result[0].date);
				$('.content').html(result[0].content);
	        }
	    }); 
	}
	else{
		alert('Vui lòng nhập đúng đường link yêu cầu!');
	}
	
}

</script>