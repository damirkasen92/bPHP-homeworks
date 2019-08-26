<?php
    function generate($rows, $placesPerRow, $avaliableCount) {
        if ($placesPerRow > $avaliableCount) {
            return false;
        }
        
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $placesPerRow; $j++) {
                $arr[] = false;
            }
            $array[] = $arr;
            $arr = [];
        }
        
        return $array;
    }
    
    function reserve(&$map, $row, $place) {
        if (!isset($map[$row - 1][$place - 1])) {
            
            return false;
        }

        if (!$map[$row - 1][$place - 1]) {
            $map[$row - 1][$place - 1] = true;
            
            return true;
        } else {
            return false;
        }
    }
    
    function logReserve($row, $place, $result) {
        if ($result) {
            echo "Ваше место забронировано! Ряд $row, место $place".PHP_EOL;
        } else {
            echo "Что-то пошло не так=( Бронь не удалась".PHP_EOL;
        }
    }
    
    $chairs = 50;
    $map = generate(5, 8, $chairs);
    $requiredRow = 2;
    $requiredPlace = 2;
    
    $reverve = reserve($map, $requiredRow, $requiredPlace);
    logReserve($requiredRow, $requiredPlace, $reverve);
    
    $reverve = reserve($map, $requiredRow, $requiredPlace);
    logReserve($requiredRow, $requiredPlace, $reverve);

    function searchPlace($map, $numOfPlaces) {    
        $index = 0;
        $message = "";
        
        for ($j = 0; $j < count($map); $j++) {
            if ($numOfPlaces > count($map[$j])) {
                return false;   
            }
            
            for ($i = 0; $i < count($map[$j]); $i++) {
                if ($index === $numOfPlaces) {
                    echo $message;
                    return $message;
                }
                
                if (!$map[$j][$i]) {
                    $index++;
                    $row = $j + 1;
                    $place = $i + 1;
                    $message .= "Ряд $row место $place "; 
                } else {
                    $index = 0;
                    $message = "";
                }
                
            }
            
            if ($index < $numOfPlaces) {
                $message = "";
                $index = 0;
            }
        }
    }    
    
    searchPlace($map, 2);