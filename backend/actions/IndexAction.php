<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/6/30
 * Time: 16:08
 */

namespace backend\actions;

use yii\base\Action;
class IndexAction extends Action
{
    public $data;

    public $viewPath = null;

    public function run()
    {
        $data = $this->data;
        if ($data instanceof \Closure) {
            $data = call_user_func($this->data);
        }

        if ($this->viewPath == null) {
            $this->viewPath = $this->id;
        }

        return $this->controller->render($this->viewPath, $data);
    }
}