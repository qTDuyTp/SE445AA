<h1>Đọc từ Database</h1>

<h2>Sản Phẩm</h2>
<ul>
    @foreach ($sanphams as $sp)
        @if($sp->GiaBan > 0)
            <li>
                {{$sp->MaSP}}, {{$sp->TenSP}}, {{$sp->MoTa}}, {{$sp->GiaBan}},
                @if($sp->HinhAnh)
                    <img src="{{ $sp->HinhAnh }}" alt="{{ $sp->TenSP }}" width="250" height="60"/>
                @endif
                , {{$sp->MaKho}}
            </li>
        @else
            <li style="color:red; font-weight:bold;">
                {{$sp->TenSP}}: Không in được (GiaBan <= 0)
            </li>
        @endif
    @endforeach
</ul>

<h2>Khách Hàng</h2>
<ul>
    @foreach ($khachhangs as $kh)
        <li>{{$kh->id}}, {{$kh->tenkh}}, {{$kh->email}}, {{$kh->sdt}}</li>
    @endforeach
</ul>

<h2>Hóa Đơn</h2>
<ul>
    @foreach ($hoadons as $hd)
        @if($hd->tongtien > 0)
            <li>{{$hd->id}}, {{$hd->makh}}, {{$hd->ngaylap}}, {{$hd->tongtien}}</li>
        @else
            <li style="color:red; font-weight:bold;">
                Hóa đơn {{$hd->id}}: Không in được (tongtien <= 0)
            </li>
        @endif
    @endforeach
</ul>

<h2>Kho Hàng</h2>
<ul>
    @foreach ($khohangs as $kho)
        @if($kho->SoLuong > 0)
            <li>{{$kho->MaKho}}, {{$kho->TenSanPham}}, {{$kho->MaSanPham}}, {{$kho->SoLuong}}</li>
        @else
            <li style="color:red; font-weight:bold;">
                Kho {{$kho->MaKho}} - {{$kho->TenSanPham}}: Không in được (SoLuong <= 0)
            </li>
        @endif
    @endforeach
</ul>

<h2>Chi tiết hóa đơn</h2>
<ul>
    @foreach ($chitiethoadons as $cthd)
        @if($cthd->soluong > 0 && $cthd->dongia > 0)
            <li>{{$cthd->id}}, {{$cthd->mahd}}, {{$cthd->tensp}}, {{$cthd->soluong}}, {{$cthd->dongia}}</li>
        @else
            <li style="color:red; font-weight:bold;">
                Chi tiết hóa đơn {{$cthd->id}}: Không in được (soluong <=0 hoặc dongia <=0)
            </li>
        @endif
    @endforeach
</ul>

<h1>Đọc Từ file CSV</h1>
<ul>
    @foreach ($stocks as $stock)
        @if($stock['SoLuongTon'] > 0 && $stock['GiaGoc'] > 0)
            <li>{{$stock['MaHH']}}, {{$stock['TenHH']}}, {{$stock['DonViTinh']}}, {{$stock['GiaGoc']}}, {{$stock['SoLuongTon']}}</li>
        @else
            <li style="color:red; font-weight:bold;">
                {{$stock['TenHH']}}: Không in được (SoLuongTon <=0 hoặc GiaGoc <=0)
            </li>
        @endif
    @endforeach
</ul>
