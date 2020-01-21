<?php

 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Krite extends CI_Model {
    
    function list(){
        return $this->db->get('kriteria')->result();
    }

    function get($id){
        $this->db->where('idkri', $id);
        return $this->db->get('kriteria')->row();
    }
    function add($dataperiode){
        $this->db->set($dataperiode);
		if($this->db->insert('kriteria')){
            $this->Fungsi->addhist(array(
                'menu'=>'Data Kriteria',
                'aksi'=>'Tambah Kriteria ID:'.$this->db->insert_id()
                ,
                'tanggal_aksi'=>date('Y-m-d H:i:s'),
                'user_name'=>$_SESSION['user'])
              );
            return true;
        }
        else{
            return false;
        }
    }
    function delete($cekperiod){
        $this->db->select('idkri');
        $this->db->from('kriteria');
        $this->db->where($cekperiod);
        $available=$this->db->get();
        // print_r($_POST);
        if($available->num_rows()==1){
            $this->db->where($cekperiod);
            $query=$this->db->delete('kriteria');
            if($query){
                $this->Fungsi->addhist(array(
                    'menu'=>'Data Kriteria',
                    'aksi'=>'Hapus Kriteria ID:'.$cekperiod,
                    'tanggal_aksi'=>date('Y-m-d H:i:s'),
                    'user_name'=>$_SESSION['user'])
                  );
                return true;
            }
            else{
                show_error('Terjadi Kesalahan');
            }
        }
        else{
            return false;
        }
    }

    function edit($cekperiod){
        $this->db->select('idkri');
        $this->db->from('kriteria');
        $this->db->where($cekperiod);
        $available=$this->db->get();
        // print_r($available->num_rows());
        if($available->num_rows()==1){
            $dataperiode=array(
                'ketkri'=>$this->input->post('ket'),
                'bobot'=>$this->input->post('bobot'),
                'name'=>$this->input->post('name'),
                'atribut'=>$this->input->post('att'),
                'status'=>$this->input->post('status')
            );
            $this->db->where($cekperiod);
            $updatedat=$this->db->update('kriteria',$dataperiode);
            if ($updatedat) {
                $this->addhist(array(
                    'menu'=>'Data Kriteria',
                    'aksi'=>'Ubah Data Kriteria ID:'.$cekperiod,
                    'tanggal_aksi'=>date('Y-m-d H:i:s'),
                    'user_name'=>$_SESSION['user'])
                  );
                return true;
            }
            else{
                show_error('Terjadi Kesalahan');
            }
        }
        else{
            return false;
        }
    }

 }
 
 /* End of file Kriteria.php */
 