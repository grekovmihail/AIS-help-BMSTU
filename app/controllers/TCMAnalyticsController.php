<?php


use Phalcon\Loader;

// Создание загрузчика
$loader = new Loader();



/**
 * Class and Function List:
 * Function list:
 * - indexAction()
 * Classes list:
 * - IndexController extends ControllerBase
 */

class TCMAnalyticsController extends ControllerBase {

	public function initialize()
	{
		$Session = $this->session->get('Session');
		$this->view->setVar("Session", $Session);
	}

	public function OtchetMoveAction()
	{ 


   $html = "<h2> Отчет по движению </h2><table border=1> <tr>

                            <th>ТС</th>
                            <th>Тип ТС</th>
                            <th>Пробег</th>
                            <th>Время движения</th>
                            <th>Ср. скорость</th>
                            <th>Макс. скорость</th>
                            <th>Время простоя</th>
                            <th>Наличие проблем</th>
                            <th>Водитель</th>
                        </tr><tr><td>ТС</td>
                            <td>Тип ТС</td>
                            <td>Пробег</td>
                            <th>Время движения</td>
                            <td>Ср. скорость</td>
                            <td>Макс. скорость</td>
                            <td>Время простоя</td>
                            <td>Наличие проблем</td>
                            <td>Водитель</td></tr></table>";


include("mpdf/mpdf.php");

$mpdf = new mPDF('utf-8', 'A4', '8', '', 10, 10, 7, 7, 10, 10); /*задаем формат, отступы и.т.д.*/
$mpdf->charset_in = 'cp1251'; /*не забываем про русский*/

 

$mpdf->list_indent_first_level = 0;
$mpdf->WriteHTML($html, 2); /*формируем pdf*/


$mpdf->Output('otchet.pdf', 'I');


	/*
		$json_string_data = '';
		$_TMP = $this->Cacher->getData(array('ObjMonitoring'));
		$json_string_data =$this->helper->jsonEncode($_TMP);
		$this->view->setVar("json_string_data", $json_string_data);

	/*path=report&op=detailmove&BeginTime=1452546000000&EndTime=1452632400000&list=251
	BeginTime - планируемое время начала, FactBeginTime - фактическое время начала.
	*/

	
	}
	public function SaveAction()
	{


   $html = "<h2> Отчет по движению </h2><table border=1> <tr>

                            <th>ТС</th>
                            <th>Тип ТС</th>
                            <th>Пробег</th>
                            <th>Время движения</th>
                            <th>Ср. скорость</th>
                            <th>Макс. скорость</th>
                            <th>Время простоя</th>
                            <th>Наличие проблем</th>
                            <th>Водитель</th>
                        </tr><tr><td>ТС</td>
                            <td>Тип ТС</td>
                            <td>Пробег</td>
                            <th>Время движения</td>
                            <td>Ср. скорость</td>
                            <td>Макс. скорость</td>
                            <td>Время простоя</td>
                            <td>Наличие проблем</td>
                            <td>Водитель</td></tr></table>";


include("mpdf/mpdf.php");

$mpdf = new mPDF('utf-8', 'A4', '8', '', 10, 10, 7, 7, 10, 10); /*задаем формат, отступы и.т.д.*/
$mpdf->charset_in = 'cp1251'; /*не забываем про русский*/

 

$mpdf->list_indent_first_level = 0;
$mpdf->WriteHTML($html, 2); /*формируем pdf*/


$mpdf->Output('otchet.pdf', 'I');



	}





	public function OtchetPolojenieKartadesktopAction()
	{
	}

	public function OtchetListdesktopAction() {

		$json_string_data = '';
		$_TMP = $this->Cacher->getData(array(
			'ObjMonitoring',
			'ObjTypes',
			'Cars',
			'CarType',
			'CarModel',
			'Divisions',
			'division',
			'MoState' ,
			'StatGroup'
		));
		$json_string_data =$this->helper->jsonEncode($_TMP);
		$this->view->setVar("json_string_data", $json_string_data);

		/*path=report&op=detailmove&BeginTime=1452546000000&EndTime=1452632400000&list=251
		BeginTime - планируемое время начала, FactBeginTime - фактическое время начала.
		*/
	}

	public function getAction() {
		$this->logger->info(sprintf("%s: start", __METHOD__));
		$this->view->disable();
		if (!$this->request->isGet()) {
			return;
		}

		$op = $this->request->get("op","string");
		$list_statgroup = $this->request->get("list_statgroup");
		$list_ko = $this->request->get("list_ko");
		$list = $this->request->get("list");
		$list3 = $this->request->get("BeginTime");
		$list4 = $this->request->get("BeginTime");
		$list_cartype = $this->request->get("list_cartype");
		$BeginTime = $this->request->get("BeginTime","int");
		$EndTime = $this->request->get("EndTime","int");

		if ($op&&$list&&$BeginTime&&$EndTime) {
			# code...
			try {

				$JsonString = $this->helper->getNodeJsonResponse( 'report', array(
					'nodecode' => true,
					'op' => $op,
					'list_cartype' => $list_cartype,
					'list_statgroup' => $list_statgroup,
					'list_ko' => $list_ko,
					'list' => $list,
					'list2' => $list2,
					'list3' => $BeginTime,
					'list4' =>$BeginTime,
					'BeginTime' => $BeginTime,
					'EndTime' => $EndTime
				) );

				/*** 2016.04.19, 13:00

					returns =
					{
						"result": true,
						"resp": [{
							"IdMonObject": 251,
							"ListDetailMovePeriod": [{
								"MovePeriodType": 3,
								"BeginTime": 1461056366000,
								"EndTime": 1461059966000,
								"ValidPointCount": null,
								"NotValidPointCount": null,
								"Distance": null,
								"SpeedMax": null,
								"SpeedAvg": null,
								"Address": "",
								"ListSpeedPointGraph": []
							}]
						}]
					}

				***/


				//Create a response instance
				$response = new \Phalcon\Http\Response();
				$response->setContentType('application/json', 'UTF-8');
				//Set the content of the response
				$response->setContent($JsonString);
				//Return the response
				return $response;

			}
			catch(Exception $e) {
				$this->logger->error(sprintf("%s: nodejs GET /report exception", __METHOD__));
				die(sprintf('Class: %s<br>Error: %s<br>Line: %s @ %s', get_class($e) , $e->getMessage() , $e->getLine() , $e->getFile()));
			}
		} else {
			$this->logger->error(sprintf("%s: nodejs GET /report invalid parameters", __METHOD__));
		}

	}

}
