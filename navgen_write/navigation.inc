<?php
//=============================================================
// This file has been generated automatically
// by /~uwp/fvwm-web/navgen.php
// Created at 31/03/03 10:24
// You should change the order of $top_array only !!!
// Uwe Pross 2002
//=============================================================

// names of the top sites - you may change the order if you like
$top_array = array(
                   "home",
                   "news",
                   "features",
                   "screenshots",
                   "download",
                   "documentation",
                   "contact",
                   "links"
                   );

$fvwm_cats["file"]         = "fvwm_cats/index.php";
$fvwm_cats["rel_path"]     = "./..";
$fvwm_cats["link_name"]    = "Fvwm Cats";
$fvwm_cats["link_chapter"] = "";
$fvwm_cats["link_pic"]     = "pictures/icons/fvwm_cats";
$fvwm_cats["parent_site"]  = "home";
$fvwm_cats["child_sites"]  = array();

$home["file"]         = "index.php";
$home["rel_path"]     = ".";
$home["link_name"]    = "FVWM&nbsp;Home";
$home["link_chapter"] = "";
$home["link_pic"]     = "pictures/icons/home";
$home["parent_site"]  = "top";
$home["child_sites"]  = array("fvwm_cats");

$news["file"]         = "news.php";
$news["rel_path"]     = ".";
$news["link_name"]    = "News";
$news["link_chapter"] = "";
$news["link_pic"]     = "pictures/icons/news";
$news["parent_site"]  = "top";
$news["child_sites"]  = array();

$features["file"]         = "features.php";
$features["rel_path"]     = ".";
$features["link_name"]    = "Features";
$features["link_chapter"] = "";
$features["link_pic"]     = "pictures/icons/features";
$features["parent_site"]  = "top";
$features["child_sites"]  = array();

$screenshots_desks["file"]         = "screenshots/screenshots_desks.php";
$screenshots_desks["rel_path"]     = "./..";
$screenshots_desks["link_name"]    = "Desktops";
$screenshots_desks["link_chapter"] = "";
$screenshots_desks["link_pic"]     = "pictures/icons/screenshots_desks";
$screenshots_desks["parent_site"]  = "screenshots";
$screenshots_desks["child_sites"]  = array();

$screenshots_decor["file"]         = "screenshots/screenshots_decor.php";
$screenshots_decor["rel_path"]     = "./..";
$screenshots_decor["link_name"]    = "Decors";
$screenshots_decor["link_chapter"] = "";
$screenshots_decor["link_pic"]     = "pictures/icons/screenshots_decor";
$screenshots_decor["parent_site"]  = "screenshots";
$screenshots_decor["child_sites"]  = array();

$screenshots_menu["file"]         = "screenshots/screenshots_menu.php";
$screenshots_menu["rel_path"]     = "./..";
$screenshots_menu["link_name"]    = "Menus";
$screenshots_menu["link_chapter"] = "";
$screenshots_menu["link_pic"]     = "pictures/icons/screenshots_menu";
$screenshots_menu["parent_site"]  = "screenshots";
$screenshots_menu["child_sites"]  = array();

$screenshots["file"]         = "screenshots/index.php";
$screenshots["rel_path"]     = "./..";
$screenshots["link_name"]    = "Screenshots";
$screenshots["link_chapter"] = "";
$screenshots["link_pic"]     = "pictures/icons/screenshots";
$screenshots["parent_site"]  = "top";
$screenshots["child_sites"]  = array("screenshots_desks", "screenshots_decor", "screenshots_menu");

$download_icons["file"]         = "download/download_icons.php";
$download_icons["rel_path"]     = "./..";
$download_icons["link_name"]    = "Icons";
$download_icons["link_chapter"] = "";
$download_icons["link_pic"]     = "pictures/icons/download_icons";
$download_icons["parent_site"]  = "download";
$download_icons["child_sites"]  = array();

$download["file"]         = "download/index.php";
$download["rel_path"]     = "./..";
$download["link_name"]    = "Download";
$download["link_chapter"] = "";
$download["link_pic"]     = "pictures/icons/download";
$download["parent_site"]  = "top";
$download["child_sites"]  = array("download_icons");

$doc_faq["file"]         = "documentation/doc_faq.php";
$doc_faq["rel_path"]     = "./..";
$doc_faq["link_name"]    = "FAQ";
$doc_faq["link_chapter"] = "";
$doc_faq["link_pic"]     = "pictures/icons/doc_faq";
$doc_faq["parent_site"]  = "documentation";
$doc_faq["child_sites"]  = array();

$doc_manpages["file"]         = "documentation/doc_manpages.php";
$doc_manpages["rel_path"]     = "./..";
$doc_manpages["link_name"]    = "Man Pages";
$doc_manpages["link_chapter"] = "";
$doc_manpages["link_pic"]     = "pictures/icons/doc_manpages";
$doc_manpages["parent_site"]  = "documentation";
$doc_manpages["child_sites"]  = array();

$documentation["file"]         = "documentation/index.php";
$documentation["rel_path"]     = "./..";
$documentation["link_name"]    = "Docs";
$documentation["link_chapter"] = "";
$documentation["link_pic"]     = "pictures/icons/documentation";
$documentation["parent_site"]  = "top";
$documentation["child_sites"]  = array("doc_faq", "doc_manpages");

$contact_mail_archive["file"]         = "contact/contact_mail_archive.php";
$contact_mail_archive["rel_path"]     = "./..";
$contact_mail_archive["link_name"]    = "Mail archive";
$contact_mail_archive["link_chapter"] = "";
$contact_mail_archive["link_pic"]     = "pictures/icons/contact_mail_archive";
$contact_mail_archive["parent_site"]  = "contact";
$contact_mail_archive["child_sites"]  = array();

$contact_mailing_list["file"]         = "contact/contact_mailing_list.php";
$contact_mailing_list["rel_path"]     = "./..";
$contact_mailing_list["link_name"]    = "Mailing list";
$contact_mailing_list["link_chapter"] = "";
$contact_mailing_list["link_pic"]     = "pictures/icons/contact_mailing_list";
$contact_mailing_list["parent_site"]  = "contact";
$contact_mailing_list["child_sites"]  = array();

$contact["file"]         = "contact/index.php";
$contact["rel_path"]     = "./..";
$contact["link_name"]    = "Contact";
$contact["link_chapter"] = "";
$contact["link_pic"]     = "pictures/icons/contact";
$contact["parent_site"]  = "top";
$contact["child_sites"]  = array("contact_mail_archive", "contact_mailing_list");

$links["file"]         = "links.php";
$links["rel_path"]     = ".";
$links["link_name"]    = "Links";
$links["link_chapter"] = "";
$links["link_pic"]     = "pictures/icons/links";
$links["parent_site"]  = "top";
$links["child_sites"]  = array();

?>
