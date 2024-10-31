<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://thesgdiet.com
 * @since             1.0.0
 * @package           Sgdiet_Calculator
 *
 * @wordpress-plugin
 * Plugin Name:       SGDIET TDEE Calculator
 * Plugin URI:        https://thesgdiet.com/calculator
 * Description:       Simple General Diet TDEE Calculator is meant to help visitors calculate their total daily energy expenditure quickly and easily.
 * Version:           1.0.0
 * Author:            The SG Diet
 * Author URI:        https://thesgdiet.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sgdiet-calculator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SGDIET_CALCULATOR_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sgdiet-calculator-activator.php
 */
function activate_sgdiet_calculator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sgdiet-calculator-activator.php';
	Sgdiet_Calculator_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sgdiet-calculator-deactivator.php
 */
function deactivate_sgdiet_calculator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sgdiet-calculator-deactivator.php';
	Sgdiet_Calculator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sgdiet_calculator' );
register_deactivation_hook( __FILE__, 'deactivate_sgdiet_calculator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sgdiet-calculator.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sgdiet_calculator() {

	$plugin = new Sgdiet_Calculator();
	$plugin->run();

}
run_sgdiet_calculator();






function sgdiet_form_start_welcome(){
  $thesgdiet_tdee_settings_options = get_option( 'thesgdiet_tdee_settings_option_name' );
  	//$brandname = $thesgdiet_tdee_settings_options['your_website_name_0'];
	$text1 = esc_html__("Welcome! We are here to help you become the better version of yourself in terms of health, weight management or even both!");
	$text2 = esc_html__("To begin, let us get to know you a little bit more by asking you some simple questions - they are really easy to answer!");
	$qn = "";
	$form = "";
	return array('text1'=>$text1,
				'text2'=>$text2,
				'qn'=>$qn,
				'form'=>$form);
}
function sgdiet_form_welcome(){
	$text1 = "";
	$text2 = "";
	$qn = esc_html__("1) Which of the following best describes your goal for downloading this app?");
	$form = "<div id='knowhalim_form_section'>";
	$form .= "<div id='form_row'><span id='field_label'>Your Goal</span><span id='field_input'><label><input type='radio' name='intention' id='intention' value='lose weight and be healthy'>".esc_html__("I want to lose weight and become healthier")."</label>
	<label><input type='radio' name='intention' id='intention' value='just lose weight'>".esc_html__("I just want to lose weight")."</label>
	<label><input type='radio' name='intention' id='intention' value='just be healthy'>".esc_html__("I just want to look healthier")."</label>
	<label><input type='radio' name='intention' id='intention' value='just maintain weight'>".esc_html__("I just want to maintain my weight")."</label>
	<label><input type='radio' name='intention' id='intention' value='maintain weight healthily'>".esc_html__("I want to maintain weight in a healthy manner")."</label>
	<label><input type='radio' name='intention' id='intention' value='gain weight healthily'>".esc_html__("I want to gain weight in a healthy manner")."</label></span></div>";
	$form .= "</div>";
	return array('text1'=>$text1,
				'text2'=>$text2,
				'qn'=>$qn,
				'form'=>$form);
}

function sgdiet_form_welcome_body_assessment(){
	$text1 = esc_html__("Thank you for letting us know your intention! We hear you, and we will recommend some ways to help you out. ");
	$text2 = esc_html__("Before we go to that, we will also need to know your gender, height, weight and age. This will help us calculate based on your body needs.");
	$qn = "";
	$form = "";
	return array('text1'=>$text1,
				'text2'=>$text2,
				'qn'=>$qn,
				'form'=>$form);
}


function sgdiet_form_welcome_body_assessment_1(){
	$text1 = "";
	$text2 = "";
	$qn = esc_html__("2) What is your gender?");
	$form = "<div id='knowhalim_form_section'>";
	$form .= "<div id='form_row'><span id='field_label'>".esc_html__("Gender")."</span><span id='field_input'><label><input type='radio' name='gender' id='gender' value='male'>".esc_html__("Male")."</label><label><input type='radio' name='gender' value='female' id='gender' >".esc_html__("Female")."</label></span></div>";
	$form .= "</div>";
	return array('text1'=>$text1,
				'text2'=>$text2,
				'qn'=>$qn,
				'form'=>$form);
}

function sgdiet_form_welcome_body_assessment_2(){
	$text1 = "";
	$text2 = "";
	$qn = esc_html__("3) What is your height?");
	$form = "<div id='knowhalim_form_section'>";
	$form .= "<div id='form_row'><span id='field_label'>".esc_html__("Height (in cm)")."</span><span id='field_input'><label><input type='input' name='height' id='height' value='' placeholder='170cm'/></span></div>";
	$form .= "</div>";
	return array('text1'=>$text1,
				'text2'=>$text2,
				'qn'=>$qn,
				'form'=>$form);
}

function sgdiet_form_welcome_body_assessment_3(){
	$text1 = "";
	$text2 = "";
	$qn = esc_html__("4) What is your weight?");
	$form = "<div id='knowhalim_form_section'>";
	$form .= "<div id='form_row'><span id='field_label'>".esc_html__("Weight (in kg)")."</span><span id='field_input'><label><input type='input' name='weight' id='weight' value='' placeholder='90kg'/></span></div>";
	$form .= "</div>";
	return array('text1'=>$text1,
				'text2'=>$text2,
				'qn'=>$qn,
				'form'=>$form);
}


