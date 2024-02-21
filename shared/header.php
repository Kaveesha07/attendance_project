<div class="navbar">
    <div class="nav-right">
        <img src="../assets/images/eylogo2.png" alt="">
        <a href="../views/staff_dashboad.php" class="text-decoration-none "> <span  >Staff Management Portal</span></a>
    </div>

    <div class="nav-left">
        <div class="navleft-content">
        <ul>
            <li class="nav-item">
                    Welcome, <?=$_SESSION['firstName']?>
            </li>
            <li class="nav-item">
                    <a href="staff_login.php"><button class="logoutBtn" onclick=logout()>Logout</button></a>
            </li>

        </ul>
        </div>
    </div>
</div>
<script>
    function logout(){
    <?php 
        
    ?>
    }  
</script>