var num_count = 1;
            
$(function(){
    var templateHtml = document.getElementById("product-row-scr").innerHTML; 
    templateHtml = templateHtml.replace(/{{id}}/g,num_count);
    $("#init-select").html(templateHtml);
    initSelect();
});

$("#process_pdf").submit(function(e){
    var i = 0;
    var products = [];
    var product = {};
    for(i = 1; i <= num_count; i++){
        var quantity = parseFloat($("#quan-" + i).val());
        product = {
            gross   : parseFloat($("#gross-com-" + i).attr('data-prod_gross')) * quantity,
            net     : $("#gross-com-" + i).attr('data-prod_net'),
            desc    : $("#gross-com-" + i).attr('data-prod_desc'),
            price   : parseFloat($("#gross-com-" + i).attr('data-prod_net')) * quantity,
            quan    : quantity
        };
        products.push(product);
    }
    var pdf_obj = {
        products    : products,
        count       : num_count,
        gross_sales : $("#gross_hidden_val").val() ? parseFloat($("#gross_hidden_val").val()) : 0,
        partial_net : $("#partial_hidden_txt").val() ? parseFloat($("#partial_hidden_txt").val()) : 0,
        total_net   : $("#total_hidden_net").val() ? parseFloat($("#total_hidden_net").val()) : 0,
        savings     : $("#hidden_savings").val() ? parseFloat($("#hidden_savings").val()) : 0,
        percentage  : $("#hidden_percentage").val() ? parseFloat($("#hidden_percentage").val()) : 0,
        discount    : $("#discount_com").val() ? $("#discount_com").val() : 0
    };
    
    $("#form_obj_holder").val(JSON.stringify(pdf_obj));
});

$(".add-prod").click(function(){
    num_count++;
    var templateHtml = document.getElementById("tr-row-scr").innerHTML; 
    templateHtml = templateHtml.replace(/{{id}}/g,num_count);
    $("#body-calc").append(templateHtml);
    templateHtml = document.getElementById("product-row-scr").innerHTML; 
    templateHtml = templateHtml.replace(/{{id}}/g,num_count);
    $("#col-ctr-" + num_count).html(templateHtml);
    initSelect();
});

$("#discount_com").on("keyup",function(){
    ComputeTotalNet()
});

function computePrice(obj){
    var row = $(obj).closest('td').closest('tr').data('row');
    var quan = $("#quan-" + row).val();
    var gross = $("#select-" + row).val();
    var gross_total = gross * quan;
    var net = parseFloat($("#select-" + row).find(":selected").data("net"));
    var desc = $("#select-" + row).find(":selected").text();
    var price = net * quan;
    
    $("#gross-com-" + row).attr('data-com_val_gross',gross_total);
    $("#gross-com-" + row).attr('data-prod_gross',gross);
    $("#gross-com-" + row).attr('data-prod_net',net);
    $("#gross-com-" + row).attr('data-prod_desc',desc);
    $("#price_netcom_" + row).attr('data-com_priceNetCom',price);
    $("#row-" + row + " .gross-com").html("$" + numFormat(gross_total.toFixed(2)));
    $("#row-" + row + " .net-com").html("$" + numFormat(net.toFixed(2)));
    $("#row-" + row + " .price-com").html("$" + numFormat(price.toFixed(2)));
    
    var i = 0;
    var final_gross = 0;
    var partial_net = 0;
    
    for(i = 1; i <= num_count; i++){
        final_gross = parseFloat(final_gross) + parseFloat($("#gross-com-" + i).attr('data-com_val_gross'));
        partial_net = parseFloat(partial_net) + parseFloat($("#price_netcom_" + i).attr('data-com_priceNetCom'));
    }
    $("#partial_hidden_txt").val(partial_net);
    $("#gross_hidden_val").val(final_gross);
    $("#gross-clmn").html("$" + numFormat(final_gross.toFixed(2)));
    $("#partial-clmn").html("$" + numFormat(partial_net.toFixed(2)));
    ComputeTotalNet()
}

function initSelect(){
    $("#select-" + num_count).select2();
    $("#select-" + num_count).change(function(){
        computePrice(this);
    });
    $("#quan-" + num_count).on('keyup',function(){
        computePrice(this);
    });
}

function ComputeTotalNet(){
    var partial = $("#partial_hidden_txt").val() ? parseFloat($("#partial_hidden_txt").val()) : 0;
    var discount = $("#discount_com").val() ? parseFloat($("#discount_com").val()) : 0;
    var gross = $("#gross_hidden_val").val() ? parseFloat($("#gross_hidden_val").val()) : 0; 
    var total_net = 0;
    var savings = 0;
    var percentage =0;
    
    total_net = partial - (partial * (discount / 100));
    savings = gross - total_net;
    percentage = savings > 0 ? savings/total_net * 100 : 0;
    $("#total_hidden_net").val(total_net);
    $("#hidden_savings").val(savings);
    $("#hidden_percentage").val(percentage);
    $("#total-clmn").html("$" + numFormat(total_net.toFixed(2)));
    $("#actual-clmn").html("$" + numFormat(total_net.toFixed(2)));
    $("#savings-clmn").html("$" + numFormat(savings.toFixed(2)));
    $("#percent-clmn").html(percentage.toFixed(1) + "%");
}