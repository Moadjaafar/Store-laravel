@extends('Admin.layouts.template')
@section('pagetitle')
    Admin Dashboard
@endsection
@section('content')
    <div class="container">
        <div class="col-xxl mt-5">
            <div class="card mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update Category</h5>

                <small class="text-muted float-end">Category Info</small>
              </div>
              
              <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                <form action="{{route('Update_category_data')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" value="{{$category_info->id}}" name="category_id" id="category_id">
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                    <div class="col-sm-10">
                      <input value="{{$category_info->category_name}}" type="text" class="form-control" name="category_name" id="category_name" placeholder="tshirt" />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Category Old Image</label>
                    <div class="product-box border" style="margin-left: 15px;">
                        <img  src="{{ asset($category_info->category_img) }}" alt="">
                    </div>   
                  </div>

                  <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-name">Category New Image</label>
                      <div class="col-sm-10">
                          <input class="form-control" type="file" name='category_img' id="category_img" />
                      </div>
                  </div>

                  <div class="row justify-content-end">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">UPDATE CATEGORY</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection