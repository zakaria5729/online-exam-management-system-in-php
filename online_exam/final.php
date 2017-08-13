<?php include 'inc/header.php'; ?>

<?php
Session::checkSession();
?>

    <div class="main">
        <h1>You are done!</h1>
        <div style="text-align: center" class="starttest">
            <br/>
            <p>Congratulation! You have just completed the test.</p>
            <strong style="color: #444444">Final Score:
            <?php
               if(isset($_SESSION['score'])){
                   echo $_SESSION['score'];
                   unset($_SESSION['score']);
               }
            ?>
            </strong>

            <br/>
            <br/>
            <br/>
            <a style="border-color: green;" href="viewAns.php">View Right Answer</a>
            <a style="border-color: green;" href="start_test.php">Start Test Again.!</a>
        </div>

    </div>
<?php include 'inc/footer.php'; ?>