<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
	    parent::__construct();
			if($this->session->userdata('logged_in') == true){
				redirect(base_url('/home'));
			}
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$data = array();
		$this->load->model('location_model');
		$title['title'] = "Boekjeplekje";
		if($this->location_model->get_images()){
			$data['image_data'] = $this->location_model->get_images();
			$this->load->view('homepage/includes/header', $title);
			$this->load->view('homepage/homepage', $data);
			$this->load->view('homepage/includes/bodyend');
		}
		else{
			$this->load->view('homepage/includes/header', $title);
			$this->load->view('homepage/homepage');
			$this->load->view('homepage/includes/bodyend');
		}
	}

	public function view_adminLogin(){
		$title['title'] = "Login | Boekjeplekje";
		$this->load->view('admin/includes/header', $title);
		$this->load->view('admin/login');
		$this->load->view('admin/includes/bodyend');
	}

	public function view_packages(){
		$title['title'] = "Package | Boekjeplekje";
		$this->load->view('webpage/includes/header', $title);
		$this->load->view('webpage/packages');
		$this->load->view('webpage/includes/bodyend');
	}

	public function register_user(){
		//load form_validation library
		$this->load->library('form_validation');

		//set validation rules
    $this->form_validation->set_rules("popup_guest_name", "Username", "trim|min_length[2]|max_length[40]");
		$this->form_validation->set_rules("popup_guest_email", "Email", "trim|is_unique[users.email]|valid_email");

		//Error message if user or email already exists
    $errorMsg = $this->form_validation->set_message('is_unique', 'This {field} already registered');

		if($this->form_validation->run() == TRUE){
			$data = array(
				"username" => $_POST['name'],
				"email" 	 => $_POST['email'],
				"type"		 => $_POST['type']
			);
			if($data['type'] == 'host' OR $data['type'] == 'guest'){
				$this->load->model('homepage_model');
				$this->homepage_model->insert_user($data);
				$res = 'ok';
			}else{
				$res = 'err';
			}
		}
		else{
			$res = 'err';
		}
		echo $res; die;
	}

	/*Email Subscribe code with Form Validation
		public function email_subscription(){
			//load form_validation library
			$this->load->library('form_validation');

			//set validation rules
			$this->form_validation->set_rules("footer_email", "Email", "trim|is_unique[subscriptions.email]|valid_email");

			//Error message if user or email already exists
			$errorMsg = $this->form_validation->set_message('is_unique', 'This {field} already registered');

			if($this->form_validation->run() == TRUE){
				$data = array(
					"email" => $this->input->post('footer_email')
				);

				$this->load->model('homepage_model');
				$this->homepage_model->insert_subscription($data);

				$this->load->view('homepage/includes/header');
				$this->load->view('homepage/homepage');
				$this->load->view('homepage/homepage_success');
				$this->load->view('homepage/includes/bodyend');
			}
			else
			{
				$this->load->view('homepage/includes/header');
				$this->load->view('homepage/homepage');
				$this->load->view('homepage/includes/bodyend');
			}
		}
	*/

	public function message(){
		//load form_validation library
		$this->load->library('form_validation');

		//set validation rules
		$this->form_validation->set_rules("msg_username", "Username", "trim|min_length[2]");
		$this->form_validation->set_rules("msg_email", "Email", "trim|valid_email");
		$this->form_validation->set_rules("msg_message", "Message", "trim|min_length[10]|max_length[2000]");

		if($this->form_validation->run() == TRUE){

			$data = array(
				"username" => $_POST['name'],
				"email"    => $_POST['email'],
				"message"  => $_POST['message']
			);

			$this->load->model('homepage_model');
			$this->homepage_model->insert_message($data);

			//SEND EMAIL TO ADMIN CODE START
	    $to     = 'info@boekjeplekje.nl';
	    $subject= 'Contact Request Submitted';

	    $htmlContent = '
	    <h4>Contact request has submitted at boekjeplekje.nl, details are given below.</h4>
	    <table cellspacing="0" style="width: 300px; height: 200px;">
	        <tr>
	            <th>Name:</th><td>'.$data['username'].'</td>
	        </tr>
	        <tr style="background-color: #e0e0e0;">
	            <th>Email:</th><td>'.$data['email'].'</td>
	        </tr>
	        <tr>
	            <th>Message:</th><td>'.$data['message'].'</td>
	        </tr>
	    </table>';

	    // Set content-type header for sending HTML email
	    $headers = "MIME-Version: 1.0" . "\r\n";
	    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	    	// Additional headers
	    	//$headers .= 'From: CodexWorld<sender@example.com>' . "\r\n";

			//SEND EMAIL TO ADMIN CODE END

	    if(mail($to,$subject,$htmlContent,$headers)){
	        $status = 'ok';
	    }else{
	        $status = 'err';
	    }
			echo $status; die;
		}
	}

	public function email_subscription(){
		if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
			echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>Invalid Email</label>';
		}
		else{
			$this->load->model("homepage_model");
			if($this->homepage_model->is_email_available($_POST["email"])){
				$res = 'err';
			}
			else{
				$data = array(
					"email" => $_POST['email']
				);

				$this->load->model('homepage_model');
				$this->homepage_model->insert_subscription($data);
				$res = 'ok';
			}
		}
		echo $res; die;
	}

	public function check_email(){
		if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
			echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>Invalid Email</label>';
		}
		else{
			$this->load->model("homepage_model");
			if($this->homepage_model->is_user_email_available($_POST["email"])){
				$res = 'err';
			}
			else{
				$res = 'ok';
			}
			echo $res; die;
		}
	}

	public function admin_login(){
		$username = $_POST["username"];
		$password = $_POST['password'];
		$this->load->model("homepage_model");
		if($this->homepage_model->admin_validate($username , $password)){
			$res = 'ok';
			$sessionData = array(
				'username'  => $username,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sessionData);
		}
		else{
			$res = 'err';
		}
		echo $res;
		die;
	}

}
