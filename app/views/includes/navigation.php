<header class="top_nav">
    <h1 class="logo_box">
        <a href="<?=URLROOT?>" class="logo">AMS</a>
    </h1>
    <div class="pc_menu_box pc">
        <ul class="top_menu pc">
            <li>
                <a href="<?=URLROOT?>/pages/index">Home</a>
            </li>
            <li>
                <a href="<?=URLROOT?>/pages/about">About</a>
            </li>
            <li>
                <a href="<?=URLROOT?>/pages/projects">Projects</a>
            </li>
            <li>
                <a href="<?=URLROOT?>/pages/blog">Blog</a>
            </li>
            <li>
                <a href="<?=URLROOT?>/pages/contact">Contact</a>
            </li>
            <li>
                <?php if(isLoggedIn()){?>
                    <a href="<?=URLROOT?>/users/logout" class="btn_1">Logout</a>
                <?php }else{?>
                    <a href="<?=URLROOT?>/users/login" class="btn_1">Login</a>
                <?php }?>
            </li>
        </ul>
    </div>
</header>
<div class="mobile_menu_btn_box mobile">
    <button class="mobile_btn">
        <span></span>
        <span></span>
        <span></span>
    </button>
</div>
<div class="mobile_menu_box mobile">
    <ul class="top_menu mobile">
        <li class="menu_li">
            <a href="<?=URLROOT?>/pages/index">Home</a>
        </li>
        <li class="menu_li">
            <a href="<?=URLROOT?>/pages/about">About</a>
        </li>
        <li class="menu_li">
            <a href="<?=URLROOT?>/pages/projects">Projects</a>
        </li>
        <li class="menu_li">
            <a href="<?=URLROOT?>/pages/blog">Blog</a>
        </li>
        <li class="menu_li">
            <a href="<?=URLROOT?>/pages/contact">Contact</a>
        </li>
        <li>
            <a href="<?=URLROOT?>/users/login" class="btn_1">Login</a>
        </li>
    </ul>
</div>
<div class="dummy mobile"></div>
