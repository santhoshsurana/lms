var App = function () {
    var handleDateTimePickers = function () {
        if (jQuery().datepicker) {
            $('.date-picker').datepicker();
        }
    }
    return {
        init: function () {
            handleDateTimePickers();
        }
    };
}();