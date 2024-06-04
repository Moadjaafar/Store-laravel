@extends('user_pages.layouts.Home_page')
@section('content')


<main class="main__content_wrapper">
    
    <section class="hero__slider--section">
        <div class="hero__slider--activation swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="home__three--slider__items">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-md-7 offset-lg-2">
                                    <div class="slider__content text-center">
                                        
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop__collection--section section--padding marginsofShop_By_Category">
        <div class="container">
            <div class="section__heading text-center mb-40">
                <h2 class="section__heading--maintitle">Shop By Category</h2>
            </div>
            <div class="shop__collection--column5 swiper">
                <div class="swiper-wrapper" style="justify-content: center;">
                    @foreach ($categorys as $item)
                    <div class="swiper-slide">
                        <div class="shop__collection--card text-center">
                            <a class="shop__collection--link" href="{{route('Search_by_categoys',$item->id)}}">
                                <img class="shop__collection--img categoryimg" src="{{ asset($item->category_img) }}" alt="icon-img">
                                <h3 class="shop__collection--title mb-0">{{$item->category_name}}</h3>
                                <span class="shop__collection--subtitle">25 Items</span>
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="swiper__nav--btn swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </div>
                <div class="swiper__nav--btn swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </div>
            </div>
        </div>
    </section>
    

    <section class="product__section section--padding">
        <div class="container">
            <div class="section__heading text-center mb-40">
                <h2 class="section__heading--maintitle">TRENDING PRODUCT</h2>
            </div>
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
                                        <li>
                                            <span class="rating__review--text">(126) Review</span>
                                        </li>
                                    </ul>
                                    <h3 class="product__card--title"><a href="product-details.html">{{$item->Product_name}}</a></h3>
                                    <div class="product__card--price">
                                        <span class="current__price">{{$item->Price}} DH</span>
                                        <span class="old__price">{{$item->Price_befor_Discount}} DH</span>
                                    </div>  
                                </div>
                            </article>
                        </div> 
                    @endforeach
                </div>
                <div class="product__load--more text-center">
                    <a class="load__more--btn primary__btn" href="{{route('Product_List')}}">Load More</a>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="banner__section section--padding pt-0">
        <div class="container-fluid p-0">
            <div class="row no-gutter mb--n30">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                    <div class="banner__box border-radius-5 position-relative">
                        <a class="display-block" href=""><img class="banner__box--thumbnail border-radius-5 imgbanner" style="height: 550px;" src="{{asset('Home/assets/img/product/main-product/Design sans titre.jpg')}}" alt="banner-img">
                            <div class="fullwidth__banner--box__content left">
                                <p class="fullwidth__banner--box__subtitle">Store Beautlux</p>
                                <h2 class="fullwidth__banner--box__title ">Jewellery <br>
                                    Online</h2>
                                <span class="banner__box--content__btn primary__btn">SHOP NOW </span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                    <div class="banner__box border-radius-5 position-relative">
                        <a class="display-block" href="{{route('Product_List')}}"><img class="banner__box--thumbnail border-radius-5 imgbanner" style="height: 550px;" src="{{asset('Home/assets/img/product/main-product/pexels-pixabay-266621.jpg')}}" alt="banner-img">
                            <div class="fullwidth__banner--box__content right">
                                <p class="fullwidth__banner--box__subtitle">Store Beautlux</p>
                                <h2 class="fullwidth__banner--box__title ">Rings <br>
                                    Collections</h2>
                                <span class="banner__box--content__btn primary__btn">SHOP NOW </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- start lookbook banenr section -->
    <div class="lookbook__banner--section">
        <div class="lookbook__banner--inner d-flex">
            <div class="lookbook__thumbnail position-relative">
                <img src="{{asset('Home/assets/img/banner/pexels-the-glorious-studio-10983783.jpg')}}" alt="banner">
                
            </div>
            <div class="lookbook__banner--right">
                <div class="lookbook__banner--content">
                    <h3 class="lookbook__banner--content__subtitle">Brighten up your look</h3>
                    <h2 class="lookbook__banner--content__title">Soak up the savings</h2>
                    <p class="lookbook__banner--content__desc">Brighten up your look with vibrant gemstone jewelry.</p>
                    <a class="lookbook__banner--content__btn primary__btn" href="shop.html">SHOP NOW</a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End lookbook banner section -->
</main>
{{-- <section class="newsletter__section section--padding">
    <div class="container">
        <div class="newsletter__inner d-flex newsletter__bg align-items-center justify-content-between">
            <div class="newsletter__content d-flex align-items-center">
                <div class="newsletter__email--icon">
                    <img src="{{asset('Home/assets/img/icon/email-icon.webp')}}" alt="icon">
                </div>
                <div class="newsletter__content--right">
                    <h2 class="newsletter__content--title text-white">NEWSLETTER SIGN UP!</h2>
                    <P class="newsletter__content--desc text-white">And receive $20 coupon for first shopping.</P>
                </div>
            </div>
            <div class="newsletter__subscribe--style">
                <form class="newsletter__form" action="#">
                    <label>
                        <input class="newsletter__input--field" placeholder=" Enter Your Email" type="text">
                    </label>
                    <button class="newsletter__form--button" type="submit">Subscribe</button>
                </form>   
            </div> 
        </div>
    </div>
</section> --}}

@livewire('updated-data')

@endsection