var simplepay_handler = SimplePay.configure({
 token: processPayment,
 key: 'pu_9768adc4de734bdbb12e6de1909a6865',
 image: 'https://todaylift.com/assets/img/logo1-default.png'
});
var simplepay_checkout = false;
$(document).ready(function(){
    // Example Configuration SimplePay's Gateway
    $("#process-payment").submit(function(event){
        event.preventDefault(); // Prevent the form from submitting via the browser
        var form = $(this);
        $.ajax({
          type: form.attr('method'),
          url: form.attr('action'),
          data: form.serialize(),
          dataType: 'json',
        }).done(function(data) {
          console.log(data);
          if(data.success){
              $(".alert-success").show();
              $(".payment").hide();
          }else if(data['error-status']){
              $(".alert-danger").find('center').html(data['error-status']);
              $(".alert-danger").show();
          }
        }).fail(function(data) {
          console.log(data)
          $(".alert-danger").show();
        });
    });

    $("#Pay-Now").click(function(e){
      simplepay_checkout = true;
      simplepay_handler.open(SimplePay.CHECKOUT,
      {
        phone: $("#payer_phone").text(), //Get User Phone Number
        email: $("#payer_email").text(), //Get User email address
        description: 'Subscription Payment, TodayLift',
        country: 'NG',
        amount: $("#amount-field").val()+'00', //Get amount from database
        currency: 'NGN'
      });
      e.preventDefault();
    });// Open SimplePay's Gateway

});

function processPayment(data){
  $("#token-field").val(data);
  $("#process-payment").submit();
}
