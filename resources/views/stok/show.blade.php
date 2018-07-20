@extends('layouts.app')

@section('title', $stok->sm_no . ' - ' . trans('stok.detail'))

@section('content')
<h3 class="page-header">
    {{ $stok->sm_no }}
    <small>{{ trans('stok.detail') }}</small>
</h3>
<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title">{{ trans('stok.detail') }}</h3></div>
            <div class="panel-body">
                <table class="table table-condensed">
                    <tbody>
                        <tr><td>{{ trans('stok.sm_no') }}</td><td class="text-primary strong">{{ $stok->sm_no }}</td></tr>
                        <tr><td>{{ trans('stok.produk') }}</td><td>{{ $stok->product->name }}</td></tr>
                        <tr><td>{{ trans('stok.stok_masuk') }}</td><td>{{ $stok->stok_masuk }}</td></tr>
                        <tr><td>{{ trans('stok.harga_beli') }}</td><td>{{ $stok->harga_beli }}</td></tr>
                        <tr><td>{{ trans('stok.total') }}</td><th class="text-right strong">{{ formatRp($stok->total) }}</th></tr>
                        <tr><td>{{ trans('app.date') }}</td><td>{{ $transaction->created_at->format('Y-m-d') }}</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
