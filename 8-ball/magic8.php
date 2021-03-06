<?php
session_start();
if(isset($_POST["txtQuestion"])){
    $question = $_POST["txtQuestion"];
    }else {
    $question = "";
}

if(isset($_SESSION["PrevQuest"])){
    $PrevQuest = $_SESSION["PrevQuest"];

}else{
    $PrevQuest="";
}


$responses = array();
$responses[0] = "Ask again later";
$responses[1] = "Yes";
$responses[2] = "No";
$responses[3] = "It appears to be so";
$responses[4] = "Reply is hazy, please try again";
$responses[5] = "Yes Definitely";
$responses[6] = "What is it you really want to know?";
$responses[7] = "Outlook is good";
$responses[8] = "My sources say no";
$responses[9] = "Signs point to yes";
$responses[10] = "Don't count on it";
$responses[11] = "Cannot predict now";
$responses[12] = "As I see it is, Yes";
$responses[13] = "Better not tell you now";
$responses[14] = "Concentrate and ask again";

if($question == ""){
    $answer = "Ask me a question";
}elseif(substr($question,-1)!="?"){
    $answer = "Ask me a question with a question mark";
}elseif($PrevQuest==$question){
    $answer = "Please ask a NEW questions";
}else{
    $iResponse = mt_rand(0,14);
    $answer = $responses[$iResponse];
    $_SESSION{"PrevQuest"} = $question;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parker's Homepage</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
</head>
<body>
<header><?php include '../includes/header.php' ?></header>
<nav><?php include '../includes/nav.php' ?></nav>

<main>
    <h2>Magic 8 Ball</h2>
    <br />
    <marquee><?=$answer?></marquee>
    <br />
    <p>Ask a question:<br/>
    <form method="post" action="magic8.php">
    <input type="text" name="txtQuestion" id="txtQuestion" value="<?=$question?>" </p>
    <input type="submit" value="Ask the 8-Ball"
    </form>


</main>
<footer><?php include '../includes/footer.php' ?></footer>
</body>
</html>

