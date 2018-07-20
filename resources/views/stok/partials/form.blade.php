@inject('product', 'App\Product')
@if (! Request::has('action'))
{{ link_to_route('stok.index', trans('stok.create'), ['action' => 'create'], ['class' => 'btn btn-success pull-right']) }}
@endif
@if (Request::get('action') == 'create')
    <div class="panel panel-primary class">
        <div class="panel-heading"><h3 class="panel-title">{{ trans('stok.create') }}</h3></div>
            <div class="panel-body">
                {!! Form::open(['route' => 'stok.store']) !!}
                {!! FormField::select('product_id', $product->pluck('name','id'), ['label' => __('product.product'), 'required' => true]) !!}
                <div class="row">
                  <div class="col-md-8">{!! FormField::text('stok_masuk', ['label' => trans('stok.jumlah'), 'required' => true]) !!}</div>
                  <div class="col-md-8">{!! FormField::price('harga_beli', ['label' => trans('stok.harga'), 'required' => true]) !!}</div>
                  <div class="col-md-10">{!! FormField::price('total', ['label' => trans('stok.total'), 'required' => true]) !!}</div>
                </div>
                {!! Form::submit(trans('stok.create'), ['class' => 'btn btn-success']) !!}
                {{ link_to_route('stok.index', trans('app.cancel'), [], ['class' => 'btn btn-default']) }}
                {!! Form::close() !!}
            </div>
    </div>
@endif

@section('script')
<script>
    $(function() {  //  In jQuery 1.6+ this is same as $(document).ready(function(){})
        $('#stok_masuk, #harga_beli')  //  jQuery CSS selector grabs elements with the ID's "quantity" & "item_price"
            .on('change', function(e) {  //  jQuery 1.6+ replcement for .live (dynamically asigns event, see jQuery API)
                //  in this case, our event is "change" which works on inputs and selects to let us know when a value is changed
                //  below i use inline if statements to assure the values i get are "Real"
                var quan = $("#stok_masuk").val() != "" ? parseFloat($("#stok_masuk").val()) : 1,  //  Get quantity value
                    pric = $("#harga_beli").val() != "" ? parseFloat($("#harga_beli").val()) : 0;  //  Get price value
                $('#total').val(pric*quan); // show total
            });
    });
</script>
@endsection
