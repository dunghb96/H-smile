'use-strict';
var uid = '';
var thoiluong = '';
$(function () {
    $('#bac-si').select2({
        placeholder: "Chọn nha sỹ",
        // allowClear: true,
        dropdownParent: $('#bac-si').parent(),
    })
    firstDoctor = $("#bac-si option:first-child").val();
    $('#bac-si').val(firstDoctor).trigger('change');
    $('#doctor').select2({
        placeholder: "Chọn nha sỹ",
        dropdownParent: $('#doctor').parent(),
    })
    $('#edoctor').select2({
        placeholder: "Chọn nha sỹ",
        dropdownParent: $('#edoctor').parent(),
    })
    var startTime = $('#start_time');
    // var estartTime = ;
    if (startTime.length) {
        startTime.flatpickr({
            enableTime: true,
            dateFormat: "H:i",
            noCalendar: true
        });
    }

    $('#doctor').val(null).trigger('change');
    var chatUsersListWrapper = $('#list-schedule');
    var chatUserList = new PerfectScrollbar(chatUsersListWrapper[0]);
    $('#frm-xl').each(function () {
        var $this = $(this);
        $this.validate({
            rules: {
                doctor: {
                    required: true
                },
                start_time: {
                    required: true
                }
            }
        });
    });
    $('#frm-update').each(function () {
        var $this = $(this);
        $this.validate({
            rules: {
                edoctor: {
                    required: true
                },
                estart_time: {
                    required: true
                }
            }
        });
    });
})
var date = new Date(), nhanvien = 0;
var nextDay = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
// prettier-ignore
var nextMonth = date.getMonth() === 11 ? new Date(date.getFullYear() + 1, 0, 1) : new Date(date.getFullYear(), date.getMonth() + 1, 1);
// prettier-ignore
var prevMonth = date.getMonth() === 11 ? new Date(date.getFullYear() - 1, 0, 1) : new Date(date.getFullYear(), date.getMonth() - 1, 1);

var nam = '', thang = '';

var events = []

// RTL Support
var direction = 'ltr',
    assetPath = '/backend/app-assets/';
if ($('html').data('textdirection') == 'rtl') {
    direction = 'rtl';
}

if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
}

$(document).on('click', '.fc-sidebarToggle-button', function (e) {
    $('.app-calendar-sidebar, .body-content-overlay').addClass('show');
});

$(document).on('click', '.body-content-overlay', function (e) {
    $('.app-calendar-sidebar, .body-content-overlay').removeClass('show');
});

