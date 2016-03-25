<!DOCTYPE html>
<html>
<head>
    <title>Дитячий світ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/components/smartmenus/dist/css/sm-core-css.css">
    <link rel="stylesheet" href="/components/smartmenus/dist/css/sm-simple/sm-simple.css">
    <link rel="stylesheet" href="/components/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/components/bxslider-4/dist/jquery.bxslider.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header class="top-header">
    <div class="top clearfix"><a href="/" class="logo"><img src="/images/logo.png" alt=""></a>
        <div class="contacts"><a href="tel:0679588462" class="contact"> <i class="fa fa-phone-square"></i> <span>(067) 958 84 62</span></a><a
                    href="tel:0679588462" class="contact"> <i class="fa fa-phone-square"></i>
                <span>(099) 171 38 36</span></a><a href="skype:dmtoys.com.ua?chat" class="contact"> <i
                        class="fa fa-skype"></i> <span>dmtoys.com.ua</span></a><a href="#" class="basket"><img
                        src="/images/icon-basket.png" alt=""><span class="counter">2</span></a></div>
    </div>
    <input id="main-menu-state" type="checkbox" name="">
    <label for="main-menu-state" class="main-menu-btn"><span class="main-menu-btn-icon"></span></label>
    <nav id="main-nav" class="clearfix">
        <ul id="main-menu" class="sm sm-simple">
            @foreach($menuCategories as $parent)
                <li>
                    <a href="/{{$parent->slug}}">{{$parent->title}}</a>
                    @if($parent->children->count() > 0)
                        <ul>
                            @foreach($parent->children as $child1)
                                <li>
                                    <a href="/{{$parent->slug}}/{{$child1->slug}}">{{$child1->title}}</a>
                                    @if($child1->children->count() > 0)
                                        <ul>
                                            @foreach($child1->children as $child2)
                                                <li>
                                                    <a href="/{{$parent->slug}}/{{$child1->slug}}/{{$child2->slug}}">{{$child2->title}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
</header>

@yield('content')
<footer class="main-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <p class="copyright">© 2016, Детский мир</p>
                <p class="contacts"><i class="fa fa-phone"> </i><a href="tel:0679588462">(067) 958 84 62</a><br><i
                            class="fa fa-phone"></i><a href="tel:0991713836">(099) 171 38 36</a><br><i
                            class="fa fa-skype"></i><a href="skype:dmtoys.com.ua?chat">dmtoys.com.ua</a><br></p>
                <p class="contacts">г. Запорожье, ТЦ "Украина", 4 этаж, пр. Соборный, 147, 4 этаж</p>
            </div>
            <div class="col-md-2 col-md-offset-2">
                <ul class="nav">
                    <li><a href="#">ИГРУШКИ</a></li>
                    <li><a href="#">КОЛЯСКИ</a></li>
                    <li><a href="#">ОДЕЖДА</a></li>
                    <li><a href="#">ОБУВЬ</a></li>
                    <li><a href="#">АКТИВНЫЙ ОТДЫХ</a></li>
                    <li><a href="#">ДЛЯ КОРМЛЕНИЯ</a></li>
                    <li><a href="#">ГИГИЕНА И УХОД</a></li>
                    <li><a href="#">АВТОКРЕСЛА</a></li>
                    <li><a href="#">ДЕТСКАЯ КОМНАТА</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <ul class="nav">
                    <li><a href="#">Контактная форма</a></li>
                    <li><a href="#">График работы</a></li>
                    <li><a href="#">Методы оплаты</a></li>
                    <li><a href="#">Все новости</a></li>
                    <li><a href="#">Доставка</a></li>
                    <li><a href="#">Гарантии</a></li>
                    <li><a href="#">Акции</a></li>
                    <li><a href="#">О нас</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <ul class="nav">
                    <li><a href="#"><i class="fa fa-vk"> </i>Вконтакте</a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                    <li><a href="#"> <i class="fa fa-odnoklassniki"></i>Ok.ru</a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i>Google+</a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i>Youtube</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="/components/jquery/dist/jquery.min.js"></script>
<script src="/components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/components/smartmenus/dist/jquery.smartmenus.min.js"></script>
<script src="/components/bxslider-4/dist/jquery.bxslider.min.js"></script>
<script src="/js/main-front.js"></script>
</body>
</html>