<?php
class controller
{
   //   protected $load = array();
   //   public function __construct(){
   //      $this->load = new Load();
   //   }
   public function model($model)
   {
      require_once "./mvc/models/" . $model . ".php";
      return new $model();
   }

   //gọi dell
   public function view($view, $data = null)
   {
      require_once "./mvc/views/" . $view . ".php";
   }

   public function alert($message)
   {
      echo '<script>alert("' . $message . '")</script>';
   }
   public function href($href)
   {
      echo '<script>location.replace("' . $href . '")</script>';
   }
   public function prev()
   {
      echo '<script>location.replace(document.referrer)</script>';
   }
   public function uploadFile($file, $folder)
   {
      $name = null;
      $target_dir = __DIR__ . "/../../public/image/$folder/";
      $target_file = $target_dir . basename($file["name"]);
      if (move_uploaded_file($file['tmp_name'], $target_file)) {
         $name = basename($file["name"]);
      }
      return $name;
   }
}
