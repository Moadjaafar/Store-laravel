@extends('Admin.layouts.template')
@section('pagetitle')
    Admin Dashboard
@endsection
@section('content')
<div class="card radius-10 w-100">
    <div class="card-body">
      <div class="d-flex align-items-center">
        <h6 class="mb-0">Recent Orders</h6>
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
              <th>Product</th>
              <th>Quantity</th>
              <th>Totale Price</th>
              <th>Client Info</th>
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($client_Infos as $itemee)
            <tr>
                <td>{{$itemee->id}}</td>
                @php
                    $producttoorder=App\Models\Product_for_order::where('Order_Info_Id',$itemee->id)->pluck('product_id')->toArray();
                    $producttoorderinto=App\Models\Product_for_order::where('Order_Info_Id',$itemee->id)->get();

                    $Products = App\Models\Product::whereIn('id', $producttoorder)->get();
                @endphp
                <td>
                    @foreach ($Products as $item)
                    <div class="d-flex align-items-center gap-3">
                        <div class="product-box border">
                          <img src="{{asset($item->Product_Image)}}" alt="">
                        </div>
                        <div class="product-info">
                          <h6 class="product-name mb-1">{{$item->Product_name}}</h6>
                        </div>
                    </div>
                    @endforeach
                </td>
                <td>
                    @foreach ($producttoorderinto as $item)
                        <div class="tab_element">{{$item->Quantity}}</div>
                    @endforeach
                </td>
                <td>
                  @foreach ($producttoorderinto as $item)
                  <div class="tab_element">{{$item->TotalPrice}} DH</div>
                  @endforeach
                </td>
                <td>
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#example{{$itemee->id}}">Client Information</button>  
                </td>
                <td>Apr 8, 2021</td>
                <td><span class="badge bg-success">{{$itemee->Status}}</span></td>
                <td>
                  <div class="d-flex align-items-center gap-3 fs-6">
                      <a href="{{route('Termines_commande',$itemee->id)}}" style="cursor: pointer;" class="text-success btnstatusorder" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Confirmed" aria-label="Confirmed">
                          <img src="{{asset('Dahsboard/assets/images/icons/check-mark.png')}}" alt="">
                      </a>

                      <a href="{{route('Annules_commande',$itemee->id)}}" style="cursor: pointer;" class="text-danger btnstatusorder" data-bs-toggle="tooltip" data-bs-placement="bottom"
                      title="" data-bs-original-title="Canceled" aria-label="Canceled">
                      <img src="{{asset('Dahsboard/assets/images/icons/cancel1.png')}}" alt="">
                      </a>

                      <a href="{{route('Delete_commande',$itemee->id)}}" style="cursor: pointer;" class="text-danger btnstatusorder" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Canceled" aria-label="Canceled">
                          <img src="{{asset('Dahsboard/assets/images/icons/delete.png')}}" alt="">
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

  @foreach ($client_Infos as $item)
  <div class="modal fade" id="example{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Client Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div>
                <label for="" class="model_element">Fist_Name :</label>
                <input class="form-control" type="text" value="{{$item->Fist_Name}}">
            </div>
            <div>
                <label for="" class="model_element">Last_Name :</label>
                <input type="text" class="form-control"  value="{{$item->Last_Name}}">
            </div>
            <div>
                <label for="" class="model_element">Phone_number :</label>
                <input type="text" class="form-control"  value="{{$item->Phone_number}}">

            </div>
            <div>
                <label for="" class="model_element">Email :</label>
                <input type="text" class="form-control" value="{{$item->Email}}">
            </div>
            <div>
                <label for="" class="model_element">Address :</label>
                <input type="text" class="form-control" value="{{$item->Address}}">
            </div>
            <div>
                <label for="" class="model_element">City :</label>
                <input type="text" class="form-control" value="{{$item->City}}">
            </div>
            <div>
                <label for="" class="model_element">Order_Notes :</label>
                <input type="text" class="form-control" value="{{$item->Order_Notes}}">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
  @endforeach
  
@endsection