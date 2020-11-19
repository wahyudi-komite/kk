<?php
function af_input($name,$value="",$place,$tmb=array())
{
	
		$ar_name = array('name'=>$name,
				 	'id'=>$name,
				 	'value'=>$value,
				 	'placeholder'=>$place
		 );
		if (!empty ($tmb))
		{
			$ar_name = array_merge($ar_name,$tmb);
		}
		
		return	$data = form_input($ar_name);
	
}

function af_password($name,$value="",$place,$tmb=array())
{
	
		$ar_name = array('name'=>$name,
				 	'id'=>$name,
					'type'=>"password",
				 	'value'=>$value,
				 	'placeholder'=>$place
		 );
		if (!empty ($tmb))
		{
			$ar_name = array_merge($ar_name,$tmb);
		}
		
		return	$data = form_input($ar_name);
	
}


function af_radio($name,$value="",$tmb=array())
{
	
		$ar_name = array('name'=>$name,
				 	'id'=>$name,
				 	'value'=>$value,
				 	
		 );
		if (!empty ($tmb))
		{
			$ar_name = array_merge($ar_name,$tmb);
		}
		
		return	$data = form_radio($ar_name);
	
}


	function af_hidden($name, $value = '', $recursing = FALSE)
	{
		static $form;

		if ($recursing === FALSE)
		{
			$form = "\n";
		}

		if (is_array($name))
		{
			foreach ($name as $key => $val)
			{
				form_hidden($key, $val, TRUE);
			}
			return $form;
		}

		if ( ! is_array($value))
		{
			$form .= '<input type="hidden" id="'.$name.'"  name="'.$name.'" value="'.form_prep($value, $name).'" />'."\n";
		}
		else
		{
			foreach ($value as $k => $v)
			{
				$k = (is_int($k)) ? '' : $k;
				form_hidden($name.'['.$k.']', $v, TRUE);
			}
		}

		return $form;
	}

	function af_diskon()
	{
		$options = array(
                  '5'  => 'DP 5 %',
                  '10'    => 'DP 10 %',
                  '15'   => 'DP 15 %',
                  '20' => 'DP 20 %',
                );		

		return form_dropdown('discount[]', $options);
	}

	function af_check($name,$value="",$tru="")
	{
		$status = ($tru == "")?"":"checked";
			$ar_name = array('name'=>$name,
					 	'id'=>$name,
					 	'value'=>$value,
					 	'checked'=>$status
			 );			
			
			return	$data = form_checkbox($ar_name);
			//return $data = form_checkbox($name, $value, $tru);
		
	}

	function bulan($bln)
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

	function angka_bulan($bln)
	{
		$angka_bulan = $bln;
		Switch ($angka_bulan){
		 case 1 : $angka_bulan ="01";
		 Break;
		 case 2 : $angka_bulan ="02";
		 Break;
		 case 3 : $angka_bulan ="03";
		 Break;
		 case 4 : $angka_bulan ="04";
		 Break;
		 case 5 : $angka_bulan ="05";
		 Break;
		 case 6 : $angka_bulan ="06";
		 Break;
		 case 7 : $angka_bulan ="07";
		 Break;
		 case 8 : $angka_bulan ="08";
		 Break;
		 case 9 : $angka_bulan ="09";
		 Break;
		 case 10 : $angka_bulan ="10";
		 Break;
		 case 11 : $angka_bulan ="11";
		 Break;
		 case 12 : $angka_bulan ="12";
		 Break;
		 }
		return $angka_bulan;
	}



