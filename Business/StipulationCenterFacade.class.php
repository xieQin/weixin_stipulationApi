<?php

class StipulationCenterFacade {

	public function getByApi(){
		$cache = MC();
        $d = $cache->get(STI_GROUP);
        if (null != $d) {
            return $d;
        }
        $d = CURLHandler::share()->query(sti_url_format);
        if (!empty($d)) {
            $cache->set(STI_GROUP, $d, 10);
        }

        $de = DES::share("android");
        $des_key = "JiwLYG=-";
        $data = $de->decode($d, $des_key);

        return $data;
	}
}