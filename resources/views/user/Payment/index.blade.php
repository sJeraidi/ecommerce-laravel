@extends('layouts.app')

@section('title', 'Page Paiement')

@section('extra-script')
  <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')

<div class="container">
    <div class="col-md-12">
        <h1>Page de Paiement</h1>
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('paiement.store') }}" id="payment-form">
                    @csrf
                    <div id="card-element">
                        <!-- Elements will create input elements here -->
                    </div>

                    <!-- We'll put the error messages in this element -->
                    <div id="card-errors" role="alert"></div>

                    <button class="btn btn-success" id="submit">Procéder au paiement ( {{ getPrice(Cart::getTotal()) }} )</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-js')
  <script>
        var stripe = Stripe('pk_test_51IhExULvaaK6HUJjTkX59ODugwdYqzlldNkV4CPDFBxUtqMGinU0vPBpJCqXplMYd8i7cJktv2WEwet6lHgXz8oX00g9j9GB0H');
        var elements = stripe.elements();

        var elements = stripe.elements();
        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#aab7c4"
                }
                },
                invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        };

        var card = elements.create("card", { style: style });
        card.mount("#card-element");

        card.on('change', ({error}) => {
            let displayError = document.getElementById('card-errors');
            if (error) {
                displayError.classList.add('alert', 'alert-warning');
                displayError.textContent = error.message;
            } else {
                displayError.classList.remove('alert', 'alert-warning');
                displayError.classList.add('');
            }
        });

        var form = document.getElementById('payment-form');
        var submit = document.getElementById('submit');

        form.addEventListener('submit', function(ev) {
        ev.preventDefault();
        
        submit.disabled = true;

        // If the client secret was rendered server-side as a data-secret attribute
        // on the <form> element, you can retrieve it here by calling `form.dataset.secret`
        stripe.confirmCardPayment("{{ $clientSecret }}", {
            payment_method: {
                card: card
            }
        }).then(function(result) {
            console.log(result);debugger;
            if (result.error) {
            // Show error to your customer (e.g., insufficient funds)
                submit.disabled = false;
                console.log(result.error.message);
            } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    var paymentIntent = result.paymentIntent;
                    var token = document.querySelector('meta[name="csrf-token"]')
                    .getAttribute('content');
                    var url = form.action;
                    var redirect = '/Produits/Merci';
                    
                    fetch(
                        url,
                        {
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                            },
                            method: 'post',
                            body: JSON.stringify({
                                paymentIntent: paymentIntent
                            })
                            
                        }).then((data) => {
                              alert(data["paymentIntent"]);
                                window.location.href = redirect;
                            }).catch(error => {
                                console.log(error); 
                            })
                  
                }
            }
        });
        });
        
  </script>
@endsection