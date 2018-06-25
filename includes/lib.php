<?php
    // Except a string and returns all an array whose elemenets are the unique words of the string 
    // with length 4 or more.
    function extractKeywords($str){
        // First change into lower case, then remove special characters and convert it into array
        $str = explode(' ', preg_replace( '([^A-Za-z0-9 ])', '' ,strtolower($str)));

        $keywords = [];

        foreach($str as $word){
            if(strlen($word) >= 4){
                $keywords[] = $word;
            }
        }

        return array_unique($keywords);
    }

    // Get the id the of the current hotel
    // and return an array of IDs of the 
    // similar hotels
    function recommendHotels($id){
        require_once $_SERVER['DOCUMENT_ROOT'].'/models.php';
        $hotelObj = new Hotels();
        $hostArr = explode(' ', $hotelObj->getRow($id)['keywords']);
        $similarityArr = [];
        $result = $hotelObj->getTableData();
        while( $row =  $result->fetch_assoc()){
            if($id == $row['id'] || $row['location'] != $hotelObj->getRow($id)['location'])
                continue;
            $similarityArr[$row['id']] = count(array_intersect($hostArr, explode(' ', $hotelObj->getRow($row['id'])['keywords'])));
        }
        arsort($similarityArr);
        return $similarityArr;
    }
?>