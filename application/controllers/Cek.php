<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cek extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Wahyudi_Model','',TRUE);

	}
	////////---------------------- Wahyudi Start ----------------------\\\\\\\\\
	function index()
	{

	}

	function cek_data($tabel,$cek_field,$id_field)
	{
		$cek_val=$this->input->post($cek_field);
		$id=$this->input->post('id');
		$d = $this->Wahyudi_Model->cek_data($tabel,$cek_field,$cek_val,$id_field,$id);
		if ($d==0)
		{
			$datax='true';
		}
		else
		{
			$datax='Sudah Ada Data';
		}
		echo json_encode ($datax);
	}

	function input_cek($input1, $input2)
	{
		$input_a= $this->input->post($input1);
		$input_b = $this->input->post($input2);

		if($input_a==$input_b){
			$datax='Tidak Boleh Sama';
		}
		else
		{
			$datax='true';
		}
		echo json_encode ($datax);
	}

	function input_over($input1, $input2)
	{
		$input_a= $this->input->post($input1);
		$input_b = $this->input->post($input2);

		if($input_a >= $input_b){
			$datax='Tidak Boleh Lebih Kecil';
		}
		else
		{
			$datax='true';
		}
		echo json_encode ($datax);
	}

	function input_cek_notsame($input1, $input2)
	{
		$input_a= $this->input->post($input1);
		$input_b = $this->input->post($input2);

		if($input_a==$input_b){
			$datax='true';
		}
		else
		{
			$datax='Data Tidak sama';
		}
		echo json_encode ($datax);
	}

	function cek_foreman($cek_field1)
	{
		$val_npk=$this->input->post($cek_field1);
		$whe = "(jab_id ='6' OR jab_id = '7')";
		
		$query = $this->db->query("SELECT * FROM m_kary WHERE kary_npk = '$val_npk' AND $whe");
        $d = $query->num_rows();
		if ($d==0)
		{
			$datax='Data tidak benar';
		}
		else
		{
			$datax='true';
		}
		echo json_encode ($datax);
	}

	function cek_spv($cek_field1)
	{
		$val_npk=$this->input->post($cek_field1);
		$whe = "jab_id ='9'";
		
		$query = $this->db->query("SELECT * FROM m_kary WHERE kary_npk = '$val_npk' AND $whe");
        $d = $query->num_rows();
		if ($d==0)
		{
			$datax='Data tidak benar';
		}
		else
		{
			$datax='true';
		}
		echo json_encode ($datax);
	}

	function cek_mgr($cek_field1)
	{
		$val_npk=$this->input->post($cek_field1);
		$whe = "(jab_id ='2' OR jab_id = '5' OR jab_id = '8')";
		
		$query = $this->db->query("SELECT * FROM m_kary WHERE kary_npk = '$val_npk' AND $whe");
        $d = $query->num_rows();
		if ($d==0)
		{
			$datax='Data tidak benar';
		}
		else
		{
			$datax='true';
		}
		echo json_encode ($datax);
	}

	function cek_div($cek_field1)
	{
		$val_npk=$this->input->post($cek_field1);
		$whe = "(jab_id ='3' OR jab_id = '4')";
		
		$query = $this->db->query("SELECT * FROM m_kary WHERE kary_npk = '$val_npk' AND $whe");
        $d = $query->num_rows();
		if ($d==0)
		{
			$datax='Data tidak benar';
		}
		else
		{
			$datax='true';
		}
		echo json_encode ($datax);
	}

	////////---------------------- Wahyudi End ----------------------\\\\\\\\\
	function cek_empty($tabel,$cek_field,$id_field)
	{
		$cek_val=$this->input->post($cek_field);
		$id=$this->input->post('id');
		$d = $this->wahyudi->cek_data($tabel,$cek_field,$cek_val,$id_field,$id);
		if ($d==0)
		{
			$datax='Not Found';
		}
		else
		{
			$datax='true';
		}
		echo json_encode ($datax);
	}

	function cek_data_empty($tabel,$cek_field,$id_field)
	{
		$cek_val=$this->input->post($cek_field);
		$id=$this->input->post('id');
		$d = $this->wahyudi->cek_data($tabel,$cek_field,$cek_val,$id_field,$id);
		if ($d==0)
		{
			$datax='Data Not Found';
		}
		else
		{
			$e = $this->wahyudi->cek_data_empty($tabel,$cek_field,$cek_val,$id_field,$id);
			if($e!=0)
			{
				$datax='Already receive';
			}
			else
			{
				$datax='true';
			}
		}
		echo json_encode ($datax);
	}

	function cek_field($tabel,$cek_field1,$cek_field2,$id_field)
	{
		$cek_val1=$this->input->post($cek_field1);
		$cek_val2=$this->input->post($cek_field2);
		$id=$this->input->post('id');
		$d = $this->wahyudi->cek_fiel($tabel,$cek_field1,$cek_val1,$cek_field2,$cek_val2,$id_field,$id);
		if ($d==0)
		{
			$datax='true';
		}
		else
		{
			$datax='Already Exists';
		}
		echo json_encode ($datax);
	}

	
	
}