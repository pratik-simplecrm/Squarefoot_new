<?php
//echo "fff";exit;
require_once 'CustomReportCSV.php';

global $db,$sugar_config,$current_user, $user_name, $user_id;
$url = $sugar_config['site_url'];
$user = $_REQUEST['id'];
$user_id = $current_user->id;
$user_name = $current_user->user_name;
$user = $_REQUEST['id'];
$user_id = $current_user->id;
$user_name = $current_user->user_name;
$T1 = $T2 = $T3 = $T4= $T5= $T6= $T7 = $total = 0;
$CT1 = $CT2 = $CT3 = $CT4= $CT5= $CT6= $CT7 = $Closed_total = 0;
$error="";
if(isset($_REQUEST['from_date']) && isset($_REQUEST['to_date']))
{
	$from_date = date("Y-m-d", strtotime($_REQUEST['from_date'])) ;
    $to_date = date("Y-m-d", strtotime($_REQUEST['to_date']));
	$where = "and B.deleted=0 and `startdate_c`>='$from_date' and `startdate_c`<='$to_date'";
	
	//open ticket ageing days count
	$Open_sql = "SELECT 
			(select count(A.`id_c`) FROM `cases_cstm` as A inner join `cases` as B on A.id_c = B.id where A.`ageing_days_c` BETWEEN 0 AND 3 AND LOWER(B.`state`='open') $where) as T1,
			(select count(A.`id_c`) FROM `cases_cstm` as A inner join `cases` as B on A.id_c = B.id where A.`ageing_days_c` BETWEEN 4 AND 7 AND LOWER(B.`state`='open') $where) as T2,
			(select count(A.`id_c`) FROM `cases_cstm` as A inner join `cases` as B on A.id_c = B.id where A.`ageing_days_c` BETWEEN 8 AND 10 AND LOWER(B.`state`='open') $where) as T3,
			(select count(A.`id_c`) FROM `cases_cstm` as A inner join `cases` as B on A.id_c = B.id where A.`ageing_days_c` BETWEEN 11 AND 14 AND LOWER(B.`state`='open') $where) as T4,
			(select count(A.`id_c`) FROM `cases_cstm` as A inner join `cases` as B on A.id_c = B.id where A.`ageing_days_c` BETWEEN 15 AND 17 AND LOWER(B.`state`='open') $where) as T5,
			(select count(A.`id_c`) FROM `cases_cstm` as A inner join `cases` as B on A.id_c = B.id where A.`ageing_days_c` BETWEEN 17 AND 21 AND LOWER(B.`state`='open') $where) as T6,
			(select count(A.`id_c`) FROM `cases_cstm` as A inner join `cases` as B on A.id_c = B.id where A.`ageing_days_c`>21 AND LOWER(B.`state`='open') $where) as T7";
			
	$query = $db->query($Open_sql);
	$row = $db->fetchByAssoc($query);
    $T1 = ($row['T1']>0?$row['T1']:0);
	$T2 = ($row['T2']>0?$row['T2']:0);
	$T3 = ($row['T3']>0?$row['T3']:0);
	$T4 = ($row['T4']>0?$row['T4']:0);
	$T5 = ($row['T5']>0?$row['T5']:0);
	$T6 = ($row['T6']>0?$row['T6']:0);
	$T7 = ($row['T7']>0?$row['T7']:0);
	$sum_of_count = array($T1,$T2,$T3,$T4,$T5,$T6,$T7);
	$total = array_sum($sum_of_count);
	
	//Closed ticket ageing days count
	$Closed_sql = "SELECT 
			(select count(A.`id_c`) FROM `cases_cstm` as A inner join `cases` as B on A.id_c = B.id where A.`ageing_days_c` BETWEEN 0 AND 3 AND LOWER(B.`state`='closed') $where) as CT1,
			(select count(A.`id_c`) FROM `cases_cstm` as A inner join `cases` as B on A.id_c = B.id where A.`ageing_days_c` BETWEEN 4 AND 7 AND LOWER(B.`state`='closed') $where) as CT2,
			(select count(A.`id_c`) FROM `cases_cstm` as A inner join `cases` as B on A.id_c = B.id where A.`ageing_days_c` BETWEEN 8 AND 10 AND LOWER(B.`state`='closed') $where) as CT3,
			(select count(A.`id_c`) FROM `cases_cstm` as A inner join `cases` as B on A.id_c = B.id where A.`ageing_days_c` BETWEEN 11 AND 14 AND LOWER(B.`state`='closed') $where) as CT4,
			(select count(A.`id_c`) FROM `cases_cstm` as A inner join `cases` as B on A.id_c = B.id where A.`ageing_days_c` BETWEEN 15 AND 17 AND LOWER(B.`state`='closed') $where) as CT5,
			(select count(A.`id_c`) FROM `cases_cstm` as A inner join `cases` as B on A.id_c = B.id where A.`ageing_days_c` BETWEEN 17 AND 21 AND LOWER(B.`state`='closed') $where) as CT6,
			(select count(A.`id_c`) FROM `cases_cstm` as A inner join `cases` as B on A.id_c = B.id where A.`ageing_days_c`>21 AND LOWER(B.`state`='closed') $where) as CT7";
	$query2 = $db->query($Closed_sql);
	$row1 = $db->fetchByAssoc($query2);
    $CT1 = ($row1['CT1']>0?$row1['CT1']:0);
	$CT2 = ($row1['CT2']>0?$row1['CT2']:0);
	$CT3 = ($row1['CT3']>0?$row1['CT3']:0);
	$CT4 = ($row1['CT4']>0?$row1['CT4']:0);
	$CT5 = ($row1['CT5']>0?$row1['CT5']:0);
	$CT6 = ($row1['CT6']>0?$row1['CT6']:0);
	$CT7 = ($row1['CT7']>0?$row1['CT7']:0);
	$sum_of_count1 = array($CT1,$CT2,$CT3,$CT4,$CT5,$CT6,$CT7);
	$Closed_total = array_sum($sum_of_count1);
	
			
	
}else{
	    
		$error = "Please Enter From and To Date";
}
?>
<html>
   
        <head>
        <title> Ageing Days Report</title>
        <!-- CSS -->
        <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
        <link rel="stylesheet"  href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
        <!--<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">-->
        <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
        <!--<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">-->

        <!-- javascript -->
        <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>-->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
		<!--<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
		<script>
		 function showrageingdaysreport()
		{

        var gt = document.getElementById("ageing_generate_report").value;

        if (gt == 'Run')
        {
            var url = document.getElementById("pathurl").value;
            /* var id = '<?php echo $user_id; ?>';
            var name1 = '<?php echo $values; ?>';
            //
            var name = document.getElementById('name').value;


            var fld = document.getElementById('name');
            var values = [];
            for (var i = 0; i < fld.options.length; i++) {
                if (fld.options[i].selected) {
                    values.push(fld.options[i].value);
                }
            }
            console.log(values); */
            // alert("dlaskj");

            document.frmsales.action = 'index.php?module=Bhea_Custom_Reports&action=ageing_days';
            document.frmsales.submit();
        }
		}
		</script>
        
