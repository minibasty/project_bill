<?php 
        $unit_id = isset($_POST['unit_id']) ? $_POST['unit_id'] : '';
        $is = isset($_POST['is']) ? $_POST['is'] : '';
        if ($is=="dlt") {
            $url = 'https://gpsservice.dlt.go.th/masterfile/rmvByUnit/'.$unit_id;
            $key= "mirada:XNpA32WCdcUb";
            delete($url, $key);
        }elseif($is=="post"){
            $url = 'http://122.155.167.137:3000/masterfile/rmvByUnit/'.$unit_id;
            $key ="mirada.thp:mirada@2018";
        }
        function delete($url, $key){
        // $curl = curl_init($service_url);
        // curl_setopt($curl, CURLOPT_URL,$service_url);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json;charset=utf-8'));
        // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        // curl_setopt($curl, CURLOPT_USERPWD, $service_key);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        // $curl_response = curl_exec($curl);
        // if ($curl_response === false) {
        //     $info = curl_getinfo($curl);
        //     curl_close($curl);
        //     die('error occured during curl exec. Additioanl info: ' . var_export($info));
        // }
        // curl_close($curl);
        // $result = json_decode($curl_response);
        // return $result->removed_records;
        return $url;
        }

 ?>