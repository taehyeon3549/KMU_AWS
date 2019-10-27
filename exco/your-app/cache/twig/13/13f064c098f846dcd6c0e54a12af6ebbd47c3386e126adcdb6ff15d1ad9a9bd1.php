<?php

/* change-idcancellation.html */
class __TwigTemplate_c8a0a3c471b9fcb56d167aa21d3868a0d5374d160598079c2593bfe1f4e94c87 extends Twig_Template
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
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>
  <script>
      \$(document).ready(function(){
          \$(\"#inputemail\").val(email);
          \$(\"#inputPassword\").val(password);
      });
    </script>
  <script>
    var usn = sessionStorage.getItem('usn');
    var password = sessionStorage.getItem('password');

    var url = \"/userinfo/\" + usn;

    \$.ajax({
      method: \"GET\",
      //url: \"/userinfo/\"+usn,
      url: url,
      data: {
        }
    }).done(function (msg) {
      console.log(msg);
      email = msg.email;
      password = msg.password;
    });
  </script>
</head>
</head>

<body id=\"page-top\">
  <nav class=\"navbar navbar-expand navbar-dark bg-dark static-top\">
      <img src=\"http://teamc-iot.calit2.net/mail_iconn.png\" style=\"height: 48px; width:100px;background-color: #01dea5;\">
    <a class=\"navbar-brand mr-1\" href=\"/main\">Farm-ing</a>
    <button class=\"btn btn-link btn-sm text-white order-1 order-sm-0\" id=\"sidebarToggle\" href=\"#\">
      <i class=\"fas fa-bars\"></i>
    </button>
    <form class=\"d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0\">
      <div class=\"input-group\">
        <div class=\"input-group-append\"></div>
      </div>
    </form>
    <!-- Navbar -->
    <ul class=\"navbar-nav ml-auto ml-md-0\">
      <li class=\"nav-item dropdown no-arrow\">
        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"userDropdown\" role=\"button\" data-toggle=\"dropdown\"
          aria-haspopup=\"true\" aria-expanded=\"false\">
          <i class=\"fas fa-user-circle fa-fw\"></i>
        </a>
        <!-- user icon-->
        <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"userDropdown\">
          <a>Hi,
            <script>
              var name = sessionStorage.getItem('name');
              document.write(name);
            </script>
          </a>!!
          <div class=\"dropdown-divider\"></div>
          <a class=\"dropdown-item\" data-toggle=\"modal\" data-target=\"#logoutModal\">Logout</a>
        </div>
      </li>
    </ul>
  </nav>

  <div id=\"wrapper\">
    <!-- Sidebar -->
    <ul class=\"sidebar navbar-nav\">
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"/main\">
          <i class=\"fas fa-fw fa-tachometer-alt\"></i>
          <span>Main</span>
        </a>
      </li>
      <li class=\"nav-item dropdown\">
        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"pagesDropdown\" role=\"button\" data-toggle=\"dropdown\"
          aria-haspopup=\"true\" aria-expanded=\"false\">
          <i class=\"fas fa-fw fa-folder\"></i>
          <span>Information</span>
        </a>
        <div class=\"dropdown-menu\" aria-labelledby=\"pagesDropdown\">
          <a class=\"dropdown-item\" id=\"myaccountb\" href=\"/myaccount\">My Account</a>
          <!-- <a class=\"dropdown-item\" href=\"/change_password\">Change Password</a> -->
          <a class=\"dropdown-item\" id=\"signoutb\" href=\"#\" data-toggle=\"modal\" data-target=\"#logoutModal\">Log Out</a>
          <a class=\"dropdown-item\" href=\"/change_idcancellation\">ID Cancellation</a>
        </div>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/charts\">
          <i class=\"fas fa-fw fa-chart-area\"></i>
          <span>Charts</span></a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/maps\">
          <i class=\"fas fa-fw fa-chart-area\"></i>
          <span>Map</span></a>
      </li>
    </ul>

  <div class=\"container\">
    <div class=\"card card-login mx-auto mt-5\">
      <div class=\"card-header\">ID Cancellation</div>
      <div class=\"card-body\">
        <div class=\"text-center mb-4\">
          <h4>Verify Password</h4>
          <p>Enter your current password to certification</p>
        </div>
        <form>
          <div class=\"form-group\">
            <div class=\"form-label-group\">
              <input type=\"password\" name =\"inpassword\" id=\"inpassword\" class=\"form-control\" placeholder=\"Enter your password\" required=\"required\" autofocus=\"autofocus\">
              <label for=\"inpassword\">Enter your password</label>
            </div>
          </div>
          <a class=\"btn btn-primary btn-block\" id = \"delete_check\">Verify</a>
        </form>
        <script type=\"text/javascript\">
          //verify클릭
          document.getElementById(\"delete_check\").addEventListener('click', function(){
            // Check the value are all filled
            var usn = sessionStorage.getItem('usn');
            var inpassword = \$('input[name = inpassword]').val();
            if(inpassword == \"\"){
              alert(\"Please, Enter your password\");
            }else{
              //send json
              \$.ajax({
              method: \"POST\",
              url: \"/delete_account_check\",
              data: {
                \"usn\": usn,
                \"password\": inpassword
              }
            }).done(function( msg ) {
                  //If sign_up success, show up the sign in page
                  if(msg.message == 0){
                    alert(\"Password correct.\");
                    location.href = \"/confirm_idcancellation\";
                  }
                  if(msg.message == 1){
                    alert(\"Password not correct\");
                    location.href = \"/change_idcancellation\";
                  }
                  if(msg.message == 2){
                    alert(\"Sorry, we can't send a email to you.\\n Could you try one more?\");
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
        return "change-idcancellation.html";
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
/*   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>*/
/*   <script>*/
/*       $(document).ready(function(){*/
/*           $("#inputemail").val(email);*/
/*           $("#inputPassword").val(password);*/
/*       });*/
/*     </script>*/
/*   <script>*/
/*     var usn = sessionStorage.getItem('usn');*/
/*     var password = sessionStorage.getItem('password');*/
/* */
/*     var url = "/userinfo/" + usn;*/
/* */
/*     $.ajax({*/
/*       method: "GET",*/
/*       //url: "/userinfo/"+usn,*/
/*       url: url,*/
/*       data: {*/
/*         }*/
/*     }).done(function (msg) {*/
/*       console.log(msg);*/
/*       email = msg.email;*/
/*       password = msg.password;*/
/*     });*/
/*   </script>*/
/* </head>*/
/* </head>*/
/* */
/* <body id="page-top">*/
/*   <nav class="navbar navbar-expand navbar-dark bg-dark static-top">*/
/*       <img src="http://teamc-iot.calit2.net/mail_iconn.png" style="height: 48px; width:100px;background-color: #01dea5;">*/
/*     <a class="navbar-brand mr-1" href="/main">Farm-ing</a>*/
/*     <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">*/
/*       <i class="fas fa-bars"></i>*/
/*     </button>*/
/*     <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">*/
/*       <div class="input-group">*/
/*         <div class="input-group-append"></div>*/
/*       </div>*/
/*     </form>*/
/*     <!-- Navbar -->*/
/*     <ul class="navbar-nav ml-auto ml-md-0">*/
/*       <li class="nav-item dropdown no-arrow">*/
/*         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"*/
/*           aria-haspopup="true" aria-expanded="false">*/
/*           <i class="fas fa-user-circle fa-fw"></i>*/
/*         </a>*/
/*         <!-- user icon-->*/
/*         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">*/
/*           <a>Hi,*/
/*             <script>*/
/*               var name = sessionStorage.getItem('name');*/
/*               document.write(name);*/
/*             </script>*/
/*           </a>!!*/
/*           <div class="dropdown-divider"></div>*/
/*           <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">Logout</a>*/
/*         </div>*/
/*       </li>*/
/*     </ul>*/
/*   </nav>*/
/* */
/*   <div id="wrapper">*/
/*     <!-- Sidebar -->*/
/*     <ul class="sidebar navbar-nav">*/
/*       <li class="nav-item active">*/
/*         <a class="nav-link" href="/main">*/
/*           <i class="fas fa-fw fa-tachometer-alt"></i>*/
/*           <span>Main</span>*/
/*         </a>*/
/*       </li>*/
/*       <li class="nav-item dropdown">*/
/*         <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"*/
/*           aria-haspopup="true" aria-expanded="false">*/
/*           <i class="fas fa-fw fa-folder"></i>*/
/*           <span>Information</span>*/
/*         </a>*/
/*         <div class="dropdown-menu" aria-labelledby="pagesDropdown">*/
/*           <a class="dropdown-item" id="myaccountb" href="/myaccount">My Account</a>*/
/*           <!-- <a class="dropdown-item" href="/change_password">Change Password</a> -->*/
/*           <a class="dropdown-item" id="signoutb" href="#" data-toggle="modal" data-target="#logoutModal">Log Out</a>*/
/*           <a class="dropdown-item" href="/change_idcancellation">ID Cancellation</a>*/
/*         </div>*/
/*       </li>*/
/*       <li class="nav-item">*/
/*         <a class="nav-link" href="/charts">*/
/*           <i class="fas fa-fw fa-chart-area"></i>*/
/*           <span>Charts</span></a>*/
/*       </li>*/
/*       <li class="nav-item">*/
/*         <a class="nav-link" href="/maps">*/
/*           <i class="fas fa-fw fa-chart-area"></i>*/
/*           <span>Map</span></a>*/
/*       </li>*/
/*     </ul>*/
/* */
/*   <div class="container">*/
/*     <div class="card card-login mx-auto mt-5">*/
/*       <div class="card-header">ID Cancellation</div>*/
/*       <div class="card-body">*/
/*         <div class="text-center mb-4">*/
/*           <h4>Verify Password</h4>*/
/*           <p>Enter your current password to certification</p>*/
/*         </div>*/
/*         <form>*/
/*           <div class="form-group">*/
/*             <div class="form-label-group">*/
/*               <input type="password" name ="inpassword" id="inpassword" class="form-control" placeholder="Enter your password" required="required" autofocus="autofocus">*/
/*               <label for="inpassword">Enter your password</label>*/
/*             </div>*/
/*           </div>*/
/*           <a class="btn btn-primary btn-block" id = "delete_check">Verify</a>*/
/*         </form>*/
/*         <script type="text/javascript">*/
/*           //verify클릭*/
/*           document.getElementById("delete_check").addEventListener('click', function(){*/
/*             // Check the value are all filled*/
/*             var usn = sessionStorage.getItem('usn');*/
/*             var inpassword = $('input[name = inpassword]').val();*/
/*             if(inpassword == ""){*/
/*               alert("Please, Enter your password");*/
/*             }else{*/
/*               //send json*/
/*               $.ajax({*/
/*               method: "POST",*/
/*               url: "/delete_account_check",*/
/*               data: {*/
/*                 "usn": usn,*/
/*                 "password": inpassword*/
/*               }*/
/*             }).done(function( msg ) {*/
/*                   //If sign_up success, show up the sign in page*/
/*                   if(msg.message == 0){*/
/*                     alert("Password correct.");*/
/*                     location.href = "/confirm_idcancellation";*/
/*                   }*/
/*                   if(msg.message == 1){*/
/*                     alert("Password not correct");*/
/*                     location.href = "/change_idcancellation";*/
/*                   }*/
/*                   if(msg.message == 2){*/
/*                     alert("Sorry, we can't send a email to you.\n Could you try one more?");*/
/*                   }*/
/*               });*/
/*             }*/
/*           });*/
/*         </script>*/
/* */
/* */
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
