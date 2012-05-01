
/** BanAn indexes **/
db.getCollection("BanAn").ensureIndex({
  "_id": 1
},[
  
]);

/** CaLamViec indexes **/
db.getCollection("CaLamViec").ensureIndex({
  "_id": 1
},[
  
]);

/** ChiTietDatCho indexes **/
db.getCollection("ChiTietDatCho").ensureIndex({
  "_id": 1
},[
  
]);

/** ChiTietHoaDon indexes **/
db.getCollection("ChiTietHoaDon").ensureIndex({
  "_id": 1
},[
  
]);

/** ChiTietHopDong indexes **/
db.getCollection("ChiTietHopDong").ensureIndex({
  "_id": 1
},[
  
]);

/** ChiTietKhoHang indexes **/
db.getCollection("ChiTietKhoHang").ensureIndex({
  "_id": 1
},[
  
]);

/** ChiTietThucDon_MonAn indexes **/
db.getCollection("ChiTietThucDon_MonAn").ensureIndex({
  "_id": 1
},[
  
]);

/** CongViec indexes **/
db.getCollection("CongViec").ensureIndex({
  "_id": 1
},[
  
]);

/** HinhThucThanhToan indexes **/
db.getCollection("HinhThucThanhToan").ensureIndex({
  "_id": 1
},[
  
]);

/** HoaDon indexes **/
db.getCollection("HoaDon").ensureIndex({
  "_id": 1
},[
  
]);

/** HopDong indexes **/
db.getCollection("HopDong").ensureIndex({
  "_id": 1
},[
  
]);

/** KhuVuc indexes **/
db.getCollection("KhuVuc").ensureIndex({
  "_id": 1
},[
  
]);

/** LichCongViec indexes **/
db.getCollection("LichCongViec").ensureIndex({
  "_id": 1
},[
  
]);

/** LoaiNguyenLieu indexes **/
db.getCollection("LoaiNguyenLieu").ensureIndex({
  "_id": 1
},[
  
]);

/** LoaiNhanVien indexes **/
db.getCollection("LoaiNhanVien").ensureIndex({
  "_id": 1
},[
  
]);

/** MonAn indexes **/
db.getCollection("MonAn").ensureIndex({
  "_id": 1
},[
  
]);

/** NguyenLieu indexes **/
db.getCollection("NguyenLieu").ensureIndex({
  "_id": 1
},[
  
]);

/** NhaCungCap indexes **/
db.getCollection("NhaCungCap").ensureIndex({
  "_id": 1
},[
  
]);

/** NhanVien indexes **/
db.getCollection("NhanVien").ensureIndex({
  "_id": 1
},[
  
]);

/** PhanCong indexes **/
db.getCollection("PhanCong").ensureIndex({
  "_id": 1
},[
  
]);

/** PhieuDatCho indexes **/
db.getCollection("PhieuDatCho").ensureIndex({
  "_id": 1
},[
  
]);

/** PhieuNhapHang indexes **/
db.getCollection("PhieuNhapHang").ensureIndex({
  "_id": 1
},[
  
]);

/** PhuongThucThanhToan indexes **/
db.getCollection("PhuongThucThanhToan").ensureIndex({
  "_id": 1
},[
  
]);

/** ThucDon indexes **/
db.getCollection("ThucDon").ensureIndex({
  "_id": 1
},[
  
]);

/** BanAn records **/
db.getCollection("BanAn").insert({
  "_id": ObjectId("4f9d8053b0bed39c13000051"),
  "MaBanAn": "BAKV101",
  "MaKV": "KV01",
  "GiaThanh": 1000000,
  "SoLuong": 4
});
db.getCollection("BanAn").insert({
  "_id": ObjectId("4f9d806cb0bed39c13000052"),
  "MaBanAn": "BAKV102",
  "MaKV": "KV01",
  "GiaThanh": 900000,
  "SoLuong": 2
});
db.getCollection("BanAn").insert({
  "_id": ObjectId("4f9d8080b0bed39c13000053"),
  "MaBanAn": "BAKV103",
  "MaKV": "KV01",
  "GiaThanh": 1200000,
  "SoLuong": 8
});
db.getCollection("BanAn").insert({
  "_id": ObjectId("4f9d809eb0bed39c13000054"),
  "MaBanAn": "BAKV104",
  "MaKV": "KV01",
  "GiaThanh": 1500000,
  "SoLuong": 12
});

/** CaLamViec records **/
db.getCollection("CaLamViec").insert({
  "_id": ObjectId("4f9d74f4b0bed39c1300003c"),
  "MaCaLamViec": "Ca01",
  "ThoiGianBD": "8h",
  "ThoiGianKT": "15h"
});
db.getCollection("CaLamViec").insert({
  "_id": ObjectId("4f9d7501b0bed39c1300003d"),
  "MaCaLamViec": "Ca02",
  "ThoiGianBD": "15h",
  "ThoiGianKT": "22h"
});

