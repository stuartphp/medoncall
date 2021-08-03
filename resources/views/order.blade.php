<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $order->order_number }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="mx-auto p-16" style="max-width: 800px;">
        <div class="flex items-center justify-between mb-8 px-3">
          <div>
            <span class="text-2xl">#</span>: {{ $order->order_number }}<br />
            <span>Date</span>:  {{ $order->updated_at }}<br />
          </div>
          <div class="text-right">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
              </svg>
          </div>
        </div>

        <div class="flex justify-between mb-8 px-3">
          <div>
            {{ $order->user->name }}<br/>
            {!! nl2br($order->delivery_address) !!}
          </div>
          <div class="text-right">

          </div>
        </div>

        <div class="border border-t-2 border-gray-200 mb-8 px-3"></div>
        <table class="w-full table-fixed">
            <thead>
                <tr>
                    <th class="w-3/6">Description</th>
                    <th class="w-1/6">Quantity</th>
                    <th class="w-1/6">Amount</th>
                    <th class="w-1/6">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                <tr class="py-4">
                    <td>{{ $item->medicine->generic_name }}</td>
                    <td class="text-center">{{ $item->quantity }}</td>
                    <td class=" text-right mr-1">{{ number_format($item->retail/100,2) }}</td>
                    <td class=" text-right mr-1">{{ number_format(($item->quantity * $item->retail)/100,2) }}</td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>

        <div class="flex justify-between items-center mb-2 mt-4 border border-t-2">
          <div class="text-1xl leading-none"><span class="">Total</span>:</div>
          <div class="text-1xl text-right font-medium">R{{ number_format($order->total_due/100,2) }}</div>
        </div>

        <div class="flex mb-8 justify-end px-3">
          <div class="w-1/2 px-0 leading-tight">
            <table>
                <tr>
                    <td>Bank:</td>
                    <td>FNB</td>
                </tr>
                <tr>
                    <td>Holder:</td>
                    <td>Meds</td>
                </tr>
                <tr>
                    <td>A/C:</td>
                    <td>6209-4422-822</td>
                </tr>
                <tr>
                    <td>Ref:</td>
                    <td>{{ $order->order_number }}</td>
                </tr>
            </table>
          </div>
        </div>
      </div>
</body>
</html>
