<select class="sel_cdoc" name="spec" id="spec">
    <option></option>
    <?php
    include "connect.php";
    $sql = "SELECT * FROM d_specl ";
    $cnt = mysqli_query($con, $sql);

    if ($cnt) {
        while ($row = mysqli_fetch_assoc($cnt)) {
            echo "<option value=" . $row['s_id'] . ">" . $row['s_name'] . "</option>";
        }
    } else {
        echo $con->error;
    }

    echo "</select>

                <select name='docName' id='docName' class='sel_cdoc1'></select>
                ";
    ?>
    <span style="color: red;" id=msg> &nbsp;</span>

    <script>
        $(document).ready(function() {
            $('#spec').change(function() {

                var s_id = $('#spec').val();

                $('#docName').empty(); //remove all existing options

                $.get('ddck.php', {
                    's_id': s_id
                }, function(return_data) {
                    if (return_data.data.length > 0) {
                        $('#msg').html('');
                        $.each(return_data.data, function(key, value) {
                            $("#docName").append("<option value='" + value.doc_id + "'>" + value.f_name + ' ' + value.l_name + "</option>");
                        });
                    } else {
                        $('#msg').html('Doctor Missing');
                    }
                }, "json");

            });

        });
    </script>