$(document).ready(function(){

})



function onlyNumericValue(ele) {

    $(ele).on("keypress", function (e) {
        if (isNaN(this.value + '' + String.fromCharCode(e.charCode))) return false;
    });
    $(ele).on("paste", function (e) {
        e.preventDefault();
    });
}

onlyNumericValue('#car_seat');
onlyNumericValue('#car_door');
onlyNumericValue('#car_passenger');

function deleteCar(idCar) {

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
                url:"/apicar/car/delete",
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

$(document).ready(function(){

});


function deleteClient(idClient) {

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
                url:"/apiclient/client/delete",
                type:'GET',
                data:{
                    idClient: idClient
                },
                dataType:'json',
                success:function(data){
                    location.reload();
                }
            });
        }
    })


}






$(document).ready(function(){


    $("#post_title").keyup(function(e){
        let typedText = $(this).val();
        let sluggedText = slugifyInput(typedText);
        $("#post_slug").val(sluggedText);

    });

})

function slugifyInput(text) {

    const from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;"
    const to = "aaaaaeeeeeiiiiooooouuuunc------"

    const newText = text.split('').map(
        (letter, i) => letter.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i)))

    return newText
        .toString()                     // Cast to string
        .toLowerCase()                  // Convert the string to lowercase letters
        .trim()                         // Remove whitespace from both sides of a string
        .replace(/\s+/g, '-')           // Replace spaces with -
        .replace(/&/g, '-and-')           // Replace & with 'and'
        .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
        .replace(/\-\-+/g, '-');        // Replace multiple - with single -
}


$(document).ready(function(){



    $("#custom").flatpickr({

        enableTime: true,
        dateFormat: "Y-m-d H:i",
        mode: "range",
        minDate: "today",
        onChange: function(selectedDates, dateStr, instance){

            var from = selectedDates[0].getFullYear() + "-" + numeroAdosCaracteres(selectedDates[0].getMonth() + 1) + "-" + numeroAdosCaracteres(selectedDates[0].getDate());
            var to = selectedDates[1].getFullYear() + "-" + numeroAdosCaracteres(selectedDates[1].getMonth() + 1) + "-" + numeroAdosCaracteres(selectedDates[1].getDate());

            //Calculate date here
            var startDate = moment(from, "YYYY.MM.DD");
            var endDate = moment(to, "YYYY.MM.DD");


            let result = endDate.diff(startDate, 'days');

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
