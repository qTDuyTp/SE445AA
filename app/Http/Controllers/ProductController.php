<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index(){
        
        //Đọc dữ liệu từ database
        $sanphams = DB::connection('mysql')->table('sanpham')->get();
        $khachhangs = DB::connection('mysql')->table('khachhang')->get();
        $hoadons = DB::connection('mysql')->table('hoadon')->get();
        $khohangs = DB::connection('mysql')->table('khohang')->get();
        $chitiethoadons = DB::connection('mysql')->table('chitiethoadon')->get();

        //Đọc dữ liệu từ file csv 
        $csvFile =base_path('data/khotong.csv');
        $stocks=[];

       if (($handle = fopen($csvFile, 'r')) !== false){
            $header = fgetcsv($handle, 1000, ',');
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                $stocks[] = array_combine($header, $row);
            }
                fclose($handle);
        }

        //trả dữ liệu ra view
        return view('product.index',compact(
            'sanphams',
            'khachhangs',
            'hoadons',
            'khohangs',
            'chitiethoadons',
            'stocks'
        ));
    }

}
