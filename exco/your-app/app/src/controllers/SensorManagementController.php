<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class SensorManagementController extends BaseController
{
	protected $logger;
	protected $SensorManagementModel;
	protected $view;

	public function __construct($logger, $SensorManagementModel, $view)
	{
		$this->logger = $logger;
		$this->SensorManagementModel = $SensorManagementModel;
		$this->view = $view;
	}

	//Registratioin sensor info
	//0: success, 1: Already exist the sensor, 2: Registeration fail
	public function registrationSensor(Request $request, Response $response, $args)
	{
		$sensor = [];

		$sensor['usn'] = $request->getParsedBody()['usn'];
		$sensor['mac'] = $request->getParsedBody()['mac'];
		$sensor['sensor_name'] = $request->getParsedBody()['sensor_name'];
		$sensor['state'] = 1;

		//check duplicate of mac address	
		if($this->SensorManagementModel->checkSensor($sensor) == 0){
			//not exist go ahead
			//Check the empty ssn
			$empty_ssn = $this->SensorManagementModel->checkEmptyssn();
			$num = count($empty_ssn);			

			if($num > 0){
				//exsit empty ssn
				$sensor['ssn'] = $empty_ssn['val'];
			}

			//Register the sensor
			if($this->SensorManagementModel->regitSensor($sensor)){
				//success register the sensor
				//get Insert sensor's info
				$info = $this->SensorManagementModel->getSensorBymac($sensor['mac']);
				
				$result['header'] = "Registeration success";
				$result['message'] = [];
				$result['message']['result'] = 0;
				$result['message']['ssn'] = $info['SSN'];
				$result['message']['mac'] = $info['s_MAC'];
				$result['message']['sensor_name'] = $info['s_name'];
			}else{
				//fail register the sensor
				$result['header'] = "Registeration fail";
				$result['message'] = [];
				$result['message']['result'] = 2;
			}						
		}else{
			//exist
			$result['header'] = "Already exist the sensor";
			$result['message'] = [];
			$result['message']['result'] = 1;
		}

		return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($result, JSON_NUMERIC_CHECK));
	}

	//Deregistratioin sensor info	
	//0: Delete sensor success, 1: Delete Air sensor value fail, 2: Delete Polar sensor value fail
	public function deregistrationSensor(Request $request, Response $response, $args)
	{
		$sensor = [];
		//Get usn, ssn
		$sensor['usn'] = $request->getParsedBody()['usn'];
		$sensor['ssn'] = $request->getParsedBody()['ssn'];

		//delete air sensor value
		if($this->SensorManagementModel->deleteAir($sensor)){
			//delete air success
			if($this->SensorManagementModel->deletePolar($sensor)){
				//delete polar success
				//deregit sensor
				if($this->SensorManagementModel->deregitSensor($sensor)){
					//delete ALL data
					$result['header'] = "Delete sensor success";
					$result['message'] = "0";
				}
			}else{
				//delete polar fail
				$result['header'] = "Delete Polar sensor value fail";
				$result['message'] = "2";
			}
		}else{
			//delete air fail
			$result['header'] = "Delete Air sensor value fail";
			$result['message'] = "1";
		}

		return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($result, JSON_NUMERIC_CHECK));
	}

	//Sensor List
	public function sensorList(Request $request, Response $response, $args)
	{
		$sensor = [];
		$usn = $request->getParsedBody()['usn'];
		$sensor_val = $this->SensorManagementModel->getSensorByusn($usn);
		
		//결과 넣은 값
		$num = count($sensor_val);
		//echo($num);

		$result['header'] = "Sensor List ";
		$result['message'] = [];
		
		for($i = 0; $i< $num; $i++){
			$result['message'][$i]['ssn'] = $sensor_val[$i]['SSN'];
			$result['message'][$i]['mac'] = $sensor_val[$i]['s_MAC'];
			$result['message'][$i]['name'] = $sensor_val[$i]['s_name'];
			$result['message'][$i]['state'] = $sensor_val[$i]['s_state'];
		}

		$result['result'] = 0;

		return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($result, JSON_NUMERIC_CHECK));

	}

	//insert sensor data	
	public function insertAirSensor(Request $request, Response $response, $args)
	{
		$senosr = [];

		$sensor['usn'] = $request->getParsedBody()['usn'];
		$sensor['ssn'] = $request->getParsedBody()['ssn'];
		$sensor['pm2_5'] = $request->getParsedBody()['pm2_5'];
		$sensor['pm10'] = $request->getParsedBody()['pm10'];
		$sensor['o3'] = $request->getParsedBody()['o3'];
		$sensor['co'] = $request->getParsedBody()['co'];
		$sensor['no2'] = $request->getParsedBody()['no2'];
		$sensor['so2'] = $request->getParsedBody()['so2'];
		$sensor['temperture'] = $request->getParsedBody()['temperture'];
		$sensor['humidity'] = $request->getParsedBody()['humidity'];
		$sensor['latitude'] = $request->getParsedBody()['latitude'];
		$sensor['longitude'] = $request->getParsedBody()['longitude'];
		$sensor['time'] = $request->getParsedBody()['time'];
		$sensor['aq_pm2_5'] = $request->getParsedBody()['aq_pm2_5'];
		$sensor['aq_pm10'] = $request->getParsedBody()['aq_pm10'];
		$sensor['aq_o3'] = $request->getParsedBody()['aq_o3'];
		$sensor['aq_co'] = $request->getParsedBody()['aq_co'];
		$sensor['aq_no2'] = $request->getParsedBody()['aq_no2'];
		$sensor['aq_so2'] = $request->getParsedBody()['aq_so2'];
		
		print_r($sensor);

		if($this->SensorManagementModel->insertAirdata($sensor)){
			$result['header'] = "success";
			$result['message'] = "0";
		}else{
			$result['header'] = "fail";
			$result['message'] = "1";	
		}

		return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($result, JSON_NUMERIC_CHECK));
	}

	//insert sensor data	
	public function insertPolarSensor(Request $request, Response $response, $args)
	{
		$senosr = [];

		$sensor['usn'] = $request->getParsedBody()['usn'];
		$sensor['ssn'] = $request->getParsedBody()['ssn'];
		$sensor['heartrate'] = $request->getParsedBody()['heartrate'];
		$sensor['RR_interval'] = $request->getParsedBody()['RR_interval'];
		$sensor['latitude'] = $request->getParsedBody()['latitude'];
		$sensor['longitude'] = $request->getParsedBody()['longitude'];
		$sensor['time'] = $request->getParsedBody()['time'];

		if($this->SensorManagementModel->insertPolardata($sensor)){
			$result['header'] = "success";
			$result['message'] = "0";
		}else{
			$result['header'] = "fail";
			$result['message'] = "1";	
		}

		return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($result, JSON_NUMERIC_CHECK));
	}

	//showRealair	
	public function showRealdata(Request $request, Response $response, $args)
	{
		$senosr = [];

		$sensor['ssn'] = $request->getParsedBody()['ssn'];
		$sensor['sensor_name'] = $request->getParsedBody()['sensor_name'];

		$data = $this->SensorManagementModel->showRealdata($sensor);
		$num = count($data);

		if($num > 0){
			$result['header'] = "success";
			$result['message'] = [];
			
			$str = explode('_', $sensor['sensor_name']);

			if($str[0] == "Air"){
				$result['message']['PM2_5'] = $data['a_PM2_5'];
				$result['message']['PM10'] = $data['a_PM10'];
				$result['message']['o3'] = $data['a_O3'];
				$result['message']['co'] = $data['a_CO'];
				$result['message']['no2'] = $data['a_NO2'];
				$result['message']['so2'] = $data['a_SO2'];
				$result['message']['temperture'] = $data['a_Temperture'];
				$result['message']['latitude'] = $data['a_latitude'];
				$result['message']['longitude'] = $data['a_longitude'];
				$result['message']['time'] = $data['a_time'];
				$result['message']['aq_pm2_5'] = $data['AQ_PM2_5'];
				$result['message']['aq_o3'] = $data['AQ_O3'];
				$result['message']['aq_co'] = $data['AQ_CO'];
				$result['message']['aq_no2'] = $data['AQ_NO2'];
				$result['message']['aq_so2'] = $data['AQ_SO2'];

				$result['result'] = "0";
			}else{
				$result['message']['heartrate'] = $data['p_heartrate'];
				$result['message']['rr_interval'] = $data['p_RR_interval'];
				$result['message']['latitude'] = $data['p_longitude'];
				$result['message']['longitude'] = $data['p_longitude'];
				$result['message']['time'] = $data['p_time'];
			}	
		}else{
			$result['header'] = "fail";
			$result['message'] = "1";	
		}

		return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($result, JSON_NUMERIC_CHECK));
	}

	//2019-10-27
	// 수정	
	//RealData	
	public function Realdata(Request $request, Response $response, $args)
	{
		$senosr = [];

		$sensor['ssn'] = $request->getParsedBody()['ssn'];
		$sensor['sensor_name'] = $request->getParsedBody()['sensor_name'];

		$data = $this->SensorManagementModel->Realdata($sensor);
		
		//print_r($data);

		//결과값
		$result['aqi_data_tier_tuples'] = null;

		$k = 0;

		//갱신 시간과 삽입 시간의 차이가 5시간 이상인 값들은 제외하고 반환
		for($i = 0; $i < count($data); $i++){
			$date1 = $data[$i]['insert_time'];
			$date2 = $data[$i]['timestamp'];

			//시간 정하기
			if(((strtotime($date1) - strtotime($date2)) / 3600) <= 5){
				$result['aqi_data_tier_tuples'][$k]['ssn'] = $data[$i]['ssn'];
				$result['aqi_data_tier_tuples'][$k]['wmac'] = $data[$i]['wmac'];
				$result['aqi_data_tier_tuples'][$k]['timestamp'] = $data[$i]['timestamp'];
				$result['aqi_data_tier_tuples'][$k]['temperature'] = $data[$i]['temperature'];
				$result['aqi_data_tier_tuples'][$k]['humidity'] = $data[$i]['humidity'];
				$result['aqi_data_tier_tuples'][$k]['co_aqi'] = $data[$i]['co_aqi'];
				$result['aqi_data_tier_tuples'][$k]['o3_aqi'] = $data[$i]['o3_aqi'];
				$result['aqi_data_tier_tuples'][$k]['no2_aqi'] = $data[$i]['no2_aqi'];
				$result['aqi_data_tier_tuples'][$k]['so2_aqi'] = $data[$i]['so2_aqi'];
				$result['aqi_data_tier_tuples'][$k]['pm25_aqi'] = $data[$i]['pm25_aqi'];
				$result['aqi_data_tier_tuples'][$k]['pm10_aqi'] = $data[$i]['pm10_aqi'];
				$result['aqi_data_tier_tuples'][$k]['lat'] = $data[$i]['lat'];
				$result['aqi_data_tier_tuples'][$k]['lng'] = $data[$i]['lng'];

				$k += 1;
			}
		}

		$k = 0;

		//print_r($result);

		return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($result, JSON_NUMERIC_CHECK));
	}
	/*
	//2019-10-27
	// 수정	
	//RealData	
	public function Realdata(Request $request, Response $response, $args)
	{
		$senosr = [];

		$sensor['ssn'] = $request->getParsedBody()['ssn'];
		$sensor['sensor_name'] = $request->getParsedBody()['sensor_name'];

		$data = $this->SensorManagementModel->Realdata($sensor);
		
		//print_r($data);

		//결과값
		$result1['aqi_data_tier_tuples'] = [];
		//$result = [];
		$k = 0;

		//갱신 시간과 삽입 시간의 차이가 5시간 이상인 값들은 제외하고 반환
		for($i = 0; $i < count($data); $i++){
			$date1 = $data[$i]['insert_time'];
			$date2 = $data[$i]['timestamp'];

			//시간 정하기
			if(((strtotime($date1) - strtotime($date2)) / 3600) <= 5){
				$result1['aqi_data_tier_tuples'][$k]['ssn'] = $data[$i]['ssn'];
				$result1['aqi_data_tier_tuples'][$k]['wmac'] = $data[$i]['wmac'];
				$result1['aqi_data_tier_tuples'][$k]['timestamp'] = $data[$i]['timestamp'];
				$result1['aqi_data_tier_tuples'][$k]['temperature'] = $data[$i]['temperature'];
				$result1['aqi_data_tier_tuples'][$k]['humidity'] = $data[$i]['humidity'];
				$result1['aqi_data_tier_tuples'][$k]['co_aqi'] = $data[$i]['co_aqi'];
				$result1['aqi_data_tier_tuples'][$k]['o3_aqi'] = $data[$i]['o3_aqi'];
				$result1['aqi_data_tier_tuples'][$k]['no2_aqi'] = $data[$i]['no2_aqi'];
				$result1['aqi_data_tier_tuples'][$k]['so2_aqi'] = $data[$i]['so2_aqi'];
				$result1['aqi_data_tier_tuples'][$k]['pm25_aqi'] = $data[$i]['pm25_aqi'];
				$result1['aqi_data_tier_tuples'][$k]['pm10_aqi'] = $data[$i]['pm10_aqi'];
				$result1['aqi_data_tier_tuples'][$k]['lat'] = $data[$i]['lat'];
				$result1['aqi_data_tier_tuples'][$k]['lng'] = $data[$i]['lng'];
			}

			$k += 1;
		}

		$k = 0;

		//print_r($result1);

		return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($result1, JSON_NUMERIC_CHECK));
	}
*/
	//////////////////////////////////////////////////////////////

	//showHistodata	
	public function showHistodata(Request $request, Response $response, $args)
	{
		$senosr = [];

		$sensor['ssn'] = $request->getParsedBody()['ssn'];
		$sensor['sensor_name'] = $request->getParsedBody()['sensor_name'];
		$sensor['yesterday'] = $request->getParsedBody()['yesterday'];
		$sensor['today'] = $request->getParsedBody()['today'];
		

		$data = $this->SensorManagementModel->showHistodata($sensor);
		$num = count($data);

		if($num > 0){
			$result['header'] = "success";
			$result['message'] = [];
			
			$str = explode('_', $sensor['sensor_name']);

			if($str[0] == "Air"){
				for($i = 0 ; $i<$num; $i++){
					$result['message'][$i]['PM2_5'] = $data[$i]['a_PM2_5'];
					$result['message'][$i]['PM10'] = $data[$i]['a_PM10'];
					$result['message'][$i]['o3'] = $data[$i]['a_O3'];
					$result['message'][$i]['co'] = $data[$i]['a_CO'];
					$result['message'][$i]['no2'] = $data[$i]['a_NO2'];
					$result['message'][$i]['so2'] = $data[$i]['a_SO2'];
					$result['message'][$i]['humidity'] = $data[$i]['a_humidity'];
					$result['message'][$i]['temperture'] = $data[$i]['a_Temperture'];
					$result['message'][$i]['latitude'] = $data[$i]['a_latitude'];
					$result['message'][$i]['longitude'] = $data[$i]['a_longitude'];
					$result['message'][$i]['time'] = $data[$i]['a_time'];
					$result['message'][$i]['aq_pm2_5'] = $data[$i]['AQ_PM2_5'];
					$result['message'][$i]['aq_pm10'] = $data[$i]['AQ_PM10'];
					$result['message'][$i]['aq_o3'] = $data[$i]['AQ_O3'];
					$result['message'][$i]['aq_co'] = $data[$i]['AQ_CO'];
					$result['message'][$i]['aq_no2'] = $data[$i]['AQ_NO2'];
					$result['message'][$i]['aq_so2'] = $data[$i]['AQ_SO2'];
				}
				$result['result'] = "0";
			}else{
				for($i = 0; $i<$num; $i++){
					$result['message'][$i]['heartrate'] = $data[$i]['p_heartrate'];
					$result['message'][$i]['rr_interval'] = $data[$i]['p_RR_interval'];
					$result['message'][$i]['latitude'] = $data[$i]['p_latitude'];
					$result['message'][$i]['longitude'] = $data[$i]['p_longitude'];
					$result['message'][$i]['time'] = $data[$i]['p_time'];
				}
				$result['result'] = "0";
			}	
		}else{
			$result['header'] = "fail";
			$result['message'] = "1";	
		}

		return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($result, JSON_NUMERIC_CHECK));
	}

	//getGPS	
	public function getGPS(Request $request, Response $response, $args)
	{
		$data = $this->SensorManagementModel->getGPS();
		$num = count($data);
		$result = [];	
		
		//센서 이름 : {...}, 센서 위치 : {위도,경도}
		if($num > 0){		
			for ($i=0; $i < $num; $i++) { 
				$name = $data[$i]['p_ssn'];
				$sensor_name = $this->SensorManagementModel->getSensorByssn($name)['s_name'];
				array_push($result, '"name" :"'.$sensor_name.'", "location" :['.$data[$i]["p_latitude"].','.$data[$i]["p_longitude"].']'); 			  
			}
		}else{
			$result['header'] = "fail";
			$result['message'] = "1";	
		}

		return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($result, JSON_NUMERIC_CHECK));
	}

	///////////////시작 /////////////////////
	//getGPS	
	public function location(Request $request, Response $response, $args)
	{
		//usn 을 이용해서 센서의 갯수 와 정보를 가지고 오고 를 가지고 오고
		$usn = $request->getParsedBody()['usn'];		//입력
		$val['date'] =$request->getParsedBody()['date'];	//입력
		$val['tomorrow'] = $request->getParsedBody()['tomorrow'];	//입력	

		//유저에 해당하는 센서 모두 들고 오기
		$result1 = $this->SensorManagementModel->getSensorByusn($usn);
		$sensor_num = count($result1);

		//결과값 찍어낼 index
		$location_index = 0;

		//print_r($sensor_num); 
		//$sensor_loc;

		//각 센서 의 usn을 이용하여 위치값을 가져오고
		for($i = 0; $i< $sensor_num; $i++){
			$sensor_loc = $this->SensorManagementModel->location($result1[$i]['SSN']);

			//값이 비어있는 ssn은 제외 시키고
			if($sensor_loc != null){
				//print_r("갯수");

				$val['lati'] = $sensor_loc['a_latitude'];	//입력
				$val['longi'] = $sensor_loc['a_longitude'];	//입력
				$val['ssn'] = $result1[$i]['SSN'];
				

				//echo("AQI 가져옴");
				//print_r($val);		//입력값 정상
				
				$value = $this->SensorManagementModel->getAQI($val)[0];

				if($value['a_ssn'] != null){
					$result[$location_index]['r_ssn'] = $value['a_ssn'];
					$result[$location_index]['PM2_5'] = $value['a_PM2_5'];
					$result[$location_index]['O3'] = $value['a_O3'];
					$result[$location_index]['CO'] = $value['a_CO'];
					$result[$location_index]['NO2'] = $value['a_NO2'];
					$result[$location_index]['SO2'] = $value['a_SO2'];
					$result[$location_index]['Temperature'] = $value['a_Temperture'];
					$result[$location_index]['humidity'] = $value['a_humidity'];
					$result[$location_index]['latitude'] = $value['a_latitude'];
					$result[$location_index]['longitude'] = $value['a_longitude'];
					$result[$location_index]['AQ_PM2_5'] = $value['AQ_PM2_5'];
					$result[$location_index]['AQ_PM2_5'] = $value['AQ_PM10'];
					$result[$location_index]['AQ_CO'] = $value['AQ_CO'];
					$result[$location_index]['AQ_O3'] = $value['AQ_O3'];
					$result[$location_index]['AQ_NO2'] = $value['AQ_NO2'];
					$result[$location_index]['AQ_SO2'] = $value['AQ_SO2'];
					
					$location_index  += 1;
				}
				
			}				
		}
		
		//location_index 초기화
		$location_index = 0;
		
		return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($result, JSON_NUMERIC_CHECK));
		// return $request->getParsedBody()['usn'];
		
		
	}

	/*
	//getAQI
	public function getAQI(Request $request, Response $response, $args)
	{
		$val = [];

		$want = $request->getParsedBody()['date'];

		$val['date'] = date('yyyy-mm-dd', $want);
		$val['be_date'] = date('yyyy-mm-dd', $want) - 1;
		echo($val['date']);
		echo($val['be_date']);

		$val['lati'] = $request->getParsedBody()['latitude'];
		$val['longi'] = $request->getParsedBody()['longitude'];

		//AQI 최대값
		$data = $this->SensorManagementModel->getAQI($val);
		$result = [];	
		
		//센서 이름 : {...}, 센서 위치 : {위도,경도}
		if($num > 0){		
			for ($i=0; $i < $num; $i++) { 
				$name = $data[$i]['p_ssn'];
				$sensor_name = $this->SensorManagementModel->getSensorByssn($name)['s_name'];
				array_push($result, '"name" :"'.$sensor_name.'", "location" :['.$data[$i]["p_latitude"].','.$data[$i]["p_longitude"].']'); 			  
			}
		}else{
			$result['header'] = "fail";
			$result['message'] = "1";	
		}

		return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($result, JSON_NUMERIC_CHECK));
	}
*/
	//getAQI
	public function getAQI__(Request $request, Response $response, $args)
	{
		//usn 을 이용해서 센서의 갯수 와 정보를 가지고 오고 를 가지고 오고
		$usn = $request->getParsedBody()['usn'];		//입력
		$val['date'] =$request->getParsedBody()['date'];	//입력
		$val['tomorrow'] = $request->getParsedBody()['tomorrow'];	//입력	

		$result1 = $this->SensorManagementModel->getSensorByusn($usn);
		$sensor_num = count($result1);

		//$sensor_loc;

		//각 센서 의 usn을 이용하여 위치값을 가져오고
		for($i = 0; $i< $sensor_num; $i++){
			$sensor_loc = $this->SensorManagementModel->location($result1[$i]['SSN']);

			if($sensor_loc != null){
				$val['lati'] = $sensor_loc['a_latitude'];	//입력
				$val['longi'] = $sensor_loc['a_longitude'];	//입력

				//echo("AQI 가져옴");
				//print_r($val);		//입력값 정상
				$value = $this->SensorManagementModel->getAQI($val)[0];

				
				if($value != null){
					$r_ssn = $value['a_ssn'];
					$a_PM_2_5 = $value['a_PM2_5'];
					$a_O3 = $value['a_O3'];
					$a_CO = $value['a_CO'];
					$a_NO2 = $value['a_NO2'];
					$a_SO2 = $value['a_SO2'];
					$a_Temperature = $value['a_Temperture'];
					
					$AQ_PM2_5 = $value['AQ_PM2_5'];
					$AQ_O3 = $value['AQ_O3'];
					$AQ_CO= $value['AQ_CO'];
					$AQ_NO2= $value['AQ_NO2'];
					$AQ_SO2= $value['AQ_SO2'];

					$result['message'][$i]['r_ssn'] = $r_ssn;
					$result['message'][$i]['PM2_5'] = $a_PM_2_5;
					$result['message'][$i]['O3'] = $a_O3;
					$result['message'][$i]['CO'] = $a_CO;
					$result['message'][$i]['NO2'] = $a_NO2;
					$result['message'][$i]['SO2'] = $a_SO2;
					$result['message'][$i]['Temperature'] = $a_Temperature;
					
					
					
					
					
					$result['message'][$i]['latitude'] = $value['a_latitude'];
					$result['message'][$i]['longitude'] = $value['a_longitude'];
					$result['message'][$i]['AQ_PM2_5'] = $AQ_PM2_5;
					$result['message'][$i]['AQ_CO'] = $AQ_CO;
					$result['message'][$i]['AQ_O3'] = $AQ_O3;
					$result['message'][$i]['AQ_NO2'] = $AQ_NO2;
					$result['message'][$i]['AQ_SO2'] = $AQ_SO2;

					$result['result'][$i] = "0";
					//print_r($result[0]['latitude']);

				}else{
					$result['message'] = "fail";
					$result['result'] = "1";
				}
			}				
			}			

		return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($result, JSON_NUMERIC_CHECK));
		// return $request->getParsedBody()['usn'];
	}


	//getAQI
	public function test(Request $request, Response $response, $args)
	{
		
				$value = $this->SensorManagementModel->test($val)[0];

				
				if($value != null){
					$r_ssn = $value['a_ssn'];
					$a_PM_2_5 = $value['a_PM2_5'];
					$a_O3 = $value['a_O3'];
					$a_CO = $value['a_CO'];
					$a_NO2 = $value['a_NO2'];
					$a_SO2 = $value['a_SO2'];
					$a_Temperature = $value['a_Temperture'];
					
					$AQ_PM2_5 = $value['AQ_PM2_5'];
					$AQ_O3 = $value['AQ_O3'];
					$AQ_CO= $value['AQ_CO'];
					$AQ_NO2= $value['AQ_NO2'];
					$AQ_SO2= $value['AQ_SO2'];

					$result['r_ssn'] = $r_ssn;
					$result['PM2_5'] = $a_PM_2_5;
					$result['O3'] = $a_O3;
					$result['CO'] = $a_CO;
					$result['NO2'] = $a_NO2;
					$result['SO2'] = $a_SO2;
					$result['Temperature'] = $a_Temperature;
					
					
					
					
					
					$result['latitude'] = $value['a_latitude'];
					$result['longitude'] = $value['a_longitude'];
					$result['AQ_PM2_5'] = $AQ_PM2_5;
					$result['AQ_CO'] = $AQ_CO;
					$result['AQ_O3'] = $AQ_O3;
					$result['AQ_NO2'] = $AQ_NO2;
					$result['AQ_SO2'] = $AQ_SO2;

				

				}else{
					$result['message'] = "fail";
					$result['result'] = "1";
				}

		return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($result, JSON_NUMERIC_CHECK));
		// return $request->getParsedBody()['usn'];
	}
}