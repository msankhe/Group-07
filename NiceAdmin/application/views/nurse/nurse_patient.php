<?php
        if (isset($this->session->userdata['logged_in'])) // Check if user has logged in 
        {
            $username = ($this->session->userdata['logged_in']['username']);
            $email = ($this->session->userdata['logged_in']['email']);
            $name = ($this->session->userdata['logged_in']['name']);
            $picture = ($this->session->userdata['logged_in']['picture']);
            $status = ($this->session->userdata['logged_in']['status']);
            
            if($status != 'Doctor'){   //Check if the logged user is a doctor
                redirect('/Login');
            }
        } else{
            redirect('/Login');
        }
    ?>

<section class="wrapper">
    <div class="contentContainer">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url() . "DoctorView" ?>">Home </a></li>   			  	
                    <li>Patient : &nbsp;   <!-- Current Page -->
                        <?php
                            
                         foreach ($patients as $patient):
                                if($patient->patient_id == $patient_id){
                                    echo $patient->patient_name; // Print patient name
                                }
                                $this->session->set_userdata('patient_sess',$patient->patient_id);
                        endforeach;                             
                        ?>                             
                    </li>					  	
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <!-- display error messages or success messages -->
                <?php
                    echo "<div class='error_msg'>";
                    echo validation_errors();
                    echo "</div>";
                    echo "<div class='error_msg'>";

                        if(isset($successMessage))
                        {
                ?>
                        <script>
                            swal('congratulations!', '<?php  echo $successMessage ?>','success') //Success message
                        </script>
                <?php 
                        }
                        if(isset($errorMessage))
                        {
                ?>
                        <script>
                            swal('Oops... sorry','<?php  echo $errorMessage ?>','error') // error message
                        </script>
                <?php 

                        }
                        echo "</div>";
                ?>

                
                
  <!--  View Patient Details -->  
                <div id="viewPatient" style="display: none"> <!-- hide div by default -->
                    <div class="col-md-12" >
                        
                            <div class="col-md-3">
                                <div class="white_back container" >
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active"><a data-toggle="pill" href="#generalDetails">Genaral Details</a></li>
                                    <li><a data-toggle="pill" href="#caseHistoryHistory">Case History</a></li>
                                    <li><a data-toggle="pill" href="#problemHistory">Problem</a></li>
                                    <li><a data-toggle="pill" href="#goalEvaluationHistory">Goals Evaluation</a></li>
                                    <li><a data-toggle="pill" href="#cognitiveTestHistory">Cognitive Test</a></li>
                                    <li><a data-toggle="pill" href="#meicationsHistory">Medications</a></li>
                                    <li><a data-toggle="pill" href="#notesHistory">Doctor's Notes</a></li>
                                    <li><a data-toggle="pill" href="#referncesHistory">References</a></li>
                                </ul>
                                    </div>
                            </div>
                        
                        <div class="col-md-9">
                            <div class="white_back container" >
                                <div class="tab-content">
                                    <div id="generalDetails" class="tab-pane fade in active">
                                        
                                        <?php
                                            foreach ($patients as $patient):
                                                if($patient->patient_id == $patient_id){
                                                    if ($patient->status == "0"){
                                        ?>
                                            <div class="panel panel-info">
                                                <div class="panel-heading">Genaral Details : &nbsp; <?php echo $patient->patient_name; ?> &nbsp; ( New patient )</div>
                                                <div class="panel-body">
                                                    <table class="table" border="0">
                                                        <tr>
                                                            <td>Name </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->patient_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gender </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->gender; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Language </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->language; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Age </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->age; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of birth </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->dob; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>School </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->school; ?></td>
                                                        </tr>
                                                        <tr class="info"><td colspan="3" ></td></tr>
                                                        <tr>
                                                            <td>Guardian's Name </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->guardian_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Guardian's Relationship </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->relationship; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Address </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->address; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Telephone </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->telephone; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td> Division </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->division; ?></td>
                                                        </tr>
                                                        <tr class="info"><td colspan="3" ></td></tr>
                                                        <tr>
                                                            <td> Refered By </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->refered_by; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td> Registered date </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->regitration_date; ?></td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                        <?php
                                                    }
                                                    if ($patient->status == "1"){ 
                                        ?>
                                            <div class="panel panel-success">
                                                <div class="panel-heading">Genaral Details : &nbsp; <?php echo $patient->patient_name; ?></div>
                                                <div class="panel-body">
                                                    <table class="table" border="0">
                                                        <tr>
                                                            <td>Name </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->patient_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gender </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->gender; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Language </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->language; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Age </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->age; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of birth </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->dob; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>School </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->school; ?></td>
                                                        </tr>
                                                        <tr class="success"><td colspan="3" ></td></tr>
                                                        <tr>
                                                            <td>Guardian's Name </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->guardian_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Guardian's Relationship </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->relationship; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Address </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->address; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Telephone </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->telephone; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td> Division </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->division; ?></td>
                                                        </tr>
                                                        <tr class="success"><td colspan="3" ></td></tr>
                                                        <tr>
                                                            <td> Refered By </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->refered_by; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td> Registered date </td>
                                                            <td>:</td>
                                                            <td><?php echo $patient->regitration_date; ?></td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                        <?php
                                                    }

                                                }
                                            endforeach;
                                        ?>
                                    </div>
                                    
                                    <div id="caseHistoryHistory" class="tab-pane fade">
                                        <div class="col-md-12">                           
                                            <ul class="nav nav-pills nav-justified">
                                                <li class="active"><a data-toggle="pill" href="#familyHistory">Family/Medical</a></li>
                                                <li><a data-toggle="pill" href="#commhistory">communicationn</a></li>
                                                <li><a data-toggle="pill" href="#mortorhistory">Mortor</a></li>
                                                <li><a data-toggle="pill" href="#coghistory">Cognitive</a></li>
                                                <li><a data-toggle="pill" href="#case_noteshistory">Case_notes</a></li>
                                            </ul>

                    <!-- display tab pane body -->
                                            <div class="tab-content">

                    <!-- family history display -->
                                                <div id="familyHistory" class="tab-pane fade in active">
                                                    <div class="white_back">
                                                        <h3 class="text-center">Family and Medical History</h3><hr>
                                                            
                                                        <?php
                                                            foreach ($getFamily as $familyHistory):
                                                                if($patient_id == $familyHistory->patient_id)
                                                                {
                                                        ?>  

                                                                    <table class="table table-condensed table-bordered"> <!-- family history -->

                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th class="text-center" colspan="2">Family History</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Father</td>
                                                                                <td><?php echo $familyHistory->father; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Mother</td>
                                                                                <td><?php echo $familyHistory->mother; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>No of Sibilings</td>
                                                                                <td><?php echo $familyHistory->no_of_sibilings; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Names of Sibilings</td>
                                                                                <td><?php echo $familyHistory->names_of_sibilings; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Home situation</td>
                                                                                <td><?php echo $familyHistory->home_situation; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Presenting Problems</td>
                                                                                <td><?php echo $familyHistory->presenting_problems; ?> </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                    <table class="table table-condensed table-bordered">  <!-- medical history -->
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th class="text-center" colspan="2">Medical History</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>During Pregnancy</td>
                                                                                <td><?php echo $familyHistory->during_pregnancy; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>At birth</td>
                                                                                <td><?php echo $familyHistory->at_birth; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Mode of delivery</td>
                                                                                <td><?php echo $familyHistory->mode_of_dilivery; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Birth Weight</td>
                                                                                <td><?php echo $familyHistory->birth_weight; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Birth Cry</td>
                                                                                <td><?php echo $familyHistory->birth_cry; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>After Birth</td>
                                                                                <td><?php echo $familyHistory->after_birth; ?> </td>
                                                                            </tr>  
                                                                            <tr>
                                                                                <td>Relevent illnesses</td>
                                                                                <td><?php echo $familyHistory->relevent_illnesses; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Medications / Investigations</td>
                                                                                <td><?php echo $familyHistory->medications; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Audiology Results</td>
                                                                                <td><?php echo $familyHistory->audiology; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Left Side :</td>
                                                                                <td><?php echo $familyHistory->audio_left; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Right Side :</td>
                                                                                <td><?php echo $familyHistory->audiio_right; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Vision</td>
                                                                                <td><?php echo $familyHistory->vision; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Left Side :</td>
                                                                                <td><?php echo $familyHistory->vision_left; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Right Side :</td>
                                                                                <td><?php echo $familyHistory->vision_right; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Histry of related Conditions in Family</td>
                                                                                <td><?php echo $familyHistory->related_history_family; ?> </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                        <?php 
                                                            }

                                                            endforeach;
                                                        ?>
                                                             
                                                    </div>
                                                </div>

                    <!-- display communication skills -->
                                                <div id="commhistory" class="tab-pane fade">
                                                    <div class="white_back">
                                                        <h3 class="text-center">Communication Skills</h3><hr>
                                                            
                                                        <?php
                                                            foreach ($getComm as $communication):
                                                                if($patient_id == $communication->patient_id)
                                                                {
                                                        ?>
                                                                    <table class="table table-condensed table-bordered " >

                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th class="text-center" colspan="2">Communication</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Functional Communication</td>
                                                                                <td><?php echo $communication->func_comm; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Listening Skills</td>
                                                                                <td><?php echo $communication->listening; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Attention Skills</td>
                                                                                <td><?php echo $communication->attetion; ?> </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                    <table class="table table-condensed table-bordered " >           
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th class="text-center" colspan="2">Oral Skills / Examination</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Sucking</td>
                                                                                <td><?php echo $communication->sucking; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Chewing </td>
                                                                                <td><?php echo $communication->chewing; ?> </td>
                                                                            </tr>
                                                                                <tr>
                                                                                <td>Blowing</td>
                                                                                <td><?php echo $communication->blowing; ?> </td>
                                                                            </tr>
                                                                                <tr>
                                                                                <td>Strow</td>
                                                                                <td><?php echo $communication->strow; ?> </td>
                                                                            </tr>
                                                                                <tr>
                                                                                <td>Drooling</td>
                                                                                <td><?php echo $communication->drooling; ?> </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                    <table class="table table-condensed table-bordered " >           
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th class="text-center" colspan="2">Comprehension</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr class="active">
                                                                                <td colspan="2">Non verbal</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Facial expressions</td>
                                                                                <td><?php echo $communication->com_non_facial; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Gestures</td>
                                                                                <td><?php echo $communication->com_non_gesture; ?> </td>
                                                                            </tr>
                                                                            <tr class="active">
                                                                                <td colspan="2">verbal</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Word Level</td>
                                                                                <td><?php echo $communication->com_verbal; ?> </td>
                                                                            </tr>

                                                                        </tbody>
                                                                    </table>

                                                                    <table class="table table-condensed table-bordered " >           
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th class="text-center" colspan="2">Expression</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr class="active">
                                                                                <td colspan="2">Non verbal</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Facial expressions</td>
                                                                                <td><?php echo $communication->expre_non_facial; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Gestures</td>
                                                                                <td><?php echo $communication->expre_non_gesture; ?> </td>
                                                                            </tr>
                                                                            <tr class="active">
                                                                                <td colspan="2">verbal</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Word Level</td>
                                                                                <td><?php echo $communication->expre_verbal; ?> </td>
                                                                            </tr>

                                                                        </tbody>
                                                                    </table>

                                                                    <table class="table table-condensed table-bordered " >           
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th class="text-center" colspan="2">Speech</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            <tr>
                                                                                <td>Articulation</td>
                                                                                <td><?php echo $communication->articulation; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Intelligibility</td>
                                                                                <td><?php echo $communication->intelligibility; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Phonology(speech sounds & processes )</td>
                                                                                <td><?php echo $communication->phonollogy; ?> </td>
                                                                            </tr>
                                                                            <tr class="active">
                                                                                <td colspan="2">Syntax & Morphology</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Sentence Structure</td>
                                                                                <td><?php echo $communication->sentence; ?> </td>
                                                                            </tr>
                                                                            <tr class="active">
                                                                                <td colspan="2">Vocabulary & Semantics</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Words & meanings</td>
                                                                                <td><?php echo $communication->word_meaning; ?> </td>
                                                                            </tr>                                            
                                                                        </tbody>
                                                                    </table>

                                                                    <table class="table table-condensed table-bordered " >           
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th class="text-center" colspan="2">Pragmatics</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            <tr>
                                                                                <td>Conversations</td>
                                                                                <td><?php echo $communication->convertations; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Eye contact</td>
                                                                                <td><?php echo $communication->eye_contact; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Turn Taking</td>
                                                                                <td><?php echo $communication->turn_taking; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Initiating</td>
                                                                                <td><?php echo $communication->initiating; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Appropriate Answers</td>
                                                                                <td><?php echo $communication->appropriate_answer; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Voice</td>
                                                                                <td><?php echo $communication->voice; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Fluency</td>
                                                                                <td><?php echo $communication->fluency; ?> </td>
                                                                            </tr>
                                                                           <tr>
                                                                                <td>Other factors/Information</td>
                                                                                <td><?php echo $communication->other; ?> </td>
                                                                            </tr><tr>
                                                                                <td>Prognosis</td>
                                                                                <td><?php echo $communication->prognosis; ?> </td>
                                                                            </tr>                                           
                                                                        </tbody>
                                                                    </table>               

                                                        <?php 
                                                            }
                                                            endforeach;
                                                        ?>
                                                            
                                                    </div>
                                                </div>

                    <!-- display mortor skills -->
                                                <div id="mortorhistory" class="tab-pane fade">
                                                    <div class="white_back">
                                                        <h3 class="text-center">Mortor Skills</h3><hr>
                                                            
                                                        <?php
                                                            foreach ($getMotor as $Motor):
                                                                if($patient_id == $Motor->patient_id)
                                                                {
                                                        ?>
                                                                    <table class="table table-condensed table-bordered">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Gross</td>
                                                                                <td><?php echo $Motor->gross; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Fine</td>
                                                                                <td><?php echo $Motor->fine; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Social</td>
                                                                                <td><?php echo $Motor->social; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Feeding</td>
                                                                                <td><?php echo $Motor->feeding; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Dressing</td>
                                                                                <td><?php echo $Motor->dressing; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Toileting</td>
                                                                                <td><?php echo $Motor->toileting; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Independence</td>
                                                                                <td><?php echo $Motor->independence; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Behaviors/Personality</td>
                                                                                <td><?php echo $Motor->personality; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Stereotypic behavior</td>
                                                                                <td><?php echo $Motor->stereotypic_behaviors; ?> </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>


                                                        <?php 
                                                            }
                                                            endforeach;
                                                        ?>
                                                            
                                                    </div>
                                                </div>

                    <!-- display cognative skills --> 
                                                <div id="coghistory" class="tab-pane fade">
                                                    <div class="white_back">
                                                        <h3 class="text-center">Cognitive and Communication development</h3><hr>
                                                            
                                                        <?php
                                                            foreach ($getCog as $Cognitive):
                                                                if($patient_id == $Cognitive->patient_id)
                                                                {
                                                        ?>
                                                                    <table class="table table-condensed table-bordered " >
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Problem solving : Building blocks</td>
                                                                                <td><?php echo $Cognitive->problem_solving; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Matching / Sorting</td>
                                                                                <td><?php echo $Cognitive->matching; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Colors</td>
                                                                                <td><?php echo $Cognitive->colors; ?> </td>
                                                                            </tr>
                                                                             <tr>
                                                                                <td>Sizes</td>
                                                                                <td><?php echo $Cognitive->sizes; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Sequencing</td>
                                                                                <td><?php echo $Cognitive->sequencing; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2" class="active">Numbers</td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>Counting</td>
                                                                                <td><?php echo $Cognitive->counting; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Concept</td>
                                                                                <td><?php echo $Cognitive->concept; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Memory/Tecognition</td>
                                                                                <td><?php echo $Cognitive->memory; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Play/Iterests/Hobbies</td>
                                                                                <td><?php echo $Cognitive->hobbies; ?> </td>
                                                                            </tr>

                                                                        </tbody>
                                                                    </table>

                                                                    <table class="table table-condensed table-bordered " >
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Interaction</td>
                                                                                <td><?php echo $Cognitive->interaction; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Babble</td>
                                                                                <td><?php echo $Cognitive->babble; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>First Words</td>
                                                                                <td><?php echo $Cognitive->first_word; ?> </td>
                                                                            </tr>
                                                                             <tr>
                                                                                <td>Words Together</td>
                                                                                <td><?php echo $Cognitive->word_together; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Expressing Needs</td>
                                                                                <td><?php echo $Cognitive->eppressing_needs; ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Nursery/School/College/Work</td>
                                                                                <td><?php echo $Cognitive->school; ?> </td>
                                                                            </tr>

                                                                        </tbody>
                                                                    </table>


                                                        <?php 
                                                            }
                                                                endforeach;
                                                        ?>
                                                        
                                                    </div>
                                                </div>

                    <!-- display cognative skills --> 
                                                <div id="case_noteshistory" class="tab-pane fade">
                                                    <div class="white_back">
                                                        <h3 class="success">Case notes</h3><hr>
                                                          
                                                        <?php
                                                            foreach ($getNotes as $Notes):
                                                                if($patient_id == $Notes->patient_id)
                                                                {
                                                        ?>
                                                                    <table class="table table-condensed table-bordered " >

                                                                        <tbody>

                                                                            <tr>
                                                                                <td><?php echo $Notes->note; ?> </td>
                                                                            </tr>

                                                                            </tbody>
                                                                    </table>


                                                        <?php 
                                                            }endforeach;
                                                        ?>
                                                            
                                                    </div>
                                                </div>
                                            </div>                                              

                                        </div>
                                    </div> 
                                    
                                    <div id="problemHistory" class="tab-pane fade">

                     
                                    </div>
                                    <div id="goalEvaluationHistory" class="tab-pane fade">
                                        <h3>Menu 3</h3>
                                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                    <div id="cognitiveTestHistory" class="tab-pane fade">
                                        <h3>Menu 3</h3>
                                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                    <div id="meicationsHistory" class="tab-pane fade">
                                        <h3>Menu 3</h3>
                                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                    <div id="notesHistory" class="tab-pane fade">
                                        <?php 
                                            foreach($doc_notes as $notes): 
                                        ?>
                                        
                                        <div class="panel-group">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" href="#<?php echo $notes->date; ?>">Doctor's Note: Date - <?php echo $notes->date; ?></a>
                                                    </h4>
                                                </div>
                                                <div id="<?php echo $notes->date; ?>" class="panel-collapse collapse">
                                                    <div class="panel-body"> <?php echo $notes->note; ?></div>
                                                    <div class="panel-footer"><?php echo $notes->doc_name; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php 
                                            endforeach; 
                                        ?>
                                    </div>
                                    <div id="referncesHistory" class="tab-pane fade">
                                    <?php 
                                        foreach($refernces as $reference):
                                        if ($patient_id == $reference->patient_id)
                                        {
                                    ?>     
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" href="#<?php echo $reference->clinic_no; ?>">Reference Details: Clinic - <?php echo $reference->clinic_no; ?></a>
                                                    </h4>
                                                </div>
                                                <div id="<?php echo $reference->clinic_no; ?>" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <table class="table" border="0">
                                                            <tr>
                                                                <td>Date </td>
                                                                <td>:</td>
                                                                <td><?php echo $reference->date; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Clinic </td>
                                                                <td>:</td>
                                                                <td><?php echo $reference->clinic_no; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Description </td>
                                                                <td>:</td>
                                                                <td><?php echo $reference->description; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Letter</td>
                                                                <td>:</td>
                                                                <td><a target="_blank" href="<?php echo base_url($reference->path); ?>">View Letter</a></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="panel-footer"><?php echo $reference->doc_name; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                    <?php 
                                        }
                                        endforeach; 
                                    ?>
                                    </div>
                                    
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
                
                <div id="diagnosis" style="display: none" ></div>
                <div id="problem" style="display: none" >
                    <div class="white_back">
                        <h3 class="success">Problem</h3><hr>
                            <div id="problem_table">
                        <?php
                            foreach ($getNotes as $Notes):
                                if($patient_id == $Notes->patient_id)
                                {
                        ?>
                                    <table class="table table-condensed table-bordered " >

                                        <tbody>

                                            <tr>
                                                <td><?php echo $Notes->note; ?> </td>
                                            </tr>

                                            </tbody>
                                    </table>


                        <?php 
                            }endforeach;
                        ?>
                            </div>
                            <div id="problem_form">
                        <?php 
                            $attri = array('class'=>'form-horizontal');
                            echo form_open('DoctorView/add_case_notes',$attri);
                        ?>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <textarea name="cese_notes" class="form-control"   placeholder=""></textarea>
                                    </div>
                                </div>  


                                <input type="hidden" name="patientid" id="id" value="<?php echo $patient_id; ?>" />
                                <input type="hidden" name="time" id="id" value="<?php echo date('H:i:s'); ?>" />
                                <input type="hidden" name="date" id="id" value="<?php echo date('Y-m-d'); ?>" />
                                <input type="hidden" name="doctorid" id="id" value="<?php echo $name; ?>" />

                                <div class="form-group">
                                    <div class="col-sm-7"></div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" name='save' class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                        <?php 
                            echo form_close();                                        
                        ?>                                        
                            </div>
                    </div>
                </div>
                
