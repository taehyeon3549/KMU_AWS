<?php

/* login.html */
class __TwigTemplate_5c54a6191fe6fe65b010fd066791be196480393b33755972282b624683a3687b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>

  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  <meta name=\"description\" content=\"\">
  <meta name=\"author\" content=\"\">

  <title>Farm-ing Sign In</title>

  <!-- Custom fonts for this template-->
  <link href=\"/vendor/fontawesome-free/css/all.min.css\" rel=\"stylesheet\" type=\"text/css\">

  <!-- Custom styles for this template-->
  <link href=\"/css/sb-admin.css\" rel=\"stylesheet\">
  <style>
    body{
      background-image: url(\"http://13.125.112.70/main.png\");
      background-size: 100% 100%;
    }
    </style>

</head>

<body class=\"bg-main\">

  <div class=\"container\">
    <div class=\"card card-login mx-auto mt-5\" style=\"margin-top: 5px; padding: 30px;\">
      <!--<div class=\"card-header\">Farm-ing</div>-->
      <div  style=\"border-color: #ffffff;\">
          <img src=\"http://13.125.112.70/mail_iconn.png\" style=\"max-width: 100%; height: auto;\">
          <img src=\"http://13.125.112.70/main_text.png\" style=\"max-width: 100%; height: auto;\">
       
    </div>
      <div class=\"card-body\">

        <form>
          <div class=\"form-group\">
            <div class=\"form-label-group\">
              <input type=\"email\" name=\"email\"id=\"inputEmail\" class=\"form-control\" placeholder=\"Email address\" required=\"required\" autofocus=\"autofocus\">
              <label for=\"inputEmail\">이메일 주소</label>
            </div>
          </div>
          <div class=\"form-group\">
            <div class=\"form-label-group\">
              <input type=\"password\" name =\"pass\" id=\"inputPassword\" class=\"form-control\" placeholder=\"Password\" required=\"required\">
              <label for=\"inputPassword\">비밀번호</label>
            </div>
          </div>
          <div class=\"form-group\">
            <div class=\"checkbox\">
              <label>
                <input type=\"checkbox\" value=\"remember-me\">
                비밀번호 저장
              </label>
            </div>
          </div>
          <a class=\"btn btn-primary btn-block\" id=\"loginb\">Login</a>
        </form>

        <script type=\"text/javascript\">
          //When click the login btn
          document.getElementById(\"loginb\").addEventListener('click', function(){
            // Check the value are all filled
            var email = \$('input[name = email]').val();
            var pass = \$('input[name = pass]').val();

            if(email == \"\"){
              alert(\"Please, Enter the email\");
            }else if(pass == \"\"){
              alert(\"Please, Enter the password\");
            }else{
              //send json
              \$.ajax({
              method: \"POST\",
              url: \"/signin_proc\",
              data: {
                \"id\": \$('input[name = email]').val(),                
                \"pw\": \$('input[name = pass]').val()                
              }
              }).done(function( msg ) {
                  //If sign_up success, show up the sign in page
                  if(msg.message == 0){
                    //IF login success, get user's sensor data
                    \$.ajax({
                      method: \"POST\",
                      url: \"/sensorList\",
                      data: {
                        \"usn\": msg.usn                
                      }
                    }).done(function( msg ) {                  
                      //Get usn and is_admin
                      sessionStorage.setItem(\"sensor\", JSON.stringify(msg.message));                      
                    });         
                    alert(\"Welcome!!\");

                    //Create session
                    //Get usn and is_admin
                    sessionStorage.setItem(\"usn\", msg.usn);
                    sessionStorage.setItem(\"name\", msg.name);
                    sessionStorage.setItem(\"is_admin\", msg.is_admin);

                    location.href = \"/maps\";
                  }
                  if(msg.message == 1){
                    alert(\"비밀번호를 다시 확인해 주세요.\");
                    location.href = \"/\";
                  }
                  if(msg.message == 2){
                    alert(\"우리의 회원이 아닙니다. 회원가입을 추천합니다.\");
                    location.href = \"/register_email\";
                  }
                  if(msg.message == 3){
                    alert(\"당신은 아직 이메일을 인증하지 않았습니다. 이메일을 확인해 주세요.\");
                    location.href = \"/\";
                  }
              });
            }
          });
        </script>
        <div class=\"text-left\" >
          <a class=\"d-block small mt-3\" href=\"/register_email\">지금 가입하시겠습니까??</a>
        </div>
        <div class=\"text-left\" >
            <a class=\"d-block small\" href=\"/forgot-password\">비밀번호를 잊으셨나요??</a>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src=\"/vendor/jquery/jquery.min.js\"></script>
  <script src=\"/vendor/bootstrap/js/bootstrap.bundle.min.js\"></script>

  <!-- Core plugin JavaScript-->
  <script src=\"/vendor/jquery-easing/jquery.easing.min.js\"></script>

  <!-- POST value to make JSON -->
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
  <script type=\"text/javascript\">
  
  </script>
</body>

</html>
";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* */
/* <head>*/
/* */
/*   <meta charset="utf-8">*/
/*   <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">*/
/*   <meta name="description" content="">*/
/*   <meta name="author" content="">*/
/* */
/*   <title>Farm-ing Sign In</title>*/
/* */
/*   <!-- Custom fonts for this template-->*/
/*   <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">*/
/* */
/*   <!-- Custom styles for this template-->*/
/*   <link href="/css/sb-admin.css" rel="stylesheet">*/
/*   <style>*/
/*     body{*/
/*       background-image: url("http://13.125.112.70/main.png");*/
/*       background-size: 100% 100%;*/
/*     }*/
/*     </style>*/
/* */
/* </head>*/
/* */
/* <body class="bg-main">*/
/* */
/*   <div class="container">*/
/*     <div class="card card-login mx-auto mt-5" style="margin-top: 5px; padding: 30px;">*/
/*       <!--<div class="card-header">Farm-ing</div>-->*/
/*       <div  style="border-color: #ffffff;">*/
/*           <img src="http://13.125.112.70/mail_iconn.png" style="max-width: 100%; height: auto;">*/
/*           <img src="http://13.125.112.70/main_text.png" style="max-width: 100%; height: auto;">*/
/*        */
/*     </div>*/
/*       <div class="card-body">*/
/* */
/*         <form>*/
/*           <div class="form-group">*/
/*             <div class="form-label-group">*/
/*               <input type="email" name="email"id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">*/
/*               <label for="inputEmail">이메일 주소</label>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <div class="form-label-group">*/
/*               <input type="password" name ="pass" id="inputPassword" class="form-control" placeholder="Password" required="required">*/
/*               <label for="inputPassword">비밀번호</label>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <div class="checkbox">*/
/*               <label>*/
/*                 <input type="checkbox" value="remember-me">*/
/*                 비밀번호 저장*/
/*               </label>*/
/*             </div>*/
/*           </div>*/
/*           <a class="btn btn-primary btn-block" id="loginb">Login</a>*/
/*         </form>*/
/* */
/*         <script type="text/javascript">*/
/*           //When click the login btn*/
/*           document.getElementById("loginb").addEventListener('click', function(){*/
/*             // Check the value are all filled*/
/*             var email = $('input[name = email]').val();*/
/*             var pass = $('input[name = pass]').val();*/
/* */
/*             if(email == ""){*/
/*               alert("Please, Enter the email");*/
/*             }else if(pass == ""){*/
/*               alert("Please, Enter the password");*/
/*             }else{*/
/*               //send json*/
/*               $.ajax({*/
/*               method: "POST",*/
/*               url: "/signin_proc",*/
/*               data: {*/
/*                 "id": $('input[name = email]').val(),                */
/*                 "pw": $('input[name = pass]').val()                */
/*               }*/
/*               }).done(function( msg ) {*/
/*                   //If sign_up success, show up the sign in page*/
/*                   if(msg.message == 0){*/
/*                     //IF login success, get user's sensor data*/
/*                     $.ajax({*/
/*                       method: "POST",*/
/*                       url: "/sensorList",*/
/*                       data: {*/
/*                         "usn": msg.usn                */
/*                       }*/
/*                     }).done(function( msg ) {                  */
/*                       //Get usn and is_admin*/
/*                       sessionStorage.setItem("sensor", JSON.stringify(msg.message));                      */
/*                     });         */
/*                     alert("Welcome!!");*/
/* */
/*                     //Create session*/
/*                     //Get usn and is_admin*/
/*                     sessionStorage.setItem("usn", msg.usn);*/
/*                     sessionStorage.setItem("name", msg.name);*/
/*                     sessionStorage.setItem("is_admin", msg.is_admin);*/
/* */
/*                     location.href = "/maps";*/
/*                   }*/
/*                   if(msg.message == 1){*/
/*                     alert("비밀번호를 다시 확인해 주세요.");*/
/*                     location.href = "/";*/
/*                   }*/
/*                   if(msg.message == 2){*/
/*                     alert("우리의 회원이 아닙니다. 회원가입을 추천합니다.");*/
/*                     location.href = "/register_email";*/
/*                   }*/
/*                   if(msg.message == 3){*/
/*                     alert("당신은 아직 이메일을 인증하지 않았습니다. 이메일을 확인해 주세요.");*/
/*                     location.href = "/";*/
/*                   }*/
/*               });*/
/*             }*/
/*           });*/
/*         </script>*/
/*         <div class="text-left" >*/
/*           <a class="d-block small mt-3" href="/register_email">지금 가입하시겠습니까??</a>*/
/*         </div>*/
/*         <div class="text-left" >*/
/*             <a class="d-block small" href="/forgot-password">비밀번호를 잊으셨나요??</a>*/
/*         </div>*/
/*         */
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* */
/*   <!-- Bootstrap core JavaScript-->*/
/*   <script src="/vendor/jquery/jquery.min.js"></script>*/
/*   <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>*/
/* */
/*   <!-- Core plugin JavaScript-->*/
/*   <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>*/
/* */
/*   <!-- POST value to make JSON -->*/
/*   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>*/
/*   <script type="text/javascript">*/
/*   */
/*   </script>*/
/* </body>*/
/* */
/* </html>*/
/* */
