<?php

class UserController extends Controller
{
    public function actionView($display_id = null)
    {
        if(!is_null($display_id))
        {
            $user = User::model()->find(array(
                'alias'=>'t',
                'select'=>'t.*',
                //'join'=>'',
                'condition'=>'t.display_id=:display_id',
                'params'=>array(':display_id'=>$display_id)
            ));
            if(!is_null($user))
            {
                $data['user'] = $user;
                $school = School::model()->find(array(
                    'alias'=>'t',
                    'select'=>'t.*',
                    'condition'=>'t.id=:id',
                    'params'=>array(':id'=>$user->school)
                ));
                if(!is_null($school))
                {
                    $data['school'] = $school;
                    $this->render('view', $data);
                }
            }
        }
        //$this->redirect('users/browse');
    }
    
    public function actionCreate()
    {
        $data = array();
        if(isset($_REQUEST['submit']))
        {
            $user = new User();
            $user->display_id = Toolbox::generateDisplayId(10);
            if(isset($_REQUEST['username']))
            {
                $user->username = $_REQUEST['username'];
            }
            else
            {
                
            }
            if(isset($_REQUEST['password']))
            {
                $user->password = CPasswordHelper::hashPassword($_REQUEST['password']);
            }
            else
            {
                
            }
            $user->student = 1;
            // last_logged_in
            // created
            $saved = $user->save();
            if($saved)
            {
                $student = new Student();
                $student->display_id = Toolbox::generateDisplayId(10);
                if(isset($_REQUEST['school']))
                {
                    $school = School::model()->find(array(
                        'alias'=>'t',
                        'select'=>'t.id',
                        'condition'=>'t.display_id=:display_id',
                        'params'=>array(':display_id'=>$_REQUEST['school'])
                    ));
                    if(!is_null($school))
                    {
                        $student->school = $school->id;
                    }
                }
                else
                {

                }
                if(isset($_REQUEST['grade']))
                {
                    $student->grade = $_REQUEST['grade'];
                }
                if(isset($_REQUEST['avatar']))
                {
                    $avatar = Avatar::model()->find(array(
                        'alias'=>'t',
                        'select'=>'t.id',
                        'condition'=>'t.name LIKE "%:name%"',
                        'params'=>array(':name'=>$_REQUEST['avatar'])
                    ));
                    $student->avatar = $avatar->id;
                }
                $this->redirect('view/'.$user->display_id);
            }
        }
        $schools = School::model()->findAll(array(
            'alias'=>'t',
            'select'=>'t.*',
            'order'=>'name'
        ));
        $data['schools'] = $schools;
        $this->render('create', $data);
    }
    
    public function actionLogin()
    {
        if(isset($_REQUEST['login']))
        {
            if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
            {
                $identity=new UserIdentity($_REQUEST['username'], $_REQUEST['password']);
                if($identity->authenticate())
                {
                    Yii::app()->user->login($identity, 3600*24*7);
                    $this->redirect(Yii::app()->user->getReturnUrl());
                }
                else
                    echo $identity->errorMessage();
            }
        }
    }
    
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->user->getReturnUrl());
    }
    
}