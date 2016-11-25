<?php
/*
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 05-Nov-16
 * Time: 1:33 PM
 */

use Illuminate\Database\Eloquent\Model;

class SuperModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'supers';

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
    protected $fillable = ['id', 'user_id'];

}
