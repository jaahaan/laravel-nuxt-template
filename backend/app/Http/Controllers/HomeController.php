<?php

namespace App\Http\Controllers;
use App\Models\WebsiteBanner;
use App\Models\WebsiteHotDeal;
use App\Models\MainProduct;
use App\Models\Category;
use App\Models\WebsiteArticle;
use App\Models\WebsiteMailingList;
use App\Models\WebsiteMailingListBg;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getConnection()
    {
        return response()->json([
            'success'=> true,
            'data'=>"Backend Connected!!"

        ],200);
    }

    // get auth user
    function authUser(){
        try {
            \Log::info('I am in Auth try');
            $user_id = Auth::user()->id;
            $data = User::where('id', $user_id)->first();
            return $data;
        } catch (\Throwable $th) {
            \Log::info('I am in Auth catch');
            return response()->json([
                'msg'=>'Auth not found'
            ], 401);
        }
    }

   
}
