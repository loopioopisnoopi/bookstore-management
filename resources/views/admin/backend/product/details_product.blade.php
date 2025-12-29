@extends('admin.admin_master')
@section('admin')

    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0"> Chi tiết sách</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <a href="{{ route('all.product') }}" class="btn btn-dark">Quay lại</a>
                    </ol>
                </div>
            </div>

            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {{-- // Product Image --}}
                        <div class="col-md-4">
                            <h5 class="mb-3">Ảnh sách</h5>
                            <div class="d-flex flex-wrap">
                                @forelse ($product->images as $image)
                                    <img src="{{ asset($image->image) }}" alt="image" class="me-2 mb-2" width="100" height="100"
                                        style="object-fit: cover; border: 1px solid #ddd; border-radius: 5px">
                                @empty
                                    <p class="text-danger">Không có ảnh</p>
                                @endforelse

                            </div>
                        </div>

                        {{-- // Product Details Data --}}
                        <div class="col-md-8">
                            <h5 class="mb-3">Thông tin sách</h5>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Tên:</strong> {{ $product->name }} </li>
                                <li class="list-group-item"><strong>Mã sách:</strong> {{ $product->code }} </li>
                                <li class="list-group-item"><strong>Kho:</strong> {{ $product->warehouse->name }} </li>
                                <li class="list-group-item"><strong>Nhà cung cấp:</strong> {{ $product->supplier->name }}
                                </li>
                                <li class="list-group-item"><strong>Thể loại:</strong>
                                    {{ $product->category->category_name }} </li>
                                <li class="list-group-item"><strong>Thương hiệu:</strong> {{ $product->brand->name }} </li>
                                <li class="list-group-item"><strong>Giá:</strong> {{ $product->price }} </li>
                                <li class="list-group-item"><strong>Cảnh báo tồn kho:</strong> {{ $product->stock_alert }}
                                </li>
                                <li class="list-group-item"><strong>Số lượng:</strong> {{ $product->product_qty }} </li>
                                <li class="list-group-item"><strong>Trạng thái:</strong> {{ $product->status }} </li>
                                <li class="list-group-item"><strong>Ghi chú:</strong> {{ $product->note }} </li>
                                <li class="list-group-item"><strong>Ngày tạo:</strong>
                                    {{ \Carbon\Carbon::parse($product->created_at)->format('d F Y')  }} </li>

                            </ul>

                        </div>


                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection