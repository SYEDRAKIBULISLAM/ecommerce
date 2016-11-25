<?php
/**
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 02-Nov-16
 * Time: 1:10 PM
 */


class Admin extends Controller
{

    public function index()
    {
        include_once (__DIR__ . '/../../functions/RootURL.php');
        include_once (__DIR__ . '/../../functions/RedirectURL.php');
        if(!isset($_SESSION['admin']))
        {
            $urlPath = root() . '/admin/login/';
            redirect($urlPath);
        }
        else
        {
            $urlPath = root() . '/admin/home/';
            redirect($urlPath);
        }
    }
}