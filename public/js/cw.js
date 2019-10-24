(function(b) { b.toast = function(a, h, g, l, k) { b(".cw-toast-container").length || (b("body").prepend('<div class="cw-toast-container" aria-live="polite" aria-atomic="true"></div>'), b(".cw-toast-container").append('<div class="cw-toast-wrapper"></div>')); var c = "", d = "", e = "text-muted", f = "", m = "object" === typeof a ? a.title || "" : a || "Notice!"; h = "object" === typeof a ? a.subtitle || "" : h || ""; g = "object" === typeof a ? a.content || "" : g || ""; k = "object" === typeof a ? a.delay || 3E3 : k || 3E3; switch ("object" === typeof a ? a.type || "" : l || "info") { case "info": c = "bg-info"; f = e = d = "text-white"; break; case "success": c = "bg-success"; f = e = d = "text-white"; break; case "warning": case "warn": c = "bg-warning"; f = e = d = "text-dark"; break; case "error": case "danger": c = "bg-danger", f = e = d = "text-white" } a = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="' + k + '">' + ('<div class="toast-header  border-0 ' + c + " " + d + '">') + ('<strong class="mr-auto">' + m + "</strong>"); a += '<small class="' + e + '">' + h + "</small>"; a += '<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">'; a += '<span aria-hidden="true" class="' + f + '">&times;</span>'; a += "</button>"; a += "</div>"; "" !== g && (a += '<div class="toast-body">', a += g, a += "</div>"); a += "</div>"; b(".cw-toast-wrapper").append(a); b(".cw-toast-wrapper .toast:last").toast("show") } })(jQuery);

// $.toast({ title: title, subtitle: '11 mins ago', content: content, type: type, delay: 5000 });

function checkAdmin() {
    if (document.getElementById('adm-check-nav').checked == true) {
        document.getElementById("adm-grid-all").classList.add("adm-checked");
        //********INICIO DEL BTN ***********
        document.getElementById("adm-icon-menu").classList.remove("fa-times");
        document.getElementById("adm-icon-menu").classList.add("fa-arrow-right");
    } else if (document.getElementById('adm-check-nav').checked == false) {
        document.getElementById("adm-grid-all").classList.remove("adm-checked");
        //********INICIO DEL BTN ***********
        document.getElementById("adm-icon-menu").classList.add("fa-times");
        document.getElementById("adm-icon-menu").classList.remove("fa-arrow-right");
    }
}