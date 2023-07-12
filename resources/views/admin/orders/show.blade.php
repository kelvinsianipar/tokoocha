@extends('layouts.app')

@section('content')

<section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h2 class="text-dark font-weight-medium">Order ID #{{ $order->code }}</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">       
                <div class="row pt-2 mb-3">
                    <div class="col-lg-4">
                        <p class="text-dark" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Billing Address</p>
                        <address>
                            {{ $order->customer_full_name }}
                             {{ $order->customer_address1 }}
                            <br> Email: {{ $order->customer_email }}
                            <br> Phone: {{ $order->customer_phone }}
                        </address>
                    </div>

                    <div class="col-lg-4">
                        <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
                        <address>
                            ID: <span class="text-dark">#{{ $order->code }}</span>
                            <br> {{ $order->order_date }}
                            <br> Status: {{ $order->status }} {{ $order->isCancelled() ? '('. $order->cancelled_at .')' : null}}
                            @if ($order->isCancelled())
                                <br> Cancellation Note : {{ $order->cancellation_note}}
                            @endif
                        </address>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Harga Barang</th>
                                <th>Jumlah harga</th>
                            </tr>
                        </thead>
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
                    <div class="row justify-content-end">
                        <div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto pb-4">
                            <ul class="list-unstyled mt-4">
                                <li class="pb-3 text-dark"><strong>Total Bayar: </strong>
                                    <span class="d-inline-block float-right">Rp{{ number_format($order->grand_total,0,",",".") }}</span>
                                </li>
                            </ul>
                            @if (!$order->trashed())
                                    @if ($order->isPaid() && $order->isConfirmed())
                                        <a href="{{ url('admin/shipments/'. $order->shipment->id .'/edit')}}" class="btn btn-block mt-2 btn-lg btn-primary btn-pill"> Procced to Shipment</a>
                                    @endif

                                    @if (in_array($order->status, [\App\Models\Order::CREATED, \App\Models\Order::CONFIRMED]))
                                        <a href="{{ url('admin/orders/'. $order->id .'/cancel')}}" class="btn btn-block mt-2 btn-lg btn-warning btn-pill"> Cancel</a>
                                    @endif

                                    @if ($order->isDelivered())
                                        <a href="#" class="btn btn-block mt-2 btn-lg btn-success btn-pill" onclick="event.preventDefault();
                                        document.getElementById('complete-form-{{ $order->id }}').submit();"> Mark as Completed</a>		
                                        <form class="d-none" method="POST" action="{{ route('admin.orders.complete', $order) }}" id="complete-form-{{ $order->id }}">
                                            @csrf
                                        </form>				
                                    @endif

                                    @if (!in_array($order->status, [\App\Models\Order::DELIVERED, \App\Models\Order::COMPLETED]))
                                        <a href="#" class="btn btn-block mt-2 btn-lg btn-secondary btn-pill delete" order-id="{{ $order->id }}"> Remove</a>	
                                        <form action="{{ route('admin.orders.destroy',$order) }}" method="post" id="delete-form-{{ $order->id }}" class="d-none">
                                            @csrf 
                                            @method('delete')
                                        </form>	
                                    @endif
                                @else
                                    <a href="{{ url('admin/orders/restore/'. $order->id)}}" class="btn btn-block mt-2 btn-lg btn-outline-secondary btn-pill restore">Restore</a>
                                    <a href="#" class="btn btn-block mt-2 btn-lg btn-danger btn-pill delete" order-id="{{ $order->id }}"> Remove Permanently</a>
                                    <form action="{{ route('admin.orders.destroy',$order) }}" method="post" id="delete-form-{{ $order->id }}" class="d-none">
                                            @csrf 
                                            @method('delete')
                                        </form>	
                                @endif
                            </div>
                        </div>
                    </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
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
	
    $(".delete").on("submit", function () {
        return confirm("Do you want to remove this?");
    });
    $("a.delete").on("click", function () {
        event.preventDefault();
        var orderId = $(this).attr('order-id');
        if (confirm("Do you want to remove this?")) {
            document.getElementById('delete-form-' + orderId ).submit();
        }
    });
    
    $(".restore").on("click", function () {
        return confirm("Do you want to restore this?");
    });
		
    </script>
@endpush