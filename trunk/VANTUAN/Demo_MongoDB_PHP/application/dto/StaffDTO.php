<?php
class StaffDTO{
	public $_maNV;
	public $_hoTen;
	public $_ngaySinh;
	public $_diaChi;
	public $_phai;
	public $_luong;
	public $_phong;
	
	public function __construct($maNV, $hoTen, $ngaySinh, $diaChi, $phai, $luong, $phong){
		$this->_maNV = $maNV;
		$this->_hoTen = $hoTen;
		$this->_ngaySinh = $ngaySinh;
		$this->_diaChi = $diaChi;
		$this->_phai = $phai;
		$this->_luong = $luong;
		$this->_phong = $phong;
	}
	
	public function convert_to_array(){
		return array(
				"MaNV" => $this->_maNV,
				"HoTen" => $this->_hoTen,
				"NgaySinh" => $this->_ngaySinh,
				"DiaChi" => $this->_diaChi,
				"Phai" => $this->_phai,
				"Luong" => $this->_luong,
				"Phong" => $this->_phong
				);		
	}
}
?>