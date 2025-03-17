<?php

// Creating a more complex pdf with tables
function generateInvoicePDF($invoice_data){
    $pdf = new invoice();
    $pdf -> AliasNbPages(); // For page numbers
    $pdf -> AddPage();

    // Invoice header
    $pdf -> SetFont('Arial', 'B', 16);
    $pdf -> Cell(0, 10, 'INVOICE #' . $invoice_data['invoice_number'], 0, 1);
    $pdf -> Cell(0, 10, 'Date: ' . $invoice_data['date'], 0, 1);
    $pdf -> Cell(0, 10, 'Due Date: ' . $invoice_data['due_date'], 0, 1);

    // Add customer information
    $pdf -> Ln(10);
    $pdf -> SetFont('Arial', 'B', 12);
    $pdf -> Cell(0, 10, 'Bill to: ' , 0, 1 ,'C');
    $pdf -> SetFont('Arial', '', 12);
    $pdf -> Cell(0, 10, $invoice_data['customer'] ['name'], 0, 1);
    $pdf -> Cell(0, 10, $invoice_data['customer'] ['address'], 0, 1);
    $pdf -> Cell(0, 10, $invoice_data['customer'] ['city'] . ', ' . $invoice_data['customer'] ['state'] . '' . $invoice_data['customer']['zip'], 0, 1);

    // Add items table
    $pdf -> Ln(10);
    $pdf -> SetFont('Arial', 'B', 12);

    // Table header
    $pdf -> Cell (90, 10, 'Description', 1, 0, 'C');
    $pdf -> Cell (30, 10, 'Quantity', 1, 0, 'C');
    $pdf -> Cell (30, 10, 'Price', 1, 0, 'C');
    $pdf -> Cell (40, 10, 'Total', 1, 1, 'C');


    $pdf -> SetFont('Arial', 'B', 12);

    // Table data
    $total_amount = 0;
    foreach($invoice_data['items'] as $item){
        $total = $item['quantity'] * $item['price'];
        $total_amount  += $total;

        $pdf -> Cell (90, 10, $item['description'], 1, 0);
        $pdf -> Cell (30, 10, $item['quantity'], 1, 0, 'C');
        $pdf -> Cell (30, 10, 'Ksh' . number_format($item['price'], 2), 1, 0, 'R');
        $pdf -> Cell (40, 10, 'Ksh' . number_format($total, 2), 1, 1, 'R');
    }

    // Total
    $pdf -> SetFont('Arial', 'B', 12);
    $pdf -> Cell(150, 10, 'Total Amount:', 1, 0, 'R');
    $pdf -> Cell(40, 10, 'Ksh' . number_format($total_amount, 2), 1, 1, 'R');

    // Output the PDF
    $pdf -> Output('Invoice_' . $invoice_data['invoice_number'] . '.pdf', 'D');
}

// Sample data
$invoice_data = [
    'invoice_number' => 12345,
    'date'=> date('Y-m-d') , // Current date
    'due_date'=> date('Y-m-d', strtotime('+30 days')), // 30 days
    'customer'=> [
        'name' => 'Chuck Norris',
        'address' => '123 Main Street',
        'city' => 'Norrisville',
        'state' => 'NY',
        'zip'=> '32133'
    ],
    'items' => [
        [
        'description' => 'Product 1',
        'quantity' => 2,
        'price' => 1999
    ],
    [
        'description' => 'Product 2',
        'quantity' => 1,
        'price'=> 2999
    ]
    ]
];
generateInvoicePDF($invoice_data);

?>