 @extends('layout.customer')

 @section('title')
 <x-Breadcrumb page="Shopping Cart" path="Home/Shopping Cart" />
 @endsection

 @section('body')

 <section class="shoping-cart spad">
     <div class="container">
         @if (count($lsCarts) != 0)
         <div class="row">
             <div class="col-lg-12">
                 <div class="shoping__cart__table">
                     <table>
                         <thead>
                             <tr>
                                 <th class="shoping__product">Products</th>
                                 <th>Quantity</th>
                                 <th>Price</th>
                                 <th>Total</th>
                                 <th></th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach($lsCarts as $item)
                            <tr>
                                <td class="shoping__cart__item" style="width:50%">
                                    <a href="{{ route('Detail', $item['product']->id) }}">
                                    <img width="100" height="100" src="{{ asset('img/product') }}/{{ $item['product']->image->image1 }}"
                                        alt=""></a>
                                    <h5>{{ $item['product']->name }}</h5>
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="{{ $item['quantity'] }}" name="qty-{{ $item['product']->id }}" readonly>
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__price"> {{ $item['price'] }}</td>

                                <td class="shoping__cart__total">
                                    {{ $item['price'] * $item['quantity']  }}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{ route('delete-cart', [
                                           $item['product']->id,
                                       ])  }}">
                                       <span class="icon_close"></span>
                                   </a>
                                </td>
                            </tr>
                            @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-12">
                 <div class="shoping__cart__btns">
                     <a href="{{ route('Shop') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                     <form id="update" action="">
                        {{-- @foreach ($lsCarts as $item)
                            <input type="number" name="id" value="{{ $item['product']->id }}" hidden>
                            <input type="number" name="quantity-{{ $item['product']->id }}" hidden>
                        @endforeach --}}
                        <button type="submit" class="primary-btn cart-btn cart-btn-right" style="border: 0">
                            Upadate Cart</button>
                     </form>

                 </div>
             </div>
             <div class="col-lg-6">
                 <div class="shoping__continue">

                 </div>
             </div>
             <div class="col-lg-6">
                 <div class="shoping__checkout">
                     <h5>Cart Total</h5>
                     <ul>
                         <li>Total <span>{{ $total }} VND</span></li>
                     </ul>
                    @if (auth()->user()!=null)
                        <a href="{{ route('Checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    @else
                        <a href="{{ route('Login.form') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    @endif
                 </div>
             </div>
         </div>
         @else
            <div style="text-align: center;">
                <div style="width: 300px;margin:auto;">
                    <img src="{{ asset('img/cart.png') }}" style="width: 100%;" alt="Không có sản phẩm nào trong giỏ hàng của bạn.">
                    <span class="mascot-image"></span>
                    <p>There are no products in your shopping cart.</p>
                    <a href="{{ route('Shop') }}" class="btn btn-success">Keep shopping</a>
                </div>
            </div>
         @endif
     </div>
 </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$("#update").submit(function( event ) {
    event.preventDefault();

});
</script>

 @endsection
