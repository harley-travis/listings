<?php 

class Jobs{
	
	private $job_id, $jobTitle, $description, $qualifications, $add_info, $salary, $location, $duration, $department;
	
	public function __construct($jobTitle, $description, $qualifications, $add_info, $salary, $location, $duration, $department){
		$this->jobTitle = $jobTitle;
		$this->description = $description;
		$this->qualifications = $qualifications;
		$this->add_info = $add_info;
		$this->salary = $salary;
		$this->location = $location;
		$this->department = $department;
		$this->duration = $duration;
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
	
	public function getDuration(){
		return $this->duration;
	}
	
	public function setDuration($value){
		$this->duration = $value;
	}
	
	public static function get_all_jobs($company_id){
		$db = Database::getDB();

		$query = 'SELECT * FROM jobs 
				  WHERE is_active=0
				  AND company_id = :company_id
				  ORDER BY date DESC';
		$statement = $db->prepare($query);
		$statement->bindValue(':company_id', $company_id);
		$statement->execute();
		$jobs = $statement->fetchAll();
		$statement->closeCursor();

		return $jobs;    
	}
	
	public static function get_recent_jobs_by_company($company_id){
		$db = Database::getDB();

		$query = 'SELECT * FROM jobs 
				  WHERE is_active=0
				  AND company_id = :company_id
				  ORDER BY date DESC
				  LIMIT 10';
		
		$statement = $db->prepare($query);
		$statement->bindValue(':company_id', $company_id);
		$statement->execute();
		$jobs = $statement->fetchAll();
		$statement->closeCursor();

		return $jobs; 
	}
	
	public static function get_recent_jobs($company_id){
		$db = Database::getDB();

		$query = 'SELECT * FROM jobs 
				  WHERE is_active=0
				  AND company_id = :company_id
				  ORDER BY date DESC
				  LIMIT 10';
		$statement = $db->prepare($query);
		$statement->bindValue(':company_id', $company_id);
		$statement->execute();
		$jobs = $statement->fetchAll();
		$statement->closeCursor();

		return $jobs;    
	}
	
	public static function get_all_archive_jobs($company_id){
		$db = Database::getDB();

		$query = 'SELECT * FROM jobs 
		          WHERE is_active=1
				  AND company_id = :company_id';
		$statement = $db->prepare($query);
		$statement->bindValue(':company_id', $company_id);
		$statement->execute();
		$jobs = $statement->fetchAll();
		$statement->closeCursor();

		return $jobs;    
	}

	// used for the OOP up above
	// not using this anymore this is old and a pain to handle
	public static function add_job($newJob, $company_id){
		$db = Database::getDB();

		// pull the objects and put them in variables
		$job_title = $newJob->getJobTitle();
		$description = $newJob->getDescription();
		$qualifications = $newJob->getQualifications();
		$add_info = $newJob->getAdd_info();
		$salary = $newJob->getSalary();
		$location = $newJob->getLocation();
		$dept = $newJob->getDepartment();
		$duration = $newJob->getDuration();
		
		$timestamp = date("Y-m-d H:i:s A");

		$query = "INSERT INTO jobs
				(job_title, description, qualifications, add_info, salary, location, duration, dept, company_id, date)
				VALUES
				(:job_title, :description, :qualifications, :add_info, :salary, :location, :duration, :dept, :company_id, :date)";

		$statement = $db->prepare($query);
		$statement->bindValue(':job_title', $job_title);
		$statement->bindValue(':description', $description);
		$statement->bindValue(':qualifications', $qualifications);
		$statement->bindValue(':add_info', $add_info);
		$statement->bindValue(':salary', $salary);
		$statement->bindValue(':location', $location);
		$statement->bindValue(':duration', $duration);
		$statement->bindValue(':dept', $dept);
		$statement->bindValue(':company_id', $company_id);
		$statement->bindValue(':date', $timestamp);
		$statement->execute();
		$statement->closeCursor();

	}
	
	public static function add_the_job($jobTitle, $description, $qualifications, $add_info, $salary, $location, $duration, $compensation, $department, $company_id){
		$db = Database::getDB();
		
		$timestamp = date("Y-m-d H:i:s A");

		$query = "INSERT INTO jobs
				(job_title, description, qualifications, add_info, salary, location, duration, compensation, dept, company_id, date)
				VALUES
				(:job_title, :description, :qualifications, :add_info, :salary, :location, :duration, :compensation, :dept, :company_id, :date)";

		$statement = $db->prepare($query);
		$statement->bindValue(':job_title', $jobTitle);
		$statement->bindValue(':description', $description);
		$statement->bindValue(':qualifications', $qualifications);
		$statement->bindValue(':add_info', $add_info);
		$statement->bindValue(':salary', $salary);
		$statement->bindValue(':location', $location);
		$statement->bindValue(':duration', $duration);
		$statement->bindValue(':compensation', $compensation);
		$statement->bindValue(':dept', $department);
		$statement->bindValue(':company_id', $company_id);
		$statement->bindValue(':date', $timestamp);
		$statement->execute();
		$statement->closeCursor();

	}
	
	public static function get_job_by_id($job_id, $company_id){
		$db = Database::getDB();
		
		$query = 'SELECT * FROM jobs
				  WHERE job_id = :job_id
				  AND company_id = :company_id';
		$statement = $db->prepare($query);
		$statement->bindValue(":job_id", $job_id);
		$statement->bindValue(":company_id", $company_id);
		$statement->execute();
		$job = $statement->fetch();
		$statement->closeCursor();
		return $job;
		
	}

	public static function edit_job($job_id, $jobTitle, $description, $qualifications, $add_info, $salary, $location, $department, $company_id){
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
				  WHERE job_id         = :job_id
				  AND company_id	   = :company_id';
		$statement = $db->prepare($query);
		$statement->bindValue(':job_id', $job_id);
		$statement->bindValue(':job_title', $jobTitle);
		$statement->bindValue(':description', $description);
		$statement->bindValue(':qualifications', $qualifications);
		$statement->bindValue(':add_info', $add_info);
		$statement->bindValue(':salary', $salary);
		$statement->bindValue(':location', $location);
		$statement->bindValue(':dept', $department);
		$statement->bindValue(':company_id', $company_id);
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
	
	// move the job to the archived page
	public function marked_archived($job_id){
		$db = Database::getDB();

		$query = 'UPDATE jobs
		  SET is_active  = 1
		  WHERE job_id   = :job_id';

		$statement = $db->prepare($query);
		$statement->bindValue(':job_id', $job_id);
		$statement->execute();
		$statement->closeCursor();
		
	}
		
	// move mulitple jobs to the archived page
	public function marked_many_archived($marked){
		$db = Database::getDB();

		// foreach loop
		foreach($marked as $mark){

			$query = 'UPDATE jobs
			  SET is_active		   = 1
			  WHERE job_id   = :job_id';

			$statement = $db->prepare($query);
			$statement->bindValue(':job_id', $mark);
			$statement->execute();
			$statement->closeCursor();
		}
		
	}
	
	// move the job to the archived page
	public function marked_active($job_id){
		$db = Database::getDB();

		$query = 'UPDATE jobs
		  SET is_active  = 0
		  WHERE job_id   = :job_id';

		$statement = $db->prepare($query);
		$statement->bindValue(':job_id', $job_id);
		$statement->execute();
		$statement->closeCursor();
		
	}
	
	// move mulitple jobs to the archived page
	public function marked_many_active($marked){
		$db = Database::getDB();

		// foreach loop
		foreach($marked as $mark){

			$query = 'UPDATE jobs
			  SET is_active		   = 0
			  WHERE job_id   = :job_id';

			$statement = $db->prepare($query);
			$statement->bindValue(':job_id', $mark);
			$statement->execute();
			$statement->closeCursor();
		}
		
	}
	
	// create jobs file in company dir
	public static function create_listings($ftp_server, $ftp_username, $ftp_userpass, $company_name, $company_id){
		
		
		// login FTP
		$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
		$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

		// url locations for directories that need to be created
		$listingsTemplate = '/home/trahar20/careers.whitejuly.com/profile/_util/listings.php';
		$listings = "/home/trahar20/careers.whitejuly.com/profile/".$company_name."/jobs/listings.php";
		$listingsFile = "/home/trahar20/careers.whitejuly.com/profile/".$company_name."/jobs/listings_header.php";
		
		// create listings header
		$listings_header_file = fopen($listingsFile, "w");
		
		$header = '<?php

						// get the database files
						require_once  __DIR__ . "/../../../model/database.php";
						require_once  __DIR__ . "/../../../model/jobs.php";

						// define the url for the jobs link
						define("JOB_URL", "https://careers.whitejuly.com/profile/'.$company_name.'/jobs/j/");
						define("LOGO_URL", "https://careers.whitejuly.com/profile/'.$company_name.'/logo/logo.png");

						$list_company_id = '.$company_id.';
						
						$jobs = Jobs::get_all_jobs($list_company_id);
						$company = Jobs::get_company_by_name($list_company_id);
						
					?>';
		
		fwrite($listings_header_file, $header);
		fclose($listings_header_file);
		
		// move job template file to company jobs dir		
		copy($listingsTemplate, $listings);

		// close FTP connection
		ftp_close($ftp_conn);	
	
		// create a url for the company
		$listings_url = "https://careers.whitejuly.com/profile/".$company_name."/jobs/listings.php";
		
		return $listings_url;
	}
	
	// locate the company id based on the user_id
	public static function get_company_by_name($company_id){
		$db = Database::getDB();
		
		$query = 'SELECT company_name 
				  FROM company 
				  WHERE company_id = :company_id';
		
		$statement = $db->prepare($query);
		$statement->bindValue(':company_id', $company_id);
		$statement->execute();
		$company = $statement->fetch();
		$companyName = $company[0];
		$statement->closeCursor();
		
		return $companyName;
	}

}


?>