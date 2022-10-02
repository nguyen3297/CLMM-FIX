<?php
use Carbon\Carbon;
use App\Models\HistoryPlay;
use App\Models\Setting;
?>
<div class="panel-body game" style="padding-top: 10px; padding-bottom: 20px;" game-tab="chanle2">
    <p>- <b>Chẵn lẻ 2</b> là một game tính kết quả bằng <b> 1 số cuối mã giao dịch</b>.</p>
    <p>-Cách chơi vô cùng đơn giản :</p>
    <p>- Chuyển tiền vào một trong các tài khoản:</p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center mb-0">
            <thead>
            <th class="text-center text-white bg-primary">Số điện thoại</th>
            <th class="text-center text-white bg-primary">Tối thiểu</th>
            <th class="text-center text-white bg-primary">Tối đa</th>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="result-table-10" role="alert">
            @foreach ($momo as $row)
                <tr>
                    <td id="mm_{{ $row->phone }}">
                        <b id="mln">
                            {{ $row->phone }} <b id="hmln" attr-name="amount">
                                <font color="green">{{ number_format(HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->sum('receive')) }}</font>/<font color="6861b1">
                                    50M</font>
                            </b>
                            <b id="hmln" class="hidden" attr-name="times">
                                <font color="red">{{ HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->count() }}</font>/<font color="6861b1">200 Giao dịch
                                </font>
                            </b>
                        </b>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.coppy('{{ $row->phone }}', '{{ $row->min }}', '{{ $row->max }}')"><i class="fa fa-clipboard"
                                                                            aria-hidden="true"></i></span>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.play('{{ $row->phone }}')"><i class="fa fa-play"
                                                                           aria-hidden="true"></i></span>
                    </td>
                    <td>{{ number_format($row->min) }} VNĐ</td>
                    <td>{{ number_format($row->max) }} VNĐ</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center font-weight-bold">
        <b>Làm mới sau <span class="text-danger coundown-time">0</span> s</b>
    </div>
    <p class="mt-3">
        - Nội dung chuyển: <span class="fa-stack"><span
                class="fa fa-circle fa-stack-2x dot-text-chan"></span><span
                class="fa-stack-1x text-white">{{ explode('|', $setting->contentCL2)[0] }}</span></span> hoặc
        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-le"></span><span
                class="fa-stack-1x text-white">{{ explode('|', $setting->contentCL2)[1] }}</span></span> (nếu đuôi mã giao dịch có các số sau)
    </p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center">
            <thead>
            <th class="text-center text-white bg-primary">Nội dung</th>
            <th class="text-center text-white bg-primary">1 Số cuối</th>
            <th class="text-center text-white bg-primary">Tiền nhận</th>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="" id="result-table" role="alert">
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-chan"> </span> <span
                                class="fa-stack-1x text-white comment-chan">{{ explode('|', $setting->contentCL2)[0] }}</span></span>
                </td>
                <td><code>0</code> - <code>2</code> - <code>4</code> - <code>6</code> - <code>8</code></td>
                <td><b>{{ $setting->ratioCL2 }}</b></td>
            </tr>
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-le"> </span><span
                                class="fa-stack-1x text-white comment-le">{{ explode('|', $setting->contentCL2)[1] }}</span></span>
                </td>
                <td><code>1</code> - <code>3</code> - <code>5</code> - <code>7</code> - <code>9</code></td>
                <td><b>{{ $setting->ratioCL2 }}</b></td>
            </tr>
            </tbody>
        </table>
    </div>
    - Tiền thắng sẽ = <b>Tiền cược*{{ $setting->ratioCL2 }}</b><br> <b>- Lưu ý : Mức cược mỗi số khác nhau, nếu chuyển sai hạn mức hoặc sai nội dung vui lòng vào phần "kiểm tra mã giao dịch" để hoàn tiền.</b>
