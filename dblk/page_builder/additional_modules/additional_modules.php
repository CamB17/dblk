<?php
// load the correct module based on what's selected
$module = get_sub_field('module');
$string =  'page_builder/' . $module . '/' . $module;
get_sub_field('title');

get_template_part($string);


