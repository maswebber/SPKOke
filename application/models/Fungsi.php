<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Fungsi extends CI_Model
{
  function __construct()
  {
    parent::__construct();
    $error = '<script type="text/javascript">
                    alert("Terjadi Kesalahan");
                    document.location="' . site_url('home/menu') . '/";
                </script>';
  }
  public function ubpass($pwdb, $id)
  {
    $this->db->set($pwdb);
    $this->db->where('id_ngota', $id);
    return $this->db->update("memgota", $pwdb);
    $this->addhist(array(
      'menu'=>'Ubah Password',
      'aksi'=>'Ubah Password User ID:'.$id,
      'tanggal_aksi'=>date('Y-m-d H:i:s'),
      'user_name'=>$_SESSION['user'])
    );
  }
  public function upalt($upalter, $idal)
  {
    $error = '<script type="text/javascript">
                    alert("Terjadi Kesalahan");
                    document.location="' . site_url('home/menu') . '/";
                </script>';
    $this->db->set($upalter);
    $this->db->where('idalter', $idal);
    $cek = $this->db->update("alters", $upalter);
    $this->addhist(array(
      'menu'=>'Ubah Alternatif',
      'aksi'=>'Ubah Alternatif ID:'.$idal,
      'tanggal_aksi'=>date('Y-m-d H:i:s'),
      'user_name'=>$_SESSION['user'])
    );
    if ($cek == null) {
      echo $error;
    }
  }
  public function upkr($datakr, $idkr)
  {
    $this->db->set($datakr);
    $this->db->where('idkri', $idkr);
    $this->db->update('kriteria', $datakr);
  }
  public function tmbal($nm)
  {
    $this->db->query("INSERT INTO alters(ket) VALUES('$nm')");
    $lastdb = $this->db->insert_id();
    $query1 = $this->db->query("SELECT * FROM kriteria");
    foreach ($query1->result() as $key) {
      $this->db->query("INSERT into nilai_alter(idalter,idkri,nilai) values($lastdb,$key->idkri,0)");
    }
    $this->addhist(array(
      'menu'=>'Tambah Alternatif Batch',
      'aksi'=>'Tambah Alternatif Batch',
      'tanggal_aksi'=>date('Y-m-d H:i:s'),
      'user_name'=>$_SESSION['user'])
    );
  }

  public function upnil($nilai, $id)
  {
    $query1 = $this->db->query("SELECT * FROM kriteria");
    foreach ($nilai as $key1 => $value) {
      foreach ($query1->result() as $key2) {
        if ($key1 == $key2->name) {
          $this->db->query("UPDATE nilai_alter SET nilai=$value WHERE idalter=$id AND idkri=$key2->idkri");
        }
      }
    }
    $this->addhist(array(
      'menu'=>'Ubah Nilai Alternatif',
      'aksi'=>'Ubah Nilai Alternatif ID:'.$id,
      'tanggal_aksi'=>date('Y-m-d H:i:s'),
      'user_name'=>$_SESSION['user'])
    );
  }

  public function tmbhkriteria($cn, $ket, $bbt, $atr)
  {
    $query1 = array(
      'ketkri' => '$ket',
      'bobot' => $bbt,
      'atribut' => '$atr',
      'name' => '$cn',
      'status' => 0
    );
    $this->db->insert('kriteria', $query1);
    $lastdb = $this->db->insert_id();
    $que = $this->db->get('alters')->result();
    $insbatch = array();
    foreach ($que as $key) {
      $insbatch[] = array(
        'idalter' => $key->idalter,
        'idkri' => $lastdb,
        'nilai' => 0
      );
    }
    // $this->db->insert_batch('nilai_alter',$insbatch);
    // if (!$query1) {
    //   echo $error;
    // }
  }

  function nilaialter($key, $idper)
  {
    $this->db->select('nilai_alter.nilai,alters.idalter,kriteria.idkri,kriteria.bobot,kriteria.atribut');
    $this->db->from('nilai_alter,kriteria,alters');
    $this->db->where('nilai_alter.`idkri`=kriteria.`idkri`');
    $this->db->where('nilai_alter.`idalter`=alters.`idalter`');
    $this->db->where('nilai_alter.`idalter`', $key);
    $this->db->where('alters.id_tahun', $idper);
    $this->db->order_by('kriteria.`idkri`', 'asc');
    return $this->db->get()->result();
  }

  function flip($arr)
  {
    $out = array();
    foreach ($arr as $key => $ok) {
        foreach ($ok as $subkey => $subvalue) {
            $out[$subkey][$key] = $subvalue;
          }
      }
    return $out;
  }

  function listperiod()
  {
    return $this->db->get('tahun')->result();
  }

  function getalter($idper)
  {
    return $this->db->get_where('alters',array('id_tahun'=>$idper,'status'=>1))->result();
  }

  function dashdata()
  {
    $this->db->select('mem.member,per.periode,alt.alternatif');
    $this->db->from('
      (SELECT
      COUNT(memgota.id_ngota) as member
      FROM
      memgota) as mem,
      (SELECT
      COUNT(tahun.id_tahun) as periode
      FROM
      tahun) as per,
      (SELECT
      COUNT(alters.idalter) as alternatif
      FROM
      alters) as alt
    ');
    return $this->db->get()->row();
  }

  function history()
  {
    $this->db->select('history.menu,
    history.aksi,
    history.tanggal_aksi,
    history.user_name');
    $this->db->order_by('history.tanggal_aksi', 'desc');
    return $this->db->get('history', 50)->result();
  }

  function addhist($data){
    $this->db->insert('history', $data);
  }

  function getformat()
  {
    $this->db->select('head,body,foot');
    $this->db->from('format_setting');
    $this->db->limit(1);
    return $this->db->get()->row();
  }

  function updateformat($object)
  {
    if($this->cektable('format_setting')){
      if($this->db->update('format_setting', $object)){
        $this->addhist(array(
          'menu'=>'Pengaturan Sistem',
          'aksi'=>'Ubah Format Laporan',
          'tanggal_aksi'=>date('Y-m-d H:i:s'),
          'user_name'=>$_SESSION['user'])
        );
        return true;
      }
      else{
        return false;
      }
    }
    else{
      if($this->db->insert('format_setting', $object)){
        $this->addhist(array(
          'menu'=>'Pengaturan Sistem',
          'aksi'=>'Tambah Format Laporan',
          'tanggal_aksi'=>date('Y-m-d H:i:s'),
          'user_name'=>$_SESSION['user'])
        );
        return true;
      }
      else{
        return false;
      }
    }
  }

  function getsetting(){
    return $this->db->get('setting')->row();
  }

  function periode($idper){
    $this->db->select('tgl_mulai, tgl_selesai');
    $this->db->from('tahun');
    $this->db->where('id_tahun', $idper);
    return $this->db->get()->row();
  }

  function cektable($table){
    $Var=$this->db->get($table);
    return $Var->num_rows();
  }
}
 