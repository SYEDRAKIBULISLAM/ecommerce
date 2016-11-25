<?php
/*
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 21-Nov-16
 * Time: 6:44 PM
 */

use Illuminate\Database\Eloquent\Model;

class UserProfileModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'userprofile';

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
    protected $fillable = ['id', 'birth_date', 'gender', 'address', 'profession', 'company_name', 'designation', 'website', 'about', 'image', 'fb', 'tw', 'gplus', 'ln', 'git', 'user_id'];

    public  function user(){
        return $this->hasOne('UserModel', 'id');
    }
}
