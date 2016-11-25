<?php
/**
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 01-Nov-16
 * Time: 5:29 PM
 */

/*
 * *****************************
 * Session Start
 * *****************************
 */
session_start();

/*
 * *****************************
 * Include Composer Autoload file
 * *****************************
 */
require_once (__DIR__ .'/../vendor/autoload.php');

/*
 * *****************************
 * Include Database file
 * *****************************
 */
require_once (__DIR__ . '/database/database.php');

/*
 * *****************************
 * Include App file
 * *****************************
 */
require_once (__DIR__ .'/core/App.php');

/*
 * *****************************
 * Include main controller file
 * *****************************
 */
require_once (__DIR__ .'/core/Controller.php');
/*
 * *****************************
 * Include Admin controller file
 * *****************************
 */
require_once (__DIR__ .'/core/AdminController.php');




















/*
 * *****************************
 * Include route file
 * *****************************
 */
//require_once (__DIR__ .'/core/route.php');



