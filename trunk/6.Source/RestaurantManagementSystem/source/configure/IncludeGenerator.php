<?php
/**
 * generate common include file, such as css, javascript, require file
 * 
 * @author vantuanlee@gmail.com
 * */ 
class IncludeGenerator {
	/**
	 * CSS generator
	 * @author vantuanlee@gmail.com
	 * */
	public static function CSSGenerate(){
		return '
		';
	}
	
	/**
	 * javascript generator
	 * */
	public static function JSGenerate(){
		return '
		<script src="../js/general_functions.js" type="text/javascript"></script>
		<script src="../js/jquery-1.4.1.min.js" type="text/javascript"></script>
        <script src="../js/jquery.jcarousel.pack.js" type="text/javascript"></script>
        <script src="../js/jquery-func.js" type="text/javascript"></script>
		';
	}
	
	/**
	 * slider generator
	 * @author vantuanlee@gmail.com
	 * */
	public static function SliderGenerate(){
		return '
		<div id="slider">
                    <div id="slider-holder">
                        <ul>
                            <li>
                                <div class="slide-info">
                                    <h2 class="notext txt-we-love-mondays">WE LOVE T4V RESTAURANT</h2>
                                    <p>Chúc mọi người một ngày làm việc hiệu quả</p>                                    
                                </div>
                                <div class="slide-image">
                                    <img src="../css/images/heartIcon.png" alt="" />
                                </div>
                            </li>
                            <li>
                                <div class="slide-info">
                                    <h2 class="notext txt-we-love-mondays">WE LOVE T4V RESTAURANT</h2>
                                    <p>You just need to believe and try your best!!!</p>
                                </div>
                                <div class="slide-image">
                                    <img src="../css/images/heartIcon.png" alt="" />
                                </div>
                            </li>
                            <li>
                                <div class="slide-info">
                                    <h2 class="notext txt-we-love-mondays">WE LOVE T4V RESTAURANT</h2>
                                    <p>Don\'t ask for more until you try enough!!!</p>
                                </div>
                                <div class="slide-image">
                                    <img src="../css/images/heartIcon.png" alt="" />
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slider-nav">
                        <a href="#" class="prev">Previous</a>
                        <a href="#" class="next">Next</a>
                    </div>
                </div>
		';
	}

