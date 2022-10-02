function check_tranid() {

    var zData = $("#check_tranid").serialize();
    $.ajax({
        type: "POST",
        url: "/kiemtra/giaodich.html",
        data: zData,
        success: function (result1) {
            result = JSON.parse(result1);
            document.getElementById("submit").disabled = false;
            if (result.status == '200') {
                var hh = "<b>test</b>";
                swal({
                    title: "" + result.ls_magd + "",
                    text: "" + result.ls_trangthai + "",
                    confirmButtonText: "V redu",
                    allowOutsideClick: "true"
                });

            }
            if (result.status == '404') {

                swal("ThÃ´ng bÃ¡o", "KhÃ´ng tá»“n táº¡i mÃ£ giao dá»‹ch nÃ y!!", "error");

            }
            if (result.status == '99') {

                swal("ThÃ´ng bÃ¡o", "Vui lÃ²ng nháº­p Ä‘Ãºng mÃ£ giao dá»‹ch vÃ  thá»­ láº¡i!", "error");
            }
        },
    });

}

$(document).ready(function () {
    $("button[data-action=huongdan]").click((e) => {
        $("#myModal").modal("show");
    });
    $("span[data-action=phan-thuong]").click((e) => {
        $("#modalGift").modal("show");
    });
    $('button[server-action=change]').click(function () {
        let button = $(this);
        let id = button.attr('server-id');
        selection_server = id;
        selection_rate = button.attr('server-rate');
        $('.turn').removeClass('active');
        $(`.turn[turn-tab=${id}]`).addClass('active');
        $('button[server-action=change]').attr('class', 'btn btn-default mt-1 rounded-pill font-weight-bold');
        button.attr('class', 'btn btn-primary mt-1 rounded-pill font-weight-bold');
    });
    $('button[bot-action=change]').click(function () {
        let button = $(this);
        let id = button.attr('bot-id');
        $('.bot').removeClass('active');
        $(`.bot[bot-tab=${id}]`).addClass('active');
        $('button[bot-action=change]').attr('class', 'btn btn-default mt-1 rounded-pill font-weight-bold');
        button.attr('class', 'btn btn-primary mt-1 rounded-pill font-weight-bold');
    });
    $('button[server-id=1]').click();
});
var i = 0,
    a = 0,
    isBackspacing = false,
    isParagraph = false;
var textArray = ["Há»‡ thá»‘ng LÃ¬ XÃ¬ MoMo|Uy tÃ­n, giao dá»‹ch tá»± Ä‘á»™ng 24/7 !"];
var speedForward = 0,
    speedWait = 30000,
    speedBetweenLines = 10,
    speedBackspace = 0;
typeWriter("output", textArray);

function typeWriter(id, ar) {
    var element = $("#" + id),
        aString = ar[a],
        eHeader = element.children("h3"),
        eParagraph = element.children("h4");
    if (!isBackspacing) {
        if (i < aString.length) {
            if (aString.charAt(i) == "|") {
                isParagraph = true;
                eHeader.removeClass("cursor");
                eParagraph.addClass("cursor");
                i++;
                setTimeout(function () {
                    typeWriter(id, ar);
                }, speedBetweenLines);
            } else {
                if (!isParagraph) {
                    eHeader.text(eHeader.text() + aString.charAt(i));
                } else {
                    eParagraph.text(eParagraph.text() + aString.charAt(i));
                }
                i++;
                setTimeout(function () {
                    typeWriter(id, ar);
                }, speedForward);
            }
        } else if (i == aString.length) {
            isBackspacing = true;
            setTimeout(function () {
                typeWriter(id, ar);
            }, speedWait);
        }
    } else {
        if (eHeader.text().length > 0 || eParagraph.text().length > 0) {
            if (eParagraph.text().length > 0) {
                eParagraph.text(eParagraph.text().substring(0, eParagraph.text().length - 1));
            } else if (eHeader.text().length > 0) {
                eParagraph.removeClass("cursor");
                eHeader.addClass("cursor");
                eHeader.text(eHeader.text().substring(0, eHeader.text().length - 1));
            }
            setTimeout(function () {
                typeWriter(id, ar);
            }, speedBackspace);
        } else {
            isBackspacing = false;
            i = 0;
            isParagraph = false;
            a = (a + 1) % ar.length;
            setTimeout(function () {
                typeWriter(id, ar);
            }, 50);
        }
    }
}

