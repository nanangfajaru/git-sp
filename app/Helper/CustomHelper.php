<?php 

namespace App\Helper;

use Illuminate\Support\Facades\DB;

class General
{
    public static function getAutoNumber($parm1,$parm2)
    { //$parm1 adalah table yang akan di isi auto number

        $max = DB::table($parm1)->max('id');

        return $parm2.abs($max+1) ;
    }

    public static function getAutoNumberUsr($parm1,$parm2)
    { //$parm1 adalah table yang akan di isi auto number

        $max = DB::table($parm1)->max('id');

        return $parm2.abs($max+1) ;
    }
 	
    public static function getDropdownComp($where = '', $idSelected = '')
   	{
   		$queryComp = DB::table('mstr_comp')
   						->orderBy('comp_desc')	
   						->get();
   		$data = $queryComp ;		

   		if ($where) {
                $data = $queryComp->where('comp_id', $where );
                $data->all();
          }

   		echo  '<option value="">- Pilih -</option>';
   		foreach ($data as $row) 
   		{
   			if($row->comp_id == $idSelected)
   			{
   				$selected = "selected"  ;
   			}else{
   				$selected = ""  ;
   			}
   			echo '<option value="'.$row->comp_id.'" '.$selected.'>'.$row->comp_desc.'</option>';
   		}

   	}
   	
   	public static function getDropdownSite($where = '', $idSelected = '')
   	{
   		$querySite = DB::table('mstr_site')
   						->orderBy('site_desc')	
   						->get();
   		$data = $querySite ;		

   		if ($where) {
                $data = $querySite->where('comp_id', $where );
                $data->all();
          }

   		echo  '<option value="">- Pilih -</option>';
   		foreach ($data as $row) 
   		{
   			if($row->site_id == $idSelected)
   			{
   				$selected = "selected"  ;
   			}else{
   				$selected = ""  ;
   			}
   			echo '<option value="'.$row->site_id.'" '.$selected.'>'.$row->site_desc.'</option>';
   		}

   	}

   	public static function getDropdownDiv($where = '', $idSelected = '')
   	{
   		$queryDiv = DB::table('mstr_div')
   						->orderBy('div_desc')	
   						->get();
   		$data = $queryDiv ;		

   		if ($where) {
                $data = $queryDiv->where('comp_id', $where );
                $data->all();
          }

   		echo  '<option value="">- Pilih -</option>';
   		foreach ($data as $row) 
   		{
   			if($row->div_id == $idSelected)
   			{
   				$selected = "selected"  ;
   			}else{
   				$selected = ""  ;
   			}
   			echo '<option value="'.$row->div_id.'" '.$selected.'>'.$row->div_desc.'</option>';
   		}

   	}

   	public static function getDropdownDept($where = '', $idSelected = '')
   	{
   		$queryDept = DB::table('mstr_dept')
   						->orderBy('dept_desc')	
   						->get();
   		$data = $queryDept ;		

   		if ($where) {
                $data = $queryDept->where('div_id', $where );
                $data->all();
          }

   		echo  '<option value="">- Pilih -</option>';
   		foreach ($data as $row) 
   		{
   			if($row->dept_id == $idSelected)
   			{
   				$selected = "selected"  ;
   			}else{
   				$selected = ""  ;
   			}
   			echo '<option value="'.$row->dept_id.'" '.$selected.'>'.$row->dept_desc.'</option>';
   		}

   	}

    public static function getDropdownProv($where = '', $idSelected = '')
    {
      $queryComp = DB::table('provinces')
              ->orderBy('name') 
              ->get();
      $data = $queryComp ;    

      if ($where) {
                $data = $queryComp->where('id', $where );
                $data->all();
          }

      echo  '<option value="">- Pilih -</option>';
      foreach ($data as $row) 
      {
        if($row->id == $idSelected)
        {
          $selected = "selected"  ;
        }else{
          $selected = ""  ;
        }
        echo '<option value="'.$row->id.'" '.$selected.'>'.$row->name.'</option>';
      }

    }
    
    public static function getDropdownReg($where = '', $idSelected = '')
    {
      $queryReg = DB::table('regencies')
              ->orderBy('name') 
              ->get();
      $data = $queryReg ;   

      if ($where) {
                $data = $queryReg->where('province_id', $where );
                $data->all();
          }

      echo  '<option value="">- Pilih -</option>';
      foreach ($data as $row) 
      {
        if($row->id == $idSelected)
        {
          $selected = "selected"  ;
        }else{
          $selected = ""  ;
        }
        echo '<option value="'.$row->id.'" '.$selected.'>'.$row->name.'</option>';
      }

    }

    public static function getDropdownDist($where = '', $idSelected = '')
    {
      $queryDist = DB::table('districts')
              ->orderBy('name') 
              ->get();
      $data = $queryDist ;    

      if ($where) {
                $data = $queryDist->where('regency_id', $where );
                $data->all();
          }

      echo  '<option value="">- Pilih -</option>';
      foreach ($data as $row) 
      {
        if($row->id == $idSelected)
        {
          $selected = "selected"  ;
        }else{
          $selected = ""  ;
        }
        echo '<option value="'.$row->id.'" '.$selected.'>'.$row->name.'</option>';
      }

    }

