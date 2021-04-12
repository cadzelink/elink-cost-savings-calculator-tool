<!DOCTYPE html>
<html>
    <head>
        <title>Product Savings Calculator V1.0</title>
        <link rel="stylesheet" href="/media/css/bootstrap.css">
        <link rel="stylesheet" href="/media/css/select2.min.css">
        <link rel="stylesheet" href="/media/css/custom.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table id="main-table" class="table table-bordered">
                        <tr>
                            <td class="right bold" colspan="5">Discount</td>
                            <td class="right" style="min-width: 100px;"><input id="discount_com" type="text" maxlength="3" class="w-60px">&nbsp;%</td>
                        </tr>
                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="solid s-blue text-white bg-danger center bold" colspan="3">Actual Price</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td id="actual-clmn" class="border border-danger bold center middle" rowspan="5" colspan="3"></td>
                            <td><input type="hidden" id="gross_hidden_val" value="0"></td>
                            <td class="bg-danger text-white right bold" style="min-width: 100px;">Gross</td>
                            <td id="gross-clmn" class="right bold">$0.00</td>
                        </tr>
                        <tr>
                            <td><input id="partial_hidden_txt" type="hidden" value="0"></td>
                            <td class="bg-danger text-white right bold">Partial Net</td>
                            <td id="partial-clmn" class="right bold">$0.00</td>
                        </tr>
                        <tr>
                            <td><input type="hidden" id="total_hidden_net" value="0"></td>
                            <td class="text-white right bold" style="background-color: #d82139;">Total Net</td>
                            <td id="total-clmn" class="right bold">$0.00</td>
                        </tr>
                        <tr>
                            <td><input type="hidden" id="hidden_savings" value="0"></td>
                            <td class="text-white right bold" style="background-color: #d82139;">Savings</td>
                            <td id="savings-clmn" class="right bold">$0.00</td>
                        </tr>
                        <tr>
                            <td><input type="hidden" id="hidden_percentage" value="0"></td>
                            <td class="bg-danger text-white right bold">%</td>
                            <td id="percent-clmn" class="right bold">0%</td>
                        </tr>
                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                            <th class="bg-danger text-white center" style="min-width: 100px;">#</th>
                            <th class="bg-danger text-white center">Product</th>
                            <th class="bg-danger text-white center" style="min-width: 70px;">Quantity</th>
                            <th class="bg-danger text-white center" style="min-width: 100px;">Gross</th>
                            <th class="bg-danger text-white center">Net</th>
                            <th class="bg-danger text-white center">Price</th>
                        </tr>
                        <tbody id="body-calc">
                            <tr id="row-1" data-row="1">
                                <td class="center">Product 1</td>
                                <td id="init-select" class="center"></td>
                                <td class="center"><input id="quan-1" type="text" class="quan-check w-60px"></td>
                                <td id="gross-com-1" class="gross-com right" data-com_val_gross="0" data-prod_gross="0" data-prod_net="0" data-prod_desc=""></td>
                                <td class="net-com right"></td>
                                <td id="price_netcom_1" class="price-com right" data-com_priceNetCom="0"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <div class="row">
                                        <div class="col-6 right"><button type="button" class="btn btn-danger add-prod">Add Product</button></div>
                                        <div class="col-6">
                                            <form id="process_pdf" method="post" action="generate.php" target="_blank">
                                                <input id="form_obj_holder" type="hidden" name="form_obj" value="">
                                                <input type="submit" name="submitForm" class="btn btn-danger" value="Generate PDF">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <!--
            https://jonsuh.com/blog/javascript-templating-without-a-library/
            For Native JS Templating
        
            https://www.w3resource.com/javascript-exercises/javascript-math-exercise-39.php
            Math Exercise
        -->
        <script src="/media/js/bootstrap.js"></script>
        <script src="/media/js/jquery-3.6.0.js"></script>
        <script src="/media/js/select2.min.js"></script>
        
        <script id="tr-row-scr" type="text/template">
            <tr id="row-{{id}}" data-row="{{id}}">
                <td class="center">Product {{id}}</td>
                <td id="col-ctr-{{id}}" class="center"></td>
                <td class="center"><input id="quan-{{id}}" type="text" class="quan-check w-60px"></td>
                <td id="gross-com-{{id}}" class="right gross-com" data-com_val_gross="0" data-prod_gross="0" data-prod_net="0" data-prod_desc=""></td>
                <td class="right net-com"></td>
                <td id="price_netcom_{{id}}" class="right price-com" data-com_priceNetCom="0"></td>
            </tr>
        </script>
        
        <script id="product-row-scr" type="text/template">
            <select id="select-{{id}}">
                <option value="0" data-net="0">Select Product</option>
            <?php 
                require_once 'lib/conn.php';
                $mysql = new Conn();
                $results = $mysql->getResults("SELECT * FROM `calculator` ORDER BY `product` ASC");
                foreach($results as $result):
            ?>
                <option value="<?php echo $result->gross ?>" data-net="<?php echo $result->net ?>"><?php echo $result->product ?></option>
            <?php
                endforeach;
                $mysql->close();
            ?>
            </select>
        </script>
        
        <script type="text/javascript">
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
                var net = $("#select-" + row).find(":selected").data("net");
                var desc = $("#select-" + row).find(":selected").text();
                var price = net * quan;
                
                $("#gross-com-" + row).attr('data-com_val_gross',gross_total);
                $("#gross-com-" + row).attr('data-prod_gross',gross);
                $("#gross-com-" + row).attr('data-prod_net',net);
                $("#gross-com-" + row).attr('data-prod_desc',desc);
                $("#price_netcom_" + row).attr('data-com_priceNetCom',price);
                $("#row-" + row + " .gross-com").html(gross_total.toFixed(2));
                $("#row-" + row + " .net-com").html(net);
                $("#row-" + row + " .price-com").html(price.toFixed(2));
                
                var i = 0;
                var final_gross = 0;
                var partial_net = 0;
                
                for(i = 1; i <= num_count; i++){
                    final_gross = parseFloat(final_gross) + parseFloat($("#gross-com-" + i).attr('data-com_val_gross'));
                    partial_net = parseFloat(partial_net) + parseFloat($("#price_netcom_" + i).attr('data-com_priceNetCom'));
                }
                $("#partial_hidden_txt").val(partial_net);
                $("#gross_hidden_val").val(final_gross);
                $("#gross-clmn").html("$" + final_gross.toFixed(2));
                $("#partial-clmn").html("$" + partial_net.toFixed(2));
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
                $("#total-clmn").html("$" + total_net.toFixed(2));
                $("#actual-clmn").html("$" + numFormat(total_net.toFixed(2)));
                $("#savings-clmn").html("$" + savings.toFixed(2));
                $("#percent-clmn").html("$" + percentage.toFixed(1) + "%");
            }
            
            function numFormat(num){
                var num_parts = num.toString().split(".");

                num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                return num_parts.join(".");
            }
        </script>
    </body>
</html>