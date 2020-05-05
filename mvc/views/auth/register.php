<?php include ROOT . '/views/layouts/header.php'; ?>


<section>
    <div class="container">
        <div class="row block">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <h2 class="text-center mb-4 mr-n5" id="formName">Register Form</h2>
                <form method='post' action="#" id="registerForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="firstname" id="firstNamelabel">Firstname: </label>
                        <input type="text" class="form-control" id="inputFirstname" name="firstname" placeholder="First Name" value="" required>
                        <small id="firstnameHelp" class="form-text text-muted">First name min 4 characters max 30 characters</small>
                    </div>
                    <div class="form-group">
                        <label for="lastname" id="lastNamelabel">Lastname: </label>
                        <input type="text" class="form-control" id="inputLastname" name="lastname" placeholder="Last Name" value="" required>
                        <small id="lastnameHelp" class="form-text text-muted">Last name min 2 characters max 30 characters</small>
                    </div>
                    <div class="form-group">
                        <label for="email" id="emailLabel">Email: </label>
                        <input type="text" id="inputEmail" class="form-control" name="email" placeholder="Email" value="">
                        <small id="emailHElp" class="form-text text-muted">Please enter valide email</small>
                    </div>
                    <div class="form-group">
                        <label for="password" id="passwordLabel">Password: </label>
                        <input type="text" class="form-control" id="inputPassword" name="password" placeholder="Password" value="" required>
                        <small id="passwordHelp" class="form-text text-muted">Password min length 6 characters max 20 characters</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1" id="chosePhoto">Chose photo</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo" required>
                        <small id="photoHelp" class="form-text text-muted">Upload your photo on jpg/png/gif format</small>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-success" id="registerButton" name="submit">Register</button>
                        <button type="reset" class="btn btn-danger ml-2" id="resetButton">Reset</button>
                        
                    </div>
                    
                    <?php if (isset($errors) && is_array($errors)) : ?>
                        <ul class="list-group">
                            <?php foreach ($errors as $error) : ?>
                                <li class="list-group-item list-group-item-danger"> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>