/** ChiTietDatCho records **/
db.getCollection("ChiTietDatCho").insert({
  "GiaThanh": 1000000,
  "MaBanAn": "BAKV101",
  "MaPhieu": "PD001",
  "_id": ObjectId("4f9d844eb0bed39c13000058")
});
db.getCollection("ChiTietDatCho").insert({
  "_id": ObjectId("4f9d84a7b0bed39c13000059"),
  "MaPhieu": "PD002",
  "MaBanAn": "BAKV102",
  "GiaThanh": 900000
});
db.getCollection("ChiTietDatCho").insert({
  "_id": ObjectId("4f9d8504b0bed39c1300005a"),
  "MaPhieu": "PD003",
  "MaBanAn": "BAKV103",
  "GiaThanh": 1200000
});
db.getCollection("ChiTietDatCho").insert({
  "_id": ObjectId("4f9d8525b0bed39c1300005b"),
  "MaPhieu": "PD004",
  "MaBanAn": "BAKV104",
  "GiaThanh": 1500000
});

/** ChiTietHoaDon records **/
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d8d85b0bed3b014000023"),
  "MaHD": "HD001",
  "MaCTTD_MA": "CT_TD_MA01",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d8e00b0bed3b014000024"),
  "MaHD": "HD001",
  "MaCTTD_MA": "CT_TD_MA02",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d8e15b0bed3b014000025"),
  "MaHD": "HD001",
  "MaCTTD_MA": "CT_TD_MA04",
  "SoLuong": 1
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d8f28b0bed3b014000026"),
  "MaHD": "HD001",
  "MaCTTD_MA": "CT_TD_MA04",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d8f40b0bed3b014000027"),
  "MaHD": "HD001",
  "MaCTTD_MA": "CT_TD_MA08",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d8fb1b0bed3b014000028"),
  "MaHD": "HD002",
  "MaCTTD_MA": "CT_TD_MA01",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d8fbfb0bed3b014000029"),
  "MaHD": "HD002",
  "MaCTTD_MA": "CT_TD_MA02",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d8fcdb0bed3b01400002a"),
  "MaHD": "HD002",
  "MaCTTD_MA": "CT_TD_MA03",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d8fd8b0bed3b01400002b"),
  "MaHD": "HD002",
  "MaCTTD_MA": "CT_TD_MA04",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d8fe3b0bed3b01400002c"),
  "MaHD": "HD002",
  "MaCTTD_MA": "CT_TD_MA06",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d8ff0b0bed3b01400002d"),
  "MaHD": "HD002",
  "MaCTTD_MA": "CT_TD_MA08",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d8fffb0bed3b01400002e"),
  "MaHD": "HD002",
  "MaCTTD_MA": "CT_TD_MA09",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d901eb0bed3b01400002f"),
  "MaHD": "HD003",
  "MaCTTD_MA": "CT_TD_MA01",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d9028b0bed3b014000030"),
  "MaHD": "HD003",
  "MaCTTD_MA": "CT_TD_MA02",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d9040b0bed39c13000077"),
  "MaHD": "HD003",
  "MaCTTD_MA": "CT_TD_MA04",
  "SoLuong": 4
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d9053b0bed39c13000078"),
  "MaHD": "HD003",
  "MaCTTD_MA": "CT_TD_MA05",
  "SoLuong": 4
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d905fb0bed39c13000079"),
  "MaHD": "HD003",
  "MaCTTD_MA": "CT_TD_MA09",
  "SoLuong": 4
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d909bb0bed39c1300007a"),
  "MaHD": "HD004",
  "MaCTTD_MA": "CT_TD_MA01",
  "SoLuong": 4
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d90a8b0bed39c1300007b"),
  "MaHD": "HD003",
  "MaCTTD_MA": "CT_TD_MA03",
  "SoLuong": 4
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d90b9b0bed39c1300007c"),
  "MaHD": "HD004",
  "MaCTTD_MA": "CT_TD_MA05",
  "SoLuong": 4
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d90cab0bed39c1300007d"),
  "MaHD": "HD004",
  "MaCTTD_MA": "CT_TD_MA06",
  "SoLuong": 4
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4f9d90ddb0bed39c1300007e"),
  "MaHD": "HD004",
  "MaCTTD_MA": "CT_TD_MA09",
  "SoLuong": 4
});

