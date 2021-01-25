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
                                    <li class="nav-item"><a href="profile.php" class="active nav-link">Private Gallery</a></li>
                                    <li class="nav-item"><a href="camera.php" class="nav-link">Camera</a></li>
                                    <li class="nav-item"><a href="settings.php" class="nav-link">Settings</a></li>
                                </ul>
                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">
                                                <div class="row mb-4">
                                                    <a href="https://unsplash.it/1200/768.jpg?image=251" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                                                        <img src="https://unsplash.it/600.jpg?image=251" class="img-fluid">
                                                    </a>
                                                    <a href="https://unsplash.it/1200/768.jpg?image=252" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                                                        <img src="https://unsplash.it/600.jpg?image=252" class="img-fluid">
                                                    </a>
                                                    <a href="https://unsplash.it/1200/768.jpg?image=253" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                                                        <img src="https://unsplash.it/600.jpg?image=253" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="row mb-4">
                                                    <a href="https://unsplash.it/1200/768.jpg?image=254" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                                                        <img src="https://unsplash.it/600.jpg?image=254" class="img-fluid">
                                                    </a>
                                                    <a href="https://unsplash.it/1200/768.jpg?image=255" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                                                        <img src="https://unsplash.it/600.jpg?image=255" class="img-fluid">
                                                    </a>
                                                    <a href="https://unsplash.it/1200/768.jpg?image=256" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                                                        <img src="https://unsplash.it/600.jpg?image=256" class="img-fluid">
                                                    </a>
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