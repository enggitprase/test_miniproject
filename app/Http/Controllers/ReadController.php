<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
class ReadController extends Controller
{
    
    public function index()
    {
        $posts = mahasiswa::get();
        return $posts;
    }
    public function GetByNim($nim)
    {
        $mahasiswa = mahasiswa::where( 'nim','=',$nim )->get();
    
        if ($mahasiswa == '[]') {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, nim not found.'
            ], 400);
        }
            return $mahasiswa;
        
       
    }
    public function GetByNama($nama)
    {
        $mahasiswa = mahasiswa::where( 'nama','=',$nama )->get();
    
        if ($mahasiswa == '[]') {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, nama not found.'
            ], 400);
        }
    
        return $mahasiswa;
    }

    public function GetByYmd($ymd)
    {
        $mahasiswa = mahasiswa::where( 'ymd','=',$ymd )->get();
    
        if ($mahasiswa == '[]') {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, ymd  not found.'
            ], 400);
        }
    
        return $mahasiswa;
    }

}
