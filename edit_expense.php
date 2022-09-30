<?php
include("check.php") ;
include("connect.php") ;
if(!empty($_GET['id'])){
    $id = $_GET['id'] ;
    $sql = "SELECT * FROM money_out 
    WHERE  money_out.id='". $id."' limit 1 " ;
    $rs = $conn->query($sql) ;
    $row = $rs->fetch_array() ;
    
    $rs = $conn->query("SELECT * FROM category_out_default") ;
    $data_category = $rs->fetch_array();
}
else {
    echo "ข้อมูลไม่ครบ" ;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>fionna-edit</title>
    <meta charset="UTF-8">
    <?php include 'script.php';?>
</head>
<body>
  <div class="wrapper">
      <?php include 'newTopBar.php';?>
      <div class="container-fluid">
         <div class="row">
            <?php include 'SideLeftBar.php';?>
            <div class="content-wrapper">
                <!--  content here  -->
                <div class="row">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics mb-30">
                            <div class="card-body">
                                <h5 class="card-title">แก้ไขรายการ</h5>
                           
                                    <div class="form-group">
                                        	<select class="form-control form-white"
											style="height: 50%"
											name="select_category" id = "select_category">
											<?php while($data_category = $rs->fetch_array()){ ?>
											<option value="<?php echo $data_category['category_name'] ?>"><?php echo $data_category['category_name'] ?></option>
											<?php } ?>
											<option value="other">Other..</option>
											
											</select>
                                     
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">จำนวนเงิน</label>
                                        <input type="number" class="form-control" id="amount" name="amount" placeholder="<?php echo $row['amount']?>">
                                    </div>
             							<input type="hidden" id="id" name="id" value="<?php echo $row['id'] ?>">
                                    <button type="" onclick="update()" class="btn btn-success">Update</button>
                             
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'Footer.php';?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function update(){

			var detail_income = document.getElementById("select_category").value;
			var amount = document.getElementById("amount").value;
			var id = document.getElementById("id").value;
	
			$.ajax({
					type:"POST",
					url:"update_expense.php",
					dataType:"json",
					data:"detail_income="+detail_income+"&amount="+amount+"&id="+id,
					success:function(data){
						
						console.log(data);
						console.log('status :'+data.status);
						
                        if(data.status == 'ok'){
                            swal({
                                title: "<h3>Update Expense Success!!</h3>",
                                text: "Message!",
                                type: "success"
                            }).then(function() {
                                window.location = "Expense.php";
                            });
                        
                        }
			            	
			           }
			       });
}
</script>
</body>
</html>