 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
 	<link rel="stylesheet" href="">
 	<style>
 		button.mercadopago-button {
 			background-color: gray;
 			color: #111;
 			border: 1px solid #111;
 			border-radius: 0;
 		}
 	</style>
 </head>
 <body>
 	<form action="checkout.php" method="POST">
 		<script
 		src="https://www.mercadopago.com.br/integrations/v1/web-tokenize-checkout.js"
 		data-public-key="TEST-d747e86a-b4b4-4d72-9c28-1f844d9e831a"
 		data-transaction-amount="199.00" data-button-label="Pay">
 	</script>
 </form>
</body>
</html>
