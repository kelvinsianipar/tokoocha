@extends('layouts.app')

@section('content')
<div class="content pt-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Cancel Order #{{ $order->code }}</h2>
                </div>
                <div class="card-body">
                <form action="{{ route('admin.orders.cancel', $order) }}" method="POST">
                    @csrf 
                    @method('put')
                    <div class="form-group">
                        <label for="cancellation_note">Cancellation Note</label>
                        <textarea name="cancellation_note" id="cancellation_note" cols="30" rows="4" class="form-control">{{ old('cancellation_note') }}</textarea>
                    </div>
                    <div class="form-footer pt-5 border-top">
                        <button type="submit" class="btn btn-success">Cancel Order</button>
                        <a href="{{ url('admin/orders') }}" class="btn btn-dark">Kembali</a>
                    </div>
                    </form>
                </div>
            </div>  
        </div>
        <div class="col-lg-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Detail Order</h2>
                </div>
                <div class="card-body">
					<div class="row mb-2">
						<div class="col-xl-6 col-lg-6">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Billing Address</p>
							<address>
								{{ $order->customer_first_name }} {{ $order->customer_last_name }}
								<br> Alamat: {{ $order->customer_address1 }}
								<br> Email: {{ $order->customer_email }}
								<br> Phone: {{ $order->customer_phone }}
							</address>
						</div>
						<div class="col-xl-6 col-lg-6">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
							<address>
								ID: <span class="text-dark">#{{ $order->code }}</span>
								<br> {{ $order->order_date }}
								<br> Status: {{ $order->status }}
							</address>
						</div>
					</div>
					<div class="table-responsive">
                        <table id="data-table" class="table mt-3 table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->sub_total }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Order item not found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-5 col-xl-6 col-xl-3 ml-sm-auto">
                            <ul class="list-unstyled mt-4">
                                    <span class="d-inline-block float-right"><strong>Total Bayar : </strong>Rp. {{ $order->grand_total }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('style-alt')
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endpush

@push('script-alt') 
    <script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"
    >
    </script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script>
    $("#data-table").DataTable();
    </script>
@endpush