<?php
 $conn=@mysql_pconnect($_POST['dbhost'],$_POST['dbuser'],$_POST['dbpassword']);
if (!$conn) {
			echo "<h2><p><font color=red> Could not connect to the server '" .$_POST['dbhost'] . "<b>Database connection failed</b>.<br><br>Please verify the following values are correct:<br>
           - database host name<br>- database username<br> - database password<br> - database name<br><br>
           If you are still unable to connect, please contact your web hosting provider for these values.'</p></h2>\n";
        	echo mysql_error();
			exit;
		}
	
else
{

	//$sql ="CREATE DATABASE ".$_POST['dbname'];
	//mysql_query($sql);
	@mysql_select_db($_POST['dbname'],$conn);
	
	
$sql="CREATE TABLE ".$_POST['dbprefix']."_admin (
  user_id int(11) NOT NULL auto_increment,
  user_fname varchar(100) character set latin1 collate latin1_general_ci NOT NULL,
  user_lname varchar(100) NOT NULL,
  user_email varchar(100) NOT NULL,
  user_login varchar(50) NOT NULL,
  user_pass varchar(50) NOT NULL,
  user_gender enum('Male','Female') NOT NULL default 'Male',
  user_dob varchar(11) NOT NULL,
  last_login datetime NOT NULL,
  user_status enum('Active','Inactive','Deleted') NOT NULL default 'Active',
  user_reg_status enum('Active','Inactive') NOT NULL default 'Inactive',
  user_state varchar(100) NOT NULL,
  user_city varchar(100) NOT NULL,
  user_zip varchar(100) NOT NULL,
  user_address varchar(100) NOT NULL,
  user_phone varchar(100) NOT NULL,
  reg_dt date NOT NULL,
  show_name enum('Yes','No') NOT NULL default 'Yes',
  show_phone enum('Yes','No') NOT NULL default 'Yes',
  show_address enum('Yes','No') NOT NULL default 'Yes',
  avatar varchar(50) NOT NULL default 'noimage.png',
  theme varchar(100) NOT NULL,
  PRIMARY KEY  (user_id)
)";
	//echo $sql;
	mysql_query($sql);
	
	$sql ="INSERT INTO ".$_POST['dbprefix']."_admin (user_id, user_fname, user_lname, user_email, user_login, user_pass, user_gender, user_dob, last_login, user_status, user_reg_status, user_state, user_city, user_zip, user_address, user_phone, reg_dt, show_name, show_phone, show_address, avatar, theme) VALUES
(1, 'admin', 'admin', '".$_POST['admin_email']."', '".$_POST['admin_username']."', '".$_POST['admin_pass']."', 'Male', '07/02/2010', '2010-07-01 12:57:11', 'Active', 'Active', '', '', '', '', '', '0000-00-00', 'Yes', 'Yes', 'Yes', 'noimage.png', '')";
	mysql_query($sql);
	
	
	///////////////////
	
	$sql="CREATE TABLE ".$_POST['dbprefix']."_admin_order_payment (
  order_id int(11) NOT NULL auto_increment,
  buyer_id int(11) NOT NULL,
  seller_id int(11) NOT NULL,
  order_status enum('pending','compleated','cancelled') NOT NULL default 'pending',
  order_status_date date NOT NULL,
  mc_gross float default NULL,
  protection_eligibility varchar(255) NOT NULL,
  address_status varchar(255) NOT NULL,
  payer_id varchar(255) NOT NULL,
  tax varchar(255) NOT NULL,
  address_street varchar(255) default NULL,
  payment_date varchar(255) default NULL,
  payment_status varchar(255) default NULL,
  charset varchar(255) NOT NULL,
  address_zip varchar(255) default NULL,
  first_name varchar(255) NOT NULL,
  address_country_code varchar(255) NOT NULL,
  address_name varchar(255) NOT NULL,
  notify_version varchar(255) NOT NULL,
  custom varchar(255) NOT NULL,
  payer_status varchar(255) NOT NULL,
  address_country varchar(255) NOT NULL,
  address_city varchar(255) NOT NULL,
  quantity varchar(255) NOT NULL,
  payer_email varchar(255) NOT NULL,
  verify_sign varchar(255) NOT NULL,
  txn_id varchar(255) NOT NULL,
  payment_type varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  address_state varchar(255) NOT NULL,
  receiver_email varchar(255) NOT NULL,
  pending_reason varchar(255) NOT NULL,
  txn_type varchar(255) NOT NULL,
  item_name varchar(255) NOT NULL,
  mc_currency varchar(255) NOT NULL,
  item_number varchar(255) NOT NULL,
  residence_country varchar(255) NOT NULL,
  test_ipn varchar(255) NOT NULL,
  transaction_subject varchar(255) NOT NULL,
  handling_amount varchar(255) NOT NULL,
  payment_gross double NOT NULL,
  shipping varchar(255) NOT NULL,
  merchant_return_link varchar(255) NOT NULL,
  PRIMARY KEY  (order_id)
)";
	//echo $sql;
	mysql_query($sql);
	
	

