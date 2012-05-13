<?php
/**
 * general functions for all modules
 * @author vantuanlee@gmail.com
 * */
class GeneralFunctions{
	/**
	 * alert
	 * @param $content content string
	 * @author vantuanlee@gmail.com
	 * */
	public static function Alert($content){
		return '
		<script type="text/javascript">
		alert("'. $content . '");
		</script>
		';
	}
	
	
	/**
	 * confirm
	 * @param string $content confirm content
	 * @author vantuanlee@gmail.com
	 */
	public static function Confirm($content){
		return '';
	}
	
} 
?>