<?php
?>


<div class="col-xl-4">
    <div class="lyear-sidebar">
        <!-- 热门文章 -->
        <aside class="widget widget-hot-posts">

            <div class="widget-title">热门文章</div>
            <ul>
                <?php
                $result1 = $conn->query("select * from article order by n desc limit 5");
                while($row = $result1->fetch_assoc()){


                    ?>
                    <li>
                        <a href="post.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a> <span><?php echo date("Y-m-d H:i:s",$row['c_time']);?></span>
                    </li>

                <?php } ?>
            </ul>
        </aside>

        <!-- 友情链接 -->
        <aside class="widget">
            <div class="widget-title">友情链接</div>
            <ul>
                <?php
                $result1 = $conn->query("select * from flink");
                while($row = $result1->fetch_assoc()){


                    ?>
                    <li><a href="<?php echo $row['url']?>"><?php echo $row['url_name']?></a></li>
                <?php } ?>
            </ul>
        </aside>


    </div>
</div>