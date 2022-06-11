
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
