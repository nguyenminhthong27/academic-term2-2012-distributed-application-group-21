
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

/** ChuyenCongTac indexes **/
db.getCollection("ChuyenCongTac").ensureIndex({
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

/** LoaiMonAn indexes **/
db.getCollection("LoaiMonAn").ensureIndex({
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

/** NguyenLieu_MonAn indexes **/
db.getCollection("NguyenLieu_MonAn").ensureIndex({
  "_id": 1
},[
  
]);

/** NhaCungCap indexes **/
db.getCollection("NhaCungCap").ensureIndex({
  "_id": 1
},[
  
]);

/** NhaHang indexes **/
db.getCollection("NhaHang").ensureIndex({
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
  "GiaThanh": 1000000,
  "MaBanAn": "BAKV101",
  "MaKV": "KV01",
  "MaNH": "NH001",
  "SoLuong": 4,
  "TinhTrang" : 0,
  "_id": ObjectId("4f9d8053b0bed39c13000051")
});
db.getCollection("BanAn").insert({
  "GiaThanh": 900000,
  "MaBanAn": "BAKV102",
  "MaKV": "KV01",
  "MaNH": "NH001",
  "SoLuong": 2,
  "TinhTrang" : 0,
  "_id": ObjectId("4f9d806cb0bed39c13000052")
});
db.getCollection("BanAn").insert({
  "GiaThanh": 1200000,
  "MaBanAn": "BAKV103",
  "MaKV": "KV01",
  "MaNH": "NH001",
  "SoLuong": 8,
  "TinhTrang" : 0,
  "_id": ObjectId("4f9d8080b0bed39c13000053")
});
db.getCollection("BanAn").insert({
  "GiaThanh": 1500000,
  "MaBanAn": "BAKV104",
  "MaKV": "KV01",
  "MaNH": "NH001",
  "SoLuong": 12,
  "TinhTrang" : 0,
  "_id": ObjectId("4f9d809eb0bed39c13000054")
});
db.getCollection("BanAn").insert({
  "_id": ObjectId("4fb3299153d2af1613155667"),
  "GiaThanh": 1000000,
  "MaBanAn": "BAKV101",
  "MaKV": "KV01",
  "MaNH": "NH002",
  "SoLuong": 4,
  "TinhTrang" : 0
});
db.getCollection("BanAn").insert({
  "_id": ObjectId("4fb3299153d2af1613155668"),
  "GiaThanh": 900000,
  "MaBanAn": "BAKV102",
  "MaKV": "KV01",
  "MaNH": "NH002",
  "SoLuong": 2,
  "TinhTrang" : 0
});
db.getCollection("BanAn").insert({
  "_id": ObjectId("4fb3299153d2af1613155669"),
  "GiaThanh": 1200000,
  "MaBanAn": "BAKV103",
  "MaKV": "KV01",
  "MaNH": "NH002",
  "SoLuong": 8,
  "TinhTrang" : 0
});
db.getCollection("BanAn").insert({
  "_id": ObjectId("4fb3299153d2af161315566a"),
  "GiaThanh": 1500000,
  "MaBanAn": "BAKV104",
  "MaKV": "KV01",
  "MaNH": "NH002",
  "SoLuong": 12,
  "TinhTrang" : 0
});

/** CaLamViec records **/
db.getCollection("CaLamViec").insert({
  "MaCaLamViec": "Ca01",
  "MaNH": "NH001",
  "ThoiGianBD": "8h",
  "ThoiGianKT": "15h",
  "_id": ObjectId("4f9d74f4b0bed39c1300003c")
});
db.getCollection("CaLamViec").insert({
  "MaCaLamViec": "Ca02",
  "MaNH": "NH001",
  "ThoiGianBD": "15h",
  "ThoiGianKT": "22h",
  "_id": ObjectId("4f9d7501b0bed39c1300003d")
});
db.getCollection("CaLamViec").insert({
  "_id": ObjectId("4fb3299153d2af161315566b"),
  "MaCaLamViec": "Ca01",
  "MaNH": "NH002",
  "ThoiGianBD": "8h",
  "ThoiGianKT": "15h"
});
db.getCollection("CaLamViec").insert({
  "_id": ObjectId("4fb3299153d2af161315566c"),
  "MaCaLamViec": "Ca02",
  "MaNH": "NH002",
  "ThoiGianBD": "15h",
  "ThoiGianKT": "22h"
});

/** ChiTietDatCho records **/
db.getCollection("ChiTietDatCho").insert({
  "DenThoiGian": "11:00 03\/05\/2012",
  "GiaThanh": 1000000,
  "MaBanAn": "BAKV101",
  "MaNH": "NH001",
  "MaPhieu": "PD001",
  "TuThoiGian": "9:00 03-05-2012",
  "_id": ObjectId("4f9d844eb0bed39c13000058")
});
db.getCollection("ChiTietDatCho").insert({
  "DenThoiGian": "14:00 14\/05\/2012",
  "GiaThanh": 900000,
  "MaBanAn": "BAKV102",
  "MaNH": "NH001",
  "MaPhieu": "PD002",
  "TuThoiGian": "13:00 14-05-2012",
  "_id": ObjectId("4f9d84a7b0bed39c13000059")
});
db.getCollection("ChiTietDatCho").insert({
  "DenThoiGian": "13:00 15\/05\/2012",
  "GiaThanh": 1200000,
  "MaBanAn": "BAKV103",
  "MaNH": "NH001",
  "MaPhieu": "PD003",
  "TuThoiGian": "10:00 15-05-2012",
  "_id": ObjectId("4f9d8504b0bed39c1300005a")
});
db.getCollection("ChiTietDatCho").insert({
  "DenThoiGian": "11:00 14\/05\/2012",
  "GiaThanh": 1500000,
  "MaBanAn": "BAKV104",
  "MaNH": "NH001",
  "MaPhieu": "PD004",
  "TuThoiGian": "9:00 14-05-2012",
  "_id": ObjectId("4f9d8525b0bed39c1300005b")
});
db.getCollection("ChiTietDatCho").insert({
  "_id": ObjectId("4fb3299153d2af161315566d"),
  "DenThoiGian": "11:00 03\/05\/2012",
  "GiaThanh": 1000000,
  "MaBanAn": "BAKV101",
  "MaNH": "NH002",
  "MaPhieu": "PD001",
  "TuThoiGian": "9:00 03-05-2012"
});
db.getCollection("ChiTietDatCho").insert({
  "DenThoiGian": "14:00 14\/05\/2012",
  "GiaThanh": 900000,
  "MaBanAn": "BAKV102",
  "MaNH": "NH002",
  "MaPhieu": "PD002",
  "TuThoiGian": "13:00 14-05-2012",
  "_id": ObjectId("4fb3299153d2af161315566e")
});
db.getCollection("ChiTietDatCho").insert({
  "DenThoiGian": "13:00 15\/05\/2012",
  "GiaThanh": 1200000,
  "MaBanAn": "BAKV103",
  "MaNH": "NH002",
  "MaPhieu": "PD003",
  "TuThoiGian": "10:00 15-05-2012",
  "_id": ObjectId("4fb3299153d2af161315566f")
});
db.getCollection("ChiTietDatCho").insert({
  "DenThoiGian": "11:00 14\/05\/2012",
  "GiaThanh": 1500000,
  "MaBanAn": "BAKV104",
  "MaNH": "NH002",
  "MaPhieu": "PD004",
  "TuThoiGian": "9:00 14-05-2012",
  "_id": ObjectId("4fb3299153d2af1613155670")
});


/** ChiTietHoaDon records **/
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA01",
  "MaHD": "HD001",
  "MaNH": "NH001",
  "SoLuong": 2,
  "_id": ObjectId("4f9d8d85b0bed3b014000023")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA02",
  "MaHD": "HD001",
  "MaNH": "NH001",
  "SoLuong": 2,
  "_id": ObjectId("4f9d8e00b0bed3b014000024")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA04",
  "MaHD": "HD001",
  "MaNH": "NH001",
  "SoLuong": 1,
  "_id": ObjectId("4f9d8e15b0bed3b014000025")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA04",
  "MaHD": "HD001",
  "MaNH": "NH001",
  "SoLuong": 2,
  "_id": ObjectId("4f9d8f28b0bed3b014000026")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA08",
  "MaHD": "HD001",
  "MaNH": "NH001",
  "SoLuong": 2,
  "_id": ObjectId("4f9d8f40b0bed3b014000027")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA01",
  "MaHD": "HD002",
  "MaNH": "NH001",
  "SoLuong": 2,
  "_id": ObjectId("4f9d8fb1b0bed3b014000028")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA02",
  "MaHD": "HD002",
  "MaNH": "NH001",
  "SoLuong": 2,
  "_id": ObjectId("4f9d8fbfb0bed3b014000029")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA03",
  "MaHD": "HD002",
  "MaNH": "NH001",
  "SoLuong": 2,
  "_id": ObjectId("4f9d8fcdb0bed3b01400002a")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA04",
  "MaHD": "HD002",
  "MaNH": "NH001",
  "SoLuong": 2,
  "_id": ObjectId("4f9d8fd8b0bed3b01400002b")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA06",
  "MaHD": "HD002",
  "MaNH": "NH001",
  "SoLuong": 2,
  "_id": ObjectId("4f9d8fe3b0bed3b01400002c")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA08",
  "MaHD": "HD002",
  "MaNH": "NH001",
  "SoLuong": 2,
  "_id": ObjectId("4f9d8ff0b0bed3b01400002d")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA09",
  "MaHD": "HD002",
  "MaNH": "NH001",
  "SoLuong": 2,
  "_id": ObjectId("4f9d8fffb0bed3b01400002e")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA01",
  "MaHD": "HD003",
  "MaNH": "NH001",
  "SoLuong": 2,
  "_id": ObjectId("4f9d901eb0bed3b01400002f")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA02",
  "MaHD": "HD003",
  "MaNH": "NH001",
  "SoLuong": 2,
  "_id": ObjectId("4f9d9028b0bed3b014000030")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA04",
  "MaHD": "HD003",
  "MaNH": "NH001",
  "SoLuong": 4,
  "_id": ObjectId("4f9d9040b0bed39c13000077")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA05",
  "MaHD": "HD003",
  "MaNH": "NH001",
  "SoLuong": 4,
  "_id": ObjectId("4f9d9053b0bed39c13000078")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA09",
  "MaHD": "HD003",
  "MaNH": "NH001",
  "SoLuong": 4,
  "_id": ObjectId("4f9d905fb0bed39c13000079")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA01",
  "MaHD": "HD004",
  "MaNH": "NH001",
  "SoLuong": 4,
  "_id": ObjectId("4f9d909bb0bed39c1300007a")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA03",
  "MaHD": "HD003",
  "MaNH": "NH001",
  "SoLuong": 4,
  "_id": ObjectId("4f9d90a8b0bed39c1300007b")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA05",
  "MaHD": "HD004",
  "MaNH": "NH001",
  "SoLuong": 4,
  "_id": ObjectId("4f9d90b9b0bed39c1300007c")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA06",
  "MaHD": "HD004",
  "MaNH": "NH001",
  "SoLuong": 4,
  "_id": ObjectId("4f9d90cab0bed39c1300007d")
});
db.getCollection("ChiTietHoaDon").insert({
  "MaCTTD_MA": "CT_TD_MA09",
  "MaHD": "HD004",
  "MaNH": "NH001",
  "SoLuong": 4,
  "_id": ObjectId("4f9d90ddb0bed39c1300007e")
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155671"),
  "MaCTTD_MA": "CT_TD_MA01",
  "MaHD": "HD001",
  "MaNH": "NH002",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155672"),
  "MaCTTD_MA": "CT_TD_MA02",
  "MaHD": "HD001",
  "MaNH": "NH002",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155673"),
  "MaCTTD_MA": "CT_TD_MA04",
  "MaHD": "HD001",
  "MaNH": "NH002",
  "SoLuong": 1
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155674"),
  "MaCTTD_MA": "CT_TD_MA04",
  "MaHD": "HD001",
  "MaNH": "NH002",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155675"),
  "MaCTTD_MA": "CT_TD_MA08",
  "MaHD": "HD001",
  "MaNH": "NH002",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155676"),
  "MaCTTD_MA": "CT_TD_MA01",
  "MaHD": "HD002",
  "MaNH": "NH002",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155677"),
  "MaCTTD_MA": "CT_TD_MA02",
  "MaHD": "HD002",
  "MaNH": "NH002",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155678"),
  "MaCTTD_MA": "CT_TD_MA03",
  "MaHD": "HD002",
  "MaNH": "NH002",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155679"),
  "MaCTTD_MA": "CT_TD_MA04",
  "MaHD": "HD002",
  "MaNH": "NH002",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af161315567a"),
  "MaCTTD_MA": "CT_TD_MA06",
  "MaHD": "HD002",
  "MaNH": "NH002",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af161315567b"),
  "MaCTTD_MA": "CT_TD_MA08",
  "MaHD": "HD002",
  "MaNH": "NH002",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af161315567c"),
  "MaCTTD_MA": "CT_TD_MA09",
  "MaHD": "HD002",
  "MaNH": "NH002",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af161315567d"),
  "MaCTTD_MA": "CT_TD_MA01",
  "MaHD": "HD003",
  "MaNH": "NH002",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af161315567e"),
  "MaCTTD_MA": "CT_TD_MA02",
  "MaHD": "HD003",
  "MaNH": "NH002",
  "SoLuong": 2
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af161315567f"),
  "MaCTTD_MA": "CT_TD_MA04",
  "MaHD": "HD003",
  "MaNH": "NH002",
  "SoLuong": 4
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155680"),
  "MaCTTD_MA": "CT_TD_MA05",
  "MaHD": "HD003",
  "MaNH": "NH002",
  "SoLuong": 4
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155681"),
  "MaCTTD_MA": "CT_TD_MA09",
  "MaHD": "HD003",
  "MaNH": "NH002",
  "SoLuong": 4
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155682"),
  "MaCTTD_MA": "CT_TD_MA01",
  "MaHD": "HD004",
  "MaNH": "NH002",
  "SoLuong": 4
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155683"),
  "MaCTTD_MA": "CT_TD_MA03",
  "MaHD": "HD003",
  "MaNH": "NH002",
  "SoLuong": 4
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155684"),
  "MaCTTD_MA": "CT_TD_MA05",
  "MaHD": "HD004",
  "MaNH": "NH002",
  "SoLuong": 4
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155685"),
  "MaCTTD_MA": "CT_TD_MA06",
  "MaHD": "HD004",
  "MaNH": "NH002",
  "SoLuong": 4
});
db.getCollection("ChiTietHoaDon").insert({
  "_id": ObjectId("4fb3299153d2af1613155686"),
  "MaCTTD_MA": "CT_TD_MA09",
  "MaHD": "HD004",
  "MaNH": "NH002",
  "SoLuong": 4
});

/** ChiTietHopDong records **/
db.getCollection("ChiTietHopDong").insert({
  "MNL": "NL03",
  "MaCTHD": "CT001",
  "MaHopDong": "HDG02",
  "MaNH": "NH001",
  "SOLUONGMAX": 500,
  "SOLUONGMIN": 100,
  "XULY": "Nếu đối tác cung cấp hàng không đúng quy định thì sẽ đề bù thiệt hại cho nhà hàng chúng tôi là 5000000",
  "_id": ObjectId("4f9d6e02b0bed3b01400001f")
});
db.getCollection("ChiTietHopDong").insert({
  "MNL": "NL01",
  "MaCTHD": "CT002",
  "MaHopDong": "HDG01",
  "MaNH": "NH001",
  "SOLUONGMAX": 500,
  "SOLUONGMIN": 100,
  "XULY": "Nếu đối tác cung cấp hàng không đúng quy định thì sẽ đề bù thiệt hại cho nhà hàng chúng tôi là 5000000",
  "_id": ObjectId("4f9d6e49b0bed3b014000020")
});
db.getCollection("ChiTietHopDong").insert({
  "MNL": "NL05",
  "MaCTHD": "CT004",
  "MaHopDong": "HDG03",
  "MaNH": "NH001",
  "SOLUONGMAX": 5000,
  "SOLUONGMIN": 1000,
  "XULY": "Nếu đối tác cung cấp hàng không đúng quy định thì sẽ đề bù thiệt hại cho nhà hàng chúng tôi là 5000000",
  "_id": ObjectId("4f9d6e9db0bed3b014000021")
});
db.getCollection("ChiTietHopDong").insert({
  "MNL": "NL07",
  "MaCTHD": "CT004",
  "MaHopDong": "HDG03",
  "MaNH": "NH001",
  "SOLUONGMAX": 100,
  "SOLUONGMIN": 50,
  "XULY": "Nếu đối tác cung cấp hàng không đúng quy định thì sẽ đề bù thiệt hại cho nhà hàng chúng tôi là 500000",
  "_id": ObjectId("4f9d6f0ab0bed3b014000022")
});

/** ChiTietKhoHang records **/
db.getCollection("ChiTietKhoHang").insert({
  "MaNH": "NH001",
  "MaNL": "NL01",
  "SOLUONG": 20,
  "SOLUONGMAX": 100,
  "SOLUONGMIN": 10,
  "_id": ObjectId("4f9d6741b0bed39c1300002c")
});
db.getCollection("ChiTietKhoHang").insert({
  "MaNH": "NH001",
  "MaNL": "NL03",
  "SOLUONG": 100,
  "SOLUONGMAX": 500,
  "SOLUONGMIN": 50,
  "_id": ObjectId("4f9d678cb0bed39c1300002d")
});
db.getCollection("ChiTietKhoHang").insert({
  "MaNH": "NH001",
  "MaNL": "NL04",
  "SOLUONG": 50,
  "SOLUONGMAX": 400,
  "SOLUONGMIN": 50,
  "_id": ObjectId("4f9d67e7b0bed39c1300002e")
});
db.getCollection("ChiTietKhoHang").insert({
  "MaNH": "NH001",
  "MaNL": "NL05",
  "SOLUONG": 5000,
  "SOLUONGMAX": 100000,
  "SOLUONGMIN": 500,
  "_id": ObjectId("4f9d6813b0bed39c1300002f")
});
db.getCollection("ChiTietKhoHang").insert({
  "MaNH": "NH001",
  "MaNL": "NL08",
  "SOLUONG": 50,
  "SOLUONGMAX": 200,
  "SOLUONGMIN": 10,
  "_id": ObjectId("4f9d6856b0bed39c13000030")
});
db.getCollection("ChiTietKhoHang").insert({
  "_id": ObjectId("4fb3299153d2af1613155687"),
  "MaNH": "NH002",
  "MaNL": "NL01",
  "SOLUONG": 20,
  "SOLUONGMAX": 100,
  "SOLUONGMIN": 10
});
db.getCollection("ChiTietKhoHang").insert({
  "_id": ObjectId("4fb3299153d2af1613155688"),
  "MaNH": "NH002",
  "MaNL": "NL03",
  "SOLUONG": 100,
  "SOLUONGMAX": 500,
  "SOLUONGMIN": 50
});
db.getCollection("ChiTietKhoHang").insert({
  "_id": ObjectId("4fb3299153d2af1613155689"),
  "MaNH": "NH002",
  "MaNL": "NL04",
  "SOLUONG": 50,
  "SOLUONGMAX": 400,
  "SOLUONGMIN": 50
});
db.getCollection("ChiTietKhoHang").insert({
  "_id": ObjectId("4fb3299153d2af161315568a"),
  "MaNH": "NH002",
  "MaNL": "NL05",
  "SOLUONG": 5000,
  "SOLUONGMAX": 100000,
  "SOLUONGMIN": 500
});
db.getCollection("ChiTietKhoHang").insert({
  "_id": ObjectId("4fb3299153d2af161315568b"),
  "MaNH": "NH002",
  "MaNL": "NL08",
  "SOLUONG": 50,
  "SOLUONGMAX": 200,
  "SOLUONGMIN": 10
});

/** ChiTietThucDon_MonAn records **/
db.getCollection("ChiTietThucDon_MonAn").insert({
  "DonGia": 100000,
  "MaChiTiet": "CT_TD_MA01",
  "MaMonAn": "MonAn001",
  "MaNH": "NH001",
  "MaTD": "TD002",
  "_id": ObjectId("4f9d8bffb0bed39c1300006d")
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "DonGia": 100000,
  "MaChiTiet": "CT_TD_MA02",
  "MaMonAn": "MonAn002",
  "MaNH": "NH001",
  "MaTD": "TD002",
  "_id": ObjectId("4f9d8c12b0bed39c1300006e")
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "DonGia": 100000,
  "MaChiTiet": "CT_TD_MA03",
  "MaMonAn": "MonAn003",
  "MaNH": "NH001",
  "MaTD": "TD002",
  "_id": ObjectId("4f9d8c2db0bed39c1300006f")
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "DonGia": 50000,
  "MaChiTiet": "CT_TD_MA04",
  "MaMonAn": "MonAn004",
  "MaNH": "NH001",
  "MaTD": "TD002",
  "_id": ObjectId("4f9d8c56b0bed39c13000070")
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "DonGia": 50000,
  "MaChiTiet": "CT_TD_MA05",
  "MaMonAn": "MonAn005",
  "MaNH": "NH001",
  "MaTD": "TD002",
  "_id": ObjectId("4f9d8c6bb0bed39c13000071")
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "DonGia": 50000,
  "MaChiTiet": "CT_TD_MA06",
  "MaMonAn": "MonAn0056",
  "MaNH": "NH001",
  "MaTD": "TD002",
  "_id": ObjectId("4f9d8c94b0bed39c13000072")
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "DonGia": 50000,
  "MaChiTiet": "CT_TD_MA06",
  "MaMonAn": "MonAn006",
  "MaNH": "NH001",
  "MaTD": "TD002",
  "_id": ObjectId("4f9d8cb1b0bed39c13000073")
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "DonGia": 50000,
  "MaChiTiet": "CT_TD_MA07",
  "MaMonAn": "MonAn007",
  "MaNH": "NH001",
  "MaTD": "TD002",
  "_id": ObjectId("4f9d8cbcb0bed39c13000074")
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "DonGia": 50000,
  "MaChiTiet": "CT_TD_MA08",
  "MaMonAn": "MonAn008",
  "MaNH": "NH001",
  "MaTD": "TD002",
  "_id": ObjectId("4f9d8cc6b0bed39c13000075")
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "DonGia": 50000,
  "MaChiTiet": "CT_TD_MA09",
  "MaMonAn": "MonAn009",
  "MaNH": "NH001",
  "MaTD": "TD002",
  "_id": ObjectId("4f9d8cd1b0bed39c13000076")
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4fb3299153d2af161315568c"),
  "DonGia": 100000,
  "MaChiTiet": "CT_TD_MA01",
  "MaMonAn": "MonAn001",
  "MaNH": "NH002",
  "MaTD": "TD002"
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4fb3299153d2af161315568d"),
  "DonGia": 100000,
  "MaChiTiet": "CT_TD_MA02",
  "MaMonAn": "MonAn002",
  "MaNH": "NH002",
  "MaTD": "TD002"
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4fb3299153d2af161315568e"),
  "DonGia": 100000,
  "MaChiTiet": "CT_TD_MA03",
  "MaMonAn": "MonAn003",
  "MaNH": "NH002",
  "MaTD": "TD002"
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4fb3299153d2af161315568f"),
  "DonGia": 50000,
  "MaChiTiet": "CT_TD_MA04",
  "MaMonAn": "MonAn004",
  "MaNH": "NH002",
  "MaTD": "TD002"
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4fb3299153d2af1613155690"),
  "DonGia": 50000,
  "MaChiTiet": "CT_TD_MA05",
  "MaMonAn": "MonAn005",
  "MaNH": "NH002",
  "MaTD": "TD002"
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4fb3299153d2af1613155691"),
  "DonGia": 50000,
  "MaChiTiet": "CT_TD_MA06",
  "MaMonAn": "MonAn0056",
  "MaNH": "NH002",
  "MaTD": "TD002"
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4fb3299153d2af1613155692"),
  "DonGia": 50000,
  "MaChiTiet": "CT_TD_MA06",
  "MaMonAn": "MonAn006",
  "MaNH": "NH002",
  "MaTD": "TD002"
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4fb3299153d2af1613155693"),
  "DonGia": 50000,
  "MaChiTiet": "CT_TD_MA07",
  "MaMonAn": "MonAn007",
  "MaNH": "NH002",
  "MaTD": "TD002"
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4fb3299153d2af1613155694"),
  "DonGia": 50000,
  "MaChiTiet": "CT_TD_MA08",
  "MaMonAn": "MonAn008",
  "MaNH": "NH002",
  "MaTD": "TD002"
});
db.getCollection("ChiTietThucDon_MonAn").insert({
  "_id": ObjectId("4fb3299153d2af1613155695"),
  "DonGia": 50000,
  "MaChiTiet": "CT_TD_MA09",
  "MaMonAn": "MonAn009",
  "MaNH": "NH002",
  "MaTD": "TD002"
});

/** ChuyenCongTac records **/

/** CongViec records **/
db.getCollection("CongViec").insert({
  "MaCV": "CV01",
  "MaNH": "NH001",
  "TenCV": "Quản Lý nhà hàng",
  "_id": ObjectId("4f9d7c76b0bed39c13000044")
});
db.getCollection("CongViec").insert({
  "MaCV": "CV02",
  "MaNH": "NH001",
  "TenCV": "Quản Lý Kho",
  "_id": ObjectId("4f9d7c8ab0bed39c13000045")
});
db.getCollection("CongViec").insert({
  "MaCV": "CV03",
  "MaNH": "NH001",
  "TenCV": "Tiếp Tân",
  "_id": ObjectId("4f9d7ca3b0bed39c13000046")
});
db.getCollection("CongViec").insert({
  "MaCV": "CV04",
  "MaNH": "NH001",
  "TenCV": "Thu Tiền",
  "_id": ObjectId("4f9d7cc0b0bed39c13000047")
});
db.getCollection("CongViec").insert({
  "_id": ObjectId("4fb3299153d2af1613155696"),
  "MaCV": "CV01",
  "MaNH": "NH002",
  "TenCV": "Quản Lý nhà hàng"
});
db.getCollection("CongViec").insert({
  "_id": ObjectId("4fb3299153d2af1613155697"),
  "MaCV": "CV02",
  "MaNH": "NH002",
  "TenCV": "Quản Lý Kho"
});
db.getCollection("CongViec").insert({
  "_id": ObjectId("4fb3299153d2af1613155698"),
  "MaCV": "CV03",
  "MaNH": "NH002",
  "TenCV": "Tiếp Tân"
});
db.getCollection("CongViec").insert({
  "_id": ObjectId("4fb3299153d2af1613155699"),
  "MaCV": "CV04",
  "MaNH": "NH002",
  "TenCV": "Thu Tiền"
});

/** HinhThucThanhToan records **/
db.getCollection("HinhThucThanhToan").insert({
  "MaHinhThucTT": "HT01",
  "MaNH": "NH001",
  "TenHinhThucTT": "Nhận tiền khi nợ của khách hàng vượt quá giới hạn cho trước",
  "_id": ObjectId("4f9d4f7bb0bed33c10000000")
});
db.getCollection("HinhThucThanhToan").insert({
  "MaHinhThucTT": "HT02",
  "MaNH": "NH001",
  "TenHinhThucTT": "Nhận tiền vào buổi tối ngày hôm đó",
  "_id": ObjectId("4f9d4fd1b0bed33c10000001")
});
db.getCollection("HinhThucThanhToan").insert({
  "MaHinhThucTT": "HT03",
  "MaNH": "NH001",
  "TenHinhThucTT": "Nhận tiền vào cuối tuần",
  "_id": ObjectId("4f9d4ff5b0bed33c10000002")
});
db.getCollection("HinhThucThanhToan").insert({
  "MaHinhThucTT": "HT04",
  "MaNH": "NH001",
  "TenHinhThucTT": "Nhận tiền vào cuối tháng",
  "_id": ObjectId("4f9d500eb0bed33c10000003")
});
db.getCollection("HinhThucThanhToan").insert({
  "_id": ObjectId("4fb3299153d2af161315569a"),
  "MaHinhThucTT": "HT01",
  "MaNH": "NH002",
  "TenHinhThucTT": "Nhận tiền khi nợ của khách hàng vượt quá giới hạn cho trước"
});
db.getCollection("HinhThucThanhToan").insert({
  "_id": ObjectId("4fb3299153d2af161315569b"),
  "MaHinhThucTT": "HT02",
  "MaNH": "NH002",
  "TenHinhThucTT": "Nhận tiền vào buổi tối ngày hôm đó"
});
db.getCollection("HinhThucThanhToan").insert({
  "_id": ObjectId("4fb3299153d2af161315569c"),
  "MaHinhThucTT": "HT03",
  "MaNH": "NH002",
  "TenHinhThucTT": "Nhận tiền vào cuối tuần"
});
db.getCollection("HinhThucThanhToan").insert({
  "_id": ObjectId("4fb3299153d2af161315569d"),
  "MaHinhThucTT": "HT04",
  "MaNH": "NH002",
  "TenHinhThucTT": "Nhận tiền vào cuối tháng"
});

/** HoaDon records **/
db.getCollection("HoaDon").insert({
  "MaHD": "HD001",
  "MaNH": "NH001",
  "MaPhieuDatCho": "PD001",
  "NgayLap": "1\/5\/2012",
  "NguoiLap": "NV0003",
  "TinhTrang": 1,
  "TongTien": 1500000,
  "_id": ObjectId("4f9d85e1b0bed39c1300005c")
});
db.getCollection("HoaDon").insert({
  "MaHD": "HD002",
  "MaNH": "NH001",
  "MaPhieuDatCho": "PD002",
  "NgayLap": "1\/5\/2012",
  "NguoiLap": "NV0003",
  "TinhTrang": 0,
  "TongTien": 2000000,
  "_id": ObjectId("4f9d8605b0bed39c1300005d")
});
db.getCollection("HoaDon").insert({
  "MaHD": "HD003",
  "MaNH": "NH001",
  "MaPhieuDatCho": "PD003",
  "NgayLap": "1\/5\/2012",
  "NguoiLap": "NV0003",
  "TinhTrang": 1,
  "TongTien": 2200000,
  "_id": ObjectId("4f9d8617b0bed39c1300005e")
});
db.getCollection("HoaDon").insert({
  "MaHD": "HD004",
  "MaNH": "NH001",
  "MaPhieuDatCho": "PD004",
  "NgayLap": "1\/5\/2012",
  "NguoiLap": "NV0003",
  "TinhTrang": 2,
  "TongTien": 3000000,
  "_id": ObjectId("4f9d8625b0bed39c1300005f")
});
db.getCollection("HoaDon").insert({
  "MaHD": "HD001",
  "MaNH": "NH002",
  "MaPhieuDatCho": "PD001",
  "NgayLap": "1\/5\/2012",
  "NguoiLap": "NV0003",
  "TinhTrang": 1,
  "TongTien": 1500000,
  "_id": ObjectId("4fb3299153d2af161315569e")
});
db.getCollection("HoaDon").insert({
  "MaHD": "HD002",
  "MaNH": "NH002",
  "MaPhieuDatCho": "PD002",
  "NgayLap": "1\/5\/2012",
  "NguoiLap": "NV0003",
  "TinhTrang": 2,
  "TongTien": 2000000,
  "_id": ObjectId("4fb3299153d2af161315569f")
});
db.getCollection("HoaDon").insert({
  "MaHD": "HD003",
  "MaNH": "NH002",
  "MaPhieuDatCho": "PD003",
  "NgayLap": "1\/5\/2012",
  "NguoiLap": "NV0003",
  "TinhTrang": 1,
  "TongTien": 2200000,
  "_id": ObjectId("4fb3299153d2af16131556a0")
});
db.getCollection("HoaDon").insert({
  "MaHD": "HD004",
  "MaNH": "NH002",
  "MaPhieuDatCho": "PD004",
  "NgayLap": "1\/5\/2012",
  "NguoiLap": "NV0003",
  "TinhTrang": 1,
  "TongTien": 3000000,
  "_id": ObjectId("4fb3299153d2af16131556a1")
});

/** HopDong records **/
db.getCollection("HopDong").insert({
  "HinhThucThanhToan": "HT01",
  "LoaiHopDong": 1,
  "MaHopDong": "HDG01",
  "MaNCC": "NCC01",
  "MaNH": "NH001",
  "NgayHetHan": "10\/10\/2012",
  "NgayKyHopDong": "10\/10\/2011",
  "NhanVienPhuTrach": "NV0010",
  "PhuongThucThanhToan": "PT01",
  "_id": ObjectId("4f9d61c2b0bed39c13000019")
});
db.getCollection("HopDong").insert({
  "HinhThucThanhToan": "HT01",
  "LoaiHopDong": 0,
  "MaHopDong": "HDG02",
  "MaNCC": "NCC02",
  "MaNH": "NH001",
  "NgayHetHan": "1\/6\/2012",
  "NgayKyHopDong": "1\/1\/2012",
  "NhanVienPhuTrach": "NV0010",
  "PhuongThucThanhToan": "PT01",
  "_id": ObjectId("4f9d623db0bed39c1300001a")
});
db.getCollection("HopDong").insert({
  "HinhThucThanhToan": "HT01",
  "LoaiHopDong": 1,
  "MaHopDong": "HDG03",
  "MaNCC": "NCC03",
  "MaNH": "NH001",
  "NgayHetHan": "1\/1\/2013",
  "NgayKyHopDong": "1\/1\/2012",
  "NhanVienPhuTrach": "NV0010",
  "PhuongThucThanhToan": "PT01",
  "_id": ObjectId("4f9d625bb0bed39c1300001b")
});
db.getCollection("HopDong").insert({
  "HinhThucThanhToan": "HT01",
  "LoaiHopDong": 1,
  "MaHopDong": "HDG04",
  "MaNCC": "NCC04",
  "MaNH": "NH001",
  "NgayHetHan": "1\/10\/2013",
  "NgayKyHopDong": "1\/10\/2012",
  "NhanVienPhuTrach": "NV0010",
  "PhuongThucThanhToan": "PT01",
  "_id": ObjectId("4f9d6281b0bed39c1300001c")
});
db.getCollection("HopDong").insert({
  "_id": ObjectId("4fb3299153d2af16131556a2"),
  "HinhThucThanhToan": "HT01",
  "LoaiHopDong": 1,
  "MaHopDong": "HDG01",
  "MaNCC": "NCC01",
  "MaNH": "NH002",
  "NgayHetHan": "10\/10\/2012",
  "NgayKyHopDong": "10\/10\/2011",
  "NhanVienPhuTrach": "NV0010",
  "PhuongThucThanhToan": "PT01"
});
db.getCollection("HopDong").insert({
  "_id": ObjectId("4fb3299153d2af16131556a3"),
  "HinhThucThanhToan": "HT01",
  "LoaiHopDong": 0,
  "MaHopDong": "HDG02",
  "MaNCC": "NCC02",
  "MaNH": "NH002",
  "NgayHetHan": "1\/6\/2012",
  "NgayKyHopDong": "1\/1\/2012",
  "NhanVienPhuTrach": "NV0010",
  "PhuongThucThanhToan": "PT01"
});
db.getCollection("HopDong").insert({
  "_id": ObjectId("4fb3299153d2af16131556a4"),
  "HinhThucThanhToan": "HT01",
  "LoaiHopDong": 1,
  "MaHopDong": "HDG03",
  "MaNCC": "NCC03",
  "MaNH": "NH002",
  "NgayHetHan": "1\/1\/2013",
  "NgayKyHopDong": "1\/1\/2012",
  "NhanVienPhuTrach": "NV0010",
  "PhuongThucThanhToan": "PT01"
});
db.getCollection("HopDong").insert({
  "_id": ObjectId("4fb3299153d2af16131556a5"),
  "HinhThucThanhToan": "HT01",
  "LoaiHopDong": 1,
  "MaHopDong": "HDG04",
  "MaNCC": "NCC04",
  "MaNH": "NH002",
  "NgayHetHan": "1\/10\/2013",
  "NgayKyHopDong": "1\/10\/2012",
  "NhanVienPhuTrach": "NV0010",
  "PhuongThucThanhToan": "PT01"
});

/** KhuVuc records **/
db.getCollection("KhuVuc").insert({
  "MaKV": "KV01",
  "MaNH": "NH001",
  "MoTa": "Khu vực trang trọng, được trang trí theo kiến trúc cổ điển",
  "TenKV": "Khu Vực 1",
  "_id": ObjectId("4f9d7f52b0bed39c1300004e")
});
db.getCollection("KhuVuc").insert({
  "MaKV": "KV02",
  "MaNH": "NH001",
  "MoTa": "Khu vực trang trọng, được trang trí theo kiến trúc gần gũi với thiên nhiên",
  "TenKV": "Khu Vực 2",
  "_id": ObjectId("4f9d7fa8b0bed39c1300004f")
});
db.getCollection("KhuVuc").insert({
  "MaKV": "KV03",
  "MaNH": "NH001",
  "MoTa": "Khu vực dành cho khách hàng bình dân",
  "TenKV": "Khu Vực 3",
  "_id": ObjectId("4f9d7fcab0bed39c13000050")
});
db.getCollection("KhuVuc").insert({
  "_id": ObjectId("4fb3299153d2af16131556a6"),
  "MaKV": "KV01",
  "MaNH": "NH002",
  "MoTa": "Khu vực trang trọng, được trang trí theo kiến trúc cổ điển",
  "TenKV": "Khu Vực 1"
});
db.getCollection("KhuVuc").insert({
  "_id": ObjectId("4fb3299153d2af16131556a7"),
  "MaKV": "KV02",
  "MaNH": "NH002",
  "MoTa": "Khu vực trang trọng, được trang trí theo kiến trúc gần gũi với thiên nhiên",
  "TenKV": "Khu Vực 2"
});
db.getCollection("KhuVuc").insert({
  "_id": ObjectId("4fb3299153d2af16131556a8"),
  "MaKV": "KV03",
  "MaNH": "NH002",
  "MoTa": "Khu vực dành cho khách hàng bình dân",
  "TenKV": "Khu Vực 3"
});

/** LichCongViec records **/

/** LoaiMonAn records **/
db.getCollection("LoaiMonAn").insert({
  "_id": ObjectId("4f9d9175b0bed39c1300007f"),
  "LoaiMon": "L001",
  "TenLoai": "Món Tráng Miệng"
});
db.getCollection("LoaiMonAn").insert({
  "_id": ObjectId("4f9d9187b0bed39c13000080"),
  "LoaiMon": "L002",
  "TenLoai": "Món Bún"
});
db.getCollection("LoaiMonAn").insert({
  "_id": ObjectId("4f9d919eb0bed39c13000081"),
  "LoaiMon": "L003",
  "TenLoai": "Món Cơm Và Bún"
});
db.getCollection("LoaiMonAn").insert({
  "_id": ObjectId("4f9d91afb0bed39c13000082"),
  "LoaiMon": "L004",
  "TenLoai": "Món Gỏi Cuốn"
});
db.getCollection("LoaiMonAn").insert({
  "_id": ObjectId("4f9d91cdb0bed39c13000083"),
  "LoaiMon": "L005",
  "TenLoai": "Món Bánh"
});
db.getCollection("LoaiMonAn").insert({
  "_id": ObjectId("4f9d93d5b0bed39c13000084"),
  "LoaiMon": "L006",
  "TenLoai": "Hải Sản"
});
db.getCollection("LoaiMonAn").insert({
  "_id": ObjectId("4f9d9805b0bed3b014000034"),
  "LoaiMon": "L007",
  "TenLoai": "Thịt Gia Cầm"
});

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
  "_id": ObjectId("4f9d89fab0bed39c13000062"),
  "LoaiMonAn": "L006",
  "MaMonAn": "MA001",
  "TenMonAn": "Lương sào xả ớt"
});
db.getCollection("MonAn").insert({
  "_id": ObjectId("4f9d8a1eb0bed39c13000063"),
  "LoaiMonAn": "L007",
  "MaMonAn": "MA002",
  "TenMonAn": "Lẩu gà nấm"
});
db.getCollection("MonAn").insert({
  "_id": ObjectId("4f9d8a33b0bed39c13000064"),
  "LoaiMonAn": "L007",
  "MaMonAn": "MA003",
  "TenMonAn": "Lẩu Gà Lá Giang"
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
  "_id": ObjectId("4f9d8ac7b0bed39c13000068"),
  "LoaiMonAn": "L005",
  "MaMonAn": "MA006",
  "TenMonAn": "Bánh bèo tôm tươi"
});
db.getCollection("MonAn").insert({
  "_id": ObjectId("4f9d8b14b0bed39c1300006a"),
  "LoaiMonAn": "L005",
  "MaMonAn": "MA007",
  "TenMonAn": "Bánh Khóai"
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

/** NguyenLieu_MonAn records **/

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

/** NhaHang records **/
db.getCollection("NhaHang").insert({
  "_id": ObjectId("4f9d9b87b0bed39c1300008f"),
  "MaNH": "NH001",
  "TenNH": "Nhà Hàng Song Hương",
  "DiaChi": "124 Nguyễn Thị Minh Khai,Quận 1 TP Hồ Chí Minh",
  "SDT": "0838909090",
  "Email": "songhuong@rec.vn"
});
db.getCollection("NhaHang").insert({
  "_id": ObjectId("4f9d9bbab0bed39c13000090"),
  "MaNH": "NH002",
  "TenNH": "Nhà Hàng  Hương Biển",
  "DiaChi": "124 Cách Mạng Tháng Tám,Quận 3 TP Hồ Chí Minh",
  "SDT": "0838909080",
  "Email": "huongbien@rec.vn"
});

/** NhanVien records **/
db.getCollection("NhanVien").insert({
  "CMND": "215154564",
  "DiaChi": "163 Thành Thái - F14 -Q10",
  "Email": "nva@gmail.com",
  "LoaiNV": "LVN001",
  "Luong": 10000000,
  "MaNH": "NH001",
  "MaNV": "NV0001",
  "Password" : "123",
  "SDT": "016667236574",
  "TenNV": "Nguyen Van A",
  "Thuong": 2000000,
  "_id": ObjectId("4f9d79adb0bed39c1300003e")
});
db.getCollection("NhanVien").insert({
  "CMND": "215154564",
  "DiaChi": "163 Điện Biên Phủ - F1 -Q10",
  "Email": "ttngan@gmail.com",
  "LoaiNV": "LVN002",
  "Luong": 7000000,
  "MaNH": "NH001",
  "MaNV": "NV0002",
  "Password" : "123",
  "SDT": "016667236574",
  "TenNV": "Trần Thị Ngân",
  "Thuong": 1000000,
  "_id": ObjectId("4f9d79f6b0bed39c1300003f")
});
db.getCollection("NhanVien").insert({
  "CMND": "215154523",
  "DiaChi": "163 Lý Thái Tổ - F14 -Q10",
  "Email": "ttlam@gmail.com",
  "LoaiNV": "LVN003",
  "Luong": 8000000,
  "MaNH": "NH001",
  "MaNV": "NV0003",
  "Password" : "123",
  "SDT": "016647236574",
  "TenNV": "Trần Thị Lam",
  "Thuong": 1000000,
  "_id": ObjectId("4f9d7a59b0bed39c13000040")
});
db.getCollection("NhanVien").insert({
  "CMND": "211154564",
  "DiaChi": "163 An Duong Vuong - F10 -Q10",
  "Email": "nvanh@gmail.com",
  "LoaiNV": "LVN004",
  "Luong": 15000000,
  "MaNH": "NH001",
  "MaNV": "NV0004",
  "Password" : "123",
  "SDT": "012667236574",
  "TenNV": "Nguyen Van Anh",
  "Thuong": 2000000,
  "_id": ObjectId("4f9d7a8fb0bed39c13000041")
});
db.getCollection("NhanVien").insert({
  "CMND": "211174564",
  "DiaChi": "163 Lý Thường Kiệt - F15 -Q10",
  "Email": "nhanh@gmail.com",
  "LoaiNV": "LVN005",
  "Luong": 16000000,
  "MaNH": "NH001",
  "MaNV": "NV0005",
  "Password" : "123",
  "SDT": "016967236574",
  "TenNV": "Nguyễn Hòang Anh",
  "Thuong": 3000000,
  "_id": ObjectId("4f9d7adeb0bed39c13000042")
});
db.getCollection("NhanVien").insert({
  "CMND": "21217564",
  "DiaChi": "122 Lý Thường Kiệt - F15 -Q10",
  "Email": "nvminh@gmail.com",
  "LoaiNV": "LVN005",
  "Luong": 14000000,
  "MaNH": "NH001",
  "MaNV": "NV0010",
  "Password" : "123",
  "SDT": "016567236574",
  "TenNV": "Nguyễn Văn Minh",
  "Thuong": 4000000,
  "_id": ObjectId("4f9d7b3cb0bed39c13000043")
});
db.getCollection("NhanVien").insert({
  "_id": ObjectId("4fb3299153d2af16131556a9"),
  "CMND": "215154564",
  "DiaChi": "163 Thành Thái - F14 -Q10",
  "Email": "nva@gmail.com",
  "LoaiNV": "LVN001",
  "Luong": 10000000,
  "MaNH": "NH002",
  "MaNV": "NV0001",
  "Password" : "123",
  "SDT": "016667236574",
  "TenNV": "Nguyen Van A",
  "Thuong": 2000000
});
db.getCollection("NhanVien").insert({
  "_id": ObjectId("4fb3299153d2af16131556aa"),
  "CMND": "215154564",
  "DiaChi": "163 Điện Biên Phủ - F1 -Q10",
  "Email": "ttngan@gmail.com",
  "LoaiNV": "LVN002",
  "Luong": 7000000,
  "MaNH": "NH002",
  "MaNV": "NV0002",
  "Password" : "123",
  "SDT": "016667236574",
  "TenNV": "Trần Thị Ngân",
  "Thuong": 1000000
});
db.getCollection("NhanVien").insert({
  "_id": ObjectId("4fb3299153d2af16131556ab"),
  "CMND": "215154523",
  "DiaChi": "163 Lý Thái Tổ - F14 -Q10",
  "Email": "ttlam@gmail.com",
  "LoaiNV": "LVN003",
  "Luong": 8000000,
  "MaNH": "NH002",
  "MaNV": "NV0003",
  "Password" : "123",
  "SDT": "016647236574",
  "TenNV": "Trần Thị Lam",
  "Thuong": 1000000
});
db.getCollection("NhanVien").insert({
  "_id": ObjectId("4fb3299153d2af16131556ac"),
  "CMND": "211154564",
  "DiaChi": "163 An Duong Vuong - F10 -Q10",
  "Email": "nvanh@gmail.com",
  "LoaiNV": "LVN004",
  "Luong": 15000000,
  "MaNH": "NH002",
  "MaNV": "NV0004",
  "Password" : "123",
  "SDT": "012667236574",
  "TenNV": "Nguyen Van Anh",
  "Thuong": 2000000
});
db.getCollection("NhanVien").insert({
  "_id": ObjectId("4fb3299153d2af16131556ad"),
  "CMND": "211174564",
  "DiaChi": "163 Lý Thường Kiệt - F15 -Q10",
  "Email": "nhanh@gmail.com",
  "LoaiNV": "LVN005",
  "Luong": 16000000,
  "MaNH": "NH002",
  "MaNV": "NV0005",
  "Password" : "123",
  "SDT": "016967236574",
  "TenNV": "Nguyễn Hòang Anh",
  "Thuong": 3000000
});
db.getCollection("NhanVien").insert({
  "_id": ObjectId("4fb3299153d2af16131556ae"),
  "CMND": "21217564",
  "DiaChi": "122 Lý Thường Kiệt - F15 -Q10",
  "Email": "nvminh@gmail.com",
  "LoaiNV": "LVN005",
  "Luong": 14000000,
  "MaNH": "NH002",
  "MaNV": "NV0010",
  "Password" : "123",
  "SDT": "016567236574",
  "TenNV": "Nguyễn Văn Minh",
  "Thuong": 4000000
});

/** PhanCong records **/
db.getCollection("PhanCong").insert({
  "MaCV": "CV01",
  "MaNH": "NH001",
  "MaNV": "NV0005",
  "ThoiGianBD": "8h",
  "ThoiGianKetThuc": "15h",
  "_id": ObjectId("4f9d7d6eb0bed39c13000048")
});
db.getCollection("PhanCong").insert({
  "MaCV": "CV01",
  "MaNH": "NH001",
  "MaNV": "NV0010",
  "ThoiGianBD": "15h",
  "ThoiGianKetThuc": "22h",
  "_id": ObjectId("4f9d7ddcb0bed39c1300004a")
});
db.getCollection("PhanCong").insert({
  "MaCV": "CV02",
  "MaNH": "NH001",
  "MaNV": "NV0001",
  "ThoiGianBD": "8h",
  "ThoiGianKetThuc": "18h",
  "_id": ObjectId("4f9d7e28b0bed39c1300004b")
});
db.getCollection("PhanCong").insert({
  "MaCV": "CV03",
  "MaNH": "NH001",
  "MaNV": "NV0003",
  "ThoiGianBD": "8h",
  "ThoiGianKetThuc": "15h",
  "_id": ObjectId("4f9d7e65b0bed39c1300004c")
});
db.getCollection("PhanCong").insert({
  "MaCV": "CV04",
  "MaNH": "NH001",
  "MaNV": "NV0004",
  "ThoiGianBD": "8h",
  "ThoiGianKetThuc": "15h",
  "_id": ObjectId("4f9d7e76b0bed39c1300004d")
});
db.getCollection("PhanCong").insert({
  "_id": ObjectId("4fb3299153d2af16131556af"),
  "MaCV": "CV01",
  "MaNH": "NH002",
  "MaNV": "NV0005",
  "ThoiGianBD": "8h",
  "ThoiGianKetThuc": "15h"
});
db.getCollection("PhanCong").insert({
  "_id": ObjectId("4fb3299153d2af16131556b0"),
  "MaCV": "CV01",
  "MaNH": "NH002",
  "MaNV": "NV0010",
  "ThoiGianBD": "15h",
  "ThoiGianKetThuc": "22h"
});
db.getCollection("PhanCong").insert({
  "_id": ObjectId("4fb3299153d2af16131556b1"),
  "MaCV": "CV02",
  "MaNH": "NH002",
  "MaNV": "NV0001",
  "ThoiGianBD": "8h",
  "ThoiGianKetThuc": "18h"
});
db.getCollection("PhanCong").insert({
  "_id": ObjectId("4fb3299153d2af16131556b2"),
  "MaCV": "CV03",
  "MaNH": "NH002",
  "MaNV": "NV0003",
  "ThoiGianBD": "8h",
  "ThoiGianKetThuc": "15h"
});
db.getCollection("PhanCong").insert({
  "_id": ObjectId("4fb3299153d2af16131556b3"),
  "MaCV": "CV04",
  "MaNH": "NH002",
  "MaNV": "NV0004",
  "ThoiGianBD": "8h",
  "ThoiGianKetThuc": "15h"
});

/** PhieuDatCho records **/
db.getCollection("PhieuDatCho").insert({
  "CMND": "211453879",
  "HoTenKH": "Trần Văn Dũng",
  "MaNH": "NH001",
  "MaPhieu": "PD001",
  "NgayLap": "1\/5\/2012",
  "NguoiTiepNhan": "NV0003",
  "SDT": "0978654312",
  "_id": ObjectId("4f9d815cb0bed39c13000055")
});
db.getCollection("PhieuDatCho").insert({
  "CMND": "211453879",
  "HoTenKH": "Nguyễn Hải Đăng",
  "MaNH": "NH001",
  "MaPhieu": "PD002",
  "NgayLap": "1\/5\/2012",
  "NguoiTiepNhan": "NV0003",
  "SDT": "0978654312",
  "_id": ObjectId("4f9d81f2b0bed39c13000056")
});
db.getCollection("PhieuDatCho").insert({
  "CMND": "214453879",
  "HoTenKH": "Trần Thị Hoa",
  "MaNH": "NH001",
  "MaPhieu": "PD004",
  "NgayLap": "1\/5\/2012",
  "NguoiTiepNhan": "NV0003",
  "SDT": "0978954312",
  "_id": ObjectId("4f9d839cb0bed39c13000057")
});
db.getCollection("PhieuDatCho").insert({
  "_id": ObjectId("4fb3299153d2af16131556b4"),
  "CMND": "211453879",
  "HoTenKH": "Trần Văn Dũng",
  "MaNH": "NH002",
  "MaPhieu": "PD001",
  "NgayLap": "1\/5\/2012",
  "NguoiTiepNhan": "NV0003",
  "SDT": "0978654312"
});
db.getCollection("PhieuDatCho").insert({
  "_id": ObjectId("4fb3299153d2af16131556b5"),
  "CMND": "211453879",
  "HoTenKH": "Nguyễn Hải Đăng",
  "MaNH": "NH002",
  "MaPhieu": "PD002",
  "NgayLap": "1\/5\/2012",
  "NguoiTiepNhan": "NV0003",
  "SDT": "0978654312"
});
db.getCollection("PhieuDatCho").insert({
  "_id": ObjectId("4fb3299153d2af16131556b6"),
  "CMND": "214453879",
  "HoTenKH": "Trần Thị Hoa",
  "MaNH": "NH002",
  "MaPhieu": "PD004",
  "NgayLap": "1\/5\/2012",
  "NguoiTiepNhan": "NV0003",
  "SDT": "0978954312"
});

/** PhieuNhapHang records **/
db.getCollection("PhieuNhapHang").insert({
  "DonGia": 50000,
  "MaCTHD": "CT001",
  "MaNH": "NH001",
  "MaNV": "NV0001",
  "NgayNhap": "1\/5\/2012",
  "SoLuong": 100,
  "_id": ObjectId("4f9d7240b0bed39c13000033")
});
db.getCollection("PhieuNhapHang").insert({
  "DonGia": 50000,
  "MaCTHD": "CT002",
  "MaNH": "NH001",
  "MaNV": "NV0001",
  "NgayNhap": "1\/5\/2012",
  "SoLuong": 100,
  "_id": ObjectId("4f9d7258b0bed39c13000034")
});
db.getCollection("PhieuNhapHang").insert({
  "DonGia": 5000,
  "MaCTHD": "CT003",
  "MaNH": "NH001",
  "MaNV": "NV0001",
  "NgayNhap": "1\/5\/2012",
  "SoLuong": 2000,
  "_id": ObjectId("4f9d7267b0bed39c13000035")
});
db.getCollection("PhieuNhapHang").insert({
  "DonGia": 5000,
  "MaCTHD": "CT004",
  "MaNH": "NH001",
  "MaNV": "NV0001",
  "NgayNhap": "1\/5\/2012",
  "SoLuong": 100,
  "_id": ObjectId("4f9d72abb0bed39c13000036")
});
db.getCollection("PhieuNhapHang").insert({
  "_id": ObjectId("4fb3299153d2af16131556b7"),
  "DonGia": 50000,
  "MaCTHD": "CT001",
  "MaNH": "NH002",
  "MaNV": "NV0001",
  "NgayNhap": "1\/5\/2012",
  "SoLuong": 100
});
db.getCollection("PhieuNhapHang").insert({
  "_id": ObjectId("4fb3299153d2af16131556b8"),
  "DonGia": 50000,
  "MaCTHD": "CT002",
  "MaNH": "NH002",
  "MaNV": "NV0001",
  "NgayNhap": "1\/5\/2012",
  "SoLuong": 100
});
db.getCollection("PhieuNhapHang").insert({
  "_id": ObjectId("4fb3299153d2af16131556b9"),
  "DonGia": 5000,
  "MaCTHD": "CT003",
  "MaNH": "NH002",
  "MaNV": "NV0001",
  "NgayNhap": "1\/5\/2012",
  "SoLuong": 2000
});
db.getCollection("PhieuNhapHang").insert({
  "_id": ObjectId("4fb3299153d2af16131556ba"),
  "DonGia": 5000,
  "MaCTHD": "CT004",
  "MaNH": "NH002",
  "MaNV": "NV0001",
  "NgayNhap": "1\/5\/2012",
  "SoLuong": 100
});

/** PhuongThucThanhToan records **/
db.getCollection("PhuongThucThanhToan").insert({
  "MaNH": "NH001",
  "MaPhuongThucTT": "PT01",
  "TenPhuongThuc": "Tiền Mặt",
  "_id": ObjectId("4f9d50e5b0bed33c10000004")
});
db.getCollection("PhuongThucThanhToan").insert({
  "MaNH": "NH001",
  "MaPhuongThucTT": "PT02",
  "TenPhuongThuc": "Chuyển Khoản",
  "_id": ObjectId("4f9d50eeb0bed33c10000005")
});
db.getCollection("PhuongThucThanhToan").insert({
  "_id": ObjectId("4fb3299153d2af16131556bb"),
  "MaNH": "NH002",
  "MaPhuongThucTT": "PT01",
  "TenPhuongThuc": "Tiền Mặt"
});
db.getCollection("PhuongThucThanhToan").insert({
  "_id": ObjectId("4fb3299153d2af16131556bc"),
  "MaNH": "NH002",
  "MaPhuongThucTT": "PT02",
  "TenPhuongThuc": "Chuyển Khoản"
});

/** ThucDon records **/
db.getCollection("ThucDon").insert({
  "MaNH": "NH001",
  "MaTD": "TD001",
  "NgayLap": "2\/5\/2010",
  "TenThuDon": "Thực Đơn Chay",
  "_id": ObjectId("4f9d86afb0bed39c13000060")
});
db.getCollection("ThucDon").insert({
  "MaNH": "NH001",
  "MaTD": "TD002",
  "NgayLap": "2\/5\/2010",
  "TenThuDon": "Thực Đơn Mặn",
  "_id": ObjectId("4f9d871eb0bed39c13000061")
});
db.getCollection("ThucDon").insert({
  "_id": ObjectId("4fb3299153d2af16131556bd"),
  "MaNH": "NH002",
  "MaTD": "TD001",
  "NgayLap": "2\/5\/2010",
  "TenThuDon": "Thực Đơn Chay"
});
db.getCollection("ThucDon").insert({
  "_id": ObjectId("4fb3299153d2af16131556be"),
  "MaNH": "NH002",
  "MaTD": "TD002",
  "NgayLap": "2\/5\/2010",
  "TenThuDon": "Thực Đơn Mặn"
});

/** system.indexes records **/
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.BanAn",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.CaLamViec",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.ChiTietDatCho",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.ChiTietHoaDon",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.ChiTietHopDong",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.ChiTietKhoHang",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.ChiTietThucDon_MonAn",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.CongViec",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.HinhThucThanhToan",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.HoaDon",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.HopDong",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.KhuVuc",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.LichCongViec",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.LoaiNguyenLieu",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.LoaiNhanVien",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.MonAn",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.NguyenLieu",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.NhaCungCap",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.NhanVien",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.PhanCong",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.PhieuDatCho",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.PhieuNhapHang",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.PhuongThucThanhToan",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.ThucDon",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.ChuyenCongTac",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.LoaiMonAn",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.NguyenLieu_MonAn",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": 1,
  "key": {
    "_id": 1
  },
  "ns": "restaurant_system_branch1db.NhaHang",
  "name": "_id_"
});
