@extends('Admin.layouts.template')
@section('pagetitle')
    Admin Dashboard
@endsection
@section('content')
    <div class="container">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Update Product</h5>

                    <small class="text-muted float-end">Product Info</small>
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
                    <form action="{{route('Update_Product_data')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$Product_info->id}}" name="Product_id" id="Product_id">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                            <div class="col-sm-10">
                            <input type="text" value="{{$Product_info->Product_name}}" class="form-control" name="Product_name" id="Product_name" placeholder="tshirt" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                            <div class="col-sm-10">
                            <input type="text" value="{{$Product_info->Quantity}}" class="form-control" name="Quantity" id="Quantity" placeholder="100" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$Product_info->Price}}" class="form-control" name="Price" id="Price" placeholder="100" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="Product_short_description" id="Product_short_description" cols="30" rows="3">{{$Product_info->Product_short_description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="Product_long_description" id="Product_long_description" cols="30" rows="3">{{$Product_info->Product_long_description}}</textarea>
                            </div>
                        </div> 

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="category_id" name="category_id">
                                    @foreach ($categories as $item)
                                    @if ($item->category_name==$Product_info->category_name)
                                        <option value="{{$item->id}}" selected>{{$item->category_name}}</option>
                                    @else
                                        <option value="{{$item->id}}">{{$item->category_name}}</option>

                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Old Image</label>
                            <div class="product-box border" style="margin-left: 15px;">
                                <img  src="{{ asset($Product_info->Product_Image) }}" alt="">
                            </div>   
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product New Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file"name='Product_Image' id="Product_Image" />
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">UPDATE PRODUCT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection