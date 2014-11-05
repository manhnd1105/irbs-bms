/**
 * Created by manh on 10/22/14.
 */
$(function () {
    $('#btn_assign').click(function () {
        var order_list = new Array();
        var acc_list = new Array();
        $('input[name="order_list[]"]:checked').each(function () {
            order_list.push(this.value);
        });
        $('input[name="acc_list[]"]:checked').each(function () {
            acc_list.push(this.value);
        });
        $.ajax({
            'url': base_url + 'index.php/order/detail_controller/assign_worker',
            'type': 'POST',
            'data': {
                'order_id': order_list[0],
                'acc_id': acc_list[0]
            },
            'success': function (xhr) {
                $('#event_result').html(xhr);
            },
            'error': function (xhr) {
                $('#event_result').html('error' + xhr);
            }
        });
    });
})