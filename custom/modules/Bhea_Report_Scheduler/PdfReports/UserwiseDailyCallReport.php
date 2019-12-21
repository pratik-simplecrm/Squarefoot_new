<?php
ini_set("display_errors",1);
/**************************************************************************
        Print PDF Template By, Amit Sabal
        Functionality By, Amit Sabal
**************************************************************************/

if(!defined('sugarEntry')) define ('sugarEntry', true);
require_once('include/entryPoint.php');

if(file_exists('include/tcpdf/config/lang/eng.php')) {
	include_once('include/tcpdf/config/lang/eng.php'); 
} else {
	die('TCPDF lang not found');
}
if(file_exists('include/tcpdf/config/tcpdf_config.php')) {
	include_once('include/tcpdf/config/tcpdf_config.php');
} else {
	die('TCPDF config not found');
}
if(file_exists('include/tcpdf/tcpdf.php')) {
	include_once('include/tcpdf/tcpdf.php');
} else {
	die('TCPDF not found');
}

class MyPDF extends TCPDF {

	public function Header(){
		//parent::Header();
		$image_file = K_PATH_IMAGES.'tcpdf_logo.jpg';
		$this->Image($image_file, 10, 10, 20, 12, 'JPG', '', 'T', false, 300, 'R', false, false, 0,false, false, false);
	}

	//Modified Footer Function from TCPDF File
	public function Footer() {
		$cur_y = $this->GetY();
		$ormargins = $this->getOriginalMargins();
		$this->SetTextColor(0, 0, 0);
		//set style for cell border
		//$line_width = 0.85 / $this->getScaleFactor();
		//$this->SetLineStyle(array('width' => $line_width, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));

		//Print page number

		if ($this->getRTL()) {
			$this->SetX($ormargins['right']);

			$this->setFooterMargin(25);
			$this->SetLineStyle(array('width' => 0.85 / $this->getScaleFactor(), 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
			$this->MultiCell(0, 0, '', 'T', 0, 'C');
			$this->SetFont(PDF_FONT_NAME_MAIN,'B',10);

		} else {
			$this->SetX($ormargins['left']);

			$this->setFooterMargin(25);
			$this->SetLineStyle(array('width' => 0.85 / $this->getScaleFactor(), 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
			$this->MultiCell(0, 0, '', 'T', 0, 'C');
			$this->SetFont(PDF_FONT_NAME_MAIN,'',10);					  
		}				
	}
}

class PrintPdf extends TCPDF 
{

  function callme()
  {
    global $app_list_strings,$db;
	global $sugar_config;
		
	//$todaysdate=date("d/m/Y");
	$todaysdate="08/07/2014";
	
	// 3. From Date & 4. To Date filter Condition
	$from_date = $todaysdate;
	if(!empty($from_date))
	{
		$tmp = explode("/",$from_date);
		if( count($tmp) == 3)
		{
			$from_date = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
		} else 
		$from_date = '';
	}
	if(!empty($from_date))
	{
		$from_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($from_date)));
		$from_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($from_date)));
		$from_date = " and C.date_entered >= '$from_date' ";
	}
	
	$to_date = $todaysdate;
	if(!empty($to_date))
	{
		$tmp = explode("/",$to_date);
		if( count($tmp) == 3)
		{
			$to_date = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]);
			$to_date = date('Y-m-d', strtotime($to_date. ' + 1 days'));
		} else 
		$to_date = '';
	}
	if(!empty($to_date))
	{
		 $to_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($to_date)));
		 $to_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($to_date)));
		 $to_date = " and C.date_entered <= '$to_date' ";
	} 

    global $db;
	
	/** Query to get data **/
	
	$query = " SELECT 
				count(C.id) as total_rows
				FROM 
					calls C
					
					LEFT JOIN  users U ON C.assigned_user_id = U.id AND U.deleted=0

					LEFT JOIN  accounts A ON C.parent_id = A.id AND A.deleted=0 AND C.parent_type = 'Accounts'					
					LEFT JOIN  calls_contacts CRC ON C.id = CRC.call_id AND CRC.deleted=0
					LEFT JOIN  contacts Con ON Con.id = CRC.contact_id AND Con.deleted=0
					
					LEFT JOIN  arch_architectural_firm ARF ON C.parent_id=ARF.id AND ARF.deleted=0 
					AND C.parent_type = 'Arch_Architectural_Firm'
					
					LEFT JOIN  arch_architects_contacts AR ON C.parent_id= AR.id AND AR.deleted=0
					AND C.parent_type = 'Arch_Architects_Contacts'
					
					LEFT JOIN team as T ON T.id=C.team_id and T.deleted=0
				WHERE C.deleted=0  
					$from_date
					$to_date				 
				";              

        $result = $db->query($query);
        if($row = $db->fetchByAssoc($result))
        {
            $total_rows = $row['total_rows'];
        }
		
		
		$MData = $data;
        $data = '';
		
   	/***********************************************************************************************/
        $pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Amit Sabal');
        $pdf->SetTitle('Daily Call');
        $pdf->SetSubject('Daily Call');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        $pdf->SetFont('helvetica', '', 10, '', true);

		
        $html = '';
        
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		//set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetFooterMargin(10);
		
		//set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		//set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->AddPage();

	$tbl = <<<EOD

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<table >
		<tr>
			<br/><br/>
			<td> <br/><font size="10">&nbsp;SquareFoot - User Wise Daily Calls Report</font><br/>&nbsp;Date:&nbsp;<b>$todaysdate</b></td>				
		</tr>
		<hr></hr>
	</table>
	<br/><br/>
	 <tr>     
  		<td ><b>Subject</b></td>
		<td ><b>Account Name</b></td>
		<td ><b>Contact Name</b></td>
	 	<td><b>Architectural Firm</b></td>
	 	<td><b>Architect Name</b></td>
	 	<td><b>Description</b></td>
	  </tr> 
	  <br/><br/>
