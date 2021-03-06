@section('content')
    <ul class="bxslider">
        <li><img src="/images/sliders/slide1.jpg" alt="">
            <div class="caption">
                <h5>Новая коллекция</h5>
                <h3>Весна/Лето 2016</h3>
                <button class="btn btn-caption">В магазин</button>
            </div>
        </li>
        <li><img src="/images/sliders/slide2.jpg" alt="">
            <div class="caption">
                <h5>Новая коллекция</h5>
                <h3>Весна/Лето 2016</h3>
                <button class="btn btn-caption">В магазин</button>
            </div>
        </li>
        <li><img src="/images/sliders/slide3.jpg" alt="">
            <div class="caption">
                <h5>Новая коллекция</h5>
                <h3>Весна/Лето 2016</h3>
                <button class="btn btn-caption">В магазин</button>
            </div>
        </li>
    </ul>
    <section class="main-phrase">
        <div class="container">
            <h2> <span>Интернет магазин. </span>Всё для ребенка</h2>
        </div>
    </section>
    <section class="categories-presentation">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 present-item"><a href="#"><img src="/images/cat1.jpg" alt="" class="img-responsive"><span class="absolute-text">Игрушки</span></a></div>
                <div class="col-sm-3 present-item main-h"><a href="#"><img src="/images/cat2.jpg" alt="" class="img-responsive"><span class="absolute-text">Одежда</span></a></div>
                <div class="col-sm-3 present-item"><a href="#"><img src="/images/cat3.jpg" alt="" class="img-responsive"><span class="absolute-text">Коляски</span></a></div>
                <div class="col-sm-3 present-item"><a href="#"><img src="/images/cat4.jpg" alt="" class="img-responsive"><span class="absolute-text">Скидки</span></a></div>
                <div class="col-sm-3 present-item"><a href="#"><img src="/images/cat5.jpg" alt="" class="img-responsive"><span class="absolute-text">Комната</span></a></div>
                <div class="col-sm-6 present-item"><a href="#"><img src="/images/cat6.jpg" alt="" class="img-responsive"><span class="absolute-text">Активный отдых</span></a></div>
            </div>
        </div>
    </section>
    <section class="popular-products">
        <div class="container">
            <h2 class="text-center heading"><i>Популярные </i>Товары</h2>
            <div class="row">
                @foreach($wares as $ware)
                    <div class="col-md-3">
                        <article class="product-item"><a href="/product/{{$ware->slug}}" class="product-pic"><img src="{{asset('uploads/originals/'.$ware->thumbnail)}}" alt=""></a>
                            @if($ware->category_id != 0)
                            <h6 class="category"><a href="/catalog/{{$ware->category->slug}}">{{$ware->category->title}}</a></h6>
                            @endif
                            <h1 class="title"><a href="/product/{{$ware->slug}}">{{$ware->title}}</a></h1>
                            <p class="price">
                                @if($ware->discount > 0)
                                    <span class="deactive">₴ {{$ware->price}}</span><span class="active">₴ {{$ware->discount}}</span>
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
    <section class="blog">
        <div class="blog-head">
            <h2 class="text-center"><i>Наши последние</i> Статьи</h2>
        </div>
        <div class="container">
            <div class="col-md-4">
                <article class="blog-item"><a href="#"><img src="/images/articles/thumb1.jpg" alt="" class="img-responsive">
                        <div class="caption">
                            <h1>Раннее развитие ребёнка</h1>
                            <p>
                                <time>6 марта 2016</time>
                            </p>
                        </div></a></article>
            </div>
            <div class="col-md-4">
                <article class="blog-item"><a href="#"><img src="/images/articles/thumb2.jpg" alt="" class="img-responsive">
                        <div class="caption">
                            <h1>Выбираем детскую одежду</h1>
                            <p>
                                <time>5 марта 2016</time>
                            </p>
                        </div></a></article>
            </div>
            <div class="col-md-4">
                <article class="blog-item"><a href="#"><img src="/images/articles/thumb3.jpg" alt="" class="img-responsive">
                        <div class="caption">
                            <h1>Как лечить бронхит?</h1>
                            <p>
                                <time>4 марта 2016</time>
                            </p>
                        </div></a></article>
            </div>
            <div class="col-md-12">
                <div class="text-center"><a class="btn btn-more">Читать ещё <i class="fa fa-arrow-right"></i></a></div>
            </div>
        </div>
    </section>
    <section class="subscribe">
        <div class="text-center">
            <h2 class="heading"> <i>Подпишись на</i> Обновления</h2>
            <p>Всегда будь в курсе наших акций и специальных предложений, а также всегда получай интересную информацию</p>
            <div class="input-group">
                <input id="subscribe" type="email" name="" placeholder="Ваш Email" class="form-control"><span class="input-group-btn">
            <button type="submit" class="btn btn-subscribe">Подписаться!</button></span>
            </div>
        </div>
    </section>
@stop