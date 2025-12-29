@extends('admin.admin_master')
@section('admin')

   <div class="content d-flex flex-column flex-column-fluid">
      <div class="d-flex flex-column-fluid">
         <div class="container-fluid my-0">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
               <div class="flex-grow-1">
                  <h2 class="fs-22 fw-semibold m-0">Chỉnh sửa sách</h2>
               </div>

               <div class="text-end">
                  <ol class="breadcrumb m-0 py-0">
                     <a href="{{ route('all.product') }}" class="btn btn-dark">Quay lại</a>
                  </ol>
               </div>
            </div>
            <div class="card">
               <div class="card-body">
                  <form action="{{ route('update.product') }}" method="post" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="id" value="{{ $editData->id }}">

                     <div class="row">
                        <div class="col-xl-8">
                           <div class="card">
                              <div class="row">
                                 <div class="col-md-6 mb-3">
                                    <label class="form-label">Tên sách: <span class="text-danger">*</span></label>
                                    <input type="text" name="name" placeholder="Nhập tên sách" class="form-control"
                                       value="{{ $editData->name }}">
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label class="form-label">Mã sách: <span class="text-danger">*</span></label>
                                    <input type="text" name="code" class=" form-control" value="{{ $editData->code }}">

                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <div class="form-group w-100">
                                       <label class="form-label" for="formBasic">Thể loại sách : <span
                                             class="text-danger">*</span></label>
                                       <select name="category_id" id="category_id" class="form-control form-select">
                                          <option value="">Chọn thể loại</option>
                                          @foreach ($categories as $item)
                                             <option value="{{ $item->id }}" {{ $item->id == $editData->category_id ? 'selected' : ''}}>{{ $item->category_name }}</option>
                                          @endforeach
                                       </select>

                                    </div>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <div class="form-group w-100">
                                       <label class="form-label" for="formBasic">Thương hiệu : <span
                                             class="text-danger">*</span></label>
                                       <select name="brand_id" id="brand_id" class="form-control form-select">
                                          <option value="">Chọn thương hiệu</option>
                                          @foreach ($brands as $item)
                                             <option value="{{ $item->id }}" {{ $item->id == $editData->brand_id ? 'selected' : ''}}>{{ $item->name }}</option>
                                          @endforeach
                                       </select>

                                    </div>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label class="form-label">Giá sách: </label>
                                    <input type="text" name="price" class="form-control" value="{{ $editData->price }}">

                                 </div>


                                 <div class="col-md-6 mb-3">
                                    <label class="form-label">Cảnh báo tồn kho: <span class="text-danger">*</span></label>
                                    <input type="number" name="stock_alert" class="form-control"
                                       value="{{ $editData->stock_alert }}" min="0" required>

                                 </div>

                                 <div class="col-md-12">
                                    <label class="form-label">Ghi chú: </label>
                                    <textarea class="form-control" name="note" rows="3"
                                       placeholder="Nhập ghi chú">{{ $editData->note }}</textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-4">
                           <div class="card">
                              <label class="form-label">Ảnh sách (nhiều): <span class="text-danger">*</span></label>
                              <div class="mb-3">
                                 <input name="image[]" accept=".png, .jpg, .jpeg" multiple="" type="file" id="multiImg"
                                    class="upload-input-file form-control">
                              </div>

                              <div class="row" id="preview_img">
                                 @if (isset($editData) && $editData->images->count() > 0)
                                    @foreach ($editData->images as $img)
                                       <div class="col-md-3 mb-2">
                                          <img src="{{ asset($img->image) }}" alt="Product image" class="img-thumbnail">

                                          <div class="form-check mt-1">
                                             <input class="form-check-input" type="checkbox" name="remove_image[]"
                                                value="{{ $img->id }}" id="remove_image_{{ $img->id }}">
                                             <label for="remove_image_{{ $img->id }}" class="form-check-label">Remove</label>
                                          </div>

                                       </div>

                                    @endforeach

                                 @endif


                              </div>
                           </div>
                           <div>
                              <div class="col-md-12 mb-3">
                                 <h4 class="text-center">Thêm tồn kho : </h4>
                              </div>
                              <div class="col-md-12 mb-3">
                                 <div class="form-group w-100">
                                    <label class="form-label" for="formBasic">Kho : <span
                                          class="text-danger">*</span></label>
                                    <select name="warehouse_id" id="warehouse_id" class="form-control form-select">
                                       <option value="">Select Warehouse</option>
                                       @foreach ($warehouses as $item)
                                          <option value="{{ $item->id }}" {{ $item->id == $editData->warehouse_id ? 'selected' : ''}}>{{ $item->name }}</option>
                                       @endforeach
                                    </select>

                                 </div>
                              </div>
                              <div class="col-md-12 mb-3">
                                 <div class="form-group w-100">
                                    <label class="form-label" for="formBasic">Nhà cung cấp : <span
                                          class="text-danger">*</span></label>
                                    <select name="supplier_id" id="supplier_id" class="form-control form-select">
                                       <option value="">Select Supplier</option>
                                       @foreach ($suppliers as $item)
                                          <option value="{{ $item->id }}" {{ $item->id == $editData->supplier_id ? 'selected' : ''}}>{{ $item->name }}</option>
                                       @endforeach
                                    </select>

                                 </div>
                              </div>

                              <div class="col-md-12 mb-3">
                                 <label class="form-label">Số lượng sách: <span class="text-danger">*</span></label>
                                 <input type="number" name="product_qty" class="form-control"
                                    value="{{ $editData->product_qty }}" min="1" required>

                              </div>

                              <div class="col-md-12">
                                 <div class="form-group w-100">
                                    <label class="form-label" for="formBasic">Trạng thái : <span
                                          class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control form-select">
                                       <option selected="">Select Status</option>

                                       <option value="Received" {{ (isset($editData->status) && $editData->status == 'Received') ? 'selected' : '' }}>Received</option>

                                       <option value="Pending" {{ (isset($editData->status) && $editData->status == 'Pending') ? 'selected' : '' }}>Pending</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-12">
                           <div class="d-flex mt-5 justify-content-start">
                              <button class="btn btn-primary me-3" type="submit">Lưu</button>
                              <a class="btn btn-secondary" href="{{ route('all.product') }}">Hủy</a>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>


@endsection