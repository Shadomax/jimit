<?php defined('SYSPATH') or die('No no direct script access');
/**
* 
*/
class Model_Pagefr extends ORM
{
  public $_table_name = 'pages_fr';

  public function getPicture()
  {
      if (empty($this->photo)) {
        return "http://placehold.it/100x100";
      } else {
        return url::base().'media/uploads/pages/'.$this->photo;
      }
  }

  public static function validatePhoto($data)
  {
    return Validation::factory($data)
        ->rule('file', 'Upload::not_empty')
      ->rule('file', 'Upload::size', array(':value', '4M'))
      ->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
      ->rule('file', 'Upload::valid');
  }

  public function addPage($data)
  {
    $this->title = $data['title'];
    $this->content = $data['content'];
    $this->seo_title = $data['seo_title'];
    $this->seo_description = $data['seo_description'];
    $this->seo_keywords = $data['seo_keywords'];
    $this->youtube_link = $data['location'];
    $this->deleted = 'false';
    $this->datetime = time();
    $this->save();
  }

  //add photos to the page table
  public function addPhoto($data)
  {
    $this->photo = $data;
    $this->save();
  }

} //End Page Model