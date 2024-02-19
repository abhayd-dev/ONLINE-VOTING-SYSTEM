
<?php
session_start();
if(!isset($_SESSION['userdata'])){

    header("location: ../");
}
    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red" >Not Voted </b>';
    }
    else{
        $status = '<b style="color:green" > Voted </b>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<body>
    <style>
#backbtn{
    padding: 7px;
    margin:10px;
    border-radius: 5px;
    background-image: linear-gradient(to right, rgba(68, 0, 255, 0.89), rgb(238, 10, 10));
    color: aliceblue;
    font-size: 15px;
    float:left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
#logoutbtn{
    padding: 7px;
    margin:10px;
    border-radius: 5px;
    background-image: linear-gradient(to right, rgba(68, 0, 255, 0.89), rgb(238, 10, 10));
    color: aliceblue;
    font-size: 15px;
    float:right;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
#Profile{
    background-color:white;
    width:30%;
    padding: 20px;
    margin:15px;
   float:left;
    box-sizing:border-box;
}
#Group{
    background-color:white;
    width:60%;
    padding: 20px;
    margin:15px;
    float:right;
    box-sizing:border-box;
}
#votebtn{
    padding: 7px;
    margin:10px;
    border-radius: 5px;
    background-image: linear-gradient(to right, rgba(64, 9,211, 0.89), rgb(232, 5, 5));
    color: aliceblue;
    font-size: 15px;

}
#mainsection{
    padding:10px;
}
#voted{
    padding: 7px;
    margin:10px;
    border-radius: 5px;
    background:green;
    color: aliceblue;
    font-size: 15px;


}

    </style>
    <center>

    <div id="mainsection">

<div id="headersection">
<a href="../"><button id="backbtn">Back</button></a>
    <a href="logout.php"> <button id="logoutbtn">Logout</button></a>
        <img id="img1" src="../image/vote.jpg">
        <h1>---Online Voting System---</h1>
 </div>

    </div>
    </center>
    <div id="bodysection">
    <div id="Profile">
       <center> <img src="../upload/<?php
        echo $userdata['photo'];
        ?>" height="100px" width=100px></center><br><br>
        <b>Name:</b>
        <?php
        echo $userdata['name'];
        ?>
        <br><br>
        <b>Mobile:</b>
        <?php
        echo $userdata['mobile'];
        ?>
        <br><br>
        <b>Address:</b>
        <?php
        echo $userdata['address'];
        ?>
        <br><br>
        <b>Status:</b>
        <?php
        echo $status;
        ?>
        <br><br>
    </div>
    <div id="Group">
    <?php
    if($_SESSION['groupsdata']){
        for ($i=0; $i<count($groupsdata); $i++){
            ?>
            <div>
            <img style="float:right;" src="../upload/<?php
            echo $groupsdata[$i]['photo']
            ?>" height="100" width="100">
             
            <b>Group Name: </b><?php
            echo $groupsdata[$i]['name']
            ?><br><br>
            <b>Votes:</b>
            <?php
            echo $groupsdata[$i]['votes']
            ?><br><br>
            
            <form action="../api/vote.php" method="POST">
            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>" >
            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>" >
            <?php
            if($_SESSION['userdata']['status']==0){
                ?>
                <input type="submit" name="votebtn" value="Vote" id="votebtn" >
                <?php
            }
            else{
                ?>
                <button disabled type="button" name="votebtn" value="Vote" id="voted" >Voted</button>
                <?php
            }
            ?>
           
            </form>
            </div>
            <hr>
            <?php
           
        }
    }
    else{

    }
    ?>

    </div>
    </div>
</div>
</body>
</html>