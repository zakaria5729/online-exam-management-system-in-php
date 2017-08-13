<?php include 'inc/header.php'; ?>

<?php
Session::checkSession();
$total    = $exm->getTotalRows();
?>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $process = $pro->processData($_POST);
}
?>

    <div class="main">
        <h1>All Questions & Answers </h1>
        <div class="test">

                <table>
                    <?php
                       $getQues = $exm->getQuesByOrder();
                    if($getQues){
                        while($question = $getQues->fetch_assoc()){
                    ?>
                    <tr>
                        <td colspan="2">
                            <h3 style="font-size: 18px">Ques <?php echo $question['quesNo']; ?>: <?php echo $question['ques'];?> </h3>
                        </td>
                    </tr>

                    <?php
                    $number = $question['quesNo'];
                    $answer = $exm->getAnswer($number);
                    if($answer){
                        while($result = $answer->fetch_assoc()){
                            ?>

                            <tr>
                                <td>
                                    <input type="radio"/>
                                    <?php
                                       if($result['rightAns']== '1'){
                                           echo "<span style='color: blue'>".$result['ans']."</span>";
                                       }else{
                                           echo $result['ans'];
                                       }
                                    ?>
                                </td>
                            </tr>
                        <?php } } ?>
                    <?php } } ?>
                </table>
        </div>
        <br/>
        <p style="text-align: center"><a class="finalStart" style="border-color: green;" href="start_test.php">Start Test Again!</a></p>
        <br/>
    </div>

<?php include 'inc/footer.php'; ?>