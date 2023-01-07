<div class="page-title mb-4">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>{{ $page }}</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    @for ($i = 0; $i < count($path)-1; $i++)
                        <li class="breadcrumb-item"><a href="{{ route($path[$i]) }}">{{$path[$i]}}</a></li>
                    @endfor
                    <li class="breadcrumb-item active" aria-current="page">{{ end($path) }}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

