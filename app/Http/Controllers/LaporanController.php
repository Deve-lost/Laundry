<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Outlet;
use Yajra\DataTables\Datatables;
use DB;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('q')) {
            $laporan = Transaksi::orderBy('tgl','DESC')->get();
            
            if ($request->q) {
                $laporan = $laporan->where('tgl', '>=', $request->q);
            }

            // if ($request->s) {
            //     $laporan = $laporan->where('batas_waktu', '<=', $request->s);
            // }

            if ($request->o) {
                if ($request->o != 'Semua') {
                    $laporan = $laporan->where('id_outlet', $request->o);
                } else {
                    $o = $laporan;
                }
            }

            if ($request->st) {
                if ($request->st != 'Semua') {
                    $st = $request->st;
                    $laporan = $laporan->where('status', $request->st);
                } else {
                    $st = $laporan;
                }
            }
        } else {
            if (auth()->user()->role != 'admin') {
                $laporan = Transaksi::where('status','diambil')->where('id_user', auth()->user()->id)->orderBy('tgl','DESC')->get();
            } else {
                $laporan = Transaksi::where('status','diambil')->orderBy('tgl','DESC')->get();
            }
        }

        $outlet = Outlet::orderBy('nama','ASC')->get();

        return view('laporan.index', compact('laporan','outlet'));
    }

    // Export
    public function exportExcel() 
    {
        $hari = date('d ');
        $bulanArray = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
        );

        $bulan = $bulanArray[date('m')];
        $tahun = date(' Y');
        
        return Excel::download(new LaporanExport, 'Laporan Laundry '.$hari.$bulan.$tahun.'.xlsx');
    }

    public function exportPdf()
    {
        $laporan = Transaksi::orderBy('tgl','DESC')->where('status','diambil')->get();

        $hari = date('d ');
        $bulanArray = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
        );

        $bulan = $bulanArray[date('m')];
        $tahun = date(' Y');

        $pdf = PDF::loadView('laporan.pdf', ['jquin' => $laporan])->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->download('Laporan Laundry '.$hari.$bulan.$tahun.'.pdf');
    }
}