function sgdiet_form_welcome_body_assessment_4(){
	$text1 = "";
	$text2 = "";
	$qn = esc_html__("5) What is your age?");
	$form = "<div id='knowhalim_form_section'>";
	$form .= "<div id='form_row'><span id='field_label'>".esc_html__("Age (Enter number)")."</span><span id='field_input'><label><input type='input' name='age' id='age' value='' placeholder='70'/></span></div>";
	$form .= "</div>";
	return array('text1'=>$text1,
				'text2'=>$text2,
				'qn'=>$qn,
				'form'=>$form);
}

//$name = sprintf( esc_html__( 'Search Results for: %s'),  get_search_query());
function sgdiet_form_welcome_activity(){
	$text1 =esc_html__(  "Thank you! Lastly, we are interested to know your daily activities in a week, this will help us to gauge your body functionality.");
	$text2 = esc_html__("Below are a list of weekly activities. Everyone have different weekly activity and we can never be very accurate. So all you need to do is select one that is closest to yours.");
	$qn = "";
	$form = "";
	return array('text1'=>$text1,
				'text2'=>$text2,
				'qn'=>$qn,
				'form'=>$form);
}
function sgdiet_form_welcome_activity_assessment(){
	$text1 = "";
	$text2 = "";
	$qn = esc_html__("6) Select the one that describes you most");
	$form = "<div id='knowhalim_form_section'>";
	$form .= "<div id='form_row'><span id='field_label'>".esc_html__("Weekly Activity")."</span><span id='field_input'>
	<label><input type='radio' id='activity' name='activity' value='0'>".esc_html__("Works from home from Mon-Fri, never exercise")."</label>
	<label><input type='radio' id='activity' name='activity' value='1'>".esc_html__("I do not work from home, do little to no exercise")."</label>
	<label><input type='radio' id='activity' name='activity' value='2'>".esc_html__("I do not work from home and exercise 2-3 times a week")."</label>
	<label><input type='radio' id='activity' name='activity' value='3'>".esc_html__("Works in office and exercise 3-5 times a week")."</label>
	<label><input type='radio' id='activity' name='activity' value='4'>".esc_html__("I lay down on bed all day and does nothing")."</label></span></div>";
	$form .= "</div>";
	return array('text1'=>$text1,
				'text2'=>$text2,
				'qn'=>$qn,
				'form'=>$form);
}



