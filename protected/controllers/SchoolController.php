<?php

class SchoolController extends Controller
{
    public function actionAdd()
    {
        $data = array();
        if(isset($_REQUEST['submit']))
        {
            if(isset($_REQUEST['name']))
            {
                $school = School::model()->find(array(
                    'select'=>'t.*',
                    'condition'=>'t.name=:name',
                    'params'=>array(':name'=>$_REQUEST['name'])
                ));
                if(is_null($school))
                {
                    $school = new School();
                    $school->name = $_REQUEST['name']; // Need to sanitize
                    $school->display_id = Toolbox::generateDisplayId(10);
                    $saved = $school->save();
                    if($saved)
                    {
                        $this->redirect('view/'.$school->display_id);
                    }
                    else
                    {
                        // Errors
                        // $data['errors'] = $errors;
                    }
                }
                else
                {
                    // Errors
                    // $data['errors'] = $errors;
                }
            }
        }
        $this->render('add', $data);
    }
    
    public function actionView($display_id = null)
    {
        if(!is_null($display_id))
        {
            $school = School::model()->find(array(
                'select'=>'t.*',
                'condition'=>'t.display_id=:display_id',
                'params'=>array(':display_id'=>$display_id)
            ));
            if(!is_null($school))
            {
                $data['school'] = $school;
                $this->render('view', $data);
            }
        }
        // Redirect?
    }
    
    public function actionEdit($display_id = null)
    {
        if(!is_null($display_id))
        {
            $school = School::model()->find(array(
                'select'=>'t.*',
                'condition'=>'t.display_id=:display_id',
                'params'=>array(':display_id'=>$display_id)
            ));
            if(!is_null($school))
            {
                if(isset($_REQUEST['submit']))
                {
                    $school->name = $_REQUEST['name'];
                    $saved = $school->save();
                    if($saved)
                    {
                        $data['school'] = $school;
                        $this->render('view', $data);
                    }

                } 
                else
                {
                    $data['school'] = $school;
                    $this->render('edit', $data);
                }
            }
        }
        // Redirect?
    }
}