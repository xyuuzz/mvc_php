<?php

// namespace App;

class App 
{
    protected $controller = "HomeController", $method = "index", $params = [];

    public function __construct()
    {
        $url = $this->parseURL() ?? [$this->controller]; # jika tidak ada parameter pada url, maka isi url dengan array yang hanya mempunyai satu element yaitu property controller.

        // class
        if(file_exists(__DIR__ . "/../controllers/" . $url[0] . ".php")) # jika element pertama url ada file controller
        {
            $this->controller = $url[0]; # ubah controller menjadi element pertama url
            unset($url[0]); # hapus element pertama arr url
        }

        # require class menurut file pada property contoller
        require_once __DIR__ . "/../controllers/" . $this->controller . ".php"; 
        # instansiasi controller
        $this->controller = new $this->controller;

        // method
        if( isset($url[1]) ) # jika di url ada parameter ke 2 :
        {
            if(method_exists($this->controller, $url[1])) # jika parameter ke 2 dimiliki oleh controller : (method)
            {
                $this->method = $url[1];
                unset($url[1]); # hapus element kedua arr url
            }
        } 

        // params
        if( !empty($url) ) # jika di url ada terdapat parameter > 2 :
        {
            $this->params = array_values($url); 
        }
 
        # panggil class + method + kirim parameter
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if( isset($_GET["url"]) )
        {
            $url = rtrim($_GET["url"], "/"); // menghapus tanda / dibagian akhir
            $url = filter_var($url, FILTER_SANITIZE_URL); // untuk memfilter url dari hal hal yang berbahaya
            $url = explode("/", $url); // memecah url menjadi sebuah array

            // ! jika yang url nya tidak mengirimkan parameter apapun, maka $url akan berisi array yang memiliki satu element yaitu string kosong ("") atau bernilai false
            // * untuk membuat element pertama dari url/ nama class, dari yang huruf depan nya kecil, menjadi besar
            if($url)
            {
                if(strlen($url[0])) 
                {
                    $url[0][0] = strtoupper($url[0][0]);
                    $url[0] .= "Controller";
                }
            } 

            return $url;
        }
    }
}