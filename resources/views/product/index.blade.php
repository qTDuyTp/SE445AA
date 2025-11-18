<h1>Đọc từ Database</h1>

<h2>Sản Phẩm</h2>
<ul>
@foreach ($sanphams as $sp)
    @php
        $errors = [];
        if($sp->MaSP <= 0) $errors[] = "Mã sản phẩm không hợp lệ";
        if(trim($sp->TenSP) === '') $errors[] = "Tên sản phẩm không được để trống";
        if($sp->GiaBan <= 0) $errors[] = "Giá bán phải > 0";
        if($sp->MaKho <= 0) $errors[] = "Mã kho không hợp lệ";
    @endphp

    @if(count($errors) > 0)
        <li style="color:red; font-weight:bold;  margin-bottom:2rem">
            {{$sp->TenSP ?? 'Sản phẩm không xác định'}}: {{ implode(', ', $errors) }}
        </li>
    @else
        <li>
            {{$sp->MaSP}}, {{$sp->TenSP}}, {{$sp->MoTa}}, {{$sp->GiaBan}},
            @if($sp->HinhAnh)
                <img src="{{$sp->HinhAnh}}" alt="{{$sp->TenSP}}" width="250" height="60"/>
            @endif,
            {{$sp->MaKho}}
        </li>
    @endif
@endforeach
</ul>

<h2>Khách Hàng</h2>
<ul>
@foreach ($khachhangs as $kh)
    @php
        $errors = [];
        if($kh->id <= 0) $errors[] = "ID khách hàng không hợp lệ";
        if(trim($kh->tenkh) === '') $errors[] = "Tên khách hàng không được để trống";
        if(trim($kh->email) === '') $errors[] = "Email không hợp lệ";
        if(trim($kh->sdt) === '') $errors[] = "Số điện thoại không hợp lệ";
    @endphp

    @if(count($errors) > 0)
        <li style="color:red; font-weight:bold;">
            {{$kh->tenkh ?? 'Khách hàng không xác định'}}: {{ implode(', ', $errors) }}
        </li>
    @else
        <li>{{$kh->id}}, {{$kh->tenkh}}, {{$kh->email}}, {{$kh->sdt}}</li>
    @endif
@endforeach
</ul>

<h2>Hóa Đơn</h2>
<ul>
@foreach ($hoadons as $hd)
    @php
        $errors = [];
        if($hd->id <= 0) $errors[] = "ID hóa đơn không hợp lệ";
        if($hd->makh <= 0) $errors[] = "Mã khách hàng không hợp lệ";
        if(trim($hd->ngaylap) === '') $errors[] = "Ngày lập không hợp lệ";
        if($hd->tongtien <= 0) $errors[] = "Tổng tiền phải > 0";
    @endphp

    @if(count($errors) > 0)
        <li style="color:red; font-weight:bold;">
            Hóa đơn {{$hd->id ?? 'không xác định'}}: {{ implode(', ', $errors) }}
        </li>
    @else
        <li>{{$hd->id}}, {{$hd->makh}}, {{$hd->ngaylap}}, {{$hd->tongtien}}</li>
    @endif
@endforeach
</ul>

<h2>Kho Hàng</h2>
<ul>
@foreach ($khohangs as $kho)
    @php
        $errors = [];
        if($kho->MaKho <= 0) $errors[] = "Mã kho không hợp lệ";
        if(trim($kho->TenSanPham) === '') $errors[] = "Tên sản phẩm không hợp lệ";
        if($kho->MaSanPham <= 0) $errors[] = "Mã sản phẩm không hợp lệ";
        if($kho->SoLuong <= 0) $errors[] = "Số lượng phải > 0";
    @endphp

    @if(count($errors) > 0)
        <li style="color:red; font-weight:bold;">
            Kho {{$kho->MaKho ?? 'không xác định'}} - {{$kho->TenSanPham ?? 'không xác định'}}: {{ implode(', ', $errors) }}
        </li>
    @else
        <li>{{$kho->MaKho}}, {{$kho->TenSanPham}}, {{$kho->MaSanPham}}, {{$kho->SoLuong}}</li>
    @endif
@endforeach
</ul>

<h2>Chi tiết hóa đơn</h2>
<ul>
@foreach ($chitiethoadons as $cthd)
    @php
        $errors = [];
        if($cthd->id <= 0) $errors[] = "ID chi tiết không hợp lệ";
        if($cthd->mahd <= 0) $errors[] = "Mã hóa đơn không hợp lệ";
        if(trim($cthd->tensp) === '') $errors[] = "Tên sản phẩm không hợp lệ";
        if($cthd->soluong <= 0) $errors[] = "Số lượng phải > 0";
        if($cthd->dongia <= 0) $errors[] = "Đơn giá phải > 0";
    @endphp

    @if(count($errors) > 0)
        <li style="color:red; font-weight:bold;">
            Chi tiết hóa đơn {{$cthd->id ?? 'không xác định'}}: {{ implode(', ', $errors) }}
        </li>
    @else
        <li>{{$cthd->id}}, {{$cthd->mahd}}, {{$cthd->tensp}}, {{$cthd->soluong}}, {{$cthd->dongia}}</li>
    @endif
@endforeach
</ul>

<h1>Đọc từ CSV</h1>
<ul>
@foreach ($stocks as $stock)
    @php
        $errors = [];
        if(trim($stock['MaHH'] ?? '') === '') $errors[] = "Mã hàng không hợp lệ";
        if(trim($stock['TenHH'] ?? '') === '') $errors[] = "Tên hàng không được để trống";
        if(trim($stock['DonViTinh'] ?? '') === '') $errors[] = "Đơn vị tính không hợp lệ";
        if(floatval($stock['GiaGoc'] ?? 0) <= 0) $errors[] = "Giá gốc phải > 0";
        if(intval($stock['SoLuongTon'] ?? 0) <= 0) $errors[] = "Số lượng tồn phải > 0";
    @endphp

    @if(count($errors) > 0)
        <li style="color:red; font-weight:bold;">
            {{$stock['TenHH'] ?? 'Hàng hóa không xác định'}}: {{ implode(', ', $errors) }}
        </li>
    @else
        <li>{{$stock['MaHH']}}, {{$stock['TenHH']}}, {{$stock['DonViTinh']}}, {{$stock['GiaGoc']}}, {{$stock['SoLuongTon']}}</li>
    @endif
@endforeach
</ul>
