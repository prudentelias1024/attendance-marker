<?php
require('../fpdf/fpdf.php');

include '../includes/db.php';
$db = new Db;

if (isset($_POST["generate"])) {
    $course = $_POST['course'];
    //List of all parameters
     $no_of_class_taken = $db->getNoOfClassesTaken($course);
    $participants = $db->getCourseRegistrants($course);
    $no_of_registered = count($participants);
    $courseDetails = $db->getACourse($course);
    
     $pdf = new FPDF('P','cm','A4');
    $pdf->AddPage();
     $pdf->Image('../npa1.png',6.2,0);
    $pdf->SetFont('Arial','BU',20);
    $pdf->Cell(null,7,'Training General Summary Report',0,0,'C');  
    $pdf->SetFont('Times',null,20);
    $pdf->SetFontSize(15);
    
    $pdf->SetY(0);
    $pdf->Cell(40,12,'Training Title: '.$courseDetails["Training_title"],0,0,1);  
   
    $pdf->SetX(12);
    $pdf->Cell(40,12,'Training Code: '.$courseDetails["Training_Code"],0,0,1);  
    
    $pdf->SetY(1);
    $pdf->Cell(40,12,'Location: '.$courseDetails["Training_Location"],0,0,1);  
    
    $pdf->SetX(12);
    $pdf->Cell(40,12,'Schedule: '.$courseDetails["Schedule"],0,0,1);  
    
    
    $pdf->SetY(2);
    $pdf->Cell(40,12,'No of Classes: '.$courseDetails["No_Of_Classes"],0,0,1);  
    
    $pdf->SetX(12);
    $pdf->Cell(40,12,'Class Taken: '.$courseDetails["Class_Taken"],0,0,1);  
    
    
    $pdf->SetY(3);
    $pdf->Cell(40,12,'Held On: '.$courseDetails["Training_Day"],0,0,1);  
    
    $pdf->SetX(12);
    $pdf->Cell(40,12,'Started On: '.$courseDetails["Training_Startdate"],0,0,1);  
    
    $pdf->SetY(4);
    $pdf->Cell(40,12,'Training Duration: '.$courseDetails["Training_Duration"],0,0,1);  
    
    $pdf->SetX(12);
    $pdf->Cell(40,12,'Training Coordinator: '.$courseDetails["Training_Coordinator"],0,0,1);  
    if ($no_of_class_taken == 0) {
        $pdf->SetFont('Arial','B',20);
        $pdf->SetY(6);
        $pdf->Cell(40,12,'No Class Taken Yet ',0,0,1);  
    
    } else{

    
    $pdf->SetFont('Arial','B',20);
    $pdf->SetY(6);
    $pdf->Cell(40,12,'Students Summary ',0,0,1);  

    //Student Summary
    for ($i=0; $i < $no_of_class_taken ; $i++) { 
        $course = $course.'_0'.$no_of_class_taken;
        $attendees = $db->getAllPresentStudent($course);
        $total_attendees = count($attendees);
        $total_absentees = $no_of_registered - $total_attendees;
      
        $pdf->SetFont('Times','b',20);
        $pdf->SetY(7);
        $pdf->SetFontSize(15);
        if ($courseDetails['Schedule'] == 'Weekly') {
              $pdf->Cell(40,12,'Week'.strval($i+1) ,0,0,1);  
        }
        if ($courseDetails['Schedule'] == 'Daily') {
              $pdf->Cell(40,12,'Day'.strval($i+1) ,0,0,1);  
        }
        if ($courseDetails['Schedule'] == 'Monthly') {
              $pdf->Cell(40,12,'Month'.strval($i+1) ,0,0,1);  
        }
        if ($courseDetails['Schedule'] == 'Yearly') {
              $pdf->Cell(40,12,'Year'.strval($i+1) ,0,0,1);  
        }

    
    $pdf->SetFont('Times',null,20);
    $pdf->SetFontSize(15);
  
    $pdf->SetY(7.9);
    $pdf->Cell(40,12,'Number Of Attendees: '.$total_attendees,0,0,1);  
    
    $pdf->SetX(12);
    $pdf->Cell(40,12,'Number Of Absentees: '.$total_absentees,0,0,1);  
    
    
    $pdf->SetY(8.75);
    $pdf->Cell(40,12,'Turn-up Percentage: '.strval(($total_attendees/$no_of_registered)* 100).'%',0,0,1);  
    
    $pdf->SetX(12);
    $pdf->Cell(40,12,'Turndown Percentage: '.strval(($total_absentees/$no_of_registered)* 100).'%',0,0,1);  
    
     
    $pdf->SetY(9.5);
    $pdf->Cell(40,12,'Never Attended: ',0,0,1);  
    
    $pdf->AliasNbPages();
    
    //Attendees Summary
    $pdf->SetFont('Arial','B',20);
    $pdf->SetY(6.5);
    $pdf->Cell(40,21,'Attendees ',0,0,1);  
    $i = 0;
    foreach ($attendees as $key => $attendant) {
        $i+=0.89; 
        $key++;
        $pdf->SetY(12+$i);
        $pdf->SetFont('Times','',20);
        $pdf->SetFontSize(15);
  
    $pdf->Cell(20,12,"$key. ".$attendant["Name"],0,0,1);  
     
    }
}
}
   ob_end_clean();
    $pdf->Output();
    // $pdf->Output('D',''.$course.' Reports.pdf');
}







?>