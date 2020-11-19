<?php if(!defined('BASEPATH')) exit('No direct access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{ 
		parent::__construct();
		$this->load->model('Wahyudi_Model','',TRUE);
		$this->load->helper('arrform');
        $this->load->helper('download');
		$this->load->library('Datatables');
		$this->load->library('upload');

        if($this->session->userdata('login_kk')!=TRUE)
        {
            redirect('ultah','refresh');   
        }
	}

	public function index()
	{ 
		$data['page'] = 'app/content';

		//SELECT kk_id,kk_nama,kk_lahirtgl, TIMESTAMPDIFF(YEAR, kk_lahirtgl, NOW()) AS tahun FROM m_kk
		$data['jml_jamaah'] = $this->Wahyudi_Model->num_rows('m_kk');
		$data['jml_kk'] 	= $this->Wahyudi_Model->num_group('m_kk','kk_asli');
		$data['jml_pa'] 	= $this->Wahyudi_Model->count_pa('0','13');
		$data['jml_pt'] 	= $this->Wahyudi_Model->count_pa('13','17');
		$data['jml_gp'] 	= $this->Wahyudi_Model->count_single('17','35');
		$data['jml_pkp'] 	= $this->Wahyudi_Model->count_gp('17','60','Perempuan') + $this->Wahyudi_Model->count_belumnikah('35','60','Perempuan');
		$data['jml_pkb'] 	= $this->Wahyudi_Model->count_gp('17','60','Laki-Laki') + $this->Wahyudi_Model->count_belumnikah('35','60','Laki-Laki');
		$data['jml_pklu'] 	= $this->Wahyudi_Model->count_pa('60','1135');
		$this->load->view('app/header', $data);
    }

    function json()
    {
    	if($this->session->userdata('login_kk')!=TRUE)
        {
           	$this->datatables->select('kk_id, kk_no,kk_daftar,kk_sektor,kk_nama,kk_alamat,kk_telpon,kk_email,kk_jk,kk_hubungan,kk_lahirtmp,kk_lahirtgl,kk_baptis,kk_sidi,kk_nikah,kk_pendidikan,kk_profesi,kk_ketrampilan,kk_organisasi, kk_ktp, kk_sertifikatsidi, kk_kk,kk_suratbaptis, kk_nikahimg, kk_status')
	    		->add_column('ac', 
	                anchor('','-',array('class' => ''))
	                , 'kk_id')
	            ->from('m_kk');
	            
	         echo $this->datatables->generate();   
        }else{
	    	$this->datatables->select('kk_id, kk_no,kk_daftar,kk_sektor,kk_nama,kk_alamat,kk_telpon,kk_email,kk_jk,kk_hubungan,kk_lahirtmp,kk_lahirtgl,kk_baptis,kk_sidi,kk_nikah,kk_pendidikan,kk_profesi,kk_ketrampilan,kk_organisasi, kk_ktp, kk_sertifikatsidi, kk_kk,kk_suratbaptis, kk_nikahimg, kk_status')
	    		->add_column('ac', 
	                anchor('','<span class="fa fa-pencil"></span>',array('class' => 'btn btn-info btn-xs aneh','data-toggle'=>"modal",'data-backdrop'=>"static",'data-target'=>"#myModal", "data-href"=>"Dashboard/v_e/$1", "onClick"=>"rincian($1);","title"=>"edit")).' '.anchor('','<span class="fa fa-remove"></span>',array('class' => 'btn btn-danger btn-xs aneh',"onClick"=>"hapus($1);","title"=>"hapus"))
	                , 'kk_id')
	            ->from('m_kk');
	            
	         echo $this->datatables->generate();
	     }
    }

    function v_e($id)
    {
    	$a = $this->Wahyudi_Model->get_id('m_kk','kk_id', $id)->result();

    	$kota = $this->db->get('m_kota');

		$d_kota[""]="-- pilih --";
		foreach ($kota->result() as $row) {
			
			$d_kota[$row->kota_nama]= $row->kota_nama;
		}

    	$d_jk 			= array(''=>'-- pilih --','Laki-Laki'=>'Laki-Laki','Perempuan'=>'Perempuan');
		$d_sektor 		= array(''=>'-- pilih sektor --','01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12',);
		$d_hubungan 	= array(''=>'-- pilih --','Bapak'=>'Bapak','Ibu'=>'Ibu','Anak'=>'Anak');
		$d_pendidikan 	= array(''=>'-- pilih --','TK'=>'TK','SD'=>'SD','SMP'=>'SMP','SLTA'=>'SLTA','DIPLOMA'=>'DIPLOMA','S1'=>'S1','S2'=>'S2','S3'=>'S3');

    	$data['kk_no'] 			= form_dropdown('kk_no',$a[0]->kk_no ,$a[0]->kk_no,array('class'=>'form-control', 'id'=>'kk_no','disabled'=>'TRUE'));
		$data['kk_nama'] 		= af_input('kk_nama',$a[0]->kk_nama,'',array('class'=>'form-control','style'=>'text-transform: uppercase', 'data-msg-required'=>'The TextBox field is required'));
		$data['kk_lahirtmp'] 	= form_dropdown('kk_lahirtmp',$d_kota,$a[0]->kk_lahirtmp,array('class'=>'select2 form-control custom-select','style'=>'text-transform: capitalize'));
		$data['kk_lahirtgl'] 	= af_input('kk_lahirtgl',$a[0]->kk_lahirtgl,'',array('type'=>'date','class'=>'form-control'));
		$data['kk_alamat'] 		= af_input('kk_alamat',$a[0]->kk_alamat,'',array('class'=>'form-control'));
		$data['kk_domisili'] 	= af_input('kk_domisili',$a[0]->kk_domisili,'Dikosongkan jika sesuai alamat ktp',array('class'=>'form-control'));
		$data['kk_telpon'] 		= af_input('kk_telpon',$a[0]->kk_telpon,'',array('class'=>'form-control'));
		$data['kk_sektor'] 		= form_dropdown('kk_sektor',$d_sektor ,$a[0]->kk_sektor,array('class'=>'form-control', 'id'=>'kk_sektor'));
		$data['kk_email'] 		= af_input('kk_email',$a[0]->kk_email,'',array('type'=>'email','class'=>'form-control'));
		$data['kk_jk'] 			= form_dropdown('kk_jk',$d_jk,$a[0]->kk_jk,array('class'=>'form-control'));
		$data['kk_hubungan'] 	= form_dropdown('kk_hubungan',$d_hubungan,$a[0]->kk_hubungan,array('class'=>'form-control','disabled'=>'TRUE'));
		$data['kk_baptis'] 		= af_input('kk_baptis',$a[0]->kk_baptis,'',array('type'=>'date','class'=>'form-control'));
		$data['kk_sidi'] 		= af_input('kk_sidi',$a[0]->kk_sidi,'',array('type'=>'date','class'=>'form-control'));
		$data['kk_nikah'] 		= af_input('kk_nikah',$a[0]->kk_nikah,'',array('type'=>'date','class'=>'form-control'));
		$data['kk_pendidikan'] 	= form_dropdown('kk_pendidikan',$d_pendidikan,$a[0]->kk_pendidikan,array('class'=>'form-control'));
		$data['kk_profesi'] 	= af_input('kk_profesi',$a[0]->kk_profesi,'',array('class'=>'form-control'));
		$data['kk_ketrampilan'] = af_input('kk_ketrampilan',$a[0]->kk_ketrampilan,'',array('class'=>'form-control'));
		$data['kk_ktp'] 		= $a[0]->kk_ktp;
		$data['kk_kk'] 			= $a[0]->kk_kk;
		$data['kk_sertifikatsidi'] 		= $a[0]->kk_sertifikatsidi;
		$data['kk_suratbaptis'] 		= $a[0]->kk_suratbaptis;
		$data['kk_nikahimg'] 	= $a[0]->kk_nikahimg;
		$data['kk_status'] 	= $a[0]->kk_status;

		$data['kk_id'] 			= af_hidden('kk_id',$a[0]->kk_id);

    	$this->load->view('page/edit', $data);
    }

    function simpan()
    {    
    	$config['upload_path']          = './assets/images/ktp';
        $config['allowed_types']        = 'gif|jpg|png|pdf|jpeg';
        $config['encrypt_name']   		= true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload('kk_ktp'))
        {
                $kk_ktp = "kosong";
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $kk_ktp = $this->upload->data('file_name');;
        }
        if (!$this->upload->do_upload('kk_kk'))
        {
                $kk_kk = "kosong";
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $kk_kk = $this->upload->data('file_name');;
        }
        if (!$this->upload->do_upload('kk_sertifikatsidi'))
        {
                $kk_sertifikatsidi = "kosong";
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $kk_sertifikatsidi = $this->upload->data('file_name');;
        }
        if (!$this->upload->do_upload('kk_suratbaptis'))
        {
                $kk_suratbaptis = "kosong";
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $kk_suratbaptis = $this->upload->data('file_name');;
        }
        if (!$this->upload->do_upload('kk_nikahimg'))
        {
                $kk_nikahimg = "kosong";
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $kk_nikahimg = $this->upload->data('file_name');;
        }

    	$pos = array (
    			'kk_sektor' 	=> strtoupper($this->input->post('kk_sektor', TRUE)),
				'kk_nama' 		=> strtoupper($this->input->post('kk_nama', TRUE)),
				'kk_alamat' 	=> $this->input->post('kk_alamat', TRUE),
				'kk_domisili' 	=> $this->input->post('kk_domisili', TRUE),
				'kk_telpon' 	=> $this->input->post('kk_telpon', TRUE),
				'kk_email' 		=> $this->input->post('kk_email', TRUE),
				'kk_jk' 		=> $this->input->post('kk_jk', TRUE),
				'kk_lahirtmp' 	=> ucwords($this->input->post('kk_lahirtmp', TRUE)),
				'kk_lahirtgl' 	=> $this->input->post('kk_lahirtgl', TRUE),
				'kk_baptis' 	=> $this->input->post('kk_baptis', TRUE),
				'kk_sidi' 		=> $this->input->post('kk_sidi', TRUE),
				'kk_nikah' 		=> $this->input->post('kk_nikah', TRUE),
				'kk_pendidikan' => $this->input->post('kk_pendidikan', TRUE),
				'kk_profesi' 	=> ucwords($this->input->post('kk_profesi', TRUE)),
				'kk_ketrampilan'=> ucwords($this->input->post('kk_ketrampilan', TRUE)),
				'kk_organisasi' => $this->input->post('kk_organisasi', TRUE),
				'kk_status' 	=> $this->input->post('kk_status', TRUE)
        );

    	if($kk_ktp!='kosong'){ $pos['kk_ktp'] = $kk_ktp;}
    	if($kk_kk!='kosong'){ $pos['kk_kk'] = $kk_kk;}
    	if($kk_sertifikatsidi!='kosong'){ $pos['kk_sertifikatsidi'] = $kk_sertifikatsidi;}
    	if($kk_suratbaptis!='kosong'){ $pos['kk_suratbaptis'] = $kk_suratbaptis;}
    	if($kk_nikahimg!='kosong'){ $pos['kk_nikahimg'] = $kk_nikahimg;}
        $tbl="m_kk";
        $kk_id = $this->input->post('kk_id', TRUE);

        

		$this->Wahyudi_Model->update($tbl,'kk_id',$pos, $kk_id); 

		print_r($pos);
    	redirect("dashboard");
    }

    function v_x($id)
    {
    	$this->Wahyudi_Model->del('m_kk','kk_id',$id);
    	redirect("dashboard","refresh");
    }

    function r145c97437bf81a2f991542bf0da3824d()
    {
        $data['kartu'] = $this->uri->segment(3);
        $this->load->view('page/kartu', $data, FALSE);
    }

    function download()
    {
        $filename = $this->uri->segment(3);
        $file = file_get_contents ( base_url().'assets/images/ktp/'.$filename);
        force_download( $filename, $file);;
    }
}