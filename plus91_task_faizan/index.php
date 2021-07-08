<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plus91</title>

    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/bootstrap-select.css" rel="stylesheet" />
    <link href="css/app_style.css" rel="stylesheet" />
</head>

<body>
    <div class="all-content-wrapper">

        <section class="container">
            <div class="form-group custom-input-space has-feedback">
                <div class="page-heading">
                    <h3 class="text-center">Plus91 Task</h3>
                </div>
                <div class="page-body clearfix">
                    <!-- form -->
                    <form id="hl_form" name="hl_form">
                        <input type="hidden" id="form_name" name="form_name" value="add_user" />
                        <input type="hidden" id="edit_id" name="edit_id" value="0" />
                        <input type="hidden" id="old_password" name="old_password" value="" />
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Patients Details:</div>
                                    <div class="panel-body">
                                        <div class="alert icon-alert with-arrow alert-success form-alter" role="alert">
                                            <i class="fa fa-fw fa-check-circle"></i>
                                            <strong> Success ! </strong> Data saved successfully.
                                        </div>
                                        <div class="alert icon-alert with-arrow alert-danger form-alter" role="alert">
                                            <i class="fa fa-fw fa-times-circle"></i>
                                            <strong> Note !</strong> Data saving failed.
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="patient_name" class="required">Patient Name:</label>
                                                <input type="text" class="form-control" id="name" name="name" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth" class="required">Date of Birth:</label>
                                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="age" class="required">Patient age:</label>
                                                <input type="text" class="form-control" id="age" maxlength="2" name="age" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city" class="required">City:</label>
                                                <select class="form-control selectpicker show-tick" id="city" name="city" data-live-search="true" required>
                                                    <option value="">-- select --</option>
                                                    <option value="Pune">Pune</option>
                                                    <option value="Mumbai">Mumbai</option>
                                                    <option value="Pune">Hyderabad</option>
                                                    <option value="Mumbai">Nagpur</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state" class="required">State:</label>
                                                <select class="form-control selectpicker show-tick" id="state" name="state" data-live-search="true" required>
                                                    <option value="">-- select --</option>
                                                    <option value="Maharastra">Maharastra</option>
                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address" class="form-label">Address:</label>
                                                <textarea class="form-control" id="address" rows="3" name="address"></textarea>
                                            </div>

                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-action-group">
                                            <button type="button" class="btn btn-primary btn-form-action btn-submit">Submit</button>
                                            <button type="button" class="btn btn-danger btn-form-action btn-reset">Clear</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="panel panel-default">
                        <div class="panel-heading">Patients List:</div>
                        <div class="panel-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-hover js-basic-example dataTable" id="table_id">
                                    <thead>
                                        <tr>
                                            <th width="100px">S.No</th>
                                            <th>Patient Name</th>
                                            <th>Date Of Birth</th>
                                            <th>Age</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Address</th>
                                            <th width="150px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sno = 1;
                                        $query = "select * from plus91_patient_details";
                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $sno++; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['date_of_birth']; ?></td>
                                                <td><?php echo $row['age']; ?></td>
                                                <td><?php echo $row['city']; ?></td>
                                                <td><?php echo $row['state']; ?></td>
                                                <td><?php echo $row['address']; ?></td>
                                                <td align="center">
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-sm btn-primary btn-edit" id="<?php echo $row['id']; ?>" title="Edit details">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-sm btn-danger btn-delete" id="<?php echo $row['id']; ?>" title="Delete details" data-toggle="modal" data-target="#confirmModal">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </td>
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
            </div>
        </section>
    </div>




    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
    <!-- Jquery Core Js -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap Select Js -->
    <script src="js/bootstrap-select.js"></script>

    <!-- validate Js -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function(e) {
            $("#hl_form").validate({
                //Validation rules
                rules: {
                    name: {
                        required: true
                    },
                    date_of_birth: {
                        required: true,
                    },
                    age: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    state: {
                        required: true,

                    },
                    address: {
                        required: true,

                    },

                },

                //validation error messages
                messages: {
                    name: {
                        required: "Please enter your Patient Name"
                    },
                    date_of_birth: {
                        required: "Please Select Date of Birth"
                    },
                    age: {
                        required: "Please enter your age",
                    },
                    city: {
                        required: "Please select City"
                    },
                    state: {
                        required: "Please Selct State"
                    },
                    address: {
                        required: "Please Enter Address"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

            $(document).on('click', '.btn-submit', function(ev) {
                ev.preventDefault();
                var btn_button = $(this);
                if ($("#hl_form").valid() == true) {
                    var data = $("#hl_form").serialize();
                    btn_button.html(' <i class="fa fa fa-spinner fa-spin"></i> Processing...');
                    btn_button.attr("disabled", true);
                    $.post('save_details.php', data, function(data, status) {
                        console.log("Data: " + data + "\nStatus: " + status);
                        if (data == "1") {
                            //alert("Data: " + data + "\nStatus: " + status);
                            $(".alert-danger").hide();
                            $(".alert-success").fadeIn(800);
                            btn_button.html('<i class="fa fa fa-check-circle"></i> Done');
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            alert("Data: " + data + "\nStatus: " + status);
                            $(".alert-success").hide();
                            $(".alert-danger").fadeIn(800);
                            btn_button.html('Submit').attr("disabled", false);
                        }
                    });
                }
            });

            $(document).on('click', '.btn-reset', function(ev) {
                ev.preventDefault();
                $("#form_name").val("add_user");
                $("#edit_id").val('');
                $("#name").val('').focus();
                $("#date_of_birth").val('');
                $("#age").val('');
                $("#city").val('').change();
                $("#state").val('').change();
                $("#address").val('');
                $(".dup-chek-details").html('');
                $("label.error").hide('');
            });

            $(document).on('click', '.btn-edit', function(ev) {
                ev.preventDefault();
                var btn_button = $(this);
                btn_button.html(' <i class="fa fa fa-spinner fa-spin"></i> ');
                var tbl_id = $(this).attr("id");
                $('.btn-reset').trigger('click');
                $.ajax({
                    cache: false,
                    url: 'get_ajax_details.php',
                    type: "GET",
                    dataType: 'json',
                    data: {
                        cmd: "get_user_details",
                        tbl_id: tbl_id
                    },
                    success: function(result) {
                        btn_button.html(' <i class="fa fa fa-pencil-square-o"></i> ');
                        console.log(result);
                        $("#form_name").val("edit_user");
                        $("#edit_id").val(result['id']);
                        $("#name").val(result['name']).focus();
                        $("#date_of_birth").val(result['data_of_birth']).change();
                        $("#age").val(result['age']);
                        $("#city").val(result['city']).change();
                        $("#state").val(result['state']).change();
                        $("#address").val(result['address']);
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            });


            $(document).on('click', '.btn-confirm-delete', function(ev) {
                ev.preventDefault();
                var btn_button = $(this);
                var tbl_id = $('.btn-confirm-delete').attr("id");
                $('#confirmModal').modal('hide');

                $.post('save_details.php', {
                    form_name: "del_user",
                    tbl_id: tbl_id
                }, function(data, status) {
                    console.log(data);
                    if (data == "1") {
                        btn_button.html('<i class="fa fa fa-check-circle "></i> Done');
                        $('.warning-modal-message').html("This details deleted successfully.");
                        $('#warningModal').modal('show');
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else if (data == "404-del") {
                        $('.warning-modal-message').html("This details reflect in another record. So you can't delete !!!");
                        $('#warningModal').modal('show');
                    } else {
                        $('.warning-modal-message').html("Data deletion failed.");
                        btn_button.html('Yes');
                    }
                });
            });

            $(document).on('click', '.btn-delete', function(ev) {
                ev.preventDefault();
                $(".btn-confirm-delete").attr("id", $(this).attr('id'));
            });

            $(document).on('click', '.btn-confirm-close', function(ev) {
                ev.preventDefault();
                $(".btn-confirm-delete").attr("id", "0");
            });


        });
    </script>

    <!-- Small Size -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content modal-col-danger">
                <div class="modal-header">
                    <h4 class="modal-title" id="smallModalLabel">Confirmation:</h4>
                </div>
                <div class="modal-body">
                    Do you want to Delete This Record ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-confirm-delete">Confirm</button>
                    <button type="button" class="btn btn-default btn-confirm-close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Small Size -->
    <div class="modal fade" id="warningModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="smallModalLabel">Info:</h4>
                </div>
                <div class="modal-body warning-modal-message">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-warning-close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>