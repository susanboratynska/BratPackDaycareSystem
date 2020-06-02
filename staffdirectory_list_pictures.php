<?php
include "includes/header.php";

require_once 'Classes/Database.php';
require_once 'Classes/StaffDirectory.php';

$staff__searchkey = "";
$public__jobtitle= "";
$staff__allstaff = "";

// If a search has been made, show a button "See All Staff" to display all results again:
if(isset($_GET['staff__searchkey'])){
    $staff__searchkey = $_GET['staff__searchkey'];
    $staff__allstaff = "<a href='staffdirectory_list_pictures.php' class='btn btn-secondary'>See All Staff</a>";
}

// Filter results by jobtitle if get variable exists:
if(isset($_GET['jobtitle'])){
    $public__jobtitle = $_GET['jobtitle'];
}

$dbcon = Database::getDb();
$sd = new StaffDirectory();
$staffmembers = $sd->liststaff($dbcon, $staff__searchkey, $public__jobtitle);


?>

<div class="container">
    <h1>Staff Directory</h1>

    <div class="navbar">
        <form class="form-inline my-2 my-lg-0" >
            <input class="form-control mr-sm-2" type="search" name="staff__searchkey" id="staff__searchkey" placeholder="Enter Name"  aria-label="Search">
            <input class="btn" type="submit" name="submit__searchstaff" value="Search Staff by Name">
        </form>
        <div class="dropdown">
            <button type="btn" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Filter By Position: <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="staffdirectory_list_pictures.php" class="staff__dropdown_link">All Staff</a></li>
                <li><a href="staffdirectory_list_pictures.php?jobtitle=Administrator" class="staff__dropdown_link">Administrator</a></li>
                <li><a href="staffdirectory_list_pictures.php?jobtitle=Child" class="staff__dropdown_link">Child Care Worker</a></li>
                <li><a href="staffdirectory_list_pictures.php?jobtitle=Caretaker" class="staff__dropdown_link">Caretaker</a></li>
            </ul>
        </div>
        <a href="staffdirectory_add.php" class="btn btn-secondary">Add New Staff</a>
        <?php echo $staff__allstaff; ?>
        <a href="staffdirectory_list.php" class="btn btn-secondary staffdirectory__listgrid_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                         width="24" height="24"
                                                                         viewBox="0 0 226 226"
                                                                         style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,226v-226h226v226z" fill="none"></path><g fill="#ffffff"><path d="M13.56,31.64c-2.48953,0 -4.52,2.03047 -4.52,4.52v18.08c0,2.48953 2.03047,4.52 4.52,4.52h18.08c2.48953,0 4.52,-2.03047 4.52,-4.52v-18.08c0,-2.48953 -2.03047,-4.52 -4.52,-4.52zM53.3925,36.16c-4.99672,0.22953 -8.84578,4.46703 -8.61625,9.46375c0.22953,4.99672 4.46703,8.84578 9.46375,8.61625h153.68c3.26641,0.05297 6.28562,-1.65969 7.92766,-4.48469c1.65969,-2.80734 1.65969,-6.30328 0,-9.11062c-1.64203,-2.825 -4.66125,-4.53766 -7.92766,-4.48469h-153.68c-0.2825,-0.01766 -0.565,-0.01766 -0.8475,0zM13.56,76.84c-2.48953,0 -4.52,2.03047 -4.52,4.52v18.08c0,2.48953 2.03047,4.52 4.52,4.52h18.08c2.48953,0 4.52,-2.03047 4.52,-4.52v-18.08c0,-2.48953 -2.03047,-4.52 -4.52,-4.52zM53.3925,81.36c-4.99672,0.22953 -8.84578,4.46703 -8.61625,9.46375c0.22953,4.99672 4.46703,8.84578 9.46375,8.61625h153.68c3.26641,0.05297 6.28562,-1.65969 7.92766,-4.48469c1.65969,-2.80734 1.65969,-6.30328 0,-9.11062c-1.64203,-2.825 -4.66125,-4.53766 -7.92766,-4.48469h-153.68c-0.2825,-0.01766 -0.565,-0.01766 -0.8475,0zM13.56,122.04c-2.48953,0 -4.52,2.01281 -4.52,4.52v18.08c0,2.50719 2.03047,4.52 4.52,4.52h18.08c2.48953,0 4.52,-2.01281 4.52,-4.52v-18.08c0,-2.50719 -2.03047,-4.52 -4.52,-4.52zM53.3925,126.56c-4.99672,0.22953 -8.84578,4.46703 -8.61625,9.46375c0.22953,4.99672 4.46703,8.84578 9.46375,8.61625h153.68c3.26641,0.05297 6.28562,-1.65969 7.92766,-4.48469c1.65969,-2.80734 1.65969,-6.30328 0,-9.11062c-1.64203,-2.825 -4.66125,-4.53766 -7.92766,-4.48469h-153.68c-0.2825,-0.01766 -0.565,-0.01766 -0.8475,0zM13.56,167.24c-2.48953,0 -4.52,2.01281 -4.52,4.52v18.08c0,2.50719 2.03047,4.52 4.52,4.52h18.08c2.48953,0 4.52,-2.01281 4.52,-4.52v-18.08c0,-2.50719 -2.03047,-4.52 -4.52,-4.52zM53.3925,171.76c-4.99672,0.22953 -8.84578,4.46703 -8.61625,9.46375c0.22953,4.99672 4.46703,8.84578 9.46375,8.61625h153.68c3.26641,0.05297 6.28562,-1.65969 7.92766,-4.48469c1.65969,-2.80734 1.65969,-6.30328 0,-9.11062c-1.64203,-2.825 -4.66125,-4.53766 -7.92766,-4.48469h-153.68c-0.2825,-0.01766 -0.565,-0.01766 -0.8475,0z"></path></g></g></svg></a>
    </div>
    <!--Display alert message if staff not found-->
    <?php if (empty($staffmembers)){ echo "<div class='alert alert-danger' role='alert'>Staff member not found.</div>";} ?>
    <?php foreach ($staffmembers as $staffmember) { ?>
        <div class="staff__container">
            <img src="<?= $staffmember['photo'] ?>" class="staff__container_photo">
            <div class="staff__container_info">
                <div class="font-weight-bold">  <a href='staffdirectory_update.php?staffID=<?=$staffmember['staffID'] ?>'> <?= $staffmember['firstname'] . " " . $staffmember['lastname']?> </a></div>
                <div><?= $staffmember['jobtitle'] ?></div>
                <div><?= "<a href='mailto:" . $staffmember['email'] . "'>" . $staffmember['email'] . "</a>"; ?></div>
                <div><?= $staffmember['phone'] ?></div>
            </div>
        </div>
    <?php } ?>


</div>




<?php
include "includes/footer.php";
?>
