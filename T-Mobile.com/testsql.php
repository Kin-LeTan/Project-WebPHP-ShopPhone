<?php
include_once('connectSQL.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style type="text/css">
ul li{display: inline-block;list-style: none;text-align:center;width:50px}
.fa{font-size:30px}
.fa div{text-align:center;width: 100%;}
</style>
<div style="width:70%;margin:auto;border:1px solid gray;padding:5px;border-radius:5px">
    <input name="hoten" value="Văn C"><br>
    <span>Cảm nhận của bạn đối với sản phẩm này như thế nào? (Lựa sao đi bạn gì ơi)</span>
    <input id="input-star" name="hoten" value="0">
    <ul id="choose_stars">
    <li class="star-1" val-star="1"><i class="fa fa-star" aria-hidden="true"></i><p>Rất tệ</p></li>
    <li class="star-2" val-star="2"><i class="fa fa-star" aria-hidden="true"></i><p>Tệ</p></li>
    <li class="star-3" val-star="3"><i class="fa fa-star" aria-hidden="true"></i><p>Thường</p></li>
    <li class="star-4" val-star="4"><i class="fa fa-star" aria-hidden="true"></i><p>Tốt</p></li>
    <li class="star-5" val-star="5"><i class="fa fa-star" aria-hidden="true"></i><p>Rất tốt</p></li>
    </ul>
    <br>
    <span>Viết ý kiến đánh giá sản phẩm này tại đây: </span><br>
    <textarea name="editor1" style="width:100%;height:100px" placeholder="Mời bạn chia sẻ bài viết đánh giá sản phẩm này..."></textarea><br>
    <span>Chèn ảnh chụp thực tế (không bắt buộc): </span><input type="file">
</div>
<script>
    $(document).ready(function(){
  $("#choose_stars li").click(function(){
    var star = $(this).attr("val-star");
    var i = 1;
    $("#input-star").val(star);
    for(n=1;n<=5;n++){
        $("li").css("color","black");
    }
    while(i <= star){
        $(".star-"+i+"").css("color","rgb(251, 255, 0)");
        i++;
    }
  });
});
</script>