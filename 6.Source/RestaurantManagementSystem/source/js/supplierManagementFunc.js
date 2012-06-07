/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var supplierGrid;
function _init_slider_addSupplier(carousel) {
    $('#addSupplierSlider .slider-controls a').bind('click', function() {
        var index = $(this).parent().find('a').index(this) + 1;
        carousel.scroll( index );
        return false;
    });
	
    $('#addSupplierSlider .nextBut').bind('click', function() {
        carousel.next();
        return false;
    });
    
    $('#addSupplierSlider .backBut').bind('click', function() {
        carousel.prev();
        return false;
    });
};

function _init_slider_editSupplier(carousel) {
    $('#editSupplierSlider .slider-controls a').bind('click', function() {
        var index = $(this).parent().find('a').index(this) + 1;
        carousel.scroll( index );
        return false;
    });
	
    $('#editSupplierSlider .nextBut').bind('click', function() {
        carousel.next();
        return false;
    });
    
    $('#editSupplierSlider .backBut').bind('click', function() {
        carousel.prev();
        return false;
    });
};

$(document).ready(function()
{
    $("#addSupplier-SliderHolder").jcarousel({
        scroll: 1,
        wrap: 'both',
        initCallback: _init_slider_addSupplier,
        buttonNextHTML: null,
        buttonPrevHTML: null
    });
    
    $("#editSupplier-SliderHolder").jcarousel({
        scroll: 1,
        wrap: 'both',
        initCallback:  _init_slider_editSupplier,
        buttonNextHTML: null,
        buttonPrevHTML: null
    });
    
    $('.dtpker').datetimepicker();
    
    $('#addSupplierSlider').dialog({
        autoOpen: false,
        height: 400,
        width: 600,
        modal: true,
        resizable:false
    });
    
    $('#editSupplierSlider').dialog({
        autoOpen: false,
        height: 420,
        width: 600,
        modal: true,
        resizable:false
    });
    
    $('.account-info').dialog({
        autoOpen: false,
        height: 250,
        width: 350,
        modal: true,
        resizable:false
    });
    
    
    $('.delete-confirmation-box-dialog').dialog({
        autoOpen: false,
        height: 120,
        width: 300,
        modal: true,
        resizable:false
    });   
       
    $('#button-show').click(function(){
        $('#menuDiv').toggle("drop",{
            width: 30, 
            height: 60
        }, 500);
    });
    
    initSupplierGrid();

    setFontColorForDebtUnderQuota();
}
);

function addSupplier()
{
    $('#addSupplierSlider').dialog("open");
}

function deleteConfirm()
{
    $('.delete-confirmation-box-dialog').dialog("open");
}

function cancelDeleteBill()
{
    $('.delete-confirmation-box-dialog').dialog("close");
}

function viewAccountInfo(){
    $('.account-info').dialog("open");
}

function editSupplier(){
    $('#editSupplierSlider').dialog("open");
}

function OKButClicked_accountInfo()
{
    $('.account-info').dialog("close");
}

function initSupplierGrid()
{
    supplierGrid = new dhtmlXGridObject("supplierInfoDiv");
    supplierGrid.setImagePath("dhtmlx/imgs/");//path to images required by grid7\4
    supplierGrid.setHeader("#master_checkbox,MÃ NHÀ CUNG CẤP,TÊN NHÀ CUNG CẤP,ĐỊNH MỨC (VND),CÔNG NỢ (VND),ĐỊA CHỈ,SỐ ĐIỆN THOẠI,EMAIL,TÌNH TRẠNG");//set column names
    supplierGrid.attachHeader(",#text_filter,#text_filter,#numeric_filter,#numeric_filter,#text_filter,#numeric_filter,#text_filter,#select_filter");
    supplierGrid.setInitWidths("30,80,150,100,100,200,120,150,100");//set column width in px
    supplierGrid.setColAlign("left,center,left,left,left,left,left,left,left,center");//set column values align
    supplierGrid.setColTypes("ch,ro,ro,ro,ro,ro,ro,ro,ro");//set column types
    supplierGrid.setColSorting(",str,str,int,int,str,str,str,str");//set sorting    
    supplierGrid.enableAutoWidth();

    supplierGrid.init();//initialize grid
    supplierGrid.setSkin("dhx_skyblue");//set grid skin
    
    //input data must be like below format    
    var str = "{rows:[{ id:1001, data:['','1001','A Time to Kill','10','150','123 Nguyễn Văn Cừ','12345', 'jml@gmail.com', 'Ngừng cung cấp']}, \n\
{ id:1002, data:['','1002','A Time to Kill','11.99','11.9','123 Nguyễn Văn Thủ','12458','jml@gmail.com', 'Đang cung cấp']},\n\
{ id:1003, data:['','1003','A Time to Kill','12.99','30','123 Nguyễn Văn Cừ','1258', 'jml@gmail.com', 'Đang cung cấp']}\n\
        ]}";
    var js = eval('(' + str + ')');
    supplierGrid.parse(js,"json");
}


function setFontColorForDebtUnderQuota(){
    var debtArr= $('#supplierInfoDiv .objbox .obj tr td:nth-child(5)').get();
    var quotaArr = $('#supplierInfoDiv .objbox .obj tr td:nth-child(4)').get();
    for(var i=0; i<debtArr.length; i++){
        var debt = parseFloat(debtArr[i].innerHTML);
        var quota = parseFloat(quotaArr[i].innerHTML);
        if(debt >= quota){
            debtArr[i].style.color = "red";
            debtArr[i].style.fontStyle = "italic";
        }
    }
}


function ingredientImporting(){
	window.location = "../gui/ingredientImporting.php";
}

function supplierManagement(){
	window.location = "../gui/supplierManagement.php";
}

function ingredientManagement(){
	window.location = "../gui/ingredientManagement.php";
}