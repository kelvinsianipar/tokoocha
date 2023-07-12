@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Produk</h3>
                <a href="{{ route('admin.products.index')}}" class="btn btn-success shadow-sm float-right"> <i class="fa fa-arrow-left"></i> Kembali</a>
                <a href="{{ route('admin.products.product_images.index', $product)}}" class="btn btn-success shadow-sm mr-2 float-right"> <i class="fa fa-image"></i> Upload Gambar Produk</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ route('admin.products.update', $product) }}">
                    @csrf 
                    @method('put')
                      <input type="hidden" class="form-control" name="type" value="simple" id="type">
                    <div class="form-group row border-bottom pb-4">
                        <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}" id="name">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="category_id" class="col-sm-2 col-form-label">Kategori Produk</label>
                        <div class="col-sm-10">
                          <select class="form-control select-multiple"  multiple="multiple" name="category_id[]" id="category_id">
                            @foreach($categories as $category)
                              <option {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : null }} value="{{ $category->id }}"> {{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                 
                    @if ($product)
                        @if ($product->type == 'configurable')
                            @include('admin.products.configurable')
                        @else
                            @include('admin.products.simple')                            
                        @endif

                        <div class="form-group row border-bottom pb-4">
                            <label for="short_description" class="col-sm-2 col-form-label">Deskripsi Singkat</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="5">{{ old('short_description', $product->short_description) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row border-bottom pb-4">
                            <label for="description" class="col-sm-2 col-form-label">Deskripsi Produk</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ old('description', $product->description) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row border-bottom pb-4">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="status" id="status">
                                @foreach($statuses as $value => $status)
                                  <option {{ old('status', $product->status) == $value ? 'selected' : null }} value="{{ $value }}"> {{ $status }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
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
    <!-- /.content -->
@endsection

@push('style-alt')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script-alt')
<script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"
    >
    </script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
      $('.select-multiple').select2();
</script>
@endpush