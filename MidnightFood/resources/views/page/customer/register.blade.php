 @extends('layout.customer')

 @section('title')
 <x-Breadcrumb page="Sign up" path="Home/Sign up" />
 @endsection

 @section('body')

 <section class="checkout spad">
     <div class="container">
         <div class="checkout__form">
             <form action="{{ route('Register') }}" method="POST" id="send" hidden>
                @csrf
                 <input name="fullname">
                 <input name="phone">
                 <input name="email">
                 <input name="address">
                 <input name="username">
                 <input name="password">
             </form>
             <form id="form-virual">
                @csrf
                 <div class="row">
                     <div class="col-lg-8 col-md-6">
                         <h4>Register new account</h4>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="checkout__input">
                                     <p>Fist Name<span>*</span></p>
                                     <input name="firstname" required type="text">
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="checkout__input">
                                     <p>Last Name<span>*</span></p>
                                     <input name="lastname" required type="text">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="checkout__input">
                                     <p>Phone<span>*</span></p>
                                     <input name="myphone" required type="tel">
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="checkout__input">
                                     <p>Province/City<span>*</span></p>
                                     <select name="city" class="custom-select form-select form-select-sm " id="city"
                                         aria-label=".form-select-sm" required autocomplete="on">
                                         <option value="">Choose province</option>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="checkout__input">
                                     <p>District<span>*</span></p>
                                     <select name="district" class="custom-select form-select form-select-sm"
                                         id="district" aria-label=".form-select-sm" required>
                                         <option value="">Choose district</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="checkout__input">
                                     <p>Ward<span>*</span></p>
                                     <select name="ward" class="custom-select form-select form-select-sm" id="ward"
                                         aria-label=".form-select-sm" required>
                                         <option value="">Choose wards</option>
                                     </select>
                                 </div>
                             </div>

                         </div>
                         <div class="row">
                             <div class="col-lg">
                                 <div class="checkout__input">
                                     <p>Address<span>*</span></p>
                                     <input name="street" required type="text" id="street" placeholder="Street Address"
                                         class="checkout__input__add">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="checkout__input">
                                     <p>Email<span>*</span></p>
                                     <input name="myemail" required type="email">
                                 </div>
                             </div>
                             <div class="col-lg">
                                 <div class="checkout__input">
                                     <p>Username<span>*</span></p>
                                     <input name="myusername" required type="text">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="checkout__input">
                                     <p>Password<span>*</span></p>
                                     <input name="mypassword" required id="password" type="password">
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="checkout__input">
                                     <p>Confirm password<span>*</span></p>
                                     <input name="confirm" id="confirm" type="password">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg">
                                 <div class="checkout__input__checkbox">
                                     <label for="showpass">
                                         Show password
                                         <input type="checkbox" id="showpass">
                                         <span class="checkmark"></span>
                                     </label>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-6">
                                 <button id="btnCreate" type="submit" class="site-btn col-lg">Sign up</button>
                             </div>
                         </div>


             </form>
         </div>
         <div class="col-lg-4 col-md-6">
             <div class="checkout__order">
                 <h4>Did you have account ?</h4>
                 <form action="{{ route('Login') }}" method="POST">
                    @csrf
                     <div class="checkout__input">
                         <input name="username"  required type="text" placeholder="Your username...">
                     </div>
                     <div class="checkout__input">
                         <input name="password" id="password" type="password" placeholder="Your password...">
                     </div>
                     @if($errors->any())
                        <div class="text-danger">The account does not exists</div>
                    @endif

                     <button type="submit" class="site-btn col-lg">Sign in</button>
                 </form>
             </div>
         </div>

     </div>

     </div>

     </div>
 </section>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script type="text/javascript">
        $("#btnCreate").click(function (e) {
            e.preventDefault();
            var fullname = $('input[name=firstname]').val() + ' '+ $('input[name=lastname]').val();
            var citis = $('#city option:selected').text();
            var districts = $('#district option:selected').text();
            var wards = $('#ward option:selected').text();
            var street = $('input[name=street]').val();
            var address = citis + ", " + districts + ", " + wards + ", " + street;

            var email = $('input[name=myemail]').val();
            var phone = $('input[name=myphone]').val();
            var username = $('input[name=myusername]').val();
            var password = $('input[name=mypassword]').val();
            $('input[name=username]').val(username);
            $('input[name=password]').val(password);
            $('input[name=phone]').val(phone);
            $('input[name=email]').val(email);
            $('input[name=address]').val(address);
            $('input[name=fullname]').val(fullname);


           $('#send').submit();
        });
</script>
 @endsection
