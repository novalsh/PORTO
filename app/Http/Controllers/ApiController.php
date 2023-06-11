<?php

namespace App\Http\Controllers;

use App\Http\Request\AddPortofolioRequest;
use App\Http\Request\UpdatePortofolioRequest;
use App\Http\Request\DeletePortofolioRequest;
use App\Models\portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;


class ApiController extends Controller
{

    public function login(Request $request) 
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //get credentials from request
        $credentials = $request->only('email', 'password');

        //if auth failed
        if(!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah'
            ], 401);
        }

        //if auth success
        return response()->json([
            'success' => true,
            'user'    => auth()->guard('api')->user(),    
            'token'   => $token   
        ], 200);
    }


    public function logout()
    {
        //remove token
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        if($removeToken) {
            //return response JSON
            return response()->json([
                'success' => true,
                'message' => 'Logout Berhasil!',  
            ]);
        }
    }

   
    public function index()
    {
        $data = Portofolio::all();

        return response($data);
    }

    public function store(Request $request)
    {
        $request->validate([
          'photo' => 'required',
            'nama' => 'required',
            'description' => 'required',
        ]);

        $imageName = $request->file('photo')->store('upload', ['disk' => 'public']);

            $datas = new portofolio;
            $datas->id_category = $request->id_category;
            $datas->photo ='/storage/' . $imageName;
            $datas->nama = $request->nama;
            $datas->description = $request->description;
            $datas->save();
            return response('add data success');
    }

    public function update(Request $request, string $id)
    {
        $datas = portofolio::find($id);
        
        $request->validate([
            'nama' => 'required',
            'description' => 'required',
          ]);
  

              $datas->nama = $request->nama;
              $datas->description = $request->description;
              $datas->save();
  
              return response('update data success');
        
    }

    public function destroy(string $id)
    {
        $data = portofolio::findOrFail($id);
        $data->delete();
        return response('delete data success');
    }
}
