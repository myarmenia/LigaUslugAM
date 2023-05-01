<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Passport\HasApiTokens;
use Glorand\Model\Settings\Traits\HasSettingsTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements MustVerifyEmail
{

    use HasApiTokens, HasFactory, Notifiable, HasSettingsTable,HasRoles,HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'phonenumber',
    ];

// ----------------------------
    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function executor_profiles(){
        return $this->hasOne(ExecutorProfile::class);
    }

    public function supports(){
        return $this->hasMany(Support::class);
    }
    public function chats(){
        return $this->hasMany(Chat::class);
    }



        public const NEW = 'new';
        public const COMPLETED = 'completed';

        public function  settings_array(){
            return $array = array (
                 'img_path' => 0,
                   'gender' => 0,
               'birth_date' => 0,
                 'about_me' => 0,
             'phone_status' => 0,
            'fasebook_link' => 0,
           'instagram_link' => 0,
                   'region' => 0,
                  'address' => 0,
      'executorwork_region' => 0,
            'category_name' => 0,
         'subcategory_name' => 0,
            'working_place' => 0,
            'portfolio_pic' => 0,
           'education_type' => 0,
          'education_place' => 0,
              'certificate' => 0,
            );
        }
// making settings for users, for that we install glorand laravel package, and then checking if i there any data in settings column  if not we apply
        public function user_settings(){
                $user = Auth::user();

            $settings = $user->settings()->get();
// dd($settings);
            if(!$settings){
                $settings = User::settings_array();
            }
            // dd( $settings);
            return $settings;
        }


        public function  isAdmin(){

            foreach($this->roles()->get() as $role)
            {
                if($role->name){
                    return true;
                }
            }
            return false;

        }

        public function reitings(){
            return $this->hasMany(Reiting::class);
        }

// --------------------------------





    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//     public function sendPasswordResetNotification($token)
// {
//     $this->notify(new \App\Notifications\MailResetPasswordNotification($token));
// }
}
