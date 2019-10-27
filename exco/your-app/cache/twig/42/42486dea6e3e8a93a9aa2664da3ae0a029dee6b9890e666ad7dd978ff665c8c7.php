<?php

/* google_geolocation.html */
class __TwigTemplate_989ee3a49e37c0d41887f039c1fb82da98460089bc51ff9a29acba9bc0b6d644 extends Twig_Template
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

  <title>TeamC_Main Page</title>

  <!-- Custom fonts for this template-->
  <link href=\"vendor/fontawesome-free/css/all.min.css\" rel=\"stylesheet\" type=\"text/css\">

  <!-- Page level plugin CSS-->
  <link href=\"vendor/datatables/dataTables.bootstrap4.css\" rel=\"stylesheet\">

  <!-- Custom styles for this template-->
  <link href=\"css/sb-admin.css\" rel=\"stylesheet\">

  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js\"></script>
  <script type=\"text/javascript\">
    // Set a global variable for map
    var map;

    var activeInfoWindow;

    function initMap() {
      var options = {
        //Center : QI(Calit2) -> 나중에 바꿀것
        center: { lat: 32.8826247, lng: -117.2367698 },
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.TERRAIN
      }

      map = new google.maps.Map(document.getElementById(\"map_canvas\"), options);

      // Create markers into DOM
      var json = null;
      \$.ajax({
        'async': false,
        'global': false,
        //롱디 레티 들고오는 링크
        'url': \"/getGPS\",
        'dataType': \"json\",
        'success': function (data) {
          createMarkers(data);
        }
      });
    };

    // Instantiate markers in the background and pass it back to the json object
    function createMarkers(markerJson) {
      var length = Object.keys(markerJson).length;

      var contentString = [];
      var infowindow = [];
      var marker = [];

      for (let i = 0; i < length; i++) {
        var sensormark = markerJson[i];
        sensormark = JSON.parse(`{\${sensormark}}`);


        contentString[i] =
        '<div id=\"content\">' +
          '<div id=\"showupAQI\">' +
          '</div>' +
          '<h2 id=\"firstHeading\" class=\"firstHeading\">Measuered Data</h2>' +
          '<div id=\"bodyContent\">' +
          '<p>' +
          '<div>' +
          '<table class = \"mytable\" width=\"100%\" cellspacing=\"0\">' +
          '<thead>' +
          '<tr>' +
          '<th>원소</th>' +
          '<th>측정값</th>' +
          '<th>AQI</th>' +
          '</tr>' +
          '</thead>' +
          '<tbody>' +
          '<tr>' +
          '<th> O3 </th>' +
          '<th>20</th>' +
          '<th>10</th>' +
          '</tr>' +
          '<tr>' +
          '<th> CO </th>' +
          '<th>20</th>' +
          '<th>10</th>' +
          '</tr>' +
          '<tr>' +
          '<th> NO </th>' +
          '<th>20</th>' +
          '<th>10</th>' +
          '</tr>' +
          '<tr>' +
          '<th> SO2 </th>' +
          '<th>20</th>' +
          '<th>10</th>' +
          '</tr>' +
          '<tr>' +
          '<th> PM2.5 </th>' +
          '<th>20</th>' +
          '<th>10</th>' +
          '</tr>' +
          '<tr>' +
          '<th> Temperature </th>' +
          '<th>20</th>' +
          '<th>10</th>' +
          '</tr>' +
          '</tbody>' +
          '</table>' +
          '</div>' +
          '</p>' +
          '</div>';




        infowindow[i] = new google.maps.InfoWindow({
          content: contentString[i]
        });

        marker[i] = new google.maps.Circle({
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35,
          map: map,
          position: { lat: sensormark.location[0], lng: sensormark.location[1] },
          center: { lat: sensormark.location[0], lng: sensormark.location[1] },
          radius: 50
          //html: \"<span class='pogo_name'>\" + sensormark.name + \"</a></span><br />\" + sensormark.location[0] + \"<br />\"
        });

        //클릭 이벤트
        marker[i].addListener('click', function () {
          //나머지 색상 원래대로 - 이전 창 자동으로 닫는거 안됨...
          /*for(var k = 0; k< length; k++){
              marker[k].setOptions({
              strokeColor: '#FF0000',
              fillColor: '#FF0000',
            });
          }*/

          //열고
          infowindow[i].open(map, marker[i]);
          //색상 바꾸고
          /*marker[i].setOptions({
            strokeColor: '#000000',
            fillColor: '#000000',
          });*/
        });
      }
    }
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
      <img src=\"http://teamc-iot.calit2.net/mail_iconn.png\" style=\"height: 48px; width:100px;background-color: #01dea5;\">
    <a class=\"navbar-brand mr-1\" href=\"/main\">Farm-ing</a>
    <button class=\"btn btn-link btn-sm text-white order-1 order-sm-0\" id=\"sidebarToggle\" href=\"#\">
      <i class=\"fas fa-bars\"></i>
    </button>

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

        <!-- 회원 아이콘-->
        <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"userDropdown\">
          <a>Hi,
            <script>
              var name = sessionStorage.getItem('name');
              document.write(name);
            </script>
          </a>
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

    <div id=\"content-wrapper\">
      <div class=\"container-fluid\">
        <!-- Breadcrumbs-->


        <!-- Google map-->
        <!-- 구글 맵은 이거 복붙-->
        <div class=\"card mb-3\">
          <div class=\"card-header\">
            <i class=\"fas fa-chart-area\"></i>
            AQI Map
          </div>
          <div class=\"card-body\">
            <div id=\"map_canvas\" style=\"position: relative;overflow: hidden;height: 500px;\"></div>
            <script async defer
              src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyDQ43_yOT-bs3fAuvRGhrlvxf9slzYC0j4&language=en&callback=initMap\">
              </script>

            <div class='myLinkContainer'></div>
          </div>
        </div>



      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class=\"sticky-footer\">
        <div class=\"container my-auto\">
          <div class=\"copyright text-center my-auto\">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

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
  <!-- <script src=\"vendor/chart.js/Chart.min.js\"></script> -->
  <script src=\"vendor/datatables/jquery.dataTables.js\"></script>
  <script src=\"vendor/datatables/dataTables.bootstrap4.js\"></script>

  <!-- Custom scripts for all pages-->
  <script src=\"js/sb-admin.min.js\"></script>

  <!-- Demo scripts for this page-->
  <!-- <script src=\"js/demo/datatables-demo.js\"></script>
  <script src=\"js/demo/chart-area-demo.js\"></script> -->

</body>

</html>
";
    }

    public function getTemplateName()
    {
        return "google_geolocation.html";
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
/*   <title>TeamC_Main Page</title>*/
/* */
/*   <!-- Custom fonts for this template-->*/
/*   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">*/
/* */
/*   <!-- Page level plugin CSS-->*/
/*   <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">*/
/* */
/*   <!-- Custom styles for this template-->*/
/*   <link href="css/sb-admin.css" rel="stylesheet">*/
/* */
/*   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>*/
/*   <script type="text/javascript">*/
/*     // Set a global variable for map*/
/*     var map;*/
/* */
/*     var activeInfoWindow;*/
/* */
/*     function initMap() {*/
/*       var options = {*/
/*         //Center : QI(Calit2) -> 나중에 바꿀것*/
/*         center: { lat: 32.8826247, lng: -117.2367698 },*/
/*         zoom: 15,*/
/*         mapTypeId: google.maps.MapTypeId.TERRAIN*/
/*       }*/
/* */
/*       map = new google.maps.Map(document.getElementById("map_canvas"), options);*/
/* */
/*       // Create markers into DOM*/
/*       var json = null;*/
/*       $.ajax({*/
/*         'async': false,*/
/*         'global': false,*/
/*         //롱디 레티 들고오는 링크*/
/*         'url': "/getGPS",*/
/*         'dataType': "json",*/
/*         'success': function (data) {*/
/*           createMarkers(data);*/
/*         }*/
/*       });*/
/*     };*/
/* */
/*     // Instantiate markers in the background and pass it back to the json object*/
/*     function createMarkers(markerJson) {*/
/*       var length = Object.keys(markerJson).length;*/
/* */
/*       var contentString = [];*/
/*       var infowindow = [];*/
/*       var marker = [];*/
/* */
/*       for (let i = 0; i < length; i++) {*/
/*         var sensormark = markerJson[i];*/
/*         sensormark = JSON.parse(`{${sensormark}}`);*/
/* */
/* */
/*         contentString[i] =*/
/*         '<div id="content">' +*/
/*           '<div id="showupAQI">' +*/
/*           '</div>' +*/
/*           '<h2 id="firstHeading" class="firstHeading">Measuered Data</h2>' +*/
/*           '<div id="bodyContent">' +*/
/*           '<p>' +*/
/*           '<div>' +*/
/*           '<table class = "mytable" width="100%" cellspacing="0">' +*/
/*           '<thead>' +*/
/*           '<tr>' +*/
/*           '<th>원소</th>' +*/
/*           '<th>측정값</th>' +*/
/*           '<th>AQI</th>' +*/
/*           '</tr>' +*/
/*           '</thead>' +*/
/*           '<tbody>' +*/
/*           '<tr>' +*/
/*           '<th> O3 </th>' +*/
/*           '<th>20</th>' +*/
/*           '<th>10</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> CO </th>' +*/
/*           '<th>20</th>' +*/
/*           '<th>10</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> NO </th>' +*/
/*           '<th>20</th>' +*/
/*           '<th>10</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> SO2 </th>' +*/
/*           '<th>20</th>' +*/
/*           '<th>10</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> PM2.5 </th>' +*/
/*           '<th>20</th>' +*/
/*           '<th>10</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> Temperature </th>' +*/
/*           '<th>20</th>' +*/
/*           '<th>10</th>' +*/
/*           '</tr>' +*/
/*           '</tbody>' +*/
/*           '</table>' +*/
/*           '</div>' +*/
/*           '</p>' +*/
/*           '</div>';*/
/* */
/* */
/* */
/* */
/*         infowindow[i] = new google.maps.InfoWindow({*/
/*           content: contentString[i]*/
/*         });*/
/* */
/*         marker[i] = new google.maps.Circle({*/
/*           strokeColor: '#FF0000',*/
/*           strokeOpacity: 0.8,*/
/*           strokeWeight: 2,*/
/*           fillColor: '#FF0000',*/
/*           fillOpacity: 0.35,*/
/*           map: map,*/
/*           position: { lat: sensormark.location[0], lng: sensormark.location[1] },*/
/*           center: { lat: sensormark.location[0], lng: sensormark.location[1] },*/
/*           radius: 50*/
/*           //html: "<span class='pogo_name'>" + sensormark.name + "</a></span><br />" + sensormark.location[0] + "<br />"*/
/*         });*/
/* */
/*         //클릭 이벤트*/
/*         marker[i].addListener('click', function () {*/
/*           //나머지 색상 원래대로 - 이전 창 자동으로 닫는거 안됨...*/
/*           /*for(var k = 0; k< length; k++){*/
/*               marker[k].setOptions({*/
/*               strokeColor: '#FF0000',*/
/*               fillColor: '#FF0000',*/
/*             });*/
/*           }*//* */
/* */
/*           //열고*/
/*           infowindow[i].open(map, marker[i]);*/
/*           //색상 바꾸고*/
/*           /*marker[i].setOptions({*/
/*             strokeColor: '#000000',*/
/*             fillColor: '#000000',*/
/*           });*//* */
/*         });*/
/*       }*/
/*     }*/
/*   </script>*/
/* </head>*/
/* <body id="page-top">*/
/*   <!--IF user not login go to login page-->*/
/*   <script>*/
/*     if (sessionStorage.getItem('usn') == null) {*/
/*       location.href = "/";*/
/*     }*/
/*   </script>*/
/*   <nav class="navbar navbar-expand navbar-dark bg-dark static-top">*/
/*       <img src="http://teamc-iot.calit2.net/mail_iconn.png" style="height: 48px; width:100px;background-color: #01dea5;">*/
/*     <a class="navbar-brand mr-1" href="/main">Farm-ing</a>*/
/*     <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">*/
/*       <i class="fas fa-bars"></i>*/
/*     </button>*/
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
/*         <!-- 회원 아이콘-->*/
/*         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">*/
/*           <a>Hi,*/
/*             <script>*/
/*               var name = sessionStorage.getItem('name');*/
/*               document.write(name);*/
/*             </script>*/
/*           </a>*/
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
/*     <div id="content-wrapper">*/
/*       <div class="container-fluid">*/
/*         <!-- Breadcrumbs-->*/
/* */
/* */
/*         <!-- Google map-->*/
/*         <!-- 구글 맵은 이거 복붙-->*/
/*         <div class="card mb-3">*/
/*           <div class="card-header">*/
/*             <i class="fas fa-chart-area"></i>*/
/*             AQI Map*/
/*           </div>*/
/*           <div class="card-body">*/
/*             <div id="map_canvas" style="position: relative;overflow: hidden;height: 500px;"></div>*/
/*             <script async defer*/
/*               src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQ43_yOT-bs3fAuvRGhrlvxf9slzYC0j4&language=en&callback=initMap">*/
/*               </script>*/
/* */
/*             <div class='myLinkContainer'></div>*/
/*           </div>*/
/*         </div>*/
/* */
/* */
/* */
/*       </div>*/
/*       <!-- /.container-fluid -->*/
/* */
/*       <!-- Sticky Footer -->*/
/*       <footer class="sticky-footer">*/
/*         <div class="container my-auto">*/
/*           <div class="copyright text-center my-auto">*/
/*             <span>Copyright © Your Website 2019</span>*/
/*           </div>*/
/*         </div>*/
/*       </footer>*/
/* */
/*     </div>*/
/*     <!-- /.content-wrapper -->*/
/* */
/*   </div>*/
/*   <!-- /#wrapper -->*/
/* */
/*   <!-- Scroll to Top Button-->*/
/*   <a class="scroll-to-top rounded" href="#page-top">*/
/*     <i class="fas fa-angle-up"></i>*/
/*   </a>*/
/* */
/*   <!-- Logout Modal-->*/
/*   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"*/
/*     aria-hidden="true">*/
/*     <div class="modal-dialog" role="document">*/
/*       <div class="modal-content">*/
/*         <div class="modal-header">*/
/*           <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>*/
/*           <button class="close" type="button" data-dismiss="modal" aria-label="Close">*/
/*             <span aria-hidden="true">×</span>*/
/*           </button>*/
/*         </div>*/
/*         <div class="modal-body">Do you want to quit our 'Farming'?</div>*/
/*         <div class="modal-footer">*/
/*           <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>*/
/*           <a class="btn btn-primary" id="logoutb">Logout</a>*/
/*           <!-- LogOut btn action -->*/
/*           <script type="text/javascript">*/
/*             document.getElementById("logoutb").addEventListener('click', function () {*/
/*               // Check the value are all filled*/
/*               var usn = sessionStorage.getItem('usn');*/
/*               //send json*/
/*               $.ajax({*/
/*                 method: "POST",*/
/*                 url: "/signout_proc",*/
/*                 data: {*/
/*                   "usn": usn*/
/*                 }*/
/*               }).done(function (msg) {*/
/*                 if (msg.message == 0) {*/
/*                   //logout success*/
/*                   //sessionStorage clear*/
/*                   sessionStorage.clear();*/
/*                   location.href = "/";*/
/*                 }*/
/*                 if (msg.message == 1) {*/
/*                   alert("Please, try logout again.");*/
/*                 }*/
/*               });*/
/*             });*/
/*           </script>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* */
/* */
/*   <!-- Bootstrap core JavaScript-->*/
/*   <script src="vendor/jquery/jquery.min.js"></script>*/
/*   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>*/
/* */
/*   <!-- Core plugin JavaScript-->*/
/*   <script src="vendor/jquery-easing/jquery.easing.min.js"></script>*/
/* */
/*   <!-- Page level plugin JavaScript-->*/
/*   <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->*/
/*   <script src="vendor/datatables/jquery.dataTables.js"></script>*/
/*   <script src="vendor/datatables/dataTables.bootstrap4.js"></script>*/
/* */
/*   <!-- Custom scripts for all pages-->*/
/*   <script src="js/sb-admin.min.js"></script>*/
/* */
/*   <!-- Demo scripts for this page-->*/
/*   <!-- <script src="js/demo/datatables-demo.js"></script>*/
/*   <script src="js/demo/chart-area-demo.js"></script> -->*/
/* */
/* </body>*/
/* */
/* </html>*/
/* */
