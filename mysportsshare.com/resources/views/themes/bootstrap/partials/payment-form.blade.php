@if(config('wave.billing') == 'stripe')
	<div id="payment-form-elements">
		<div class="form-group">
	        <label>Cardholders Name</label>
		    <input type="text" class="form-control{{ $errors->has('cardholder') ? ' is-invalid' : '' }}" name="cardholder">
		</div>

		<div class="form-group">
		    <label>Credit or debit card</label>
		    <div id="card-element">
		      <!-- A Stripe Element will be inserted here. -->
		    </div>
		</div>

	    <!-- Used to display form errors. -->
	    <div id="card-errors" class="text-center" role="alert"></div>
	</div>


	<script src="https://js.stripe.com/v3/"></script>
	<script>

		// Create a Stripe client.
		@if(env('STRIPE_MODE') == 'live')
			var stripe = Stripe('{{ env('STRIPE_LIVE_KEY') }}');
		@else
			var stripe = Stripe('{{ env('STRIPE_TEST_KEY') }}');
		@endif

		// Create an instance of Elements.
		var elements = stripe.elements();

		// Custom styling can be passed to options when creating an Element.
		// (Note that this demo uses a wider set of styles than the guide below.)
		var style = {
		  base: {
		    color: '#32325d',
		    lineHeight: '18px',
		    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
		    fontSmoothing: 'antialiased',
		    fontSize: '16px',
		    '::placeholder': {
		      color: '#aab7c4'
		    }
		  },
		  invalid: {
		    color: '#fa755a',
		    iconColor: '#fa755a'
		  }
		};

		// Create an instance of the card Element.
		var card = elements.create('card', {style: style});

		// Add an instance of the card Element into the `card-element` <div>.
		card.mount('#card-element');

		// Handle real-time validation errors from the card Element.
		card.addEventListener('change', function(event) {
		  var displayError = document.getElementById('card-errors');
		  if (event.error) {
		    displayError.textContent = event.error.message;
		  } else {
		    displayError.textContent = '';
		  }
		});

		// Handle form submission.
		var form = document.getElementById('payment-form');
		form.addEventListener('submit', function(event) {
		  event.preventDefault();

		  stripe.createToken(card).then(function(result) {
		    if (result.error) {
		      // Inform the user if there was an error.
		      var errorElement = document.getElementById('card-errors');
		      errorElement.textContent = result.error.message;
		    } else {
		      // Send the token to your server.
		      stripeTokenHandler(result.token);
		    }
		  });
		});

		function stripeTokenHandler(token) {
		  // Insert the token ID into the form so it gets submitted to the server
		  var form = document.getElementById('payment-form');
		  var hiddenInput = document.createElement('input');
		  hiddenInput.setAttribute('type', 'hidden');
		  hiddenInput.setAttribute('name', 'stripeToken');
		  hiddenInput.setAttribute('value', token.id);
		  form.appendChild(hiddenInput);

		  // Submit the form
		  form.submit();
		}
	</script>
@else

	<div id="payment-form-elements">
		<div id="dropin-container"></div>
	</div>

	<input type="hidden" id="nonce" name="payment_method_nonce" value="">

	<script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
	 <script>

	 	var form = document.getElementById('payment-form');

	    braintree.dropin.create({
	      authorization: '{{ env("BRAINTREE_TOKEN") }}',
	      container: '#dropin-container',
	       paypal: {
		    flow: 'vault'
		  }
	    }, function (createErr, instance) {

	    	form.addEventListener('submit', function(event) {
	    		document.querySelectorAll('[type="submit"]')[0].disabled = true;
				event.preventDefault();
				instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
		          // Submit payload.nonce to your server
		          BrainTreeNonceHandler(payload.nonce);
		        });

			});

	    });


	    function BrainTreeNonceHandler(nonce) {
			var form = document.getElementById('payment-form');
			var hiddenInput = document.createElement('input');
			hiddenInput.setAttribute('type', 'hidden');
			hiddenInput.setAttribute('name', 'payment_method_nonce');
			hiddenInput.setAttribute('value', nonce);
			form.appendChild(hiddenInput);

			// Submit the form
			form.submit();
		}


	  </script>

@endif