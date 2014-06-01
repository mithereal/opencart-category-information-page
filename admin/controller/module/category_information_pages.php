<?php
class ControllerModulecategoryinformationpages extends Controller {
	private $error = array(); 
	
	public function index() {
$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
	}
	
	public function install() {
		$this->load->model('setting/setting');
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "information_to_category (category_id INT(11) , information_id INT(11))");

	}
	
	public function uninstall() {
		$this->load->model('setting/setting');
		$query = $this->db->query("DROP TABLE IF EXISTS information_to_category;
		");
	 }
	 
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/category_information_pages')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
}
?>
