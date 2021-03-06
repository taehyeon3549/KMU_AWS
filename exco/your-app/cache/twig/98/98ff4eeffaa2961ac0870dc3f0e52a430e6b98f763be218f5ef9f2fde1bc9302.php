<?php

/* myaccount.html */
class __TwigTemplate_0c6eb9c30d1296b4fd0c0ebb66e5d0f0848b4d524df29b40c482fccf27a316b9 extends Twig_Template
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

  <title>Farming My Account</title>

  <!-- Custom fonts for this template-->
  <link href=\"vendor/fontawesome-free/css/all.min.css\" rel=\"stylesheet\" type=\"text/css\">

  <!-- Page level plugin CSS-->
  <link href=\"vendor/datatables/dataTables.bootstrap4.css\" rel=\"stylesheet\">

  <!-- Custom styles for this template-->
  <link href=\"css/sb-admin.css\" rel=\"stylesheet\">
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>
  <script>
    \$(document).ready(function(){      
        \$(\"#inputName\").val(name);      
        \$(\"#inputemail\").val(email);  
        \$(\"#inputgender\").val(gender); 
        \$(\"#inputbirth\").val(birth); 
        \$(\"#inputemergency\").val(emergency); 
        \$(\"#inputPassword\").val(password);
        \$(\"#confirmPassword\").val(confirmPassword);
    });
  </script>
  <script>
    var usn = sessionStorage.getItem('usn');

    var url = \"/userinfo/\" + usn;
    var email;
    var name;
    var gender;
    var birth;
    var emergency;
    var password;
    var confirmPassword;


    //send json
    \$.ajax({
      method: \"GET\",
      //url: \"/userinfo/\"+usn,
      url: url,
      data: {
        }
    }).done(function (msg) {
      console.log(msg);
      email = msg.email;
      name = msg.name;
      gender = msg.gender;
      birth = msg.birth;
      emergency = msg.emergency;
      password = msg.password;
      confirmpassword = msg.confirmpassword;
    });         
  </script>
</head>

<body id=\"page-top\">
  <!--IF user not login go to login page-->
  <script>
    if (sessionStorage.getItem('usn') == null) {
      location.href = \"/\";
    }
  </script>
  <nav class=\"navbar navbar-expand navbar-dark bg-dark static-top\">
      <img src=\"http://teamc-iot.calit2.net/mail_iconn.png\" style=\"height: 48px; width:100px;background-color: #56b275;\">
      <button class=\"btn btn-link btn-sm text-white order-1 order-sm-0\" id=\"sidebarToggle\" href=\"#\">
        <i class=\"fas fa-bars\"></i>
      </button>
    <a class=\"navbar-brand mr-1\" href=\"/maps\">Farm-ing</a>


    <!-- Navbar Search -->
    <form class=\"d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0\">
      <div class=\"input-group\">
        <div class=\"input-group-append\">
          <i></i>
        </div>
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
          <a style=\"color: black\">Hi,  
            <script>
              var name = sessionStorage.getItem('name');
              document.write(name);
            </script>
          </a>!!
          <div class=\"dropdown-divider\"></div>
          <a style=\"color: black\" class=\"dropdown-item\" data-toggle=\"modal\" data-target=\"#logoutModal\">로그아웃</a>
        </div>
      </li>
    </ul>
  </nav>

  <div id=\"wrapper\">
    <!-- Sidebar -->
    <ul class=\"sidebar navbar-nav\">
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"/maps\">
              <i class=\"fas fa-fw fa-chart-area\"></i>
              <span>실시간 데이터 조회</span></a>
          </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/main\">
          <i class=\"fas fa-fw fa-tachometer-alt\"></i>
          <span>과거 데이터 조회</span>
        </a>
      </li>
      <li class=\"nav-item dropdown active\">
        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"pagesDropdown\" role=\"button\" data-toggle=\"dropdown\"
          aria-haspopup=\"true\" aria-expanded=\"false\">
          <i class=\"fas fa-fw fa-folder\"></i>
          <span>회원정보</span>
        </a>
        <div class=\"dropdown-menu\" aria-labelledby=\"pagesDropdown\">
            <a class=\"dropdown-item\" id=\"myaccountb\" href=\"/myaccount\">나의 계정</a>
            <a class=\"dropdown-item\" href=\"/change_password\">비밀번호 변경</a>
            <a class=\"dropdown-item\" id=\"signoutb\" href=\"#\" data-toggle=\"modal\" data-target=\"#logoutModal\">로그아웃</a>
            <a class=\"dropdown-item\" href=\"/change_idcancellation\">회원탈퇴</a>
          </div>
      </li>
      <!--<li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/charts\">
          <i class=\"fas fa-fw fa-chart-area\"></i>
          <span>Charts</span></a>
      </li>-->

    </ul>

    <div id=\"content-wrapper\">
      <div class=\"col-md-12\">
        <div class=\"col-md-4\">
          <div class=\"portlet light profile-sidebar-portlet bordered\">

            <div class=\"profile-usertitle\">
              <div class=\"profile-usertitle-name\">
                <h3>Profile </h3>
              </div>
            </div>
          </div>
        </div>
        <div class=\"col-md-8\">
          <div class=\"portlet light bordered\">
            <div class=\"portlet-title tabbable-line\">
            </div>
            <div class=\"portlet-body\">
              <div>
                <!-- Tab panes -->
                <div class=\"tab-content\">
                  <div role=\"tabpanel\" class=\"tab-pane active\" id=\"home\">
                    <form>
                      <div class=\"form-group\">
                        <label for=\"inputName\">성명</label>
                        <P><input type=\"text\" id=\"inputName\" class=\"form-control\" value=\"Name\"></P>
                      </div>
                      <div class=\"form-group\">
                        <label for=\"inputemail\">이메일</label>
                        <p><input type=\"text\" class=\"form-control\" id=\"inputemail\" value=\"email\"></p> 
                      </div>
                      <div class=\"form-group\">
                        <label for=\"inputPassword\">비밀번호</label>
                        <input type=\"password\" name=\"inputPassword\" id=\"inputPassword\" class=\"form-control\"
                          placeholder=\"비밀번호\" required=\"required\">
                      </div>
                      <div class=\"form-group\">
                        <label for=\"confirmPassword\">비밀번호 확인</label>
                        <input type=\"password\" name=\"confirmPassword\" id=\"confirmPassword\" class=\"form-control\"
                          placeholder=\"비밀번호 확인\" required=\"required\">
                      </div>
                      <div class=\"form-group\">
                        <label for=\"exampleInputEmail1\">생년월일</label>
                        <input type=\"text\" class=\"form-control\" id=\"inputbirth\" placeholder=\"Birth\">
                      </div>
                      <div class=\"form-group\">
                        <label for=\"emergencycall\">전화번호</label>
                        <input type=\"phone\" name=\"emergencycall\" id=\"inputemergency\" class=\"form-control\"
                          placeholder=\"Emergency Call\">
                      </div>
                      <div class=\"form-group\">
                        <label for=\"exampleInputPassword1\">성별</label>
                        <input type=\"text\" class=\"form-control\" id=\"inputgender\" placeholder=\"Gender\">
                      </div>
                      <button type=\"submit\" class=\"btn btn-success\">저장</button>
                    </form>
                  </div>
                  <div role=\"tabpanel\" class=\"tab-pane\" id=\"profile\">Profile</div>
                  <div role=\"tabpanel\" class=\"tab-pane\" id=\"messages\">Messages</div>
                  <div role=\"tabpanel\" class=\"tab-pane\" id=\"settings\">Settings</div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class=\"scroll-to-top rounded\" href=\"#page-top\">
      <i class=\"fas fa-angle-up\"></i>
    </a>

    <!-- Logout Modal-->
    <div class=\"modal fade\" id=\"logoutModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\"
      aria-hidden=\"true\">
      <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\" id=\"exampleModalLabel\">Ready to Leave?</h5>
            <button class=\"close\" type=\"button\" data-dismiss=\"modal\" aria-label=\"Close\">
              <span aria-hidden=\"true\">×</span>
            </button>
          </div>
          <div class=\"modal-body\">Do you want to quit our 'Farming'?</div>
          <div class=\"modal-footer\">
            <button class=\"btn btn-secondary\" type=\"button\" data-dismiss=\"modal\">Cancel</button>
            <a class=\"btn btn-primary\" id=\"logoutb\">Logout</a>
            <!-- LogOut btn action -->
            <script type=\"text/javascript\">
              document.getElementById(\"logoutb\").addEventListener('click', function () {
                // Check the value are all filled
                var usn = sessionStorage.getItem('usn');
                //send json
                \$.ajax({
                  method: \"POST\",
                  url: \"/signout_proc\",
                  data: {
                    \"usn\": usn
                  }
                }).done(function (msg) {
                  if (msg.message == 0) {
                    //logout success
                    //sessionStorage clear
                    sessionStorage.clear();
                    location.href = \"/\";
                  }
                  if (msg.message == 1) {
                    alert(\"Please, try logout again.\");
                  }
                });
              });
            </script>
          </div>
        </div>
      </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src=\"vendor/jquery/jquery.min.js\"></script>
    <script src=\"vendor/bootstrap/js/bootstrap.bundle.min.js\"></script>

    <!-- Core plugin JavaScript-->
    <script src=\"vendor/jquery-easing/jquery.easing.min.js\"></script>

    <!-- Page level plugin JavaScript-->
    <script src=\"vendor/chart.js/Chart.min.js\"></script>
    <script src=\"vendor/datatables/jquery.dataTables.js\"></script>
    <script src=\"vendor/datatables/dataTables.bootstrap4.js\"></script>

    <!-- Custom scripts for all pages-->
    <script src=\"js/sb-admin.min.js\"></script>

    <!-- Demo scripts for this page-->
    <script src=\"js/demo/datatables-demo.js\"></script>
    <script src=\"js/demo/chart-area-demo.js\"></script>

</body>

</html>";
    }

    public function getTemplateName()
    {
        return "myaccount.html";
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
/*   <title>Farming My Account</title>*/
/* */
/*   <!-- Custom fonts for this template-->*/
/*   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">*/
/* */
/*   <!-- Page level plugin CSS-->*/
/*   <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">*/
/* */
/*   <!-- Custom styles for this template-->*/
/*   <link href="css/sb-admin.css" rel="stylesheet">*/
/*   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>*/
/*   <script>*/
/*     $(document).ready(function(){      */
/*         $("#inputName").val(name);      */
/*         $("#inputemail").val(email);  */
/*         $("#inputgender").val(gender); */
/*         $("#inputbirth").val(birth); */
/*         $("#inputemergency").val(emergency); */
/*         $("#inputPassword").val(password);*/
/*         $("#confirmPassword").val(confirmPassword);*/
/*     });*/
/*   </script>*/
/*   <script>*/
/*     var usn = sessionStorage.getItem('usn');*/
/* */
/*     var url = "/userinfo/" + usn;*/
/*     var email;*/
/*     var name;*/
/*     var gender;*/
/*     var birth;*/
/*     var emergency;*/
/*     var password;*/
/*     var confirmPassword;*/
/* */
/* */
/*     //send json*/
/*     $.ajax({*/
/*       method: "GET",*/
/*       //url: "/userinfo/"+usn,*/
/*       url: url,*/
/*       data: {*/
/*         }*/
/*     }).done(function (msg) {*/
/*       console.log(msg);*/
/*       email = msg.email;*/
/*       name = msg.name;*/
/*       gender = msg.gender;*/
/*       birth = msg.birth;*/
/*       emergency = msg.emergency;*/
/*       password = msg.password;*/
/*       confirmpassword = msg.confirmpassword;*/
/*     });         */
/*   </script>*/
/* </head>*/
/* */
/* <body id="page-top">*/
/*   <!--IF user not login go to login page-->*/
/*   <script>*/
/*     if (sessionStorage.getItem('usn') == null) {*/
/*       location.href = "/";*/
/*     }*/
/*   </script>*/
/*   <nav class="navbar navbar-expand navbar-dark bg-dark static-top">*/
/*       <img src="http://teamc-iot.calit2.net/mail_iconn.png" style="height: 48px; width:100px;background-color: #56b275;">*/
/*       <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">*/
/*         <i class="fas fa-bars"></i>*/
/*       </button>*/
/*     <a class="navbar-brand mr-1" href="/maps">Farm-ing</a>*/
/* */
/* */
/*     <!-- Navbar Search -->*/
/*     <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">*/
/*       <div class="input-group">*/
/*         <div class="input-group-append">*/
/*           <i></i>*/
/*         </div>*/
/*       </div>*/
/*     </form>*/
/* */
/*     <!-- Navbar -->*/
/*     <ul class="navbar-nav ml-auto ml-md-0">*/
/*       <li class="nav-item dropdown no-arrow">*/
/*         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"*/
/*           aria-haspopup="true" aria-expanded="false">*/
/*           <i class="fas fa-user-circle fa-fw"></i>*/
/*         </a>*/
/* */
/*         <!-- user icon-->*/
/*         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">*/
/*           <a style="color: black">Hi,  */
/*             <script>*/
/*               var name = sessionStorage.getItem('name');*/
/*               document.write(name);*/
/*             </script>*/
/*           </a>!!*/
/*           <div class="dropdown-divider"></div>*/
/*           <a style="color: black" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">로그아웃</a>*/
/*         </div>*/
/*       </li>*/
/*     </ul>*/
/*   </nav>*/
/* */
/*   <div id="wrapper">*/
/*     <!-- Sidebar -->*/
/*     <ul class="sidebar navbar-nav">*/
/*         <li class="nav-item">*/
/*             <a class="nav-link" href="/maps">*/
/*               <i class="fas fa-fw fa-chart-area"></i>*/
/*               <span>실시간 데이터 조회</span></a>*/
/*           </li>*/
/*       <li class="nav-item">*/
/*         <a class="nav-link" href="/main">*/
/*           <i class="fas fa-fw fa-tachometer-alt"></i>*/
/*           <span>과거 데이터 조회</span>*/
/*         </a>*/
/*       </li>*/
/*       <li class="nav-item dropdown active">*/
/*         <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"*/
/*           aria-haspopup="true" aria-expanded="false">*/
/*           <i class="fas fa-fw fa-folder"></i>*/
/*           <span>회원정보</span>*/
/*         </a>*/
/*         <div class="dropdown-menu" aria-labelledby="pagesDropdown">*/
/*             <a class="dropdown-item" id="myaccountb" href="/myaccount">나의 계정</a>*/
/*             <a class="dropdown-item" href="/change_password">비밀번호 변경</a>*/
/*             <a class="dropdown-item" id="signoutb" href="#" data-toggle="modal" data-target="#logoutModal">로그아웃</a>*/
/*             <a class="dropdown-item" href="/change_idcancellation">회원탈퇴</a>*/
/*           </div>*/
/*       </li>*/
/*       <!--<li class="nav-item">*/
/*         <a class="nav-link" href="/charts">*/
/*           <i class="fas fa-fw fa-chart-area"></i>*/
/*           <span>Charts</span></a>*/
/*       </li>-->*/
/* */
/*     </ul>*/
/* */
/*     <div id="content-wrapper">*/
/*       <div class="col-md-12">*/
/*         <div class="col-md-4">*/
/*           <div class="portlet light profile-sidebar-portlet bordered">*/
/* */
/*             <div class="profile-usertitle">*/
/*               <div class="profile-usertitle-name">*/
/*                 <h3>Profile </h3>*/
/*               </div>*/
/*             </div>*/
/*           </div>*/
/*         </div>*/
/*         <div class="col-md-8">*/
/*           <div class="portlet light bordered">*/
/*             <div class="portlet-title tabbable-line">*/
/*             </div>*/
/*             <div class="portlet-body">*/
/*               <div>*/
/*                 <!-- Tab panes -->*/
/*                 <div class="tab-content">*/
/*                   <div role="tabpanel" class="tab-pane active" id="home">*/
/*                     <form>*/
/*                       <div class="form-group">*/
/*                         <label for="inputName">성명</label>*/
/*                         <P><input type="text" id="inputName" class="form-control" value="Name"></P>*/
/*                       </div>*/
/*                       <div class="form-group">*/
/*                         <label for="inputemail">이메일</label>*/
/*                         <p><input type="text" class="form-control" id="inputemail" value="email"></p> */
/*                       </div>*/
/*                       <div class="form-group">*/
/*                         <label for="inputPassword">비밀번호</label>*/
/*                         <input type="password" name="inputPassword" id="inputPassword" class="form-control"*/
/*                           placeholder="비밀번호" required="required">*/
/*                       </div>*/
/*                       <div class="form-group">*/
/*                         <label for="confirmPassword">비밀번호 확인</label>*/
/*                         <input type="password" name="confirmPassword" id="confirmPassword" class="form-control"*/
/*                           placeholder="비밀번호 확인" required="required">*/
/*                       </div>*/
/*                       <div class="form-group">*/
/*                         <label for="exampleInputEmail1">생년월일</label>*/
/*                         <input type="text" class="form-control" id="inputbirth" placeholder="Birth">*/
/*                       </div>*/
/*                       <div class="form-group">*/
/*                         <label for="emergencycall">전화번호</label>*/
/*                         <input type="phone" name="emergencycall" id="inputemergency" class="form-control"*/
/*                           placeholder="Emergency Call">*/
/*                       </div>*/
/*                       <div class="form-group">*/
/*                         <label for="exampleInputPassword1">성별</label>*/
/*                         <input type="text" class="form-control" id="inputgender" placeholder="Gender">*/
/*                       </div>*/
/*                       <button type="submit" class="btn btn-success">저장</button>*/
/*                     </form>*/
/*                   </div>*/
/*                   <div role="tabpanel" class="tab-pane" id="profile">Profile</div>*/
/*                   <div role="tabpanel" class="tab-pane" id="messages">Messages</div>*/
/*                   <div role="tabpanel" class="tab-pane" id="settings">Settings</div>*/
/*                 </div>*/
/* */
/*               </div>*/
/*             </div>*/
/*           </div>*/
/*         </div>*/
/*       </div>*/
/*       <!-- /.content-wrapper -->*/
/* */
/*     </div>*/
/*     <!-- /#wrapper -->*/
/* */
/*     <!-- Scroll to Top Button-->*/
/*     <a class="scroll-to-top rounded" href="#page-top">*/
/*       <i class="fas fa-angle-up"></i>*/
/*     </a>*/
/* */
/*     <!-- Logout Modal-->*/
/*     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"*/
/*       aria-hidden="true">*/
/*       <div class="modal-dialog" role="document">*/
/*         <div class="modal-content">*/
/*           <div class="modal-header">*/
/*             <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>*/
/*             <button class="close" type="button" data-dismiss="modal" aria-label="Close">*/
/*               <span aria-hidden="true">×</span>*/
/*             </button>*/
/*           </div>*/
/*           <div class="modal-body">Do you want to quit our 'Farming'?</div>*/
/*           <div class="modal-footer">*/
/*             <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>*/
/*             <a class="btn btn-primary" id="logoutb">Logout</a>*/
/*             <!-- LogOut btn action -->*/
/*             <script type="text/javascript">*/
/*               document.getElementById("logoutb").addEventListener('click', function () {*/
/*                 // Check the value are all filled*/
/*                 var usn = sessionStorage.getItem('usn');*/
/*                 //send json*/
/*                 $.ajax({*/
/*                   method: "POST",*/
/*                   url: "/signout_proc",*/
/*                   data: {*/
/*                     "usn": usn*/
/*                   }*/
/*                 }).done(function (msg) {*/
/*                   if (msg.message == 0) {*/
/*                     //logout success*/
/*                     //sessionStorage clear*/
/*                     sessionStorage.clear();*/
/*                     location.href = "/";*/
/*                   }*/
/*                   if (msg.message == 1) {*/
/*                     alert("Please, try logout again.");*/
/*                   }*/
/*                 });*/
/*               });*/
/*             </script>*/
/*           </div>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/* */
/* */
/* */
/*     <!-- Bootstrap core JavaScript-->*/
/*     <script src="vendor/jquery/jquery.min.js"></script>*/
/*     <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>*/
/* */
/*     <!-- Core plugin JavaScript-->*/
/*     <script src="vendor/jquery-easing/jquery.easing.min.js"></script>*/
/* */
/*     <!-- Page level plugin JavaScript-->*/
/*     <script src="vendor/chart.js/Chart.min.js"></script>*/
/*     <script src="vendor/datatables/jquery.dataTables.js"></script>*/
/*     <script src="vendor/datatables/dataTables.bootstrap4.js"></script>*/
/* */
/*     <!-- Custom scripts for all pages-->*/
/*     <script src="js/sb-admin.min.js"></script>*/
/* */
/*     <!-- Demo scripts for this page-->*/
/*     <script src="js/demo/datatables-demo.js"></script>*/
/*     <script src="js/demo/chart-area-demo.js"></script>*/
/* */
/* </body>*/
/* */
/* </html>*/