add_shortcode('onboard','sgdiet_onboarding_wizard');
function sgdiet_onboarding_wizard(){
	add_action('wp_footer','sgdiet_ajax_onboard');
	//layout
	$layout='<div id="form_layout" class="form_layout">
	<div class="text_content"><span id="text1">###text1###</span><span id="text2">###text2###</span></div>
	<div class="qn_content"><span id="qn">###qn###</span></div>
	<div class="form_content">###form###</div>
	<div class="loading_bar"><center><img src="'.plugin_dir_url( __FILE__ ) . 'loading_calculate.gif" /></center></div>
	<div class="button_section"><button id="###button###">Next</button></div>
	</div>';
	//Content 0
	$get_content = sgdiet_form_start_welcome();
	$content0 = str_replace('###text1###',$get_content['text1'],$layout);
	$content0 = str_replace('###text2###',$get_content['text2'],$content0);
	$content0 = str_replace('###qn###',$get_content['qn'],$content0);
	$content0 = str_replace('###form###',$get_content['form'],$content0);
	$content0 = str_replace('form_layout','form_layout content0',$content0);
	$content0 = str_replace('###button###','content1',$content0);
	
	//Content 1
	$get_content = sgdiet_form_welcome();
	$content1 = str_replace('###text1###',$get_content['text1'],$layout);
	$content1 = str_replace('###text2###',$get_content['text2'],$content1);
	$content1 = str_replace('###qn###',$get_content['qn'],$content1);
	$content1 = str_replace('###form###',$get_content['form'],$content1);
	$content1 = str_replace('form_layout','form_layout content1',$content1);
	$content1 = str_replace('###button###','content2',$content1);
	
	//Content 2
	$get_content = sgdiet_form_welcome_body_assessment();
	$content2 = str_replace('###text1###',$get_content['text1'],$layout);
	$content2 = str_replace('###text2###',$get_content['text2'],$content2);
	$content2 = str_replace('###qn###',$get_content['qn'],$content2);
	$content2 = str_replace('###form###',$get_content['form'],$content2);
	$content2 = str_replace('form_layout','form_layout content2',$content2);
	$content2 = str_replace('###button###','content2a',$content2);
	
	//Content 2a
	$get_content = sgdiet_form_welcome_body_assessment_1();
	$content2a = str_replace('###text1###',$get_content['text1'],$layout);
	$content2a = str_replace('###text2###',$get_content['text2'],$content2a);
	$content2a = str_replace('###qn###',$get_content['qn'],$content2a);
	$content2a = str_replace('###form###',$get_content['form'],$content2a);
	$content2a = str_replace('form_layout','form_layout content2a',$content2a);
	$content2a = str_replace('###button###','content2b',$content2a);
	
	//Content 2b
	$get_content = sgdiet_form_welcome_body_assessment_2();
	$content2b = str_replace('###text1###',$get_content['text1'],$layout);
	$content2b = str_replace('###text2###',$get_content['text2'],$content2b);
	$content2b = str_replace('###qn###',$get_content['qn'],$content2b);
	$content2b = str_replace('###form###',$get_content['form'],$content2b);
	$content2b = str_replace('form_layout','form_layout content2b',$content2b);
	$content2b = str_replace('###button###','content2c',$content2b);
	
	//Content 2c
	$get_content = sgdiet_form_welcome_body_assessment_3();
	$content2c = str_replace('###text1###',$get_content['text1'],$layout);
	$content2c = str_replace('###text2###',$get_content['text2'],$content2c);
	$content2c = str_replace('###qn###',$get_content['qn'],$content2c);
	$content2c = str_replace('###form###',$get_content['form'],$content2c);
	$content2c = str_replace('form_layout','form_layout content2c',$content2c);
	$content2c = str_replace('###button###','content2d',$content2c);
	
	//Content 2d
	$get_content = sgdiet_form_welcome_body_assessment_4();
	$content2d = str_replace('###text1###',$get_content['text1'],$layout);
	$content2d = str_replace('###text2###',$get_content['text2'],$content2d);
	$content2d = str_replace('###qn###',$get_content['qn'],$content2d);
	$content2d = str_replace('###form###',$get_content['form'],$content2d);
	$content2d = str_replace('form_layout','form_layout content2d',$content2d);
	$content2d = str_replace('###button###','content3',$content2d);
	
	//Content 3
	$get_content = sgdiet_form_welcome_activity();
	$content3 = str_replace('###text1###',$get_content['text1'],$layout);
	$content3 = str_replace('###text2###',$get_content['text2'],$content3);
	$content3 = str_replace('###qn###',$get_content['qn'],$content3);
	$content3 = str_replace('###form###',$get_content['form'],$content3);
	$content3 = str_replace('form_layout','form_layout content3',$content3);
	$content3 = str_replace('###button###','content3a',$content3);
	
	//Content 3a
	$get_content = sgdiet_form_welcome_activity_assessment();
	$content3a = str_replace('###text1###',$get_content['text1'],$layout);
	$content3a = str_replace('###text2###',$get_content['text2'],$content3a);
	$content3a = str_replace('###qn###',$get_content['qn'],$content3a);
	$content3a = str_replace('###form###',$get_content['form'],$content3a);
	$content3a = str_replace('form_layout','form_layout content3a',$content3a);
	$content3a = str_replace('###button###','get_result',$content3a);
	
	$style='
<style>
.form_layout {
    position: relative;
    background-color: #fff;
    z-index: 9;
}

 span#text1{
    padding: 10px 4px;
    font-size: 15px;
    display: block;
    font-family: \'Roboto\';
    line-height: 1.3;
    letter-spacing: 0px;
}
.text_content span#text2 {
    padding: 10px 4px;
    font-size: 15px;
    display: block;
    font-family: \'Roboto\';
    line-height: 1.3;
    letter-spacing: 0px;
}
.form_content {
    font-size: 18px;
    display: block;
    line-height: 1.5;
    padding: 12px 15px;
    font-family: \'Roboto\';
    border: 1px solid #988;
    background: #f4f4f4;
}

.qn_content {
    line-height: 1.3;
    margin: 10px 1px;
    font-size: 18px;
    font-weight: 600;
}

.loading_bar {
    padding-top: 15px;
    padding-bottom: 15px;
}


.form_content,.loading_bar,
.knowhalim_form_section{
display:none;
}

.button_section {
    text-align: center;
}

input[type="radio"] {
    margin-right: 10px;
}
.form_layout.content1 #field_label{
	font-weight: 600;
}
label {
    display: inline-block;
    line-height: 1;
    vertical-align: middle;
    margin-bottom: 15px;
    border: 1px solid;
    border-radius: 6px;
    padding: 7px;
}

.form_layout.content1{
display:none;
}
.form_layout.content1 .form_content{
display:block;
}
.form_layout.content2{
display:none;
}

.form_layout.content1 .form_content{
display:none;
}
.form_layout.content2a{
display:none;
}
.form_layout.content2a .form_content{
display:block;
}

.form_layout.content2b{
display:none;
}

.form_layout.content2b .form_content{
display:block;
}

.form_layout.content2c{
display:none;
}

.form_layout.content2c .form_content{
display:block;
}

.form_layout.content2d{
display:none;
}

.form_layout.content2d .form_content{
display:block;
}

.form_layout.content3{
display:none;
}
.form_layout.content3a{
display:none;
}
.form_layout.content3a .form_content{
display:block;
}

#field_input label {
    display: block;
}

a.result_link_css {
    background-color: #a9c528;
    padding: 12px 24px;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    margin: 0 auto;
    display: inline-block;
}

</style>';
	
	return $style.$content0.$content1.$content2.$content2a.$content2b.$content2c.$content2d.$content3.$content3a;
	
}
add_action('wp_ajax_nopriv_content0_post', 'sgdiet_content0_post');
add_action('wp_ajax_content0_post', 'sgdiet_content0_post');


add_action('wp_ajax_nopriv_content1_post', 'sgdiet_content1_post');
add_action('wp_ajax_content1_post', 'sgdiet_content1_post');


add_action('wp_ajax_nopriv_content2_post', 'sgdiet_content2_post');
add_action('wp_ajax_content2_post', 'sgdiet_content2_post');

