<?php
    $active_sections = array();
    $space_between = array();
    $general_options = get_option('Timer CountDown');
    if($general_options['circles_space_between'] == 0) {

    }
    else {
        $sections_name = array("circles_years_section", "circles_months_section", "circles_days_section", "circles_hours_section", "circles_minutes_section", "circles_seconds_section");
        
        for($cont = 0; $cont <= 5; $cont++)
        {                
            if ($general_options[$sections_name[$cont]] == "inline-block") {
                switch ($sections_name[$cont])
                {
                    case "circles_years_section":
                        array_push($active_sections, "years_section");
                        break;
    
                    case "circles_months_section":
                        array_push($active_sections, "months_section");
                        break;
                    
                    case "circles_days_section":
                        array_push($active_sections, "days_section");
                        break;
    
                    case "circles_hours_section":
                        array_push($active_sections, "hours_section");
                        break;
    
                    case "circles_minutes_section":
                        array_push($active_sections, "minutes_section");
                        break;
                    
                    case "circles_seconds_section":
                        array_push($active_sections, "seconds_section");
                        break;
                }                
            }
        };
    
        for($cont = 1; $cont <= count($active_sections) * 2; $cont++) {
            if ($cont == 1 || $cont == count($active_sections) * 2)
            {
                array_push($space_between, 0);
            }
            else
            {
                array_push($space_between, $general_options['circles_space_between']);
            }
        }    
    }
        
?>



<style>

.show_circles_div:after {
    content: '';
    width: 100%;
    display: inline-block;    
}

/* Sets the containers height and width */
.base-timer {
  position: relative;
  height: <?php echo esc_attr($general_options['circles_size']);?>px;
  width: <?php echo esc_attr($general_options['circles_size']);?>px; 
}

/* Removes SVG styling that would hide the time label */
.base-timer__circle {  
  fill: <?php if($general_options['circles_color_fill'] != '') echo esc_attr($general_options['circles_color_fill']); else echo esc_attr('none');?>; 
  stroke: none;
}

/* The SVG path that displays the timer's progress */
.base-timer__path-elapsed { 
  stroke-width: <?php echo esc_attr($general_options['circles_stroke_width_2']);?>px;
  stroke: <?php echo esc_attr($general_options['circles_color_1']);?>;

}

.base-timer__label {

margin-top: <?php echo esc_attr($general_options['circles_top_text_margin']);?>px;    
margin-left: <?php echo esc_attr($general_options['circles_left_text_margin']);?>px; 

position: absolute;

/* Size should match the parent container */
width: <?php echo esc_attr($general_options['circles_size']);?>px;
height: <?php echo esc_attr($general_options['circles_size']);?>px;



/* Keep the label aligned to the top */
top: 0;

/* Create a flexible box that centers content vertically and horizontally */
display: <?php if($general_options['circles_text_position'] == 'side by side') echo esc_attr("flex"); else echo esc_attr('block');?>;  
align-items: center;
justify-content: center;

/* Sort of an arbitrary number; adjust to your liking */

}

.base-timer__path-remaining {
/* Just as thick as the original ring */
stroke-width: <?php echo esc_attr($general_options['circles_stroke_width']);?>px;

/* Rounds the line endings to create a seamless circle */
stroke-linecap: <?php if($general_options['circles_stroke_linecap'] == 'round') echo esc_attr('round'); else echo esc_attr('none');?>; 

/* Makes sure the animation starts at the top of the circle */
transform: rotate(90deg);
transform-origin: center;

/* One second aligns with the speed of the countdown timer */
/*transition: 1s linear all; */

/* Allows the ring to change color when the color value updates */
stroke: currentColor;
}

.base-timer__svg {
  /* Flips the svg and makes the animation to move left-to-right */
  transform: scaleX(-1);
  
}




</style>

