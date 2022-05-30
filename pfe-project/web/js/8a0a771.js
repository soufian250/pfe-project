$(document).ready(function(){

})


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

    let custom = new Datepicker('#custom', {

        min: (function(){
            let date = new Date();
            date.setDate(date.getDate() - 1);
            return date;
        })(),
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd',
        inline: true,

        time: true,
        classNames: {
            node: 'datepicker custom'
        },

        templates: {
            container: [
                '<div class="datepicker__container">',
                '<% for (var i = 0; i <= 2; i++) { %>',
                '<div class="datepicker__pane">',
                '<%= renderHeader(i) %>',
                '<%= renderCalendar(i) %>',
                '</div>',
                '<% } %>',
                '</div>'
            ].join('')
        }
    });

})
