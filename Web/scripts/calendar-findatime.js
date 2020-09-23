function CalendarFindATime(opts) {
    var _options = opts;
    var _fullCalendar;

    var dayDialog = $('#dayDialog');

    var elements = {
        loadingIndicator: $('#loadingIndicator'),
        moveReservationForm: $('#moveReservationForm'),
        moveReferenceNumber: $('#moveReferenceNumber'),
        moveStartDate: $('#moveStartDate'),
        moveErrorOk: $('#moveErrorOk'),
        moveErrorDialog: $('#moveErrorDialog'),
        moveErrorsList: $('#moveErrorsList'),
        searchForm: $('#searchForm'),
        calendarItem: $('#page-calendar'),
        today: $('#today'),
        tomorrow: $('#tomorrow'),
        thisweek: $('#thisweek'),
        daterange: $('#daterange')
    };

    CalendarFindATime.prototype.init = function () {

        function showLoadingIndicator() {
            elements.loadingIndicator.removeClass('no-show');
        }

        function hideLoadingIndicator() {
            elements.loadingIndicator.addClass('no-show');
        }

        _fullCalendar = $('#findatime-calendar').fullCalendar({
            header: {
                left: 'prev,next,today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: _options.todayText,
                month: _options.monthText,
                week: _options.weekText,
                day: _options.dayText
            },
            allDaySlot: false,
            defaultView: _options.view,
            defaultDate: _options.defaultDate,
            eventRender: function (event, element, view) {
                element.attachResourceFindATimePopup(event.id, true);
            },
            dayClick: dayClick,
            dayNames: _options.dayNames,
            dayNamesShort: _options.dayNamesShort,
            monthNames: _options.monthNames,
            monthNamesShort: _options.monthNamesShort,
            timeFormat: _options.timeFormat,
            firstDay: _options.firstDay,
            loading: function (isLoading) {
                if (isLoading) {
                    showLoadingIndicator();
                }
                else {
                    hideLoadingIndicator();
                }
            },
            // eventDrop: function(event, delta, revertFunc) {
            //     var handleMoveResponse = function(result) {
            //         hideLoadingIndicator();
            //         if (result.errors.length > 0)
            //         {
            //             revertFunc();

            //             var messages = result.errors.join('</li><li>');
            //             messages = '<li>' + messages + '</li>';
            //             elements.moveErrorsList.empty().append(messages);
            //             elements.moveErrorDialog.modal('show');
            //         }
            //     };

            //     elements.moveReferenceNumber.val(event.id);
            //     elements.moveStartDate.val(event.start.format('YYYY-MM-DD HH:mm'));
            //     ajaxPost(elements.moveReservationForm, _options.moveReservationUrl, showLoadingIndicator, handleMoveResponse);
            // }
        });

        $('.fc-widget-content').hover(
            function () {
                $(this).addClass('hover');
            },

            function () {
                $(this).removeClass('hover');
            }
        );

        dayDialog.find('a').click(function (e) {
            e.preventDefault();
        });

        $('#showResourceGroups').click(function (e) {
            e.preventDefault();

            var resourceGroupsContainer = $('#resourceGroupsContainer');

            if (resourceGroupsContainer.is(':visible')) {
                resourceGroupsContainer.hide();
            }
            else {
                if (!resourceGroupsContainer.data('positionSet')) {
                    resourceGroupsContainer.position({my: 'left top', at: 'right bottom', of: '#showResourceGroups'})
                }
                resourceGroupsContainer.data('positionSet', true);
                resourceGroupsContainer.show();
            }
        })

        elements.moveErrorOk.click(function(e) {
            e.preventDefault();
            elements.moveErrorDialog.modal('hide');
        })

        ConfigureAsyncForm(elements.searchForm, function () {
            elements.calendarItem.addClass('no-show');
            _fullCalendar.fullCalendar('removeEvents');
        }, showSearchResults);
    };

    var showSearchResults = function (data) {
        elements.calendarItem.removeClass('no-show');
        _fullCalendar.fullCalendar('addEventSource', data);
        _fullCalendar.fullCalendar('refetchEvents');
        if(today.checked || tomorrow.checked){
            _fullCalendar.fullCalendar('changeView', 'agendaDay');
        }
        if(thisweek.checked){
            _fullCalendar.fullCalendar('changeView', 'agendaWeek');
        }
        if(daterange.checked){
            _fullCalendar.fullCalendar('changeView', 'month');
        }
        _fullCalendar.fullCalendar('gotoDate', moment(data[0].start, 'YYYY-MM-DD'));
    };

    CalendarFindATime.prototype.bindResourceGroups = function (resourceGroups, selectedNode) {
        if (resourceGroups.length == 0) {
            $('#showResourceGroups').hide();
            return;
        }

        // this is copied out of schedule.js, so this needs to be fixed

        function ChangeGroup(groupId) {
            RedirectToSelf('gid', /gid=\d+/i, "gid=" + groupId, RemoveResourceId);
        }

        function ChangeResource(resourceId) {
            RedirectToSelf('rid', /rid=\d+/i, "rid=" + resourceId, RemoveGroupId);
        }

        function RemoveResourceId(url) {
            if (!url) {
                url = window.location.href;
            }
            return url.replace(/&*rid=\d+/i, "");
        }

        function RemoveGroupId(url) {
            return url.replace(/&*gid=\d+/i, "");
        }

        function RedirectToSelf(queryStringParam, regexMatch, substitution, preProcess) {
            var url = window.location.href;
            var newUrl = window.location.href;

            if (preProcess) {
                newUrl = preProcess(url);
                newUrl = newUrl.replace(/&{2,}/i, "");
            }

            if (newUrl.indexOf(queryStringParam + "=") != -1) {
                newUrl = newUrl.replace(regexMatch, substitution);
            }
            else if (newUrl.indexOf("?") != -1) {
                newUrl = newUrl + "&" + substitution;
            }
            else {
                newUrl = newUrl + "?" + substitution;
            }

            newUrl = newUrl.replace("#", "");

            window.location = newUrl;
        }

        var groupDiv = $("#resourceGroups");
        groupDiv.tree({
            data: resourceGroups,
            saveState: 'resourceCalendar',

            onCreateLi: function (node, $li) {
                if (node.type == 'resource') {
                    $li.addClass('group-resource');
                }
            }
        });

        groupDiv.bind(
            'tree.select',
            function (event) {
                if (event.node) {
                    var node = event.node;
                    if (node.type == 'resource') {
                        ChangeResource(node.resource_id);
                    }
                    else {
                        ChangeGroup(node.id);
                    }
                }
            });

        if (selectedNode) {
            groupDiv.tree('openNode', groupDiv.tree('getNodeById', selectedNode));
        }
    };

    var dateVar = null;

    var dayClick = function (date, jsEvent, view) {
        dateVar = date;

        if (!opts.reservable) {
            drillDownClick();
            return;
        }

        if (view.name.indexOf("Day") > 0) {
            handleTimeClick();
        }
        else {
            //dayDialog.dialog({modal: false, height: 70, width: 'auto'});
            /*dayDialog.position({
                my: 'left bottom',
                at: 'left top',
                of: jsEvent
            });*/
        }
    };

    var handleTimeClick = function (e) {
        openNewReservation();
    };

    var drillDownClick = function () {
        var month = dateVar.month() + 1;
        var url = _options.dayClickUrl;
        url = url + '&start=' + dateVar.year() + '-' + month + '-' + dateVar.date();

        window.location = url;
    };
}