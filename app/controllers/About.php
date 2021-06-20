<?php

class About
{
    public function index($hobi = "Coding", $sekolah = "SMKN 2 Semarang")
    {
        echo "halo, hobi saya adalah $hobi dan sekarang saya bersekolah di $sekolah";
    }
    public function page()
    {
        echo "halo method page dari class about";
    }
}