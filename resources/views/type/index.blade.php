@extends('layouts.app')

@section('title', trans('type.list'))

@section('content')
<h3 class="page-header">{{ trans('type.list') }}</h3>

<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">{{ trans('app.table_no') }}</th>
                        <th>{{ trans('type.name') }}</th>
                        <th class="text-center">{{ trans('type.products_count') }}</th>
                        <th class="text-center">{{ trans('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($typeMerks as $key => $type)
                    <tr>
                        <td class="text-center">{{ 1 + $key }}</td>
                        <td>{{ $type->nama_type }}</td>
                        <td class="text-center">{{ $type->product_count }}</td>
                        <td class="text-center">
                            {!! link_to_route('type-merk.index', trans('app.edit'), ['action' => 'edit', 'id' => $type->id], ['id' => 'edit-unit-' . $type->id]) !!} |
                            {!! link_to_route('type-merk.index', trans('app.delete'), ['action' => 'delete', 'id' => $type->id], ['id' => 'del-unit-' . $type->id]) !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">@include('type.partials.form')</div>
</div>
@endsection
