<?php
class ControllerModulecategoryinformationpages extends Controller {
	private $error = array(); 
	
	public function index() {
		$this->load->language('extension/module/category_information_pages');

		$this->document->setTitle($this->language->get('heading_title'));
		$data['breadcrumbs'] = array();

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/category_information_pages', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
   		$data['heading_title'] = $this->language->get('heading_title');
   		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['entry_success'] = $this->language->get('entry_success');
		$data['entry_description'] = $this->language->get('entry_description');


		$this->response->setOutput($this->load->view('extension/module/category_information_pages.tpl', $data));
		
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
