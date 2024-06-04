@extends('Admin.layouts.template')
@section('pagetitle')
    Admin Dashboard
@endsection
@section('content')
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
              <th>Product Image</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Products as $item)
                <tr>
                <td>{{$item->id}}</td>
                <td>
                    <div class="d-flex align-items-center gap-3">
                    <div class="product-box border">
                        <img src="{{ asset($item->Product_Image) }}" alt="">
                    </div>
                    <div class="product-info">
                        <h6 class="product-name mb-1">{{$item->Product_name}}</h6>
                    </div>
                    </div>
                </td>
                <td>{{$item->Quantity}}</td>
                <td>{{$item->Price}}</td>
                <td>Apr 8, 2021</td>
                <td>
                    <div class="d-flex align-items-center gap-3 fs-6">
                    <a href="{{route('Update_Product_forme',$item->id)}}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="" data-bs-original-title="View detail" aria-label="Views">
                        <ion-icon name="eye-outline"></ion-icon>
                    </a>
                    <a href="{{route('Update_Product_forme',$item->id)}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="" data-bs-original-title="Edit info" aria-label="Edit">
                        <ion-icon name="pencil-outline"></ion-icon>
                    </a>
                    <a href="{{route('Delete_product',$item->id)}}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
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
