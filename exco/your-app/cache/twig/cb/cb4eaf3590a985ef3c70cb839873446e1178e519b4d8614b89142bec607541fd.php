<?php

/* new-password.twig */
class __TwigTemplate_26f3fa7abd2bf42ec32c81640f67e138df042e7076484c615ee98809eae6380d extends Twig_Template
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

  <title>Changing Pw</title>

  <!-- Custom fonts for this template-->
  <link href=\"/vendor/fontawesome-free/css/all.min.css\" rel=\"stylesheet\" type=\"text/css\">

  <!-- Custom styles for this template-->
  <link href=\"/css/sb-admin.css\" rel=\"stylesheet\">

</head>

<body class=\"bg-dark\">

  <div class=\"container\">
    <div class=\"card card-login mx-auto mt-5\">
      <div class=\"card-header\">Reset Password</div>
      <div class=\"card-body\">
        <div class=\"text-center mb-4\">
          <h4>Change Password</h4>
          <p>Enter your new password to change</p>
        </div>
        <form>
          <div class=\"form-group\">
            <div class=\"form-label-group\">
              <input type=\"password\" name = \"inputpass\" id=\"inputpass\" class=\"form-control\" placeholder=\"Enter new password\" required=\"required\" autofocus=\"autofocus\">
              <label for=\"inputpass\">Enter new password</label>
            </div>
            <div class=\"form-label-group\">
                <input type=\"password\" name = \"inputconfirmpass\" id=\"inputconfirmpass\" class=\"form-control\" placeholder=\"Enter confirm password\" required=\"required\" autofocus=\"autofocus\">
                <label for=\"inputconfirmpass\">Enter confirm password</label>
            </div>
          </div>
          <a class=\"btn btn-primary btn-block\" id=\"changepwb\">Change</a>
        </form>
        <script type=\"text/javascript\">
          document.getElementById(\"changepwb\").addEventListener('click', function(){
            var certi_code = \"";
        // line 47
        echo twig_escape_filter($this->env, (isset($context["code"]) ? $context["code"] : null), "html", null, true);
        echo "\";
            var usn = \"";
        // line 48
        echo twig_escape_filter($this->env, (isset($context["usn"]) ? $context["usn"] : null), "html", null, true);
        echo "\";

            var password = \$('input[name = inputpass]').val();
            var repassword = \$('input[name = inputconfirmpass]').val();

            if(password == \"\"){
              alert(\"Please, Enter your password\");
            }else if(repassword == \"\"){
              alert(\"Please, Enter your repassword\");
            }else if(password != repassword){
              alert(\"Passwords are not correct! Please check one more.\");
            }else{
              //send json
              \$.ajax({
              method: \"POST\",
              url: \"/change_password\",
              data: {
                \"usn\": usn,
                \"password\": password               
              }
              }).done(function( msg ) {
                  //If sign_up success, show up the sign in page
                  if(msg.message == 0){
                    alert(\"Your password is changed!!\");
                    location.href = \"/\";
                  }
                  if(msg.message == 1){
                    alert(\"Sorry, error is happend. Could you try again?\");
                    location.href = \"/\";
                  }                 
              });         
            }
          });
        </script>
        <div class=\"text-center\">
          <a class=\"d-block small mt-3\" href=\"/register_email\">Register an Account</a>
          <a class=\"d-block small\" href=\"/\">Login Page</a>
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
        return "new-password.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 48,  67 => 47,  19 => 1,);
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
/*   <title>Changing Pw</title>*/
/* */
/*   <!-- Custom fonts for this template-->*/
/*   <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">*/
/* */
/*   <!-- Custom styles for this template-->*/
/*   <link href="/css/sb-admin.css" rel="stylesheet">*/
/* */
/* </head>*/
/* */
/* <body class="bg-dark">*/
/* */
/*   <div class="container">*/
/*     <div class="card card-login mx-auto mt-5">*/
/*       <div class="card-header">Reset Password</div>*/
/*       <div class="card-body">*/
/*         <div class="text-center mb-4">*/
/*           <h4>Change Password</h4>*/
/*           <p>Enter your new password to change</p>*/
/*         </div>*/
/*         <form>*/
/*           <div class="form-group">*/
/*             <div class="form-label-group">*/
/*               <input type="password" name = "inputpass" id="inputpass" class="form-control" placeholder="Enter new password" required="required" autofocus="autofocus">*/
/*               <label for="inputpass">Enter new password</label>*/
/*             </div>*/
/*             <div class="form-label-group">*/
/*                 <input type="password" name = "inputconfirmpass" id="inputconfirmpass" class="form-control" placeholder="Enter confirm password" required="required" autofocus="autofocus">*/
/*                 <label for="inputconfirmpass">Enter confirm password</label>*/
/*             </div>*/
/*           </div>*/
/*           <a class="btn btn-primary btn-block" id="changepwb">Change</a>*/
/*         </form>*/
/*         <script type="text/javascript">*/
/*           document.getElementById("changepwb").addEventListener('click', function(){*/
/*             var certi_code = "{{code}}";*/
/*             var usn = "{{usn}}";*/
/* */
/*             var password = $('input[name = inputpass]').val();*/
/*             var repassword = $('input[name = inputconfirmpass]').val();*/
/* */
/*             if(password == ""){*/
/*               alert("Please, Enter your password");*/
/*             }else if(repassword == ""){*/
/*               alert("Please, Enter your repassword");*/
/*             }else if(password != repassword){*/
/*               alert("Passwords are not correct! Please check one more.");*/
/*             }else{*/
/*               //send json*/
/*               $.ajax({*/
/*               method: "POST",*/
/*               url: "/change_password",*/
/*               data: {*/
/*                 "usn": usn,*/
/*                 "password": password               */
/*               }*/
/*               }).done(function( msg ) {*/
/*                   //If sign_up success, show up the sign in page*/
/*                   if(msg.message == 0){*/
/*                     alert("Your password is changed!!");*/
/*                     location.href = "/";*/
/*                   }*/
/*                   if(msg.message == 1){*/
/*                     alert("Sorry, error is happend. Could you try again?");*/
/*                     location.href = "/";*/
/*                   }                 */
/*               });         */
/*             }*/
/*           });*/
/*         </script>*/
/*         <div class="text-center">*/
/*           <a class="d-block small mt-3" href="/register_email">Register an Account</a>*/
/*           <a class="d-block small" href="/">Login Page</a>*/
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
