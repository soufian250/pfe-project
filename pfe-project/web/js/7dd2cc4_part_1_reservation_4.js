

$(document).ready(function(){

    $('#reservation_save').removeAttr("type");
    $('#reservation_save').on('click',function (e) {
        e.preventDefault();



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

        }else{
            removeErrorBorder('endTime');

            let selectedUser = $( "#reservation_client option:selected" ).val()
            let selectedCar = $( "#reservation_car option:selected" ).val()

            $.ajax({
                url:"/apicar/reservation/add/date",
                type:'GET',
                data:{
                    from: from,
                    to: to,
                    daysNumber: daysNumber,
                    startTime,
                    endTime,
                    selectedUser: selectedUser,
                    selectedCar: selectedCar
                },
                dataType:'json',
                success:function(data){

                    // TODO: Change this hard coded link later
                     window.location.href = 'http://127.0.0.1:8000/reservation/show?flash=reservation';
                }
            });




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

        let link = window.location.href.split("?")[1];

        if (link !== undefined){

            let after_ = link.substring(link.indexOf('=') + 1);
            let linkToCheck = "flash="+after_;

            if (link === linkToCheck){


                iziToast.success({
                    title: 'Ajoute success',
                    message: after_+' enregistrer avec success',
                });
                let newLink = window.location.href.split("?")[0];
                window.history.pushState("", "", newLink);
            }
        }

    });


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
