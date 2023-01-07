<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> ktcaothang@caothang.edu.vn</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        @if (auth()->user() == null)
                            <div class="header__top__right__auth">
                                <a id='btn-login' type="button" data-toggle="modal" data-target="#loginModal">
                                    <i class="fa fa-user"></i>
                                    Login
                                </a>
                            </div>
                        @else
                            @if (auth()->user()->is_admin!=null)
                            <div class="header__top__right__language">
                                <a class='text-dark font-weight-bold' href={{ route('Dashboard') }}>
                                    Dashboard
                                </a>
                            </div>
                            @endif
                        <div class="header__top__right__language">
                            <i class="fa fa-user"></i>
                            <div class="pl-1">{{ auth()->user()->fullname }}</div>
                            <span class="arrow_carrot-down "></span>
                            <ul>
                                <li><a href="{{ route('MyProfile') }}">My profile</a></li>
                                <li><a href="{{ route('Logout') }}">Logout</a>
                            </ul>

                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" >
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo" >
                    <a href="{{ route('Home') }}"><img src="{{ asset('img/logo.png') }}" alt="" width="350" heigth="150"></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li><a href="{{ route('Home') }}">Home</a></li>
                        <li class="active"><a href="{{ route('Shop') }}">Shop</a></li>
                        <li>
                            @if (auth()->user() == null)
                                <a onclick='return alert("Please login to do this!")'>Check Out</a></li>
                            @else
                            <a href="{{ route('Checkout') }}">Check Out</a></li>
                            @endif

                        <li><a href="{{ route('Contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="{{ route('MyProfile') }}"><i class="fa fa-heart"></i>
                            <span>
                                @php
                                    echo Session::has('lsFavourites')? count(Session::get('lsFavourites')) : 0;
                                @endphp
                            </span>
                        </a></li>
                        <li><a href="{{ route('Shopping Cart') }}">
                            <i class="fa fa-shopping-bag"></i>
                            <span class='cartnumber'>
                                @php
                                    echo Session::has('lsCarts')? count(Session::get('lsCarts')) : 0;
                                @endphp
                            </span>
                        </a></li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
