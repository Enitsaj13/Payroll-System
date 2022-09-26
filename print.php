<?php
	function generateRow(){
		$contents = '';
		include('database/dbconnection.php');
		$sql = "SELECT * FROM payroll_process";

	

	// displaying the data in the table
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($query)){
			$contents .= "
			<tr>
				<td>".$row['name']."</td>
		 		<td>".$row['rate']."</td>
		 		<td>".$row['deductions']."</td>
		 		<td>".$row['grosspay']."</td>
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

      	<h2 align="center">Salary Slip</h2>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
            <th width="30%">Name</th>
			<th width="17%">Rate</th>
			<th width="18%">Deduction</th>
			<th width="17%">Gross Pay</th> 
			<th width="18%">Net Pay</th>
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    ob_end_clean();
    $pdf->Output('employee_details.pdf', 'I');
	

?>