<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>JQuery Example</title>

    <?php

    $active_sections = array();
    $space_between = array();
    $error = '';
    if (isset($_POST['save_template']) && isset($_POST['save_tamplate_button'])) {
        $general_options = get_option('Timer CountDown');
        $templates = get_option('Timer CountDown Templates');   

        if(!isset($templates[$_POST['save_template']])) {
            $templates[$_POST['save_template']] = $general_options;          
            update_option('Timer CountDown Templates', $templates);
        }
        else {
            $error = 'name_already_exists_error';        
        }    
    }

    if (isset($_POST['load_templates']) && isset($_POST['load_tamplate_button']) ) {    
        $templates = get_option('Timer CountDown Templates');
        $general_options = $templates[$_POST['load_templates']];
        update_option('Timer CountDown', $general_options);   
    }

    if(isset($_POST['delete_tamplate_button']) && isset($_POST['load_templates'])) {
        $templates = get_option('Timer CountDown Templates');
        unset($templates[$_POST['load_templates']]);
        update_option('Timer CountDown Templates', $templates);  

    }

    function sanitize_text_field_with_spaces($valor){
        //add rules
        return ($valor);
    }

    // Guardar los cambios
    if (isset($_POST['years_name'])) {
        $general_options = get_option('Timer CountDown');

        //Entire Block 
        if (isset($_POST['eb_background_color'])) $general_options['eb_background_color'] =  sanitize_hex_color($_POST['eb_background_color']);
        if (isset($_POST['eb_left_padding'])) $general_options['eb_left_padding'] = (int)$_POST['eb_left_padding'];     
        if (isset($_POST['eb_top_padding'])) $general_options['eb_top_padding'] = (int)$_POST['eb_top_padding'];
        if (isset($_POST['eb_right_padding'])) $general_options['eb_right_padding'] = (int)$_POST['eb_right_padding'];
        if (isset($_POST['eb_bottom_padding'])) $general_options['eb_bottom_padding'] = (int)$_POST['eb_bottom_padding'];
        if (isset($_POST['eb_width'])) $general_options['eb_width'] = sanitize_text_field($_POST['eb_width']);
        if (isset($_POST['eb_height'])) $general_options['eb_height'] = sanitize_text_field($_POST['eb_height']);
        if (isset($_POST['eb_horizontal_align'])) $general_options['eb_horizontal_align'] = sanitize_text_field($_POST['eb_horizontal_align']);
        if (isset($_POST['eb_container_align'])) $general_options['eb_container_align'] = sanitize_text_field($_POST['eb_container_align']);    
        if (isset($_POST['eb_border_style'])) $general_options['eb_border_style'] = sanitize_text_field($_POST['eb_border_style']); 
        if (isset($_POST['eb_border_width'])) $general_options['eb_border_width'] = (int)$_POST['eb_border_width']; 
        if (isset($_POST['eb_border_color'])) $general_options['eb_border_color'] = sanitize_hex_color($_POST['eb_border_color']);    
        if (isset($_POST['eb_box_shadow_horizontal'])) $general_options['eb_box_shadow_horizontal'] = (int)$_POST['eb_box_shadow_horizontal']; 
        if (isset($_POST['eb_box_shadow_vertical'])) $general_options['eb_box_shadow_vertical'] = (int)$_POST['eb_box_shadow_vertical']; 
        if (isset($_POST['eb_box_shadow_blur'])) $general_options['eb_box_shadow_blur'] = (int)$_POST['eb_box_shadow_blur']; 
        if (isset($_POST['eb_box_shadow_color'])) $general_options['eb_box_shadow_color'] = sanitize_hex_color($_POST['eb_box_shadow_color']);
        if (isset($_POST['eb_border_radius'])) $general_options['eb_border_radius'] = (int)$_POST['eb_border_radius'];

        if (isset($_POST['type_goal'])){
            $general_options['type_goal'] = "checked";
        } 
        else $general_options['type_goal'] = "";
        
        //Circles
        if (isset($_POST['show_circles'])){
            $general_options['show_circles'] = "checked";
        } 
        else $general_options['show_circles'] = "";

        if (isset($_POST['hide_circles_mobile'])){
            $general_options['hide_circles_mobile'] = "checked";
        } 
        else $general_options['hide_circles_mobile'] = "";


        if (isset($_POST['circles_stroke_width'])) $general_options['circles_stroke_width'] = (int)$_POST['circles_stroke_width'];
        if (isset($_POST['circles_stroke_width_2'])) $general_options['circles_stroke_width_2'] = (int)$_POST['circles_stroke_width_2'];    
        if (isset($_POST['circles_align'])) $general_options['circles_align'] = sanitize_text_field($_POST['circles_align']);

        if (isset($_POST['circles_top_margin'])) $general_options['circles_top_margin'] = (int)$_POST['circles_top_margin'];
        if (isset($_POST['circles_right_margin'])) $general_options['circles_right_margin'] = (int)$_POST['circles_right_margin'];
        if (isset($_POST['circles_bottom_margin'])) $general_options['circles_bottom_margin'] = (int)$_POST['circles_bottom_margin'];
        if (isset($_POST['circles_left_margin'])) $general_options['circles_left_margin'] = (int)$_POST['circles_left_margin'];  
        
        if (isset($_POST['circles_color_1'])) $general_options['circles_color_1'] = sanitize_hex_color($_POST['circles_color_1']);
        if (isset($_POST['circles_color_2'])) $general_options['circles_color_2'] = sanitize_hex_color($_POST['circles_color_2']);
        if (isset($_POST['circles_color_fill'])) $general_options['circles_color_fill'] = sanitize_hex_color($_POST['circles_color_fill']);

        if (isset($_POST['circles_top_text_margin'])) $general_options['circles_top_text_margin'] = (int)$_POST['circles_top_text_margin'];
        if (isset($_POST['circles_left_text_margin'])) $general_options['circles_left_text_margin'] = (int)$_POST['circles_left_text_margin']; 
        if (isset($_POST['circles_stroke_linecap'])) $general_options['circles_stroke_linecap'] = sanitize_text_field($_POST['circles_stroke_linecap']); 

        if (isset($_POST['circles_space_between'])) $general_options['circles_space_between'] = (int)$_POST['circles_space_between'];
        if (isset($_POST['circles_movement'])) $general_options['circles_movement'] = sanitize_text_field($_POST['circles_movement']);
        if (isset($_POST['circles_backward_movement'])) $general_options['circles_backward_movement'] = sanitize_text_field($_POST['circles_backward_movement']);
        if (isset($_POST['circles_text_position'])) $general_options['circles_text_position'] = sanitize_text_field($_POST['circles_text_position']);
        if (isset($_POST['text_text_position'])) $general_options['text_text_position'] = sanitize_text_field($_POST['text_text_position']);
        if (isset($_POST['text_line_height'])) $general_options['text_line_height'] = (int)$_POST['text_line_height'];

        if (isset($_POST['circles_years_section'])){
            $general_options['circles_years_section'] = "none"; } 
        else $general_options['circles_years_section'] = "inline-block";
        
        if (isset($_POST['circles_months_section'])){
            $general_options['circles_months_section'] = "none"; } 
        else $general_options['circles_months_section'] = "inline-block";

        if (isset($_POST['circles_days_section'])){
            $general_options['circles_days_section'] = "none"; } 
        else $general_options['circles_days_section'] = "inline-block";

        if (isset($_POST['circles_hours_section'])){
            $general_options['circles_hours_section'] = "none"; } 
        else $general_options['circles_hours_section'] = "inline-block";

        if (isset($_POST['circles_minutes_section'])){
            $general_options['circles_minutes_section'] = "none"; } 
        else $general_options['circles_minutes_section'] = "inline-block";

        if (isset($_POST['circles_seconds_section'])){
            $general_options['circles_seconds_section'] = "none"; } 
        else $general_options['circles_seconds_section'] = "inline-block";

        if (isset($_POST['show_text_input'])){
            $general_options['show_text_input'] = "checked";
        } 
        else $general_options['show_text_input'] = "";
        
        if (isset($_POST['hide_text_on_mobile'])){
            $general_options['hide_text_on_mobile'] = "checked";
        } 
        else $general_options['hide_text_on_mobile'] = "";


        if (isset($_POST['tabs_default_section'])) $general_options['tabs_default_section'] = sanitize_text_field($_POST['tabs_default_section']);    

        //Goal Message
        if (isset($_POST['goal_message'])) $general_options['goal_message'] = sanitize_text_field($_POST['goal_message']);
        if (isset($_POST['goal_message_font_size'])) $general_options['goal_message_font_size'] = (int)$_POST['goal_message_font_size'];
        if (isset($_POST['goal_message_font_color'])) $general_options['goal_message_font_color'] = sanitize_hex_color($_POST['goal_message_font_color']);
        if (isset($_POST['goal_message_font_weight'])) $general_options['goal_message_font_weight'] = (int)$_POST['goal_message_font_weight'];
        if (isset($_POST['goal_message_font_family'])) $general_options['goal_message_font_family'] = sanitize_text_field($_POST['goal_message_font_family']);
        if (isset($_POST['goal_message_text_align'])) $general_options['goal_message_text_align'] = (int)$_POST['goal_message_text_align'];
        if (isset($_POST['goal_message_top_margin'])) $general_options['goal_message_top_margin'] = (int)$_POST['goal_message_top_margin']; 
        
        if (isset($_POST['individual_global_options'])){
            $general_options['individual_global_options'] = "checked";
        }
        else $general_options['individual_global_options'] = ""; 

        //Global Options
        if (isset($_POST['font_size_general'])) $general_options['font_size_general'] = (int)$_POST['font_size_general']; 
        if (isset($_POST['font_color_general'])) $general_options['font_color_general'] = sanitize_hex_color($_POST['font_color_general']); 
        if (isset($_POST['font_weight_general'])) $general_options['font_weight_general'] = (int)$_POST['font_weight_general']; 
        if (isset($_POST['font_family_general'])) $general_options['font_family_general'] = sanitize_text_field($_POST['font_family_general']); 
        if (isset($_POST['circles_size'])) $general_options['circles_size'] = (int)$_POST['circles_size'];

        if (isset($_POST['color_input_hex'])){
            $general_options['color_input_hex'] = "checked";
        }
        else $general_options['color_input_hex'] = ""; 

        if (isset($_POST['goal_message_pos'])){
            $general_options['goal_message_pos'] = "checked";
        }
        else $general_options['goal_message_pos'] = ""; 

        if (isset($_POST['circles_hide_on_goal'])){
            $general_options['circles_hide_on_goal'] = "checked";
        }
        else $general_options['circles_hide_on_goal'] = ""; 

        if (isset($_POST['text_hide_on_goal'])){
            $general_options['text_hide_on_goal'] = "checked";
        }
        else $general_options['text_hide_on_goal'] = ""; 

        if (isset($_POST['font_family_year'])) $general_options['font_family_year'] = sanitize_text_field($_POST['font_family_year']);
        if (isset($_POST['font_family_year_counter'])) $general_options['font_family_year_counter'] = sanitize_text_field($_POST['font_family_year_counter']);
        if (isset($_POST['font_family_month'])) $general_options['font_family_month'] = sanitize_text_field($_POST['font_family_month']);
        if (isset($_POST['font_family_month_counter'])) $general_options['font_family_month_counter'] = sanitize_text_field($_POST['font_family_month_counter']);
        if (isset($_POST['font_family_day'])) $general_options['font_family_day'] = sanitize_text_field($_POST['font_family_day']);
        if (isset($_POST['font_family_day_counter'])) $general_options['font_family_day_counter'] = sanitize_text_field($_POST['font_family_day_counter']);
        if (isset($_POST['font_family_hour'])) $general_options['font_family_hour'] = sanitize_text_field($_POST['font_family_hour']);
        if (isset($_POST['font_family_hour_counter'])) $general_options['font_family_hour_counter'] = sanitize_text_field($_POST['font_family_hour_counter']);
        if (isset($_POST['font_family_minute'])) $general_options['font_family_minute'] = sanitize_text_field($_POST['font_family_minute']);
        if (isset($_POST['font_family_minute_counter'])) $general_options['font_family_minute_counter'] = sanitize_text_field($_POST['font_family_minute_counter']);
        if (isset($_POST['font_family_second'])) $general_options['font_family_second'] = sanitize_text_field($_POST['font_family_second']);
        if (isset($_POST['font_family_second_counter'])) $general_options['font_family_second_counter'] = sanitize_text_field($_POST['font_family_second_counter']);
        if (isset($_POST['font_family_final'])) $general_options['font_family_final'] = sanitize_text_field($_POST['font_family_final']);

        //Font Weight    
        if (isset($_POST['font_weight_year'])) $general_options['font_weight_year'] = (int)$_POST['font_weight_year'];
        if (isset($_POST['font_weight_year_counter'])) $general_options['font_weight_year_counter'] = (int)$_POST['font_weight_year_counter'];
        if (isset($_POST['font_weight_month'])) $general_options['font_weight_month'] = (int)$_POST['font_weight_month'];
        if (isset($_POST['font_weight_month_counter'])) $general_options['font_weight_month_counter'] = (int)$_POST['font_weight_month_counter'];
        if (isset($_POST['font_weight_day'])) $general_options['font_weight_day'] = (int)$_POST['font_weight_day'];
        if (isset($_POST['font_weight_day_counter'])) $general_options['font_weight_day_counter'] = (int)$_POST['font_weight_day_counter'];
        if (isset($_POST['font_weight_hour'])) $general_options['font_weight_hour'] = (int)$_POST['font_weight_hour'];
        if (isset($_POST['font_weight_hour_counter'])) $general_options['font_weight_hour_counter'] = (int)$_POST['font_weight_hour_counter'];
        if (isset($_POST['font_weight_minute'])) $general_options['font_weight_minute'] = (int)$_POST['font_weight_minute'];
        if (isset($_POST['font_weight_minute_counter'])) $general_options['font_weight_minute_counter'] = (int)$_POST['font_weight_minute_counter'];
        if (isset($_POST['font_weight_second'])) $general_options['font_weight_second'] = (int)$_POST['font_weight_second'];
        if (isset($_POST['font_weight_second_counter'])) $general_options['font_weight_second_counter'] = (int)$_POST['font_weight_second_counter'];
        if (isset($_POST['font_weight_final'])) $general_options['font_weight_final'] = (int)$_POST['font_weight_final'];

        //Size
        if (isset($_POST['font_size_year'])) $general_options['font_size_year'] = (int)$_POST['font_size_year'];
        if (isset($_POST['font_size_year_counter'])) $general_options['font_size_year_counter'] = (int)$_POST['font_size_year_counter'];
        if (isset($_POST['font_size_month'])) $general_options['font_size_month'] = (int)$_POST['font_size_month'];
        if (isset($_POST['font_size_month_counter'])) $general_options['font_size_month_counter'] = (int)$_POST['font_size_month_counter'];
        if (isset($_POST['font_size_day'])) $general_options['font_size_day'] = (int)$_POST['font_size_day'];
        if (isset($_POST['font_size_day_counter'])) $general_options['font_size_day_counter'] = (int)$_POST['font_size_day_counter'];
        if (isset($_POST['font_size_hour'])) $general_options['font_size_hour'] = (int)$_POST['font_size_hour'];
        if (isset($_POST['font_size_hour_counter'])) $general_options['font_size_hour_counter'] = (int)$_POST['font_size_hour_counter'];
        if (isset($_POST['font_size_minute'])) $general_options['font_size_minute'] = (int)$_POST['font_size_minute'];
        if (isset($_POST['font_size_minute_counter'])) $general_options['font_size_minute_counter'] = (int)$_POST['font_size_minute_counter'];
        if (isset($_POST['font_size_second'])) $general_options['font_size_second'] = (int)$_POST['font_size_second'];
        if (isset($_POST['font_size_second_counter'])) $general_options['font_size_second_counter'] = (int)$_POST['font_size_second_counter'];
        if (isset($_POST['font_size_final'])) $general_options['font_size_final'] = (int)$_POST['font_size_final'];

        //Color        
        if (isset($_POST['color_year'])) $general_options['color_year'] = sanitize_hex_color($_POST['color_year']);
        if (isset($_POST['color_year_counter'])) $general_options['color_year_counter'] = sanitize_hex_color($_POST['color_year_counter']);
        if (isset($_POST['color_month'])) $general_options['color_month'] = sanitize_hex_color($_POST['color_month']);
        if (isset($_POST['color_month_counter'])) $general_options['color_month_counter'] = sanitize_hex_color($_POST['color_month_counter']);
        if (isset($_POST['color_day'])) $general_options['color_day'] = sanitize_hex_color($_POST['color_day']);
        if (isset($_POST['color_day_counter'])) $general_options['color_day_counter'] = sanitize_hex_color($_POST['color_day_counter']);
        if (isset($_POST['color_hour'])) $general_options['color_hour'] = sanitize_hex_color($_POST['color_hour']);
        if (isset($_POST['color_hour_counter'])) $general_options['color_hour_counter'] = sanitize_hex_color($_POST['color_hour_counter']);
        if (isset($_POST['color_minute'])) $general_options['color_minute'] = sanitize_hex_color($_POST['color_minute']);
        if (isset($_POST['color_minute_counter'])) $general_options['color_minute_counter'] = sanitize_hex_color($_POST['color_minute_counter']);
        if (isset($_POST['color_second'])) $general_options['color_second'] = sanitize_hex_color($_POST['color_second']);
        if (isset($_POST['color_second_counter'])) $general_options['color_second_counter'] = sanitize_hex_color($_POST['color_second_counter']);
        if (isset($_POST['color_final'])) $general_options['color_final'] = sanitize_hex_color($_POST['color_final']); 

        //Guardar Fecha Objetivo
        if (isset($_POST['objetive_year'])) $general_options['objetive_year'] = (int)$_POST['objetive_year'];
        if (isset($_POST['objetive_month'])) $general_options['objetive_month'] = (int)$_POST['objetive_month'];
        if (isset($_POST['objetive_day'])) $general_options['objetive_day'] = (int)$_POST['objetive_day'];
        if (isset($_POST['objetive_hour'])) $general_options['objetive_hour'] = (int)$_POST['objetive_hour'];
        if (isset($_POST['objetive_minute'])) $general_options['objetive_minute'] = (int)$_POST['objetive_minute'];
        if (isset($_POST['objetive_second'])) $general_options['objetive_second'] = (int)$_POST['objetive_second'];

        //Guardar Fecha Remain
        if (isset($_POST['remain_years'])) $general_options['remain_years'] = (int)$_POST['remain_years']; 
        if (isset($_POST['remain_months'])) $general_options['remain_months'] = (int)$_POST['remain_months']; 
        if (isset($_POST['remain_days'])) $general_options['remain_days'] = (int)$_POST['remain_days']; 
        if (isset($_POST['remain_hours'])) $general_options['remain_hours'] = (int)$_POST['remain_hours']; 
        if (isset($_POST['remain_minutes'])) $general_options['remain_minutes'] = (int)$_POST['remain_minutes']; 
        if (isset($_POST['remain_seconds'])) $general_options['remain_seconds'] = (int)$_POST['remain_seconds'];    


        //Guardar nombre de los Contadores
        if (isset($_POST['years_name'])) $general_options['years_name'] = str_replace(' ', '&nbsp', sanitize_text_field_with_spaces($_POST['years_name']));
        if (isset($_POST['months_name'])) $general_options['months_name'] = str_replace(' ', '&nbsp', sanitize_text_field_with_spaces($_POST['months_name']));
        if (isset($_POST['days_name'])) $general_options['days_name'] = str_replace(' ', '&nbsp', sanitize_text_field_with_spaces($_POST['days_name']));
        if (isset($_POST['hours_name'])) $general_options['hours_name'] = str_replace(' ', '&nbsp', sanitize_text_field_with_spaces($_POST['hours_name']));
        if (isset($_POST['minutes_name'])) $general_options['minutes_name'] = str_replace(' ', '&nbsp', sanitize_text_field_with_spaces($_POST['minutes_name']));
        if (isset($_POST['seconds_name'])) $general_options['seconds_name'] = str_replace(' ', '&nbsp', sanitize_text_field_with_spaces($_POST['seconds_name'])); 
        if (isset($_POST['eb_left_padding'])) $general_options['final_name'] = str_replace(' ', '&nbsp', sanitize_text_field_with_spaces($_POST['final_name']));

        //Guardar valores de los contadores
        if (isset($_POST['show_years'])){
            $general_options['show_years'] = "checked";
        }
        else $general_options['show_years'] = "";

        if (isset($_POST['show_months'])){
            $general_options['show_months'] = "checked";
        }
        else $general_options['show_months'] = "";

        if (isset($_POST['show_days'])){
            $general_options['show_days'] = "checked";
        }
        else $general_options['show_days'] = "";

        if (isset($_POST['show_hours'])){
            $general_options['show_hours'] = "checked";
        }
        else $general_options['show_hours'] = "";

        if (isset($_POST['show_minutes'])){
            $general_options['show_minutes'] = "checked";
        }
        else $general_options['show_minutes'] = "";

        if (isset($_POST['show_seconds'])){
            $general_options['show_seconds'] = "checked";
        }
        else $general_options['show_seconds'] = ""; 
        
        if($general_options['individual_global_options'] == 'checked')
        {
            $general_options['font_size_year'] = $general_options['font_size_general'];
            $general_options['font_size_year_counter'] = $general_options['font_size_general'];
            $general_options['font_size_month'] = $general_options['font_size_general'];
            $general_options['font_size_month_counter'] = $general_options['font_size_general'];
            $general_options['font_size_day'] = $general_options['font_size_general'];
            $general_options['font_size_day_counter'] = $general_options['font_size_general'];
            $general_options['font_size_hour'] = $general_options['font_size_general'];
            $general_options['font_size_hour_counter'] = $general_options['font_size_general'];
            $general_options['font_size_minute'] = $general_options['font_size_general'];
            $general_options['font_size_minute_counter'] = $general_options['font_size_general'];
            $general_options['font_size_second'] = $general_options['font_size_general'];
            $general_options['font_size_second_counter'] = $general_options['font_size_general'];
            $general_options['font_size_final'] = $general_options['font_size_general'];

            $general_options['color_year'] = $general_options['font_color_general'];
            $general_options['color_year_counter'] = $general_options['font_color_general'];
            $general_options['color_month'] = $general_options['font_color_general'];
            $general_options['color_month_counter'] = $general_options['font_color_general'];
            $general_options['color_day'] = $general_options['font_color_general'];
            $general_options['color_day_counter'] = $general_options['font_color_general'];
            $general_options['color_hour'] = $general_options['font_color_general'];
            $general_options['color_hour_counter'] = $general_options['font_color_general'];
            $general_options['color_minute'] = $general_options['font_color_general'];
            $general_options['color_minute_counter'] = $general_options['font_color_general'];
            $general_options['color_second'] = $general_options['font_color_general'];
            $general_options['color_second_counter'] = $general_options['font_color_general'];
            $general_options['color_final'] = $general_options['font_color_general'];

            $general_options['font_weight_year'] = $general_options['font_weight_general'];
            $general_options['font_weight_year_counter'] = $general_options['font_weight_general'];
            $general_options['font_weight_month'] = $general_options['font_weight_general'];
            $general_options['font_weight_month_counter'] = $general_options['font_weight_general'];
            $general_options['font_weight_day'] = $general_options['font_weight_general'];
            $general_options['font_weight_day_counter'] = $general_options['font_weight_general'];
            $general_options['font_weight_hour'] = $general_options['font_weight_general'];
            $general_options['font_weight_hour_counter'] = $general_options['font_weight_general'];
            $general_options['font_weight_minute'] = $general_options['font_weight_general'];
            $general_options['font_weight_minute_counter'] = $general_options['font_weight_general'];
            $general_options['font_weight_second'] = $general_options['font_weight_general'];
            $general_options['font_weight_second_counter'] = $general_options['font_weight_general'];
            $general_options['font_weight_final'] = $general_options['font_weight_general'];

            $general_options['font_family_year'] = $general_options['font_family_general'];
            $general_options['font_family_year_counter'] = $general_options['font_family_general'];
            $general_options['font_family_month'] = $general_options['font_family_general'];
            $general_options['font_family_month_counter'] = $general_options['font_family_general'];
            $general_options['font_family_day'] = $general_options['font_family_general'];
            $general_options['font_family_day_counter'] = $general_options['font_family_general'];
            $general_options['font_family_hour'] = $general_options['font_family_general'];
            $general_options['font_family_hour_counter'] = $general_options['font_family_general'];
            $general_options['font_family_minute'] = $general_options['font_family_general'];
            $general_options['font_family_minute_counter'] = $general_options['font_family_general'];
            $general_options['font_family_second'] = $general_options['font_family_general'];
            $general_options['font_family_second_counter'] = $general_options['font_family_general'];
            $general_options['font_family_final'] = $general_options['font_family_general'];
        };
        update_option('Timer CountDown', $general_options);    
    }

    if(!get_option('Timer CountDown'))
        {  
            $fileName = "default_templates.txt";
            $pluginDirectory = plugin_dir_path( __FILE__ );
            $filePath = $pluginDirectory . $fileName;            
            $templates = json_decode(file_get_contents($filePath), true);        

            $general_options = $templates["Timer 5"];                                
            
            add_option('Timer CountDown', $general_options);  
            add_option('Timer CountDown Templates', $templates);                     
        }
        else
        {
            $general_options = get_option('Timer CountDown');  
            $templates = get_option('Timer CountDown Templates');       
        };

        if($general_options['circles_space_between'] == 0) {
            //No hacer nada por ahora
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
        }

        .base-timer__path-remaining {
        /* Just as thick as the original ring */
        stroke-width: <?php echo esc_attr($general_options['circles_stroke_width']);?>px;

        /* Rounds the line endings to create a seamless circle */
        stroke-linecap: <?php if($general_options['circles_stroke_linecap'] == 'round') echo esc_attr('round'); else echo esc_attr('none') ;?>; 

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

        .negrita {
            font-weight: bold;
        }

        .smallwidth {
            width: 128px;
        }

        .tinywidth {
            width: 79px;
        } 

        /* The switch - the box around the slider */
        .switch {
        position: relative;
        display: inline-block;
        width: 30px;
        height: 17px;
        }

        /* Hide default HTML checkbox */
        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }

        /* The slider */
        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #2196F3;
        -webkit-transition: .2s;
        transition: .2s;
        }

        .chucho {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .2s;
        transition: .2s;
        }

        .chucho:before {
        position: absolute;
        content: "";
        height: 13px;
        width: 13px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .chucho {
        background-color: #2196F3;
        }

        input:focus + .chucho {
        box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .chucho:before {
        -webkit-transform: translateX(13px);
        -ms-transform: translateX(13px);
        transform: translateX(13px);
        }

        /* Rounded sliders */
        .chucho.round {
        border-radius: 17px;
        }

        .chucho.round:before {
        border-radius: 50%;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 13px;
        width: 13px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        background-color: #2196F3;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(13px);
        -ms-transform: translateX(13px);
        transform: translateX(13px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 17px;
        }

        .slider.round:before {
        border-radius: 50%;
        }   

        /* Style the tab */
        .tab {
        border-radius: 10px 10px 0px 0px;
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
        background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
        background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
        border-radius: 0px 0px 10px 10px;
        }
    </style>


</head>

<body>   
    <div style="width:1115px; margin-left:auto; margin-right:auto;"> <!-- 1115px -->

        <h1>Timer Countdown</h1><br>
        <br><br>
        
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

        <br><br><br>      

        <form  action="" method="POST">

            <div class="tab">    
                <button id="GoalDateTime_button" class="tablinks" type="button" onclick="seccion(event, 'GoalDateTime')">Goal Date & Time</button>
                <button id="SaveLoadTimer_button" class="tablinks" type="button" onclick="seccion(event, 'SaveLoadTimer')">Save/Load Timer</button>
                <button id="Input_button" class="tablinks" type="button" onclick="seccion(event, 'Input')">Input Text</button>
                <button id="TextOptions_button" class="tablinks" type="button" onclick="seccion(event, 'TextOptions')">Text Options</button>
                <button id="Circulos_button" class="tablinks" type="button" onclick="seccion(event, 'Circulos')">Circles</button>
                <button id="GoalMesagge_button" class="tablinks" type="button" onclick="seccion(event, 'GoalMesagge')">Goal Mesagge</button>
            </div>   

        

            <div style="" id="Circulos" class="tabcontent">
                <h3>Circles</h3>
                <div style="display: inline-block; margin-right: 30px; vertical-align: top;">                          
                    <label class="switch" style="margin-right: 5px;">
                        <input type="checkbox" name="show_circles" id="show_circles">
                        <span class="chucho round"></span>
                    </label> 
                    <label style="font-weight: bold; padding-bottom:1px;">Show Circles </label>  
                    <br>
                    <label class="switch" style="margin-right: 5px;">
                        <input type="checkbox" name="hide_circles_mobile" id="hide_circles_mobile">
                        <span class="chucho round"></span>
                    </label> 
                    <label style="font-weight: bold; padding-bottom:1px;">Hide on mobiles </label>                
                    
                    <br><br>
                    <label class="switch" style="margin-right: 5px;">
                        <input type="checkbox" name="circles_years_section" id="circles_years_section">
                        <span class="chucho round"></span>
                    </label> 
                    <label style="font-weight: bold; padding-bottom:1px;">Hide Years Section </label>

                    <br>
                    <label class="switch" style="margin-right: 5px;">
                        <input type="checkbox" name="circles_months_section" id="circles_months_section">
                        <span class="chucho round"></span>
                    </label> 
                    <label style="font-weight: bold; padding-bottom:1px;">Hide Months Section </label>   

                    <br>
                    <label class="switch" style="margin-right: 5px;">
                        <input type="checkbox" name="circles_days_section" id="circles_days_section">
                        <span class="chucho round"></span>
                    </label> 
                    <label style="font-weight: bold; padding-bottom:1px;">Hide Days Section </label>  

                    <br>
                    <label class="switch" style="margin-right: 5px;">
                        <input type="checkbox" name="circles_hours_section" id="circles_hours_section">
                        <span class="chucho round"></span>
                    </label> 
                    <label style="font-weight: bold; padding-bottom:1px;">Hide Hours Section </label>  

                    <br>
                    <label class="switch" style="margin-right: 5px;">
                        <input type="checkbox" name="circles_minutes_section" id="circles_minutes_section">
                        <span class="chucho round"></span>
                    </label> 
                    <label style="font-weight: bold; padding-bottom:1px;">Hide Minutes Section </label>  

                    <br>
                    <label class="switch" style="margin-right: 5px;">
                        <input type="checkbox" name="circles_seconds_section" id="circles_seconds_section">
                        <span class="chucho round"></span>
                    </label> 
                    <label style="font-weight: bold; padding-bottom:1px;">Hide Seconds Section </label>
                </div> 

                <div style="display: inline-block; margin-right: 30px; vertical-align: top;">  
                    <label style="font-weight: bold;">GENERAL OPTIONS</label><br>
                    <select class="" style="width:180px;" id="circles_size" name="circles_size">
                        <?php for ($i = 10; $i <= 600; $i+=10) { ?>
                            <option <?php if($i == $general_options['circles_size']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                        <?php } ?>
                    </select> 
                    <label style="font-weight: bold;">Circle Size </label> 
                    <br><br>

                    <input class="color_input" style="width: 180px; height:28px;" type="color" name="circles_color_fill" id="circles_color_fill" value="<?php echo esc_attr($general_options['circles_color_fill']);?>"></input>           
                    <label style="font-weight: bold;">Fill Color</label>
                    <br><br>
                    
                    <input class="" style="width: 180px; height:28px;" type="number" name="circles_space_between" id="circles_space_between" value="<?php echo esc_attr($general_options['circles_space_between']);?>"></input>
                    <label style="font-weight: bold;">Space Between </label>
                    <br><br>
                    
                    <select style="width:180px;;" class="" id="circles_align" name="circles_align">
                    <?php $valores = array("left", "center", "right", "justify"); 
                    for ($i = 0; $i <= 3; $i++) { ?>
                        <option <?php if($valores[$i] == $general_options['circles_align']) { echo esc_attr('selected="selected"');};?> value="<?php echo esc_attr($valores[$i]);?>"><?php echo esc_attr($valores[$i]);?></option>
                        <?php }; ?>
                    </select>
                    <label style="font-weight:bold;" labelfor="circles_align">Circles Align</label>
                    <br><br>

                    <select style="width:180px;;" class="" id="circles_movement" name="circles_movement">
                    <?php $valores = array("ticks", "smooth"); 
                    for ($i = 0; $i <= 1; $i++) { ?>
                        <option <?php if($valores[$i] == $general_options['circles_movement']) { echo esc_attr('selected="selected"');};?> value="<?php echo esc_attr($valores[$i]);?>"><?php echo esc_attr($valores[$i]);?></option>
                        <?php }; ?>
                    </select>
                    <label style="font-weight:bold;" labelfor="circles_align">Transition </label>
                    <br><br>

                    <select style="width:180px;;" class="" id="circles_backward_movement" name="circles_backward_movement">
                    <?php $valores = array("flash", "smooth"); 
                    for ($i = 0; $i <= 1; $i++) { ?>
                        <option <?php if($valores[$i] == $general_options['circles_backward_movement']) { echo esc_attr('selected="selected"');};?> value="<?php echo esc_attr($valores[$i]);?>"><?php echo esc_attr($valores[$i]);?></option>
                        <?php }; ?>
                    </select>
                    <label style="font-weight:bold;" labelfor="circles_backward_movement">Backward </label> 
                    <br><br>
                    
                    <select style="width:180px;;" class="" id="circles_text_position" name="circles_text_position">
                    <?php $valores = array("side by side", "vertical"); 
                    for ($i = 0; $i <= 1; $i++) { ?>
                        <option <?php if($valores[$i] == $general_options['circles_text_position']) { echo esc_attr('selected="selected"');};?> value="<?php echo esc_attr($valores[$i]);?>"><?php echo esc_attr($valores[$i]);?></option>
                        <?php }; ?>
                    </select>
                    <label style="font-weight:bold;" labelfor="circles_text_position">Text Position </label>   
                </div>          

                <div style="display: inline-block; margin-right: 30px; vertical-align: top;">
                    <label style="font-weight: bold;">BOX MARGIN</label><br>
                    <input type="number" id="circles_top_margin" value="<?php echo esc_attr($general_options['circles_top_margin']);?>" name="circles_top_margin">            
                    <label style="font-weight: bold;">Top</label>
                    <br><br>
                    
                    <input type="number" id="circles_right_margin" name="circles_right_margin" value="<?php echo esc_attr($general_options['circles_right_margin']);?>">  
                    <label style="font-weight: bold;">Right</label>
                    <br><br>

                    <input type="number" id="circles_bottom_margin" name="circles_bottom_margin" value="<?php echo esc_attr($general_options['circles_bottom_margin']);?>"> 
                    <label style="font-weight: bold;">Bottom</label>
                    <br><br>
                    
                    <input type="number" id="circles_left_margin" name="circles_left_margin" value="<?php echo esc_attr($general_options['circles_left_margin']);?>">             
                    <label style="font-weight: bold;">Left</label> 
                    
                    <br><br>
                    <label style="font-weight: bold;">TEXT MARGIN</label><br>
                    <input type="number" id="circles_top_text_margin" value="<?php echo esc_attr($general_options['circles_top_text_margin']);?>" name="circles_top_text_margin">            
                    <label style="font-weight: bold;">Top</label>
                    <br><br>

                    <input type="number" id="circles_left_text_margin" name="circles_left_text_margin" value="<?php echo esc_attr($general_options['circles_left_text_margin']);?>">             
                    <label style="font-weight: bold;">Left</label>              
                      
                </div>

                <div style="display: inline-block;">     
                    <label style="font-weight: bold;">STROKE</label><br>
                    <select style="width:180px;;" class="" id="circles_stroke_linecap" name="circles_stroke_linecap">
                    <?php $valores = array("square", "round"); 
                    for ($i = 0; $i <= 1; $i++) { ?>
                        <option <?php if($valores[$i] == $general_options['circles_stroke_linecap']) { echo esc_attr('selected="selected"');};?> value="<?php echo esc_attr($valores[$i]);?>"><?php echo esc_attr($valores[$i]);?></option>
                        <?php }; ?>
                    </select>
                    <label style="font-weight:bold;" labelfor="circles_stroke_linecap">Line-Cap </label>
                    
                    <br><br>
                    <select class="" style="width:180px;" id="circles_stroke_width_2" name="circles_stroke_width_2">
                        <?php for ($i = 1; $i <= 30; $i++) { ?>
                            <option <?php if($i == $general_options['circles_stroke_width_2']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                        <?php } ?>
                    </select> 
                    <label style="font-weight: bold;">Width 1</label>

                    <br><br>
                    <select class="" style="width:180px;" id="circles_stroke_width" name="circles_stroke_width">
                        <?php for ($i = 1; $i <= 30; $i++) { ?>
                            <option <?php if($i == $general_options['circles_stroke_width']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                        <?php } ?>
                    </select> 
                    <label style="font-weight: bold;">Width 2</label>

                    <br><br>
                    <input class="color_input" style="width: 180px; height:28px;" type="color" name="circles_color_1" id="circles_color_1" value="<?php echo esc_attr($general_options['circles_color_1']);?>"></input>           
                    <label style="font-weight: bold;">Color 1</label>
                    <br><br>

                    <input class="color_input" style="width: 180px; height:28px;" type="color" name="circles_color_2" id="circles_color_2" value="<?php echo esc_attr($general_options['circles_color_2']);?>"></input>           
                    <label style="font-weight: bold;">Color 2</label>                   
                </div>         
            </div>
        

            <div id="GoalDateTime" class="tabcontent">
                <h3>Set Goal Date & Time</h3>
                <div style="">                    
                    <div id="classic_entry">
                        <p style="border: solid 4px #b50000; width: 250px; text-align:center;" id="13" class="TimeServer negrita"></p> 
                        <p style="color:#b50000; font-style:italic;">Important: This plugin uses your Wordpress Installation <br> time to calculate the remain time and not your local time</p> 
                        <div style="font-size: 16px; text-align: center;">
                            <label class="negrita">Set GOAL Date and Time</label><br><br>
                        </div>

                        <label for="objetive_year">Goal Year: </label>

                        <select id="objetive_year" name="objetive_year">
                            <?php for ($i = 2017; $i <= 2099; $i++) { ?>
                            <option <?php if($i == $general_options['objetive_year']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                            <?php } ?>
                        </select>
                        
                        <label for="objetive_month">Goal Month: </label>

                        <select id="objetive_month" name="objetive_month">
                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                            <option <?php if($i == $general_options['objetive_month']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                            <?php } ?>
                        </select>

                        <label for="objetive_day">Goal Day: </label>

                        <select id="objetive_day" name="objetive_day">
                            <?php for ($i = 1; $i <= 31; $i++) { ?>
                            <option <?php if($i == $general_options['objetive_day']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                            <?php } ?>
                        </select>

                        <label for="objetive_hour">Goal Hour: </label>

                        <select id="objetive_hour" name="objetive_hour">
                            <?php for ($i = 0; $i <= 23; $i++) { ?>
                            <option <?php if($i == $general_options['objetive_hour']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                            <?php } ?>
                        </select>

                        <label for="objetive_minute">Goal Minute: </label>

                        <select id="objetive_minute" name="objetive_minute">
                            <?php for ($i = 0; $i <= 59; $i++) { ?>
                            <option <?php if($i == $general_options['objetive_minute']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                            <?php } ?>
                        </select>

                        <label for="objetive_second">Goal Second: </label>

                        <select id="objetive_second" name="objetive_second">
                            <?php for ($i = 0; $i <= 59; $i++) { ?>
                            <option <?php if($i == $general_options['objetive_second']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div id="optional_entry">
                        <p id="13" class="TimeClient negrita"></p>      
                    
                        <div style="text-align:center;">
                        <label style="font-size:16px; text-align:center;" class="negrita">Set REMAIN Date and Time</label><br><br>
                        </div>
                        <label for="remain_years">Remain Years: </label>
                        <input class="tinywidth" type="number" id="remain_years" name="remain_years" min="0" value="<?php echo esc_attr($general_options['remain_years']);?>">
                        
                        <label for="objetive_month">Remain Months: </label>

                        <input class="tinywidth" type="number" id="remain_months" name="remain_months" min="0" value="<?php echo esc_attr($general_options['remain_months']);?>">

                        <label for="objetive_day">Remain Days: </label>

                        <input class="tinywidth" type="number" id="remain_days" name="remain_days" min="0" value="<?php echo esc_attr($general_options['remain_days']);?>">

                        <label for="objetive_hour">Remain Hours: </label>

                        <input class="tinywidth" type="number" id="remain_hours" name="remain_hours" min="0" value="<?php echo esc_attr($general_options['remain_hours']);?>">

                        <label for="objetive_minute">Remain Minutes: </label>

                        <input class="tinywidth" type="number" id="remain_minutes" name="remain_minutes" min="0" value="<?php echo esc_attr($general_options['remain_minutes']);?>">

                        <label for="objetive_second">Remain Seconds: </label>

                        <input class="tinywidth" type="number" id="remain_seconds" name="remain_seconds" min="0" value="<?php echo esc_attr($general_options['remain_seconds']);?>">
                    </div>
                </div>
            </div>

            <div id="SaveLoadTimer" class="tabcontent">
            <h3>Save/Load Timer</h3>
                <table width="100%">
                    <tr>            
                        <td>
                            <form action="" method="POST">
                                <label style="font-weight: 700;">SAVE TIMER</label><br>                
                                <input class="" style="" type="text" name="save_template" id="save_template" minlength="5" value=""></input>
                                <p id="name_already_exists_error" style="display:none; margin-top: 0px; font-weight: 500; font-style:italic; color: #b50000;">this name already exists!</p>
                                <input class="button button-primary" type="submit" id="save_tamplate_button" name="save_tamplate_button" value="Save"></input>
                            </form>                 
                        </td>
                        <td align="right">
                        <div style="margin: 0 auto;">
                            <form action="" method="POST">
                                <label style="font-weight: 700;">LOAD TIMER</label><br>                 
                                <select id="load_templates" name="load_templates">
                                        <option selected="selected">Select</option>
                                    <?php foreach($templates as $name=>$value) { ?>
                                        <option value="<?php echo esc_attr($name); ?>"><?php echo esc_attr($name); ?></option>
                                    <?php } ?>  
                                </select>     
                                <input class="button button-primary" type="submit" id="load_tamplate_button" name="load_tamplate_button" value="Load Template"></input>     
                                <input class="button button-primary" style="background-color: #b50000; border: none;" type="submit" id="delete_tamplate_button" name="delete_tamplate_button" value="Delete"></input>
                                
                            </form> 
                        </div>              
                        </td>
                    </tr>
                </table>
            </div>

            <div id="Input" class="tabcontent">
                <h3>Input Text</h3>        
                <label class="switch">
                    <input type="checkbox" name="show_text_input" id="show_text_input">
                    <span class="chucho round"></span>
                </label>
                <label style="font-weight: bold;">Show Text</label>
                <br>
                <label class="switch">
                    <input type="checkbox" name="hide_text_on_mobile" id="hide_text_on_mobile">
                    <span class="chucho round"></span>
                </label>
                <label style="font-weight: bold;">Hide on mobiles</label>  
                <br><br>      
                <table>
                    <tr>
                        <td><input type="text" class="smallwidth" id="years_name" name="years_name" value="<?php echo esc_textarea(str_replace('&nbsp', ' ', $general_options['years_name'])); ?>"></td>
                        <td><input type="checkbox" id="show_years" name="show_years" value="checked" <?php echo esc_attr($general_options['show_years']); ?>></td>            
                        <td><input type="text" class="smallwidth" id="months_name" name="months_name" value="<?php echo esc_textarea(str_replace('&nbsp', ' ', $general_options['months_name'])); ?>"></td>
                        <td><input type="checkbox" id="show_months" name="show_months" value="checked" <?php echo esc_attr($general_options['show_months']); ?>></td>
                        <td><input type="text" class="smallwidth" id="days_name" name="days_name" value="<?php echo esc_textarea(str_replace('&nbsp', ' ', $general_options['days_name'])); ?>"></td>
                        <td><input type="checkbox" id="show_days" name="show_days" value="checked" <?php echo esc_attr($general_options['show_days']); ?>></td>
                        <td><input type="text" class="smallwidth" id="hours_name" name="hours_name" value="<?php echo esc_textarea(str_replace('&nbsp', ' ', $general_options['hours_name'])); ?>"></td>
                        <td><input type="checkbox" id="show_hours" name="show_hours" value="checked" <?php echo esc_attr($general_options['show_hours']); ?>></td>
                        <td><input type="text" class="smallwidth" id="minutes_name" name="minutes_name" value="<?php echo esc_textarea(str_replace('&nbsp', ' ', $general_options['minutes_name'])); ?>"></td>
                        <td><input type="checkbox" id="show_minutes" name="show_minutes" value="checked" <?php echo esc_attr($general_options['show_minutes']); ?>></td>
                        <td><input type="text" class="smallwidth" id="seconds_name" name="seconds_name" value="<?php echo esc_textarea(str_replace('&nbsp', ' ', $general_options['seconds_name'])); ?>"></td>
                        <td><input type="checkbox" id="show_seconds" name="show_seconds" value="checked" <?php echo esc_attr($general_options['show_seconds']); ?>></td>
                        <td><input type="text" class="smallwidth" id="final_name" name="final_name" value="<?php echo esc_textarea(str_replace('&nbsp', ' ', $general_options['final_name'])); ?>"></td>
                    </tr>
                </table>
                <br>
                <div style="width: 1115px;">
                    <div id="individual_options" class="individual_options">
                        <table>
                            <tr>
                                <td>        
                                    <p class="separadores" style="text-align: center">|</p>
                                    <p style="margin-top:-20px; text-align:center;" class="separadores" style="text-align: center">V</p>            
                                    <input class="tinywidth" type="number" id="font_size_year" name="font_size_year" min="1" value="<?php echo esc_attr($general_options['font_size_year']);?>"><br><br>
                                    <input class="tinywidth color_input" type="color" id="color_year" name="color_year" min="1" value="<?php echo esc_attr($general_options['color_year']);?>"><br><br>
                                    <select class="tinywidth" id="font_weight_year" name="font_weight_year">
                                    <?php for ($i = 100; $i <= 900; $i+=100) { ?>
                                        <option <?php if($i == $general_options['font_weight_year']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                                        <?php } ?>
                                    </select><br><br>                
                                    <input class="tinywidth" type="text" id="font_family_year" name="font_family_year" min="1" value="<?php echo esc_attr($general_options['font_family_year']);?>">

                                </td>
                                <td>
                                    <p class="separadores" style="text-align: center">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|</p>
                                    <p style="margin-top:-20px; text-align:center;" class="separadores" style="text-align: center">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspV</p>  
                                    <input class="tinywidth" type="number" id="font_size_year_counter" name="font_size_year_counter" min="1" value="<?php echo esc_attr($general_options['font_size_year_counter']);?>"><br><br>
                                    <input class="tinywidth color_input" type="color" id="color_year_counter" name="color_year_counter" min="1" value="<?php echo esc_attr($general_options['color_year_counter']);?>"><br><br>
                                    <select class="tinywidth" id="font_weight_year_counter" name="font_weight_year_counter">
                                    <?php for ($i = 100; $i <= 900; $i+=100) { ?>
                                        <option <?php if($i == $general_options['font_weight_year_counter']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                                        <?php } ?>
                                    </select><br><br>                
                                    <input class="tinywidth" type="text" id="font_family_year_counter" name="font_family_year_counter" min="1" value="<?php echo esc_attr($general_options['font_family_year_counter']);?>">

                                </td>
                                <td>
                                    <p class="separadores" style="text-align: center">|</p>
                                    <p style="margin-top:-20px; text-align:center;" class="separadores" style="text-align: center">V</p>    
                                    <input class="tinywidth" type="number" id="font_size_month" name="font_size_month" min="1" value="<?php echo esc_attr($general_options['font_size_month']);?>"><br><br>
                                    <input class="tinywidth color_input" type="color" id="color_month" name="color_month" min="1" value="<?php echo esc_attr($general_options['color_month']);?>"><br><br>
                                    <select class="tinywidth" id="font_weight_month" name="font_weight_month">
                                    <?php for ($i = 100; $i <= 900; $i+=100) { ?>
                                        <option <?php if($i == $general_options['font_weight_month']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                                        <?php } ?>
                                    </select><br><br>                
                                    <input class="tinywidth" type="text" id="font_family_month" name="font_family_month" min="1" value="<?php echo esc_attr($general_options['font_family_month']);?>">
                                    
                                </td>
                                <td>
                                    <p class="separadores" style="text-align: center">&nbsp&nbsp&nbsp&nbsp&nbsp|</p> 
                                    <p style="margin-top:-20px; text-align:center;" class="separadores" style="text-align: center">&nbsp&nbsp&nbsp&nbsp&nbspV</p>   
                                    <input class="tinywidth" type="number" id="font_size_month_counter" name="font_size_month_counter" min="1" value="<?php echo esc_attr($general_options['font_size_month_counter']);?>"><br><br>
                                    <input class="tinywidth color_input" type="color" id="color_month_counter" name="color_month_counter" min="1" value="<?php echo esc_attr($general_options['color_month_counter']);?>"><br><br>
                                    <select class="tinywidth" id="font_weight_month_counter" name="font_weight_month_counter">
                                    <?php for ($i = 100; $i <= 900; $i+=100) { ?>
                                        <option <?php if($i == $general_options['font_weight_month_counter']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                                        <?php } ?>
                                    </select><br><br>                
                                    <input class="tinywidth" type="text" id="font_family_month_counter" name="font_family_month_counter" min="1" value="<?php echo esc_attr($general_options['font_family_month_counter']);?>">
                                    
                                </td>
                                <td>
                                    <p class="separadores" style="text-align: center">|</p>
                                    <p style="margin-top:-20px; text-align:center;" class="separadores" style="text-align: center">V</p>    
                                    <input class="tinywidth" type="number" id="font_size_day" name="font_size_day" min="1" value="<?php echo esc_attr($general_options['font_size_day']);?>"><br><br>
                                    <input class="tinywidth color_input" type="color" id="color_day" name="color_day" min="1" value="<?php echo esc_attr($general_options['color_day']);?>"><br><br>
                                    <select class="tinywidth" id="font_weight_day" name="font_weight_day">
                                    <?php for ($i = 100; $i <= 900; $i+=100) { ?>
                                        <option <?php if($i == $general_options['font_weight_day']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                                        <?php } ?>
                                    </select><br><br>                
                                    <input class="tinywidth" type="text" id="font_family_day" name="font_family_day" min="1" value="<?php echo esc_attr($general_options['font_family_day']);?>">
                                    
                                </td>
                                <td>
                                    <p class="separadores" style="text-align: center">&nbsp|</p>
                                    <p style="margin-top:-20px; text-align:center;" class="separadores" style="text-align: center">&nbspV</p>   
                                    <input class="tinywidth" type="number" id="font_size_day_counter" name="font_size_day_counter" min="1" value="<?php echo esc_attr($general_options['font_size_day_counter']);?>"><br><br>
                                    <input class="tinywidth color_input" type="color" id="color_day_counter" name="color_day_counter" min="1" value="<?php echo esc_attr($general_options['color_day_counter']);?>"><br><br>
                                    <select class="tinywidth" id="font_weight_day_counter" name="font_weight_day_counter">
                                    <?php for ($i = 100; $i <= 900; $i+=100) { ?>
                                        <option <?php if($i == $general_options['font_weight_day_counter']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                                        <?php } ?>
                                    </select><br><br>                
                                    <input class="tinywidth" type="text" id="font_family_day_counter" name="font_family_day_counter" min="1" value="<?php echo esc_attr($general_options['font_family_day_counter']);?>">
                                    
                                </td>
                                <td>
                                    <p class="separadores" style="text-align: center">|</p>
                                    <p style="margin-top:-20px; text-align:center;" class="separadores" style="text-align: center">V</p>   
                                    <input class="tinywidth" type="number" id="font_size_hour" name="font_size_hour" min="1" value="<?php echo esc_attr($general_options['font_size_hour']);?>"><br><br>
                                    <input class="tinywidth color_input" type="color" id="color_hour" name="color_hour" min="1" value="<?php echo esc_attr($general_options['color_hour']);?>"><br><br>
                                    <select class="tinywidth" id="font_weight_hour" name="font_weight_hour">
                                    <?php for ($i = 100; $i <= 900; $i+=100) { ?>
                                        <option <?php if($i == $general_options['font_weight_hour']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                                        <?php } ?>
                                    </select><br><br>                
                                    <input class="tinywidth" type="text" id="font_family_hour" name="font_family_hour" min="1" value="<?php echo esc_attr($general_options['font_family_hour']);?>">
                                    
                                </td>
                                <td>
                                    <p class="separadores" style="text-align: center">|&nbsp&nbsp&nbsp</p>
                                    <p style="margin-top:-20px; text-align:center;" class="separadores" style="text-align: center">V&nbsp&nbsp&nbsp</p>   
                                    <input class="tinywidth" type="number" id="font_size_hour_counter" name="font_size_hour_counter" min="1" value="<?php echo esc_attr($general_options['font_size_hour_counter']);?>"><br><br>
                                    <input class="tinywidth color_input" type="color" id="color_hour_counter" name="color_hour_counter" min="1" value="<?php echo esc_attr($general_options['color_hour_counter']);?>"><br><br>
                                    <select class="tinywidth" id="font_weight_hour_counter" name="font_weight_hour_counter">
                                    <?php for ($i = 100; $i <= 900; $i+=100) { ?>
                                        <option <?php if($i == $general_options['font_weight_hour_counter']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                                        <?php } ?>
                                    </select><br><br>                
                                    <input class="tinywidth" type="text" id="font_family_hour_counter" name="font_family_hour_counter" min="1" value="<?php echo esc_attr($general_options['font_family_hour_counter']);?>">
                                    
                                </td>
                                <td>
                                    <p class="separadores" style="text-align: center">|</p>
                                    <p style="margin-top:-20px; text-align:center;" class="separadores" style="text-align: center">V</p>  
                                    <input class="tinywidth" type="number" id="font_size_minute" name="font_size_minute" min="1" value="<?php echo esc_attr($general_options['font_size_minute']);?>"><br><br>
                                    <input class="tinywidth color_input" type="color" id="color_minute" name="color_minute" min="1" value="<?php echo esc_attr($general_options['color_minute']);?>"><br><br>
                                    <select class="tinywidth" id="font_weight_minute" name="font_weight_minute">
                                    <?php for ($i = 100; $i <= 900; $i+=100) { ?>
                                        <option <?php if($i == $general_options['font_weight_minute']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                                        <?php } ?>
                                    </select><br><br>                
                                    <input class="tinywidth" type="text" id="font_family_minute" name="font_family_minute" min="1" value="<?php echo esc_attr($general_options['font_family_minute']);?>">
                                    
                                </td>
                                <td>
                                    <p class="separadores" style="text-align: center">|&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
                                    <p style="margin-top:-20px; text-align:center;" class="separadores" style="text-align: center">V&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>  
                                    <input class="tinywidth" type="number" id="font_size_minute_counter" name="font_size_minute_counter" min="1" value="<?php echo esc_attr($general_options['font_size_minute_counter']);?>"><br><br>
                                    <input class="tinywidth color_input" type="color" id="color_minute_counter" name="color_minute_counter" min="1" value="<?php echo esc_attr($general_options['color_minute_counter']);?>"><br><br>
                                    <select class="tinywidth" id="font_weight_minute_counter" name="font_weight_minute_counter">
                                    <?php for ($i = 100; $i <= 900; $i+=100) { ?>
                                        <option <?php if($i == $general_options['font_weight_minute_counter']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                                        <?php } ?>
                                    </select><br><br>                
                                    <input class="tinywidth" type="text" id="font_family_minute_counter" name="font_family_minute_counter" min="1" value="<?php echo esc_attr($general_options['font_family_minute_counter']);?>">
                                    
                                </td>
                                <td>
                                    <p class="separadores" style="text-align: center">|</p>
                                    <p style="margin-top:-20px; text-align:center;" class="separadores" style="text-align: center">V</p>   
                                    <input class="tinywidth" type="number" id="font_size_second" name="font_size_second" min="1" value="<?php echo esc_attr($general_options['font_size_second']);?>"><br><br>
                                    <input class="tinywidth color_input" type="color" id="color_second" name="color_second" min="1" value="<?php echo esc_attr($general_options['color_second']);?>"><br><br>
                                    <select class="tinywidth" id="font_weight_second" name="font_weight_second">
                                    <?php for ($i = 100; $i <= 900; $i+=100) { ?>
                                        <option <?php if($i == $general_options['font_weight_second']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                                        <?php } ?>
                                    </select><br><br>                
                                    <input class="tinywidth" type="text" id="font_family_second" name="font_family_second" min="1" value="<?php echo esc_attr($general_options['font_family_second']);?>">
                                    
                                </td>
                                <td>
                                    <p class="separadores" style="text-align: center">|&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
                                    <p style="margin-top:-20px; text-align:center;" class="separadores" style="text-align: center">V&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>  
                                    <input class="tinywidth" type="number" id="font_size_second_counter" name="font_size_second_counter" min="1" value="<?php echo esc_attr($general_options['font_size_second_counter']);?>"><br><br>
                                    <input class="tinywidth color_input" type="color" id="color_second_counter" name="color_second_counter" min="1" value="<?php echo esc_attr($general_options['color_second_counter']);?>"><br><br>
                                    <select class="tinywidth" id="font_weight_second_counter" name="font_weight_second_counter">
                                    <?php for ($i = 100; $i <= 900; $i+=100) { ?>
                                        <option <?php if($i == $general_options['font_weight_second_counter']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                                        <?php } ?>
                                    </select><br><br>                
                                    <input class="tinywidth" type="text" id="font_family_second_counter" name="font_family_second_counter" min="1" value="<?php echo esc_attr($general_options['font_family_second_counter']);?>">
                                    
                                </td>
                                <td>
                                    <p class="separadores" style="text-align: center">|</p>
                                    <p style="margin-top:-20px; text-align:center;" class="separadores" style="text-align: center">V</p>   
                                    <input class="tinywidth" type="number" id="font_size_final" name="font_size_final" min="1" value="<?php echo esc_attr($general_options['font_size_final']);?>"><br><br>
                                    <input class="tinywidth color_input" type="color" id="color_final" name="color_final" min="1" value="<?php echo esc_attr($general_options['color_final']);?>"><br><br>
                                    <select class="tinywidth" id="font_weight_final" name="font_weight_final">
                                    <?php for ($i = 100; $i <= 900; $i+=100) { ?>
                                        <option <?php if($i == $general_options['font_weight_final']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                                        <?php } ?>
                                    </select><br><br>                
                                    <input class="tinywidth" type="text" id="font_family_final" name="font_family_final" min="1" value="<?php echo esc_attr($general_options['font_family_final']);?>">
                                    
                                </td>     
                            </tr>        
                        </table>
                    </div>
                    
                    <div id="global_options" class="global_options" >
                        <table align="center">
                            <tr>
                                <td>
                                    <label style="font-weight:bold;" labelfor="font_size_general">Font Size:</label><br>
                                    <input style="" class="" type="number" id="font_size_general" name="font_size_general" min="1" value="<?php echo esc_attr($general_options['font_size_general']);?>">
                                </td>
                                <td>
                                    <label style="font-weight:bold;" labelfor="font_color_general">Font Color:</label><br>
                                    <input class="color_input" style="width:180px; height:31px; margin-top:3px;" type="color" id="font_color_general" name="font_color_general" value="<?php echo esc_attr($general_options['font_color_general']);?>"></input>                        
                                </td>
                                <td>
                                    <label style="font-weight:bold;" labelfor="font_weight_general">Font Weight:</label><br>
                                    <select class="" style="width:180px;" id="font_weight_general" name="font_weight_general">
                                    <?php for ($i = 100; $i <= 900; $i+=100) { ?>
                                        <option <?php if($i == $general_options['font_weight_general']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                                        <?php } ?>
                                    </select>                        
                                </td>
                                <td>
                                    <label style="font-weight:bold;" labelfor="font_family_general">Font Family:</label><br>
                                    <input style="" class="" type="text" id="font_family_general" name="font_family_general" min="1" value="<?php echo esc_attr($general_options['font_family_general']);?>">
                                </td>
                            </tr>            
                        </table>           
                    </div> 
                    
                    <br>
                    <div style="margin-left:10px; margin-bottom:5px;">
                        <label style="font-weight: bold;">Options: </label><br>
                                        <label style="font-weight: 600;">Individual</label>
                                            <label class="switch">
                                                <input type="checkbox" name="individual_global_options" id="individual_global_options">
                                                <span class="slider round"></span>
                                            </label>
                        <label style="font-weight: 600;">Global</label>
                    </div>       
                </div>        
            </div>

            <div id="TextOptions" class="tabcontent">
                <h3>Text Options</h3>
                <br>
                <table>
                    <tr>
                        <td>
                            <label style="font-weight:bold;" labelfor="eb_background_color">Background Color: </label><br>
                            <input class="color_input" style="width: 100%; height: 30px; margin-top:2px" type="color" id="eb_background_color" name="eb_background_color" value="<?php echo esc_attr($general_options['eb_background_color']);?>"></input>
                        </td>
                        <td>
                            <label style="font-weight:bold;" labelfor="eb_left_padding">Left Padding: </label><br>
                            <input type="number" id="eb_left_padding" name="eb_left_padding" value="<?php echo esc_attr($general_options['eb_left_padding']);?>"></input>
                        </td>
                        <td>
                            <label style="font-weight:bold;" labelfor="eb_top_padding">Top Padding: </label><br>
                            <input type="number" id="eb_top_padding" name="eb_top_padding" value="<?php echo esc_attr($general_options['eb_top_padding']);?>"></input>
                        </td>
                        <td>
                            <label style="font-weight:bold;" labelfor="eb_right_padding">Right Padding: </label><br>
                            <input type="number" id="eb_right_padding" name="eb_right_padding" value="<?php echo esc_attr($general_options['eb_right_padding']);?>"></input>
                        </td>
                        <td>
                            <label style="font-weight:bold;" labelfor="eb_bottom_padding">Bottom Padding: </label><br>
                            <input type="number" id="eb_bottom_padding" name="eb_bottom_padding" value="<?php echo esc_attr($general_options['eb_bottom_padding']);?>"></input>
                        </td>
                        <td>            
                            <label style="font-weight:bold;" labelfor="eb_width">Width: </label><br>
                            <input type="text" id="eb_width" name="eb_width" value="<?php echo esc_attr($general_options['eb_width']);?>"></input>
                        </td>                   
                    </tr>
                    <tr>
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="eb_height">Height: </label><br>
                            <input type="text" id="eb_height" name="eb_height" value="<?php echo esc_attr($general_options['eb_height']);?>"></input>
                        </td>
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="eb_horizontal_align">Text Align: </label><br>
                            <select style="width: 100%;" class="tinywidth" id="eb_horizontal_align" name="eb_horizontal_align">
                            <?php $valores = array("left", "center", "right", "justify"); 
                            for ($i = 0; $i <= 3; $i++) { ?>
                                <option <?php if($valores[$i] == $general_options['eb_horizontal_align']) { echo esc_attr('selected="selected"');};?> value="<?php echo esc_attr($valores[$i]);?>"><?php echo esc_attr($valores[$i]);?></option>
                                <?php }; ?>
                            </select>
                        </td>
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="eb_container_align">Container Align: </label><br>
                            <select style="width: 100%;" class="tinywidth" id="eb_container_align" name="eb_container_align">
                            <?php $valores = array("left", "center", "right"); 
                            for ($i = 0; $i <= 2; $i++) { ?>
                                <option <?php if($valores[$i] == $general_options['eb_container_align']) { echo esc_attr('selected="selected"');};?> value="<?php echo esc_attr($valores[$i]);?>"><?php echo esc_attr($valores[$i]);?></option>
                                <?php }; ?>
                            </select>
                        </td>
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="eb_border_style">Border Style: </label><br>

                            <select style="width: 100%;" class="tinywidth" id="eb_border_style" name="eb_border_style">
                            <?php $valores = array("none", "solid", "dotted", "double", "dashed"); 
                            for ($i = 0; $i <= 4; $i++) { ?>
                                <option <?php if($valores[$i] == $general_options['eb_border_style']) { echo esc_attr('selected="selected"');};?> value="<?php echo esc_attr($valores[$i]);?>"><?php echo esc_attr($valores[$i]);?></option>
                                <?php }; ?>
                            </select>                
                        </td>
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="eb_border_width">Border Width: </label><br>
                            <input type="number" id="eb_border_width" name="eb_border_width" value="<?php echo esc_attr($general_options['eb_border_width']);?>"></input>
                        </td>
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="eb_border_color">Border Color: </label><br>
                            <input class="color_input" style="width: 160px; height: 30px;" type="color" id="eb_border_color" name="eb_border_color" value="<?php echo esc_attr($general_options['eb_border_color']);?>"></input>
                        </td> 
                    </tr>                      
                    <tr>
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="eb_border_radius">Border Radius: </label><br>
                            <input type="number" id="eb_border_radius" name="eb_border_radius" value="<?php echo esc_attr($general_options['eb_border_radius']);?>"></input>
                        </td>    
                        
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="eb_box_shadow_horizontal">Horizontal Shadow: </label><br>
                            <input type="number" name="eb_box_shadow_horizontal" id="eb_box_shadow_horizontal" value="<?php echo esc_attr($general_options['eb_box_shadow_horizontal']);?>"></input>
                        </td> 
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="eb_box_shadow_vertical">Vertial Shadow: </label><br>
                            <input type="number" name="eb_box_shadow_vertical" id="eb_box_shadow_vertical" value="<?php echo esc_attr($general_options['eb_box_shadow_vertical']);?>"></input>
                        </td>  
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="eb_box_shadow_blur">Blur Shadow: </label><br>
                            <input type="number" name="eb_box_shadow_blur" id="eb_box_shadow_blur" value="<?php echo esc_attr($general_options['eb_box_shadow_blur']);?>"></input>
                        </td>  
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="eb_box_shadow_color">Color Shadow: </label><br>
                            <input class="color_input" style="width: 100%; height: 30px; margin-top:2px" type="color" name="eb_box_shadow_color" id="eb_box_shadow_color" value="<?php echo esc_attr($general_options['eb_box_shadow_color']);?>"></input>
                        </td> 

                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="text_text_position">Text Position </label>
                            <select style="width:160px;" class="" id="text_text_position" name="text_text_position">
                            <?php $valores = array("side by side", "vertical"); 
                            for ($i = 0; $i <= 1; $i++) { ?>
                                <option <?php if($valores[$i] == $general_options['text_text_position']) { echo esc_attr('selected="selected"');};?> value="<?php echo esc_attr($valores[$i]);?>"><?php echo esc_attr($valores[$i]);?></option>
                                <?php }; ?>
                            </select>                   
                        </td>       
                    </tr>
                    <tr>
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="text_line_height">Text Height: </label><br>
                            <input class="text_line_height" style="width: 100%; height: 30px; margin-top:2px" type="number" min="0" name="text_line_height" id="text_line_height" value="<?php echo esc_attr($general_options['text_line_height']);?>"></input>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="GoalMesagge" class="tabcontent">
                <h3>Goal Message</h3> 
                <br>
                <label class="switch" style="margin-right: 5px;">
                        <input type="checkbox" name="circles_hide_on_goal" id="circles_hide_on_goal">
                        <span class="chucho round"></span>
                </label> 
                <label style="font-weight: bold; padding-bottom:1px;">Hide Circles</label>
                <br>
                <label class="switch" style="margin-right: 5px;">
                        <input type="checkbox" name="text_hide_on_goal" id="text_hide_on_goal">
                        <span class="chucho round"></span>
                </label> 
                <label style="font-weight: bold; padding-bottom:1px;">Hide Text</label>
                <table>
                    <tr>
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="goal_message">Goal Message Text: </label><br>
                            <input class="" style="" type="text" name="goal_message" id="goal_message" value="<?php echo esc_attr($general_options['goal_message']);?>"></input>
                        </td> 
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="goal_message_font_size">Font Size: </label><br>
                            <input class="" style="" type="number" min="1" name="goal_message_font_size" id="goal_message_font_size" value="<?php echo esc_attr($general_options['goal_message_font_size']);?>"></input>
                        </td> 
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="goal_message_font_color">Font Color: </label><br>
                            <input class="color_input" style="width:100%; height:32px;" type="color" name="goal_message_font_color" id="goal_message_font_color" value="<?php echo esc_attr($general_options['goal_message_font_color']);?>"></input>
                            
                        </td> 
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="goal_message_font_weight">Font Weight: </label><br>
                            
                            <select class="" style="width:100%;" id="goal_message_font_weight" name="goal_message_font_weight">
                            <?php for ($i = 100; $i <= 900; $i+=100) { ?>
                                <option <?php if($i == $general_options['goal_message_font_weight']) { echo esc_attr('selected="selected"');} ?> value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
                                <?php } ?>
                            </select> 
                            
                            
                        </td> 
                        <td>
                            <br>
                            <label style="font-weight:bold;" labelfor="goal_message_font_family">Font Family: </label><br>
                            <input class="" style="" type="text" name="goal_message_font_family" id="goal_message_font_family" value="<?php echo esc_attr($general_options['goal_message_font_family']);?>"></input>
                        </td>   

                        <td>
                        <br>
                        <label style="font-weight:bold;" labelfor="goal_message_text_align">Text Align: </label><br>
                            <select style="width: 100%;" class="" id="goal_message_text_align" name="goal_message_text_align">
                            <?php $valores = array("left", "center", "right"); 
                            for ($i = 0; $i <= 2; $i++) { ?>
                                <option <?php if($valores[$i] == $general_options['goal_message_text_align']) { echo esc_attr('selected="selected"');};?> value="<?php echo esc_attr($valores[$i]);?>"><?php echo esc_attr($valores[$i]);?></option>
                                <?php }; ?>
                            </select>
                        </td>
                        <td> 
                            <br>
                            <label style="font-weight:bold;" labelfor="goal_message_top_margin">Top Margin: </label><br>
                            <input class="" style="" type="number" name="goal_message_top_margin" id="goal_message_top_margin" value="<?php echo esc_attr($general_options['goal_message_top_margin']);?>"></input><br>
                            <!-- <p style="font-style:italic; font-size:12px; margin-top: -2px;">*only apply to "Below Timer"<br> option</p> -->
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            <label style="font-weight: bold;">Goal Message:</label><br>
                            <label style="font-weight: 600;">Below Timer</label>
                                <label class="switch">
                                    <input type="checkbox" name="goal_message_pos" id="goal_message_pos">
                                    <span class="slider round"></span>
                                </label>
                            <label style="font-weight: 600;">Replace Timer</label>
                        </td>
                    </tr>
                </table>
                <br>                
            </div>    

            <table width="100%">
                <tr>
                    <td style="padding-right:20px;">
                        <label style="font-weight: bold;">Switch Color Input:</label><br>
                        <label style="font-weight: 600;">Hex</label>
                            <label class="switch">
                                <input type="checkbox" name="color_input_hex" id="color_input_hex">
                                <span class="slider round"></span>
                            </label>
                        <label style="font-weight: 600;">Color</label>
                    </td>
                    <td style="text-align: right; margin-top: 10px; padding-right: 10px;">
                        <div style="margin: 0 auto;">
                            <input style="width:100px;" class="button button-primary" type="submit" name="enviando" value="Apply">
                        </div>
                    </td>                 
                </tr>
            </table>        
            <input name="tabs_default_section" id="tabs_default_section" type="text" style="display: none;" value=""></input>
        </form>
    </div>
    
    <script>
        jQuery(function()
        {   
                var time_client = new Date(jQuery.now());
                if("<?php echo esc_attr($general_options['type_goal']);?>" == "checked"){

                    var d = "<?php echo esc_textarea(current_time('mysql'));?>";            
                    var time_server = new Date(d.replace(/-/g, '/'));
                    var date_objetive = new Date("<?php echo esc_textarea(current_time('mysql'));?>");            
                    

                    date_objetive.setSeconds(time_server.getSeconds() + time_opcional);                      
                    
                }
                else {        
                    var d = "<?php echo esc_textarea(current_time('mysql'));?>";            
                    var time_server = new Date(d.replace(/-/g, '/'));
                    var date_objetive = new Date(<?php echo esc_attr($general_options['objetive_year']); ?>,
                                                <?php echo esc_attr($general_options['objetive_month'] - 1);?>,
                                                <?php echo esc_attr($general_options['objetive_day']); ?>,
                                                <?php echo esc_attr($general_options['objetive_hour']); ?>,
                                                <?php echo esc_attr($general_options['objetive_minute']); ?>,
                                                <?php echo esc_attr($general_options['objetive_second']); ?>
                                                ); 
                };

                var time = (date_objetive - time_server)/1000;
                
                // Color Input (Color or Hex)
                var pos2 = false;
                if("<?php echo esc_attr($general_options['color_input_hex']);?>" == "checked") {
                    jQuery('.color_input').prop('type', 'color');
                    jQuery('#color_input_hex').prop("checked", true);
                    pos2 = true;
                }
                else {
                    jQuery('.color_input').prop('type', 'text');
                    jQuery('#color_input_hex').prop("checked", false);
                    pos2 = false;
                };

                jQuery('#color_input_hex').click(function() {
                    if(pos2 == true) {
                        jQuery('.color_input').prop('type', 'text');
                        jQuery('#color_input_hex').prop("checked", false);
                        pos2 = false;                
                    }
                    else {
                        jQuery('.color_input').prop('type', 'color');
                        jQuery('#color_input_hex').prop("checked", true);
                        pos2 = true;                
                    };     
                });

                //Show Text 
                if("<?php echo esc_attr($general_options['show_text_input']);?>" == "checked") {            
                    jQuery('#show_text_input').prop("checked", true); 
                    jQuery('.entire_block').css({"display":""});           
                }
                else {            
                    jQuery('#show_text_input').prop("checked", false);
                    jQuery('.entire_block').css({"display":"none"});            
                }; 
                
                //Show Circles            
                if("<?php echo esc_attr($general_options['show_circles']);?>" == "checked") {            
                    jQuery('#show_circles').prop("checked", true); 
                    jQuery('#show_circles_div').css({"display":""});           
                }
                else {            
                    jQuery('#show_circles').prop("checked", false);
                    jQuery('#show_circles_div').css({"display":"none"});            
                }; 
                
                //Hide Text in Mobile                     
                if("<?php echo esc_attr($general_options['hide_text_on_mobile']);?>" == "checked") {  
                    
                    jQuery('#hide_text_on_mobile').prop("checked", true); 
                    jQuery('.entire_block').append('<style type="text/css">@media screen and (max-width: 480px){ .entire_block { display: none}}</style>');
                            
                }
                else {   
                    jQuery('#hide_text_on_mobile').prop("checked", false);
                    jQuery('.entire_block').append('<style type="text/css">@media screen and (max-width: 480px){ .entire_block { display: }}</style>');
                            
                };

                //Hide Circles in Mobile                     
                if("<?php echo esc_attr($general_options['hide_circles_mobile']);?>" == "checked") {  
                    
                    jQuery('#hide_circles_mobile').prop("checked", true); 
                    jQuery('.show_circles_div').append('<style type="text/css">@media screen and (max-width: 480px){ .show_circles_div { display: none}}</style>');
                            
                }
                else {   
                    jQuery('#hide_circles_mobile').prop("checked", false);
                    jQuery('.show_circles_div').append('<style type="text/css">@media screen and (max-width: 480px){ .show_circles_div { display: }}</style>');
                            
                };  

                //Show Circles Sections
                if("<?php echo esc_attr($general_options['circles_years_section']);?>" == "none")                
                    {jQuery('#circles_years_section').prop("checked", true);}         
                else {   
                    jQuery('#circles_years_section').prop("checked", false);
                };
                
                if("<?php echo esc_attr($general_options['circles_months_section']);?>" == "none")                
                    {jQuery('#circles_months_section').prop("checked", true);}         
                else {   
                    jQuery('#circles_months_section').prop("checked", false);
                };

                if("<?php echo esc_attr($general_options['circles_days_section']);?>" == "none")                
                    {jQuery('#circles_days_section').prop("checked", true);}         
                else {   
                    jQuery('#circles_days_section').prop("checked", false);
                };
                
                if("<?php echo esc_attr($general_options['circles_hours_section']);?>" == "none")                
                    {jQuery('#circles_hours_section').prop("checked", true);}         
                else {   
                    jQuery('#circles_hours_section').prop("checked", false);
                };

                if("<?php echo esc_attr($general_options['circles_minutes_section']);?>" == "none")                
                    {jQuery('#circles_minutes_section').prop("checked", true);}         
                else {   
                    jQuery('#circles_minutes_section').prop("checked", false);
                };

                if("<?php echo esc_attr($general_options['circles_seconds_section']);?>" == "none")                
                    {jQuery('#circles_seconds_section').prop("checked", true);}         
                else {   
                    jQuery('#circles_seconds_section').prop("checked", false);
                };

                //Individual Global Options
                if("<?php echo esc_attr($general_options['individual_global_options']);?>" == "checked") {            
                    jQuery('#individual_global_options').prop("checked", true);            
                }
                else {            
                    jQuery('#individual_global_options').prop("checked", false);            
                };

                //Show Circles            
                if("<?php echo esc_attr($general_options['circles_hide_on_goal']);?>" == "checked") {            
                            jQuery('#circles_hide_on_goal').prop("checked", true); 
                                    
                        }
                else {            
                    jQuery('#circles_hide_on_goal').prop("checked", false);
                            
                }; 

                //Show text            
                if("<?php echo esc_attr($general_options['text_hide_on_goal']);?>" == "checked") {            
                            jQuery('#text_hide_on_goal').prop("checked", true); 
                                    
                        }
                else {            
                    jQuery('#text_hide_on_goal').prop("checked", false);
                            
                }; 
                
                //Goal Message Pos
                if("<?php echo esc_attr($general_options['goal_message_pos']);?>" == "checked") {            
                    jQuery('#goal_message_pos').prop("checked", true);            
                }
                else {            
                    jQuery('#goal_message_pos').prop("checked", false);            
                };

                var pos = false;
                if("<?php echo esc_attr($general_options['type_goal']);?>" == "checked") {
                    jQuery('#classic_entry').css({"display":"none"});
                    jQuery('#optional_entry').css({"display":""});
                    jQuery('#type_goal').prop("checked", true);
                    pos = true;
                }
                else {
                    jQuery('#classic_entry').css({"display":""});
                    jQuery('#optional_entry').css({"display":"none"});
                    jQuery('#type_goal').prop("checked", false);
                    pos = false;
                };
                
                
                jQuery('#type_goal').click(function() {
                    if(pos == true) {
                        jQuery('#classic_entry').css({"display":""});
                        jQuery('#optional_entry').css({"display":"none"});
                        jQuery('#type_goal').prop("checked", false);
                        pos = false;                
                    }
                    else {
                        jQuery('#classic_entry').css({"display":"none"});
                        jQuery('#optional_entry').css({"display":""});
                        jQuery('#type_goal').prop("checked", true);
                        pos = true;                
                    };     
                });
                
                if("<?php echo esc_attr($general_options['type_goal']);?>" == "checked"){
                    time = time_opcional;
                };

                if("<?php echo esc_attr($general_options['individual_global_options']);?>" == "checked") {
                    jQuery('#individual_options').css({"display":"none"});
                    jQuery('#global_options').css({"display":""});
                }
                else {
                    jQuery('#individual_options').css({"display":""});
                    jQuery('#global_options').css({"display":"none"});
                }

                var trans = "<?php if($general_options['circles_movement'] == 'smooth') {echo "1s linear all";} else {echo "0s linear all";};?>";
                var trans2 = "<?php if($general_options['circles_backward_movement'] == 'smooth') {echo "1s linear all";} else {echo "0s linear all";};?>";
                
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
                            jQuery('.goal_message_2').html("<?php echo esc_attr($general_options['goal_message']); ?>");
                        }
                        else {               

                            jQuery('.timer_block').css({"display":"none"});
                            jQuery('.goal_message').html("<?php echo esc_attr($general_options['goal_message']); ?>");
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
                    
                    jQuery('.TimeServer').html("SERVER TIME: " + time_server.getFullYear() + " / " + (time_server.getMonth()+1) + " / " + time_server.getDate() + " | " + time_server.getHours() + ":" + time_server.getMinutes() + ":" + time_server.getSeconds());
                    
                    time_server.setSeconds(time_server.getSeconds() + 1);
                                                   
                    if(seconds == 59) {                    
                        jQuery('#base-timer-path-remaining-seconds').css({"transition": trans2});                    
                        document.getElementById("base-timer-path-remaining-seconds").setAttribute("stroke-dasharray", + "220" + " 220");                    
                    }else {
                        jQuery('#base-timer-path-remaining-seconds').css({"transition": trans});                    
                        document.getElementById("base-timer-path-remaining-seconds").setAttribute("stroke-dasharray", + calcular_rotation(seconds, 'segundos') + " 220");
                        
                    }
                    

                    if(minutes == 59) {                    
                        jQuery('#base-timer-path-remaining-minutes').css({"transition": trans2});                    
                        document.getElementById("base-timer-path-remaining-minutes").setAttribute("stroke-dasharray", + "220" + " 220");                    
                    }else {
                        jQuery('#base-timer-path-remaining-minutes').css({"transition": trans});                    
                        document.getElementById("base-timer-path-remaining-minutes").setAttribute("stroke-dasharray", + calcular_rotation(minutes, 'minutos') + " 220");                    
                    }

                    if(hours == 23) {                    
                        jQuery('#base-timer-path-remaining-hours').css({"transition": trans2});                    
                        document.getElementById("base-timer-path-remaining-hours").setAttribute("stroke-dasharray", + "220" + " 220");                    
                    }else {
                        jQuery('#base-timer-path-remaining-hours').css({"transition": trans});                    
                        document.getElementById("base-timer-path-remaining-hours").setAttribute("stroke-dasharray", + calcular_rotation(hours, 'horas') + " 220");                    
                    }

                    if(days == 29) {                    
                        jQuery('#base-timer-path-remaining-days').css({"transition": trans2});                    
                        document.getElementById("base-timer-path-remaining-days").setAttribute("stroke-dasharray", + "220" + " 220");                    
                    }else {
                        jQuery('#base-timer-path-remaining-days').css({"transition": trans});                    
                        document.getElementById("base-timer-path-remaining-days").setAttribute("stroke-dasharray", + calcular_rotation(days, 'dias') + " 220");                    
                    }

                    if(months == 11) {                    
                        jQuery('#base-timer-path-remaining-months').css({"transition": trans2});                    
                        document.getElementById("base-timer-path-remaining-months").setAttribute("stroke-dasharray", + "220" + " 220");                    
                    }else {
                        jQuery('#base-timer-path-remaining-months').css({"transition": trans});                    
                        document.getElementById("base-timer-path-remaining-months").setAttribute("stroke-dasharray", + calcular_rotation(months, 'meses') + " 220");                    
                    }

                    if(years == 9) {                    
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
                jQuery('.salida_years').css({"font-size":"<?php echo esc_attr($general_options['font_size_year'] .'px'); ?>"});
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

                if("<?php echo esc_attr($error);?>" != '') {
                    jQuery('#'+'<?php echo esc_attr($error);?>').css({"display":""});
                }            

                var position = true;

                function stop_interval()
                {
                    clearInterval(Intervalo);
                }
                
                //Space Between
                var active_sections = <?php echo json_encode($active_sections); ?>;
                var space_between = <?php echo json_encode($space_between); ?>;
                var cont2 = 0;
                for(var cont = 0; cont < active_sections.length; cont++)
                {
                    jQuery('#'+ active_sections[cont]).css({"margin-left":"" + space_between[cont2] + "px"});
                    cont2++;
                    jQuery('#'+ active_sections[cont]).css({"margin-right":"" + space_between[cont2] + "px"});
                    cont2++;
                }

                var Intervalo = setInterval(calcular_tiempo, 1000);  

                //Tipo de Separador
                jQuery("#boton01").click(function () {	 
                tipo_separador = (jQuery('input:text[name=separadores]').val());
                //Reemplazado "espacios vacios" "&nbsp"
                tipo_separador = tipo_separador.replace(/ /g, "&nbsp");

                }); 

                //Javascript file
                jQuery("#boton02").click(function () {
                    $.post('my_ajax_receiver.php', 'val=' + jQuery(this).val(), function (response) {
                    alert(response);
                });
            });       
        });

        //Tabbed Content
        function seccion(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
            jQuery('#tabs_default_section').prop("value", cityName);
        }

        document.getElementById("<?php echo esc_attr($general_options['tabs_default_section']);?>" + "_button").click();
    </script>
</body>

