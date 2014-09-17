<?php
class ControllerModulecategory_information_pages extends Controller {
	private $error = array(); 
	
	public function index() {
		$this->language->load('module/category_information_pages');

		$this->document->setTitle($this->language->get('heading_title'));
		
	}
	
	public function install() {
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "information_to_category (category_id INT(11) , information_id INT(11), PRIMARY KEY (category_id))");

	}
	
	public function uninstall() {
		$query = $this->db->query("
		DROP TABLE IF EXISTS information_to_category;
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
