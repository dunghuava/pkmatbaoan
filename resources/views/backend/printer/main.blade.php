<?php 
    use App\http\Controllers\backendController;
    $ctrler = new backendController();
    $benhnhan=$ctrler->getBenhNhanId2($_GET['s_id']);
    $khambenh=$ctrler->getKhamBenh($benhnhan['id']); 
    $bangthuoc=$ctrler->getBangThuoc($khambenh['id']);
    $bangkinh=$ctrler->getBangKinh($khambenh['id']);
?>

<style>
    .p15{padding: 15px}
    .center{text-align: center}
    .right{text-align: right}
    .bold{font-weight: bold}
    .auto{margin: auto;}
    #PAGE-A5{
        width: 14.8cm;
        height: 21cm;
        margin: auto;
        background: white;
        cursor: pointer;
    }
</style>
<style>
    @media print{
        @page {
            size: A5;
            margin: 0;
        }
    }
    #logo{
        width: 131px;
    }
    #print_table td{padding:0px 0px;font-size: 14px}
    .table-kq td{text-align: center}

</style>
<div class="p15" id="PAGE-A5">
    <table id="print_table" style="width: 100%">
        <tr>
            <td colspan="6">
                <img id="logo" src="public/images/logo_print.png" alt="">
                <p>ĐT: 0867886068</p>
            </td>
            <td colspan="4" class="center">
                <h2 class="bold">KẾT QUẢ KHÁM</h2>
                <p>-----oOo-----</p>
            </td>
        </tr>
        <tr>
            <td colspan="10">
                <p>Đ/c: Số 4, Khu LK6C, Nguyễn Văn Lộc, Hà Đông</p>
            </td>
        </tr>
        <tr>
            <td><p>Họ và tên:</p></td>
            <td colspan="6"><p><b style="text-transform: uppercase">{{$benhnhan['ho_ten']}}</b></p></td>
            <td><p>Tuổi:</p></td>
            <td><p>{{$benhnhan['tuoi']}}</p></td>
            <td colspan="4"><p>Giới tính: {{$benhnhan['gioi_tinh']==0 ? 'Nam':'Nữ'}}</p></td>
        </tr>
        <tr>
            <td><p>Địa chỉ:</p></td>
            <td colspan="6"><p>{{$benhnhan['ward'].', '.$benhnhan['district'].', '.$benhnhan['province']}}</p></td>
            <td colspan="4"><p>SĐT: {{$benhnhan['dien_thoai']}}</p></td>
        </tr>
        <tr>
            <td colspan="10">
                <table border="1" style="width:100%" class="table-kq">
                    <tr>
                        <td>/</td>
                        <td style="width: 15%">Không kính</td>
                        <td>Kính lỗ</td>
                        <td colspan="2">Kính cũ</td>
                        <td colspan="2">Kính mới</td>
                        <td>Nhãn áp</td>
                    </tr>
                    <tr>
                        <td><b>MP</b></td>
                        <td>{{$bangkinh['khongkinh_mp']}}</td>
                        <td>{{$bangkinh['kinhlo_mp']}}</td>
                        <td>{{$bangkinh['kinhcu_mp']}}</td>
                        <td>{{$bangkinh['thiluc_cu_mp']}}</td>
                        <td>{{$bangkinh['kinhmoi_mp']}}</td>
                        <td>{{$bangkinh['thiluc_moi_mp']}}</td>
                        <td>{{$bangkinh['nhanap_mp']}}</td>
                    </tr>
                    <tr>
                        <td><b>MT</b></td>
                        <td>{{$bangkinh['khongkinh_mt']}}</td>
                        <td>{{$bangkinh['kinhlo_mt']}}</td>
                        <td>{{$bangkinh['kinhcu_mt']}}</td>
                        <td>{{$bangkinh['thiluc_cu_mt']}}</td>
                        <td>{{$bangkinh['kinhmoi_mt']}}</td>
                        <td>{{$bangkinh['thiluc_moi_mp']}}</td>
                        <td>{{$bangkinh['nhanap_mt']}}</td>
                    </tr>
                </table><br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Chẩn đoán:</p>
            </td>
            <td colspan="5">
                <p><b>MP</b>: {{$bangkinh['chandoan_mp']}}</p>
                <p><b>MT</b>: {{$bangkinh['chandoan_mt']}}</p>
            </td>
        </tr>
        @if($khambenh['print_type']==0)
        <tr>
            <td colspan="2">
                <p>Thủ thuật:</p>
            </td>
            <td colspan="8">
                <p>{{$khambenh['thu_thuat']}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="10">
                <table border="1px" style="width: 100%" class="table-kq">
                    <tr>
                        <td>STT</td>
                        <td style="text-align:left;padding-left:5px">Tên thuốc</td>
                        <td style="text-align:left;padding-left:5px">Số lượng</td>
                        <td style="text-align:left;padding-left:5px">Đơn vị</td>
                        <td style="text-align:left;padding-left:5px">Liều dùng</td>
                    </tr>
                    @foreach ($bangthuoc as $k => $item)
                        <tr>
                            <td>{{++$k}}</td>
                            <td style="text-align:left;padding-left:5px">{{$item['ten']}}</td>
                            <td style="text-align:left;padding-left:5px">{{$item['so_luong']}}</td>
                            <td style="text-align:left;padding-left:5px">{{$item['loai']}}</td>
                            <td style="text-align:left;padding-left:5px">{{$item['lieu_dung']}}</td>
                        </tr>
                    @endforeach                      
                </table><br>
            </td>
        </tr>
        @else
        <tr>
            <td colspan="10">
                <table border="1px" style="width: 100%" class="table-kq">
                    <tr>
                        <td style="width: 7.5%">/</td>
                        <td colspan="2" style="width: 40%">Kính lão</td>
                        <td colspan="2" style="width: 40%" >Kính nhìn xa</td>
                    </tr>
                    <tr>
                        <td><b>MP</b></td>
                        <td style="width: 20%">{{$bangkinh['kinhlao_mp']}}</td>
                        <td style="width: 20%">{{$bangkinh['dongtulao_mp']}}</td>
                        <td style="width: 20%">{{$bangkinh['kinhnhinxa_mp']}}</td>
                        <td style="width: 20%">{{$bangkinh['dongtuxa_mp']}}</td>
                    </tr>
                    <tr>
                        <td><b>MT</b></td>
                        <td style="width: 20%">{{$bangkinh['kinhlao_mt']}}</td>
                        <td style="width: 20%">{{$bangkinh['dongtulao_mt']}}</td>
                        <td style="width: 20%">{{$bangkinh['kinhnhinxa_mt']}}</td>
                        <td style="width: 20%">{{$bangkinh['dongtuxa_mt']}}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td colspan="10"><br></td></tr>
        @endif
        <tr style="margin-top: 5px">
            <td><p>Dặn dò: </p></td>
            <td colspan="10">
                <p>(*) {{$khambenh['dan_do']}}</p>
                <p>(*) Khi khám lại nhớ mang theo phiếu này</p>
            </td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="4" class="center">
                <p>Ngày khám</p>
                <p>Ngày {{date('d')}} Tháng {{date('m')}} Năm {{date('Y')}}</p>
                <br>
                <h4 align="center">BS. LÊ PHI HOÀNG</h4>
            </td>
        </tr>
    </table>
</div>
<br><br><br>