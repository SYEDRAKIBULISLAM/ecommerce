<?php
/*
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 15-Nov-16
 * Time: 7:20 PM
 */

class Category_3 extends AdminController
{
    public function index()
    {
        $category3 = Category3Model::all();

        $this->view('admin/master_data/category/category_2/category_3/index', ['category3' => $category3]);
    }
    public function create()
    {
        $categories2 = Category2Model::orderBy('name')->get();
        $this->view('admin/master_data/category/category_2/category_3/create', ['categories2' => $categories2]);
    }
    public function store()
    {
        include_once ('functions/RootURL.php');
        include_once ('functions/RedirectURL.php');
        if (isset($_POST['submit']))
        {
            $category3 = Category3Model::create([
                'name' => $_POST['name'],
                'category_2_id' => $_POST['category_2_id'],
                'user_id' => $_POST['user_id']
            ]);
            if ($category3)
            {
                $urlPath = root() . '/admin/master_data/category/category_2/category_3';
                redirect($urlPath);
            }
        }
        else
        {
            $urlPath = root() . '/admin/master_data/category/category_2/category_3/create';
            redirect($urlPath);
        }
    }
    public function edit($id = '')
    {
        $categories2 = Category2Model::all();
        $category3 = Category3Model::find($id);
        if (isset($category3))
        {
            $this->view('admin/master_data/category/category_2/category_3/edit', ['category3' => $category3, 'categories2' => $categories2]);
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
        $category3 = Category3Model::find($id);
        if (isset($category3))
        {
            if (isset($_POST['submit']))
            {
                $category3->update(array('name' => $_POST['name'], 'category_2_id' => $_POST['category_2_id'], 'user_id' => $_POST['user_id']));
                $urlPath = root() . '/admin/master_data/category/category_2/category_3';
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
        $category3 = Category3Model::find($id);
        if (isset($category3))
        {
            $category3->delete();
        }
        else
        {
            echo 'not found';
        }
    }
}