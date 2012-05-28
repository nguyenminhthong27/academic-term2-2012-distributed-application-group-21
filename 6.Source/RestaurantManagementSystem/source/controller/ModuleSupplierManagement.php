<?php
class ModuleSupplierManagement{
	/*
	 * @author thanhtuan
	 * method getAllSupplier: get all supplier of restaurant,
	 * @param no
	 * return if a string which can parse json 
	 * controller reciev from DAO : array has format arr[0] = MaNCC,arr[1] = TenNCC,arr[2] = DinhMuc
	 * arr[3] = CongNo,arr[4] = DiaChi,arr[5] = SDT,arr[6] = Email,arr[7] = TinhTrang
	 */
	public function getAllSupplier(){
		try{
			$n = 0;
			$strjson = "{rows:[";
			$dao = new SupplierManagementDAO();
			$arr = $dao->getAllSupplierDAO();
			if($arr != null){
				$n = count($arr);
		
			}
			if($n > 0){
			for($i = 0;$i < ($n -1); $i++){
		
		
				$maNCC = $arr[$i][0];
				$tenNCC = $arr[$i][1];
				$dinhMuc = $arr[$i][2];
				$congNo = $arr[$i][3];
				$diaChi = $arr[$i][4];
				$sdt = $arr[$i][5];
				$email = $arr[$i][6];
				$tinhTrang = $arr[$i][7];
				$strjson = $strjson."{id:$maNCC, data:['','$maNCC','$tenNCC','$dinhMuc','$congNo','$diaChi','$sdt','$email','$tinhTrang']},";
			}
			$maNCC = $arr[$i][0];
			$tenNCC = $arr[$i][1];
			$dinhMuc = $arr[$i][2];
			$congNo = $arr[$i][3];
			$diaChi = $arr[$i][4];
			$sdt = $arr[$i][5];
			$email = $arr[$i][6];
			$tinhTrang = $arr[$i][7];
			$strjson = $strjson."{id:$maNCC, data:['','$maNCC','$tenNCC','$dinhMuc','$congNo','$diaChi','$sdt','$email','$tinhTrang']}";
			}
		
			$strjson = $strjson." ]}";
		
		
			return $strjson;
		}
		catch (Exception $e) {
			echo "Not Connect to database! ";
		}
	}
	/*
	 * @author thanhtuan
	 * method addSupplier :add a new supplier into database
	 * @param $tenNCC,$diaChi,$sdt,$email,$dinhMuc,$soTK,$ngayLap,$tenNganHang,$tenLoaiThe
	 * return true if succed else return false
	 */
	public function addSupplier($tenNCC,$diaChi,$sdt,$email,$dinhMuc,$soTK,$ngayLap,$tenNganHang,$tenLoaiThe){
		try{
		$dao = new SupplierManagementDAO();
		return $dao->addSupplierDAO($tenNCC,$diaChi,$sdt,$email,$dinhMuc,$soTK,$ngayLap,$tenNganHang,$tenLoaiThe);
		}
		catch (Exception $e) {
			echo "Not Connect to database! ";
		}
	}
	/*
	 * @author thanhtuan
	 * method getSupplier get information a supplier 
	 * (TenNCC,DiaChi,SDT,Email,DinhMuc,TinhTrang,SoTaiKhoan,NgayLap,NganHang,TenLoaiThe)
	 * @param $id
	 * return string html
	 */
	public function getSupplier($id){
		try{
		$dao = new SupplierManagementDAO();
		$data = "";
		$arr = $dao->getSupplier($id);
		if($arr != null)
		{
			$tenNCC = isset($arr["TenNCC"]) ? $arr["TenNCC"] : "";
			$diaChi    = isset($arr["DiaChi"]) ? $arr["DiaChi"] : "";
			$sdt   = isset($arr["SDT"]) ? $arr["SDT"] : "";
			$email  = isset($arr["Email"]) ? $arr["Email"] : "";
			$dinhMuc   = isset($arr["DinhMuc"]) ? $arr["DinhMuc"] : "";
			$tinhTrang  = isset($arr["TinhTrang"]) ? $arr["TinhTrang"] : "";
			$soTaiKhoan = isset($arr["SoTaiKhoan"]) ? $arr["SoTaiKhoan"] : "";
			$ngayLap    = isset($arr["NgayLap"]) ? $arr["NgayLap"] : "";
			$nganHang   = isset($arr["NganHang"]) ? $arr["NganHang"] : "";
			$tenLoaiThe  = isset($arr["tenLoaiThe"]) ? $arr["tenLoaiThe"] : "";
		    $data = $data."<div id='editSupplier-SliderHolder'>
								<ul>
									<li>
										<!-- add new supplier info -->
											<div class='edit-supplier-info'>
												<p>Thay đổi thông tin và nhấp Lưu</p>
												<table>
													<tr>
														<td>Tên nhà cung cấp</td>
														<td><input type='text' title='Tên nhà cung cấp' value='$tenNCC'></input></td>
													</tr>
													<tr>
														<td>Địa chỉ</td>
														<td><input type='text' value= '$diaChi'></input></td>
													</tr>
													<tr>
														<td>Số điện thoại</td>
														<td><input type='text' value = '$sdt'></input></td>
													</tr>
													<tr>
														<td>Email</td>
														<td><input type='text' value ='$email'/></input></td>
													</tr>
													<tr>
														<td>Định mức</td>
														<td><input type='text' value = '$dinhMuc'></input></td>
													</tr>
													<tr>
														<td>Tình trạng</td>
														<td><select>
															<option>Đang cung cấp</option>
															<option>Ngừng cung cấp</option>
														</select></td>
													</tr>
											  </table>
											<div>
											<button class='nextBut'>Kế tiếp</button>
											</div>
										</div>
									<!-- END add new supplier info -->
								</li>
								<li>
								<!-- add account info for new supplier -->
										<div class ='edit-account-info' title='Thanh toán'>
											<p>Thay đổi thông tin và nhấp Lưu</p>
											<table>
												<tr>
													<td>Số tài khoản</td>
													<td><input type='text' value = '$soTaiKhoan'></input></td>
												</tr>
												<tr>
													<td>Ngày lập</td>
													<td><input type='text' class='dtpker'></input></td>
												</tr>
												<tr>
													<td>Ngân hàng</td>
													<td><input type='text' value = '$nganHang'></input></td>
												</tr>
												<tr>
											         <td>Tên loại thẻ</td>
													 <td>
														<select>
															<option>Credit Card</option>
															<option>Visa Card</option>
															<option>Debit Card</option>
															<option>Master Card</option>
															<option>ATM</option>
														</select>
												    	</td>
												</tr>
										</table>
										<div>
											<button class='backBut'>Trở về</button>
											<button>Lưu</button>
										</div>
									</div>
									<!-- END add account info for new supplier -->
								</li>
							</ul>
						</div>";
		}
		}catch (Exception $e) {
			echo "Not Connect to database! ";
		}
		return $data;
	}
	/*
	 * @author thanhtuan
	 * method updateSupplier update information of supplier
	 * 
	 * @param $id,$tenNCC,$diaChi,$sdt,$email,$dinhMuc,$tinhTrang,$soTaiKhoan,$ngayLap,$tenNganHang,$tenLoaiThe
	 * return true if succed else return false
	 */
	public function updateSupplier($id,$tenNCC,$diaChi,$sdt,$email,$dinhMuc,$tinhTrang,$soTaiKhoan,$ngayLap,$tenNganHang,$tenLoaiThe){
      try{
		$dao = new SupplierManagementDAO();
		return $dao->updateSupplier($id,$tenNCC,$diaChi,$sdt,$email,$dinhMuc,$tinhTrang,$soTaiKhoan,$ngayLap,$tenNganHang,$tenLoaiThe);
      }
      catch (Exception $e) {
      	echo "Not Connect to database! ";
      }
      }
	/*
	 * @author thanhtuan
	 * method deleteSupplier delete a supplier
	 * @param $id
	 * return :  true if succed else return false;
	 * 
	 */
	public function deleteSuplier($id){
		try{
			$dao = new SupplierManagementDAO();
			return $dao->deleteSupplier($id);
			}
			catch (Exception $e) {
				echo "Not Connect to database! ";
			}
	}
	/*
	 * @author thanhtuan
	 * method viewAcountInfo view info acount of a supplier
	 * @param $id : string
	 * return string html
	 */
	public  function viewAccountInfo($id){
		try{
			$dao = new SupplierManagementDAO();
			$arr = $dao->wiewAccountInfoDAO($id);
			$data = "";
			if($arr != null){
				$soTaiKhoan = isset($arr["SoTaiKhoan"]) ? $arr["SoTaiKhoan"] : "";
				$ngayLap    = isset($arr["NgayLap"]) ? $arr["NgayLap"] : "";
				$nganHang   = isset($arr["NganHang"]) ? $arr["NganHang"] : "";
				$tenLoaiThe  = isset($arr["tenLoaiThe"]) ? $arr["tenLoaiThe"] : "";  
		        $data = $dao."<table>
								<tr>
									<td>Số tài khoản:</td>
									<td>$soTaiKhoan</td>
								</tr>
								<tr>
									<td>Ngày lập:</td>
									<td>$ngayLap</td>
								</tr>
								<tr>
									<td>Ngân hàng:</td>
									<td>$nganHang</td>
									</tr>
								<tr>
									<td>Loại thẻ:</td>
									<td>$tenLoaiThe</td>
								</tr>
								</table>
								<button onclick='OKButClicked_accountInfo()'>OK</button>";
			}
		}
		catch (Exception $e) {
				echo "Not Connect to database! ";
			}
			return $data;
	}
	
