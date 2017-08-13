<?php include 'inc/header.php'; ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/classes/User.php');
include_once ($filepath.'/classes/process.php');
$usr = new User();
$pro = new process();
?>

<?php
Session::checkSession();
$total    = $exm->getTotalRows();
?>

    <div class="viva_main">
        <h1 style="color: blue;">Online Exam System - Viva Board</h1>
        <p style="text-align: center">Congratulation! You are selected for the viva board.</p>
        <div style="text-align: center;">
            <strong style="color: #444444">Final Score:
                <?php
                if(isset($_SESSION['score'])){
                    echo $_SESSION['score'];
                    unset($_SESSION['score']);
                }
                ?>
            </strong>
        </div>
        <br/>

        <?php
        if(isset($_POST['viva_btn'])){
            $usr->insert_viva_data($_POST['name'], $_POST['email'], $_POST['facebook'], $_POST['skype']);
        }
        ?>

        <div class="segment_viva">
            <form action="" method="post">
                <table style="padding-left: 60px; padding-top: 35px">
                    <tr>
                        <td>Name:</td>
                        <td><input name="name" id="name" type="text" required="" placeholder="Enter Email"></td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td><input name="email" id="email" type="text" required="" placeholder="Enter Email"></td>
                    </tr>
                    <tr>
                        <td>Facebook ID:</td>
                        <td><input name="facebook" type="text" id="facebook" required="" placeholder="Like: fb.com/zakaria5729"></td>
                    </tr>
                    <tr>
                        <td>Skype ID:</td>
                        <td><input name="skype" type="text" id="skype" placeholder="Enter Skype ID"></td>
                    </tr>
                    <tr>
                    <tr>
                        <td></td>
                        <td class="button_class"><input type="submit" name="viva_btn" value="Submit">
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <div style="text-align: center; padding-top: 45px" class="viva_starttest">
            <a style="border-color: green;" href="viewAns.php">View Right Answer</a>
            <a style="border-color: green;" href="start_test.php">Start Test Again.!</a>
        </div>


    </div>
<?php include 'inc/footer.php'; ?>