@extends('user_pages.layouts.Home_page')
@section('content')
<div class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row row-cols-1">
            <div class="col">
                <div class="breadcrumb__content text-center">
                    <h1 class="breadcrumb__content--title">Product</h1>
                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                        <li class="breadcrumb__content--menu__items"><a href="index.html">Home</a></li>
                        <li class="breadcrumb__content--menu__items"><span>Product</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__filter--sidebar widget__area">
    <button type="button" class="offcanvas__filter--close" data-offcanvas>
        <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path></svg> <span class="offcanvas__filter--close__text">Close</span>
    </button>
    <div class="offcanvas__filter--sidebar__inner">
        <div class="single__widget price__filter widget__bg">
            <h2 class="widget__title h3">Filter By Price</h2>
            <form class="price__filter--form" action="{{route('Filter_listProduct')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                    <div class="price__filter--group">
                        <label class="price__filter--label" for="Filter-Price-GTE1">From</label>
                        <div class="price__filter--input border-radius-5 d-flex align-items-center">
                            <span class="price__filter--currency">DH</span>
                            <input class="price__filter--input__field border-0" name="lower_price" id="Filter-Price-GTE1" value="0" type="number" placeholder="0" min="0" max="20000">
                        </div>
                    </div>
                    <div class="price__divider">
                        <span>-</span>
                    </div>
                    <div class="price__filter--group">
                        <label class="price__filter--label" for="Filter-Price-LTE1">To</label>
                        <div class="price__filter--input border-radius-5 d-flex align-items-center">
                            <span class="price__filter--currency">DH</span>
                            <input class="price__filter--input__field border-0" name="highe_price" id="Filter-Price-LTE1" value="0" type="number" min="0" placeholder="20000" max="20000"> 
                        </div>	
                    </div>
                </div>
                <div class="mb-15">
                    <h2 class="widget__title h3">Category</h2>
                    <select class="mb-3 searchselect" name="Product_category" aria-label=".form-select-lg example">
                        <option selected value="All" hidden class="optionselect">Open this select menu</option>
                        <option value="All" class="optionselect">All Categorys</option>
                        @foreach ($categorys as $item)

                        <option value="{{$item->id}}" class="optionselect">{{$item->category_name}}</option>

                        @endforeach
                    </select>
                </div>
                
                <button class="primary__btn price__filter--btn" type="submit">Filter</button>
            </form>
        </div>
    </div>
</div>

