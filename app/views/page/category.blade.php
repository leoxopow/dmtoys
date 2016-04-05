@section('content')
    <section class="catalog">
        <div class="container">
            <h2 class="heading text-center">{{$category->title}}</h2>
            <div class="row">
                @foreach($wares as $ware)
                    <div class="col-md-3">
                        <article class="product-item"><a href="/product/{{$ware->slug}}" class="product-pic"><img src="{{asset('uploads/originals/'.$ware->thumbnail)}}" alt=""></a>
                            <h6 class="category"><a href="/catalog/{{$ware->category->slug}}">{{$ware->category->title}}</a></h6>
                            <h1 class="title"><a href="/product/{{$ware->slug}}">{{$ware->title}}</a></h1>
                            <p class="price">
                                @if($ware->discount > 0)
                                    <span class="deactive">₴ {{$ware->price}}</span><span class="active">₴ {{$ware->price - $ware->discount}}</span>
                                @else
                                    ₴ {{$ware->price}}
                                @endif
                            </p>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop