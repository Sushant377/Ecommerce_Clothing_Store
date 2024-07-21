<div class=" lfb-header"> 
	<?php $pm = $fl = $pro = $anf = ""; ?>
<?php if(isset($_GET['page']) && $_GET['page'] == 'wplf-plugin-menu'){
echo '<h2>'.esc_html__('Lead Forms Builder','lead-form-builder').' <a href="' . esc_url($lfb_admin_url . 'admin.php?page=add-new-form&_wpnonce='.$this->lfb_show_form_nonce()).'" class="add-new-h2">'.esc_html__("Add New","lead-form-builder").'</a></h2>';
$pm = 'active';
}elseif(isset($_GET['page']) && $_GET['page'] == 'all-form-leads'){
    echo '<h2>'.esc_html__('Form Leads','lead-form-builder').'</h2>';
	$fl = 'active';

}elseif(isset($_GET['page']) && $_GET['page'] == 'pro-form-leads'){
    echo '<h2>'.esc_html__('Premium Plugin & Themes','lead-form-builder').'</h2>';
	$pro = 'active';

}elseif(isset($_GET['page']) && $_GET['page'] == 'add-new-form'){
    echo '<h2>'.esc_html__('Form Settings','lead-form-builder').'</h2>';
	$anf = 'active';

}


?>
<div class="lfb-cmn-nav">
		<div class="lfb-cmn-nav-item">
				<a class="lfb_icon_button <?php echo $pm; ?>" href="<?php echo admin_url( 'admin.php?page=wplf-plugin-menu'); ?>">
					<span><?php _e('Form List','lead-form-builder'); ?></span>
				</a>
			<?php if(isset($_GET['page']) && $_GET['page'] == 'add-new-form'){ ?>

				<a class="lfb_icon_button <?php echo $anf; ?>" href="<?php echo admin_url( 'admin.php?page=wplf-plugin-menu'); ?>">
					<span><?php _e('Form Settings','lead-form-builder'); ?></span>
				</a> <?php } ?>
                <a class="lfb_icon_button <?php echo $fl; ?>" href="<?php echo admin_url( 'admin.php?page=all-form-leads'); ?>">
					<span><?php _e('View Leads','lead-form-builder'); ?></span>
				</a>

				<a class="lfb_icon_button <?php echo $pro; ?>" href="<?php echo admin_url( 'admin.php?page=pro-form-leads'); ?>">
					<span><?php _e('Premium Version','lead-form-builder'); ?></span>
				</a>
		</div>	
	</div>
    </div>

