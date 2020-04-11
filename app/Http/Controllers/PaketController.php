<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;
use App\Paket;
use Yajra\DataTables\Datatables;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlet = Outlet::orderBy('nama','DESC')->get();

        return view('admin.paket.index', compact('outlet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Paket::where('id_outlet',$request->id_outlet)->where('jenis', $request->jenis)->exists()) {
            return redirect()->back()->with('sudahada','');
        } else {
             $jquin = [
                'id_outlet' => $request->id_outlet,
                'nama_paket' => $request->nama_paket,
                'jenis' => $request->jenis,
                'harga' => $request->harga,
            ];

             Paket::create($jquin);
 
             return redirect()->back()->with('sukses','');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jquin = Outlet::where('id', $id)->first();

        return view('admin.paket.detail_paket', compact('jquin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paket = Paket::findOrFail($id);

        return $paket;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paket = Paket::find($id);
         $jquin = [
            'nama_paket' => $request->nama_paket,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
        ];

        $paket->update($jquin);

        return $paket;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paket::destroy($id);
    }

    // JSON
    public function json()
    {
        $outlet = Outlet::latest()->get();

        return Datatables::of($outlet)
            ->addColumn('jml_paket', function ($jquin)
            {
                $jmlPaket = Paket::where('id_outlet', $jquin->id)->count();
                return $jmlPaket.' Paket';
            })
            ->addColumn('opsi', function($jquin)
            {
                return '<a href="/paket/'.$jquin->id.'" class="btn btn-sm btn-info">Detail</a> &nbsp;';
            })
            ->rawColumns(['opsi','jml_paket'])
            ->addIndexColumn() // Tambah no ++
            ->removeColumn('id','alamat') // Hapus field
            ->toJson();
    }

    public function jsonFilter($idOutlet)
    {
        $paket = Paket::where('id_outlet', $idOutlet)->get();

        return Datatables::of($paket)
            ->addColumn('opsi', function($jquin)
            {
                return '<a href="#" onclick="update('. $jquin->id .');" title="Edit Data"; class="invoice-action-view mr-1"><i class="icon-pencil"></i></a>&nbsp;&nbsp;'.
                    '<a href="#" onclick="destroy('. $jquin->id .');" title="Hapus Data"; class="invoice-action-view mr-1"><i class="icon-trash"></i></a>&nbsp;';
            })
            ->rawColumns(['opsi'])
            ->addIndexColumn() // Tambah no ++
            ->removeColumn('id') // Hapus field
            ->toJson();
    }
}
