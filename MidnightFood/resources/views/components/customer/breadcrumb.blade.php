<section class="breadcrumb-section set-bg" data-setbg="{{ asset('/img/bread.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{$page}} </h2>
                    <div class="breadcrumb__option">
                        @for ($i = 0; $i < count($path)-1; $i++)
                            <a href="{{ route($path[$i]) }}">{{$path[$i]}}</a>
                        @endfor
                        <span>{{ end($path) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
