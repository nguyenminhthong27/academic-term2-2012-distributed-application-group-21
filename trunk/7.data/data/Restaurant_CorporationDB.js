
/** ChuyenCongTac indexes **/
db.getCollection("ChuyenCongTac").ensureIndex({
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

/** ChuyenCongTac records **/

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
  "_id": ObjectId("4f9d9becb0bed3b014000039"),
  "MaLoaiNL": "NL07",
  "TenLoaiNL": "Trái Cây"
});
db.getCollection("LoaiNguyenLieu").insert({
  "_id": ObjectId("4f9d9c0eb0bed39c13000091"),
  "MaLoaiNL": "NL06",
  "TenLoaiNL": "Rau Quả"
});
db.getCollection("LoaiNguyenLieu").insert({
  "_id": ObjectId("4f9d9c29b0bed39c13000092"),
  "MaLoaiNL": "NL05",
  "TenLoaiNL": "Lương Thực"
});
db.getCollection("LoaiNguyenLieu").insert({
  "_id": ObjectId("4f9d9c45b0bed39c13000093"),
  "MaLoaiNL": "NL03",
  "TenLoaiNL": "Thịt Gia Súc"
});
db.getCollection("LoaiNguyenLieu").insert({
  "_id": ObjectId("4f9d9c62b0bed3b01400003a"),
  "MaLoaiNL": "NL02",
  "TenLoaiNL": "Thịt Gia Cầm"
});
db.getCollection("LoaiNguyenLieu").insert({
  "_id": ObjectId("4f9d9c79b0bed3b01400003b"),
  "MaLoaiNL": "NL01",
  "TenLoaiNL": "Thủy Hải Sản"
});

/** LoaiNhanVien records **/
db.getCollection("LoaiNhanVien").insert({
  "_id": ObjectId("4f9d9a21b0bed39c1300008c"),
  "MaLoaiNV": "LNV001",
  "TenLoaiNV": "Quản Lý Kho"
});
db.getCollection("LoaiNhanVien").insert({
  "_id": ObjectId("4f9d9a41b0bed39c1300008d"),
  "MaLoaiNV": "LNV002",
  "TenLoaiNV": "Nhân Viên Tiếp Tân"
});
db.getCollection("LoaiNhanVien").insert({
  "_id": ObjectId("4f9d9a5db0bed3b014000037"),
  "MaLoaiNV": "LNV003",
  "TenLoaiNV": "Nhân Viên Thu Ngân"
});
db.getCollection("LoaiNhanVien").insert({
  "_id": ObjectId("4f9d9a78b0bed3b014000038"),
  "MaLoaiNV": "LNV004",
  "TenLoaiNV": "Quản Lý Nhà Hàng"
});
db.getCollection("LoaiNhanVien").insert({
  "_id": ObjectId("4f9d9aa1b0bed39c1300008e"),
  "MaLoaiNV": "LNV005",
  "TenLoaiNV": "Quản Lý Công Ty"
});

/** MonAn records **/
db.getCollection("MonAn").insert({
  "LoaiMonAn": "L006",
  "MaMonAn": "MA001",
  "TenMonAn": "Lươn xào sả ớt",
  "_id": ObjectId("4f9d93e7b0bed39c13000085")
});
db.getCollection("MonAn").insert({
  "_id": ObjectId("4f9d9661b0bed39c13000086"),
  "MaMonAn": "MA009",
  "TenMonAn": "Bún Bò Bắp",
  "LoaiMonAn": "L002"
});
db.getCollection("MonAn").insert({
  "_id": ObjectId("4f9d968cb0bed39c13000087"),
  "MaMonAn": "MA008",
  "TenMonAn": "Bún Giò nạc",
  "LoaiMonAn": "L002"
});
db.getCollection("MonAn").insert({
  "_id": ObjectId("4f9d96b7b0bed39c13000088"),
  "MaMonAn": "MA007",
  "TenMonAn": "Bánh Khóai",
  "LoaiMonAn": "L005"
});
db.getCollection("MonAn").insert({
  "_id": ObjectId("4f9d96ddb0bed3b014000031"),
  "MaMonAn": "MA006",
  "TenMonAn": "Bánh bèo tôm tươi",
  "LoaiMonAn": "L005"
});
db.getCollection("MonAn").insert({
  "_id": ObjectId("4f9d974fb0bed3b014000032"),
  "LoaiMonAn": "L005",
  "MaMonAn": "MA007",
  "TenMonAn": "Bánh Khóai"
});
db.getCollection("MonAn").insert({
  "_id": ObjectId("4f9d97cab0bed3b014000033"),
  "MaMonAn": "MA002",
  "TenMonAn": "Lẩu gà nấm",
  "LoaiMonAn": "L007"
});

