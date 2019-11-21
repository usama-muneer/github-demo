<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
	    parent::__construct();
			$this->load->helper(array('form','url'));
			$this->load->library('upload');
			$this->load->model('location_model');
			if($this->session->userdata('logged_in') != true){
				redirect(base_url(''));
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


	public function view_locations(){
		$data = array();
		if($this->location_model->get_allLocation()){
			$data['location_data'] = $this->location_model->get_allLocation();
		}
		if($this->location_model->get_allLocAddress()){
			$data['address_data'] = $this->location_model->get_allLocAddress();
		}
		if($data){
			$row['title'] = "Locations | Boekjeplekje";
			$this->load->view('admin/includes/header', $row);
			$this->load->view('admin/location', $data);
			$this->load->view('admin/includes/bodyend');
		}else{
			$row['title'] = "Locations | Boekjeplekje";
			$this->load->view('admin/includes/header', $row);
			$this->load->view('admin/location');
			$this->load->view('admin/includes/bodyend');
		}
	}

	public function view_addLocation(){
		$this->load->view('admin/includes/header');
		$this->load->view('admin/addLocation');
		$this->load->view('admin/includes/bodyend');
	}

	public function view_messages(){
		$data['message_data'] = $this->location_model->get_allMessages();
		$row['title'] = "Messages | Boekjeplekje";
		$this->load->view('admin/includes/header', $row);
		$this->load->view('admin/messages', $data);
		$this->load->view('admin/includes/bodyend');
	}

	public function view_admin_home(){
		$this->load->view('admin/includes/header');
		$this->load->view('admin/home');
		$this->load->view('admin/includes/bodyend');
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		redirect(base_url('/adminlogin'));
	}

	public function addLocation(){
		//load form_validation library
		$this->load->library('form_validation');

		//set validation rules
    $this->form_validation->set_rules("loc_name", "LocationName", "trim|required|min_length[2]|max_length[100]");
		$this->form_validation->set_rules("loc_category1", "Category1", "trim|required|in_list[Vergaderen,Feestlocatie,Flexwerken,Werkruimte,Opslag,Catering]");
		$this->form_validation->set_rules("loc_category2", "Category2", "trim");
		$this->form_validation->set_rules("loc_package", "Package", "required|in_list[Light,Premium,Unlimited,Catering]");
		$this->form_validation->set_rules("loc_streetname", "Streetname", "trim");
		$this->form_validation->set_rules('loc_housenumber', 'Housenumber', 'trim|required|is_unique[locationaddress.housenumber]');
		$this->form_validation->set_rules("loc_zipcode", "Zipcode", "trim|required");
		$this->form_validation->set_rules("loc_city", "City", "trim|required");
		$this->form_validation->set_rules("loc_province", "Province", "trim|required");
		$this->form_validation->set_rules("loc_country", "Country", "trim|required");
		$this->form_validation->set_rules("loc_phonenumber", "Phonenumber", "trim|required");
		$this->form_validation->set_rules("loc_emailaddress", "Emailaddress", "trim|valid_email|required");
		$this->form_validation->set_rules("loc_websiteurl", "Website", "trim|valid_url");
		$this->form_validation->set_rules("loc_facebookurl", "Facebook", "trim|valid_url");
		$this->form_validation->set_rules("loc_instagramurl", "Instagram", "trim|valid_url");
		$this->form_validation->set_rules("loc_linkedinurl", "LinkedIn", "trim|valid_url");
		$this->form_validation->set_rules("loc_information", "Information", "trim|min_length[10]|max_length[1000]|required");
		$this->form_validation->set_rules("loc_price", "Price", "required|greater_than_equal_to[5]|less_than_equal_to[25.25]");
		$this->form_validation->set_rules("loc_persons", "Persons", "required");
		$this->form_validation->set_rules("loc_spacem2", "Spacem2", "trim");
		$this->form_validation->set_rules("loc_logo", "Logo", "");
		$this->form_validation->set_rules("loc_img1", "Image1", "");
		//Error message if user or email already exists
    $errorMsg = $this->form_validation->set_message('is_unique', '<strong class="text-danger"> <b>Error: </b> This Location already registered</strong>');


		if($this->form_validation->run() == TRUE){
			$locationData = array(
				'name' 				 => $_POST['loc_name'],
				'category1'    => $_POST['loc_category1'],
				'category2' 	 => $_POST['loc_category2'],
				'package' 		 => $_POST['loc_package'],
				'phonenumber'  => $_POST['loc_phonenumber'],
				'emailaddress' => $_POST['loc_emailaddress'],
				'information'  => $_POST['loc_information'],
				'price' 			 => $_POST['loc_price'],
				'persons' 		 => $_POST['loc_persons'],
				'spacem2' 		 => $_POST['loc_spacem2'],
				'logo' 				 => $this->do_upload(),
				'time'				 => date('Y-m-d h:m:s')
			);

			$this->load->model('location_model');
			$loc_id = $this->location_model->insert_location($locationData);

			if($loc_id){

				$success['location'] = 'Location data successfully inserted<br>';

				$addressData = array(
					'loc_id' 			=> $loc_id,
					'housenumber' => $_POST['loc_housenumber'],
					'streetname'  => $_POST['loc_streetname'],
					'zipcode' 		=> $_POST['loc_zipcode'],
					'city' 				=> $_POST['loc_city'],
					'province' 		=> $_POST['loc_province'],
					'country' 		=> $_POST['loc_country']
				);

				$this->load->model('location_model');
				if($this->location_model->insert_locAddress($addressData)){
					$success['address'] = 'Location address data successfully inserted<br>';
				}

				$linkData = array(
					'loc_id' 				=> $loc_id,
					'website_url' 	=> $_POST['loc_websiteurl'],
					'facebook_url' 	=> $_POST['loc_facebookurl'],
					'instagram_url' => $_POST['loc_instagramurl'],
					'linkedin_url'  => $_POST['loc_linkedinurl']
				);

				$this->load->model('location_model');
				if($this->location_model->insert_locLinks($linkData)){
					$success['links'] = 'Location links data successfully inserted<br>';
				}

				$imageData['loc_id'] = $loc_id;
				$imageData['image1'] = $this->do_upload1();
				if (!empty($_FILES['loc_img2']['name'])){
					$imageData['image2'] = $this->upload_img2();
				}
				if (!empty($_FILES['loc_img3']['name'])){
					$imageData['image3'] = $this->upload_img3();
				}
				if (!empty($_FILES['loc_img4']['name'])){
					$imageData['image4'] = $this->upload_img4();
				}
				if (!empty($_FILES['loc_img5']['name'])){
					$imageData['image5'] = $this->upload_img5();
				}

				$this->load->model('location_model');
				if(isset($imageData) && $this->location_model->insert_locImages($imageData)){
					$success['images'] = 'Location images data successfully inserted<br>';
				}

				$availableData = array(
					'loc_id' 			 => $loc_id,
					'ava_mon_from' => $_POST['loc_mon_from'],
					'ava_mon_till' => $_POST['loc_mon_till'],
					'ava_tue_from' => $_POST['loc_tue_from'],
					'ava_tue_till' => $_POST['loc_tue_till'],
					'ava_wed_from' => $_POST['loc_wed_from'],
					'ava_wed_till' => $_POST['loc_wed_till'],
					'ava_thu_from' => $_POST['loc_thu_from'],
					'ava_thu_till' => $_POST['loc_thu_till'],
					'ava_fri_from' => $_POST['loc_fri_from'],
					'ava_fri_till' => $_POST['loc_fri_till'],
					'ava_sat_from' => $_POST['loc_sat_from'],
					'ava_sat_till' => $_POST['loc_sat_till'],
					'ava_sun_from' => $_POST['loc_sun_from'],
					'ava_sun_till' => $_POST['loc_sun_till']
				);

				$this->load->model('location_model');
				if($this->location_model->insert_locAvailability($availableData)){
					$success['availability'] = 'Location Availability data successfully inserted<br>';
				}
				$this->load->view('admin/result', $success);
			}
			else{
				$err['error'] = 'Something wrong! Location not inserted. Please try again.';
				$this->load->view('admin/result', $err);
			}
		}
		else{
			$this->load->view('admin/result');
		}
	}

	public function updateLocation(){
		//load form_validation library
		$this->load->library('form_validation');

		//set validation rules
    $this->form_validation->set_rules("loc_name", "LocationName", "trim|required|min_length[2]|max_length[100]");
		$this->form_validation->set_rules("loc_category1", "Category1", "trim|required|in_list[Vergaderen,Feestlocatie,Flexwerken,Werkruimte,Opslag,Catering]");
		$this->form_validation->set_rules("loc_category2", "Category2", "trim");
		$this->form_validation->set_rules("loc_package", "Package", "required|in_list[Light,Premium,Unlimited,Catering]");
		$this->form_validation->set_rules("loc_streetname", "Streetname", "trim");
		$this->form_validation->set_rules('loc_housenumber', 'Housenumber', 'trim|required');
		$this->form_validation->set_rules("loc_zipcode", "Zipcode", "trim|required");
		$this->form_validation->set_rules("loc_city", "City", "trim|required");
		$this->form_validation->set_rules("loc_province", "Province", "trim|required");
		$this->form_validation->set_rules("loc_country", "Country", "trim|required");
		$this->form_validation->set_rules("loc_phonenumber", "Phonenumber", "trim|required");
		$this->form_validation->set_rules("loc_emailaddress", "Emailaddress", "trim|valid_email|required");
		$this->form_validation->set_rules("loc_information", "Information", "trim|min_length[10]|max_length[1000]|required");
		$this->form_validation->set_rules("loc_price", "Price", "required|greater_than_equal_to[5]|less_than_equal_to[25.25]");
		$this->form_validation->set_rules("loc_persons", "Persons", "required");
		$this->form_validation->set_rules("loc_spacem2", "Spacem2", "trim");
		//Error message if user or email already exists

		if($this->form_validation->run() == TRUE){
			$locationData = array(
				'loc_id' 			 => $_POST['loc_id'],
				'name' 				 => $_POST['loc_name'],
				'category1'    => $_POST['loc_category1'],
				'category2' 	 => $_POST['loc_category2'],
				'package' 		 => $_POST['loc_package'],
				'phonenumber'  => $_POST['loc_phonenumber'],
				'emailaddress' => $_POST['loc_emailaddress'],
				'information'  => $_POST['loc_information'],
				'price' 			 => $_POST['loc_price'],
				'persons' 		 => $_POST['loc_persons'],
				'spacem2' 		 => $_POST['loc_spacem2'],
				'updatetime'	 => date('Y-m-d h:m:s')
			);

			$this->load->model('location_model');
			$this->location_model->update_location($locationData);
			$success['updatelocation'] = 'Location data successfully updated<br>';

			$addressData = array(
				'loc_id' 			=> $_POST['loc_id'],
				'housenumber' => $_POST['loc_housenumber'],
				'streetname'  => $_POST['loc_streetname'],
				'zipcode' 		=> $_POST['loc_zipcode'],
				'city' 				=> $_POST['loc_city'],
				'province' 		=> $_POST['loc_province'],
				'country' 		=> $_POST['loc_country']
			);

			$this->load->model('location_model');
			$this->location_model->update_locAddress($addressData);
			$success['updateaddress'] = 'Location address data successfully Updated<br>';

			$this->load->view('admin/result', $success);
		}
		else{
			$this->load->view('admin/result');
		}
	}

	public function deleteLocation(){
		$loc_id = $this->input->post('loc_id');
		$this->location_model->delete_locAddress($loc_id);
		$this->location_model->delete_locLinks($loc_id);
		$this->location_model->delete_locAvailability($loc_id);
		$this->location_model->delete_locImages($loc_id);
		$this->location_model->delete_location($loc_id);
		redirect(base_url('/locations'));
	}

	//DO UPLOAD FUNCTION CODE START
  function do_upload(){
		$config['upload_path']   = './LocationImages/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '2607200';
		$config['max_height'] 	 = '3024';
		$config['max_height']    = '3024';
		$config['encrypt_name']  = true;

		$this->load->library('upload', $config);

		// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('loc_logo')){
			$error = array('error' => $this->upload->display_errors());
      $this->load->view('result', $error);
		}else{
		 $data = $this->upload->data()	;
		 return $data['file_name'];
    }
	}
  //DO UPLOAD FUNCTION CODE END

	//DO UPLOAD FUNCTION CODE START
  function do_upload1(){
		$config['upload_path']   = './LocationImages/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '2607200';
		$config['max_height'] 	 = '3024';
		$config['max_height']    = '3024';
		$config['encrypt_name']  = true;

		$this->load->library('upload', $config);

		// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('loc_img1')){
			$error = array('error' => $this->upload->display_errors());
      $this->load->view('result', $error);
		}else{
		 $data = $this->upload->data();
		 return $data['file_name'];
    }
	}
  //DO UPLOAD FUNCTION CODE END

	//DO UPLOAD FUNCTION CODE START
  function upload_img2(){
		$config['upload_path']   = './LocationImages/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '2607200';
		$config['max_height'] 	 = '3024';
		$config['max_height']    = '3024';
		$config['encrypt_name']  = true;

		$this->load->library('upload', $config);

		// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('loc_img2')){
			$error = array('error' => $this->upload->display_errors());
      $this->load->view('result', $error);
		}else{
		 $data = $this->upload->data();
		 return $data['file_name'];
    }
	}
  //DO UPLOAD FUNCTION CODE END

	//DO UPLOAD FUNCTION CODE START
  function upload_img3(){
		$config['upload_path']   = './LocationImages/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '2607200';
		$config['max_height'] 	 = '3024';
		$config['max_height']    = '3024';
		$config['encrypt_name']  = true;

		$this->load->library('upload', $config);

		// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('loc_img3')){
			$error = array('error' => $this->upload->display_errors());
      $this->load->view('result', $error);
		}else{
		 $data = $this->upload->data();
		 return $data['file_name'];
    }
	}
  //DO UPLOAD FUNCTION CODE END

	//DO UPLOAD FUNCTION CODE START
  function upload_img4(){
		$config['upload_path']   = './LocationImages/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '2607200';
		$config['max_height'] 	 = '3024';
		$config['max_height']    = '3024';
		$config['encrypt_name']  = true;

		$this->load->library('upload', $config);

		// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('loc_img4')){
			$error = array('error' => $this->upload->display_errors());
      $this->load->view('result', $error);
		}else{
		 $data = $this->upload->data();
		 return $data['file_name'];
    }
	}
  //DO UPLOAD FUNCTION CODE END

	//DO UPLOAD FUNCTION CODE START
  function upload_img5(){
		$config['upload_path']   = './LocationImages/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '2607200';
		$config['max_height'] 	 = '3024';
		$config['max_height']    = '3024';
		$config['encrypt_name']  = true;

		$this->load->library('upload', $config);

		// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('loc_img5')){
			$error = array('error' => $this->upload->display_errors());
      $this->load->view('result', $error);
		}else{
		 $data = $this->upload->data();
		 return $data['file_name'];
    }
	}
  //DO UPLOAD FUNCTION CODE END



	public function view_result(){
		$this->load->view('admin/includes/header');
		$this->load->view('admin/result');
	}

}