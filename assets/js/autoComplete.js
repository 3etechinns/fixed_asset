$(document).ready(function () {
    $('#txtCountry').typeahead({
        source: function (query, result) {
            $.ajax({
                url: 'http://localhost/fixed_asset/ass_track/searchEmployeeForAutocomplete',
                data: 'query=' + query,
                dataType: "json",
                type: "POST",
                success: function (data) {
                    result($.map(data, function (item) {
                        return item;
                    }));
                }
            });
        }
    });
});