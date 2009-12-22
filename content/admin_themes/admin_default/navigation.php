<?php 
/**
 * Theme name: admin_default
 * Template name: navigation.php
 * Template author: Nick Ramsay
 *
 * PHP version 5
 *
 * LICENSE: Hotaru CMS is free software: you can redistribute it and/or 
 * modify it under the terms of the GNU General Public License as 
 * published by the Free Software Foundation, either version 3 of 
 * the License, or (at your option) any later version. 
 *
 * Hotaru CMS is distributed in the hope that it will be useful, but WITHOUT 
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or 
 * FITNESS FOR A PARTICULAR PURPOSE. 
 *
 * You should have received a copy of the GNU General Public License along 
 * with Hotaru CMS. If not, see http://www.gnu.org/licenses/.
 * 
 * @category  Content Management System
 * @package   HotaruCMS
 * @author    Nick Ramsay <admin@hotarucms.org>
 * @copyright Copyright (c) 2009, Hotaru CMS
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link      http://www.hotarucms.org/
 */
?>

<ul id="navigation">
    <?php $hotaru->pluginHook('navigation_first'); ?>
    <li><a href="<?php echo BASEURL; ?>"><?php echo $hotaru->lang["admin_theme_navigation_home"]; ?></a></li>
    <?php $hotaru->pluginHook('navigation'); ?>
    <?php 
        if (!$hotaru->isActive('users')) { 

            if ($hotaru->currentUser->loggedIn == true) { 
                echo "<li><a id='navigation_active' href='" . $hotaru->url(array(), 'admin') . "'>" . $hotaru->lang["admin_theme_navigation_admin"] . "</a></li>"; 
                echo "<li><a href='" . $hotaru->url(array('page'=>'admin_logout'), 'admin') . "'>" . $hotaru->lang["admin_theme_navigation_logout"] . "</a></li>";
            } else { 
                echo "<li><a href='" . $hotaru->url(array(), 'admin') . "'>" . $hotaru->lang["admin_theme_navigation_login"] . "</a></li>"; 
            }
        } else {
            $hotaru->pluginHook('navigation_users'); // ensures login/logout/register are last.
        }
    ?>
</ul>