</div>
<div class="panel-body game" style="padding-top: 10px; padding-bottom: 20px;" game-tab="chanle">
    <p>- <b>Chẵn lẻ</b> là một game tính kết quả bằng <b> 1 số cuối mã giao dịch</b>.</p>
    <p>-Cách chơi vô cùng đơn giản :</p>
    <p>- Chuyển tiền vào một trong các tài khoản:</p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center mb-0">
            <thead>
            <th class="text-center text-white bg-primary">Số điện thoại</th>
            <th class="text-center text-white bg-primary">Tối thiểu</th>
            <th class="text-center text-white bg-primary">Tối đa</th>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="result-table-10" role="alert">
            @foreach ($momo as $row)
                <tr>
                    <td id="mm_{{ $row->phone }}">
                        <b id="mln">
                            {{ $row->phone }} <b id="hmln" attr-name="amount">
                                <font color="green">{{ number_format(HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->sum('receive')) }}</font>/<font color="6861b1">
                                    50M</font>
                            </b>
                            <b id="hmln" class="hidden" attr-name="times">
                                <font color="red">{{ HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->count() }}</font>/<font color="6861b1">200 Giao dịch
                                </font>
                            </b>
                        </b>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.coppy('{{ $row->phone }}', '{{ $row->min }}', '{{ $row->max }}')"><i class="fa fa-clipboard"
                                                                            aria-hidden="true"></i></span>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.play('{{ $row->phone }}')"><i class="fa fa-play"
                                                                           aria-hidden="true"></i></span>
                    </td>
                    <td>{{ number_format($row->min) }} VNĐ</td>
                    <td>{{ number_format($row->max) }} VNĐ</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center font-weight-bold">
        <b>Làm mới sau <span class="text-danger coundown-time">0</span> s</b>
    </div>
    <p class="mt-3">
        - Nội dung chuyển: <span class="fa-stack"><span
                class="fa fa-circle fa-stack-2x dot-text-chan"></span><span
                class="fa-stack-1x text-white">{{ explode('|', $setting->contentCL)[0] }}</span></span> hoặc
        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-le"></span><span
                class="fa-stack-1x text-white">{{ explode('|', $setting->contentCL)[1] }}</span></span> (nếu đuôi mã giao dịch có các số sau)
    </p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center">
            <thead>
            <th class="text-center text-white bg-primary">Nội dung</th>
            <th class="text-center text-white bg-primary">1 Số cuối</th>
            <th class="text-center text-white bg-primary">Tiền nhận</th>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="" id="result-table" role="alert">
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-chan"> </span> <span
                                class="fa-stack-1x text-white comment-chan">{{ explode('|', $setting->contentCL)[0] }}</span></span>
                </td>
                <td><code>2</code> - <code>4</code> - <code>6</code> - <code>8</code></td>
                <td><b>{{ $setting->ratioCL }}</b></td>
            </tr>
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-le"> </span><span
                                class="fa-stack-1x text-white comment-le">{{ explode('|', $setting->contentCL)[1] }}</span></span>
                </td>
                <td><code>1</code> - <code>3</code> - <code>5</code> - <code>7</code></td>
                <td><b>{{ $setting->ratioCL }}</b></td>
            </tr>
            </tbody>
        </table>
    </div>
    - Tiền thắng sẽ = <b>Tiền cược*{{ $setting->ratioCL }}</b><br> <b>- Lưu ý : Mức cược mỗi số khác nhau, nếu chuyển sai hạn mức hoặc sai nội dung vui lòng vào phần "kiểm tra mã giao dịch" để hoàn tiền.</b>
