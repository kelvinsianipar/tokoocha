@extends('frontend.layout')

@section('content')
	<!-- header end -->
	
	<!-- checkout-area start -->
	<div class="checkout-area ptb-100">
		<div class="container">
            <form action="{{ route('orders.checkout') }}" method="post">
				@csrf 
			<div class="row">
				<div class="col-lg-6 col-md-12 col-12">
					<div class="checkbox-form">						
						<h3>Isi Data & Alamat Tujuan</h3>
						<div class="row">
							<div class="col-6">
								<div class="checkout-form-list">
									<label>Nama Pertama <span class="required">*</span></label>										
									<input type="text" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}">
								</div>
							</div>
							<div class="col-6">
								<div class="checkout-form-list">
									<label>Nama Akhir <span class="required">*</span></label>										
									<input type="text" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}">
								</div>
							</div>
							<div class="col-md-12">
								<div class="checkout-form-list">
									<label>Address <span class="required">*</span></label>
									<input type="text" name="address1" value="{{ old('address1', auth()->user()->address1) }}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkout-form-list">
									<label>Nomor Telepon  <span class="required">*</span></label>										
									<input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkout-form-list">
									<label>Email Address </label>										
									<input type="text" name="email" value="{{ old('email', auth()->user()->email) }}">
								</div>
							</div>							
						</div>
						<div class="different-address">
							<div class="order-notes">
								<div class="checkout-form-list mrg-nn">
									<label>Note Pesanan</label>
									<input type="text" name="note" value="{{ old('note') }}">
								</div>									
							</div>
						</div>													
					</div>
				</div>	
				<div class="col-lg-6 col-md-12 col-12">
					<div class="your-order">
						<h3>Pesanan Kamu</h3>
						<div class="your-order-table table-responsive">
							<table>
								<thead>
									<tr>
										<th class="product-name">Barang</th>
										<th class="product-total">Total</th>
									</tr>							
								</thead>
								<tbody>
									@forelse ($items as $item)
										@php
											$product = isset($item->model->parent) ? $item->model->parent : $item->model;
											$image = !empty($product->productImages->first()) ? asset('storage/'.$product->productImages->first()->path) : asset('themes/ezone/assets/img/cart/3.jpg')
										@endphp
										<tr class="cart_item">
											<td class="product-name">
												{{ $item->name }}	<strong class="product-quantity"> × {{ $item->qty }}</strong>
											</td>
											<td class="product-total">
												<span class="amount">Rp{{ $item->price * $item->qty }}</span>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="2">The cart is empty! </td>
										</tr>
									@endforelse
								</tbody>
								<tfoot>
									<tr class="order-total">
										<th>Total Harga</th>
										<td><strong>Rp<span class="total-amount">{{ Cart::subtotal(0, ",", ".") }}</span></strong>
										</td>
									</tr>								
								</tfoot>
							</table>
						</div>
						<div class="payment-method">
							<div class="payment-accordion">
								<div class="order-button-payment">
									<input type="submit" value="Buat Pesanan" />
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>
            </form>
		</div>
	</div>
@endsection