(($) ->
  $('[data-ware]').on 'click', ->
    $.ajax
      url: '/ajax-cart'
      type: 'post'
      dataType: 'json'
      data:
        wareId: $(this).data 'ware'
      success: (data) ->
        $('.basket .counter')
        .removeClass 'hidden'
        .text data
    return

  $('#cartContent').on 'click', '[data-remove-row-cart]', ->
    $.ajax
      url: '/ajax-cart-remove'
      type: 'post'
      dataType: 'json'
      data:
        idRow: $(this).data 'remove-row-cart'
      success: (data) ->
        console.log data

        cartContent = "
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
            </tr>"
        if data.cartContentArr.length > 0
          $('.basket .counter').text data.cartCount
          for row in data.cartContentArr
            cartContent +="<tr id='#{row.rowid}'>
              <td>
                <a href='/product/#{row.options.slug}'>
                    <img src='/uploads/thumbs/small/#{row.options.thumbnail}'>
                </a>
              </td>
              <td>
                 <h4>
                    <a href='/product/#{row.options.slug}'>#{row.name}</a>
                 </h4>
              </td>
              <td>
                <div class='h4'>#{row.qty}</div>
              </td>
              <td>
                <button class='btn' data-remove-row-cart='#{row.rowid}'><i class='glyphicon glyphicon-trash'></i>
              </td>
            </tr>"
        else
          cartContent += "<tr><td colspan='4'>0 products</td></tr>"
          $('.basket .counter').addClass 'hidden'
        $('#cartContent').html cartContent
        return
    return
  return
) jQuery
