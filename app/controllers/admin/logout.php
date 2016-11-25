<?php
/*
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 11-Nov-16
 * Time: 10:50 AM
 */

class Logout extends Controller
{
    public function index()
    {

        session_destroy();

        include_once (__DIR__ . '/../../../functions/RootURL.php');
        include_once (__DIR__ . '/../../../functions/RedirectURL.php');

        $urlPath = root() . '/admin/login/';
        redirect($urlPath);
    }
}