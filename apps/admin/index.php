<?php include("header.php");
include('../../apps/connect/db.php');
?>
<head>
<link rel="stylesheet" href="../seller/css/index_p.css">
</head>

<body>



<?php
$stmt = $db->prepare("SELECT sum(o.price*o.quantity) as sum from ordered_products o,product p where o.p_id=p.id and o.status!=0");
$stmt->execute();
$row=$stmt->fetch();

$date1=date('Y-m-d');
$date1.=' 00:00:01';
$date2=date('Y-m-d');
$date2.=' 23:59:59';
$result1 = $db->prepare("SELECT sum(o.price*o.quantity) as sum from ordered_products o,product p where o.p_id=p.id and o.status!='0' and o.date between '$date1' and '$date2'");
$result1->execute();
$row1=$result1->fetch();

$d1=date('Y-m');
$d1.='-01 00:00:01';
$d2=date('Y-m');
$d2.='-31 23:59:59';
$result2 = $db->prepare("SELECT sum(o.price*o.quantity) as sum from ordered_products o,product p where o.p_id=p.id and o.status!=0 and o.date between '$d1' and '$d2'");
$result2->execute();
$row2=$result2->fetch();

$stmt = $db->prepare("SELECT count(o.id) as num from ordered_products o,product p where o.p_id=p.id and o.status=3");
$stmt->execute();
$row3=$stmt->fetch();

$stmt = $db->prepare("SELECT count(o.id) as num from ordered_products o,product p where o.p_id=p.id and o.status in (1,2)");
$stmt->execute();
$row4=$stmt->fetch();


?>
  

          <!-- ======================= Cards ================== -->
          <div class="cardBox1">
              <div class="card1">
                  <div>
                      <div class="numbers1">₹<?php echo $row['sum'];?></div>
                      <div class="cardName1">Net Income</div>
                  </div>

                  <div class="iconBx1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                  <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                  <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                  </svg>
                  </div>
              </div>

              <div class="card1">
                  <div>
                      <div class="numbers1">₹<?php echo $row2['sum'];?></div>
                      <div class="cardName1">This Month Income</div>
                  </div>

                  <div class="iconBx1">
                      <ion-icon name="cash-outline"></ion-icon>
                  </div>
              </div>


              <div class="card1">
                  <div>
                      <div class="numbers1">₹<?php if($row1['sum']!=0) echo $row1['sum']; else echo 0;?></div>
                      <div class="cardName1">Today's Income</div>
                  </div>

                  <div class="iconBx1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                  <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                  <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                  </svg>
                  </div>
              </div>

              <div class="card1">
                  <div>
                      <div class="numbers1"><?php echo $row3['num'];?></div>
                      <div class="cardName1">Completed Orders</div>
                  </div>

                  <div class="iconBx">
                  <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                  </svg>
                  </div>
              </div>

              <div class="card1">
                  <div>
                      <div class="numbers1"><?php echo $row4['num'];?></div>
                      <div class="cardName1">Pending Orders</div>
                  </div>

                  <div class="iconBx">
                  <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-send-exclamation-fill" viewBox="0 0 16 16">
                  <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1.5a.5.5 0 0 1-1 0V11a.5.5 0 0 1 1 0Zm0 3a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                  </svg>
                  </div>
              </div>

              
          </div>

          <!-- ================ Order Details List ================= -->
          <div class="details">
              <div class="recentOrders">
                  <div class="cardHeader">
                      <h2>Order History</h2>
                      <a href="" class="btn">View All</a>
                  </div>

                  <table>
                      <thead>
                          <tr>
                              <td>Name</td>
                              <td>Payment</td>
                              <td>Status</td>
                          </tr>
                      </thead>
                      <?php
            $i=1;
            $result = $db->prepare("select p.name as p_name,pay.status as p_status,o.c_id as c_id,op.* from product p,payment pay,orders o,ordered_products op where op.order_id=o.id and o.id=pay.order_id and op.p_id=p.id order by op.date DESC");
              $result->execute();
              for($i=0; $row = $result->fetch() and $i<10; $i++)
              {
                $p=$row['id'];
                $result1 = $db->prepare("select image from p_image where p_id='$p'");
              $result1->execute();
              $img='';
              for($j=0; $row1 = $result1->fetch(); $j++)
              {
                $img='uploads/';
                $img.=$row1['image'];
                break;
              }
              
                ?>

                      <tbody>
                          <tr>
                              <td><?php echo $row['p_name']; ?></td>
                              <td>Paid</td>
                              <td><span class="status delivered"><?php
                                          if($row['status']==1){?>										
                    Not Yet shipped
                                           <?php
                                          }
                                          if($row['status']==2){?>
                                          Shipped 
                                          <?php } 
                                          if($row['status']==3){?>
                                          Delivered 
                                          <?php }
                                          if($row['status']==0){?>
                                          Cancelled 
                                          <?php } ?></span></td>
                          </tr>

                          <?php
                              }
                              ?>
                      </tbody>
                  </table>
              </div>

              <!-- ================= New Customers ================ -->
              <div class="recentCustomers">
                  <div class="cardHeader">
                      <h2>Products</h2>
                      <a href="product.php" class="btn">View All</a>
                  </div>

                  <table>
                  <?php
            $i=0;
            $result = $db->prepare("select p.*,c.name as name1 from product p,category c where c.id=p.c_id order by rand()");
              $result->execute();
              for($i=0; $row = $result->fetch() and $i<10; $i++)
              {
                $p=$row['id'];
                $result1 = $db->prepare("select image from p_image where p_id='$p'");
              $result1->execute();
              $img='';
              for($j=0; $row1 = $result1->fetch(); $j++)
              {
                $img='../seller/uploads/';
                $img.=$row1['image'];
                break;
              }
              
                ?>
                      <tr>
                          <td width="60px">
                              <div class="imgBx"><img src='<?php echo $img; ?>' alt=""></div>
                          </td>
                          <td>
                              <h4><?php echo $row['name'];?> <br> <span><?php echo $row['name1'];?></span></h4>
                          </td>
                      </tr>
                      <?php
                      }
                      ?>

                      
                  </table>
              </div>
          </div>
      </div>
  </div>

  <!-- =========== Scripts =========  -->
  <script src="assets/js/main.js"></script>

  <!-- ====== ionicons ======= -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>