//////////
	
	$sql="CREATE TABLE ".$_POST['dbprefix']."_admin_paypal_id (
  id int(11) NOT NULL auto_increment,
  paypal_id varchar(100) NOT NULL,
  PRIMARY KEY  (id)
) ";
	//echo $sql;
	mysql_query($sql);
	
	$sql ="INSERT INTO ".$_POST['dbprefix']."_admin_paypal_id (id, paypal_id) VALUES
(1, '".$_POST['paypal_id']."')";
	mysql_query($sql);
	
	
	///////////////////
	
	
	$sql="CREATE TABLE ".$_POST['dbprefix']."_catagory (
  catagory_id int(11) NOT NULL auto_increment,
  catagory_name varchar(255) NOT NULL,
  catagory_description varchar(255) NOT NULL,
  catagory_status enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY  (catagory_id)
)";
	//echo $sql;
	mysql_query($sql);
	
	$sql ="INSERT INTO ".$_POST['dbprefix']."_catagory (catagory_id, catagory_name, catagory_description, catagory_status) VALUES
(1, 'Gift Ideas', 'Fun & Bizarre', 'Active'),
(2, 'Fun & Bizarre', 'Fun & Bizarre', 'Active'),
(3, 'Graphics', 'Graphics', 'Inactive'),
(4, 'Social Marketing', 'Social Marketing', 'Inactive'),
(5, 'Travel', 'Travel', 'Active'),
(6, 'Writing', 'Writing', 'Active'),
(7, 'Postcards', 'Postcards', 'Inactive'),
(8, 'Advertising', 'Advertising', 'Inactive'),
(9, 'Music & Audio', 'Music & Audio', 'Inactive'),
(10, 'Tips & Advice', 'Tips & Advice', 'Inactive'),
(11, 'Business', 'Business', 'Inactive'),
(12, 'Technology', 'Technology', 'Inactive')";
	mysql_query($sql);
	
	
	///////////////////
	
	
	
	$sql="CREATE TABLE ".$_POST['dbprefix']."_cms (
  id int(11) NOT NULL auto_increment,
  cms_name varchar(255) character set latin1 collate latin1_general_ci default NULL,
  cms_content longtext character set latin1 collate latin1_general_ci,
  cms_image varchar(255) NOT NULL,
  cms_status enum('Active','Inactive','Deleted') character set latin1 collate latin1_general_ci NOT NULL default 'Active',
  PRIMARY KEY  (id)
) ";
	//echo $sql;
	mysql_query($sql);
	
	
	$sql ="INSERT INTO ".$_POST['dbprefix']."_cms (id, cms_name, cms_content, cms_image, cms_status) VALUES
