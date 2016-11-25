<?php
/**
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 01-Nov-16
 * Time: 6:23 PM
 */



class Home extends Controller
{

    public function index($name = '')
    {

        $this->view('home/index', []);
    }
    public function super()
    {
        $msg = '';

        $isAdmin = UserModel::where('username', '=', 'Admin')->first();
        if(!isset($isAdmin->id)) {
            $user = UserModel::create([
                'name' => 'Super Admin',
                'username' => 'Admin',
                'email' => 'default@mail.com',
                'password' => md5(123456),
            ]);
            if (isset($user->id)) {
                $admin = AdminModel::create([
                    'id' => $user->id,
                    'user_id' => $user->id
                ]);

                if (isset($admin->id)) {
                    SuperModel::create([
                        'id' => $user->id,
                        'user_id' => $user->id
                    ]);
                }
            }

            echo 'success';
        }
        else {
            echo 'Already exists';
        }

    }
}