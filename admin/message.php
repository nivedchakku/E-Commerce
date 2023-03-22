<?php include("header.php");
include('../../apps/connect/db.php');
?>
<head>
<link rel="stylesheet" href="../seller/css/bootstrap.min.css">
	<link rel="stylesheet" href="../seller/css/font-awesome.min.css">
	<link rel="stylesheet" href="../seller/css/ionicons.min.css">
	<link rel="stylesheet" href="../seller/css/datepicker3.css">
	<link rel="stylesheet" href="../seller/css/all.css">
	<link rel="stylesheet" href="../seller/css/select2.min.css">
	<link rel="stylesheet" href="../seller/css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="../seller/css/jquery.fancybox.css">
	<link rel="stylesheet" href="../seller/css/AdminLTE.min.css">
	<link rel="stylesheet" href="../seller/css/_all-skins.min.css">
	<link rel="stylesheet" href="../seller/css/on-off-switch.css"/>
	<link rel="stylesheet" href="../seller/css/summernote.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="full_content" style="padding:0px 200px">
<section class="content-header" style="display:flex;justify-content:space-between">

		<h1 class="col-lg-3">Messages</h1>
</section>

<section class="content">
	<div class="row">
		<div class="">
			<div class="box box-info">
				<div class="">
					<table id="example1" class="table table-bordered table-hover table-striped">
					<thead class="thead-dark">
							<tr>
								<th width="10">#</th>
                                <th>user</th>
								<th>Name</th>
								<th width="160">Email</th>
                                <th width="160">Subject</th>
								<th width="60">Message</th>
                                <th>status</th>
								<th width="80">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=1;
							$result = $db->prepare("select * from message order by date DESC");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++)
								{
								
									?>
									<tr>
										<td><?php echo $i; ?></td>
                                        <td style=""><?php if($row['user']==0) echo "Customer"; else echo "Seller"; ?></td>
										<td style=""><?php echo $row['name']; ?></td>
										<td class="col-lg-2"><?php echo $row['email']; ?></td>
										<td><?php echo $row['subject']; ?></td>
										<td><?php echo $row['message']; ?></td>
                                        <td style="color:green;"><?php if($row['status']==0) echo "Pending"; else echo "Closed"; ?></td>
                                        <?php if($row['status']==0){?>
										<td><a href="message_close.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Close</a></td>
                                        <?php } else echo "<td></td>";?>
									</tr>
									<?php
								}
							
							?>							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
</div>