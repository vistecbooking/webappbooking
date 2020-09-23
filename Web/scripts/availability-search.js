function AvailabilitySearch(options) {
    var elements = {
        searchForm: $('#searchForm'),
        availabilityResults: $('#availability-results'),
        anyResource: $('#anyResource'),
        resourceGroups: $('#resourceGroups'),
        daterange: $('input[name="AVAILABILITY_RANGE"]'),
        beginDate: $('#beginDate'),
        endDate: $('#endDate'),
        calendarItem: $('#page-calendar')
    };

    var init = function () {
        elements.calendarItem.addClass('no-show');

        elements.availabilityResults.on('click', '.opening', function (e) {
            var opening = $(this);
            window.location = options.reservationUrlTemplate
                .replace('[rid]', encodeURIComponent(opening.data('resourceid')))
                .replace('[sd]', encodeURIComponent(opening.data('startdate')))
                .replace('[ed]', encodeURIComponent(opening.data('enddate')));
        });

        elements.anyResource.click(function (e) {
            if (elements.anyResource.is(':checked')) {
                elements.resourceGroups.val('').change();
                elements.resourceGroups.attr('disabled', 'disabled');
            }
            else {
                elements.resourceGroups.removeAttr('disabled');
            }
        });

        elements.daterange.change(function(e){
            if ($(e.target).val() == 'daterange') {
                elements.beginDate.removeAttr('disabled');
                elements.endDate.removeAttr('disabled');
            }
            else {
                elements.beginDate.val('').attr('disabled', 'disabled');
                elements.endDate.val('').attr('disabled', 'disabled');
        }
        });
    };

    return {init: init};
}