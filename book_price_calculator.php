<!DOCTYPE html>
<html>
    <head>
        <title>Book Price Calculator V1.0</title>
        <link rel="stylesheet" href="/media/css/bootstrap.css">
        <link rel="stylesheet" href="/media/css/select2.min.css">
        <link rel="stylesheet" href="/media/css/custom.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    <a class="nav-link bold" href="/">Product Savings Calculator</a>
                                    <a class="nav-link bold" href="/book_order_calculator.php">Book Order Calculator</a>
                                    <a class="nav-link bold" aria-current="page" href="/editorial-services.php">Editorial Services Calculator</a>
                                    <a class="nav-link bold active underline" aria-current="page" href="/book_price_calculator.php">Book Price Calculator</a>
                                    <a class="nav-link bold" href="/products_and_services.php">Products & Services</a>
                                    <a class="nav-link bold" href="./user/">Login User</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table id="main-table" class="table table-bordered">
                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="solid s-blue text-white bg-danger center bold" colspan="3">Actual Price</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td id="actual-clmn" class="border border-danger bold center middle" rowspan="5" colspan="3" style="font-size: 45px;"></td>
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
                            <td colspan="6">Page Count: &nbsp;&nbsp;<input type="text" id="txt_page_count"></td>
                        </tr>
                        <tr>
                            <th class="bg-danger text-white center" style="min-width: 100px;">Book Type</th>
                            <th class="bg-danger text-white center">Cover Cost</th>
                            <th class="bg-danger text-white center">Cost per Page</th>
                            <th class="bg-danger text-white center">x</th>
                            <th class="bg-danger text-white center">w/Cover</th>
                            <th class="bg-danger text-white center">Retail Price</th>
                        </tr>
                        <tbody id="body-calc">
                            <tr id="row-1" data-row="1">
                                <td id="init-select" class="center"></td>
                                <td id="cover_cost" class="center"></td>
                                <td id="cost_per_page" class="center"></td>
                                <td id="gross-com-1" class="gross-com center" data-com_val_gross="0" data-prod_gross="0" data-prod_net="0" data-prod_desc="" data-unit=""></td>
                                <td id="with_cover" class="net-com center"></td>
                                <td id="price_netcom_1" class="price-com right" data-com_priceNetCom="0"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <div class="row">
                                        <div class="col-6"></div>
                                        <div class="col-3 right"></div>
                                        <div class="col-3">
                                            <form id="process_pdf" method="post" action="generate.php" target="_blank">
                                                <input id="form_obj_holder" type="hidden" name="form_obj" value="">
                                                <input type="hidden" id="for_discount_info" value="0">
                                                <input type="submit" name="submitFormIndex" class="btn btn-danger" value="Generate PDF">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                         
                            <tr>
                                <td colspan="6">
                                    <div class="row font_c h_red">
                                        <div class="col-sm-2 bold">Terms</div>
                                        <div class="col-sm-10 bold">Definition</div>
                                    </div>
                                    <div class="row font_c">
                                        <div class="col-sm-2 bold h_gray">Gross</div>
                                        <div class="col-sm-10 h_gray">Sum price of ala carte service; including complimentary service; without  discount</div>
                                    </div>
                                    <div class="row font_c">
                                        <div class="col-sm-2 bold h_gray">Partial Net</div>
                                        <div class="col-sm-10 h_gray">Sum price of discounted bundle; without discount</div>
                                    </div>
                                    <div class="row font_c">
                                        <div class="col-sm-2 bold h_gray">Total Net</div>
                                        <div class="col-sm-10 h_gray">Sum price of all services which author shall pay aka Actual Price; discounted</div>
                                    </div>
                                    <div class="row font_c">
                                        <div class="col-sm-2 bold h_gray">Savings</div>
                                        <div class="col-sm-10 h_gray">Sum of discount given </div>
                                    </div>
                                    <div class="row font_c">
                                        <div class="col-sm-2 bold h_gray">%</div>
                                        <div class="col-sm-10 h_gray">Savings versus actual price</div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
            <!-- <div class="shadow-none p-3 mb-5 bg-light rounded">We are still in development stage and in Beta Testing of our Sales Calculators. This Project is hosted in our Testing and Development Server (192.168.1.44). We will deploy this to the Final Production Server after the Final Approval of this Project from Our Sales Manager. Thank you.</div> -->
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
         <script src="/media/js/lib.js"></script>
        
        <script id="product-row-scr" type="text/template">
            <select id="select-{{id}}" style="width: 300px;">
                <option data-package="" data-cover="" data-cover_cost="0" data-cost_per_page="0">Select Product</option>
            <?php 
                require_once 'lib/conn.php';
                $mysql = new Conn();
                $results = $mysql->getResults("SELECT * FROM `book_price` ORDER BY `id` ASC");
                foreach($results as $result):
            ?>
                <option data-package="<?php echo $result->package ?>" data-cover="<?php echo $result->cover ?>" data-cover_cost="<?php echo $result->cover_cost ?>" data-cost_per_page="<?php echo $result->cost_per_page ?>"><?php echo $result->package." - ".$result->cover." - ".$result->size ?></option>
            <?php
                endforeach;
                $mysql->close();
            ?>
            </select>
        </script>
        
        <script type="text/javascript">
            var num_count = 1;
            var book_type = "";
            var cover_cost = 0;
            var cost_per_page = 0;
            var x_val = 0;
            var w_cover;
            
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
                        cover_cost      : cover_cost,
                        desc            : book_type,
                        cost_per_page   : cost_per_page,
                        x               : x_val,
                        w_cover         : w_cover
                    };
                    products.push(product);
                }
                var pdf_obj = {
                    products        : products,
                    count           : num_count,
                    gross_sales     : $("#gross_hidden_val").val() ? parseFloat($("#gross_hidden_val").val()) : 0,
                    partial_net     : $("#partial_hidden_txt").val() ? parseFloat($("#partial_hidden_txt").val()) : 0,
                    total_net       : $("#total_hidden_net").val() ? parseFloat($("#total_hidden_net").val()) : 0,
                    savings         : $("#hidden_savings").val() ? parseFloat($("#hidden_savings").val()) : 0,
                    percentage      : $("#hidden_percentage").val() ? parseFloat($("#hidden_percentage").val()) : 0,
                    discount        : $("#discount_com").val() ? $("#discount_com").val() : 0,
                    for_discount    : parseInt($("#for_discount_info").val()),
                    editorial       : 2
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

           
            function computePrice(){
                cover_cost = $("#select-1").find(":selected").data("cover_cost");
                cost_per_page = $("#select-1").find(":selected").data("cost_per_page");
                x_val = ($("#txt_page_count").val() ? parseInt($("#txt_page_count").val()) : 0) * cost_per_page;
                w_cover = cover_cost + x_val;
                var retail = w_cover/(30/100);

                book_type = $("#select-1").find(":selected").text();
                $("#cover_cost").html("$"+cover_cost);
                $("#cost_per_page").html("$"+cost_per_page+"/page");
                $("#gross-com-1").html(parseFloat(x_val).toFixed(2));
                $("#with_cover").html("$" + parseFloat(w_cover).toFixed(2));
                $("#price_netcom_1").html("$" + retail.toFixed(2));

                $("#gross-clmn").html("$" + retail.toFixed(2));
                $("#partial-clmn").html("$" + retail.toFixed(2));
                $("#total-clmn").html("$" + retail.toFixed(2));
                $("#actual-clmn").html("$" + retail.toFixed(2));

                $("#gross_hidden_val").val(retail);
                $("#partial_hidden_txt").val(retail);
                $("#total_hidden_net").val(retail);
                $("#discount_com").val(0);
                $("#hidden_savings").val(0)
            }
            
            function initSelect(){
                $("#select-" + num_count).select2();
                $("#select-" + num_count).change(function(){
                    computePrice();
                });
                $("#txt_page_count").on('keyup',function(){
                    computePrice();
                });
            }
            
        </script>
    </body>
</html>