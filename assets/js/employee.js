$(".edit_allowance").click(function(){
    var id = $(this).attr("data-id");
    $(".modal_title").text('Edit');
    $("#allowance_submit").val('Update');
    var url = 'ajax_request/get_allowance.php';
    $.ajax({
        url : url,
        type: "POST",
        data: {id : id},
        dataType: "JSON",
        success: function(data)
        {
        //if success close modal and reload ajax table
            $('#allowance_autoid').val(data.autoid);
            $("#allowance_type option[value='"+ data.allowance_type +"']").attr("selected", "selected");
            $("#allowance_type1 option[value='"+ data.type +"']").attr("selected", "selected");
            
            $('#allowance_title').val(data.title);
            
            $('#allowance_amount').val(data.amount);
            $("#myModal1").modal("show");
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        alert('Error adding / update data');
        }
    });
});

$(".edit_commission").click(function(){
    var id = $(this).attr("data-id");
    $(".modal_title").text('Edit');
    $("#commission_submit").val('Update');
    var url = 'ajax_request/get_commission.php';
    $.ajax({
        url : url,
        type: "POST",
        data: {id : id},
        dataType: "JSON",
        success: function(data)
        {
        //if success close modal and reload ajax table
            $('#commission_autoid').val(data.autoid);
            $("#commission_type option[value='"+ data.allowance_type +"']").attr("selected", "selected");
            
            $('#commission_title').val(data.title);
           
            $('#commission_amount').val(data.amount);
            $("#myModal2").modal("show");
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        alert('Error adding / update data');
        }
    });
});

$(".edit_loan").click(function(){
    var id = $(this).attr("data-id");
    $(".modal_title").text('Edit');
    $("#loan_submit").val('Update');
    var url = 'ajax_request/get_loan.php';
    $.ajax({
        url : url,
        type: "POST",
        data: {id : id},
        dataType: "JSON",
        success: function(data)
        {
        //if success close modal and reload ajax table
            $('#loan_autoid').val(data.autoid);
            $("#loan_type option[value='"+ data.type +"']").attr("selected", "selected");
            $("#loan_option option[value='"+ data.loan_option +"']").attr("selected", "selected");
            
            $('#loan_title').val(data.title);
           
            $('#loan_amount').val(data.amount);
            $('#loan_reason').val(data.reason);
            $("#myModal3").modal("show");
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        alert('Error adding / update data');
        }
    });
});
$(".edit_deduction").click(function(){
    var id = $(this).attr("data-id");
    $(".modal_title").text('Edit');
    $("#deduction_submit").val('Update');
    var url = 'ajax_request/get_deduction.php';
    $.ajax({
        url : url,
        type: "POST",
        data: {id : id},
        dataType: "JSON",
        success: function(data)
        {
        //if success close modal and reload ajax table
            $('#deduction_autoid').val(data.autoid);
            $("#deduction_type option[value='"+ data.type +"']").attr("selected", "selected");
            $("#deduction_option option[value='"+ data.deduction_option +"']").attr("selected", "selected");
            
            $('#deduction_title').val(data.title);
           
            $('#deduction_amount').val(data.amount);
            $('#deduction_reason').val(data.reason);
            $("#myModal4").modal("show");
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        alert('Error adding / update data');
        }
    });
});

$(".edit_other_payment").click(function(){
    var id = $(this).attr("data-id");
    $(".modal_title").text('Edit');
    $("#other_payment_submit").val('Update');
    var url = 'ajax_request/get_other_payment.php';
    $.ajax({
        url : url,
        type: "POST",
        data: {id : id},
        dataType: "JSON",
        success: function(data)
        {
        //if success close modal and reload ajax table
            $('#other_payment_autoid').val(data.autoid);
           
            $('#other_payment_title').val(data.title);
           
            $('#other_payment_amount').val(data.amount);
            $('#other_payment_reason').val(data.reason);
            $("#myModal5").modal("show");
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        alert('Error adding / update data');
        }
    });
});

$(".edit_overtime").click(function(){
    var id = $(this).attr("data-id");
    $(".modal_title").text('Edit');
    $("#overtime_submit").val('Update');
    var url = 'ajax_request/get_overtime.php';
    $.ajax({
        url : url,
        type: "POST",
        data: {id : id},
        dataType: "JSON",
        success: function(data)
        {
        //if success close modal and reload ajax table
            $('#overtime_autoid').val(data.autoid);
            $('#overtime_title').val(data.title);
            $('#overtime_days').val(data.days);
           
            $('#overtime_hours').val(data.hours);
            $('#overtime_rate').val(data.rate);
            $("#myModal7").modal("show");
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        alert('Error adding / update data');
        }
    });
});