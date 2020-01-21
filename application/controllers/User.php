<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class User extends MY_Controller
{
	var $table;
	function __construct(){
	  parent::__construct();
	  if (empty($_SESSION['user'])) {
	  	redirect('logout');
	  }else{
		  $this->table="memgota";
	  }
	}
	public function menu(){
		$data['periode']=$this->Altperiod->getall('tahun');
		$data['kriteria'] = $this->Altperiod->getall('kriteria');
		$this->render_page('user/home',$data);
	}
	public function ubahpwd(){
		$this->render_page('cpass');
	}
	public function prosespwd()
	{
		$id=$this->input->post('usnid');
		$pwdold=md5(md5($this->input->post('pwordl')).'nasi'.sha1($this->input->post('pwordl')));
		// echo "$pwdold";
		$array = array(
	      'id_ngota'=>$id,
	      'pwo'=>$pwdold
	    );
		$query=$this->db->get_where('memgota',$array);
		// print_r($query->num_rows());
		if ($query->num_rows()===1) {
			$pwdnew=md5(md5($this->input->post('pwordb')).'nasi'.sha1($this->input->post('pwordb')));
			$array = array(
		      'pwo'=>$pwdnew
		    );
			$cek=$this->Fungsi->ubpass($array,$id);
			if($cek){
				echo "Password diubah";
			}
			else{
				header('HTTP/1.1 500 Terjadi Kesalahan');
			}
		}
		else{
			header('HTTP/1.1 500 Password Salah');
		}
	}
	
	function ubahfoto($iduser=NULL){
		if ($iduser) {
			if (isset($_POST) && count($_POST) > 0) {
				$iduser = $this->input->post('iduser');
				$cekuser = array(
					'id_ngota' => $iduser
				);
				$fetuser = $this->Altperiod->get($this->table, $cekuser);
				if ($fetuser) {
					$imgurl=$this->Altperiod->upload('foto2',300,300,'75%');
					if($imgurl!=1){
						$datauser['foto']=$imgurl;
					}elseif($imgurl==1){
						header('HTTP/1.1 500 Tidak Ada Foto');
					}else{
						header('HTTP/1.1 500 Foto Gagal di Upload');
					}
					$updatedat = $this->Altperiod->edit($this->table, $datauser, $cekuser);
					if ($updatedat) {
						echo "Foto di perbaharui, anda akan logout";
					} else {
						header('HTTP/1.1 500 Terjadi Kesalahan 3');
					}
				} else {
					header('HTTP/1.1 500 User Tidak Ada');
				}
			}else{
				header('HTTP/1.1 500 Terjadi Kesalahan 2');
			}
		}
		else{
			header('HTTP/1.1 500 Terjadi Kesalahan 1');
		}
	}
	
}