/** ChiTietHopDong records **/
db.getCollection("ChiTietHopDong").insert({
  "MNL": "NL03",
  "MaCTHD": "CT001",
  "MaHopDong": "HDG02",
  "SOLUONGMAX": 500,
  "SOLUONGMIN": 100,
  "XULY": "Nếu đối tác cung cấp hàng không đúng quy định thì sẽ đề bù thiệt hại cho nhà hàng chúng tôi là 5000000",
  "_id": ObjectId("4f9d6e02b0bed3b01400001f")
});
db.getCollection("ChiTietHopDong").insert({
  "MNL": "NL01",
  "MaCTHD": "CT002",
  "MaHopDong": "HDG01",
  "SOLUONGMAX": 500,
  "SOLUONGMIN": 100,
  "XULY": "Nếu đối tác cung cấp hàng không đúng quy định thì sẽ đề bù thiệt hại cho nhà hàng chúng tôi là 5000000",
  "_id": ObjectId("4f9d6e49b0bed3b014000020")
});
db.getCollection("ChiTietHopDong").insert({
  "MNL": "NL05",
  "MaCTHD": "CT004",
  "MaHopDong": "HDG03",
  "SOLUONGMAX": 5000,
  "SOLUONGMIN": 1000,
  "XULY": "Nếu đối tác cung cấp hàng không đúng quy định thì sẽ đề bù thiệt hại cho nhà hàng chúng tôi là 5000000",
  "_id": ObjectId("4f9d6e9db0bed3b014000021")
});
db.getCollection("ChiTietHopDong").insert({
  "MNL": "NL07",
  "MaCTHD": "CT004",
  "MaHopDong": "HDG03",
  "SOLUONGMAX": 100,
  "SOLUONGMIN": 50,
  "XULY": "Nếu đối tác cung cấp hàng không đúng quy định thì sẽ đề bù thiệt hại cho nhà hàng chúng tôi là 500000",
  "_id": ObjectId("4f9d6f0ab0bed3b014000022")
});

/** ChiTietKhoHang records **/
db.getCollection("ChiTietKhoHang").insert({
  "_id": ObjectId("4f9d6741b0bed39c1300002c"),
  "MaNL": "NL01",
  "SOLUONG": 20,
  "SOLUONGMIN": 10,
  "SOLUONGMAX": 100
});
db.getCollection("ChiTietKhoHang").insert({
  "_id": ObjectId("4f9d678cb0bed39c1300002d"),
  "MaNL": "NL03",
  "SOLUONG": 100,
  "SOLUONGMIN": 50,
  "SOLUONGMAX": 500
});
db.getCollection("ChiTietKhoHang").insert({
  "_id": ObjectId("4f9d67e7b0bed39c1300002e"),
  "MaNL": "NL04",
  "SOLUONG": 50,
  "SOLUONGMIN": 50,
  "SOLUONGMAX": 400
});
db.getCollection("ChiTietKhoHang").insert({
  "_id": ObjectId("4f9d6813b0bed39c1300002f"),
  "MaNL": "NL05",
  "SOLUONG": 5000,
  "SOLUONGMIN": 500,
  "SOLUONGMAX": 100000
});
db.getCollection("ChiTietKhoHang").insert({
  "_id": ObjectId("4f9d6856b0bed39c13000030"),
  "MaNL": "NL08",
  "SOLUONG": 50,
  "SOLUONGMIN": 10,
  "SOLUONGMAX": 200
});

/** ChiTietThucDon_MonAn records **/
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4f9d8bffb0bed39c1300006d"),
  "MaChiTiet": "CT_TD_MA01",
  "MaTD": "TD002",
  "MaMonAn": "MonAn001",
  "DonGia": 100000
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4f9d8c12b0bed39c1300006e"),
  "MaChiTiet": "CT_TD_MA02",
  "MaTD": "TD002",
  "MaMonAn": "MonAn002",
  "DonGia": 100000
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4f9d8c2db0bed39c1300006f"),
  "MaChiTiet": "CT_TD_MA03",
  "MaTD": "TD002",
  "MaMonAn": "MonAn003",
  "DonGia": 100000
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4f9d8c56b0bed39c13000070"),
  "MaChiTiet": "CT_TD_MA04",
  "MaTD": "TD002",
  "MaMonAn": "MonAn004",
  "DonGia": 50000
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4f9d8c6bb0bed39c13000071"),
  "MaChiTiet": "CT_TD_MA05",
  "MaTD": "TD002",
  "MaMonAn": "MonAn005",
  "DonGia": 50000
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4f9d8c94b0bed39c13000072"),
  "MaChiTiet": "CT_TD_MA06",
  "MaTD": "TD002",
  "MaMonAn": "MonAn0056",
  "DonGia": 50000
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4f9d8cb1b0bed39c13000073"),
  "MaChiTiet": "CT_TD_MA06",
  "MaTD": "TD002",
  "MaMonAn": "MonAn006",
  "DonGia": 50000
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4f9d8cbcb0bed39c13000074"),
  "MaChiTiet": "CT_TD_MA07",
  "MaTD": "TD002",
  "MaMonAn": "MonAn007",
  "DonGia": 50000
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4f9d8cc6b0bed39c13000075"),
  "MaChiTiet": "CT_TD_MA08",
  "MaTD": "TD002",
  "MaMonAn": "MonAn008",
  "DonGia": 50000
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4f9d8cd1b0bed39c13000076"),
  "MaChiTiet": "CT_TD_MA09",
  "MaTD": "TD002",
  "MaMonAn": "MonAn009",
  "DonGia": 50000
});

