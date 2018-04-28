<?php
/**
 * Date: 2017/11/21
 * Time: 17:42
 */

namespace Main\Controller;


class EmptyController extends BaseController{
    public function _empty(){
        $this->display("Index/un_find");
    }
}