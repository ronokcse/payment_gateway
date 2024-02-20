
<!-- https://www.2checkout.com/checkout/purchase?sid=250522919140&mode=2CO&li_0_name=test&li_0_price=1.00&demo=Y -->
<form action='https://www.2checkout.com/checkout/purchase' method='post'>
<input type='hidden' name='sid' value='250522919140' />
<input type='hidden' name='mode' value='2CO' />
<input type='hidden' name='li_0_type' value='product' />
<input type='hidden' name='li_0_name' value='invoice123' />
<input type='hidden' name='li_0_price' value='25.99' />
<input type='hidden' name='demo' value='Y' />
<input type='hidden' name='li_0_tangible' value='Y' />
<input type='hidden' name='li_1_type' value='shipping' />
<input type='hidden' name='li_1_name' value='Express Shipping' />
<input type='hidden' name='li_1_price' value='13.99' />
<input type='hidden' name='card_holder_name' value='Jenny Doe' />
<input type='hidden' name='street_address' value='123 Test Address' />
<input type='hidden' name='street_address2' value='Suite 200' />
<input type='hidden' name='city' value='Columbus' />
<input type='hidden' name='state' value='OH' />
<input type='hidden' name='zip' value='43228' />
<input type='hidden' name='country' value='USA' />
<input type='hidden' name='ship_name' value='Checkout Shopper' />
<input type='hidden' name='ship_street_address' value='123 Test Address' />
<input type='hidden' name='ship_street_address2' value='Suite 200' />
<input type='hidden' name='ship_city' value='Columbus' />
<input type='hidden' name='ship_state' value='OH' />
<input type='hidden' name='ship_zip' value='43228' />
<input type='hidden' name='ship_country' value='USA' />
<input type='hidden' name='email' value='example@2co.com' />
<input type='hidden' name='phone' value='614-921-2450' />
<input name='submit' type='submit' value='Checkout' />
</form>
<script src="https://www.2checkout.com/static/checkout/javascript/direct.min.js"></script>

<script>
	
	var myCallback = function(data) {
		console.log(JSON.stringify(data));
        // Example callback data
        // {"event_type":"checkout_loaded"}
        // {"event_type":"checkout_closed"}
    };
    (function() {
    	inline_2Checkout.subscribe('checkout_loaded', myCallback);
    	inline_2Checkout.subscribe('checkout_closed', myCallback);
    }());
</script>