<!-- Case history forms and tables -->
                <div id="caseHistory">
                    <div class="col-md-12">
                        
  <!--  Display tab pane header -->                           
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a data-toggle="pill" href="#family">Family/Medical</a></li>
                            <li><a data-toggle="pill" href="#comm">communicationn</a></li>
                            <li><a data-toggle="pill" href="#mortor">Mortor</a></li>
                            <li><a data-toggle="pill" href="#cog">Cognitive</a></li>
                            <li><a data-toggle="pill" href="#case_notes">Case_notes</a></li>
                        </ul>
                        
<!-- display tab pane body -->
                        <div class="tab-content">

<!-- family history display -->
                            <div id="family" class="tab-pane fade in active">
                                <div class="white_back">
                                    <h3 class="text-center">Family and Medical History</h3><hr>
                                        <div id="family_table" >
                                    <?php
                                        foreach ($getFamily as $familyHistory):
                                            if($patient_id == $familyHistory->patient_id)
                                            {
                                    ?>  
                                            
                                                <table class="table table-condensed table-bordered"> <!-- family history -->

                                                    <thead>
                                                        <tr class="success">
                                                            <th class="text-center" colspan="2">Family History</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Father</td>
                                                            <td><?php echo $familyHistory->father; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mother</td>
                                                            <td><?php echo $familyHistory->mother; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>No of Sibilings</td>
                                                            <td><?php echo $familyHistory->no_of_sibilings; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Names of Sibilings</td>
                                                            <td><?php echo $familyHistory->names_of_sibilings; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Home situation</td>
                                                            <td><?php echo $familyHistory->home_situation; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Presenting Problems</td>
                                                            <td><?php echo $familyHistory->presenting_problems; ?> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                    
                                                <table class="table table-condensed table-bordered">  <!-- medical history -->
                                                    <thead>
                                                        <tr class="success">
                                                            <th class="text-center" colspan="2">Medical History</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>During Pregnancy</td>
                                                            <td><?php echo $familyHistory->during_pregnancy; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>At birth</td>
                                                            <td><?php echo $familyHistory->at_birth; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mode of delivery</td>
                                                            <td><?php echo $familyHistory->mode_of_dilivery; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Birth Weight</td>
                                                            <td><?php echo $familyHistory->birth_weight; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Birth Cry</td>
                                                            <td><?php echo $familyHistory->birth_cry; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>After Birth</td>
                                                            <td><?php echo $familyHistory->after_birth; ?> </td>
                                                        </tr>  
                                                        <tr>
                                                            <td>Relevent illnesses</td>
                                                            <td><?php echo $familyHistory->relevent_illnesses; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Medications / Investigations</td>
                                                            <td><?php echo $familyHistory->medications; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Audiology Results</td>
                                                            <td><?php echo $familyHistory->audiology; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Left Side :</td>
                                                            <td><?php echo $familyHistory->audio_left; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Right Side :</td>
                                                            <td><?php echo $familyHistory->audiio_right; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Vision</td>
                                                            <td><?php echo $familyHistory->vision; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Left Side :</td>
                                                            <td><?php echo $familyHistory->vision_left; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Right Side :</td>
                                                            <td><?php echo $familyHistory->vision_right; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Histry of related Conditions in Family</td>
                                                            <td><?php echo $familyHistory->related_history_family; ?> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                    <?php 
                                        }
                                       
                                        endforeach;
                                    ?>
                                        </div>
                                        <div id="family_form">
                                    <?php
                                     
                                        $attri = array('class'=>'form-horizontal');
                                        echo form_open('DoctorView/add_family_history',$attri);
                                    ?>

                                                <h4>Family History</h4><hr>

                                                <div class="form-group">
                                                    <label for="title" class="col-sm-3 control-label">Father </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="father" class="form-control"   placeholder="Father's Name" required />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-3 control-label">Mother</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="mother" class="form-control"   placeholder="Mother's Name" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-3 control-label">No of Sibilings</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="noOfSibilings" class="form-control"   placeholder="Number of Sibilings" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-3 control-label">Names of Sibilings</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="namesOfSibilings" class="form-control"   placeholder="Names of Sibilings" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-3 control-label">Home situation</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="homeSituation" class="form-control"   placeholder="Home Situation" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="problem" class="col-sm-3 control-label">Presenting Problems</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="Problem" class="form-control" placeholder="Type or Select problem" name="presentingProblem" list="presentingProblem"  required>
                                                        <datalist id="presentingProblem">
                                                            <option value="Speach & language delay">Speach & language delay</option>
                                                            <option value="Global language delay">Global language delay</option>
                                                            <option value="Autism">Autism</option>
                                                            <option value="Learning Difficulties">Learning Difficulties</option>
                                                            <option value="Stammering">Stammering</option>
                                                            <option value="MR">MR</option>
                                                            <option value="Other">Other</option>
                                                        </datalist>
                                                    </div>
                                                </div>

                                                <h4>Medical History</h4><hr>
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-3 control-label">During Pregnancy</label>
                                                    <div class="col-sm-9">
                                                        <select name="duringPregnancy" class="form-control" id="color" required>
                                                            <option value="" >Select an option</option>
                                                            <option value="No Complication">No Complication</option>
                                                            <option value="Complicated">Complicated</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-3 control-label">At birth</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="atBirth" class="form-control"   placeholder="At birth" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-3 control-label">Mode of delivery</label>
                                                    <div class="col-sm-9">
                                                        <select name="modeOfDelivery" class="form-control" id="color">
                                                            <option value="" >Select a mode</option>
                                                            <option value="NVO">NVO</option>
                                                            <option value="LSCS">LSCS</option>
                                                            <option value="EM">EM</option>
                                                            <option value="ELEM">ELEM</option>
                                                            <option value="Assisted : Forced">Assisted : Forced</option>
                                                            <option value="Assisted : Vaccumed">Assisted : Vaccumed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-3 control-label">Birth Weight</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="birthWeight" class="form-control"   placeholder="Birth Weight" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-3 control-label">Birth Cry</label>
                                                    <div class="col-sm-9">
                                                        <select name="birthCry" class="form-control" id="color">
                                                            <option value="" >Select an option</option>
                                                            <option value="No concern">No concern</option>
                                                            <option value="Delayed">Delayed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-3 control-label">After Birth</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="afterBirth" class="form-control"   placeholder="After Birth" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-3 control-label">Relevent illnesses</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="releventIllnesses" class="form-control"   placeholder="Relevent Illnesses" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-3 control-label">Medications / Investigations</label>
                                                    <div class="col-sm-9">
                                                        <input type="checkbox" name="medication" value="EEG" >&nbsp;&nbsp; EEG <br/>
                                                        <input type="checkbox" name="medication" value="CT">&nbsp;&nbsp; CT <br/>
                                                        <input type="checkbox" name="medication" value="EMG" >&nbsp;&nbsp; EMG <br/>
                                                        <input type="checkbox" name="medication" value="USS Brain">&nbsp;&nbsp; USS Brain <br/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-3 control-label">Audiology Results</label>
                                                    <div class="col-sm-9">
                                                        <select name="audiology" class="form-control" id="color">
                                                            <option class="form-control" value="" >Select an option</option>
                                                            <option class="form-control" value="Assesed">Assessed</option>
                                                            <option class="form-control" value="Not Assesed">Not Assessed</option>
                                                            <option class="form-control" value="No concern">No Concern</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9">
                                                        <div class="col-sm-6">
                                                            <div class="col-sm-5">Left Side</div>
                                                            <div class="col-md-7">
                                                                <input type="text" name="audioLeft" class="form-control"   placeholder="Audiology Left" required/>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="col-sm-5">Right Side</div>
                                                            <div class="col-sm-7">
                                                                <input type="text" name="audioRight" class="form-control"   placeholder="Audiology Right" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-3 control-label">Vision</label>
                                                    <div class="col-sm-9">
                                                        <select name="vision" class="form-control" id="color">
                                                            <option value="" >Select an option</option>
                                                            <option value="Assesed">Assessed</option>
                                                            <option value="Not Assesed">Not Assessed</option>
                                                            <option value="No concern">No Concern</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9">
                                                        <div class="col-sm-6">
                                                            <div class="col-sm-5">Left Side </div>
                                                            <div class="col-sm-7">
                                                                <input type="text" name="visionLeft" class="form-control"   placeholder="Vision Left" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="col-sm-5">Right Side </div>
                                                            <div class="col-sm-7">
                                                                <input type="text" name="visionRight" class="form-control"   placeholder="Vision Right" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="title" class="col-sm-3 control-label">Histry of related Conditions in Family</label>
                                                <div class="col-sm-9">
                                                    <textarea name="relatedConditions" class="form-control"   placeholder="Related Conditions in Family" required></textarea>
                                                </div>
                                                </div>


                                                <input type="hidden" name="patientid" id="id" value="<?php echo $patient_id; ?>" />
                                                <input type="hidden" name="time" id="id" value="<?php echo date('H:i:s'); ?>" />
                                                <input type="hidden" name="date" id="id" value="<?php echo date('Y-m-d'); ?>" />
                                                <input type="hidden" name="doctorid" id="id" value="<?php echo $name; ?>" />

                                                <div class="form-group">
                                                    <div class="col-sm-7"></div>
                                                    <div class="col-sm-2">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <button type="submit" name='save' class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>

                                    <?php 
                                        echo form_close();
                                    ?>
                                    </div>
                                </div>
                            </div>

