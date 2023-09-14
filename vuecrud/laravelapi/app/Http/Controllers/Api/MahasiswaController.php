<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Validator;


class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        if($mahasiswa ->count()>0)
        {
            return response() -> json(
                [
                'status' => 200,
                'mahasiswa' => $mahasiswa
                ], 200);

        }else
            {
                return response() ->json([
                    'status' => 404,
                    'message' => 'No records found'
                ], 404);
            }
        }

        public function store(Request $request)
        {
            $validator = Validator::make($request->all(),
                [
                    'nama' => 'required|string|max:191',
                    'jurusan' => 'required|string|max:191',
                    'email' => 'required|email|max:191',
                    'telefon' => 'required|digits:10',
                ]);

                if($validator->fails())
                {
                    return response() ->json(
                        [
                            'status' => 422,
                            'errors' => $validator->messages()
                        ], 422);
                    }else{
                            $mahasiswa = Mahasiswa:: create([
                                'nama' => $request->nama,
                                'jurusan' => $request->jurusan,
                                'email' => $request->email,
                                'telefon' => $request->telefon, 
                            ]);

                            if($mahasiswa){
                                return response()->json([
                                    'status' => 200,
                                    'message' => "Data mahasiswa berhasil dibuat"
                                ], 200);
                            }
                            else{
                                return response()->json([
                                'status' => 500,
                                'message' => "Ups Ada Kesalahan!!"
                            ], 500);
                            }

                        }
                }

                public function show($id)
                {
                    $mahasiswa = Mahasiswa::find($id);
                    if($mahasiswa){
                        return response()->json([
                            'status' => 200,
                            'mahasiswa' => $mahasiswa
                        ],200);
                        }else{
                            return response()->json([
                                'status' => 404,
                                'message' => "Data Tidak ditemukan!"
                            ],404);
                        }
                    }

                    public function edit($id)
                    {
                        $mahasiswa = Mahasiswa::find($id);
                        if($mahasiswa){
                            return response()->json([
                                'status' => 200,
                                'mahasiswa' => $mahasiswa
                            ],200);
                            }else{
                                return response()->json([
                                    'status' => 404,
                                    'message' => "Data Tidak ditemukan!"
                                ],404);
                            }
                        }

                        public function update(Request $request, int $id)
                        {
                            $validator = Validator::make($request->all(),
                            [
                                'nama' => 'required|string|max:191',
                                'jurusan' => 'required|string|max:191',
                                'email' => 'required|email|max:191',
                                'telefon' => 'required|digits:10',
                            ]);
            
                            if($validator->fails())
                            {
                                return response() ->json(
                                    [
                                        'status' => 422,
                                        'errors' => $validator->messages()
                                    ], 422);
                                }else{
                                    $mahasiswa = Mahasiswa:: find($id);
                                       
            
                                        if($mahasiswa){

                                            $mahasiswa->update([
                                                'nama' => $request->nama,
                                                'jurusan' => $request->jurusan,
                                                'email' => $request->email,
                                                'telefon' => $request->telefon, 
                                            ]);

                                            return response()->json([
                                                'status' => 200,
                                                'message' => "Data mahasiswa berhasil dibuat"
                                            ], 200);
                                        }
                                        else{
                                            return response()->json([
                                            'status' => 404,
                                            'message' => "Data tidak ditemukan!!"
                                        ], 404);
                                        }


            
                                    }
                        }

                        public function destroy($id)
                        {
                            $mahasiswa = Mahasiswa::find($id);
                            if($mahasiswa){
                                    $mahasiswa->delete();
                            } else{
                                return response()->json([
                                    'status' => 404,
                                    'message' => "Data tidak ditemukan!"
                                ], 404);
                            }

                        }

                }