<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    //中间件
	protected $fillable = ['name', 'email', 'is_admin',
				'password', 'sex', 'phone', 'pro_class'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * grades表中的每行数据都有对应的一个用户
	 * @return [type] [description]
	 */
	public function grade()
	{
		return $this->hasOne('App\Grade');
	}

	/**
	 * 登录验证规则
	 * @return [type] [description]
	 */
	protected static function rules()
	{
		return [
			'id' => 'required|digits:10',
            'password' => 'required'
            ];
	}

}
