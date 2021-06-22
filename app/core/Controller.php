<?php

// namespace Controller;

class Controller 
{
    public function view($view, $data = [])
    {
        require_once __DIR__ . "/../views/" . $view . ".php"; 
    }

    public function model($model)
    {
        $model[0] = strtoupper($model[0]);
        require_once __DIR__ . "/../models/" . $model . ".php";
        return new $model;
    }
}