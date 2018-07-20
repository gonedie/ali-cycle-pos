@extends('layouts.app')

@section('title', trans('stok.list-in'))

@section('content')
<h3 class="page-header">{{ trans('stok.list-in') }}</h3>

<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default table-responsive">
            <div class="panel-heading">
                {{ Form::open(['method' => 'get','class' => 'form-inline pull-left']) }}
                {!! FormField::text('q', ['value' => request('q'), 'label' => __('product.search'), 'class' => 'input-sm', 'placeholder' => 'Min. 3 huruf...',]) !!}
                {{ Form::submit(__('product.search'), ['class' => 'btn btn-info btn-sm']) }} |
                {{ link_to_route('stok.index', __('app.reset')) }}
                {{ Form::close() }}
                <br>
                <br>
                {{ Form::open(['method' => 'get','class' => 'form-inline pull-left']) }}
                {!! FormField::text('date', [
                    'value' => request('date', $date),
                    'label' => trans('app.date'),
                    'class' => 'input-sm date-select',
                    'placeholder' => 'yyyy-mm-dd',
                ]) !!}
                {{ Form::submit(trans('stok.search'), ['class' => 'btn btn-info btn-sm']) }} |
                {{ link_to_route('stok.index', trans('app.reset')) }}
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
                        <th>{{ trans('stok.sm_no') }}</th>
                        <th>{{ trans('stok.produk') }}</th>
                        <th>{{ trans('stok.jumlah') }}</th>
                        <th>{{ trans('stok.harga_beli') }}</th>
                        <th>{{ trans('stok.total2') }}</th>
                        <th>{{ trans('stok.date') }}</th>
                        {{-- <th class="text-center">{{ trans('app.action') }}</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($history as $key => $historys)
                    <tr>
                        <td class="text-center">{{ 1 + $key }}</td>
                        <td>{{ $historys->sm_no }}</td>
                        <td>{{ $historys->product->name }}</td>
                        <td>{{ $historys->stok_masuk }}</td>
                        <td>{{ $historys->harga_beli }}</td>
                        <td>{{ $historys->total }}</td>
                        <td>{{ $historys->created_at->format('Y-m-d') }}</td>
                        {{-- <td class="text-center">
                            {{ link_to_route('stok.show', trans('app.show'), $stok->sm_no) }}
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">@include('stok.partials.form')</div>
</div>
@endsection
