<!----------------------------------- Registeration form -------------------------------------->
<div class="container mt-5">
    <h1>User Details</h1>
    <hr><br>
    <form class="row g-3" action="" method="post" id="form">
        <div class="col-md-12">
            <img src="assets/images/<?php echo $file2; ?>" alt="">
        </div>
        <div class="col-md-6">
            <label for="fname" class="form-label">First Name</label>
            <span class="error" id="fnameErr" name="fnameErr">*<?php echo $fnameErr; ?></span>
            <input disabled type="text" class="form-control" placeholder="Enter your first name" value="<?php echo $fname; ?>" id="fname" name="fname">
        </div>
        <div class="col-md-6">
            <label for="lname" class="form-label">Last Name</label>
            <span class="error" id="lnameErr" name="lnameErr">*<?php echo $lnameErr; ?></span>
            <input disabled type="text" class="form-control" placeholder="Enter your last name" value="<?php echo $lname; ?>" id="lname" name="lname">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">E-Mail</label>
            <span class="error" id="emailErr" name="emailErr">*<?php echo $emailErr; ?></span>
            <input disabled type="text" class="form-control" placeholder="Enter your email" value="<?php echo $email; ?>" id="email" name="email">
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone Number</label>
            <span class="error" id="phoneErr" name="phoneErr">*<?php echo $phoneErr; ?></span>
            <input disabled type="number" class="form-control" placeholder="Enter your phone number" value="<?php echo $phone; ?>" id="phone" name="phone">
        </div>
        <div class="col-md-6">
            <label for="gender" class="form-label">Gender</label>
            <div class="form-check form-check-inline">
                <input disabled class="form-check-input" type="radio" id="gender1" <?php echo ($gender == 'Male') ? 'checked' : '' ?> name="gender" value="Male">
                <label class="form-check-label" for="gender">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input disabled class="form-check-input" type="radio" id="gender2" <?php echo ($gender == 'Female') ? 'checked' : '' ?> name="gender" value="Female">
                <label class="form-check-label" for="gender">Female</label>
            </div>
            <span class="error" id="genderErr" name="genderErr"> *<?php echo $genderErr; ?> </span>
        </div>
        <div class="col-12">
            <a href="users.php">Back</a>
        </div>
    </form>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->