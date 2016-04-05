(($) ->
  $('[data-ware]').on 'click', ->
    $.ajax
      url: '/ajax-cart'
      type: 'post'
      dataType: 'json'
      data:
        wareId: $(this).data 'ware'
      success: (data) ->
        $('.basket .counter').text data
    return
  return
) jQuery
