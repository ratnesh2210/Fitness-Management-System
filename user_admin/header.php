<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>
    <div id="menu">
        <div class="pure-menu">
            <div class="pure-menu-heading" style="background-color: #222222;">
            <table style="width: 100%">
                <tr>
                    <td style="text-align: left;">
                <a href="../"><span class="glyphicon glyphicon-home"></span></a>
                </td>
                    <td style="text-align: right;">
                <a href="user_profile.php"><span class="glyphicon glyphicon-pencil"></span></a>
                </td>
                </tr>
                </table>
                <div style="color: gray;text-align: center;text-transform:none;">
                <img class = "img-circle" src="../images/<?php if(!empty($image_name)){echo $image_name;}else{echo 'default.png';}?>" style="width: 50px;height: auto;">
                <br>
                <?php if(!empty($name)){echo substr($name, 0,10);}else{echo 'Mr.X';}?>
                </div>
                <div style="text-align: right;font-weight: bold;">
                    <a href="?logout">Log Out</a>
                </div>
            </div>

            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="user_activities.php" class="pure-menu-link">Daily Activities</a></li>
                <li class="pure-menu-item"><a href="message.php" class="pure-menu-link">Message</a></li>
                <li class="pure-menu-item"><a href="plan.php" class="pure-menu-link">Price Plan</a></li>
                <li class="pure-menu-item"><a href="payment.php" class="pure-menu-link">Payment</a></li>
                <li class="pure-menu-item"><a href="user_feedback.php" class="pure-menu-link">Feedback</a></li>
            </ul>
        </div>
    </div>
</div>
<script src="../assets/javascript/side-menu.js"></script>