add_action('wp_ajax_nopriv_content2a_post', 'sgdiet_content2a_post');
add_action('wp_ajax_content2a_post', 'sgdiet_content2a_post');

add_action('wp_ajax_nopriv_content2b_post', 'sgdiet_content2b_post');
add_action('wp_ajax_content2b_post', 'sgdiet_content2b_post');

add_action('wp_ajax_nopriv_content2c_post', 'sgdiet_content2c_post');
add_action('wp_ajax_content2c_post', 'sgdiet_content2c_post');

add_action('wp_ajax_nopriv_content2d_post', 'sgdiet_content2d_post');
add_action('wp_ajax_content2d_post', 'sgdiet_content2d_post');

add_action('wp_ajax_nopriv_content3_post', 'sgdiet_content3_post');
add_action('wp_ajax_content3_post', 'sgdiet_content3_post');

add_action('wp_ajax_nopriv_generate_result', 'sgdiet_result_content_post');
add_action('wp_ajax_generate_result', 'sgdiet_result_content_post');

function sgdiet_ajax_onboard(){
?>
<script>
	
	
jQuery("#content1").click(function(e){

	
	jQuery('.loading_bar').show();
	
	
	var thisbtn=jQuery(this);
	thisbtn.attr("disabled", true);
    
	var data = { 'action':'content0_post'};
    //var data = { 'action':'savefood', 'more':'values' };

    jQuery.ajax({
		url : '<?php echo admin_url( 'admin-ajax.php' ); ?>',
		type: "POST",
	  	data,
		dataType: "json",
		success: function(response) {
			jQuery('.loading_bar').hide();
		   	
			if (response.status=="success"){
				jQuery('.form_layout.content0').fadeOut();
				jQuery('.form_layout.content1').fadeIn();
				jQuery('.form_content').show();
				thisbtn.attr("disabled", false);
				thisbtn.text("Next");
			}else{
				thisbtn.attr("disabled", false);
				thisbtn.text("Try Again");
			}
		}
		
    });

}
);
	
jQuery("#content2").click(function(e){

	
	jQuery('.loading_bar').show();
	var intention = jQuery("#intention:checked").val();
	if (intention==""){
		alert('Please select your goal');
	}else{
	var thisbtn=jQuery(this);
	thisbtn.attr("disabled", true);
    
	var data = { 'action':'content1_post', 'goal':intention, 'uid':<?php echo get_current_user_id(); ?>};
    //var data = { 'action':'savefood', 'more':'values' };

    jQuery.ajax({
		url : '<?php echo admin_url( 'admin-ajax.php' ); ?>',
		type: "POST",
	  	data,
		dataType: "json",
		success: function(response) {
			jQuery('.loading_bar').hide();
		   	
			//console.log(response);
			//var similarbtn = jQuery('.likebtn-'+fid);
			if (response.status=="success"){
				jQuery('.form_layout.content1').fadeOut();
				jQuery('.form_content').hide();
				jQuery('.form_layout.content2').fadeIn();
				
				thisbtn.attr("disabled", false);
				thisbtn.text("Next");
			}else{
				thisbtn.attr("disabled", false);
				thisbtn.text("Try Again");
			}
		}
		
    });
	}
}
);
	
	
jQuery("#content2a").click(function(e){

	
	jQuery('.loading_bar').show();
	
	
	var thisbtn=jQuery(this);
	thisbtn.attr("disabled", true);
    
	var data = { 'action':'content2_post'};
    //var data = { 'action':'savefood', 'more':'values' };

    jQuery.ajax({
		url : '<?php echo admin_url( 'admin-ajax.php' ); ?>',
		type: "POST",
	  	data,
		dataType: "json",
		success: function(response) {
			jQuery('.loading_bar').hide();
		   	
			if (response.status=="success"){
				jQuery('.form_layout.content2').fadeOut();
				jQuery('.form_layout.content2a').fadeIn();
				jQuery('.form_content').show();
				thisbtn.attr("disabled", false);
				thisbtn.text("Next");
			}else{
				thisbtn.attr("disabled", false);
				thisbtn.text("Try Again");
			}
		}
		
    });

}
);
	
	

jQuery("#content2b").click(function(e){

	
	
	var gender = jQuery("#gender:checked").val();
	if (gender==""){
		alert('Please enter your gender');
	}else{
	jQuery('.loading_bar').show();
	var thisbtn=jQuery(this);
	thisbtn.attr("disabled", true);
    
	var data = { 'action':'content2a_post', 'gender':gender, 'uid':<?php echo get_current_user_id(); ?>};
    //var data = { 'action':'savefood', 'more':'values' };

    jQuery.ajax({
		url : '<?php echo admin_url( 'admin-ajax.php' ); ?>',
		type: "POST",
	  	data,
		dataType: "json",
		success: function(response) {
			jQuery('.loading_bar').hide();
		   	
			//console.log(response);
			//var similarbtn = jQuery('.likebtn-'+fid);
			if (response.status=="success"){
				jQuery('.form_layout.content2a').fadeOut();
				jQuery('.form_content').show();
				jQuery('.form_layout.content2b').fadeIn();
				thisbtn.attr("disabled", false);
				thisbtn.text("Next");
			}else{
				thisbtn.attr("disabled", false);
				thisbtn.text("Try Again");
			}
		}
		
    });
	}

}
);
	
	
	
jQuery("#content2c").click(function(e){

	
	
	var height = jQuery("#height").val();
	if (height==""){
		alert('Please enter your height');
	}else{
		jQuery('.loading_bar').show();
	var thisbtn=jQuery(this);
	thisbtn.attr("disabled", true);
    
	var data = { 'action':'content2b_post', 'height':height, 'uid':<?php echo get_current_user_id(); ?>};
    //var data = { 'action':'savefood', 'more':'values' };

    jQuery.ajax({
		url : '<?php echo admin_url( 'admin-ajax.php' ); ?>',
		type: "POST",
	  	data,
		dataType: "json",
		success: function(response) {
			jQuery('.loading_bar').hide();
		   	
			//console.log(response);
			//var similarbtn = jQuery('.likebtn-'+fid);
			if (response.status=="success"){
				jQuery('.form_layout.content2b').fadeOut();
				jQuery('.form_content').show();
				jQuery('.form_layout.content2c').fadeIn();
				thisbtn.attr("disabled", false);
				thisbtn.text("Next");
			}else{
				thisbtn.attr("disabled", false);
				thisbtn.text("Try Again");
			}
		}
		
    });
	}
}
);
	
	
	
jQuery("#content2d").click(function(e){
	var weight = jQuery("#weight").val();
	if (weight==""){
		alert('Please enter your weight');
	}else{
		jQuery('.loading_bar').show();
	var thisbtn=jQuery(this);
	thisbtn.attr("disabled", true);
    
	var data = { 'action':'content2c_post', 'weight':weight, 'uid':<?php echo get_current_user_id(); ?>};
    //var data = { 'action':'savefood', 'more':'values' };

    jQuery.ajax({
		url : '<?php echo admin_url( 'admin-ajax.php' ); ?>',
		type: "POST",
	  	data,
		dataType: "json",
		success: function(response) {
			jQuery('.loading_bar').hide();
		   	
			//console.log(response);
			//var similarbtn = jQuery('.likebtn-'+fid);
			if (response.status=="success"){
				jQuery('.form_layout.content2c').fadeOut();
				jQuery('.form_content').show();
				jQuery('.form_layout.content2d').fadeIn();
				thisbtn.attr("disabled", false);
				thisbtn.text("Next");
			}else{
				thisbtn.attr("disabled", false);
				thisbtn.text("Try Again");
			}
		}
		
    });
	}

}
);
	
	
	
	
jQuery("#content3").click(function(e){
	
	var age = jQuery("#age").val();
	if (age==""){
		alert('Please enter your age');
	}else{
	jQuery('.loading_bar').show();
	
	var thisbtn=jQuery(this);
	thisbtn.attr("disabled", true);
    
	var data = { 'action':'content2d_post', 'age':age, 'uid':<?php echo get_current_user_id(); ?>};
    //var data = { 'action':'savefood', 'more':'values' };

    jQuery.ajax({
		url : '<?php echo admin_url( 'admin-ajax.php' ); ?>',
		type: "POST",
	  	data,
		dataType: "json",
		success: function(response) {
			jQuery('.loading_bar').hide();
		   	
			//console.log(response);
			//var similarbtn = jQuery('.likebtn-'+fid);
			if (response.status=="success"){
				jQuery('.form_layout.content2d').fadeOut();
				jQuery('.form_content').hide();
				jQuery('.form_layout.content3').fadeIn();
				thisbtn.attr("disabled", false);
				thisbtn.text("Next");
			}else{
				thisbtn.attr("disabled", false);
				thisbtn.text("Try Again");
			}
		}
		
    });
	}
}
);
	
	
	
jQuery("#content3a").click(function(e){

	
	jQuery('.loading_bar').show();
	var age = jQuery("#activity").val();
	
	var thisbtn=jQuery(this);
	thisbtn.attr("disabled", true);
    
	var data = { 'action':'content3_post', 'age':age, 'uid':<?php echo get_current_user_id(); ?>};
    //var data = { 'action':'savefood', 'more':'values' };

    jQuery.ajax({
		url : '<?php echo admin_url( 'admin-ajax.php' ); ?>',
		type: "POST",
	  	data,
		dataType: "json",
		success: function(response) {
			jQuery('.loading_bar').hide();
		   	//console.log("content3a: " + response.result);
			//console.log(response);
			//var similarbtn = jQuery('.likebtn-'+fid);
			if (response.status=="success"){
				jQuery('.form_layout.content3').fadeOut();
				jQuery('.form_content').show();
				jQuery('.form_layout.content3a').fadeIn();
				thisbtn.attr("disabled", false);
				thisbtn.text("Next");
			}else{
				thisbtn.attr("disabled", false);
				thisbtn.text("Try Again");
			}
		}
		
    });

}
);
	
	
	
jQuery("#get_result").click(function(e){

	
	jQuery('.loading_bar').show();
	var activity = jQuery("#activity:checked").val();
	var age = jQuery("#age").val();
	var weight = jQuery("#weight").val();
	var goal = jQuery("#intention:checked").val();
	var height = jQuery("#height").val();
	var gender = jQuery("#gender:checked").val();
	
	
	var thisbtn=jQuery(this);
	thisbtn.attr("disabled", true);
    
	var data = { 'action':'generate_result', 'activity':activity, 'age':age,'weight': weight, 'goal':goal,'height':height, 'gender':gender, 'uid':<?php echo get_current_user_id(); ?>};
    //var data = { 'action':'savefood', 'more':'values' };

    jQuery.ajax({
		url : '<?php echo admin_url( 'admin-ajax.php' ); ?>',
		type: "POST",
	  	data,
		dataType: "json",
		success: function(response) {
			jQuery('.loading_bar').hide();
		   	
			console.log("get_result: " + response.carbohydrates);
			//var similarbtn = jQuery('.likebtn-'+fid);
			if (response.status=="success"){
				jQuery('.form_layout.content3').fadeOut();
				jQuery('.form_content').show();
				//jQuery('.form_layout.content3a #qn').html("<center><b>Congratulations! Here is your result.</b><br>Your Goal: " + response.goal + "</center>");
				jQuery('.form_layout.content3a').html("<center><b>Congratulations! Here is your result.</b><br>Your Goal: " + response.goal + "</center>" + response.table + "<center><p>" + response.result_msg + "</p><a href='"+response.result_link+"' class='result_link_css'>"+response.result_txt+'</a></center>');
				jQuery('.form_layout.content3a').fadeIn();
				
				//thisbtn.text("Next");
			}else{
				thisbtn.attr("disabled", false);
				thisbtn.text("Try Again");
			}
		}
		
    });

}
);
</script>
<?php
}

