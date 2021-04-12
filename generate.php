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

        $this->Cell(110,15,'ReadersMagnet','LT',0,'L',true);  
        $this->Cell(25,15,'','T',0,'C',true);
        $this->Cell(25,15,'','T',0,'C',true);
        $this->Cell(25,15,'','TR',0,'C',true);
        $this->Ln();

        $this->SetFillColor(255,255,255);
        $this->SetTextColor(52,58,64);
        $this->SetDrawColor(52,58,64);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','B',10);

        $discount = $obj->discount."%";
        $this->Cell(20,7,'','L',0,'C',true);
        $this->Cell(70,7,'',0,0,'C',true);  
        $this->Cell(20,7,'',0,0,'C',true);
        $this->Cell(25,7,'',0,0,'C',true);
        $this->Cell(25,7,'Discount',0,0,'R',true);
        $this->Cell(25,7,$discount,1,0,'C',true);
        $this->Ln();

        $this->Cell(20,7,'','L',0,'C',true);
        $this->Cell(70,7,'',0,0,'C',true);  
        $this->Cell(20,7,'',0,0,'C',true);
        $this->Cell(25,7,'',0,0,'C',true);
        $this->Cell(25,7,'',0,0,'C',true);
        $this->Cell(25,7,'','TR',0,'C',true);
        $this->Ln();

        $this->SetFillColor(13,110,253);
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
        $this->SetFillColor(13,110,253);
        $this->SetTextColor(255,255,255);
        $this->Cell(25,7,'Gross',1,0,'R',true);
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(52,58,64);
        $this->Cell(25,7,$gross_,1,0,'C',true);
        $this->Ln();

        $partial_net = "$".number_format($obj->partial_net,2,".",",");
        $this->Cell(110,7,'','LR',0,'C',true);
        $this->Cell(25,7,'','L',0,'C',true);
        $this->SetFillColor(13,110,253);
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
        $this->SetFillColor(40,167,69);
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
        $this->SetFillColor(40,167,69);
        $this->SetTextColor(255,255,255);
        $this->Cell(25,7,'Savings',1,0,'R',true);
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(52,58,64);
        $this->Cell(25,7,$savings_,1,0,'C',true);
        $this->Ln();

        $percentage_ = number_format($obj->percentage,1,".",",")."%";
        $this->Cell(110,7,'','LR',0,'C',true);
        $this->Cell(25,7,'','L',0,'C',true);
        $this->SetFillColor(23,162,184);
        $this->SetTextColor(255,255,255);
        $this->Cell(25,7,'%',1,0,'R',true);
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(52,58,64);
        $this->Cell(25,7,$percentage_,1,0,'C',true);
        $this->Ln();

        $this->Cell(20,7,'','LT',0,'C',true);
        $this->Cell(70,7,'','T',0,'C',true);  
        $this->Cell(20,7,'','T',0,'C',true);
        $this->Cell(25,7,'',0,0,'C',true);
        $this->Cell(25,7,'','T',0,'C',true);
        $this->Cell(25,7,'','TR',0,'C',true);
        $this->Ln();

        $this->SetFillColor(13,110,253);
        $this->SetTextColor(255,255,255);
        $this->SetDrawColor(52,58,64);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','B',12);
        $this->Cell(20,7,'#',1,0,'C',true);
        $this->Cell(70,7,'Product',1,0,'C',true);  
        $this->Cell(20,7,'Quantity',1,0,'C',true);
        $this->Cell(25,7,'Gross',1,0,'C',true);
        $this->Cell(25,7,'Net',1,0,'C',true);
        $this->Cell(25,7,'Price',1,0,'C',true);
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
            $gross = "$".number_format($obj->products[$i]->gross,2,".",",");
            $net = "$".number_format($obj->products[$i]->net,2,".",",");
            $price = "$".number_format($obj->products[$i]->price,2,".",",");
            $this->Cell(20,7,$id,1,0,'L',true);
            $this->Cell(70,7,$prod,1,0,'L',true);  
            $this->Cell(20,7,$quan,1,0,'C',true);
            $this->Cell(25,7,$gross,1,0,'R',true);
            $this->Cell(25,7,$net,1,0,'R',true);
            $this->Cell(25,7,$price,1,0,'R',true);
            $this->Ln();
        }
    
    }

}

if(isset($_POST) && $_POST['submitForm']):
    $obj = json_decode($_POST['form_obj']);
    ob_start();
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->salesCalc($obj);
    $pdf->Output();
    ob_end_flush(); 
endif;

