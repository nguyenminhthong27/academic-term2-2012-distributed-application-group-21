<?php
require_once '../dal/TableDAO.php';
class SearchBookingController
{
/**
 * all methods that're relatives to Search booking object
 * @author thanhtuan
 *
 */
/**
 * main search_Booking method
 * @param $restaurant string
 * @param $area string
 * @param $status bit
 * @param $from date(example 18-5-2012 7:10:00 AM)
 * @param $to date (example 18-5-2012 9:10:00 AM)
 * @return gui information about booking
 * */
 
public function search_Booking($restaurant,$area,$status,$from,$to)
{
	$dao = new TableDAO() ;
    $array = $dao->getAvailableTable($restaurant,$area,$status,$from, $to);
    $data = "";
     $data = $data." <table>
           <tr>
              <th>MÃ BÀN ĂN</th>
              <th>TÊN KHU VỰC</th>
              <th>GIÁ THÀNH</th>
              <th>SỐ NGƯỜI</th>
              <th>TÌNH TRẠNG</th>
           </tr>
         <tr>  " ;
        foreach ($array as $value) 
    
            { 
            	$TenKV = isset($value["TenKV"]) ? $value["TenKV"] : "";
            	$MaBanAn = isset($value["MaBanAn"]) ? $value["MaBanAn"] : "";
            	$GiaThanh = isset($value["GiaThanh"]) ? $value["GiaThanh"] : "";
            	$SoNguoi = isset($value["SoLuong"]) ? $value["SoLuong"] : "";
            	$TinhTrang =  isset($value["TinhTrang"]) ? $value["TinhTrang"] : "";
            	$TinhTrang_change = "";
            
            	           		
                    $data = $data."<td>$MaBanAn</td>";
                    $data = $data."<td><a onclick='regionInfoLinkClicked();' href='#'>$TenKV</td>";
                    $data = $data."<td>$GiaThanh</td>";
                    $data = $data. "<td>$SoNguoi</td>";
                    if($TinhTrang == "0")
                    {
                    	$TinhTrang_change = "Chưa đặt";
                        $data  = $data."<td>Chưa đặt</td>";
                       }
                        else 
                        {
                        	$data  = $data."<td><a onclick='bookingDetailLinkClicked();' href='#'>Chi tiết</a></td>";
                        }
                    $data = $data."</tr>";    
            }
           
       $data = $data."</table>";
    
    $data = $data ."</div>";
    return $data;
    
        }

}
        
        $restaurant = isset($_REQUEST["res"]) ? $_REQUEST["res"] : ""; 
        $area= isset($_REQUEST["area"]) ? $_REQUEST["area"] : "";
        $status = isset($_REQUEST["status"]) ? $_REQUEST["status"] : "";
        $from= isset($_REQUEST["from"]) ? $_REQUEST["from"] : "";
        $to= isset($_REQUEST["to"]) ? $_REQUEST["to"] : "";
     
        	try {
        		// do login
        		$search = new SearchBookingController();
        		$SearchResult = $search->search_Booking($restaurant,$area,$status,$from, $to);
        		echo $SearchResult;
        
        	} catch (Exception $e) {
        		echo "Not Connect to database";
        	}

          
?>

