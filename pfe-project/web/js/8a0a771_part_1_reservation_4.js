
$(document).ready(function(){



    $("#custom").flatpickr({

        enableTime: true,
        dateFormat: "Y-m-d H:i",
        mode: "range",
        minDate: "today",
        onChange: function(selectedDates, dateStr, instance){

            var from = selectedDates[0].getFullYear() + "-" + numeroAdosCaracteres(selectedDates[0].getMonth() + 1) + "-" + numeroAdosCaracteres(selectedDates[0].getDate());
            var to = selectedDates[1].getFullYear() + "-" + numeroAdosCaracteres(selectedDates[1].getMonth() + 1) + "-" + numeroAdosCaracteres(selectedDates[1].getDate());



            $.ajax({
                url:"/apicar/reservation/add/date",
                type:'GET',
                data:{
                    from: from,
                    to: to
                },
                dataType:'json',
                success:function(data){
                    location.reload();
                }
            });

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
