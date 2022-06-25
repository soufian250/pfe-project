$(document).ready(function () {


    $( function () {

        let link = window.location.href.split("?")[1];
        let after_ = link.substring(link.indexOf('=') + 1);
        let linkToCheck = "flash="+after_;

        if (link === linkToCheck){

            console.log(after_);
            after_ = after_.replace(/\//g, ' ');
            console.log(after_);

            iziToast.success({
                title: 'Ajoute success',
                message: after_,
            });
            let newLink = window.location.href.split("?")[0];
            window.history.pushState("", "", newLink);
        }

    });
})
