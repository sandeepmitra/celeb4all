<?php

class BWGControllerEditThumb {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function __construct() {
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function execute() {
    $type = (isset($_GET['type']) ? esc_html($_GET['type']) : 'display');
    $edit_type = (isset($_GET['edit_type']) ? esc_html($_GET['edit_type']) : '');
    $image_id = (isset($_GET['image_id']) ? esc_html($_GET['image_id']) : 0);
    $this->display($type);
  }

  public function display($type) {
    require_once WD_BWG_DIR . "/admin/models/BWGModelEditThumb.php";
    $model = new BWGModelEditThumb();
    require_once WD_BWG_DIR . "/admin/views/BWGViewEditThumb.php";
    $view = new BWGViewEditThumb($model);
    $view->$type();
  }

  ////////////////////////////////////////////////////////////////////////////////////////
  // Getters & Setters                                                                  //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Private Methods                                                                    //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Listeners                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
}