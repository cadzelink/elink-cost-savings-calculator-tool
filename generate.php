<?php

require_once 'lib/pdf/fpdf.php';

class PDF extends FPDF{
    
    function sample(){
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(0,0,102);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','',10);

        $this->Cell(40,5,' ','LTR',0,'L',0);   
        $this->Cell(50,5,'Header 1',1,0,'C',0);
        $this->Cell(50,5,'Header 2',1,0,'C',0);
        $this->Ln();

        $this->Cell(40,5,'Big Space','LR',0,'C',0);  
        $this->Cell(50,5,'[ Row 1 Column 1 ]','LRB',0,'L',0);
        $this->Cell(50,5,'[ Row 2 Column 2 ]','LRB',0,'L',0);
        $this->Ln();

        $this->Cell(40,5,'','LBR',0,'L',0);   
        $this->Cell(50,5,'[ Row 2 Column 1 ]','LRB',0,'L',0);
        $this->Cell(50,5,'[ Row 2 Column 2 ]','LRB',0,'L',0);
        $this->Ln();
               
        $this->Cell(40,5,'','LB',0,'L',0);   
        $this->Cell(50,5,'[Row 3 Colspan 3]','B',0,'C',0);
        $this->Cell(50,5,'','RB',0,'L',0);
    }
    /*
    http://localhost:5000/lib/pdf/doc/cell.htm
    Cell Documentation
    */

