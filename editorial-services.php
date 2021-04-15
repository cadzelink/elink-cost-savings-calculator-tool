<!DOCTYPE html>
<html>
    <head>
        <title>Editorial Services Calculator V1.0</title>
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
                                    <a class="nav-link bold active underline" aria-current="page" href="/editorial-services.php">Editorial Services Calculator</a>
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
                                <td id="gross-com-1" class="gross-com right" data-com_val_gross="0" data-prod_gross="0" data-prod_net="0" data-prod_desc="" data-unit=""></td>
                                <td class="net-com right"></td>
                                <td id="price_netcom_1" class="price-com right" data-com_priceNetCom="0"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <div class="row">
                                        <div class="col-6"></div>
                                        <div class="col-3 right"><button type="button" class="btn btn-danger add-prod">Add Product</button></div>
                                        <div class="col-3">
                                            <form id="process_pdf" method="post" action="generate.php" target="_blank">
                                                <input id="form_obj_holder" type="hidden" name="form_obj" value="">
                                                <input type="hidden" id="for_discount_info" value="0">
                                                <input type="submit" name="submitFormIndex" class="btn btn-danger" value="Generate PDF">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">&nbsp;</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">&nbsp;</div>
                                    </div>
                                    <div class="row font_c h_red">
                                        <div class="col-sm-2 bold">Terms</div>
                                        <div class="col-sm-10 bold">Definition</div>
                                    </div>
                                    <div class="row font_c">
                                        <div class="col-sm-2 bold h_gray">Gross</div>
                                        <div class="col-sm-10 h_gray">Sum price of ala carte service ; including complimentary service ; without  discount</div>
                                    </div>
                                    <div class="row font_c">
                                        <div class="col-sm-2 bold h_gray">Partial Net</div>
                                        <div class="col-sm-10 h_gray">Sum price of discounted bundle ; without discount</div>
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
            <div class="shadow-none p-3 mb-5 bg-light rounded">We are still in development stage and in Beta Testing of our Sales Calculators. This Project is hosted in our Testing and Development Server (192.168.1.44). We will deploy this to the Final Production Server after the Final Approval of this Project from Our Sales Manager. Thank you.</div>
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
        
        <script id="tr-row-scr" type="text/template">
            <tr id="row-{{id}}" data-row="{{id}}">
                <td class="center">Product {{id}}</td>
                <td id="col-ctr-{{id}}" class="center"></td>
                <td class="center"><input id="quan-{{id}}" type="text" class="quan-check w-60px"></td>
                <td id="gross-com-{{id}}" class="right gross-com" data-com_val_gross="0" data-prod_gross="0" data-prod_net="0" data-prod_desc="" data-unit=""></td>
                <td class="right net-com"></td>
                <td id="price_netcom_{{id}}" class="right price-com" data-com_priceNetCom="0"></td>
            </tr>
        </script>
        
        <script id="product-row-scr" type="text/template">
            <select id="select-{{id}}" style="width: 300px;">
                <option value="0" data-net="0">Select Product</option>
            <?php 
                require_once 'lib/conn.php';
                $mysql = new Conn();
                $results = $mysql->getResults("SELECT * FROM `calculator` where `type` = 1 ORDER BY `id` ASC");
                foreach($results as $result):
            ?>
                <option value="<?php echo $result->gross ?>" data-net="<?php echo $result->net ?>" data-unit="<?php echo $result->unit ?>"><?php echo $result->product ?></option>
            <?php
                endforeach;
                $mysql->close();
            ?>
            </select>
        </script>
        
        <script src="/media/js/custom.js"></script>
    </body>
</html>