	/*
	* @author thanhtuan
	* method changeFormatDate change format of date 
	* @param $datime string
	* @return string $datetime after format.
	*/
	public function changeFormatDate($date)	{
		$result = new DateTime($date);
		$result =  $result->format('Y-m-d H:i:s');
		return $result;
	}
	
}
// get all action form request params
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch ($action) {
	case "getAll":

		$get = new ModuleSupplierManagement();
		$result = $get->getAllSupplier();
		echo $result;

		break;
	case "add":
		
		$tenNCC = isset($_REQUEST["TenNCC"]) ? $_REQUEST["TenNCC"] : "";
		$diaChi    = isset($_REQUEST["DiaChi"]) ? $_REQUEST["DiaChi"] : "";
		$sdt   = isset($_REQUEST["SDT"]) ? $_REQUEST["SDT"] : "";
		$email  = isset($_REQUEST["Email"]) ? $_REQUEST["Email"] : "";
		$dinhMuc   = isset($_REQUEST["DinhMuc"]) ? $_REQUEST["DinhMuc"] : "";
		$soTaiKhoan = isset($_REQUEST["SoTaiKhoan"]) ? $_REQUEST["SoTaiKhoan"] : "";
		$ngayLap    = isset($_REQUEST["NgayLap"]) ? $_REQUEST["NgayLap"] : "";
		$nganHang   = isset($_REQUEST["NganHang"]) ? $_REQUEST["NganHang"] : "";
		$tenLoaiThe  = isset($_REQUEST["tenLoaiThe"]) ? $_REQUEST["tenLoaiThe"] : "";
		if($ngayLap != ""){
			$format = new ModuleSupplierManagement();
			$ngayLap = $format->changeFormatDate($ngayLap);
			
		} else {
			echo "Bạn phải chọn thời gian thêm nhà cung cấp mới!.";
			continue;
		}
		$insert = new ModuleSupplierManagement();
		$result = $insert->addSupplier($tenNCC, $diaChi, $sdt, $email, $dinhMuc, $soTaiKhoan, $ngayLap, $tenNganHang, $tenLoaiThe);
		echo $result;
		break;

	case "load": // get a row from database base on id of supplier

		$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";

		$load = new ModuleSupplierManagement();
		$result = $load->getSupplier($id);
		echo $result;

		break;
	case "update": 
		$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
		$tenNCC = isset($_REQUEST["TenNCC"]) ? $_REQUEST["TenNCC"] : "";
		$diaChi    = isset($_REQUEST["DiaChi"]) ? $_REQUEST["DiaChi"] : "";
		$sdt   = isset($_REQUEST["SDT"]) ? $_REQUEST["SDT"] : "";
		$email  = isset($_REQUEST["Email"]) ? $_REQUEST["Email"] : "";
		$dinhMuc   = isset($_REQUEST["DinhMuc"]) ? $_REQUEST["DinhMuc"] : "";
		$tinhTrang  = isset($_REQUEST["TinhTrang"]) ? $_REQUEST["TinhTrang"] : "";
		$soTaiKhoan = isset($_REQUEST["SoTaiKhoan"]) ? $_REQUEST["SoTaiKhoan"] : "";
		$ngayLap    = isset($_REQUEST["NgayLap"]) ? $_REQUEST["NgayLap"] : "";
		$nganHang   = isset($_REQUEST["NganHang"]) ? $_REQUEST["NganHang"] : "";
		$tenLoaiThe  = isset($_REQUEST["tenLoaiThe"]) ? $_REQUEST["tenLoaiThe"] : "";
		if($ngayLap != ""){
			$format = new ModuleSupplierManagement();
			$ngayLap = $format->changeFormatDate($ngayLap);
		
		} else {
			echo "Bạn phải chọn thời gian cập nhật thông tin nhà cung cấp !.";
			continue;
		}

		$update = new ModuleSupplierManagement();
		$result = $update->updateSupplier($id, $tenNCC, $diaChi, $sdt, $email, $dinhMuc, $tinhTrang, $soTaiKhoan, $ngayLap, $nganHang, $tenLoaiThe);
		echo $result;

		break;
	case "delete": // delete a or many materials base on array id(MaNCC);

		$arrid = isset($_REQUEST["arrid"]) ? $_REQUEST["arrid"] : "";

		$delete = new ModuleSupplierManagement();
		$result = $delete->deleteSuplier($arrid);
		echo $result;

		break;
	case "viewAccountInfo": 
		
		$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
		
		$view = new ModuleSupplierManagement();
		$result = $view->viewAccountInfo($id);
		echo $result;
		
		break;
	default:
		break;
}

?>