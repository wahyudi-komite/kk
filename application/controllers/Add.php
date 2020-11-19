<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Wahyudi_Model','',TRUE);
		$this->load->helper('arrform');
		$this->load->library('table');
		$this->load->library('upload');

		if($this->session->userdata('login_kk')!=TRUE)
        {
           	redirect('dashboard','refresh');   
        }
	}

	public function index()
	{
		$data['page'] = 'page/tambah';

		$kota = $this->db->get('m_kota');

		$d_kota[""]="-- pilih --";
		foreach ($kota->result() as $row) {
			
			$d_kota[$row->kota_nama]= $row->kota_nama;
		}

		$d_jk 			= array(''=>'-- pilih --','Laki-Laki'=>'Laki-Laki','Perempuan'=>'Perempuan');
		$d_sektor 		= array(''=>'-- pilih sektor --','01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12',);
		$d_hubungan 	= array(''=>'-- pilih --','Bapak'=>'Bapak','Ibu'=>'Ibu','Anak'=>'Anak');
		$d_pendidikan 	= array(''=>'-- pilih --','TK'=>'TK','SD'=>'SD','SMP'=>'SMP','SLTA'=>'SLTA','DIPLOMA'=>'DIPLOMA','S1'=>'S1','S2'=>'S2','S3'=>'S3');

		$data['kk_no'] 			= form_dropdown('kk_no',$d_pendidikan,'',array('class'=>'select2 form-control custom-select', 'id'=>'kk_no'));
		$data['kk_nama'] 		= af_input('kk_nama','','',array('class'=>'form-control','style'=>'text-transform: uppercase', 'data-msg-required'=>'The TextBox field is required'));
		$data['kk_lahirtmp'] 	= form_dropdown('kk_lahirtmp',$d_kota,'',array('class'=>'select2 form-control custom-select','style'=>'text-transform: capitalize'));
		$data['kk_lahirtgl'] 	= af_input('kk_lahirtgl','','',array('type'=>'date','class'=>'form-control'));
		$data['kk_alamat'] 		= af_input('kk_alamat','','',array('class'=>'form-control'));
		$data['kk_domisili'] 	= af_input('kk_domisili','','Dikosongkan jika sama dengan alamat ktp',array('class'=>'form-control'));
		$data['kk_telpon'] 		= af_input('kk_telpon','','',array('class'=>'form-control'));
		$data['kk_sektor'] 		= form_dropdown('kk_sektor',$d_sektor,'',array('class'=>'form-control', 'id'=>'kk_sektor'));
		$data['kk_email'] 		= af_input('kk_email','','',array('type'=>'email','class'=>'form-control'));
		$data['kk_jk'] 			= form_dropdown('kk_jk',$d_jk,'',array('class'=>'form-control'));
		$data['kk_hubungan'] 	= form_dropdown('kk_hubungan',$d_hubungan,'',array('class'=>'form-control'));
		$data['kk_baptis'] 		= af_input('kk_baptis','','',array('type'=>'date','class'=>'form-control'));
		$data['kk_sidi'] 		= af_input('kk_sidi','','',array('type'=>'date','class'=>'form-control'));
		$data['kk_nikah'] 		= af_input('kk_nikah','','',array('type'=>'date','class'=>'form-control'));
		$data['kk_pendidikan'] 	= form_dropdown('kk_pendidikan',$d_pendidikan,'',array('class'=>'form-control'));
		$data['kk_profesi'] 	= af_input('kk_profesi','','',array('class'=>'form-control'));
		$data['kk_ketrampilan'] = af_input('kk_ketrampilan','','',array('class'=>'form-control'));

		$this->load->view('app/header', $data);
	}

    function get_kk()
    {
    	$a = $this->input->post('id');

        $h = $this->Wahyudi_Model->get_kkno($a);

        echo $h;
    }

    function get_kkdetail()
    {
    	$a = $this->input->post('id');

        $h = $this->Wahyudi_Model->get_order('m_kk', 'kk_asli', $a, 'kk_no','Asc');

        $tmpl = array( 'table_open'  => '<table id="tbl" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">' );
		$this->table->set_template($tmpl);
		$this->table->auto_heading=true;
		$this->table->set_heading(
			array('data'=>'Sektor','width'=>'4%','class'=>'text-center'),  
			array('data'=>'Nomor KK','width'=>'6%','class'=>'text-center'),
			array('data'=>'Nama','width'=>'6%','class'=>'text-center'),
			array('data'=>'Jenis Kelamin','width'=>'15%','class'=>'text-center'),
			array('data'=>'Hub. Keluarga','width'=>'15%','class'=>'text-center'),			
			array('data'=>'Alamat','width'=>'30%','class'=>'text-center')
			);

   		foreach ($h->result() as $list) 
		{
			$this->table->add_row(
				array('data'=>$list->kk_sektor,'class'=>'text-center'),
				array('data'=>$list->kk_no,'class'=>'text-center'),
				array('data'=>$list->kk_nama),
				array('data'=>$list->kk_jk,'class'=>'text-center'),
				array('data'=>$list->kk_hubungan,'class'=>'text-center'),
				array('data'=>$list->kk_alamat)
			);
		}

        echo $this->table->generate();
    }

    function simpan()
    {
    	date_default_timezone_set("Asia/Jakarta");
        $tanggal   	= date('Y-m-d', strtotime("now"));

        $trigger 	= $this->input->post('trigger', TRUE);

        if($trigger == 2){
        	$a	 = $this->input->post('kk_sektor', TRUE);
        	$urutan = $this->Wahyudi_Model->num_where('m_kk','kk_sektor',$a, 'kk_asli');
        	if($urutan == 0){ 
        		$nol = "0000";
        		$kk_asli	 = strval($a).strval($nol).strval($urutan + 1);}
        	else{
        		$kk_max  	= $this->Wahyudi_Model->kk_max('m_kk', 'kk_asli','kk_sektor',$a) + 1;

        		if(strlen($kk_max)== 6){ $kk_asli	= "0".$kk_max;}else { $kk_asli	= $kk_max;}
        	}
        }else{
        	$kk_asli	 = $this->input->post('kk_no', TRUE);
        }
        
        $kk_hubungan =$this->input->post('kk_hubungan', TRUE);

        if( $kk_hubungan=='Bapak'){ $urut = '1';}
        elseif ($kk_hubungan=='Ibu') { $urut = '2'; }
        else{ $urut = $this->Wahyudi_Model->count_anak($kk_asli) + 3;}

               
        $config['upload_path']          = './assets/images/ktp';
        $config['allowed_types']        = 'gif|jpg|png|pdf|jpeg';
        $config['encrypt_name']   		= true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload('kk_ktp'))
        {
                $kk_ktp = "";
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $kk_ktp = $this->upload->data('file_name');;
        }
        if (!$this->upload->do_upload('kk_kk'))
        {
                $kk_kk = "";
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $kk_kk = $this->upload->data('file_name');;
        }
        if (!$this->upload->do_upload('kk_sertifikatsidi'))
        {
                $kk_sertifikatsidi = "";
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $kk_sertifikatsidi = $this->upload->data('file_name');;
        }
        if (!$this->upload->do_upload('kk_suratbaptis'))
        {
                $kk_suratbaptis = "";
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $kk_suratbaptis = $this->upload->data('file_name');;
        }
        if (!$this->upload->do_upload('kk_nikahimg'))
        {
                $kk_nikahimg = "";
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $kk_nikahimg = $this->upload->data('file_name');;
        }

    	$pos = array (
				'kk_id' 		=> '',
				'kk_no'			=> $kk_asli.'0'.$urut,
				'kk_asli' 		=> $kk_asli,
				'kk_daftar' 	=> $tanggal,
				'kk_sektor' 	=> $this->input->post('kk_sektor', TRUE),
				'kk_nama' 		=> strtoupper($this->input->post('kk_nama', TRUE)),
				'kk_alamat' 	=> $this->input->post('kk_alamat', TRUE),
				'kk_domisili' 	=> $this->input->post('kk_domisili', TRUE),
				'kk_telpon' 	=> $this->input->post('kk_telpon', TRUE),
				'kk_email' 		=> $this->input->post('kk_email', TRUE),
				'kk_jk' 		=> $this->input->post('kk_jk', TRUE),
				'kk_hubungan' 	=> $this->input->post('kk_hubungan', TRUE),
				'kk_lahirtmp' 	=> ucwords($this->input->post('kk_lahirtmp', TRUE)),
				'kk_lahirtgl' 	=> $this->input->post('kk_lahirtgl', TRUE),
				'kk_baptis' 	=> $this->input->post('kk_baptis', TRUE),
				'kk_sidi' 		=> $this->input->post('kk_sidi', TRUE),
				'kk_nikah' 		=> $this->input->post('kk_nikah', TRUE),
				'kk_pendidikan' => $this->input->post('kk_pendidikan', TRUE),
				'kk_profesi' 	=> ucwords($this->input->post('kk_profesi', TRUE)),
				'kk_ketrampilan'=> ucwords($this->input->post('kk_ketrampilan', TRUE)),
				'kk_organisasi' => $this->input->post('kk_organisasi', TRUE),
				'kk_ktp' 		=> $kk_ktp,
				'kk_kk' 		=> $kk_kk,
				'kk_sertifikatsidi'=> $kk_sertifikatsidi,
				'kk_suratbaptis'=> $kk_suratbaptis,
				'kk_nikahimg'	=> $kk_nikahimg
        );

        $tbl="m_kk";
		$this->Wahyudi_Model->add($tbl,$pos); 

		// print_r($pos);
    	redirect("dashboard");
    }
}

/* End of file  */
/* Location: ./application/controllers/ */