function sgdiet_content0_post(){
	$r = array();
	$r['status']='success';
	echo json_encode($r);
	die();
}



function sgdiet_content1_post(){
	
	$uid = sanitize_text_field($_POST['uid']);
	$goal = sanitize_text_field($_POST['goal']);
	update_user_meta( $uid, 'sgdiet_goal', $goal);
	$r = array();
	$r['user_id']=$uid;
	$r['goal']=$goal;
	$r['status']='success';
	echo json_encode($r);
	die();
}

function sgdiet_content2_post(){
	$r = array();
	$r['status']='success';
	echo json_encode($r);
	die();
}

function sgdiet_content2a_post(){
	
	$uid = sanitize_text_field($_POST['uid']);
	$value = sanitize_text_field($_POST['gender']);
	update_user_meta( $uid, 'sgdiet_gender', $value);
	$r = array();
	$r['user_id']=$uid;
	$r['gender']=$value;
	$r['status']='success';
	echo json_encode($r);
	die();
}


function sgdiet_content2b_post(){
	
	$uid = sanitize_text_field($_POST['uid']);
	$value = sanitize_text_field($_POST['height']);
	update_user_meta( $uid, 'sgdiet_height', $value);
	$r = array();
	$r['user_id']=$uid;
	$r['height']=$value;
	$r['status']='success';
	echo json_encode($r);
	die();
}

