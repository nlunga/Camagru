<?php
  // require_once(__DIR__.'/Controller/controls.php');
  require_once 'Model/header.php';
?>
<div class="galleryView">
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
<?php require_once 'Model/footer.php'?>


<?php
function publicImage($table_name, $page)
{
  global $handle;
  $dest = "";
  $num_per_page = 05;
  $start_from = ($page - 1) * 05;

  try {
    echo '<style>.grid-container {  display: grid; grid-template-columns: auto auto auto; background-color: #2196F3; padding: 10px;}'.'.grid-item { background-color: rgba(255, 255, 255, 0.8); border: 1px solid rgba(0, 0, 0, 0.8); padding: 20px; font-size: 30px; text-align: center;}</style>'.'<div class="grid-container">'
    ;
      $sql = "SELECT * FROM $table_name LIMIT $start_from,$num_per_page";
      $stmt = $handle->prepare($sql);
      $stmt->execute();
      echo '<div class="gallery" style=" display : grid; grid-template-columns : 1fr 1fr 1fr; grid-gap: 1rem; width: 100vw; margin :3rem 3rem; ">';//grid-template-rows: auto; //repeat(auto-fit, minmax(300px, 1fr))
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $dest = $row['id'];
        $user_id = $row['userId'];
        $temp = explode("_", $row['images']);
        if (isset($_SESSION['id'])) {
          $link = '<a  href="comments_likes.php?id='.$dest.'&userId='.$user_id.'">';

          echo $link.'<img class="grid-item" src="' . $row['images'] . '" height="250" width="250" alt="fail"></a>';
        }else{
        echo '<img class="grid-item" src="'.$row['images'] . '" height="250" width="250" alt="fail">';
        }
      }
      echo "</div>";
  } catch (PDOException $e) {
    echo "Failed to pull image from the database ".$e->getMessage();
  }
  echo "<div>";

      $sql2 = "SELECT * FROM $table_name";
      $stmt = $handle->prepare($sql2);
      $stmt->execute();
      $count = count($stmt->fetchAll(PDO::FETCH_BOTH));

      $total_page = ceil($count/$num_per_page);
      $prev = "previous";
      $next = "next";
      echo "<div>";
      if ($page>1) {
        echo '<a href="index.php?page='.($page-1).'" style="padding: 3px; border 1px solid red; border-radius: 4px;">'.$prev.'</a>';
      }
      for ($i=1; $i< $total_page ; $i++) {
        echo '<a href="index.php?page='.$i.'" style="padding: 3px; border 1px solid red; border-radius: 4px;">'.$i.'</a>';
      }
      if ($i>$page) {
        echo '<a href="index.php?page='.($page+1).'" style="padding: 3px; border 1px solid red; border-radius: 4px;">'.$next.'</a>';
      }
      echo "</div>";
}
?>