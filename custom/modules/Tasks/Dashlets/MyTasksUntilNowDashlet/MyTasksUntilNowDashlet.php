<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/


// ini_set('display_errors','On');


require_once('include/Dashlets/DashletGeneric.php');


class MyTasksUntilNowDashlet extends DashletGeneric { 
    function MyTasksUntilNowDashlet($id, $def = null) {
        global $current_user, $app_strings;
		require('custom/modules/Tasks/Dashlets/MyTasksUntilNowDashlet/MyTasksUntilNowDashlet.data.php');
		
        parent::DashletGeneric($id, $def);
        
        if(empty($def['title'])) $this->title = translate('LBL_LIST_MY_TASKS_UNTIL_NOW', 'Tasks');

        $this->searchFields = $dashletData['MyTasksUntilNowDashlet']['searchFields'];
        $this->columns = $dashletData['MyTasksUntilNowDashlet']['columns'];
                
        $this->seedBean = new Task();        
    }    




    function display() {
            $ss = new Sugar_Smarty();
          
            echo <<<EOD
                <style>
                    @media (min-width: 1200px){
                        .container2 {
                            width: 300px !important;
                            overflow-x: scroll !important;
                        }
                    }

                </style>
                <script>
                $(document).ready(function(){
                    $('#dashletPanel').hide();
                });
                </script>
EOD;
        global $sugar_config, $db, $app_list_strings,$current_user;
      
        $current_user_id=$current_user->id;
        $role= ACLRole::getUserRoleNames($current_user->id)[0];
        $query=$db->query("SELECT id from acl_roles where name= '$role'");
        $a=$db->fetchByAssoc($query);
        $id=$a['id'];
      

        $url = $sugar_config['site_url'];

        $db->query("SET SESSION group_concat_max_len = 100000000;");
        $sql= 'SELECT securitygroup_id as s_ids From securitygroups_users where user_id= "'.$current_user_id.'" AND deleted = 0';

        //print_r($sql);exit;
        $result =   $db->query($sql);
        //print_r($result);exit;
        $data1 = "";
        while ($row3   =   $db->fetchByAssoc($result)) {
            $data1 .= ",'".$row3['s_ids']."'";
        }
        $s_ids = ltrim($data1,',');

        // $sql2= 'SELECT user_id FROM securitygroups_users WHERE  securitygroup_id = "$s_ids"';
        // print_r($sql2);exit;
        // $result =   $db->query($sql2);

        //print_r($s_ids);exit;

        # querty to fetch data
        $sql1 = "SELECT a.opportunity_count_c,a.quote_count_c,a.meeting_count_c,a.calls_count_c,a.contact_count_c,a.customers_count_c,a.architectural_firm_count_c,a.userid_c, u.first_name, u.last_name, a.date_c FROM cstm_activity_count_cstm as a inner join users as u ON u.id = a.userid_c inner join acl_roles_users as aclr on aclr.user_id = a.userid_c inner join securitygroups_users as sets on sets.user_id=u.id where sets.securitygroup_id in ($s_ids) and aclr.role_id = '$id' and sets.deleted=0 and u.deleted =0 and aclr.deleted=0 group by a.date_c, u.id order by a.date_c desc limit 1";


        //echo $sql1;exit;
       
        $result1  =  $db->query($sql1);
        
        # concat all values
        while ($row=$db->fetchByAssoc($result1)) {
             //print_r($row);exit;
           // echo "Dfdsf";exit;
             $data .='<tr>';

             $data .= '<td>'.$row['first_name'].' '.$row['last_name'].'</td>';
             $data .= '<td>'.$row['opportunity_count_c'].'</td>';
             $data .= '<td>'.$row['quote_count_c'].'</td>';
             $data .= '<td>'.$row['meeting_count_c'].'</td>';
             $data .= '<td>'.$row['calls_count_c'].'</td>';
             $data .= '<td>'.$row['contact_count_c'].'</td>';
             $data .= '<td>'.$row['customers_count_c'].'</td>';
             $data .= '<td>'.$row['architectural_firm_count_c'].'</td>';

             $data .='</tr>';
        
        }   


     $html =<<<HTML
        <!DOCTYPE html>
        <html>
        <head>

            <style>
            td,th
            { text-align:center !important;}
            </style>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
            <link rel="stylesheet" href="custom/modules/AOS_Contracts/Report.css" type="text/css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" type="text/css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0"/>

            <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.js"></script>
            <script type="text/javascript" language="javascript" class="init">
            </script>
        </head>

        <body class="dt-example">
            <div class="container" style="padding-top:40px">
                <section>
                    
                    <table id="example" class="table table-bordered" cellspacing="0" width="100%">
                        <thead> 
                            <tr>
                                <td>Users</td>
                                <td>Opportunities</td>
                                <td>Quote </td>
                                <td>Meetings</td>                                                 
                                <td>Calls</td>
                                <td>Contacts</td>
                                <td>Customers</td>
                                <td>Architectural Firms</td>
                            </tr>
                        </thead>


                        <tbody>
                            $data
                        </tbody>
                    </table>

                    
                        </div>

                    </div>
                </section>
            </div>

        </body>
         <script>
          $(document).ready(function(){
            var table = $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                ]           
            } );
            $('a.toggle-vis').on( 'click', function (e) {
                e.preventDefault();
         
                // Get the column API object
                var column = table.column( $(this).attr('data-column') );
         
                // Toggle the visibility
                column.visible( ! column.visible() );
            } );

            $('.select2').select2();
            $("#clear").click(function(){
                    $("select option").removeAttr("selected");
                    $('.select2').val("").trigger("change");
                    return false;
                }); 
            $("#showquery").click(function(){
                $('#showq').toggle();
                    return false;
                });
            });
          </script>
        </html>
            
HTML;
            $str .= $html;
            return parent::display().$str; // return parent::display for title and such
        }

}


?>
