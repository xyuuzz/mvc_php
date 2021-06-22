<div class="jumbotron container mt-3">
  <div class="d-lg-flex justify-content-between">
  <div class="">
    <?php if( $data["hobi"] !== "Coding" ) {?>
      <h4>Anda mengirimkan data hobi berupa <?=$data["hobi"]?> dan data sekolah berupa <?=$data["sekolah"]?></h4>
    <?php } ?>
      <h1 class="display-4">Ini adalah halaman about index</h1>
      <p class="lead">Hobi ku adalah <?=$data["hobi"]?> dan sekarang saya bersekolah di <?=$data["sekolah"]?></p>
    </div>
    <img class="shadow" src="<?=BASEURL?>/images/pplinux.jpg" alt="" width="350" height="300">
  </div>
  <hr class="my-4">
  <button class="btn btn-success btn-lg" href="#" role="button">Kirim Parameter</button>

  <div class="d-none">
    <h4>Kirim parameter hobi dan sekolah : </h4>
      <form>
      <label>
      Hobi :
      <input class="form-control " type="text" required>
      </label>
      <br>
      <label>
      Sekolah :
      <input class="form-control" type="text" required>
      </label>
      <br>
      <a class="btn btn-primary btn-lg" href="#" role="button">Kirim</a>
      <p class="text-danger d-none">Isi Semua input!</p>
    </form>
  </div>

</div>

<script>
  const btn_kirim = document.querySelector("button.btn.btn-success");
  d_none = document.querySelector(".d-none");

  btn_kirim.onclick = () => {
    d_none.classList.remove("d-none");
    btn_kirim.classList.add("d-none");
  };

  btn = document.querySelector("a.btn");
  input = document.querySelectorAll(".form-control");
  
  btn.onclick = () => 
  {
    hobi = input[1].value;
    sekolah = input[2].value;
    if(!hobi || !sekolah)
    {
      document.querySelector("p.text-danger.d-none").classList.remove("d-none");
    }
    else 
    {
      location.href = `<?=BASEURL?>/about/${hobi}/${sekolah}`
    }
  };
</script>