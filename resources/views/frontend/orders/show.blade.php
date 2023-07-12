@extends('frontend.layout')

@section('content')
	
	<div class="shop-page-wrapper shop-page-padding ptb-100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="d-flex justify-content-between">
						<h2 class="text-dark font-weight-medium">Order ID #{{ $order->code }}</h2>
					</div>
					<div class="row pt-5">
						<div class="col-xl-4 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Billing Address</p>
							<address>
								{{ $order->customer_first_name }} {{ $order->customer_last_name }}
								<br> {{ $order->customer_address1 }}
								<br> Email: {{ $order->customer_email }}
								<br> Phone: {{ $order->customer_phone }}
							</address>
						</div>
						
						<div class="col-xl-4 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
							<address>
								ID: <span class="text-dark">#{{ $order->code }}</span>
								<br> {{ date('d M Y', strtotime($order->order_date)) }}
								<br>{{ $order->isCancelled() ? '('. date('d M Y', strtotime($order->cancelled_at)) .')' : null}}
								@if ($order->isCancelled())
									<br> Cancellation Note : {{ $order->cancellation_note}}
								@endif
								<br>Jumlah Pembayaran : <strong> Rp.{{ $order->grand_total}}</strong>
							</address>
						</div>
					</div>
					<div class="table-content table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Item</th>
									<th>Jumlah Barang</th>
									<th>Harga Barang</th>
									<th>Total</th>
									<th>Pembayaran</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($order->orderItems as $item)
									<tr>
										<td>{{ $item->name }}</td>
										<td>{{ $item->qty }}</td>
										<td>{{ number_format($item->base_price, 0, ",", ".") }}</td>
										<td>{{ number_format($item->sub_total, 0, ",", ".") }}</td>
										<td><a href="{{ $order->payment_url }}" class="btn btn-info btn-sm">Status Pembayaran</a></td>
									</tr>
								@empty
									<tr>
										<td colspan="6">Order item not found!</td>
									</tr>
								@endforelse
								
							</tbody>
							
						</table>						
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection