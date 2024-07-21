<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function themehunk_customizer_oneline_lite_dummy($did=''){
	$return ='';
	$services = '<li class="service-list">
    
                        <div class="service-icon1"><a href=""></a></div>
                        
                        <div class="service-title"><a href="">IDEAS AND CONCEPTS</a></div>
                        <div class="service-content"><p>Lorem ipsum dolor sit amet, consectetur elit adipiscing. Etiam lectus libero, tincidunt et eu augue, congue finibus est.</p></div>
                    </li>
                    <li class="service-list">
                        
                        <div class="service-icon2"><a href=""></a></div>
                        
                        <div class="service-title"><a href="">DESIGNS & INTERFACES</a></div>
                        <div class="service-content"><p>Lorem ipsum dolor sit amet, consectetur elit adipiscing. Etiam lectus libero, tincidunt et eu augue, congue finibus est. </p></div>
                    </li>
                    <li class="service-list">
                        <div class="service-icon3"><a href=""></a></div>
                        <div class="service-title"><a href="">HIGHLY CUSTOMIZABLE</a></div>
                        <div class="service-content"><p>Lorem ipsum dolor sit amet, consectetur elit adipiscing. Etiam lectus libero, tincidunt et eu augue, congue finibus est. </p></div>
                    </li>
                    <li class="service-list">
                        <div class="service-icon4"><a href=""></a></div>
                        <div class="service-title"><a href="">EASY TO USE</a></div>
                        <div class="service-content"><p>Lorem ipsum dolor sit amet, consectetur elit adipiscing. Etiam lectus libero, tincidunt et eu augue, congue finibus est. </p></div>
                    </li>';

$team = '<li class="team-list">
                        <figure class="team-content"><img src="'. THEMEHUNK_CUSTOMIZER_TEAM.'" alt="Feature Image 1" />
                            <figcaption>
                            <a href=""><h3>Clairy&nbsp;<span>Robert</span></h3></a>
                            <h4>
                            Director
                            </h4>
                            <div class="team-social-meta">
                                <ul>
                                    <li class="team-social-social-fb"><a href=""></a></li>
                                    <li class="team-social-social-tw"><a href=""></a></li>
                                    <li class="team-social-social-gm"><a href=""></a></li>
                                    <li class="team-social-social-ln"><a href=""></a></li>
                                </ul>
                            </div>
                            </figcaption>
                        </figure>
                        
                    </li>
                    <li class="team-list">
                        <figure class="team-content"><img src="'. THEMEHUNK_CUSTOMIZER_TEAM.'"  alt="Feature Image 2"  />
                            <figcaption>
                            <a href=""><h3>Justin&nbsp;<span>Martin</span></h3></a>
                            <h4>
                            Creative
                            </h4>
                            <div class="team-social-meta">
                                <ul>
                                    <li class="team-social-social-fb"><a href=""></a></li>
                                    <li class="team-social-social-tw"><a href=""></a></li>
                                    <li class="team-social-social-gm"><a href=""></a></li>
                                    <li class="team-social-social-ln"><a href=""></a></li>
                                </ul>
                            </div>
                            </figcaption>
                        </figure>
                        
                    </li>
                    <li class="team-list">
                        <figure class="team-content"><img src="'. THEMEHUNK_CUSTOMIZER_TEAM.'" alt="Feature Image 3" />
                            <figcaption>
                            <a href=""><h3>Dalene&nbsp;<span>Atkinson</span></h3></a>
                            <h4>
                            Creator
                            </h4>
                            <div class="team-social-meta">
                                <ul>
                                    <li class="team-social-social-fb"><a href=""></a></li>
                                    <li class="team-social-social-tw"><a href=""></a></li>
                                    <li class="team-social-social-gm"><a href=""></a></li>
                                    <li class="team-social-social-ln"><a href=""></a></li>
                                </ul>
                            </div>
                            </figcaption>
                        </figure>
                        
                    </li>
                    <li class="team-list">
                        <figure class="team-content"><img src="'. THEMEHUNK_CUSTOMIZER_TEAM.'" alt="Feature Image 4" />
                            <figcaption>
                            <a href=""><h3>Kerry&nbsp;<span>Smith</span></h3></a>
                            <h4>
                            Creator
                            </h4>
                            <div class="team-social-meta">
                                <ul>
                                    <li class="team-social-social-fb"><a href=""></a></li>
                                    <li class="team-social-social-tw"><a href=""></a></li>
                                    <li class="team-social-social-gm"><a href=""></a></li>
                                    <li class="team-social-social-ln"><a href=""></a></li>
                                </ul>
                            </div>
                            </figcaption>
                        </figure>
                    </li>';

$testimonial = '<li><div class="image-test">
							<img src="'.THEMEHUNK_CUSTOMIZER_TESTIMONIAL.'">
						</div>
						<div class="test-cont-heading"><h2>Michael Rocks</h2></div>
						<div class="test-cont"><a href=""><p>Google.com</p><div class="brd-testimonial"></div></a><p>Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo.Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo.Sed posuere consectetur est at lobortis. .Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo.Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo.Sed posuere consectetur est at lobortis
					</p>
				</div>
			</li>
			<li><div class="image-test">
				<img src="'.THEMEHUNK_CUSTOMIZER_TESTIMONIAL.'">
			</div>
			<div class="test-cont-heading"><h2>George Hath</h2></div>
			<div class="test-cont"><a href=""><p>Google.com</p><div class="brd-testimonial"></div></a><p>Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo.Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo.Sed posuere consectetur est at lobortis. .
					</p>
				</div>
</li>';
$prlx = get_theme_mod('parallax_opt','on');
$prlx_class = '';
$prlx_data_center = '';
$prlx_top_bottom =''; 
if($prlx=='on'){
$prlx_class = 'parallax-lite';
$prlx_data_center = 'background-position: 50% 0px';
$prlx_top_bottom = 'background-position: 50% -100px;';
}else{
$prlx_class = ''; 
$prlx_data_center = '';
$prlx_top_bottom =''; 
}   
$slider = '<li data-center="'.$prlx_data_center.'" data-top-bottom="'.$prlx_top_bottom.'" style="background:url('.THEMEHUNK_CUSTOMIZER_SLIDER.');">
                    <div class="over-lay">
                        <div class="fs-caption wow fadeInDown" data-wow-delay="1s">
                            <div class="caption-container">
                                <h2 class="title overtext"><a href="#">Every Client Deserves an Innovative Product</a></h2>
                                <div class="slider-button">
                                    <a href="" class="theme-slider-button">GET IT NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>';

$heading = 'Lorem ipsum dolor sit amet';
$subheading = 'In posuere consequat purus ut venenatis. Maecenas mattis mattisIn';
$serv_heading = 'Services';
$team_heading = 'Our Team';
$add_heading = 'Address';
$contact_heading = 'Address';
$address = 'Chris Niswandee </br>
              Smallsys INC , 79 Dragram</br>
              Tuson , 88879</br>
              USA';
             if($did==1){
             	$return = $services;
             } elseif($did==2){
             		$return = $team;
             } elseif($did==3){
             	$return = $testimonial;
             }elseif($did==4){
             	$return = $slider;
             } elseif($did==5){
             	$return = $heading;
             } elseif($did==6){
             	$return = $subheading;
             }elseif($did==7){
             	$return = $address;
             }elseif($did==111){
             	$return = $serv_heading;
             }elseif($did==222){
             	$return = $team_heading;
             }elseif($did==333){
             	$return = $contact_heading;
             }elseif($did==444){
             	$return = $add_heading;
             }
                    return $return;
}

function themehunk_customizer_oneline_lite_data($atts) {
    $output = '';
    $pull_quote_atts = shortcode_atts(array(
        'did' => 1
            ), $atts);
    $did = wp_kses_post($pull_quote_atts['did']);

  	$output = themehunk_customizer_oneline_lite_dummy($did);
    return $output;
}
add_shortcode('themehunk-customizer-oneline-lite', 'themehunk_customizer_oneline_lite_data');

function themehunk_customizer_oneline_social(){
    $social = '<ul>
                    <li class="post-social-social-fb"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.get_permalink().'"></a></li>
                    <li class="post-social-social-tw"><a target="_blank" href="https://twitter.com/home?status='.get_the_title().'-'.get_permalink().'"></a></li>
                    <li class="post-social-social-wt"><a target="_blank" href="https://api.whatsapp.com/send?text='.get_permalink().'" ></a></li>
                    <li class="post-social-social-ln"><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url='. get_permalink().'&title='.get_the_title().'&source=LinkedIn"></a></li>
                </ul>';
    return $social;
}

function themehunk_customizer_oneline_lite_social_shortcode($atts) {
    $output = '';
    $pull_quote_atts = shortcode_atts(array(
        'did' => 1
            ), $atts);
    $did = wp_kses_post($pull_quote_atts['did']);

    $output = themehunk_customizer_oneline_social($did);
    return $output;
}
add_shortcode('themehunk-customizer-social', 'themehunk_customizer_oneline_lite_social_shortcode');


// woocommerce plugin
function themehunk_customizer_woo($did=''){
  $woo_product = get_theme_mod('woo_shortcode','[recent_products]');
  
  echo do_shortcode( $woo_product );
  
}

function themehunk_customizer_oneline_lite_woo($atts) {
    $output = '';
    $pull_quote_atts = shortcode_atts(array(
        'did' => 1
            ), $atts);
    $did = wp_kses_post($pull_quote_atts['did']);

  $output = themehunk_customizer_woo($did);
  return $output;
}
add_shortcode('themehunk-customizer-woo', 'themehunk_customizer_oneline_lite_woo');


?>