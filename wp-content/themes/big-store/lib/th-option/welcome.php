
<!--- tab first -->
<div class="theme_link">
    <h3><?php _e('1. Install Recommended Plugins','big-store'); ?></h3>
    <p><?php _e('We highly Recommend to install ThemeHunk Customizer plugin to get all customization options in Big Store theme. Also install recommended plugins available in recommended tab.','big-store'); ?></p>
</div>
<div class="theme_link">
    <h3><?php _e('2. Setup Home Page','big-store'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
        <p><?php _e('To set up the HomePage in Big Store theme, Just follow the below given Instructions.','big-store'); ?> </p>
<p><?php _e('Go to Wp Dashboard > Pages > Add New > Create a Page using “Home Page Template” available in Page attribute.','big-store'); ?> </p>
<p><?php _e('Now go to Settings > Reading > Your homepage displays > A static page (select below) and set that page as your homepage.','big-store'); ?> </p>
     <p>
        <?php
		if($this->_check_homepage_setup()){
            $class = "activated";
            $btn_text = __("Home Page Activated",'big-store');
            $Bstyle = "display:none;";
            $style = "display:inline-block;";
        }else{
            $class = "default-home";
             $btn_text = __("Set Home Page",'big-store');
             $Bstyle = "display:inline-block;";
            $style = "display:none;";


        }
        ?>
        <button style="<?php echo esc_attr($Bstyle); ?>" class="button activate-now <?php echo esc_attr($class); ?>">

            <?php echo esc_html($btn_text);?>
                
        </button>
		
         </p>
		 	 
		 
    <p>
        <a target="_blank" href="https://themehunk.com/docs/big-store/#homepage-setting" class="button"><?php _e('Go to Doc','big-store'); ?></a>
    </p>
</div>

<!--- tab third -->

<!--- tab second -->

<div class="theme_link">
    <h3><?php _e('3. Customize Your Website','big-store'); ?></h3>

    <p><?php _e('Big Store theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel','big-store'); ?></p>
    <p>
    <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php _e("Start Customize","big-store"); ?></a>
    </p>
</div>
<!--- tab third -->

  <div class="theme_link">
    <h3><?php _e("4. Customizer Links","big-store"); ?></h3>
    <div class="card-content">
        <div class="columns">
                <div class="col">
                    <a href="<?php echo admin_url('customize.php?autofocus[control]=custom_logo'); ?>" class="components-button is-link"><?php _e("Upload Logo","big-store"); ?></a>
                    <hr><a href="<?php echo admin_url('customize.php?autofocus[section]=big-store-gloabal-color'); ?>" class="components-button is-link"><?php _e("Global Colors","big-store"); ?></a><hr>
                    <a href="<?php echo admin_url('customize.php?autofocus[panel]=woocommerce'); ?>" class="components-button is-link"><?php _e("Woocommerce","big-store"); ?></a><hr>

                </div>

               <div class="col">
                <a href="<?php echo admin_url('customize.php?autofocus[section]=big-store-section-header-group'); ?>" class="components-button is-link"><?php _e("Header Options","big-store"); ?></a>
                <hr>

                <a href="<?php echo admin_url('customize.php?autofocus[panel]=big-store-panel-frontpage'); ?>" class="components-button is-link"><?php _e("FrontPage Sections","big-store"); ?></a><hr>


                 <a href="<?php echo admin_url('customize.php?autofocus[section]=big-store-section-footer-group'); ?>" class="components-button is-link"><?php _e("Footer Section","big-store"); ?></a><hr>
            </div>

        </div>
    </div>

</div>
<!--- tab fourth -->