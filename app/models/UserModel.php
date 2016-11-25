<?php
/**
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 02-Nov-16
 * Time: 2:16 PM
 */



use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
    protected $fillable = ['name', 'username', 'email', 'password', 'contact'];

    public  function admin(){
        return $this->hasOne('AdminModel', 'id');
    }
    public  function userProfile(){
        return $this->hasOne('UserProfileModel', 'id');
    }
}
