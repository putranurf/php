<?php

class Aplikasiku_model extends CI_Model {

    function __construct() {
        // parent::__construct();
        $this->load->database();
    }   


    public function addDaftar($data) {

        $data = array(
                'uname' => $data['uname'],
                'password' => md5($data['password']),
        );

        $this->db->insert('tabel_user', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;

    } 

    public function getLogin($uname, $pass)
    {
        
       $sql = $this->db->query("                       

            select * from tabel_user where uname = '".$uname."' and password = MD5('".$pass."')

            ");

        return $sql->row();
    }


     public function addPenduduk($data) {

        $data = array(
            'no_ktp'        => $data['no_ktp'],
            'nama'          => $data['nama'], 
            'tanggal_lahir' => $data['tanggal_lahir'] ,
            'alamat'        => $data['alamat'] 
        );

        $this->db->insert('tabel_biodata', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;

    }

    public function getPenduduk()
     {
          $sql = $this->db->query("                       

            select * from tabel_biodata 

            ");

        return $sql->result();
     } 


     public function getDataBiodata($no_ktp) {

        $sql = $this->db->query(
                "                     
                      select no_ktp, nama, DATE_FORMAT(tanggal_lahir,'%m/%d/%Y') as tanggal_lahir,  alamat from tabel_biodata where no_ktp = '".$no_ktp."'
                ");
        // return $sql->result();
        return $sql->row();
        // if ($result) {
        //     return $result->no_ktp;
        // } else {
        //     return "";
        // }
    }


     public function setPenduduk($data) {
       $sql = $this->db->query("

            update tabel_biodata set 
                no_ktp = '".$data['no_ktp']."',
                nama   = '".$data['nama']."', 
                tanggal_lahir = '".$data['tanggal_lahir']."',
                alamat = '".$data['alamat']."' where no_ktp = '".$data['no_ktp']."' 

                            ");
    
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }


    public function getDeleteData($no_ktp) {
       $sql = $this->db->query("

            delete from tabel_biodata where no_ktp = '".$no_ktp."' 

                            ");
    
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }


    public function cekPenduduk($no_ktp) {

        $sql = $this->db->query(
                "                     
            select * from tabel_biodata where no_ktp = '".$no_ktp."'
                ");
        
        return $sql->row();
        
    }

}


?>