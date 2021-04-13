<!DOCTYPE html>
<html>
    <head>
        <title>Book Order Calculator V1.0</title>
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
                            <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <select id="order_type" class="form-control text-danger bold center w-80">
                                    <option value="0">Select Order Type</option>
                                    <option value="1">Paperback</option>
                                    <option value="2">Hardcover</option>
                                    <option value="3">Both</option>
                                </select>
                            </td>
                            <td colspan="5">&nbsp;</td>
                        </tr>
                        <tr>
                            <th class="bg-danger text-white center" style="min-width: 100px;">Product</th>
                            <th class="bg-danger text-white center">Quantity of Books</th>
                            <th class="bg-danger text-white center">Book Price</th>
                            <th class="bg-danger text-white center">AVD%</th>
                            <th class="bg-danger text-white center">Shipping Fee</th>
                            <th class="bg-danger text-white center">Total</th>
                        </tr>
                        <tbody id="body-calc">
                            <tr id="paper_row">
                                <td class="center bold">Paperback Order</td>
                                <td class="center"><input type="text" class="form-control w-80" id="paper_quan"></td>
                                <td class="center"><input type="text" class="form-control w-80" id="paper_price"></td>
                                <td class="center bold" id="paper_avd"></td>
                                <td class="center"><input type="text" class="form-control w-80" id="paper_shipping"></td>
                                <td id="paper_total" class="center bold"></td>
                            </tr>
                            <tr id="hard_row">
                                <td class="center bold">Hardcover Order</td>
                                <td><input type="text" class="form-control w-80" id="hard_quan"></td>
                                <td><input type="text" class="form-control w-80" id="hard_price"></td>
                                <td class="center bold" id="hard_avd"></td>
                                <td class="center"><input type="text" class="form-control w-80" id="hard_shipping"></td>
                                <td id="hard_total" class="center bold"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr id="generate_row">
                                <td colspan="6">
                                    <div class="row">
                                        <div class="col-12 center">
                                            <form id="process_pdf" method="post" action="#" target="_blank">
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
        
        <script type="text/javascript">
            var discount_paper = 0;
            var discount_hard = 0;

            $(function(){
                $("#paper_row").hide();
                $("#hard_row").hide();
                $("#generate_row").hide();
            });

            $("#order_type").change(function(){
                var val = parseInt($(this).val());

                switch(val){
                    case 0:
                        $("#paper_row").hide();
                        $("#hard_row").hide();
                        $("#generate_row").hide();
                    break;

                    case 1:
                        $("#paper_row").show();
                        $("#hard_row").hide();
                        $("#generate_row").show();
                    break;

                    case 2:
                        $("#paper_row").hide();
                        $("#hard_row").show();
                        $("#generate_row").show();
                    break;

                    case 3:
                        $("#paper_row").show();
                        $("#hard_row").show();
                        $("#generate_row").show();
                    break;
                }
            });

            $("#paper_quan").on('keyup',function(){
                var val = $(this).val() ? parseInt($(this).val()) : 0;
                var price = $("#paper_price").val() ? parseFloat($("#paper_price").val()) : 0;
                var discount = {};
                discount= getDiscount(val);
                discount_paper = parseInt(discount.paperback);

                $("#paper_avd").html(discount_paper + "%")

                if(price > 0){
                    var quan = $(this).val() ? parseInt($(this).val()) : 0;
                    var dis = discount_paper / 100;
                    var total = quan * price - (quan * price * dis);

                    $("#paper_total").html("$" + numFormat(total.toFixed(2)));
                }
            });

            $("#hard_quan").on('keyup',function(){
                var val = $(this).val() ? parseInt($(this).val()) : 0;
                var discount = {};
                discount= getDiscount(val);
                discount_hard = discount.hardcover ;

                $("#hard_avd").html(discount.hardcover + "%")
            });

            function getDiscount(dis){
                var obj_paper = 0;
                var obj_hard = 0;

                if(dis == 0){
                    obj_paper = 0;
                    obj_hard = 0;
                }else
                if(dis > 0 && dis < 25){
                    obj_paper = 30;
                    obj_hard = 20;
                }else
                if(dis > 24 && dis < 50){
                    obj_paper = 35;
                    obj_hard = 30;
                }else
                if(dis > 49 && dis < 100){
                    obj_paper = 40;
                    obj_hard = 35;
                }else
                if(dis > 99 && dis < 250){
                    obj_paper = 45;
                    obj_hard = 40;
                }else
                if(dis > 249 && dis < 500){
                    obj_paper = 50;
                    obj_hard = 45;
                }else
                if(dis > 499 && dis < 1000){
                    obj_paper = 55;
                    obj_hard = 50;
                }else{
                    obj_paper = 60;
                    obj_hard = 55;
                }

                return {
                    hardcover   : obj_hard,
                    paperback   : obj_paper
                }
            }

            function numFormat(num){
                var num_parts = num.toString().split(".");

                num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                return num_parts.join(".");
            }

        </script>
        

    </body>
</html>