	/**
	 * Main functions
	 * @author vantuanlee@gmail.com
	 * */
	public static function MainFunctionsGenerate(){
		return '
		<!-- Two Column Content -->
                <div class="cols two-cols">
                    <div class="cl">&nbsp;</div>
                    <div class="col">
                        <img src="../css/images/cashierIcon.png" ></img>
                        <div class="text">
                            <a href="javascript:billingManagement()">Quản lý thu ngân</a>
                            <ul>
                                <li>Quản lý thanh toán hóa đơn</li>
                                <li>Chỉ dành cho nhân viên thu ngân</li>
                            </ul>
                        </div>
                        <div class="smallToolbar"></div>                        
                    </div>
                    <div class="col col-last">
                        <img src="../css/images/seatIcon.png" ></img>
                        <div class="text">
                            <a href="javascript:bookingManagement()">Quản lý đặt chỗ</a>
                            <ul>
                                <li>Quản lý yêu cầu đặt chỗ của khách hàng</li>
                                <li>Chỉ dành cho nhân viên tiếp tân</li>
                            </ul>
                        </div>
                        <div class="smallToolbar">
                            <a href="javascript:booking()" title="Đặt chỗ"><img alt="Đặt chỗ" src="../css/images/plusIcon.png" /></a>
                            <a href="javascript:showTableList()" title="Danh sách bàn ăn"><img src="../css/images/tableIcon.png" /></a>
                        </div>
                    </div>
                    <div class="cl">&nbsp;</div>
                </div>
                <!-- END Two Column Content -->
                <!-- Two Column Content -->
                <div class="cols two-cols">
                    <div class="cl">&nbsp;</div>
                    <div class="col">
                        <img src="../css/images/menuIcon.png" ></img>
                        <div class="text">
                            <a href="javascript:menuManagement()">Quản lý thực đơn</a>
                            <ul>
                                <li>Quản lý thực đơn và món ăn</li>
                                <li>Chỉ dành cho nhân viên nhà bếp</li>
                            </ul>

                        </div>
                        <div class="smallToolbar">
                            <a href="javascript:menuManagement()" title="Quản lý thực đơn"><img src="../css/images/menuIcon.png" /></a>
                            <a href="javascript:foodManagement()" title="Quản lý món ăn"><img src="../css/images/foodIcon.png" /></a>
                        </div>
                    </div>
                    <div class="col col-last">
                        <img src="../css/images/stockIcon.png" ></img>
                        <div class="text">
                            <a href="javascript:ingredientManagement()">Quản lý kho hàng</a>
                            <ul>
                                <li>Quản lý nhập xuất kho</li>
                                <li>Chỉ dành cho nhân viên quản lý kho</li>
                            </ul>
                        </div>
                        <div class="smallToolbar">
                            <a href="javascript:supplierManagement()" title="Quản lý nhà cung cấp"><img src="../css/images/restaurantIcon.png" /></a>
                            <a href="javascript:materialManagement()" title="Quản lý nguyên liệu trong kho hàng"><img src="../css/images/ingredientIcon.png" /></a>
                        </div>
                    </div>
                    <div class="cl">&nbsp;</div>
                </div>
                <!-- END Two Column Content -->
                <!-- Two Column Content -->
                <div class="cols two-cols">
                    <div class="cl">&nbsp;</div>
                    <div class="col">
                        <img src="../css/images/userIcon.png" ></img>
                        <div class="text">
                            <a href="javascript:accountManagement()">Quản lý tài khoản</a>
                            <ul>
                                <li>Quản lý tài khoản người dùng</li>
                                <li>Chỉ dành cho nhân viên hệ thống</li>
                            </ul>

                        </div>
                        <div class="smallToolbar"></div>
                    </div>
                    <div class="col col-last">
                        <img src="../css/images/employeeIcon.png" ></img>
                        <div class="text">
                            <a href="javascript:staffManagement()">Quản lý nhân viên</a>
                            <ul>
                                <li>Quản lý thông tin nhân viên</li>
                                <li>Chuyển công tác nhân viên</li>
                                <li>Chỉ dành cho quản lý nhà hàng</li>
                            </ul>

                        </div>
                        <div class="smallToolbar"></div>                        
                    </div>
                    <div class="cl">&nbsp;</div>
                </div>
                <!-- END Two Column Content -->
                <!-- Two Column Content -->
                <div class="cols two-cols">
                    <div class="cl">&nbsp;</div>
                    <div class="col">
                        <img src="../css/images/restaurantIcon.png" ></img>
                        <div class="text">
                            <a href="javascript:restaurantManagement()">Quản lý nhà hàng</a>
                            <ul>
                                <li>Quản lý thông tin nhà hàng</li>
                                <li>Chỉ dành cho nhân viên hệ thống</li>
                            </ul>

                        </div>
                        <div class="smallToolbar"></div>
                    </div>                    
                    <div class="cl">&nbsp;</div>
                </div>
                <!-- END Two Column Content -->
		';
	}
	
	
	/**
	 * footer generator
	 * @author vantuanlee@gmail.com
	 * */
	public static function FooterGenerate(){
		return '
		<!-- Footer -->
		<div id="footer">
			<p class="right">&copy; 2012 - T4V Restaurant Management System &nbsp; Design by T4V Group
				<p>
					<a href="home.php">Trang chủ</a><span>&nbsp;</span>
					<a href="about.php">Giới thiệu</a><span>&nbsp;</span>
					<a href="contact.php">Liên hệ</a><span>&nbsp;</span>
					<div class="cl">&nbsp;</div>
				</p>
			</p>
		</div>
		<!-- END Footer -->
		';
	}
	
	/**
	 * logo generator
	 * @author vantuanlee@gmail.com
	 * */
	public static function LogoGenerate(){
		return '
		<div id="top">
			<div class="cl">&nbsp;</div>
				<h1 id="logo"><a href="home.php">T4V RESTAURANT</a></h1>
				<p id="welcomeUser"></p>
				<div class="cl">&nbsp;</div>
				<div id="navigation">
				<ul>
				<li><a href="home.php" class="active"><span>Trang chủ</span></a></li>
				<li><a href="about.php"><span>Giới thiệu</span></a></li>
				<li><a href="account.php"><span>Tài khoản</span></a></li>
				<li><a href="contact.php"><span>Liên hệ</span></a></li>
				</ul>
			</div>
		</div>
		';
	}
	
	/**
	 * LogoutLink generator
	 * @author vantuanlee@gmail.com
	 * */
	public static function LogoutLinkGenerate($username){
		return '
		<script type="text/javascript">
            document.getElementById("welcomeUser").innerHTML = \'Chào mừng,' . $username . 
            ' <a href="javascript:logout()">Đăng xuất\';
            </script>
		';
	}
}
?>