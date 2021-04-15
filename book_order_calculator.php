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
            <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="/">Product Savings Calculator</a>
                            <a class="nav-link  bold active underline" aria-current="page" href="/book_order_calculator.php">Book Order Calculator </a>
                            <a class="nav-link bold" href="/editorial-services.php">Editorial Services Calculator</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table id="main-table" class="table table-bordered">
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
                                            <form id="process_pdf" method="post" action="generate.php" target="_blank">
                                                <input id="inObjectForm" type="hidden" name="bookOBJ" value="">
                                                <input type="submit" name="submitFormBookOrder" class="btn btn-danger" value="Generate PDF">
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
        <script src="/media/js/bootstrap.js"></script>
        <script src="/media/js/jquery-3.6.0.js"></script>
        <script src="/media/js/select2.min.js"></script>
        <script src="/media/js/lib.js"></script>

        <script type="text/javascript">
            var discount_paper = 0;
            var discount_hard = 0;
            var grand_total = {paper : 0, hard : 0};
            var grand_quan = {paper : 0, hard : 0}
            var grand_price = {paper : 0, hard : 0};
            var grand_shipping = {paper : 0, hard : 0};

            $(function(){
                $("#paper_row").hide();
                $("#hard_row").hide();
                $("#generate_row").hide();
            });

            $("#process_pdf").submit(function(e){
                var obj = {
                    type        : $("#order_type").val(),
                    discount    : {
                        paper   : discount_paper,
                        hard    : discount_hard
                    },
                    quantity    : grand_quan,
                    price       : grand_price,
                    shipping    : grand_shipping,
                    total       : grand_total
                };

                $("#inObjectForm").val(JSON.stringify(obj));
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
                grand_quan.paper = val;

                $("#paper_avd").html(discount_paper + "%")

                if(price > 0){
                    var quan = $(this).val() ? parseInt($(this).val()) : 0;
                    var shipping = $("#paper_shipping").val() ? parseFloat($("#paper_shipping").val()) : 0;
                    var dis = discount_paper / 100;
                    var total = quan * price - (quan * price * dis) + shipping;
                    grand_total.paper = total;

                    $("#paper_total").html("$" + numFormat(total.toFixed(2)));
                }
            });

            $("#hard_quan").on('keyup',function(){
                var val = $(this).val() ? parseInt($(this).val()) : 0;
                var price = $("#hard_price").val() ? parseFloat($("#hard_price").val()) : 0;
                var discount = {};
                discount= getDiscount(val);
                discount_hard = discount.hardcover ;
                grand_quan.hard = val;

                $("#hard_avd").html(discount.hardcover + "%")

                if(price > 0){
                    var quan = $(this).val() ? parseInt($(this).val()) : 0;
                    var shipping = $("#hard_shipping").val() ? parseFloat($("#hard_shipping").val()) : 0;
                    var dis = discount_hard / 100;
                    var total = quan * price - (quan * price * dis) + shipping;
                    grand_total.hard = total;

                    $("#hard_total").html("$" + numFormat(total.toFixed(2)));
                }
            });

            $("#paper_price").on('keyup',function(){
                var paper_quan = $("#paper_quan").val() ? parseInt($("#paper_quan").val()) : 0;
                var price = $(this).val() ? parseFloat($(this).val()) : 0;
                grand_price.paper = price;

                if(paper_quan > 0){
                    var shipping = $("#paper_shipping").val() ? parseFloat($("#paper_shipping").val()) : 0;
                    var dis = discount_paper / 100;
                    var total = paper_quan * price - (paper_quan * price * dis) + shipping;
                    grand_total.paper = total;

                    $("#paper_total").html("$" + numFormat(total.toFixed(2)));
                }
            });

            $("#hard_price").on('keyup',function(){
                var hard_quan = $("#hard_quan").val() ? parseInt($("#hard_quan").val()) : 0;
                var price = $(this).val() ? parseFloat($(this).val()) : 0;
                grand_price.hard = price;

                if(hard_quan > 0){
                    var shipping = $("#hard_shipping").val() ? parseFloat($("#hard_shipping").val()) : 0;
                    var dis = discount_hard / 100;
                    var total = hard_quan * price - (hard_quan * price * dis) + shipping;
                    grand_total.hard = total;

                    $("#hard_total").html("$" + numFormat(total.toFixed(2)));
                }
            });

            $("#paper_shipping").on('keyup',function(){
                var paper_quan = $("#paper_quan").val() ? parseInt($("#paper_quan").val()) : 0;
                var price = $("#paper_price").val() ? parseFloat($("#paper_price").val()) : 0;
                var shipping = $(this).val() ? parseFloat($(this).val()) : 0;
                var dis = discount_paper / 100;
                var total = paper_quan * price - (paper_quan * price * dis) + shipping;
                grand_total.paper = total;
                grand_shipping.paper = shipping;

                $("#paper_total").html("$" + numFormat(total.toFixed(2)));
            });

            $("#hard_shipping").on('keyup',function(){
                var hard_quan = $("#hard_quan").val() ? parseInt($("#hard_quan").val()) : 0;
                var price = $("#hard_price").val() ? parseFloat($("#hard_price").val()) : 0;
                var shipping = $(this).val() ? parseFloat($(this).val()) : 0;
                var dis = discount_hard / 100;
                var total = hard_quan * price - (hard_quan * price * dis) + shipping;
                grand_total.hard = total;
                grand_shipping.hard = shipping;

                $("#hard_total").html("$" + numFormat(total.toFixed(2)));
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
        </script>
    </body>
</html>