function sgdiet_content2c_post(){
	
	$uid = sanitize_text_field($_POST['uid']);
	$value = sanitize_text_field($_POST['weight']);
	update_user_meta( $uid, 'sgdiet_weight', $value);
	$r = array();
	$r['user_id']=$uid;
	$r['weight']=$value;
	$r['status']='success';
	echo json_encode($r);
	die();
}

function sgdiet_content2d_post(){
	
	$uid = sanitize_text_field($_POST['uid']);
	$value = sanitize_text_field($_POST['age']);
	update_user_meta( $uid, 'sgdiet_age', $value);
	$r = array();
	$r['user_id']=$uid;
	$r['age']=$value;
	$r['status']='success';
	echo json_encode($r);
	die();
}


function sgdiet_content3_post(){
	
	
	$r = array();
	$r['status']='success';
	echo json_encode($r);
	die();
}


function sgdiet_result_content_post(){
	
	$value = sanitize_text_field($_POST['activity']);
	$r = array();
	
	
	$r['activity']=$value;
	$thesgdiet_tdee_settings_options = get_option( 'thesgdiet_tdee_settings_option_name' );
	$apiemail = $thesgdiet_tdee_settings_options['your_website_name_0'];
	$result_page_note_2 = $thesgdiet_tdee_settings_options['result_page_note_2'];
	$result_page_button_link_3 = $thesgdiet_tdee_settings_options['result_page_button_link_3'];
	$result_page_button_text_4 = $thesgdiet_tdee_settings_options['result_page_button_text_4'];
	$thesgdiet_api_key_1 = $thesgdiet_tdee_settings_options['thesgdiet_api_key_1'];
  	
  
	$res  = sg_diet_generate_results($thesgdiet_api_key_1,$apiemail,sanitize_text_field($_POST['age']),sanitize_text_field($_POST['weight']),sanitize_text_field($_POST['height']),sanitize_text_field($_POST['gender']),sanitize_text_field($_POST['activity']),sanitize_text_field($_POST['goal']));
	echo json_encode($res,true);
	die();
}
function sg_diet_generate_results($api,$email,$age="",$weight="",$height="",$gender="",$activelevel="",$goal=""){

	$apikey = $api;
	
	$params =array();
	$params['age']=$age;
	$params['weight']=$weight;
	$params['height']=$height;
	$params['gender']=$gender;
	$params['activelevel']=$activelevel;
	$params['goal']=$goal;
	$params['apikey']=$apikey;
	$params['email']=$email;
	$the_post = json_encode($params);

	$args_post = array(
       'method' => 'POST',
    'timeout' => 45,
    'redirection' => 5,
    'httpversion' => '1.1',
    'blocking' => true,
	'body'        => $the_post,
	'sslverify' => false,
	'headers'     => array(
		'Content-type' => 'application/json'
	  ),
      'cookies' => array() 
	);


	$response = wp_remote_post( 'https://api.thesgdiet.com/wp-json/simple_api/v1/call', $args_post );
	
	 $res = $response['body'];
	//echo print_r($res,true);
	$returnvalue = json_decode($res,true);
	$res = $returnvalue['output'];
	$res['status']="success";
	
	$thesgdiet_tdee_settings_options = get_option( 'thesgdiet_tdee_settings_option_name' );
	$apiemail = $thesgdiet_tdee_settings_options['your_website_name_0'];
	$result_page_note_2 = $thesgdiet_tdee_settings_options['result_page_note_2'];
	$result_page_button_link_3 = $thesgdiet_tdee_settings_options['result_page_button_link_3'];
	$result_page_button_text_4 = $thesgdiet_tdee_settings_options['result_page_button_text_4'];
	$thesgdiet_api_key_1 = $thesgdiet_tdee_settings_options['thesgdiet_api_key_1'];
  	
  
	$res['result_msg']= apply_filters('sgdiet_result_msg',$result_page_note_2);
	$res['result_link']= apply_filters('sgdiet_result_link',$result_page_button_link_3);
	$res['result_txt']= apply_filters('sgdiet_result_txt',$result_page_button_text_4);
	
	
	return $res;
	//die();
}