    function salesCalc($obj){

        $this->SetFillColor(255,255,255);
        $this->SetTextColor(220,53,69);
        $this->SetDrawColor(52,58,64);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','',30);

        $this->Cell(110,30,'','LT',0,'L',true);
        $this->image('media/images/rm-logo.jpg',12,12,90);
        $this->SetFont('Arial','',7);
        $this->Cell(25,30,'','T',0,'C',true);
        $this->Cell(25,30,'','T',0,'C',true);
        $this->Cell(25,30,'','TR',0,'C',true);
        $this->Ln();

        $this->SetFillColor(255,255,255);
        $this->SetTextColor(52,58,64);
        $this->SetDrawColor(52,58,64);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','B',10);

        if($obj->for_discount == 1){
            $discount = $obj->discount."%";
            $this->Cell(20,7,'','L',0,'C',true);
            $this->Cell(70,7,'',0,0,'C',true);  
            $this->Cell(20,7,'',0,0,'C',true);
            $this->Cell(25,7,'',0,0,'C',true);
            $this->Cell(25,7,'Discount',0,0,'R',true);
            $this->Cell(25,7,$discount,1,0,'C',true);
            $this->Ln();

        }

        
        $this->Cell(20,7,'','L',0,'C',true);
        $this->Cell(70,7,'',0,0,'C',true);  
        $this->Cell(20,7,'',0,0,'C',true);
        $this->Cell(25,7,'',0,0,'C',true);
        $this->Cell(25,7,'',0,0,'C',true);
        if($obj->for_discount == 1)
            $this->Cell(25,7,'','TR',0,'C',true);
        else
            $this->Cell(25,7,'','R',0,'C',true);
        $this->Ln();


        $this->SetFillColor(220,53,69);
        $this->SetTextColor(248,249,250);
        $this->SetDrawColor(52,58,64);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','B',12);

        $this->Cell(110,7,'Actual Price',1,0,'C',true);
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(52,58,64);
        $this->SetDrawColor(52,58,64);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','B',10);
        $this->Cell(25,7,'','L',0,'C',true);
        $this->Cell(25,7,'',0,0,'C',true);
        $this->Cell(25,7,'','R',0,'C',true);
        $this->Ln();
        
        $gross_ = "$".number_format($obj->gross_sales,2,".",",");
        $this->Cell(110,7,'','LR',0,'C',true);
        $this->Cell(25,7,'','L',0,'C',true);
        $this->SetFillColor(220,53,69);
        $this->SetTextColor(255,255,255);
        $this->Cell(25,7,'Gross',1,0,'R',true);
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(52,58,64);
        $this->Cell(25,7,$gross_,1,0,'C',true);
        $this->Ln();

        $partial_net = "$".number_format($obj->partial_net,2,".",",");
        $this->Cell(110,7,'','LR',0,'C',true);
        $this->Cell(25,7,'','L',0,'C',true);
        $this->SetFillColor(220,53,69);
        $this->SetTextColor(255,255,255);
        $this->Cell(25,7,'Partial Net',1,0,'R',true);
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(52,58,64);
        $this->Cell(25,7,$partial_net,1,0,'C',true);
        $this->Ln();

        $total_net = "$".number_format($obj->total_net,2,".",",");
        $this->SetFont('Arial','B',45);
        $this->Cell(1,7,'','L',0,'C',true);
        $this->Cell(109,0,$total_net,0,0,'C',true);
        $this->Cell(25,7,'','L',0,'C',true);
        $this->SetFillColor(255,102,102);
        $this->SetTextColor(255,255,255);
        $this->SetFont('Arial','B',10);
        $this->Cell(25,7,'Total Net',1,0,'R',true);
        $this->SetTextColor(52,58,64);
        $this->SetFillColor(255,255,255);
        $this->Cell(25,7,$total_net,1,0,'C',true);
        $this->Ln();

        $savings_ = "$".number_format($obj->savings,2,".",",");
        $this->Cell(110,7,'','L',0,'C',true);
        $this->Cell(25,7,'','L',0,'C',true);
        $this->SetFillColor(255,102,102);
        $this->SetTextColor(255,255,255);
        $this->Cell(25,7,'Savings',1,0,'R',true);
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(52,58,64);
        $this->Cell(25,7,$savings_,1,0,'C',true);
        $this->Ln();


        $percentage_ = number_format($obj->percentage,1,".",",")."%";
        $this->Cell(110,7,'','LR',0,'C',true);
        $this->Cell(25,7,'','L',0,'C',true);
        $this->SetFillColor(255,51,51);
        $this->SetTextColor(255,255,255);
        $this->Cell(25,7,'%',1,0,'R',true);
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(52,58,64);
        $this->Cell(25,7,$percentage_,1,0,'C',true);
        $this->Ln();

        $this->SetTextColor(255,255,255);
        $this->Cell(110,1,'','LT',0,'C',true);
        $this->Cell(25,1,'',0,0,'C',true);
        $this->Cell(25,1,'',"T",0,'R',true);;
        $this->Cell(25,1,'',"TR",0,'C',true);
        $this->Ln();

        $this->Cell(20,7,'','L',0,'C',true);
        $this->Cell(75,7,'',0,0,'C',true);  
        $this->Cell(30,7,'',0,0,'C',true);
        $this->Cell(20,7,'',0,0,'C',true);
        $this->Cell(20,7,'',0,0,'C',true);
        $this->Cell(20,7,'','R',0,'C',true);
        $this->Ln();

        $this->SetFillColor(220,53,69);
        $this->SetTextColor(255,255,255);
        $this->SetDrawColor(52,58,64);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','B',12);
        $this->Cell(20,7,'#',1,0,'C',true);
        $this->Cell(75,7,'Product',1,0,'C',true);  
        $this->Cell(30,7,'Quantity',1,0,'C',true);
        $this->Cell(20,7,'Gross',1,0,'C',true);
        $this->Cell(20,7,'Net',1,0,'C',true);
        $this->Cell(20,7,'Price',1,0,'C',true);
        $this->Ln();

        $this->SetFillColor(255,255,255);
        $this->SetTextColor(52,58,64);
        $this->SetDrawColor(52,58,64);
        $this->SetFont('Arial','',10);
        for($i = 0; $i < $obj->count; $i++){
            $num = $i + 1;
            $id = "Product ".$num;
            $prod = $obj->products[$i]->desc;
            $quan = $obj->products[$i]->quan;
            $quan = number_format($quan,0,".",",");
            $quan .= $obj->products[$i]->unit ? " ".$obj->products[$i]->unit : '';
            $gross = "$".number_format($obj->products[$i]->gross,2,".",",");
            $net = "$".number_format($obj->products[$i]->net,2,".",",");
            $price = "$".number_format($obj->products[$i]->price,2,".",",");
            $this->Cell(20,7,$id,1,0,'L',true);
            $this->Cell(75,7,$prod,1,0,'L',true);  
            $this->Cell(30,7,$quan,1,0,'C',true);
            $this->Cell(20,7,$gross,1,0,'R',true);
            $this->Cell(20,7,$net,1,0,'R',true);
            $this->Cell(20,7,$price,1,0,'R',true);
            $this->Ln();

        }
        $this->Ln();
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(244,88,88);
        $this->SetDrawColor(255,255,255);
        $this->SetFont('Arial','B',9);
        $this->Cell(25,7,'Terms',1,0,'',true);
        $this->Cell(160,7,'Definition',1,0,'',true);
        $this->Ln();

        $this->SetFillColor(255,255,255);
        $this->SetTextColor(108,117,125);
        $this->SetDrawColor(255,255,255);
        $this->SetFont('Arial','B',9);
        $this->Cell(25,5,'Gross',1,0,'',true);
        $this->SetFont('Arial','',9);
        $this->Cell(160,5,'Sum price of ala carte service; including complimentary service; without discount',1,0,'',true);
        $this->Ln();

        $this->SetFillColor(255,255,255);
        $this->SetDrawColor(255,255,255);
        $this->SetFont('Arial','B',9);
        $this->Cell(25,5,'Partial Net',1,0,'',true);
        $this->SetFont('Arial','',9);
        $this->Cell(160,5,'Sum price of discounted bundle; without discount',1,0,'',true);
        $this->Ln();

        $this->SetFillColor(255,255,255);
        $this->SetDrawColor(255,255,255);
        $this->SetFont('Arial','B',9);
        $this->Cell(25,5,'Total Net',1,0,'',true);
        $this->SetFont('Arial','',9);
        $this->Cell(160,5,'Sum price of all services which author shall pay aka Actual Price; discounted',1,0,'',true);
        $this->Ln();

        $this->SetFillColor(255,255,255);
        $this->SetDrawColor(255,255,255);
        $this->SetFont('Arial','B',9);
        $this->Cell(25,5,'Savings',1,0,'',true);
        $this->SetFont('Arial','',9);
        $this->Cell(160,5,'Sum of discount given',1,0,'',true);
        $this->Ln();

        $this->SetFont('Arial','B',9);
        $this->Cell(25,5,'%',1,0,'',true);
        $this->SetFont('Arial','',9);
        $this->Cell(160,5,'Savings versus actual price',1,0,'',true);
        $this->Ln();
    }

