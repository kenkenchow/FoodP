<?php

class Convert {

	public $data;
	public $sort_order = 'asc';
    public $sort_key = 'name2';

    public function __construct($file)
    {
		$text = file_get_contents($file);
		$lines = preg_split("/\n/",$text);
		$tem_a = array();
		foreach($lines as $line){
			$d = preg_split("/\t/",$line);
			array_push($tem_a, array('code' => $d[0], 'name' => $d[1]));
		}
		$this->data = $tem_a;

    }


	public function sortByKey() {
		$names = array();
        foreach ($this->data as $data) {    $names[] = $data['name'];  }
		array_multisort($names, SORT_ASC, $this->data);
    }



}


?>
