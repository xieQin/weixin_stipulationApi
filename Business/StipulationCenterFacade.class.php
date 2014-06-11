<?php

class StipulationCenterFacade {

	public function getApplyByApi() {
        $cache = MC();
        $d = $cache->get(STI_GROUP);
        if (null != $d) {
            return $d;
        }
        $d = CURLHandler::share()->query(getC('APPLY_ALIST_URL'));
        if (!empty($d)) {
            $cache->set(STI_GROUP, $d, 10);
        }

        $de = DES::share("android");
        $des_key = "JiwLYG=-";
        $data = $de->decode($d, $des_key);

        return $data;
    }

    public function submit($q_type, $q_name, $q_mobile, $q_money, $q_mark) {
        $de = DES::share("android");
        $des_key = "JiwLYG=-";

        $str = "0~." . $q_type . "~." . $q_name . "~." . $q_mobile . "~." . $q_money . "~." . $q_mark . "";

        $d = $de->encode($str, $des_key);
        $url = str_replace("@p", $d, getC("APPLY_ASEND_URL"));
        $d = CURLHandler::share()->query($url);
        $res = $de->decode($d, $des_key);
        return $res;
    }
}