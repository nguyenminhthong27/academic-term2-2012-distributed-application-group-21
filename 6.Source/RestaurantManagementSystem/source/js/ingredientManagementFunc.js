/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var ingredientGrid;

$(document).ready(function()
{        
    $('#addIngredientDialog').dialog({
        autoOpen: false,
        height: 300,
        width: 600,
        modal: true,
        resizable:false
    });
    
    $('#editIngredientDialog').dialog({
        autoOpen: false,
        height: 350,
        width: 600,
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
    
    initIngredientGrid();

    setFontColorForIngredientAmountUnderMin();
}
);

function addIngredient()
{
    $('#addIngredientDialog').dialog("open");
}

function deleteConfirm()
{
    $('.delete-confirmation-box-dialog').dialog("open");
}

function cancelDeleteBill()
{
    $('.delete-confirmation-box-dialog').dialog("close");
}

function editIngredient(){
    $('#editIngredientDialog').dialog("open");
}

function initIngredientGrid()
{
    ingredientGrid = new dhtmlXGridObject("ingredientInfoDiv");
    ingredientGrid.setImagePath("dhtmlx/imgs/");//path to images required by grid7\4
    ingredientGrid.setHeader("#master_checkbox,MÃ NGUYÊN LIỆU,TÊN NGUYÊN LIỆU,LOẠI NGUYÊN LIỆU,SỐ LƯỢNG,SỐ LƯỢNG TỐI THIỂU,SỐ LƯỢNG TỐI ĐA");//set column names
    ingredientGrid.attachHeader(",#text_filter,#text_filter,#text_filter,#numeric_filter,#numeric_filter,#numeric_filter");
    ingredientGrid.setInitWidths("40,80,180,150,100,100,100");//set column width in px
    ingredientGrid.setColAlign("left,center,left,left,center,center,center");//set column values align
    ingredientGrid.setColTypes("ch,ro,ro,ro,ro,ro,ro");//set column types
    ingredientGrid.setColSorting(",str,str,str,int,int,int");//set sorting    
    ingredientGrid.enableAutoWidth();

    ingredientGrid.init();//initialize grid
    ingredientGrid.setSkin("dhx_skyblue");//set grid skin
    
    //input data must be like below format    
    var str = "{rows:[{ id:1001, data:['','1001','Thịt gà','Thịt','150','120','150']}, \n\
{ id:1002, data:['','1002','Rau xà lách','Rau','11.9','15','152']},\n\
{ id:1003, data:['','1003','Bông cải xanh','Rau','30','35','158']}\n\
        ]}";
    var js = eval('(' + str + ')');
    ingredientGrid.parse(js,"json");
}


function setFontColorForIngredientAmountUnderMin(){
    var amountArr= $('#ingredientInfoDiv .objbox .obj tr td:nth-child(5)').get();
    var minArr = $('#ingredientInfoDiv .objbox .obj tr td:nth-child(6)').get();
    for(var i=0; i<amountArr.length; i++){
        var amount = parseFloat(amountArr[i].innerHTML);
        var min = parseFloat(minArr[i].innerHTML);
        if(amount <= min){
            amountArr[i].style.color = "red";
            amountArr[i].style.fontStyle = "italic";
        }
    }
}