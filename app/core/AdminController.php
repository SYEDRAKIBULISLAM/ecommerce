<?php
/*
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 21-Nov-16
 * Time: 10:18 AM
 */

class AdminController extends Controller
{
    public function __construct()
    {
        if(!isset($_SESSION['admin']))
        {
            include_once ('functions/RootURL.php');
            include_once ('functions/RedirectURL.php');

            $urlPath = root() . '/admin/login/';
            redirect($urlPath);
        }
    }
}