/** CongViec records **/
db.getCollection("CongViec").insert({
  "_id": ObjectId("4f9d7c76b0bed39c13000044"),
  "MaCV": "CV01",
  "TenCV": "Quản Lý nhà hàng"
});
db.getCollection("CongViec").insert({
  "_id": ObjectId("4f9d7c8ab0bed39c13000045"),
  "MaCV": "CV02",
  "TenCV": "Quản Lý Kho"
});
db.getCollection("CongViec").insert({
  "_id": ObjectId("4f9d7ca3b0bed39c13000046"),
  "MaCV": "CV03",
  "TenCV": "Tiếp Tân"
});
db.getCollection("CongViec").insert({
  "_id": ObjectId("4f9d7cc0b0bed39c13000047"),
  "MaCV": "CV04",
  "TenCV": "Thu Tiền"
});

/** HinhThucThanhToan records **/
db.getCollection("HinhThucThanhToan").insert({
  "_id": ObjectId("4f9d4f7bb0bed33c10000000"),
  "MaHinhThucTT": "HT01",
  "TenHinhThucTT": "Nhận tiền khi nợ của khách hàng vượt quá giới hạn cho trước"
});
db.getCollection("HinhThucThanhToan").insert({
  "_id": ObjectId("4f9d4fd1b0bed33c10000001"),
  "MaHinhThucTT": "HT02",
  "TenHinhThucTT": "Nhận tiền vào buổi tối ngày hôm đó"
});
db.getCollection("HinhThucThanhToan").insert({
  "_id": ObjectId("4f9d4ff5b0bed33c10000002"),
  "MaHinhThucTT": "HT03",
  "TenHinhThucTT": "Nhận tiền vào cuối tuần"
});
db.getCollection("HinhThucThanhToan").insert({
  "_id": ObjectId("4f9d500eb0bed33c10000003"),
  "MaHinhThucTT": "HT04",
  "TenHinhThucTT": "Nhận tiền vào cuối tháng"
});

/** HoaDon records **/
db.getCollection("HoaDon").insert({
  "_id": ObjectId("4f9d85e1b0bed39c1300005c"),
  "MaHD": "HD001",
  "TongTien": 1500000,
  "NgayLap": "1\/5\/2012",
  "NguoiLap": "NV0003",
  "MaPhieuDatCho": "PD001"
});
db.getCollection("HoaDon").insert({
  "_id": ObjectId("4f9d8605b0bed39c1300005d"),
  "MaHD": "HD002",
  "TongTien": 2000000,
  "NgayLap": "1\/5\/2012",
  "NguoiLap": "NV0003",
  "MaPhieuDatCho": "PD002"
});
db.getCollection("HoaDon").insert({
  "_id": ObjectId("4f9d8617b0bed39c1300005e"),
  "MaHD": "HD003",
  "TongTien": 2200000,
  "NgayLap": "1\/5\/2012",
  "NguoiLap": "NV0003",
  "MaPhieuDatCho": "PD003"
});
db.getCollection("HoaDon").insert({
  "_id": ObjectId("4f9d8625b0bed39c1300005f"),
  "MaHD": "HD004",
  "TongTien": 3000000,
  "NgayLap": "1\/5\/2012",
  "NguoiLap": "NV0003",
  "MaPhieuDatCho": "PD004"
});

/** HopDong records **/
db.getCollection("HopDong").insert({
  "_id": ObjectId("4f9d61c2b0bed39c13000019"),
  "MaHopDong": "HDG01",
  "MaNCC": "NCC01",
  "PhuongThucThanhToan": "PT01",
  "HinhThucThanhToan": "HT01",
  "NhanVienPhuTrach": "NV0010",
  "NgayKyHopDong": "10\/10\/2011",
  "NgayHetHan": "10\/10\/2012",
  "LoaiHopDong": 1
});
db.getCollection("HopDong").insert({
  "_id": ObjectId("4f9d623db0bed39c1300001a"),
  "MaHopDong": "HDG02",
  "MaNCC": "NCC02",
  "PhuongThucThanhToan": "PT01",
  "HinhThucThanhToan": "HT01",
  "NhanVienPhuTrach": "NV0010",
  "NgayKyHopDong": "1\/1\/2012",
  "NgayHetHan": "1\/6\/2012",
  "LoaiHopDong": 0
});
db.getCollection("HopDong").insert({
  "_id": ObjectId("4f9d625bb0bed39c1300001b"),
  "MaHopDong": "HDG03",
  "MaNCC": "NCC03",
  "PhuongThucThanhToan": "PT01",
  "HinhThucThanhToan": "HT01",
  "NhanVienPhuTrach": "NV0010",
  "NgayKyHopDong": "1\/1\/2012",
  "NgayHetHan": "1\/1\/2013",
  "LoaiHopDong": 1
});
db.getCollection("HopDong").insert({
  "_id": ObjectId("4f9d6281b0bed39c1300001c"),
  "MaHopDong": "HDG04",
  "MaNCC": "NCC04",
  "PhuongThucThanhToan": "PT01",
  "HinhThucThanhToan": "HT01",
  "NhanVienPhuTrach": "NV0010",
  "NgayKyHopDong": "1\/10\/2012",
  "NgayHetHan": "1\/10\/2013",
  "LoaiHopDong": 1
});

