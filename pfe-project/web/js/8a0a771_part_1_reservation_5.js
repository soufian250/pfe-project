
$(document).ready(function(){

    $('.reservation-validate').on('click',function () {
        alert(44);
    })
    $("#custom").flatpickr({

        enableTime: false,
        dateFormat: "Y-m-d",
        mode: "range",
        minDate: "today",
        onChange: function(selectedDates, dateStr, instance){

            let from = selectedDates[0].getFullYear() + "-" + numeroAdosCaracteres(selectedDates[0].getMonth() + 1) + "-" + numeroAdosCaracteres(selectedDates[0].getDate());
            let to = selectedDates[1].getFullYear() + "-" + numeroAdosCaracteres(selectedDates[1].getMonth() + 1) + "-" + numeroAdosCaracteres(selectedDates[1].getDate());

            //Calculate date here
            let startDate = moment(from, "YYYY.MM.DD");
            let endDate = moment(to, "YYYY.MM.DD");
            let daysNumber = endDate.diff(startDate, 'days');

            daysNumber = daysNumber+1;

            $('.daysNumber').val(daysNumber);

            console.log(daysNumber);
            $.ajax({
                url:"/apicar/reservation/add/date",
                type:'GET',
                data:{
                    from: from,
                    to: to,
                    daysNumber: daysNumber
                },
                dataType:'json',
                success:function(data){

                }
           });
        },

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
