<?php

class Home 
{
    public function index()
    {
        echo "ini method index class home";
    }

    public function sapa($nama = "Anonymous")
    {
        echo "Halo $nama";
    }
}