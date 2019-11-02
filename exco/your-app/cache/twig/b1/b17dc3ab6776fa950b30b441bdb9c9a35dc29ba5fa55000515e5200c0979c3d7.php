<?php

/* forgot-password.html */
class __TwigTemplate_d14d65f01c58b3720dde430a5f9a2cd1aa7849bb81840cf56ce3b78549b1fbfe extends Twig_Template
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

  <title>Farming - Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href=\"/vendor/fontawesome-free/css/all.min.css\" rel=\"stylesheet\" type=\"text/css\">

  <!-- Custom styles for this template-->
  <link href=\"/css/sb-admin.css\" rel=\"stylesheet\">
  <style>
      body {
        background-image: url(\"http://13.125.112.70/main.png\");
        background-size: 100% 100%;
      }
    </style>
</head>

<body class=\"bg-main\">
  <div class=\"container\"> 
    <div class=\"card card-login mx-auto mt-3\" style=\"margin-top: 5px;\">
      <!--<div class=\"card-header\">비밀번호 초기화</div>-->
      <div style=\"border-color: #ffffff;\">
          <img src=\"http://13.125.112.70/mail_iconn.png\" style=\"max-width: 100%; height: auto;\">
          <img src=\"http://13.125.112.70/main_text.png\" style=\"max-width: 100%; height: auto;\">
  
        </div>
      <div class=\"card-body\">
        <div class=\"text-center mb-4\">
          <h4>비밀번호를 잊으셨나요?</h4>
          <p>이메일 주소를 입력하면 비밀번호를 재설정하는 방법에 대한 방법을 보내드립니다.</p>
        </div>
        <form>
          <div class=\"form-group\">
            <div class=\"form-label-group\">
              <input type=\"email\" name=\"email\" id=\"inputEmail\" class=\"form-control\" placeholder=\"Enter email address\"
                required=\"required\" autofocus=\"autofocus\">
              <label for=\"inputEmail\">이메일 주소</label>
            </div>
            <div class=\"form-label-group\">
              <input type=\"date\" name=\"birth\" id=\"birth\" class=\"form-control\" required=\"required\" autofocus=\"autofocus\">
              <label for=\"birth\">생년월일</label>
            </div>
          </div>
          <a class=\"btn btn-primary btn-block\" id=\"repassb\">비밀번호 초기화</a>
        </form>

        <script type=\"text/javascript\">
          //When click the reset btn
          document.getElementById(\"repassb\").addEventListener('click', function () {
            // Check the value are all filled
            var email = \$('input[name = email]').val();
            var birth = \$('input[name = birth]').val();

            if (email == \"\") {
              alert(\"이메일을 입력해 주세요.\");
            } else if (birth == \"\") {
              alert(\"생년월일을 입력해 주세요.\");
            } else {
              //send json
              \$.ajax({
                method: \"POST\",
                url: \"/forgot_password_check\",
                data: {
                  \"id\": email,
                  \"birth\": birth
                }
              }).done(function (msg) {
                //If sign_up success, show up the sign in page
                if (msg.message == 0) {
                  alert(\"비밀번호 재설정 이메일을 보냈습니다. 확인해 주세요.\");
                  location.href = \"/\";
                }
                if (msg.message == 1) {
                  alert(\"우리의 회원이 아닙니다.!!\");
                  location.href = \"/register_email\";
                }
                if (msg.message == 2) {
                  alert(\"죄송합ㄴ디ㅏ. 이메일을 보낼 수 없습니다.\\n 다시 하겠습니까?\");
                }
              });
            }
          });
        </script>

        <div class=\"text-left\">
          <a class=\"d-block small mt-3\" href=\"/register_email\">지금 가입하시겠습니까??</a>
        </div>
        <div class=\"text-left\">
          <a class=\"d-block small mt-3\" href=\"/\">로그인 하시겠습니까??</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src=\"/vendor/jquery/jquery.min.js\"></script>
  <script src=\"/vendor/bootstrap/js/bootstrap.bundle.min.js\"></script>

  <!-- Core plugin JavaScript-->
  <script src=\"/vendor/jquery-easing/jquery.easing.min.js\"></script>

</body>

</html>";
    }

    public function getTemplateName()
    {
        return "forgot-password.html";
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
/*   <title>Farming - Forgot Password</title>*/
/* */
/*   <!-- Custom fonts for this template-->*/
/*   <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">*/
/* */
/*   <!-- Custom styles for this template-->*/
/*   <link href="/css/sb-admin.css" rel="stylesheet">*/
/*   <style>*/
/*       body {*/
/*         background-image: url("http://13.125.112.70/main.png");*/
/*         background-size: 100% 100%;*/
/*       }*/
/*     </style>*/
/* </head>*/
/* */
/* <body class="bg-main">*/
/*   <div class="container"> */
/*     <div class="card card-login mx-auto mt-3" style="margin-top: 5px;">*/
/*       <!--<div class="card-header">비밀번호 초기화</div>-->*/
/*       <div style="border-color: #ffffff;">*/
/*           <img src="http://13.125.112.70/mail_iconn.png" style="max-width: 100%; height: auto;">*/
/*           <img src="http://13.125.112.70/main_text.png" style="max-width: 100%; height: auto;">*/
/*   */
/*         </div>*/
/*       <div class="card-body">*/
/*         <div class="text-center mb-4">*/
/*           <h4>비밀번호를 잊으셨나요?</h4>*/
/*           <p>이메일 주소를 입력하면 비밀번호를 재설정하는 방법에 대한 방법을 보내드립니다.</p>*/
/*         </div>*/
/*         <form>*/
/*           <div class="form-group">*/
/*             <div class="form-label-group">*/
/*               <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Enter email address"*/
/*                 required="required" autofocus="autofocus">*/
/*               <label for="inputEmail">이메일 주소</label>*/
/*             </div>*/
/*             <div class="form-label-group">*/
/*               <input type="date" name="birth" id="birth" class="form-control" required="required" autofocus="autofocus">*/
/*               <label for="birth">생년월일</label>*/
/*             </div>*/
/*           </div>*/
/*           <a class="btn btn-primary btn-block" id="repassb">비밀번호 초기화</a>*/
/*         </form>*/
/* */
/*         <script type="text/javascript">*/
/*           //When click the reset btn*/
/*           document.getElementById("repassb").addEventListener('click', function () {*/
/*             // Check the value are all filled*/
/*             var email = $('input[name = email]').val();*/
/*             var birth = $('input[name = birth]').val();*/
/* */
/*             if (email == "") {*/
/*               alert("이메일을 입력해 주세요.");*/
/*             } else if (birth == "") {*/
/*               alert("생년월일을 입력해 주세요.");*/
/*             } else {*/
/*               //send json*/
/*               $.ajax({*/
/*                 method: "POST",*/
/*                 url: "/forgot_password_check",*/
/*                 data: {*/
/*                   "id": email,*/
/*                   "birth": birth*/
/*                 }*/
/*               }).done(function (msg) {*/
/*                 //If sign_up success, show up the sign in page*/
/*                 if (msg.message == 0) {*/
/*                   alert("비밀번호 재설정 이메일을 보냈습니다. 확인해 주세요.");*/
/*                   location.href = "/";*/
/*                 }*/
/*                 if (msg.message == 1) {*/
/*                   alert("우리의 회원이 아닙니다.!!");*/
/*                   location.href = "/register_email";*/
/*                 }*/
/*                 if (msg.message == 2) {*/
/*                   alert("죄송합ㄴ디ㅏ. 이메일을 보낼 수 없습니다.\n 다시 하겠습니까?");*/
/*                 }*/
/*               });*/
/*             }*/
/*           });*/
/*         </script>*/
/* */
/*         <div class="text-left">*/
/*           <a class="d-block small mt-3" href="/register_email">지금 가입하시겠습니까??</a>*/
/*         </div>*/
/*         <div class="text-left">*/
/*           <a class="d-block small mt-3" href="/">로그인 하시겠습니까??</a>*/
/*         </div>*/
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
/* </body>*/
/* */
/* </html>*/
