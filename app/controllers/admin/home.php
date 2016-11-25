<?php
/*
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 08-Nov-16
 * Time: 5:16 PM
 */

class Home extends AdminController
{
    public function index()
    {
        $this->view('admin/home', []);
    }
}