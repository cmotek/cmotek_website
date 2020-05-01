<?php
require('constant.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>C M O T E K contact</title>
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width" />
<script src="component/jquery/jquery-3.2.1.min.js"></script>
<meta charset="utf-8" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/global.css" />
    <script>
	$(document).ready(function (e){
		$("#frmContact").on('submit',(function(e){
			e.preventDefault();
			$("#mail-status").hide();
			$('#send-message').hide();
			$('#loader-icon').show();
			$.ajax({
				url: "contact.php",
				type: "POST",
				dataType:'json',
				data: {
				"name":$('input[name="name"]').val(),
				"email":$('input[name="email"]').val(),
				"content":$('textarea[name="content"]').val(),
				"g-recaptcha-response":$('textarea[id="g-recaptcha-response"]').val()},				
				success: function(response){
				$("#mail-status").show();
				$('#loader-icon').hide();
				if(response.type == "error") {
					$('#send-message').show();
					$("#mail-status").attr("class","error");				
				} else if(response.type == "message"){
					$('#send-message').hide();
					$("#mail-status").attr("class","success");							
				}
				$("#mail-status").html(response.text);	
				},
				error: function(){} 
			});
		}));
	});
	</script>
    <script src='https://www.google.com/recaptcha/api.js'></script>	
</head>
<body>
<div class="wrapper">
<a href="index.html"><img id="logo_responsive" class="logo" src="images/cmotek.png"></a>   
<div id="banner_responsive" class="banner"> 
    <div id="central">
	<div class="content" id="readscript">
		<h1>CONTACT</h1>
		<div id="message">
		<form id="frmContact" action="" method="POST" novalidate="novalidate">
			<div class="label">Name:</div>
			<div class="field">
				<input type="text" id="name" name="name" placeholder="enter your name here" title="Please enter your name" class="required" aria-required="true" required>
			</div>
			<div class="label">Email:</div>
			<div class="field">			
				<input type="text" id="email" name="email" placeholder="enter your email address here" title="Please enter your email address" class="required email" aria-required="true" required>
			</div>
			<div class="label">Comments:</div>
			<div class="field">			
				<textarea id="comment-content" name="content" placeholder="enter your comments here"></textarea>			
			</div>
			<div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>			
			<div id="mail-status"></div>			
			<button type="Submit" id="send-message" style="clear:both;">Send Message</button>
		</form>
		<div id="loader-icon" style="display:none;"><img src="img/loader.gif" /></div>
		</div>		
	</div><!-- content -->
</div><!-- central -->	

    <ul id="nav_responsive" class="nav">
        <li><a href="forge.html">FORGE</a></li>
        <li><a href="study.html">READING</a></li>
        <li><a href="going.html">EVENT</a></li>
        <li><a href="contra.php">CONTACT</a></li>
    </ul>
</div>

</div>   
</body>

</html>