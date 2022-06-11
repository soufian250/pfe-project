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
