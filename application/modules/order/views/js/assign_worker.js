/**
 * Created by manh on 10/22/14.
 */
$(function () {
    $('.order_info').click(function () {
        $('#order_id').val(this.a_attr.entity_id);
    });
    $('.acc_info').click(function () {
        $('#acc_id').val(this.a_attr.entity_id);
    });
    $('#btn_assign').click(function () {
        $.ajax({
            'url': base_url + 'index.php/order/detail_controller/assign_worker',
            'type': 'POST',
            'data': {
                'order_id': $('#order_id').val(),
                'acc_id': $('#acc_id').val()
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