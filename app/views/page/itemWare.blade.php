@section('content')
    <div class="container">
        <article class="ware-item row">
            <div class="col-xs-12 hidden-md hidden-lg">
                <div class="clearfix breadcrumb-line"><a href="/catalog/{{$ware->category->slug}}" class="pull-left">Назад в: &laquo;{{$ware->category->title}}&raquo;</a><span class="pull-right"><a href="#">Предыдущий </a>/ <a href="#">Следующий</a></span></div>
            </div>
            <div class="col-md-6 col-xs-12">
                <ul class="ware-slider">
                    <li><img src="{{asset('uploads/originals/'.$ware->thumbnail)}}" alt=""></li>
                </ul>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="clearfix breadcrumb-line hidden-xs hidden-sm"><a href="/catalog/{{$ware->category->slug}}" class="pull-left">Назад в: &laquo;{{$ware->category->title}}&raquo;</a><span class="pull-right"><a href="#">Предыдущий </a>/ <a href="#">Следующий</a></span></div>
                <h1>{{$ware->title}}</h1>
                <div class="description">
                    {{$ware->description}}
                </div>
                <p class="price">Цена:<span class="active">	₴
                        @if($ware->discount > 0)
                            {{$ware->price - $ware->discount}}
                        @else
                            {{$ware->price}}
                        @endif
                    </span>
                    @if($ware->discount > 0)<span class="deactive">₴ {{$ware->price}}</span>@endif</p>
                <p>
                    <button class="btn-buy" data-ware="{{$ware->id}}">Купить</button>
                </p>
            </div>
        </article>
    </div>
@stop