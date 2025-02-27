<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');
  }

  public function index(){
    $this->load->view('login_view');
  }

  public function auth(){
    $email    = $this->input->post('email',TRUE);
    $password = md5($this->input->post('password',TRUE));
    $validate = $this->login_model->validate($email,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $name  = $data['user_name'];
        $email = $data['user_email'];
        $level = $data['user_level'];
        $sesdata = array(
            'username'  => $name,
            'email'     => $email,
            'level'     => $level,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        if($level === '1'){
            redirect('page');
        }elseif($level === '2'){
            redirect('page/lb1');
        }elseif ($level === '3') {
            redirect('page/kepala');
        }
        else{
            redirect('page/dinkes');
        }
    }else{
        echo "<script>
              alert('Username or Password is Wrong');
              window.location='".site_url('login')."';
              </script>";
    }
  }

  public function logout(){
      $this->session->sess_destroy();
      redirect('login');
  }

}