$(document).on('click', '.list-group-item', function (e) {
    id = $(this).data('id');
    xeplich(id);
});

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar'),
        eventToUpdate,
        sidebar = $('.event-sidebar'),
        calendarsColor = {
            0: '',
            1: 'primary',
            2: 'success',
            3: 'danger',
            4: 'warning',
            5: 'info'
        },
        eventForm = $('.event-form'),
        addEventBtn = $('.add-event-btn'),
        // cancelBtn = $('.btn-cancel'),
        updateEventBtn = $('.update-event-btn'),
        toggleSidebarBtn = $('.btn-toggle-sidebar'),
        // eventTitle = $('#title'),
        eventLabel = $('#select-label'),
        estartTime = $('#estart_time'),
        eendTime = $('#eend_time'),
        // eventUrl = $('#event-url'),
        // eventGuests = $('#event-guests'),
        // eventLocation = $('#event-location'),
        // allDaySwitch = $('.allDay-switch'),
        // selectAll = $('.select-all'),
        // calEventFilter = $('.calendar-events-filter'),
        // filterInput = $('.input-filter'),
        // btnDeleteEvent = $('.btn-delete-event'),
        btnXL = $('#btn-xl'),
        selectDoctor = $('#bac-si');
    calendarEditor = $('#event-description-editor');

    // --------------------------------------------
    // On add new item, clear sidebar-right field fields
    // --------------------------------------------
    $('.add-event button').on('click', function (e) {
        $('.event-sidebar').addClass('show');
        $('.sidebar-left').removeClass('show');
        $('.app-calendar .body-content-overlay').addClass('show');
    });

    // Label  select
    if (eventLabel.length) {
        function renderBullets(option) {
            if (!option.id) {
                return option.text;
            }
            var $bullet =
                "<span class='bullet bullet-" +
                $(option.element).data('label') +
                " bullet-sm mr-50'> " +
                '</span>' +
                option.text;

            return $bullet;
        }
        eventLabel.wrap('<div class="position-relative"></div>').select2({
            placeholder: 'Select value',
            dropdownParent: eventLabel.parent(),
            templateResult: renderBullets,
            templateSelection: renderBullets,
            minimumResultsForSearch: -1,
            escapeMarkup: function (es) {
                return es;
            }
        });
    }

    // Event click function
    function eventClick(info) {
        eventToUpdate = info.event;
        if (eventToUpdate.url) {
            info.jsEvent.preventDefault();
            window.open(eventToUpdate.url, '_blank');
        }

        sidebar.modal('show');
        addEventBtn.addClass('d-none');
        // cancelBtn.addClass('d-none');
        updateEventBtn.removeClass('d-none');
        // btnDeleteEvent.removeClass('d-none');
        dateat = new Date(eventToUpdate.extendedProps.date_at.replace(/-/g, "/"));
        $('#edate_at').flatpickr({
            altInput: true,
            altFormat: "d/m/Y",
            defaultDate: dateat,
            dateFormat: "d/m/Y",
        });
        $('#data-ename').html(eventToUpdate.extendedProps.customer_name);
        $('#data-ephone').html(eventToUpdate.extendedProps.phone_number);
        $('#data-eservice').html(eventToUpdate.extendedProps.service_name);
        $('#data-etime').html(eventToUpdate.extendedProps.service_time + ' phút');
        $('#edoctor').val(eventToUpdate.extendedProps.doctor_id).trigger('change');

        $('#estart_time').flatpickr({
            altInput: true,
            defaultDate: eventToUpdate.start,
            altFormat: "H:i",
            enableTime: true,
            dateFormat: "H:i",
            noCalendar: true
        });
        $('#eend_time').flatpickr({
            defaultDate: eventToUpdate.end,
            dateFormat: "H:i"
        });
        $('#eend_time').attr("disabled", true);
        $('#enote').val(eventToUpdate.extendedProps.note);
        uid = eventToUpdate.extendedProps.id;
        thoiluong = eventToUpdate.extendedProps.service_time;

        // eventTitle.val(eventToUpdate.title);
        // estartTime.setDate(eventToUpdate.start, true, 'Y-m-d H:i:s');
        // eventToUpdate.allDay === true ? allDaySwitch.prop('checked', true) : allDaySwitch.prop('checked', false);
        // eventToUpdate.end !== null
        //     ? end.setDate(eventToUpdate.end, true, 'Y-m-d')
        //     : end.setDate(eventToUpdate.start, true, 'Y-m-d');
        // sidebar.find(eventLabel).val(eventToUpdate.extendedProps.calendar).trigger('change');
        // eventToUpdate.extendedProps.location !== undefined ? eventLocation.val(eventToUpdate.extendedProps.location) : null;
        // eventToUpdate.extendedProps.guests !== undefined
        //     ? eventGuests.val(eventToUpdate.extendedProps.guests).trigger('change')
        //     : null;
        // eventToUpdate.extendedProps.guests !== undefined
        //     ? calendarEditor.val(eventToUpdate.extendedProps.description)
        //     : null;

        //  Delete Event
        // btnDeleteEvent.on('click', function () {
        //     eventToUpdate.remove();
        //     // removeEvent(eventToUpdate.id);
        //     sidebar.modal('hide');
        //     $('.event-sidebar').removeClass('show');
        //     $('.app-calendar .body-content-overlay').removeClass('show');
        // });
    }

    // Modify sidebar toggler
    function modifyToggler() {
        $('.fc-sidebarToggle-button')
            .empty()
            .append(feather.icons['menu'].toSvg({ class: 'ficon' }));
    }

    // Selected Checkboxes
    function selectedCalendars() {
        var selected = [];
        $('.calendar-events-filter input:checked').each(function () {
            selected.push($(this).attr('data-value'));
        });
        return selected;
    }

    // Event click function
    function eventDrop(info) {
        eventToUpdate = info.event;
        var data = {};
        start_time = String(eventToUpdate.start);
        start_time = start_time.split(" ");
        end_time = String(eventToUpdate.end);
        end_time = end_time.split(" ");
        data.id = eventToUpdate.extendedProps.id;
        data.date_at = eventToUpdate.extendedProps.date_at;
        data.doctor_id = eventToUpdate.extendedProps.doctor_id;
        data.start_time = start_time[4];
        data.end_time = end_time[4];
        data.note = eventToUpdate.extendedProps.note;
        $.ajax({
            type: "POST",
            dataType: "json",
            data: data,
            url: "/admin/examination-schedule/xeplich",
            success: function (data) {
                if (data.success) {
                    calendar.refetchEvents();
                    notyfi_success(data.msg);
                }
            },
            error: function () {
                notify_error('Lỗi truy xuất database');
            }
        });
    }

    // --------------------------------------------------------------------------------------------------
    // AXIOS: fetchEvents
    // * This will be called by fullCalendar to fetch events. Also this can be used to refetch events.
    // --------------------------------------------------------------------------------------------------
    function fetchEvents(info, successCallback) {
        doctorId = selectDoctor.val();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: { doctor_id: doctorId, nam: nam, thang: thang },
            url: '/admin/examination-schedule/json',
            success: function (data) {
                events = [];
                if (data.data) {
                    let i = 0;
                    data.data.forEach(function (item) {
                        let allday = false;
                        let arr = [];
                        if (item.id > 0) {
                            arr = {
                                id: item.id,
                                title: '#' + item.id + ' ' + item.service_name,
                                start: new Date(item.date_at + ' ' + item.start_time),
                                end: new Date(item.date_at + ' ' + item.end_time),
                                allDay: allday,
                                extendedProps: {
                                    id: item.id,
                                    calendar: '1',
                                    date_at: item.date_at,
                                    doctor_id: item.doctor_id,
                                    service_name: item.service_name,
                                    service_time: item.service_time,
                                    customer_name: item.customer_name,
                                    phone_number: item.phone_number,
                                    note: item.note,
                                    start_time: item.start_time,
                                    end_time: item.end_time
                                }
                            };
                            events.push(arr);
                            i++;
                        }
                    })
                }
                var calendars = selectedCalendars();
                // We are reading event object from app-calendar-events.js file directly by including that file above app-calendar file.
                // You should make an API call, look into above commented API call for reference
                selectedEvents = events.filter(function (event) {
                    return calendars.includes(event.extendedProps.calendar.toLowerCase());
                });
                // if (selectedEvents.length > 0) {
                successCallback(selectedEvents);
                // }
            },
            error: function () {
                notify_error('Lỗi truy xuất database');
            }
        });

    }

    // Calendar plugins
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'listMonth',
        events: fetchEvents,
        eventOrder: "id",
        editable: true,
        dragScroll: true,
        dayMaxEvents: 2,
        selectOverlap: false,
        eventOverlap: false,
        eventResizableFromStart: true,
        customButtons: {
            sidebarToggle: {
                text: 'Sidebar'
            }
        },
        headerToolbar: {
            start: 'sidebarToggle, prev,next, title',
            end: 'listMonth,timeGridDay,timeGridWeek'
            // end: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        direction: direction,
        initialDate: new Date(),
        navLinks: true, // can click day/week names to navigate views
        eventClassNames: function ({ event: calendarEvent }) {
            const colorName = calendarsColor[calendarEvent._def.extendedProps.calendar];
            if (calendarEvent._def.extendedProps.calendar > 0) {
                if (colorName) {
                    if (colorName == 'dark') {
                        return [
                            // Background Color
                            'bg-light-' + colorName,
                            'text-white',
                        ];
                    } else if (colorName != '') {
                        return [
                            // Background Color
                            'bg-light-' + colorName
                        ];
                    }
                } else {
                    return [
                        // Background Color
                        'bg-light-primary',
                        'text-white',
                    ];
                }
            }
        },
        dateClick: function (info) {
            // var date = moment(info.date).format('YYYY-MM-DD');
            // resetValues();
            // sidebar.modal('show');
            // addEventBtn.removeClass('d-none');
            // updateEventBtn.addClass('d-none');
            // btnDeleteEvent.addClass('d-none');
            // startDate.val(date);
            // endDate.val(date);
        },
        eventClick: function (info) {
            eventClick(info);
        },
        datesSet: function () {
            modifyToggler();
        },
        viewDidMount: function () {
            modifyToggler();
        },
        eventDrop: function (info) {
            eventDrop(info);
        }
    });

    // Render calendar
    calendar.render();
    // Modify sidebar toggler
    modifyToggler();
    // updateEventClass();

    // Validate add new and update form
    if (eventForm.length) {
        eventForm.validate({
            submitHandler: function (form, event) {
                event.preventDefault();
                if (eventForm.valid()) {
                    sidebar.modal('hide');
                }
            },
            title: {
                required: true
            },
            rules: {
                'start-date': { required: true },
                'end-date': { required: true }
            },
            messages: {
                'start-date': { required: 'Start Date is required' },
                'end-date': { required: 'End Date is required' }
            }

        });
    }

    // Sidebar Toggle Btn
    if (toggleSidebarBtn.length) {
        toggleSidebarBtn.on('click', function () {
            cancelBtn.removeClass('d-none');
        });
    }

    // ------------------------------------------------
    // addEvent
    // ------------------------------------------------
    function addEvent(eventData) {
        calendar.addEvent(eventData);
        calendar.refetchEvents();
    }

    // ------------------------------------------------
    // updateEvent
    // ------------------------------------------------
    function updateEvent(eventData) {
        var propsToUpdate = ['id', 'title', 'url'];
        var extendedPropsToUpdate = ['calendar', 'guests', 'location', 'description'];

        updateEventInCalendar(eventData, propsToUpdate, extendedPropsToUpdate);
    }

    // ------------------------------------------------
    // removeEvent
    // ------------------------------------------------
    function removeEvent(eventId) {
        removeEventInCalendar(eventId);
    }

    // ------------------------------------------------
    // (UI) updateEventInCalendar
    // ------------------------------------------------
    const updateEventInCalendar = (updatedEventData, propsToUpdate, extendedPropsToUpdate) => {
        const existingEvent = calendar.getEventById(updatedEventData.id);

        // --- Set event properties except date related ----- //
        // ? Docs: https://fullcalendar.io/docs/Event-setProp
        // dateRelatedProps => ['start', 'end', 'allDay']
        // eslint-disable-next-line no-plusplus
        for (var index = 0; index < propsToUpdate.length; index++) {
            var propName = propsToUpdate[index];
            existingEvent.setProp(propName, updatedEventData[propName]);
        }

        // --- Set date related props ----- //
        // ? Docs: https://fullcalendar.io/docs/Event-setDates
        existingEvent.setDates(updatedEventData.start, updatedEventData.end, { allDay: updatedEventData.allDay });

        // --- Set event's extendedProps ----- //
        // ? Docs: https://fullcalendar.io/docs/Event-setExtendedProp
        // eslint-disable-next-line no-plusplus
        for (var index = 0; index < extendedPropsToUpdate.length; index++) {
            var propName = extendedPropsToUpdate[index];
            existingEvent.setExtendedProp(propName, updatedEventData.extendedProps[propName]);
        }
    };

    // ------------------------------------------------
    // (UI) removeEventInCalendar
    // ------------------------------------------------
    function removeEventInCalendar(eventId) {
        calendar.getEventById(eventId).remove();
    }

    // Add new event
    // $(addEventBtn).on('click', function () {
    //     if (eventForm.valid()) {
    //         var newEvent = {
    //             id: calendar.getEvents().length + 1,
    //             title: eventTitle.val(),
    //             start: startDate.val(),
    //             end: endDate.val(),
    //             startStr: startDate.val(),
    //             endStr: endDate.val(),
    //             display: 'block',
    //             extendedProps: {
    //                 location: eventLocation.val(),
    //                 guests: eventGuests.val(),
    //                 calendar: eventLabel.val(),
    //                 description: calendarEditor.val()
    //             }
    //         };
    //         if (eventUrl.val().length) {
    //             newEvent.url = eventUrl.val();
    //         }
    //         if (allDaySwitch.prop('checked')) {
    //             newEvent.allDay = true;
    //         }
    //         addEvent(newEvent);
    //     }
    // });

    // Update new event
    updateEventBtn.on('click', function () {
        // if (eventForm.valid()) {
        //     var eventData = {
        //         id: eventToUpdate.id,
        //         title: sidebar.find(eventTitle).val(),
        //         start: sidebar.find(startDate).val(),
        //         end: sidebar.find(endDate).val(),
        //         url: eventUrl.val(),
        //         extendedProps: {
        //             location: eventLocation.val(),
        //             guests: eventGuests.val(),
        //             calendar: eventLabel.val(),
        //             description: calendarEditor.val()
        //         },
        //         display: 'block',
        //         allDay: allDaySwitch.prop('checked') ? true : false
        //     };

        //     updateEvent(eventData);
        //     sidebar.modal('hide');
        // }
        var isValid = $('#frm-update').valid();
        if (isValid) {
            var info = {};
            info.id = uid;
            info.date_at = $('#edate_at').val();
            info.doctor_id = $('#edoctor').val();
            info.start_time = $('#estart_time').val();
            info.end_time = $('#eend_time').val();
            info.note = $('#enote').val();
            $.ajax({
                type: "POST",
                dataType: "json",
                data: info,
                url: "/admin/examination-schedule/xeplich",
                success: function (data) {
                    if (data.success) {
                        calendar.refetchEvents();
                        sidebar.modal('hide');
                        notyfi_success(data.msg);
                    }
                },
                error: function () {
                    notify_error('Lỗi truy xuất database');
                }
            });
        }
    });

    // Reset sidebar input values
    function resetValues() {
        // endDate.val('');
        // eventUrl.val('');
        // startDate.val('');
        // eventTitle.val('');
        // eventLocation.val('');
        // allDaySwitch.prop('checked', false);
        // eventGuests.val('').trigger('change');
        // calendarEditor.val('');
    }

    // When modal hides reset input values
    sidebar.on('hidden.bs.modal', function () {
        resetValues();
    });

    // Hide left sidebar if the right sidebar is open
    $('.btn-toggle-sidebar').on('click', function () {
        btnDeleteEvent.addClass('d-none');
        updateEventBtn.addClass('d-none');
        addEventBtn.removeClass('d-none');
        $('.app-calendar-sidebar, .body-content-overlay').removeClass('show');
    });

    // Select all & filter functionality
    // if (selectAll.length) {
    //     selectAll.on('change', function () {
    //         var $this = $(this);

    //         if ($this.prop('checked')) {
    //             calEventFilter.find('input').prop('checked', true);
    //         } else {
    //             calEventFilter.find('input').prop('checked', false);
    //         }
    //         calendar.refetchEvents();
    //     });
    // }

    // if (filterInput.length) {
    //     filterInput.on('change', function () {
    //         $('.input-filter:checked').length < calEventFilter.find('input').length
    //             ? selectAll.prop('checked', false)
    //             : selectAll.prop('checked', true);
    //         calendar.refetchEvents();
    //     });
    // }

    selectDoctor.on('select2:select', function (e) {
        //calendar.removeAllEvents();
        calendar.refetchEvents();
    });

    btnXL.on('click', function () {
        var isValid = $('#frm-xl').valid();
        if (isValid) {
            var info = {};
            info.id = uid;
            info.date_at = $('#date_at').val();
            info.doctor_id = $('#doctor').val();
            info.start_time = $('#start_time').val();
            info.end_time = $('#end_time').val();
            info.note = $('#note').val();
            $.ajax({
                type: "POST",
                dataType: "json",
                data: info,
                url: "/admin/examination-schedule/xeplich",
                success: function (data) {
                    if (data.success) {
                        calendar.refetchEvents();
                        $("#xep-lich").modal('hide');
                        $('#schedule-' + id).addClass('d-none');
                        notyfi_success(data.msg);

                    }
                },
                error: function () {
                    notify_error('Lỗi truy xuất database');
                }
            });
        }
    })
});

