$(document).ready(function () {

    var custom = new Datepicker('#custom', {
        min: (function(){
            let date = new Date();
            date.setDate(date.getDate() - 1);
            return date;
        })(),
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd',
        inline: true,
        ranged: true,
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


    $(".dateTim").focus(function(){
       $('.custom ').slideDown();
    });

    $(".dateTim").focusout(function(){
       $('.custom ').slideUp();
    });

})
