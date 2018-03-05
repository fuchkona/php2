$(function () {
    // just a little function to go away ^_^
    function goToUrl(url) {
        window.location = url;
    }

    // toggle my account panel visibility
    $('#my-account-btn').on('click', function () {
        togglePanelVisible($('#my-account-panel'), $('#my-account-btn'), -14, 16);
    });

    // function for toggle panel's visibility
    function togglePanelVisible($panel, $object, adjustX, adjustY) {
        $panel.css({top: $object.offset().top + $object.height() + adjustY, left: $object.offset().left + adjustX})
        $panel.toggleClass('show');
    }


    $('a[data-type="btn-good-delete"]').on('click', function () {
        if (confirm('Are you sure?')) {
            var $btn = $(this);
            $.ajax({
                type: "POST",
                url: "/ajax/admin-delete-good/",
                data: {
                    id: $(this).data('id')
                },
                success: function (data) {
                    if (data !== "error") {
                        alert(data);
                        $btn.closest('tr').remove();
                    }
                },
                dataType: 'text'
            });
        }
    })


});