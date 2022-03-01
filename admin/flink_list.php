<?php
include_once 'header.php';

//include_once '../common/Page.class.php';
//$page = isset($_GET['page'])? $_GET['page'] : 1;
////isset判断它是否存在值
//
//$subPages=8;
if ($_GET['action']=='del'){
    $id = filterstr($_GET['id']);
    $conn->query("delete from flink where id = '$id'");
    if ($conn -> affected_rows > 0){
        redirect('2','flink_list.php','删除成功');
    }else{
        redirect('2','flink_list.php','删除失败');
    }
}

?>

    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="main.php">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">友情链接管理</span></div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="flink_add.php"><i class="icon-font"></i>新增链接</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>ID</th>
                            <th>网站名称</th>
                            <th>url</th>
                            <th>操作</th>
                        </tr>
                        <?php
                            //desc是降序排序
                            $result = $conn->query("select * from flink");


//                            $result_count = $result->num_rows;
                            while ( $row = $result->fetch_assoc()){

                                ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td title='<?php echo $row['url_name'];?>'><a target="_blank" href="flink_edit.php?id=<?php echo $row['id'];?>" title="<?php echo $row['url_name'];?>"><?php echo $row['url_name'];?></a>
                            </td>
                            <td><a href="<?php echo $row['url'];?>" target="_blank"><?php echo $row['url'];?></a> </td>


                            <td>
                                <a class="link-update" href="flink_edit.php?id=<?php echo $row['id'];?>">修改</a>
                                <a class="link-del" href="javascript:del(<?php echo $row['id']; ?>);">删除</a>
                            </td>

                        </tr>
                        <?php } ?>

                    </table>

                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
<script>
    function del(id) {
        if (false==confirm("是否确定删除?")) return;
        location.href='?action=del&id='+ id;

    }
</script>
</body>
</html>