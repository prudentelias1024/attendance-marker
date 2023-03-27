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
    $no_of_participant = count($participants);

    $gen_attendees = 0;
    $gen_absentees = 0;
    // $gen_total_attendees = count($attendees);
    $turn_up = 0;
    $turn_down = 0;
    $gen_absentees = $no_of_registered - $total_attendees;

   
     $pdf = new FPDF('P','cm','A4');
     $pdf->AliasNbPages();
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
    
    // $pdf->SetY(5);
    // $pdf->Cell(40,12,'Turn-up Percentage: '.$turn_up. '%',0,0,1);  
    
    // $pdf->SetX(12);
    // $pdf->Cell(40,12,'Turn-down Percentage  : '.$turn_down.'%',0,0,1);  
    if ($no_of_class_taken == 0) {
        $pdf->SetFont('Arial','B',20);
        $pdf->SetY(6);
        $pdf->Cell(40,12,'No Class Taken Yet ',0,0,1);  
    
    } else{

    
    $pdf->SetFont('Arial','B',20);
    $pdf->SetY(6);
    $pdf->Cell(40,12,'Students Summary ',0,0,1);  
    

    //Student Summary
    
       
        $course = $course.'_0'.strval($no_of_class_taken);
        $attendees = $db->getAllPresentStudent($course);
        $absentees = $db->getAllAbsentStudent($course);
        $total_attendees = count($attendees);
        $total_absentees = $no_of_registered - $total_attendees;
      
        $pdf->SetFont('Times','b',20);
        $pdf->SetY(7);
        $pdf->SetFontSize(15);
        if ($courseDetails['Schedule'] == 'Weekly') {
              $pdf->Cell(40,12,'Week '.strval($no_of_class_taken) ,0,0,1);  
        }
        if ($courseDetails['Schedule'] == 'Daily') {
              $pdf->Cell(40,12,'Day'.strval($no_of_class_taken) ,0,0,1);  
        }
        if ($courseDetails['Schedule'] == 'Monthly') {
              $pdf->Cell(40,12,'Month'.strval($no_of_class_taken) ,0,0,1);  
        }
        if ($courseDetails['Schedule'] == 'Yearly') {
              $pdf->Cell(40,12,'Year'.strval($no_of_class_taken) ,0,0,1);  
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
    
    if ($total_absentees > 0) {
        foreach ($absentees as $key => $absentee) {
   
        $pdf->SetY(9.5);
        $pdf->Cell(40,12,'Never Attended: '.$absentee["Name"],0,0,1);  

        $pdf->SetX(12);
         $pdf->Cell(40,12,'Registered Student: '.$no_of_registered,0,0,1);  
    
        }
      
    } else{
    
    $pdf->SetY(9.5);
    $pdf->Cell(40,12,'Registered Student: '.$no_of_registered,0,0,1);  
    
    }

   
    
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
  
    $pdf->Write(10,"$key. ".$attendant["Name"],0,0,1);  
 
     
    }

    if ($total_absentees > 0) {
      
    
    $j = 12 + ($i * 0.89);
     $pdf->SetAutoPageBreak(true);
    $pdf->SetFont('Arial','B',20);
    $pdf->SetY($j);
    $pdf->Cell(null,$j,'Absentees ',0,0,1);  
   
    $j+=1.5;
    foreach ($absentees as $key => $absentee) {
        $j+=.89; 
        $key++;
        $pdf->SetY($j);
        $pdf->SetFont('Times','',20);
        $pdf->SetFontSize(15);
  
    $pdf->Cell(0,12,"$key. ".$absentee["Name"],0,0,1);  
    }
    }

}
   ob_end_clean();
    $pdf->Output();
    // $pdf->Output('D',''.$course.' Reports.pdf');
}







?>