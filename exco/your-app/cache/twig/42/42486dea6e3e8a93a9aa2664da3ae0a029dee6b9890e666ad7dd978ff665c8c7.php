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
  <script type=\"text/javascript\" src=\"https://www.gstatic.com/charts/loader.js\"></script>
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js\"></script>
  <script type=\"text/javascript\">
    // Set a global variable for map
    var map;

    var activeInfoWindow;

    function initMap() {
      var options = {
        //Center : QI(Calit2)
        center: { lat: 35.866, lng: 128.5986 },
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.TERRAIN
      }

      map = new google.maps.Map(document.getElementById(\"map_canvas\"), options);

      // Create markers into DOM
      var json = null;
      /*\$.ajax({
        'async': false,
        'global': false,
        //롱디 레티 들고오는 링크
        'url': \"/getGPS\",
        'dataType': \"json\",
        'success': function (data) {
          createMarkers(data);
        }
      });*/

      //기존
      /*\$.ajax({
        method: \"GET\",
        url : \"/getGPS\"
      }).done(function(data){
        createMarkers(data);
      });*/

      \$.ajax({
        method: \"GET\",
        url: \"http://somnium.me:8089/aqi_simulator_v_1_0\",
        dataType: \"json\"
      }).done(function (data) {
        createMarkersTest(data);
      }).fail((msg) => {
        console.log(msg);
        alert(msg + \"fail\");
      });

    };

    //Jack test
    function createMarkersTest(markerJson) {

      var length = Object.keys(markerJson.aqi_data_tier_tuples).length;

      var contentString = [];
      var infowindow = [];
      var marker = [];
      var prevPos = 0;

      for (let i = 0; i < length; i++) {
        var sensormark = markerJson.aqi_data_tier_tuples[i];
        /*sensormark = JSON.parse(`{\${sensormark}}`);

        alert(sensormark);*/

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
          '<th>' + sensormark.o3_aqi + '</th>' +
          '<th>10</th>' +
          '</tr>' +
          '<tr>' +
          '<th> CO </th>' +
          '<th>' + sensormark.co_sqi + '</th>' +
          '<th>10</th>' +
          '</tr>' +
          '<tr>' +
          '<th> NO2 </th>' +
          '<th>' + sensormark.no2_aqi + '</th>' +
          '<th>10</th>' +
          '</tr>' +
          '<tr>' +
          '<th> SO2 </th>' +
          '<th>값 없음</th>' +
          '<th>10</th>' +
          '</tr>' +
          '<tr>' +
          '<th> PM2.5 </th>' +
          '<th>' + sensormark.pm25_aqi + '</th>' +
          '<th>10</th>' +
          '</tr>' +
          '<tr>' +
          '<th> Temperature </th>' +
          '<th>' + sensormark.temperature + '</th>' +
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
          position: { lat: sensormark.lat, lng: sensormark.lng },
          center: { lat: sensormark.lat, lng: sensormark.lng },
          radius: 50
          //html: \"<span class='pogo_name'>\" + sensormark.name + \"</a></span><br />\" + sensormark.location[0] + \"<br />\"
        });

        //클릭 이벤트
        marker[i].addListener('click', function () {

          //지금 클릭한 마크 띄우기
          infowindow[i].open(map, marker[i]);

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

    // Instantiate markers in the background and pass it back to the json object
    function createMarkers(markerJson) {
      var length = Object.keys(markerJson).length;
      alert(\"createMakers\" + markerJson);
      var contentString = [];
      var infowindow = [];
      var marker = [];
      var prevPos = 0;

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

          //지금 클릭한 마크 띄우기
          infowindow[i].open(map, marker[i]);

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
    <a class=\"navbar-brand mr-1\" href=\"/maps\">Farm-ing</a>
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
          <a class=\"dropdown-item\" data-toggle=\"modal\" data-target=\"#logoutModal\">로그아웃</a>
        </div>
      </li>
    </ul>
  </nav>

  <div id=\"wrapper\">
    <!-- Sidebar -->
    <ul class=\"sidebar navbar-nav\">
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"/maps\">
          <i class=\"fas fa-fw fa-chart-area\"></i>
          <span>실시간 데이터 조회</span></a>
      </li>
      <li class=\"nav-item \">
        <a class=\"nav-link\" href=\"/main\">
          <i class=\"fas fa-fw fa-tachometer-alt\"></i>
          <span>과거 데이터 조회</span>
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
      <div class=\"card mb-3\">
        <div class=\"card-header\">
          <i class=\"fas fa-chart-area\"></i>
          차트 수정중 구글 라인차트 예제..
        </div>
        <div class=\"card-body\">

          <!-- 라인 차트 생성할 영역 -->
          <div id=\"lineChartArea\" style=\"padding:0px 20px 0px 0px;\"></div>
          <!-- 컨트롤바를 생성할 영역 -->
          <div id=\"controlsArea\" style=\"padding:0px 20px 0px 0px;\"></div>
        </div>
      </div>

      <script>

        var chartDrowFun = {

          chartDrow: function () {
            var chartData = '';

            //날짜형식 변경하고 싶으시면 이 부분 수정하세요.
            var chartDateformat = 'yyyy년MM월dd일';
            //라인차트의 라인 수
            var chartLineCount = 10;
            //컨트롤러 바 차트의 라인 수
            var controlLineCount = 10;


            function drawDashboard() {

              var data = new google.visualization.DataTable();
              //그래프에 표시할 컬럼 추가
              data.addColumn('datetime', '날짜');
              data.addColumn('number', '남성');
              data.addColumn('number', '여성');
              data.addColumn('number', '전체');

              //그래프에 표시할 데이터
              var dataRow = [];

              for (var i = 0; i <= 29; i++) { //랜덤 데이터 생성
                var total = Math.floor(Math.random() * 300) + 1;
                var man = Math.floor(Math.random() * total) + 1;
                var woman = total - man;

                dataRow = [new Date('2019', '09', i, '10'), man, woman, total];
                data.addRow(dataRow);
              }


              var chart = new google.visualization.ChartWrapper({
                chartType: 'LineChart',
                containerId: 'lineChartArea', //라인 차트 생성할 영역
                options: {
                  isStacked: 'percent',
                  focusTarget: 'category',
                  height: 500,
                  width: '100%',
                  legend: { position: \"top\", textStyle: { fontSize: 13 } },
                  pointSize: 5,
                  tooltip: { textStyle: { fontSize: 12 }, showColorCode: true, trigger: 'both' },
                  hAxis: {
                    format: chartDateformat, gridlines: {
                      count: chartLineCount, units: {
                        years: { format: ['yyyy년'] },
                        months: { format: ['MM월'] },
                        days: { format: ['dd일'] },
                        hours: { format: ['HH시'] }
                      }
                    }, textStyle: { fontSize: 12 }
                  },
                  vAxis: { minValue: 100, viewWindow: { min: 0 }, gridlines: { count: -1 }, textStyle: { fontSize: 12 } },
                  animation: { startup: true, duration: 1000, easing: 'in' },
                  annotations: {
                    pattern: chartDateformat,
                    textStyle: {
                      fontSize: 15,
                      bold: true,
                      italic: true,
                      color: '#871b47',
                      auraColor: '#d799ae',
                      opacity: 0.8,
                      pattern: chartDateformat
                    }
                  }
                }
              });

              var control = new google.visualization.ControlWrapper({
                controlType: 'ChartRangeFilter',
                containerId: 'controlsArea',  //control bar를 생성할 영역
                options: {
                  ui: {
                    chartType: 'LineChart',
                    chartOptions: {
                      chartArea: { 'width': '60%', 'height': 80 },
                      hAxis: {
                        'baselineColor': 'none', format: chartDateformat, textStyle: { fontSize: 12 },
                        gridlines: {
                          count: controlLineCount, units: {
                            years: { format: ['yyyy년'] },
                            months: { format: ['MM월'] },
                            days: { format: ['dd일'] },
                            hours: { format: ['HH시'] }
                          }
                        }
                      }
                    }
                  },
                  filterColumnIndex: 0
                }
              });

              var date_formatter = new google.visualization.DateFormat({ pattern: chartDateformat });
              date_formatter.format(data, 0);

              var dashboard = new google.visualization.Dashboard(document.getElementById('Line_Controls_Chart'));
              window.addEventListener('resize', function () { dashboard.draw(data); }, false); //화면 크기에 따라 그래프 크기 변경
              dashboard.bind([control], [chart]);
              dashboard.draw(data);

            }
            google.charts.setOnLoadCallback(drawDashboard);

          }
        }

        \$(document).ready(function () {
          google.charts.load('current', { 'packages': ['line', 'controls'] });
          chartDrowFun.chartDrow(); //chartDrow() 실행
        });
      </script>


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
/*   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>*/
/*   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>*/
/*   <script type="text/javascript">*/
/*     // Set a global variable for map*/
/*     var map;*/
/* */
/*     var activeInfoWindow;*/
/* */
/*     function initMap() {*/
/*       var options = {*/
/*         //Center : QI(Calit2)*/
/*         center: { lat: 35.866, lng: 128.5986 },*/
/*         zoom: 15,*/
/*         mapTypeId: google.maps.MapTypeId.TERRAIN*/
/*       }*/
/* */
/*       map = new google.maps.Map(document.getElementById("map_canvas"), options);*/
/* */
/*       // Create markers into DOM*/
/*       var json = null;*/
/*       /*$.ajax({*/
/*         'async': false,*/
/*         'global': false,*/
/*         //롱디 레티 들고오는 링크*/
/*         'url': "/getGPS",*/
/*         'dataType': "json",*/
/*         'success': function (data) {*/
/*           createMarkers(data);*/
/*         }*/
/*       });*//* */
/* */
/*       //기존*/
/*       /*$.ajax({*/
/*         method: "GET",*/
/*         url : "/getGPS"*/
/*       }).done(function(data){*/
/*         createMarkers(data);*/
/*       });*//* */
/* */
/*       $.ajax({*/
/*         method: "GET",*/
/*         url: "http://somnium.me:8089/aqi_simulator_v_1_0",*/
/*         dataType: "json"*/
/*       }).done(function (data) {*/
/*         createMarkersTest(data);*/
/*       }).fail((msg) => {*/
/*         console.log(msg);*/
/*         alert(msg + "fail");*/
/*       });*/
/* */
/*     };*/
/* */
/*     //Jack test*/
/*     function createMarkersTest(markerJson) {*/
/* */
/*       var length = Object.keys(markerJson.aqi_data_tier_tuples).length;*/
/* */
/*       var contentString = [];*/
/*       var infowindow = [];*/
/*       var marker = [];*/
/*       var prevPos = 0;*/
/* */
/*       for (let i = 0; i < length; i++) {*/
/*         var sensormark = markerJson.aqi_data_tier_tuples[i];*/
/*         /*sensormark = JSON.parse(`{${sensormark}}`);*/
/* */
/*         alert(sensormark);*//* */
/* */
/*         contentString[i] =*/
/*           '<div id="content">' +*/
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
/*           '<th>' + sensormark.o3_aqi + '</th>' +*/
/*           '<th>10</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> CO </th>' +*/
/*           '<th>' + sensormark.co_sqi + '</th>' +*/
/*           '<th>10</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> NO2 </th>' +*/
/*           '<th>' + sensormark.no2_aqi + '</th>' +*/
/*           '<th>10</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> SO2 </th>' +*/
/*           '<th>값 없음</th>' +*/
/*           '<th>10</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> PM2.5 </th>' +*/
/*           '<th>' + sensormark.pm25_aqi + '</th>' +*/
/*           '<th>10</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> Temperature </th>' +*/
/*           '<th>' + sensormark.temperature + '</th>' +*/
/*           '<th>10</th>' +*/
/*           '</tr>' +*/
/*           '</tbody>' +*/
/*           '</table>' +*/
/*           '</div>' +*/
/*           '</p>' +*/
/*           '</div>';*/
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
/*           position: { lat: sensormark.lat, lng: sensormark.lng },*/
/*           center: { lat: sensormark.lat, lng: sensormark.lng },*/
/*           radius: 50*/
/*           //html: "<span class='pogo_name'>" + sensormark.name + "</a></span><br />" + sensormark.location[0] + "<br />"*/
/*         });*/
/* */
/*         //클릭 이벤트*/
/*         marker[i].addListener('click', function () {*/
/* */
/*           //지금 클릭한 마크 띄우기*/
/*           infowindow[i].open(map, marker[i]);*/
/* */
/*           //지금 클릭한 마크 색상 바꾸기*/
/*           marker[i].setOptions({*/
/*             strokeColor: '#000000',*/
/*             fillColor: '#000000',*/
/*           });*/
/* */
/*           //이전에 클릭된 마크 지우기*/
/*           infowindow[prevPos].close(map, marker[prevPos]);*/
/* */
/*           //이전에 클릭된 마크 색상 바꾸기*/
/*           marker[prevPos].setOptions({*/
/*             strokeColor: '#FF0000',*/
/*             fillColor: '#FF0000',*/
/*           });*/
/*           prevPos = i;*/
/*         });*/
/*       }*/
/* */
/*     }*/
/* */
/*     // Instantiate markers in the background and pass it back to the json object*/
/*     function createMarkers(markerJson) {*/
/*       var length = Object.keys(markerJson).length;*/
/*       alert("createMakers" + markerJson);*/
/*       var contentString = [];*/
/*       var infowindow = [];*/
/*       var marker = [];*/
/*       var prevPos = 0;*/
/* */
/*       for (let i = 0; i < length; i++) {*/
/*         var sensormark = markerJson[i];*/
/*         sensormark = JSON.parse(`{${sensormark}}`);*/
/* */
/*         contentString[i] =*/
/*           '<div id="content">' +*/
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
/* */
/*           //지금 클릭한 마크 띄우기*/
/*           infowindow[i].open(map, marker[i]);*/
/* */
/*           //지금 클릭한 마크 색상 바꾸기*/
/*           marker[i].setOptions({*/
/*             strokeColor: '#000000',*/
/*             fillColor: '#000000',*/
/*           });*/
/* */
/*           //이전에 클릭된 마크 지우기*/
/*           infowindow[prevPos].close(map, marker[prevPos]);*/
/* */
/*           //이전에 클릭된 마크 색상 바꾸기*/
/*           marker[prevPos].setOptions({*/
/*             strokeColor: '#FF0000',*/
/*             fillColor: '#FF0000',*/
/*           });*/
/*           prevPos = i;*/
/*         });*/
/*       }*/
/* */
/*     }*/
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
/*     <img src="http://teamc-iot.calit2.net/mail_iconn.png" style="height: 48px; width:100px;background-color: #01dea5;">*/
/*     <a class="navbar-brand mr-1" href="/maps">Farm-ing</a>*/
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
/*           <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">로그아웃</a>*/
/*         </div>*/
/*       </li>*/
/*     </ul>*/
/*   </nav>*/
/* */
/*   <div id="wrapper">*/
/*     <!-- Sidebar -->*/
/*     <ul class="sidebar navbar-nav">*/
/*       <li class="nav-item active">*/
/*         <a class="nav-link" href="/maps">*/
/*           <i class="fas fa-fw fa-chart-area"></i>*/
/*           <span>실시간 데이터 조회</span></a>*/
/*       </li>*/
/*       <li class="nav-item ">*/
/*         <a class="nav-link" href="/main">*/
/*           <i class="fas fa-fw fa-tachometer-alt"></i>*/
/*           <span>과거 데이터 조회</span>*/
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
/*       <!-- <li class="nav-item">*/
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
/*       </div>*/
/*       <div class="card mb-3">*/
/*         <div class="card-header">*/
/*           <i class="fas fa-chart-area"></i>*/
/*           차트 수정중 구글 라인차트 예제..*/
/*         </div>*/
/*         <div class="card-body">*/
/* */
/*           <!-- 라인 차트 생성할 영역 -->*/
/*           <div id="lineChartArea" style="padding:0px 20px 0px 0px;"></div>*/
/*           <!-- 컨트롤바를 생성할 영역 -->*/
/*           <div id="controlsArea" style="padding:0px 20px 0px 0px;"></div>*/
/*         </div>*/
/*       </div>*/
/* */
/*       <script>*/
/* */
/*         var chartDrowFun = {*/
/* */
/*           chartDrow: function () {*/
/*             var chartData = '';*/
/* */
/*             //날짜형식 변경하고 싶으시면 이 부분 수정하세요.*/
/*             var chartDateformat = 'yyyy년MM월dd일';*/
/*             //라인차트의 라인 수*/
/*             var chartLineCount = 10;*/
/*             //컨트롤러 바 차트의 라인 수*/
/*             var controlLineCount = 10;*/
/* */
/* */
/*             function drawDashboard() {*/
/* */
/*               var data = new google.visualization.DataTable();*/
/*               //그래프에 표시할 컬럼 추가*/
/*               data.addColumn('datetime', '날짜');*/
/*               data.addColumn('number', '남성');*/
/*               data.addColumn('number', '여성');*/
/*               data.addColumn('number', '전체');*/
/* */
/*               //그래프에 표시할 데이터*/
/*               var dataRow = [];*/
/* */
/*               for (var i = 0; i <= 29; i++) { //랜덤 데이터 생성*/
/*                 var total = Math.floor(Math.random() * 300) + 1;*/
/*                 var man = Math.floor(Math.random() * total) + 1;*/
/*                 var woman = total - man;*/
/* */
/*                 dataRow = [new Date('2019', '09', i, '10'), man, woman, total];*/
/*                 data.addRow(dataRow);*/
/*               }*/
/* */
/* */
/*               var chart = new google.visualization.ChartWrapper({*/
/*                 chartType: 'LineChart',*/
/*                 containerId: 'lineChartArea', //라인 차트 생성할 영역*/
/*                 options: {*/
/*                   isStacked: 'percent',*/
/*                   focusTarget: 'category',*/
/*                   height: 500,*/
/*                   width: '100%',*/
/*                   legend: { position: "top", textStyle: { fontSize: 13 } },*/
/*                   pointSize: 5,*/
/*                   tooltip: { textStyle: { fontSize: 12 }, showColorCode: true, trigger: 'both' },*/
/*                   hAxis: {*/
/*                     format: chartDateformat, gridlines: {*/
/*                       count: chartLineCount, units: {*/
/*                         years: { format: ['yyyy년'] },*/
/*                         months: { format: ['MM월'] },*/
/*                         days: { format: ['dd일'] },*/
/*                         hours: { format: ['HH시'] }*/
/*                       }*/
/*                     }, textStyle: { fontSize: 12 }*/
/*                   },*/
/*                   vAxis: { minValue: 100, viewWindow: { min: 0 }, gridlines: { count: -1 }, textStyle: { fontSize: 12 } },*/
/*                   animation: { startup: true, duration: 1000, easing: 'in' },*/
/*                   annotations: {*/
/*                     pattern: chartDateformat,*/
/*                     textStyle: {*/
/*                       fontSize: 15,*/
/*                       bold: true,*/
/*                       italic: true,*/
/*                       color: '#871b47',*/
/*                       auraColor: '#d799ae',*/
/*                       opacity: 0.8,*/
/*                       pattern: chartDateformat*/
/*                     }*/
/*                   }*/
/*                 }*/
/*               });*/
/* */
/*               var control = new google.visualization.ControlWrapper({*/
/*                 controlType: 'ChartRangeFilter',*/
/*                 containerId: 'controlsArea',  //control bar를 생성할 영역*/
/*                 options: {*/
/*                   ui: {*/
/*                     chartType: 'LineChart',*/
/*                     chartOptions: {*/
/*                       chartArea: { 'width': '60%', 'height': 80 },*/
/*                       hAxis: {*/
/*                         'baselineColor': 'none', format: chartDateformat, textStyle: { fontSize: 12 },*/
/*                         gridlines: {*/
/*                           count: controlLineCount, units: {*/
/*                             years: { format: ['yyyy년'] },*/
/*                             months: { format: ['MM월'] },*/
/*                             days: { format: ['dd일'] },*/
/*                             hours: { format: ['HH시'] }*/
/*                           }*/
/*                         }*/
/*                       }*/
/*                     }*/
/*                   },*/
/*                   filterColumnIndex: 0*/
/*                 }*/
/*               });*/
/* */
/*               var date_formatter = new google.visualization.DateFormat({ pattern: chartDateformat });*/
/*               date_formatter.format(data, 0);*/
/* */
/*               var dashboard = new google.visualization.Dashboard(document.getElementById('Line_Controls_Chart'));*/
/*               window.addEventListener('resize', function () { dashboard.draw(data); }, false); //화면 크기에 따라 그래프 크기 변경*/
/*               dashboard.bind([control], [chart]);*/
/*               dashboard.draw(data);*/
/* */
/*             }*/
/*             google.charts.setOnLoadCallback(drawDashboard);*/
/* */
/*           }*/
/*         }*/
/* */
/*         $(document).ready(function () {*/
/*           google.charts.load('current', { 'packages': ['line', 'controls'] });*/
/*           chartDrowFun.chartDrow(); //chartDrow() 실행*/
/*         });*/
/*       </script>*/
/* */
/* */
/*     </div>*/
/*     <!-- /.container-fluid -->*/
/* */
/*     <!-- Sticky Footer -->*/
/*     <footer class="sticky-footer">*/
/*       <div class="container my-auto">*/
/*         <div class="copyright text-center my-auto">*/
/*           <span>Copyright © Your Website 2019</span>*/
/*         </div>*/
/*       </div>*/
/*     </footer>*/
/* */
/*   </div>*/
/*   <!-- /.content-wrapper -->*/
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
