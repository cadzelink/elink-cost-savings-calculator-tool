<!DOCTYPE html>
<html>
    <head>
        <title>Editorial Services Calculator V1.001</title>
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
                                    <a class="nav-link bold" href="/book_price_calculator.php">Book Price Calculator</a>
                                    <a class="nav-link bold active underline" href="/products_and_services.php">Products & Services</a>
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
                            <th class="text-white center" style="min-width: 100px;">&nbsp;</th>
                            <th class="text-white center"></th>
                            <th class="text-white center" colspan="5"></th>
                        
                        </tr>
                        <tbody id="body-calc">
                            <tr id="row-1" data-row="1">
                                <td class="center">Select Product or Service</td>
                                <td>
                                    <select id="prods-and-services" style="width: 400px;">
                                        <option value="0">Select a Product or Service</option>
                                        <option value="1">Publishing - Black and White - Iron</option>
                                        <option value="2">Publishing - Black and White - Bronze</option>
                                        <option value="3">Publishing - Black and White - Silver</option>
                                        <option value="4">Publishing - Black and White - Gold</option>
                                        <option value="5">Publishing - Black and White - Platinum</option>
                                        
                                        <option value="6">Publishing - Full Color Books - Iron</option>
                                        <option value="7">Publishing - Full Color Books - Bronze</option>
                                        <option value="8">Publishing - Full Color Books - Silver</option>
                                        <option value="9">Publishing - Full Color Books - Gold</option>
                                        <option value="10">Publishing - Full Color Books - Platinum</option>
                                        
                                        <option value="11">Publishing - Children's Book - Folklore</option>
                                        <option value="12">Publishing - Children's Book - Fairytale</option>
                                        <option value="13">Publishing - Children's Book - Fantasy</option>
                                        
                                        <option value="14">Publishing - eBook - Conversion</option>
                                        
                                        <option value="15">Publishing Add-On Registration</option>
                                        <option value="16">Publishing Add-On Format - Hardcover Availability w/ ISBN</option>
                                        <option value="17">Publishing Add-On Format - Resubmission w/ ISBN (per version)</option>
                                        <option value="18">Publishing Add-On Format - Paper Gallery Service</option>
                                        <option value="19">Publishing Add-On Interior Illustration - Artistic</option>
                                        <option value="20">Publishing Add-On Interior Illustration x10 - Artistic</option>
                                        <option value="21">Publishing Add-On Interior Illustration x15 - Artistic</option>
                                        <option value="22">Publishing Add-On Interior Illustration - Vivid</option>
                                        <option value="23">Publishing Add-On Interior Illustration x10 - Vivid</option>
                                        <option value="24">Publishing Add-On Interior Illustration x15 - Vivid</option>
                                        <option value="25">Publishing Add-On Interior Illustration - Intricate</option> 
                                        <option value="26">Publishing Add-On Interior Illustration x10 - Intricate</option> 
                                        <option value="27">Publishing Add-On Interior Illustration x15 - Intricate</option>
                                        <option value="28">Publishing Add-On Basic Cover Design</option>
                                        <option value="29">Publishing Add-On Standard Cover Design</option>
                                        <option value="30">Publishing Add-On Advanced Cover Design</option>
                                        <option value="31">Publishing Add-On Interior - Image Enhancement (per image)</option>
                                        <option value="32">Publishing Add-On Interior - Additional Interior Image (per item)</option>
                                        <option value="33">Publishing Add-On Interior - Additional Interior Graphics & Tables (per item)</option>
                                        <option value="34">Publishing Add-On Interior - Basic Interior Text and Layout</option>
                                        <option value="35">Publishing Add-On Interior - Standard Interior Text and Layout</option>
                                        <option value="36">Publishing Add-On Interior - Advanced Interior Text and Layout</option>
                                        <option value="37">Publishing Add-On Interior - Revision - Interior Text (per word)</option>
                                        <option value="38">Publishing Add-On Editorial - Developmental Editing</option>
                                        <option value="39">Publishing Add-On Editorial - Copyediting 60,001 - 120,000</option>
                                        <option value="40">Publishing Add-On Editorial - Copyediting 120,001 and up</option>
                                        <option value="41">Publishing Add-On Editorial - Data Entry Service (per page)</option>
                                        <option value="42">Publishing Add-On Editorial - Data Entry Service-Handwritten (per page)</option>
                                        <option value="43">Publishing - Audiobook</option>
                                        <option value="44">Marketing - Online Brand Publicity - Silver</option>
                                        <option value="45">Marketing - Online Brand Publicity - Gold</option>
                                        <option value="46">Marketing - Online Brand Publicity - Platinum</option>
                                        
                                        <option value="47">Marketing - Dynamic Website - Basic</option>
                                        <option value="48">Marketing - Dynamic Website - Deluxe</option>
                                        <option value="49">Marketing - Dynamic Website - Premium</option>
                                        
                                        <option value="50">Marketing - Book Trailer - Teaser</option>
                                        <option value="51">Marketing - Book Trailer - Cinematic Standard</option>
                                        <option value="52">Marketing - Book Trailer - Trailer w/ Advertising</option>
                                        <option value="53">Marketing - Book Trailer - Cinematic Deluxe</option>
                                        
                                        <option value="54">Marketing - Book Review - Blueink Book</option>
                                        <option value="55">Marketing - Book Review - Foreword Clarion</option>
                                        <option value="56">Marketing - Book Review - Kirkus Indie</option>
                                        
                                        <option value="57">Marketing - Publishers Weekly - Single Slot</option>
                                        <option value="58">Marketing - Publishers Weekly - Double Slot</option>
                                        <option value="59">Marketing - Publishers Weekly - Half Page</option>
                                        <option value="60">Marketing - Publishers Weekly - Full Page</option>
                                        
                                        <option value="61">Marketing - Book Fairs - National</option>
                                        <option value="62">Marketing - Book Fairs - International</option>
                                        <option value="63">Marketing - Book Fairs - National Plus</option>
                                        <option value="64">Marketing - Book Fairs - International Plus</option>
                                        
                                        <option value="65">Marketing - Book Signing - National Book Signing</option>
                                        <option value="66">Marketing - Book Signing - Book Signing Plus</option>
                                        
                                        <option value="67">Marketing Materials (100)</option>
                                        <option value="68">Marketing Materials (100 Starter)</option>
                                        <option value="69">Marketing Materials (100 Pro )</option>
                                        <option value="70">Marketing Materials (250)</option>
                                        <option value="71">Marketing Materials (500)</option>
                                        
                                        <option value="72">Marketing - Press Release - Direct Media</option>
                                        <option value="73">Marketing - Press Release - Web Press Release</option>
                                        <option value="74">Marketing - Press Release - Web Press Release Plus</option>
                                        
                                        <option value="75">Marketing - Radio Interview with Ric Bratton - This Week In America</option>
                                        <option value="76">Marketing - Radio Interview with Kate Delaney - America Tonight Radio</option>
                                        <option value="77">Marketing - Radio Interview with Benjie Cole - CBS Radio</option>
                                        
                                        <option value="79">Marketing - New York Times Magazine Advertising - Full Page</option>
                                        <option value="80">Marketing - New York Times Magazine Advertising - Half Main Page</option>
                                        <option value="81">Marketing - New York Times Magazine Advertising - Half Page</option>
                                        <option value="82">Marketing - New York Times Magazine Advertising - RM Fourth</option>
                                        <option value="83">Marketing - New York Times Magazine Advertising - RM Cube</option>
                                        
                                        <option value="84">Marketing Add-On - Additional Page</option>
                                        <option value="85">Marketing Add-On - Additional Image</option>
                                        <option value="86">Marketing Add-On - Animated Image</option>
                                        <option value="87">Marketing Add-On - Payment Portal</option>
                                        <option value="88">Marketing Add-On - Book Payment</option>
                                        <!--
                                        <option value="89">Marketing Add-On - Alterations on Page (design and copy)</option>
                                        <option value="90">Marketing Add-On - Changing graphics on existing page</option>
                                        -->
                                        <option value="91">Marketing Add-On - Domain and Web Hosting Annual Extension</option>
                                        <option value="92">Marketing Add-On - Online Blast PUBLISHERSWEEKLY</option>
                                        <option value="93">Marketing Add-On - Online Elite PUBLISHERSWEEKLY</option>
                                        
                                        <option value="94">Marketing - Book Fair - Online Onsite Coverage - Book Display</option>
                                        <option value="95">Marketing - Book Fair - Online Onsite Coverage - Book Signing</option>
                                        <option value="96">Marketing - Online Booksellers Advertising</option>
                                        <option value="97">Marketing - LATFOB for SAF - Book Display</option>
                                        <option value="98">Marketing - LATFOB for SAF - Book Signing</option>
                                        <option value="99">Marketing - TFOB for SAF - Book Display</option>
                                        <option value="100">Marketing - TFOB for SAF - Book Signing</option>
                                        <option value="101">Marketing - WTO - Bronze</option>
                                        <option value="102">Marketing - WTO - Silver</option>
                                        <option value="103">Marketing - WTO - Gold</option>
                                        <option value="104">Marketing - WTO - Platinum</option>
                                    </select>
                                    <br>
                                    <input type="checkbox" id="chk_complimentary" name="complimentary" value="1">
                                    <label for="vehicle1">Complimentary</label>
                                </td>
                                <td class="center" colspan="5">
                                    <form id="process_pdf" method="post" action="generate.php" target="_blank">
                                        <input id="form_obj_holder" type="hidden" name="bookVal" value="">
                                        <input id="form_obj_complimentary" type="hidden" name="complimentaryVal" value="0">
                                        <input type="submit" name="submitProdAndServices" class="btn btn-danger" value="Generate PDF">
                                     </form>
                                </td>
                            </tr>
                        </tbody>
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
        

        
        <script type="text/javascript">
            
            $(function(){
                initSelect();
            });
            
           $("#prods-and-services").change(function(){
               $("#form_obj_holder").val($("#prods-and-services").val())
           });
           
           $("#chk_complimentary").change(function(){
               if(this.checked)
                   $("#form_obj_complimentary").val(1);
               else
                   $("#form_obj_complimentary").val(0);
           });
            
            function initSelect(){
                $("#prods-and-services").select2();
            }

        </script>
    </body>
</html>