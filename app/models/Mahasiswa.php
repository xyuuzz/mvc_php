<?php


class Mahasiswa
{
    private $table = "mahasiswa", $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultAll();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahMahasiswa($data)
    {
        $this->db->query("INSERT INTO mahasiswa (nama, nrp, email, jurusan) VALUES 
                            ( :nama, :nrp, :email, :jurusan )
        ");

        // bind/validasi value satu per satu 
        $this->db->bind("nama", $data["nama"]);
        $this->db->bind("nrp", $data["nrp"]);
        $this->db->bind("email", $data["email"]);
        $this->db->bind("jurusan", $data["jurusan"]);

        $this->db->execute(); # execute statement db

        # jika berhasil maka pdo akan mengembalikan angka berdasarkan baris yang kita sunting/edit.
        return $this->db->rowCount(); 
    }

    public function hapusMahasiswa($id)
    {
        $this->db->query("DELETE FROM mahasiswa WHERE id=:id");
        $this->db->bind("id", $id);

        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function ubahMahasiswa($data)
    {
        $this->db->query("UPDATE mahasiswa SET 
                            nama = :nama, 
                            nrp = :nrp, 
                            email = :email, 
                            jurusan = :jurusan 
                            WHERE id = :id
        ");

        // bind/validasi value satu per satu 
        $this->db->bind("id", $data["id"]);
        $this->db->bind("nama", $data["nama"]);
        $this->db->bind("nrp", $data["nrp"]);
        $this->db->bind("email", $data["email"]);
        $this->db->bind("jurusan", $data["jurusan"]);

        $this->db->execute(); # execute statement db

        # jika berhasil maka pdo akan mengembalikan angka berdasarkan baris yang kita sunting/edit.
        return $this->db->rowCount(); 
    }

    public function cariMahasiswa($nama)
    {
        $this->db->query("SELECT * FROM mahasiswa WHERE nama LIKE :nama");
        $this->db->bind("nama", "%$nama%");
        return $this->db->resultAll();
    }
}