

$(document).ready(function(){





    $('.reservation-validate').on('click',function () {


        const str = $('#custom').val();

        let from = str.split('to')[0];
        let to = str.split('to')[1];

        let startDate = moment(from, "YYYY.MM.DD");
        let endDate = moment(to, "YYYY.MM.DD");
        let daysNumber = endDate.diff(startDate, 'days');

        daysNumber = daysNumber+1;
        $('.daysNumber').val(daysNumber);

        const startTime = $('#startTime').val();
        const endTime   = $('#endTime').val();

        console.log(startTime,endTime);

        $.ajax({
            url:"/apicar/reservation/add/date",
            type:'GET',
            data:{
                from: from,
                to: to,
                daysNumber: daysNumber,
                startTime,
                endTime
            },
            dataType:'json',
            success:function(data){
                iziToast.error({
                    title: 'success',
                    message: 'Illegal operation',
                });
            }
        });


    })
    $("#custom").flatpickr({

        enableTime: false,
        dateFormat: "Y-m-d",
        mode: "range",
        minDate: "today",

    });


    $("#startTime").flatpickr({

        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        minTime: "09:00",
        maxTime: "20:00",
        onChange: function(selectedHour, dateStr, instance){

             calculateHour(dateStr);
        },

    });

    $("#endTime").flatpickr({

        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        minTime: "09:00",
        maxTime: "20:00",
        onChange: function(selectedHour, dateStr, instance){

            calculateHour(null,dateStr);

            // var duration = moment.duration(end.diff(startTime));
            // var hours = duration.asHours();
        },

    });

    function numeroAdosCaracteres( fecha ) {
        if (fecha > 9){
            return ""+fecha;
        }else{
            return "0"+fecha;
        }
    }



})
