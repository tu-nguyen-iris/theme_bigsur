const _validation = require("jquery-validation");
import "bootstrap"
export default () =>{
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
}