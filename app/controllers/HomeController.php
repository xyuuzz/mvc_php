<?php

class HomeController extends Controller
{
    public function index()
    {
        $data["judul"] = "Home index";
        $data["nama"] = $this->model("user")->getUser();
        $this->view("templates/header", $data);
        $this->view("home/index", $data);
        $this->view("templates/footer");
    }

    public function sapa($nama = "Anonymous")
    {
        $data["judul"] = "Home sapa";
        $data["nama"] = $nama;
        $this->view("templates/header", $data);
        
        $this->view("home/sapa", $data);
        $this->view("templates/footer");
    }
}