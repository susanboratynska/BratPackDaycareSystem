<?php
include "includes/header.php";
include "functions/functions_susan.php";

require_once "Classes/Database.php";
require_once "Classes/StaffDirectory.php";

if(isset($_GET['staffID'])){
    $staffID = $_GET['staffID'];
    $dbcon = Database::getDb();

    $sd = new StaffDirectory();
    $staffmembers = $sd->getStaffById($staffID, $dbcon);

    // var_dump($staffmembers);

    $staff__firstname =  $staffmembers->firstname;
    $staff__lastname =  $staffmembers->lastname;
    $staff__email =  $staffmembers->email;
    $staff__phone =  $staffmembers->phone;
    $staff__jobtitle =  $staffmembers->jobtitle;
    $staff__photo = $staffmembers->photo;

}
?>

<div class="container">
    <h1>Staff Member Details</h1>

    <div class="navbar">
        <a href="javascript:history.go(-1)" class="btn btn-secondary">Back to Field Trips</a>
    </div>

    <form>
        <div class="form-group row">
            <label for="staff__firstname" class="col-sm-2 col-form-label">First Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  id="staff__firstname" name="staff__firstname" value="<?= $staff__firstname; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="staff__lastname" class="col-sm-2 col-form-label">Last Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="staff__lastname" name="staff__lastname" value="<?= $staff__lastname; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="staff__email" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="staff__email" name="staff__email" value="<?= $staff__email; ?>"  readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="staff__phone" class="col-sm-2 col-form-label">Phone:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="staff__phone" name="staff__phone" value="<?= $staff__phone; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="staff__jobtitle" class="col-sm-2 col-form-label">Job Title:</label>
            <div class="col-sm-6">
                <select id="staff_jobtitle" class="form-control col-sm-6" name="staff__jobtitle" disabled>
                    <?php displayselectoptions($jobtitles, $staff__jobtitle); ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="staff__photo" class="col-sm-2 col-form-label">Photo:</label>
            <div class="input-group mb-3 col-sm-6">
                <img src="<?= $staff__photo; ?>" width="150px" align="left">
            </div>
            <script type="text/javascript">
                (function() {
                    var img = document.getElementById('container').firstChild;
                    img.onload = function() {
                        if(img.height > img.width) {
                            img.height = '100%';
                            img.width = 'auto';
                        }
                    };
                }());
            </script>
        </div>
    </form>
</div>


<?php
include "includes/footer.php";
?>
