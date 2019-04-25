<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function about()
	{
		echo('arg1');
	}

	function __construct()
	{
		parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('session');
        if($this->session->userdata('logged_in') === true){
        	return redirect('admin/dashboard');
        }

	}

	public function view($page='home')
	{
        	if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }

                $data['title'] = ucfirst('College ManageMent System'); // Capitalize the first letter

                $this->load->view('templates/header', $data);
                $this->load->view('pages/'.$page, $data);
                $this->load->view('templates/footer', $data);
	}

}

/* End of file Pages.php */
/* Location: ./application/controllers/Pages.php */