/** NguyenLieu records **/
db.getCollection("NguyenLieu").insert({
  "_id": ObjectId("4f9d9d0fb0bed3b01400003c"),
  "MaNL": "NL08",
  "TenNL": "Thanh Long",
  "LoaiNL": "NL07"
});
db.getCollection("NguyenLieu").insert({
  "_id": ObjectId("4f9d9d2fb0bed39c13000094"),
  "MaNL": "NL06",
  "TenNL": "Bột Mì",
  "LoaiNL": "NL05"
});
db.getCollection("NguyenLieu").insert({
  "_id": ObjectId("4f9d9d6bb0bed39c13000095"),
  "MaNL": "NL04",
  "TenNL": "Thịt Lợn",
  "LoaiNL": "NL03"
});
db.getCollection("NguyenLieu").insert({
  "_id": ObjectId("4f9d9d88b0bed3b01400003e"),
  "MaNL": "NL03",
  "TenNL": "Thịt Gà",
  "LoaiNL": "NL02"
});
db.getCollection("NguyenLieu").insert({
  "LoaiNL": "NL01",
  "MaNL": "NL01",
  "TenNL": "Tôm",
  "_id": ObjectId("4f9d9daeb0bed39c13000096")
});
db.getCollection("NguyenLieu").insert({
  "_id": ObjectId("4f9d9e0bb0bed39c13000097"),
  "MaNL": "NL06",
  "TenNL": "Bột Mì",
  "LoaiNL": "NL05"
});
db.getCollection("NguyenLieu").insert({
  "_id": ObjectId("4f9d9e36b0bed3b01400003f"),
  "MaNL": "NL03",
  "TenNL": "Thịt Gà",
  "LoaiNL": "NL02"
});

/** NguyenLieu_MonAn records **/

/** NhaCungCap records **/
db.getCollection("NhaCungCap").insert({
  "_id": ObjectId("4f9d995eb0bed39c13000089"),
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
  "_id": ObjectId("4f9d998bb0bed3b014000036"),
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
  "_id": ObjectId("4f9d99b2b0bed39c1300008a"),
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
  "_id": ObjectId("4f9d99d2b0bed39c1300008b"),
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
  "LoaiNV": "LVN005",
  "MaNH": "NH001",
  "MaNV": "NV0010",
  "PassWord": "123",
  "TenNV": "Nguyễn Văn Minh",
  "_id": ObjectId("4f9d9ee0b0bed39c13000098")
});
db.getCollection("NhanVien").insert({
  "LoaiNV": "LVN002",
  "MaNH": "NH001",
  "MaNV": "NV0002",
  "PassWord": "123",
  "TenNV": "Trần Thị Ngân",
  "_id": ObjectId("4f9da02eb0bed3b014000044")
});
db.getCollection("NhanVien").insert({
  "LoaiNV": "LVN001",
  "MaNH": "NH001",
  "MaNV": "NV0001",
  "PassWord": "123",
  "TenNV": "Nguyen Van A",
  "_id": ObjectId("4f9da06cb0bed39c13000099")
});
db.getCollection("NhanVien").insert({
  "LoaiNV": "LVN003",
  "MaNH": "NH001",
  "MaNV": "NV0003",
  "PassWord": "123",
  "TenNV": "Trần Thị Lam",
  "_id": ObjectId("4f9d9ff8b0bed3b014000043")
});
db.getCollection("NhanVien").insert({
  "LoaiNV": "LVN004",
  "MaNH": "NH001",
  "MaNV": "NV0004",
  "PassWord": "123",
  "TenNV": "Nguyen Van Anh",
  "_id": ObjectId("4f9d9fb1b0bed3b014000042")
});
db.getCollection("NhanVien").insert({
  "LoaiNV": "LVN005",
  "MaNH": "NH001",
  "MaNV": "NV0005",
  "PassWord": "123",
  "TenNV": "Nguyễn Hòang Anh",
  "_id": ObjectId("4f9d9f75b0bed3b014000041")
});
