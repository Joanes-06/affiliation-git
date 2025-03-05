<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>BLIX - Mobile WEB APP Template</title>
<meta name="author" content="sindevo.com">
<meta name="description" content="mobile HTML template">
<link rel="stylesheet" href="{{ asset('preview/preview.css') }}">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,900' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="main_content">


        
		
        <div class="right_content">
          <div class="iphone_bg">
        	<div class="mobile_wrap">
            <iframe id="frame" frameborder="no" border="0" scrolling="no" width="325px" height="540px"></iframe> 
            </div>
          </div>
        </div>
        
        
        
</div>
<script type="text/javascript" src="{{ asset('preview/js/jquery-1.12.4.min.js') }}"></script>
<script type="text/javascript" charset="utf-8">
var $ = jQuery.noConflict(); 
$(document).ready(function () {
$("#frame").attr("src", "blix-main/index.html");

$("#main").on('click', function() {
	  $("#frame").attr("src", "blix-main/index.html");
}); 
$("#green").on('click', function() { 
	  $("#frame").attr("src", "blix-green/index.html");
}); 
$("#red").on('click', function() { 
	  $("#frame").attr("src", "blix-red/index.html");
}); 
});
</script>  
</body>
</html>