/** KhuVuc records **/
db.getCollection("KhuVuc").insert({
  "_id": ObjectId("4f9d7f52b0bed39c1300004e"),
  "MaKV": "KV01",
  "TenKV": "Khu Vực 1",
  "MoTa": "Khu vực trang trọng, được trang trí theo kiến trúc cổ điển"
});
db.getCollection("KhuVuc").insert({
  "_id": ObjectId("4f9d7fa8b0bed39c1300004f"),
  "MaKV": "KV02",
  "TenKV": "Khu Vực 2",
  "MoTa": "Khu vực trang trọng, được trang trí theo kiến trúc gần gũi với thiên nhiên"
});
db.getCollection("KhuVuc").insert({
  "_id": ObjectId("4f9d7fcab0bed39c13000050"),
  "MaKV": "KV03",
  "TenKV": "Khu Vực 3",
  "MoTa": "Khu vực dành cho khách hàng bình dân"
});

/** LichCongViec records **/

/** LoaiNguyenLieu records **/
db.getCollection("LoaiNguyenLieu").insert({
  "_id": ObjectId("4f9d6355b0bed39c1300001d"),
  "MaLoaiNL": "NL01",
  "TenLoaiNL": "Thủy Hải Sản"
});
db.getCollection("LoaiNguyenLieu").insert({
  "_id": ObjectId("4f9d636ab0bed39c1300001e"),
  "MaLoaiNL": "NL02",
  "TenLoaiNL": "Thịt Gia Cầm"
});
db.getCollection("LoaiNguyenLieu").insert({
  "_id": ObjectId("4f9d637cb0bed39c1300001f"),
  "MaLoaiNL": "NL03",
  "TenLoaiNL": "Thịt Gia Súc"
});
db.getCollection("LoaiNguyenLieu").insert({
  "_id": ObjectId("4f9d63afb0bed39c13000021"),
  "MaLoaiNL": "NL04",
  "TenLoaiNL": "Gia Vị"
});
db.getCollection("LoaiNguyenLieu").insert({
  "_id": ObjectId("4f9d63ccb0bed39c13000022"),
  "MaLoaiNL": "NL05",
  "TenLoaiNL": "Lương Thực"
});
db.getCollection("LoaiNguyenLieu").insert({
  "_id": ObjectId("4f9d63deb0bed39c13000023"),
  "MaLoaiNL": "NL06",
  "TenLoaiNL": "Rau Quả"
});
db.getCollection("LoaiNguyenLieu").insert({
  "_id": ObjectId("4f9d63f4b0bed39c13000024"),
  "MaLoaiNL": "NL07",
  "TenLoaiNL": "Trái Cây"
});

/** LoaiNhanVien records **/
db.getCollection("LoaiNhanVien").insert({
  "_id": ObjectId("4f9d740bb0bed39c13000037"),
  "MaLoaiNV": "LNV001",
  "TenLoaiNV": "Quản Lý Kho"
});
db.getCollection("LoaiNhanVien").insert({
  "_id": ObjectId("4f9d742bb0bed39c13000038"),
  "MaLoaiNV": "LNV002",
  "TenLoaiNV": "Nhân Viên Tiếp Tân"
});
db.getCollection("LoaiNhanVien").insert({
  "_id": ObjectId("4f9d7452b0bed39c13000039"),
  "MaLoaiNV": "LNV003",
  "TenLoaiNV": "Nhân Viên Thu Ngân"
});
db.getCollection("LoaiNhanVien").insert({
  "_id": ObjectId("4f9d7471b0bed39c1300003a"),
  "MaLoaiNV": "LNV004",
  "TenLoaiNV": "Quản Lý Nhà Hàng"
});
db.getCollection("LoaiNhanVien").insert({
  "_id": ObjectId("4f9d747bb0bed39c1300003b"),
  "MaLoaiNV": "LNV005",
  "TenLoaiNV": "Quản Lý Công Ty"
});

