<?php
	require_once(APPPATH.'controllers/dominio/ObjetoPrueba.php');

	class Home extends CI_Controller{
		public function index(){
			$datos = array ();
			$this->load->model('persistencia/modeloPrueba', 'modelo');

			$datos['consulta'] = $this->modelo->consultaPrueba();

			$objeto = new ObjetoPrueba("Primer Objeto", 2);

			$datos['objeto'] = $objeto;

			$this->load->view('vistasTienda/viewTienda', $datos);
		}

		public function _remap($method, $params = array()){
			if ( function_exists($method)){
				return call_user_func_array(array($this, $method), $params);
			} else {
				$this->index();
			}
		}
	}
?>