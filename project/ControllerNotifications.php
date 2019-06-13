<?php
include "ModelNotifications.php";
                foreach (getchilds($_SESSION['sessionID']) as $child)
                  {
                  echo "
                <script type=\"application/javascript\">
                window.setInterval(function(){
                    var data=sessionStorage.getItem(\"data".$child->getID()."\"); 
                    xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                    if(data===this.responseText)
                        return;
                sessionStorage.setItem(\"data".$child->getID()."\",this.responseText);   
                var json=JSON.parse(this.responseText);
                function distance (la1, lo1,la2,lo2)
                {
                    theta=lo1-lo2;
                    dist=Math.sin(la1*0.017453292519943295)*Math.sin(la2*0.017453292519943295)+Math.cos(la1*0.017453292519943295)*Math.cos(la2*0.017453292519943295)*Math.cos(theta*0.017453292519943295);
                    dist=Math.acos(dist);
                    dist=dist*57.2957795;
                    miles=dist *60*1.1515;
                    return (miles * 1.609344);
                 }
                if (json.accident==1)
                {
                window.location=\"#modal3\";
                document.getElementById(\"situation\").innerHTML =\"Your child " .$child->first_name." ".$child->last_name. "  is in danger! An accident  occurred near him/her!!!\" ;
                }
                if (json.animal_close==1)
                {
                    window.location=\"#modal3\";
                    document.getElementById(\"situation\").innerHTML =\"Your child " .$child->first_name." ".$child->last_name. "  is in danger! An animal that might be dangerous is close to him/her!!!\" ;
                 }
                 if (json.collision==1)
                {
                    window.location=\"#modal3\";
                    document.getElementById(\"situation\").innerHTML =\"Your child " .$child->first_name." ".$child->last_name. "  is in danger! He/She suffered a collision with an object!!!\" ;
                 }
                 if (json.another_person==1)
                 {
                     window.location=\"#modal3\";
                     document.getElementById(\"situation\").innerHTML =\"Your child " .$child->first_name." ".$child->last_name. "  is in danger! He/She met an unknown person!!!\" ;
                  }
                  var latitude=[".implode(",", findClosePersonsLatitude($child->getID()))."];
                  var longitude=[".implode(",", findClosePersonsLongitude($child->getID()))."];
                  var len= latitude.length;
                  var ok=0;
                  console.log(distance(".getLatitude($_SESSION["sessionID"]).",".getLongitude($_SESSION["sessionID"]). ",json.latitude, json.longitude ));
                   if (  distance(".getLatitude($_SESSION["sessionID"]).",".getLongitude($_SESSION["sessionID"]). ",json.latitude, json.longitude ) < 0.3 ) 
                   {
                    ok= 1;
                    }
                    else
                    for (i=0; i<len; i++)
                    {
                        console.log(distance(latitude[i], longitude[i], json.latitude, json.longitude));
                        if (distance(latitude[i], longitude[i], json.latitude, json.longitude)<0.3)
                            ok=1;
                    }
                    if (ok==0)
                    {
                    window.location=\"#modal3\";
                    document.getElementById(\"situation\").innerHTML =\"Your child " .$child->first_name." ".$child->last_name. "  is in danger! He/She is far from all the people of interest!!!\" ;
                    }
                }
             };
        xmlhttp.open(\"GET\", \"http://localhost/Kimo-TW-Project/project/sensorApi.php?id=".$child->getID()."\", true);
        xmlhttp.send();},1000)
      </script>";
            }
        
      ?>