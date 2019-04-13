<?php include 'config.php';
session_start();
extract($_SESSION);
include 'header.php';
 ?>
<!DOCTYPE html>
<html>

<head>
    <!-- <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh5U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=K2D:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <!-- <link rel ="stylesheet" type ="text/css" href="./css/style.css"> -->
    <!--Import materialize.css-->
    <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="Semantic/semantic.min.js"></script>
</head>
<!--                          _
                          .-'` `}
                  _./)   /       }
                .'o   \ |       }
                '.___.'`.\    {`
                /`\_/  , `.    }
                \=' .-'   _`\  {
                 `'`;/      `,  }
                    _\       ;  }
  O HAI THERE      /__`;-...'--'

-->
<style>
#space{
	
  padding-top: 5%;
 
}
@media only screen and (max-width: 600px) {
	#space
	{
		padding-top:5%;
		padding-bottom:2%;
	}
} 

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
	#space
	{
		padding-top:5%;
		padding-bottom:2%;
	}
} 
@media only screen and (min-width: 768px) {
	#space
	{
		padding-top:5%;
		padding-bottom:2%;
	}
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
	#space
	{
		padding-top:5%;
		padding-bottom:10%;
	}
} 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
	#space
	{
		padding-top:5%;
		padding-bottom:10%;
	}
}
.center{
  color:black;
}
.det{
  padding-top:9%;
}
.date{
  width:25%;
  height:40px;
  border-color:#202021;
  border-radius:3px;
  margin:6px;
}
.submit{
  width:10%;
  height:40px;
  background-color:#202021;
  color:white;
  border-radius:3px;
  border-color:#202021;
}
.select_ven{
  
  width:15%;
  height:40px;
  border-color:#202021;
  border-radius:3px;
  margin:6px;
}
.loc{
  height:30px;
  width:20px;
}

@media screen and (max-width: 600px) {
  .det{
    padding-top:20%;
  }
  .date{
    width:63.75%;
  }
  .select_ven{
    width:30%;
  }
.submit{
  width:20%
}
}
</style>
       
<body>
<?php include 'nav.php';?>
<div id="space">
    <div class="modal-container" id="modal">
    <div class="modal">
        <a href="" class="close">X</a>
        <span class ="modal_heading">
            Event Details
        </span>
        <form method="post" action="modal.php">
            <input type="text" class="details" placeholder="Event Name" name="eventname" value="<?php echo $eventname;?>"  required /><br>
            <input type="text" class="details" placeholder="Event Description" name="eventdesc" value="<?php echo $eventdesc;?>" required /><br>
            <input type="submit" class="btnEvent" value="Add Event" name="addevent">
        </form>
    </div>
</div>
<?php 
$inp;
  extract($_POST);
  if(isset($num)==false){
    echo '<form method="post" style="padding-top:10%;width:`0pc">
            <select class="select_ven" name="ninp">';
      for ($i=1; $i <=10 ; ++$i) { 
        echo '<option value="'.$i.'">'.$i.'</option>';
      }
    echo '</select>
    <input class="submit" type="submit" name="num"/>
    </form>';
  }
?>
<?php
if(isset($num)){
     
echo  '<center>
  <form method="post" class="det" >
      <label ><font color=\'black\' style="text-inline:left;">Start time-</font></label>
      <label ><font color=\'black\'>End time</font></label><br>';
        for($i=1;$i<=$ninp;$i++){
            echo'<input type="datetime-local" class="date" name="st'.$i.'" required>
            <input type="datetime-local" class="date" name="et'.$i.'" required><br>';
    }
    echo ' <input class="submit"type="submit" name="gt"/>
   </form>   
    </center>';
}
?>
</body>
         
