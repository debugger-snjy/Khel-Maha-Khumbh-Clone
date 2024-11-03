<?php
session_start();

// Include autoloader 
require_once '../Dependencies/dompdf/autoload.inc.php';

// Reference the Dompdf namespace 
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->setIsRemoteEnabled(true);

// Instantiate and use the dompdf class 
$dompdf = new Dompdf($options);


$values = json_decode($_SESSION["userData"], true)[0];
// echo "Script : " . print_r($values);

$valuedHTML = populateTemplate($values);

// Load HTML content 
$dompdf->loadHtml($valuedHTML);

// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('ledger', 'portrait');

// Set the margin to 0
$options = $dompdf->getOptions();

// Render the HTML as PDF 
$dompdf->render();

// Output the generated PDF to Browser 
$dompdf->stream($values["firstName"]."_".$values["lastName"].'_PlayerReceipt.pdf');

?>

<?php

// Function to replace placeholders in the HTML template with actual values
function populateTemplate($userData)
{


    // templatePDF
    $htmlTemplate = file_get_contents("./pdfTemplate.php");
    // echo "<script>console.log(`$html`)</script>";

    foreach ($userData as $field => $value) {
        // echo $field;
        if ($field != "profileImage" || $field != "updationDate" || $field != "isDeleted") {
            $htmlTemplate = str_replace("{{{$field}}}", "$value", $htmlTemplate);
            // echo "Done<br>";
        }
    }

    // echo $htmlTemplate;


    // echo "<script>console.log(`".str_replace("{{firstName}}","Sanjay",$htmlTemplate)."`)</script>";


    // echo "<h1>Final : </h1>";
    // echo "<script>console.log(`$html`)</>";


    // Return the modified HTML content
    return $htmlTemplate;
}

?>