function addrow(i,ingredient_id,ingredientcode,ingredient_name,barcode,unit,tax,price_changeable,stockable){
i++;
$(".purchaseingredient_details:last").after('<tr class="purchaseingredient_details" id="'+ingredient_id+'"> <td width="25%"> <input class="form-control" type="hidden" name="ingredient_id[]" id="ingredient_id'+i+'" value="'+ingredient_id+'"> <input class="form-control" type="hidden" name="ingredientcode[]" id="ingredientcode'+i+'" value="'+ingredientcode+'"> <input class="form-control" type="hidden" name="barcode[]" id="barcode'+i+'" value="'+barcode+'"> <textarea class="form-control" name="ingredient_name[]" id="ingredient_name'+i+'">'+ingredient_name+'</textarea> <table> <tr> <td><b>Expiry Date</b></td> <td><b>Batch No</b></td> </tr> <tr> <td><input class="form-control" type="date" name="expiry_date[]" id="expiry_date'+i+'"></td> <td><input class="form-control" type="text" name="batch_no[]" id="batch_no'+i+'"></td> </tr> </table> </td> <td width="5%"><input class="form-control qty" type="text" name="qty[]" id="qty'+i+'" onblur="update_linetotal('+i+')"></td> <td width="10%"><input class="form-control" type="text" name="rate[]" id="rate'+i+'" onblur="update_linetotal('+i+')"></td> <td width="10%"><input class="form-control" type="text" name="unit[]" id="unit'+i+'" value="'+unit+'"></td> <td width="15%"> <input class="form-control" type="text" name="mrp_price[]" id="mrp_price'+i+'" placeholder="MRP Price"> <input class="form-control" type="text" name="selling_price[]" id="selling_price'+i+'" placeholder="Selling Price"> <input class="form-control" type="text" name="wholesale_price[]" id="wholesale_price'+i+'" placeholder="Wholesale"> </td> <td width="15%"> <select name="line_discount_type[]" id="line_discount_type'+i+'" class="form-control" onchange="update_linetotal('+i+')"> <option value="no discount">No Discount</option> <option value="flatrate">Flat Rate</option> <option value="percentage">Percentage</option> </select> <input class="form-control" type="text" name="line_discount[]" id="line_discount'+i+'" placeholder="Value" onblur="update_linetotal('+i+')"><input class="form-control linediscount" type="text" name="line_discount_total[]" id="line_discount_total'+i+'" placeholder="Total" readonly> </td> <td width="10%"><input class="form-control" type="text" name="tax[]" id="tax'+i+'" value="'+tax+'" onblur="update_linetotal('+i+')"><input class="form-control taxvalue" type="text" name="tax_total[]" id="tax_total'+i+'" readonly></td> <td width="10%"><input class="form-control price" type="text" name="line_total[]" id="line_total'+i+'"></td> <td><a class="purchaseingredientdel" href="javascript:;" title="Remove row"><i class="fa fa-close"></i></a></td> </tr>');
if ($(".purchaseingredientdel").length > 0) $(".purchaseingredientdel").show();
}

function showdel()
{
	if ($(".purchaseingredientdel").length < 2) {
		  $(".purchaseingredientdel").hide();
	}
}


$(document).ready(function() {
if ($(".purchaseingredientdel").length > 1) { $(".purchaseingredientdel").show(); } else { $(".purchaseingredientdel").hide(); };
$("body").on("click",".purchaseingredientdel",function(){
	if ($(".purchaseingredientdel").length > 1) {									  
    $(this).parents('.purchaseingredient_details').remove();
	showdel();
	}
  });
});