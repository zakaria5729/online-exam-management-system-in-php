<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/inc/header.php');
include_once ($filepath.'/../classes/User.php');

$usr = new User();
?>

    <div class="main">
        <h1 style="text-align: center; font-size: 24px">Viva Requests</h1>
        <div class="manageuser">
            <table class="tblone">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Facebook ID</th>
                    <th>Skype ID</th>
                </tr>

                <?php
                $userData = $usr->getAllVivaApplier();
                if($userData){
                    $i = 0;
                    while($result = $userData->fetch_assoc()){
                        $i++;
                        ?>

                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td> <?php echo $result['name']; ?> </td>
                            <td> <a target="_blank" style=" color: darkblue; text-decoration: none;" href="https://<?php echo $result['email']; ?>"><?php echo $result['email']; ?></a> </td>
                            <td> <a target="_blank" style=" color: darkblue; text-decoration: none;" href="https://<?php echo $result['facebook']; ?>"><?php echo $result['facebook']; ?></a> </td>
                            <td> <a target="_blank" style=" color: darkblue; text-decoration: none;" href="https://<?php echo $result['skype']; ?>"><?php echo $result['skype']; ?></a> </td>
                        </tr>
                    <?php } } ?>

            </table>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>