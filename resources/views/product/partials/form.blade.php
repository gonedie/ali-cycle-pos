@inject('type_merk', 'App\TypeMerk')
@if (Request::get('action') == 'create')
    <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">{{ __('product.create') }}</h3></div>
        <div class="panel-body">
            {!! Form::open(['route' => 'products.store']) !!}
            {!! FormField::text('name', ['label' => __('product.name'), 'required' => true]) !!}
            <div class="row">
              <div class="col-md-8">{!! FormField::price('harga_jual', ['label' => __('product.cash_price'), 'required' => true]) !!}</div>
            </div>
            {!! FormField::radios('kondisi', ['Baru' => 'Baru', 'Bekas' => 'Bekas'], ['label' => __('product.kondisi'), 'required' => true]) !!}
            {!! FormField::select('type_merk_id', $type_merk->pluck('nama_type','id'), ['label' => __('product.unit'), 'required' => true]) !!}
            {!! Form::submit(__('product.create'), ['class' => 'btn btn-success']) !!}
            {{ link_to_route('products.index', __('app.cancel'), [], ['class' => 'btn btn-default']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endif
@if (Request::get('action') == 'edit' && $editableProduct)
    <div class="panel panel-warning">
      <div class="panel-heading"><h3 class="panel-title">{{ __('product.edit') }}</h3></div>
      <div class="panel-body">
          {!! Form::model($editableProduct, ['route' => ['products.update', $editableProduct->id],'method' => 'patch']) !!}
          {!! FormField::text('name', ['label' => __('product.name'), 'required' => true]) !!}
          <div class="row">
            <div class="col-md-8">{!! FormField::price('harga_jual', ['label' => __('product.cash_price'), 'required' => true]) !!}</div>
          </div>
          {!! FormField::radios('kondisi', ['Baru' => 'Baru', 'Bekas' => 'Bekas'], ['label' => __('product.kondisi'), 'required' => true]) !!}
          {!! FormField::select('type_merk_id', $type_merk->pluck('nama_type','id'), ['label' => __('product.unit'), 'required' => true]) !!}
          @if (request('q'))
            {{ Form::hidden('q', request('q')) }}
          @endif
          @if (request('page'))
            {{ Form::hidden('page', request('page')) }}
          @endif
          {!! Form::submit(__('product.update'), ['class' => 'btn btn-success']) !!}
          {{ link_to_route('products.index', __('app.cancel'), Request::only('q'), ['class' => 'btn btn-default']) }}
          {!! Form::close() !!}
      </div>
    </div>
@endif
@if (Request::get('action') == 'delete' && $editableProduct)
    <div class="panel panel-danger">
        <div class="panel-heading"><h3 class="panel-title">{{ __('product.delete') }}</h3></div>
        <div class="panel-body">
            <table class="table table-condensed">
                <tbody>
                    <tr><th>{{ __('product.name') }}</th><td>{{ $editableProduct->name }}</td></tr>
                    <tr><th>{{ __('product.unit') }}</th><td>{{ $editableProduct->type_merk->nama_type }}</td></tr>
                    <tr><th>{{ __('product.cash_price') }}</th><td>{{ formatRp($editableProduct->harga_jual) }}</td></tr>
                    <tr><th>{{ __('product.kondisi') }}</th><td>{{ $editableProduct->kondisi }}</td></tr>
                </tbody>
            </table>
            {!! $errors->first('product_id', '<span class="form-error small">:message</span>') !!}
            <hr>
            {{ __('product.delete_confirm') }}
        </div>
        <div class="panel-footer">
            {!! FormField::delete(['route'=>['products.destroy',$editableProduct->id]], __('app.delete_confirm_button'), [
                'class'=>'btn btn-danger'
            ], [
                'product_id'=>$editableProduct->id,
                'page' => request('page'),
                'q' => request('q'),
            ]) !!}
            {{ link_to_route('products.index', __('app.cancel'), Request::only('q'), ['class' => 'btn btn-default']) }}
        </div>
    </div>
@endif