</div>
<div class="panel-body game" style="padding-top: 10px; padding-bottom: 20px;" game-tab="taixiu2">
    <p>- <b>Tài Xỉu 2</b> là một game tính kết quả bằng <b> 1 số cuối mã giao dịch</b>.</p>
    <p>-Cách chơi vô cùng đơn giản :</p>
    <p>- Chuyển tiền vào một trong các tài khoản:</p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center mb-0">
            <thead>
            <th class="text-center text-white bg-primary">Số điện thoại</th>
            <th class="text-center text-white bg-primary">Tối thiểu</th>
            <th class="text-center text-white bg-primary">Tối đa</th>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="result-table-10" role="alert">
            @foreach ($momo as $row)
                <tr>
                    <td id="mm_{{ $row->phone }}">
                        <b id="mln">
                            {{ $row->phone }} <b id="hmln" attr-name="amount">
                                <font color="green">{{ number_format(HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->sum('receive')) }}</font>/<font color="6861b1">
                                    50M</font>
                            </b>
                            <b id="hmln" class="hidden" attr-name="times">
                                <font color="red">{{ HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->count() }}</font>/<font color="6861b1">200 Giao dịch
                                </font>
                            </b>
                        </b>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.coppy('{{ $row->phone }}', '{{ $row->min }}', '{{ $row->max }}')"><i class="fa fa-clipboard"
                                                                            aria-hidden="true"></i></span>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.play('{{ $row->phone }}')"><i class="fa fa-play"
                                                                           aria-hidden="true"></i></span>
                    </td>
                    <td>{{ number_format($row->min) }} VNĐ</td>
                    <td>{{ number_format($row->max) }} VNĐ</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center font-weight-bold">
        <b>Làm mới sau <span class="text-danger coundown-time">0</span> s</b>
    </div>
    <p class="mt-3">
        - Nội dung chuyển: <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-tai"></span><span
                class="fa-stack-1x text-white">{{ explode('|', $setting->contentTX2)[0] }}</span></span> hoặc
        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-xiu"></span><span
                class="fa-stack-1x text-white">{{ explode('|', $setting->contentTX2)[1] }}</span></span> (nếu đuôi mã giao dịch có các số sau)
    </p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center">
            <thead>
            <th class="text-center text-white bg-primary">Nội dung</th>
            <th class="text-center text-white bg-primary">1 Số cuối</th>
            <th class="text-center text-white bg-primary">Tiền nhận</th>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="" id="result-table" role="alert">
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-tai"> </span>
                            <span class="fa-stack-1x text-white comment-tai">{{ explode('|', $setting->contentTX2)[0] }}</span></span>
                </td>
                <td><code>5</code> - <code>6</code> - <code>7</code> - <code>8</code> - <code>9</code></td>
                <td><b>{{ $setting->ratioTX2 }}</b></td>
            </tr>
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-xiu"> </span><span
                                class="fa-stack-1x text-white comment-xiu">{{ explode('|', $setting->contentTX2)[1] }}</span></span>
                </td>
                <td><code>0</code> - <code>1</code> - <code>2</code> - <code>3</code> - <code>4</code></td>
                <td><b>{{ $setting->ratioTX2 }}</b></td>
            </tr>
            </tbody>
        </table>
    </div>
    - Tiền thắng sẽ = <b>Tiền cược*{{ $setting->ratioTX2 }}</b><br> <b>- Lưu ý : Mức cược mỗi số khác nhau, nếu chuyển sai hạn mức hoặc sai nội dung vui lòng vào phần "kiểm tra mã giao dịch" để hoàn tiền.</b>
</div>
<div class="panel-body game" style="padding-top: 10px; padding-bottom: 20px;" game-tab="taixiu">
    <p>- <b>Tài Xỉu</b> là một game tính kết quả bằng <b> 1 số cuối mã giao dịch</b>.</p>
    <p>-Cách chơi vô cùng đơn giản :</p>
    <p>- Chuyển tiền vào một trong các tài khoản:</p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center mb-0">
            <thead>
            <th class="text-center text-white bg-primary">Số điện thoại</th>
            <th class="text-center text-white bg-primary">Tối thiểu</th>
            <th class="text-center text-white bg-primary">Tối đa</th>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="result-table-10" role="alert">
            @foreach ($momo as $row)
                <tr>
                    <td id="mm_{{ $row->phone }}">
                        <b id="mln">
                            {{ $row->phone }} <b id="hmln" attr-name="amount">
                                <font color="green">{{ number_format(HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->sum('receive')) }}</font>/<font color="6861b1">
                                    50M</font>
                            </b>
                            <b id="hmln" class="hidden" attr-name="times">
                                <font color="red">{{ HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->count() }}</font>/<font color="6861b1">200 Giao dịch
                                </font>
                            </b>
                        </b>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.coppy('{{ $row->phone }}', '{{ $row->min }}', '{{ $row->max }}')"><i class="fa fa-clipboard"
                                                                            aria-hidden="true"></i></span>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.play('{{ $row->phone }}')"><i class="fa fa-play"
                                                                           aria-hidden="true"></i></span>
                    </td>
                    <td>{{ number_format($row->min) }} VNĐ</td>
                    <td>{{ number_format($row->max) }} VNĐ</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center font-weight-bold">
        <b>Làm mới sau <span class="text-danger coundown-time">0</span> s</b>
    </div>
    <p class="mt-3">
        - Nội dung chuyển: <span class="fa-stack"><span
                class="fa fa-circle fa-stack-2x dot-text-tai"></span><span
                class="fa-stack-1x text-white">{{ explode('|', $setting->contentTX)[0] }}</span></span> hoặc
        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-xiu"></span><span
                class="fa-stack-1x text-white">{{ explode('|', $setting->contentTX)[1] }}</span></span> (nếu đuôi mã giao dịch có các số sau)
    </p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center">
            <thead>
            <th class="text-center text-white bg-primary">Nội dung</th>
            <th class="text-center text-white bg-primary">1 Số cuối</th>
            <th class="text-center text-white bg-primary">Tiền nhận</th>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="" id="result-table" role="alert">
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-tai"> </span>
                            <span class="fa-stack-1x text-white comment-tai">{{ explode('|', $setting->contentTX)[0] }}</span></span>
                </td>
                <td><code>5</code> - <code>6</code> - <code>7</code> - <code>8</code></td>
                <td><b>{{ $setting->ratioTX }}</b></td>
            </tr>
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-xiu"> </span><span
                                class="fa-stack-1x text-white comment-xiu">{{ explode('|', $setting->contentTX)[1] }}</span></span>
                </td>
                <td><code>1</code> - <code>2</code> - <code>3</code> - <code>4</code></td>
                <td><b>{{ $setting->ratioTX }}</b></td>
            </tr>
            </tbody>
        </table>
    </div>
    - Tiền thắng sẽ = <b>Tiền cược*{{ $setting->ratioTX }}</b><br> <b>- Lưu ý : Mức cược mỗi số khác nhau, nếu chuyển sai hạn mức hoặc sai nội dung vui lòng vào phần "kiểm tra mã giao dịch" để hoàn tiền.</b>
