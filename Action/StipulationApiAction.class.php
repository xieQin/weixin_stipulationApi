<?php

class StipulationApiAction extends Action{

    public function index() {
        renderString("index working... ");
    }

	public function getbyapi(){
		$mgr = new StipulationCenterFacade();
		echo $mgr->getByApi();
	}

}