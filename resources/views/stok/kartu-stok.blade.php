@extends('layouts.app')

@section('title', trans('stok.kartu_stok'))

@section('content')
<h3 class="page-header">{{ trans('stok.kartu_stok') }}</h3>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default table-responsive">
            <div class="panel-heading">
                {{ Form::open(['method' => 'get','class' => 'form-inline pull-left']) }}
                {!! FormField::text('q', ['value' => request('q'), 'label' => __('product.search'), 'class' => 'input-sm', 'placeholder' => 'Min. 3 huruf...',]) !!}
                {{ Form::submit(__('product.search'), ['class' => 'btn btn-info btn-sm']) }}
                {{ link_to_route('stok.kartuStok', __('app.reset')) }}&nbsp;&nbsp;&nbsp; || &nbsp;&nbsp;&nbsp;
                {{ Form::close() }}

                {{ Form::open(['method' => 'get','class' => 'form-inline pull-left']) }}
                {!! FormField::text('date', [
                    'value' => request('date', $date),
                    'label' => trans('app.date'),
                    'class' => 'input-sm date-select',
                    'placeholder' => 'yyyy-mm-dd',
                ]) !!}
                {{ Form::submit(trans('stok.search2'), ['class' => 'btn btn-info btn-sm']) }} |
                {{ link_to_route('stok.kartuStok', trans('app.reset')) }}
                {{ Form::close() }}
                <h3 class="panel-title" style="padding:14px 0">
                    {{-- {{ trans('transaction.list') }} |
                    {{ trans('app.total') }} : {{ $transactions->total() }} {{ trans('transaction.transaction') }} --}}
                </h3>
            </div>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>{{ trans('app.table_no') }}</th>
                        <th>{{ trans('stok.produk') }}</th>
                        <th>{{ trans('stok.type_merk') }}</th>
                        <th class="text-center">{{ trans('stok.stok_awal') }}</th>
                        <th class="text-center">{{ trans('stok.penjulan') }}</th>
                        <th class="text-center">{{ trans('stok.stok_akhir') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stoks as $key => $stok)
                    <tr>
                        <td class="text-center">{{ 1 + $key }}</td>
                        <td>{{ $stok->product->name }}</td>
                        <td>{{ $stok->product->type_merk->nama_type }}</td>
                        <td class="text-center">{{ $stok->stok_awal }}</td>
                        <td class="text-center">{{ $stok->penjualan_stok }}</td>
                        <td class="text-center">{{ $stok->stok_akhir }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
