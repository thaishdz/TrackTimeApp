$(document).ready(function () {        
    $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
        placement : 'left',
        onConfirm: function (event, element) {
            element.closest('form').submit();
        }
    });   
});