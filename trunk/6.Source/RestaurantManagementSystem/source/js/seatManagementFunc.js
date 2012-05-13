function _init_slider(carousel) {
	$('#slider .slider-controls a').bind('click', function() {
		var index = $(this).parent().find('a').index(this) + 1;
		carousel.scroll( index );
		return false;
	});
	
	$('#slider .slider-nav .next').bind('click', function() {
		carousel.next();
		return false;
	});
	
	$('#slider .slider-nav .prev').bind('click', function() {
		carousel.prev();
		return false;
	});
};

function _set_slide(carousel, item, idx, state) {
	var index = idx - 1;
	
	$('#slider .slider-controls a').removeClass('active');
	$('#slider .slider-controls a').eq(index).addClass('active');
};

function check_fields(field) {
	if (field.title==field.value || this.value == '') {
		$(field).removeClass('field-focused');
	} else {
		$(field).addClass('field-focused');
	};
};

function addTable()
{
    var elements = "<tr>"
                          + "<td>Mã bàn ăn</td>"
                          + "<td><input type='text'></input></td><br/>"
                          + "</tr>"
                          + "<tr>"
                          + " <td>Từ</td>"
                          + "<td><input type='text' class='fromDtPker'></input></td>"
                          + "<td>Đến</td>"
                          + "<td><input type='text' class='toDtPker'></input></td>"
                          + "</tr>";
                      
	 
    $('#bookingDetailInfoTable').append(elements);
	// bookingDetailInfo
    $('.fromDtPker').datetimepicker();
    $('.toDtPker').datetimepicker();
}

$(document).ready(function() {
	$("#slider-holder").jcarousel({
		scroll: 1,
		auto: 5,
		wrap: 'both',
		initCallback: _init_slider,
		itemFirstInCallback: _set_slide,
		buttonNextHTML: null,
		buttonPrevHTML: null
	});
	
	$('.field').each(function() {
		check_fields(this);
	});
	
	$('.field').focus(function() {
        if(this.title==this.value) {
            this.value = '';
            check_fields(this);
        }
    }).blur(function(){
        if(this.value=='') {
            this.value = this.title;
            check_fields(this);
        }
    });
    
    // bookingDetailInfo
    $('.fromDtPker').datetimepicker();
    $('.toDtPker').datetimepicker();
    $('.tableInfoDialog').dialog({autoOpen: false,
			height: 450,
			width: 780,
			modal: true});
    
    //END bookingDetailInfo

    $('#button-show').click(function(){
       $('#menuDiv').toggle("drop",{width: 30, height: 60}, 500);
    });    
    
    $('#searchTableBut').click(function() {
        $('.tableInfoDialog').dialog("open");
    });
    
    //Food table link (href)
    $('#regionInfoDialog').dialog({autoOpen: false,
			height: 300,
			width: 450,
			modal: true});
                    
    $('#bookingDetailDialog').dialog({autoOpen: false,
			height: 300,
			width: 650,
			modal: true});
});

/*
* functions control food table link 
*/
function regionInfoLinkClicked()
{
     $('#regionInfoDialog').dialog("open");
}

function bookingDetailLinkClicked()
{
    $('#bookingDetailDialog').dialog("open");
}

/*
* END functions control food table link
*/
