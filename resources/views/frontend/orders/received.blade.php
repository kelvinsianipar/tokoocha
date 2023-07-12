@extends('frontend.layout')

@section('content')
	
	<!-- checkout-area start -->
	<div class="cart-main-area  ptb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @if(session()->has('message'))
                    <div class="content-header mb-0 pb-0">
                        <div class="container-fluid">
                            <div class="mb-0 alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div> 
                        </div><!-- /.container-fluid -->
                    </div>
                @endif
					<h1 class="cart-heading">Pesanan Kamu</h4>
					<div class="row">
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Deskripsi </p>
							<address>
								{{ $order->customer_first_name }} {{ $order->customer_last_name }}
								<br> Alamat Tujuan : {{ $order->customer_address1 }}
								<br> No Telepon: {{ $order->customer_phone }}

							</address>
						</div>
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
							<address>
								Invoice ID:
								<span class="text-dark">#{{ $order->code }}</span>
								<br> {{ $order->order_date }}
								<br> Status: {{ $order->status }}
							</address>
						</div>
					</div>
					<div class="table-content table-responsive">
						<table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
							<thead>
								<tr>
									<th>Nama Barang</th>
									<th>Jumlah Barang</th>
									<th>Harga Barang</th>
									<th>Total Harga</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($order->orderItems as $item)
									<tr>
										<td>{{ $item->name }}</td>
										<td>{{ $item->qty }}</td>
										<td>Rp{{ number_format($item->base_price,0,",",".") }}</td>
										<td>Rp{{ number_format($item->sub_total,0,",",".") }}</td>
									</tr>
								@empty
									<tr>
										<td colspan="6">Order item not found!</td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-5 ml-auto">
							<div class="cart-page-total">
								<ul>
									<li>Total Harga<span>Rp{{ number_format($order->grand_total, 0,",", ".") }}</span></li>

								</ul>
					
								@if (!$order->isPaid())
									<a href="{{ $order->payment_url }}">Lanjutkan Pembayaran</a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection