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
                <a href="admin_profile.php"><span class="glyphicon glyphicon-pencil"></span></a>
                </td>
                </tr>
            </table>
                <div style="color: gray;text-align: center;text-transform:none;">
                <img class = "img-circle" src="../images/<?php echo $image_name;?>" style="width: 50px;height: auto;">
                <br>
                <?php echo substr($name, 0,10);?>
                </div>
                <div style="text-align: right;font-weight: bold;">
                    <a href="?logout">Log out</a>
                </div>
            </div>

            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="account.php" class="pure-menu-link">Account</a></li>
                <li class="pure-menu-item"><a href="member_list.php" class="pure-menu-link">Member</a></li>
                <li class="pure-menu-item"><a href="trainer.php" class="pure-menu-link">Trainer</a></li>
                <li class="pure-menu-item"><a href="gallery.php" class="pure-menu-link">Gallery</a></li>
                <li class="pure-menu-item"><a href="message.php" class="pure-menu-link">Message</a></li>
            </ul>
        </div>
    </div>
</div>
<script src="../assets/javascript/side-menu.js"></script>