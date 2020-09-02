const _validation = require("jquery-validation");
import "bootstrap"

export default () => {
    console.log("global");
    $(window).scroll(function (e) {
        let _body = $("html,body").scrollTop();
        let header = $("html,header");
        if (_body > 250) {
            $(header).addClass("_header-color");
        } else {
            $(header).removeClass("_header-color");
        }
    })
    $('.nav-button').click(function () {
        $('body').toggleClass('nav-open');
    });
    $('.nav-search').click(function () {
        $('body').toggleClass('nav-open-1');
    });
    $('.nav-search-close').click(function () {
        $('body').toggleClass('nav-open-1');
    })

}
