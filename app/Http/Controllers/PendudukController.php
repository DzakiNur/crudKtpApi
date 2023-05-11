<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduk = Penduduk::all();

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
                'tmptlahir' => 'required',
                'tgllahir' => 'required',
                'jk' => 'required',
                'darah' => 'required',
                'alamat' => 'required',
                'rt' => 'required',
                'rw' => 'required',
                'desa' => 'required',
                'propinsi' => 'required',
                'kecamatan' => 'required',
                'agama' => 'required',
                'status' => 'required',
                'pekerjaan' => 'required',
                'wrgnegara' => 'required',
            ]);

            $penduduk = Penduduk::create([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'tmptlahir' => $request->tmptlahir,
                'tgllahir' => $request->tgllahir,
                'jk' => $request->jk,
                'darah' => $request->jk,
                'alamat' => $request->alamat,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'desa' => $request->desa,
                'propinsi' => $request->propinsi,
                'kecamatan' => $request->kecamatan,
                'agama' => $request->agama,
                'status' => $request->status,
                'pekerjaan' => $request->pekerjaan,
                'wrgnegara' => $request->wrgnegara,
            ]);

            $getDataSaved = Penduduk::where('id', $penduduk->id)->first();

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
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $pendudukDetail = Penduduk::where('id', $id)->first();
            
            if ($pendudukDetail) {
                return ApiFormatter::createApi(200, 'success', $pendudukDetail);
            }else{
                return ApiFormatter::createApi(400, 'failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'failed', $error);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $penduduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nik' => 'required',
                'nama' => 'required',
                'tmptlahir' => 'required',
                'tgllahir' => 'required',
                'jk' => 'required',
                'darah' => 'required',
                'alamat' => 'required',
                'rt' => 'required',
                'rw' => 'required',
                'desa' => 'required',
                'propinsi' => 'required',
                'kecamatan' => 'required',
                'agama' => 'required',
                'status' => 'required',
                'pekerjaan' => 'required',
                'wrgnegara' => 'required',
            ]);

            $penduduk = Penduduk::findOrFail($id);

            $penduduk->update([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'tmptlahir' => $request->tmptlahir,
                'tgllahir' => $request->tgllahir,
                'jk' => $request->jk,
                'darah' => $request->jk,
                'alamat' => $request->alamat,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'desa' => $request->desa,
                'propinsi' => $request->propinsi,
                'kecamatan' => $request->kecamatan,
                'agama' => $request->agama,
                'status' => $request->status,
                'pekerjaan' => $request->pekerjaan,
                'wrgnegara' => $request->wrgnegara,
            ]);

            $updatedPenduduk = Penduduk::where('id', $penduduk->id)->first();

            if ($updatedPenduduk) {
                return ApiFormatter::createApi(200, 'success', $updatedPenduduk);
            }else{
                return ApiFormatter::createApi(400, 'failed');
            }
            
        }catch(Exception $error) {
            return ApiFormatter::createApi(400, 'failed', $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $penduduk = Penduduk::findOrFail($id);
            $proses = $penduduk->delete();

            if ($proses) {
                return ApiFormatter::createApi(200, 'success delete data!');
            }else{
                return ApiFormatter::createApi(400, 'failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'failed', $error);
        }
    }


    public function createToken() {
        return csrf_token();
    }
}
