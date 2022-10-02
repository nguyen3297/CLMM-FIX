function wait(t, e, n) {
    return e ?
        $(t).prop("disabled", !1).html(n) :
        $(t)
            .prop("disabled", !0)
            .html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>        Loading...'
            );
}


function formatNumber(nStr, decSeperate = ".", groupSeperate = ",") {
    nStr += "";
    x = nStr.split(decSeperate);
    x1 = x[0];
    x2 = x.length > 1 ? "." + x[1] : "";
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, "$1" + groupSeperate + "$2");
    }
    return x1 + x2;
}

function swal(msg, icon) {
    Swal.fire({
        icon: icon,
        title: "Thông báo",
        text: msg,
        confirmButtonText: "Tôi đã hiểu",
    });
}

function isURL(str) {
    var regex =
        /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
    var pattern = new RegExp(regex);
    return pattern.test(str);
}


function copyElementToClipboard(element) {
    window.getSelection().removeAllRanges();
    let range = document.createRange();
    range.selectNode(
        typeof element === "string" ? document.getElementById(element) : element
    );
    window.getSelection().addRange(range);
    document.execCommand("copy");
    window.getSelection().removeAllRanges();
    swal("Sao chép thành công", "success");
}

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    let pathMenu = window.location.href;
    $("ul#sidebar a").each(function() {
        if (this.href === getPathFromUrl(pathMenu)) {
            $(this).addClass("active");
            $(this).parent().closest("li").addClass("active");
            let subMenu = $(this).parent().closest("ul");
            if (subMenu) {
                subMenu.show();
                $(this).parent().parent().closest("li").addClass("active");
            }
        }
    });

    let channel = pusher.subscribe("notification");
    if (typeof profile !== "undefined") {
        channel.bind(`user-${profile.id}`, function(payload) {
            // toastr[`${payload.status}`](`${payload.message}`,'ThÃ´ng bÃ¡o');
            swal(`${payload.message}`, `${payload.status}`);
        });
    }

    $('[data-toggle="tooltip"]').tooltip();
    $("form[submit-ajax=dga]").submit(function(e) {
        e.preventDefault();
        let _this = this;
        let url = $(_this).attr("action");
        let method = $(_this).attr("method");
        let href = $(_this).attr("href");
        let data = $(_this).serialize();
        let button = $(_this).find("button[type=submit]");
        submitForm(url, method, href, data, button);
        swal('DUNGA');
    });
});

function getPathFromUrl(url) {
    return url.split("?")[0];
}

function submitForm(url, method, href, data, button) {
    let textButton = button.html().trim();
    let setting = {
        type: method,
        url,
        data,
        dataType: "JSON",
        beforeSend: function() {
            button
                .prop("disabled", !0)
                .html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Äang xá»­ lÃ½...'
                );
        },
        complete: function() {
            button.prop("disabled", !1).html(textButton);
        },
        success: function(response) {
            if (response.status === true && !button.attr("href")) {
                setTimeout(() => {
                    if (!href) {
                        window.location.reload();
                        return;
                    }
                    window.location.href = href;
                }, 2000);
            }
            if (response.status === true) {
                toastr.success(response.message, "Thông báo");
            } else {
                toastr.error(response.message, "Thông báo");
            }
        },
        error: function(error) {
            console.log(error);
        },
    };
    $.ajax(setting);
}
// $("#min").on("keyup", function(event) {
//     var selection = window.getSelection().toString();
//     if (selection !== '') {
//         return;
//     }
//     if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
//         return;
//     }
//     var $this = $(this);
//     var input = $this.val();
//     var input = input.replace(/[\D\s\._\-]+/g, "");
//     input = input ? parseInt(input, 10) : 0;
//     $this.val(function() {
//         return (input === 0) ? "" : input.toLocaleString("en-US");
//     });
// });
// $("#max").on("keyup", function(event) {
//     var selection = window.getSelection().toString();
//     if (selection !== '') {
//         return;
//     }
//     if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
//         return;
//     }
//     var $this = $(this);
//     var input = $this.val();
//     var input = input.replace(/[\D\s\._\-]+/g, "");
//     input = input ? parseInt(input, 10) : 0;
//     $this.val(function() {
//         return (input === 0) ? "" : input.toLocaleString("en-US");
//     });
// });
