<?php
/**
 * Created by PhpStorm.
 * User: kosala
 * Date: 4/9/2017
 * Time: 8:42 AM
 */

class Registerpatient extends CI_Model{

    public function ___construct(){
        parent::__construct();

    }

    public function register_patient($pid,$name,$age,$dob,$tel,$lan,$gen,$sch,$addr,$gur,$rel,$ref,$pass,$div,$date){
        $data = array(
            'patient_id'=>$pid,
            'password'=>$pass,
            'user_name'=>$name,
            'regitration_date'=>$date,
            'address'=>$addr,
            'gender'=>$gen,
            'age'=>$age,
            'dob'=>$dob,
            'guardian_name'=>$gur,
            'telephone'=>$tel,
            'relationship'=>$rel,
            'language'=>$lan,
            'refered_by'=>$ref,
            'school'=>$sch,
            'division'=>$div
        );

        return $this->db->insert('patient_register',$data);


    }



}