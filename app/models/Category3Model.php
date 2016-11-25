<?php
/**
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 12-Nov-16
 * Time: 3:54 PM
 */

use Illuminate\Database\Eloquent\Model;

class Category3Model extends Model{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category_3';

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
    protected $fillable = ['name', 'category_2_id', 'user_id'];

    public  function category_4(){
        return $this->hasMany('Category4Model', 'id');
    }
    public  function category2(){
        return $this->belongsTo('Category2Model', 'category_2_id');
    }
}