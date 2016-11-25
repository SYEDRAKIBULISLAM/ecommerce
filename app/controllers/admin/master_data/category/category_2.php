<?php
/*
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 15-Nov-16
 * Time: 5:27 PM
 */



class Category_2 extends AdminController
{
    public function index()
    {
        $category2 = Category2Model::all();

        $this->view('admin/master_data/category/category_2/index', ['category2' => $category2]);
    }
    public function create()
    {
        $categories = CategoryModel::orderBy('name')->get();
        $this->view('admin/master_data/category/category_2/create', ['categories' => $categories]);
    }
    public function store()
    {
        include_once ('functions/RootURL.php');
        include_once ('functions/RedirectURL.php');
        if (isset($_POST['submit']))
        {
            $category2 = Category2Model::create([
                'name' => $_POST['name'],
                'category_id' => $_POST['category_id'],
                'user_id' => $_POST['user_id']
            ]);
            if ($category2)
            {
                $urlPath = root() . '/admin/master_data/category/category_2/';
                redirect($urlPath);
            }
        }
        else
        {
            $urlPath = root() . '/admin/master_data/category/category_2/create';
            redirect($urlPath);
        }
    }
    public function edit($id = '')
    {
        $categories = CategoryModel::all();
        $category2 = Category2Model::find($id);
        if (isset($category2))
        {
            $this->view('admin/master_data/category/category_2/edit', ['category2' => $category2, 'categories' => $categories]);
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
        $category2 = Category2Model::find($id);
        if (isset($category2))
        {
            if (isset($_POST['submit']))
            {
                $category2->update(array('name' => $_POST['name'], 'category_id' => $_POST['category_id'], 'user_id' => $_POST['user_id']));
                $urlPath = root() . '/admin/master_data/category/category_2';
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
        $category2 = Category2Model::find($id);
        if (isset($category2))
        {
            $category2->delete();
        }
        else
        {
            echo 'not found';
        }
    }
}