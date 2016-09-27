<?php
require 'connection.php';
if(isset($_GET['id']))
	{

			$dcs = "Department of Computer Sciences";
			

	require("fpdf/fpdf.php");


		$id = $_GET['id'];
		$conn = $dbCon;

                $sqlpending = "SELECT room_subj_stud.room_subj_id, 
                room_subj_stud.room_reserve_id,
                room_subj_stud.student_id,
                room_subj_stud.time_start,
                room_subj_stud.time_end,
                room_subj_stud.reason,
                student.student_id,
                student.student_name,
                student.student_course,
                student.student_year,
                student.student_no,
                room.room_num,
                room.room_type,
                room.room_location
                from room_subj_stud
                JOIN student ON student.student_id = room_subj_stud.student_id
                JOIN room_subject ON room_subject.room_subj_id = room_subj_stud.room_subj_id
                JOIN room ON room.room_num = room_subject.room_num
                WHERE room_subj_stud.application = 'approved' AND room_subj_stud.room_reserve_id = '".$id."'";
                $resultpending = $conn->query($sqlpending);

            $row = $resultpending->fetch_assoc();

    
    $pdf = new FPDF();
	$pdf->AddPage();
	$pdf->Image("usclogo.jpg",10,3,-600);
	$pdf->Image("usclogo.jpg",180,3,-600);
	$pdf->SetFont("Arial","B",10);
	$pdf->Cell(0,5,"University of San Carlos",0,0,'C');
	$pdf->Ln();
	$pdf->Cell(0,5,"School of Arts and Sciences",0,0,'C');
	
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();

	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFont("Arial","B",15);
	$pdf->Cell(0,5,"Computer Education and Application Centre",0,0,'C');
	$pdf->Ln();

	$pdf->SetFont("Arial","",12);
	$pdf->Cell(0,5,"Department of Computer Sciences",0,0,'C');

	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFont("Arial","U",12);
	$pdf->Cell(0,10,"FACILITIES BORROWER's SLIP",0,0,'C');

	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();


	/*Time and Date Record*/
	$pdf->SetFont("Arial","",12);
	$pdf->MultiCell(0,-5,"Borrow Date: {$row['time_start']} \nBorrow Time:",0,'L',false);
	$pdf->MultiCell(0,5," Expected Time of Return:  \nExpected Date of Return:",0,'C',false);

	$pdf->Line(20,57,190,57);

	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();


	/*Students Info*/
	$pdf->MultiCell(0,5,"Name: {$row['student_name']} \nCourse & Year: {$row['student_course']} {$row['student_year']} \nContact No: {$row['student_no']}",1,'L',false);

	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();

	/*HEADER*/
	$pdf->Cell(63.3,10,"Room Number ",1,0,'C');
	$pdf->Cell(63.3,10,"Room Location",1,0,'C');
	$pdf->Cell(63.3,10,"Room Type",1,0,'C');

	$pdf->Ln();
	
	for($i=0;$i<1;$i++){ /*<-- MAO NI PAGA OUTPUT KUNG DATABASE SAMPLE RANI*/
	$pdf->Cell(63.3,10,"{$row['room_num']}",1,0,'C');
	$pdf->Cell(63.3,10,"{$row['room_location']}",1,0,'C');
	$pdf->Cell(63.3,10,"{$row['room_type']}",1,0,'C');
	$pdf->Ln();
	}
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();


	/*Second Page*/
	$pdf->AddPage();
	$pdf->Image("usclogo.jpg",10,3,-600);
	$pdf->Image("usclogo.jpg",180,3,-600);
	$pdf->SetFont("Arial","B",10);
	$pdf->Cell(0,5,"University of San Carlos",0,0,'C');
	$pdf->Ln();
	$pdf->Cell(0,5,"School of Arts and Sciences",0,0,'C');
	
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFont("Arial","",12);
	$pdf->Cell(0,5,"Terms and Condition",0,0,'C');

	$pdf->Ln();

	$pdf->SetFont("Arial","b",10);
	$pdf->Cell(0,5,"Item(s) Condition",0,0,'L');

	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFont("Arial","",12);
	$pdf->MultiCell(0,5,"             1.) All items dispensed to the borrower is in good working condtion.\n             2.) The Borrowed item(s) is the liability of the borrower; under in all circumstances, the\n                  borrower shall see to it that proper handling and care is applied to the item(s) being\n                  borrowed within borrowing period.\n             3.) Any damages incurred to the borrowed item(s) will be charge to the borrower.\n                  a.) In cases where another person(not the authorized borrower) incurred the damage of\n                       the borrowed item within the borrowing period, this becomes a shared liability for both\n                       the authorized borrower and the person who incurred the damage.\n             4.) Damaged items should immediately be reported to the laboratory personnel.",0,false);

	$pdf->Ln();

	$pdf->SetFont("Arial","b",10);
	$pdf->Cell(0,5,"Location",0,0,'L');

	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFont("Arial","",12);
	$pdf->MultiCell(0,5,"             5.) The borrowed item(s) may only be utilized within laboratory premises; if the item is used\n                  outside of the laboratory(but still within Univeristy premises), this has to be stated\n                  properly prior to approval\n             6.) Bringing of item(s) outisde of the University premises is prohibited, with the exemption of\n                  DSLRs and underlying accessories, provide that a course/subject teacher is\n                  accompanying the borrower:\n\n\n                     a.) In such cases, it is the responsibility of the course/subject teacher to seek approval\n                          for the purpose of bringing the item(s) outside of University premises.\n                     b.) Approval from the Department Chair is needed in this scenario.",0,false);

	$pdf->Ln();

	$pdf->SetFont("Arial","b",10);
	$pdf->Cell(0,5,"Time",0,0,'L');

	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFont("Arial","",12);
	$pdf->MultiCell(0,5,"             7.)Borrowing time for students is limited only up to 1 hour and 30 minutes. The student has\n                  to return the borrowed item(s) within 15 minutes after the end of the borrowing time.\n             8.)Borrowing time for faculty is extended up to 8 hours. If borrowing is expected to exceed 8\n                  hours, approval from the Dept. Chair has to acquired.",0,false);

		$pdf->Ln();

	$pdf->SetFont("Arial","b",10);
	$pdf->Cell(0,5,"Miscellaneous",0,0,'L');

	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFont("Arial","",12);
	$pdf->MultiCell(0,5,"             9.) Never lose this form. This form has to be surrendered back to the laboratory dispensing\n                  area upon returning the borrowed item(s).\n             10.)Borrowers cannot borrow more than one half (1/2) of the total items of an item type.",0,false);

	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFont("Arial","b",10);
	$pdf->Cell(0,5,"Acknowledge by:",0,0,'C');

	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();

	$pdf->Cell(0,5,"___________________                                  ______{$row['student_name']}______",0,0,'C');

	$pdf->Ln();
	$pdf->MultiCell(0,5,"Signature of Advisor                                    Signature of Borrower\nOver Printed Name                                        Over Printed Name",0,'C',false);

	$pdf->Output();
		
}
?>	