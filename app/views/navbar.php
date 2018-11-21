
<nav>
<div id="nav-header">
    <div>
    <scan id="logo">Pro</scan> <scan id="logo-2">-Book</scan>
    </div>
    <div id="nav-header-end">
        <div id="hiname">
        Hi, <?php session_start(); echo $_SESSION['username'];?>!
        </div>

        <div id="logout-button">
            <a href="/Home/logout">
                <img src="../../public/images/logout.png">
            </a>
        </div>
    </div>
</div>
<div id="nav-bar">
    <ul class="nav_row">
        <a <?php if ($data['navigation']=="Browse") { echo "class='nav_item_active'";} ?> href= "/Home"><li>
            Browse
        </li></a>
        <a <?php if ($data['navigation']=="History") { echo "class='nav_item_active'";} ?> href= "/History"><li>
            History
        </li></a>
        <a <?php if ($data['navigation']=="Profile") { echo "class='nav_item_active'";} ?> href= "/Profile"><li>
            Profile
        </li></a>
    </ul>
</div>
</nav>
