<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Alternatif extends MY_Controller
{
	function __construct(){
	  parent::__construct();
	  if (empty($_SESSION['user'])) {
	  	redirect(site_url(''));
	  }
	}

	public function index(){
		$this->render_page('alter');
	}

	function listalter(){
		$datauser=$this->db->get('alters')->result();
		$a=1;
		$test=array();
		foreach ($datauser as $key) {
			$key->nomor=$a;
			$test[]=$key;
			$a++;
		}
		// print_r($test);
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($test));
	}

	function editalter($alter=NULL){
		if(isset($_POST) && count($_POST)>0){
			$idtahun=$this->input->post('id_tahun');
			$cekda=array('id_tahun'=>$idtahun);
			$available=$this->db->get_where('tahun',$cekda)->row();
			$dataperiode=array(
				'ket'=>$this->input->post('ket'),
				'id_tahun'=>$idtahun,
				'status'=>$this->input->post('status')
			);
			$this->db->where('idalter',$alter);
			$cekmasuk=$this->db->update('alters',$dataperiode);
			// print_r($pass);
			if ($cekmasuk) {
				$noid=$alter;
				$this->db->select('nilai_alter.idnilai,
				nilai_alter.idkri,
				kriteria.`name`');
				$this->db->from('nilai_alter');
				$this->db->join( 'kriteria' ,'nilai_alter.idkri = kriteria.idkri', 'left');
				$this->db->where('nilai_alter.idalter', $alter);
				$this->db->order_by('kriteria.idkri', 'ASC');
				$kriteria=$this->db->get()->result();
				foreach($kriteria as $key){
					if($this->input->post($key->name)){
						$object=array(
							'nilai'=>$this->input->post($key->name),
						);
						$this->db->where('idnilai',$key->idnilai);
						$cekin=$this->db->update('nilai_alter', $object);
					}
				}
				if($cekin){
					echo "Berhasil Edit Alternatif";
				}
				else{
					header('HTTP/1.1 500 Gagal Menambahkan');
				}
			}
			else{
				header('HTTP/1.1 500 Gagal Update');
			}
		}
		elseif($alter==NULL){
			show_404();
		}
		else{
			//ALTER
			$this->db->select('*');
			$this->db->from('alters');
			$this->db->where('idalter', $alter);
			$data['dataalter']=$this->db->get()->row();
			//PERIODE
			$data['periode']=$this->db->get('tahun')->result();
			//KRITERIA
			$this->db->select('*');
			$this->db->from('nilai_alter');
			$this->db->where('idalter', $alter);
			$this->db->join('kriteria', 'nilai_alter.idkri = kriteria.idkri');
			$this->db->order_by('kriteria.idkri', 'ASC');
			$data['kriteria'] = $this->db->get()->result();
			$this->load->view('alters/edit_al',$data);
		}
	}

	function removealt(){
		if(isset($_POST) && count($_POST) > 0){
			$idalter=$this->input->post('idalter');
			$this->db->where('idalter', $idalter);
			$cek=$this->db->delete('nilai_alter');
			if($cek){
				$this->db->where('idalter', $idalter);
				$cek2=$this->db->delete('alters');
				if($cek2){
					echo "Hapus Berhasil";
				}
				else{
					header('HTTP/1.1 500 Hapus Gagal');
				}
			}
			else{
				header('HTTP/1.1 500 Terjadi Kesalahan 2');
			}
		}
		else{
			header('HTTP/1.1 500 Terjadi Kesalahan 1');
		}
	}

	function addalter(){
		if(isset($_POST) && count($_POST)>0){
			$idtahun=$this->input->post('id_tahun');
			$cekda=array('id_tahun'=>$idtahun);
			$available=$this->db->get_where('tahun',$cekda)->row();
			if($available->status==0){
				header('HTTP/1.1 500 Tahun Sudah Tidak Aktif');
			}
			else{
				$dataperiode=array(
					'ket'=>$this->input->post('ket'),
					'id_tahun'=>$idtahun,
					'status'=>$this->input->post('status')
				);
				$this->db->set($dataperiode);
				$cekmasuk=$this->db->insert('alters');
				// print_r($pass);
				if ($cekmasuk) {
					$noid=$this->db->insert_id();
					$this->db->select('*');
					$this->db->from('kriteria');
					$this->db->order_by('kriteria.idkri', 'ASC');
					$kriteria=$this->db->get()->result();
					foreach($kriteria as $key){
						if($this->input->post($key->name)){
							$object=array(
								'idalter'=>$noid,
								'idkri'=>$key->idkri,
								'nilai'=>$this->input->post($key->name),
							);
							$cekin=$this->db->insert('nilai_alter', $object);
						}
					}
					if($cekin){
						echo "Berhasil Tambah Alternatif";
					}
					else{
						header('HTTP/1.1 500 Gagal Menambahkan');
					}
				}
				else{
					header('HTTP/1.1 500 Gagal Menambahkan');
				}
			}
		}
		else{
			$data['periode']=$this->db->get('tahun')->result();
			//KRITERIA
			$this->db->select('*');
			$this->db->from('kriteria');
			$this->db->order_by('kriteria.idkri', 'ASC');
			$data['kriteria'] = $this->db->get()->result();
			$this->load->view('alters/add_al',$data);
		}
	}
}