/**
 * Created by dell on 10/6/14.
 */
$(function () {
    $('#btn_filter').click(function () {
        $.ajax({
            'url': base_url + 'index.php/order/order_controller/filter',
            'type': 'POST',
            'data': {
                'id': $('#id').val(),
                'desc': $('#desc').val(),
                'creation_date': $('#creation_date').val(),
                'creator': $('#creator').val()
            },
            'success': function (xhr) {
                $('#order_list').html(xhr);
            },
            'error': function (xhr) {
                $('#event_result').html('error' + xhr);
            }
        });
    });
    var order_list = function () {
        $.ajax({
            'url': base_url + 'index.php/order/order_controller/filter',
            'type': 'POST',
            'success': function (xhr) {
                $('#order_list').html(xhr);
            },
            'error': function (xhr) {
                $('#event_result').html('error' + xhr);
            }
        });
    }
    order_list();
})