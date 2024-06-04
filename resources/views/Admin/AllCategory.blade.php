@extends('Admin.layouts.template')
@section('pagetitle')
    Admin Dashboard
@endsection
@section('content')
    {{-- <div class="container mt-5">
        <div class="card">
            <h5 class="card-header">All Categorys</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                  {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">                      
                  <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Product in Category</th>
                    <th>Category Image</th>
                    <th>Actions</th>
                  </tr>
                </thead>

                <tbody class="table-border-bottom-0">
                  @foreach ($category as $catt)
                    <tr>
                      <th>{{$catt->id}}</th>
                      <td>{{$catt->category_name}}</td>
                      <td>{{$catt->product_count}}</td>
                      <td><img class="form-control" style="height: 100px" src="{{ asset($catt->category_img) }}" alt=""></td>
                      <td>
                          <a href="{{route('Update_category',$catt->id)}}" class="btn btn-primary">UPDATE</a>
                          <a href="{{route('Delete_category',$catt->id)}}" class="btn btn-warning">DELETE</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </div> --}}
<div class="card radius-10 w-100">
  <div class="card-body">
    <div class="d-flex align-items-center">
      <h6 class="mb-0">Products</h6>
      <div class="fs-5 ms-auto dropdown">
        <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i
            class="bi bi-three-dots"></i></div>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </div>
    </div>
    <div class="table-responsive mt-2">
      <table class="table align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>#ID</th>
            <th>Category Image</th>
            <th>Category Name</th>
            <th>Products in this category</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($category as $catt)
              <tr>
              <td>{{$catt->id}}</td>
              <td>
                  <div class="d-flex align-items-center gap-3">
                  <div class="product-box border">
                      <img src="{{ asset($catt->category_img) }}" alt="">
                  </div>
                  
                  </div>
              </td>
              <td>{{$catt->category_name}}</td>
              <td>{{$catt->product_count}}</td>
              <td>Apr 8, 2021</td>
              <td>
                  <div class="d-flex align-items-center gap-3 fs-6">
                  <a href="{{route('Update_category',$catt->id)}}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="" data-bs-original-title="View detail" aria-label="Views">
                      <ion-icon name="eye-outline"></ion-icon>
                  </a>
                  <a href="{{route('Update_category',$catt->id)}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="" data-bs-original-title="Edit info" aria-label="Edit">
                      <ion-icon name="pencil-outline"></ion-icon>
                  </a>
                  <a href="{{route('Delete_category',$catt->id)}}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="" data-bs-original-title="Delete" aria-label="Delete">
                      <ion-icon name="trash-outline"></ion-icon>
                  </a>
                  </div>
              </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
