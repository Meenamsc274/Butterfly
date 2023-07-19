function addrow(i,product_id,productcode,product_name,barcode,expiry_date,batch_no,unit,qty,rate,tax,price_changeable,stockable){
i++;
$(".salesreturn_details:last").after('<tr class="salesreturn_details" id="'+product_id+'"> <td width="30%"> <input class="form-control" type="hidden" name="product_id[]" id="product_id'+i+'" value="'+product_id+'"> <input class="form-control" type="hidden" name="productcode[]" id="productcode'+i+'" value="'+productcode+'"> <input class="form-control" type="hidden" name="barcode[]" id="barcode'+i+'" value="'+barcode+'"> <textarea class="form-control" name="product_name[]" id="product_name'+i+'">'+product_name+'</textarea> <table> <tr> <td><b>Expiry Date</b></td> <td><b>Batch No</b></td> </tr> <tr> <td><input class="form-control" type="date" name="expiry_date[]" id="expiry_date'+i+'" value="'+expiry_date+'"></td> <td><input class="form-control" type="text" name="batch_no[]" id="batch_no'+i+'" value="'+batch_no+'"></td> </tr> </table> </td> <td width="10%"><input class="form-control qty" type="text" name="qty[]" id="qty'+i+'" value="'+qty+'" onblur="update_linetotal('+i+')"></td> <td width="10%"><input class="form-control" type="text" name="rate[]" id="rate'+i+'" onblur="update_linetotal('+i+')" value="'+rate+'"></td> <td width="10%"><input class="form-control" type="text" name="unit[]" id="unit'+i+'" value="'+unit+'"></td> <td width="15%"> <select name="line_discount_type[]" id="line_discount_type'+i+'" class="form-control" onchange="update_linetotal('+i+')"> <option value="no discount">No Discount</option> <option value="flatrate">Flat Rate</option> <option value="percentage">Percentage</option> </select> <input class="form-control" type="text" name="line_discount[]" id="line_discount'+i+'" placeholder="Value" onblur="update_linetotal('+i+')"><input class="form-control linediscount" type="text" name="line_discount_total[]" id="line_discount_total'+i+'" placeholder="Total" readonly> </td> <td width="10%"><input class="form-control" type="text" name="tax[]" id="tax'+i+'" value="'+tax+'" onblur="update_linetotal('+i+')"><input class="form-control taxvalue" type="text" name="tax_total[]" id="tax_total'+i+'" readonly></td> <td width="15%"><input class="form-control price" type="text" name="line_total[]" id="line_total'+i+'"></td> <td><a class="salesreturndel" href="javascript:;" title="Remove row"><i class="fa fa-close"></i></a></td> </tr>');
update_linetotal(i);
if ($(".salesreturndel").length > 0) $(".salesreturndel").show();
}
function showdel()
{
	if ($(".salesreturndel").length < 2) {
		  $(".salesreturndel").hide();
	}
}


$(document).ready(function() {
if ($(".salesreturndel").length > 1) { $(".salesreturndel").show(); } else { $(".salesreturndel").hide(); };
$("body").on("click",".salesreturndel",function(){
	if ($(".salesreturndel").length > 1) {									  
    $(this).parents('.salesreturn_details').remove();
	showdel();
	}
  });
});