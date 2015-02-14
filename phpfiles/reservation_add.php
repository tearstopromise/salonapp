<?php
	include "config.php";

	//stylish

	$var_str_p_checkStylistAvailability = $_POST['str_p_checkStylistAvailability'];
	
	
	
	date_default_timezone_set('Asia/Manila');
	$var_rand_tn = rand(1000000000, 9999999999);
	$var_cur_date = date('Y-m-d H:i:s');
	

	
	
	/* checking stylist availability only then return output and kill remaining codes */
	if($var_str_p_checkStylistAvailability == "checkonly"){
		$var_q_listAllStylistAv = mysql_query("SELECT * FROM `tbl_stylist` WHERE `sql_stylist_id` not in (select distinct(`sql_res_stylistID`) from tbl_reservation where `sql_res_service_branch`='Salon360: Gordon ave.' and `sql_res_date_r` = '2015-02-13' and `sql_res_time_in` < '02:00:00' and `sql_res_time_out` > '01:00:00')");
		$var_stylist_temp = "";
		if(mysql_num_rows($var_q_listAllStylistAv) > 0){
			while($var_r = mysql_fetch_array($var_q_listAllStylistAv)){
				$var_sql_stylist_id = $var_r['sql_stylist_id'];
				$var_sql_stylist_nickName = $var_r['sql_stylist_nickName'];
				$var_sql_stylist_picLoc = $var_r['sql_stylist_picLoc'];
				$var_sql_stylist_skill = $var_r['sql_stylist_skill'];
				
				$var_stylist_temp = $var_stylist_temp. '<div style="max-width:120px;margin:2px;float:left;border: dashed 1px gray;border-radius:10px;padding:1px;cursor:pointer;" onclick="javascript: $(\'#iddiv_stylist div\').css(\'background-color\', \'\'); 
				$(\'#idhidden_stylistID\').val(\''.$var_sql_stylist_id.'\'); 
				$(this).css(\'background-color\', \'rgba(0, 0, 0, 0.8)\');">';
				$var_stylist_temp = $var_stylist_temp. '	<center>';
				$var_stylist_temp = $var_stylist_temp. '		<img src="http://arvianne.com/salon360/'.$var_sql_stylist_picLoc.'" style="width:50px;height:50px;margin-bottom:-15px;" title="'.$var_sql_stylist_skill.'" />';
				$var_stylist_temp = $var_stylist_temp. '		<br />';
				$var_stylist_temp = $var_stylist_temp. '		<font style="">'.$var_sql_stylist_nickName.'</font>';
				$var_stylist_temp = $var_stylist_temp. '	</center>';
				$var_stylist_temp = $var_stylist_temp. '</div>';
			}
		}else{ 
		$var_stylist_temp = "No stylist available for this branch '$var_idselect_branch' from the time you picked. try to select different time or branch. "; 
		}
		echo $var_stylist_temp;
		die();
	}
	
	
?>