</div>
<div class="panel-body game" style="padding-top: 10px; padding-bottom: 20px;" game-tab="x3">
    <p>- <b>1 phần 3</b> là một game tính kết quả bằng <b> 1 số cuối mã giao dịch</b>.</p>
    <p>- Cách chơi vô cùng đơn giản:</p>
    <p>- Chuyển tiền vào một trong các tài khoản:</p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center mb-0">
            <thead>
            <th class="text-center text-white bg-primary">Số điện thoại</th>
            <th class="text-center text-white bg-primary">Tối thiểu</th>
            <th class="text-center text-white bg-primary">Tối đa</th>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="result-table-10" role="alert">
            @foreach ($momo as $row)
                <tr>
                    <td id="mm_{{ $row->phone }}">
                        <b id="mln">
                            {{ $row->phone }} <b id="hmln" attr-name="amount">
                                <font color="green">{{ number_format(HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->sum('receive')) }}</font>/<font color="6861b1">
                                    50M</font>
                            </b>
                            <b id="hmln" class="hidden" attr-name="times">
                                <font color="red">{{ HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->count() }}</font>/<font color="6861b1">200 Giao dịch
                                </font>
                            </b>
                        </b>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.coppy('{{ $row->phone }}', '{{ $row->min }}', '{{ $row->max }}')"><i class="fa fa-clipboard"
                                                                            aria-hidden="true"></i></span>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.play('{{ $row->phone }}')"><i class="fa fa-play"
                                                                           aria-hidden="true"></i></span>
                    </td>
                    <td>{{ number_format($row->min) }} VNĐ</td>
                    <td>{{ number_format($row->max) }} VNĐ</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center font-weight-bold">
        <b>Làm mới sau <span class="text-danger coundown-time">0</span> s</b>
    </div>
    <p class="mt-3">
        - Nội dung chuyển: <span class="fa-stack"><span
                class="fa fa-circle fa-stack-2x dot-text-chan"></span><span
                class="fa-stack-1x text-white comment-n1">{{ explode('|', $setting->content1P3)[1] }}</span></span> hoặc
        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-le"> </span><span
                class="fa-stack-1x text-white comment-n2">{{ explode('|', $setting->content1P3)[2] }}</span></span> hoặc
        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-tai"> </span><span
                class="fa-stack-1x text-white comment-n3">{{ explode('|', $setting->content1P3)[3] }}</span></span> hoặc
        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-xiu"> </span><span
                class="fa-stack-1x text-white comment-n0">{{ explode('|', $setting->content1P3)[0] }}</span></span> (nếu đuôi mã giao dịch có các số sau)
    </p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center">
            <thead>
            <tr class="bg-primary" role="row">
                <th class="text-center text-white">Nội dung</th>
                <th class="text-center text-white">1 Số cuối</th>
                <th class="text-center text-white">Tiền nhận</th>
            </tr>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="" id="result-table" role="alert">
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-chan">
                            </span><span class="fa-stack-1x text-white" id="">{{ explode('|', $setting->content1P3)[1] }}</span></span>
                </td>
                <td><code>1</code> - <code>2</code> - <code>3</code></td>
                <td><b>{{ explode('|', $setting->ratio1P3)[0] }}</b></td>
            </tr>
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-le"> </span><span
                                class="fa-stack-1x text-white" id="">{{ explode('|', $setting->content1P3)[2] }}</span></span>
                </td>
                <td><code>4</code> - <code>5</code> - <code>6</code></td>
                <td><b>{{ explode('|', $setting->ratio1P3)[0] }}</b></td>
            </tr>
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-tai"> </span><span
                                class="fa-stack-1x text-white" id="">{{ explode('|', $setting->content1P3)[3] }}</span></span>
                </td>
                <td><code>7</code> - <code>8</code> - <code>9</code></td>
                <td><b>{{ explode('|', $setting->ratio1P3)[0] }}</b></td>
            </tr>
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-xiu"> </span><span
                                class="fa-stack-1x text-white" id="">{{ explode('|', $setting->content1P3)[0] }}</span></span>
                </td>
                <td><code>0</code></td>
                <td><b>{{ explode('|', $setting->ratio1P3)[1] }}</b></td>
            </tr>
            </tbody>
        </table>
    </div>
    <p>- Nếu mã giao dịch có số cuối trùng với 1 trong 3 số trên, bạn sẽ chiến thắng.</p>
    <b>- Lưu ý : Mức cược mỗi số khác nhau, nếu chuyển sai hạn mức hoặc sai nội dung vui lòng vào phần "kiểm tra mã giao dịch" để hoàn tiền.</b>
