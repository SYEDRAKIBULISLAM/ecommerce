<?php
/*
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 11-Nov-16
 * Time: 7:05 PM
 */
//use Illuminate\Support\Facades\Validator;

class Category extends AdminController
{

    public function index()
    {
        $category = CategoryModel::all();

        $this->view('admin/master_data/category/index', ['category' => $category]);
    }
    public function create()
    {
        $this->view('admin/master_data/category/create', []);
    }
    public function store()
    {
        include_once ('functions/RootURL.php');
        include_once ('functions/RedirectURL.php');
        if (isset($_POST['submit']))
        {
//            $validator = Validator::make(
//                array(
//                    $_POST['name'] => 'required|min:3|unique'
//                )
//            );
//            if ($validator->fails())
//            {
//                // The given data did not pass validation
//            }
//            else
//            {
                $category = CategoryModel::create([
                    'name' => $_POST['name'],
                    'user_id' => $_POST['user_id']
                ]);
                if ($category)
                {
                    $urlPath = root() . '/admin/master_data/category/';
                    redirect($urlPath);
                }
//            }
        }
        else
        {
            $urlPath = root() . '/admin/master_data/category/create';
            redirect($urlPath);
        }


//        $this->view('admin/master_data/category/category/create', []);
//
//        include_once (__DIR__ . '/../../../functions/RootURL.php');
//        include_once (__DIR__ . '/../../../functions/RedirectURL.php');
//
//        $urlPath = root() . '/admin/master_data/category/';
//        redirect($urlPath);
    }
    public function edit($id = '')
    {
        $category = CategoryModel::find($id);
        if (isset($category))
        {
            $this->view('admin/master_data/category/edit', ['category' => $category]);
        }
        else
        {
            $this->view('admin/errors/404');
        }
    }
    public function update($id = '')
    {
        include_once ('functions/RootURL.php');
        include_once ('functions/RedirectURL.php');
        $category = CategoryModel::find($id);
        if (isset($category))
        {
            if (isset($_POST['submit']))
            {
                $category->update(array('name' => $_POST['name'], 'user_id' => $_POST['user_id']));
                $urlPath = root() . '/admin/master_data/category/';
                redirect($urlPath);
            }
            else
            {
                $this->view('admin/errors/404');
            }
        }
        else
        {
            $this->view('admin/errors/404');
        }
    }
    public function destroy($id = '')
    {
        $category = CategoryModel::find($id);
        if (isset($category))
        {
            $category->delete();
        }
        else
        {
            echo 'not found';
        }
    }
}