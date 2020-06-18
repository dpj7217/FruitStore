<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Delete This User?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/FruitStore/Business/deleteHandler.php">
			<div class="form-row">
			<input type="hidden" id="hiddenFirstname">
    			<div class="form-group col-md-5">
    				<label for="firstname">First Name</label>
    				<input class="form-control" type="text" id="firstname" name="firstname" readonly/>   			
    			</div>
        		<div class="form-group col-md-2">
        			<label for="middleInitial">M.I.</label>
	    			<input class="form-control" type="text" id="middleInitial" name="middleInitial" readonly/>
        		</div>	
        		<div class="form-group col-md-5">
        			<label for="lastName">Last Name</label>
	       			<input class="form-control" type="text" id="lastname" name="lastname" readonly/>
        		</div>
			</div>
			<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control" type="text" id="username" name="username" readonly/>
				</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input class="form-control" type="email" id="email" name="email" readonly/>
			</div>
			<input type="hidden" name="userID" id="userID">
			<button type="submit" class="btn btn-danger">Delete</button>
		</form>
      </div>
    </div>
  </div>
</div>