<!-- display communication skills -->
                            <div id="comm" class="tab-pane fade">
                                <div class="white_back">
                                    <h3 class="text-center">Communication Skills</h3><hr>
                                        <div id="comm_table">
                                    <?php
                                        foreach ($getComm as $communication):
                                            if($patient_id == $communication->patient_id)
                                            {
                                    ?>
                                                <table class="table table-condensed table-bordered " >

                                                    <thead>
                                                        <tr class="success">
                                                            <th class="text-center" colspan="2">Communication</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Functional Communication</td>
                                                            <td><?php echo $communication->func_comm; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Listening Skills</td>
                                                            <td><?php echo $communication->listening; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Attention Skills</td>
                                                            <td><?php echo $communication->attetion; ?> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                    
                                                <table class="table table-condensed table-bordered " >           
                                                    <thead>
                                                        <tr class="success">
                                                            <th class="text-center" colspan="2">Oral Skills / Examination</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Sucking</td>
                                                            <td><?php echo $communication->sucking; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Chewing </td>
                                                            <td><?php echo $communication->chewing; ?> </td>
                                                        </tr>
                                                            <tr>
                                                            <td>Blowing</td>
                                                            <td><?php echo $communication->blowing; ?> </td>
                                                        </tr>
                                                            <tr>
                                                            <td>Strow</td>
                                                            <td><?php echo $communication->strow; ?> </td>
                                                        </tr>
                                                            <tr>
                                                            <td>Drooling</td>
                                                            <td><?php echo $communication->drooling; ?> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <table class="table table-condensed table-bordered " >           
                                                    <thead>
                                                        <tr class="success">
                                                            <th class="text-center" colspan="2">Comprehension</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="active">
                                                            <td colspan="2">Non verbal</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Facial expressions</td>
                                                            <td><?php echo $communication->com_non_facial; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gestures</td>
                                                            <td><?php echo $communication->com_non_gesture; ?> </td>
                                                        </tr>
                                                        <tr class="active">
                                                            <td colspan="2">verbal</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Word Level</td>
                                                            <td><?php echo $communication->com_verbal; ?> </td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                                <table class="table table-condensed table-bordered " >           
                                                    <thead>
                                                        <tr class="success">
                                                            <th class="text-center" colspan="2">Expression</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="active">
                                                            <td colspan="2">Non verbal</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Facial expressions</td>
                                                            <td><?php echo $communication->expre_non_facial; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gestures</td>
                                                            <td><?php echo $communication->expre_non_gesture; ?> </td>
                                                        </tr>
                                                        <tr class="active">
                                                            <td colspan="2">verbal</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Word Level</td>
                                                            <td><?php echo $communication->expre_verbal; ?> </td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                                <table class="table table-condensed table-bordered " >           
                                                    <thead>
                                                        <tr class="success">
                                                            <th class="text-center" colspan="2">Speech</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td>Articulation</td>
                                                            <td><?php echo $communication->articulation; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Intelligibility</td>
                                                            <td><?php echo $communication->intelligibility; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phonology(speech sounds & processes )</td>
                                                            <td><?php echo $communication->phonollogy; ?> </td>
                                                        </tr>
                                                        <tr class="active">
                                                            <td colspan="2">Syntax & Morphology</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sentence Structure</td>
                                                            <td><?php echo $communication->sentence; ?> </td>
                                                        </tr>
                                                        <tr class="active">
                                                            <td colspan="2">Vocabulary & Semantics</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Words & meanings</td>
                                                            <td><?php echo $communication->word_meaning; ?> </td>
                                                        </tr>                                            
                                                    </tbody>
                                                </table>

                                                <table class="table table-condensed table-bordered " >           
                                                    <thead>
                                                        <tr class="success">
                                                            <th class="text-center" colspan="2">Pragmatics</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td>Conversations</td>
                                                            <td><?php echo $communication->convertations; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Eye contact</td>
                                                            <td><?php echo $communication->eye_contact; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Turn Taking</td>
                                                            <td><?php echo $communication->turn_taking; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Initiating</td>
                                                            <td><?php echo $communication->initiating; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Appropriate Answers</td>
                                                            <td><?php echo $communication->appropriate_answer; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Voice</td>
                                                            <td><?php echo $communication->voice; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Fluency</td>
                                                            <td><?php echo $communication->fluency; ?> </td>
                                                        </tr>
                                                       <tr>
                                                            <td>Other factors/Information</td>
                                                            <td><?php echo $communication->other; ?> </td>
                                                        </tr><tr>
                                                            <td>Prognosis</td>
                                                            <td><?php echo $communication->prognosis; ?> </td>
                                                        </tr>                                           
                                                    </tbody>
                                                </table>               

                                    <?php 
                                        }
                                        endforeach;
                                    ?>
                                        </div>
                                        <div id="comm_form">

                                    <?php 
                                        $attri = array('class'=>'form-horizontal');
                                        echo form_open('DoctorView/add_communication_skills',$attri);
                                    ?>

                                                <div class="form-group">
                                                    <label for="funcCom" class="col-sm-3 control-label">Functional Communication </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="Type or Select" name="funcCom" list="funcCom" required >
                                                        <datalist id="funcCom">
                                                            <option value="Verbal">Verbal</option>
                                                            <option value="Non Verbal">Non Verbal</option>
                                                            <option value="Gestures">Gestures</option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="listening" class="col-sm-3 control-label">Listening Skills</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="Type or Select" name="listening" list="listening" required >
                                                        <datalist id="listening">
                                                            <option value="Adequate">Adequate</option>
                                                            <option value="Not Adequate">Not Adequate</option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="attention" class="col-sm-3 control-label">Attention Skills</label>
                                                    <div class="col-sm-9">
                                                        <select name="attention" class="form-control" id="color">
                                                            <option value="Distracted">Distracted</option>
                                                            <option value="One task / Single Chanelled">One task / Single Chanelled</option>
                                                            <option value="Focus attention">Focus attention</option>
                                                            <option value="Shift attention / dual Chanelled">One task / Single Chanelled</option>
                                                            <option value="Sustain attention">Sustain attention</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <h4> Oral Skills / Examination</h4><hr>
                                                <div class="form-group">
                                                    <label for="sucking" class="col-sm-3 control-label">Sucking</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="Type or Select" name="sucking" list="sucking" required >
                                                        <datalist id="sucking">
                                                            <option value="Positive">Positive</option>
                                                            <option value="Negative">Negative</option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="chewing" class="col-sm-3 control-label">Chewing</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="Type or Select" name="chewing" list="chewing" required >
                                                        <datalist id="chewing">
                                                            <option value="Positive">Positive</option>
                                                            <option value="Negative">Negative</option>
                                                            <option value="Poketing">Poketing</option>
                                                            <option value="Food Consistancy">Food Consistancy</option>
                                                            <option value="Lateral movements">Lateral movements</option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="blowing" class="col-sm-3 control-label">Blowing</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="Problem" class="form-control" placeholder="Type or Select problem" name="blowing" list="blowing" required>
                                                        <datalist id="blowing">
                                                            <option value="Positive">Positive</option>
                                                            <option value="Negative">Negative</option>
                                                            <option value="Horn">Horn</option>
                                                            <option value="Baloon">Baloon</option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="strow" class="col-sm-3 control-label">Strow</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="Problem" class="form-control" placeholder="Type or Select problem" name="strow" list="strow" required>
                                                        <datalist id="strow">
                                                            <option value="Positive">Positive</option>
                                                            <option value="Negative">Negative</option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="drooling" class="col-sm-3 control-label">Drooling</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="Problem" class="form-control" placeholder="Type or Select problem" name="drooling" list="drooling" required>
                                                        <datalist id="drooling">
                                                            <option value="Positive">Positive</option>
                                                            <option value="Negative">Negative</option>
                                                        </datalist>
                                                    </div>
                                                </div>

                                                <h4>Comprehension</h4><hr>

                                                <div class="form-group">
                                                    <label for="compreNonVerbal" class="col-sm-3 control-label">Non Verbal</label>
                                                    <div class="col-sm-9">
                                                        <div class="col-sm-6">
                                                            <div class="col-sm-6">Facial Expressions</div>
                                                            <div class="col-sm-6">
                                                                <input type="radio" name="compreNonVerbalFacial" value="Positive" >&nbsp;&nbsp; Positive <br/>
                                                                <input type="radio" name="compreNonVerbalFacial" value="Negative">&nbsp;&nbsp; Negative <br/>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="col-sm-6">Gestures</div>
                                                            <div class="col-sm-6">
                                                                <input type="radio" name="compreNonVerbalGestures" value="Positive" >&nbsp;&nbsp; Positive <br/>
                                                                <input type="radio" name="compreNonVerbalGestures" value="Negative">&nbsp;&nbsp; Negative <br/>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="compreVerbal" class="col-sm-3 control-label">Verbal</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="Problem" class="form-control" placeholder="Type or Select problem" name="compreVerbal" list="compreVerbal" required>
                                                        <datalist id="compreVerbal">
                                                            <option value="One word level">One word level</option>
                                                            <option value="2 - 3 word level">2 - 3 word level</option>
                                                            <option value="3 - 4 word level">3 - 4 word level</option>
                                                            <option value="4 - 5 word level">4 - 5 word level</option>
                                                            <option value="Narrative level">Narrative level</option>
                                                        </datalist>
                                                    </div>
                                                </div>

                                                <h4>Expression</h4><hr>

                                                <div class="form-group">
                                                    <label for="expreNonVerbal" class="col-sm-3 control-label">Non Verbal</label>
                                                    <div class="col-sm-9">
                                                        <div class="col-sm-6">
                                                            <div class="col-sm-6">Facial Expressions</div>
                                                            <div class="col-sm-6">
                                                                <input type="radio" name="expreNonVerbalFacial" value="Positive" >&nbsp;&nbsp; Positive <br/>
                                                                <input type="radio" name="expreNonVerbalFacial" value="Negative">&nbsp;&nbsp; Negative <br/>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="col-sm-6">Gestures</div>
                                                            <div class="col-sm-6">
                                                                <input type="radio" name="expreNonVerbalGestures" value="Positive" >&nbsp;&nbsp; Positive <br/>
                                                                <input type="radio" name="expreNonVerbalGestures" value="Negative">&nbsp;&nbsp; Negative <br/>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="expressVerbal" class="col-sm-3 control-label">Verbal</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="Problem" class="form-control" placeholder="Type or Select problem" name="expressVerbal" list="expressVerbal" required>
                                                        <datalist id="expressVerbal">
                                                            <option value="One word level">One word level</option>
                                                            <option value="2 - 3 word level">2 - 3 word level</option>
                                                            <option value="3 - 4 word level">3 - 4 word level</option>
                                                            <option value="4 - 5 word level">4 - 5 word level</option>
                                                            <option value="Narrative level">Narrative level</option>
                                                        </datalist>
                                                    </div>
                                                </div>

                                                <h4>Speech</h4><hr>
                                                <div class="form-group">
                                                    <label for="articulation" class="col-sm-3 control-label">Articulation</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="articulation" class="form-control"   placeholder="Articulation" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="intelligibility" class="col-sm-3 control-label">Intelligibility</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="Problem" class="form-control" placeholder="Type or Select problem" name="intelligibility" list="intelligibility" required>
                                                        <datalist id="intelligibility">
                                                            <option value="No concern">No concern</option>
                                                            <option value="Poor - (Understand - Family)">Poor - (Understand - Family)</option>
                                                            <option value="Poor - (Understand - Strangers)">Poor - (Understand - Strangers)</option>
                                                        </datalist>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="phonollogy" class="col-sm-3 control-label">Phonollogy (speech sound &amp; processes)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="phonollogy" class="form-control"   placeholder="" required>
                                                    </div>
                                                </div>
                                                <h4> Syntax &amp; Morphology</h4><hr>
                                                <div class="form-group">
                                                    <label for="sentences" class="col-sm-3 control-label">Sentence Structure</label>
                                                    <div class="col-sm-9">
                                                       <select name="sentences" class="form-control" id="color">
                                                            <option  value="No Concern">No Concern</option>
                                                            <option   value="Impaired">Impaired</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <h4> Vocabulary &amp; Semantics</h4><hr>
                                                <div class="form-group">
                                                    <label for="words" class="col-sm-3 control-label">Words &amp; Meanings</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="words" class="form-control"   placeholder="" required>
                                                    </div>
                                                </div>
                                                <h4> Pragmetics</h4><hr>
                                                <div class="form-group">
                                                    <label for="convertations" class="col-sm-3 control-label">Convertations</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="convertations" class="form-control"   placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="eyeContact" class="col-sm-3 control-label">Eye contact</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="Type or Select" name="eyeContact" list="eyeContact" required >
                                                        <datalist id="eyeContact">
                                                            <option value="Adequate">Adequate</option>
                                                            <option value="Not Adequate">Not Adequate</option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="turnTaking" class="col-sm-3 control-label">Turn Taking</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="Type or Select" name="turnTaking" list="turnTaking" required >
                                                        <datalist id="turnTaking">
                                                            <option value="Adequate">Adequate</option>
                                                            <option value="Not Adequate">Not Adequate</option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="eyeContact" class="col-sm-3 control-label">Initiating</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="Type or Select" name="initiating" list="initiating" required >
                                                        <datalist id="initiating">
                                                            <option value="Adequate">Adequate</option>
                                                            <option value="Not Adequate">Not Adequate</option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="approAnswer" class="col-sm-3 control-label">Appropriate answer</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="Type or Select" name="approAnswer" list="approAnswer" required >
                                                        <datalist id="approAnswer">
                                                            <option value="Adequate">Adequate</option>
                                                            <option value="Not Adequate">Not Adequate</option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="voice" class="col-sm-3 control-label">Voice</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="voice" class="form-control"   placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fluency" class="col-sm-3 control-label">Fluency</label>
                                                    <div class="col-sm-9">
                                                        <select name="fluency" class="form-control" id="color">
                                                            <option  value="Blocking">Blocking</option>
                                                            <option value="Repetition">Repetition</option>
                                                            <option  value="Prolongations">Prolongations</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="other" class="col-sm-3 control-label">Other factors / Information</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="other" class="form-control"   placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="prognosis" class="col-sm-3 control-label">Prognosis</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="prognosis" class="form-control"   placeholder="" required>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="patientid" id="id" value="<?php echo $patient_id; ?>" />
                                                <input type="hidden" name="time" id="id" value="<?php echo date('H:i:s'); ?>" />
                                                <input type="hidden" name="date" id="id" value="<?php echo date('Y-m-d'); ?>" />
                                                <input type="hidden" name="doctorid" id="id" value="<?php echo $name; ?>" />
                                    
                                                <div class="form-group">
                                                    <div class="col-sm-7"></div>
                                                    <div class="col-sm-2">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <button type="submit" name='save' class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                    <?php 
                                        echo form_close();
                                        
                                    ?>
                                    </div>
                            </div>
                        </div>
                            