<style>
    .myclass{
        margin-top: 40px;
    }
	th, td {
    white-space: normal !important;
}

#datepicker{width:226px; float: left;margin-left: 448px;}
#datepicker > span:hover{cursor: pointer;}
label{margin-left: 20px;}
#datepicker1{width:226px; float: left;margin-left: 200px;}
#datepicker1 > span:hover{cursor: pointer;}
.runbtn{
margin-left: 10px;
    box-shadow: inset 0px 0px 16px 0px #454395;
    width: 48px;
    height: 31px;
    border-radius: 14%;
    border: black;
}
.resetbtn{
	box-shadow: inset 0px 0px 16px 0px #454395;
    width: 48px;
    height: 31px;
    border-radius: 14%;
border: black;
}
hr.style-eight {
  padding: 0;
border: none;
border-top: medium double #333;
color: #333;
text-align: center;
}
hr.style-eight:after {
content: "SUMMARY REPORT - AGE OF GREVIENCE";
display: inline-block;
position: relative;
top: -0.7em;
font-size: 1.5em;
padding: 0 0.25em;
background: white;
}

    </style>
</head>
   
    <body>
     
    <!-- datepicker -->
    <div class="myclass">
	<h1 style="margin-left: 559px;box-shadow: 1px 0px 5px 0px #2c2724;width: max-content;font-weight: 600;">SUMMARY REPORT - AGE OF GREVIENCE</h1>
	<!--<hr class="style-eight">-->
	<br/><br/>
	
      <form name="ageingdays" id="ageingdays" action="" method="post" target="_parent">
	  <input type="hidden" id="pathurl"  name="pathurl" value="<?php global $sugar_config;
		$url = $sugar_config['site_url'];
		{
			echo $url;
		}
		?>"/>
            <div class="row">
               
				<!--<label>Select Date: </label>-->
					<div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy" style="border-bottom:none;" >
						<input class="form-control" value = "<?php echo isset($_REQUEST['from_date']) ? $_REQUEST['from_date'] : '' ?>" name="from_date" id="from_date" type="text" placeholder="From Date" readonly style="border:solid 3px;"/>
						<span class="input-group-addon" style="border: solid 3px;"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>
               
				<!--<label>Select Date: </label>-->
					<div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy" style="border-bottom:none;" >
						<input class="form-control"  name="to_date" value = "<?php echo isset($_REQUEST['to_date']) ? $_REQUEST['to_date'] : '' ?>"  id="to_date" type="text" placeholder="To Date" readonly  style="border:solid 3px;"/>
						<span class="input-group-addon" style="border: solid 3px;"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>
           </div>
		   <span style="color:red;"><?php if(isset($error)){echo $error;} ?></span>
            <div class="row">
			
                <!--<button type="submit" onClick="showrageingdaysreport()" name="ageing_generate_report" id="ageing_generate_report" value="" class="btn btn-primary" style="margin-left: 20px;">Run</button>-->
				<input type="submit" onClick="showrageingdaysreport()" name="ageing_generate_report" id="ageing_generate_report" value="Run" class = "runbtn" style="margin-left: 15px;"/>
				<input type="reset" class = "resetbtn" name="clear" id="clear" value="Clear" style="margin-left: 10px;"/>
            </div>
			<br/>
		</form>
        <br/>