class TheSGDietTDEESettings {
	private $thesgdiet_tdee_settings_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'thesgdiet_tdee_settings_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'thesgdiet_tdee_settings_page_init' ) );
	}

	public function thesgdiet_tdee_settings_add_plugin_page() {
		add_options_page(
			'TheSGDiet TDEE Settings', // page_title
			'TheSGDiet TDEE Settings', // menu_title
			'manage_options', // capability
			'thesgdiet-tdee-settings', // menu_slug
			array( $this, 'thesgdiet_tdee_settings_create_admin_page' ) // function
		);
	}

	public function thesgdiet_tdee_settings_create_admin_page() {
		$this->thesgdiet_tdee_settings_options = get_option( 'thesgdiet_tdee_settings_option_name' ); ?>

		<div class="wrap">
			<h2>TheSGDiet API Settings</h2>
			<p>Configure the API settings. In order to get the API details, you will need to register an account at <a href="https://api.thesgdiet.com/" target="_blank">The SGDIET API</a>. Use the shortcode [onboard] to display the form on your page.</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'thesgdiet_tdee_settings_option_group' );
					do_settings_sections( 'thesgdiet-tdee-settings-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function thesgdiet_tdee_settings_page_init() {
		register_setting(
			'thesgdiet_tdee_settings_option_group', // option_group
			'thesgdiet_tdee_settings_option_name', // option_name
			array( $this, 'thesgdiet_tdee_settings_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'thesgdiet_tdee_settings_setting_section', // id
			'Settings', // title
			array( $this, 'thesgdiet_tdee_settings_section_info' ), // callback
			'thesgdiet-tdee-settings-admin' // page
		);

		add_settings_field(
			'your_website_name_0', // id
			'Your API Email', // title
			array( $this, 'sgdiet_websitename_0_callback' ), // callback
			'thesgdiet-tdee-settings-admin', // page
			'thesgdiet_tdee_settings_setting_section' // section
		);

		add_settings_field(
			'thesgdiet_api_key_1', // id
			'Your API key', // title
			array( $this, 'thesgdiet_api_key_1_callback' ), // callback
			'thesgdiet-tdee-settings-admin', // page
			'thesgdiet_tdee_settings_setting_section' // section
		);

		add_settings_field(
			'result_page_note_2', // id
			'Result Page Note', // title
			array( $this, 'sgdiet_result_page_note' ), // callback
			'thesgdiet-tdee-settings-admin', // page
			'thesgdiet_tdee_settings_setting_section' // section
		);

		add_settings_field(
			'result_page_button_link_3', // id
			'Result Page Button Link', // title
			array( $this, 'sgdiet_result_page_button_link' ), // callback
			'thesgdiet-tdee-settings-admin', // page
			'thesgdiet_tdee_settings_setting_section' // section
		);

		add_settings_field(
			'result_page_button_text_4', // id
			'Result Page Button Text', // title
			array( $this, 'sgdiet_result_page_button_text_4_callback' ), // callback
			'thesgdiet-tdee-settings-admin', // page
			'thesgdiet_tdee_settings_setting_section' // section
		);
	}

	public function thesgdiet_tdee_settings_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['your_website_name_0'] ) ) {
			$sanitary_values['your_website_name_0'] = sanitize_text_field( $input['your_website_name_0'] );
		}

		if ( isset( $input['thesgdiet_api_key_1'] ) ) {
			$sanitary_values['thesgdiet_api_key_1'] = sanitize_text_field( $input['thesgdiet_api_key_1'] );
		}

		if ( isset( $input['result_page_note_2'] ) ) {
			$sanitary_values['result_page_note_2'] = esc_textarea( $input['result_page_note_2'] );
		}

		if ( isset( $input['result_page_button_link_3'] ) ) {
			$sanitary_values['result_page_button_link_3'] = sanitize_text_field( $input['result_page_button_link_3'] );
		}

		if ( isset( $input['result_page_button_text_4'] ) ) {
			$sanitary_values['result_page_button_text_4'] = sanitize_text_field( $input['result_page_button_text_4'] );
		}

		return $sanitary_values;
	}

	public function thesgdiet_tdee_settings_section_info() {
		
	}

	public function sgdiet_websitename_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="thesgdiet_tdee_settings_option_name[your_website_name_0]" id="your_website_name_0" value="%s">',
			isset( $this->thesgdiet_tdee_settings_options['your_website_name_0'] ) ? esc_attr( $this->thesgdiet_tdee_settings_options['your_website_name_0']) : ''
		);
	}

	public function thesgdiet_api_key_1_callback() {
		printf(
			'<input class="regular-text" type="text" name="thesgdiet_tdee_settings_option_name[thesgdiet_api_key_1]" id="thesgdiet_api_key_1" value="%s">',
			isset( $this->thesgdiet_tdee_settings_options['thesgdiet_api_key_1'] ) ? esc_attr( $this->thesgdiet_tdee_settings_options['thesgdiet_api_key_1']) : ''
		);
	}

	public function sgdiet_result_page_note() {
		printf(
			'<textarea class="large-text" rows="5" name="thesgdiet_tdee_settings_option_name[result_page_note_2]" id="result_page_note_2">%s</textarea>',
			isset( $this->thesgdiet_tdee_settings_options['result_page_note_2'] ) ? esc_attr( $this->thesgdiet_tdee_settings_options['result_page_note_2']) : ''
		);
	}

	public function sgdiet_result_page_button_link() {
		printf(
			'<input class="regular-text" type="text" name="thesgdiet_tdee_settings_option_name[result_page_button_link_3]" id="result_page_button_link_3" value="%s">',
			isset( $this->thesgdiet_tdee_settings_options['result_page_button_link_3'] ) ? esc_attr( $this->thesgdiet_tdee_settings_options['result_page_button_link_3']) : ''
		);
	}

	public function sgdiet_result_page_button_text_4_callback() {
		printf(
			'<input class="regular-text" type="text" name="thesgdiet_tdee_settings_option_name[result_page_button_text_4]" id="result_page_button_text_4" value="%s">',
			isset( $this->thesgdiet_tdee_settings_options['result_page_button_text_4'] ) ? esc_attr( $this->thesgdiet_tdee_settings_options['result_page_button_text_4']) : ''
		);
	}

}
if ( is_admin() )
	$thesgdiet_tdee_settings = new TheSGDietTDEESettings();


