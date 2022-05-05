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


alert(655);



