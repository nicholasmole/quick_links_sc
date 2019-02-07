<?php

namespace NMole\QLSC;

class Helpers {

  //Returns Template path for emails : Thx James
  public static function get_template_path($template_filename, $directory_path = "templates") {

    $templates_path = plugin_dir_path(dirname(__FILE__)) . $directory_path;
    $template_path = "$templates_path/$template_filename";
    return $template_path;

  }

}