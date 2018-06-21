@if (! Request::has('action'))
{{ link_to_route('supplier.index', trans('supplier.create'), ['action' => 'create'], ['class' => 'btn btn-success pull-right']) }}
@endif
@if (Request::get('action') == 'create')
    <div class="panel panel-primary class">
        <div class="panel-heading"><h3 class="panel-title">{{ trans('supplier.create') }}</h3></div>
            <div class="panel-body">
                {!! Form::open(['route' => 'supplier.store']) !!}
                {!! FormField::text('nama', ['label' => trans('supplier.supplier'), 'required' => true]) !!}
                {!! FormField::text('tlpn', ['label' => trans('supplier.tlpn'), 'required' => true]) !!}
                {!! FormField::textarea('alamat', ['label' => trans('supplier.alamat'), 'required' => true]) !!}
                {!! Form::submit(trans('supplier.create'), ['class' => 'btn btn-success']) !!}
                {{ link_to_route('supplier.index', trans('app.cancel'), [], ['class' => 'btn btn-default']) }}
                {!! Form::close() !!}
            </div>
    </div>
@endif
@if (Request::get('action') == 'edit' && $editableUnit)
    <div class="panel panel-warning class">
        <div class="panel-heading"><h3 class="panel-title">{{ trans('supplier.edit') }}</h3></div>
            <div class="panel-body">
                {!! Form::model($editableUnit, ['route' => ['supplier.update', $editableUnit->id],'method' => 'patch']) !!}
                {!! FormField::text('nama', ['label' => trans('supplier.supplier'), 'required' => true]) !!}
                {!! FormField::text('tlpn', ['label' => trans('supplier.tlpn'), 'required' => true]) !!}
                {!! FormField::textarea('alamat', ['label' => trans('supplier.alamat'), 'required' => true]) !!}
                {!! Form::submit(trans('supplier.update'), ['class' => 'btn btn-success']) !!}
                {{ link_to_route('supplier.index', trans('app.cancel'), [], ['class' => 'btn btn-default']) }}
                {!! Form::close() !!}
            </div>
    </div>
@endif
@if (Request::get('action') == 'delete' && $editableUnit)
    <div class="panel panel-danger class">
        <div class="panel-heading"><h3 class="panel-title">{{ trans('supplier.delete') }}</h3></div>
        <div class="panel-body">
            <label class="control-label">{{ trans('supplier.supplier') }}</label>
            <p>{{ $editableUnit->nama }}</p>
            <p>{{ $editableUnit->tlpn }}</p>
            <p>{{ $editableUnit->alamat }}</p>
            {!! $errors->first('supplier_id', '<span class="form-error small">:message</span>') !!}
            <hr>
            {{ trans('supplier.delete_confirm') }}
        </div>
        <div class="panel-footer">
            {!! FormField::delete(['route'=>['supplier.destroy',$editableUnit->id]], trans('app.delete_confirm_button'), ['class'=>'btn btn-danger'], ['supplier_id'=>$editableUnit->id]) !!}
            {{ link_to_route('supplier.index', trans('app.cancel'), [], ['class' => 'btn btn-default']) }}
        </div>
    </div>
@endif
