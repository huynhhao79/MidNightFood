 @extends('layout.customer')

 @section('title')
 <x-Breadcrumb page="Product Name" path="Home/Shop/Product Name" />
 @endsection

 @section('body')

 <!-- Product Details Section Begin -->
 <section class="product-details spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-6 col-md-6">
                 <div class="product__details__pic">
                     <div class="product__details__pic__item">
                         <img class="product__details__pic__item--large"
                             src="{{ asset('img/product') }}/{{ $product->image->image1 }}" alt="">
                     </div>
                     <div class="product__details__pic__slider owl-carousel">
                         <img data-imgbigurl="{{ asset('img/product') }}/{{ $product->image->image2 }}"
                             src="{{ asset('img/product') }}/{{ $product->image->image2 }}" alt="">
                         <img data-imgbigurl="{{ asset('img/product') }}/{{ $product->image->image3 }}"
                             src="{{ asset('img/product') }}/{{ $product->image->image3 }}" alt="">
                         <img data-imgbigurl="{{ asset('img/product') }}/{{ $product->image->image4 }}"
                             src="{{ asset('img/product') }}/{{ $product->image->image4 }}" alt="">
                         <img data-imgbigurl="{{ asset('img/product') }}/{{ $product->image->image5 }}"
                             src="{{ asset('img/product') }}/{{ $product->image->image5 }}" alt="">
                         <img data-imgbigurl="{{ asset('img/product') }}/{{ $product->image->image1 }}"
                             src="{{ asset('img/product') }}/{{ $product->image->image1 }}" alt="">
                     </div>
                 </div>
             </div>
             <div class="col-lg-6 col-md-6">
                 <div class="product__details__text">
                     <h3>{{ $product->name }}</h3>
                     <div class="product__details__rating">
                         <span>({{ $numOrder }} Products sold)</span>
                     </div>
                     <div class="product__details__price">{{ $product->price }} VND</div>
                     <p>{{ $product->category->name }}</p>
                     <form action="{{ route('add-to-cart') }}" method="POST">
                         @csrf
                         <input name="id" value="{{ $product->id }}" type="text" hidden>
                         <div class="product__details__quantity">
                             <div class="quantity">
                                 <div class="pro-qty">
                                     <input name="quantity" type="text" value="1">
                                 </div>
                             </div>
                         </div>
                         <button type="submit" class="primary-btn">ADD TO CART</button>
                         @php
                         $urlAdd= e(route('add-favourite',$product->id));
                         $urlDelete= e(route('delete-favourite',$product->id));
                         if(Session::has('lsFavourites') && in_array($product->id, Session::get('lsFavourites'))){
                         echo '<a href="'.$urlDelete.'" class="heart-icon"><span class="icon_heart"
                                 style="color: #dd2222"></a>';
                         }
                         else{
                         echo '<a href="'.$urlAdd.'" class="heart-icon"><span class="icon_heart_alt"></a>';
                         }
                         @endphp
                         </form>
                         <ul>
                             <li><strong>Availability</strong> <span>In Stock</span></li>
                             <li><strong>Shipping</strong> <span>01 day shipping. <samp>Free pickup today</samp></span>
                             </li>
                             <li><strong>Share on</strong>
                                 <div class="share">
                                     <a href="#"><i class="fa fa-facebook"></i></a>
                                     <a href="#"><i class="fa fa-twitter"></i></a>
                                     <a href="#"><i class="fa fa-instagram"></i></a>
                                     <a href="#"><i class="fa fa-pinterest"></i></a>
                                 </div>
                             </li>
                         </ul>
                 </div>
             </div>
             <div class="col-lg-12">
                 <div class="product__details__tab">
                     <ul class="nav nav-tabs" role="tablist">
                         <li class="nav-item">
                             <h4><strong>Decription</strong></h4>
                         </li>

                     </ul>
                     <div class="tab-content">
                         <div class="tab-pane active" id="tabs-1" role="tabpanel">
                             <div class="product__details__tab__desc">
                                 <h6>Products Infomation</h6>
                                 <p>{{ $product->decription }}</p>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Product Details Section End -->

 <!-- Related Product Section Begin -->
 <section class="related-product">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="section-title related__product__title">
                     <h2>Related Product</h2>
                 </div>
             </div>
         </div>
         @if(count($lsRelated)!=0)
         <div class="row">
             @foreach ($lsRelated as $item)
             <div class="col-lg-3 col-md-4 col-sm-6">
                 <div class="product__item">
                     <div class="product__item__pic set-bg"
                         data-setbg="{{ asset('img/product') }}/{{ $item->image->image1 }}">
                         <ul class="product__item__pic__hover">
                             @php
                             $urlAdd= e(route('add-favourite',$item->id));
                             $urlDelete= e(route('delete-favourite',$item->id));
                             if(Session::has('lsFavourites') && in_array($item->id, Session::get('lsFavourites'))){
                             echo '
                             <li><a href="'.$urlDelete.'"><i class="fa fa-heart" style="color: #dd2222"></i></a></li>';
                             }
                             else{
                             echo '
                             <li><a href="'.$urlAdd.'"><i class="fa fa-heart"></i></a></li>';
                             }
                             @endphp
                             <li>
                                 <a href="{{ route('Detail', $item->id) }}">
                                     <i class="fa fa-eye"></i>
                                 </a>
                             </li>
                             <li>
                                 <form action="{{ route('add-to-cart') }}" method="POST">
                                     @csrf
                                     <input name="id" value="{{ $item->id }}" type="text" hidden>
                                     <input name="quantity" value="1" type="number" hidden>
                                     <button type="submit" class="btn p-0"><a><i
                                                 class="fa fa-shopping-cart"></i></a></button>
                                 </form>
                             </li>
                         </ul>
                     </div>
                     <div class="product__item__text">
                         <h6>{{ $item->name }}</h6>
                         <h5>{{ $item->price }} VND</h5>
                     </div>

                 </div>
             </div>
             @endforeach

         </div>
         @endif

     </div>
 </section>
 <!-- Related Product Section End -->

 @endsection
