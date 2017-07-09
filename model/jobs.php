<?php 

class Jobs{
	
	private $job_id, $jobTitle, $description, $qualifications, $add_info, $salary, $location, $department;
	
	public function __construct($jobTitle, $description, $qualifications, $add_info, $salary, $location, $department){
		$this->jobTitle = $jobTitle;
		$this->description = $description;
		$this->qualifications = $qualifications;
		$this->add_info = $add_info;
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
	
	public function getAdd_info(){
		return $this->add_info;
	}
	
	public function setAdd_info($value){
		$this->add_info = $value;
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
		return $this->department;
	}
	
	public function setDepartment($value){
		$this->department = $value;
	}
	
	public static function get_all_jobs(){
		$db = Database::getDB();

		$query = 'SELECT * FROM jobs';
		$statement = $db->prepare($query);
		$statement->execute();
		$jobs = $statement->fetchAll();
		$statement->closeCursor();

		return $jobs;    
	}

	public static function add_job($newJob){
		$db = Database::getDB();

		// pull the objects and put them in variables
		$job_title = $newJob->getJobTitle();
		$description = $newJob->getDescription();
		$qualifications = $newJob->getQualifications();
		$add_info = $newJob->getAdd_info();
		$salary = $newJob->getSalary();
		$location = $newJob->getLocation();
		$dept = $newJob->getDepartment();

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
	
	public static function get_job_by_id($job_id){
		$db = Database::getDB();
		
		$query = 'SELECT * FROM jobs
				  WHERE job_id = :job_id';
		$statement = $db->prepare($query);
		$statement->bindValue(":job_id", $job_id);
		$statement->execute();
		$band = $statement->fetch();
		$statement->closeCursor();
		return $job;
		
	}

	public static function edit_job($job_id, $jobTitle, $description, $qualifications, $add_info, $salary, $location, $department){
		$db = Database::getDB();
		
		$query = 'UPDATE jobs
				  SET job_id           = :job_id,
					  job_title        = :job_title,
					  description      = :description,
					  qualifications   = :qualifications,
					  add_info   	   = :add_info,
					  salary           = :salary,
					  location         = :location,
					  dept             = :dept
				  WHERE job_id         = :job_id';
		$statement = $db->prepare($query);
		$statement->bindValue(':job_id', $job_id);
		$statement->bindValue(':job_title', $jobTitle);
		$statement->bindValue(':description', $description);
		$statement->bindValue(':qualifications', $qualifications);
		$statement->bindValue(':add_info', $add_info);
		$statement->bindValue(':salary', $salary);
		$statement->bindValue(':location', $location);
		$statement->bindValue(':dept', $department);
		$statement->execute();
		$statement->closeCursor();
		
	}

	public static function delete_job($job_id){
		$db = Database::getDB();
		
		$query = 'DELETE FROM jobs
				  WHERE job_id = :job_id';
		$statement = $db->prepare($query);
		$statement->bindValue(':job_id', $job_id);
		$statement->execute();
		$statement->closeCursor();
	
	}

}


?>