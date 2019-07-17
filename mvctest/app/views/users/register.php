<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
        <h2>create account</h2>
        <p>Please fill out form to register</p>
        <form action="<?php echo URLROOT; ?>/users/register" method="post">  

       
        <div class="form-group">
            <label for ="UserName">User Name: <sup>*</sup></label>   
            <input type ="text" name="UserName" 
            class ="form-control form control-lg 
            <?php echo (!empty($data['name_err'])) ?
             'is-valid' : ''; ?>" value="<?php echo $data['UserName'] ?> " >  
             <span class="invalid-feedback"><?php echo $data['name_err']?>
             </span>
         </div>


         <div class="form-group">
            <label for ="firstName">First Name: <sup>*</sup></label>   
            <input type ="text" name="firstName" 
            class ="form-control form control-lg 
            <?php echo (!empty($data['firstName_err'])) ?
             'is-valid' : ''; ?>" value="<?php echo $data['firstName'] ?> " >  
             <span class="invalid-feedback"><?php echo $data['firstName_err']?>
             </span>
         </div>
         <div class="form-group">
            <label for ="lastName">Last Name: <sup>*</sup></label>   
            <input type ="text" name="lastName" 
            class ="form-control form control-lg 
            <?php echo (!empty($data['lastName_err'])) ?
             'is-valid' : ''; ?>" value="<?php echo $data['lastName'] ?> " >  
             <span class="invalid-feedback"><?php echo $data['lastName_err']?>
             </span>
         </div>

          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg 
            <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>

         <div class="form-group">
            <label for ="cellNo">Cell Number: <sup>*</sup></label>   
            <input type ="text" name="cellNo" 
            class ="form-control form control-lg 
            <?php echo (!empty($data['cellNo_err'])) ?
             'is-valid' : ''; ?>" value="<?php echo $data['cellNo'] ?> " >  
             <span class="invalid-feedback"><?php echo $data['cellNo_err']?>
             </span>
         </div>
         <div class="form-group">
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg 
            <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" 
            value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>

            <div class="form-group">
            <label for="confirm_password">Confirm Password: <sup>*</sup></label>
            <input type="password" name="confirm_password" 
            class="form-control form-control-lg 
            <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" 
            value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
          </div>
            <div class="row">
            <div class="col">
              <input type="submit" value="Register" class="btn btn-success btn-block">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
          </div>

          </form>

        </div>
    </div>

</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>