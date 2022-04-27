<?php
function time_stamp($session_time) 
{ 

$time_difference = time() - strtotime($session_time); 
$secondes = $time_difference;
/*$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); */

if($secondes < 60)
{
  
echo"il y'a quelques secondes"; 
}
elseif($secondes > 60)
{
  $minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); 
   if($minutes <60)
   {
     if($minutes == 1)
     echo"il y'a une minute"; 
    
   else
   
   echo"il y'a $minutes minutes"; 
   
}
else if($hours <24)
{
   if($hours==1)
   {
   echo"il y'a une heure";
   }
  else
  {
  echo"il y'a $hours heures";
  }
}
else if($days <7)
{
  if($days==1)
   {
   echo"il y'a un jour";
   }
  else
  {
  echo"il y'a $days jours";
  }


  
}
else if($weeks <4)
{
  if($weeks==1)
   {
   echo"il y'a une semaine";
   }
  else
  {
  echo"il y'a $weeks semaines";
  }
 }
else if($months <12)
{
   if($months==1)
   {
   echo"il y'a un mois";
   }
  else
  {
  echo"il y'a $months mois";
  }
 
   
}

else
{
if($years==1)
   {
   echo"il y'a un an";
   }
  else
  {
  echo"il y'a $years ans";
  }

}
 
} 
}

?>