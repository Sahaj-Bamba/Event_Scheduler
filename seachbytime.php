<?php include 'config.php';
session_start();
extract($_SESSION);
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh5U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=K2D:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <link rel ="stylesheet" type ="text/css" href="./css/style.css"> -->
    <!--Import materialize.css-->
    <!-- <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script> -->

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

</style>
                
<?php 
$images=["https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg","https://materializecss.com/images/sample-1.jpg"];
 extract($_POST);
 if(isset($get))
 {

   echo $ven;
    //  echo $st ;
    //  echo '<br>';
    //  echo $et ; 
     //$que=mysqli_query($con,"select * from venue");
    
    $err="<font color='yellow'>Venue and time slot added</font>"; 
    $que=mysqli_query($con,"select * from venue");
    $st = str_replace("T"," ",$st);
    $et = str_replace("T"," ",$et);
    $st_arr = explode(" ",$st);
    $et_arr = explode(" ",$et);
    $_SESSION['start']=$st;
    $_SESSION['end']=$et;
    $e = ":00";
    $et_arr[1]=$et_arr[1].$e;
    $st_arr[1]=$st_arr[1].$e;
    $_SESSION['start']= $st.$e;
    $_SESSION['end']=$et.$e;
    // echo $st_arr[0]; 
    // echo $st,$et;

    echo'<center><div class="row">';
    while($row = mysqli_fetch_array($que, MYSQLI_ASSOC))
    {
      
        // echo 'hey';
        // echo $row['start_time'].date();
        // echo 'hey';
        $vst = $row['start_time'];
        $vet = $row['end_time'];
        $name = $row['name'];
        $vst_arr = explode(" ",$vst);
        $vet_arr = explode(" ",$vet);
        
        
        $vst_arr[1] = str_replace(".000000","",$vst_arr[1]);
        $vet_arr[1] = str_replace(".000000","",$vet_arr[1]);
        // echo $name.'<br>';
        // echo $st_arr[1].'<br>';
        // echo $et_arr[1].'<br>';
        // echo $vst_arr[1].'<br>';
        // echo $vet_arr[1].'<br>';
        $ck=($vst_arr[0] <= $st_arr[0] && $vet_arr[0] >= $et_arr[0])&&($vst_arr[1] <= $st_arr[1] && $vet_arr[1] >= $et_arr[1]);
        if($ven!=""&&$ven!=$name)
        {
          $ck=false;
        }
        // if($ck)
        // {
          //   $query = 'select * from events where evenue is '.$name;
          //   $qu=mysqli_query($con,$query);
          //   while($res = mysqli_fetch_array($query, MYSQLI_ASSOC))
          //   {
            //     $est = $res['estart'];
            //     $eet = $res['eend'];
            //     $est_arr = explode(" ",$est);
            //     $eet_arr = explode(" ",$eet);
            //     $est_arr[1] = str_replace(".000000","",$est_arr[1]);
            //     $eet_arr[1] = str_replace(".000000","",$eet_arr[1]);
            //    //if event is going on on that venue            
            //      if ((($est_arr[0] >= $st[0] && $est_arr[0] <= $et[0])||($eet_arr[0] >= $st[0] && $est_arr[0] <= $et[0]))&&(($est_arr[1] >= $st[1] && $est_arr[1] <= $et[1])||($eet_arr[1] >= $st[1] && $est_arr[1] <= $et[1]))) {
              
              //       $ck=false;
              //     }
              //   }
              // }
              if($ck)
              {
                
                $venqu='select COUNT(*) from `event` where  (((`eventstart`  between '.$st.' and '.$et.') or (`eventstart` between '.$st.' and '.$et.')) and `eventvenue` = '.$name.')';
                $qu=mysqli_query($con,$venqu);
                if($qu!=0)
                {
                  continue;
                }
                
                // echo 'hello';
                $id=$row[0];
                {
                  if ($k%4==0 && $k!=0) {
                    echo '</div>';
              echo '<div class="row">';
            }
            echo '<div class="col s12 m7">';
            echo '<div class="card small">';
            echo '<div class="card-image">';
            echo '<img src="'.$images[$i].'">';
            $_SESSION['image']=$images[$i];
            echo '<span class="card-title">Event</span>';
            echo '</div>';
            echo'<div class="card-content">';
            echo'<strong>'.$name.'</strong>';
            echo'<br>';
            echo'Time:'.$vst_arr[1].'-'.$vet_arr[1];
            echo "<a href='modal.php?ev=$name'>
            <img src='./icons/add.png' style='height:25px;width:25px;' />
            </span>
            </a>";
            echo'</div>';
            echo'</div>';
            echo'</div>';
            $k++;
          }
        }
        
        $i++;
        
      }
      echo'</center>';
      // if (!$con) {
      //   die("Connection failed: " . mysqli_connect_error());
      // }
      // echo "Connected successfully";
      
    }
    
    ?>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background:#f5f5f5;border-bottom:1px solid #ccc">
      <div class="container-fluid" >
        <div class="navbar-header">
          <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> -->
            <!-- <span class="sr-only">Toggle navigation</span> -->
            <!-- <span class="icon-bar" style="background-color: black !important;"></span> -->
            <!-- <span class="icon-bar" style="background-color: black !important;"></span> -->
            <!-- <span class="icon-bar" style="background-color: black !important;"></span> -->
          </button>

          <a class="navbar-brand" href="user.php" style="color:#337ab7"><?php echo "Welcome ".$user;?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right" >
            <li><a href="logout.php" style="color:#337ab7"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
         
        </div>
      </div>
    </nav>
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
    
    <div class="container">
    <form method="post">
    <div class="row">
<div class="col-sm-6">
	 <div class="form-group">
    <label for="exampleInputEmail1"><font color='white'>Enter Start time</font></label>
    <input type="datetime-local" class="form-control" name="st"  required>
  </div> 
  </div>
  </div>
  <div class="row">
<div class="col-sm-6">
	 <div class="form-group">
    <label for="exampleInputEmail1"><font color='white'>Enter End time</font></label>
    <input type="datetime-local" class="form-control" name="et"  required>
  </div> 
  </div>
  </div>
  
  <div class="row">
  <div class="col-sm-6">
  <div class="form-group">
 <button name="get" class="btn btn-lg btn-success btn-block" type="submit">Get it!!</button>
	
  </div>
  </div>
 </div> 
 </form>
</div>


</body>

</html>

<!-- <form action="/action_page.php">
  Birthday:
  <input type="date" name="bday">
  <input type="submit">
</form> -->