EOD;

		//Main Query
          $query = " SELECT
					IFNULL(C.id,'') id,
					IFNULL(C.name,'') calls_name,
					IFNULL(A.id,'') acc_id,
					IFNULL(A.name,'') acc_name,
					IFNULL(Con.id,'') cont_id,
					CONCAT(IFNULL(Con.first_name,''),' ',IFNULL(Con.last_name,'')) contact_full_name,
					IFNULL(ARF.id,'') firm_id,
					IFNULL(ARF.name,'') firm_name,
					IFNULL(AR.id,'') archi_id,
					CONCAT(IFNULL(AR.first_name,''),' ',IFNULL(AR.last_name,'')) archi_full_name,
					IFNULL(C.description,'') calls_description,
					CONCAT(IFNULL(U.first_name,''),' ',IFNULL(U.last_name,'')) as user_name,
					T.name team_name
				FROM calls C 

					LEFT JOIN  users U ON C.assigned_user_id = U.id AND U.deleted=0

					LEFT JOIN  accounts A ON C.parent_id = A.id AND A.deleted=0 AND C.parent_type = 'Accounts'					
					LEFT JOIN  calls_contacts CRC ON C.id = CRC.call_id AND CRC.deleted=0
					LEFT JOIN  contacts Con ON Con.id = CRC.contact_id AND Con.deleted=0
					
					LEFT JOIN  arch_architectural_firm ARF ON C.parent_id=ARF.id AND ARF.deleted=0 
					AND C.parent_type = 'Arch_Architectural_Firm'
					
					LEFT JOIN  arch_architects_contacts AR ON C.parent_id= AR.id AND AR.deleted=0
					AND C.parent_type = 'Arch_Architects_Contacts'
					
					LEFT JOIN team as T ON T.id=C.team_id and T.deleted=0

				WHERE  C.deleted=0
				 $from_date
				 $to_date
				 ORDER BY C.date_entered DESC  limit 0 , 10
				";
                               
        $result = $db->query($query);
        $data = array();
        $r = 1;
        while($row = $db->fetchByAssoc($result))
        {
           
			$subject 		    = ucwords(strtolower($row['calls_name']));			
			$acc_name	     	= ucwords(strtolower($row['acc_name']));
			$contact_full_name	= ucwords(strtolower($row['contact_full_name']));       
			$firm_name	    	= ucwords(strtolower($row['firm_name']));
			$archi_full_name    = ucwords(strtolower($row['archi_full_name']));             
			$calls_description	= $row['calls_description'];					
			$user_name			= trim($row['user_name']);
			$user_name    		= ucwords(strtolower($user_name));                   
           
       		
			$tbl .=<<<EOD
			
	 
  	  <tr>
  		<td >$subject</td>
  		<td >$acc_name</td>
  		<td >$contact_full_name</td>
  		<td >$firm_name</td>
  		<td >$archi_full_name</td>
  		<td >$calls_description</td>	
		<br/><br/>
	  </tr>  
	
EOD;

		}
		
		$tbl .=<<<EOD
		
  		<br/><br/>
		<tr>      
			<td ><b>User Name</b></td>
			<td ><b>Count</b></td>		
		</tr>  
		<tr>      
			<td ><b>$user_name</b></td>
			<td ><b>$total_rows</b></td>		
		</tr> 

<!---------------------------------------------------------->

</table>
		
EOD;
		
	 
		/** Code to create a PDF file and also attachment **/
        $files_name ='Daily Call Report'; 
		$pdf->writeHTML($tbl, true, false, false, false, '');
		$pdf->Output('pdfs/'.$files_name.'.pdf','F');	
		ob_clean();
		ob_flush();
		$attachment='pdfs/'.$files_name.'.pdf';
		
        /***************************** Email PDF as Attachment functionality starts here ***********************/  
         
		require_once("include/SugarPHPMailer.php");
        $note_msg=new SugarPHPMailer();
        $admin = new Administration();
        $admin->retrieveSettings();
        $note_msg->Subject = 'SquareFoot - Daily Report';
        $note_msg->prepForOutbound();
        $note_msg->setMailerForSystem();
		
         $note_msg->From     = $admin->settings['notify_fromaddress'];
         $note_msg->FromName = $admin->settings['notify_fromname'];
         
         $note_msg->AddAddress('amit@bhea.co.in');
         $note_msg->AddAttachment($attachment);
		 $note_msg->Body="This is SugarCRM auto generated mail. Please don't reply";
         
         if (!$note_msg->Send())
         {
               die("Could not send case closed notification:  " . $note_msg->ErrorInfo);
         }
         else
         {
                echo "Send";
         } 
        
      /*********************************** Email  PDF Attachment function Ends here ****************************/

    }
}

// ob_clean(); // To Clean the object buffer
// $obj = new PrintPdf();
// $obj->callme();
 
?>
