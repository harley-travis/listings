<?php 

class Jobs{
	
	private $job_id, $jobTitle, $description, $qualifications, $additionalInformation, $salary, $location, $department;
	
	public function __construct($jobTitle, $description, $qualifications, $additionalInformation, $salary, $location, $department){
		$this->jobTitle = $jobTitle;
		$this->description = $description;
		$this->qualifications = $qualifications;
		$this->additionalInformation - $additionalInformation;
		$this->salary = $salary;
		$this->location = $location;
		$this->department = $department;
	}
	
	public function getJobID(){
		return $this->job_id;
	}
	
	public function setJobID($value){
		$this->job_id = $value;
	}
	
	public function getJobTitle(){
		return $this->jobTitle;
	}
	
	public function setJobTitle($value){
		$this->jobTitle = $value;
	}
	
	public function getDescription(){
		return $this->description;
	}
	
	public function setDescription($value){
		$this->description = $value;
	}
	
	public function getQualifications(){
		return $this->qualifications;
	}
	
	public function setQualifications($value){
		$this->qualifications = $value;
	}
	
	public function getAdditionalInformation(){
		return $this->additionalInformation;
	}
	
	public function setAdditionalInformation($value){
		$this->additionalInformation = $value;
	}
	
	public function getSalary(){
		return $this->salary;
	}
	
	public function setSalary($value){
		$this->salary = $value;
	}
	
	public function getLocation(){
		return $this->location;
	}
	
	public function setLocation($value){
		$this->location = $value;
	}
	
	public function getDepartment(){
		return $this->location;
	}
	
	public function setDepartment($value){
		$this->location = $value;
	}
	
	public static function get_all_jobs(){
		$db = Database::getDB();

		$query = 'SELECT * FROM jobs';
		$statement = $db->prepare($query);
		//$statement->bindValue(':user_id', $user_id);
		$statement->execute();
		$jobs = $statement->fetchAll();
		$statement->closeCursor();

		return $jobs;    
	}

	public static function get_job_by_id(){
		$db = Database::getDB();
	}

	public static function add_job($newJob){
		$db = Database::getDB();

		$job_title = $newJob->getJobTitle();
		$description = $newJob->getDescription();
		$qualifications = $newJob->getQualifications();
		$add_info = $newJob->getAdditionalInformation();
		$salary = $newJob->getSalary();
		$location = $newJob->getLocation();
		$dept = $newJob->getDepartment();

		print_r($newJob);

		$query = "INSERT INTO jobs
				(job_title, description, qualifications, add_info, salary, location, dept)
				VALUES
				(:job_title, :description, :qualifications, :add_info, :salary, :location, :dept)";

		$statement = $db->prepare($query);
		$statement->bindValue(':job_title', $job_title);
		$statement->bindValue(':description', $description);
		$statement->bindValue(':qualifications', $qualifications);
		$statement->bindValue(':add_info', $add_info);
		$statement->bindValue(':salary', $salary);
		$statement->bindValue(':location', $location);
		$statement->bindValue(':dept', $dept);
		$statement->execute();
		$statement->closeCursor();

	}


	public static function edit_job(){
		$db = Database::getDB();
	}

	public static function delete_job(){
		$db = Database::getDB();
	}

}


?>