<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i>
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
    <div class="humberger__menu__widget">
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="./index.html">Home</a></li>
            <li><a href="./shop-grid.html">Shop</a></li>
            <li><a href="./blog.html">Check out</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> ktcaothang@caothang.edu.vn</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
