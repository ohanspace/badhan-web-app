<?php
namespace App\Accounts;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Core\Entity;
use McCool\LaravelAutoPresenter\HasPresenter;

class User extends Entity implements AuthenticatableContract, CanResetPasswordContract, HasPresenter
{
    use Authenticatable, CanResetPassword, SoftDeletes;

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
    protected $fillable = ['telephone', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $validationRules = [
        'github_id' => 'unique:users,github_id,<id>',
        'email' => 'required|email|unique:users,email,<id>',
        'name' => 'required|alpha_num|unique:users,name,<id>',
    ];


    /**
     * @return bool
     */
    public function isConfirmed()
    {
        return (bool) $this->confirmed;
    }

    /**
     * @return bool
     */
    public function isBanned()
    {
        return (bool) $this->is_banned;
    }

    /**
     * Get the presenter class.
     *
     * @return string
     */
    public function getPresenterClass()
    {
        return UserPresenter::class;
    }
}
