<div class="container crud-table">
  <div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6">
          <h2>Thêm sản phẩm</h2>
        </div>
        <div class="col-sm-6">
          
          <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm ảnh</span></a>
          <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>  -->                       
        </div>
      </div>
    </div>
   <form>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputEmail4">Tên sản phẩm</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="Tên sản phẩm">
      </div>
      <div class="form-group col-md-4">
        <label for="inputPassword4">Thương hiệu</label>
        <select id="inputState" class="form-control">
          <option selected>Chọn...</option>
          <option>...</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Giới tính</label>
        <select id="inputState" class="form-control">
          <option selected>Chọn...</option>
          <option>...</option>
        </select>
      </div>
    </div>
   <div class="form-row">
       <div class="form-group col-md-4">
           <label for="inputPassword4">Loại dây</label>
           <select id="inputState" class="form-control">
               <option selected>Chọn...</option>
               <option>...</option>
           </select>
       </div>

       <div class="form-group col-md-4">
           <label for="inputPassword4">Loại vỏ</label>
           <select id="inputState" class="form-control">
               <option selected>Chọn...</option>
               <option>...</option>
           </select>
       </div>
       <div class="form-group col-md-4">
           <label for="inputCity">Giá gốc</label>
           <input type="text" class="form-control" id="inputCity">
       </div>
   </div>
   <div class="form-row">
       <div class="form-group col-md-4">
           <label for="inputCity">Giá sale</label>
           <input type="text" class="form-control" id="inputCity">
       </div>

       <div class="form-group col-md-8">
           <label for="inputAddress">Mô tả ngắn</label>
           <input type="text" class="form-control" id="inputAddress" placeholder="Viết vào đây...">
       </div>
   </div>
    <div class="form-group">
      <label for="inputAddress2">Bài viết</label>
      <textarea name="productPost" id="productReview" style="min-height: 400px;"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm</button>
  </form>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Thêm ảnh</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>                  
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
      </div>
      <!-- Edit Modal HTML -->
    <!-- <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Edit Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>                  
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
      </div> -->
      <!-- Delete Modal HTML -->
    <!-- <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
      </div> -->








