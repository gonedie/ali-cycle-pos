<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <style media="screen">
        html {
            margin: 25px;
        }

        body {
            font-family: 'Arial', sans-serif;
            font-size:12px;
        }

        table {
            border-spacing: 1px;
        }

        td, th {
            padding: 0px;
        }

        td {
            vertical-align: top;
        }

        table.main-table {
            width: 100%;
            border-collapse: collapse;
        }

        table.main-table td, table.main-table th {
            padding: 5px 3px;
        }

        h1, h2, h3, h4 {
            margin: 0;
        }

        h2 { font-size: 20px; margin-bottom: 16px }

        .text-center {
            text-align: center;
            vertical-align:middle;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        p {
            margin: 0 0 3px 0;
        }

        div {
            margin: 0;
            padding: 0;
        }

        .strong { font-weight: bold; }

        .border-bottom {
            border-bottom: 1px solid #777;
        }

        .page-break {
            page-break-after: always;
        }
    </style>

</head>
<body>
    <div class="container">
      <table style="width: 760px; border-collapse: collapse; page-break-inside: avoid; /*border:1px solid #aaa;*/">
          <tbody>
              <tr>
                  <td colspan="3">
                      <h2 class="text-center">{{ config('store.name') }}</h2>
                      <p class="text-center">{{ config('store.address') }} | Telp: {{ config('store.phone') }}</p>
                      <br>
                      <table style="width:300px;margin: auto;">
                          <tbody>
                              <tr>
                                  <td style="width:90px">{{ trans('transaction.invoice_no') }}</td>
                                  <td>:</td>
                                  <td class="strong">{{ $transaction->invoice_no }}</td>
                                  <td class="text-right">{{ $transaction->created_at->format('d/m/Y') }}</td>
                              </tr>
                              <tr><td>{{ trans('transaction.cashier') }}</td><td>:</td><td>{{ $transaction->user->name }}</td><td class="text-right">{{ $transaction->created_at->format('H:i:s') }}</td></tr>
                              <tr><td>{{ trans('transaction.customer') }}</td><td>:</td><td colspan="2">{{ $transaction->customer['name'] }}</td></tr>
                              <tr><td>{{ trans('transaction.customer_phone') }}</td><td>:</td><td colspan="2">{{ $transaction->customer['phone'] }}</td></tr>
                          </tbody>
                      </table>
                      <br>
                  </td>
              </tr>
              <?php $discountTotal = 0; ?>
              @foreach(collect($transaction->items)->chunk(30) as $chuncked30Items)
              <tr>
                  @foreach($chuncked30Items->chunk(10) as $chunckedItems)
                  <td style="width:310px;padding-right: 10px">
                      <table class="main-table">
                          <tbody>
                              <tr><th class="border-bottom" colspan="3">@if ($loop->first) {{ trans('transaction.items') }} @else &nbsp; @endif</th></tr>
                              <tr>
                                  <th class="text-center border-bottom">@if ($loop->first) {{ trans('product.item_qty') }} @else &nbsp; @endif</th>
                                  <th class="text-right border-bottom">@if ($loop->first) {{ trans('product.price') }} @else &nbsp;<br>&nbsp; @endif</th>
                                  <th class="text-right border-bottom" style="width:90px">@if ($loop->first) {{ trans('product.item_subtotal') }} @else &nbsp; @endif</th>
                              </tr>
                              @foreach($chunckedItems as $key => $item)
                              <tr>
                                  <td class="strong" colspan="3">{{ $key + 1 }})&nbsp;{{ $item['name'] }} ({{ $item['type_merk'] }})</td>
                              </tr>
                              <tr>
                                  <td class="text-center border-bottom">{{ $item['qty'] }}</td>
                                  <td class="text-right border-bottom">
                                      {{ formatRp($item['price']) }}
                                  </td>
                                  <td class="text-right border-bottom">{{ formatRp($item['subtotal']) }}</td>
                              </tr>
                              <?php $discountTotal += $item['item_discount_subtotal'] ?>
                              @endforeach
                              @if ($loop->last && $loop->parent->last)
                              <tr>
                                  <th colspan="2" class="text-right">{{ trans('transaction.subtotal') }} :</th>
                                  <th class="text-right">{{ formatRp($transaction['total'] + $discountTotal) }}</th>
                              </tr>
                              <tr>
                                  <th colspan="2" class="text-right">{{ trans('transaction.discount_total') }} :</th>
                                  <th class="text-right">{{ formatRp($discountTotal) }}</th>
                              </tr>
                              <tr>
                                  <th colspan="2" class="text-right">{{ trans('transaction.total') }} :</th>
                                  <th class="text-right">{{ formatRp($transaction['total']) }}</th>
                              </tr>
                              <tr>
                                  <th colspan="2" class="text-right">{{ trans('transaction.payment') }} :</th>
                                  <th class="text-right">{{ formatRp($transaction->payment) }}</th>
                              </tr>
                              <tr>
                                  <th colspan="2" class="text-right border-bottom">{{ trans('transaction.exchange') }} :</th>
                                  <th class="text-right border-bottom">{{ formatRp($transaction->getExchange()) }}</th>
                              </tr>
                              @endif
                          </tbody>
                      </table>
                  </td>
                  @endforeach
              </tr>
              @endforeach
          </tbody>
      </table>
    </div>
</body>
</html>
