

$(document).ready(function(){

    $('#reservation_save').removeAttr("type");
    console.log($('#reservation_save').text())

    $('#reservation_save').on('click',function (e) {
        e.preventDefault();

        console.log(checkEmtyField('endTime'));
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

        if(!checkEmtyField('endTime')){

            addErrorBorder('endTime');

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
                    localStorage.setItem('add','reservation');
                }
            });
        }else{
            removeErrorBorder('endTime')
        }


    })
    $("#custom").flatpickr({

        enableTime: false,
        dateFormat: "Y-m-d",
        mode: "range",
        minDate: "today",
        onChange: function (selectedDates, dateStr, instance) {

            let from = selectedDates[0].getFullYear() + "-" + numeroAdosCaracteres(selectedDates[0].getMonth() + 1) + "-" + numeroAdosCaracteres(selectedDates[0].getDate());
            let to = selectedDates[1].getFullYear() + "-" + numeroAdosCaracteres(selectedDates[1].getMonth() + 1) + "-" + numeroAdosCaracteres(selectedDates[1].getDate());

            //Calculate date here
            let startDate = moment(from, "YYYY.MM.DD");
            let endDate = moment(to, "YYYY.MM.DD");

            let daysNumber = endDate.diff(startDate, 'days');
            daysNumber = daysNumber + 1;

            $('.daysNumber').val(daysNumber);

        }

    });

    $("#startTime").flatpickr({

        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        minTime: "09:00",
        maxTime: "20:00",

    });

    $("#endTime").flatpickr({

        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        minTime: "09:00",
        maxTime: "20:00",

    });

    function numeroAdosCaracteres( fecha ) {
        if (fecha > 9){
            return ""+fecha;
        }else{
            return "0"+fecha;
        }
    }

    function checkEmtyField(inputId) {

        return $("#" + inputId).val().length > 0;

    }

    function addErrorBorder(inputId) {

        $("#" + inputId).addClass("error");
    }

    function removeErrorBorder(inputId) {
        $("#" + inputId).removeClass("error");
    }

    $( function () {

        if (localStorage.getItem('add') == 'reservation'){
            iziToast.success({
                title: 'OK',
                message: 'Réservation enregistrer avec success',
            });
        }
        }
    );


    function deleteReservation(idReservation) {

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success m-3',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url:"/apicar/reservation/delete",
                    type:'GET',
                    data:{
                        idCar: idCar
                    },
                    dataType:'json',
                    success:function(data){
                        location.reload();
                    }
                });
            }
        })


    }





})
