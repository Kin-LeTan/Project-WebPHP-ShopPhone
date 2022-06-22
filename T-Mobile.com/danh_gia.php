<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<form method="POST">
                <textarea id="editor" name="editor1"></textarea>
                <script>
                        CKEDITOR.replace( 'editor1' );
                </script>
                <input type="text" name="id_phone">
                <input style="width:100%;height:40px;background-image: linear-gradient(to right,  #fca5f1, #b5ffff)" type="submit" value="Đăng bình luận của bạn.">
</form>
<?php
include_once('connectSQL.php');
$id_phone=$_POST['id_phone'];
$editor1=$_POST['editor1'];
mysqli_query($conn,"UPDATE `phone` SET `evaluate`='$editor1' WHERE id_phone='$id_phone'")
?>