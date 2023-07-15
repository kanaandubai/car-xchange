<?php


namespace App\Http\Services;



class FcmNotification
{
 public function sendNotification($user=[],$title='',$body=''){
     return $title;
     $url = env('FCM_URL');

     $serverKey = env('FCM_SERVER_KEY');

     $data = [
         "registration_ids" => $user,
         "notification" => [
             "title" => $title,
             "body" => $body,
         ]
     ];
     $encodedData = json_encode($data);

     $headers = [
         'Authorization:key=' . $serverKey,
         'Content-Type: application/json',
     ];

     $ch = curl_init();

     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_POST, true);
     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
     curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
     // Disabling SSL Certificate support temporarly
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

     // Execute post
     $result = curl_exec($ch);

     if ($result === FALSE) {
         die('Curl failed: ' . curl_error($ch));
     }

     // Close connection
     curl_close($ch);

     // FCM response
     dd($result);
 }
}
