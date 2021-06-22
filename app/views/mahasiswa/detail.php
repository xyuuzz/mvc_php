<div class="card container mt-5 col-lg-7">
<div class="card-body">
    <h1 class="display-4">Detail Mahasiswa <?=$data["mahasiswa"]["nama"]?></h1>
    <ul class="list-group">
        <li class="list-group-items">Nama Mahasiswa : <?=$data["mahasiswa"]["nama"]?></li>
        <li class="list-group-items">NRP Mahasiswa :<?=$data["mahasiswa"]["nrp"]?></li>
        <li class="list-group-items">Email Mahasiswa : <?=$data["mahasiswa"]["email"]?></li>
        <li class="list-group-items">Jurusan Mahasiswa : <?=$data["mahasiswa"]["jurusan"]?></li>
    </ul>
    <br>
    <a href="<?=BASEURL?>/mahasiswa" class="btn btn-sm btn-primary float-right">Kembali</a>
    </div>
</div>