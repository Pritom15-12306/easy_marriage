<?php if ($_settings->chk_flashdata('success')) : ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
    </script>
<?php endif; ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">List of Client's Review</h3>
        <!-- <div class="card-tools">
            <a href="?page=blog/manage" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Create New blog</a>
        </div> -->
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="container-fluid">
                <table class="table table-bordered table-stripped">
                    <colgroup>
                        <col width="5%">
                        <col width="15%">
                        <col width="10%">
                        <col width="10%">
                        <col width="50%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Date Created</th>
                            <th>Husband Name</th>
                            <th>Wife Name</th>
                            <th>Client's Feedback</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $qry = $conn->query("SELECT * from `user_feedback` order by date(date_created) desc ");
                        while ($row = $qry->fetch_assoc()) :
                            $row['feedback'] = strip_tags(stripslashes(html_entity_decode($row['feedback'])));
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td align="center"><?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
                                <td align="center"><?php echo $row['husband_name'] ?></td>
                                <td align="center"><?php echo $row['wife_name'] ?></td>
                                <td>
                                    <p class=" m-0"><?php echo $row['feedback'] ?></p>
                                </td>

                                <!-- <td class="text-center">
                                    <?php if ($row['status'] == 1) : ?>
                                        <span class="badge badge-success">Active</span>
                                    <?php else : ?>
                                        <span class="badge badge-danger">Inactive</span>
                                    <?php endif; ?>
                                </td> -->

                                <td align="center">
                                    <button type="button" class="btn btn-danger btn-sm ">
                                        <a class="text-white text-bold delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-white"></span> Delete</a>
                                    </button>

                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.delete_data').click(function() {
            _conf("Are you sure to delete this Feedback permanently?", "delete_feedback", [$(this).attr('data-id')])
        })
        $('.table').dataTable();
    })

    function delete_feedback($id) {
        start_loader();
        $.ajax({
            url: _base_url_ + "classes/Master.php?f=delete_feedback",
            method: "POST",
            data: {
                id: $id
            },
            dataType: "json",
            error: err => {
                console.log(err)
                alert_toast("An error occured.", 'error');
                end_loader();
            },
            success: function(resp) {
                if (typeof resp == 'object' && resp.status == 'success') {
                    location.reload();
                } else {
                    alert_toast("An error occured.", 'error');
                    end_loader();
                }
            }
        })
    }
</script>