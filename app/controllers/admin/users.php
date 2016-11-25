<?php
/*
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 21-Nov-16
 * Time: 11:07 AM
 */

class Users extends AdminController
{
    public function index()
    {
        $this->view('admin/users/index');
    }
}