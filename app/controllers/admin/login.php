<?php
/*
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 08-Nov-16
 * Time: 5:20 PM
 */
class Login extends Controller
{
    public function __construct()
    {
        if(isset($_SESSION['admin']))
        {
            include_once (__DIR__ . '/../../../functions/RootURL.php');
            include_once (__DIR__ . '/../../../functions/RedirectURL.php');

            $urlPath = root() . '/admin/home/';
            redirect($urlPath);
        }
    }
    public function index()
    {
        if(isset($_POST['login']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $md5password = md5($password);

            $user = UserModel::where('username', $username)
                                ->where('password', $md5password)
                                ->first();
            if (!empty($user))
            {
                $admin = AdminModel::where('id', $user->id)->first();
                if (!empty($admin))
                {
                    $_SESSION['userid'] = $user->id;
                    $_SESSION['name'] = $user->name;
                    $_SESSION['username'] = $user->username;
                    $_SESSION['admin'] = $admin->id;

                    $super = SuperModel::where('id', $admin->id)->first();

                    if (!empty($super))
                    {
                        $_SESSION['superuserid'] = $super->id;
                    }
                    include_once (__DIR__ . '/../../../functions/RootURL.php');
                    include_once (__DIR__ . '/../../../functions/RedirectURL.php');

                    $urlPath = root() . '/admin/home/';
                    redirect($urlPath);

                }
                else
                {
                    $this->view('admin/login', ['error' => 'This is not an admin account..']);
                }
            }
            else
            {
                $this->view('admin/login', ['username' => $username, 'error' => 'Username and Password doesn\'t match.']);
            }
        }
        else
        {
            $this->view('admin/login', []);
        }
    }

}