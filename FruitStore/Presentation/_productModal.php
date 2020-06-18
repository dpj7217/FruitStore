<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Delete This Product?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/FruitStore/Business/deleteProductHandler.php">
			<div class=form-group>
				<label for=name>Name</label>
				<input type=text name=name id=name class=form-control readonly>
			</div>
			<div class=form-group>
				<label for=price>Price</label>
				<input type=text name=price id=price class=form-control readonly>
			</div>
			<div class=form-group>
				<label for=description>Description</label>
				<textarea rows=5 name=description id=description class=form-control readonly></textarea>
			</div>
			<div class=form-group>
				<label for=quantity>Quantity On Hand</label>
				<input type=text class=form-control id=quantity name=quantity>
			</div>
			<input type=hidden id=productID name=productID>
			<button type="submit" class="btn btn-danger">Delete</button>
		</form>
      </div>
    </div>
  </div>
</div>