<script>
    jQuery(function()
    {         
            
            
			var d = "<?php echo esc_attr(current_time('mysql'));?>";            
            var time_server = new Date(d.replace(/-/g, '/'));
			
			var date_objetive = new Date(<?php echo esc_attr($general_options['objetive_year']);?>,
										<?php echo esc_attr($general_options['objetive_month'] - 1);?>,
										<?php echo esc_attr($general_options['objetive_day']);?>,
										<?php echo esc_attr($general_options['objetive_hour']);?>,
										<?php echo esc_attr($general_options['objetive_minute']);?>,
										<?php echo esc_attr($general_options['objetive_second']);?>
										); 
		

            var time = (date_objetive - time_server)/1000;    

             //Show Text 
            if("<?php echo esc_attr($general_options['show_text_input']);?>" == "checked") {            
                
                jQuery('.entire_block').css({"display":""});           
            }
            else {            
                
                jQuery('.entire_block').css({"display":"none"});            
            };    
                
            //Show Circles 
            if("<?php echo esc_attr($general_options['show_circles']);?>" == "checked") {            
                
                jQuery('#show_circles_div').css({"display":""});           
            }
            else {            
                
                jQuery('#show_circles_div').css({"display":"none"});            
            };  

            //Hide Text in Mobile                     
            if("<?php echo esc_attr($general_options['hide_text_on_mobile']);?>" == "checked") {  
                
                
                jQuery('.entire_block').append('<style type="text/css">@media screen and (max-width: 480px){ .entire_block { display: none}}</style>');
                         
            }
            else {   
               
                jQuery('.entire_block').append('<style type="text/css">@media screen and (max-width: 480px){ .entire_block { display: }}</style>');
                          
            };              

            //Hide Circles in Mobile                     
            if("<?php echo esc_attr($general_options['hide_circles_mobile']);?>" == "checked") {  
                
                
                jQuery('.show_circles_div').append('<style type="text/css">@media screen and (max-width: 480px){ .show_circles_div { display: none}}</style>');
                         
            }
            else {   
                
                jQuery('.show_circles_div').append('<style type="text/css">@media screen and (max-width: 480px){ .show_circles_div { display: }}</style>');
                          
            };                

            
            var trans = "<?php if($general_options['circles_movement'] == 'smooth') {echo esc_textarea("1s linear all");} else {echo esc_textarea("0s linear all");};?>";
            var trans2 = "<?php if($general_options['circles_backward_movement'] == 'smooth') {echo esc_textarea("1s linear all");} else {echo esc_textarea("0s linear all");};?>";
            var rotation = 189;
            
            function calcular_tiempo()
            {         

                var years = Math.floor(time / 31536000);
                var months = Math.floor((time % 31536000) / 2592000);
                var days = Math.floor(((time % 31536000) % 2592000) / 86400);
                var hours = Math.floor((((time % 31536000) % 2592000) % 86400) / 3600);
                var minutes = Math.floor(((((time % 31536000) % 2592000) % 86400) % 3600) / 60);
                var seconds = Math.floor(((((time % 31536000) % 2592000) % 86400) % 3600) % 60);
                time--;   

                if(years <= 0 && months <= 0 && days <= 0 && hours <= 0 && minutes <= 0 && seconds <= 0) {

                    years = 0; months = 0; days = 0; hours = 0; minutes = 0; seconds = 0;
                    
                    if("<?php echo esc_attr($general_options['goal_message_pos']);?>" == "") {
                        jQuery('.goal_message_div_2').css({"display":""});
                        jQuery('.goal_message_2').html("<?php echo esc_html($general_options['goal_message']);?>");
                    }
                    else {               

                        jQuery('.timer_block').css({"display":"none"});
                        jQuery('.goal_message').html("<?php echo esc_html($general_options['goal_message']);?>");
                    }

                    //Show Circles            
                    if("<?php echo esc_attr($general_options['circles_hide_on_goal']);?>" == "checked") {            
                        
                        jQuery('#show_circles_div').css({"display":"none"});           
                    }
                    else {            
                        
                        jQuery('#show_circles_div').css({"display":""});            
                    }; 

                    //Show text            
                    if("<?php echo esc_attr($general_options['text_hide_on_goal']);?>" == "checked") {            
                        
                        jQuery('.entire_block').css({"display":"none"});           
                    }
                    else {            
                        
                        jQuery('entire_block').css({"display":""});            
                    }; 
                    stop_interval();                   
                             
                }      
                
                if("<?php echo esc_attr($general_options['show_years']);?>" != "checked")
                {
                    years = "";            
                }
                if("<?php echo esc_attr($general_options['show_months']);?>" != "checked")
                {
                    months = "";            
                }
                if("<?php echo esc_attr($general_options['show_days']);?>" != "checked")
                {
                    days = "";            
                }
                if("<?php echo esc_attr($general_options['show_hours']);?>" != "checked")
                {
                    hours = "";            
                }
                if("<?php echo esc_attr($general_options['show_minutes']);?>" != "checked")
                {
                    minutes = "";            
                }
                if("<?php echo esc_attr($general_options['show_seconds']);?>" != "checked")
                {
                    seconds = "";            
                }
                
                
                
                
                //Cadena de Salida       
                    
                jQuery('.salida_years').html(("<?php echo esc_textarea($general_options['years_name']); ?>").replace(/\&amp;nbsp/g, '\xa0'));
                jQuery('.salida_years_counter').html(years);
                
                jQuery('.salida_months').html(("<?php echo esc_textarea($general_options['months_name']); ?>").replace(/\&amp;nbsp/g, '\xa0'));
                jQuery('.salida_months_counter').html(months);
                
                jQuery('.salida_days').html(("<?php echo esc_textarea($general_options['days_name']); ?>").replace(/\&amp;nbsp/g, '\xa0'));
                jQuery('.salida_days_counter').html(days);
                
                jQuery('.salida_hours').html(("<?php echo esc_textarea($general_options['hours_name']); ?>").replace(/\&amp;nbsp/g, '\xa0'));
                jQuery('.salida_hours_counter').html(hours);
                
                jQuery('.salida_minutes').html(("<?php echo esc_textarea($general_options['minutes_name']); ?>").replace(/\&amp;nbsp/g, '\xa0'));
                jQuery('.salida_minutes_counter').html(minutes);

                jQuery('.salida_seconds').html(("<?php echo esc_textarea($general_options['seconds_name']); ?>").replace(/\&amp;nbsp/g, '\xa0'));
                jQuery('.salida_seconds_counter').html(seconds);
                    
                jQuery('.salida_final').html(("<?php echo esc_textarea($general_options['final_name']); ?>").replace(/\&amp;nbsp/g, '\xa0'));    
                

                if(seconds == 59){                    
                    jQuery('#base-timer-path-remaining-seconds').css({"transition": trans2});                    
                    document.getElementById("base-timer-path-remaining-seconds").setAttribute("stroke-dasharray", + "220" + " 220");                    
                }else {
                    jQuery('#base-timer-path-remaining-seconds').css({"transition": trans});                    
                    document.getElementById("base-timer-path-remaining-seconds").setAttribute("stroke-dasharray", + calcular_rotation(seconds, 'segundos') + " 220");
                    console.log(trans);
                }
                

                if(minutes == 59){                    
                    jQuery('#base-timer-path-remaining-minutes').css({"transition": trans2});                    
                    document.getElementById("base-timer-path-remaining-minutes").setAttribute("stroke-dasharray", + "220" + " 220");                    
                }else {
                    jQuery('#base-timer-path-remaining-minutes').css({"transition": trans});                    
                    document.getElementById("base-timer-path-remaining-minutes").setAttribute("stroke-dasharray", + calcular_rotation(minutes, 'minutos') + " 220");                    
                }

                if(hours == 23){                    
                    jQuery('#base-timer-path-remaining-hours').css({"transition": trans2});                    
                    document.getElementById("base-timer-path-remaining-hours").setAttribute("stroke-dasharray", + "220" + " 220");                    
                }else {
                    jQuery('#base-timer-path-remaining-hours').css({"transition": trans});                    
                    document.getElementById("base-timer-path-remaining-hours").setAttribute("stroke-dasharray", + calcular_rotation(hours, 'horas') + " 220");                    
                }

                if(days == 29){                    
                    jQuery('#base-timer-path-remaining-days').css({"transition": trans2});                    
                    document.getElementById("base-timer-path-remaining-days").setAttribute("stroke-dasharray", + "220" + " 220");                    
                }else {
                    jQuery('#base-timer-path-remaining-days').css({"transition": trans});                    
                    document.getElementById("base-timer-path-remaining-days").setAttribute("stroke-dasharray", + calcular_rotation(days, 'dias') + " 220");                    
                }

                if(months == 11){                    
                    jQuery('#base-timer-path-remaining-months').css({"transition": trans2});                    
                    document.getElementById("base-timer-path-remaining-months").setAttribute("stroke-dasharray", + "220" + " 220");                    
                }else {
                    jQuery('#base-timer-path-remaining-months').css({"transition": trans});                    
                    document.getElementById("base-timer-path-remaining-months").setAttribute("stroke-dasharray", + calcular_rotation(months, 'meses') + " 220");                    
                }

                if(years == 9){                    
                    jQuery('#base-timer-path-remaining-years').css({"transition": trans2});                    
                    document.getElementById("base-timer-path-remaining-years").setAttribute("stroke-dasharray", + "220" + " 220");                    
                }else {
                    jQuery('#base-timer-path-remaining-years').css({"transition": trans});                    
                    document.getElementById("base-timer-path-remaining-years").setAttribute("stroke-dasharray", + calcular_rotation(years, 'annos') + " 220");                    
                }          
                
            }
            
            function calcular_rotation(valor, tipo) {
                switch(tipo) {
                    case 'segundos':
                        rotation = ((valor) * 3.7288 );
                        return rotation; 

                    case 'minutos':
                        rotation = ((valor) * 3.7288 );
                        return rotation;
                        
                    case 'horas':
                        rotation = ((valor) * 9.5652 );
                        return rotation;
                        
                    case 'dias':
                        rotation = ((valor) * 7.5862 );
                        return rotation;
                        
                    case 'meses':
                        rotation = ((valor) * 20 );
                        return rotation; 

                    case 'annos':
                        rotation = ((valor) * 24.4444 );
                        return rotation;                                         
                }        
            }
            
            //Size
            jQuery('.salida_years').css({"font-size":"<?php echo esc_attr($general_options['font_size_year'] .'px');?>"});
            jQuery('.salida_years_counter').css({"font-size":"<?php echo esc_attr($general_options['font_size_year_counter'] .'px');?>"});
            jQuery('.salida_months').css({"font-size":"<?php echo esc_attr($general_options['font_size_month'] .'px');?>"});
            jQuery('.salida_months_counter').css({"font-size":"<?php echo esc_attr($general_options['font_size_month_counter'] .'px');?>"});
            jQuery('.salida_days').css({"font-size":"<?php echo esc_attr($general_options['font_size_day'] .'px');?>"});
            jQuery('.salida_days_counter').css({"font-size":"<?php echo esc_attr($general_options['font_size_day_counter'] .'px');?>"});
            jQuery('.salida_hours').css({"font-size":"<?php echo esc_attr($general_options['font_size_hour'] .'px');?>"});
            jQuery('.salida_hours_counter').css({"font-size":"<?php echo esc_attr($general_options['font_size_hour_counter'] .'px');?>"});
            jQuery('.salida_minutes').css({"font-size":"<?php echo esc_attr($general_options['font_size_minute'] .'px');?>"});
            jQuery('.salida_minutes_counter').css({"font-size":"<?php echo esc_attr($general_options['font_size_minute_counter'] .'px');?>"});
            jQuery('.salida_seconds').css({"font-size":"<?php echo esc_attr($general_options['font_size_second'] .'px');?>"});
            jQuery('.salida_seconds_counter').css({"font-size":"<?php echo esc_attr($general_options['font_size_second_counter'] .'px');?>"});
            jQuery('.salida_final').css({"font-size":"<?php echo esc_attr($general_options['font_size_final'] .'px');?>"});
            jQuery('.goal_message').css({"font-size":"<?php echo esc_attr($general_options['goal_message_font_size'] .'px');?>"});
            jQuery('.goal_message_2').css({"font-size":"<?php echo esc_attr($general_options['goal_message_font_size'] .'px');?>"});

            //Color
            jQuery('.salida_years').css({"color":"<?php echo esc_attr($general_options['color_year']);?>"});
            jQuery('.salida_years_counter').css({"color":"<?php echo esc_attr($general_options['color_year_counter']);?>"});
            jQuery('.salida_months').css({"color":"<?php echo esc_attr($general_options['color_month']);?>"});
            jQuery('.salida_months_counter').css({"color":"<?php echo esc_attr($general_options['color_month_counter']);?>"});
            jQuery('.salida_days').css({"color":"<?php echo esc_attr($general_options['color_day']);?>"});
            jQuery('.salida_days_counter').css({"color":"<?php echo esc_attr($general_options['color_day_counter']);?>"});
            jQuery('.salida_hours').css({"color":"<?php echo esc_attr($general_options['color_hour']);?>"});
            jQuery('.salida_hours_counter').css({"color":"<?php echo esc_attr($general_options['color_hour_counter']);?>"});
            jQuery('.salida_minutes').css({"color":"<?php echo esc_attr($general_options['color_minute']);?>"});
            jQuery('.salida_minutes_counter').css({"color":"<?php echo esc_attr($general_options['color_minute_counter']);?>"});
            jQuery('.salida_seconds').css({"color":"<?php echo esc_attr($general_options['color_second']);?>"});
            jQuery('.salida_seconds_counter').css({"color":"<?php echo esc_attr($general_options['color_second_counter']);?>"});
            jQuery('.salida_final').css({"color":"<?php echo esc_attr($general_options['color_final']);?>"});
            jQuery('.goal_message').css({"color":"<?php echo esc_attr($general_options['goal_message_font_color']);?>"});
            jQuery('.goal_message_2').css({"color":"<?php echo esc_attr($general_options['goal_message_font_color']);?>"});

            //Font-Weight
            jQuery('.salida_years').css({"font-weight":"<?php echo esc_attr($general_options['font_weight_year']);?>"});
            jQuery('.salida_years_counter').css({"font-weight":"<?php echo esc_attr($general_options['font_weight_year_counter']);?>"});
            jQuery('.salida_months').css({"font-weight":"<?php echo esc_attr($general_options['font_weight_month']);?>"});
            jQuery('.salida_months_counter').css({"font-weight":"<?php echo esc_attr($general_options['font_weight_month_counter']);?>"});
            jQuery('.salida_days').css({"font-weight":"<?php echo esc_attr($general_options['font_weight_day']);?>"});
            jQuery('.salida_days_counter').css({"font-weight":"<?php echo esc_attr($general_options['font_weight_day_counter']);?>"});
            jQuery('.salida_hours').css({"font-weight":"<?php echo esc_attr($general_options['font_weight_hour']);?>"});
            jQuery('.salida_hours_counter').css({"font-weight":"<?php echo esc_attr($general_options['font_weight_hour_counter']);?>"});
            jQuery('.salida_minutes').css({"font-weight":"<?php echo esc_attr($general_options['font_weight_minute']);?>"});
            jQuery('.salida_minutes_counter').css({"font-weight":"<?php echo esc_attr($general_options['font_weight_minute_counter']);?>"});
            jQuery('.salida_seconds').css({"font-weight":"<?php echo esc_attr($general_options['font_weight_second']);?>"});
            jQuery('.salida_seconds_counter').css({"font-weight":"<?php echo esc_attr($general_options['font_weight_second_counter']);?>"});
            jQuery('.salida_final').css({"font-weight":"<?php echo esc_attr($general_options['font_weight_final']);?>"});
            jQuery('.goal_message').css({"font-weight":"<?php echo esc_attr($general_options['goal_message_font_weight']);?>"});
            jQuery('.goal_message_2').css({"font-weight":"<?php echo esc_attr($general_options['goal_message_font_weight']);?>"});

            //Font-Family
            jQuery('.salida_years').css({"font-family":"<?php echo esc_attr($general_options['font_family_year']);?>"});
            jQuery('.salida_years_counter').css({"font-family":"<?php echo esc_attr($general_options['font_family_year_counter']);?>"});
            jQuery('.salida_months').css({"font-family":"<?php echo esc_attr($general_options['font_family_month']);?>"});
            jQuery('.salida_months_counter').css({"font-family":"<?php echo esc_attr($general_options['font_family_month_counter']);?>"});
            jQuery('.salida_days').css({"font-family":"<?php echo esc_attr($general_options['font_family_day']);?>"});
            jQuery('.salida_days_counter').css({"font-family":"<?php echo esc_attr($general_options['font_family_day_counter']);?>"});
            jQuery('.salida_hours').css({"font-family":"<?php echo esc_attr($general_options['font_family_hour']);?>"});
            jQuery('.salida_hours_counter').css({"font-family":"<?php echo esc_attr($general_options['font_family_hour_counter']);?>"});
            jQuery('.salida_minutes').css({"font-family":"<?php echo esc_attr($general_options['font_family_minute']);?>"});
            jQuery('.salida_minutes_counter').css({"font-family":"<?php echo esc_attr($general_options['font_family_minute_counter']);?>"});
            jQuery('.salida_seconds').css({"font-family":"<?php echo esc_attr($general_options['font_family_second']);?>"});
            jQuery('.salida_seconds_counter').css({"font-family":"<?php echo esc_attr($general_options['font_family_second_counter']);?>"});
            jQuery('.salida_final').css({"font-family":"<?php echo esc_attr($general_options['font_family_final']);?>"});
            jQuery('.goal_message').css({"font-family":"<?php echo esc_attr($general_options['goal_message_font_family']);?>"});
            jQuery('.goal_message_2').css({"font-family":"<?php echo esc_attr($general_options['goal_message_font_family']);?>"});


            //Line-Height
            jQuery('.salida_years').css({"line-height":"<?php echo esc_attr($general_options['text_line_height']);?>" + "px"});
            jQuery('.salida_years_counter').css({"line-height":"<?php echo esc_attr($general_options['text_line_height']);?>" + "px"});
            jQuery('.salida_months').css({"line-height":"<?php echo esc_attr($general_options['text_line_height']);?>" + "px"});
            jQuery('.salida_months_counter').css({"line-height":"<?php echo esc_attr($general_options['text_line_height']);?>" + "px"});
            jQuery('.salida_days').css({"line-height":"<?php echo esc_attr($general_options['text_line_height']);?>" + "px"});
            jQuery('.salida_days_counter').css({"line-height":"<?php echo esc_attr($general_options['text_line_height']);?>" + "px"});
            jQuery('.salida_hours').css({"line-height":"<?php echo esc_attr($general_options['text_line_height']);?>" + "px"});
            jQuery('.salida_hours_counter').css({"line-height":"<?php echo esc_attr($general_options['text_line_height']);?>" + "px"});
            jQuery('.salida_minutes').css({"line-height":"<?php echo esc_attr($general_options['text_line_height']);?>" + "px"});
            jQuery('.salida_minutes_counter').css({"line-height":"<?php echo esc_attr($general_options['text_line_height']);?>" + "px"});
            jQuery('.salida_seconds').css({"line-height":"<?php echo esc_attr($general_options['text_line_height']);?>" + "px"});
            jQuery('.salida_seconds_counter').css({"line-height":"<?php echo esc_attr($general_options['text_line_height']);?>" + "px"});
            jQuery('.salida_final').css({"line-height":"<?php echo esc_attr($general_options['text_line_height']);?>" + "px"});

            //Entire Block
            jQuery('.entire_block').css({"background-color":"<?php echo esc_attr($general_options['eb_background_color']);?>"});
            jQuery('.entire_block').css({"padding-left":"<?php echo esc_attr($general_options['eb_left_padding']);?>" + "px"});
            jQuery('.entire_block').css({"padding-top":"<?php echo esc_attr($general_options['eb_top_padding']);?>" + "px"});  
            jQuery('.entire_block').css({"padding-right":"<?php echo esc_attr($general_options['eb_right_padding']);?>" + "px"});  
            jQuery('.entire_block').css({"padding-bottom":"<?php echo esc_attr($general_options['eb_bottom_padding']);?>" + "px"});  
            jQuery('.entire_block').css({"width":"<?php echo esc_attr($general_options['eb_width']);?>"});   
            jQuery('.entire_block').css({"height":"<?php echo esc_attr($general_options['eb_height']);?>"});
            jQuery('.entire_block').css({"text-align":"<?php echo esc_attr($general_options['eb_horizontal_align']);?>"}); 
            jQuery('.entire_block').css({"border-style":"<?php echo esc_attr($general_options['eb_border_style']);?>"});     
            jQuery('.entire_block').css({"border-width":"<?php echo esc_attr($general_options['eb_border_width']);?>"});  
            jQuery('.entire_block').css({"border-color":"<?php echo esc_attr($general_options['eb_border_color']);?>"});
            jQuery('.entire_block').css({"border-radius":"<?php echo esc_attr($general_options['eb_border_radius']);?>" + "px"}); 
            jQuery('.goal_message_div_2').css({"text-align":"<?php echo esc_attr($general_options['goal_message_text_align']);?>"});
            jQuery('.goal_message_div_2').css({"margin-top":"<?php echo esc_attr($general_options['goal_message_top_margin']);?>" + "px"}); 
            jQuery('.entire_block').css({"margin":"<?php switch($general_options['eb_container_align']) {
                case 'left': 
                    echo esc_attr(" 0 auto 0 0");
                    break;
                case 'center':
                    echo esc_attr("0 auto");
                    break;
                case 'right':
                    echo esc_attr("0 0 0 auto");
                    break;
            }?>"}); 
            

            jQuery('.entire_block').css({"box-shadow":"<?php echo esc_attr($general_options['eb_box_shadow_horizontal']); ?>"+ "px" + " " + 
                        "<?php echo esc_attr($general_options['eb_box_shadow_vertical']); ?>" + "px"  + " " + 
                        "<?php echo esc_attr($general_options['eb_box_shadow_blur']); ?>" + "px"  + " " + 
                        "<?php echo esc_attr($general_options['eb_box_shadow_color']); ?>"});

            //Space Between
            var active_sections = <?php echo esc_textarea(json_encode($active_sections)); ?>;
            var space_between = <?php echo esc_textarea(json_encode($space_between)); ?>;
            var cont2 = 0;
            for(var cont = 0; cont < active_sections.length; cont++)
            {
                jQuery('#'+ active_sections[cont]).css({"margin-left":"" + space_between[cont2] + "px"});
                cont2++;
                jQuery('#'+ active_sections[cont]).css({"margin-right":"" + space_between[cont2] + "px"});
                cont2++;
            }            

            var position = true;
            function stop_interval()
            {
                clearInterval(Intervalo);
            }

            var Intervalo = setInterval(calcular_tiempo, 1000);             
              
    });
</script>

<div style="display:none;" class="entire_block">
        <div class="timer_block" style="">
        
            <div style="display: inline-block;">
                <div style="display: <?php if($general_options['text_text_position'] == 'side by side') echo esc_attr("inline-block"); else echo esc_attr('block');?>;">
                    <span class="salida_years"></span>  
                </div>  
            </div>          

            <div style="display: inline-block;">
                <div style="display: <?php if($general_options['text_text_position'] == 'side by side') echo esc_attr("inline-block"); else echo esc_attr('block');?>;">
                    <span class="salida_years_counter"></span>
                </div>
                <div style="display: <?php if($general_options['text_text_position'] == 'side by side') echo esc_attr("inline-block"); else echo esc_attr('block');?>;">
                    <span class="salida_months"></span>
                </div>  
            </div>
        
            <div style="display: inline-block;">
                <div style="display: <?php if($general_options['text_text_position'] == 'side by side') echo esc_attr("inline-block"); else echo esc_attr('block');?>;">
                    <span class="salida_months_counter"></span>
                </div>
                <div style="display: <?php if($general_options['text_text_position'] == 'side by side') echo esc_attr("inline-block"); else echo esc_attr('block');?>;">
                    <span class="salida_days"></span>
                </div>
            </div>  

            <div style="display: inline-block;">
                <div style="display: <?php if($general_options['text_text_position'] == 'side by side') echo esc_attr("inline-block"); else echo esc_attr('block');?>;">
                    <span class="salida_days_counter"></span>
                </div>
                <div style="display: <?php if($general_options['text_text_position'] == 'side by side') echo esc_attr("inline-block"); else echo esc_attr('block');?>;">
                    <span class="salida_hours"></span>
                </div> 
            </div> 

            <div style="display: inline-block;">
                <div style="display: <?php if($general_options['text_text_position'] == 'side by side') echo esc_attr("inline-block"); else echo esc_attr('block');?>;">
                    <span class="salida_hours_counter"></span>
                </div>
                <div style="display: <?php if($general_options['text_text_position'] == 'side by side') echo esc_attr("inline-block"); else echo esc_attr('block');?>;">
                    <span class="salida_minutes"></span>
                </div> 
            </div>           

            <div style="display: inline-block;">
                <div style="display: <?php if($general_options['text_text_position'] == 'side by side') echo esc_attr("inline-block"); else echo esc_attr('block');?>;">
                    <span class="salida_minutes_counter"></span>
                </div>
                <div style="display: <?php if($general_options['text_text_position'] == 'side by side') echo esc_attr("inline-block"); else echo esc_attr('block');?>;">
                    <span class="salida_seconds"></span>
                </div>
            </div>

            <div style="display: inline-block;">
                <div style="display: <?php if($general_options['text_text_position'] == 'side by side') echo esc_attr("inline-block"); else echo esc_attr('block');?>;">
                    <span class="salida_seconds_counter"></span>
                </div>
                <div style="display: <?php if($general_options['text_text_position'] == 'side by side') echo esc_attr("inline-block"); else echo esc_attr('block');?>;">
                    <span class="salida_final"></span>
                </div>
            </div>


            <!-- <span style="white-space:nowrap;" class="salida_years"></span>     <span style="white-space:nowrap;"><span class="salida_years_counter"></span><span class="salida_months"></span></span>   <span style="white-space:nowrap;"><span class="salida_months_counter"></span><span class="salida_days"></span></span>   <span style="white-space:nowrap;"><span class="salida_days_counter"></span><span class="salida_hours"></span></span>   <span style="white-space:nowrap;"> <span class="salida_hours_counter"></span><span class="salida_minutes"></span></span>    <span style="white-space:nowrap;"><span class="salida_minutes_counter"></span><span class="salida_seconds"></span></span> <span style="white-space:nowrap;"><span class="salida_seconds_counter"></span><span class="salida_final"></span></span> -->
        </div>
        <div class="goal_message_div">
            <span class="goal_message"></span>            
        </div>        
    </div>
    
    <div style="display:none;" class="goal_message_div_2">
            <span  class="goal_message_2"></span>            
    </div>
    

    <div id="show_circles_div" class="show_circles_div" style="display:none; padding-top:20px; text-align: <?php echo esc_attr($general_options['circles_align']);?>; margin: <?php echo esc_attr($general_options['circles_top_margin']);?>px <?php echo esc_attr($general_options['circles_right_margin']);?>px <?php echo esc_attr($general_options['circles_bottom_margin']);?>px  <?php echo esc_attr($general_options['circles_left_margin']);?>px ;">    

<!-- Años -->
    <div id="years_section" class="base-timer" style="display: <?php echo esc_attr($general_options['circles_years_section']);?>;">
        <svg id="" class="base-timer__svg" width="<?php echo esc_attr($general_options['circles_size']);?>" height="<?php echo esc_attr($general_options['circles_size']);?>" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <g class="base-timer__circle">            
            <circle style="" class="base-timer__path-elapsed" cx="50" cy="50" r="35"></circle>
            <path id="base-timer-path-remaining-years"
            stroke-dasharray="220 220"
            class="base-timer__path-remaining"  style="color:<?php echo esc_attr($general_options['circles_color_2']);?>;"
            d="M15,50a35,35 0 1,0 70,0a35,35 0 1,0 -70,0"></path>
            </g>
        </svg>
        <span id="base-timer-label" class="base-timer__label">
            <span class="salida_years_counter"></span><br><span class="salida_months"></span>
        </span>
    </div>  


<!-- Meses -->
    <div id="months_section" class="base-timer" style="display: <?php echo esc_attr($general_options['circles_months_section']);?>;">
        <svg class="base-timer__svg" width="<?php echo esc_attr($general_options['circles_size']);?>" height="<?php echo esc_attr($general_options['circles_size']);?>" viewBox="0 0 100 100" style="" xmlns="http://www.w3.org/2000/svg">
            <g class="base-timer__circle" style="">
            <circle class="base-timer__path-elapsed" cx="50" cy="50" r="35"></circle>
            <path id="base-timer-path-remaining-months"
            stroke-dasharray="220 220"
            class="base-timer__path-remaining"  style="color:<?php echo esc_attr($general_options['circles_color_2']);?>;"
            d="M15,50a35,35 0 1,0 70,0a35,35 0 1,0 -70,0"></path>
            </g>
        </svg>
        <span style="" id="base-timer-label" class="base-timer__label">
            <span class="salida_months_counter"></span><br><span class="salida_days"></span>
        </span>
    </div>  


<!-- Dias -->
    <div id="days_section" class="base-timer" style="; display: <?php echo esc_attr($general_options['circles_days_section']);?>;">
        <svg class="base-timer__svg" width="<?php echo esc_attr($general_options['circles_size']);?>" height="<?php echo esc_attr($general_options['circles_size']);?>" viewBox="0 0 100 100" style="" xmlns="http://www.w3.org/2000/svg">
            <g class="base-timer__circle">
            <circle class="base-timer__path-elapsed" cx="50" cy="50" r="35"></circle>
            <path id="base-timer-path-remaining-days"
            stroke-dasharray="220 220"
            class="base-timer__path-remaining"  style="color:<?php echo esc_attr($general_options['circles_color_2']);?>;"
            d="M15,50a35,35 0 1,0 70,0a35,35 0 1,0 -70,0"></path>
            </g>
        </svg>
        <span style="" id="base-timer-label" class="base-timer__label">
            <span class="salida_days_counter"></span><br><span class="salida_hours"></span>
        </span>
    </div>  


<!-- Horas -->
    <div id="hours_section" class="base-timer" style="display: <?php echo esc_attr($general_options['circles_hours_section']);?>;">
        <svg class="base-timer__svg" width="<?php echo esc_attr($general_options['circles_size']);?>" height="<?php echo esc_attr($general_options['circles_size']);?>" viewBox="0 0 100 100" style="" xmlns="http://www.w3.org/2000/svg">
            <g class="base-timer__circle">
            <circle class="base-timer__path-elapsed" cx="50" cy="50" r="35"></circle>
            <path id="base-timer-path-remaining-hours"
            stroke-dasharray="220 220"
            class="base-timer__path-remaining"  style="color:<?php echo esc_attr($general_options['circles_color_2']);?>;"
            d="M15,50a35,35 0 1,0 70,0a35,35 0 1,0 -70,0"></path>
            </g>
        </svg>
        <span style="" id="base-timer-label" class="base-timer__label">
        <span class="salida_hours_counter"></span><br><span class="salida_minutes"></span>
        </span>
    </div>  


<!-- Minutos -->
    <div id="minutes_section" class="base-timer" style="display: <?php echo esc_attr($general_options['circles_minutes_section']);?>;">
        <svg class="base-timer__svg" width="<?php echo esc_attr($general_options['circles_size']);?>" height="<?php echo esc_attr($general_options['circles_size']);?>" viewBox="0 0 100 100" style="" xmlns="http://www.w3.org/2000/svg">
            <g class="base-timer__circle">
            <circle class="base-timer__path-elapsed" cx="50" cy="50" r="35"></circle>
            <path id="base-timer-path-remaining-minutes"
            stroke-dasharray="220 220"
            class="base-timer__path-remaining"  style="color:<?php echo esc_attr($general_options['circles_color_2']);?>;"
            d="M15,50a35,35 0 1,0 70,0a35,35 0 1,0 -70,0"></path>
            </g>
        </svg>
        <span style="" id="base-timer-label" class="base-timer__label">
            <span class="salida_minutes_counter"></span><br><span class="salida_seconds"></span>
        </span>
    </div>  


<!-- Segundos -->
    <div id="seconds_section" id="base_timer_seconds" class="base-timer" style="display: <?php echo esc_attr($general_options['circles_seconds_section']);?>;">
        <svg class="base-timer__svg" width="<?php echo esc_attr($general_options['circles_size']);?>" height="<?php echo esc_attr($general_options['circles_size']);?>" viewBox="0 0 100 100" style="" xmlns="http://www.w3.org/2000/svg">
            <g class="base-timer__circle">
                <circle class="base-timer__path-elapsed" cx="50" cy="50" r="35"></circle>
                <path id="base-timer-path-remaining-seconds" 
                stroke-dasharray="220 220"
                class="base-timer__path-remaining"  style="color:<?php echo esc_attr($general_options['circles_color_2']);?>;"
                d="M15,50a35,35 0 1,0 70,0a35,35 0 1,0 -70,0"></path>
            </g>
        </svg>
        <span style="" id="base-timer-label" class="base-timer__label">
            
        <span class="salida_seconds_counter"></span><br><span class="salida_final"></span>
            
        </span>
    </div>

</div>


