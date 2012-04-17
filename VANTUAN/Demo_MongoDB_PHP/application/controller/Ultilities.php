<?php
class Ultilites{	
	
	public static function html_show_staffs($array) {
		$table = '<table name="rows">';
		$table .= '<tr>
		<th><input type="checkbox" id="idSelectAll" value="Button" onclick="return selectAll();"/></th>
		<th></th>
		<th>
		<a href="sql.php?action=delete&MaNV=" onclick="return confirmLink(this)">
		<span>
		<img src ="../images/drop.png" title="Delete" alt="Delete" class="icon" width="16" height="16">
		Delete
		</span>
		</a>
		</th>
		<th>MaNV</th>
		<th>HoTen</th>
		<th>NgaySinh</th>
		<th>DiaChi</th>
		<th>Phai</th>
		<th>Luong</th>
		<th>MaPhong</th>
		</tr>';
		foreach ($array as $value) {
			$maNV = isset($value["MaNV"]) ? $value["MaNV"] : "";
			$hoten = isset($value["HoTen"]) ? $value["HoTen"] : "";
			$ngaySinh = isset($value["NgaySinh"]) ? $value["NgaySinh"] : "";
			$diaChi = isset($value["DiaChi"]) ? $value["DiaChi"] : "";
			$phai =  isset($value["Phai"]) ? $value["Phai"] : "";
			$luong = isset($value["Luong"]) ? $value["Luong"] : "";
			$phong = isset($value["Phong"]) ? $value["Phong"] : "";
			$table .= "<tr>";
			// insert checkbox
			$table .= '<td><input type="checkbox" name="rowid[]" value="<?=$value["MaNV"]?></td>';
			// insert edit link
			$table .= '<td align="center">
			<a href="modify_staff.php?action=edit_staff&HoTen=' . $hoten . '&NgaySinh='. $ngaySinh .
			'&DiaChi=' . $diaChi . '&Phai='. $phai .
			'&Luong=' . $luong . '&Phong='. $phong .
			'&MaNV=" onClick="return confirmLink(this, \'' . $maNV . '\')">
			<span>
			<img src ="../images/edit.png" title="Edit" alt="Edit" class="icon" width="16" height="16">
			Edit
			</span>
			</a>
			</td>';
			// insert delete link
			$table .= '<td align="center">
			<a href="javascript:removeStaff(\'' . $maNV . '\')">
			<span>
			<img src ="../images/drop.png" title="Delete" alt="Delete" class="icon" width="16" height="16">
			Delete
			</span>
			</a>
			</td>';
	
			foreach ($value as $cell) {
				$table .= "<td>$cell</td>";
			}
			$table .= "</tr>";
		}
		$table .= "</table>";
		echo $table;
	}
	
	public static function html_show_listbox_departments($array, $onchange = true, $deptName = null, $deptId = null){
		$html = '
		<select id="department" name="department" ';
		if($onchange == true){
			$html .= 'onChange="selectOnChange(this);"';
		}
		$html .= '>
		<option value="-1">All</option>';
		foreach ($array as $value){
			$html .= '<option value="' . $value["MaPhong"] .'">' . $value["TenPhong"] . '</option>';
		}
		$html .= '</select>';
	
		// set value to setlect box
		if($deptName != null)
			$html .= '
			<script type="text/javascript">
			setTextTo("department", "' . $deptName . '");
			setValueTo("department", "' . $deptId . '");
			</script>';
		echo $html;
	}
	
	public static function html_show_departments($array){
		$table = '<table name="rows">';
		$table .= '<tr>
		<th><input type="checkbox" id="idSelectAll" value="Button" onclick="return selectAll();"/></th>
		<th></th>
		<th>
		<a href="sql.php?action=delete_dept&MaNV=" onclick="return confirmLink(this)">
		<span>
		<img src ="../images/drop.png" title="Delete" alt="Delete" class="icon" width="16" height="16">
		Delete
		</span>
		</a>
		</th>
		<th>MaPhong</th>
		<th>TenPhong</th>
		</tr>';
		foreach ($array as $value) {
			$maPhong = isset($value["MaPhong"]) ? $value["MaPhong"] : "";
			$tenPhong = isset($value["TenPhong"]) ? $value["TenPhong"] : "";
	
			$table .= "<tr>";
			// insert checkbox
			$table .= '<td><input type="checkbox" name="rowid[]" value="<?=$value["MaNV"]?></td>';
			// insert edit link
			$table .= '<td align="center">
			<a href="sql.php?action=edit_dept&TenPhong=' . $tenPhong .
			'&MaPhong=" onClick="return confirmLink(this, \'' . $maPhong . '\')">
			<span>
			<img src ="../images/edit.png" title="Edit" alt="Edit" class="icon" width="16" height="16">
			Edit
			</span>
			</a>
			</td>';
			// insert delete link
			$table .= '<td align="center">
			<a href="javascript:removeDepartment(\'' . $maPhong . '\')">
			<span>
			<img src ="../images/drop.png" title="Delete" alt="Delete" class="icon" width="16" height="16">
			Delete
			</span>
			</a>
			</td>';
	
			foreach ($value as $cell) {
				$table .= "<td>$cell</td>";
			}
			$table .= "</tr>";
		}
		$table .= "</table>";
		echo $table;
	}
}
?>