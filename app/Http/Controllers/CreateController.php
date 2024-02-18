<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use App\Models\mahasiswa;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
class CreateController extends Controller
{

    public function create(Request $request)
    {
        $data = $request->only('nama', 'nim','ymd');
        $validator = Validator::make($data, [
            'nama' => 'required|string',
            'nim' => 'required',
            'ymd' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $mahasiswa = mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'ymd' => $request->ymd
        ]);

       
        return response()->json([
            'success' => true,
            'message' => 'data berhasil dimasukan',
            'data' => $mahasiswa
        ], Response::HTTP_OK);
    }

    public function updateById(Request $request, mahasiswa $mahasiswa)
    {
        $data = $request->only('nama', 'nim','ymd');
        $validator = Validator::make($data, [
            'nama' => 'required|string',
            'nim' => 'required',
            'ymd' => 'required',
        ]);
       
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        
        $mahasiswa = $mahasiswa->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'ymd' => $request->ymd
        ]);

        return response()->json([
            'success' => true,
            'message' => 'data berhasil diupdate',
            'data' => $mahasiswa
        ], Response::HTTP_OK);

    }


    public function delete(mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'data berhasil didelete'
        ], Response::HTTP_OK);
    }

}