<!-- end of datepicker -->
<!--<a href="data:application/xml;charset=utf-8,your code here" download="filename.html">Save</a>-->
<table id="example" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Grievance Status</th>
                <th>Pending From 3 days</th>
                <th>Pending From 4 to 7 days</th>
                <th>Pending From 8 to 10 days</th>
                <th>Pending From 11 to 14 days</th>
                <th>Pending From 15 to 17 days</th>
				<th>Pending From 17 to 21 days</th>
				<th>Pending From more than 21 days</th>
				<th>Total</th>
            </tr>
        </thead>
       <tfoot align="right">
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
				<th></th>
				<th></th>
				<th></th>
            </tr>
        </tfoot> 
        <tbody>
            <tr>
			<th>Open</th>
				<th><?=$T1;?></th>
                <th><?=$T2;?></th>
                <th><?=$T3;?></th>
                <th><?=$T4;?></th>
                <th><?=$T5;?></th>
				<th><?=$T6;?></th>
				<th><?=$T7;?></th>
				<th><?=$total;?></th>
              </tr>   
            <tr>
                <th>Closed</th>
                <th><?=$CT1;?></th>
                <th><?=$CT2;?></th>
                <th><?=$CT3;?></th>
                <th><?=$CT4;?></th>
                <th><?=$CT5;?></th>
				<th><?=$CT6;?></th>
				<th><?=$CT7;?></th>
				<th><?=$Closed_total;?></th>
            </tr>
 
        </tbody>
    </table>
  </div>
<script>
        $(document).ready(function() {
			$('#example').dataTable( {
				
				"autoWidth": false,
				dom: 'Bfrtip',
				buttons: [
					'copy', 'excelFlash', 'excel', 'pdf', 'print',
					//{
					 //   text: 'Reload',
					  //  action: function ( e, dt, node, config ) {
					   //     dt.ajax.reload();
					   // }
				   //}
				],
			"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
			// computing column Total of the complete result 
			var pen_from_3_days = api
                .column( 1 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
            var pen_from_4to7_days = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
			var pen_from_8to10_days = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
			var pen_from_11to14_days = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
			var pen_from_15to17_days = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
		
		    var pen_from_17to21_days = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
			
			var pen_from_morethan21_days = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
			var final_total = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
			
				
			// Update footer by showing the total with the reference of the column index 
	    $( api.column( 0 ).footer() ).html('Total');
		$( api.column( 1 ).footer() ).html(pen_from_3_days);
		$( api.column( 2 ).footer() ).html(pen_from_4to7_days);
		$( api.column( 3 ).footer() ).html(pen_from_8to10_days);
		$( api.column( 4 ).footer() ).html(pen_from_11to14_days);
		$( api.column( 5 ).footer() ).html(pen_from_15to17_days);
		$( api.column( 6 ).footer() ).html(pen_from_17to21_days);
		$( api.column( 7 ).footer() ).html(pen_from_morethan21_days);
		$( api.column( 8 ).footer() ).html(final_total);
			 },
		
    } );
} );


 $(function () {
  $("#datepicker").datepicker({ 
		format: 'dd-mm-yyyy',
        autoclose: true, 
        todayHighlight: true
  });//.datepicker('update', new Date());
});
$(function () {
  $("#datepicker1").datepicker({ 
        format: 'dd-mm-yyyy',
        autoclose: true, 
        todayHighlight: true
  });//.datepicker('update', new Date());
});

 

</script>
    </body>
    </html>


