<!DOCTYPE html>
<html>
    <head>
        <title>Product Savings Calculator V1.0</title>
        <link rel="stylesheet" href="/media/css/bootstrap.css">
        <link rel="stylesheet" href="/media/css/custom.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr class="noborder">
                            <td class="noborder right" colspan="5">Discount</td>
                            <td class="noborder right"><input type="text" class="form-control w-2" maxlength="3">%</td>
                        </tr>
                        <tr class="noborder">
                            <td class="noborder" colspan="6">&nbsp;</td>
                        </tr>
                        <tr class="noborder">
                            <td class="bg-primary text-white solid b-blue center" colspan="3">Actual Price</td>
                            <td colspan="3" class="noborder"></td>
                        </tr>
                        <tr class="noborder">
                            <td class="border border-primary" rowspan="5" colspan="3"></td>
                            <td class="noborder right" colspan="2">Gross</td>
                            <td class="noborder right">$0.00</td>
                        </tr>
                        <tr class="noborder">
                            <td class="noborder right" colspan="2">Partial Net</td>
                            <td class="noborder right">$0.00</td>
                        </tr>
                        <tr class="noborder">
                            <td class="noborder right" colspan="2">Total Net</td>
                            <td class="noborder right">$0.00</td>
                        </tr>
                        <tr class="noborder">
                            <td class="noborder right" colspan="2">Partial Net</td>
                            <td class="noborder right">$0.00</td>
                        </tr>
                        <tr class="noborder">
                            <td class="noborder right" colspan="2">%</td>
                            <td class="noborder right">0%</td>
                        </tr>
                        <tr class="noborder">
                            <td class="noborder" colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                            <th class="bg-primary text-white center">#</th>
                            <th class="bg-primary text-white center">Product</th>
                            <th class="bg-primary text-white center">Quantity</th>
                            <th class="bg-primary text-white center">Gross</th>
                            <th class="bg-primary text-white center">Net</th>
                            <th class="bg-primary text-white center">Price</th>
                        </tr>
                        <tr>
                            <td class="center">Product 1</td>
                            <td class="center">
                                <select class="form-control">
                                    <option value="4247" data-net="1499">2021 Virtual Book Tour</option>
                                    <option value="650" data-net="650">TFOS</option>
                                    <option value="650" data-net="650">LATFOB</option>
                                    <option value="650" data-net="650">NYLA</option>
                                    <option value="1197" data-net="1197">WTO (3 months)</option>
                                    <option value="4297" data-net="2799">Indie Book Trio</option>
                                    <option value="1299" data-net="1299">BlueInk Review</option>
                                    <option value="1299" data-net="1299">Foreword Review</option>
                                    <option value="650" data-net="650">Kirkus Review</option>
                                    <option value="1750" data-net="499">2021 TFOS - Starter</option>
                                    <option value="1100" data-net="1100">London Book Fair</option>
                                </select>
                            </td>
                            <td class="center"><input type="text" class="form-control w-2"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <script src="/media/js/bootstrap.js"></script>
        <script src="/media/js/jquery-3.6.0.js"></script>
    </body>
</html>