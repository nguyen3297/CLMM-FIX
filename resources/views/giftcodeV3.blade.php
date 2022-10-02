<div class="panel-body turn" style="padding-top: 10px; padding-bottom: 20px;" game-tab="giftcode">
    <style>
        #diemDanhCard {
            margin-top: 0.5rem;
            color: #155724;
            border-color: #c3e6cb;
        }

        #occard {
            margin-top: 0.5rem;
            color: #155724;
            background-color: #9cbca4;
            border-color: #c3e6cb;
            padding: 20px;
        }

        .occho {
            margin-top: 0.5rem;
            color: #155724;
            background-color: #aed6b8;
            border-color: #c3e6cb;
            padding: 20px;
        }
    </style>
    <div class="row collapse show" id="diemDanhCard" style="">
        <div class="col-lg-12">
            <div class="body">
                <div class="text-center">
                    <p style="line-height: 0.8;"></p>
                    <p style="font-size:120%;text-align:center;"><b>CODE KHUYẾN MẠI</b></p>
                    <div class="form-group" id="non_query"
                         style="background-color: #7ee2ff; border-color: #ad4105; padding: 20px;">
                        <label for="partnerId">Mã code:</label>
                        <input type="text" class="form-control"
                               name="giftcode"
                               id="giftcode" placeholder="ABCXYZ"
                        />
                        <label for="partnerId" style="margin-top: 10px;">Số điện thoại:</label>
                        <input type="text" class="form-control"
                               name="phoneCode"
                               id="phoneCode"
                               placeholder="094xxxxxxx"/>
                        <small id="partnerId" class="form-text text-muted" style="color: #ff0000">Nhập số điện thoại của
                            bạn để kiểm tra và
                            nhận
                            thưởng.</small> <br/>
                        <button class="btn btn-success check-day-mission" onclick="check_Giftcode()">Kiểm Tra</button>
                    </div>
                    <div class="form-group" id="query_done" style="display: none;"></div>
                    <div class="form-group bg-warning" id="day_mission_querying" style="display: none;">Đang truy vấn...
                        xin chờ
                        nhé...
                    </div>
                    <div class="occho" id="muc_huongdan">
                        1. Một số điện thoại chỉ được nhập 1 mã/ngày. <br>
                        2. Mã code khuyến mại sẽ tùy vào điều kiện để sử dụng, có thời hạn. <br>
                        3. Mã code khuyến mại sẽ được cấp theo các chương trình khuyến mại của hệ thống Momo Lô Tô. <br>
                        4. Vui lòng liên hệ chát CSKH để biết thêm chi tết khi bạn nhận được CODE. <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function check_Giftcode() {
        let phone = $("#phoneCode").val();
        let code = $("#giftcode").val();
        if (phone.length <= 9) {
            alert('Số điện thoại không hợp lệ');
            return false;
        }
        $("#non_query").hide();
        $("#day_mission_querying").show();
        $.ajax({
            url: '{{ route('checkGiftcode') }}',
            data: {
                phone: phone,
                code: code
            },
            type: 'POST',
            success: function (d) {
                if (d.status != true) {
                    alert(d.message);
                    $("#non_query").show();
                    $("#day_mission_querying").hide();
                } else {
                    alert(d.message);
                    $("#non_query").show();
                    $("#day_mission_querying").hide();
                }
            }
        })
    }
</script>
