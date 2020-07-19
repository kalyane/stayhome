<?php 
require_once 'model/CategoryDAO.php';
 ?>

<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <div class="friends box">
        <h4>Friends</h4>
        <hr class="division">
        <div class="friend row">
          <div class="col-sm-4">
            <img src="https://image.flaticon.com/icons/svg/847/847969.svg" class="img-fluid rounded-circle"> 
          </div>
          <div class="col-sm-8">
            <b>Name Person</b>
            <span>Online</span>
          </div>
        </div>
        <hr>
        <div class="friend row">
          <div class="col-sm-4">
            <img src="https://image.flaticon.com/icons/svg/847/847969.svg" class="img-fluid rounded-circle"> 
          </div>
          <div class="col-sm-8">
            <b>Name Person</b>
            <span>Online</span>
          </div>
        </div>
        <hr>
        <div class="friend row">
          <div class="col-sm-4">
            <img src="https://image.flaticon.com/icons/svg/847/847969.svg" class="img-fluid rounded-circle"> 
          </div>
          <div class="col-sm-8">
            <b>Name Person</b>
            <span>Online</span>
          </div>
        </div>
      </div>
      <div class="quote box">
        <h4>Daily Quote</h4>
        <hr class="division">
        <blockquote class="blockquote">
          <p class="mb-0" id="text"></span>
          <footer class="blockquote-footer" id="author"></footer>
        </blockquote>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="addActivity box">
        <button style="float: right;" class="btn btn-primary" id="add">+ Add activities</button>
        <h4>Activities for today</h4>
        <hr class="division">
        <?php 
        for ($x = 0; $x < count($activities); $x++) {
          echo '<div class="activity row">';
            echo '<div class="form-check col-sm-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                    <label class="custom-control-label" for="defaultUnchecked"></label>
                </div>
                  </div>';
            echo '<div class="col-sm-2">
                    <img class="img-fluid" src="'.CategoryDAO::getById($activities[$x]->getIdcategory())->getIcon().'">
                  </div>';
            echo '<div class="col-sm-9">
                    <h5>'.$activities[$x]->getName().'</h5>';
              echo '<span>From 04:00 to 5:00</span>
                  </div>';
          echo '</div> <hr>';
        }
         ?>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="award box">
        <h4>Awards</h4>
        <hr class="division">
        <div class="row">
          <div class="col-sm-4">
            <img src="https://image.flaticon.com/icons/svg/845/845664.svg">
          </div>
          <div class="col-sm-8">
            <h2>30 coins</h2>
          </div>
        </div>
      </div>
      <div class="notifications box">
        <h4>Progress</h4>
        <hr class="division">
      </div>
    </div>
  </div>  
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#add").click(function(){
            window.location.href="?class=activity&action=addpage";
        });
    });
    fetch("https://type.fit/api/quotes")
    .then(function(response) {
      return response.json();
    })
    .then(function(data) {
      var quote = data[Math.floor(Math.random() * data.length)];
      document.getElementById("text").innerHTML = quote.text;
      document.getElementById("author").innerHTML = quote.author;
    });
</script>