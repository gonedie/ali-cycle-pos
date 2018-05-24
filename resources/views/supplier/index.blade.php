@extends('layouts.app')

@section('title', trans('supplier.list'))

@section('content')
<h3 class="page-header">{{ trans('supplier.list') }}</h3>

<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>{{ trans('app.table_no') }}</th>
                        <th>{{ trans('supplier.supplier') }}</th>
                        <th>{{ trans('supplier.tlpn') }}</th>
                        <th>{{ trans('supplier.alamat') }}</th>
                        <th class="text-center">{{ trans('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $key => $supplier)
                    <tr>
                        <td class="text-center">{{ 1 + $key }}</td>
                        <td>{{ $supplier->nama }}</td>
                        <td>{{ $supplier->tlpn }}</td>
                        <td><a href="#" style="color:black; text-decoration:none" data-toggle="tooltip"
                              title="{{ $supplier->alamat }}">
                              {{ str_limit($supplier->alamat, 10) }}</a>
                        </td>
                        <td class="text-center">
                            {!! link_to_route('supplier.index', trans('app.edit'), ['action' => 'edit', 'id' => $supplier->id], ['id' => 'edit-supplier-' . $supplier->id]) !!} |
                            {!! link_to_route('supplier.index', trans('app.delete'), ['action' => 'delete', 'id' => $supplier->id], ['id' => 'del-supplier-' . $supplier->id]) !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">@include('supplier.partials.form')</div>
</div>
@endsection
