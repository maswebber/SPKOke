<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Usermanager extends MY_Controller
{
	var $table;
	function __construct()
	{
		parent::__construct();
		if ($_SESSION['role'] == 'OPERATOR' || empty($_SESSION['user'])) {
			redirect('logout');
		} else {
			$this->table = 'memgota';
		}
	}

	public function index()
	{
		$this->render_page('Listuser');
	}

	function listuser()
	{
		$datauser = $this->Altperiod->getall($this->table);
		$a = 1;
		$test = array();
		foreach ($datauser as $key) {
			$key->nomor = $a;
			$test[] = $key;
			$a++;
		}
		// print_r($test);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($test));
	}

	function edituser($iduser = null)
	{
		if ($iduser == null) {
			if (isset($_POST) && count($_POST) > 0) {
				$iduser = $this->input->post('iduser');
				if ($this->input->post('pwd1') != null || !empty($this->input->post('pwd1'))) {
					$old = md5(md5($this->input->post('pwd1')) . 'nasi' . sha1($this->input->post('pwd1')));
					$cekpass = array(
						'id_ngota' => $iduser,
						'pwo' => $old
					);
					$oldpass = $this->Altperiod->get($this->table, $cekpass);
					// print_r($oldpass->num_rows()+$iduser+$old);
					if ($oldpass) {
						if ($this->input->post('pwd2') != null && !empty($this->input->post('pwd2'))) {
							// $test=$this->input->post('pwd2');
							$passenc = md5(md5($this->input->post('pwd2')) . 'nasi' . sha1($this->input->post('pwd2')));
							// print_r($test);
							$imgurl=$this->Altperiod->upload('foto',300,300,'75%');
							$datauser = array(
								'pwo' => $passenc,
								'role' => $this->input->post('role'),
								'status' => $this->input->post('status')
							);
							if($imgurl!=1){
								$datauser['foto']=$imgurl;
							}elseif($imgurl==1){
								$datauser=$datauser;
							}else{
								header('HTTP/1.1 500 Foto Gagal di Upload');
							}
							
							$updatedat = $this->Altperiod->edit($this->table, $datauser, $cekpass);
							if ($updatedat) {
								echo "Data Berhasil di perbaharui";
							} else {
								header('HTTP/1.1 500 Terjadi Kesalahan');
							}
						} else {
							header('HTTP/1.1 500 Password Baru Kosong');
						}
					} else {
						header('HTTP/1.1 500 Password Salah');
					}
				} else if ($this->input->post('pwd1') == null || empty($this->input->post('pwd1'))) {
					$cekuser = array(
						'id_ngota' => $iduser
					);
					$fetuser = $this->Altperiod->get($this->table, $cekuser);
					if ($fetuser) {
						$datauser = array(
							'role' => $this->input->post('role'),
							'status' => $this->input->post('status')
						);
						$imgurl=$this->Altperiod->upload('foto',300,300,'75%');
						if($imgurl!=1){
							$datauser['foto']=$imgurl;
						}elseif($imgurl==1){
							$datauser=$datauser;
						}else{
							header('HTTP/1.1 500 Foto Gagal di Upload');
						}
						$updatedat = $this->Altperiod->edit($this->table, $datauser, $cekuser);
						if ($updatedat) {
							echo "Data Berhasil di perbaharui";
						} else {
							header('HTTP/1.1 500 Terjadi Kesalahan');
						}
					} else {
						header('HTTP/1.1 500 User Tidak Ada');
					}
				} else {
					header('HTTP/1.1 500 Periksa Data Kembali');
				}
			} else {
				header('HTTP/1.1 500 Terjadi Kesalahan');
			}
		} else {
			$data['datauser'] = $this->Altperiod->get($this->table, $iduser);
			$this->load->view('userfolder/edit_user', $data);
		}
	}

	function deluser()
	{
		if (isset($_POST) && count($_POST) > 0) {
			$id_user = $this->input->post('iduser');
			if ($id_user == 1) {
				header('HTTP/1.1 500 Terjadi Kesalahan');
			} else {
				$query = $this->Altperiod->del($this->table,$id_user);
				if ($query) {
					echo "Data berhasil di Hapus";
				} else {
					show_error('Terjadi Kesalahan');
				}
			}
		} else
			show_error('Terjadi Kesalahan');
	}

	function adduser()
	{
		if (isset($_POST) && count($_POST) > 0) {
			if (!empty($this->input->post('pwd')) && !empty($this->input->post('usn'))) {
				$pass = md5(md5($this->input->post('pwd')) . 'nasi' . sha1($this->input->post('pwd')));
				$imgurl=$this->Altperiod->upload('foto',300,300,'75%');
				if($imgurl!=1){
					$datainsert = array(
						'usn' => $this->input->post('usn'),
						'role' => $this->input->post('role'),
						'pwo' => $pass,
						'status' => $this->input->post('status'),
						'foto'=>$imgurl
					);
					$cekmasuk = $this->Altperiod->add($this->table,$datainsert);
					// print_r($pass);
					if ($cekmasuk) {
						echo "Berhasil Tambah User";
					} else {
						header('HTTP/1.1 500 Terjadi Kesalahan');
					}
				}
				elseif($imgurl==1){
					header('HTTP/1.1 500 Foto dibutuhkan');
				}
				else{
					header('HTTP/1.1 500 Gagal Upload');
				}
			} else {
				header('HTTP/1.1 500 Isi semua data');
			}
		} else {
			$this->load->view('userfolder/add_user');
		}
	}
}

