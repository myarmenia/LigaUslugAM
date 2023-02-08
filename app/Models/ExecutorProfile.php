<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecutorProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total_reiting',
        'executor_review_count',
        'balance',
        'region',
        'country_name',
        'address',

    ];
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function executor_profile_work_experiences(){
        return $this->HasMany(ExecutorProfileWorkExperience::class);
    }

    public function executor_working_regions(){
        return $this->HasMany(ExecutorWorkingRegion::class);
    }
    public function executor_portfolios(){
        return $this->HasMany(ExecutorPortfolio::class);
    }
    public function executor_portfolio_links(){
        return $this->HasMany(ExecutorPortfolioLink::class);
    }
    public function  executor_educations(){
        return $this->HasMany(ExecutorEducation::class);
    }
    public function  executor_education_certificates(){
        return $this->HasMany(ExecutorEducationCertificate::class);
    }
    public function reiting(){
        return $this->HasMany(Reiting::class, 'executor_profile_id');
    }

    public function click_on_tasks(){
        return $this->HasMany(ClickOnTask::class,'executor_profile_id');
    }
    public function executor_categories(){
        return $this->hasMany(ExecutorCategory::class);
    }
    public function executor_subcategories(){
        return $this->hasMany(ExecutorSubcategory::class);
    }
    public function transaction_apis(){
        return $this->hasMany(TransactionApi::class);
    }
    public  function chats(){
        return $this->hasMany(Chat::class);
    }
    public  function special_task_executors(){
        return $this->hasMany(specialTaskExecutor::class);
    }
    // public  function special_task_executors(){
    //     return $this->belongsTo(specialTaskExecutor::class,'executor_id');
    // }


}