<main class="main__content_wrapper">

    <!-- Start shop section -->
    <div class="shop__section section--padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shop__product--wrapper position__sticky">
                        <div class="shop__header d-flex align-items-center justify-content-between mb-30">
                            <div class="product__view--mode d-flex align-items-center">
                                <button class="widget__filter--btn align-items-center" data-offcanvas>
                                    <svg  class="widget__filter--btn__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80"/><circle cx="336" cy="128" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/><circle cx="176" cy="256" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/><circle cx="336" cy="384" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/></svg> 
                                    <span class="widget__filter--btn__text">Filter</span>
                                </button>
                                <div class="product__view--mode__list product__short--by align-items-center d-flex">
                                    <label class="product__view--label">Sort By :</label>
                                    <div class="dropdown">
                                        <button class="btn btn-lg dropdown-toggle dropdownselect" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Select
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="{{route('Get_Product_List_by_latest')}}">Sort by latest</a></li>
                                          <li><a class="dropdown-item" href="{{route('Get_Product_List_by_oldest')}}">Sort by oldest</a></li>
                                        </ul>
                                    </div>
                                     
                                </div>
                                <div class="product__view--mode__list">
                                    <div class="product__tab--one product__grid--column__buttons d-flex justify-content-center">
                                        <button class="product__grid--column__buttons--icons active" aria-label="grid btn" data-toggle="tab" data-target="#product_grid">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 9 9">
                                                <g  transform="translate(-1360 -479)">
                                                  <rect id="Rectangle_5725" data-name="Rectangle 5725" width="4" height="4" transform="translate(1360 479)" fill="currentColor"/>
                                                  <rect id="Rectangle_5727" data-name="Rectangle 5727" width="4" height="4" transform="translate(1360 484)" fill="currentColor"/>
                                                  <rect id="Rectangle_5726" data-name="Rectangle 5726" width="4" height="4" transform="translate(1365 479)" fill="currentColor"/>
                                                  <rect id="Rectangle_5728" data-name="Rectangle 5728" width="4" height="4" transform="translate(1365 484)" fill="currentColor"/>
                                                </g>
                                            </svg>
                                        </button>
                                        <button class="product__grid--column__buttons--icons" aria-label="list btn" data-toggle="tab" data-target="#product_list">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 13 8">
                                                <g id="Group_14700" data-name="Group 14700" transform="translate(-1376 -478)">
                                                  <g  transform="translate(12 -2)">
                                                    <g id="Group_1326" data-name="Group 1326">
                                                      <rect id="Rectangle_5729" data-name="Rectangle 5729" width="3" height="2" transform="translate(1364 483)" fill="currentColor"/>
                                                      <rect id="Rectangle_5730" data-name="Rectangle 5730" width="9" height="2" transform="translate(1368 483)" fill="currentColor"/>
                                                    </g>
                                                    <g id="Group_1328" data-name="Group 1328" transform="translate(0 -3)">
                                                      <rect id="Rectangle_5729-2" data-name="Rectangle 5729" width="3" height="2" transform="translate(1364 483)" fill="currentColor"/>
                                                      <rect id="Rectangle_5730-2" data-name="Rectangle 5730" width="9" height="2" transform="translate(1368 483)" fill="currentColor"/>
                                                    </g>
                                                    <g id="Group_1327" data-name="Group 1327" transform="translate(0 -1)">
                                                      <rect id="Rectangle_5731" data-name="Rectangle 5731" width="3" height="2" transform="translate(1364 487)" fill="currentColor"/>
                                                      <rect id="Rectangle_5732" data-name="Rectangle 5732" width="9" height="2" transform="translate(1368 487)" fill="currentColor"/>
                                                    </g>
                                                  </g>
                                                </g>
                                              </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <p class="product__showing--count">Showing 1–9 of 21 results</p>
                        </div>
                        <div class="tab_content">
                            <div id="product_grid" class="tab_pane active show">
                                    <div class="product__section--inner">
                                        <div class="row mb--n30">
                                            @foreach ($Products as $item)

                                            <div class="col-lg-3 col-md-4 col-sm-6 col-6 custom-col mb-30">
                                                <article class="product__card">
                                                    <div class="product__card--thumbnail">
                                                        <a class="product__card--thumbnail__link display-block" href="{{route('Product_Details',$item->id)}}">
                                                            <img class="product__card--thumbnail__img product__primary--img" src="{{ asset($item->Product_Image) }}" alt="product-img">
                                                            <img class="product__card--thumbnail__img product__secondary--img" src="{{ asset($item->Product_Image) }}" alt="product-img">
                                                        </a>
                                                        <span class="product__badge">-{{$item->Discount}}%</span>
                                                        <ul class="product__card--action">
                                                            <li class="product__card--action__list">
                                                                @livewire('toastr-notification',['product_id' => $item->id])
                                                            </li>
                                                        </ul>
                                                        <div class="product__add--to__card">
                                                            @livewire('add-to-cart',['product_id' => $item->id])
                                                        </div>
                                                    </div>
                                                    <div class="product__card--content text-center">
                                                        <ul class="rating product__card--rating d-flex justify-content-center">
                                                            <li class="rating__list">
                                                                <span class="rating__icon">
                                                                    <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"/>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="rating__list">
                                                                <span class="rating__icon">
                                                                    <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"/>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="rating__list">
                                                                <span class="rating__icon">
                                                                    <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"/>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="rating__list">
                                                                <span class="rating__icon"> 
                                                                    <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor"/>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li class="rating__list">
                                                                <span class="rating__icon"> 
                                                                    <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor"/>
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <span class="rating__review--text">(126) Review</span>
                                                            </li>
                                                        </ul>
                                                        <h3 class="product__card--title"><a href="{{route('Product_Details',$item->id)}}">{{$item->Product_name}}</a></h3>
                                                        <div class="product__card--price">
                                                            <span class="current__price">{{$item->Price}} DH</span>
                                                            <span class="old__price">{{$item->Price_befor_Discount}} DH</span>
                                                        </div>  
                                                    </div>
                                                </article>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                            </div>
                            <div id="product_list" class="tab_pane">
                                <div class="product__section--inner product__section--style3__inner">
                                    <div class="row row-cols-1 mb--n30">
                                        @foreach ($Products as $item)
                                        <div class="col mb-30">
                                            <div class="product__card product__list d-flex align-items-center">
                                                <div class="product__card--thumbnail product__list--thumbnail">
                                                    <a class="product__card--thumbnail__link display-block" href="{{route('Product_Details',$item->id)}}">
                                                        <img class="product__card--thumbnail__img product__primary--img" src="{{ asset($item->Product_Image) }}" alt="product-img">
                                                        <img class="product__card--thumbnail__img product__secondary--img" src="{{ asset($item->Product_Image) }}" alt="product-img">
                                                    </a>
                                                    <span class="product__badge">-{{$item->Discount}}%</span>
                                                    <ul class="product__card--action">
                                                        <li class="product__card--action__list">
                                                            @livewire('toastr-notification',['product_id' => $item->id])

                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__card--content product__list--content">
                                                    <h3 class="product__card--title"><a href="product-details.html">{{$item->Product_name}}</a></h3>
                                                    <ul class="rating product__card--rating d-flex">
                                                        <li class="rating__list">
                                                            <span class="rating__icon">
                                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"/>
                                                                </svg>
                                                            </span>
                                                        </li>
                                                        <li class="rating__list">
                                                            <span class="rating__icon">
                                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"/>
                                                                </svg>
                                                            </span>
                                                        </li>
                                                        <li class="rating__list">
                                                            <span class="rating__icon">
                                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"/>
                                                                </svg>
                                                            </span>
                                                        </li>
                                                        <li class="rating__list">
                                                            <span class="rating__icon"> 
                                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor"/>
                                                                    </svg>
                                                            </span>
                                                        </li>
                                                        <li class="rating__list">
                                                            <span class="rating__icon"> 
                                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor"/>
                                                                    </svg>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="rating__review--text">(106) Review</span>
                                                        </li>
                                                    </ul>
                                                    <div class="product__list--price">
                                                        <span class="current__price">{{$item->Price}} DH</span>
                                                        <span class="old__price">{{$item->Price_befor_Discount}} DH</span>
                                                    </div>
                                                    <p class="product__card--content__desc mb-15">{{$item->Product_short_description}}</p>
                                                    {{-- <a class="product__card--btn primary__btn" href="cart.html">+ Add to cart</a> --}}
                                                    @livewire('add-to-cart-btn',['product_id' => $item->id])

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination__area">
                            
                            {{$Products->links('vendor.pagination.custeme')}}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End shop section -->
    <!--  shop cart -->
    @livewire('updated-data')

    <!-- Start feature section -->
    
    <!-- End feature section -->

</main>

@endsection