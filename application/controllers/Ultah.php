<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ultah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Wahyudi_Model','',TRUE);
		$this->load->library('Datatables');
	}

	public function index()
	{
		$data['page'] = 'page/ultah';

		$this->load->view('app/header', $data);
	}

	function json()
	{
		date_default_timezone_set("Asia/Jakarta");

		$number = date('N', strtotime("now"));

		if($number=='7')
		{
	        $tanggal   	= date('m-d', strtotime("7 days"));
	        $tanggal7  	= date('m-d', strtotime("14 days"));
	    }elseif($number=='1'){
	    	$tanggal   	= date('m-d', strtotime("6 days"));
	        $tanggal7  	= date('m-d', strtotime("13 days"));
	    }elseif($number=='2'){
	    	$tanggal   	= date('m-d', strtotime("5 days"));
	        $tanggal7  	= date('m-d', strtotime("12 days"));
	    }
	    elseif($number=='3'){
	    	$tanggal   	= date('m-d', strtotime("4 days"));
	        $tanggal7  	= date('m-d', strtotime("11 days"));
	    }elseif($number=='4'){
	    	$tanggal   	= date('m-d', strtotime("3 days"));
	        $tanggal7  	= date('m-d', strtotime("10 days"));
	    }elseif($number=='5'){
	    	$tanggal   	= date('m-d', strtotime("2 days"));
	        $tanggal7  	= date('m-d', strtotime("9 days"));
	    }elseif($number=='6'){
	    	$tanggal   	= date('m-d', strtotime("1 days"));
	        $tanggal7  	= date('m-d', strtotime("8 days"));
	    }

		$this->datatables->select('kk_id,kk_nama,kk_lahirtgl, ( DATE_FORMAT(CURDATE(),"%Y") - date_format(kk_lahirtgl,"%Y")) AS usia, TIMESTAMPDIFF(DAY,DATE_FORMAT(CURDATE(), "%Y-%m-%d"),DATE_FORMAT(kk_lahirtgl, "2018-%m-%d")) AS tang')
			->where('date_format(kk_lahirtgl,"%m-%d") >=' , $tanggal)
			->where('date_format(kk_lahirtgl,"%m-%d") <=' , $tanggal7)
			->where('kk_status' , '0')
			->add_column('ac', 
                anchor('Ultah/v_o/$1','<span class="fa fa-eye"></span>',array('id'=>'$1','class' => 'btn btn-info btn-xs aneh','data-toggle'=>"modal",'data-backdrop'=>"static",'data-target'=>"#myModal", "data-href"=>"Ultah/v_o/$1", "onClick"=>"rincian($1);"))
                , 'kk_id')
            ->from('m_kk');
            
         echo $this->datatables->generate();
	}

	function json_nikah()
	{
		date_default_timezone_set("Asia/Jakarta");
        $number = date('N', strtotime("now"));

		if($number=='7')
		{
	        $tanggal   	= date('m-d', strtotime("7 days"));
	        $tanggal7  	= date('m-d', strtotime("14 days"));
	    }elseif($number=='1'){
	    	$tanggal   	= date('m-d', strtotime("6 days"));
	        $tanggal7  	= date('m-d', strtotime("13 days"));
	    }elseif($number=='2'){
	    	$tanggal   	= date('m-d', strtotime("5 days"));
	        $tanggal7  	= date('m-d', strtotime("12 days"));
	    }
	    elseif($number=='3'){
	    	$tanggal   	= date('m-d', strtotime("4 days"));
	        $tanggal7  	= date('m-d', strtotime("11 days"));
	    }elseif($number=='4'){
	    	$tanggal   	= date('m-d', strtotime("3 days"));
	        $tanggal7  	= date('m-d', strtotime("10 days"));
	    }elseif($number=='5'){
	    	$tanggal   	= date('m-d', strtotime("2 days"));
	        $tanggal7  	= date('m-d', strtotime("9 days"));
	    }elseif($number=='6'){
	    	$tanggal   	= date('m-d', strtotime("1 days"));
	        $tanggal7  	= date('m-d', strtotime("8 days"));
	    }

		$this->datatables->select('kk_id,kk_nama,kk_nikah, ( DATE_FORMAT(CURDATE(),"%Y") - date_format(kk_nikah,"%Y")) AS nikah, TIMESTAMPDIFF(DAY,DATE_FORMAT(CURDATE(), "%Y-%m-%d"),DATE_FORMAT(kk_nikah, "2018-%m-%d"))AS tang')
			->where('date_format(kk_nikah,"%m-%d") >=' , $tanggal)
			->where('date_format(kk_nikah,"%m-%d") <=' , $tanggal7)
			->where('kk_status' , '0')
			->add_column('ac', 
                anchor('Ultah/v_o/$1','<span class="fa fa-eye"></span>',array('id'=>'$1','class' => 'btn btn-info btn-xs aneh','data-toggle'=>"modal",'data-backdrop'=>"static",'data-target'=>"#myModal", "data-href"=>"Ultah/v_o/$1", "onClick"=>"rincian($1);"))
                , 'kk_id')
            ->from('m_kk');
            
         echo $this->datatables->generate();
	}

	function v_o($id="1")
	{
		$a = $this->Wahyudi_Model->get_id('m_kk','kk_id', $id)->result();

		$data['kk_no'] 		= $a[0]->kk_no;
		$data['kk_nama'] 	= $a[0]->kk_nama;
		$data['kk_alamat'] 	= $a[0]->kk_alamat;
		$data['kk_telpon'] 	= $a[0]->kk_telpon;
		$data['kk_email'] 	= $a[0]->kk_email;
		$data['kk_lahirtgl'] = $a[0]->kk_lahirtgl;
		$data['kk_nikah'] 	= $a[0]->kk_nikah;

		$this->load->view('page/view_data', $data);
	}
}

/* End of file Ultah.php */
/* Location: ./application/controllers/Ultah.php */