    function BookOrder($obj){
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(220,53,69);
        $this->SetDrawColor(52,58,64);
        $this->SetDrawColor(52,58,64);
        $this->SetLineWidth(.1);

        $this->Cell(110,30,'','LT',0,'L',true);
        $this->image('media/images/rm-logo.jpg',12,12,90);
        $this->SetFont('Arial','',7);
        $this->Cell(25,30,'','T',0,'C',true);
        $this->Cell(25,30,'','T',0,'C',true);
        $this->Cell(25,30,'','TR',0,'C',true);
        $this->Ln();

        $this->Cell(70,3,'','L',0,'C',true);
        $this->Cell(20,3,'',0,0,'C',true);  
        $this->Cell(25,3,'',0,0,'C',true);
        $this->Cell(20,3,'',0,0,'C',true);
        $this->Cell(25,3,'',0,0,'C',true);
        $this->Cell(25,3,'','R',0,'C',true);
        $this->Ln();

        $this->SetFont('Arial','B',10);
        $this->SetFillColor(220,53,69);
        $this->SetTextColor(248,249,250);
        $this->Cell(60,8,'Product',1,0,'C',true);
        $this->Cell(22,8,'Quantity',1,0,'C',true);  
        $this->Cell(27,8,'Book Price',1,0,'C',true);
        $this->Cell(22,8,'AVD%',1,0,'C',true);
        $this->Cell(27,8,'Shipping',1,0,'C',true);
        $this->Cell(27,8,'Total',1,0,'C',true);
        $this->Ln();

        $this->SetFont('Arial','',10);
        $this->SetFillColor(248,249,250);
        $this->SetTextColor(52,58,64);

        if($obj->type < 3):
            $cover = $obj->type == 1 ? "Paperback Order" : "Hardcover Order";
            $this->Cell(60,8,$cover,1,0,'C',true);
            $quantity = $obj->type == 1 ? $obj->quantity->paper : $obj->quantity->hard;
            $this->Cell(22,8,$quantity,1,0,'C',true);
            $price = "$".number_format($obj->type == 1 ? $obj->price->paper :$obj->price->hard,2,".",",");  
            $this->Cell(27,8,$price,1,0,'C',true);
            $discount = $obj->type == 1 ? $obj->discount->paper : $obj->discount->hard;
            $discount.="%";
            $this->Cell(22,8,$discount,1,0,'C',true);
            $shipping = "$".number_format($obj->type == 1 ? $obj->shipping->paper :$obj->shipping->hard,2,".",",");  
            $this->Cell(27,8,$shipping,1,0,'C',true);
            $total = "$".number_format($obj->type == 1 ? $obj->total->paper :$obj->total->hard,2,".",",");  
            $this->Cell(27,8,$total,1,0,'C',true);
            $this->Ln();
        else:
            $cover = "Paperback Order";
            $this->Cell(60,8,$cover,1,0,'C',true);
            $quantity = $obj->quantity->paper ;
            $this->Cell(22,8,$quantity,1,0,'C',true);
            $price = "$".number_format($obj->price->paper,2,".",",");  
            $this->Cell(27,8,$price,1,0,'C',true);
            $discount = $obj->discount->paper."%";
            $this->Cell(22,8,$discount,1,0,'C',true);
            $shipping = "$".number_format($obj->shipping->paper,2,".",",");  
            $this->Cell(27,8,$shipping,1,0,'C',true);
            $total = "$".number_format($obj->total->paper,2,".",",");  
            $this->Cell(27,8,$total,1,0,'R',true);
            $this->Ln();
            
            $cover = "Hardcover Order";
            $this->Cell(60,8,$cover,1,0,'C',true);
            $quantity = $obj->quantity->hard ;
            $this->Cell(22,8,$quantity,1,0,'C',true);
            $price = "$".number_format($obj->price->hard,2,".",",");  
            $this->Cell(27,8,$price,1,0,'C',true);
            $discount = $obj->discount->hard."%";
            $this->Cell(22,8,$discount,1,0,'C',true);
            $shipping = "$".number_format($obj->shipping->hard,2,".",",");  
            $this->Cell(27,8,$shipping,1,0,'C',true);
            $total = "$".number_format($obj->total->hard,2,".",",");  
            $this->Cell(27,8,$total,1,0,'R',true);
            $this->Ln();

            $this->SetFillColor(220,53,69);
            $this->SetTextColor(248,249,250);
            $this->SetFont('Arial','B',12);
            $this->Cell(158,8,'Grand Total',1,0,'R',true);
            $total = "$".number_format($obj->total->paper + $obj->total->hard,2,".",",");  
            $this->Cell(27,8,$total,1,0,'R',true);
            $this->Ln();
        endif;
    }

}

if(isset($_POST) && isset($_POST['submitFormIndex'])):
    $obj = json_decode($_POST['form_obj']);
    ob_start();
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->salesCalc($obj);
    $pdf->Output();
    ob_end_flush(); 
endif;

if(isset($_POST) && isset($_POST['submitFormBookOrder'])):
    
    $obj = json_decode($_POST['bookOBJ']);
    $pdf = new PDF();

    $pdf->AddPage();
    $pdf->BookOrder($obj);
    $pdf->Output();

    ob_end_flush();
endif;