<footer id="footer" class="site-footer" style="display: none">
	<div class="copyright">
		Copyright &copy; 2016 - <a href="#">Panasonic India Pvt Ltd</a>
	</div>
</footer>

<!-- *****DEMO THEME CONFIG****** -->
<?php
if (($uri_check == $ar . 'INDEX.PHP') || ($uri_check == $ar . 'ADVERT_DASHBOARD.PHP')) {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/numeral.js"></script>
<script src="assets/js/jquery-jvectormap.js"></script>
<script src="assets/js/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/js/jquery-charts-flot.js"></script>
<script src="assets/js/jquery-flot-tooltip.js"></script>
<script src="assets/js/jquery-flot-time.js"></script>
<script src="assets/js/jquery-charts-flot-pie.js"></script>
<script src="assets/js/jquery-flot-axislabels.js"></script>
<script src="assets/js/jquery-flot-symbol.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/dashboard-projects.js"></script>

<!-- --- -->

<?php
} elseif (($uri_check == $ar . 'PROJECTLIST.PHP')) {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/chosen-jquery.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/forms-chosen.js"></script>

<?php
} elseif ($uri_check == $ar . 'CREATEPROJECT.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/bootstrap3-wysihtml5.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/forms-bootstrap-datepicker.js"></script>
<script src="assets/js/forms-wysihtml5.js"></script>
<script src="assets/js/validation.js"></script>
<script type="text/javascript">
        $(function () {
            if (!er) {
                var frm = $('#dataForm');
                frm.submit(function (ev) {
                    var request = $.ajax({
                        type: frm.attr('method'),
                        url: frm.attr('action'),
                        data: frm.serialize(),
                        success: function (data) {
                            $('#target').html(data);
                        }
                    });
                    request.fail(function (jqXHR, textStatus) {
                        alert("Request failed: " + textStatus);
                    });
                    ev.preventDefault();
                });
            }
        });
    </script>
<?php
} elseif ($uri_check == $ar . 'INSTALLAPK.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script
	src="https://blueimp.github.io/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
<script
	src="https://blueimp.github.io/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
<script
	src="https://blueimp.github.io/jQuery-File-Upload/js/jquery.fileupload.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/bootstrap3-wysihtml5.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/forms-bootstrap-datepicker.js"></script>
<script src="assets/js/forms-wysihtml5.js"></script>
<script src="assets/js/validation.js"></script>
<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url =  'uploadFile.php';
    $('#fileupload').fileupload({
        
        url: url,
        maxChunkSize: 1000000,
        dataType: 'json',
        done: function (e, data) {
               	
            $.each(data.result.files, function (index, file) {
                var filenamearr = file.name.split("_");
                var filename = filenamearr[1];
            	$('<p/>').text(filename).appendTo('#files');
                $('#apkname').val(file.name)
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

    
});
</script>

<script>
        $(function () {
            $("#inventry_type").on("change", function () {

                var request = $.ajax({
                    type: "POST",
                    url: "Advert/listProjects.php",
                    data: {inv: $("#inventry_type").val()},
                    async: true,
                    dataType: 'json',
                    success: function (data) {
                       
                    	 var options = '';
                         options += '<select class="chosen form-control" data-placeholder="Choose a Inventry Type" style="width: 240px;" name="select_list" id="inventry_type">';
                         options += '<option value="">--Select List--</option>';
                         for (var x = 0; x < data.length; x++) {
                             options += '<option value="' + data[x].modal_name + '">' + data[x].modal_name + '</option>';
                         }
                         options += '</select>';
                         var $el = $("#cat_drop");
                         $el.empty(); // remove old options

                         $('#cat_drop').html(options);
                    }

                });
            });
        });
    </script>


<?php
} elseif (($uri_check == $ar . 'CREATEPROJECT2.PHP') || ($uri_check == $ar . 'MODIFYPROJECT2.PHP')) {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/jquery-data-tables.js"></script>
<script src="assets/js/jquery-data-tables-bs3.js"></script>
<script src="assets/js/moment.js"></script>
<script src="assets/js/chosen-jquery.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/forms-chosen.js"></script>
<script src="assets/js/validation.js"></script>

<script type="text/javascript">
        $(function () {
          
                var frm = $('#inventry_form');
                frm.submit(function (ev) {
                    var request = $.ajax({
                        type: frm.attr('method'),
                        url: frm.attr('action'),
                        data: frm.serialize(),
                        success: function (data) {
                            $('#target').html(data);

                        }
                    });
                    request.fail(function (jqXHR, textStatus) {
                        alert("Request failed: " + textStatus);
                    });
                    ev.preventDefault();
                });
            
        });
        $(function () {
            $("#gen_button").click(function () {
                var request = $.ajax({
                    type: 'post',
                    url: 'generate_id.php',
                    success: function (data) {
                        $('#gen_id').html(data);
                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
                ev.preventDefault();
            });
        });
        $(function () {
            $(document.body).on("click", "#edit", function () {
                var request = $.ajax({
                    type: 'post',
                    url: 'inventryedit.php',
                    success: function (data) {
                        $('#target').html(data);
                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
                ev.preventDefault();
            });
        });
        $(function () {
            
                var frm = $('#item_form');
                frm.submit(function (ev) {
                    var request = $.ajax({
                        type: frm.attr('method'),
                        url: frm.attr('action'),
                        data: frm.serialize(),
                        success: function (data) {
                            $('#list').html(data);

                        }
                    });
                    request.fail(function (jqXHR, textStatus) {
                        alert("Request failed: " + textStatus);
                    });
                    ev.preventDefault();
                });
            
        });
    </script>
<script>
        $(function () {
            $(document.body).on('change', '#s_project', function () {
                var request = $.ajax({
                    type: "POST",
                    url: "inv_details/selectProject.php",
                    data: {project_name: $("#s_project").val()},
                    async: true,
                    dataType: 'json',
                    success: function (data) {
                        $("#datatables-1").find("tr:gt(0)").remove();

                        for (var x = 0; x < data.length; x++) {
                            y = x + 1;
                            $("#datatables-1").append('<tr><td>' + data[x].bar_code + '</td><td>' + data[x].item_name + '</td><td>' + data[x].inv_comments + '</td><td>' + data[x].to_user_Name + '</td><td>' + data[x].item_assigned_datetime + '</td><td>' + data[x].item_assign_status + '</td></tr>');
                        }
                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });

            });
        });
    </script>
<?php
} elseif (($uri_check == $ar . 'CREATEPROJECT3.PHP') || ($uri_check == $ar . 'MODIFYPROJECT3.PHP')) {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/moment.js"></script>
<script src="assets/js/chosen-jquery.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/forms-chosen.js"></script>

<script>
        $(function () {
            $("#group_type").change(function () {
                var request = $.ajax({
                    type: "POST",
                    url: "userMgr/selectGroup.php",
                    data: {group_type: $("#group_type").val()},
                    async: true,
                    dataType: 'json',
                    success: function (data) {

                        var options = '';
                        options += '<select class="chosen form-control" data-placeholder="Choose a Group Name" style="width: 240px;" name="group_name" id="group_name">';
                        options += '<option value="">--Select Group--</option>';
                        for (var x = 0; x < data.length; x++) {
                            options += '<option value="' + data[x].S_NO + '">' + data[x].user_group_name + '</option>';
                        }
                        options += '</select>';
                        var $el = $("#group_select");
                        $el.empty(); // remove old options

                        $('#group_select').html(options);
                        //  alert(options);


                    }
                });

            })

        });
    </script>
<script>
        $(function () {
            $('#group_select').on('change', 'select', function () {
                var request = $.ajax({
                    type: "POST",
                    url: "userMgr/selectGroup.php",
                    data: {group_name: $("#group_name").val()},
                    async: true,
                    dataType: 'json',
                    success: function (data) {

                        var options = '';
                        options += '<select class="chosen form-control" data-placeholder="Choose a User Name" style="width: 240px;" name="user_name" id="user_name">';
                        options += '<option value="">--Select User--</option>';
                        for (var x = 0; x < data.length; x++) {
                            options += '<option value="' + data[x].user_id + '">' + data[x].uname + '</option>';
                        }
                        options += '</select>';
                        var $el = $("#group_user");
                        $el.empty(); // remove old options

                        $('#group_user').html(options);
                        //  alert(options);

                    }
                });

            })
        });
    </script>
<script>
        $(function () {
            $("#add_user").on("click", function () {

                var request = $.ajax({
                    type: "POST",
                    url: "userMgr/addUser.php",
                    data: {group_name: $("#group_name").val(), group_type: $("#group_type").val(), user_name: $("#user_name").val(), project_id: "<?php
    if (isset($_SESSION['project_id'])) {
        echo $_SESSION['project_id'];
    }
    ;
    ?>"},
                    async: true,
                    dataType: 'json',
                    success: function (data) {
                        var table = '<div class="table-responsive"><table class="table table-simple"><thead><tr><th class="truncate">User Name</th><th>Group Name</th></tr><tbody>';
                        for (var x = 0; x < data.length; x++) {
                            table += '<tr><td>' + data[x].uname + '</td><td>' + data[x].gname + '</td></tr>';
                        }
                        table += '</tbody></table>';
                        $('#team_id').html(table);
                    }
                });
            });
        });
    </script>

<?php
} elseif ($uri_check == $ar . 'MODIFYPROJECT.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/bootstrap3-wysihtml5.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/forms-wysihtml5.js"></script>


<?php
} elseif (($uri_check == $ar . 'ADDNEWUSER.PHP') || ($uri_check == $ar . 'ASSIGNRIGHTS.PHP') || ($uri_check == $ar . 'ADDNEWGROUP.PHP') || ($uri_check == $ar . 'MODPROJECT.PHP')) {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/chosen-jquery.js"></script>
<script src="assets/js/bootstrap3-wysihtml5.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/forms-chosen.js"></script>
<script src="assets/js/forms-wysihtml5.js"></script>
<script src="assets/js/bootstrap-treeview.js"></script>
<script>
        $(function () {

            $("#group_type").change(function () {
                var request = $.ajax({
                    type: "POST",
                    url: "NewGroupData.php",
                    data: {group_type: $("#group_type").val()},
                    async: true,
                    success: function (data) {
                        $('#list').html(data);

                    }
                });

            })
        });
        $(function () {
            $("#group_name").change(function () {
                var request = $.ajax({
                    type: "POST",
                    url: "NewGroupData.php",
                    data: {group_name: $("#group_name").val()},
                    async: true,
                    success: function (data) {
                        $('#list').html(data);

                    }
                });

            })
        });
        $(function () {
            $("#user_name").change(function () {
                var request = $.ajax({
                    type: "POST",
                    url: "NewGroupData.php",
                    data: {user_name: $("#user_name").val()},
                    async: true,
                    success: function (data) {
                        $('#list').html(data);

                    }
                });

            })
        });
        $(function () {

            var frm = $('#group_form');
            $('#form_save').on('click', function (ev) {
                var checkbox_val = 0;
                $('input[name="rights[]"]:checked').each(function () {
                    checkbox_val = this.value + ',' + checkbox_val;
                });

                var request = $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: {rights: checkbox_val, group_type: $("#group_type").val(), group_name: $("#group_name").val(), newgroup_name: $("[name='newgroup_name']").val(), group_description: $("[name='group_description']").val()},
                    success: function (data) {
                        $('#list').html(data);

                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
                ev.preventDefault();
            });
        });
        $(function () {
            $('#user_save').on('click', function (ev) {
                var checkbox_val = 0;
                $('input[name="rights[]"]:checked').each(function () {
                    checkbox_val = this.value + ',' + checkbox_val;
                });

                var request = $.ajax({
                    type: 'POST',
                    url: 'SaveRights.php',
                    data: {rights: checkbox_val, select_user: $("#select_user").val(), user_name: $("#user_name").val(), group_name: $("#group_name").val()},
                    success: function (data) {
                        $('#list').html(data);

                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
                ev.preventDefault();
            });
        });
    </script>
<script type="text/javascript">
        $(function () {
            var frm = $('#inventry_form');
            frm.submit(function (ev) {
                var request = $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function (data) {
                        $('#target').html(data);

                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
                ev.preventDefault();
            });
        });
        $(function () {
            $("#gen_button").click(function () {
                var request = $.ajax({
                    type: 'post',
                    url: 'generate_id.php',
                    success: function (data) {
                        $('#gen_id').html(data);
                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
                ev.preventDefault();
            });
        });
        $(function () {
            $("#edit").click(function () {
                var request = $.ajax({
                    type: 'post',
                    url: 'inventryedit.php',
                    success: function (data) {
                        $('#target').html(data);
                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });

            });
        });
        $(function () {
            var frm = $('#item_form');
            frm.submit(function (ev) {
                var request = $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function (data) {
                        $('#list').html(data);

                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
                ev.preventDefault();
            });
        });
    </script>
<?php
} elseif (($uri_check == $ar . 'PROJECTDETAILS.PHP') || ($uri_check == $ar . 'TESTCASEDETAILS.PHP')) {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/moment.js"></script>
<script src="assets/js/chosen-jquery.js"></script>
<script src="assets/js/jquery-peity.js"></script>
<script src="assets/js/jquery-easy-pie-chart.js"></script>
<script src="assets/js/raphael.js"></script>
<script src="assets/js/jquery-charts-morris.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/forms-chosen.js"></script>
<script src="assets/js/charts-peity.js"></script>
<script src="assets/js/project.js"></script>
<?php
} elseif (($uri_check == $ar . 'USERDETAIL.PHP') || $uri_check == $ar . 'GROUPDETAILS.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/moment.js"></script>
<script src="assets/js/raphael.js"></script>
<script src="assets/js/jquery-charts-morris.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/member.js"></script>
<?php
} elseif ($uri_check == $ar . 'USERLIST.PHP') {
    ?>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/chosen-jquery.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/forms-chosen.js"></script>

<?php
} elseif ($uri_check == $ar . 'USERMESSAGES.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/icheck.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/forms-icheck.js"></script>

<?php
} elseif ($uri_check == $ar . 'ACTIVITYLOGS.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<?php
} elseif ($uri_check == $ar . 'BUGLISTOLD.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/chosen-jquery.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/forms-chosen.js"></script>
<script>
        $(function () {
            $("[id^=form_]").submit(function (ev) {
                var frm = $(this);
                var frm_id = frm.attr('id');
                var hid = $("#" + frm_id + " input[id='hid_id']").val();
                var request = $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function (data) {
                        $("#print_" + hid).html(data);
                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
                ev.preventDefault();
            });


        });
        $(function () {
            $(document.body).on('change', '.bug_stat', function () {
                var atid = $(this).attr('id');
                var atval = $('#' + atid).val();

                var request = $.ajax({
                    type: 'POST',
                    url: 'buglist/statusUpdate.php',
                    data: {stat: atval, id: atid},
                    success: function (data) {
                        console.log(data);
                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            });


        });

    </script>

<?php
} elseif ($uri_check == $ar . 'BUGLIST.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/jquery-data-tables.js"></script>
<script src="assets/js/jquery-data-tables-bs3.js"></script>
<script src="assets/js/chosen-jquery.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/tables.js"></script>
<script src="assets/js/forms-chosen.js"></script>
<script>
        $(function () {
            $("[id^=form_]").submit(function (ev) {
                var frm = $(this);
                var frm_id = frm.attr('id');
                var hid = $("#" + frm_id + " input[id='hid_id']").val();
                var request = $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function (data) {
                        $("#print_" + hid).html(data);
                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
                ev.preventDefault();
            });


        });
        $(function () {
            $(document.body).on('change', '.bug_stat', function () {
                var atid = $(this).attr('id');
                var atval = $('#' + atid).val();

                var request = $.ajax({
                    type: 'POST',
                    url: 'buglist/statusUpdate.php',
                    data: {stat: atval, id: atid},
                    success: function (data) {
                        console.log(data);
                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            });


        });
        $(function () {
            $(document.body).on('click', '[id^=project]',function (ev) {
            	var atid = $(this).attr('id');
            	var request = $.ajax({
                    type: 'POST',
                    url: 'buglist/bugDetails.php',
                    data: {id: atid},
                    async: true, 
                    dataType: 'json',
                    success: function (data) {
                    	              
                             $( "h4#bug_title" ).html( data.bug_titles);
                             $( "span#bug_freq" ).html( data.bug_frequency);
                             $( "span#bug_pri" ).html( data.bug_priority);
                             $("span#bug_stat").html( data.bug_status);
                             $("span#bug_date").html( data.bug_raise_time);
                             $("span#bug_rai").html( data.uname);
                             $("span#bug_pre").html( data.bug_precondition);
                             $("span#bug_str").html( data.bug_reproduce);
                             $("span#bug_er").html( data.bug_expected);
                             $("span#bug_tracker").html( data.bug_tracker);
                             $("span#bug_comm").html( data.bug_comment);

                        console.log(data);
                    }
                    
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            	$('#modal-view-bug').modal('show'); 
            	ev.preventDefault();
            })
        });
    </script>

<?php
} elseif (($uri_check == $ar . 'TESTCASELIST.PHP') || ($uri_check == $ar . 'PROJECTTESTCASE.PHP')) {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/chosen-jquery.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/forms-chosen.js"></script>

<script>    $(function () {
            var frm = $('#testcase-form');
            frm.submit(function (ev) {
                var request = $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function (data) {
                        window.location = 'TestCaseList.php?e=' + data
                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
                ev.preventDefault();
            });
        });
    </script>
<script>$(function () {
            $(".tc_status").change(function () {
                var atid = $(this).attr('id');
                var atval = $('#' + atid).val();
                var request = $.ajax({
                    type: 'POST',
                    url: 'testcase/statusUpdate.php',
                    data: {stat: atval, id: atid},
                    success: function (data) {
                        console.log(data);
                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            });


        });</script>
<script>$(function () {
            $(".tc_comment").focusout(function () {
                var atid = $(this).attr('id');
                var atval = $('#' + atid).val();
                var request = $.ajax({
                    type: 'POST',
                    url: 'testcase/statusUpdate.php',
                    data: {stat: atval, id: atid},
                    success: function (data) {
                        console.log(data);
                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            });


        });</script>
<script>
        $(document).on("click", ".editer", function (event) {
            event.preventDefault();
            $('#edit_enable').val('update');
            $('#modal-add-member-label').text('Edit Test Case');
            $('button#test_button').text('Update Test Case');

            $.ajax({
                url: $(this).attr('href'),
                dataType: 'json',
                success: function (data) {


                    for (var x = 0; x < data.length; x++) {
                        $("#title").val(data[0].testcase_title);
                        $("textarea#precondition").val(data[0].testcase_preconditions);
                        $('[name="catagory"]').val(data[0].testcase_catagory).trigger("chosen:updated");
                        $('#tc_type').val(data[0].testcase_type).trigger("chosen:updated");
                        $('#priority').val(data[0].testcase_priority).trigger("chosen:updated");
                        $("#reproduce").val(data[0].testcase_steps);
                        $("#expected").val(data[0].testcase_required_result);
                        $("#test_val").val(data[0].S_NO);
                    }
                    $('#modal-new-tc').modal('toggle');
                }
            });

        });
    </script>
<script>
        $("#add_testcase").on("click", function (event) {
            event.preventDefault();
            $('#edit_enable').val('insert');
            $('#modal-add-member-label').text('Add New TestCase');
            $('button#test_button').text('Add New TestCase');

            $("#title").val("");
            $("textarea#precondition").val("");
            $('[name="catagory"]').val("Messaging").trigger("chosen:updated");
            $('#tc_type').val("1").trigger("chosen:updated");
            $('#priority').val("3").trigger("chosen:updated");
            $("#reproduce").val("");
            $("#expected").val("");
            $("#test_val").val("0");

        });

    </script>
<script>
        $(function () {
            $("#category_filter").on("change", function () {

                var request = $.ajax({
                    type: "POST",
                    url: "testcase/tcfilter.php",
                    data: {category: $("#category_filter").val()},
                    async: true,
                    dataType: 'json',
                    success: function (data) {
                        $("#tclist > tbody > tr").empty();
                        for (var x = 0; x < data.length; x++) {
                            $('#tclist > tbody').append('<tr><td>' + data[x].S_NO + '</td><td>' + data[x].testcase_catagory + '</td><td>' + data[x].testcase_title + '</td><td>' + data[x].testcase_preconditions + '<hr>' + data[x].testcase_steps + '<hr>' + data[x].testcase_required_result + '</td><td>' + data[x].testcase_priority + '</td><td>' + data[x].testcase_create_date + '</td><td><a href="testcase/tcediter.php?id=' + data[x].S_NO + '" class="editer">Edit</a> </td></tr>');
                        }
                        //table.responsive.recalc();
                    }

                });
            });
        });
    </script>
<script>
        $(function () {
            $("#tc_filter").on("change", function () {

                document.location.href = "projectTestcase.php?d=<?php echo $_GET ['d'] ?>&category=" + $("#tc_filter").val();
            });
        });
    </script>

<?php
} elseif ($uri_check == $ar . 'DRIVE.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/user-drive.js"></script>

<?php
} elseif ($uri_check == $ar . 'TODOLIST.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/jquery-todo-list.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/todo-list.js"></script>

<?php
} elseif ($uri_check == $ar . 'CALENDAR.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/moment.js"></script>
<script src="assets/js/fullcalendar.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/calendar-1.js"></script>

<?php
} elseif ($uri_check == $ar . 'TESTCASEUPLOADER.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/jasny-bootstrap.js"></script>
<script src="assets/js/holder.js"></script>
<script src="assets/js/jquery-data-tables.js"></script>
<script src="assets/js/jquery-data-tables-bs3.js"></script>
<script src="assets/js/dropzone.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/tables.js"></script>
<script src="assets/js/dropzone-demo.js"></script>
<?php
} elseif ($uri_check == $ar . 'PROJECTDISCUSSIONS.PHP') {
    ?>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/bootstrap-markdown.js"></script>
<script src="assets/js/markdown-js.js"></script>
<script src="assets/js/to-markdown.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<?php
} elseif ($uri_check == $ar . 'PROJECTINVENTRYLIST.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/moment.js"></script>
<script src="assets/js/raphael.js"></script>
<script src="assets/js/jquery-charts-morris.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/invoices.js"></script>
<?php
} elseif ($uri_check == $ar . 'PROJECTINVENTRY.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/jquery-data-tables.js"></script>
<script src="assets/js/jquery-data-tables-bs3.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/tables.js"></script>
<script src="assets/js/forms-chosen.js"></script>
<?php
} elseif ($uri_check == $ar . 'REPORTS.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/jquery-todo-list.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script>$(function () {
            $('a.rep').click(function (event) {
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('href'),
                    dataType: 'json',
                    success: function (data) {
                        // alert(data);
                        var file = data.file_name;
                        //alert(data.id);
                        var id = data.id;

                        $('#' + id).attr("href", file);
                        $('#' + id).attr('target', '_blank');
                        $('#' + id).text("Download");
                    }
                });

            });
        });
    </script>
<?php
} elseif ($uri_check == $ar . 'INVENTRYMANAGER.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/jquery-data-tables.js"></script>
<script src="assets/js/jquery-data-tables-bs3.js"></script>
<script src="assets/js/moment.js"></script>
<script src="assets/js/chosen-jquery.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/forms-chosen.js"></script>
<script src="assets/js/tables.js"></script>
<script type="text/javascript">

        $(function () {
            var tag1 = '<div class="form-group">';
            tag1 += '<label class="col-sm-3 control-label">User Barcode:</label>';
            tag1 += '<div class="col-sm-9">';
            tag1 += '<input type="text" class="form-control" id="textinput"';
            tag1 += 'placeholder="User Barcode" name="user_barcode">';
            tag1 += '</div>';
            tag1 += '</div>';


            var tag2 = '<div class="form-group">';
            tag2 += '<label class="col-sm-3 control-label">Old User Barcode:</label>';
            tag2 += '<div class="col-sm-9">';
            tag2 += '<input type="text" class="form-control" ';
            tag2 += 'placeholder="User Barcode" name="user_barcode">';
            tag2 += '</div>';
            tag2 += '</div>';
            tag2 += '<div class="form-group" >';
            tag2 += '<label class="col-sm-3 control-label">New User Barcode:</label>';
            tag2 += '<div class="col-sm-9">';
            tag2 += '<input type="text" class="form-control"';
            tag2 += 'placeholder="User Barcode" name="new_user_barcode">';
            tag2 += '</div>';
            tag2 += '</div>';

            var tag3 = '<div class="form-group">';
            tag3 += '<label class="col-sm-3 control-label">Barcode:</label>';
            tag3 += '<div class="col-sm-9">';
            tag3 += '<input type="hidden" name="user_barcode" value="In Inventry">';
            tag3 += '<b>To Inventry</b>';
            tag3 += '</div>';
            tag3 += '</div>';

            var tag4 = '<div class="form-group">';
            tag4 += '<label class="col-sm-3 control-label">Barcode:</label>';
            tag4 += '<div class="col-sm-9">';
            tag4 += '<input type="hidden" name="user_barcode" value="lost">';
            tag4 += '<b>Mark as lost</b>';
            tag4 += '</div>';
            tag4 += '</div>';

            $('#inventry_type').on('change', function () {

                if ($('#inventry_type').val() == "issue")
                {
                    var data = tag1;
                } else if ($('#inventry_type').val() == "transfer") {

                    var data = tag2;
                } else if ($('#inventry_type').val() == "return") {

                    var data = tag3;

                } else if ($('#inventry_type').val() == "lost") {

                    var data = tag4;

                }
                $("#inv_field").html(data)
            });
            $('#inventry_type2').on('change', function () {
                //alert('Test');

                if ($('#inventry_type2').val() == "issue")
                {
                    var data = '<div class="form-group">';
                    data += '<label class="col-sm-3 control-label">User Barcode:</label>';
                    data += '<div class="col-sm-9">';
                    data += '<select class="chosen form-control" data-placeholder="User..." style="width: 240px;" 	name="item_user"> <option value="">Please select</option>';
                    data += '<?php echo $opts ?></select>';
                    data += '</div>';
                    data += '</div>';
                } else if ($('#inventry_type2').val() == "transfer") {

                    var data = '<div class="form-group">';
                    data += '<label class="col-sm-3 control-label">User Name:</label>';
                    data += '<div class="col-sm-9">';
                    data += '<select class="chosen form-control" data-placeholder="User..." style="width: 240px;" 	name="item_user"> <option value="">Please select</option>';
                    data += '<?php echo $opts ?></select>';
                    data += '</div>';
                    data += '</div>';
                    data = '<div class="form-group">';
                    data += '<label class="col-sm-3 control-label">User Name:</label>';
                    data += '<div class="col-sm-9">';
                    data += '<select class="chosen form-control" data-placeholder="User..." style="width: 240px;" 	name="new_item_user"> <option value="">Please select</option>';
                    data += '<?php echo $opts ?></select>';
                    data += '</div>';
                    data += '</div>';

                } else if ($('#inventry_type2').val() == "return") {

                    var data = tag3;

                } else if ($('#inventry_type2').val() == "lost") {

                    var data = tag4;

                }
                $("#inv_field2").html(data)
            });

        });
        $(function () {
            var frm = $('#barcode-form');
            frm.submit(function (ev) {
                var request = $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    async: true,
                    dataType: 'json',
                    success: function (data) {
                        $("#issue_log > tbody > tr").empty();
                        for (var x = 0; x < data.length; x++) {
                            $('#issue_log > tbody').append('<tr><td>' + data[x][7] + '</td><td>' + data[x][6] + '</td><td>' + data[x][8] + '</td><td>' + data[x][1] + '</td><td>' + data[x][4] + '</td><td>' + data[x][5] + '</td></tr>');
                        }

                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });
                ev.preventDefault();
            });
            $(function () {
                var frm = $('#user-form');
                frm.submit(function (ev) {
                    var request = $.ajax({
                        type: frm.attr('method'),
                        url: frm.attr('action'),
                        data: frm.serialize(),
                        async: true,
                        dataType: 'json',
                        success: function (data) {
                            $("#issue_log > tbody > tr").empty();
                            for (var x = 0; x < data.length; x++) {
                                $('#issue_log > tbody').append('<tr><td>' + data[x][7] + '</td><td>' + data[x][6] + '</td><td>' + data[x][8] + '</td><td>' + data[x][1] + '</td><td>' + data[x][4] + '</td><td>' + data[x][5] + '</td></tr>');
                            }

                        }
                    });
                    request.fail(function (jqXHR, textStatus) {
                        console.log("Request failed: " + textStatus);
                    });
                    ev.preventDefault();
                });

            });

        });

    </script>
<?php
} elseif ($uri_check == $ar . 'DATA_FILTER.PHP') {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/tokenize2.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/jquery-todo-list.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/todo-list.js"></script>
<script type="text/javascript">
$(function () {
	$('.city').tokenize2({
		  dataSource: 'Advert/filter_pages/city.php',
		  placeholder: 'Search City' 
		});
	$('.oper').tokenize2({
		  dataSource: 'Advert/filter_pages/operator.php',
		  placeholder: 'Search Operator' 
		});
	$('.lang').tokenize2({
		  dataSource: 'Advert/filter_pages/language.php',
		  placeholder: 'Search Language' 
		});
	$('.pkg').tokenize2({
		  dataSource: 'Advert/filter_pages/package.php',
		  placeholder: 'Search Package' 
		});
});
</script>
<?php
} else {
    ?>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/metisMenu.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pace.js"></script>
<script src="assets/js/jquery-todo-list.js"></script>
<script src="assets/js/tether.js"></script>
<script src="assets/js/tether-shepherd.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tour.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/todo-list.js"></script>
<script>    $(function () {
            var frm = $('#barcode-form');
            frm.submit(function (ev) {
                var request = $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function (data) {
                        $('#target').html(data);

                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
                ev.preventDefault();
            });
        });
    </script>
<?php } ?>

<?php //include_once 'ajaxReq.php'; ?>

</body>
</html>
