@extends('layouts.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/app-invoice.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/toastr.css')}}">
@stop

@section('title')
	Detail Transaksi INV-
@stop

@section('content')
<section class="app-invoice-wrapper">
    <div class="row">
        <div class="col-xl-9 col-md-8 col-12 printable-content">
            <!-- using a bootstrap card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body p-2">
                    <!-- card-header -->
                    <div class="card-header px-0">
                        <div class="row">
                            <div class="col-md-12 col-lg-7 col-xl-4 mb-50">
                                <span class="invoice-id font-weight-bold">Invoice# </span>
                                <span>{{ $jquin->kode_invoice }}</span>
                            </div>
                            <div class="col-md-12 col-lg-5 col-xl-8">
                                <div class="d-flex align-items-center justify-content-end justify-content-xs-start">
                                    <div class="issue-date pr-2">
                                        <span class="font-weight-bold no-wrap">Tanggal Masuk: </span>
                                        <span>{{ date('d/m/Y', strtotime($jquin->tgl)) }}</span>
                                    </div>
                                    <div class="due-date">
                                        <span class="font-weight-bold no-wrap">Batas Waktu Pengambilan: </span>
                                        <span>{{ date('d/m/Y', strtotime($jquin->batas_waktu)) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <!-- invoice address and contacts -->
                    <div class="row invoice-adress-info py-2">
                        <div class="col-6 mt-1 from-info">
                            <div class="info-title mb-1">
                                <span>Outlet</span>
                            </div>
                            <div class="company-name mb-1">
                                <span class="text-muted">{{ $jquin->outlet->nama }}</span>
                            </div>
                            <div class="company-address mb-1">
                                <span class="text-muted">{{ $jquin->outlet->alamat }}</span>
                            </div>
                            <div class="company-phone  mb-1">
                                <span class="text-muted">{{ $jquin->outlet->tlp }}</span>
                            </div>
                            <div class="company-kasir  mb-1 mb-1">
                                <span class="text-muted">Kasir - {{ $jquin->user->nama }}</span>
                            </div>
                            <div class="company-status  mb-1 mb-1">
                                <span class="text-muted">Status Pesanan - {{ ucwords($jquin->status) }}</span>
                            </div>
                            <div class="company-dibayar  mb-1 mb-1">
                                <span class="text-muted">Status Pembayaran -
                                    @if($jquin->dibayar == 'belum_dibayar') 
                                        Belum Dibayar
                                    @else
                                        Dibayar
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="col-6 mt-1 to-info">
                            <div class="info-title mb-1">
                                <span>Pelanggan</span>
                            </div>
                            <div class="company-name mb-1">
                                <span class="text-muted">{{ $jquin->pelanggan->nama }}</span>
                            </div>
                            <div class="company-address mb-1">
                                <span class="text-muted">{{ $jquin->pelanggan->alamat }}</span>
                            </div>
                            <div class="company-phone  mb-1">
                                <span class="text-muted">{{ $jquin->pelanggan->tlp }}</span>
                            </div>
                        </div>
                    </div>

                    <!--product details table -->
                    <div class="product-details-table py-2 table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Jenis Cucian</th>
                                    <th scope="col">Paket</th>
                                    <th scope="col">Jumlah Cucian</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pesanan as $detail)
                                <tr>
                                    <td>{{ $detail->paket->jenis }}</td>
                                    <td>{{ $detail->paket->nama_paket }}</td>
                                    <td>{{ $detail->qty }}</td>
                                    <td>{{ number_format($detail->paket->harga, 2) }}/Cucian</td>
                                    <td>{{ $detail->keterangan }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5"><b><i>Tidak Ada Data</i></b></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <hr>

                    <!-- invoice total -->
                    <div class="invoice-total py-2">
                        <div class="row">
                            <div class="col-4 col-sm-6 mt-75">
                                <p>Masukkan anda berguna bagi kami.</p>
                            </div>
                            <div class="col-8 col-sm-6 d-flex justify-content-end mt-75">
                                <ul class="list-group cost-list">
                                   <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                        <span class="cost-title mr-2">Subtotal </span>
                                        <span class="cost-value">Rp. 
                                        	@foreach($harga as $subtotal)
                                        		{{ number_format($subtotal->TotalHarga, 2) }}
                                        	@php
                                        		$sTotal = $subtotal->TotalHarga;
                                        	@endphp
                                        	@endforeach
                                        </span>
                                    </li>
                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                        <span class="cost-title mr-2">Biaya Tambahan </span>
                                        <span class="cost-value">Rp. {{ number_format($jquin->biaya_tambahan, 2) }}</span>
                                    </li>
                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                        <span class="cost-title mr-2">Pajak </span>
                                        <span class="cost-value">Rp. {{ number_format($jquin->pajak, 2) }}</span>
                                    </li>
                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                        <span class="cost-title mr-2">Diskon </span>
                                        @if($jquin->diskon == '')
                                        <span class="cost-value">0%</span>
                                        @else
                                        <span class="cost-value">{{ $jquin->diskon }}%</span>
                                        @endif
                                    </li>
                                     @php
                                        $keseluruhanInvoice = $sTotal+$jquin->biaya_tambahan+$jquin->pajak;
                                        $diskon = $jquin->diskon;
                                        $totalDiskon = ($diskon/100)*$keseluruhanInvoice;
                                        $totalBayar = $keseluruhanInvoice-$totalDiskon;

                                        $total = number_format($totalBayar,2,',','.');
                                    @endphp
                                    <li class="dropdown-divider"></li>
                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                        <span class="cost-title mr-2">Total</span>
                                        <span class="cost-value">Rp. {{ $total }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-12 action-btns">
            <div class="card">
                <div class="card-body p-2">
                    <a href="{{ route('transaksi.index') }}" class="btn btn-info btn-block mb-1"> <i class="icon-arrow-left mr-25 common-size"></i> Kembali</a>
                    <a href="{{ route('transaksi.edit', $jquin->id) }}" class="btn btn-info btn-block mb-1"><i class="icon-pencil mr-25 common-size"></i> Edit Transaksi</a>
                </div>
            </div>
        </div>
	  </div>
    </div>
</section>
@stop

@section('footer')
    <script src="{{asset('admin/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>

    <!-- Alert -->
    @if(Session::has('suksesTransaksi'))
    <script>
        toastr.success('Transaksi Berhasil Ditambahkan','Sukses');
    </script>
    @endif
@stop