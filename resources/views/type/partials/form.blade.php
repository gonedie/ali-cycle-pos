@if (! Request::has('action'))
{{ link_to_route('type-merk.index', trans('type.create'), ['action' => 'create'], ['class' => 'btn btn-success pull-right']) }}
@endif
@if (Request::get('action') == 'create')
    <div class="panel panel-success class">
        <div class="panel-heading"><h3 class="panel-title">{{ trans('type.delete') }}</h3></div>
            <div class="panel-body">
              {!! Form::open(['route' => 'type-merk.store']) !!}
              {!! FormField::text('nama_type', ['label' => trans('type.name'), 'required' => true]) !!}
              {!! Form::submit(trans('type.create'), ['class' => 'btn btn-success']) !!}
              {{ link_to_route('type-merk.index', trans('app.cancel'), [], ['class' => 'btn btn-default']) }}
              {!! Form::close() !!}
            </div>
        </div>
    </div>
@endif
@if (Request::get('action') == 'edit' && $editableUnit)
    <div class="panel panel-warning class">
        <div class="panel-heading"><h3 class="panel-title">{{ trans('type.edit') }}</h3></div>
            <div class="panel-body">
              {!! Form::model($editableUnit, ['route' => ['type-merk.update', $editableUnit->id],'method' => 'patch']) !!}
              {!! FormField::text('nama_type', ['label' => trans('type.name'), 'required' => true]) !!}
              {!! Form::submit(trans('type.update'), ['class' => 'btn btn-success']) !!}
              {{ link_to_route('type-merk.index', trans('app.cancel'), [], ['class' => 'btn btn-default']) }}
              {!! Form::close() !!}
            </div>
        </div>
    </div>
@endif
@if (Request::get('action') == 'delete' && $editableUnit)
    <div class="panel panel-danger class">
        <div class="panel-heading"><h3 class="panel-title">{{ trans('type.delete') }}</h3></div>
        <div class="panel-body">
            <label class="control-label">{{ trans('type.name') }}</label>
            <p>{{ $editableUnit->nama_type }}</p>
            {!! $errors->first('type_merk_id', '<span class="form-error small">:message</span>') !!}
            <hr>
            {{ trans('type.delete_confirm') }}
        </div>
        <div class="panel-footer">
            {!! FormField::delete(['route'=>['type-merk.destroy',$editableUnit->id]], trans('app.delete_confirm_button'), ['class'=>'btn btn-danger'], ['type_merk_id'=>$editableUnit->id]) !!}
            {{ link_to_route('type-merk.index', trans('app.cancel'), [], ['class' => 'btn btn-default']) }}
        </div>
    </div>
@endif
