<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Wahyudi_Model extends CI_Model{

    function __construct()
    {

        parent::__construct();
    }

    function num_rows($tbl)
    {
        $query = $this->db->query("SELECT * FROM $tbl");

        return $query->num_rows();

    }

    function login_check($tbl,$id_field,$id)
    {
        $query = $this->db->query("SELECT * FROM $tbl WHERE $id_field = '$id'");

        return $query->num_rows();

    }

    function num_group($tbl,$group)
    {
        $query = $this->db->query("SELECT * FROM $tbl GROUP BY  $group");

        return $query->num_rows();

    }

    function num_where($tbl,$id_field,$id, $group)
    {
        $query = $this->db->query("SELECT * FROM $tbl WHERE $id_field = '$id' GROUP BY  $group");

        return $query->num_rows();

    }

    function get_kkno($param)
    {

        $b ="<option value=''>--Pilih--</option>";

        $this->db->group_by('kk_asli','ASC');
        
        $a = $this->db->get_where('m_kk',array('kk_sektor'=>$param));

        foreach ($a->result_array() as $data )
        {
            $b.= "<option value='$data[kk_asli]'>$data[kk_asli] -- $data[kk_nama]</option>";
        }

        return $b;

    }

    function get_id($tbl,$id_field,$id)
    {

        $this->db->select("$tbl.*");
        $this->db->from($tbl);
        $this->db->where($id_field, $id);
        return $this->db->get();
    }

    function get_order($tbl,$id_field,$id,$order,$type)
    {

        $this->db->select("$tbl.*");
        $this->db->from($tbl);
        $this->db->where($id_field, $id);
        $this->db->order_by($order,$type);
        return $this->db->get();
    }

    function add($tbl,$pos)
    {

        $this->db->insert($tbl,$pos);
        return true;
    }

    function update($tbl,$id_field,$pos,$id)
    {
        $this->db->where($id_field, $id);
        $this->db->update($tbl,$pos);
        return true;
    }

    function del($tbl,$id_field,$id)
    {
        $this->db->where($id_field, $id);
        $this->db->delete($tbl);

    }

    function count_anak($param)
    {
        $this->db->select('count(kk_asli) as row');
        $this->db->from('m_kk');
        $this->db->where(array('kk_asli'=>$param, 'kk_hubungan'=>'Anak'));
        $query = $this->db->get();
        foreach($query->result() as $r)
        {
           return $r->row;
        }
    }

    function count_kkasli($param)
    {
        $this->db->select('count(kk_aslip) as row');
        $this->db->from('m_kk');
        $this->db->where(array('kk_sektor'=>$param));
        $this->db->group_by('kk_asli');
        $query = $this->db->get();
        foreach($query->result() as $r)
        {
           return $r->row;
        }
    }

    function count_pa($min, $max)
    {
        $this->db->select('count(tahun) as row');
        $this->db->from('(SELECT kk_id,kk_nama,kk_lahirtgl, TIMESTAMPDIFF(YEAR, kk_lahirtgl, NOW()) AS tahun FROM m_kk) AS newtabel');
        $this->db->where(array('tahun >='=>$min, 'tahun <'=>$max));
        $query = $this->db->get();
        foreach($query->result() as $r)
        {
           return $r->row;
        }
    }
    
    function count_gp($min, $max, $jk)
    {
        $this->db->select('count(tahun) as row');
        $this->db->from('(SELECT kk_nikah, kk_jk, TIMESTAMPDIFF(YEAR, kk_lahirtgl, NOW()) AS tahun FROM m_kk) AS newtabel');
        $this->db->where(array('tahun >='=>$min, 'tahun <'=>$max, 'kk_jk'=>$jk, 'kk_nikah !='=>'0000-00-00'));
        $query = $this->db->get();
        foreach($query->result() as $r)
        {
           return $r->row;
        }
    }

    function count_belumnikah($min, $max, $jk)
    {
        $this->db->select('count(tahun) as row');
        $this->db->from('(SELECT kk_nikah, kk_jk, TIMESTAMPDIFF(YEAR, kk_lahirtgl, NOW()) AS tahun FROM m_kk) AS newtabel');
        $this->db->where(array('tahun >='=>$min, 'tahun <'=>$max, 'kk_nikah'=>'0000-00-00', 'kk_jk'=>$jk));
        $query = $this->db->get();
        foreach($query->result() as $r)
        {
           return $r->row;
        }
    }

    function count_single($min, $max)
    {
        $this->db->select('count(tahun) as row');
        $this->db->from('(SELECT kk_nikah, kk_jk, TIMESTAMPDIFF(YEAR, kk_lahirtgl, NOW()) AS tahun FROM m_kk) AS newtabel');
        $this->db->where(array('tahun >='=>$min, 'tahun <'=>$max, 'kk_nikah'=>'0000-00-00'));
        $query = $this->db->get();
        foreach($query->result() as $r)
        {
           return $r->row;
        }
    }
//**********************//

    function get_where($tabel,$field, $param)
    {
        $this ->db -> select('*');
        $this ->db -> from($tabel);
        $this ->db -> where($field, $param);
        return $this->db->get();
    }

    function get_where_2($tabel,$field, $param,$field1, $param1)
    {
        $this ->db -> select('*');
        $this ->db -> from($tabel);
        $this ->db -> where($field, $param);
        $this ->db -> where($field1, $param1);
        return $this->db->get();
    }

    function get_where_($tabel,$whe)
    {
        $this ->db -> select('*');
        $this ->db -> from($tabel);
        $this ->db -> where($whe);
        return $this->db->get();
    }

    function where_order($tabel,$whe,$id_field,$field)
    {
        $this ->db -> select('*');
        $this ->db -> from($tabel);
        $this ->db -> where($whe);
        $this ->db -> order_by($id_field,$field);
        return $this->db->get();
    }

    function get_where_order($tabel,$field, $param, $field_order,$order_type)
    {
        $this ->db -> select('*');
        $this ->db -> from($tabel);
        $this ->db -> where($field, $param);
        $this ->db -> order_by($field_order, $order_type);
        return $this->db->get();
    }

    function get_wol($tabel,$field, $param, $field_order,$order_type, $limit)
    {
        $this ->db -> select('*');
        $this ->db -> from($tabel);
        $this ->db -> where($field, $param);
        $this ->db -> order_by($field_order, $order_type);
        $this ->db -> limit($limit);
        return $this->db->get();
    }

    

    function num_rows_where($tbl,$id_field,$id, $data_field, $data)
    {
        $query = $this->db->query("SELECT * FROM $tbl WHERE $id_field = '$id' AND $data_field = '$data' ");

        return $query->num_rows();

    }

    function nrwg($tbl,$id_field,$id, $param)
    {
        $query = $this->db->query("SELECT * FROM $tbl WHERE $id_field = '$id' AND $param");

        return $query->num_rows();

    }

    function num_rows_where_4($tbl,$id_field,$id, $data_field, $data, $data_field1, $data1, $data_field2, $data2, $data_field3, $data3)
    {
        $query = $this->db->query("SELECT * FROM $tbl WHERE $id_field = '$id' AND ($data_field = '$data' OR $data_field1 = '$data1' OR $data_field2 = '$data2' OR $data_field3 = '$data3')");

        return $query->num_rows();

    }

    
    function max()
    {
        $this->db->select_max('ss_point');
        $this->db->from('t_ss');
        $this->db->where('ss_masuk','201710');
        $query= $this->db->get();
        foreach($query->result() as $r)
        {
           return $r->ss_point;
        }
        // return $query->ss_point;
    }

    function max_($tbl, $field)
    {
        $this->db->select_max($field);
        $this->db->from($tbl);
        $query= $this->db->get();
        foreach($query->result() as $r)
        {
           return $r->$field;
        }
    }

    function kk_max($tbl, $field,$field1,$param1)
    {
        $this->db->select_max($field);
        $this->db->where($field1,$param1);
        $this->db->from($tbl);
        $query= $this->db->get();
        foreach($query->result() as $r)
        {
           return $r->$field;
        }
    }

    function max_1($tabel, $whe, $field_order, $offset)
    {
        $query = $this->db->query("SELECT *,@curRank:=@curRank + 1 as rank FROM (SELECT * FROM $tabel p WHERE $whe ORDER BY $field_order DESC, ssonline_id ASC LIMIT 5 OFFSET $offset) user_rank, (SELECT @curRank:=0) r");

        return $query;
    }

    function max_wo($tabel, $whe, $field_order)
    {
        $query = $this->db->query("SELECT *,@curRank:=@curRank + 1 as rank FROM (SELECT * FROM $tabel p WHERE $whe ORDER BY $field_order DESC, ssonline_id ASC LIMIT 5 OFFSET 0) user_rank, (SELECT @curRank:=0) r");

        return $query;
    }


    
    function get_karyawan($npk)
    {
        $this->db->select('kary_npk,kary_nama,m_kary.dept_id,kary_shift,kary_status, kary_masuk, m_kary.seksi_id, dept_nama, seksi_nama, m_kary.jab_id, jab_nama, kary_hp');
        $this->db->from('m_kary');
        $this->db->where('kary_npk',$npk);
        $this->db->join('m_dept','m_kary.dept_id=m_dept.dept_id');
        $this->db->join('m_seksi','m_kary.seksi_id=m_seksi.seksi_id');
        $this->db->join('m_jabatan','m_kary.jab_id=m_jabatan.jab_id');
        return $this->db->get();

    }

    function get_area($dept_id)
    {

        $seksi_id="<option value=''>--Pilih--</option>";

        $this->db->order_by('area_nama','ASC');
        
        $kab= $this->db->get_where('m_area',array('dept_id'=>$dept_id));

        foreach ($kab->result_array() as $data )
        {
            $seksi_id.= "<option value='$data[area_id]'>$data[area_nama]</option>";
        }

        return $seksi_id;

    }

    function join($select, $tbl1, $tbl2, $join, $field, $field_param)
    {
        $this->db->select($select);
        $this->db->from($tbl1);
        $this->db->where($field,$field_param);
        $this->db->join($tbl2,$join);
        return $this->db->get();
    }

    function bulan_indo($bln)
    {
        $bulan = $bln;
        Switch ($bulan){
         case 1 : $bulan="Januari";
         Break;
         case 2 : $bulan="Februari";
         Break;
         case 3 : $bulan="Maret";
         Break;
         case 4 : $bulan="April";
         Break;
         case 5 : $bulan="Mei";
         Break;
         case 6 : $bulan="Juni";
         Break;
         case 7 : $bulan="Juli";
         Break;
         case 8 : $bulan="Agustus";
         Break;
         case 9 : $bulan="September";
         Break;
         case 10 : $bulan="Oktober";
         Break;
         case 11 : $bulan="November";
         Break;
         case 12 : $bulan="Desember";
         Break;
         }
        return $bulan;
    }

    function get_belumbuat($bln,$thn)
    {
        $whe ='orga_ss NOT IN (SELECT kary_npk FROM t_ssonline WHERE ssonline_periodeth='.$thn.' AND ssonline_periodebl='.$bln.' AND ssonline_status != "0" GROUP BY kary_npk HAVING count(kary_npk) > 1)';
        $this->db->select('count(orga_ss) as row');
        $this->db->from('m_orga');
        $this->db->where($whe);
        $query = $this->db->get();
        foreach($query->result() as $r)
        {
           return $r->row;
        }
    }

    function get_cr($bln,$thn)
    {
        $whe ='ssonline_periodebl ='.$bln.' AND ssonline_periodeth='.$thn.' AND ssonline_status !="0"';
        //$this->db->select('sum('.$count.') as rows');
        $this->db->select('sum(ssonline_saving) as row');
        $this->db->from('t_ssonline');
        $this->db->where($whe);
        $query = $this->db->get();
        foreach($query->result() as $r)
        {
           return $r->row /1000000;
        }
    }

    function num_terbaik()
    {
        $whe ='t_status ="0" ORDER BY t_kode DESC';
        $this->db->select('count(t_kode) as row');
        $this->db->from('m_terbaik');
        $this->db->where($whe);
        $query = $this->db->get();
        foreach($query->result() as $r)
        {
           return $r->row;
        }

    }
//**********************//
    function get($tabel, $field)
    {
        $this ->db -> select($field);
        $this ->db -> from($tabel);
        $query = $this->db->get();
    }

    function table($tabel,$field)
    {
        $this ->db -> select($field);
        $this ->db -> from($tabel);
        return $this->db->get();
    }

    function get_order_limit($tabel, $field_order, $order_type, $limit)
    {
        $this ->db -> select('*');
        $this ->db -> from($tabel);
        $this ->db -> order_by($field_order, $order_type);
        $this ->db -> limit($limit);
        return $this->db->get();
    }

    

    function sum($tabel, $field, $field_var)
    {
        $this->db->select('count('.$field.') as row');
        $this->db->from($tabel);
        $this->db->where($field,$field_var);
        $query = $this->db->get();
        foreach($query->result() as $r)
        {
           return $r->row;
        }
    }

    function total_reward($tabel, $count,$whe)
    {
        $this->db->select('sum('.$count.') as row');
        $this->db->from($tabel);
        $this->db->where($whe);
        $query = $this->db->get();
        foreach($query->result() as $r)
        {
           return $r->row;
        }
    }

    function login($username, $password, $npk)
    {
        $us   =  $this->security->xss_clean($username);
        $pass =  $this->security->xss_clean($password);
        $npk =  $this->security->xss_clean($npk);

        $row=$this->db->get_where('m_karyawan',array('k_login' => $us, 'k_npk'=>$npk)); 
        return $row->result();   
          
    }

    function login_1($login_id)
    {
        $login_id       =  $this->security->xss_clean($login_id);

        $this->load->database();
        $this ->db -> select('*');
        $this ->db -> from('m_login');
        $this ->db -> where('login_id', $login_id);
        $this ->db -> limit(1);
        
        $query = $this -> db -> get();
        
        if($query -> num_rows() == 1)
        {
            
            $result = $query->result();
            return $result;
        }
        else
        {
            return false;
        }           
    }    
    function ceklogin($username)
    {
          $em = $this->security->xss_clean($username);
          $row=$this->db->get_where('m_karyawan',array('k_login' => $em)); 
          return  $ro = $row->row();
    }

    function cek_data ($tabel,$cek_field,$cek_val,$id_field,$id="")
    {
        if ($id=="")
        {
        $query = $this->db->query("SELECT * FROM $tabel WHERE $cek_field = '$cek_val'");
        }
        else
        {
            $query = $this->db->query("SELECT * FROM $tabel WHERE $cek_field = '$cek_val' AND $id_field != '$id'");
        }
        return $query->num_rows();

    }

     function cek_password ($ps_lama)
    {

        $query = $this->db->query("SELECT * FROM m_login WHERE login_password = '$ps_lama'");

        return $query->num_rows();

    }

  

    function ganti($id,$pass)
    {

        $this->encryption->initialize(array('driver' => 'OpenSSL'));
        $key='*JHJY&^^%GH@)_++&*^%$#SAvv????98766####2@@@@r---KJJH<MMM<$$$$()(++++_)(*';
        $this->encryption->initialize(
         array(
            'cipher' => 'blowfish',
            'mode'   => 'cbc',
            'key'    => $key
            )                     );
                        $key        = $this->config->item('encryption_key');
                        $salt1      = hash('sha512', $key . $pass);
                        $salt2      = hash('sha512', $pass . $key);
                        $hashed_password = hash('sha512', $salt1 . $pass . $salt2);
                        $plain_text = $hashed_password;
                        $ciphertext = $this->encryption->encrypt($plain_text);

         $da= array(
          'login_id'           => $id ,
          'login_password'     => $ciphertext );
         $data = $this->security->xss_clean($da);
         $this->db->where('login_id', $id);
         $this->db->update('m_login',$da);
         return $data;
    }

    function get_type($id)
    {

        $seksi="<option value=''>--Pilih Seksi--</option>";

        $this->db->order_by('s_nama','ASC');
        $kab= $this->db->get_where('m_seksi',array('d_id'=>$id));

        foreach ($kab->result_array() as $data )
        {
            $seksi.= "<option value='$data[s_id]'>$data[s_nama]</option>";
        }

        return $seksi;

    }

}