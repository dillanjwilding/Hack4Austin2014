<?php

class AvatarController extends Controller
{
    public function actionAdd()
    {
        if(isset($_REQUEST['submit']))
        {
            if(isset($_FILES['file']) && isset($_REQUEST['name']))
            {
                $avatar = new Avatar();
                $avatar->name = $_REQUEST['name'];
                
                $allowedExts = array('gif', 'jpeg', 'jpg', 'png');
                $temp = explode('.', $_FILES['file']['name']);
                $extension = end($temp);
                if((($_FILES['file']['type'] == 'image/gif') 
                        || ($_FILES['file']['type'] == 'image/jpeg')
                        || ($_FILES['file']['type'] == 'image/jpg')
                        || ($_FILES['file']['type'] == 'image/pjpeg')
                        || ($_FILES['file']['type'] == 'image/x-png')
                        || ($_FILES['file']['type'] == 'image/png'))
                        && ($_FILES['file']['size'] < 2000000)
                        && in_array($extension, $allowedExts))
                {
                    if($_FILES['file']['error'] > 0)
                    {

                    }
                    else
                    {
                        if(file_exists(Yii::app()->basePath.'/../images/'.$_FILES['file']['name']))
                        {

                        }
                        else
                        {
                            // Generate file name 
                            move_uploaded_file($_FILES['file']['tmp_name'], Yii::app()->basePath.'/../images/'.$_FILES['file']['name']);
                            $avatar->file = $_FILES['file']['name'];
                            // add selected file?
                            $saved = $avatar->save();
                            if($saved)
                            {
                                $data['avatar'] = $avatar;
                                $this->redirect('view/'.$avatar->id, $data);
                            }
                        }
                    }
                }                
            }
        }
        $this->render('add');
    }
    
    public function actionView($display_id = null)
    {
        if(!is_null($display_id))
        {
            $avatar = Avatar::model()->find(array(
                'alias'=>'t',
                'select'=>'t.*',
                'condition'=>'id=:id',
                'params'=>array(':id'=>$display_id)
            ));
            $data['avatar'] = $avatar;
            $this->render('view', $data);
        }
    }
    
    public function actionDelete($display_id = null)
    {
        if(!is_null($display_id))
        {
            $avatar = Avatar::model()->find(array(
                'alias'=>'t',
                'select'=>'t.*',
                'condition'=>'id=:id',
                'params'=>array(':id'=>$display_id)
            ));
            $deleted = $avatar->delete();
            if($deleted)
            {
                // redirect
            }
            $this->redirect('view'.$display_id);
        }
        // redirect
    }
}