add_shortcode('sgdiet_display_macro','sgdiet_display_my_macro');
function sgdiet_display_my_macro(){
	$age =  get_user_meta(get_current_user_id(),'sgdiet_age',true);
	$weight =  get_user_meta(get_current_user_id(),'sgdiet_weight',true);
	$height =  get_user_meta(get_current_user_id(),'sgdiet_height',true);
	$gender = get_user_meta(get_current_user_id(),'sgdiet_gender',true);
	$activelevel =  get_user_meta(get_current_user_id(),'sgdiet_activity',true);
	$goal=get_user_meta(get_current_user_id(),'sgdiet_goal',true);
	
	$calories=get_user_meta(get_current_user_id(),'sgdiet_calories_target',true);
	$carbs=get_user_meta(get_current_user_id(),'sgdiet_carbohydrates_target',true);
	$protein=get_user_meta(get_current_user_id(),'sgdiet_protein_target',true);
	$fats=get_user_meta(get_current_user_id(),'sgdiet_fat_target',true);
	$dietstyle=get_user_meta(get_current_user_id(),'sgdiet_dietstyle',true);
	
	$m_calories=get_user_meta(get_current_user_id(),'sgdiet_calories_maintain',true);
	$m_carbs=get_user_meta(get_current_user_id(),'sgdiet_carbohydrates_maintain',true);
	$m_protein=get_user_meta(get_current_user_id(),'sgdiet_protein_maintain',true);
	$m_fats=get_user_meta(get_current_user_id(),'sgdiet_fat_maintain',true);
	
	
	
	$table = "<table class='display_macro'><tr><td>Macro</td><td>Quantity(g)</td><td>Calorie</td></tr>";
	$table .= "<tr><td>Carbohydrates</td><td>".$carbs."g</td><td>".((int)$carbs*4)."</td></tr>";
	$table .= "<tr><td>Protein</td><td>".$protein."g</td><td>".((int)$protein*4)."</td></tr>";
	$table .= "<tr><td>Fats</td><td>".$fats."g</td><td>".((int)$fats*9)."</td></tr>";
	$table .= "<tr><td>Total</td><td>-</td><td>".$calories."</td></tr>";
	$table .= "</table>";
	
	$table_maintain='<p>This is the macronutrient for your maintenance calorie to be used on your refeed day.</p><table><tr><td>Macro</td><td>Quantity (g)</td><td>Calories</td></tr>';
	$table_maintain .='<tr><td>Carbohydrates</td><td>'.$m_carbs.'</td><td>'.($m_carbs*4).'</td></tr>';
	$table_maintain .='<tr><td>Protein</td><td>'.$m_protein.'</td><td>'.($m_protein*4).'</td></tr>';
	$table_maintain .='<tr><td>Fats</td><td>'.$m_fats.'</td><td>'.($m_fats*9).'</td></tr>';
	$table_maintain .='<tr><td><b>Total</b></td><td>-</td><td><b>'.$m_calories.'</b></td></tr>';
	$table_maintain .='</table>';
	
	return $table.$table_maintain;
}