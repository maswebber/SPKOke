<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Altperiod extends CI_Model {

    function getall($table,$id=NULL){
        $field=$this->db->field_data($table);
        $pk=0;
        foreach ($field as $key) {
            if($key->primary_key==1){
                $pk=$key->name;
            }
        }
        if($id){
            $this->db->where($pk, $id);
        }
        $this->db->order_by($pk, 'desc');
        return $this->db->get($table)->result();
    }
    function get($table,$id){
        $field=$this->db->field_data($table);
        $pk=0;
        foreach ($field as $key) {
            if($key->primary_key==1){
                $pk=$key->name;
            }
        }
        if(is_array($id)){
            $this->db->where($id);
        }else{
            $this->db->where($pk, $id);
        }
        return $this->db->get($table)->row();
    }

    function add($table,$object){
        if($this->db->insert($table, $object)){
            $this->Fungsi->addhist(array(
                'menu'=>'Data '.$table,
                'aksi'=>'Tambah '.$table.' ID:'.$this->db->insert_id(),
                'tanggal_aksi'=>date('Y-m-d H:i:s'),
                'user_name'=>$_SESSION['user'])
              );
            return true;
        }
        else{
            return false;
        }
        
    }

    function del($table,$id){
        $field=$this->db->field_data($table);
        $pk=0;
        foreach ($field as $key) {
            if($key->primary_key==1){
                $pk=$key->name;
            }
        }
        $this->db->where($pk, $id);
        if($this->db->delete($table)){
            $this->Fungsi->addhist(array(
                'menu'=>'Data '.$table,
                'aksi'=>'Hapus '.$table.' ID:'.$id,
                'tanggal_aksi'=>date('Y-m-d H:i:s'),
                'user_name'=>$_SESSION['user'])
              );
            return true;
        }else{
            return false;
        }
    }

    function edit($table,$object,$id=NULL){
        $field=$this->db->field_data($table);
        $pk=0;
        foreach ($field as $key) {
            if($key->primary_key==1){
                $pk=$key->name;
            }
        }
        if($id){
            if(is_array($id)){
                $this->db->where($id);
            }else{
                $this->db->where($pk, $id);
            }
        }
        if($this->db->update($table, $object)){
            $this->Fungsi->addhist(array(
                'menu'=>'Data '.$table,
                'aksi'=>'Ubah '.$table.' "ID:'.(is_array($id))?json_encode($id):$id,
                'tanggal_aksi'=>date('Y-m-d H:i:s'),
                'user_name'=>$_SESSION['user'])
              );
            return true;
        }else{
            return false;
        }
        
    }

    function upload($name,$width,$height,$quality){
        if(isset($_FILES[$name]["name"]) && !empty($_FILES[$name]["name"])){
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload($name)){
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
                $config['quality']=$quality;
                $config['width']= $width;
                $config['height']=$height;
                $config['new_image']= './assets/images/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $imgurl=$data['file_name'];
                return $imgurl;
            }
        }else{
            return 1;
        }
    }
}

/* End of file Altperiod.php */