/** MonAn records **/
db.getCollection("MonAn").insert({
  "LoaiMonAn": "L006",
  "MaMonAn": "MA001",
  "TenMonAn": "Lương sào xả ớt",
  "_id": ObjectId("4f9d89fab0bed39c13000062")
});
db.getCollection("MonAn").insert({
  "LoaiMonAn": "L007",
  "MaMonAn": "MA002",
  "TenMonAn": "Lẩu gà nấm",
  "_id": ObjectId("4f9d8a1eb0bed39c13000063")
});
db.getCollection("MonAn").insert({
  "LoaiMonAn": "L007",
  "MaMonAn": "MA003",
  "TenMonAn": "Lẩu Gà Lá Giang",
  "_id": ObjectId("4f9d8a33b0bed39c13000064")
});
db.getCollection("MonAn").insert({
  "_id": ObjectId("4f9d8a51b0bed39c13000065"),
  "MaMonAn": "MA001",
  "TenMonAn": "Gỏi Rau Muống Thịt bò",
  "LoaiMonAn": "Món Mặn"
});
db.getCollection("MonAn").insert({
  "_id": ObjectId("4f9d8a86b0bed39c13000066"),
  "MaMonAn": "MA004",
  "TenMonAn": "Bánh Cuốn Thịt Nướng",
  "LoaiMonAn": "Bánh"
});
db.getCollection("MonAn").insert({
  "_id": ObjectId("4f9d8aa3b0bed39c13000067"),
  "MaMonAn": "MA004",
  "TenMonAn": "Bánh Thập cẩm",
  "LoaiMonAn": "Bánh"
});
db.getCollection("MonAn").insert({
  "LoaiMonAn": "L005",
  "MaMonAn": "MA006",
  "TenMonAn": "Bánh bèo tôm tươi",
  "_id": ObjectId("4f9d8ac7b0bed39c13000068")
});
db.getCollection("MonAn").insert({
  "LoaiMonAn": "L005",
  "MaMonAn": "MA007",
  "TenMonAn": "Bánh Khóai",
  "_id": ObjectId("4f9d8b14b0bed39c1300006a")
});
db.getCollection("MonAn").insert({
  "_id": ObjectId("4f9d8b3cb0bed39c1300006b"),
  "MaMonAn": "MA008",
  "TenMonAn": "Bún Giò nạc",
  "LoaiMonAn": "L002"
});
db.getCollection("MonAn").insert({
  "_id": ObjectId("4f9d8b4bb0bed39c1300006c"),
  "MaMonAn": "MA009",
  "TenMonAn": "Bún Bò Bắp",
  "LoaiMonAn": "L002"
});

/** NguyenLieu records **/
db.getCollection("NguyenLieu").insert({
  "_id": ObjectId("4f9d64b2b0bed39c13000025"),
  "MaNL": "NL01",
  "TenNL": "Tôm",
  "LoaiNL": "NL01"
});
db.getCollection("NguyenLieu").insert({
  "_id": ObjectId("4f9d64ceb0bed39c13000026"),
  "MaNL": "NL02",
  "TenNL": "Cá Tra",
  "LoaiNL": "NL01"
});
db.getCollection("NguyenLieu").insert({
  "_id": ObjectId("4f9d6516b0bed39c13000027"),
  "MaNL": "NL03",
  "TenNL": "Thịt Gà",
  "LoaiNL": "NL02"
});
db.getCollection("NguyenLieu").insert({
  "_id": ObjectId("4f9d6530b0bed39c13000028"),
  "MaNL": "NL04",
  "TenNL": "Thịt Lợn",
  "LoaiNL": "NL03"
});
db.getCollection("NguyenLieu").insert({
  "_id": ObjectId("4f9d655eb0bed39c13000029"),
  "MaNL": "NL05",
  "TenNL": "Gạo",
  "LoaiNL": "NL05"
});
db.getCollection("NguyenLieu").insert({
  "_id": ObjectId("4f9d6575b0bed39c1300002a"),
  "MaNL": "NL06",
  "TenNL": "Bột Mì",
  "LoaiNL": "NL05"
});
db.getCollection("NguyenLieu").insert({
  "_id": ObjectId("4f9d6593b0bed39c1300002b"),
  "MaNL": "NL08",
  "TenNL": "Thanh Long",
  "LoaiNL": "NL07"
});

