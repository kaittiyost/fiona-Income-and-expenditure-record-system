<?php
include 'check.php';
include("connect.php") ;
include('func_ClearStr.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>fiona-บันทึกรายรับ</title>
	<meta charset="UTF-8">

	<?php include 'script.php';?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
	
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
	<?php 	
	$rs = $conn->query("SELECT * FROM category_in_default") ;
	$data_category = $rs->fetch_array();
	
	// income today
	$rs_income_today = $conn->query("SELECT SUM(money_in.amount) as sum FROM money_in WHERE date(money_in.time_reg) = CURRENT_DATE AND money_in.user_id = ".$_SESSION['id']);
	$data_income_today = $rs_income_today->fetch_array();
	
	// balance
	$rs_balance = $conn->query("SELECT a.sum-b.sum as balance FROM (\n".
		"	SELECT *,SUM(money_in.amount) as sum FROM money_in WHERE money_in.user_id = ".$_SESSION['id']."\n".
		") as a \n".
		"INNER JOIN (SELECT *,SUM(money_out.amount) as sum FROM money_out WHERE money_out.user_id = ".$_SESSION['id'].") as b ON\n".
		"(a.user_id = b.user_id) AND a.user_id = ".$_SESSION['id']);
	$data_balance = $rs_balance->fetch_array();
	
	//datatable
	$rs_table_sum = $conn->query("SELECT money_in.id , money_in.detail as name , money_in.amount  as amount, IF(money_in.amount>100 ,\"ต้องเรียกว่าเสี่ยแล้ว\",\"ใช้สอยอย่างประหยัด\") as  analyzee\n".
		"FROM money_in  \n".
		"WHERE  money_in.user_id = ".$_SESSION['id']." AND DATE(money_in.time_reg) = CURRENT_DATE ORDER BY money_in.id");
	
	//$data_table_sum = $rs_table_sum->fetch_array();
	
	//-------------------------------------------------- [ data table1]
	$rs_table_sum_in = $conn->query("SELECT money_in.* , user.`name`
		FROM money_in , `user` WHERE money_in.user_id=".$_SESSION['id']." AND user.id = money_in.user_id");
		?>
	</head>
	<body>
		<div class="wrapper">
			<?php include 'newTopBar.php';?>
			<div class="container-fluid">
				<div class="row">
					<?php include 'SideLeftBar.php';?>
					<div class="content-wrapper">
						<!----------------------------------------------------------------------Cash,Daily budget---------------------------------------------------------------------->
						<div class="page-title">
							<div class="row">
								<div class="col-sm-6">
									<h4 class="mb-0">บันทึกรายรับ</h4>
								</div>
								<div class="col-sm-6">
									<ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
										<li class="breadcrumb-item"><a href="Dashboard.php"
											class="default-color">Home</a></li>
											<li class="breadcrumb-item active">Income</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 mb-30">
									<div class="card card-statistics h-100">
										<div class="card-body">
											<div class="clearfix">
												<div class="float-left">
													<span class="text-success"> <i
														class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
													</span>
												</div>
												<div class="float-right text-right">
													<p class="card-text text-dark">รายรับวันนี้</p>
													<?php if($data_income_today['sum'] != ""){?>
														<h4><?php echo $data_income_today['sum']?> บาท</h4>
													<?php }else {?>
														<label style="color:red">ไม่ได้บันทึกรายรับ</label>
													<?php }?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 mb-30">
									<div class="card card-statistics h-100">
										<div class="card-body">
											<div class="clearfix">
												<div class="float-left">
													<span class="text-warning"> <i
														class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
													</span>
												</div>
												<div class="float-right text-right">
													<p class="card-text text-dark">ยอดเงินคงเหลือ</p>
													<?php if($data_balance['balance'] != ""){?>
														<h4><?php echo $data_balance['balance']?> บาท</h4>
													<?php }else {?>
														<label style="color:red">ไม่มียอดเงินคงเหลือ</label>
													<?php }?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!----------------------------------------------------------------------Create Income---------------------------------------------------------------------->
							<div class="calendar-main mb-30" style="align-content: center">
								<div class="row">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-12 sm-mb-30" style="align-content: center">
												<a href="#" data-toggle="modal" data-target="#add-category"
												class="btn btn-primary btn-block ripple m-t-20"><i
												class="fa fa-plus pr-2" style="align-content: center"></i>คลิกเพื่อบันทึกรายรับของคุณ</a>
												
											</div>
										</div>
									</div>
									<div class="col-lg-9">
										<div id="calendar"></div>
										<!-- Modal Add Category -->
										<div class="modal fade" tabindex="-1" role="dialog" id="add-category" style="margin-top : 10% ">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Add Income Here!</h5>
														<button type="button" class="close" data-dismiss="modal"
														aria-hidden="true">&times;</button>
													</div>
													<div class="modal-body p-20">
														<form>
															<div class="row">
																<div class="col-md-6" >
																	<div id="formSelectCategory">
																		<label class="control-label">Category</label>
																		<select
																		class="form-control form-white"
																		data-placeholder="Choose a color..."
																		name="category-color" id = "select_category" onchange="addCategory()">
																		<?php while($data_category = $rs->fetch_array()){ ?>
																			<option value="<?php echo $data_category['category_name'] ?>"><?php echo $data_category['category_name'] ?></option>
																		<?php } ?>
																		<option value="other">Other..</option>
																	</select>
																</div>
																<div id="formAddCategory"></div>
															</div>
															<div class="col-md-6">
																<label class="control-label">Total</label> <input
																class="form-control form-white" placeholder="Enter tatal"
																type="number" name="total" id="total" />
															</div>
														</div>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger ripple"
													data-dismiss="modal">Close</button>
													<button type="button"
													class="btn btn-success ripple save-category"
													data-dismiss="modal" id="btnAdd" onclick="addIncome()">Save</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br>
							<!----------------------------------------------------------------------Table---------------------------------------------------------------------->
							<div class="card-body">
								<h5 class="card-title border-0 pb-0"><p>ตารางสรุปผล วันที่</p> : <span id="datetime"></span></h5>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Detail</th>
												<th scope="col">Amount</th>
												<th scope="col">วิเคราะห์</th>
												<th scope="col">Edit</th>
											</tr>
										</thead>
										<tbody>
											<?php while($data_table_sum = $rs_table_sum->fetch_array()){?>
												<tr>
													<td ><?php echo $data_table_sum['id']?></td>
													<td><?php echo$data_table_sum['name']?></td>
													<td><?php echo $data_table_sum['amount']?></td>
													
													<?php if( $data_table_sum['analyzee'] == "ใช้มาก"){?>
														<td style="color:red"><?php echo $data_table_sum['analyzee']?></td>
													<?php }else{?>
														<td style="color:green"><?php echo $data_table_sum['analyzee']?></td>
													<?php }?>
													<td>
														<a href="edit.php?id=<?php echo $data_table_sum['id']?>" class="btn btn-warning" style="width: 50px ">แก้ไข</a>
														<a href="#" onclick="del(<?php echo $data_table_sum['id']?>)" class="btn btn-danger" style="width: 50px">ลบ</a> 
													</td>
												</tr>
											<?php }?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-12 mb-30">
								<div class="card card-statistics h-100">
									<div class="card-body">
										<h5 class="card-title">สรุปรายการ - รายรับทั้งหมดของ <?php  echo $_SESSION['name']?></h5>
										<div class="table-responsive">
											<table id="datatable" class="table table-striped table-bordered p-0">
												<thead>
													<tr>
														<th>#</th>
														<th>Date</th>
														<th>Detail</th>
														<th>Amount</th>
														<th>User</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$i=1;
													while($data_table_sum_m = $rs_table_sum_in->fetch_array()){?>
														<tr>
															<td><?php echo $i ?></td>
															<td><?php echo $data_table_sum_m['time_reg']?></td>
															<td><?php echo $data_table_sum_m['detail']?></td>
															<td><?php echo $data_table_sum_m['amount']?></td>
															<td><?php echo $data_table_sum_m['name']?></td>
														</tr>
														<?php $i++; }?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div> 
							<?php include 'Footer.php';?>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#table1').DataTable();
					});
				</script>
				<script type="text/javascript">
					function addCategory(){
						
						var selectOther = document.getElementById('select_category').value;
						console.log(selectOther);
						if(selectOther == 'other'){
							
							$("#formSelectCategory").remove();					
							$("#formAddCategory").append(
								'<div class=\"col-md-6\" style="width:100% ; margin-left:-5px";>\n'+ 
								'<label class="control-label"  style="width:100%" >NewCategory</label> <input\n'+	
								'class="form-control form-white"  style="width:200px" placeholder="Enter New Category"\n'+ 
								'type="text" id="select_category" name="newCategory" />\n'
								+'</div>'
								);
						}
					}

					function addIncome(){
						var id_income = document.getElementById("select_category").value;
						var total = document.getElementById("total").value;
						console.log(id_income+","+total);

						$.ajax({
							type:"POST",
							url:"add_income.php",
							dataType:"json",
							data:"id_income="+id_income+"&total="+total,
							success:function(data){
								
								console.log(data);
								console.log('status :'+data.status);

								if(data.status == 'ok'){
									swal({
										title: "<h3>Add Income Success!!</h3>",
										text: "Message!",
										type: "success"
									}).then(function() {
										window.location = "Income.php";
									});
									
								}else{
									swal('<i class="fa fa-info-circle"></i>'+' <h3> Try Again !!</h3>');
								}
							}
						}) ;
					}
					
					function del(money_in_id){
						console.log(money_in_id);
						if(confirm("ยืนยันการลบข้อมูล"))
						{
							$.ajax({
								type:"POST",
								url:"delete_income.php",
								dataType:"json",
								data:"money_in_id="+money_in_id,
								success:function(data){
									
									console.log(data);
									console.log('status :'+data.status);
								if(data.status == 'ok'){
									swal({
										title: "<h3>Delete Income Success!!</h3>",
										text: "Message!",
										type: "success"
									}).then(function() {
										window.location = "Income.php";
									});
									
								}else{
									swal('<i class="fa fa-info-circle"></i>'+' <h3> Try Again !!</h3>');
								}
			            	//setTimeout(function(){  window.location = "Income.php";}, 3000);
			            	
			            }
			        }) ;
						}
						else {
							return false ;
						}
					}
				</script>
				<script>
					var dt = new Date();
					document.getElementById("datetime").innerHTML = dt.toLocaleDateString();
				</script>
			</body>
			</html>



