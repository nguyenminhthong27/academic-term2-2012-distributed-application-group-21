/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

 function _init_slider(carousel) {    	
    $('.nextBut').bind('click', function() {
        carousel.next();
        return false;
    });
    
    $('.backBut').bind('click', function() {
        carousel.prev();
        return false;
    });
};

function _set_slide(carousel, item, idx, state) {
    var index = idx - 1;
	
    $('#slider .slider-controls a').removeClass('active');
    $('#slider .slider-controls a').eq(index).addClass('active');
};

 
$(document).ready(function()
{
    $('.dtpker').datetimepicker();
    $('#button-show').click(function(){
        $('#menuDiv').toggle("drop",{
            width: 30, 
            height: 60
        }, 500);
    });
    
    $('.booking-search-dialog').dialog({
        autoOpen: false,
        height: 450,
        width: 900,
        modal: true
    });
    
    $("#slider-holder").jcarousel({
        scroll: 2,
        wrap: 'both',
        initCallback: _init_slider,
        itemFallbackDimension:_set_slide,
        buttonNextHTML: null,
        buttonPrevHTML: null
    });
    
    $("#bookingSearchBut").click(function(){
        $('.booking-search-dialog').dialog("open");
    });    
    
    $("#bookingSearchDialogBut").click(function(){
        alert("fda");
        var date_booking_founded = $('#date_booking_founded').value;
        var customer_name = $('#customer_name').value;
        var customer_id = $('#customer_id').value;
        var customer_phone = $('#customer_phone').value;
        
        var nocache = Math.random();
    	
    	var http = createXMLHttpRequest();
    	var serverURL = "../controller/ModuleCreateBillController.php?action=search_booking&time=" + date_booking_founded + 
    		"&cus_name=" + customer_name + "&cus_id=" + customer_id  + 
    		"&cus_phone=" + customer_phone + "&nocache=" + nocache;
    	
    	http.open("POST", serverURL, true);
    	http.onreadystatechange = function()
    		{
    			if(http.readyState==4 && http.status==200){
    				var respone = http.responseText;
    				document.getElementById("booking-detail-div").innerHTML = respone;
    			}
    		};
    	http.send();
    }); 
    
    $(".food-amount table tr td input").NumericUpDown();
    
    $("#addFoodAmountBut").click(function() {
//    	alert("");
    	$("#slider-holder").next();
    	
    });
});


function checkAllCBoxClicked()
{
    var checkAll = document.getElementById("checkAllCBox");
    if(checkAll.checked)
        {
            var cbox = $('.food-detail table tr td input').get();
            for(var i=0; i<cbox.length; i++)
                cbox[i].checked = true;
        }
        else
            {
                var cbox = $('.food-detail table tr td input').get();
            for(var i=0; i<cbox.length; i++)
                cbox[i].checked = false;
            }
}
