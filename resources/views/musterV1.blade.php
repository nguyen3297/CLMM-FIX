<div class="panel-body game" style="padding-top: 10px; padding-bottom: 20px;" game-tab="diemdanh">
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
                    <font color="blue"><big><b>Điểm Danh Nhận Quà Miễn Phí</b></big></font>
                    <br>
                    <small><i class="fa fa-info-circle" aria-hidden="true"></i> Mã quà: <font color="orange"><b
                                id="diemdanh_id">0</b></font></small><br>
                    <small><i class="fa fa-usd" aria-hidden="true"></i> Giá trị: <font color="Maroon"><b id="">5.000 ~
                                100.000</b> vnđ</font></small><br>
                    <small><i class="fa fa-user" aria-hidden="true"></i>: <font color="333366"><b
                                id="diemdanh_user">0</b> người</font></small><br>
                    <small><i class="fa fa-clock-o" aria-hidden="true"></i> Quay thưởng sau: <font color="660000"><b
                                id="diemdanh_thoigian">0</b> giây</font></small><br>
                    <small>
                        <i class="fa fa-star" aria-hidden="true"></i> Thắng phiên<p
                            id="textLuckOld"> trước</p>:
                    </small> <b id="diemdanh_last" class="text-danger font-weight-bold" style="word-break: break-word;">---</b>
                    <br>
                    <small><i class="fa fa-bandcamp" aria-hidden="true"></i> Tổng tiền đã trao: <font color="blue"><b
                                id="diemdanh_tongtien">{{ number_format(DB::table('musters')->sum('amount')) }}</b> VNĐ</font></small><br>
                    <div class="form-group occard" id="occard">
                        <label for="exampleInputEmail1">Số điện thoại:</label>
                        <input type="text" class="form-control" name="phoneDiemDanh" id="phoneDiemDanh"
                               placeholder="03837755">
                        <small id="emailHelp" class="form-text text-muted">Nhập số điện thoại của bạn để điểm
                            danh.</small>
                        <br>
                        <button class="btn btn-success" data-toggle="modal" data-target="#modalDiemDanh"
                                onclick="DUNGA.joinDiemdanh()">Điểm danh
                        </button>
                    </div>

                    <button class="btn btn-info"
                            onclick="$('#muc_huongdan').show();$('#muc_users').hide();$('#muc_lichsu').hide();">Cách
                        chơi
                    </button>
                    <button class="btn btn-dark" data-toggle="modal"
                            onclick="$('#muc_huongdan').hide();$('#muc_users').hide();$('#muc_lichsu').show();">Lịch sử
                    </button>
                    <button class="btn btn-danger"
                            onclick="$('#muc_huongdan').hide();$('#muc_users').show();$('#muc_lichsu').hide();">Danh
                        sách
                    </button>
                </div>
                <div class="occho" id="muc_huongdan">
                    - Mỗi phiên quà các bạn có 10 phút để điểm danh. <br>
                    - Số điện thoại điểm danh phải chơi {{ $setting->name }} ít nhất 1 lần trong ngày. Không giới hạn số lần điểm
                    danh trong ngày. <br>
                    - Khi hết thời gian, người may mắn sẽ nhận được số tiền của phiên đó. <br>
                    - Game <b>Điểm danh miễn phí</b> chỉ hoạt động từ <b>7h sáng</b> đến 1h đêm
                </div>

                <div class="occho" id="muc_lichsu" style="display:none;">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover text-center">
                            <thead>
                            <tr role="row" class="bg-primary">
                                <th class="text-center text-white">Mã</th>
                                <th class="text-center text-white">Tổng</th>
                                <th class="text-center text-white">SDT</th>
                                <th class="text-center text-white">VND</th>

                            </tr>
                            </thead>
                            <tbody id="mayman_log">
                            @foreach($his as $row)
                                <tr>
                                    <td><small>{{ $row->turn }}</small></td>
                                    <td><small>{{ number_format(DB::table('musters')->where('turn', $row->turn)->count()) }}</small></td>
                                    <td>{{ Str::mask($row->phone, '*', 4, 3) }}</td>
                                    <td>{{ number_format($row->amount) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="occho" id="muc_users" style="display:none;"> ---
                </div>


            </div>
        </div>
    </div>
</div>
<script>
    setInterval(() => {
        countSeccond();
    }, 1000);

    function countSeccond() {
        var send = Number(diemdanh_thoigian.innerHTML);
        if (send <= 0) {
            return;
        }
        $("#diemdanh_thoigian").text(send - 1);
        $("#diemdanh_time").text(send - 1);
    }
</script>
<script src="{{ url('') }}/themes/js/muster.js"></script>