<!-- display mortor skills -->
                            <div id="mortor" class="tab-pane fade">
                                <div class="white_back">
                                    <h3 class="text-center">Mortor Skills</h3><hr>
                                        <div id="mortor_table">
                                    <?php
                                        foreach ($getMotor as $Motor):
                                            if($patient_id == $Motor->patient_id)
                                            {
                                    ?>
                                                <table class="table table-condensed table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>Gross</td>
                                                            <td><?php echo $Motor->gross; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Fine</td>
                                                            <td><?php echo $Motor->fine; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Social</td>
                                                            <td><?php echo $Motor->social; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Feeding</td>
                                                            <td><?php echo $Motor->feeding; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dressing</td>
                                                            <td><?php echo $Motor->dressing; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Toileting</td>
                                                            <td><?php echo $Motor->toileting; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Independence</td>
                                                            <td><?php echo $Motor->independence; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Behaviors/Personality</td>
                                                            <td><?php echo $Motor->personality; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Stereotypic behavior</td>
                                                            <td><?php echo $Motor->stereotypic_behaviors; ?> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>


                                    <?php 
                                        }
                                        endforeach;
                                    ?>
                                        </div>
                                        <div id="mortor_form">
                                    <?php 
                                        $attri = array(
                                            'class'=>'form-horizontal'
                                        );
                                        echo form_open('DoctorView/add_motor_skills',$attri);
                                    ?>

                                    <div class="form-group">
                                        <label for="gross" class="col-sm-3 control-label">Gross </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Type or Select" name="gross" list="gross" required >
                                            <datalist id="gross">
                                                <option value="Delayed">Delayed</option>
                                                <option value="No concern">No concern</option>
                                                <option value="Sitting">Sitting</option>
                                                <option value="Walking">Walking</option>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fine" class="col-sm-3 control-label">Fine</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Type or Select" name="fine" list="fine" required >
                                            <datalist id="fine">
                                                <option value="Pincer grasp">Pincer grasp</option>
                                                <option value="Palmer grasp">Palmer grasp</option>
                                                <option value="Holding Pencile">Holding Pencile</option>
                                                <option value="Holding Spoon">Holding Spoon</option>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="social" class="col-sm-3 control-label">Social</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="social" class="form-control"   placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="feeding" class="col-sm-3 control-label"> Feeding</label>
                                        <div class="col-sm-9">
                                            <select name="feeding" class="form-control" id="color">
                                                <option value="No Concern">No Concern</option>
                                                <option value="Need Support">Need Support</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dressing" class="col-sm-3 control-label"> Dressing</label>
                                        <div class="col-sm-9">
                                            <select name="dressing" class="form-control" id="color">
                                                <option value="No Concern">No Concern</option>
                                                <option value="Need Support">Need Support</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="toiletting" class="col-sm-3 control-label"> Toiletting</label>
                                        <div class="col-sm-9">
                                            <select name="toiletting" class="form-control" id="color">
                                                <option value="No Concern">No Concern</option>
                                                <option value="Need Support">Need Support</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="independence" class="col-sm-3 control-label"> Independence</label>
                                        <div class="col-sm-9">
                                            <select name="independence" class="form-control" id="color">
                                                <option value="Like to be alone">Like to be alone</option>
                                                <option value="Like to be with others">Like to be with others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="behavior" class="col-sm-3 control-label"> Behaviors / Personality</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Type or Select" name="behavior" list="behavior" required >
                                            <datalist id="behavior">
                                                <option value="Get angry easily">Get angry easily</option>
                                                <option value="Temper tantrum">Temper tantrum</option>
                                                <option value="Friendly">Friendly</option>
                                                <option value="Calm">Calm</option>
                                                <option value="Easily Distracted">Easily Distracted</option>
                                                <option value="Head Banging">Head Banging</option>
                                                <option value="Throwing">Throwing</option>
                                                <option value="Bitting">Bitting</option>
                                                <option value="Hitting">Hitting</option>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="stereotypic" class="col-sm-3 control-label">Stereotypic Behaviors</label>
                                        <div class="col-sm-9">
                                            <select name="stereotypic" class="form-control" id="color">
                                                <option value="Spinning">Spinning</option>
                                                <option value="Spin Wheels">Spin Wheels</option>
                                                <option value="Put every thing in order">Put every thing in order</option>
                                                <option value="Tip toe walking">Tip toe walking</option>
                                                <option value="Flapping">Flapping</option>
                                                <option value="Shaking Body">Shaking Body</option>
                                                <option value="Difficult to change routing">Difficult to change routing</option>
                                                <option value="Self stimulation behaviors">Self stimulation behaviors</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="patientid" id="id" value="<?php echo $patient_id; ?>" />
                                    <input type="hidden" name="time" id="id" value="<?php echo date('H:i:s'); ?>" />
                                    <input type="hidden" name="date" id="id" value="<?php echo date('Y-m-d'); ?>" />
                                    <input type="hidden" name="doctorid" id="id" value="<?php echo $name; ?>" />
                                    
                                    <div class="form-group">
                                        <div class="col-sm-7"></div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit" name='save' class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>

                                <?php 
                                    echo form_close();
                                    
                                ?>

                                    </div>
                            </div>
                        </div>