/** NhaCungCap records **/
db.getCollection("NhaCungCap").insert({
  "_id": ObjectId("4f9d59e6b0bed39c13000015"),
  "MaNCC": "NCC01",
  "TenNCC": "Nguyễn Văn Ba",
  "DiaChi": "154 Phan Huy Ích - Huyện Củ Chi - TP Hồ Chí Minh",
  "SDT": "01268845624",
  "Email": "nvba@gmail.com",
  "DinhMuc": 100,
  "TinhTrang": 1,
  "CongNo": 2000000,
  "SoTK": "1975200012223",
  "NgayLap": "2\/3\/2011",
  "NganHang": "DongA Bank",
  "TenLoaiThe": "The ATM"
});
db.getCollection("NhaCungCap").insert({
  "_id": ObjectId("4f9d5afdb0bed39c13000016"),
  "MaNCC": "NCC02",
  "TenNCC": "Công Ty Nuôi Trồng Thủy Sản Cái Lân",
  "DiaChi": " Huyện Nhà Bè - TP Hồ Chí Minh",
  "SDT": "08342345",
  "Email": "cailan@gmail.com",
  "DinhMuc": 100,
  "TinhTrang": 1,
  "CongNo": 6000000,
  "SoTK": "1075200012223",
  "NgayLap": "2\/5\/2011",
  "NganHang": "DongA Bank",
  "TenLoaiThe": "The ATM"
});
db.getCollection("NhaCungCap").insert({
  "_id": ObjectId("4f9d5b95b0bed39c13000017"),
  "MaNCC": "NCC03",
  "TenNCC": "Tran Van B",
  "DiaChi": "154 QL 1A- Hàm Nghi - Binh Thuan",
  "SDT": "01257293721",
  "Email": "tvb@gmail.com",
  "DinhMuc": 100,
  "TinhTrang": 1,
  "CongNo": 7000000,
  "SoTK": "1975299017623",
  "NgayLap": "2\/3\/2010",
  "NganHang": "Vietin Bank",
  "TenLoaiThe": "The ATM"
});
db.getCollection("NhaCungCap").insert({
  "_id": ObjectId("4f9d605cb0bed39c13000018"),
  "MaNCC": "NCC04",
  "TenNCC": "Công Ty Xuất Lúa Gạo Cường Thịnh",
  "DiaChi": " An Giang",
  "SDT": "01268421823",
  "Email": "cuongthinh@gmail.com",
  "DinhMuc": 1000,
  "TinhTrang": 1,
  "CongNo": 9000000,
  "SoTK": "1975200012223",
  "NgayLap": "2\/3\/2011",
  "NganHang": "DongA Bank",
  "TenLoaiThe": "The ATM"
});

/** NhanVien records **/
db.getCollection("NhanVien").insert({
  "_id": ObjectId("4f9d79adb0bed39c1300003e"),
  "MaNV": "NV0001",
  "TenNV": "Nguyen Van A",
  "CMND": "215154564",
  "DiaChi": "163 Thành Thái - F14 -Q10",
  "SDT": "016667236574",
  "Email": "nva@gmail.com",
  "LoaiNV": "LVN001",
  "Luong": 10000000,
  "Thuong": 2000000
});
db.getCollection("NhanVien").insert({
  "_id": ObjectId("4f9d79f6b0bed39c1300003f"),
  "MaNV": "NV0002",
  "TenNV": "Trần Thị Ngân",
  "CMND": "215154564",
  "DiaChi": "163 Điện Biên Phủ - F1 -Q10",
  "SDT": "016667236574",
  "Email": "ttngan@gmail.com",
  "LoaiNV": "LVN002",
  "Luong": 7000000,
  "Thuong": 1000000
});
db.getCollection("NhanVien").insert({
  "_id": ObjectId("4f9d7a59b0bed39c13000040"),
  "MaNV": "NV0003",
  "TenNV": "Trần Thị Lam",
  "CMND": "215154523",
  "DiaChi": "163 Lý Thái Tổ - F14 -Q10",
  "SDT": "016647236574",
  "Email": "ttlam@gmail.com",
  "LoaiNV": "LVN003",
  "Luong": 8000000,
  "Thuong": 1000000
});
db.getCollection("NhanVien").insert({
  "_id": ObjectId("4f9d7a8fb0bed39c13000041"),
  "MaNV": "NV0004",
  "TenNV": "Nguyen Van Anh",
  "CMND": "211154564",
  "DiaChi": "163 An Duong Vuong - F10 -Q10",
  "SDT": "012667236574",
  "Email": "nvanh@gmail.com",
  "LoaiNV": "LVN004",
  "Luong": 15000000,
  "Thuong": 2000000
});
db.getCollection("NhanVien").insert({
  "_id": ObjectId("4f9d7adeb0bed39c13000042"),
  "MaNV": "NV0005",
  "TenNV": "Nguyễn Hòang Anh",
  "CMND": "211174564",
  "DiaChi": "163 Lý Thường Kiệt - F15 -Q10",
  "SDT": "016967236574",
  "Email": "nhanh@gmail.com",
  "LoaiNV": "LVN005",
  "Luong": 16000000,
  "Thuong": 3000000
});
db.getCollection("NhanVien").insert({
  "_id": ObjectId("4f9d7b3cb0bed39c13000043"),
  "MaNV": "NV0010",
  "TenNV": "Nguyễn Văn Minh",
  "CMND": "21217564",
  "DiaChi": "122 Lý Thường Kiệt - F15 -Q10",
  "SDT": "016567236574",
  "Email": "nvminh@gmail.com",
  "LoaiNV": "LVN005",
  "Luong": 14000000,
  "Thuong": 4000000
});

