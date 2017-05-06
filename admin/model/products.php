<?php

class Band {
    private $bandID, $bandName, $bandPrice, $bandDesc, $bandCategory;

	// the order of the parameters will display the order on the front end
    public function __construct($bandName, $bandPrice, $bandDesc, $bandCategory) {
		$this->band_name = $bandName;
		$this->bandDesc = $bandDesc;
		$this->bandPrice = $bandPrice;
		$this->bandCategory = $bandCategory;
    }
	
	public function getBandID(){
		return $this->bandID;
	}
	
	public function setBandID($value){
		$this->bandID = $value;
	}

	public function getBandName() {
        return $this->band_name;
    }

    public function setBandName($value) {
        $this->band_name = $value;
    }
	
	public function getBandDesc(){
		return $this->bandDesc;
	}
	
	public function setBandDesc($value){
		$this->bandDesc = $value;
	}
	
	public function getBandPrice() {
        return $this->bandPrice;
    }

    public function setBandPrice($value) {
        $this->bandPrice = $value;
    }
	
    public function getBandCategory() {
        return $this->bandCategory;
    }

    public function setBandCategory($value) {
        $this->bandCategory = $value;
    }


}

class Stone {
    private $stoneID, $stoneName, $stonePrice, $stoneDesc, $stoneCategory;

	// the order of the parameters will display the order on the front end
    public function __construct($stoneName, $stonePrice, $stoneDesc, $stoneCategory) {
		$this->stone_name = $stoneName;
		$this->stoneDesc = $stonePrice;
		$this->stonePrice = $stoneDesc;
		$this->stoneCategory = $stoneCategory;
    }
	
	public function getStoneID(){
		return $this->stoneID;
	}
	
	public function setStoneID($value){
		$this->stoneID = $value;
	}

	public function getStoneName() {
        return $this->stone_name;
    }

    public function setStoneName($value) {
        $this->stone_name = $value;
    }
	
	public function getStoneDesc(){
		return $this->stoneDesc;
	}
	
	public function setStoneDesc($value){
		$this->stoneDesc = $value;
	}
	
	public function getStonePrice() {
        return $this->stonePrice;
    }

    public function setStonePrice($value) {
        $this->stonePrice = $value;
    }
	
    public function getStoneCategory() {
        return $this->stoneCategory;
    }

    public function setStoneCategory($value) {
        $this->stoneCategory = $value;
    }


}

?>