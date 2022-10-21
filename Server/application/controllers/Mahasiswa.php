<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// panggil libraries Server
require APPPATH."Libraries/Server.php";
class Mahasiswa extends Server {

    // service get
    function service_get()
    {
        // panggil model "Mmahsiswa"
        $this ->load ->model("Mmahasiswa","mdl",TRUE);
        // panggil method "ambil_data"
        $hasil = $this ->mdl->ambil_data();
        // tampilkan hasil dalam format "JSON"
        // 200 merupakan hasil sukses
        $this->response(array("mhs" => $hasil),200);
    }

    // service delete
    function service_delete()
    {
        // panggil model "Mmahsiswa"
        $this ->load ->model("Mmahasiswa","mdl",TRUE);
        // panggil parameter "npm" sebagai dasar menghapus data
        $token = $this ->delete("npm");
        // panggil method hapus data
        $hasil = $this ->mdl->hapus_data(base64_encode($token));
        // jikadata mahasiswa berhasil dihapus
        if($hasil == 1)
        {
            // tampil hasil dalam format "JSON"
            $this ->response(array("status" => "data berhasil di hapus"),200);
        }
        else
        {
            // tampil hasil dalam format "JSON"
            $this ->response(array("status" => "data gagal di hapus !"),200);
        }
    }

    // service post
    function service_post()
    {
        // panggil model "mmahasiswa"
        $this ->load ->model("Mmahasiswa","mdl",TRUE);
        // ambil nilai dari parameter2
        $data = array(
            "npm"=>$this->post("npm"),
            "nama"=>$this->post("nama"),
            "telepon"=>$this->post("telepon"),
            "jurusan"=>$this->post("jurusan"),
        );
        


        $hasil = $this ->mdl->simpan_data($data["npm"],$data["nama"],$data["telepon"],$data["jurusan"], base64_encode($data["npm"]));
        // jikadata mahasiswa berhasil dihapus
        if($hasil == 0)
        {
            // tampil hasil dalam format "JSON"
            $this ->response(array("status" => "data berhasil disimpan"),200);
        }
        else
        {
            // tampil hasil dalam format "JSON"
            $this ->response(array("status" => "data gagal disimpan !"),200);
        }
    }

    // service put
    function service_put()
    {
        
    }
}
