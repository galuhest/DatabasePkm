<?php

namespace App\Http\Controllers;

use App\PkmModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ResponseController extends Controller
{
    public function res()
    {
        $pkm = PkmModel::all();
        return response()->json(['pkm'=>$pkm]);
    }

    public function index()
    {
        SSO::authenticate();
        $userDb = userModel::where('username', SSO::getUser()->username)->first();
        $pkm1 = PkmModel::where('category','=',1)
            ->orderBy('updated_at','desc')
            ->take(5)
            ->get();
        $pkm2 = PkmModel::where('category','=',2)
            ->orderBy('updated_at','desc')
            ->take(5)
            ->get();
        $pkm3 = PkmModel::where('category','=',3)
            ->orderBy('updated_at','desc')
            ->take(5)
            ->get();
        $pkm4 = PkmModel::where('category','=',4)
            ->orderBy('updated_at','desc')
            ->take(5)
            ->get();
        $pkm5 = PkmModel::where('category','=',5)
            ->orderBy('updated_at','desc')
            ->take(5)
            ->get();
        $pkm6 = PkmModel::where('category','=',6)
            ->orderBy('updated_at','desc')
            ->take(5)
            ->get();
        $pkm7 = PkmModel::where('category','=',7)
            ->orderBy('updated_at','desc')
            ->take(5)
            ->get();
        return response()->json(['pkm1'=>$pkm1,'pkm2'=>$pkm2,'pkm3'=>$pkm3,'pkm4'=>$pkm4,'pkm5'=>$pkm5,'pkm6'=>$pkm6,'pkm7'=>$pkm7,'userDb'=>$userDb]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        SSO::authenticate();
        $faculties = facultyModel::all();
        $categories = categories::all();
        $status = ["Tidak didanai", "Didanai", "Finalis", "Juara"];

        return response()->json(['faculties'=>$faculties, 'categories'=>$categories, 'status'=>$status]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        SSO::authenticate();
        $user = SSO::getUser();
        $userDb = userModel::where('username', $user->username)->first();
        $pkm = PkmModel::find($id);
        $category = categories::where('id','=',$pkm->category)->first();
        return response()->json(['pkm'=>$pkm, 'userDb'=>$userDb, 'category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        SSO::authenticate();
        $user = SSO::getUser();
        $userDb = userModel::where('username', $user->username)->first();
        $pkm = PkmModel::find($id);
        if($pkm->uploader == $userDb->id || $userDb->role == 2)
        {
            $faculties = facultyModel::all();
            $categories = categories::all();
            $status = ["Tidak didanai", "Didanai", "Finalis", "Juara"];
            //dd($categories );
            //TODO complete it
            return response()->json(['pkm'=>$pkm, 'faculties'=>$faculties, 'categories'=>$categories, 'status'=>$status]);

        }
        else
        {
            echo "not authorized";
        }
    }

    public function showall()   {
        $results = PkmModel::paginate(10);
        $category = "All";
        $id = 0;
        return response()->json(['results'=>$results,'category'=>$category,'id'=>$id]);
    }

    public function search()    {
        $input = Input::get('s');
        $results = PkmModel::where('title', 'like', '%'.$input.'%')
            ->orWhere('leader','like','%'.$input.'%')
            ->orWhere('definition','like','%'.$input."%")
            ->paginate(10);
        $category = 'Result';
        $id = -1;
        return response()->json(['results'=>$results,'category'=>$category,'id'=>$id]);
    }

    public function sort()  {
        $sortby = Input::get('sorter');
        $point = Input::get('point');
        $id = Input::get('id');
        $category = Input::get('category');
        if($id <> 0)    {
            $results = PkmModel::where('category','=',$id)
                ->orderBy($sortby,$point)
                ->paginate(10);
        }
        elseif($id = 0) {
            $results = PkmModel::orderBy($sortby,$point)
                ->paginate(10);
        }
        else    {
            $results = PkmModel::orderBy($sortby,$point)
                ->paginate(10);
        }
        return response()->json(['results'=>$results,'category'=>$category,'id'=>$id]);
    }

    public function viewCategory($id)   {
        $results = PkmModel::where('category','=',$id)->paginate(10);
        $category=categories::where('id','=',$id)->first();
        $category = $category->name;
        return response()->json(['results'=>$results,'category'=>$category,'id'=>$id]);
    }

    public function uploaded($id)  {
        SSO::authenticate();
        $user = SSO::getUser();
        $categories = categories::all();
        if(userModel::find($id)->role == 2) {
            $pkm_uploaded_by_user = PkmModel::orderby('updated_at','desc')->paginate(9);
        }
        elseif(userModel::find($id)->username == $user->username)   {
            $pkm_uploaded_by_user = PkmModel::where('uploader','=',$id)
                ->orderby('updated_at','desc')
                ->paginate(10);
        }
        else{
            echo "not authorized";
        }
        return response()->json(['pkm_uploaded_by_user'=>$pkm_uploaded_by_user,'categories'=>$categories]);
    }

    public function chart() {
        for($i=1;$i<5;$i++) {
            for($j=1;$j<8;$j++)    {
                $arrpkm[$i][$j] = PkmModel::where('category','=',$j)
                    ->where('year','=',$i+2011)
                    ->count();
            }
        }
        $arrpkm = json_encode($arrpkm);

        return response()->json(['arrpkm'=>$arrpkm]);
    }
}
