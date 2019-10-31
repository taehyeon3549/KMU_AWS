<?php

/* index.html */
class __TwigTemplate_aafe76df600f41b7c23d367674c9805b29dd99492718c82eb02d24f816243211 extends Twig_Template
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
  <script>

    var today = new Date();
    today.setDate(today.getDate());
    today = today.toISOString().slice(0, 10);

    var tomorrow = new Date()
    tomorrow.setDate(tomorrow.getDate() + 1);
    tomorrow = tomorrow.toISOString().slice(0, 10);

    sessionStorage['today'] = today;
    sessionStorage['tomorrow'] = tomorrow;

  </script>

  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js\"></script>
  <script type=\"text/javascript\" src=\"https://www.gstatic.com/charts/loader.js\"></script>
  <script type=\"text/javascript\">
    // Set a global variable for map
    var map;

    var activeInfoWindow;
    var marker = [];

    function initMap() {
      var options = {
        //Center : QI(Calit2)
        center: { lat: 32.8826247, lng: -117.2367698 },
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.TERRAIN
      }


      map = new google.maps.Map(document.getElementById(\"map_canvas\"), options);

      // Create markers into DOM
      var json = null;

      \$.ajax({
        method: \"POST\",
        url: \"/location\",
        data: {
          usn: usn,
          date: today,
          tomorrow: tomorrow
        }
      }).done(function (msg) {
        createMarkers(msg);
        // drawStuff(msg);
        console.log(msg);
      }).fail((msg) => {
        console.log(msg);
      });
      //setTimeout(initMap,1000);
    };
    // Instantiate markers in the background and pass it back to the json object
    function createMarkers(markerJson) {
      if (markerJson.message == \"fail\") {
        console.log(\"데이터 없음, 맵 마크 표시 X\");
      }
      else {
       // console.log(markerJson);
        var length = Object.keys(markerJson).length;

        var contentString = [];
        var infowindow = [];
       // var marker = [];
        var prevPos = 0;




        for (let i = 0; i < length; i++) {
          var sensormark = markerJson[i];

          //ensormark = JSON.parse(`{\${sensormark}}`);
          //sensormark = JSON.parse(sensormark);

          contentString[i] =
            '<div id=\"content\">' +
            '<div id=\"showupAQI\">' +
            '</div>' +
            '<h4 id=\"firstHeading\" class=\"firstHeading\">' + '위치' + '</h4>' +
            '<h2 id=\"firstHeading\" class=\"firstHeading\">' + '(' + sensormark['latitude'] + ',' + sensormark['longitude'] + ')' + '</h2>' +
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
            '<th>' + sensormark['O3'] + '</th>' +
            '<th id = \"aq\">' + sensormark['AQ_O3'] + '</th>' +
            '</tr>' +
            '<tr>' +
            '<th> CO </th>' +
            '<th>' + sensormark['CO'] + '</th>' +
            '<th id = \"aq\">' + sensormark['AQ_CO'] + '</th>' +
            '</tr>' +
            '<tr>' +
            '<th> NO2 </th>' +
            '<th>' + sensormark['NO2'] + '</th>' +
            '<th id = \"aq\">' + sensormark['AQ_NO2'] + '</th>' +
            '</tr>' +
            '<tr>' +
            '<th> SO2 </th>' +
            '<th>' + sensormark['SO2'] + '</th>' +
            '<th id = \"aq\">' + sensormark['AQ_SO2'] + '</th>' +
            '</tr>' +
            '<tr>' +
            '<th> PM2.5 </th>' +
            '<th>' + sensormark['PM2_5'] + '</th>' +
            '<th id = \"aq\">' + sensormark['AQ_PM2_5'] + '</th>' +
            '</tr>' +
            '<tr>' +
            '<th> Temperature </th>' +
            '<th>' + sensormark['Temperature'] + '</th>' +
            '<th>-</th>' +
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
            position: { lat: sensormark['latitude'], lng: sensormark['longitude'] },
            center: { lat: sensormark['latitude'], lng: sensormark['longitude'] },
            radius: 100
            //html: \"<span class='pogo_name'>\" + sensormark.name + \"</a></span><br />\" + sensormark.location[0] + \"<br />\"
          });
   



          marker[i].addListener('click', function () {
            //지금 클릭한 마크 띄우기
            infowindow[i].open(map, marker[i]);
            console.log(i);
            drawStuff(markerJson[i]);

            //지금 클릭한 마크 색상 바꾸기
            marker[i].setOptions({
              strokeColor: '#000000',
              fillColor: '#000000',
            });

            //이전에 클릭된 마크 지우기
            infowindow[prevPos].close(map, marker[prevPos]);

            //이전에 클릭된 마크 색상 바꾸기
            marker[prevPos].setOptions({
              strokeColor: '#FF0000',
              fillColor: '#FF0000',
            });
            prevPos = i;
          });
        }
      }
    }

    //모든 마커 삭제 
    function deleteMarkers() {
   for (var i = 0; i < marker.length; i++) {
     marker[i].setMap(null);
   }
 
   marker = [];
}

  </script>

  <!-- Google Chart-->
  <script type=\"text/javascript\">
    google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawStuff);

    //밑에 배열부분에 AQI 값만 오른쪽에 넣고 나머지 요소들은 왼쪽에 다 집어넣으면 됨
    function drawStuff(markerJson) {
      if (markerJson == null) {
        var sensormark = markerJson;
        console.log(\"차트 데이터 없음\");

        var data = new google.visualization.arrayToDataTable([
          ['Air Elements', 'Row Data', 'AQI'],
          ['PM2.5', 0, 0],
          ['O3', 0, 0],
          ['CO', 0, 0],
          ['NO2', 0, 0],
          ['SO2', 0, 0],
          ['temperature', 0, 0],
          ['AQI PM2.5', 0, 0],
          ['AQI O3', 0, 0],
          ['AQI CO', 0, 0],
          ['AQI NO2', 0, 0],
          ['AQI SO2', 0, 0]
        ]);

        var options = {
          //width: 800,
          chart: {
            title: 'Historical data Air Quality',
            subtitle: '현 날짜에 해당하는 데이터 없어서 차트 못그림. 2019-08-11 ~ 2019-08-13 조회 후 맵에 마커 클릭 하면 나옴'
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            x: {
              distance: { label: 'parsecs' }, // Bottom x-axis.
              brightness: { side: 'top', label: 'apparent magnitude' } // Top x-axis.
            }
          },
          animation:{
            startup: true,
            duration : 1000,
            easing: 'lineraz'
          }
        };


        var chart = new google.charts.Bar(document.getElementById('dual_x_div'));
        chart.draw(data, options);
      }
      else {
        var sensormark = markerJson;
        console.log(sensormark);

        var data = new google.visualization.arrayToDataTable([
          ['Air Elements', 'Row Data', 'AQI'],
          ['PM2.5', sensormark.PM2_5, 0],
          ['O3', sensormark.O3, 0],
          ['CO', sensormark.CO, 0],
          ['NO2', sensormark.NO2, 0],
          ['SO2', sensormark.SO2, 0],
          ['temperature', sensormark.Temperature, 0],
          ['AQI PM2.5', 0, sensormark.AQ_PM2_5],
          ['AQI O3', 0, sensormark.AQ_O3],
          ['AQI CO', 0, sensormark.AQ_CO],
          ['AQI NO2', 0, sensormark.AQ_NO2],
          ['AQI SO2', 0, sensormark.AQ_SO2]
        ]);

        var options = {
         // width: 800,
          chart: {
            title: 'Historical data Air Quality',
            subtitle: 'distance on the left, brightness on the right'
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            x: {
              distance: { label: 'parsecs' }, // Bottom x-axis.
              brightness: { side: 'top', label: 'apparent magnitude' } // Top x-axis.
            }
          }
        };


        var chart = new google.charts.Bar(document.getElementById('dual_x_div'));
        chart.draw(data, options);
      }
    };
  </script>
  <!-- 팝업 테이블 css -->
  <style>
    .mytable {
      border-collapse: collapse;
    }

    .mytable th,
    .mytable td {
      border: 1px solid black;
    }
  </style>
</head>

<body id=\"page-top\">
  <!--IF user not login go to login page-->
  <script>
    if (sessionStorage.getItem('usn') == null) {
      location.href = \"/\";
    }
  </script>
  <nav class=\"navbar navbar-expand navbar-dark bg-dark static-top\">
    <img src=\"http://13.125.112.70/mail_iconn.png\" style=\"height: 48px; width:100px;background-color: #56b275;\">
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

        <!-- 회원 아이콘-->
        <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"userDropdown\">
          <a style=\"color: black\">Hi, 
            <script>
              var name = sessionStorage.getItem('name');
              document.write(name);
            </script>
          </a>
          <div class=\"dropdown-divider\"></div>
          <a  style=\"color: black\" class=\"dropdown-item\" data-toggle=\"modal\" data-target=\"#logoutModal\">로그아웃</a>
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
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"/main\">
          <i class=\"fas fa-fw fa-tachometer-alt\"></i>
          <span>과거 데이터 조회 </span>
        </a>
      </li>
      <li class=\"nav-item dropdown\">
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
     <!-- <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/charts\">
          <i class=\"fas fa-fw fa-chart-area\"></i>
          <span>Charts</span></a>
      </li>-->

    </ul>

    <div id=\"content-wrapper\">
      <div class=\"container-fluid\">
        <!-- Breadcrumbs-->

        <!--과거 데이터 조회 -->
        <div class=\"card mb-3\">
          <div class=\"card-header\">
            Historical 데이터 조회
          </div>
          <div class=\"card-body\">
            <div>
                &nbsp;시작일 &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;종료일
            </div>
            <div>
                <input type=\"date\" id=\"start_date\" name=\"start_date\" value=\"2019-10-01\">
              ~ <input type=\"date\" id=\"end_date\" name =\"end_date\" > &nbsp; &nbsp;<a class=\"btn btn-primary\" name=\"search\"
              id=\"search\"> <b>조회</b></a> 
            </div>
            <div>

            </div>
          </div>
        </div>
        <script>
          var now = new Date(); 
         // document.getElementById('start_date').valueAsDate = (now.getFullYear()) + \"-\" + now.getMonth() + \"-1\" ;
          document.getElementById('end_date').valueAsDate = new Date();
         // console.log(end_date);    
        </script>
        <script type=\"text/javascript\">
        
          document.getElementById(\"search\").addEventListener('click', function () {
            deleteMarkers();
            var start_date = new Date(\$('input[name = start_date]').val());
            var end_date = new Date(\$('input[name = end_date]').val());
            end_date.setDate(end_date.getDate() + 1);
            end_date = end_date.toISOString().slice(0,10);
 
            start_date = start_date.toISOString().slice(0,10);

            console.log(start_date);
            console.log(end_date);

            //alert(end_date);

            \$.ajax({
              method: \"POST\",
              url: \"/location\",
              data: {
                usn: usn,
                date: start_date,
                tomorrow: end_date
                /*date: \"2019-08-11\",
                tomorrow: \"2019-08-13\"*/
              }
            }).done(function (msg) {
              createMarkers(msg);
              //drawStuff(msg);
              console.log(msg);
              console.log(\"변경\");
            }).fail((msg) => {
              console.log(msg);
            });


          });
        </script>


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

        <!-- Google Chart-->
        <div class=\"card mb-3\">
          <div class=\"card-header\">
            <i class=\"fas fa-chart-area\"></i>
            Historical Data Chart
          </div>
          <div class=\"card-body\">
            <!-- 차트 그림은 이거 복붙-->
            <div id=\"dual_x_div\" style=\"width: 1500px; height: 500px; margin-left: 60px;\"></div>
          </div>
        </div>

        <!-- DataTables Example -->
        <br><br>
        <div class=\"card mb-3\">
          <div class=\"card-header\">
            <i class=\"fas fa-table\"></i>
            Sensor List Table</div>
          <div class=\"card-body\">
            <div class=\"table-responsive\">
              <table class=\"table table-bordered\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\">
                <thead>
                  <tr>
                    <th>MAC</th>
                    <th>Sensor Name</th>
                    <th>State</th>
                  </tr>
                </thead>
                <tbody id=\"senosr_list\">
                  <!-- 센서 값 반복문-->
                  <script>
                    var usn = sessionStorage.usn;
                    //send json
                    \$.ajax({
                      method: \"POST\",
                      url: \"/sensorList\",
                      'dataType': \"json\",
                      data: {
                        \"usn\": usn
                      }
                    }).done(function (msg) {
                      var lenght = msg.message.length;
                      var temp = JSON.stringify(msg.message);

                      for (var i = 0; i < lenght; i++) {
                        var tr = document.createElement('tr');

                        if (JSON.parse(temp)[i].state == 1)
                          var text = '<th>' + JSON.parse(temp)[i].mac + '</th>' + '<th>' + JSON.parse(temp)[i].name + '</th>' + '<th>' + \"Active\" + '</th>';
                        else
                          var text = '<th>' + JSON.parse(temp)[i].mac + '</th>' + '<th>' + JSON.parse(temp)[i].name + '</th>' + '<th>' + \"NotActive\" + '</th>';

                        tr.innerHTML = text;
                        document.getElementById('senosr_list').appendChild(tr);
                      }
                    });
                  </script>
                </tbody>
              </table>
            </div>
          </div>
          <!--<div class=\"card-footer small text-muted\">Updated yesterday at 11:59 PM</div>-->
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
  <script src=\"vendor/chart.js/Chart.min.js\"></script>
  <script src=\"vendor/datatables/jquery.dataTables.js\"></script>
  <script src=\"vendor/datatables/dataTables.bootstrap4.js\"></script>

  <!-- Custom scripts for all pages-->
  <script src=\"js/sb-admin.min.js\"></script>

  <!-- Demo scripts for this page-->
  <!-- <script src=\"js/demo/datatables-demo.js\"></script>
  <script src=\"js/demo/chart-area-demo.js\"></script> -->

</body>

</html>";
    }

    public function getTemplateName()
    {
        return "index.html";
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
/*   <script>*/
/* */
/*     var today = new Date();*/
/*     today.setDate(today.getDate());*/
/*     today = today.toISOString().slice(0, 10);*/
/* */
/*     var tomorrow = new Date()*/
/*     tomorrow.setDate(tomorrow.getDate() + 1);*/
/*     tomorrow = tomorrow.toISOString().slice(0, 10);*/
/* */
/*     sessionStorage['today'] = today;*/
/*     sessionStorage['tomorrow'] = tomorrow;*/
/* */
/*   </script>*/
/* */
/*   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>*/
/*   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>*/
/*   <script type="text/javascript">*/
/*     // Set a global variable for map*/
/*     var map;*/
/* */
/*     var activeInfoWindow;*/
/*     var marker = [];*/
/* */
/*     function initMap() {*/
/*       var options = {*/
/*         //Center : QI(Calit2)*/
/*         center: { lat: 32.8826247, lng: -117.2367698 },*/
/*         zoom: 15,*/
/*         mapTypeId: google.maps.MapTypeId.TERRAIN*/
/*       }*/
/* */
/* */
/*       map = new google.maps.Map(document.getElementById("map_canvas"), options);*/
/* */
/*       // Create markers into DOM*/
/*       var json = null;*/
/* */
/*       $.ajax({*/
/*         method: "POST",*/
/*         url: "/location",*/
/*         data: {*/
/*           usn: usn,*/
/*           date: today,*/
/*           tomorrow: tomorrow*/
/*         }*/
/*       }).done(function (msg) {*/
/*         createMarkers(msg);*/
/*         // drawStuff(msg);*/
/*         console.log(msg);*/
/*       }).fail((msg) => {*/
/*         console.log(msg);*/
/*       });*/
/*       //setTimeout(initMap,1000);*/
/*     };*/
/*     // Instantiate markers in the background and pass it back to the json object*/
/*     function createMarkers(markerJson) {*/
/*       if (markerJson.message == "fail") {*/
/*         console.log("데이터 없음, 맵 마크 표시 X");*/
/*       }*/
/*       else {*/
/*        // console.log(markerJson);*/
/*         var length = Object.keys(markerJson).length;*/
/* */
/*         var contentString = [];*/
/*         var infowindow = [];*/
/*        // var marker = [];*/
/*         var prevPos = 0;*/
/* */
/* */
/* */
/* */
/*         for (let i = 0; i < length; i++) {*/
/*           var sensormark = markerJson[i];*/
/* */
/*           //ensormark = JSON.parse(`{${sensormark}}`);*/
/*           //sensormark = JSON.parse(sensormark);*/
/* */
/*           contentString[i] =*/
/*             '<div id="content">' +*/
/*             '<div id="showupAQI">' +*/
/*             '</div>' +*/
/*             '<h4 id="firstHeading" class="firstHeading">' + '위치' + '</h4>' +*/
/*             '<h2 id="firstHeading" class="firstHeading">' + '(' + sensormark['latitude'] + ',' + sensormark['longitude'] + ')' + '</h2>' +*/
/*             '<div id="bodyContent">' +*/
/*             '<p>' +*/
/*             '<div>' +*/
/*             '<table class = "mytable" width="100%" cellspacing="0">' +*/
/*             '<thead>' +*/
/*             '<tr>' +*/
/*             '<th>원소</th>' +*/
/*             '<th>측정값</th>' +*/
/*             '<th>AQI</th>' +*/
/*             '</tr>' +*/
/*             '</thead>' +*/
/*             '<tbody>' +*/
/*             '<tr>' +*/
/*             '<th> O3 </th>' +*/
/*             '<th>' + sensormark['O3'] + '</th>' +*/
/*             '<th id = "aq">' + sensormark['AQ_O3'] + '</th>' +*/
/*             '</tr>' +*/
/*             '<tr>' +*/
/*             '<th> CO </th>' +*/
/*             '<th>' + sensormark['CO'] + '</th>' +*/
/*             '<th id = "aq">' + sensormark['AQ_CO'] + '</th>' +*/
/*             '</tr>' +*/
/*             '<tr>' +*/
/*             '<th> NO2 </th>' +*/
/*             '<th>' + sensormark['NO2'] + '</th>' +*/
/*             '<th id = "aq">' + sensormark['AQ_NO2'] + '</th>' +*/
/*             '</tr>' +*/
/*             '<tr>' +*/
/*             '<th> SO2 </th>' +*/
/*             '<th>' + sensormark['SO2'] + '</th>' +*/
/*             '<th id = "aq">' + sensormark['AQ_SO2'] + '</th>' +*/
/*             '</tr>' +*/
/*             '<tr>' +*/
/*             '<th> PM2.5 </th>' +*/
/*             '<th>' + sensormark['PM2_5'] + '</th>' +*/
/*             '<th id = "aq">' + sensormark['AQ_PM2_5'] + '</th>' +*/
/*             '</tr>' +*/
/*             '<tr>' +*/
/*             '<th> Temperature </th>' +*/
/*             '<th>' + sensormark['Temperature'] + '</th>' +*/
/*             '<th>-</th>' +*/
/*             '</tr>' +*/
/*             '</tbody>' +*/
/*             '</table>' +*/
/*             '</div>' +*/
/*             '</p>' +*/
/*             '</div>';*/
/* */
/*           infowindow[i] = new google.maps.InfoWindow({*/
/*             content: contentString[i]*/
/*           });*/
/* */
/*           marker[i] = new google.maps.Circle({*/
/*             strokeColor: '#FF0000',*/
/*             strokeOpacity: 0.8,*/
/*             strokeWeight: 2,*/
/*             fillColor: '#FF0000',*/
/*             fillOpacity: 0.35,*/
/*             map: map,*/
/*             position: { lat: sensormark['latitude'], lng: sensormark['longitude'] },*/
/*             center: { lat: sensormark['latitude'], lng: sensormark['longitude'] },*/
/*             radius: 100*/
/*             //html: "<span class='pogo_name'>" + sensormark.name + "</a></span><br />" + sensormark.location[0] + "<br />"*/
/*           });*/
/*    */
/* */
/* */
/* */
/*           marker[i].addListener('click', function () {*/
/*             //지금 클릭한 마크 띄우기*/
/*             infowindow[i].open(map, marker[i]);*/
/*             console.log(i);*/
/*             drawStuff(markerJson[i]);*/
/* */
/*             //지금 클릭한 마크 색상 바꾸기*/
/*             marker[i].setOptions({*/
/*               strokeColor: '#000000',*/
/*               fillColor: '#000000',*/
/*             });*/
/* */
/*             //이전에 클릭된 마크 지우기*/
/*             infowindow[prevPos].close(map, marker[prevPos]);*/
/* */
/*             //이전에 클릭된 마크 색상 바꾸기*/
/*             marker[prevPos].setOptions({*/
/*               strokeColor: '#FF0000',*/
/*               fillColor: '#FF0000',*/
/*             });*/
/*             prevPos = i;*/
/*           });*/
/*         }*/
/*       }*/
/*     }*/
/* */
/*     //모든 마커 삭제 */
/*     function deleteMarkers() {*/
/*    for (var i = 0; i < marker.length; i++) {*/
/*      marker[i].setMap(null);*/
/*    }*/
/*  */
/*    marker = [];*/
/* }*/
/* */
/*   </script>*/
/* */
/*   <!-- Google Chart-->*/
/*   <script type="text/javascript">*/
/*     google.charts.load('current', { 'packages': ['bar'] });*/
/*     google.charts.setOnLoadCallback(drawStuff);*/
/* */
/*     //밑에 배열부분에 AQI 값만 오른쪽에 넣고 나머지 요소들은 왼쪽에 다 집어넣으면 됨*/
/*     function drawStuff(markerJson) {*/
/*       if (markerJson == null) {*/
/*         var sensormark = markerJson;*/
/*         console.log("차트 데이터 없음");*/
/* */
/*         var data = new google.visualization.arrayToDataTable([*/
/*           ['Air Elements', 'Row Data', 'AQI'],*/
/*           ['PM2.5', 0, 0],*/
/*           ['O3', 0, 0],*/
/*           ['CO', 0, 0],*/
/*           ['NO2', 0, 0],*/
/*           ['SO2', 0, 0],*/
/*           ['temperature', 0, 0],*/
/*           ['AQI PM2.5', 0, 0],*/
/*           ['AQI O3', 0, 0],*/
/*           ['AQI CO', 0, 0],*/
/*           ['AQI NO2', 0, 0],*/
/*           ['AQI SO2', 0, 0]*/
/*         ]);*/
/* */
/*         var options = {*/
/*           //width: 800,*/
/*           chart: {*/
/*             title: 'Historical data Air Quality',*/
/*             subtitle: '현 날짜에 해당하는 데이터 없어서 차트 못그림. 2019-08-11 ~ 2019-08-13 조회 후 맵에 마커 클릭 하면 나옴'*/
/*           },*/
/*           bars: 'horizontal', // Required for Material Bar Charts.*/
/*           series: {*/
/*             0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.*/
/*             1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.*/
/*           },*/
/*           axes: {*/
/*             x: {*/
/*               distance: { label: 'parsecs' }, // Bottom x-axis.*/
/*               brightness: { side: 'top', label: 'apparent magnitude' } // Top x-axis.*/
/*             }*/
/*           },*/
/*           animation:{*/
/*             startup: true,*/
/*             duration : 1000,*/
/*             easing: 'lineraz'*/
/*           }*/
/*         };*/
/* */
/* */
/*         var chart = new google.charts.Bar(document.getElementById('dual_x_div'));*/
/*         chart.draw(data, options);*/
/*       }*/
/*       else {*/
/*         var sensormark = markerJson;*/
/*         console.log(sensormark);*/
/* */
/*         var data = new google.visualization.arrayToDataTable([*/
/*           ['Air Elements', 'Row Data', 'AQI'],*/
/*           ['PM2.5', sensormark.PM2_5, 0],*/
/*           ['O3', sensormark.O3, 0],*/
/*           ['CO', sensormark.CO, 0],*/
/*           ['NO2', sensormark.NO2, 0],*/
/*           ['SO2', sensormark.SO2, 0],*/
/*           ['temperature', sensormark.Temperature, 0],*/
/*           ['AQI PM2.5', 0, sensormark.AQ_PM2_5],*/
/*           ['AQI O3', 0, sensormark.AQ_O3],*/
/*           ['AQI CO', 0, sensormark.AQ_CO],*/
/*           ['AQI NO2', 0, sensormark.AQ_NO2],*/
/*           ['AQI SO2', 0, sensormark.AQ_SO2]*/
/*         ]);*/
/* */
/*         var options = {*/
/*          // width: 800,*/
/*           chart: {*/
/*             title: 'Historical data Air Quality',*/
/*             subtitle: 'distance on the left, brightness on the right'*/
/*           },*/
/*           bars: 'horizontal', // Required for Material Bar Charts.*/
/*           series: {*/
/*             0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.*/
/*             1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.*/
/*           },*/
/*           axes: {*/
/*             x: {*/
/*               distance: { label: 'parsecs' }, // Bottom x-axis.*/
/*               brightness: { side: 'top', label: 'apparent magnitude' } // Top x-axis.*/
/*             }*/
/*           }*/
/*         };*/
/* */
/* */
/*         var chart = new google.charts.Bar(document.getElementById('dual_x_div'));*/
/*         chart.draw(data, options);*/
/*       }*/
/*     };*/
/*   </script>*/
/*   <!-- 팝업 테이블 css -->*/
/*   <style>*/
/*     .mytable {*/
/*       border-collapse: collapse;*/
/*     }*/
/* */
/*     .mytable th,*/
/*     .mytable td {*/
/*       border: 1px solid black;*/
/*     }*/
/*   </style>*/
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
/*     <img src="http://13.125.112.70/mail_iconn.png" style="height: 48px; width:100px;background-color: #56b275;">*/
/*     <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">*/
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
/*         <!-- 회원 아이콘-->*/
/*         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">*/
/*           <a style="color: black">Hi, */
/*             <script>*/
/*               var name = sessionStorage.getItem('name');*/
/*               document.write(name);*/
/*             </script>*/
/*           </a>*/
/*           <div class="dropdown-divider"></div>*/
/*           <a  style="color: black" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">로그아웃</a>*/
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
/*       <li class="nav-item active">*/
/*         <a class="nav-link" href="/main">*/
/*           <i class="fas fa-fw fa-tachometer-alt"></i>*/
/*           <span>과거 데이터 조회 </span>*/
/*         </a>*/
/*       </li>*/
/*       <li class="nav-item dropdown">*/
/*         <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"*/
/*           aria-haspopup="true" aria-expanded="false">*/
/*           <i class="fas fa-fw fa-folder"></i>*/
/*           <span>회원정보</span>*/
/*         </a>*/
/*         <div class="dropdown-menu" aria-labelledby="pagesDropdown">*/
/*           <a class="dropdown-item" id="myaccountb" href="/myaccount">나의 계정</a>*/
/*           <a class="dropdown-item" href="/change_password">비밀번호 변경</a>*/
/*           <a class="dropdown-item" id="signoutb" href="#" data-toggle="modal" data-target="#logoutModal">로그아웃</a>*/
/*           <a class="dropdown-item" href="/change_idcancellation">회원탈퇴</a>*/
/*         </div>*/
/*       </li>*/
/*      <!-- <li class="nav-item">*/
/*         <a class="nav-link" href="/charts">*/
/*           <i class="fas fa-fw fa-chart-area"></i>*/
/*           <span>Charts</span></a>*/
/*       </li>-->*/
/* */
/*     </ul>*/
/* */
/*     <div id="content-wrapper">*/
/*       <div class="container-fluid">*/
/*         <!-- Breadcrumbs-->*/
/* */
/*         <!--과거 데이터 조회 -->*/
/*         <div class="card mb-3">*/
/*           <div class="card-header">*/
/*             Historical 데이터 조회*/
/*           </div>*/
/*           <div class="card-body">*/
/*             <div>*/
/*                 &nbsp;시작일 &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;종료일*/
/*             </div>*/
/*             <div>*/
/*                 <input type="date" id="start_date" name="start_date" value="2019-10-01">*/
/*               ~ <input type="date" id="end_date" name ="end_date" > &nbsp; &nbsp;<a class="btn btn-primary" name="search"*/
/*               id="search"> <b>조회</b></a> */
/*             </div>*/
/*             <div>*/
/* */
/*             </div>*/
/*           </div>*/
/*         </div>*/
/*         <script>*/
/*           var now = new Date(); */
/*          // document.getElementById('start_date').valueAsDate = (now.getFullYear()) + "-" + now.getMonth() + "-1" ;*/
/*           document.getElementById('end_date').valueAsDate = new Date();*/
/*          // console.log(end_date);    */
/*         </script>*/
/*         <script type="text/javascript">*/
/*         */
/*           document.getElementById("search").addEventListener('click', function () {*/
/*             deleteMarkers();*/
/*             var start_date = new Date($('input[name = start_date]').val());*/
/*             var end_date = new Date($('input[name = end_date]').val());*/
/*             end_date.setDate(end_date.getDate() + 1);*/
/*             end_date = end_date.toISOString().slice(0,10);*/
/*  */
/*             start_date = start_date.toISOString().slice(0,10);*/
/* */
/*             console.log(start_date);*/
/*             console.log(end_date);*/
/* */
/*             //alert(end_date);*/
/* */
/*             $.ajax({*/
/*               method: "POST",*/
/*               url: "/location",*/
/*               data: {*/
/*                 usn: usn,*/
/*                 date: start_date,*/
/*                 tomorrow: end_date*/
/*                 /*date: "2019-08-11",*/
/*                 tomorrow: "2019-08-13"*//* */
/*               }*/
/*             }).done(function (msg) {*/
/*               createMarkers(msg);*/
/*               //drawStuff(msg);*/
/*               console.log(msg);*/
/*               console.log("변경");*/
/*             }).fail((msg) => {*/
/*               console.log(msg);*/
/*             });*/
/* */
/* */
/*           });*/
/*         </script>*/
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
/*             <div class='myLinkContainer'></div>*/
/*           </div>*/
/*         </div>*/
/* */
/*         <!-- Google Chart-->*/
/*         <div class="card mb-3">*/
/*           <div class="card-header">*/
/*             <i class="fas fa-chart-area"></i>*/
/*             Historical Data Chart*/
/*           </div>*/
/*           <div class="card-body">*/
/*             <!-- 차트 그림은 이거 복붙-->*/
/*             <div id="dual_x_div" style="width: 1500px; height: 500px; margin-left: 60px;"></div>*/
/*           </div>*/
/*         </div>*/
/* */
/*         <!-- DataTables Example -->*/
/*         <br><br>*/
/*         <div class="card mb-3">*/
/*           <div class="card-header">*/
/*             <i class="fas fa-table"></i>*/
/*             Sensor List Table</div>*/
/*           <div class="card-body">*/
/*             <div class="table-responsive">*/
/*               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">*/
/*                 <thead>*/
/*                   <tr>*/
/*                     <th>MAC</th>*/
/*                     <th>Sensor Name</th>*/
/*                     <th>State</th>*/
/*                   </tr>*/
/*                 </thead>*/
/*                 <tbody id="senosr_list">*/
/*                   <!-- 센서 값 반복문-->*/
/*                   <script>*/
/*                     var usn = sessionStorage.usn;*/
/*                     //send json*/
/*                     $.ajax({*/
/*                       method: "POST",*/
/*                       url: "/sensorList",*/
/*                       'dataType': "json",*/
/*                       data: {*/
/*                         "usn": usn*/
/*                       }*/
/*                     }).done(function (msg) {*/
/*                       var lenght = msg.message.length;*/
/*                       var temp = JSON.stringify(msg.message);*/
/* */
/*                       for (var i = 0; i < lenght; i++) {*/
/*                         var tr = document.createElement('tr');*/
/* */
/*                         if (JSON.parse(temp)[i].state == 1)*/
/*                           var text = '<th>' + JSON.parse(temp)[i].mac + '</th>' + '<th>' + JSON.parse(temp)[i].name + '</th>' + '<th>' + "Active" + '</th>';*/
/*                         else*/
/*                           var text = '<th>' + JSON.parse(temp)[i].mac + '</th>' + '<th>' + JSON.parse(temp)[i].name + '</th>' + '<th>' + "NotActive" + '</th>';*/
/* */
/*                         tr.innerHTML = text;*/
/*                         document.getElementById('senosr_list').appendChild(tr);*/
/*                       }*/
/*                     });*/
/*                   </script>*/
/*                 </tbody>*/
/*               </table>*/
/*             </div>*/
/*           </div>*/
/*           <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->*/
/*         </div>*/
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
/* */
/*   <!-- Bootstrap core JavaScript-->*/
/*   <script src="vendor/jquery/jquery.min.js"></script>*/
/*   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>*/
/* */
/*   <!-- Core plugin JavaScript-->*/
/*   <script src="vendor/jquery-easing/jquery.easing.min.js"></script>*/
/* */
/*   <!-- Page level plugin JavaScript-->*/
/*   <script src="vendor/chart.js/Chart.min.js"></script>*/
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
