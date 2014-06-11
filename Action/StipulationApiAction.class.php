<?php

class StipulationApiAction extends Action{

    public function apply() {
        $mgr = new StipulationCenterFacade();
        echo $mgr->getApplyByApi();
    }

    public function submitApply() {
        global $q_type,
        $q_name,
        $q_mobile,
        $q_money,
        $q_mark;
        $mgr = new StipulationCenterFacade();
        echo $mgr->submit($q_type,
        $q_name,
        $q_mobile,
        $q_money,
        $q_mark
        );
    }
}