<!-- display cognative skills --> 
                            <div id="cog" class="tab-pane fade">
                                <div class="white_back">
                                    <h3 class="text-center">Cognitive and Communication development</h3><hr>
                                        <div id="cog_table">
                                    <?php
                                        foreach ($getCog as $Cognitive):
                                            if($patient_id == $Cognitive->patient_id)
                                            {
                                    ?>
                                                <table class="table table-condensed table-bordered " >
                                                    <tbody>
                                                        <tr>
                                                            <td>Problem solving : Building blocks</td>
                                                            <td><?php echo $Cognitive->problem_solving; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Matching / Sorting</td>
                                                            <td><?php echo $Cognitive->matching; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Colors</td>
                                                            <td><?php echo $Cognitive->colors; ?> </td>
                                                        </tr>
                                                         <tr>
                                                            <td>Sizes</td>
                                                            <td><?php echo $Cognitive->sizes; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sequencing</td>
                                                            <td><?php echo $Cognitive->sequencing; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="active">Numbers</td>

                                                        </tr>
                                                        <tr>
                                                            <td>Counting</td>
                                                            <td><?php echo $Cognitive->counting; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Concept</td>
                                                            <td><?php echo $Cognitive->concept; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Memory/Tecognition</td>
                                                            <td><?php echo $Cognitive->memory; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Play/Iterests/Hobbies</td>
                                                            <td><?php echo $Cognitive->hobbies; ?> </td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                                <table class="table table-condensed table-bordered " >
                                                    <tbody>
                                                        <tr>
                                                            <td>Interaction</td>
                                                            <td><?php echo $Cognitive->interaction; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Babble</td>
                                                            <td><?php echo $Cognitive->babble; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>First Words</td>
                                                            <td><?php echo $Cognitive->first_word; ?> </td>
                                                        </tr>
                                                         <tr>
                                                            <td>Words Together</td>
                                                            <td><?php echo $Cognitive->word_together; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Expressing Needs</td>
                                                            <td><?php echo $Cognitive->eppressing_needs; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nursery/School/College/Work</td>
                                                            <td><?php echo $Cognitive->school; ?> </td>
                                                        </tr>

                                                    </tbody>
                                                </table>


                                    <?php 
                                        }
                                            endforeach;
                                    ?>
                                    </div>
                                    <div id="cog_form">

                                    <?php 
                                        $attri = array('class'=>'form-horizontal');
                                        echo form_open('DoctorView/add_cognitive_skills',$attri);
                                    ?>

                                            <div class="form-group">
                                                <label for="problem" class="col-sm-3 control-label">Problem Solving: Building blocks </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Type or Select" name="problem" list="problem" required >
                                                    <datalist id="problem">
                                                        <option value="Put blocks in order">Put blocks in order</option>
                                                        <option value="Make Towers">Make Towers</option>
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="maching" class="col-sm-3 control-label">Maching / Sorting</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Type or Select" name="maching" list="maching" required >
                                                    <datalist id="maching">
                                                        <option value="Picture to picture">Picture to picture</option>
                                                        <option value="Picture to Word">Picture to Word</option>
                                                        <option value="Word to word">Word to word</option>
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="colors" class="col-sm-3 control-label">Colors</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="colors" class="form-control"   placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="sizes" class="col-sm-3 control-label"> Sizes </label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" name="sizes" value="Big" >&nbsp;&nbsp; Big <br/>
                                                    <input type="checkbox" name="sizes" value="Small">&nbsp;&nbsp; Small <br/>
                                                    <input type="checkbox" name="sizes" value="Short" >&nbsp;&nbsp; Short <br/>
                                                    <input type="checkbox" name="sizes" value="Long">&nbsp;&nbsp; Long <br/>
                                                    <input type="checkbox" name="sizes" value="Tall">&nbsp;&nbsp; Tall <br/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="sequencing" class="col-sm-3 control-label">Sequencing</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="sequencing" class="form-control"   placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="numbering" class="col-sm-3 control-label"> Numbers</label>
                                                <div class="col-sm-9">
                                                    <div class="col-sm-6">
                                                        <div class="col-sm-5">Counting: </div>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="counting" class="form-control"   placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="col-sm-5">Concept: </div>
                                                        <div class="col-sm-7">
                                                            <select name="concept" class="form-control" id="color">
                                                                <option value="Positive">Positive</option>
                                                                <option value="Negative">Negative</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="memory" class="col-sm-3 control-label"> Memory / tecognition</label>
                                                <div class="col-sm-9">
                                                    <select name="memory" class="form-control" id="color">
                                                        <option value="Recognize familier faces">Recognize familier faces</option>
                                                        <option value="Poor">Poor</option>
                                                        <option value="Good">Good</option>
                                                        <option value="Fine">Fine</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="play" class="col-sm-3 control-label"> Play / Interests / Hobbies</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Type or Select" name="play" list="play" required >
                                                    <datalist id="play">
                                                        <option value="Pretend Play">Pretend Play</option>
                                                        <option value="Water">Water</option>
                                                        <option value="Sand">Sand</option>
                                                        <option value="Music">Music</option>
                                                        <option value="TV">TV</option>
                                                        <option value="Videos">Videos</option>
                                                        <option value="Animals">Animals</option>
                                                        <option value="Vehicals">Vehicals</option>
                                                        <option value="Solitary Play">Solitary Play</option>
                                                    </datalist>
                                                </div>
                                            </div>

                                            <h4>Communication Development</h4><hr>
                                            <div class="form-group">
                                                <label for="interaction" class="col-sm-3 control-label">Interaction</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="interaction" class="form-control"   placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="babble" class="col-sm-3 control-label">Babble</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="babble" class="form-control"   placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="firstWord" class="col-sm-3 control-label">First Word</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="firstWord" class="form-control"   placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="wordTogether" class="col-sm-3 control-label">Word Together</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="wordTogether" class="form-control"   placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="expressingNeeds" class="col-sm-3 control-label">Expressing Needs</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="expressingNeeds" class="form-control"   placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="school" class="col-sm-3 control-label"> Nursery / School / 
                                                work </label>
                                                <div class="col-sm-9">
                                                    <select name="school" class="form-control" id="color">
                                                        <option value="Disterbed">Disterbed</option>
                                                        <option value="Poor">Poor</option>
                                                        <option value="Good">Good</option>
                                                        <option value="Fine">Fine</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <input type="hidden" name="patientid" id="id" value="<?php echo $patient_id; ?>" />
                                            <input type="hidden" name="time" id="id" value="<?php echo date('H:i:s'); ?>" />
                                            <input type="hidden" name="date" id="id" value="<?php echo date('Y-m-d'); ?>" />
                                            <input type="hidden" name="doctorid" id="id" value="<?php echo $name; ?>" />
                                    
                                            <div class="form-group">
                                                <div class="col-sm-7"></div>
                                                <div class="col-sm-2">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="submit" name='save' class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                    <?php 
                                        echo form_close();
                                        
                                    ?>
                                    </div>
                                </div>
                            </div>

