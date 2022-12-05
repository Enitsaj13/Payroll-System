<?php
session_start();
	function generateRow(){
		$contents = '';
		include('database/dbconnection.php');
		$sql = "SELECT * FROM payroll_process WHERE name='".$_SESSION['user']['name']."';";

	// displaying the data in the table
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($query)){
			$fdate = date_format(date_create($row['pay_period']),"Y-m");
			$contents .= "
			<tr>
				<td>".$fdate."</td>
				<td>".$row['day_work']."</td>
				<td>".$row['overtime']."</td>
				<td>".$row['late']."</td>
				<td>".$row['leave_number']."</td>
				<td>".$row['absence']."</td>
				<td>".$row['grosspay']."</td>
				<td>".$row['deductions']."</td>
		 		<td>".$row['netpay']."</td>
			</tr>
			";
		}
	
		
		return $contents;
	}

	// generating the table
	require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Salary Slip");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
		<table style="padding-bottom: 30px">
			<tr>
			 <th width="50%">Employee Name: '.$_SESSION['user']['name'].'</th>
			 <th width="50%" align="right">Department/Position: '.$_SESSION['user']['department'].'/'.$_SESSION['user']['position'].'</th>
			</tr>
		</table>
      	<h4 align="center">Salary Slip</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>
		   	<th width="11%">Pay Period</th>
			<th width="11%">Days of Work</th>
			<th width="11%">Overtime</th>
			<th width="11%">Late</th>
			<th width="11%">Leave</th>
			<th width="11%">Absent</th>
			<th width="11%">Gross Pay</th>
			<th width="11%">Deduction</th> 
			<th width="12%">Net Pay</th>
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    ob_end_clean();
    $pdf->Output('employee_details.pdf', 'I');
	

?>