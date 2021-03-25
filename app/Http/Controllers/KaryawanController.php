<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Exports\KaryawanExport;
use App\Imports\KaryawanImport;
use Maatwebsite\Excel\Facades\Excel;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Karyawan::get();
        return view("index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addData(Request $request)
    {
        $data = new Karyawan;
        $data->namaKaryawan = $request->namaKaryawan;
        $data->hadirMasuk = $request->hadirMasuk;
        $data->izinMasuk = $request->izinMasuk;
        $data->bolosMasuk = $request->bolosMasuk;
        $data->telatMasuk= $request->telatMasuk;
        $data->save();
        return redirect('/')->with('success', 'Data Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Karyawan::where('id', $id)->first();
        return view('edit', compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateData(Request $request)
    {
        $data = Karyawan::where('id', $request->id)->first();
        $data->namaKaryawan = $request->namaKaryawan;
        $data->hadirMasuk = $request->hadirMasuk;
        $data->izinMasuk = $request->izinMasuk;
        $data->bolosMasuk = $request->bolosMasuk;
        $data->telatMasuk= $request->telatMasuk;
        $data->save();
        return redirect('/')->with('success', 'Data Edited Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteData($id)
    {
        $data = Karyawan::where('id', $id)->delete();
        return redirect('/')->with("success", 'Data Deleted Successfully');
    }

    public function karyawanExport()
    {
        return Excel::download(new KaryawanExport, "karyawan.xlsx");
    }

    public function karyawanImport(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataKaryawan', $namaFile);

        Excel::import(new KaryawanImport, public_path('/DataKaryawan/'.$namaFile));
        return redirect('/')->with("success", 'Data Imported Successfully');;
    }
}
