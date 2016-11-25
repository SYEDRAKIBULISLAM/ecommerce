<?php
/*
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 15-Nov-16
 * Time: 7:51 PM
 */

class Category_4 extends AdminController
{
    public function index()
    {
        $category4 = Category4Model::all();

        $this->view('admin/master_data/category/category_2/category_3/category_4/index', ['category4' => $category4]);
    }
    public function create()
    {
        $categories3 = Category3Model::orderBy('name')->get();
        $this->view('admin/master_data/category/category_2/category_3/category_4/create', ['categories3' => $categories3]);
    }
    public function store()
    {
        include_once ('functions/RootURL.php');
        include_once ('functions/RedirectURL.php');
        if (isset($_POST['submit']))
        {
            $category4 = Category4Model::create([
                'name' => $_POST['name'],
                'category_3_id' => $_POST['category_3_id'],
                'user_id' => $_POST['user_id']
            ]);
            if ($category4)
            {
                $urlPath = root() . '/admin/master_data/category/category_2/category_3/category_4';
                redirect($urlPath);
            }
        }
        else
        {
            $urlPath = root() . '/admin/master_data/category/category_2/category_3/category_4/create';
            redirect($urlPath);
        }
    }
    public function edit($id = '')
    {
        $categories3 = Category3Model::all();
        $category4 = Category4Model::find($id);
        if (isset($category4))
        {
            $this->view('admin/master_data/category/category_2/category_3/category_4/edit', ['category4' => $category4, 'categories3' => $categories3]);
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
        $category4 = Category4Model::find($id);
        if (isset($category4))
        {
            if (isset($_POST['submit']))
            {
                $category4->update(array('name' => $_POST['name'], 'category_3_id' => $_POST['category_3_id'], 'user_id' => $_POST['user_id']));
                $urlPath = root() . '/admin/master_data/category/category_2/category_3/category_4';
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
        $category4 = Category4Model::find($id);
        if (isset($category4))
        {
            $category4->delete();
        }
        else
        {
            echo 'not found';
        }
    }
}