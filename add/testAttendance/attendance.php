<?php
include('header.php');

?>

<div class="container" style="margin-top: 30px;">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9">attendance liste</div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="attendance_table">
                    <td>
                        <tr>
                            <th>student name</th>
                            <th>student prenom</th>
                            <th>attendance status</th>
                            <th>attendance date</th>
                        </tr>
                        <tr>

                        </tr>
                    </td>
                </table>
            </div>
        </div>
    </div>

</div>

</body>

</html>

<script>
    $(document).ready(function() {
        var dataTable = $('attendance_table').dataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "attendance_action.php",
                method: "POST",
                data: {
                    action: "fetch"
                }
            }

        });
    });
</script>