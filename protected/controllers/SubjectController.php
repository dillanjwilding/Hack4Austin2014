<?php

class SubjectController extends Controller
{
    public function actionIndex()
    {
        $this->redirect('browse');
    }
    
    public function actionBrowse()
    {
        $subjects = Subjects::model()->findAll(array(
            'alias'=>'t',
            'select'=>'t.*',
        ));
        $data['subjects'] = $subjects;
        $this->render('browse', $data);
    }
    
    public function actionView($display_id = null)
    {
        if(!is_null($display_id))
        {
            $games = Game::model()->findAll(array(
                'alias'=>'t',
                'select'=>'t.*',
                'join'=>'JOIN Subject AS s ON t.subject=s.id',
                'condition'=>'s.display_id=:display_id',
                'params'=>array(':display_id'=>$display_id)
            ));
            $data['games'] = $games;
            $this->render('view', $data);
        }
        $this->redirect('browse');
    }
}