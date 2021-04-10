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
                            <td class="right" style="min-width: 100px;"><input type="text" maxlength="3" class="w-60px">&nbsp;%</td>
                        </tr>
                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="solid s-blue text-white bg-primary center bold" colspan="3">Actual Price</td>
                            <td id="actual-clmn" colspan="3"></td>
                        </tr>
                        <tr>
                            <td class="border border-primary" rowspan="5" colspan="3"></td>
                            <td></td>
                            <td class="bg-primary text-white right bold" style="min-width: 100px;">Gross</td>
                            <td id="gross-clmn" class="right bold">$0.00</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="bg-primary text-white right bold">Partial Net</td>
                            <td id="partial-clmn" class="right bold">$0.00</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="bg-success text-white right bold">Total Net</td>
                            <td id="total-clmn" class="right bold">$0.00</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="bg-success text-white right bold">Savings</td>
                            <td id="savings-clmn" class="right bold">$0.00</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="bg-primary text-white right bold">%</td>
                            <td id="percent-clmn" class="right bold">0%</td>
                        </tr>
                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                            <th class="bg-primary text-white center" style="min-width: 100px;">#</th>
                            <th class="bg-primary text-white center">Product</th>
                            <th class="bg-primary text-white center" style="min-width: 70px;">Quantity</th>
                            <th class="bg-primary text-white center" style="min-width: 100px;">Gross</th>
                            <th class="bg-primary text-white center">Net</th>
                            <th class="bg-primary text-white center">Price</th>
                        </tr>
                        <tbody id="body-calc">
                            <tr id="row-1" data-row="1">
                                <td class="center">Product 1</td>
                                <td id="init-select" class="center"></td>
                                <td class="center"><input id="quan-1" type="text" class="quan-check w-60px"></td>
                                <td class="gross-com right"></td>
                                <td class="net-com right"></td>
                                <td class="price-com right"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="center">
                                    <button type="button" class="btn btn-success add-prod">Add Product</button>
                                    <button type="button" class="btn btn-danger">Remove Product</button>
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
            For JS Templating
        -->
        <script src="/media/js/bootstrap.js"></script>
        <script src="/media/js/jquery-3.6.0.js"></script>
        <script src="/media/js/select2.min.js"></script>
        
        <script id="tr-row-scr" type="text/template">
            <tr id="row-{{id}}" data-row="{{id}}">
                <td class="center">Product {{id}}</td>
                <td id="col-ctr-{{id}}" class="center"></td>
                <td class="center"><input id="quan-{{id}}" type="text" class="quan-check w-60px"></td>
                <td class="gross-com right"></td>
                <td class="net-com right"></td>
                <td class="price-com right"></td>
            </tr>
        </script>
        
        <script id="product-row-scr" type="text/template">
            <select id="select-{{id}}" class="form-control select2">
                <option value="0" data-net="0">Select Product</option>
            <?php 
                include_once 'lib/conn.php';
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
            
            function computePrice(obj){
                var row = $(obj).closest('td').closest('tr').data('row');
                var quan = $("#quan-" + row).val();
                var gross = $("#select-" + row).val();
                var gross_total = gross * quan;
                var net = $("#select-" + row).find(":selected").data("net")
                var price = net * quan;
                
                $("#row-" + row + " .gross-com").html(gross_total.toFixed(2));
                $("#row-" + row + " .net-com").html(net);
                $("#row-" + row + " .price-com").html(price.toFixed(2));
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
            
        </script>
    </body>
</html>