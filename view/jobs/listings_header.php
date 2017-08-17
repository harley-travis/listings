<?php

						// get the database files
						require_once  __DIR__ . "/../../../model/database.php";
						require_once  __DIR__ . "/../../../model/jobs.php";

						// define the url for the jobs link
						define("JOB_URL", "https://careers.whitejuly.com/profile/Bluth Houses/jobs/");

						// call the jobs 
						$jobs = Jobs::get_jobs_by_company_name(Bluth Houses);

					?>