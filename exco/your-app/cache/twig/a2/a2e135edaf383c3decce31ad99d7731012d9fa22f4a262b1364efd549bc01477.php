<?php

/* register.twig */
class __TwigTemplate_39bed4abda6a040347657946f96b97d801e7b670c5d49b4bf82472a28dd876c2 extends Twig_Template
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
        echo "<html lang=\"en\">

<head>

  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  <meta name=\"description\" content=\"\">
  <meta name=\"author\" content=\"\">

  <title>Sign Up</title>

  <!-- Custom fonts for this template-->
  <link href=\"/vendor/fontawesome-free/css/all.min.css\" rel=\"stylesheet\" type=\"text/css\">

  <!-- Custom styles for this template-->
  <link href=\"/css/sb-admin.css\" rel=\"stylesheet\">




  <link rel=\"stylesheet\" href=\"http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css\">
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js\"></script>
  <script src=\"http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js\"></script>


  <style>
      body {
        background-image: url(\"http://13.125.112.70/main.png\");
        background-size: 100% 100%;
      }
    </style>

</head>

<body class=\"bg-dark\">
  <div class=\"container\">
    <div class=\"card card-register mx-auto mt-5\">
      <div class=\"card-header\">회원가입</div>
      <div class=\"card-body\">
        <form>
          <div class=\"form-group\">
            <div class=\"form-label-group\">
              <input type=\"email\" name= \"email\" id=\"inputEmail\" class=\"form-control\" placeholder=\"Email address\" required=\"required\" value=";
        // line 44
        echo twig_escape_filter($this->env, (isset($context["email"]) ? $context["email"] : null), "html", null, true);
        echo ">
              <?php
                echo(\$email);
              ?>
              <label for=\"inputEmail\">이메일 주소</label>
            </div>
          </div>
          <div class=\"form-group\">
            <div class=\"form-row\">
              <div class=\"col-md-6\">
                <div class=\"form-label-group\">
                  <input type=\"text\" name = \"firstName\" id=\"firstName\" class=\"form-control\" placeholder=\"First name\" required=\"required\" autofocus=\"autofocus\">
                  <label for=\"firstName\">성</label>
                </div>
              </div>
              <div class=\"col-md-6\">
                <div class=\"form-label-group\">
                  <input type=\"text\" name = \"lastName\" id=\"lastName\" class=\"form-control\" placeholder=\"Last name\" required=\"required\">
                  <label for=\"lastName\">이름</label>
                </div>
              </div>
            </div>
          </div>
          <div class=\"form-group\">
            <div class=\"form-row\">
              <div class=\"col-md-6\">
                <div class=\"form-label-group\">
                  <input type=\"password\" name = \"inputPassword\" id=\"inputPassword\" class=\"form-control\" placeholder=\"Password\" required=\"required\">
                  <label for=\"inputPassword\">비밀번호</label>
                </div>
              </div>
              <div class=\"col-md-6\">
                <div class=\"form-label-group\">
                  <input type=\"password\" name = \"confirmPassword\" id=\"confirmPassword\" class=\"form-control\" placeholder=\"Confirm password\" required=\"required\">
                  <label for=\"confirmPassword\">비밀번호 확인</label>
                </div>
              </div>
            </div>
          </div>
          <div class=\"form-group\">
            <div class=\"form-row\">
              <div class=\"col-md-6\">
                <div class=\"form-label-group\">
                  <input type=\"date\" name = \"Birth\" id=\"Birth\" class=\"form-control\" required=\"required\" autofocus=\"autofocus\" style=\"padding-top: 0px; padding-left: 0px; padding-right: 0px; padding-bottom: 0px;\">
                </div>
              </div>            
              <div class=\"col-md-6\">
                <div class=\"form-label-group\" style=\"padding-bottom: 5px; padding-top: 8px;\">
                  <input type=\"radio\" name =\"gender\" value ='0'>남
\t\t\t\t\t\t      <input type=\"radio\" name =\"gender\" value ='1'>여자\t\t\t\t\t\t
                </div>
              </div>
            </div>
          </div>
          <div class=\"form-group\">
            <div class=\"form-row\">
              <div class=\"col-md-6\">
                <div class=\"form-label-group\">
                  <input type=\"phone\" name = \"emergencycall\" id=\"emergencycall\" class=\"form-control\" placeholder=\"Emergency Call\" required=\"required\">
                  <label for=\"emergencycall\">전화번호 </label>
                </div>
              </div>
            </div>
          </div>
          <a class=\"btn btn-primary btn-block\" id = \"registerb\">등록</a>
        </form>
        <div class=\"text-center\">
          <a class=\"d-block small mt-3\" href=\"/\">로그인 페이지</a>
          <a class=\"d-block small\" href=\"/forgot-password\">비밀번호를 잊었나요?</a>
        </div>

        <!-- Button Action -->
        <script type=\"text/javascript\">
          document.getElementById(\"registerb\").addEventListener('click', function(){
            // Check the value are all filled
            var firstName = \$('input[name = firstName]').val();
            var lastName = \$('input[name = lastName]').val();
            var inputPassword = \$('input[name = inputPassword]').val();
            var confirmPassword = \$('input[name = confirmPassword]').val();
            var Birth = \$('input[name = Birth]').val();
            var gender = \$('input[name=gender]:checked').val();
            var emergency = \$('input[name = emergencycall]').val();

            if(firstName == \"\"){
              alert(\"성을 입력해 주세요.\");
            }else if(lastName == \"\"){
              alert(\"이름을 입력해 주세요.\");
            }else if(inputPassword == \"\"){
              alert(\"비밀번호를 입력해 주세요.\");
            }else if(confirmPassword == \"\"){
              alert(\"비밀번호 확인을 입력해 주세요.\");
            }else if(Birth == \"\"){
              alert(\"생년월일을 입력해 주세요.\");
            }else if(inputPassword != confirmPassword){
              alert(\"입력한 비밀번호가 일치하지 않습니다.\");
            }else{
              var name = firstName.concat(\"\", lastName);
              
              //send json
              \$.ajax({
              method: \"POST\",
              url: \"/signup_proc\",
              data: {
                \"id\": \$('input[name = email]').val(),                
                \"name\": name,
                \"password\": inputPassword,
                \"birth\": Birth,
                \"gender\": gender,
                \"emergency\": emergency               
              }
              }).done(function( msg ) {
                  //If sign_up success, show up the sign in page
                  if(msg.message == 0){
                    alert(\"환영합니다!! 지금부터 우리의 회원입니다.\");
                    location.href = \"/\";
                  }
                  if(msg.message == 1){
                    alert(\"당신은 이미 우리의 회원입니다!!\");
                    location.href = \"/\";
                  }
                  if(msg.message == 2){
                    alert(\"죄송합니다. 서버에 장애가 발생했습니다. 다시 회원가입을 진행해 주세요.\");
                    location.href = \"/sign_up\";
                  }
              });         
            }
          });       
        </script>
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

</html>
";
    }

    public function getTemplateName()
    {
        return "register.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 44,  19 => 1,);
    }
}
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
/*   <title>Sign Up</title>*/
/* */
/*   <!-- Custom fonts for this template-->*/
/*   <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">*/
/* */
/*   <!-- Custom styles for this template-->*/
/*   <link href="/css/sb-admin.css" rel="stylesheet">*/
/* */
/* */
/* */
/* */
/*   <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">*/
/*   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>*/
/*   <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>*/
/* */
/* */
/*   <style>*/
/*       body {*/
/*         background-image: url("http://13.125.112.70/main.png");*/
/*         background-size: 100% 100%;*/
/*       }*/
/*     </style>*/
/* */
/* </head>*/
/* */
/* <body class="bg-dark">*/
/*   <div class="container">*/
/*     <div class="card card-register mx-auto mt-5">*/
/*       <div class="card-header">회원가입</div>*/
/*       <div class="card-body">*/
/*         <form>*/
/*           <div class="form-group">*/
/*             <div class="form-label-group">*/
/*               <input type="email" name= "email" id="inputEmail" class="form-control" placeholder="Email address" required="required" value={{email}}>*/
/*               <?php*/
/*                 echo($email);*/
/*               ?>*/
/*               <label for="inputEmail">이메일 주소</label>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <div class="form-row">*/
/*               <div class="col-md-6">*/
/*                 <div class="form-label-group">*/
/*                   <input type="text" name = "firstName" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">*/
/*                   <label for="firstName">성</label>*/
/*                 </div>*/
/*               </div>*/
/*               <div class="col-md-6">*/
/*                 <div class="form-label-group">*/
/*                   <input type="text" name = "lastName" id="lastName" class="form-control" placeholder="Last name" required="required">*/
/*                   <label for="lastName">이름</label>*/
/*                 </div>*/
/*               </div>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <div class="form-row">*/
/*               <div class="col-md-6">*/
/*                 <div class="form-label-group">*/
/*                   <input type="password" name = "inputPassword" id="inputPassword" class="form-control" placeholder="Password" required="required">*/
/*                   <label for="inputPassword">비밀번호</label>*/
/*                 </div>*/
/*               </div>*/
/*               <div class="col-md-6">*/
/*                 <div class="form-label-group">*/
/*                   <input type="password" name = "confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">*/
/*                   <label for="confirmPassword">비밀번호 확인</label>*/
/*                 </div>*/
/*               </div>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <div class="form-row">*/
/*               <div class="col-md-6">*/
/*                 <div class="form-label-group">*/
/*                   <input type="date" name = "Birth" id="Birth" class="form-control" required="required" autofocus="autofocus" style="padding-top: 0px; padding-left: 0px; padding-right: 0px; padding-bottom: 0px;">*/
/*                 </div>*/
/*               </div>            */
/*               <div class="col-md-6">*/
/*                 <div class="form-label-group" style="padding-bottom: 5px; padding-top: 8px;">*/
/*                   <input type="radio" name ="gender" value ='0'>남*/
/* 						      <input type="radio" name ="gender" value ='1'>여자						*/
/*                 </div>*/
/*               </div>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <div class="form-row">*/
/*               <div class="col-md-6">*/
/*                 <div class="form-label-group">*/
/*                   <input type="phone" name = "emergencycall" id="emergencycall" class="form-control" placeholder="Emergency Call" required="required">*/
/*                   <label for="emergencycall">전화번호 </label>*/
/*                 </div>*/
/*               </div>*/
/*             </div>*/
/*           </div>*/
/*           <a class="btn btn-primary btn-block" id = "registerb">등록</a>*/
/*         </form>*/
/*         <div class="text-center">*/
/*           <a class="d-block small mt-3" href="/">로그인 페이지</a>*/
/*           <a class="d-block small" href="/forgot-password">비밀번호를 잊었나요?</a>*/
/*         </div>*/
/* */
/*         <!-- Button Action -->*/
/*         <script type="text/javascript">*/
/*           document.getElementById("registerb").addEventListener('click', function(){*/
/*             // Check the value are all filled*/
/*             var firstName = $('input[name = firstName]').val();*/
/*             var lastName = $('input[name = lastName]').val();*/
/*             var inputPassword = $('input[name = inputPassword]').val();*/
/*             var confirmPassword = $('input[name = confirmPassword]').val();*/
/*             var Birth = $('input[name = Birth]').val();*/
/*             var gender = $('input[name=gender]:checked').val();*/
/*             var emergency = $('input[name = emergencycall]').val();*/
/* */
/*             if(firstName == ""){*/
/*               alert("성을 입력해 주세요.");*/
/*             }else if(lastName == ""){*/
/*               alert("이름을 입력해 주세요.");*/
/*             }else if(inputPassword == ""){*/
/*               alert("비밀번호를 입력해 주세요.");*/
/*             }else if(confirmPassword == ""){*/
/*               alert("비밀번호 확인을 입력해 주세요.");*/
/*             }else if(Birth == ""){*/
/*               alert("생년월일을 입력해 주세요.");*/
/*             }else if(inputPassword != confirmPassword){*/
/*               alert("입력한 비밀번호가 일치하지 않습니다.");*/
/*             }else{*/
/*               var name = firstName.concat("", lastName);*/
/*               */
/*               //send json*/
/*               $.ajax({*/
/*               method: "POST",*/
/*               url: "/signup_proc",*/
/*               data: {*/
/*                 "id": $('input[name = email]').val(),                */
/*                 "name": name,*/
/*                 "password": inputPassword,*/
/*                 "birth": Birth,*/
/*                 "gender": gender,*/
/*                 "emergency": emergency               */
/*               }*/
/*               }).done(function( msg ) {*/
/*                   //If sign_up success, show up the sign in page*/
/*                   if(msg.message == 0){*/
/*                     alert("환영합니다!! 지금부터 우리의 회원입니다.");*/
/*                     location.href = "/";*/
/*                   }*/
/*                   if(msg.message == 1){*/
/*                     alert("당신은 이미 우리의 회원입니다!!");*/
/*                     location.href = "/";*/
/*                   }*/
/*                   if(msg.message == 2){*/
/*                     alert("죄송합니다. 서버에 장애가 발생했습니다. 다시 회원가입을 진행해 주세요.");*/
/*                     location.href = "/sign_up";*/
/*                   }*/
/*               });         */
/*             }*/
/*           });       */
/*         </script>*/
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
/* */
