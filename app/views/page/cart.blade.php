@section('content')
    <div class="container">
        <h1>Корзина</h1>
        <table class="table table-condensed" id="cartContent">
            <tr>
                <th>
                    Товар:
                </th>
                <th>
                    Название товара:
                </th>
                <th>
                    Количество:
                </th>
                <th>
                    Убрать из корзины
                </th>
            </tr>
            @foreach($cartContent as $row)
            <tr id="{{$row->rowid}}">
                <td>
                    <a href="/product/{{$row->ware->slug}}">
                        <img src="{{asset('uploads/thumbs/small/'.$row->ware->thumbnail)}}" alt="">
                    </a>
                </td>
                <td>
                    <h4>
                        <a href="/product/{{$row->ware->slug}}">
                            {{$row->ware->title}}
                        </a>
                    </h4>
                </td>
                <td>
                    <div class="h4">
                        {{$row->qty}}
                    </div>
                </td>
                <td>
                    <button class="btn" data-remove-row-cart="{{$row->rowid}}">
                        <i class="glyphicon glyphicon-trash" ></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@stop