/** PhanCong records **/
db.getCollection("PhanCong").insert({
  "_id": ObjectId("4f9d7d6eb0bed39c13000048"),
  "MaCV": "CV01",
  "MaNV": "NV0005",
  "ThoiGianBD": "8h",
  "ThoiGianKetThuc": "15h"
});
db.getCollection("PhanCong").insert({
  "_id": ObjectId("4f9d7ddcb0bed39c1300004a"),
  "MaCV": "CV01",
  "MaNV": "NV0010",
  "ThoiGianBD": "15h",
  "ThoiGianKetThuc": "22h"
});
db.getCollection("PhanCong").insert({
  "_id": ObjectId("4f9d7e28b0bed39c1300004b"),
  "MaCV": "CV02",
  "MaNV": "NV0001",
  "ThoiGianBD": "8h",
  "ThoiGianKetThuc": "18h"
});
db.getCollection("PhanCong").insert({
  "_id": ObjectId("4f9d7e65b0bed39c1300004c"),
  "MaCV": "CV03",
  "MaNV": "NV0003",
  "ThoiGianBD": "8h",
  "ThoiGianKetThuc": "15h"
});
db.getCollection("PhanCong").insert({
  "_id": ObjectId("4f9d7e76b0bed39c1300004d"),
  "MaCV": "CV04",
  "MaNV": "NV0004",
  "ThoiGianBD": "8h",
  "ThoiGianKetThuc": "15h"
});

/** PhieuDatCho records **/
db.getCollection("PhieuDatCho").insert({
  "_id": ObjectId("4f9d815cb0bed39c13000055"),
  "MaPhieu": "PD001",
  "NgayLap": "1\/5\/2012",
  "NguoiTiepNhan": "NV0003",
  "HoTenKH": "Trần Văn Dũng",
  "SDT": "0978654312",
  "CMND": "211453879"
});
db.getCollection("PhieuDatCho").insert({
  "_id": ObjectId("4f9d81f2b0bed39c13000056"),
  "MaPhieu": "PD002",
  "NgayLap": "1\/5\/2012",
  "NguoiTiepNhan": "NV0003",
  "HoTenKH": "Nguyễn Hải Đăng",
  "SDT": "0978654312",
  "CMND": "211453879"
});
db.getCollection("PhieuDatCho").insert({
  "_id": ObjectId("4f9d839cb0bed39c13000057"),
  "MaPhieu": "PD004",
  "NgayLap": "1\/5\/2012",
  "NguoiTiepNhan": "NV0003",
  "HoTenKH": "Trần Thị Hoa",
  "SDT": "0978954312",
  "CMND": "214453879"
});

/** PhieuNhapHang records **/
db.getCollection("PhieuNhapHang").insert({
  "_id": ObjectId("4f9d7240b0bed39c13000033"),
  "MaCTHD": "CT001",
  "NgayNhap": "1\/5\/2012",
  "SoLuong": 100,
  "DonGia": 50000,
  "MaNV": "NV0001"
});
db.getCollection("PhieuNhapHang").insert({
  "_id": ObjectId("4f9d7258b0bed39c13000034"),
  "MaCTHD": "CT002",
  "NgayNhap": "1\/5\/2012",
  "SoLuong": 100,
  "DonGia": 50000,
  "MaNV": "NV0001"
});
db.getCollection("PhieuNhapHang").insert({
  "_id": ObjectId("4f9d7267b0bed39c13000035"),
  "MaCTHD": "CT003",
  "NgayNhap": "1\/5\/2012",
  "SoLuong": 2000,
  "DonGia": 5000,
  "MaNV": "NV0001"
});
db.getCollection("PhieuNhapHang").insert({
  "_id": ObjectId("4f9d72abb0bed39c13000036"),
  "MaCTHD": "CT004",
  "NgayNhap": "1\/5\/2012",
  "SoLuong": 100,
  "DonGia": 5000,
  "MaNV": "NV0001"
});

/** PhuongThucThanhToan records **/
db.getCollection("PhuongThucThanhToan").insert({
  "_id": ObjectId("4f9d50e5b0bed33c10000004"),
  "MaPhuongThucTT": "PT01",
  "TenPhuongThuc": "Tiền Mặt"
});
db.getCollection("PhuongThucThanhToan").insert({
  "_id": ObjectId("4f9d50eeb0bed33c10000005"),
  "MaPhuongThucTT": "PT02",
  "TenPhuongThuc": "Chuyển Khoản"
});

/** ThucDon records **/
db.getCollection("ThucDon").insert({
  "_id": ObjectId("4f9d86afb0bed39c13000060"),
  "MaTD": "TD001",
  "TenThuDon": "Thực Đơn Chay",
  "NgayLap": "2\/5\/2010"
});
db.getCollection("ThucDon").insert({
  "_id": ObjectId("4f9d871eb0bed39c13000061"),
  "MaTD": "TD002",
  "TenThuDon": "Thực Đơn Mặn",
  "NgayLap": "2\/5\/2010"
});
