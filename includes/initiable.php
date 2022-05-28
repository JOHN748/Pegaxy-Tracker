<script type="text/javascript">
    <?php 
        $query = "SELECT * FROM users where id = $log_userid ";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);

        if($row['address'] == '1'){
            $address = $row['address_1'];
        }elseif($row['address'] == '2'){
            $address = $row['address_2'];
        }elseif($row['address'] == '3'){
            $address = $row['address_3'];
        }elseif($row['address'] == '4'){
            $address = $row['address_4'];
        }

        $code = $row['currency']; 
    ?>
    var address  = '<?php echo $address; ?>';
    var code = '<?php echo $code; ?>';
</script>