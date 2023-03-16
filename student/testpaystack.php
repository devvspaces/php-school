<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form id="paymentForm">

                      <div class="form-submit">
                        <script src="https://js.paystack.co/v1/inline.js"></script> 

                        <button type="button" class="btn btn-success btn-block" onclick="payWithPaystack()"> Pay </button>

                      </div>

                    </form>

                    <script>
                      const paymentForm = document.getElementById('paymentForm');

                      paymentForm.addEventListener("submit", payWithPaystack, false);

                      function payWithPaystack() {
                        let handler = PaystackPop.setup({

                          key: 'pk_test_935aced6f0cf264d689ba4c33f1de03dc70228bd', 

                          email: "adeugadewumi@gmail.com",

                          amount: 1000,

                          firstname: "daniel",

                          lastname: "adeuga",

                          ref: ''+Math.floor((Math.random() * 1000000000) + 1), 
                          onClose: function(){

                            alert('Window closed.');

                          },

                          callback: function(response){

                            let message = 'Payment complete! Reference: ' + response.reference;

                            alert(message);

                          }

                        });

                        handler.openIframe();

                      }
                    </script>
</body>
</html>