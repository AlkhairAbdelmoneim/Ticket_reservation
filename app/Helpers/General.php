<?php
use App\Models\Students;

function getMessage($msg , $type){

    $noty = array(
        'message' => $msg,
        'alert-type' => $type
    );

    return $noty;
}

// function getLocale(){

//     return $lang =[
//         'ar',
//         'en',
//     ];

    
// }

// function getCurrentLocale(){

//     return  LaravelLocalization::getCurrentLocale();
// }

// function getDefaultLang(){

//     return Config::get('app.locale');
// }
function ProseType()
{
    $Type = [

        '1' => 'جناءية',
        '2' => 'مدنية',
        '3' => 'شرعية',
        '4' => 'إدارية',
    ];
    return $Type;
}

function getGender()
{
    $Type = [

        '1' => 'ذكر',
        '2' => 'انثى',

    ];
    return $Type;
}


// function getTime($time)
// {
//     return date_format($time , 'Y-m-d g:i') ;
// }

// function dataFilter($data){

//     $data->filter(function($value, $key){

//         return $value->description = Str::limit($value->description , 30);
        
//     }); 
    
//     return $data;
// }


