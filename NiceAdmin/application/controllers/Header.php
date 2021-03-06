<?php
/**
 * Created by PhpStorm.
 * User: kosala
 * Date: 4/14/2017
 * Time: 8:38 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Header extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){

    }
    public function newpatient(){
        if($this->input->post('pid')) {
            $result = $this->indexmodel->get_new_patients();

                foreach($result as $newpatient){
                    $pati = $newpatient->patient_id;
                    $res = '
                            <li  >
                                    <a id="newpatient'.$pati.'" onclick="patient(\''. $pati . '\')" >
                                        <span class="label label-primary"><i class="icon_profile"></i></span>
                                        '.$newpatient->patient_name.'
                                        <span class="small italic pull-right"></span>
                                    </a>
                                </li>
                    ';
                    echo $res;
                }

        }
    }

    public function count_new_patient(){
        $result = $this->indexmodel->get_new_patients();
        echo count($result);
    }


    public function getSessions(){
        if($this->input->post('daysess')) {
            $result = $this->indexmodel->get_sessions();

                foreach($result as $sessions){
                    $res = '
                            <li  >
                                    <a id="monthsession" >
                                        <span class="label label-danger"><i class="icon_book_alt"></i></span>
                                        '.$sessions->title.' <br/>
                                        '.$sessions->start.'
                                        <span class="small italic pull-right"></span>
                                    </a>
                                </li>
                    ';
                    echo $res;
                }

        }
    }

    public function countSessions(){
        $result = $this->indexmodel->get_sessions();
        echo count($result);
    }

}