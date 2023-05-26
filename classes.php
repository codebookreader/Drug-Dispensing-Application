<?php
class Patient
{
    public $p_id;
    public $first_name;
    public $last_name;
    public $password;
public function login(){

}
public function comment(){
    
}
public function viewPrescription(){

}
}
class Physician
{  public $phys_id;
    public $first_name;
    public $last_name;
    public $password;
private function prescribe(){

}
public function login(){

}
}
class HealthcareProvider extends Physician
{
    public $pr_id;
    public $first_name;
    public $last_name;
    public $password;
    public function login(){

    }
}
class Nurse
{
    public $n_id;
    public $first_name;
    public $last_name;
    public $password;
    public function login(){

    }
    public function prescribe(){

    }
    public function druguseDocumentation(){

    }
    public function assessProblem(){

    }
    public function DrugSuitability(){

    }
    public function DrugExpiration(){

    }
}
class Administrator
{
    public $a_id;
    public $first_name;
    public $last_name;
    public $password;
    public function login(){

    }
    public function editProfile(){

    }
    public function addUser(){

    }
}
class Pharmacist
{
    public $pharm_id;
    public $first_name;
    public $last_name;
    public $password;
    public function login(){

    }
    public function medicationInteraction(){

    }
    public function DrugUsage(){

    }
    public function AllelrgyAssessment(){

    }
    public function assessProblem(){

    }
    public function DrugSuitability(){

    }
    public function DrugExpiration(){

    }
}
class PharmaceuticalCompany
{   private $tradename;
    public $comp_id;
    public $first_name;
    public $last_name;
    public $password;
    public function login(){

    }
    public function editContract(){

    }
    public function addDrug(){

    }
}
?>