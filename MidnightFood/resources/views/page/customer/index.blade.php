 @extends('layout.customer')
 @section('body')

 <!-- Categories Section Begin -->
 <section class="hero">
     <div class="container">
         <div class="row">
             <div class="col-lg">
                 <div class="hero__item set-bg" data-setbg="{{ asset('img/panel.jpg') }}">
                     <div class="hero__text">
                         <span>DRIED FOOD</span>
                         <h2>Dry chicken <br />is high in calories</h2>
                         <p>Free Pickup and Delivery Available</p>
                         <a href="{{ route("Shop") }}" class="primary-btn">SHOP NOW</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <section class="categories">
     <div class="container">
         <div class="row">
             <div class="categories__slider owl-carousel">
                 @foreach ($lsCategories as $category)
                 <div class="col-lg-3">
                     <div class="categories__item set-bg"
                         data-setbg="{{ asset('/img/categories') }}/{{ $category->image }}">
                         <h5><a href="{{ route('products-of-category', $category->id) }}">
                                 {{ $category->name }}
                             </a></h5>
                     </div>
                 </div>
                 @endforeach

             </div>
         </div>
     </div>
 </section>
 <!-- Categories Section End -->

 <!-- Featured Section Begin -->
 <section class="featured spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="section-title">
                     <h2>Featured Product</h2>
                 </div>
                 <div class="featured__controls">
                     <ul>
                         <li class="active" data-filter="*">All</li>
                         @foreach ($lsCategories as $category)
                         <li data-filter=".cat-{{ $category->id }}"> {{ $category->name }}</li>
                         @endforeach
                     </ul>
                 </div>
             </div>
         </div>

         <div class="row featured__filter">
             @foreach ($lsFeatured as $product)
             <div class="col-lg-3 col-md-4 col-sm-6 mix cat-{{ $product->category_id }}">
                 <div class="featured__item">
                     <div class="featured__item__pic set-bg"
                         data-setbg="{{ asset('img/product') }}/{{ $product->image->image1 }}">
                         <ul class="featured__item__pic__hover">
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
                                    <button type="submit" class="btn p-0" ><a><i class="fa fa-shopping-cart"></i></a></button>
                                </form>
                             </li>
                         </ul>
                     </div>
                     <div class="featured__item__text">
                         <h6><a href="#">{{ $product->name }}</a></h6>
                         <h5>${{ $product->price }}</h5>
                     </div>
                 </div>
             </div>
             @endforeach

         </div>
     </div>
 </section>
 <!-- Featured Section End -->

 @endsection
