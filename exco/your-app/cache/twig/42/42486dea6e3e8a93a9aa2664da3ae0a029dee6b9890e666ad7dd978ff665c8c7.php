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
        center: { lat: 35.866, lng: 128.5986 }, // 대구
      // center: { lat: 32.8826247, lng: -117.2367698 },  // ucsd
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.TERRAIN
      }

      map = new google.maps.Map(document.getElementById(\"map_canvas\"), options);
      map_test(); // 새로고침 하기 위해서 맵 그리는거 따로 함수 만들었음 
    }

    // ajax 통신 부분만 따로 함수 생성

    function map_test() {
      // Create markers into DOM
      var json = null;

      \$.ajax({
        method: \"GET\",
         url: \"http://somnium.me:8089/aqi_simulator_v_1_0\", //준희형
     // url :\"http://13.125.112.70/Realdata\", // 태현
        dataType: \"json\"
      }).done(function (data) {
        createMarkersTest(data);
        //drawStuff(data); 
      }).fail((msg) => {
        console.log(msg);
        alert(msg + \"fail\");
      });

    };

    var marker = []; // 마커지우기 위해서 전역변수 선언
    //Jack test
    function createMarkersTest(markerJson) {

      deleteMarkers();  // 지도에 모든 마커 지움, setTimeOurt으로 리프래쉬 할때 마커 안지우면 계속 겹쳐서 생성 됨

      var length = Object.keys(markerJson.aqi_data_tier_tuples).length;

      var contentString = [];
      var infowindow = [];
      var prevPos = 0;

      for (let i = 0; i < length; i++) {
        var sensormark = markerJson.aqi_data_tier_tuples[i];

        // row data 부분은 넘겨주는 변수 이름이 없어서 그냥 temp로 넣어둠 나중에 수정해야함
        contentString[i] =
          '<div id=\"content\">' +
          '<div id=\"showupAQI\">' +
          '</div>' +
          '<h4 id=\"firstHeading\" class=\"firstHeading\">' + '위치' + '</h4>' +
          '<h2 id=\"firstHeading\" class=\"firstHeading\">' + '(' + sensormark['lat'] + ',' + sensormark['lng'] + ')' + '</h2>' +
          '<div id=\"bodyContent\">' +
          '<p>' +
          '<div>' +
          '<table class = \"mytable\" width=\"100%\" cellspacing=\"0\">' +
          '<thead>' +
          '<tr>' +
          '<th>원소</th>' +
          '<th>CAI</th>' +
          '</tr>' +
          '</thead>' +
          '<tbody>' +
          '<tr>' +
          '<th> O3 </th>' +
          '<th id = \"aq\">' + sensormark['o3_aqi'] + '</th>' +
          '</tr>' +
          '<tr>' +
          '<th> CO </th>' +
          '<th id = \"aq\">' + sensormark['co_aqi'] + '</th>' +
          '</tr>' +
          '<tr>' +
          '<th> NO2 </th>' +
          '<th id = \"aq\">' + sensormark['no2_aqi'] + '</th>' +
          '</tr>' +
          '<tr>' +
          '<th> SO2 </th>' +
          '<th id = \"aq\">' + sensormark['so2_aqi'] + '</th>' +
          '</tr>' +
          '<tr>' +
          '<th> PM2.5 </th>' +
          '<th id = \"aq\">' + sensormark['pm25_aqi'] + '</th>' +
          '</tr>' +
          '<tr>' +
          '<th> PM10 </th>' +
          '<th id = \"aq\">' + sensormark['pm10_aqi'] + '</th>' +
          '</tr>' +
          '<tr>' +
          '<th> Temperature </th>' +
          '<th>' + sensormark['temperature'] + '</th>' +
          '</tr>' +
          '<tr>' +
          '<th> Humidity </th>' +
          '<th>' + sensormark['humidity'] + '</th>' +
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
          //클릭한 마커에 해당하는 차트 생성위해서 인덱스 넘김
          drawStuff(i);

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
    //모든 마커 삭제 
    function deleteMarkers() {
      for (var i = 0; i < marker.length; i++) {
        marker[i].setMap(null);
      }

      marker = [];
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

        <!-- 회원 아이콘-->
        <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"userDropdown\">
          <a style=\"color: black\">Hi,
            <script>
              var name = sessionStorage.getItem('name');
              document.write(name);
            </script>
          </a>
          <div class=\"dropdown-divider\"></div>
          <a style=\"color: black\" class=\"dropdown-item\" data-toggle=\"modal\" data-target=\"#logoutModal\">로그아웃</a>
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


    </ul>

    <div id=\"content-wrapper\">
      <div class=\"container-fluid\">
        <!-- Google map-->
        <div class=\"card mb-3\">
          <div class=\"card-header\">
            <i class=\"fas fa-chart-area\"></i>
            실시간 데이터 지도

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
          실시간 데이터 차트
        </div>
        <div class=\"card-body\">
          <div id=\"chart_div\" style=\"float:left;\"></div>
          <div class=\"table-responsive2\" style=\" float: right; margin-top: 20px;margin-right: 30px;\">
              <table class=\"table table-bordered\" id=\"dataTable\" cellspacing=\"0\"
                style=\"text-align: center;\">
                <thead>
                  <tr>
                    <th width=\"100px\">원소</th>
                    <th width=\"150px\">CAI DATA</th>
                  </tr>
                  <tr >
                    <th>O3</th>
                    <th id =\"o3\"></th>
                  </tr>
                  <tr>
                    <th>CO</th>
                    <th id =\"co\"></th>
                  </tr>
                  <tr>
                    <th>NO2</th>
                    <th id=\"no2\"></th>
                  </tr>
                  <tr>
                    <th>SO2</th>
                    <th id=\"so2\"></th>
                  </tr>
                  <tr>
                    <th>PM2.5</th>
                    <th id=\"pm25\"></th>
                  </tr>
                  <tr>
                    <th>PM10</th>
                    <th id=\"pm10\"></th>
                  </tr>
                  <tr>
                    <th>Temperature</th>
                    <th id=\"tem\"></th>
                  </tr>
                  <tr>
                    <th>Humidity</th>
                    <th id=\"Humidity\"></th>
                  </tr>
                  <tr>
                      <td  colspan=\"2\"><img src=\"http://13.125.112.70/cai3.png\"></td>
                  </tr>
                </thead>

              </table>
            </div>          
        </div>
      </div>


      <!-- Google Chart-->
      <script type=\"text/javascript\">
        var num; // 몇번 마커 클릭했는지 번호 저장 변수
        var chart_settime;
        // 차트 새로고침 통신 함수
        function chart_re() {
          \$.ajax({
            method: \"GET\", 
            url: \"http://somnium.me:8089/aqi_simulator_v_1_0\",  //준희형
         // url :\"http://13.125.112.70/Realdata\", // 태현
            dataType: \"json\"
          }).done(function (data) {
            aqi_chart(data);
            table_make(data);
          }).fail((msg) => {
            console.log(msg);
            alert(msg + \"fail\");
          });
          chart_settime = setTimeout(chart_re, 1000); // 1초 마다 새로고침
        }

        google.charts.load('current', { 'packages': ['corechart', 'line'] });
        google.charts.setOnLoadCallback(drawStuff);

        var temp_data = [];
        var i = 0;

        // 맵에서 마커 클릭하면 클릭한 마커 인덱스 저장하는 함수
        function drawStuff(chartdata) {
          if (chartdata != null) {
            if (num == chartdata) {
              console.log(\"차트 종료\");
              clearTimeout(chart_settime);
            }
            else {
              num = chartdata;
              console.log(num);
              clearTimeout(chart_settime);
              chart_re();
              
              i = 0
            }
          }
          else {
            console.log(\"차트 데이터 없음\");
            //clearTimeout(chart_settime);
          }
        }

        // 차트 만드는 함수
        function aqi_chart(chartdata) {
          //console.log(num);
          //날짜형식 변경하고 싶으시면 이 부분 수정하세요.
          var chartDateformat = 'yyyy-MM-dd-hh:mm';
          //라인차트의 라인 수
          var chartLineCount = 10;


          temp_data[i] = chartdata.aqi_data_tier_tuples[num];
          var data = new google.visualization.DataTable();
          console.log(temp_data[i]);

          data.addColumn('date', '날짜');
          data.addColumn('number', 'CAI_O3');
          data.addColumn('number', 'CAI_CO');
          data.addColumn('number', 'CAI_NO2');
          data.addColumn('number', 'CAI_SO2');
          data.addColumn('number', 'CAI_PM2.5');
          data.addColumn('number', 'CAI_PM10');
          data.addColumn('number', 'Temperature');
          data.addColumn('number', 'Humidity');

          var dataRow = [];
          var x = 0;
          if (i < 7) {
            x = 0;
          }
          else {
            x = i - 7;
          }
          for (x; x <= i; x++) {
            var c_data = temp_data[x];
            dataRow = [new Date(c_data.timestamp), c_data.o3_aqi, c_data.co_aqi, c_data.no2_aqi, c_data.so2_aqi, c_data.pm25_aqi, c_data.pm10_aqi, c_data.temperature,c_data.humidity];
            data.addRow(dataRow);
          }

          i++;

          var options = {
            isStacked: 'percent',
            focusTarget: 'category',
            height: 500,
            width: 820,
            legend: { position: \"top\", textStyle: { fontSize: 11 } },
            pointSize: 5,
            chartArea: {'width': '90%', 'height': '80%'},
            tooltip: { textStyle: { fontSize: 11 }, showColorCode: true, trigger: 'both' },
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
            //animation        : {startup: true,duration: 1000,easing: 'in' },
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

          };

          var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        }

        function table_make(data) {

          \$(\"#senosr_list\").empty()
          var table_data = data.aqi_data_tier_tuples[num];
          console.log(\"--------------\");
          console.log(table_data);


          var o3 = document.getElementById(\"o3\");
          var text = table_data.o3_aqi;
          o3.innerHTML = text;
          if (table_data.o3_aqi >= 0 && table_data.o3_aqi <= 50) {
            o3.style.color = \"#0000ff\";            
          }
          else if (table_data.o3_aqi >= 51 && table_data.o3_aqi <= 100) {
            o3.style.color = \"#00ff00\";         
          }
          else if (table_data.o3_aqi >= 101 && table_data.o3_aqi <= 250) {
            o3.style.color = \"#ffff00\";
          }
          else if (table_data.o3_aqi <= 251) {
            o3.style.color = \"#ff0000\";       
          }

          var CO = document.getElementById('co');
          var text = table_data.co_aqi;
          CO.innerHTML = text;
          if (table_data.co_aqi >= 0 && table_data.co_aqi <= 50) {
            CO.style.color = \"#0000ff\";
          }
          else if (table_data.co_aqi >= 51 && table_data.co_aqi <= 100) {
            CO.style.color = \"#00ff00\";
          }
          else if (table_data.co_aqi >= 101 && table_data.co_aqi <= 250) {
            CO.style.color = \"#ffff00\";
          }
          else if (table_data.co_aqi <= 251) {
            CO.style.color = \"#ff0000\";
          }

          var NO2 = document.getElementById('no2');
          var text = table_data.no2_aqi;
          NO2.innerHTML = text;
          if (table_data.no2_aqi >= 0 && table_data.no2_aqi <= 50) {
            NO2.style.color = \"#0000ff\";
          }
          else if (table_data.no2_aqi >= 51 && table_data.no2_aqi <= 100) {
            NO2.style.color = \"#00ff00\";
          }
          else if (table_data.no2_aqi >= 101 && table_data.no2_aqi <= 250) {
            NO2.style.color = \"#ffff00\";
          }
          else if (table_data.no2_aqi <= 251) {
            NO2.style.color = \"#ff0000\";
          }

          var SO2 = document.getElementById('so2');
          var text = table_data.so2_aqi;
          SO2.innerHTML = text;
          if (table_data.so2_aqi >= 0 && table_data.so2_aqi <= 50) {
            SO2.style.color = \"#0000ff\";
          }
          else if (table_data.so2_aqi >= 51 && table_data.so2_aqi <= 100) {
            SO2.style.color = \"#00ff00\";
          }
          else if (table_data.so2_aqi >= 101 && table_data.so2_aqi <= 250) {
            SO2.style.color = \"#ffff00\";
          }
          else if (table_data.so2_aqi <= 251) {
            SO2.style.color = \"#ff0000\";
          }
      
          var PM25 = document.getElementById('pm25');
          var text = table_data.pm25_aqi;
          PM25.innerHTML = text;
          if (table_data.pm25_aqi >= 0 && table_data.pm25_aqi <= 50) {
            PM25.style.color = \"#0000ff\";
          }
          else if (table_data.pm25_aqi >= 51 && table_data.pm25_aqi <= 100) {
            PM25.style.color = \"#00ff00\";
          }
          else if (table_data.pm25_aqi >= 101 && table_data.pm25_aqi <= 250) {
            PM25.style.color = \"#ffff00\";
          }
          else if (table_data.pm25_aqi <= 251) {
            PM25.style.color = \"#ff0000\";
          }

          var PM10 = document.getElementById('pm10');
          var text = table_data.pm10_aqi;
          PM10.innerHTML = text;
          if (table_data.pm10_aqi >= 0 && table_data.pm10_aqi <= 50) {
            PM10.style.color = \"#0000ff\";
          }
          else if (table_data.pm10_aqi >= 51 && table_data.pm10_aqi <= 100) {
            PM10.style.color = \"#00ff00\";
          }
          else if (table_data.pm10_aqi >= 101 && table_data.pm10_aqi <= 250) {
            PM10.style.color = \"#ffff00\";
          }
          else if (table_data.pm10_aqi <= 251) {
            PM10.style.color = \"#ff0000\";
          }

          var Humidity = document.getElementById('Humidity');
          var text = table_data.humidity;
          Humidity.innerHTML = text;

          var TEM = document.getElementById('tem');
          var text = table_data.temperature;
          TEM.innerHTML = text;

        }
        
      </script>


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
/*         center: { lat: 35.866, lng: 128.5986 }, // 대구*/
/*       // center: { lat: 32.8826247, lng: -117.2367698 },  // ucsd*/
/*         zoom: 15,*/
/*         mapTypeId: google.maps.MapTypeId.TERRAIN*/
/*       }*/
/* */
/*       map = new google.maps.Map(document.getElementById("map_canvas"), options);*/
/*       map_test(); // 새로고침 하기 위해서 맵 그리는거 따로 함수 만들었음 */
/*     }*/
/* */
/*     // ajax 통신 부분만 따로 함수 생성*/
/* */
/*     function map_test() {*/
/*       // Create markers into DOM*/
/*       var json = null;*/
/* */
/*       $.ajax({*/
/*         method: "GET",*/
/*          url: "http://somnium.me:8089/aqi_simulator_v_1_0", //준희형*/
/*      // url :"http://13.125.112.70/Realdata", // 태현*/
/*         dataType: "json"*/
/*       }).done(function (data) {*/
/*         createMarkersTest(data);*/
/*         //drawStuff(data); */
/*       }).fail((msg) => {*/
/*         console.log(msg);*/
/*         alert(msg + "fail");*/
/*       });*/
/* */
/*     };*/
/* */
/*     var marker = []; // 마커지우기 위해서 전역변수 선언*/
/*     //Jack test*/
/*     function createMarkersTest(markerJson) {*/
/* */
/*       deleteMarkers();  // 지도에 모든 마커 지움, setTimeOurt으로 리프래쉬 할때 마커 안지우면 계속 겹쳐서 생성 됨*/
/* */
/*       var length = Object.keys(markerJson.aqi_data_tier_tuples).length;*/
/* */
/*       var contentString = [];*/
/*       var infowindow = [];*/
/*       var prevPos = 0;*/
/* */
/*       for (let i = 0; i < length; i++) {*/
/*         var sensormark = markerJson.aqi_data_tier_tuples[i];*/
/* */
/*         // row data 부분은 넘겨주는 변수 이름이 없어서 그냥 temp로 넣어둠 나중에 수정해야함*/
/*         contentString[i] =*/
/*           '<div id="content">' +*/
/*           '<div id="showupAQI">' +*/
/*           '</div>' +*/
/*           '<h4 id="firstHeading" class="firstHeading">' + '위치' + '</h4>' +*/
/*           '<h2 id="firstHeading" class="firstHeading">' + '(' + sensormark['lat'] + ',' + sensormark['lng'] + ')' + '</h2>' +*/
/*           '<div id="bodyContent">' +*/
/*           '<p>' +*/
/*           '<div>' +*/
/*           '<table class = "mytable" width="100%" cellspacing="0">' +*/
/*           '<thead>' +*/
/*           '<tr>' +*/
/*           '<th>원소</th>' +*/
/*           '<th>CAI</th>' +*/
/*           '</tr>' +*/
/*           '</thead>' +*/
/*           '<tbody>' +*/
/*           '<tr>' +*/
/*           '<th> O3 </th>' +*/
/*           '<th id = "aq">' + sensormark['o3_aqi'] + '</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> CO </th>' +*/
/*           '<th id = "aq">' + sensormark['co_aqi'] + '</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> NO2 </th>' +*/
/*           '<th id = "aq">' + sensormark['no2_aqi'] + '</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> SO2 </th>' +*/
/*           '<th id = "aq">' + sensormark['so2_aqi'] + '</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> PM2.5 </th>' +*/
/*           '<th id = "aq">' + sensormark['pm25_aqi'] + '</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> PM10 </th>' +*/
/*           '<th id = "aq">' + sensormark['pm10_aqi'] + '</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> Temperature </th>' +*/
/*           '<th>' + sensormark['temperature'] + '</th>' +*/
/*           '</tr>' +*/
/*           '<tr>' +*/
/*           '<th> Humidity </th>' +*/
/*           '<th>' + sensormark['humidity'] + '</th>' +*/
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
/*           //클릭한 마커에 해당하는 차트 생성위해서 인덱스 넘김*/
/*           drawStuff(i);*/
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
/*     //모든 마커 삭제 */
/*     function deleteMarkers() {*/
/*       for (var i = 0; i < marker.length; i++) {*/
/*         marker[i].setMap(null);*/
/*       }*/
/* */
/*       marker = [];*/
/*     }*/
/* */
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
/*     <img src="http://teamc-iot.calit2.net/mail_iconn.png" style="height: 48px; width:100px;background-color: #56b275;">*/
/*     <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">*/
/*       <i class="fas fa-bars"></i>*/
/*     </button>*/
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
/*           <a style="color: black">Hi,*/
/*             <script>*/
/*               var name = sessionStorage.getItem('name');*/
/*               document.write(name);*/
/*             </script>*/
/*           </a>*/
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
/* */
/* */
/*     </ul>*/
/* */
/*     <div id="content-wrapper">*/
/*       <div class="container-fluid">*/
/*         <!-- Google map-->*/
/*         <div class="card mb-3">*/
/*           <div class="card-header">*/
/*             <i class="fas fa-chart-area"></i>*/
/*             실시간 데이터 지도*/
/* */
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
/* */
/*       <div class="card mb-3">*/
/*         <div class="card-header">*/
/*           <i class="fas fa-chart-area"></i>*/
/*           실시간 데이터 차트*/
/*         </div>*/
/*         <div class="card-body">*/
/*           <div id="chart_div" style="float:left;"></div>*/
/*           <div class="table-responsive2" style=" float: right; margin-top: 20px;margin-right: 30px;">*/
/*               <table class="table table-bordered" id="dataTable" cellspacing="0"*/
/*                 style="text-align: center;">*/
/*                 <thead>*/
/*                   <tr>*/
/*                     <th width="100px">원소</th>*/
/*                     <th width="150px">CAI DATA</th>*/
/*                   </tr>*/
/*                   <tr >*/
/*                     <th>O3</th>*/
/*                     <th id ="o3"></th>*/
/*                   </tr>*/
/*                   <tr>*/
/*                     <th>CO</th>*/
/*                     <th id ="co"></th>*/
/*                   </tr>*/
/*                   <tr>*/
/*                     <th>NO2</th>*/
/*                     <th id="no2"></th>*/
/*                   </tr>*/
/*                   <tr>*/
/*                     <th>SO2</th>*/
/*                     <th id="so2"></th>*/
/*                   </tr>*/
/*                   <tr>*/
/*                     <th>PM2.5</th>*/
/*                     <th id="pm25"></th>*/
/*                   </tr>*/
/*                   <tr>*/
/*                     <th>PM10</th>*/
/*                     <th id="pm10"></th>*/
/*                   </tr>*/
/*                   <tr>*/
/*                     <th>Temperature</th>*/
/*                     <th id="tem"></th>*/
/*                   </tr>*/
/*                   <tr>*/
/*                     <th>Humidity</th>*/
/*                     <th id="Humidity"></th>*/
/*                   </tr>*/
/*                   <tr>*/
/*                       <td  colspan="2"><img src="http://13.125.112.70/cai3.png"></td>*/
/*                   </tr>*/
/*                 </thead>*/
/* */
/*               </table>*/
/*             </div>          */
/*         </div>*/
/*       </div>*/
/* */
/* */
/*       <!-- Google Chart-->*/
/*       <script type="text/javascript">*/
/*         var num; // 몇번 마커 클릭했는지 번호 저장 변수*/
/*         var chart_settime;*/
/*         // 차트 새로고침 통신 함수*/
/*         function chart_re() {*/
/*           $.ajax({*/
/*             method: "GET", */
/*             url: "http://somnium.me:8089/aqi_simulator_v_1_0",  //준희형*/
/*          // url :"http://13.125.112.70/Realdata", // 태현*/
/*             dataType: "json"*/
/*           }).done(function (data) {*/
/*             aqi_chart(data);*/
/*             table_make(data);*/
/*           }).fail((msg) => {*/
/*             console.log(msg);*/
/*             alert(msg + "fail");*/
/*           });*/
/*           chart_settime = setTimeout(chart_re, 1000); // 1초 마다 새로고침*/
/*         }*/
/* */
/*         google.charts.load('current', { 'packages': ['corechart', 'line'] });*/
/*         google.charts.setOnLoadCallback(drawStuff);*/
/* */
/*         var temp_data = [];*/
/*         var i = 0;*/
/* */
/*         // 맵에서 마커 클릭하면 클릭한 마커 인덱스 저장하는 함수*/
/*         function drawStuff(chartdata) {*/
/*           if (chartdata != null) {*/
/*             if (num == chartdata) {*/
/*               console.log("차트 종료");*/
/*               clearTimeout(chart_settime);*/
/*             }*/
/*             else {*/
/*               num = chartdata;*/
/*               console.log(num);*/
/*               clearTimeout(chart_settime);*/
/*               chart_re();*/
/*               */
/*               i = 0*/
/*             }*/
/*           }*/
/*           else {*/
/*             console.log("차트 데이터 없음");*/
/*             //clearTimeout(chart_settime);*/
/*           }*/
/*         }*/
/* */
/*         // 차트 만드는 함수*/
/*         function aqi_chart(chartdata) {*/
/*           //console.log(num);*/
/*           //날짜형식 변경하고 싶으시면 이 부분 수정하세요.*/
/*           var chartDateformat = 'yyyy-MM-dd-hh:mm';*/
/*           //라인차트의 라인 수*/
/*           var chartLineCount = 10;*/
/* */
/* */
/*           temp_data[i] = chartdata.aqi_data_tier_tuples[num];*/
/*           var data = new google.visualization.DataTable();*/
/*           console.log(temp_data[i]);*/
/* */
/*           data.addColumn('date', '날짜');*/
/*           data.addColumn('number', 'CAI_O3');*/
/*           data.addColumn('number', 'CAI_CO');*/
/*           data.addColumn('number', 'CAI_NO2');*/
/*           data.addColumn('number', 'CAI_SO2');*/
/*           data.addColumn('number', 'CAI_PM2.5');*/
/*           data.addColumn('number', 'CAI_PM10');*/
/*           data.addColumn('number', 'Temperature');*/
/*           data.addColumn('number', 'Humidity');*/
/* */
/*           var dataRow = [];*/
/*           var x = 0;*/
/*           if (i < 7) {*/
/*             x = 0;*/
/*           }*/
/*           else {*/
/*             x = i - 7;*/
/*           }*/
/*           for (x; x <= i; x++) {*/
/*             var c_data = temp_data[x];*/
/*             dataRow = [new Date(c_data.timestamp), c_data.o3_aqi, c_data.co_aqi, c_data.no2_aqi, c_data.so2_aqi, c_data.pm25_aqi, c_data.pm10_aqi, c_data.temperature,c_data.humidity];*/
/*             data.addRow(dataRow);*/
/*           }*/
/* */
/*           i++;*/
/* */
/*           var options = {*/
/*             isStacked: 'percent',*/
/*             focusTarget: 'category',*/
/*             height: 500,*/
/*             width: 820,*/
/*             legend: { position: "top", textStyle: { fontSize: 11 } },*/
/*             pointSize: 5,*/
/*             chartArea: {'width': '90%', 'height': '80%'},*/
/*             tooltip: { textStyle: { fontSize: 11 }, showColorCode: true, trigger: 'both' },*/
/*             hAxis: {*/
/*               format: chartDateformat, gridlines: {*/
/*                 count: chartLineCount, units: {*/
/*                   years: { format: ['yyyy년'] },*/
/*                   months: { format: ['MM월'] },*/
/*                   days: { format: ['dd일'] },*/
/*                   hours: { format: ['HH시'] }*/
/*                 }*/
/*               }, textStyle: { fontSize: 12 }*/
/*             },*/
/*             vAxis: { minValue: 100, viewWindow: { min: 0 }, gridlines: { count: -1 }, textStyle: { fontSize: 12 } },*/
/*             //animation        : {startup: true,duration: 1000,easing: 'in' },*/
/*             annotations: {*/
/*               pattern: chartDateformat,*/
/*               textStyle: {*/
/*                 fontSize: 15,*/
/*                 bold: true,*/
/*                 italic: true,*/
/*                 color: '#871b47',*/
/*                 auraColor: '#d799ae',*/
/*                 opacity: 0.8,*/
/*                 pattern: chartDateformat*/
/*               }*/
/*             }*/
/* */
/*           };*/
/* */
/*           var chart = new google.visualization.LineChart(document.getElementById('chart_div'));*/
/*           chart.draw(data, options);*/
/*         }*/
/* */
/*         function table_make(data) {*/
/* */
/*           $("#senosr_list").empty()*/
/*           var table_data = data.aqi_data_tier_tuples[num];*/
/*           console.log("--------------");*/
/*           console.log(table_data);*/
/* */
/* */
/*           var o3 = document.getElementById("o3");*/
/*           var text = table_data.o3_aqi;*/
/*           o3.innerHTML = text;*/
/*           if (table_data.o3_aqi >= 0 && table_data.o3_aqi <= 50) {*/
/*             o3.style.color = "#0000ff";            */
/*           }*/
/*           else if (table_data.o3_aqi >= 51 && table_data.o3_aqi <= 100) {*/
/*             o3.style.color = "#00ff00";         */
/*           }*/
/*           else if (table_data.o3_aqi >= 101 && table_data.o3_aqi <= 250) {*/
/*             o3.style.color = "#ffff00";*/
/*           }*/
/*           else if (table_data.o3_aqi <= 251) {*/
/*             o3.style.color = "#ff0000";       */
/*           }*/
/* */
/*           var CO = document.getElementById('co');*/
/*           var text = table_data.co_aqi;*/
/*           CO.innerHTML = text;*/
/*           if (table_data.co_aqi >= 0 && table_data.co_aqi <= 50) {*/
/*             CO.style.color = "#0000ff";*/
/*           }*/
/*           else if (table_data.co_aqi >= 51 && table_data.co_aqi <= 100) {*/
/*             CO.style.color = "#00ff00";*/
/*           }*/
/*           else if (table_data.co_aqi >= 101 && table_data.co_aqi <= 250) {*/
/*             CO.style.color = "#ffff00";*/
/*           }*/
/*           else if (table_data.co_aqi <= 251) {*/
/*             CO.style.color = "#ff0000";*/
/*           }*/
/* */
/*           var NO2 = document.getElementById('no2');*/
/*           var text = table_data.no2_aqi;*/
/*           NO2.innerHTML = text;*/
/*           if (table_data.no2_aqi >= 0 && table_data.no2_aqi <= 50) {*/
/*             NO2.style.color = "#0000ff";*/
/*           }*/
/*           else if (table_data.no2_aqi >= 51 && table_data.no2_aqi <= 100) {*/
/*             NO2.style.color = "#00ff00";*/
/*           }*/
/*           else if (table_data.no2_aqi >= 101 && table_data.no2_aqi <= 250) {*/
/*             NO2.style.color = "#ffff00";*/
/*           }*/
/*           else if (table_data.no2_aqi <= 251) {*/
/*             NO2.style.color = "#ff0000";*/
/*           }*/
/* */
/*           var SO2 = document.getElementById('so2');*/
/*           var text = table_data.so2_aqi;*/
/*           SO2.innerHTML = text;*/
/*           if (table_data.so2_aqi >= 0 && table_data.so2_aqi <= 50) {*/
/*             SO2.style.color = "#0000ff";*/
/*           }*/
/*           else if (table_data.so2_aqi >= 51 && table_data.so2_aqi <= 100) {*/
/*             SO2.style.color = "#00ff00";*/
/*           }*/
/*           else if (table_data.so2_aqi >= 101 && table_data.so2_aqi <= 250) {*/
/*             SO2.style.color = "#ffff00";*/
/*           }*/
/*           else if (table_data.so2_aqi <= 251) {*/
/*             SO2.style.color = "#ff0000";*/
/*           }*/
/*       */
/*           var PM25 = document.getElementById('pm25');*/
/*           var text = table_data.pm25_aqi;*/
/*           PM25.innerHTML = text;*/
/*           if (table_data.pm25_aqi >= 0 && table_data.pm25_aqi <= 50) {*/
/*             PM25.style.color = "#0000ff";*/
/*           }*/
/*           else if (table_data.pm25_aqi >= 51 && table_data.pm25_aqi <= 100) {*/
/*             PM25.style.color = "#00ff00";*/
/*           }*/
/*           else if (table_data.pm25_aqi >= 101 && table_data.pm25_aqi <= 250) {*/
/*             PM25.style.color = "#ffff00";*/
/*           }*/
/*           else if (table_data.pm25_aqi <= 251) {*/
/*             PM25.style.color = "#ff0000";*/
/*           }*/
/* */
/*           var PM10 = document.getElementById('pm10');*/
/*           var text = table_data.pm10_aqi;*/
/*           PM10.innerHTML = text;*/
/*           if (table_data.pm10_aqi >= 0 && table_data.pm10_aqi <= 50) {*/
/*             PM10.style.color = "#0000ff";*/
/*           }*/
/*           else if (table_data.pm10_aqi >= 51 && table_data.pm10_aqi <= 100) {*/
/*             PM10.style.color = "#00ff00";*/
/*           }*/
/*           else if (table_data.pm10_aqi >= 101 && table_data.pm10_aqi <= 250) {*/
/*             PM10.style.color = "#ffff00";*/
/*           }*/
/*           else if (table_data.pm10_aqi <= 251) {*/
/*             PM10.style.color = "#ff0000";*/
/*           }*/
/* */
/*           var Humidity = document.getElementById('Humidity');*/
/*           var text = table_data.humidity;*/
/*           Humidity.innerHTML = text;*/
/* */
/*           var TEM = document.getElementById('tem');*/
/*           var text = table_data.temperature;*/
/*           TEM.innerHTML = text;*/
/* */
/*         }*/
/*         */
/*       </script>*/
/* */
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
