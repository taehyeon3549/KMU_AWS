var marker = [];

function clear_marker() {
    marker.map((tuple)=> {
        tuple.setMap(null)
    });
    marker = [];
}

function draw_markers(tuples) {
    clear_marker();
    tuples.map((tuple)=> {
        marker.push(new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            position: { lat: tuple.lat, lng: tuple.lng},
            center: { lat: tuple.lat, lng: tuple.lng},
            radius: 50
            //html: "<span class='pogo_name'>" + sensormark.name + "</a></span><br />" + sensormark.location[0] + "<br />"
        }));

        var contentString =
        '<div id="content">' +
        '<div id="showupAQI">' +
        '</div>' +
        '<h4 id="firstHeading" class="firstHeading">' + '위치' + '</h4>' +
        '<h2 id="firstHeading" class="firstHeading">' + '(' + tuple['lat'] + ',' + tuple['lng'] + ')' + '</h2>' +
        '<div id="bodyContent">' +
        '<p>' +
        '<div>' +
        '<table class = "mytable" width="100%" cellspacing="0">' +
        '<thead>' +
        '<tr>' +
        '<th>원소</th>' +
        '<th>CAI</th>' +
        '</tr>' +
        '</thead>' +
        '<tbody>' +
        '<tr>' +
        '<th> O3 </th>' +
        '<th id = "aq">' + tuple['o3_aqi'] + '</th>' +
        '</tr>' +
        '<tr>' +
        '<th> CO </th>' +
        '<th id = "aq">' + tuple['co_aqi'] + '</th>' +
        '</tr>' +
        '<tr>' +
        '<th> NO2 </th>' +
        '<th id = "aq">' + tuple['no2_aqi'] + '</th>' +
        '</tr>' +
        '<tr>' +
        '<th> SO2 </th>' +
        '<th id = "aq">' + tuple['so2_aqi'] + '</th>' +
        '</tr>' +
        '<tr>' +
        '<th> PM2.5 </th>' +
        '<th id = "aq">' + tuple['pm25_aqi'] + '</th>' +
        '</tr>' +
        '<tr>' +
        '<th> PM10 </th>' +
        '<th id = "aq">' + tuple['pm10_aqi'] + '</th>' +
        '</tr>' +
        '<tr>' +
        '<th> Temperature </th>' +
        '<th>' + tuple['temperature'] + '</th>' +
        '</tr>' +
        '<tr>' +
        '<th> Humidity </th>' +
        '<th>' + tuple['humidity'] + '</th>' +
        '</tr>' +
        '</tbody>' +
        '</table>' +
        '</div>' +
        '</p>' +
        '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        marker.addListener('click', function () {

            //지금 클릭한 마크 띄우기
            infowindow.open(map, marker);
            //클릭한 마커에 해당하는 차트 생성위해서 인덱스 넘김
            //drawStuff(i);
  
            //지금 클릭한 마크 색상 바꾸기
            marker.setOptions({
              strokeColor: '#000000',
              fillColor: '#000000',
            });
  
            //이전에 클릭된 마크 지우기
            //infowindow[prevPos].close(map, marker[prevPos]);
  
            //이전에 클릭된 마크 색상 바꾸기
            // marker[prevPos].setOptions({
            //   strokeColor: '#FF0000',
            //   fillColor: '#FF0000',
            // });
            //prevPos = i;
          });
    });
}

function get_air_tuples(){
    $.ajax({
        method: "GET",
        url: "http://somnium.me:8089/aqi_simulator_v_1_0", //준희형
        // url :"http://13.125.112.70/Realdata", // 태현
        dataType: "json"
    }).done(function (data) {
        draw_markers(data)
        //drawStuff(data); 
    }).fail((msg) => {
        console.log(msg);
        alert(msg + "fail");
    });
}

let timer = setTimeout(get_air_tuples(), 3000);