</div>
<div class="panel-body game" style="padding-top: 10px; padding-bottom: 20px;" game-tab="hieu2so">
    <p>- <b>H3</b> là một game tính kết quả bằng <b>hiệu 2 số cuối mã giao dịch (Số trước trừ số sau). Ví dụ: xxx94 => 9
            - 4 = 5</b>.</p>
    <p>- Cách chơi vô cùng đơn giản:</p>
    <p>- Chuyển tiền vào một trong các tài khoản:</p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center mb-0">
            <thead>
            <th class="text-center text-white bg-primary">Số điện thoại</th>
            <th class="text-center text-white bg-primary">Tối thiểu</th>
            <th class="text-center text-white bg-primary">Tối đa</th>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="result-table-10" role="alert">
            @foreach ($momo as $row)
                <tr>
                    <td id="mm_{{ $row->phone }}">
                        <b id="mln">
                            {{ $row->phone }} <b id="hmln" attr-name="amount">
                                <font color="green">{{ number_format(HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->sum('receive')) }}</font>/<font color="6861b1">
                                    50M</font>
                            </b>
                            <b id="hmln" class="hidden" attr-name="times">
                                <font color="red">{{ HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->count() }}</font>/<font color="6861b1">200 Giao dịch
                                </font>
                            </b>
                        </b>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.coppy('{{ $row->phone }}', '{{ $row->min }}', '{{ $row->max }}')"><i class="fa fa-clipboard"
                                                                            aria-hidden="true"></i></span>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.play('{{ $row->phone }}')"><i class="fa fa-play"
                                                                           aria-hidden="true"></i></span>
                    </td>
                    <td>{{ number_format($row->min) }} VNĐ</td>
                    <td>{{ number_format($row->max) }} VNĐ</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center font-weight-bold">
        <b>Làm mới sau <span class="text-danger coundown-time">0</span> s</b>
    </div>
    <p class="mt-3">
        - Nội dung chuyển : <span class="fa-stack"><span
                class="fa fa-circle fa-stack-2x dot-text-chan"></span><span
                class="fa-stack-1x text-white comment-n1">{{ $setting->contentH3 }}</span></span>
    </p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center">
            <thead>
            <tr class="bg-primary" role="row">
                <th class="text-center text-white">Nội dung</th>
                <th class="text-center text-white">Hiệu 2 Số cuối bằng</th>
                <th class="text-center text-white">Tiền nhận</th>
            </tr>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="" id="result-table" role="alert">
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-chan">
                            </span><span class="fa-stack-1x text-white" id="">{{ $setting->contentH3 }}</span></span>
                </td>
                <td><code>9</code></td>
                <td><b>{{ explode('|', $setting->ratioH3)[3] }}</b></td>
            </tr>
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-chan">
                            </span><span class="fa-stack-1x text-white" id="">{{ $setting->contentH3 }}</span></span>
                </td>
                <td><code>7</code></td>
                <td><b>{{ explode('|', $setting->ratioH3)[2] }}</b></td>
            </tr>
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-chan">
                            </span><span class="fa-stack-1x text-white" id="">{{ $setting->contentH3 }}</span></span>
                </td>
                <td><code>5</code></td>
                <td><b>{{ explode('|', $setting->ratioH3)[1] }}</b></td>
            </tr>
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-chan">
                            </span><span class="fa-stack-1x text-white" id="">{{ $setting->contentH3 }}</span></span>
                </td>
                <td><code>3</code></td>
                <td><b>{{ explode('|', $setting->ratioH3)[0] }}</b></td>
            </tr>
            </tbody>
        </table>
    </div>
    <p>- Nếu mã giao dịch có hiệu của 2 số (số trước trừ số sau) trùng 1 trong những số trên bạn sẽ chiến thắng.</p>
    <b>- Lưu ý : Mức cược mỗi số khác nhau, nếu chuyển sai hạn mức hoặc sai nội dung vui lòng vào phần "kiểm tra mã giao dịch" để hoàn tiền.</b>
