<?php
class UploadFile {
	protected $file;
	public function __construct($file) {
		$this->file = $file;
	}

	public function validate() {
    return Validator::make(
    	array('file' => $this->file), 
    	array('file' => 'required|mimes:jpeg,bmp,png')
		);
  }

  public function moveTo($location, $filename) {
  	$this->file->move($location, $filename);
  }
}