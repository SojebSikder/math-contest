<?php

function ShowModel($data_toggle="modal", $data_target="myModal", $title = "Notification"){
    echo "<div class='modal fade' id='$data_target'>
    <div class='modal-dialog modal-lg modal-dialog-scrollable'>
      <div class='modal-content'>
      
        <!-- Modal Header -->
        <div class='modal-header'>
          <h4 class='modal-title'>$title</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
        
        <!-- Modal body -->
        <div id='reportModel' class='modal-body'>
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class='modal-footer'>
          <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
        </div>
        
      </div>
    </div>
  </div>";
}

?>


<!---------------------------Start Model--------------- -->
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Notification</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div id="reportModel" class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
<!--------------------------------end Model ----------->