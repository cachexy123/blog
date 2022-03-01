<?php
include_once 'header.php';

include_once '../common/Page.class.php';
$page = isset($_GET['page'])? $_GET['page'] : 1;
//isset判断它是否存在值
$subPages=8;
$start = ($page-1)*$subPages;

if ($_GET['action']=='del'){
    $id = filterstr($_GET['id']);
    $conn->query("delete from article where id = '$id'");
    if ($conn -> affected_rows > 0){
        redirect('2','article_list.php','删除成功');
    }else{
        redirect('2','article_list.php','删除失败');
    }
}

?>

    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="main.php">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="article_add.php"><i class="icon-font"></i>新增作品</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>ID</th>
                            <th>标题</th>
                            <th>点击</th>
                            <th>发布人</th>
                            <th>分类</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        <?php
                            //desc是降序排序
                            $result = $conn->query("select a.id,a.title,a.n,a.author,b.class_name,a.c_time from article as a,cate as b where a.cateid = b.id order by a.id desc limit $start,$subPages");


//                            $result_count = $result->num_rows;
                            while ( $row = $result->fetch_assoc()){

                                ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td title='<?php echo $row['title'];?>'><a target="_blank" href="article_edit.php?id=<?php echo $row['id'];?>" title="<?php echo $row['title'];?>"><?php echo $row['title'];?></a>
                            </td>
                            <td><?php echo $row['n'];?></td>
                            <td><?php echo $row['author'];?></td>
                            <td><?php echo $row['class_name'];?></td>
                            <td><?php echo date("Y-m-d H:i:s",$row['c_time']);?></td>
                            <td>
                                <a class="link-update" href="article_edit.php?id=<?php echo $row['id'];?>">修改</a>
                                <a class="link-del" href="javascript:del(<?php echo $row['id']; ?>);">删除</a>
                            </td>

                        </tr>
                        <?php } ?>

                    </table>
                    <div class="list-page">
                        <?php
                        $result_count1=$conn->query("select * from article as a,cate as b where a.cateid = b.id order by a.id desc");
                        $result_count=$result_count1->num_rows;

                        $p = new Page($result_count,4,$page,$subPages);
                            echo $p->showPages(1);

                        ?>
                    </div>
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