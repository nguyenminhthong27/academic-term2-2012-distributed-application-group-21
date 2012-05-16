/* BanAn collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.BanAn",
  "key" : {"MaNH" : 1}
});

/* ChiTietDatCho collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.ChiTietDatCho",
  "key" : {"MaNH" : 1}
});

/* ChiTietHoaDon collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.ChiTietHoaDon",
  "key" : {"MaNH" : 1}
});

/* ChiTietHopDong collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.ChiTietHopDong",
  "key" : {"MaNH" : 1}
});

/* ChiTietThucDon_MonAn collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.ChiTietThucDon_MonAn",
  "key" : {"MaNH" : 1}
});

/* CongViec collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.CongViec",
  "key" : {"MaNH" : 1}
});

/* HinhThucThanhToan collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.HinhThucThanhToan",
  "key" : {"MaNH" : 1}
});

/* HoaDon collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.HoaDon",
  "key" : {"MaNH" : 1}
});

/* HopDong collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.HopDong",
  "key" : {"MaNH" : 1}
});

/* KhuVuc collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.KhuVuc",
  "key" : {"MaNH" : 1}
});

/* LichCongViec collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.LichCongViec",
  "key" : {"MaNH" : 1}
});

/* NhanVien collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.NhanVien",
  "key" : {"MaNH" : 1}
});

/* PhanCong collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.PhanCong",
  "key" : {"MaNH" : 1}
});

/* PhieuDatCho collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.PhieuDatCho",
  "key" : {"MaNH" : 1}
});

/* PhieuNhapHang collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.PhieuNhapHang",
  "key" : {"MaNH" : 1}
});

/* PhuongThucThanhToan collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.PhuongThucThanhToan",
  "key" : {"MaNH" : 1}
});

/* ThucDon collection*/
db.runCommand({
  "shardcollection": "Restaurant_system_db.ThucDon",
  "key" : {"MaNH" : 1}
});

