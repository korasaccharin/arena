<?php

/*
 * class DataManager
 *
 * Manage interaction between Arena and raw data (xml or BDD)
 *
 */

class DataManager {

    // XXX no constructor or destructor because DataManager is “static” class

    public static function getData() {
        $xml = new SimpleXMLElement('project/xml/players.xml', Null, True);
        $xml = simplexml_load_string($xml->asXML());
        $xml = DataManager::object2array($xml);
        $xml = $xml['player'];
        return $xml;
    }

    public static function setData() {
        trigger_error ('Data stockage not implemented');
        // save data to xml
    }

    private static function object2array($object) {
        return @json_decode(@json_encode($object),1);
    }
}
?>
