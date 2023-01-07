 @extends('layout.customer')

 @section('title')
 <x-Breadcrumb page="Check out" path="Home/Checkout" />
 @endsection

 @section('body')

 <section class="checkout spad">
     <div class="container">
        <form action="{{ route('Checkout.post') }}" method="POST" id="checkout-sub" hidden>
            @csrf
             <input name="user_id" value="{{ auth()->user()->id }}">
             <input name="shipping_address">
             <input name="shipping_phone">
         </form>
         <div class="checkout__form">
             <h4>Billing Details</h4>
             <form id="checkout">
                @csrf
                 <div class="row">
                     <div class="col-lg-8 col-md-6">
                         <div class='row'>
                             <div class="col-lg-6">
                                 <div class="checkout__input">
                                     <p>Full Name</p>
                                     <input name="myname" value='{{ auth()->user()->fullname }}' readonly>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="checkout__input">
                                     <p>Phone</p>
                                     <input name="myphone" value='{{ auth()->user()->phone }}' readonly>
                                 </div>
                             </div>
                         </div>
                         <div class="checkout__input">
                             <p>Address</p>
                             <input name='myaddress' value='{{ auth()->user()->address }}' class="checkout__input__add" readonly>
                         </div>
                         <div class="checkout__input__checkbox">
                             <label for="shipto" data-toggle="collapse" data-target="#shipping-address">
                                 Ship to a different address?
                                 <input name="check" type="checkbox" id="shipto">
                                 <span class="checkmark"></span>
                             </label>
                         </div>

                         <div class="collapse mb-5" id="shipping-address">
                             <h4></h4>
                             <div class="p-30">
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <div class="checkout__input">
                                             <p>Phone<span>*</span></p>
                                             <input name="phone" required type="tel">
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="checkout__input">
                                             <p>Province/City<span>*</span></p>
                                             <select name="city" class="custom-select form-select form-select-sm mb-3"
                                                 id="city" aria-label=".form-select-sm" required autocomplete="on">
                                                 <option value="">Choose province</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="checkout__input">
                                             <p>District<span>*</span></p>
                                             <select name="district"
                                                 class="custom-select form-select form-select-sm mb-3" id="district"
                                                 aria-label=".form-select-sm" required>
                                                 <option value="">Choose district</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="checkout__input">
                                             <p>Ward<span>*</span></p>
                                             <select name="ward" class="custom-select form-select form-select-sm"
                                                 id="ward" aria-label=".form-select-sm" required>
                                                 <option value="">Choose wards</option>
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="checkout__input">
                                     <p>Address<span>*</span></p>
                                     <input name="street" required type="text" id="street" placeholder="Street Address"
                                         class="checkout__input__add">
                                 </div>

                             </div>
                         </div>
                     </div>

                     <div class="col-lg-4 col-md-6">
                         <div class="checkout__order">
                             <h4>Your Order</h4>
                             <div class="checkout__order__products">Products <span>Total</span></div>
                             <ul>
                                @foreach ($lsCarts as $item)
                                    <li>{{ $item['product']->name }} <span>{{ $item['product']->price * $item['quantity'] }}</span></li>
                                @endforeach
                             </ul>
                             <div class="checkout__order__total"></div>
                             <div class="checkout__order__total">Total <span>{{ $total }} VND</span></div>

                             <button id="btnPlace" type="submit"  class="site-btn"
                             {{ (!Session::has('lsCarts') || count(Session::get('lsCarts'))==0)? 'disabled':'' }}>PLACE ORDER</button>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </section>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script type="text/javascript">
        $("#btnPlace").click(function (e) {
            e.preventDefault();

            var ship = $('#shipto').is(":checked");
            if(ship){
                var shipping_phone = $('input[name=phone]').val();

                var citis = $('#city option:selected').text();
                var districts = $('#district option:selected').text();
                var wards = $('#ward option:selected').text();
                var street = $('input[name=street]').val();
                var shipping_address = citis + ", " + districts + ", " + wards + ", " + street;
            }
            else{
                var shipping_phone = $('input[name=myphone]').val();
                var shipping_address = $('input[name=myaddress]').val();
            }


            $('input[name=shipping_phone]').val(shipping_phone);
            $('input[name=shipping_address]').val(shipping_address);


            // console.log($('input[name=shipping_address]').val());
            $('#checkout-sub').submit();
        });


</script>


 @endsection