<!-- display cognative skills --> 
                            <div id="case_notes" class="tab-pane fade">
                                <div class="white_back">
                                    <h3 class="success">Case notes</h3><hr>
                                        <div id="notes_table">
                                    <?php
                                        foreach ($getNotes as $Notes):
                                            if($patient_id == $Notes->patient_id)
                                            {
                                    ?>
                                                <table class="table table-condensed table-bordered " >

                                                    <tbody>

                                                        <tr>
                                                            <td><?php echo $Notes->note; ?> </td>
                                                        </tr>

                                                        </tbody>
                                                </table>


                                    <?php 
                                        }endforeach;
                                    ?>
                                        </div>
                                        <div id="notes_form">
                                    <?php 
                                        $attri = array('class'=>'form-horizontal');
                                        echo form_open('DoctorView/add_case_notes',$attri);
                                    ?>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <textarea name="cese_notes" class="form-control"   placeholder=""></textarea>
                                                </div>
                                            </div>  


                                            <input type="hidden" name="patientid" id="id" value="<?php echo $patient_id; ?>" />
                                            <input type="hidden" name="time" id="id" value="<?php echo date('H:i:s'); ?>" />
                                            <input type="hidden" name="date" id="id" value="<?php echo date('Y-m-d'); ?>" />
                                            <input type="hidden" name="doctorid" id="id" value="<?php echo $name; ?>" />
                                    
                                            <div class="form-group">
                                                <div class="col-sm-7"></div>
                                                <div class="col-sm-2">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="submit" name='save' class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                    <?php 
                                        echo form_close();                                        
                                    ?>                                        
                                        </div>
                                </div>
                            </div>
                        </div>                                              
      
                    </div>
                </div>  

<!-- medications -->
                <div id="medication" style="display: none" >

                </div>
  
<!-- goals -->
                <div id="goals" style="display: none" >
                    
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a data-toggle="pill" href="#setGoals">Set Goals</a></li>
                        <li><a data-toggle="pill" href="#EvaluateGols">Evaluate Goals</a></li>
                    </ul>
                        
<!-- display tab pane body -->
                    <div class="tab-content">

                        <div id="setGoals" class="tab-pane fade in active">
                                <div class="white_back container">
                                <h3 class="text-center">Set Goals</h3><hr>
                                    <?php 
                                        $attri = array('class'=>'form-horizontal');
                                        echo form_open('DoctorView/add_goals',$attri);
                                    ?>

                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <select name="type1" class="form-control">
                                                        <option value="Clinical">Clinical</option>
                                                        <option value="Phsycologycal">Phsycologycal</option>
                                                        <option value="Educational">Educational</option>
                                                    </select>
                                                    
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="goal1" class="form-control"   placeholder="Goal">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="criteria1" class="form-control"   placeholder="criteria">
                                                </div>
                                                <input type="hidden" name="doc[0][patient_id]" id="id" value="<?php echo $patient_id; ?>" />
                                                    <input type="hidden" name="doc[0][time]" id="id" value="<?php echo date('H:i:s'); ?>" />
                                                    <input type="hidden" name="doc[0][date]" id="id" value="<?php echo date('Y-m-d'); ?>" />
                                                    <input type="hidden" name="doc[0][doc_name]" id="id" value="<?php echo $name; ?>" />
                                            </div> 
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <select name="type2" class="form-control">
                                                        <option value="Clinical">Clinical</option>
                                                        <option value="Phsycologycal">Phsycologycal</option>
                                                        <option value="Educational">Educational</option>
                                                    </select>
                                                    
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="goal2" class="form-control"   placeholder="Goal">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="criteria2" class="form-control"   placeholder="criteria">
                                                </div>
                                                
                                                    <input type="hidden" name="doc[1][patient_id]" id="id" value="<?php echo $patient_id; ?>" />
                                                    <input type="hidden" name="doc[1][time]" id="id" value="<?php echo date('H:i:s'); ?>" />
                                                    <input type="hidden" name="doc[1][date]" id="id" value="<?php echo date('Y-m-d'); ?>" />
                                                    <input type="hidden" name="doc[1][doc_name]" id="id" value="<?php echo $name; ?>" />
                                            </div> 
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <select name="type3" class="form-control">
                                                        <option value="Clinical">Clinical</option>
                                                        <option value="Phsycologycal">Phsycologycal</option>
                                                        <option value="Educational">Educational</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="goal3" class="form-control"   placeholder="Goal">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="criteria3" class="form-control"   placeholder="criteria">
                                                </div>
                                                    <input type="hidden" name="doc[2][patient_id]" id="id" value="<?php echo $patient_id; ?>" />
                                                    <input type="hidden" name="doc[2][time]" id="id" value="<?php echo date('H:i:s'); ?>" />
                                                    <input type="hidden" name="doc[2][date]" id="id" value="<?php echo date('Y-m-d'); ?>" />
                                                    <input type="hidden" name="doc[2][doc_name]" id="id" value="<?php echo $name; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <select name="type4" class="form-control">
                                                        <option value="Clinical">Clinical</option>
                                                        <option value="Phsycologycal">Phsycologycal</option>
                                                        <option value="Educational">Educational</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="goal4" class="form-control"   placeholder="Goal">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="criteria4" class="form-control"   placeholder="criteria">
                                                </div>
                                                    <input type="hidden" name="doc[3][patient_id]" id="id" value="<?php echo $patient_id; ?>" />
                                                    <input type="hidden" name="doc[3][time]" id="id" value="<?php echo date('H:i:s'); ?>" />
                                                    <input type="hidden" name="doc[3][date]" id="id" value="<?php echo date('Y-m-d'); ?>" />
                                                    <input type="hidden" name="doc[3][doc_name]" id="id" value="<?php echo $name; ?>" />
                                            </div> 
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <select name="type5" class="form-control">
                                                        <option value="Clinical">Clinical</option>
                                                        <option value="Phsycologycal">Phsycologycal</option>
                                                        <option value="Educational">Educational</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="goal5" class="form-control"   placeholder="Goal">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="criteria5" class="form-control"   placeholder="criteria">
                                                </div>
                                                    
                                                <input type="hidden" name="doc[4][patient_id]" id="id" value="<?php echo $patient_id; ?>" />
                                                    <input type="hidden" name="doc[4][time]" id="id" value="<?php echo date('H:i:s'); ?>" />
                                                    <input type="hidden" name="doc[4][date]" id="id" value="<?php echo date('Y-m-d'); ?>" />
                                                    <input type="hidden" name="doc[4][doc_name]" id="id" value="<?php echo $name; ?>" />
                                            </div> 
                                            <input type="hidden" name="patientid" id="id" value="<?php echo $patient_id; ?>" />
                                            <input type="hidden" name="time" id="id" value="<?php echo date('H:i:s'); ?>" />
                                            <input type="hidden" name="date" id="id" value="<?php echo date('Y-m-d'); ?>" />
                                            <input type="hidden" name="doc_name" id="id" value="<?php echo $name; ?>" />
                                            <div class="form-group">
                                                <div class="col-sm-7"></div>
                                                <div class="col-sm-2">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="submit" name='save' class="btn btn-primary">Submit</button>
                                                </div>
                                                    
                                            </div>

                                    <?php 
                                        echo form_close();                                        
                                    ?> 

                                </div>
                            </div>
                        
                            <div id="EvaluateGols" class="tab-pane fade">
                                <div class="white_back container">
                                    <h4> Evaluvate Goals</h4><hr>
