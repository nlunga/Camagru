<?php
    require_once '../Controller/controls.php';
    require_once '../Model/header.php';
?>
<div class="profileView">
    <!-- <h2>
        Welcome to Profile
    </h2>
    <br> -->
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
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="profile.php" class="nav-link">Private Gallery</a></li>
                                    <li class="nav-item"><a href="camera.php" class="active nav-link">Camera</a></li>
                                    <li class="nav-item"><a href="settings.php" class="nav-link">Settings</a></li>
                                </ul>

                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">
                                        <div class="container py-5 camback">
                                            <!-- For demo purpose -->
                                            <header class="text-white text-center">
                                                <img src="https://res.cloudinary.com/mhmd/image/upload/v1564991372/image_pxlho1.svg" alt="" width="150" class="mb-4">
                                            </header>


                                            <div class="row py-4">
                                                <div class="col-lg-6 mx-auto">

                                                    <!-- Upload image input-->
                                                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                                        <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                                                        <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                                                        <div class="input-group-append">
                                                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                                        </div>
                                                    </div>

                                                    <!-- Uploaded image area-->
                                                    <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                                                    <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

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
        </div>
    </div>
</div>
<?php require_once '../Model/footer.php'?>