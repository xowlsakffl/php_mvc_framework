<?php include("layouts/header.php"); ?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php include("layouts/top_nav.php"); ?>
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("layouts/side_nav.php"); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <?php include("admin_content.php"); ?>
        </div>
        <!-- /#page-wrapper -->
<?php include("layouts/footer.php"); ?>
<script>
    $(function(){
        $('.nav li a').click(function(){
            var url = $(this).attr('data-url');
            $('#page-wrapper').load(url);
        });
    })
</script>