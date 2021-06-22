<?php


class MahasiswaController extends Controller
{
    public function index()
    {
        $data["judul"] = "Mahasiswa Index";
        $data["mahasiswa"] = $this->model("mahasiswa")->getAllMahasiswa();
        $this->view("templates/header", $data);
        $this->view("mahasiswa/index", $data);
        $this->view("templates/footer");
    }

    public function detail($id)
    {
        $data["judul"] = "Detail Mahasiswa";
        $data["mahasiswa"] = $this->model("mahasiswa")->getMahasiswaById($id);
        $this->view("templates/header", $data);
        $this->view("mahasiswa/detail", $data);
        $this->view("templates/footer");
    }

    public function tambah()
    {
        # jika method tambah pada model mahasiswa mengembalikan nilai lebih dari 0
        if($this->model("mahasiswa")->tambahMahasiswa($_POST) > 0) 
        {
            Flasher::setFlash("Data Mahasiswa berhasil ditambahkan", "success");
            header("Location: " . BASEURL . "/mahasiswa" ); # redirect ke halaman index mahasiswa
            exit; # keluar dari function
        }

        Flasher::setFlash("gagal", "ditambahkan", "danger");
        header("Location: " . BASEURL . "/mahasiswa" ); # redirect ke halaman index mahasiswa
        exit; # keluar dari function
    }

    public function hapus($id)
    {
        if($this->model("mahasiswa")->hapusMahasiswa($id) > 0)
        {
            Flasher::setFlash("Data Mahasiswa berhasil dihapus", "success");
            header("Location: " . BASEURL . "/mahasiswa" ); # redirect ke halaman index mahasiswa
            exit; # keluar dari function
        }   

        Flasher::setFlash("Data Mahasiswa gagal dihapus", "danger");
        header("Location: " . BASEURL . "/mahasiswa" ); # redirect ke halaman index mahasiswa
    }

    public function getmahasiswaubah()
    {
        echo json_encode($this->model("mahasiswa")->getMahasiswaById($_POST["id"]), true);
    }

    public function ubah()
    {
        if($this->model("mahasiswa")->ubahMahasiswa($_POST) > 0)
        {
            Flasher::setFlash("Data Mahasiswa berhasil diubah", "success");
            header("Location: " . BASEURL . "/mahasiswa" ); # redirect ke halaman index mahasiswa
            exit; # keluar dari function
        }   

        Flasher::setFlash("Data Mahasiswa gagal diubah", "danger");
        header("Location: " . BASEURL . "/mahasiswa" ); # redirect ke halaman index mahasiswa
    }

    public function search()
    {
        if(!empty($_POST["query"]))
        {
            $data = $this->model("mahasiswa")->cariMahasiswa($_POST["query"]);
            $result = "";

            if(count($data))
            {
                foreach($data as $mhs)
                {
                    $result .=
                    '
                    <li class="list-group-item">
                        <p class="d-inline">'. $mhs["nama"] .'</p>
                        <div class="d-flex justify-content-between float-right">
                        <a href="' . BASEURL . '/mahasiswa/detail/'. $mhs["id"] .'"
                        class="btn btn-success btn-sm mr-2">
                            Detail
                        </a>
                        <a href="' . BASEURL . '/mahasiswa/ubah/'. $mhs["id"] .'"
                        class="btn btn-primary btn-sm mr-2 modalUbah" data-toggle="modal" data-target="#formModal" data-id="'. $mhs["id"] .'" >
                            Edit
                        </a>
                        <a href="' . BASEURL . '/mahasiswa/hapus/'. $mhs["id"] .'"
                        class="btn btn-danger btn-sm">
                            Hapus
                        </a>
                        </div>
                    </li>
                    ';
                }
            }
            else
            {
                $result .= 
                '
                <p class="text-center">Mahasiswa yang dicari tidak ditemukan</p>
                ';
            }

            echo $result;
        }
        else
        {
            $data = $this->model("mahasiswa")->getAllMahasiswa();
            $result = "";

            foreach($data as $mhs)
            {
                $result .=
                '
                <li class="list-group-item">
                    <p class="d-inline">'. $mhs["nama"] .'</p>
                    <div class="d-flex justify-content-between float-right">
                    <a href="' . BASEURL . '/mahasiswa/detail/'. $mhs["id"] .'"
                    class="btn btn-success btn-sm mr-2">
                        Detail
                    </a>
                    <a href="' . BASEURL . '/mahasiswa/ubah/'. $mhs["id"] .'"
                    class="btn btn-primary btn-sm mr-2 modalUbah" data-toggle="modal" data-target="#formModal" data-id="'. $mhs["id"] .'" >
                        Edit
                    </a>
                    <a href="' . BASEURL . '/mahasiswa/hapus/'. $mhs["id"] .'"
                    class="btn btn-danger btn-sm">
                        Hapus
                    </a>
                    </div>
                </li>
                ';
            }

            echo $result;
        }
    }
}