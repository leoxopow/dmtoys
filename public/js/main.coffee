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

  $('[data-removeRowCart]').on 'click', ->
    $.ajax
      url: '/ajax-cart-remove'
      type: 'post'
      dataType: 'json'
      data:
        idRow: $(this).data 'removeRowCart'
      success: (data) ->
        
  return
) jQuery
