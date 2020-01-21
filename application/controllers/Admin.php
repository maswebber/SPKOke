<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Admin extends MY_Controller
{
	function __construct(){
	  parent::__construct();
	  if ($_SESSION['role']=='OPERATOR' || empty($_SESSION['user'])) {
	  	redirect('logout');
	  }
	}

	public function menu(){
		$data['json']=$this->Fungsi->dashdata();
		$this->render_page('utama',$data);
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
	public function hasil()
	{
		$data['listperiod']=$this->Fungsi->listperiod();
		$this->render_page('hsl',$data);
	}
	
	public function isihasil(){
		if(isset($_POST) && count($_POST)>0){
			$idper=$this->input->post('param1');
			$krit=$this->db->get('kriteria')->result();
			$ater=$this->Fungsi->getalter($idper);
			if($ater){
				$data=$this->Proses->hitung($idper,$ater,$krit);
				$this->load->view('isihasil',$data);
			}
			else{
				echo "<h1 style='text-align:center'>Belum ada data periode tersebut</h1>";
			}
		}
		else{
			header('HTTP/1.1 500 Tidak ada Data Periode Tersebut');
		}
	}

	public function Hasilhitung()
	{
		$data=array(
			'listperiod'=>$this->Fungsi->listperiod(),
		);
		$this->render_page('hasilhitung',$data);
	}

	public function hitung(){
		if(isset($_POST) && count($_POST)>0){
			$idper=$this->input->post('param1');
			$krit=$this->db->get('kriteria')->result();
			$ater=$this->Fungsi->getalter($idper);
			if($ater){
				$data=$this->Proses->hitung($idper,$ater,$krit);
				$data['data']=$this->Fungsi->getformat();
				$data['period']=$this->Fungsi->periode($idper);
				$this->load->view('hitunghasil',$data);
			}
			else{
				echo "<h1 style='text-align:center'>Belum ada data periode tersebut</h1>";
			}
		}
		else{
			header('HTTP/1.1 500 Tidak ada Data Periode Tersebut');
		}
	}

	public function histo(){
		if(!$this->input->is_ajax_request()){
            redirect('404');
        }else{
			$dts=$this->Fungsi->history();
			$a=1;
			foreach ($dts as $key) {
				$key->nomor=$a;
				$a++;
			}
            $jsondata=json_encode($dts);
            $this->output
                ->set_content_type('application/json')
                ->set_output($jsondata);
        }
	}

	public function setting(){
		$data=array(
			'laporan'=>$this->Fungsi->getformat(),
			'general'=>$this->Fungsi->getsetting(),
		);
		$this->render_page('setting',$data);
	}

	public function dummy(){
		$array['data']=$this->Fungsi->getformat();
		$this->load->view('dummy', $array);	
	}

	function save(){
		// print_r($_POST);
		$contents=array(
			'head'=>$_POST['head'],
			'body'=>$_POST['body'],
			'foot'=>$_POST['foot'],
		);
		if($this->Fungsi->cektable('format_setting')){
			$cekin=$this->Altperiod->edit('format_setting',$contents);
			if($cekin){
				echo "Berhasil Ubah Format Laporan";
			}
			else{
				header('HTTP/1.1 500 Gagal Mengubah');
			}
		}else{
			$cekin=$this->Altperiod->add('format_setting',$contents);
			if($cekin){
				echo "Berhasil Tambah Format Laporan";
			}
			else{
				header('HTTP/1.1 500 Gagal Mengubah');
			}
		}
    }
 
    //Upload image summernote
    function upload_image(){
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 150;
                $config['height']= 150;
                $config['new_image']= './assets/images/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url().'assets/images/'.$data['file_name'];
            }
        }
    }
 
    //Delete image summernote
    function delete_image(){
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
	}
	
	function savelogo(){
		if(isset($_POST) && count($_POST)>0){
			if(isset($_FILES["logo"]["name"]) && !empty($_FILES["logo"]["name"])){
				$config['upload_path'] = './assets/images/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('logo')){
					$this->upload->display_errors();
					return FALSE;
				}
				else{
					$data = $this->upload->data();
					//Compress Image
					$config['image_library']='gd2';
					$config['source_image']='./assets/images/'.$data['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= TRUE;
					$config['quality']= '75%';
					$config['width']= 256;
					$config['height']= 256;
					$config['new_image']= './assets/images/'.$data['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$imgurl=$data['file_name'];
					$object=array(
						'logo'=>$imgurl,
						'nama'=>$this->input->post('site')
					);
				}
			}
			else{
				$object=array(
					'nama'=>$this->input->post('site')
				);
			}
			
			if($this->Fungsi->cektable('setting')){
				if($this->Altperiod->edit('setting',$object)){
					echo "Berhasil Ubah Logo dan Nama site";
				}
				else{
					header('HTTP/1.1 500 Gagal Mengubah');
				}
			}else{
				if($this->Altperiod->add('setting',$object)){
					echo "Berhasil Tambah Logo dan Nama site";
				}
				else{
					header('HTTP/1.1 500 Gagal Mengubah');
				}
			}
		}else{
			header('HTTP/1.1 500 Tidak ada input');
		}
	}
}