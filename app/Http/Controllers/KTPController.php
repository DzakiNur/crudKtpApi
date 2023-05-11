<?php

namespace App\Http\Controllers;

use App\Models\KTP;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;

class KTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduk = KTP::all();

        if($penduduk) {
            return ApiFormatter::createApi(200, 'success', $penduduk);
        }else{
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nik' => 'required',
                'nama' => 'required',
                'rombel' => 'required',
                'rayon' => 'required',
            ]);

            $siswa = Siswa::create([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'rombel' => $request->rombel,
                'rayon' => $request->rayon,
            ]);

            $getDataSaved = Siswa::where('id', $siswa->id)->first();

            if($getDataSaved) {
                return ApiFormatter::createApi(200, 'success', $getDataSaved);
            }else{
                return ApiFormatter::createApi(400, 'failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'failed', $error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KTP  $kTP
     * @return \Illuminate\Http\Response
     */
    public function show(KTP $kTP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KTP  $kTP
     * @return \Illuminate\Http\Response
     */
    public function edit(KTP $kTP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KTP  $kTP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KTP $kTP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KTP  $kTP
     * @return \Illuminate\Http\Response
     */
    public function destroy(KTP $kTP)
    {
        //
    }
}
