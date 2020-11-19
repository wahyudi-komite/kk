<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Wahyudi_Model','',TRUE);
		$this->load->library('encryption');
		$this->load->library('form_validation');
		$this->load->library('session');
        $this->load->helper('url');
	}

	public function index()
	{	

		$data['page'] = 'page/login';

		$this->load->view('app/header', $data);
	}

	function verifi()
	{
        $user   = $this->input->post('username', TRUE);
        $pass   = $this->input->post('password', TRUE);

        $user_pass  =	$this->encryption->encrypt($pass);

        $q      =   $this->Wahyudi_Model->login_check('m_login', 'log_user', $user);

        if($q == 0)
        {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-xs-center" role="alert">Anda belum terdaftar.</div>');

            redirect('login','refresh');  
        }else{
        	$cari      	=   $this->Wahyudi_Model->get_id('m_login', 'log_user', $user)->result();
        	$user_name  = 	$cari[0]->log_user;
			$user_pass  =	$this->encryption->decrypt($cari[0]->log_pass);

			if($user_name == $user AND $user_pass== $pass)
			{
				$this->session->set_userdata(
                array(
                    'login_kk'    	=> TRUE ,
                    'session_user'    => ucwords($user_name)

               ));
                redirect('dashboard','refresh');
			}else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-xs-center" role="alert">Password yang anda masukan salah</div>');
				redirect('login','refresh');
			}
        }
	}

	function logout()
	{
		$this->session->unset_userdata('session_user');
        $this->session->set_userdata(array('login_kk' => FALSE));
        
        redirect('login',"refresh");
	}

	function ganti()
	{
		if($this->session->userdata('login_kk') == FALSE)
		{
			redirect('ultah',"refresh");
		}else{
			$data['page'] = 'page/ganti';

			$this->load->view('app/header', $data);
		}
		
	}

	function verifi_ganti()
	{
		$user   = $this->session->userdata('session_user');
        $pass1   = $this->input->post('password1', TRUE);
        $pass2   = $this->input->post('password2', TRUE);

        if( $pass1 == $pass2 ){

        	$pos = array( 'log_pass'=>$this->encryption->encrypt($pass1));
        	$this->Wahyudi_Model->update('m_login','log_user',$pos,$user);
        	$this->session->set_flashdata('msg', '<div class="alert alert-success text-xs-center" role="alert">Berhasil</div>');
        	redirect('login/ganti','refresh');
        }else{
        	$this->session->set_flashdata('msg', '<div class="alert alert-danger text-xs-center" role="alert">Password konfirmasi tidak sama</div>');
			redirect('login/ganti','refresh');
        }
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */