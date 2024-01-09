<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Payment WIth SSLcommerz</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
	<button class="your-button-class" id="sslczPayBtn"
		 token="if you have any token validation"
		 postdata="your javascript arrays or objects which requires in backend"
		 order="If you already have the transaction generated for current order"
		 endpoint="checkout.php"> Pay Now
   </button>
</button>
         
    <script>
    	(function (window, document) {
    		var loader = function () {
    			var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
    			script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
    			tag.parentNode.insertBefore(script, tag);
    		};

    		window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    	})(window, document);
     
    </script>
</body>
</html>