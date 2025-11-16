<h1>Đọc từ Database</h1>

<h2>Sản Phẩm</h2>
<ul>
    @foreach ($sanphams as $sp)
        @if($sp->GiaBan > 0) <!-- Rule in: chỉ in sản phẩm có giá bán > 0 -->
        <li>
            {{$sp->MaSP}},
            {{$sp->TenSP}},
            {{$sp->MoTa}},
            {{$sp->GiaBan}},
            @if($sp->HinhAnh)
                <img src="{{ $sp->HinhAnh }}" alt="{{ $sp->TenSP }}" width="250" height="60"/>
            @endif
            , {{$sp->MaKho}}
        </li>
        @endif
    @endforeach
</ul>

<h2>Khách Hàng</h2>
<ul>
    @foreach ($khachhangs as $kh)
        <li>
            {{$kh->id}},
            {{$kh->tenkh}},
            {{$kh->email}},
            {{$kh->sdt}}
        </li>
    @endforeach
</ul>

<h2>Hóa Đơn</h2>
<ul>
    @foreach ($hoadons as $hd)
        @if($hd->tongtien > 0) <!-- Rule in: chỉ in hóa đơn có tổng tiền > 0 -->
        <li>
            {{$hd->id}},
            {{$hd->makh}},
            {{$hd->ngaylap}},
            {{$hd->tongtien}}
        </li>
        @endif
    @endforeach
</ul>

<h2>Kho Hàng</h2>
<ul>
    @foreach ($khohangs as $kho)
        @if($kho->SoLuong > 0) <!-- Rule in: chỉ in kho có số lượng > 0 -->
        <li>
            {{$kho->MaKho}},
            {{$kho->TenSanPham}},
            {{$kho->MaSanPham}},
            {{$kho->SoLuong}}
        </li>
        @endif
    @endforeach
</ul>

<h2>Chi tiết hóa đơn</h2>
<ul>
    @foreach ($chitiethoadons as $cthd)
        @if($cthd->soluong > 0 && $cthd->dongia > 0) <!-- Rule in: chỉ in chi tiết hóa đơn hợp lệ -->
        <li>
            {{$cthd->id}},
            {{$cthd->mahd}},
            {{$cthd->tensp}},
            {{$cthd->soluong}},
            {{$cthd->dongia}}
        </li>
        @endif
    @endforeach
</ul>

<h1>Đọc Từ file CSV</h1>
<ul>
    @foreach ($stocks as $stock)
        @if($stock['SoLuongTon'] > 0 && $stock['GiaGoc'] > 0) <!-- Rule in: chỉ in CSV hợp lệ -->
        <li>
            {{$stock['MaHH']}},
            {{$stock['TenHH']}},
            {{$stock['DonViTinh']}},
            {{$stock['GiaGoc']}},
            {{$stock['SoLuongTon']}}
        </li>
        @endif
    @endforeach
</ul>
