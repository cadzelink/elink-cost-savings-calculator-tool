<?php

require_once 'lib/pdf/fpdf.php';

class PDF extends FPDF{
    
    public $num_x;
          
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
    
    function Footer(){
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','',8);
        // Page number
        if($this->num_x)
            $this->Cell(0,10,'Client Initials ______________________',0,0,'R');
     
    }
    
    function prodAndServices($id,$compli){
        $this->num_x = 1;
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(220,53,69);
        $this->SetDrawColor(52,58,64);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','',30);

        $this->Cell(30,30,'','',0,'L',true);
        $this->image('media/images/rm.png',12,12,25);
        $this->SetFont('Arial','',20);
        $this->SetTextColor(000,000,000);
        $label = $id > 43 ?  "Marketing " : "Publishing ";
        $this->Cell(125,50,$label.'Services Agreement','',0,'C',true);
        $this->SetFont('Arial','',8);
        $this->MultiCell(35,5,"ReadersMagnet\ninfo@readersmagnet.com\n(800) 805-0762\n\n\n\n\n",'',0,'L',true);
        $this->Ln();
        $this->Ln();
        $index = [
            0   => '',
            1   => 'Iron',
            2   => 'Bronze',
            3   =>  'Silver',
            4   =>  'Gold',
            5   =>  'Platinum',
            6   =>  'Iron',
            7   =>  'Bronze',
            8   =>  'Silver',
            9   =>  'Gold',
            10  =>  'Platinum',
            11  =>  'Folklore',
            12  =>  'Fairytale',
            13  =>  'Fantasy',
            14  => 'eBook Conversion',
            15  => 'US Copyright Registration',
            16  => 'Hardcover Availability w/ ISBN',
            17  => 'Resubmission w/ ISBN (per version)',
            18  => 'Paper Gallery Service',
            19  => 'Artistic Illlustration',
            20  => 'x10 - Artistic Illlustration',
            21  => 'x15 - Artistic Illlustration',
            22  => 'Vivid Illlustration',
            23  => 'x10 - Vivid Illlustration',
            24  => 'x15 - Vivid Illlustration',
            25  => 'Intricate Illlustration',
            26  => 'x10 - Intricate Illlustration',
            27  => 'x15 - Intricate Illlustration',
            28  => 'Basic Cover Design',
            29  => 'Standard Cover Design',
            30  => 'Advanced Cover Design',
            31  => 'Image Enhancement (per image)',
            32  => 'Additional Interior Image (per item)',
            33  => 'Additional Interior Graphics & Tables (per item)',
            34  => 'Basic Interior Text and Layout',
            35  => 'Standard Interior Text and Layout',
            36  => 'Advanced Interior Text and Layout',
            37  => 'Revision - Interior Text (per word)',
            38  => 'Developmental Editing',
            39  => 'Copyediting 60,001 - 120,000',
            40  => 'Copyediting 120,001 and up',
            41  => 'Data Entry Service (per page)',
            42  => 'Data Entry Service-Handwritten (per page)',
            43  => 'Audiobook',
            44  => 'Silver',
            45  => 'Gold',
            46  => 'Platinum',
            47  => 'Basic',
            48  => 'Deluxe',
            49  => 'Premium',
            50  => 'Teaser',
            51  => 'Cinematic Standard',
            52  => 'Trailer w/ Advertising',
            53  => 'Cinematic Deluxe',
            54  => 'Blueink Book',
            55  => 'Foreword Clarion',
            56  => 'Kirkus Indie',
            57  => 'Publishers Weekly Single Slot',
            58  => 'Publishers Weekly Double Slot',
            59  => 'Publishers Weekly Half Page',
            60  => 'Publishers Weekly Full Page',
            61  => 'National',
            62  => 'International',
            63  => 'National Plus',
            64  => 'International Plus',
            65  => 'National Book Signing',
            66  => 'Book Signing Plus',
            67  => 'Marketing Materials (100)',
            68  => 'Marketing Materials (100 Starter)',
            69  => 'Marketing Materials (100 Pro)',
            70  => 'Marketing Materials (250)',
            71  => 'Marketing Materials (500)',
            72  => 'Direct Media',
            73  => 'Web Press Release',
            74  => 'Web Release Plus',
            75  => 'Radio Interview with Ric Bratton - This Week In America',
            76  => 'Radio Interview with Kate Delaney - America Tonight Radio',
            77  => 'Radio Interview with Benjie Cole - CBS Radio',
            78  => 'Publishing',
            79  => 'Full Page',
            80  => 'Half Main Page',
            81  => 'Half Page',
            82  => 'RM Fourth',
            83  => 'RM Cube',
            84  => 'Additional Web Page',
            85  => 'Additional Web Image',
            86  => 'Additional Animated Web Image',
            87  => 'Additional Payment Portal',
            88  => 'Book Payment',
            89  => 'Alterations on Page (design and copy)',
            90  => 'Changing graphics on existing page',
            91  => 'Domain and Web Hosting Annual Extension',
            92  => 'Online Blast PUBLISHERSWEEKLY',
            93  => 'Online Elite PUBLISHERSWEEKLY',
            94  => 'Online Onsite Coverage – Book Display',
            95  => 'Online Onsite Coverage – Book Signing',
            96  => 'Online Booksellers Advertising',
            97  => 'Los Angeles Times Festival of Books 2022 - Book Display',
            98  => 'Los Angeles Times Festival of Books 2022 - Book Signing',
            99  => 'Tucson Festival of Books 2022 - Book Display',
            100 => 'Tucson Festival of Books 2022 – Book Signing',
            101 => 'Web Traffic Optimization (WTO) - Bronze',
            102 => 'Web Traffic Optimization (WTO) - Silver',
            103 => 'Web Traffic Optimization (WTO) - Gold',
            104 => 'Web Traffic Optimization (WTO) - Platinum'
        ];
        
        $inclusions = [
            0   => "",
            1   =>//Iron
                "\n• Output: e-Book, Paperback
                \n• Cover: Cover Design Option (1), Author-Supplied Cover, Author Photo and Profile
                \n• Interior: Trim Size (5 X 8, 6 X 9, 8.5 X 11), Interior Layout Design, B&W Image Insertion, Interior Image Enhancements, Interior Graphics and Tables
                \n• Editing: Content Evaluation, 
                \n• Gallery Proof: Electronic Galley
                \n• Registration: ISBN, Library of Congress and US Copyright Registration
                \n• *Distribution: Worldwide Online Book Distribution, ReadersMagnet Bookstore Availability, Amazon Listing, Ingram Listing, Barnes & Noble Listing
                \n• Complimentary Copies: Softcover Author Copy (1), Complimentary Softcovers (5)
                \n• Post Fulfillment: Sales and Royalty Update, One-on-One Support, Non-exclusive Contract, Author Volume Discounts
                \n• Marketing Kit: Bookmarks (50), Business Cards (100), Postcards (50), Posters (5), Feature on RM Bookstore (30 Days), Feature on RM Bookstore (Staff Picks) (30 Days), 
                ",
            2   =>//Bronze
                "\n• Output: e-Book, Paperback, Hardcover
                \n• Cover: Cover Design Options (2), Author-Supplied Cover, Author Photo and Profile
                \n• Interior: Trim Size (5 X 8, 6 X 9, 8.5 X 11), Interior Layout Design, B&W Image Insertion, Interior Image Enhancements, Interior Graphics and Tables
                \n• Editing: Content Evaluation, 
                \n• Gallery Proof: Electronic Galley
                \n• Registration: ISBN, Library of Congress and US Copyright Registration
                \n• *Distribution: Worldwide Online Book Distribution, ReadersMagnet Bookstore Availability, Amazon Listing, Ingram Listing, Barnes & Noble Listing
                \n• Complimentary Copies: Softcover Author Copy (1), Hardcover Author Copy (1), Complimentary Softcovers (10), Complimentary Hardcover (1)
                \n• Post Fulfillment: Sales and Royalty Update, One-on-One Support, Non-exclusive Contract, Author Volume Discounts
                \n• Marketing Kit: Bookmarks (50), Business Cards (100), Postcards (50), Posters (5), Feature on RM Bookstore (30 Days), Feature on RM Bookstore (Staff Picks) (30 Days
                ",
            3   => //Silver 
                "\n• Output: e-Book, Paperback, Hardcover
                \n• Cover: Cover Design Options (2), Author-Supplied Cover, Author Photo and Profile
                \n• Interior: Trim Size (5 X 8, 6 X 9, 8.5 X 11), Interior Layout Design, B&W Image Insertion, Interior Image Enhancements, Interior Graphics and Tables
                \n• Editing: Content Evaluation, Copy Editing 50k Words
                \n• Gallery Proof: Electronic Galley
                \n• Registration: ISBN, Library of Congress and US Copyright Registration
                \n• *Distribution: Worldwide Online Book Distribution, ReadersMagnet Bookstore Availability, Amazon Listing, Ingram Listing, Barnes & Noble Listing
                \n• Complimentary Copies: Softcover Author Copy (1), Hardcover Author Copy (1), Complimentary Softcovers (25), Complimentary Hardcover (5)
                \n• Post Fulfillment: Sales and Royalty Update, One-on-One Support, Non-exclusive Contract, Author Volume Discounts
                \n• Marketing Kit: Bookmarks (50), Business Cards (100), Postcards (50), Posters (5), Feature on RM Bookstore (30 Days), Feature on RM Bookstore (Staff Picks) (30 Days), Online Brand Publicity (5-Week Timeline, Basic Dynamic Website, Social Media Setup, Web Press Release, Weekly Blog (1))       
                ",
            4   =>//Gold  
                "\n• Output: e-Book, Paperback, Hardcover
                \n• Cover: Cover Design Options (3), Author-Supplied Cover, Author Photo and Profile
                \n• Interior: Trim Size (5 X 8, 6 X 9, 8.5 X 11), Interior Layout Design, B&W Image Insertion, Interior Image Enhancements, Interior Graphics and Tables
                \n• Editing: Content Evaluation, Copy Editing 50k Words
                \n• Gallery Proof: Electronic Galley
                \n• Registration: ISBN, Library of Congress and US Copyright Registration
                \n• *Distribution: Worldwide Online Book Distribution, ReadersMagnet Bookstore Availability, Amazon Listing, Ingram Listing, Barnes & Noble Listing
                \n• Complimentary Copies: Softcover Author Copy (1), Hardcover Author Copy (1), Complimentary Softcovers (50), Complimentary Hardcover (10)
                \n• Post Fulfillment: Sales and Royalty Update, One-on-One Support, Non-exclusive Contract, Author Volume Discounts
                \n• Marketing Kit: Bookmarks (100), Business Cards (100), Postcards (100), Posters (5), Feature on RM Bookstore (30 Days), Feature on RM Bookstore (Staff Picks) (30 Days), Online Brand Publicity (5-Week Timeline, Deluxe Dynamic Website, Social Media Setup, Web Press Release, Weekly Blog (1), National Book Fair (1))   
                ",
            5   =>//Platinum  
                "\n• Output: e-Book, Paperback, Hardcover
                \n• Cover: Cover Design Options (3), Author-Supplied Cover, Author Photo and Profile
                \n• Interior: Trim Size (5 X 8, 6 X 9, 8.5 X 11), Interior Layout Design, B&W Image Insertion, Interior Image Enhancements, Interior Graphics and Tables
                \n• Editing: Content Evaluation, Copy Editing 50k Words
                \n• Gallery Proof: Electronic Galley
                \n• Registration: ISBN, Library of Congress and US Copyright Registration
                \n• *Distribution: Worldwide Online Book Distribution, ReadersMagnet Bookstore Availability, Amazon Listing, Ingram Listing, Barnes & Noble Listing
                \n• Complimentary Copies: Softcover Author Copy (1), Hardcover Author Copy (1), Complimentary Softcovers (100), Complimentary Hardcover (20)
                \n• Post Fulfillment: Sales and Royalty Update, One-on-One Support, Non-exclusive Contract, Author Volume Discounts
                \n• Marketing Kit: Bookmarks (200), Business Cards (100), Postcards (200), Posters (20), Feature on RM Bookstore (30 Days), Feature on RM Bookstore (Staff Picks) (30 Days), Online Brand Publicity (5-Week Timeline, Deluxe Dynamic Website, Social Media Setup, Web Press Release, Weekly Blog (1), National Book Fair (1), Book Trailer Teaser (1))   
                ",
            6   =>//Iron  
                "\n• Output: e-Book, Paperback
                \n• Cover: Cover Design Option (1), Author-Supplied Cover, Author Photo and Profile
                \n• Interior: Trim Size (5 X 8, 6 X 9, 8.5 X 11), Interior Layout Design, FC Image Insertion, Interior Image Enhancements
                \n• Editing: Content Evaluation
                \n• Gallery Proof: Electronic Galley
                \n• Registration: ISBN, Library of Congress and US Copyright Registration
                \n• *Distribution: Worldwide Online Book Distribution, ReadersMagnet Bookstore Availability, Amazon Listing, Ingram Listing, Barnes & Noble Listing
                \n• Complimentary Copies: Softcover Author Copy (1), Complimentary Softcovers (5)
                \n• Post Fulfillment: Sales and Royalty Update, One-on-One Support, Non-exclusive Contract, Author Volume Discounts
                \n• Marketing Kit: Bookmarks (50), Business Cards (100), Postcards (50), Posters (5), Feature on RM Bookstore (30 Days), Feature on RM Bookstore (Staff Picks) (30 Days)
                ",
            7   =>//Bronze
                "\n• Output: e-Book, Paperback, Hardcover
                \n• Cover: Cover Design Options (2), Author-Supplied Cover, Author Photo and Profile
                \n• Interior: Trim Size (5 X 8, 6 X 9, 8.5 X 11), Interior Layout Design, FC Image Insertion, Interior Image Enhancements
                \n• Editing: Content Evaluation
                \n• Gallery Proof: Electronic Galley
                \n• Registration: ISBN, Library of Congress and US Copyright Registration
                \n• *Distribution: Worldwide Online Book Distribution, ReadersMagnet Bookstore Availability, Amazon Listing, Ingram Listing, Barnes & Noble Listing
                \n• Complimentary Copies: Softcover Author Copy (1), Hardcopy Author Copy (1), Complimentary Softcovers (10), Complimentary Hardcover (1)
                \n• Post Fulfillment: Sales and Royalty Update, One-on-One Support, Non-exclusive Contract, Author Volume Discounts
                \n• Marketing Kit: Bookmarks (50), Business Cards (100), Postcards (50), Posters (5), Feature on RM Bookstore (30 Days), Feature on RM Bookstore (Staff Picks) (30 Days)
                ",
            8   =>//Silver
                "\n• Output: e-Book, Paperback, Hardcover
                \n• Cover: Cover Design Options (2), Author-Supplied Cover, Author Photo and Profile
                \n• Interior: Trim Size (5 X 8, 6 X 9, 8.5 X 11), Interior Layout Design, FC Image Insertion, Interior Image Enhancements
                \n• Gallery Proof: Electronic Galley
                \n• Registration: ISBN, Library of Congress and US Copyright Registration
                \n• *Distribution: Worldwide Online Book Distribution, ReadersMagnet Bookstore Availability, Amazon Listing, Ingram Listing, Barnes & Noble Listing
                \n• Complimentary Copies: Softcover Author Copy (1), Hardcopy Author Copy (1), Complimentary Softcovers (25), Complimentary Hardcovers (5)
                \n• Post Fulfillment: Sales and Royalty Update, One-on-One Support, Non-exclusive Contract, Author Volume Discounts
                \n• Marketing Kit: Bookmarks (50), Business Cards (100), Postcards (50), Posters (5), Feature on RM Bookstore (30 Days), Feature on RM Bookstore (Staff Picks) (30 Days), Online Brand Publicity (5-Week Timeline, Basic Dynamic Website, Social Media Setup, Web Press Release, Weekly Blog (1)) 
                ",
            9   =>//Gold 
                "\n• Output: e-Book, Paperback, Hardcover
                \n• Cover: Cover Design Options (3), Author-Supplied Cover, Author Photo and Profile
                \n• Interior: Trim Size (5 X 8, 6 X 9, 8.5 X 11), Interior Layout Design, FC Image Insertion, Interior Image Enhancements
                \n• Gallery Proof: Electronic Galley
                \n• Registration: ISBN, Library of Congress and US Copyright Registration
                \n• *Distribution: Worldwide Online Book Distribution, ReadersMagnet Bookstore Availability, Amazon Listing, Ingram Listing, Barnes & Noble Listing
                \n• Complimentary Copies: Softcover Author Copy (1), Hardcopy Author Copy (1), Complimentary Softcovers (50), Complimentary Hardcovers (10)
                \n• Post Fulfillment: Sales and Royalty Update, One-on-One Support, Non-exclusive Contract, Author Volume Discounts
                \n• Marketing Kit: Bookmarks (100), Business Cards (100), Postcards (100), Posters (5), Feature on RM Bookstore (30 Days), Feature on RM Bookstore (Staff Picks) (30 Days), Online Brand Publicity (5-Week Timeline, Deluxe Dynamic Website, Social Media Setup, Web Press Release, Weekly Blog (1), National Book Fair (1))   
                ",
            10  =>//Platinum  
                "\n• Output: e-Book, Paperback, Hardcover
                \n• Cover: Cover Design Options (3), Author-Supplied Cover, Author Photo and Profile
                \n• Interior: Trim Size (5 X 8, 6 X 9, 8.5 X 11), Interior Layout Design, FC Image Insertion, Interior Image Enhancements
                \n• Gallery Proof: Electronic Galley
                \n• Registration: ISBN, Library of Congress and US Copyright Registration
                \n• *Distribution: Worldwide Online Book Distribution, ReadersMagnet Bookstore Availability, Amazon Listing, Ingram Listing, Barnes & Noble Listing
                \n• Complimentary Copies: Softcover Author Copy (1), Hardcopy Author Copy (1), Complimentary Softcovers (100), Complimentary Hardcovers (20)
                \n• Post Fulfillment: Sales and Royalty Update, One-on-One Support, Non-exclusive Contract, Author Volume Discounts
                \n• Marketing Kit: Bookmarks (200), Business Cards (200), Postcards (200), Posters (20), Feature on RM Bookstore (30 Days), Feature on RM Bookstore (Staff Picks) (30 Days), Online Brand Publicity (5-Week Timeline, Deluxe Dynamic Website, Social Media Setup, Web Press Release, Weekly Blog (1), National Book Fair (1), Book Trailer Teaser (1))   
                ",
            11  =>//Folklore
                "\n• Output: e-Book, Paperback
                \n• Cover: Cover Art Option (1), Author-Supplied Cover, Author Photo and Profile
                \n• Interior: Trim Size (5 X 8, 6 X 9, 8.5 X 11), Interior Layout Design, Image Insertion, Interior Image Enhancements, Author Supplied Illustration, Illustration Including Cover (10), Illustration Level (Artistic)
                \n• Editing: Content Evaluation
                \n• Gallery Proof: Electronic Galley
                \n• Registration: ISBN, Library of Congress and US Copyright Registration
                \n• *Distribution: Worldwide Online Book Distribution, ReadersMagnet Bookstore Availability, Amazon Listing, Ingram Listing, Barnes & Noble Listing
                \n• Complimentary Copies: Softcover Author Copy (1), Complimentary Softcovers (5)
                \n• Post Fulfillment: Sales and Royalty Update, One-on-One Support, Author Volume Discounts
                \n• Marketing Kit: Bookmarks (100), Business Cards (100), Postcards (100), Posters (5), Feature on RM Bookstore (30 Days)
                ",
            12  =>//'Fairytale',
                "\n• Output: e-Book, Paperback
                \n• Cover: Cover Art Option (2), Author-Supplied Cover, Author Photo and Profile
                \n• Interior: Trim Size (5 X 8, 6 X 9, 8.5 X 11), Interior Layout Design, Image Insertion, Interior Image Enhancements, Author Supplied Illustration, Illustration Including Cover (15), Illustration Level (Vivid)
                \n• Editing: Content Evaluation
                \n• Gallery Proof: Electronic Galley
                \n• Registration: ISBN, Library of Congress and US Copyright Registration
                \n• *Distribution: Worldwide Online Book Distribution, ReadersMagnet Bookstore Availability, Amazon Listing, Ingram Listing, Barnes & Noble Listing
                \n• Complimentary Copies: Softcover Author Copy (1), Complimentary Softcovers (10)
                \n• Post Fulfillment: Sales and Royalty Update, One-on-One Support, Author Volume Discounts
                \n• Marketing Kit: Bookmarks (100), Business Cards (100), Postcards (100), Posters (5), Feature on RM Bookstore (30 Days)
                ",
            13  => //'Fantasy',
                "\n• Output: e-Book, Paperback
                \n• Cover: Cover Art Option (3), Author-Supplied Cover, Author Photo and Profile
                \n• Interior: Trim Size (5 X 8, 6 X 9, 8.5 X 11), Interior Layout Design, Image Insertion, Interior Image Enhancements, Author Supplied Illustration, Illustration Including Cover (20), Illustration Level (Intricate)
                \n• Editing: Content Evaluation
                \n• Gallery Proof: Electronic Galley
                \n• Registration: ISBN, Library of Congress and US Copyright Registration
                \n• *Distribution: Worldwide Online Book Distribution, ReadersMagnet Bookstore Availability, Amazon Listing, Ingram Listing, Barnes & Noble Listing
                \n• Complimentary Copies: Softcover Author Copy (1), Complimentary Softcovers (25)
                \n• Post Fulfillment: Sales and Royalty Update, One-on-One Support, Author Volume Discounts
                \n• Marketing Kit: Bookmarks (100), Business Cards (100), Postcards (100), Posters (5), Feature on RM Bookstore (30 Days)
                ",
            14  => //eBook Conversion
                "\n• FORMATTING & LAYOUT: Total Page Count (Maximum of 500), Interior Style, Font Styles, Chapter Title, Page Number, Tables, Charts and Graphs, Interior Design and Layout Service, Interior Design Service Correction (2)
                \n• COVER: Book Cover, Cover Design Correction (2)
                \n• CONVERSION: PDF, EPUB, MOBI
                \n• REGISTRATION & DISTRIBUTION: ISBN, Worldwide Online Book Distribution, ReadersMagnet Bookstore
                \n• POST FULFILLMENT: Sales and Royalty Update, Royalty Program
                \n• GALLERY PROOFS: Electronic Galley
                ",
            15  => "\n• REGISTRATION: US Copyright Registration",
            16  => "\n• FORMAT: Hardcover Availability w/ ISBN",  
            17  => "\n• Resubmission w/ISBN (per version)", 
            18  => "\n• Paper Galley Service",
            19  => "\n• INTERIOR: 1 Artistic Illustration",
            20  => "\n• INTERIOR: Artistic Illustration x10", 
            21  => "\n• INTERIOR: Artistic Illustration x15", 
            22  => "\n• INTERIOR: 1 Vivid Illustration", 
            23  => "\n• INTERIOR: Vivid Illustration x10", 
            24  => "\n• INTERIOR: Vivid Illustration x15", 
            25  => "\n• INTERIOR: 1 Intricate Illustration", 
            26  => "\n• INTERIOR: Intricate Illustration x10", 
            27  => "\n• INTERIOR: Intricate Illustration x15",
            28  => "\n• COVER: Basic Cover Design", 
            29  => "\n• COVER: Standard Cover Design", 
            30  => "\n• COVER: Advanced Cover Design",
            31  => "\n• INTERIOR: Image Enhancement (per image)", 
            32  => "\n• INTERIOR: Additional Interior Image (per item)", 
            33  => "\n• INTERIOR: Additional Interior Graphics & Tables (per item)", 
            34  => "\n• INTERIOR: Basic Interior Text and Layout",
            35  => "\n• INTERIOR: Standard Interior Text and Layout",
            36  => "\n• INTERIOR: Advanced Interior Text and Layout",
            37  => "\n• INTERIOR: Revision • Interior Text (per word)",
            38  => "\n• EDITORIAL: Developmental Editing",
            39  => "\n• EDITORIAL: Copyediting 60,001 - 120,000",
            40  => "\n• EDITORIAL: Copyediting 120,001 and up",
            41  => "\n• EDITORIAL: Data Entry Service (per page)", 
            42  => "\n• EDITORIAL: Data Entry Service-Handwritten (per page)",
            43  =>//Audiobook - Audiobook Publishing
                "\n• Audiobook conversion of up to 5,000 words
                \n• Your own digital copy of the audiobook
                \n• ISBN Registration
                \n• Narration by professional voice-over artists
                \n• Availability of your audiobook through Audible, Amazon, and iTunes
                \n• Two (2) web press releases for a complete set of publicity (hype and launch)
                ",
            44  =>
                "\n• Dynamic Website - Basic
                \n• Social Media Set Up
                \n• Web Press Release
                \n• Weekly Blog - 1 Blog per Week
                ",
            45  =>
                "\n• Dynamic Website - Deluxe
                \n• Social Media Set Up
                \n• Web Press Release
                \n• Weekly Blog - 1 Blog per Week
                \n• Book Fair - 1 National
                \n• Book Trailer
                ",
            46  =>
                "\n• Dynamic Website - Premium
                \n• Social Media Set Up
                \n• Web Press Release
                \n• Weekly Blog - 1 Blog per Week
                \n• Book Fair - 1 National or International
                \n• Book Trailer - Teaser
                ",
            47  =>
                "\n• Blog Ready
                \n• Social Media Integration
                \n• Email Account
                \n• Pages - 5
                \n• Images - 6
                \n• Payment Portal
                \n• Domain - 12 months
                \n• Web Hosting - 12 months
                ",
            48  =>
                "\n• Blog Ready
                \n• Social Media Integration
                \n• Email Account
                \n• Pages - 7
                \n• Images - 7
                \n• Payment Portal
                \n• Domain - 12 months
                \n• Web Hosting - 12 months
                ",
            49  =>
                "\n• Blog Ready
                \n• Social Media Integration
                \n• Email Account
                \n• Pages - 10
                \n• Images - 10
                \n• Payment Portal
                \n• Domain - 12 months
                \n• Web Hosting - 12 months
                ",
            50  =>
                "\n• Stock Music
                \n• Stock Video/Photos
                \n• Duration - 30 seconds
                ",
            51  =>
                "\n• Stock Music
                \n• Stock Video/Photos
                \n• Sound FX
                \n• Duration - 60 seconds
                ",
            52  =>
                "\n• Stock Music
                \n• Stock Video/Photos
                \n• Sound FX
                \n• Youtube Advertising
                \n• Duration - 30 seconds
                ",
            53  =>
                "\n• Stock Music
                \n• Stock Video/Photos
                \n• Sound FX
                \n• 2D /3D Animation
                \n• Duration - 90 seconds
                \n\n•Advertising Only - Additional; 30-Day Duration
                ",
            54  => // Book Review - Blueink Book
                "\n• Expedited professional evaluation review
                \n• Free cover revision service to include a blurb
                \n• Applicable to ReadersMagnet published books only
                \n• Website Placement - BlueInk Website
                \n• Become a featured author on ReadersMagnet website
                \n• Web Press Release service
                \n• Word count of unbiased evaluation summary: 200-300
                ",
            55  =>// Foreword Clarion 
                "\n• Expedited professional evaluation review
                \n• Free cover revision service to include a blurb
                \n• Applicable to ReadersMagnet published books only
                \n• Website Placement - Foreword Website
                \n• Become a featured author on ReadersMagnet website
                \n• Web Press Release service
                \n• Word count of unbiased evaluation summary: 400-500
                ",
            56  =>//Kirkus Indie
                "\n• Expedited professional evaluation review
                \n• Free cover revision service to include a blurb
                \n• Applicable to ReadersMagnet published books only
                \n• Website Placement - KirkusReview Website
                \n• Become a featured author on ReadersMagnet website
                \n• Web Press Release service
                \n• Word count of unbiased evaluation summary: 200-300
                ",
            57  =>//Print Advertising - Single Slot
                "\n• Print Ad in the Publishers Weekly Magazine - 1 slot
                \n• Online Banner Ad Campaign on publishersweekly.com - 10K impressions Leaderboard
                \n• Listing in PW Select Magazine
                \n• Placement in Booklife.com - 1 month
                \n• Social Media Promotion via Booklife•s Facebook and Twitter Pages
                \n• Publishers Weekly Subscription - 6 months
                \n• PW Select Magazine Subscription - 12 months
                \n• Professionally Written Book Description
                \n• Book Listing Details
                \n• 1 Free Print Copy of Magazine Issue Where the Listing Appears
                ",
            58  =>//Double Slot
                "\n• Print Ad in the Publishers Weekly Magazine - 2 slots
                \n• Online Banner Ad Campaign on publishersweekly.com - 30K impressions Leaderboard
                \n• Listing in PW Select Magazine
                \n• Placement in Booklife.com - 1 month
                \n• Social Media Promotion via Booklife•s Facebook and Twitter Pages
                \n• Publishers Weekly Subscription - 6 months
                \n• PW Select Magazine Subscription - 12 months
                \n• Professionally Written Book Description
                \n• Book Listing Details
                \n• 1 Free Print Copy of Magazine Issue Where the Listing Appears
                ",
            59  =>//Half Page
                "\n• Print Ad in the Publishers Weekly Magazine - Half Page
                \n• Online Banner Ad Campaign on publishersweekly.com - 50K impressions Leaderboard
                \n• Banner Ad on a Publishers Weekly E-Newsletter
                \n• Listing in PW Select Magazine
                \n• Placement in Booklife.com - 1 month
                \n• Social Media Promotion via Booklife•s Facebook and Twitter Pages
                \n• Publishers Weekly Subscription - 6 months
                \n• PW Select Magazine Subscription - 12 months
                \n• Professionally Written Book Description
                \n• Book Listing Details
                \n• 1 Free Print Copy of Magazine Issue Where the Listing Appears
                ",
            60  =>//Full Page
                "\n• Print Ad in the Publishers Weekly Magazine - Full Page
                \n• Online Banner Ad Campaign on publishersweekly.com - 50K impressions Leaderboard
                \n• Banner Ad on a Publishers Weekly E-Newsletter
                \n• Listing in PW Select Magazine
                \n• Placement in Booklife.com - 1 month
                \n• Social Media Promotion via Booklife•s Facebook and Twitter Pages
                \n• Publishers Weekly Subscription - 6 months
                \n• PW Select Magazine Subscription - 12 months
                \n• Professionally Written Book Description
                \n• Book Listing Details
                \n• 1 Free Print Copy of Magazine Issue Where the Listing Appears
                ",
            61  =>//Book Fairs - National
                "\n• 1 book exhibit of your choice
                \n• Print and eBook combo display
                \n• Pre-event newswire press release
                \n• Post fulfillment report
                ",
            62  =>//International
                "\n• 1 book exhibit of your choice
                \n• Print and eBook combo display
                \n• Pre-event newswire press release
                \n• Post fulfillment report
                ",
            63  =>//National Plus
                "\n• 1 book exhibit of your choice
                \n• Print and eBook combo display
                \n• Pre-event newswire press release
                \n• Featured title promotion in library newsletter
                \n• Post fulfillment report
                ",
            64  =>//International Plus
                "\n• 1 book exhibit of your choice
                \n• Print and eBook combo display
                \n• Pre-event newswire press release
                \n• Featured title promotion in library newsletter
                \n• Post fulfillment report
                ",
            65  =>//Book Signing - National Book Signing
                "\n• 1 National book signing slot of your choice.
                \n• Print/eBook combo book display.
                \n• Author book signing badge.
                \n• Storage of up to 70 books which can either be shipped by the author or handcarried.
                \n• Web Press Release announcing your book signing event
                \n• Marketing Materials (Business cards, post cards and bookmarks) - 100
                \n• Post fulfillment report
                ",
            66  =>//Book Signing Plus
                "\n• 1 National book signing slot of your choice.
                \n• Print/eBook combo book display.
                \n• Author book signing badge.
                \n• Storage of up to 70 books which can either be shipped by the author or handcarried.
                \n• Web Press Release announcing your book signing event
                \n• Marketing Materials (Business cards, post cards and bookmarks) - 200
                \n• Featured title promotion in library newsletter
                \n• Post fulfillment report
                ",
            67  =>//Marketing Materials - 100
                "\n• Business Cards - 100
                \n• Bookmarks - 100
                \n• Postcards - 100
                \n• Digital Sell Sheet
                \n• Professional Design
                ",
            68  =>//100 - Starter
                "\n• Business Cards - 100
                \n• Bookmarks - 50
                \n• Postcards - 50
                \n• Posters - 5
                \n• Digital Sell Sheet
                \n• Professional Design
                ",
            69 =>//100 - Pro
                "\n• Business Cards - 100
                \n• Bookmarks - 100
                \n• Postcards - 100
                \n• Posters - 5
                \n• Digital Sell Sheet
                \n• Professional Design
                ",
            70  =>//250
                "\n• Business Cards - 250
                \n• Bookmarks - 250
                \n• Postcards - 250
                \n• Digital Sell Sheet
                \n• Professional Design
                ",
            71  =>//500
                "\n• Business Cards - 500
                \n• Bookmarks - 500
                \n• Postcards - 500
                \n• Digital Sell Sheet
                \n• Professional Design
                ",
            72  =>//Press Release Campaign - Direct Media Press Release
                "\n• Qualitative distribution to reporters, trade publications, and news outlets that are topic-based and has editorial focus.
                \n• Tapping of news entities that are media prospects.
                \n• Provides a list of spectators you have access on.
                \n• Distribution to websites through ads.
                \n• Indexing of search engines.
                \n• Submission report of media outlets that are targeted to receive your news.
                ",
            73  =>//Web Press Release
                "\n• Nearly 100% integration into Google News.
                \n• Free placement of book cover photos, video links, website links, tags and much more.
                \n• Complimentary Syndication into business news or related websites, with proof of delivery and statistics report.
                \n• RSS feed and social media integration.
                \n• Fully Compliant with Webmaster Guidelines.
                ",
            74  =>//Web Press Releasel Plus
                "\n• Features
                \n  • Nearly 100% integration into Google News.
                \n  • Free placement of book cover photos, video links, website links, tags and much more.
                \n  • Complimentary Syndication into business news or related websites, with proof of delivery and statistics report.
                \n  • RSS feed and social media integration.
                \n  • Fully Compliant with Webmaster Guidelines.
                \n  • Search engine optimized 
                \n• Pay Per Click Feature
                \n  • Integrated into Google’s Pay Per Click (PPC) campaign.
                \n  • Includes Google Search results placement and content network.
                \n  • Service provides unlimited search result displays within a four-month campaign, or 150 “click-throughs” (users actually clicking to view the entire web press release), whichever comes first.
                ",
            75  =>//Radio Interview - This Week in America
                "\n• Guaranteed 1 recorded interview with Ric Bratton on his radio show “This Week in America“, a nationally syndicated radio show.
                \n• Interview segment placement on Blue Funk Broadcasting, Youtube, iTunes, Podomatic and Spotify.
                \n• Creation of Publicity Kit prepared for the host to review.
                \n• Radio Interview Tips Sheet to help you prepare for the interview.
                ",
            76  =>//America Tonight Radio
                "\n• One (1) 10 to 12-minute pre recorded interview with Kate Delaney
                \n• One (1) Publicity Kit
                \n• Featured author on ReadersMagnet website
                \n• Radio Interview Tips Sheet to help you prepare for the interview
                \n• America Tonight broadcasts in 31 states and reaches over 26 million Americans, covering breaking news to contemporary lifestyle issues.
                \n• America Tonight with Kate Delaney airs Monday through Friday from 9pm to midnight Pacific.
                \n• The author will receive a copy of the interview or listen to an archive of the shows at America Tonight .
                ",
            77  =>//Benjie Cole from CBS Radio
                "\n• One(1) 15 minute pre-recorded interview with Al Cole of CBS Radio
                \n• One(1) Publicity Kit for radio station’s reference and author’s marketing material
                \n• Video version of phone interview using book cover, author picture, website,etc.
                \n• Featured Author on ReadersMagnet website
                \n• Interviews will be aired on Apple’s iTunes Radio Network (Professional News/Talk) featuring CBS Radio, Fox News, NPR, & C-Span.Each interview, at its individual airing time, can be heard on Al’s24/7 broadcast player at Al’s Station Page—People of Distinction .
                ",
            79  =>//New York Times Magazine Advertising - Full Page
                "\n• Book Cover
                \n• 30-Word Description
                \n• Digital Copy of the Issue
                \n• 3 Weekly Blogs (Author’s Lounge)
                \n• 1 Web Press Release
                \n• 1 Review in ReadersMagnet Review
                \n• Social Media Posting in Facebook, Instagram, and YouTube
                ",
            80  =>//Half Main Page
                "\n• Book Cover
                \n• 30-Word Description
                \n• Digital Copy of the Issue
                \n• 3 Weekly Blogs (Author’s Lounge)
                ",
            81  =>//Half Page
                "\n• Book Cover
                \n• 30-Word Description
                \n• Digital Copy of the Issue
                ",
            82  =>//RM Fourth
                "\n• Book Cover
                \n• 30-Word Description
                \n• Digital Copy of the Issue
                ",
            83  =>//RM Cube
                "\n• Book Cover
                \n• 30-Word Description
                \n• Digital Copy of the Issue
                ",
            84  => "Additional Page",
            85  => "Additional Image",
            86  => "Animated Image",
            87  => "Payment Portal",
            88  => "Book Payment",
            89  => "Alterations on page (design and copy)",
            90  => "Changing graphics on existing page",
            91  => "Domain and Web Hosting Annual Extension",
            92  =>//Online Blast PUBLISHERSWEEKLY
                "\n• Online Banner Ad Campaign on PUBLISHERSWEEKLY.COM - 50k Impressions Leaderboard
                \n• Banner Ad on Publishers Weekly E-Newsletter – 1 Leaderboard
                ",
            93  =>//Online Elite PUBLISHERSWEEKLY
            "\n• Online Banner Ad Campaign on PUBLISHERSWEEKLY.COM - 100k Impressions Leaderboard
            \n• Banner Ad on Publishers Weekly E-Newsletter – 1 Leaderboard
            ",
            94  =>//Online Onsite Coverage – Book Display
            "Book Display
            \n• TFOS Author custom URL for Booth             
            \n• Book Description and Book Cover
            \n• Author Profile Bio
            \n• Bookstore link
            \n• Social Media Promotion
            \n• Booth/Page Analytics for Post Fulfillment Report
            \n• Access to booth 1 day before, during and 1 day after the event
            \n• Unlimited calls with Author Relations Officer and Marketing Consultant
            \n• 5% Discount for The Festival of Storytellers Season 3

            ",
            95  =>
            "Book Signing
            \n• 	TFOS Author custom URL for Booth 
            \n• 	Booth with Social Media Links and website 
            \n• 	Bookstore link
            \n• 	Book Description and Book Cover
            \n• 	Author Profile Bio
            \n• 	Opportunity to Stream and Promote cross channel engagement (links to share)
            \n• 	Social Media Promotion
            \n• 	Upload Videos
            \n\t\t\t\t• Personal Video (Author’s choice)
            \n\t\t\t\t• Book Trailer or any video that will showcase Author’s book
            \n• 	Livestream within the Booth (pre-recorded videos to be uploaded in stage/Booth)
            \n• 	Workshop in preparation for interview recording
            \n• 	SEO Geo-Targeting Ads (To digitally inform the locals in the area that we are joining) 
            \n• 	Cloud Recording/Downloadable video – accessible for Author 
            \n• 	Booth/Page Analytics for Post Fulfillment Report
            \n• 	Access to booth 1 day before, during and 1 day after the event
            \n• 	Unlimited calls with Author Relations Officer and Marketing Consultant
            \n• 	5% Discount for The Festival of Storytellers Season 3
            ",
            96  =>
            "\n• Banner Ad Campaign in Amazon
            \n• Banner Ad Campaign in Ingram's iPage
            ",
            97  =>
            "\nBook Display
            \n\t\t\t\t•1 Print Book Display (Paperback or Hardback copy)
            \n\t\t\t\t• Placement in ReadersMagnet Exhibit brochure
            \n\t\t\t\t• Pre-event newswire press release
            \n\t\t\t\t• Post fulfillment report
            ",
            98  =>
            "\nBook Display
            \n\t\t\t\t• 1 Hour Book Signing Slot (Schedule is based on availability)
            \n\t\t\t\t• 1 Print Book Display (Paperback or Hardback copy)
            \n\t\t\t\t• Author Book Signing Badge
            \n\t\t\t\t• Placement in ReadersMagnet Brochure
            \n\t\t\t\t• Pre- or Post-Event Web Press Release announcing your Book Signing Event
            \n\t\t\t\t• Storage of up to 100 books which can either be shipped by the author or hand-carried
            \n\t\t\t\t• 100 Sets of Promotional Materials – Business cards, postcards, and bookmarks
            \n\t\t\t\t• Post fulfillment report
            ",
            99  =>
            "\n Book Display
            \n\t\t\t\t• 1 Print Book Display (Paperback or Hardback copy)
            \n\t\t\t\t• Placement in ReadersMagnet Exhibit brochure
            \n\t\t\t\t• Post fulfillment report
            ",
            100 =>
            "\n Book Display
            \n\t\t\t\t• 1 Hour Book Signing Slot (Schedule is based on availability)
            \n\t\t\t\t• 1 Print Book Display (Paperback or Hardback copy)
            \n\t\t\t\t• Author Book Signing Badge
            \n\t\t\t\t• Placement in ReadersMagnet Brochure
            \n\t\t\t\t• Pre- or Post-Event Web Press Release announcing your Book Signing Event
            \n\t\t\t\t• Storage of up to 100 books which can either be shipped by the author or hand-carried
            \n\t\t\t\t• 100 Sets of Promotional Materials – Business cards, postcards, and bookmarks
            \n\t\t\t\t• Post fulfillment report
            ",
            101 => "• Campaign Length: 6 Months
            \n• Keywords: 5 Words
            \n• Keyword Group: Maximum 1
            \n• Website Audit
            \n• On Page Optimization
            \n• Off Page Optimization
            \n• Google Tools Integration
            \n• Social Media Promotion
            \n• Content Publication
            \n• Weekly Performance Reporting
            \n• Executive Summary
            ",
            102 => "• Campaign Length: 6 Months
            \n• Keywords: 10 Words
            \n• Keyword Group: Maximum 2
            \n• Website Audit
            \n• On Page Optimization
            \n• Off Page Optimization
            \n• Google Tools Integration
            \n• Social Media Promotion
            \n• Content Publication
            \n• Weekly Performance Reporting
            \n• Executive Summary
            ",
            103 => "• Campaign Length: 6 Months
            \n• Keywords: 20 Words
            \n• Keyword Group: Maximum 4
            \n• Website Audit
            \n• On Page Optimization
            \n• Off Page Optimization
            \n• Google Tools Integration
            \n• Social Media Promotion
            \n• Content Publication
            \n• Weekly Performance Reporting
            \n• Executive Summary
            ",
            104 => "• Campaign Length: 6 Months
            \n• Keywords: 30 Words
            \n• Keyword Group: Maximum 6
            \n• Website Audit
            \n• On Page Optimization
            \n• Off Page Optimization
            \n• Google Tools Integration
            \n• Social Media Promotion
            \n• Content Publication
            \n• Weekly Performance Reporting
            \n• Executive Summary
            "
        ];
                
        $this->SetFont('Arial','',12);
        if($id >= 1 && $id <=5)
            $name = " - Black and White";
        else
        if($id >= 6 && $id <=10)
            $name = " - Full Color Books";
        else
        if($id >= 11 && $id <=13)
            $name = " - Children's Book";
        else
        if($id == 14)
            $name = " - Ebook";
        else
        if($id > 14 && $id < 43)
            $name = " - Publishing Add-On";
        else
        if($id == 43)
            $name = "";
        else
        if($id > 43 && $id < 47)
            $name = " - Online Brand Publicity";
        else
        if($id > 46 && $id < 50)
            $name = " - Dynamic Website";
        else
        if($id > 49 && $id < 54)
            $name = " - Book Trailers";
        else
        if($id > 53 && $id < 57)
            $name = " - Book Review";
        else
        if($id > 56 && $id < 61)
            $name = " - Print Advertising";
        else
        if($id > 60 && $id < 65)
            $name = " - Book Fairs";
        else
        if($id > 64 && $id < 67)
            $name = " - Book Signing";
        else
        if($id > 66 && $id < 72)
            $name = "";
        else
        if($id > 71 && $id < 75)
            $name = " - Press Release";
        else
        if($id > 74 && $id < 78)
            $name = "";
        else
        if($id == 78)
            $name = " - Audiobook";
        else
        if($id > 78 && $id < 84)
            $name = " - New York Times Magazine Advertising";
        else
        if($id > 83 && $id < 94)
        $name = " - Marketing Add-On";
        else
        if($id > 93 && $id < 101)
        $name = "";
        else
            $name = "";
        
        $this->Cell(0,12,'Product Name: '.$index[$id].$name,'',0,'L',true);
        $this->Ln();
        $type = $id > 43 ? "Marketing" : "Publishing";
        $type .= $compli == 1 ? " (Complimentary)" : "";
        $this->Cell(0,12,'Package Type: '.$type,'',0,'L',true);
        $this->Ln();
        $this->SetFont('Arial','B',10);
        $type = $id > 43 ? " marketing " : " publishing ";
        $this->Cell(0,8,'Thank you for allowing ReadersMagnet to help you with your'.$type.'needs.','',0,'L',true);
        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->Cell(0,8,'This page sets forth the inclusions of the'.$type.'product that you purchased.','',0,'L',true);
        $this->Ln();
        $this->Ln();
        $this->SetFont('Arial','UB',10);
        $this->Cell(0,8,'Inclusions:','',0,'L',true);
        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->MultiCell(0,5,$inclusions[$id],'0','');
      
    }

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
        if($obj->editorial == 2){
            $this->Cell(75,7,"Book Type",1,0,'C',true);
            $this->Cell(20,7,"Cover Cost",1,0,'C',true);  
            $this->Cell(30,7,"Cost per Page",1,0,'C',true);
            $this->Cell(10,7,"x",1,0,'C',true);
            $this->Cell(25,7,"w/Cover",1,0,'C',true);
            $this->Cell(25,7,"Retail Price",1,0,'C',true);
        }else
        if($obj->editorial == 1){
            $this->Cell(20,7,"#",1,0,'C',true);
            $this->Cell(75,7,"Product",1,0,'C',true);  
            $this->Cell(30,7,"Page Count",1,0,'C',true);
            $this->Cell(20,7,"Word Cnt",1,0,'C',true);
            $this->Cell(20,7,"Price" ,1,0,'C',true);
            $this->Cell(20,7,"Total",1,0,'C',true);
        }else{
            $this->Cell(20,7,"#",1,0,'C',true);
            $this->Cell(75,7,"Product",1,0,'C',true);  
            $this->Cell(30,7,'Quantity',1,0,'C',true);
            $this->Cell(20,7,"Gross",1,0,'C',true);
            $this->Cell(20,7,"Net" ,1,0,'C',true);
            $this->Cell(20,7,"Price",1,0,'C',true);
        }

        $this->Ln();

        $this->SetFillColor(255,255,255);
        $this->SetTextColor(52,58,64);
        $this->SetDrawColor(52,58,64);
        $this->SetFont('Arial','',10);
        for($i = 0; $i < $obj->count; $i++){
            $prod = $obj->products[$i]->desc;
            if($obj->editorial == 2){
                $cover_cost = "$".number_format($obj->products[$i]->cover_cost,2,".",",");
                $x = "$".number_format($obj->products[$i]->x,2,".",",");
                $with_cover = "$".number_format($obj->products[$i]->w_cover,2,".",",");
                $cost_per_page = "$";
                $cost_per_page .=number_format($obj->products[$i]->cost_per_page,3,".",",")."/page";
                $this->Cell(75,7,$prod,1,0,'L',true);
                $this->Cell(20,7,$cover_cost,1,0,'C',true);  
                $this->Cell(30,7,$cost_per_page,1,0,'C',true);
                $this->Cell(10,7,$x,1,0,'C',true);
                $this->Cell(25,7,$with_cover,1,0,'R',true);
                $this->Cell(25,7,$total_net,1,0,'R',true);
                $this->Ln();
            }else{
                $num = $i + 1;
                $id = "Product ".$num;
                $quan = $obj->products[$i]->quan;
                $quan = number_format($quan,0,".",",");
                $quan .= $obj->products[$i]->unit && $obj->editorial == 0 ? " ".$obj->products[$i]->unit : '';
                $gross = $obj->editorial == 0 ? "$".number_format($obj->products[$i]->gross,2,".",",") : $obj->products[$i]->gross ;
                $net = "$";
                $net .= $obj->editorial ? number_format($obj->products[$i]->net,3,".",",")."/word" : number_format($obj->products[$i]->net,2,".",",");
                $price = "$".number_format($obj->products[$i]->price,2,".",",");
                $this->Cell(20,7,$id,1,0,'L',true);
                $this->Cell(75,7,$prod,1,0,'L',true);  
                $this->Cell(30,7,$quan,1,0,'C',true);
                $this->Cell(20,7,$gross,1,0,'C',true);
                $this->Cell(20,7,$net,1,0,'R',true);
                $this->Cell(20,7,$price,1,0,'R',true);
                $this->Ln();
            }

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

if(isset($_POST) && isset($_POST['submitProdAndServices'])):
    $prod = $_POST['bookVal'];
    $complimentary = $_POST['complimentaryVal'];
    ob_start();
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->prodAndServices($prod,$complimentary);
    $pdf->Output();
    ob_end_flush();
    echo $prod;
endif;