<?php


//session_start(); //we need to start session in order to access it through CI

Class User_Authentication extends CI_Controller {

public function __construct() {
parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load database
$this->load->model('login_database');
$this->load->model('appointment');
}

// Show login page
public function index() {
$this->load->view('login_form');
}

// Show registration page
public function user_registration_show() {
$this->load->view('header');
$this->load->view('patientregistration');
$this->load->view('footer');
}
public function forget_password_show() {
$this->load->view('header');
$this->load->view('forgetpassword');
$this->load->view('footer');
}
public function reset_password_show() {
$this->load->view('header');
$this->load->view('resetpassword');
$this->load->view('footer');
}


// Validate and store registration data in database
public function new_user_registration() {

// Check validation for user input in SignUp form
$this->form_validation->set_rules('username', 'Username', 'trim|required');
$this->form_validation->set_rules('email_value', 'Email', 'trim|required');
$this->form_validation->set_rules('password', 'Password', 'trim|required');
if ($this->form_validation->run() == FALSE) {
$this->load->view('registration_form');
} else {

//image upload
if(!empty($_FILES['picture']['name'])){
	$config = array(
	'upload_path' => "./uploads/",
	'allowed_types' => "gif|jpg|png|jpeg|pdf",
	'file_name' => $_FILES['picture']['name'],
	'overwrite' => TRUE,
	'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
	'max_height' => "768",
	'max_width' => "1024"
	);
	$this->load->library('upload', $config);
	$this->upload->initialize($config);

	if ($this->upload->do_upload('picture')) {
		$uploadData = $this->upload->data();
		$picture = $uploadData['file_name'];
	}else{
		$picture = '';
	}
}else{
	$picture = '';
}

$data = array(
'doctor_id' => $this->input->post('userid'),
'doc_name' => $this->input->post('myname'),
'user_name' => $this->input->post('username'),
'password' => $this->input->post('password'),
'speciality' => $this->input->post('spec'),
'email' => $this->input->post('email_value'),
'telephone' => $this->input->post('contact'),
'doc_img' => 'uploads/'.$picture

);

$result = $this->login_database->registration_insert($data);
if ($result == TRUE) {
$data['message_display'] = 'Registration Successfully !';
$this->load->view('login_form', $data);
} else {
$data['message_display'] = 'Username already exist!';
$this->load->view('registration_form', $data);
}

}
}

// Check for user login process
public function user_login_process() {

$this->form_validation->set_rules('username', 'Username', 'trim|required');
$this->form_validation->set_rules('password', 'Password', 'trim|required');

if ($this->form_validation->run() == FALSE) {
if(isset($this->session->userdata['logged_in'])){
//$this->load->view('header');
$this->load->view('index1');
}else{
$this->load->view('index1');
}
} else {
$data = array(
'username' => $this->input->post('username'),
'password' => $this->input->post('password')
);
$result = $this->login_database->login($data);
if ($result == TRUE) {

$username = $this->input->post('username');
$result = $this->login_database->read_user_information($username);


if ($result != false) {
$session_data = array(
<<<<<<< HEAD
'username' => $result[0]->patient_name,
=======
<<<<<<< HEAD
'username' => $result[0]->patient_name,
=======
'username' => $result[0]->user_name,
>>>>>>> 9cfd15dd57bf5b772d31f405ec96ee960ed1dd60
>>>>>>> ed316ac20ffec01f5e72e08ab142d0ffbfb2f6ef
//'email' => $result[0]->email,

);

//$pic = array('picture' => $result[0]->doc_img );
// Add user data in session
$this->session->set_userdata('logged_in', $session_data);
//$this->load->view('header', $pic);
$uname = $this->session->userdata['logged_in']['username'];
$details = $this->appointment->get_by_name($uname);
$data['appo'] = $details;
<<<<<<< HEAD
$data['sess'] = $uname ;
=======
>>>>>>> 9cfd15dd57bf5b772d31f405ec96ee960ed1dd60

$this->load->view('header');
$this->load->view('patient', $data);
$this->load->view('footer');
}
} else {
$data = array(
'error_message' => 'Invalid Username or Password'
);
$this->load->view('index1', $data);
}
}
}

// Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'username' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
//$data['message_display'] = 'Successfully Logout';
$this->load->view('header');
$this->load->view('index1');
$this->load->view('footer');

}

}

?>