<?php
require_once '../class/class.MenuOrganizer1.php';
require_once '../config/connection.php';
// Create an instance of the MenuOrganizers class
$menuOrganizers = new MenuOrganizer1($conn);
?>

<!-- Sidebar Starts -->
<div class="sidenav" id="sidebar-wrapper">
        <div class="sidebar-heading text-center headtitle py-4 fs-4 fw-bold text-uppercase border-bottom"
                id="headtitle"><img src="../../public/logos/dashboard.png" class="sideiconshowhead" height="45rem"
                        width="45rem" alt="">SentGeeks</div>
        <div class="list-group list-group-flush my-3">
                <?php
                $menuData = $menuOrganizers->getMenuData();
                function generateMenuHTML($menuItems)
                {
                        foreach ($menuItems as $menuItem) {
                                $pid = $menuItem['id'];
                                ?>
                                <a class="sub-btn list-group-items second-text fw-bold" onclick="openurl(<?= $pid ?>)">
                                        <i class="<?= $menuItem['navicon'] ?> me-2 sideiconshow"></i>
                                        <span class="text-capitalize">
                                                <?php echo $menuItem['title'] ?>
                                        </span>
                                        <?php if (!empty($menuItem['child'])) { ?>
                                                <i class="fa-solid fa-chevron-down caretbtn" id="cb"></i>
                                        <?php }?>
                                       
                                </a>
                                <?php if (!empty($menuItem['child'])) { ?>
                                        <div class="sub-menu py-1 mx-2" id="dashboard">
                                                <?php generateChildMenuHTML($menuItem['child']); ?>
                                        </div>
                                <?php }
                        }
                }

                function generateChildMenuHTML($childItems)
                {
                        foreach ($childItems as $childItem) {
                                $id = $childItem['id'];
                                echo '<div class="mx-5 py-1">';
                                echo '<a href="#" class="subb-btn text-capitalize" onclick="openurl('. $id .')">' . $childItem['title'] . '</a>';
                                echo '</div>';
                        }
                }
                generateMenuHTML($menuData);
                ?>

                <a href="#" class="list-group-items second-text fw-bold"><i
                                class="fas fa-power-off me-2 sideiconshow"></i>Logout</a>
        </div>
</div>
<!-- sidebar-Nav ends -->

<script>


</script>
<script>
        $(document).ready(function () {
                // Tab Toggleing
                var currentTab = "";
                $(".sub-btn").click(function () {
                        const subMenu = $(this).next('.sub-menu');
                        const caretBtn = $(this).find('.caretbtn');

                        // Check if the clicked tab is already open
                        const isOpen = subMenu.is(':visible');

                        // Close the previously opened tab if it's not the same as the current tab
                        if (currentTab && currentTab !== subMenu && !isOpen) {
                                currentTab.slideUp();
                                currentTab.prev().find('.caretbtn').removeClass('rotate');
                        }

                        // Toggle the current tab and update the currentTab variable
                        subMenu.slideToggle();
                        caretBtn.toggleClass('rotate');
                        currentTab = isOpen ? null : subMenu; // Update currentTab only if the tab is opened (not closed)
                });

                // Root Node Active
                const navLinks = document.querySelectorAll(".sub-btn");
                navLinks.forEach(function (element) {
                        element.addEventListener('click', function () {
                                navLinks.forEach((e) => {
                                        e.classList.remove('activelist');
                                        this.classList.add('activelist');
                                });
                        });
                });

                // Subroot Node Active
                const navLinks2 = document.querySelectorAll(".subb-btn");
                navLinks2.forEach(function (element) {
                        element.addEventListener('click', function () {
                                navLinks2.forEach((e) => {
                                        e.classList.remove('activelist2');
                                        this.classList.add('activelist2');
                                });
                        });
                });

        });
        // page open function
        function openurl(url_id) {
                $.ajax({
                        url: '../ajax/fetchurl.php',
                        type: 'post',
                        data: { urid: url_id },
                        success: function (data, status) {
                                str = '../templates/' + data + '.php';
                                $("#maincontent").load(str);
                        }
                });
        }
</script>