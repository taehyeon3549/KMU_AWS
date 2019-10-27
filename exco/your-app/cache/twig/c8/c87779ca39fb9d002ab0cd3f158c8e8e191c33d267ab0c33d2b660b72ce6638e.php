<?php

/* confirm-idcancellation.html */
class __TwigTemplate_240ac3e3b79fd730d48ece11f9ef5b46ee4d5728d0093834f1b15951b7ee0490 extends Twig_Template
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

  <title>ID Cancellation</title>

  <!-- Custom fonts for this template-->
  <link href=\"vendor/fontawesome-free/css/all.min.css\" rel=\"stylesheet\" type=\"text/css\">

  <!-- Custom styles for this template-->
  <link href=\"css/sb-admin.css\" rel=\"stylesheet\">

</head>

<body class=\"bg-dark\">

  <div class=\"container\">
    <div class=\"card card-login mx-auto mt-5\">
      <div class=\"card-header\">ID Cancellation</div>
      <div class=\"card-body\">
        <div class=\"text-center mb-4\">
          <h4>Are you sure you want to delete your account?</h4>
          <p>If sure, your account will be completely deleted</p>
        </div>
        <form>
          <div class=\"form-group\">
          </div>
          <a class=\"btn btn-primary btn-block\" id=\"signoutbb\">Sure</a>
        </form>
        <script type=\"text/javascript\">

          document.getElementById(\"signoutbb\").addEventListener('click', function(){

            var usn = sessionStorage.getItem('usn');

            if(usn == \"\"){
              alert(\"에러다\");
            }else{
              //send json
              \$.ajax({
              method: \"POST\",
              url: \"/delete_account\",
              data: {
                \"usn\": usn,
              }
            }).done(function(msg) {
                alert(\"Delete User data faidddddl\");
                  //If sign_up success, show up the sign in page
                  if(msg.message == 0){
                    alert(\"Delete User data success\");
                  //  alert(\"Thanks for using our web. We hope to see you again later.\");
                    location.href = \"/\";
                  }
                  if(msg.message == 1){
                    alert(\"Delete User data fail\");
                    location.href = \"/confirm_idcancellation\";
                  }
                  if(msg.message == 2){
                    alert(\"Delete polar data fail\");
                    location.href = \"/confirm_idcancellation\";
                  }
                  if(msg.message == 3){
                    alert(\"Delete air data fail\");
                    location.href = \"/confirm_idcancellation\";
                  }
                  if(msg.message == 4){
                    alert(\"Delete sensor data fail\");
                    location.href = \"/confirm_idcancellation\";
                  }
                  if(msg.message == 5){
                    alert(\"Delete User data fail\");
                    location.href = \"/confirm_idcancellation\";
                  }

              });
            }
          });
        </script>
        <div class=\"text-center\">
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src=\"vendor/jquery/jquery.min.js\"></script>
  <script src=\"vendor/bootstrap/js/bootstrap.bundle.min.js\"></script>

  <!-- Core plugin JavaScript-->
  <script src=\"vendor/jquery-easing/jquery.easing.min.js\"></script>

</body>

</html>
";
    }

    public function getTemplateName()
    {
        return "confirm-idcancellation.html";
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
/*   <title>ID Cancellation</title>*/
/* */
/*   <!-- Custom fonts for this template-->*/
/*   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">*/
/* */
/*   <!-- Custom styles for this template-->*/
/*   <link href="css/sb-admin.css" rel="stylesheet">*/
/* */
/* </head>*/
/* */
/* <body class="bg-dark">*/
/* */
/*   <div class="container">*/
/*     <div class="card card-login mx-auto mt-5">*/
/*       <div class="card-header">ID Cancellation</div>*/
/*       <div class="card-body">*/
/*         <div class="text-center mb-4">*/
/*           <h4>Are you sure you want to delete your account?</h4>*/
/*           <p>If sure, your account will be completely deleted</p>*/
/*         </div>*/
/*         <form>*/
/*           <div class="form-group">*/
/*           </div>*/
/*           <a class="btn btn-primary btn-block" id="signoutbb">Sure</a>*/
/*         </form>*/
/*         <script type="text/javascript">*/
/* */
/*           document.getElementById("signoutbb").addEventListener('click', function(){*/
/* */
/*             var usn = sessionStorage.getItem('usn');*/
/* */
/*             if(usn == ""){*/
/*               alert("에러다");*/
/*             }else{*/
/*               //send json*/
/*               $.ajax({*/
/*               method: "POST",*/
/*               url: "/delete_account",*/
/*               data: {*/
/*                 "usn": usn,*/
/*               }*/
/*             }).done(function(msg) {*/
/*                 alert("Delete User data faidddddl");*/
/*                   //If sign_up success, show up the sign in page*/
/*                   if(msg.message == 0){*/
/*                     alert("Delete User data success");*/
/*                   //  alert("Thanks for using our web. We hope to see you again later.");*/
/*                     location.href = "/";*/
/*                   }*/
/*                   if(msg.message == 1){*/
/*                     alert("Delete User data fail");*/
/*                     location.href = "/confirm_idcancellation";*/
/*                   }*/
/*                   if(msg.message == 2){*/
/*                     alert("Delete polar data fail");*/
/*                     location.href = "/confirm_idcancellation";*/
/*                   }*/
/*                   if(msg.message == 3){*/
/*                     alert("Delete air data fail");*/
/*                     location.href = "/confirm_idcancellation";*/
/*                   }*/
/*                   if(msg.message == 4){*/
/*                     alert("Delete sensor data fail");*/
/*                     location.href = "/confirm_idcancellation";*/
/*                   }*/
/*                   if(msg.message == 5){*/
/*                     alert("Delete User data fail");*/
/*                     location.href = "/confirm_idcancellation";*/
/*                   }*/
/* */
/*               });*/
/*             }*/
/*           });*/
/*         </script>*/
/*         <div class="text-center">*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* */
/*   <!-- Bootstrap core JavaScript-->*/
/*   <script src="vendor/jquery/jquery.min.js"></script>*/
/*   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>*/
/* */
/*   <!-- Core plugin JavaScript-->*/
/*   <script src="vendor/jquery-easing/jquery.easing.min.js"></script>*/
/* */
/* </body>*/
/* */
/* </html>*/
/* */
