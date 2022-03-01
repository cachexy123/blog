<?php
include_once 'header.php';

$id = filterstr($_GET['id']);
$result = $conn->query("select * from article where id = '$id'");
$row = $result->fetch_assoc();

if ($_POST['sub']){
    $title = filterstr($_POST['title']);
    $content = filterstr($_POST['content']);
    $author = filterstr($_POST['author']);
    $keyword = filterstr($_POST['keyword']);
    $c_time = time();
    $cateid = filterstr($_POST['cateid']);
    $conn -> query("update article set title='$title',content='$content',author='$author',keyword='$keyword',c_time=$c_time,cateid=$cateid where id='$id'");

    if ($conn->affected_rows>0){
        redirect('2','article_list.php','修改成功');

    }else{
        redirect('2','article_edit.php','修改失败');

    }

}

?>

    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="main.php">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="article_list.php">作品管理</a><span class="crumb-step">&gt;</span><span>编辑作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th width="120"><i class="require-red">*</i>分类：</th>
                                <td>
                                    <select name="cateid" id="cateid" class="required">
                                        <option value="">请选择</option>
                                        <?php
                                        $cate_result=$conn->query("select * from cate");

                                        while($row1 = $cate_result->fetch_assoc()){
                                            $selected = $row['cateid']==$row1['id']?"selected":null;
                                            ?>
                                            <option <?php echo $selected ?> value="<?php echo $row1['id'];?>"><?php echo $row1['class_name'];?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="<?php echo $row['title']; ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>作者：</th>
                                <td><input class="common-text" name="author" size="50" value="<?php echo $row['author']; ?>" type="text"></td>
                            </tr>

                            <tr>
                                <th>关键字：</th>
                                <td><input class="common-text" name="keyword" size="50" value="<?php echo $row['keyword']; ?>" type="text" placeholder="请输入关键字"></td>
                            </tr>
                            <tr>
                                <th>内容：</th>
                                <td><textarea name="content" id="EditorId" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"><?php echo $row['content']; ?></textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" name="sub" type="submit">
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="utf-8">//初始化编辑器
    window.UEDITOR_HOME_URL = "ueditor/";//配置路径设定为UEditor所放的位置
    window.onload=function(){
        /* window.UEDITOR_CONFIG.initialFrameHeight=600;//编辑器的高度*/
        /* window.UEDITOR_CONFIG.initialFrameWidth=1200;//编辑器的宽度*/
        var editor = new UE.ui.Editor({
            imageUrl : '',
            fileUrl : '',
            imagePath : '',
            filePath : '',
            imageManagerUrl:'', //图片在线管理的处理地址
            imageManagerPath:''
        });
        editor.render("EditorId");//此处的EditorId与<textarea name="content" id="EditorId">的id值对应 </textarea>
    }
</script>
</body>
</html>
