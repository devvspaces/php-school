<?php include("header.php"); ?>
<div class="container-fluid main-container">
  <div class="row main">
    <div class="col-lg-12 panel-container">
      <div class="panel panel-default">
        <div class="panel-heading" id="P_heading">
          <?php 
          $users = $_SESSION['users'];
          $s1  = mysqli_query($con,"SELECT * FROM students where username = '$users'");
          $sh1 = mysqli_fetch_array($s1);
          $name1 = $sh1['lname']." ".$sh1['fname']." ".$sh1['mname'];
          $img = $sh1['picture'];
          $level = $sh1['level'];
          $admission = $sh1['matric_no'];
          $first_name = $sh1['fname'];
          $last_name = $sh1['lname'];
          $email = $sh1['email'];
          $phone = $sh1['phone'];
          if($img==""){
            $img2="passport/default.png";
          }
          else{
            $img2 = $img;
          }
          $cal  = mysqli_query($con,"SELECT * FROM  calender ");
                $sh2 = mysqli_fetch_array($cal);
                $return2= $sh2['session'];
                $return1= $sh2['current_semester'];
          ?>

          <img src="<?php echo $img2 ?>" id="imgs" class="img-responsive">
          <h4><?php echo $name1 ?></h4>
          <i><?php echo $level ?></i>
        </div>
        <div class="panel-body">
          <h4 class="text-center">Payment Summary</h4>
          <div class="row">
            <div class="col-lg-12">
            <div class=" alert alert-info">Please ensure you have updated your profile before proceeding with this payment</div>
            
            <?php
            $amount = $_GET['amount'];
            $amount2 = $amount*100;
            ?>
            <br>
            <div class=" alert alert-danger">You are expected to pay a total amount of <?php echo number_format($amount) ?> but for The first Semester you are allowed to pay atleast 60% (<?php echo number_format ($amount*0.6 )?>) of the total amount  </div>
          </div>
            <div class="col-lg-6 col-lg-offset-3">
              <table class="table table-bordered">
                <tr>
                  <td>First Name</td>
                  <td><?php echo $first_name ?></td>
                </tr>
                <tr>
                  <td>Last Name</td>
                  <td><?php echo $last_name ?></td>
                </tr>
                <tr>
                  <td>email</td>
                  <td><?php echo $email ?></td>
                </tr>
                <tr>
                  <td>Phone No</td>
                  <td><?php echo $phone ?></td>
                </tr>
                <tr>
                  <td>Fees description</td>
                  <td><?php echo $desc ?></td>
                </tr>
                <tr>
                  <td>Amount</td>
                  <td><input type="" name="" class="form-control amount" required placeholder="enter the amount you want to pay here"></td>
                </tr>
                <tr>
                  <td colspan="2">
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
                        var amount =  $('.amount').val();
                        //alert(amount)

                        let handler = PaystackPop.setup({
                          //pk_live_d17e0fa9f8cdeb18e23ead5afc639418dc7b0cff
                          key: 'pk_test_54d45f57a02618dc39534e6a31d26dc8c7a8b4e9', 

                          email: "<?php echo $email ?>",

                          amount:  amount*100,//<?php echo $amount2 ?>,

                          firstname: "<?php echo $first_name ?>",

                          lastname: "<?php echo $last_name ?>",


                          ref: ''+Math.floor((Math.random() * 1000000000) + 1), 
                        

                          callback: function(response){

                            let message = 'Payment complete! Reference: ' + response.reference;

                            const referenceid = response.reference;

                            alert(message);
                             window.location.href="fees_authentication_2.php?reference="+referenceid+"&&is=tuition Fees &&amount="+amount+" ";
                          },

                            onClose: function(){

                            //alert('Window closed.');
                           


                          },

                        });

                        handler.openIframe();

                      }
                    </script>
                   
                  </td>

                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include("footer.php") ?>


</body>
</html>