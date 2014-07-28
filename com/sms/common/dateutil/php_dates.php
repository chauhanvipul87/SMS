<?php

    function getCreatedDateTime(){
        $date = new DateTime();
        return  $date->format('Y-m-d h:i:s');
    }

?>