</div>
<div class="panel-body game" style="padding-top: 10px; padding-bottom: 20px;" game-tab="lo">
    <p>- <b>Lô</b> là một game tính kết quả bằng <b> 2 số cuối mã giao dịch</b>.</p>
    <p>- Cách chơi vô cùng đơn giản:</p>
    <p>- Chuyển tiền vào một trong các tài khoản:</p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center mb-0">
            <thead>
            <th class="text-center text-white bg-primary">Số điện thoại</th>
            <th class="text-center text-white bg-primary">Tối thiểu</th>
            <th class="text-center text-white bg-primary">Tối đa</th>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="result-table-10" role="alert">
            @foreach ($momo as $row)
                <tr>
                    <td id="mm_{{ $row->phone }}">
                        <b id="mln">
                            {{ $row->phone }} <b id="hmln" attr-name="amount">
                                <font color="green">{{ number_format(HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->sum('receive')) }}</font>/<font color="6861b1">
                                    50M</font>
                            </b>
                            <b id="hmln" class="hidden" attr-name="times">
                                <font color="red">{{ HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->count() }}</font>/<font color="6861b1">200 Giao dịch
                                </font>
                            </b>
                        </b>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.coppy('{{ $row->phone }}', '{{ $row->min }}', '{{ $row->max }}')"><i class="fa fa-clipboard"
                                                                            aria-hidden="true"></i></span>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.play('{{ $row->phone }}')"><i class="fa fa-play"
                                                                           aria-hidden="true"></i></span>
                    </td>
                    <td>{{ number_format($row->min) }} VNĐ</td>
                    <td>{{ number_format($row->max) }} VNĐ</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center font-weight-bold">
        <b>Làm mới sau <span class="text-danger coundown-time">0</span> s</b>
    </div>
    <p class="mt-3">
        - Nội dung chuyển : <span class="fa-stack"><span
                class="fa fa-circle fa-stack-2x dot-text-chan"></span><span
                class="fa-stack-1x text-white comment-n1">{{ $setting->contentLO }}</span></span>
    </p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center table-responsive">
            <thead>
            <tr class="bg-primary" role="row">
                <th class="text-center text-white">Nội dung</th>
                <th class="text-center text-white">2 Số cuối</th>
                <th class="text-center text-white">Tiền nhận</th>
            </tr>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="" id="result-table" role="alert">
            <tr>
                <td>
                        <span class="fa-stack"><span class="fa fa-circle fa-stack-2x dot-text-chan">
                            </span><span class="fa-stack-1x text-white" id="">{{ $setting->contentLO }}</span></span>
                </td>
                <td>
                    <code>01</code> - <code>03</code> - <code>12</code> - <code>19</code> - <code>23</code> -
                    <code>24</code> - <code>30</code> - <code>33</code> - <code>39</code> - <code>48</code> -
                    <code>54</code> - <code>55</code> -
                    <code>60</code> - <code>61</code> - <code>71</code> - <code>77</code> - <code>81</code> -
                    <code>82</code> - <code>83</code> - <code>67</code> - <code>88</code> - <code>76</code> -
                    <code>64</code> - <code>79</code> -
                    <code>29</code> - <code>99</code>
                </td>
                <td><b>{{ $setting->ratioLO }}</b></td>
            </tr>
            </tbody>
        </table>
    </div>
    <p>- Nếu mã giao dịch có 2 số cuối trùng với 1 trong các số trên, bạn sẽ chiến thắng.</p>
    <b>- Lưu ý : Mức cược mỗi số khác nhau, nếu chuyển sai hạn mức hoặc sai nội dung vui lòng vào phần "kiểm tra mã giao dịch" để hoàn tiền.</b>
