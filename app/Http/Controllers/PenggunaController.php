<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaksi;
use App\Outlet_User;
use Yajra\DataTables\Datatables;
use DB;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengguna.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'role' =>  'required'
        ]);

        $jquin = [
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ];

        $pengguna = User::create($jquin);

        return $pengguna;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengguna = User::find($id);

        return $pengguna;
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
        $pengguna = User::find($id);
        $jquin = [
            'nama' => $request->nama,
            'username' => $request->username,
            'role' => $request->role
        ];

        $pengguna->update($jquin);

        return $pengguna;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
    }

    // Profile
    public function profile($id)
    {
        $pengguna = User::findOrFail($id);
        // Count
        $totalOutlet = Outlet_User::where('id_user', $id)->count();
        $totalTransaksi = Transaksi::where('id_user', $id)->count();
        $outlet = DB::table('outlet_user')
            ->join('tb_outlet', 'tb_outlet.id', '=', 'outlet_user.id_outlet')
            ->select('outlet_user.id_user','tb_outlet.*')
            ->where('id_user', $id)
            ->get();

        return view('admin.pengguna.profile', compact('totalOutlet','totalTransaksi','outlet'), ['jquin' => $pengguna]);
    }

    // JSON
    public function json()
    {
        $user = User::latest()->get();

        return Datatables::of($user)
            ->addColumn('nama_lengkap', function($jquin)
            {
                return '<a href="/pengguna/'.$jquin->id.'/profile" target="_blank" title="Profil Pengguna">'.$jquin->nama.'</a>';
            })
            ->addColumn('opsi', function($jquin)
            {
                return '<a href="#" onclick="update('. $jquin->id .');" title="Edit Data"; class="invoice-action-view mr-1"><i class="icon-pencil"></i></a>&nbsp;&nbsp;'.
                        '<a href="#" onclick="destroy('. $jquin->id .');" title="Hapus Data"; class="invoice-action-view mr-1"><i class="icon-trash"></i></a>&nbsp;';
            })
            ->rawColumns(['opsi','nama_lengkap'])
            ->addIndexColumn() // Tambah no ++
            ->removeColumn('id','nama') // Hapus field
            ->toJson();
    }

    // Update Password
    public function updatepw(Request $request, $id)
    {
        $jquin = [
            'password' => bcrypt($request->password),
        ];

        $user = User::where('id', $id)->update($jquin);

        return redirect()->back()->with('suksespw','');
    }
}
