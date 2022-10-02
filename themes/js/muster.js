var _setReload = null;
var _randomMuster = null;

function setTimeCurrent(time) {
    if (time > 0) {
        $("#diemdanh_thoigian").text(time);
    } else {
        $("#diemdanh_thoigian").text("0");
    }
}


setInterval(function () {
    rDiemdanh();
}, 5000);


function rDiemdanh() {
    var http = new XMLHttpRequest();
    http.open("GET", "/api/muster", true);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
            var json = JSON.parse(http.responseText);
            if (json.status == true) {
                $("#diemdanh_user").text(json.total.totalUser);
                $("#diemdanh_users").text(json.total.totalUser);
                $("#diemdanh_id").text(json.turn);
                $("#muc_users").text(json.total.listUser);
                setTimeCurrent(json.second);
                if (!json.list) {
                    $("#diemdanh_last").text(json.winner ? json.winner : "---");
                    $("#textLuckOld").css("display", "unset");
                    clearInterval(_randomMuster);
                } else {
                    $("#textLuckOld").css("display", "none");
                    var list = json.list.split("?");
                    randomMusterShow(list);
                }
            }
        }
    };
    http.send();
}

function randomMusterShow(data) {
    if (_randomMuster) clearInterval(_randomMuster);
    _randomMuster = setInterval(function () {
        var index = Math.floor(Math.random() * data.length);
        $("#diemdanh_last").text(data[index] ? data[index] : "---");
    }, 400);
}
