<?php
/**
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 12-Nov-16
 * Time: 3:57 PM
 */

use Illuminate\Database\Eloquent\Model;

class Category4Model extends Model{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category_4';

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
    protected $fillable = ['name', 'category_3_id', 'user_id'];

    public  function category3(){
        return $this->belongsTo('Category3Model', 'category_3_id');
    }

}