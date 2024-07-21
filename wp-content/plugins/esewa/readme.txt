=== eSewa - Nepal First Payment Gateway ===
Tags: eSewa, payment, woocommerce
Requires at least: 5.0
Tested up to: 6.5.3
Requires PHP: 7.0
Stable tag: 2.1
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

Official eSewa payment plugin for woocommerce. 

== Description ==
eSewa - Nepal First Payment Gateway plugin enables any user with a wordpress site to integrate eSewa payment gateway in their website/web application. eSewa is Nepal’s first online payment gateway and is a comprehensive online payment solution. It is widely popular, secure  as well as one of the most trusted online payment gateway. The following plugin incorporates itself with WordPress woo-commerce plugin and lets users pay via their eSewa id to buy any virtual goods or services. 

This plugin supports only NPR currency hence is only applicable for websites that accept Nepalese currency. 

==Detailed Description==
The following plugin relies on eSewa to make successfuly payment/purchase form the users wordpress e-commerce website. This plugin will only be triggered after the user proceeds to checkout page
from the site. The user will be redirected to eSewa login page where the user will need to enter their username and password and upon successful verfication, will make the payment and will be redirected to 
the website verfying the order's successful transation. The only circumstance where this plugin will be activated is during the checkout procedure. 

Service Link: [https://esewa.com.np/#/home](https://esewa.com.np/#/home)
Privacy Policy Link: [https://blog.esewa.com.np/privacy-policy](https://blog.esewa.com.np/privacy-policy)
Terms and Conditions Link: [https://blog.esewa.com.np/terms-and-conditions/](https://blog.esewa.com.np/terms-and-conditions/)


== Installation ==
Prerequisites:
WordPress version 5.0 or newer
WooCommerce  3.6 or newer

1) Automatic installation
> Login to your wordpress site
> Navigate to \"Plugins\"
> Click on \"Add New\"
> Search for \"eSewa - Nepal First Payment Gateway\" plugin and make sure its uploader is eSewa
> Click on install 
> Click on activate 
> Configure the needed settings and click on Save

2) Manual Installation 
> download the zip file 
> Login to your wordpress dashboard
> Navigate to “Plugins” and click on “Add New”
> Click on upload plugin 
> Select the downloaded plugin and click install
> Activate the plugin

GENERAL SETTINGS:
To select Nepalese rupee in woocommerce
1) Hover on “WooCommerce” menu from the left hand side menu and click on “Settings”
2) In the “General” tab, scroll down to see the “Currency” option
3) From the dropdown, select “Nepalese rupee(Rs)”
4) Click on “Save” changes

Plugin Settings:
1) Enable the plugin (enabled by default)
2) Change description if needed (default description: “Pay via eSewa. Payment enabled through eSewa account securely.”)
3) Add your Live Merchant/Service code and Secret Key for live purpose or Test Merchant/Service Code for sandbox (testing purpose)
4) You can change sandbox url as well
5) Add Invoice Prefix (default: WC-). If users are using same account for multiple stores than this prefix should be unique in all as eSewa does not allow orders with the same prefix numbers
6) Click on update once done






== Frequently Asked Questions ==

= Requirement for the Plugin to work =

WordPress Version 5.0 or newer
WooCommerce Version3.6 or newer
Merchant code and Secret Key which is provided by eSewa

= Which currency is accepted by the plugin =

ONLY  Nepalese rupee(Rs)


== Screenshots ==
1. Plugin settings
2. checkout page
3. confirmation for proceeding to eSewa gateway

== Changelog ==

= 2.1 =
Release Date: June 12, 2024

Bug fixed:
Redirection issue and payment not updating issue fixed
  
Enhancement:

* Updated version for web API,
* UI improvement,
* Direct Debit feature(Pay directly from your linked bank account),
* Apply Promocode,
* Security Enhanced