<?php 
$images=["https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg"];
 extract($_POST);
 if(isset($gt))
 {
     $sarr=[$st1,$st2,$st3,$st4,$st5,$st6,$st7,$st8,$st9,$st10];
     $earr=[$et1,$et2,$et3,$et4,$et5,$et6,$et7,$et8,$et9,$et10];
     
     for($k=0;isset($sarr[$k]);$k++)
     {
        $st=$sarr[$k];
        $et=$earr[$k];
    
        $err="<font color='yellow'>Venue and time slot added</font>"; 
        $que=mysqli_query($con,"select * from venue");
        $st = str_replace("T"," ",$st);
        $et = str_replace("T"," ",$et);
        $st_arr = explode(" ",$st);
        $et_arr = explode(" ",$et);
        $e = ":00";
        $et_arr[1]=$et_arr[1].$e;
        $st_arr[1]=$st_arr[1].$e;
        $_SESSION['start']= $st.$e;
        $_SESSION['end']=$et.$e;

        if($et_arr[1]<=$st_arr[1])
        echo "<script>alert(\"Enter End Time Must Be after start time\");</script>";
        echo '<center>';
        echo "<strong ><p style=\"padding:1%\">Start Time: $st - End Time: $et</p><strong>";
        echo'<div class="ui link cards" style="padding-left:5%">';
        $t=0;

    // Select venues In given time and Date range
        $hash =[];
        while( $row = mysqli_fetch_array($que, MYSQLI_ASSOC))
        {
            $vst = $row['start_time'];
            $vet = $row['end_time'];
            $name = $row['name'];
            $vst_arr = explode(" ",$vst);
            $vet_arr = explode(" ",$vet);
            
            // echo $name;
            
            $vst_arr[1] = str_replace(".000000","",$vst_arr[1]);
            $vet_arr[1] = str_replace(".000000","",$vet_arr[1]);
            if(($vst_arr[0] <= $st_arr[0] && $vet_arr[0] >= $et_arr[0])&&($vst_arr[1] <= $st_arr[1] && $vet_arr[1] >= $et_arr[1]))
            $hash[$name]=true;
            else
            $hash[$name]=false;
            // echo $hash[$name].$name;
        }
        $t=0;
        
        //Checking  everyday between given date on that Particular time for every Venue in time time Range By admin


        // echo $hash['E'];

        $que=mysqli_query($con,"select * from venue");
        
        while( $row = mysqli_fetch_array($que, MYSQLI_ASSOC))
        {
        $vst = $row['start_time'];
        $vet = $row['end_time'];
        $name = $row['name'];
        
        
        if($hash[$name]){ 
            


            $vst_arr = explode(" ",$vst);
            $vet_arr = explode(" ",$vet);
            
            
            $vst_arr[1] = str_replace(".000000","",$vst_arr[1]);
            $vet_arr[1] = str_replace(".000000","",$vet_arr[1]);
            
            $str = $st_arr[0];

            while ($str<$et_arr[0]) {
                
                $datetime = new DateTime($str);
                $datetime->modify('+1 day');
                $str = $datetime->format('Y-m-d');
                $st_ck=$str." ".$st_arr[1];
                $et_ck=$str." ".$et_arr[1];
                // echo '<br>';
                
                //Check If event Exist on THat Day if yes then Hash it false i.e. this Vennue is not Available
                
                $venqu='select * from `event` where  (((`eventstart`  between \''.$st_ck.'\' and \''.$et_ck.'\') or (`eventend` between \''.$st_ck.'\' and \''.$et_ck.'\')) and `eventvenue` = \''.$name.'\')';
                $qu=mysqli_query($con,$venqu);
                if(mysqli_num_rows($qu) != 0 )
                $hash[$name]=false;
                
            }
            if($hash[$name]==true)
                $t=1;

        }
        }
        
        //Now Display All Available Content Venue
        if ($t) {
        $i=0;
        $que=mysqli_query($con,"select * from venue");
        while( $row = mysqli_fetch_array($que, MYSQLI_ASSOC))
        {
            $vst = $row['start_time'];
            $vet = $row['end_time'];
            $name = $row['name'];
            $location=$row['location'];
            $filepath=$row['image'];
            $path="admin/".$filepath;
            if($hash[$name]){
            echo  '<div class="card">';
            echo  ' <div class="image">';
            
            
         
            echo '<img src="'.$path.'">';
        // $_SESSION['image']=$images[$i];
            echo '</div>';
            echo '<div class="content">';
            echo'<div class="header">'.$name.'</div>';
            echo '<div class="meta">';
            echo '<img src="https://image.flaticon.com/icons/svg/67/67347.svg"class="loc"/><a href="https://maps.google.com/?q='.$location.'">'.$location.'</a>';
            echo '</div>';
            echo '<div class="description">';
            echo '';
            echo '</div>';
            echo "
                <img  onclick=\"window.location.href='form1.php?ev=$name&st=$st$e&et=$et$e'\" src='./icons/add.png' style='height:25px;width:25px;' />";
            echo '</div>';
            echo '</div>';
            //$i++;
        }
        }
    }  
      if($t==0){
        // echo '<center>';
                echo  '<div class="card">';
                echo  ' <div class="image">';
                // echo '<img src="https://materializecss.com/images/sample-1.jpg">';
                // $_SESSION['image']=$images[$i];
                echo '</div>';
                echo '<div class="content">';
                echo'<div class="header">Sorry!! No Venue Available</div>';
                echo '<div class="meta">';
                // echo '<img src="https://image.flaticon.com/icons/svg/67/67347.svg" class="loc"/><a>.$Location.</a>';
                echo '</div>';
                echo '<div class="description">';
                echo 'Try Makin other Searches on other dates';
                echo '</div>';
                // echo "<a href='modal.php?ev=$name'>
                //       <img src='./icons/add.png' style='height:25px;width:25px;' />";
                echo '</div>';
                // echo '</center>';
                echo '</div>';
                
                echo'</div>';
                
      }
      echo '</center>';
      
    }
 }
    ?>
	</div>
</html>
<?php
include('footer.php');
?>