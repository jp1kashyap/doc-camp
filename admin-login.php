<?php
include 'includes/header-main-auth.php';
include 'classes/Admin.php';
include 'validation/DataValidator.php';

$admin=new Admin();
$validate = new Data_Validator();
$errors=[];
$success=false;
if(isset($_POST['signin'])){
    $validate->set('email',$_POST['email'])->is_required()->min_length(3);
    $validate->set('password',$_POST['password'])->is_required()->min_length(3);		
    if($validate->validate()){
        $result=$admin->signin();
        if(isset($result['error'])){
            $errors['message'][0]='Invalid code or password';
        }else{
            $_SESSION['id']=$result['id'];
            $_SESSION['name']=$result['name'];
            $_SESSION['role'] = 'admin';
            $success=true;
            echo("<script>setTimeout(()=>{location.href = '".BASE_URL."index.php';},1000)</script>");
        }
    } else {
        $errors = $validate->get_errors();
    }
}
?>

<div class="flex justify-center items-center min-h-screen bg-[url('/assets/images/map.svg')] dark:bg-[url('/assets/images/map-dark.svg')] bg-cover bg-center">
    <div class="panel sm:w-[480px] m-6 max-w-lg w-full">
        <h2 class="font-bold text-2xl mb-3">Sign In</h2>
        <p class="mb-7">Enter your email and password to login</p>
        <form class="space-y-5" method="post" action="<?=BASE_URL?>admin-login.php">
            <div>
                <label for="email">Email</label>
                <input id="email" name="email" type="textRegistration Successful" class="form-input" placeholder="Enter Email" value="<?=isset($_POST['code']) && !$success?$_POST['code']:''?>" />
                <?php if(isset($errors['email'])){?><label class="text-danger"><?=$errors['email'][0]?></label><?php } ?>
            </div>
            <div>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="form-input" placeholder="Enter Password" />
                <?php if(isset($errors['password'])){?><label class="text-danger"><?=$errors['password'][0]?></label><?php } ?>
            </div>
            <input type="hidden" name="signin" value="signin"/>
            <button type="submit" class="btn btn-primary w-full">SIGN IN</button>
            <?php if(isset($errors['message'])) { ?>
                <script>setTimeout(()=>{
                    loginFailed('<?=$errors['message'][0]?>');
                },500) </script>
            <?php } ?>
            <?php if($success) { ?>
                <script>setTimeout(()=>{
                    loginSuccess();
                },500) </script>
            <?php } ?>
            <?php if($loggedout) { ?>
                <div class="flex items-center p-3.5 rounded text-info bg-info-light dark:bg-info-dark-light">
                        <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">Logged Out!</strong>Please login to continue.</span>
                    </div>
            <?php } ?>
        </form>
    </div>
</div>
<script>
     function loginSuccess() {
        new window.swal({
            icon: 'success',
            title: 'Success!',
            text: 'Admin Logged In Successful.',
            padding: '2em',
        }).then((result)=>{
            window.location.href='<?=BASE_URL?>index.php';
        });
    }
    function loginFailed(msg) {
        new window.swal({
            icon: 'error',
            title: 'Oops!',
            text: msg,
            padding: '2em',
        });
    }
</script>
<?php include 'includes/footer-main-auth.php'; ?>