(function () {
    $('.mango-labels-select').dropdown({
        onChange: function (value) {
            var $this = $(this),
                orderId = $this.data('order-id');
            if (!!orderId) {
                $this.addClass('loading');
                $.ajax({
                    method: 'POST',
                    url: "/admin/ajax-save-labels/order/" + orderId,
                    data: value
                }).done(function () {
                    $this.removeClass('loading');
                }).fail(function () {
                    alert('Unable to save labels!');
                })
            }
        }
    });
})();
