<?php
require_once('TCPDF/tcpdf.php'); // Include TCPDF library

if (isset($_POST["generatepdf"])) {
    include "dbconnection.php";
    $orderid = $_POST["order_id"];
    $result = mysqli_query($connect, "SELECT * FROM orders WHERE order_id = $orderid");
    $row = mysqli_fetch_assoc($result);

    // Create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Order Details');
    $pdf->SetSubject('Order Details');
    $pdf->SetKeywords('Order, Details, PDF');

    // Remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    // Set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // Set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

    // Set auto page breaks
    $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

    // Set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // Set font
    $pdf->SetFont('times', 'B', 18);

    // Add a page
    $pdf->AddPage();

    // Set receipt content
    $receiptContent = '
        <h2 style="font-size: 36px; color: black;">Receipt</h2><br><br>
    ';

    // Write the receipt content to the PDF (position at the middle top)
    $pdf->writeHTMLCell(0, 0, '', '', $receiptContent, 0, 1, false, true, 'C', true);

    // Set content for the PDF
    $orderContent = '
        <p>Order ID: <span style="color: brown;">'.$row["order_id"].'</span></p>
        <p>Customer Name: <span style="color: brown;">'.$row["customer_name"].'</span></p>
        <p>Customer Number: <span style="color: brown;">'.$row["customer_number"].'</span></p>
        <p>Customer Address: <span style="color: brown;">'.$row["customer_address"].'</span></p>
        <p>Product Name: <span style="color: brown;">'.$row["product_name"].'</span></p>
        <p>Total Price: <span style="color: brown;">'.$row["total_price"].'</span></p>
        <p>Order Date: <span style="color: brown;">'.$row["order_date"].'</span></p>
        <p>Payment Method: <span style="color: brown;">'.$row["payment_method"].'</span></p>
    ';

    // Write the order content to the PDF
    $pdf->writeHTML($orderContent, true, false, true, false, '');

    // Close and output PDF document
    $pdf->Output('order_details.pdf', 'I');
    exit;
}
?>