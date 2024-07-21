<?php
class THunkWidgetHtml{
	function radioBox($thi,$inst,$custarr){
		$checked ='';
		$id = $custarr['id'];
		if(isset($inst[$id])){ 
			$checked = checked((bool) $inst[$id], true,false); 
		}
		?>
		 <p>
		 <h5 class="thnk-widget-checkbox" for="<?php echo $thi->get_field_id($id); ?>"><?php  echo $custarr['h5']; ?></h5>
         <span><?php  echo $custarr['span']; ?></span>
         <input type="checkbox"  id="<?php echo $thi->get_field_id($id); ?>" name="<?php echo $thi->get_field_name($id); ?>" <?php echo $checked; ?>/>
         <label class="thnk-widget-checkbox" for="<?php echo $thi->get_field_id($id); ?>"><?php  echo $custarr['label']; ?></label>
         </p>
	 	 <?php
	}
	function selectBox($thi,$inst,$custarr){
			$id = $custarr['id'];
	        $orderby = isset($inst[$id]) ? $inst[$id]: $custarr['default'] ;
	 ?>
	 <p><label for="<?php echo $thi->get_field_id($id); ?>"><?php  echo $custarr['label']; ?></label>
	     <select id="<?php echo $thi->get_field_id($id); ?>" name="<?php echo $thi->get_field_name($id); ?>" >
	     	<?php foreach($custarr['option'] as $value=>$title){ ?>
	     		<option value ="<?php echo $value; ?>" <?php if($orderby==$value){ echo 'selected'; }?> ><?php echo $title; ?> </option>
	     		<?php } ?>
	     </select>
	        </p>
	    <?php
	}
}