<?php

/* change-password.html */
class __TwigTemplate_5291baa5fc4b93a96bf45e656411f1db89061ebd96573d66910e48fed3d06a39 extends Twig_Template
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
        <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"userDropdown\">
          <div class=\"dropdown-divider\"></div>
          <a class=\"dropdown-item\" href=\"#\" data-toggle=\"modal\" data-target=\"#logoutModal\">Logout</a>
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

    <div id=\"content-wrapper\">
      <div class=\"container-fluid\">
        <div class=\"container\">
          <div class=\"card card-login mx-auto mt-5\">
            <div class=\"card-header\">Reset Password</div>
            <div class=\"card-body\">
              <div class=\"text-center mb-4\">
                <h4>Change Password</h4>
                <p>Enter your current password to certification</p>
              </div>
              <form>
                <div class=\"form-group\">
                  <div class=\"form-label-group\">
                    <input type=\"email\" id=\"inputEmail\" class=\"form-control\" placeholder=\"Enter email address\"
                      required=\"required\" autofocus=\"autofocus\">
                    <label for=\"inputEmail\">Enter your password</label>
                  </div>
                </div>
                <a class=\"btn btn-primary btn-block\" href=\"/\">Verify</a>
              </form>
              <div class=\"text-center\">
                <a class=\"d-block small mt-3\" href=\"/register_email\">Register an Account</a>
                <a class=\"d-block small\" href=\"/\">Login Page</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src=\"/vendor/jquery/jquery.min.js\"></script>
    <script src=\"/vendor/bootstrap/js/bootstrap.bundle.min.js\"></script>

    <!-- Core plugin JavaScript-->
    <script src=\"/vendor/jquery-easing/jquery.easing.min.js\"></script>
  </div>
</body>

</html>";
    }

    public function getTemplateName()
    {
        return "change-password.html";
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
/*         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">*/
/*           <div class="dropdown-divider"></div>*/
/*           <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>*/
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
/*     <div id="content-wrapper">*/
/*       <div class="container-fluid">*/
/*         <div class="container">*/
/*           <div class="card card-login mx-auto mt-5">*/
/*             <div class="card-header">Reset Password</div>*/
/*             <div class="card-body">*/
/*               <div class="text-center mb-4">*/
/*                 <h4>Change Password</h4>*/
/*                 <p>Enter your current password to certification</p>*/
/*               </div>*/
/*               <form>*/
/*                 <div class="form-group">*/
/*                   <div class="form-label-group">*/
/*                     <input type="email" id="inputEmail" class="form-control" placeholder="Enter email address"*/
/*                       required="required" autofocus="autofocus">*/
/*                     <label for="inputEmail">Enter your password</label>*/
/*                   </div>*/
/*                 </div>*/
/*                 <a class="btn btn-primary btn-block" href="/">Verify</a>*/
/*               </form>*/
/*               <div class="text-center">*/
/*                 <a class="d-block small mt-3" href="/register_email">Register an Account</a>*/
/*                 <a class="d-block small" href="/">Login Page</a>*/
/*               </div>*/
/*             </div>*/
/*           </div>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*     <!-- Bootstrap core JavaScript-->*/
/*     <script src="/vendor/jquery/jquery.min.js"></script>*/
/*     <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>*/
/* */
/*     <!-- Core plugin JavaScript-->*/
/*     <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>*/
/*   </div>*/
/* </body>*/
/* */
/* </html>*/