</div>
<div class="panel-body game" style="padding-top: 10px; padding-bottom: 20px;" game-tab="gap3">
    <p>- <b>Gấp 3</b> là một game tính kết quả bằng <b>nhiều số cuối mã giao dịch</b>.</p>
    <p>- Cách chơi vô cùng đơn giản:</p>
    <p>- Chuyển tiền vào một trong các tài khoản:</p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center mb-0">
            <thead>
            <th class="text-center text-white bg-primary">Số điện thoại</th>
            <th class="text-center text-white bg-primary">Tối thiểu</th>
            <th class="text-center text-white bg-primary">Tối đa</th>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="result-table-10" role="alert">
            @foreach ($momo as $row)
                <tr>
                    <td id="mm_{{ $row->phone }}">
                        <b id="mln">
                            {{ $row->phone }} <b id="hmln" attr-name="amount">
                                <font color="green">{{ number_format(HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->sum('receive')) }}</font>/<font color="6861b1">
                                    50M</font>
                            </b>
                            <b id="hmln" class="hidden" attr-name="times">
                                <font color="red">{{ HistoryPlay::where(['phoneSend' => $row->phone, 'status' => 1])->whereDate('created_at', Carbon::today())->count() }}</font>/<font color="6861b1">200 Giao dịch
                                </font>
                            </b>
                        </b>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.coppy('{{ $row->phone }}', '{{ $row->min }}', '{{ $row->max }}')"><i class="fa fa-clipboard"
                                                                            aria-hidden="true"></i></span>
                        <span class="label label-success text-uppercase"
                              onclick="DUNGA.play('{{ $row->phone }}')"><i class="fa fa-play"
                                                                           aria-hidden="true"></i></span>
                    </td>
                    <td>{{ number_format($row->min) }} VNĐ</td>
                    <td>{{ number_format($row->max) }} VNĐ</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center font-weight-bold">
        <b>Làm mới sau <span class="text-danger coundown-time">0</span> s</b>
    </div>
    <p class="mt-3">- Nội dung chuyển : {{ $setting->contentG3 }} (nếu đuôi mã giao dịch có các số sau)</p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center">
            <thead>
            <tr class="bg-primary" role="row">
                <th class="text-center text-white">Nội dung</th>
                <th class="text-center text-white">Các số cuối</th>
                <th class="text-center text-white">Tiền nhận</th>
            </tr>
            </thead>
            <tbody aria-live="polite" aria-relevant="all" class="" id="result-table" role="alert">
            <tr>
                <td>{{ $setting->contentG3 }}</td>
                <td>
                    <code>02</code> - <code>13</code> - <code>17</code> - <code>19</code> - <code>21</code> -
                    <code>29</code> - <code>35</code> - <code>37</code> - <code>47</code> - <code>49</code> -
                    <code>51</code> - <code>54</code> -
                    <code>57</code> - <code>63</code> - <code>64</code> - <code>74</code> - <code>83</code> -
                    <code>91</code> - <code>95</code> - <code>96</code>
                </td>
                <td><b>{{ explode('|', $setting->ratioG3)[0] }}</b></td>
            </tr>
            <tr>
                <td>{{ $setting->contentG3 }}</td>
                <td><code>66</code> - <code>99</code></td>
                <td><b>{{ explode('|', $setting->ratioG3)[1] }}</b></td>
            </tr>
            <tr>
                <td>{{ $setting->contentG3 }}</td>
                <td><code>123</code> - <code>234</code> - <code>456</code> - <code>678</code> - <code>789</code>
                </td>
                <td><b>{{ explode('|', $setting->ratioG3)[2] }}</b></td>
            </tr>
            </tbody>
        </table>
    </div>
    <b>- Lưu ý : Mức cược mỗi số khác nhau, nếu chuyển sai hạn mức hoặc sai nội dung vui lòng vào phần "kiểm tra mã giao dịch" để hoàn tiền.</b>
</div>
