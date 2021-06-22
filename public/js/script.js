$(function() { // ketika document/ halaman sudah siap maka jalankan fungsi didalan nya

    $(".modalUbah").on("click", function() {
        $("#modalLabel").html("Ubah Data Mahasiswa");
        $(".modal-footer button[type=submit]").html("Ubah");

        const id = $(this).data("id"); // dapatkan value dari atribut data-id dari element edit

        $(".modal-body form").attr("action", "http://localhost/sites/phpmvc/public/mahasiswa/ubah");

        $.ajax({ // jalankan ajax dengan jQuery
            url : "http://localhost/sites/phpmvc/public/mahasiswa/getmahasiswaubah", // url yang akan dipanggil
            data : { // kirimkan data ke url tersebut
                id : id // yaitu id dengan value var id
            },
            method : "post", // method yang digunakan untuk mengirimkan data
            success : data => { // lalu jika success jalankan function nya
                const mhs = JSON.parse(data); // parse/ubah data yang didapat dari url yang dipanggil menjadi object

                // isikan element form modal dengan property yang sesuai dari object mhs
                $("#nama").val(mhs.nama); 
                $("#nrp").val(mhs.nrp);
                $("#email").val(mhs.email);
                $("#jurusan").val(mhs.jurusan);
                $("#id").val(mhs.id);

            }
        });

    });


    $(".modalTambah").on("click", function() {
        $("#modalLabel").html("Tambah Data Mahasiswa");
        $(".modal-footer button[type=submit]").html("Tambah");
        $("#nama").val("");
        $("#nrp").val("");
        $("#email").val("");
        $("#jurusan").val("Teknik Informatika");
    });


    $("input[type=search]").on("keyup", () => {
        $.ajax({
            url : "http://localhost/sites/phpmvc/public/mahasiswa/search",
            data : {
                query : $("input[type=search]").val()
            },
            method : "post",
            success : data => {
                $(".list-group").html(data);
            }
        });
    });

 });