(1, 'HOW IT''S WORK', '<p>Test data , from admin you can controll .</p>', '', 'Active'),
(2, 'HELP', '<p>Test data , from admin you can controll .</p>', '', 'Active'),
(3, 'Terms of Service', '<p>Test data , from admin you can controll .</p>', '', 'Active')";
	mysql_query($sql);
	
	
	
	
	///////////////////
	
	$sql="CREATE TABLE ".$_POST['dbprefix']."_delivered (
  id int(11) NOT NULL auto_increment,
  order_id int(11) NOT NULL,
  message varchar(255) NOT NULL,
  attachment varchar(255) NOT NULL,
  PRIMARY KEY  (id)
)";
	//echo $sql;
	mysql_query($sql);
	

	
	
	///////////////////
	
		
	$sql="CREATE TABLE ".$_POST['dbprefix']."_gigs (
  id int(11) NOT NULL auto_increment,
  gigs_title varchar(255) NOT NULL,
  catagory_id int(11) NOT NULL,
  user_id int(11) NOT NULL,
  gigs_description text NOT NULL,
  gigs_keywords_tags mediumtext NOT NULL,
  gigs_maxi_days_to_comp int(11) NOT NULL,
  gigs_location varchar(255) NOT NULL,
  gigs_image varchar(255) NOT NULL,
  gigs_like enum('Like','Unlike') NOT NULL default 'Unlike',
  gigs_like_user_id int(11) NOT NULL,
  gigs_date datetime NOT NULL,
  gigs_rate varchar(255) NOT NULL,
  gigs_visitor varchar(255) NOT NULL,
  gigs_featured enum('Y','N') NOT NULL default 'N',
  gigs_status enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY  (id)
)";
	//echo $sql;
	mysql_query($sql);
	
	
	
	
	///////////////////
	
	
		$sql="CREATE TABLE ".$_POST['dbprefix']."_inbox (
  id int(11) NOT NULL auto_increment,
  gigs_id int(11) NOT NULL,
  to_id varchar(255) NOT NULL,
  from_id varchar(255) NOT NULL,
  sub varchar(255) NOT NULL,
  body text NOT NULL,
  cc varchar(255) NOT NULL,
  bcc varchar(255) NOT NULL,
  attachment varchar(255) NOT NULL,
  date_time datetime NOT NULL,
  read_status enum('Y','N') NOT NULL default 'N',
  PRIMARY KEY  (id)
)";
	//echo $sql;
	mysql_query($sql);
	
	
	
	///////////////////
	
	
	$sql="CREATE TABLE ".$_POST['dbprefix']."_login_history (
  login_history_id mediumint(9) NOT NULL auto_increment,
  user_id mediumint(9) NOT NULL,
  user_ip varchar(100) NOT NULL,
  user_browser varchar(100) NOT NULL,
  user_platform varchar(100) NOT NULL,
  user_login_time datetime NOT NULL,
  login_status enum('Success','Failure') NOT NULL,
  PRIMARY KEY  (login_history_id),
  KEY user_id (user_id)
)";
	//echo $sql;
	mysql_query($sql);
	
	$sql ="CREATE TABLE ".$_POST['dbprefix']."_orders (
  order_id int(11) NOT NULL auto_increment,
  user_id int(11) NOT NULL default '0',
  vendor_id int(11) NOT NULL default '0',
  order_number varchar(32) default NULL,
  user_info_id varchar(32) default NULL,
  order_total decimal(15,5) NOT NULL default '0.00000',
  order_subtotal decimal(15,5) default NULL,
  order_tax decimal(10,2) default NULL,
  order_tax_details text NOT NULL,
  order_shipping decimal(10,2) default NULL,
  order_shipping_tax decimal(10,2) default NULL,
  coupon_discount decimal(12,2) NOT NULL default '0.00',
  coupon_code varchar(32) default NULL,
  order_discount decimal(12,2) NOT NULL default '0.00',
  order_currency varchar(16) default NULL,
  order_status char(1) default NULL,
  cdate int(11) default NULL,
  mdate int(11) default NULL,
  ship_method_id varchar(255) default NULL,
  customer_note text NOT NULL,
  ip_address varchar(15) NOT NULL default '',
  PRIMARY KEY  (order_id)
)";
	mysql_query($sql);
	
	
	///////////////////
	
	
	$sql="CREATE TABLE ".$_POST['dbprefix']."_order_payment (
  order_id int(11) NOT NULL auto_increment,
  buyer_id int(11) NOT NULL,
  seller_id int(11) NOT NULL,
  order_status enum('pending','compleated','cancelled') NOT NULL default 'pending',
  seller_withdraw_status enum('pending','compleated','cancelled') NOT NULL,
  order_status_date date NOT NULL,
  mc_gross float default NULL,
  protection_eligibility varchar(255) NOT NULL,
  address_status varchar(255) NOT NULL,
  payer_id varchar(255) NOT NULL,
  tax varchar(255) NOT NULL,
  address_street varchar(255) default NULL,
  payment_date varchar(255) default NULL,
  payment_status varchar(255) default NULL,
  charset varchar(255) NOT NULL,
  address_zip varchar(255) default NULL,
  first_name varchar(255) NOT NULL,
  address_country_code varchar(255) NOT NULL,
  address_name varchar(255) NOT NULL,
  notify_version varchar(255) NOT NULL,
  custom varchar(255) NOT NULL,
  payer_status varchar(255) NOT NULL,
  address_country varchar(255) NOT NULL,
  address_city varchar(255) NOT NULL,
  quantity varchar(255) NOT NULL,
  payer_email varchar(255) NOT NULL,
  verify_sign varchar(255) NOT NULL,
  txn_id varchar(255) NOT NULL,
  payment_type varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  address_state varchar(255) NOT NULL,
  receiver_email varchar(255) NOT NULL,
  pending_reason varchar(255) NOT NULL,
  txn_type varchar(255) NOT NULL,
  item_name varchar(255) NOT NULL,
  mc_currency varchar(255) NOT NULL,
  item_number varchar(255) NOT NULL,
  residence_country varchar(255) NOT NULL,
  test_ipn varchar(255) NOT NULL,
  transaction_subject varchar(255) NOT NULL,
  handling_amount varchar(255) NOT NULL,
  payment_gross double NOT NULL,
  shipping varchar(255) NOT NULL,
  merchant_return_link varchar(255) NOT NULL,
  PRIMARY KEY  (order_id)
)";
	//echo $sql;
	mysql_query($sql);
	
	
	
	///////////////////
	
	
			$sql="CREATE TABLE ".$_POST['dbprefix']."_order_user_info (
  order_info_id int(11) NOT NULL auto_increment,
  order_id int(11) NOT NULL default '0',
  user_id int(11) NOT NULL default '0',
  address_type char(2) default NULL,
  address_type_name varchar(32) default NULL,
  company varchar(64) default NULL,
  title varchar(32) default NULL,
  last_name varchar(32) default NULL,
  first_name varchar(32) default NULL,
  middle_name varchar(32) default NULL,
  phone_1 varchar(32) default NULL,
  phone_2 varchar(32) default NULL,
  fax varchar(32) default NULL,
  address_1 varchar(64) NOT NULL default '',
  address_2 varchar(64) default NULL,
  city varchar(32) NOT NULL default '',
  state varchar(32) NOT NULL default '',
  country varchar(32) NOT NULL default 'US',
  zip varchar(32) NOT NULL default '',
  user_email varchar(255) default NULL,
  extra_field_1 varchar(255) default NULL,
  extra_field_2 varchar(255) default NULL,
  extra_field_3 varchar(255) default NULL,
  extra_field_4 char(1) default NULL,
  extra_field_5 char(1) default NULL,
  bank_account_nr varchar(32) NOT NULL default '',
  bank_name varchar(32) NOT NULL default '',
  bank_sort_code varchar(16) NOT NULL default '',
  bank_iban varchar(64) NOT NULL default '',
  bank_account_holder varchar(48) NOT NULL default '',
  bank_account_type enum('Checking','Business Checking','Savings') NOT NULL default 'Checking',
  PRIMARY KEY  (order_info_id),
  KEY idx_order_info_order_id (order_id)
)";
	//echo $sql;
	mysql_query($sql);
	
	$sql ="CREATE TABLE ".$_POST['dbprefix']."_recommend (
  id int(11) NOT NULL auto_increment,
  recommend_value varchar(100) NOT NULL,
  recommend_by varchar(100) NOT NULL,
  PRIMARY KEY  (id)
)";
	mysql_query($sql);
	
	
	///////////////////
	
	

	
	$sql ="CREATE TABLE ".$_POST['dbprefix']."_review (
  id int(11) NOT NULL auto_increment,
  gigs_id int(11) NOT NULL,
  order_id int(11) NOT NULL,
  review_by int(11) NOT NULL,
  review_to int(11) NOT NULL,
  reviewer_type enum('buyer','seller') NOT NULL,
  review varchar(255) NOT NULL,
  review_msg varchar(180) NOT NULL,
  PRIMARY KEY  (id)
)";
	mysql_query($sql);
	
	
	///////////////////
	
	


	$sql ="CREATE TABLE `".$_POST['dbprefix']."_sentmail` (
  `id` int(11) NOT NULL auto_increment,
  `gigs_id` int(11) NOT NULL,
  `to_id` varchar(255) NOT NULL,
  `from_id` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `cc` varchar(255) NOT NULL,
  `bcc` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
)";
	mysql_query($sql);
	
	
	///////////////////
	

	
	$sql ="CREATE TABLE `".$_POST['dbprefix']."_user` (
  `user_id` mediumint(9) NOT NULL auto_increment,
  `gigs_like _id` int(11) NOT NULL,
  `user_fullname` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_nickname` varchar(200) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_primary_email` varchar(200) NOT NULL,
  `user_paypal_account_email` varchar(255) NOT NULL,
  `user_location` varchar(255) NOT NULL,
  `user_desc` text NOT NULL,
  `user_office_phone` varchar(50) NOT NULL,
  `user_fax` varchar(50) NOT NULL,
  `user_address` text NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_admin_status` enum('Y','N') NOT NULL default 'N',
  `user_status` enum('Active','Inactive') NOT NULL default 'Active',
  `user_activation_code` varchar(300) NOT NULL,
  PRIMARY KEY  (`user_id`)
)";
	mysql_query($sql);
	
	
	///////////////////
	
	


	
	$sql ="CREATE TABLE `".$_POST['dbprefix']."_user_order_payment` (
  `order_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `order_status` enum('pending','compleated','cancelled') NOT NULL default 'pending',
  `mc_gross` float default NULL,
  `protection_eligibility` varchar(30) NOT NULL,
  `address_status` varchar(30) NOT NULL,
  `payer_id` varchar(30) NOT NULL,
  `tax` varchar(30) NOT NULL,
  `address_street` varchar(30) default NULL,
  `payment_date` varchar(30) default NULL,
  `payment_status` varchar(30) default NULL,
  `charset` varchar(30) NOT NULL,
  `address_zip` varchar(30) default NULL,
  `first_name` varchar(30) NOT NULL,
  `address_country_code` varchar(30) NOT NULL,
  `address_name` varchar(30) NOT NULL,
  `notify_version` varchar(30) NOT NULL,
  `custom` varchar(30) NOT NULL,
  `payer_status` varchar(30) NOT NULL,
  `address_country` varchar(30) NOT NULL,
  `address_city` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `payer_email` varchar(30) NOT NULL,
  `verify_sign` varchar(30) NOT NULL,
  `txn_id` varchar(30) NOT NULL,
  `payment_type` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `address_state` varchar(30) NOT NULL,
  `receiver_email` varchar(30) NOT NULL,
  `pending_reason` varchar(30) NOT NULL,
  `txn_type` varchar(30) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `mc_currency` varchar(30) NOT NULL,
  `item_number` varchar(30) NOT NULL,
  `residence_country` varchar(30) NOT NULL,
  `test_ipn` varchar(30) NOT NULL,
  `transaction_subject` varchar(30) NOT NULL,
  `handling_amount` varchar(30) NOT NULL,
  `payment_gross` double NOT NULL,
  `shipping` varchar(30) NOT NULL,
  `merchant_return_link` varchar(30) NOT NULL,
  PRIMARY KEY  (`order_id`)
)";
	mysql_query($sql);
	
	
	///////////////////
	
	

$sql="CREATE TABLE `".$_POST['dbprefix']."_user_transaction` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `pending_fund` varchar(255) NOT NULL,
  `cleader_fund` int(11) NOT NULL,
  `withdraw_request` enum('sucess','pending') NOT NULL default 'pending',
  `withdraw_request_ammount` varchar(100) NOT NULL,
  `tran_date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
)";
	//echo $sql;
	mysql_query($sql);
	///////////////////
}
?>