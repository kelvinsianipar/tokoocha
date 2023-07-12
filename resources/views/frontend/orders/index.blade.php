@extends('frontend.layout')

@section('content')
	
	<div class="shop-page-wrapper shop-page-padding ptb-100">
		<div class="container-fluid">
			<h1 class="cart-heading">Riwayat Pesanan</h1>
			<div class="row">
				<div class="col-lg-12">
					<div class="shop-product-wrapper res-xl">
						<div class="table-content table-responsive">
							<table class="table table-bordered table-striped">
								<thead>
									<th>Kode Pemesanan</th>
									<th>Total Bayar</th>
									<th>Tanggal Pemesanan</th>
									<th>Detail Pemesanan</th>
								</thead>
								<tbody>
									@forelse($orders as $order)
										<tr>    
											<td>
												{{ $order->code }}<br>
												<span style="font-size: 12px; font-weight: normal"></span>
											</td>
											<td>Rp{{ number_format($order->grand_total, 0, ",", ".") }}</td>
											<td>{{ date('d M Y', strtotime($order->order_date)) }}</td>
											<td>
												<a href="{{ url('orders/'. $order->id) }}" class="fa fa-eye"><p>Lihat</p></a>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="5">No records found</td>
										</tr>
									@endforelse
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection