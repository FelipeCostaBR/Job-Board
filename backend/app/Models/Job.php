<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Job extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    public $timestamps = false;

    // $jobs = Job::where('active', 1)
    //            ->orderBy('title')
    //            ->take(10)
    //            ->get();

    //            foreach ($jobs as $job) {
    //             echo $job->title;
    //         }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'date', 'location', 'applicants'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     * protected $hidden = [
     *  'password',
     * ];
     */
    
}
