<?php

/**
 * Created by PhpStorm.
 * User: BS5083
 * Date: 27/04/2017
 * Time: 00:25
 */
class LanguageLoader{

    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');
        $siteLang = $ci->session->userdata('site_lang');
        if ($siteLang) {
            $ci->lang->load('general',$siteLang);
        } else {
            $ci->lang->load('general','english');
        }
    }
}