<!--                                    <form method="get" >-->
                                   <?php 
                                        $attri = array('class'=>'form-horizontal');
                                        echo form_open('DoctorView/add_goal_marks',$attri);
                                    ?>
                                    <?php
                                        foreach ($goals as $goals):
                                            if($goals->patient_id == $patient_id){
                                                    //if($goals->type == 'Clinical'){
                                    ?>
                                    <div class="col-lg-12">
                                        <div class="col-lg-5"><?php echo $goals->goal;?></div>
                                        <div class="col-lg-7">
                                            <input type="hidden" name="goal<?php echo $goals->sequence;?>" value="<?php echo $goals->goal;?>" />
                                            <img src="<?php echo base_url('asserts/images/range.png'); ?>" />
                                            <input class="range" type="range" name="mark<?php echo $goals->sequence;?>" min="0" max="10" step="1" value="0" />
                                        </div>
                                        <div class="col-lg-12 info">
                                            <div class="col-lg-3">
                                                Evaluation Criteria :
                                            </div>
                                            <div class="col-lg-9">
                                                <?php echo $goals->criteria;?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php
                                                    
                                                //}
                                            }
                                        endforeach;
                                    ?>
                                    
                                    <input type="hidden" name="patientid" id="id" value="<?php echo $patient_id; ?>" />
                                    <input type="hidden" name="time" id="id" value="<?php echo date('H:i:s'); ?>" />
                                    <input type="hidden" name="date" id="id" value="<?php echo date('Y-m-d'); ?>" />
                                    <input type="hidden" name="doc_name" id="id" value="<?php echo $name; ?>" />
                                    <div class="form-group">
                                        <div class="col-sm-7"></div>
                                        <div class="col-sm-2">
                                            <br/>
                                            <br/>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        </div>
                                        <div class="col-sm-3">
                                            <br/>
                                            <br/>
                                            <button type="submit" name='save' class="btn btn-primary">Save Marks</button>
                                        </div>

                                    </div>

                                    <?php 
                                        echo form_close();                                        
                                    ?> 
<!--                                    </form>-->
                                </div>
                                                                
                            </div>
                    
                            
                    </div>
                </div>
                    
<!-- progress -->
                <div id="progress" style="display: none" >
                    <div class="white_back container">
                        <script type="text/javascript" src="<?php echo base_url() . "asserts/js/Chart.min.js" ?>"></script>
<!--                        <script type="text/javascript" src="js/Chart.min.js"></script>-->
                        <script type="text/javascript">
                            function random_rgba() {
                                var letters = '012345'.split('');
                                var color = '#';        
                                color += letters[Math.round(Math.random() * 5)];
                                letters = '0123456789ABCDEF'.split('');
                                for (var i = 0; i < 5; i++) {
                                    color += letters[Math.round(Math.random() * 15)];
                                }
                                return color;
                            }
                            function ArrNoDupe(a) {
                                var temp = {};
                                for (var i = 0; i < a.length; i++)
                                    temp[a[i]] = true;
                                var r = [];
                                for (var k in temp)
                                    r.push(k);
                                return r;
                            }
                            function getGraphData(){
                                $.ajax({
                                    url: 'http://[::1]/new4/NiceAdmin/DoctorView/getGraphData/',
                                    type: "POST",
                                    data: {graph:"graph"},
                                    success: function(one) {
                                        var two = [];
                                        var x = one.split(']');
                                        for(var i=0 ; i<x.length-1;i++){
                                            two[i] = JSON.parse(x[i]+']');
                                        }
                                        var marks = [];
                                        var goal = [];
                                        var goalDup = [];
                                        var date = [];
                                        var noDupes = [];
                                        var marksDup = [];
                                        var marks = [];
                                        for(var z = 0;z<two.length;z++){
                                            for(var i =0;i<two[z].length;i++) {
                                                    goalDup.push("" + two[z][i].goal);
                                                    marksDup.push(two[z][i].marks);
                                                    date.push(two[z][i].date);
                                                    noDupes = ArrNoDupe(date);
                                                    goal = ArrNoDupe(goalDup);
                                            }
                                            marks.push(noDupes[z]);
                                            marks.push(marksDup);
                                            marksDup = [];
                                        }
            
                                        var chartdata = {
                                                labels: goal                                                                                                     
                                            };
                                        var datasetValue = [];
                                        var color ;
                                        for(var i = 0; i < marks.length; i++){
                                            if(marks[i].length===10){
                                                    var color = random_rgba();
                                                    datasetValue.push({
                                                        label: ""+marks[i],
                                                        fill: false,
                                                        lineTension: 0.1,
                                                        backgroundColor: ""+color,
                                                        borderColor: ""+color,
                                                        pointHoverBackgroundColor: ""+color,
                                                        pointHoverBorderColor: ""+color,
                                                        data: marks[i+1]
                                                    });
                                            }
                                        }
                                        chartdata.datasets = datasetValue;
                                        var ctx = $("#mycanvas");
                                            var LineGraph = new Chart(ctx, {
                                                    type: 'line',
                                                    data: chartdata
                                            }); 
                                    },
                                    error : function(data) {
                                    }
                                });
                            }
                            getGraphData();
                        
                        </script>
                        <div class="col-lg-12">
                            <div id="chart_div"></div>
                            <div class="chart-container">
                                <canvas id="mycanvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

<!-- notes -->
                <div id="notes" style="display: none" >
                    <div class="white_back container">
                        <h4> Doctor's Notes</h4><hr>
<!--                                    <form method="get" >-->
                                   <?php 
                                        $attri = array('class'=>'form-horizontal');
                                        echo form_open('DoctorView/add_doc_notes',$attri);
                                    ?>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <textarea name="doc_notes" class="form-control"   placeholder=""></textarea>
                                        </div>
                                    </div>  
                                    
                                    <input type="hidden" name="patientid" id="id" value="<?php echo $patient_id; ?>" />
                                    <input type="hidden" name="time" id="id" value="<?php echo date('H:i:s'); ?>" />
                                    <input type="hidden" name="date" id="id" value="<?php echo date('Y-m-d'); ?>" />
                                    <input type="hidden" name="doc_name" id="id" value="<?php echo $name; ?>" />
                                    <div class="form-group">
                                        <div class="col-sm-7"></div>
                                        <div class="col-sm-2">
                                            <br/>
                                            <br/>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        </div>
                                        <div class="col-sm-3">
                                            <br/>
                                            <br/>
                                            <button type="submit" name='save' class="btn btn-primary">Save Note</button>
                                        </div>

                                    </div>

                                    <?php 
                                        echo form_close();                                        
                                    ?> 
<!--                                    </form>-->
                    </div>
                </div>

<!-- refernces -->
                <div id="references" style="display: none" >
                        <?php
                            foreach ($patients as $patient):
                                if($patient->patient_id == $patient_id)
                                {
                                    $patient_name = $patient->patient_name;
                                    $patient_name = $patient->age;
                        ?>
                                    <div class="col-md-12">
                                        <div class="white_back">
                                
                                            <h2 class="text-center">Reference form</h2><hr>
                                            <form action="<?php echo site_url('Form2');?>" method="post" target="_blank">
                                                
                                                <div class="form-group col-sm-6">
                                                    <label for="date">Date:</label>
                                                    <input type="text" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" placeholder="Enter clinic number" readonly>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="clno">Clinic No:</label>
                                                    <input type="text" class="form-control" name="clinic" placeholder="Enter clinic number">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="ref">Ref.Name:</label>
                                                    <input type="text" class="form-control" name="ref"  value="<?php echo $patient->patient_name; ?>" placeholder="Enter Reference name">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="age">Age:</label>
                                                    <input type="text" class="form-control" name="age" value="<?php echo $patient->age ; ?>" placeholder="Enter Age">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="des">Description:</label>
                                                    <textarea class="form-control" rows="5" name="des"></textarea>
                                                </div>
                                                <div class="form-group">
                                                   <button type="submit" class="btn btn-info" >Submit</button>
                                                </div>
                                                <input type="hidden" name="patientid" id="id" value="<?php echo $patient_id; ?>" />
                                                <input type="hidden" name="doc_name" id="id" value="<?php echo $name; ?>" />
                                                
                                            </form>
                                
                                        </div>
                                    </div>

                        <?php
                                }
                            endforeach;
                        ?>
                    </div>
  
<!-- cognitive test -->
                <div id="cognitiveTest" style="display: none" >
                    <div class="white_back container">
                        
                        <h3 class="text-center">Cognitive Test</h3><hr>
                        
                        <form name="myform" id="myform" action="<?php echo base_url() ?>CogTestQuiz/getTest/" method="post" target="_blank" >
                            <div class="form-group">
                                <label for="title" class="col-sm-4 control-label text-center">Select Test Type</label>
                                <div class="col-sm-4">
                                    <select name="testType" class="form-control" id="color" required>
                                        <option value="A">Test A</option>
                                        <option value="B">Test B</option>
                                    </select>
                                </div>
                                <input type="hidden" name="patientid" id="patientcogid" value="<?php echo $patient_id; ?>" />
                                <div class="col-sm-4">
                                    <button type="button" id="start" class="btn btn-info" onclick="javascript: submit()" >Start Test Now</button>
                                </div>
                            </div>
                            <div class="form-group"></div>
                        </form>
                        
                    </div>
                    <div class="white_back container">
                        
                        <h3 class="text-center">Cognitive Test Marks</h3><hr>
                        
                        <div id="cognitive_marks">
                           
                            <div class="col-lg-6 panel panel-info">
                                <div class="panel-heading">Patient Answers : Test A</div>
                                <div class="panel-body" id="cogtestmarks_A">
                                    
                                </div>
                            </div>
                
                            <div class="col-lg-6 panel panel-info">
                                <div class="panel-heading">Patient Answers : Test B</div>
                                <div class="panel-body" id="cogtestmarks_B">
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>

