<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Model {

    function hitung($idper,$ater,$krit){
            #TABEL NILAI ALTERNATIF
                $o=1;
                $nilaialter=array();
                foreach ($ater as $key2) {
                    $nilai=$this->Fungsi->nilaialter($key2->idalter,$idper);
                    $nil=array();
                    foreach ($krit as $keykrit) {
                        $cektest=$keykrit->idkri; 
                        foreach ($nilai as $key3) {
                            if ($key3->idkri==$cektest) {
                                $pow1[$o][$cektest]=pow($key3->nilai,2);
                                $nil[]=$key3->nilai;
                            }
                        }
                    }
                    $nilaialter[]=array('no'=>$o,'keterangan'=>$key2->ket,'nilai'=>$nil);
                    $o++;
                }
            #END OF TABEL NILAI ALTERNATIF

            #TABLE NILAI PEMBAGI
                $res=array();
                foreach ($pow1 as $kar1) {
                    foreach ($kar1 as $kar2 => $val1) {
                        (!isset($res[$kar2])) ? $res[$kar2] = $val1 : $res[$kar2] += $val1;
                    }
                }
                foreach ($res as $key => $value) {
                    $cekpembagi[$key]=sqrt($value);
                }
            #END OF TABLE NILAI PEMBAGI

            // print_r(json_encode($cekpembagi));
            
            #TABLE KEPUTUSAN TERNORMALISASI
                $o=1;
                $tabkep=array();
                foreach ($ater as $key2) {
                    $nilai=$this->Fungsi->nilaialter($key2->idalter,$idper);
                    $nil=array();
                    foreach ($krit as $keykrit1) {
                    $cektest1=$keykrit1->idkri;
                        foreach ($cekpembagi as $k => $v) {
                            if ($k==$cektest1) {
                                foreach ($nilai as $key3) {
                                    if ($key3->idkri==$cektest1) {
                                        $oi=$key3->nilai/$v;
                                        $kepnom[$o][$cektest1]=$oi;
                                        $nil[]=$oi;
                                    }
                                    
                                }
                            }
                            
                        }
                    }
                    $tabkep[]=array('no'=>$o,'keterangan'=>$key2->ket,'nilai'=>$nil);
                    $o++;
                }
                // print_r(json_encode($tabkep));
            #END OF TABLE KEPUTUSAN TERNORMALISASI
            
            #TABLE KEPUTUSAN TERNORMALISASI DAN TERBOBOT
                $o=1;
                foreach ($ater as $key2) {
                    $nilai=$this->Fungsi->nilaialter($key2->idalter,$idper);
                    foreach ($krit as $keykrit2) {
                        $cektest2=$keykrit2->idkri;
                        foreach ($nilai as $key3) {
                            if ($key3->idkri==$cektest2) {
                                $ap1[$o][$cektest2]=$key3->bobot;
                                if ($key3->atribut=='benefit') {
                                    $cek1[$o][]='benefit';
                                }
                                else{
                                    $cek1[$o][]='cost';
                                }
                            }
                        }
                    }
                    $o++;
                }
                $oi=1;
                foreach ($ap1 as $koy) {
                    foreach ($koy as $key => $bbt) {
                        $cekhasil[$key][$oi]=$kepnom[$oi][$key]*$bbt;
                    }
                    $oi++;
                }
                $op=1;
                $opi=1;
                $tabbot=array();
                foreach ($ater as $keyater) {
                    $nil=array();
                    foreach ($cekhasil as $key) {
                        foreach ($key as $kuy => $val) {
                            if ($kuy==$opi) {
                                $datamax[$op][]=$val;
                                $nil[]=$val;
                            }
                        }
                    }
                    $tabbot[]=array('no'=>$op,'keterangan'=>$keyater->ket,'nilai'=>$nil);
                    $op++;
                    $opi++;
                }
            #END OF TABLE KEPUTUSAN TERNORMALISASI DAN TERBOBOT

            // print_r(json_encode($tabbot));

            #TABLE SOLUSI IDEAL +/-
                $opp=1;
                foreach ($cek1 as $k) {
                    foreach ($k as $key => $value) {
                    foreach ($datamax[$opp] as $kosy =>$valuee) {
                            if ($key==$kosy) {
                                    //echo " ($key||$kosy) $value $valuee <br>";
                                    $datamax1[$key][]=$valuee;
                            }
                        }
                    }
                    // echo "<br>";
                    $opp++;
                }
                $test=$this->Fungsi->flip($cek1);
                $pio=0;
                foreach ($test as $k=>$now) {
                    $datapake=array();
                    foreach ($now as $key => $value) {
                        if ($k==$pio) {
                            foreach ($datamax1[$k] as $ke => $val) {
                                $datapake[]=$val;
                            }
                            if ($value=='benefit') {
                                $plus[$pio]=max($datapake);
                                $min[$pio]=min($datapake);
                            }
                            elseif($value=='cost'){
                                $plus[$pio]=min($datapake);
                                $min[$pio]=max($datapake);
                            }
                        }
                    }
                    $pio++;
                }
            #END OF TABLE SOLUSI IDEAL +/-

            #TABLE JARAK IDEAL +/-
                foreach ($datamax as $key) {
                    $cek=array();
                    foreach ($key as $ke => $value) {
                        $cek[]=pow(($value-$plus[$ke]),2);
                    }
                    $spositif[]=sqrt(array_sum($cek));
                }
                foreach ($datamax as $key) {
                    $cek=array();
                    foreach ($key as $ke => $value) {
                        $cek[]=pow(($value-$min[$ke]),2);
                    }
                    $snegatif[]=sqrt(array_sum($cek));
                }
            #END OF TABLE JARAK IDEAL +/-

            #TABLE KEDEKATAN RELATIF (RC)/ HASIL PERHITUNGAN
                $o=1;
                $oip=0;
                $jaridl=array();
                foreach ($ater as $key2) {
                    
                    $rc=$snegatif[$oip]/($spositif[$oip]+$snegatif[$oip]);
                    $rcd[$key2->ket]=$rc;
                    $jaridl[]=array('no'=>$o,'keterangan'=>$key2->ket,'spos'=>$spositif[$oip],'sneg'=>$snegatif[$oip],'rc'=>$rc);
                    $o++;
                    $oip++;
                }
            #END OF TABLE RC

            return array(
                'krit'=>$krit,
                'ater'=>$ater,
                'nilaialter'=>$nilaialter,
                'cekpembagi'=>$cekpembagi,
                'tabkep'=>$tabkep,
                'tabbot'=>$tabbot,
                'plus'=>$plus,
                'min'=>$min,
                'jaridl'=>$jaridl,
                'rcd'=>$rcd,
            );
    }

}

/* End of file ModelName.php */
