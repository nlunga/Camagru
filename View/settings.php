<?php
    require_once '../Controller/controls.php';
    require_once '../Model/header.php';   
?>
<div class="settingsView">
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile">
                                <div class="row">
                                    <div class="col-12 col-sm-auto mb-3">
                                        <div class="mx-auto" style="width: 140px;">
                                            <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                <img src="https://cdn1.iconfinder.com/data/icons/photography-2/512/YPS__human_avatar_portrait_photography_picture_photo-512.png" width="140" height="140">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $_SESSION['username'];?></h4>
                                            <div class="mt-2">
                                                <button data-toggle="collapse" data-target="#photo" class="btn btn-primary" type="button">
                                                    <i class="fa fa-fw fa-camera"></i>
                                                    <span>Change Photo</span>
                                                </button>
                                                <br>
                                                <br/>
                                                <div id="photo" class="collapse">
                                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                                                        <div class="custom-file">
                                                            <input name="profile-image" type="file" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Choose image</label>
                                                            <br />
                                                            <br />
                                                            <button type="submit" name="profileSubmit" class="btn btn-primary btn-block btn-small">Change</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="profile.php" class="nav-link">Private Gallery</a></li>
                                    <li class="nav-item"><a href="camera.php" class="nav-link">Camera</a></li>
                                    <li class="nav-item"><a href="settings.php" class="active nav-link">Settings</a></li>
                                </ul>

                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col">
                                                    <label>Username</label>
                                                    <div class="input-group mb-3">
                                                        <input class="form-control" type="text" name="username" id="username" placeholder="<?php echo $user_data = (isset($_SESSION['username'])) ? $_SESSION['username'] : "Username";?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label>Email</label>
                                                    <div class="input-group mb-3">
                                                        <input class="form-control" type="text" name="email" id="email" placeholder="<?php echo $user_data = (isset($_SESSION['email'])) ? $_SESSION['email'] : "Email";?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                    <label>Current Password</label>
                                                    <input class="form-control" name="currentPass" type="password" placeholder="••••••">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                    <label>New Password</label>
                                                    <input class="form-control" name="newPass" type="password" placeholder="••••••">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                    <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                                    <input class="form-control" name="confPass" type="password" placeholder="••••••"></div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <legend class="col-form-label col-sm-2 pt-0">Notifications</legend>
                                                <div class="col-sm-10">
                                                    
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="yes" id="Yes" value="yes">
                                                        <label class="form-check-label" for="yes">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="no" id="No" value="no" checked>
                                                        <label class="form-check-label" for="No">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    <button class="btn btn-primary" name="update" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once '../Model/footer.php'?>