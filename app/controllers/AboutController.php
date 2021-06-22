<?php

class AboutController extends Controller
{
    public function index($hobi = "Coding", $sekolah = "SMKN 2 Semarang")
    {
        # membuat var data berupa arr assoc, yang nanti akan dikirimkan ke halaman view
        $data["hobi"] = $hobi;
        $data["sekolah"] = $sekolah;
        $data["judul"] = "about index";
        $this->view("templates/header", $data);
        $this->view("about/index", $data);
        $this->view("templates/footer");
    }

    public function page()
    {
        $data["judul"] = "About Page";
        $this->view("templates/header", $data);
        $this->view("about/page");
        $this->view("templates/footer");
    }
}