function setCookie(cname, cvalue, exhour) {
    var d = new Date();
    d.setTime(d.getTime() + (exhour * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return false;
}

let cookie = getCookie('modal_alert');
if (!cookie) {
    $("#modalAlert").modal("show");
    setCookie('modal_alert', true, 0.5);
}

function copyStringToClipboard(str) {
    var el = document.createElement('textarea');
    el.value = str;
    el.setAttribute('readonly', '');
    el.style = {
        position: 'absolute',
        left: '-9999px'
    };
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
    swal("ThÃ´ng bÃ¡o", "ÄÃ£ sao chÃ©p sá»‘ Ä‘iá»‡n thoáº¡i nÃ y. ChÃºc báº¡n may máº¯n.!!",
        "success");
}

function check_ls() {
    $.ajax({
        url: "kiemtra/win.html",
        success: function (json) {
            const data = JSON.parse(json);
            let body = '';
            data.forEach((data) => {
                let color_change = '#' + ((1 << 24) * (Math.random() + 1) | 0).toString(16)
                    .substr(1);
                body += `<tr>
                                <td>${data.updated_at}</td>
                                <td>${data.sdt}</td>
                                <td>${data.tiencuoc}</td>
                                <td>${data.trochoi}</td>
                                <td><span class="fa-stack"><span class="fa fa-circle fa-stack-2x" style="color:${color_change}"></span><span class="fa-stack-1x text-white" id="">${data.noidung}</span></span></td>
                                <td><span class="label label-success text-uppercase">
                                    Tháº¯ng
                                </span></td>
                            </tr>
                            `;
            });
            return_timer();
            $('#0X2134X453').html(body);
        }
    })
}

check_ls();
check_ls();
setInterval(function () {
    check_ls();
}, 10000);

function return_timer() {
    var count = 8;

    var counter = setInterval(timer, 1000); //1000 will  run it every 1 second
    function timer() {
        count = count - 1;
        if (count <= 0) {
            clearInterval(counter);
            return;
        }
        for (var k = 2; k <= 13; k++) {
            var tik = "timer" + k;
            document.getElementById(tik).innerHTML = "LÃ m má»›i sau <span style='color: #ff8c1a;'>" + count + "</span> giÃ¢y" +
                '<img src="image/loading_ab.jpeg"width="25px">'; // watch for spelling
        }
        ;

        document.getElementById("timer").innerHTML = "LÃ m má»›i sau <span style='color: #ff8c1a;'>" + count + "</span> giÃ¢y" +
            '<img src="image/loading_ab.jpeg"width="25px">'; // watch for spelling
    }
}


function check_sdt() {
    $.ajax({
        url: "kiemtra/sdt.html",
        success: function (json) {
            const data = JSON.parse(json);
            let body = '';
            data.forEach((data) => {
                body += `<tr>
                                <td>${data.sdt} <span class="label label-success text-uppercase" onclick="copyStringToClipboard('${data.sdt}')"><i class="fa fa-clipboard" aria-hidden="true"></i></span>

                                </td>
                                <td><span class="label label-success text-uppercase">Hoáº¡t Ä‘á»™ng</span></td>
                                <td>${data.today}/${data.limit_day}</td>
                                <td>${data.today_gd}/${data.ghbank}</td>
                            </tr>
                            `;
            });
            return_timer();
            $('#0X2134X555').html(body);
        }
    })
}

check_sdt();
check_sdt();
setInterval(function () {
    check_sdt();
}, 100000);

function return_timer() {
    var count = 8;

    var counter = setInterval(timer, 1000); //1000 will  run it every 1 second
    function timer() {
        count = count - 1;
        if (count <= 0) {
            clearInterval(counter);
            return;
        }
        for (var k = 2; k <= 13; k++) {
            var tik = "timer" + k;
            document.getElementById(tik).innerHTML = "LÃ m má»›i sau <span style='color: #ff8c1a;'>" + count + "</span> giÃ¢y" +
                '<img src="image/loading_ab.jpeg"width="25px">'; // watch for spelling
        }
        ;

        document.getElementById("timer").innerHTML = "LÃ m má»›i sau <span style='color: #ff8c1a;'>" + count + "</span> giÃ¢y" +
            '<img src="image/loading_ab.jpeg"width="25px">'; // watch for spelling
    }
}


function choilanhan() {
    if (!$('#PhoneChoi')['val']())
        swal("Lá»—i!", "Báº¡n chÆ°a nháº­p sá»‘ Ä‘iá»‡n thoáº¡i!!", "error");
    else {
        $(document).ajaxStart(function () {
            $("#submit1").attr("disabled", true);
        });
        nap()
    }
}

function nap() {
    $('#submit1')['html']('<div class="spinner-border text-warning" role="status"></div>Äang xá»­ lÃ½');
    $['post']('/kt1', {
            PhoneChoi: $('#PhoneChoi')['val']()
        },
        function (_0xb982x3) {
            swal(_0xb982x3['ketqua']);
            $('#submit1')['html']('SÄT khÃ¡c')
        }, 'json')
    $(document).ajaxComplete(function () {
        $("#submit1").attr("disabled", false);
    });
}

function choilanhan2() {
    if (!$('#PhoneChoia')['val']())
        swal("Lá»—i!", "Báº¡n cáº§n cung cáº¥p mÃ£ giao dá»‹ch hoáº·c sÄ‘t Ä‘á»ƒ kiá»ƒm tra !", "error");

    else {
        $(document).ajaxStart(function () {
            $("#submit2").attr("disabled", true);
        });
        nap2()
    }
}

function nap2() {
    $('#submit2')['html']('<div class="spinner-border text-warning" role="status"></div>Äang xá»­ lÃ½');
    $['post']('/kt2', {
            PhoneChoia: $('#PhoneChoia')['val']()
        },
        function (_0xb982x3) {
            swal(_0xb982x3['ketqua']);
            $('#submit2')['html']('MÃ£ GD hoáº·c SÄT khÃ¡c')
        }, 'json')
    $(document).ajaxComplete(function () {
        $("#submit2").attr("disabled", false);
    });
}

function choilanhan3() {
    if (!$('#PhoneChoia')['val']()) {
        swal('Báº¡n cáº§n cung cáº¥p mÃ£ giao dá»‹ch Ä‘á»ƒ web xÃ¡c Ä‘á»‹nh tráº£ thÆ°á»Ÿng !');
    } else if (!$('#phonenhan')['val']()) {
        swal('Báº¡n cáº§n cung cáº¥p sá»‘ Ä‘iá»‡n thoáº¡i Ä‘á»ƒ nháº­n thÆ°á»Ÿng !');
    } else {
        $(document).ajaxStart(function () {
            $("#submit3").attr("disabled", true);
        });
        nap3()
    }
}

function nap3() {
    $('#submit3')['html']('<div class="spinner-border text-warning" role="status"></div>Äang xá»­ lÃ½');
    $['post']('/kt3', {
            PhoneChoia: $('#PhoneChoia')['val'](),
            phonenhan: $('#phonenhan')['val']()
        },
        function (_0xb982x3) {
            swal(_0xb982x3['ketqua']);
            $('#submit3')['html']('Sá»‘ Ä‘iá»‡n thoáº¡i khÃ¡c')
        }, 'json')
    $(document).ajaxComplete(function () {
        $("#submit3").attr("disabled", false);
    });
}


