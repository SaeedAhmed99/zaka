
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('frontend.donation')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <section>
  

    <h4>{{__('frontend.projectChoose')}}</h4>

<div class="row">
  <div class="col-lg-12">
    <div class="col-lg-6">
       <select class="form-control" id="myOptions">
        <?php
                            $title_var = "title_" . @Helper::currentLanguage()->code;
                            $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                           
                            ?>
         @foreach(Helper::donation_projects() as $project)
                             <?php
                                if ($project->$title_var != "") {
                                    $title = $project->$title_var;
                                } else {
                                    $title = $project->$title_var2;
                                }
                                ?>
      <option  value="{{$project->id}}" >{{$title}}</option>
     @endforeach"
    </select>
    </div>

    <div class="col-lg-6">
      <input type="text" id="project" name="project" onchange="getVal()" class="form-control input1" placeholder="{{__('frontend.enterValue')}}" required >
      
    </div>
  </div>  
   
</div>
<script src="https://www.paypal.com/sdk/js?client-id=AVGRaO4q52EN4enOEr5MEZaXdSHwfIimnV5fsCajODp65vTFoAgUqhLFXCrrgIUSypQ5l_Acah__QzG8&currency=USD"></script>
 <div id="paypal-button-container"></div>

<!--<h1>اختبار اخر</h1>
    <input type="radio" id="product-1" name="product" onclick="handleClick(this)" value="1.00">
    <label for="product-1">المشروع 1 = 1.00$</label>
    <br>
    <input type="radio" id="product-2" name="product" onclick="handleClick(this)" value="2.00">
    <label for="product-2">المشروع 2 = 2.00$</label>
    <br>
    <input type="radio" id="product-3" name="product" onclick="handleClick(this)" value="3.00">
    <label for="product-3">المشروع 3 = 3.00$</label>-->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script>
      function getVal() {
   val = document.getElementById('project').value;
  console.log(val);
}

 $('#myOptions').change(function() {
    var projectName = $("#myOptions option:selected").text();
    var projectId = $("#myOptions option:selected").val();
    //alert(projectId);
    console.log(projectName);
    console.log(projectId);
});

        function handleClick(radioBtn){
            productValue = radioBtn.value;
            console.log(productValue);
        }
       paypal.Buttons({
    createOrder: function(data, actions) {
    //  console.log(productValue);
    console.log(val);
    var projectName = $("#myOptions option:selected").text();
    var projectId = $("#myOptions option:selected").val();
    //alert(projectId);
    console.log(projectName);
    console.log(projectId);

      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({

        application_context: {
          brand_name : 'Zakat',
          user_action : 'PAY_NOW',
        },
        purchase_units: [{
          amount: {
            value: val

          }

        }],
      });
    },

    onApprove: function(data, actions) {

      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var projectName = $("#myOptions option:selected").text();
    var projectId = $("#myOptions option:selected").val();
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
          if(details.status == 'COMPLETED'){
            return fetch('/api/paypal-capture-payment', {
                      method: 'post',
                      headers: {
                          'content-type': 'application/json',
                          "Accept": "application/json, text-plain",
                          "X-Requested-With": "XMLHttpRequest",
                          "X-CSRF-TOKEN": token
                      },
                      body: JSON.stringify({
                       //   orderId     : data.orderID,
                          id : details.id,
                          status: details.status,
                          payerEmail: details.payer.email_address,
                          value: val,
                        
                          projectName:projectName,
                          projectId:projectId
                      })
                  })
                  .then(status)
                  .then(function(response){
                      // redirect to the completed page if paid
                      window.location.href = 'home';
                  })
                  .catch(function(error) {
                      // redirect to failed page if internal error occurs
                      window.location.href = 'events';
                  });
          }else{
              window.location.href = '/pay-failed?reason=failedToCapture';
          }
      });
    },

    onCancel: function (data) {
        window.location.href = 'home';
    }



    }).render('#paypal-button-container');
    // This function displays Smart Payment Buttons on your web page.

    function status(res) {
      if (!res.ok) {
          throw new Error(res.statusText);
      }
      return res;
    } 
        // Render the PayPal button into #paypal-button-container
     /*   paypal.Buttons({

            // Call your server to set up the transaction
           createOrder: function(data, actions) {
  let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                return fetch('api/paypal/order/create/', {
                     
                    method: 'post',
                    headers:{
            "Accept": "application/json",
            "Content-Type": "application/json",
             "X-CSRF-Token": token
        },
                    body:JSON.stringify({
                        "value":productValue
                    })

                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    return orderData.id;
                });
            },

            // Call your server to finalize the transaction
            onApprove: function(data, actions) {
                return fetch('api/paypal/order/capture/', {
                    method: 'post',
                    body:JSON.stringify({
                        "orderId":data.orderID
                    })
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    // Three cases to handle:
                    //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                    //   (2) Other non-recoverable errors -> Show a failure message
                    //   (3) Successful transaction -> Show confirmation or thank you

                    // This example reads a v2/checkout/orders capture response, propagated from the server
                    // You could use a different API or structure for your 'orderData'
                    var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                    if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                        return actions.restart(); // Recoverable state, per:
                        // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                    }

                    if (errorDetail) {
                        var msg = 'Sorry, your transaction could not be processed.';
                        if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                        if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                        return alert(msg); // Show a failure message (try to avoid alerts in production environments)
                    }

                    // Successful capture! For demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                    // Replace the above to show a success message within this page, e.g.
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }

        }).render('#paypal-button-container');*/
    </script>
  </section>
      </div>
      
    </div>
  </div>
</div>
