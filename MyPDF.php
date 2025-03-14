<?php

// Using FPDF to create a PDF
require('fpdf/fpdf.php');

// Create a PDF class extending FPDF
class MyPDF extends FPDF{
    // Page Header
    function header(){
        // Logo
      //  $this -> Image ('logo.png', 10, 6, 30);

        // Arial bold 15
        $this -> SetFont('Arial', 'B', 15);

        // Move to the right
        $this -> cell(80);

        // Title
        $this -> cell(30, 10, 'Company Report', 0, 0, 'C');

        // Line Break
        $this -> Ln(20);
    }

    // Page footer
    function Footer(){
        // Position at 1.5cm from bottom

        $this -> SetY(-1.5);

        // Arial italic 8
        $this -> setFont('Arial', 'I', 8);

        // Page number
        $this -> cell(0, 10, 'Page' . $this -> PageNo() . '/{nb}', 0, 0, 'C');

    }
}

// Generate a PDF document
function generatePDF($title, $content, $filename = "document.pdf"){
    // Create a new PDF instance
    $pdf = new MyPDF;

    // Set document information
    $pdf -> SetAuthor('PHP System');
    $pdf -> SetTitle($title);

    // Set auto page break
    $pdf -> SetAutoPageBreak(true, 15);

    // Add a page
    $pdf -> AddPage();

    // Set font
    $pdf -> SetFont('Arial', '', 12);

    // Add content
    $pdf -> Write(10, $content);

    // Output the pdf
    $pdf -> Output($filename, 'D'); // 'D' means download
}

// Examle usage
$title = "Sample Report";
$content = "This is a sample PDF generated using FPDF library in PHP. \n\n";
$content .= "It demonstrates how to create dynamic PDF files from PHP applications";

// Call the function to generate and download the PDF
generatePDF($title, $content, "report.pdf");

?>