    public static function getDropdownVil($where = '', $idSelected = '')
    {
      $queryVil = DB::table('villages')
              ->orderBy('name') 
              ->get();
      $data = $queryVil ;   

      if ($where) {
                $data = $queryVil->where('district_id', $where );
                $data->all();
          }

      echo  '<option value="">- Pilih -</option>';
      foreach ($data as $row) 
      {
        if($row->id == $idSelected)
        {
          $selected = "selected"  ;
        }else{
          $selected = ""  ;
        }
        echo '<option value="'.$row->id.'" '.$selected.'>'.$row->name.'</option>';
      }

    }

    public static function getDescParent($parm1)
    { 
        $parent = DB::table('mstr_menu')
                  ->where('menu_id', $parm1)
                  ->pluck('menu_desc')
                  ->first();
        return $parent ;
    }

    public static function getSequence($idSelected = '')
    {
      $query = DB::table('mstr_setting')
              ->where('setting_key', 'menu_seq') 
              ->orderBy('setting_value') 
              ->get();
      $data = $query ; 


      echo  '<option value="">- Pilih -</option>';
      foreach ($data as $row) 
      {
        if($row->setting_value == $idSelected)
        {
          $selected = "selected"  ;
        }else{
          $selected = ""  ;
        }
        echo '<option value="'.$row->setting_value.'" '.$selected.'>'.$row->setting_value.'</option>';
      }

    }

    public static function getParent($menu_seq = '', $idSelected = '')
    { 
      
      $query = DB::table('mstr_menu')
              ->where('menu_seq', $menu_seq-1) 
              ->orderBy('menu_desc') 
              ->get();
      $data = $query ; 

      if ($menu_seq == 1) {
        echo  '<option value="NULL">-</option>';
      }else{
        echo  '<option value="">- Pilih -</option>';
      }
      
      foreach ($data as $row) 
      {
        if($row->menu_id == $idSelected)
        {
          $selected = "selected"  ;
        }else{
          $selected = ""  ;
        }
        echo '<option value="'.$row->menu_id.'" '.$selected.'>'.$row->menu_desc.'</option>';
      }
    }

    public static function getProvinsi($where = '', $idSelected = '')
    {
      $query = DB::table('ref_provinsi')
              ->orderBy('nama_provinsi') 
              ->get();
      $data = $query ;    

      if ($where) {
                $data = $query->where('id_provinsi', $where );
                $data->all();
          }

      echo  '<option value="">- Pilih -</option>';
      foreach ($data as $row) 
      {
        if($row->id_provinsi == $idSelected)
        {
          $selected = "selected"  ;
        }else{
          $selected = ""  ;
        }
        echo '<option value="'.$row->id_provinsi.'" '.$selected.'>'.$row->nama_provinsi.'</option>';
      }

    }

    public static function getKabupaten($where = '', $idSelected = '')
    {
      $query = DB::table('ref_kabupaten')
              ->orderBy('nama_kabupaten') 
              ->get();
      $data = $query ;    

      if ($where) {
                $data = $query->where('par_kabupaten', $where );
                $data->all();
          }

      echo  '<option value="">- Pilih -</option>';
      foreach ($data as $row) 
      {
        if($row->id_kabupaten == $idSelected)
        {
          $selected = "selected"  ;
        }else{
          $selected = ""  ;
        }
        echo '<option value="'.$row->id_kabupaten.'" '.$selected.'>'.$row->nama_kabupaten.'</option>';
      }

    }

    public static function getKecamatan($where = '', $idSelected = '')
    {
      $query = DB::table('ref_kecamatan')
              ->orderBy('nama_kecamatan') 
              ->get();
      $data = $query ;    

      if ($where) {
                $data = $query->where('par_kecamatan', $where );
                $data->all();
          }

      echo  '<option value="">- Pilih -</option>';
      foreach ($data as $row) 
      {
        if($row->id_kecamatan == $idSelected)
        {
          $selected = "selected"  ;
        }else{
          $selected = ""  ;
        }
        echo '<option value="'.$row->id_kecamatan.'" '.$selected.'>'.$row->nama_kecamatan.'</option>';
      }

    }

    public static function getDesa($where = '', $idSelected = '')
    {
      $query = DB::table('ref_desa')
              ->orderBy('nama_desa') 
              ->get();
      $data = $query ;    

      if ($where) {
                $data = $query->where('par_desa', $where );
                $data->all();
          }

      echo  '<option value="">- Pilih -</option>';
      foreach ($data as $row) 
      {
        if($row->id_desa == $idSelected)
        {
          $selected = "selected"  ;
        }else{
          $selected = ""  ;
        }
        echo '<option value="'.$row->id_desa.'" '.$selected.'>'.$row->nama_desa.'</option>';
      }

    }

    
}