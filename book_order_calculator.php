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
                            <a class="nav-link bold" href="/book_price_calculator.php">Book Price Calculator</a>
                            <a class="nav-link bold" href="/products_and_services.php">Products & Services</a>
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
            <!-- <div class="shadow-none p-3 mb-5 bg-light rounded">We are still in development stage and in Beta Testing of our Sales Calculators. This Project is hosted in our Testing and Development Server (192.168.1.44). We will deploy this to the Final Production Server after the Final Approval of this Project from Our Sales Manager. Thank you.</div> -->
        </div>
        <script src="/media/js/bootstrap.js"></script>
        <script src="/media/js/jquery-3.6.0.js"></script>
        <script src="/media/js/select2.min.js"></script>
        <script src="/media/js/lib.js"></script>
        <script src="/media/js/book_order.js"></script>
    </body>
</html>