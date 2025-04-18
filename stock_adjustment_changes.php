<?php
	include("include_files.php");
	if(isset($_REQUEST['show_stock_adjustment_id'])) { ?>
        <form class="poppins pd-20" name="organization_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
						<div class="h5">Add Stock Adjustment</div>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('stock_adjustment.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row justify-content-center p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_user_id)) { echo $show_user_id; } ?>">
                <div class="col-lg-2 col-md-3 col-12 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="date" class="form-control shadow-none" placeholder="" required="">
                            <label style="font-size:10px;">Stock Adjustment Date</label>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-3 col-md-3 col-12 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <textarea class="form-control" id="address" name="address" placeholder="Enter Your Address"></textarea>
                            <label>Remarks</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option>Select Product</option>
                                <option>Product 1</option>
                                <option>Product 2</option>
                            </select>
                            <label>Select Product</label>
                        </div>
                    </div>        
                </div>
                <div class="col-lg-2 col-md-3 col-12 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option>Select Action</option>
                                <option>Plus</option>
                                <option>Minus</option>
                            </select>
                            <label>Select Action</label>
                        </div>
                    </div>        
                </div>  
            </div>
            <div class="row justify-content-center p-3"> 
                <div class="col-lg-2 col-md-2 col-6 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option>Select Godown</option>
                                <option>Godown 1</option>
                                <option>Godown 2</option>
                            </select>
                            <label>Select Godown</label>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-2 col-md-2 col-6 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option>Select Brand</option>
                                <option>Brand 1</option>
                                <option>Brand 2</option>
                            </select>
                            <label>Select Brand</label>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-2 col-md-2 col-6 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option>Select Unit</option>
                                <option>Unit 1</option>
                                <option>Unit 2</option>
                            </select>
                            <label>Select Unit</label>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-2 col-md-2 col-6 py-2">
                    <div class="form-group pb-2">
                        <div class="form-label-group in-border">
                            <input type="text" class="form-control shadow-none" placeholder="" required="">
                            <label>Case Contains</label>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-1 col-md-1 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="name" name="name" class="form-control shadow-none" placeholder="" required>
                            <label>QTY</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-md-2 col-6 py-2">
                    <button class="btn btn-success py-2" style="font-size:12px; width:100%;" type="button">  Add </button>
                </div>
                <div class="col-lg-10">
                    <div class="table-responsive text-center">
                        <table class="table nowrap cursor smallfnt w-100 table-bordered">
                            <thead class="bg-dark smallfnt">
                                <tr style="white-space:pre;">
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Godown</th>
                                    <th>Brand</th>
                                    <th>Unit</th>
                                    <th>Contains</th>
                                    <th>Qty</th>
                                    <th>Stock Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>Product Name</td>
                                    <td>Category 1</td>
                                    <td>Category 1</td>
                                    <td>Category 1</td>
                                    <td>Category 1</td>
                                    <td>Category 1</td>
                                    <td>Category 1</td>
                                    <td><a class="pe-2" href="#"><i class="fa fa-trash text-danger"></i></a></td>
                                </tr>
                            </tbody> 
                        </table>
                    </div>
                </div>
                <div class="col-md-12 pt-3 text-center">
                    <button class="btn btn-danger" type="button">
                        Submit
                    </button>
                </div>
            </div>
            <script src="include/select2/js/select2.min.js"></script>
            <script src="include/select2/js/select.js"></script>
        </form>
	<?php
    } 
    if(isset($_POST['page_number'])) {
        $page_number = $_POST['page_number'];
        $page_limit = $_POST['page_limit'];
        $page_title = $_POST['page_title']; ?>
    
    <table class="table nowrap cursor text-center smallfnt">
        <thead class="bg-light">
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Bill Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>01</td>
                <td>18-02-2025</td>
                <td>ETA0098-01</td>
                <td>
                    <div class="dropdown">
                        <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                            <li><a class="dropdown-item" href="#">View</a></li>
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Delete</a></li>
                        </ul>
                    </div> 
                </td>
            </tr>
        </tbody>
    </table>                
<?php	}?>