<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ExecutorProfile;
use App\Models\Reiting;
use App\Models\User;

class HeaderController extends Controller
{
    public function index()
    {
        // getting all categories and subcategories and executor rating

        $category = Category::with('subcategories')->get(['id','category_name','path','logo_name']);
        $our_checked_specialists=ExecutorProfile::with('users')->orderBy('total_reiting','desc')->limit(3)->get(['id','user_id','total_reiting','executor_review_count']);

        $response=['category'=>$category,'our_checked_specialists'=>$our_checked_specialists];
                    return response()->json($response);

    }

}
