<div class="content-wrapper"> 

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>User Management </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo admin_url().'category'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User Managmenet</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Users</h3>
						
						 <?php
                    if ($this->session->flashdata('success_msg')) {
                        ?>
                        <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Alert!</b> <?php echo $this->session->flashdata('success_msg'); ?> </div>
                        <?php
                    }
                    ?>
                        <a href="<?php echo admin_url().'users/add'; ?>">
                            <button class="btn btn-success" style="float:right;">Add User</button>
                        </a> </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Company Name</th>
                                    <th>Company Address</th>
                                    <th>Vat Number</th>
									<th>Email ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($get_user_data as $user){
                                    ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $user['first_name']; ?></td>
                                        <td><?php echo $user['last_name']; ?></td>
                                        <td><?php echo $user['company_name']; ?></td>
                                        <td><?php echo $user['company_address']; ?></td>
                                        <td><?php echo $user['vat_number']; ?></td>
                                        <td><?php echo $user['email_id']; ?></td>
                                        <td><a href="<?php echo admin_url(); ?>edit/user/<?php echo $user['id']; ?>" title="Edit User"><i class="fa  fa-edit btn_action"></i></a> <a href="<?php echo admin_url(); ?>delete/user/<?php echo $user['id']; ?>" title="Delete" onclick="return confirm('Are You Sure!');"><i class="fa  fa-trash-o btn_action"></i></a></td>
                                    </tr>
									<?php
									}
								?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body --> 
                </div>
                <!-- /.box --> 
            </div>
            <!-- /.col --> 
        </div>
        <!-- /.row --> 
    </section>
    <!-- /.content --> 
</div>
<?php $this->load->view('admin/includes/footer'); ?>
<!-- DataTables --> 
<script src="<?php echo admin_assets_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="<?php echo admin_assets_url(); ?>plugins/datatables/dataTables.bootstrap.min.js"></script> 

<!-- AdminLTE App --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/app.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo admin_assets_url(); ?>dist/js/demo.js"></script> 
<!-- page script --> 
<script>
                                        $(function () {
                                            $("#example1").DataTable();

                                        });
</script> 
<script type="text/javascript">
    function active(x)
    {
        var id11 = x;
        $.ajax({
            type: "POST",
            url: '<?PHP echo base_url(); ?>admin/active_subcategory',
            data: {"id": id11},
            success: function (data) {

                location.reload();
            }
        });
    }
    function deactive(r)
    {
        var id11 = r;
        $.ajax({
            type: "POST",
            url: '<?PHP echo base_url(); ?>admin/deactive_subcategory',
            data: {"id": id11},
            success: function (data) {

                location.reload();
            }
        });
    }
</script>
</body></html>