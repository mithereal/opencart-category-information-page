<?php
class ControllerExtensionModulecategoryinformationpages extends Controller {
	private $error = array(); 
	
	public function index() {
		$this->load->language('module/extension/category_information_pages');

		$this->document->setTitle($this->language->get('heading_title'));
		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/extension/category_information_pages', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
   		$this->data['heading_title'] = $this->language->get('heading_title');
   		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['entry_success'] = $this->language->get('entry_success');
		$this->data['entry_description'] = $this->language->get('entry_description');
		
		$this->template = 'module/extension/category_information_pages.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
		
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
		if (!$this->user->hasPermission('modify', 'module/extension/category_information_pages')) {
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
