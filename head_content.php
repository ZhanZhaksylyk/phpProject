<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
	<!-- style css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
	<!-- script js -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
			background-image: url(<?php echo $url?>);
			background-repeat: repeat;
			background-size: 100%;
			background-attachment: scroll;
		}
		.vl-right{
			border-right: 1px solid #dee2e6;
		}
		#footer{
			position:fixed;
			bottom:0;
			color: #2b63f5;
		}
		#session{
			color:#007bf5;
		}
		.button,#footerMid,#footerRight{
			display: block;
		}
		#invisible{
			display: none;
		}
		@media (max-width: 650px){
			#content,#logo,.button,#footerMid,#footerRight{
				display: none;
			}
			#invisible{
				display: block;
			}
		}
	</style>