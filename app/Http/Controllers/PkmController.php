<?php

namespace App\Http\Controllers;

use App\categories;
use App\facultyModel;
use App\userModel;
use App\Http\Controllers\Controller;
use App\PkmModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use SSO\SSO;

class PkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        SSO::authenticate();
        if(SSO::check()) {
            $user = SSO::getUser(); //TODO cek udah ada di database apa belum
            $userDb = userModel::where('username', $user->username)->first();
            if ($userDb) {
                $user->role = $userDb->role;
                Session::put('user', $user);
            }
            else
            return redirect('auth/newUser');
        }
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
        return view('index',['pkm1'=>$pkm1,'pkm2'=>$pkm2,'pkm3'=>$pkm3,'pkm4'=>$pkm4,'pkm5'=>$pkm5,'pkm6'=>$pkm6,'pkm7'=>$pkm7,'userDb'=>$userDb]);
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

        return view("form", ['faculties'=>$faculties, 'categories'=>$categories, 'status'=>$status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

         //dd(Request::file());
        //
        $pkm = new PkmModel;
        //dd(base_path());
        //TODO validasi
        $validator = Validator::make(Input::all(), [
            'title' => 'required',
            'leader' => 'required',
            'year' => 'required|numeric',
            'status' => 'required',
            'category' => 'required',
            'file' => 'required|mimes:pdf',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/pkm/add')
                ->withErrors($validator)
                ->withInput();
        }

        $pkm->title = Input::get('title');
        $pkm->leader = Input::get('leader');
        $pkm->year = Input::get('year');
        $pkm->status = Input::get('status');
        $pkm->category = Input::get('category');
        $pkm->description = Input::get('description');
        $userDb = userModel::where('username', Session::get('user')->username)->first();
        if($userDb->role == 0)
        $userDb->role = 1;
        $userDb->save();
        $pkm->uploader = $userDb->id;
        $pkm->save();
        $file = Request::file('file');

        if($file->move(base_path().'/public/upload/pkm', $pkm->id.'.'.$file->getClientOriginalExtension())){

        }

        return redirect('pkm/view/'.$pkm->id);

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
        return view("indiv",['pkm'=>$pkm, 'userDb'=>$userDb, 'category'=>$category]);
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
            return view("formedit", ['pkm'=>$pkm, 'faculties'=>$faculties, 'categories'=>$categories, 'status'=>$status]);

        }
        else
        {
            echo "not authorized";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $pkm = PkmModel::find($id);

        //TODO jabarin

        $validator = Validator::make(Input::all(), [
        'title' => 'required',
            'leader' => 'required',
            'year' => 'required',
            'status' => 'required',
            'category' => 'required',
            'file' => 'required|mimes:pdf',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/pkm/edit/'.$pkm->id)
                ->withErrors($validator)
                ->withInput();
        }

        $pkm->title = Input::get('title');
        $pkm->leader = Input::get('leader');
        $pkm->year = Input::get('year');
        $pkm->status = Input::get('status');
        $pkm->category = Input::get('category');
        $pkm->description = Input::get('description');
        $pkm->save();
        $file = Request::file('file');

        if($file->move(base_path().'/public/upload/pkm', $pkm->id.'.'.$file->getClientOriginalExtension())){

        }
        $pkm->save();
        return redirect('pkm/view/'.$pkm->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        SSO::authenticate();
        $user = SSO::getUser();
        $userDb = userModel::where('username', $user->username)->first();
        $pkm = PkmModel::find($id);
        if ($userDb->role == 2 )  {
            if ($pkm == null) {
                redirect()->back();
            } else {
                $pkm->delete();
                redirect();
            }
        }
    }

    public function showall()   {
        $results = PkmModel::paginate(10);
        $category = "All";
        $id = 0;
        return view('view',['results'=>$results,'category'=>$category,'id'=>$id]);
    }

    public function search()    {
        $input = Input::get('s');
        $results = PkmModel::where('title', 'like', '%'.$input.'%')
            ->orWhere('leader','like','%'.$input.'%')
            ->orWhere('description','like','%'.$input."%")
            ->paginate(10);
        $category = 'Result';
        $id = -1;
        return view('view',['results'=>$results,'category'=>$category,'id'=>$id,'input'=>$input]);
    }

    public function sort()  {
        $sortby = Input::get('sorter');
        $point = Input::get('point');
        $id = Input::get('id');
        $category = Input::get('category');
        if($id > 0)    {
            $results = PkmModel::where('category','=',$id)
                ->orderBy($sortby,$point)
                ->paginate(10);
        }
        elseif($id = 0) {
            $results = PkmModel::orderBy($sortby,$point)
                ->paginate(10);
        }
        else    {
            $input = Input::get('query');
            $results = PkmModel::where('title', 'like', '%'.$input.'%')
                ->orWhere('leader','like','%'.$input.'%')
                ->orderBy($sortby,$point)
                ->paginate(10);
            $id = -1;
            return view('view',['results'=>$results,'category'=>$category,'id'=>$id,'input'=>$input]);
        }
        return view('view',['results'=>$results,'category'=>$category,'id'=>$id]);
    }

    public function viewCategory($id)   {
        $results = PkmModel::where('category','=',$id)->paginate(10);
        $category=categories::where('id','=',$id)->first();
        $category = $category->name;
        return view('view',['results'=>$results,'category'=>$category,'id'=>$id]);
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
        return view('control_panel',['pkm_uploaded_by_user'=>$pkm_uploaded_by_user,'categories'=>$categories]);
    }

    public function chart() {
        for($i=1;$i<5;$i++) {
            for($j=1;$j<8;$j++)    {
                $arrpkm[$i][$j] = PkmModel::where('category','=',$j)
                        ->where('year','=',$i+2011)
                        ->count();
            }
        }
        for($i=0;$i<4;$i++) {
            $arrstatus[$i] = PkmModel::where('status','=',$i)->count();
        }
        $arrpkm = json_encode($arrpkm);
        return view('chart',['arrpkm'=>$arrpkm,'arrstatus'=>$arrstatus]);
    }
}