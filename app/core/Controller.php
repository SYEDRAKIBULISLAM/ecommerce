<?php
/**
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 01-Nov-16
 * Time: 6:07 PM
 */


class Controller
{
    protected $params = [];

//    public $validUrl;

    public  function __construct()
    {

    }
    public function model($model)
    {
        require_once (__DIR__. '/../models/'. $model .'.php');
        return new $model;
    }

    public function view($view, $data = [])
    {
//        $this->validUrl = $view;
//        global $validUrl;
        require_once (__DIR__. '/../../public/views/'. $view .'.php');
    }
}