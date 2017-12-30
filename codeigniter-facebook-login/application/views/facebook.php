<html>
<head>
  <title> Facebook Login Page </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>

<div class="container">
  <form class="form-signin" id="formLogin3"  method="post">

            <button class="btn btn-primary "  click="facebookBaglan" id="login_facebookButton"  name="login_facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i> &nbsp;Facebook Girişi</button>
            <a  name="login_facebook" type="submit" click="facebookBaglan()"   class="fb-login-button" data-max-rows="1" data-size="xlarge" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="true"></a>

      </form>
</div>
<script>
$("#formLogin3").submit(function(e) {
       e.preventDefault();
       facebookBaglan();
   });


   function facebookBaglan (){

     function statusChangeCallback(response) {
       console.log('statusChangeCallback');
       console.log(response);
       if (response.status === 'connected') testAPI();
     }

     function checkLoginState() {
       FB.getLoginStatus(function(response) {
         statusChangeCallback(response);
       });
     }

     window.fbAsyncInit = function() {
     FB.init({
       appId      : 'Your facebook id',
       cookie     : true,  // enable cookies to allow the server to access
       xfbml      : true,  // parse social plugins on this page
       version    : 'v2.9' // use graph api version 2.8
     });

     FB.getLoginStatus(function(response) {
       statusChangeCallback(response);
     });

     };

     (function(d, s, id) {
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) return;
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v2.9";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

     function testAPI() {
       console.log("kullanıcı bilgilerini getiriliyor!!!");
       FB.api('/me?fields=id,name,email',function(response){
         console.log('Successful login for: ' + response.name); //its writing as a array
         console.log(response);
         var user = response.name;
         var userMail = response.email;
         var id = response.id;

         $.ajax({  //sending values
             type: "POST",
             url: "facebook/facebookLogin",
              data:  "user="+user+"&email=" + userMail+"&id="+id,

             success: function(data) {
                 if(data == "connect")
                 {
                   alert("Your facebook user name is : " + user + "\nYour e-mail is : "+ userMail);

                 }
             },
         });
       });
     }
   }//function facebookBaglan end--!

</script>
</body>
</html>