<!-- discharge -->
                <div id="discharge" style="display: none" ></div>
                
                            
            </div>
            
<!-- Tile navigation -->
            <div class="col-lg-4">
                <div class="col-sm-2 col-icon-box " onclick="viewPatients()" >
                    <img src="<?php echo base_url()."asserts/images/icons/patient.png"; ?>" class="img-thumbnail" width="100px" height="100px" />
                    <div class="overlay">
                        <div class="text">View Patient</div>
                    </div>
                </div>
                <div class="col-sm-2 col-icon-box "  onclick="diagnosis()">
                    <img src="<?php echo base_url()."asserts/images/icons/diagnosis.png"; ?>" class="img-thumbnail" width="100px" height="100px" />
                    <div class="overlay">
                        <div class="text">Diagnosis</div>
                    </div>
                </div>
                <div class="col-sm-2 col-icon-box "  onclick="problem()">
                    <img src="<?php echo base_url()."asserts/images/icons/problem.png"; ?>" class="img-thumbnail" width="100px" height="100px" />
                    <div class="overlay">
                        <div class="text">Problem</div>
                    </div>
                </div>
                <div class="col-sm-2 col-icon-box "  onclick="caseHistory()">
                    <img src="<?php echo base_url()."asserts/images/icons/medical_history_icon.jpg"; ?>" class="img-thumbnail" width="100px" height="100px" />
                    <div class="overlay">
                        <div class="text">Case History</div>
                    </div>
                </div>
                <div class="col-sm-2 col-icon-box " onclick="medication()">
                    <img src="<?php echo base_url()."asserts/images/icons/medicine.png"; ?>" class="img-thumbnail" width="100px" height="100px" />
                    <div class="overlay">
                        <div class="text">Medications</div>
                    </div>
                </div>
                <div class="col-sm-2 col-icon-box " onclick="goals()">
                    <img src="<?php echo base_url()."asserts/images/icons/goal.png"; ?>" class="img-thumbnail" width="100px" height="100px" />
                    <div class="overlay">
                        <div class="text">Set Goals</div>
                    </div>
                </div>
                <div class="col-sm-2 col-icon-box "  onclick="progress()">
                    <img src="<?php echo base_url()."asserts/images/icons/progress.png"; ?>" class="img-thumbnail" width="100px" height="100px" />
                    <div class="overlay">
                        <div class="text">Progress</div>
                    </div>
                </div>
                <div class="col-sm-2 col-icon-box " onclick="notes()">
                    <img src="<?php echo base_url()."asserts/images/icons/notes.png"; ?>" class="img-thumbnail" width="100px" height="100px" />
                    <div class="overlay">
                        <div class="text">Doctor's<br/>Notes</div>
                    </div>
                </div>
                <div class="col-sm-2 col-icon-box "  onclick="references()">
                    <img src="<?php echo base_url()."asserts/images/icons/reference_letters.png"; ?>" class="img-thumbnail" width="100px" height="100px" />
                    <div class="overlay">
                        <div class="text">References</div>
                    </div>
                </div>
                <div class="col-sm-2 col-icon-box " onclick="cognitiveTest()">
                    <img src="<?php echo base_url()."asserts/images/icons/quiz.png"; ?>" class="img-thumbnail" width="100px" height="100px" />
                    <div class="overlay">
                        <div class="text">Cognitive <br/>Test</div>
                    </div>
                </div>

                <div class="col-sm-2 col-icon-box " onclick="DischargePlan()" >
                    <img src="<?php echo base_url()."asserts/images/icons/discharge_plan.png"; ?>" class="img-thumbnail" width="100px" height="100px" />
                    <div class="overlay">
                        <div class="text">Discharge<br/> Plan</div>
                    </div>
                </div>
            </div>
            
            

                
                
                
                
        </div> 
    </div>
</section>

<?php                                   ///  show/hide form/table for family andd medical history
    foreach ($getFamily as $family):
        if($patient_id == $family->patient_id){
?>
    
    <script type="text/javascript">
        document.getElementById('family_form').style.display = 'none';
        document.getElementById('family_table').style.display = 'block'; 
    </script>
<?php
        }else{
?>
    <script type="text/javascript">
        document.getElementById('family_form').style.display = 'block';
        document.getElementById('family_table').style.display = 'none';
    </script>
<?php
        }
    endforeach;
?>


<?php                           //  show/hide form/table for communication skills
    foreach ($getComm as $comm):
        if($patient_id == $comm->patient_id){
?>
    
    <script type="text/javascript">
        document.getElementById('comm_form').style.display = 'none';
        document.getElementById('comm_table').style.display = 'block';
    </script>
<?php
        }else{
?>
    <script type="text/javascript">
        document.getElementById('comm_form').style.display = 'block';
        document.getElementById('comm_table').style.display = 'none';
    </script>
<?php
        }
    endforeach;
?>


<?php                           //  show/hide form/table for mortor skills
    foreach ($getMotor as $mortor):
        if($patient_id == $mortor->patient_id){   
?>
    
    <script type="text/javascript">
        document.getElementById('mortor_form').style.display = 'none';
        document.getElementById('mortor_table').style.display = 'block';
    </script>
<?php
        }else{
?>
    <script type="text/javascript">
        document.getElementById('mortor_form').style.display = 'block';
        document.getElementById('mortor_table').style.display = 'none';
    </script>
<?php
        }
    endforeach;
?>


<?php                           //  show/hide form/table for cognative 
    foreach ($getCog as $cog):
        if($patient_id == $cog->patient_id){ 
?>
    
    <script type="text/javascript">
        document.getElementById('cog_form').style.display = 'none';
        document.getElementById('cog_table').style.display = 'block';
    </script>
<?php
        }else{
?>
    <script type="text/javascript">
        document.getElementById('cog_form').style.display = 'block';
        document.getElementById('cog_table').style.display = 'none';
    </script>
<?php
        }
    endforeach;
?>


<?php                       //  show/hide form/table for notes
    foreach ($getNotes as $notes):
        if($patient_id == $notes->patient_id){
?>
    
    <script type="text/javascript">
        document.getElementById('notes_form').style.display = 'none';
        document.getElementById('notes_table').style.display = 'block';
    </script>
<?php
        }else{
?>
    <script type="text/javascript">
        document.getElementById('notes_form').style.display = 'block';
        document.getElementById('notes_table').style.display = 'none';
    </script>
<?php
        }
    endforeach;
?>


<script src="<?php echo base_url("js/jquery-1.10.2.js"); ?>" type="text/javascript"></script>

<script type="text/javascript">
$("#start").click(function() {
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('CogTestQuiz/ViewMarks'); ?>",
        success: function(data) {
            $("#cognitive_marks").html(data);
        }
    });
});
</script>

<!-- javascript functions for tile navigation -->
<script>
    function viewPatients() {
        $("#viewPatient").show();  
        $("#caseHistory,#medication,#goals,#progress,#notes,#references,#cognitiveTest,#discharge,#problem,#diagnosis").hide();   
    }
    function caseHistory() {
        $("#caseHistory").show();
        $("#viewPatient,#medication,#goals,#progress,#notes,#references,#cognitiveTest,#discharge,#problem,#diagnosis").hide(); 
    }
    function medication() {
        $("#medication").show();
        $("#caseHistory,#viewPatient,#goals,#progress,#notes,#references,#cognitiveTest,#discharge,#problem,#diagnosis").hide();  
    }
    function goals() {
        $("#goals").show();
        $("#caseHistory,#viewPatient,#medication,#progress,#notes,#references,#cognitiveTest,#discharge,#problem,#diagnosis").hide(); 
    }
    function progress() {
        $("#progress").show();
        $("#caseHistory,#viewPatient,#medication,#goals,#notes,#references,#cognitiveTest,#discharge,#problem,#diagnosis").hide(); 
    }
    function notes() {
        $("#notes").show();
        $("#caseHistory,#viewPatient,#medication,#goals,#progress,#references,#cognitiveTest,#discharge,#problem,#diagnosis").hide(); 
    }
    function references() {
        $("#references").show();
        $("#caseHistory,#viewPatient,#medication,#goals,#progress,#notes,#cognitiveTest,#discharge,#problem,#diagnosis").hide(); 
    }
    function cognitiveTest() {
        $("#cognitiveTest").show();
        $("#caseHistory,#viewPatient,#medication,#goals,#progress,#notes,#references,#discharge,#problem,#diagnosis").hide(); 
    }
    function diagnosis() {
        $("#diagnosis").show();  
        $("#caseHistory,#medication,#goals,#progress,#notes,#references,#cognitiveTest,#viewPatient,#problem,#diagnosis").hide();   
    }
    function problem() {
        $("#problem").show();  
        $("#caseHistory,#medication,#goals,#progress,#notes,#references,#cognitiveTest,#viewPatient,#diagnosis").hide();   
    }
    function DischargePlan() {
        $("#discharge").show();  
        $("#caseHistory,#medication,#goals,#progress,#notes,#references,#cognitiveTest,#viewPatient,#problem,#diagnosis").hide();   
    }
      $(document).ready(function (){
                setInterval(getMarksB, 100);
                setInterval(getMarksA, 100);
            });
    function getMarksB(){
    $(document).ready(function(){
        var id = $('#patientcogid').attr("value");
        $.ajax({
			 url: 'http://[::1]/project/Group-07/NiceAdmin/CogTestQuiz/getMarksB/',
			 type: "POST",
			 data: {id:id},
			 success: function(data) {
                    $('#cogtestmarks_B').html(data);
             }
			});

    });
    }
    
    function getMarksA(){
    $(document).ready(function(){
        var id = $('#patientcogid').attr("value");
        $.ajax({
			 url: 'http://[::1]/project/Group-07/NiceAdmin/CogTestQuiz/getMarksA/',
			 type: "POST",
			 data: {id:id},
			 success: function(data) {
                    $('#cogtestmarks_A').html(data);
             }
			});
 
    });
    }
    
</script>