function xeplich(id) {
    $("#xep-lich").modal('show');
    $(".modal-title").html('Xếp lịch');
    $.ajax({
        type: "POST",
        dataType: "json",
        data: { id: id },
        url: "/admin/examination-schedule/loaddata",
        success: function (data) {
            $('#data-name').html(data.customer_name);
            $('#data-phone').html(data.phone_number);
            $('#data-service').html(data.service_name);
            $('#data-time').html(data.service_time + ' phút');
            $('#end_time').attr("disabled", true);
            $('#date_at').flatpickr({
                altInput: true,
                altFormat: "d/m/Y",
                defaultDate: data.date_at,
                dateFormat: "d/m/Y",
                minDate: "today",
            });
            thoiluong = data.service_time;
            uid = id;
        },
        error: function () {
            notify_error('Lỗi truy xuất database');
        }
    });
}

function gioRa() {
    startTime = $('#start_time').val();
    $.ajax({
        type: "POST",
        dataType: "json",
        data: { start_time: startTime, time: thoiluong },
        url: "/admin/examination-schedule/changeTime",
        success: function (data) {
            $('#end_time').flatpickr({
                altInput: true,
                defaultDate: data.end_time,
                altFormat: "H:i",
                dateFormat: "H:i",
            });
        },
        error: function () {
            notify_error('Lỗi truy xuất database');
        }
    });
}

function egioRa() {
    startTime = $('#estart_time').val();
    $.ajax({
        type: "POST",
        dataType: "json",
        data: { start_time: startTime, time: thoiluong },
        url: "/admin/examination-schedule/changeTime",
        success: function (data) {
            $('#eend_time').flatpickr({
                altInput: true,
                defaultDate: data.end_time,
                altFormat: "H:i",
                dateFormat: "H:i",
            });
        },
        error: function () {
            notify_error('Lỗi truy xuất database');
        }
    });
}
