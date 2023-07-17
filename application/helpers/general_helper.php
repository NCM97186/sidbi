<?php 
if (!function_exists('generate_captcha')) {

    function generate_captcha($sessionName) {
        //print_r($sessionName);die;
        $CI = get_instance();
        $CI->load->helper('captcha');
        $CI->load->library('session');
        //print_r($CI->session->userdata());die;
        $original_string = array_merge(range(0, 9));
        $original_string = implode("", $original_string);
        $nomBer = substr(str_shuffle($original_string), 0, 6);
       
        $vals = array(
            'word' => $nomBer,
            'img_path' => 'captcha/',
            'img_url' => base_url('captcha'),
            'font_path' => 'assets/fonts/David-Bold.ttf',
            'img_width' => 200,
            'img_height' => 40,
            'font_size' => 16,
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(0, 0, 0),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        $cap = create_captcha($vals);
        $CI->session->set_userdata($sessionName, $cap['word']);
        
        //print_r($CI->session->userdata());
        return $cap['image'];
    }

}

if (!function_exists('validate_captcha')) {

    function validate_captcha($sessionName) {
        $CI = get_instance();
        $CI->load->helper('captcha');
        $CI->load->library('session');
       //print_r($CI->session->userdata());die;
        if ($CI->input->post('captcha', true) != $CI->session->userdata[$sessionName]) {
            $CI->form_validation->set_message('captcha', 'Cpatcha Code is wrong');
            return false;
        } else {
            return true;
        }
    }

}
if (!function_exists('refresh')) {

    function refresh($sessionName) {
        $CI = get_instance();
        $CI->load->helper('captcha');
        $CI->load->library('session');
        $nomBer = rand(100000, 999999);
        $vals = array(
            'word' => $nomBer,
            'img_path' => 'captcha/',
            'img_url' => base_url('captcha'),
            'font_path' => 'assets/fonts/David-Bold.ttf',
            'img_width' => '200',
            'img_height' => 40,
            'font_size' => 16,
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(0, 0, 0),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        $cap = create_captcha($vals);
        $CI->session->unset_userdata($sessionName);
        $CI->session->set_userdata($sessionName, $cap['word']);
        echo $cap['image'];
    }

}