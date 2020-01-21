<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Desa extends MY_Controller
{
	function __construct(){
	  parent::__construct(); 
	 }
	public function index(){
		$data=array(
			'general'=>$this->Fungsi->getsetting()
		);
	  	$this->load->view('login',$data);
	}
	
	public function plogin(){
		$usn=$this->input->post('uname');
		$pwd=md5(md5($this->input->post('pword')).'nasi'.sha1($this->input->post('pword')));
		$array = array(
	      'usn'=>"$usn",
	      'pwo'=>"$pwd"
	    );
		$query=$this->Altperiod->get('memgota',$array);
		if($query){
			if ($query->status==1) {
				$datauser=array(
					'user'=>$usn,
					'role'=>$query->role,
					'id'=>$query->id_ngota,
					'foto'=>$query->foto
				);
				$this->session->set_userdata($datauser);
				if($query->role=='OPERATOR'){
					redirect('user/home');
				}else{
					redirect('home/menu');
				}
			}elseif ($query->status==0) {
				echo '<script type="text/javascript">
							alert("User diblokir");
							document.location="'.base_url().'";
						</script>';
			}
		}else{
			echo '<script type="text/javascript">
						alert("Username dan Password Salah");
						document.location="'.base_url().'";
					</script>';
		}
	}
	public function lgout(){
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}
}
?>