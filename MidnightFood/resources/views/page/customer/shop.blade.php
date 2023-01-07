 @extends('layout.customer')

 @section('title')
 <x-Breadcrumb page="Shop" path="Home/Shop" />
 @endsection

 @section('body')



 <!-- Product Section Begin -->
 <section class="product spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-3 col-md-5">
                 <div class="sidebar">
                     <div class="sidebar__item">
                         <div class="d-flex justify-content-between">
                             <h4>Categories</h4>
                             <div class="align-items-end flex-column">
                                 <button type="button" class="btn btn-danger">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                         <path
                                             d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z">
                                         </path>
                                     </svg>
                                 </button>
                             </div>
                         </div>

                         <ul>
                             <li>
                                 <div class="checkout__input__checkbox">
                                     <label for="all">All
                                         <input name="cat-0" type="checkbox" id="all" value="0">
                                         <span class="checkmark"></span>
                                     </label>
                                 </div>
                             </li>
                             @foreach ($lsCategories as $category)
                             <li>
                                 <div class="checkout__input__checkbox">
                                     <label for="cat-{{ $category->id }}">
                                         {{ $category->name }}
                                         <input name="cat-{{ $category->id }}" type="checkbox"
                                             id="cat-{{ $category->id }}" value="{{ $category->id }}">
                                         <span class="checkmark"></span>
                                     </label>
                                 </div>
                             </li>
                             @endforeach
                         </ul>
                     </div>
                     <div class="sidebar__item">
                         <h4>Price</h4>
                         <div class="price-range-wrap">
                             <div class="price-range ui-slider ui-corner-all
                             ui-slider-horizontal ui-widget ui-widget-content" data-min="{{ $min }}"
                                 data-max="{{ $max }}">
                                 <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                 <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                 <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                             </div>
                             <div class="range-slider">
                                 <div class="price-input d-flex justify-content-around">
                                     <input type="text" id="minamount">
                                     <input type="text" id="maxamount">
                                 </div>
                             </div>

                         </div>
                     </div>

                     {{-- <div class="sidebar__item">
                         <div class="latest-product__text">
                             <h4>Latest Products</h4>
                             <div class="latest-product__slider owl-carousel">
                                 <div class="latest-prdouct__slider__item">
                                     <a href="#" class="latest-product__item">
                                         <div class="latest-product__item__pic">
                                             <img src="{{ asset('/img/latest-product/lp-1.jpg')}}" alt="">
                 </div>
                 <div class="latest-product__item__text">
                     <h6>Crab Pool Security</h6>
                     <span>$30.00</span>
                 </div>
                 </a>
                 <a href="#" class="latest-product__item">
                     <div class="latest-product__item__pic">
                         <img src="{{ asset('/img/latest-product/lp-2.jpg')}}" alt="">
                     </div>
                     <div class="latest-product__item__text">
                         <h6>Crab Pool Security</h6>
                         <span>$30.00</span>
                     </div>
                 </a>
                 <a href="#" class="latest-product__item">
                     <div class="latest-product__item__pic">
                         <img src="{{ asset('/img/latest-product/lp-3.jpg')}}" alt="">
                     </div>
                     <div class="latest-product__item__text">
                         <h6>Crab Pool Security</h6>
                         <span>$30.00</span>
                     </div>
                 </a>
             </div>
             <div class="latest-prdouct__slider__item">
                 <a href="#" class="latest-product__item">
                     <div class="latest-product__item__pic">
                         <img src="{{ asset('/img/latest-product/lp-1.jpg')}}" alt="">
                     </div>
                     <div class="latest-product__item__text">
                         <h6>Crab Pool Security</h6>
                         <span>$30.00</span>
                     </div>
                 </a>
                 <a href="#" class="latest-product__item">
                     <div class="latest-product__item__pic">
                         <img src="{{ asset('/img/latest-product/lp-2.jpg')}}" alt="">
                     </div>
                     <div class="latest-product__item__text">
                         <h6>Crab Pool Security</h6>
                         <span>$30.00</span>
                     </div>
                 </a>
                 <a href="#" class="latest-product__item">
                     <div class="latest-product__item__pic">
                         <img src="{{ asset('/img/latest-product/lp-3.jpg')}}" alt="">
                     </div>
                     <div class="latest-product__item__text">
                         <h6>Crab Pool Security</h6>
                         <span>$30.00</span>
                     </div>
                 </a>
             </div>
         </div>
     </div>
     </div> --}}
     </div>
     </div>
     <div class="col-lg-9 col-md-7">
         <div class="filter__item">
             <div class="row">
                 <div class="col-lg-4 col-md-5">
                     <div class="filter__sort">
                         <span>Sort By</span>
                         <select class="sort-by">
                             <option value="0">Default</option>
                             <option value="0">Default</option>
                         </select>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-4">
                     <div class="filter__found">
                         <h6><span>
                                 {{ $all }}
                             </span> Products found</h6>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-3">
                     <div class="filter__option">
                         <span class="icon_grid-2x2"></span>
                         <span class="icon_ul"></span>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">

             @foreach ($lsProducts as $product)
             <div class="col-lg-4 col-md-6 col-sm-6">
                 <div class="product__item">
                     <div class="product__item__pic set-bg"
                         data-setbg="{{ asset('img/product') }}/{{ $product->image->image1 }}">
                         <ul class="product__item__pic__hover">
                             @php
                             $urlAdd= e(route('add-favourite',$product->id));
                             $urlDelete= e(route('delete-favourite',$product->id));
                             if(Session::has('lsFavourites') && in_array($product->id, Session::get('lsFavourites'))){
                             echo '
                             <li><a href="'.$urlDelete.'"><i class="fa fa-heart" style="color: #dd2222"></i></a></li>';
                             }
                             else{
                             echo '
                             <li><a href="'.$urlAdd.'"><i class="fa fa-heart"></i></a></li>';
                             }
                             @endphp
                             <li>
                                 <a href="{{ route('Detail', $product->id) }}">
                                     <i class="fa fa-eye"></i>
                                 </a>
                             </li>
                             <li>
                                 <form action="{{ route('add-to-cart') }}" method="POST">
                                     @csrf
                                     <input name="id" value="{{ $product->id }}" type="text" hidden>
                                     <input name="quantity" value="1" type="number" hidden>
                                     <button type="submit" class="btn p-0"><a><i
                                                 class="fa fa-shopping-cart"></i></a></button>
                                 </form>
                             </li>
                         </ul>
                     </div>
                     <div class="product__item__text">
                         <h6><a href="#">{{ $product->name }}</a></h6>
                         <h5>{{ $product->price }} VND</h5>
                     </div>
                 </div>
             </div>
             @endforeach
         </div>
         <div class="product__pagination d-flex justify-content-end">
             @for ($i=1; $i<ceil($all)/16+1; $i++) <a href="{{ route('Shop', $i) }}">{{ $i }}</a>
                 @endfor

                 <a href="#"><i class="fa fa-long-arrow-right"></i></a>
         </div>
     </div>
     </div>
     </div>
 </section>
 <!-- Product Section End -->
 @endsection
