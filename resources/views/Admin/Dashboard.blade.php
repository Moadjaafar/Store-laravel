@extends('Admin.layouts.template')
@section('pagetitle')
    Admin Dashboard
@endsection
@section('content')
{{-- <div class="card radius-10">
    <div class="card-body">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4 g-3">
        <div class="col">
          <div class="card radius-10 shadow-none bg-light-success mb-0">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="fs-2 text-success"><img src="{{asset('Dahsboard/assets/images/icons/car.png')}}" alt=""></div>
                <div class="fs-6 ms-auto text-success"><ion-icon name="ellipsis-horizontal-sharp"></ion-icon></div>
              </div>
              <div class="d-flex align-items-center mt-4">
                <div class="">
                  <p class="mb-1 text-success">Total Produits</p>
                  <h4 class="mb-0 text-success">33</h4>
                </div>
                <div class="ms-auto">
                  <p class="mb-0 text-success">4.9 <ion-icon name="arrow-up-sharp"></ion-icon></p>
                </div>
              </div>
            </div>
          </div>
        </div>
         <div class="col">
          <div class="card radius-10 shadow-none bg-light-primary mb-0">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="fs-2 text-primary"><img src="{{asset('Dahsboard/assets/images/icons/png2.png')}}" alt=""></div>
                <div class="fs-6 ms-auto text-primary"><ion-icon name="ellipsis-horizontal-sharp"></ion-icon></div>
              </div>
              <div class="d-flex align-items-center mt-4">
                <div class="">
                  <p class="mb-1 text-primary">Total Marks</p>
                  <h4 class="mb-0 text-primary">33</h4>
                </div>
                <div class="ms-auto">
                  <p class="mb-0 text-primary">5.6 <ion-icon name="arrow-up-sharp"></ion-icon></p>
                </div>
              </div>
            </div>
          </div>
         </div>
         <div class="col">
          <div class="card radius-10 shadow-none bg-light-danger mb-0">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="fs-2 text-danger"><img src="{{asset('Dahsboard/assets/images/icons/png3.png')}}" alt=""></div>
                <div class="fs-6 ms-auto text-danger"><ion-icon name="ellipsis-horizontal-sharp"></ion-icon></div>
              </div>
              <div class="d-flex align-items-center mt-4">
                <div class="">
                  <p class="mb-1 text-danger">Total Bookings</p>
                  <h4 class="mb-0 text-danger">33</h4>
                </div>
                <div class="ms-auto">
                  <p class="mb-0 text-danger">8.7 <ion-icon name="arrow-up-sharp"></ion-icon></p>
                </div>
              </div>
            </div>
          </div>
         </div>
         <div class="col">
          <div class="card radius-10 shadow-none bg-light-warning mb-0">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="fs-2 text-warning"><img src="{{asset('Dahsboard/assets/images/icons/png4.png')}}" alt=""></div>
                <div class="fs-6 ms-auto text-warning"><ion-icon name="ellipsis-horizontal-sharp"></ion-icon></div>
              </div>
              <div class="d-flex align-items-center mt-4">
                <div class="">
                  <p class="mb-1 text-warning">Total Users</p>
                  <h4 class="mb-0 text-warning">33</h4>
                </div>
                <div class="ms-auto">
                  <p class="mb-0 text-warning">4.2 <ion-icon name="arrow-up-sharp"></ion-icon></p>
                </div>
              </div>
            </div>
          </div>
         </div>
         
         <div class="col">
            <div class="card radius-10 shadow-none bg-light-success mb-0">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="fs-2 text-success"><img src="{{asset('Dahsboard/assets/images/icons/png5.png')}}" alt=""></div>
                  <div class="fs-6 ms-auto text-success"><ion-icon name="ellipsis-horizontal-sharp"></ion-icon></div>
                </div>
                <div class="d-flex align-items-center mt-4">
                  <div class="">
                    <p class="mb-1 text-success">Pending Bookings</p>
                    <h4 class="mb-0 text-success">33</h4>
                  </div>
                  <div class="ms-auto">
                    <p class="mb-0 text-success">4.9 <ion-icon name="arrow-up-sharp"></ion-icon></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <div class="col">
            <div class="card radius-10 shadow-none bg-light-primary mb-0">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="fs-2 text-primary"><img src="{{asset('Dahsboard/assets/images/icons/png6.png')}}" alt=""></div>
                  <div class="fs-6 ms-auto text-primary"><ion-icon name="ellipsis-horizontal-sharp"></ion-icon></div>
                </div>
                <div class="d-flex align-items-center mt-4">
                  <div class="">
                    <p class="mb-1 text-primary">Confirmed Bookings</p>
                    <h4 class="mb-0 text-primary">33</h4>
                  </div>
                  <div class="ms-auto">
                    <p class="mb-0 text-primary">5.6 <ion-icon name="arrow-up-sharp"></ion-icon></p>
                  </div>
                </div>
              </div>
            </div>
           </div>
           <div class="col">
            <div class="card radius-10 shadow-none bg-light-danger mb-0">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="fs-2 text-danger"><img src="{{asset('Dahsboard/assets/images/icons/png7.png')}}" alt=""></div>
                  <div class="fs-6 ms-auto text-danger"><ion-icon name="ellipsis-horizontal-sharp"></ion-icon></div>
                </div>
                <div class="d-flex align-items-center mt-4">
                  <div class="">
                    <p class="mb-1 text-danger">Canceled Bookings</p>
                    <h4 class="mb-0 text-danger">33</h4>
                  </div>
                  <div class="ms-auto">
                    <p class="mb-0 text-danger">8.7 <ion-icon name="arrow-up-sharp"></ion-icon></p>
                  </div>
                </div>
              </div>
            </div>
           </div>
        </div><!--end row-->
    </div>
</div> --}}
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
    <div class="col">
      <div class="card radius-10">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1">Total Produits</p>
              <h4 class="mb-0 text-primary">248</h4>
            </div>
            <div class="ms-auto text-primary fs-2">
                <img src="{{asset('Dahsboard/assets/images/icons/package.png')}}" style="width: 50px;" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card radius-10">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1">Totale Orders</p>
              <h4 class="mb-0 text-danger">12</h4>
            </div>
            <div class="ms-auto text-danger fs-2">
                <img src="{{asset('Dahsboard/assets/images/icons/order-now.png')}}" style="width: 50px;" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card radius-10">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1">Confirmed Orders</p>
              <h4 class="mb-0 text-success">35</h4>
            </div>
            <div class="ms-auto text-success fs-2">
                <img src="{{asset('Dahsboard/assets/images/icons/confirmation.png')}}" style="width: 50px;" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card radius-10">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1">Canceled Orders</p>
              <h4 class="mb-0 text-danger">15</h4>
            </div>
            <div class="ms-auto text-danger fs-2">
                <img src="{{asset('Dahsboard/assets/images/icons/cancel.png')}}" style="width: 50px;" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card radius-10 bg-primary">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1 text-white">Shipping Orders</p>
              <h4 class="mb-0 text-white">24</h4>
            </div>
            <div class="ms-auto text-white fs-2">
                <img src="{{asset('Dahsboard/assets/images/icons/fast-delivery.png')}}" style="width: 50px;" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card radius-10 bg-danger">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1 text-white">Delivered Orders</p>
              <h4 class="mb-0 text-white">12</h4>
            </div>
            <div class="ms-auto text-white fs-2">
                <img src="{{asset('Dahsboard/assets/images/icons/delivered.png')}}" style="width: 50px;" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card radius-10 bg-success">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1 text-white">Not Delevred Orders</p>
              <h4 class="mb-0 text-white">35</h4>
            </div>
            <div class="ms-auto text-white fs-2">
                <img src="{{asset('Dahsboard/assets/images/icons/delivery-cancelled.png')}}" style="width: 50px;" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card radius-10 bg-dark">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1 text-white">Totale Client</p>
              <h4 class="mb-0 text-white">100</h4>
            </div>
            <div class="ms-auto text-white fs-2">
                <img src="{{asset('Dahsboard/assets/images/icons/customer.png')}}" style="width: 50px;" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!--end row-->
@endsection