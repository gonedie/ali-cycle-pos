<legend>{{ trans('transaction.detail') }}</legend>
{{ Form::open(['route' => ['cart.draft-proccess', $draft->draftKey], 'method' => 'patch']) }}
{!! FormField::text('customer[name]', ['label' => trans('transaction.customer_name'), 'value' => $draft->customer['name'], 'required' => true]) !!}
<div class="row">
    <div class="col-md-10">{!! FormField::text('customer[phone]', ['label' => trans('transaction.customer_phone'), 'value' => $draft->customer['phone']]) !!}</div>
    <div class="col-md-10">{!! FormField::price('payment', ['label' => trans('transaction.payment'), 'value' => $draft->payment, 'required' => true]) !!}</div>
</div>
{{ Form::hidden('total', $draft->getTotal()) }}
{{ Form::submit(trans('transaction.proccess'), ['class' => 'btn btn-info']) }}
{{ Form::close() }}
