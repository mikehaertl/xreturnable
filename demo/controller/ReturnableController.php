<?php
/**
 * This is a demonstration of the XReturnable extension.
 *
 * @author Michael Härtl <haertl.mike@googlemail.com>
 * @copyright 2009 by Michael Härtl
 * @license See http://www.yiiframework/extension/xreturnable
 * @version 1.0.2
 */
class ReturnableController extends CController {

    public function init() {
        $this->attachBehavior('returnable','XReturnable');
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionList() {
        $this->render('list');
    }

    public function actionEdit() {
        if (Yii::app()->request->isPostRequest) {

            // Perform saving here ...

            // Try to go back to last URL on return stack ...
            if (!$this->goBack())
                // ... or render 'done' view if none present
                $this->render('done');
        }

        $this->render('edit');
    }

    public function actionDelete() {
        if (Yii::app()->request->isPostRequest) {

            // Perform deletion here..

            // Try to go back to last URL on return stack ...
            if (!$this->goBack())
                // ... or render 'done' view if none present
                $this->render('done');
        }
    }

}

