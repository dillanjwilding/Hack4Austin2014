<?php

class GameController extends Controller
{
    public function actionPlay($display_id = null)
    {
        $question = Question::model()->find(array(
            'alias'=>'t',
            'select'=>'t.*',
            'join'=>'JOIN QuestionAnswer AS qa ON t.id = qa.question
            JOIN Answer AS a ON a.id = qa.answer',
            'condition'=>'t.id>=(SELECT FLOOR(MAX(t.id) * RAND()) FROM Question) ORDER id LIMIT 1',
            
        ));
    }
}