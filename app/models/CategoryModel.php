<?php
/**
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 12-Nov-16
 * Time: 3:37 PM
 */

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id'];

    public  function category_2(){
        return $this->hasMany('Category2Model', 'id');
    }
}