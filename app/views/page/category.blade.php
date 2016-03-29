@section('content')
    <section class="catalog">
        <div class="container">
            <h2 class="heading text-center">{{$category->title}}</h2>
            <div class="row">
                <div class="col-md-3">
                    <article class="product-item"><a href="#" class="product-pic"><img src="/images/product-example.jpg" alt=""></a>
                        <h6 class="category"><a href="#">Футболки</a></h6>
                        <h2 class="title"><a href="#">Поло с коротким рукавом</a></h2>
                        <p class="price">₴ 180.00</p>
                    </article>
                </div>

            </div>
        </div>
    </section>
@stop