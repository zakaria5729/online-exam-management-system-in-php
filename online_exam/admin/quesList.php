<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/inc/header.php');
include_once ($filepath.'/../classes/Exam.php');

$exm = new Exam();
?>

<?php
   if(isset($_GET['delQues'])){
       $quesNo = (int)$_GET['delQues'];
       $delQues = $exm->delQuestion($quesNo);
   }
?>

    <div class="main">
        <h1 style="text-align: center; font-size: 24px">Question List</h1>

        <?php
           if(isset($delQues)){
               echo $delQues;
           }
        ?>

        <div class="queslist">
            <table class="tblone">
                <tr>
                    <th width="10%">No</th>
                    <th width="75%">Questions</th>
                    <th width="15%">Action</th>
                </tr>

                <?php
                $getData = $exm->getQuesByOrder();
                if($getData){
                    $i = 0;
                    while($result = $getData->fetch_assoc()){
                        $i++;
                 ?>

                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['ques']; ?></td>
                            <td>
                                <a style="color: red; text-decoration: none" onclick="return confirm('Are You Sure to Remove?')" href="?delQues=<?php echo $result['quesNo']; ?>">Remove</a>
                            </td>
                        </tr>

                    <?php } } ?>

            </table>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>