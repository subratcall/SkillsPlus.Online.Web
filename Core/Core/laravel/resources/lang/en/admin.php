<?php
return [
//Admin Sidebar
'admin_panel' => 'Admin Panel',
'dashboard' => 'Dashboard',
'users_report' => 'Users Report',
'products_report' => 'Products Report',
'financial_report' => 'Financial Report',
'users' => 'Users',
'list' => 'List',
'user_groups' => 'User Groups',
'users_badges' => 'User Badges',
'identity_verification' => 'Identity Verification',
'channels' => 'Channels',
'list' => 'List',
'verification_requests' => 'Verification Requests',
'courses' => 'Courses',
'list' => 'List',
'pending_courses' => 'Pending Courses',
'unpublished_courses' => 'Unpublished Courses',
'corse_comments' => 'Course Comments',
'support_tickets' => 'Support messages',
'categories' => 'Categories',
'financial' => 'Accounting',
'financial_documents' => 'Financial Documents',
'withdrawal_list' => 'Payout List',
'new_balance' => 'New Balance',
'financial_analyser' => 'Financial Analyzer',
'transactions_report' => 'Transactions Report',
'sales' => 'Sales',
'sales_list' => 'Sales List',
'employees' => 'Staff',
'list' => 'List',
'new_employee' => 'New',
'course_requests' => 'Course Requests',
'requests_list' => 'Requests List',
'future_courses' => 'Future Courses',
'advertising' => 'Advertising & Featured',
'plans' => 'Plans',
'new_plan' => 'New Plan',
'advertisement_requests' => 'Requests',
'banners' => 'Banners',
'new_banner' => 'New Banner',
'featured_products' => 'Featured Products',
'blog_articles' => 'Blog & Articles',
'blog_posts' => 'Blog Posts',
'new_post' => 'New Post',
'contents_categories' => 'Content Categories',
'blog_comments' => 'Comments',
'articles' => 'Articles',
'support' => 'Support',
'list' => 'List',
'pending_tickets' => 'Pending messages',
'closed_tickets' => 'Closed messages',
'support_departments' => 'Departments',
'submit_ticket' => 'New message',
'notifications' => 'Notifications',
'templates' => 'Templates',
'new_template' => 'New Template',
'sent_notifications' => 'Sent Notifications',
'new_notification' => 'New Notification',
'emails' => 'Email Marketing',
'email_templates' => 'Email Templates',
'new_template' => 'New Template',
'send_email' => 'Send Email',
'promotions_discounts' => 'Discounts & Promotions',
'giftcards_list' => 'Gift cards List',
'new_giftcard' => 'New Gift card',
'promotions_list' => 'Promotions List',
'new_promotion' => 'New Promotion',
'settings' => 'Settings',
'general_settings' => 'General',
'custom_codes' => 'Custom CSS & JS',
'users_settings' => 'Users',
'course_settings' => 'Courses',
'rules' => 'Rules & Terms',
'blog_article_settings' => 'Blog & Articles',
'notification_settings' => 'Notifications',
'social_networks' => 'Social Networks',
'footer_settings' => 'Footer',
'custom_pages' => 'Pages',
'default_placeholders' => 'Default Placeholders',
'exit' => 'Exit',
//admin/layout/pageheader.blade.php---
'admin_panel' => 'Admin Panel',
'header_tickets' => 'Support Messages',
'view_all' => 'View All',
'header_notifications' => 'Notifications',
//admin/layout/modals.blade.php
'system_alert' => 'System Alert',
'are_you_sure' => 'Are you sure?',
'cancel' => 'Cancel',
'yes' => 'Yes',
'withdrawal_modal_main' => 'By taking this action vendors charge will be 0 and payout list will be generated as excel file.',
'withdrawal_modal_desc' => 'In this section you can add your description about payout process. This text will be shown in vendors financial panel. Example: November 2019 payout.',
'withdrawal_confirmation_button' => 'Yes, Im sure.',
'file_manager' => 'File Manager',
//admin/report/balance.blade.php
'reports_breadcom' => 'Reports',
'financial_breadcom' => 'Financial',
'financial_reports_page_title' => 'Financial Reports',
'total_sales' => 'Total Sales',
'total_transactions' => 'Total Transactions',
'sales_list' => 'Sales List',
'transactions_list' => 'Transactions List',
'business_income' => 'Business Income',
'vendors_income' => 'Vendors Income',
'sales_amount' => 'Total Sale Amount',
'sales_transactions_graph' => 'Sales & Transactions',
'financial_graph_subtitle' => 'Shows sales amount since past',
'number_of_sales_graph_metric' => 'Sales',
'number_of_transactions_graph_metric' => 'Transactions',
//admin/report/content.blade.php
'courses_breadcom' => 'Courses',
'courses_reportpage_title' => 'Courses Report',
'total_courses' => 'Total Courses',
'list_courses' => 'Courses List',
'total_parts' => 'Total Parts',
'parts_deff' => 'Each course contains several parts.',
'courses_parts_header' => 'Courses & Parts',
'courses_graph_subtitle' => 'Shows uploaded courses since past',
'number_of_courses_graph_metric' => 'Courses',
'number_of_parts_graph_metric' => 'Parts',
//admin/report/transctions.blade.php
'transactions_bradcom' => 'Transactions',
'income_statistics' => 'Business Income Statement',
'start_date' => 'Start Date',
'end_date' => 'End Date',
'show_results_button' => 'Show Results',
'since' => 'Since',
'till' => 'Till',
'total_transactions_amount' => 'total transactions amount is',
'cur_dollar' => '$',
'and_business_income_is' => 'and business income is',
'transactions_list_header' => 'Transactions List',
'th_customer' => 'Customer',
'th_vendor' => 'Vendor',
'th_course' => 'Course',
'total_payment_table_header' => 'Total Payment',
'business_income_table_header' => 'Business Income',
'th_date' => 'Date',
'th_status' => 'Status',
'currency' => '$',
'paid_successful_status' => 'Successfully Paid',
'waiting_payment' => 'Waiting',
//---admin/report/user.blade.php---
'users_breadcom' => 'Users',
'users_report_page_title' => 'Users Report',
'total_users' => 'Total Users',
'users_list' => 'Users List',
'total_employees' => 'Total Staff',
'employees_list' => 'Staff List',
'total_customers' => 'Total Customers',
'total_sellers' => 'Total Sellers',
'customers_deff' => 'Users who have at least 1 purchase.',
'seller_deff' => 'Vendors who have at least 1 sale.',
'registered_users_header' => 'Registered Users Report',
'registered_users_subtitle' => 'Shows registered users since past',
'registered_users_graph_metric' => 'Registered Users',
//admin/user/category.blade.php---
'usergp_category_breadcom' => 'User Groups',
'usergp_list_breadcom' => 'List',
'usergp_pagetitle' => 'User Groups',
'user_groups_tab_title' => 'User Groups',
'user_groups_th_group_title' => 'Group Title',
'th_commission' => 'Commission Rate',
'th_discount' => 'Discount',
'th_users' => 'Users',
'th_status' => 'Status',
'th_controls' => 'Controls',
'edit_button' => 'Edit',
'delete_button' => 'Delete',
'save_changes' => 'Save Changes',
'new_user_group_status_enabled' => 'Enabled',
'new_user_group_status_disables' => 'Disabled',
'new_user_group_tab_title' => 'New Group',
'new_user_group_title' => 'Group Title',
'new_user_group_discount' => 'Group Discount',
'new_user_group_commission' => 'Commission Rate',
'new_user_group_icon' => 'Group Icon',
'new_user_group_status' => 'Status',
//admin/user/category-edit.blade.php---
'th_edit' => 'Edit',
//admin/user/rate.blade.php---
'badges_breadcom' => 'User Badges',
'badges_pagetitle' => 'User Badges (Gamification)',
'badges_tab_com_age' => 'Comiunity Age',
'badges_tab_courses_count' => 'Courses Count',
'badges_tab_sales' => 'Sales',
'badges_tab_purchase' => 'Purchases',
'badges_tab_support_feedback' => 'Support Feedback',
'badges_tab_course_rating' => 'Course Rating',
'badges_tab_postal_feedback' => 'Postal Feedback',
'badge_title' => 'Badge Title',
'badge_icon' => 'Badge Icon',
'gift_charge' => 'Gift Charge',
'badge_commission' => 'Badge Commission',
'registration_days' => 'Registration Days',
'from' => 'from',
'to' => 'to',
'days' => 'Days',
'th_icon' => 'Icon',
'th_title' => 'Title',
'th_commission' => 'Commission',
'th_gift_charge' => 'Gift Charge',
'th_controls' => 'Controls',
'courses' => 'Courses',
'sales' => 'Sales',
'purchases' => 'Purchases',
'stars' => 'Stars',
'enabled' => 'Enabled',
'disabled' => 'Disabled',
'role' => 'role',
'sales_count' => 'Sales Count',
'purchases_count' => 'Purchases Count',
//admin/user/list.blade.php---
    'filter_items' => 'Filter Items',
    'filter_type' => 'Filter type',
    'ascending' => 'Ascending',
    'descending' => 'Descending',
    'not_actived_users' => 'Not Activated Users',
    'sort' => 'Sort',
    'username' => 'Username',
    'real_name' => 'Real Name',
    'reg_date' => 'Registration Date',
    'income' => 'Income',
    'account_balance' => 'Account Balance',
    'users_list' => 'Users List',
    'active' => 'Active',
    'waiting' => 'Waiting',
    'banned' => 'Banned',
    'disabled' => 'Disabled',
    'disabled_users' => 'Disabled Users',
    //admin/user/seller.blade.php---
    'user_verification_list' => 'Verification List',
    'no_matches' => 'No match found.',
    //admin/user/channels.blade.php---
    'channels_list' => 'Channels List',
    'channel_title' => 'Channel Title',
    'channel_id' => 'Channel Id.',
    'creator' => 'Creator',
    'channel_cover' => 'Channel Cover',
    'channel_icon' => 'Channel Icon',
    'verification_status' => 'Verification Status',
    'verified' => 'Verified',
    'not_verified' => 'Not Verified',
    'contents' => 'Contents',
    'views' => 'Views',
    //admin/user/channelsrequests.blade.php---
    'request_description' => 'Request Description',
    'documents' => 'Documents',
    'pending' => 'Pending',
//admin/user/item.blade.php---
    'edit_user' => 'Edit User',
    'general' => 'General',
    'profile' => 'Profile',
    'image' => 'Image',
    'video' => 'Video',
    'vendor_info' => 'Vendor info',
    'autimatic_badges' => 'Automatic Badges',
    'add_badge_to_user' => 'Add custom badge',
    'add_to_user' => 'Add to user',
    'select_item' => 'Select item',
    'email' => 'Email',
    'birthday' => 'Birthday',
    'gender' => 'Gender',
    'male' => 'Male',
    'female' => 'Female',
    'biography' => 'Biography',
    'profile_pic' => 'Profile Pic',
    'profile_background' => 'Profile Background',
    'video_biography' => 'Profile Video',
    'bank_name' => 'Bank Name',
    'account_number' => 'IBAN',
    'creditcard_number' => 'Credit Card',
    'passport_id' => 'Passport Id.',
    'identity_scan' => 'Identity Scan',
    'verified_vendor' => 'Verified Vendor',
    //admin/content/list.blade.php---
    'all_users' => 'All Users',
    'all_categories' => 'All Categories',
    'course_list' => 'Course List',
    'course_title' => 'Course Title',
    'sales_amount' => 'Sales Amount',
    'item_price' => 'Item Price',
    'item_no' => 'Item No.',
    'parts' => 'Parts',
    'category' => 'Category',
    'type' => 'Type',
    'open' => 'Open',
    'exclusive' => 'Exclusive',
    'published' => 'Published',
    'draft' => 'Draft',
    'unpublish_request' => 'Unpublish Request',
    //admin/content/category.blade.php---
    'new_category' => 'New Category',
    'link_title' => 'Link Title',
    'subcategories' => 'Subcategories',
    'cat_filters' => 'Filters',
    'parrent_category' => 'Parent Category',
    'main_category' => 'This is main category (Parent)',
    'menu_icon' => 'Menu Icon',
    'cat_page_icon' => 'Category Page Header Icon',
    'cat_page_bg' => 'Category Page Header Background',
    'color_code' => 'Color Code',
    'request_icon' => 'Requests Page Icon',
    //admin/content/categorychild.blade.php---
    'childs' => 'Childs',
    'new_child' => 'New Child',
    'child_title' => 'Child Title',
    //admin/content/edit.blade.php---
    'edit_course' => 'Edit Course',
    'extra_info' => 'Extra Information',
    'free_course' => 'Free',
    'vendor_supports_item' => 'Supported Course',
    'vendor_postal_sale' => 'Physical Item',
    'course_cover' => 'Course Cover',
    'course_thumbnail' => 'Thumbnail',
    'demo' => 'Demo',
    'duration' => 'Duration',
    'price' => 'Price',
    'postal_price' => 'Physical Price',
    'prerequisites' => 'Prerequisites',
    'parts' => 'Parts',
    'item_filters' => 'Item Filters',
    'publish_type' => 'Publish Type',
    'course_type' => 'Course Type',
    'single' => 'Single Part',
    'course' => 'Course',
    'review_request' => 'Review Request',
    'minutes' => 'Minutes',
    'convert_status' => 'Convert Status',
    'volume' => 'Volume',
    'minute' => 'Minute',
    'convert_shot' => 'Convert & Screenshot',
    'item_doc' => 'Item has documents.',
    'publish_item' => 'Published',
    'free' => 'Free',
    'convert_alert_1' => 'In this section you can convert all type video files to standard format.',
    'convert_alert_2' => 'Important: Dont convert published parts.',
    'convert_alert_3' => 'Dont convert several files at the same time.',
    'second_screenshot' => 'Second to take screenshot',
    'resolution' => 'Screenshot Resolution',
    'primary_convert' => 'Primary Convert',
    'final_convert' => 'Final Convert',
    'converted' => 'Converted',
    'close' => 'Close',
    'second' => 'Second',
    //admin/content/comments.blade.php---
    'comment' => 'Comment',
    'courses_support' => 'Courses Support',
    'text' => 'Text',
    //admin/content/filters.blade.php---
    'new_filter' => 'New Filter',
    'filter_tags' => 'Filter Tags',
    'filter_title' => 'Filter Title',
    'tag_title' => 'Tag Title',
    'new_tag' => 'New Tag',
//admin/content/waiting.blade.php---
    'pending_list' => 'Pending List',
    //admin/balance/new.blade.php---
    'target_account' => 'Target Account',
    'document_type' => 'Document Type',
    'select_user' => 'Select User',
    'new_financial_doc' => 'New Financial Document',
    'edit_financial_doc' => 'Edit Financial Document',
    'amount' => 'Amount',
    'user_income' => 'User Income',
    'addiction' => 'Addiction',
    'deduction' => 'Deduction',
    'business_account' => 'Platform Account',
    'description' => 'Description',
    'creator' => 'Creator',
    'automatic' => 'Automatic',
    'document_number' => 'Document Number',
    'created_by' => 'Created by',
    'approved_by' => 'Approved By',
    'financial_manager' => 'Financial Manager',
    //admin/balance/analyze.blade.php---
    'business_profit_statement' => 'Your Business Profit Statement',
    'business_income_costs' => 'Your Business Income & Costs List',
    'and_total_cost_is' => 'and total cost is',
    'business_net_profit' => 'Your business net profit is',
    'your_business_income_is' => 'Your business income is',
    //admin/balance/withdrawal.blade.php---
    'min_withdrawal_amount' => 'Minimum payout amount',
    'fianl_withdrawal_list' => 'Final payout list',
    'not_identity_verified_vendors' => 'Not Identity Verified Vendors',
    'vendors_with_pending_orders' => 'Vendors With Pending Orders',
    //admin/sell/sell.blade.php---
    'all_vendors' => 'All Vendors',
    'all_customers' => 'All Customers',
    'all_types' => 'All Types',
    'all_courses' => 'All Courses',
    'sales_type' => 'Sales Type',
    'postal' => 'Physical',
    'download' => 'Download',
    'postal_failed' => 'Physical/Failed',
    'postal_successful' => 'Physical/Successful',
    'postal_waiting' => 'Physical/Waiting',
    'waiting_payment' => 'Waiting for payment',
    'delivered' => 'Delivered',
    'paid_failed' => 'Paid/Failed',
    'paid_waiting' => 'Paid/Waiting',
    'paid_successful' => 'Paid/Successful',
    //admin/manager/list.blade.php---
    'permissions' => 'Permissions',
    'last_login' => 'Last Login',
    //admin/manager/new.blade.php---
    'email_exists' => 'This email already exists. Please try another.',
    'username_exists' => 'Username already exists. Please try another.',
    'password' => 'Password',
    'identity' => 'Identity Docs',
    'mobile_number' => 'Mobile Number',
    'Telephone' => 'Telephone',
    'adress' => 'Address',
    'contract' => 'Contract Documents',
    'payslip' => 'Payslip',
    'security' => 'Security',
    'new_password' => 'New Password',
    'new_password_repeat' => 'Retype Password',
    //admin/request/list.blade.php---
    'latest_requests' => 'The Latest Requests',
    'applicant_user' => 'Requester User',
    'applicated_user' => 'Requested Vendor',
    'accepted_content' => 'Responded Content',
    'followers' => 'Followers',
    //admin/request/recording.blade.php---
    'thumbnail' => 'Thumbnail',
    'view' => 'View',
    //admin/ads/list.blade.php---
    'ads_plans' => 'Advertising Plans',
    'new_plan' => 'New Plan',
    'edit_plan' => 'Security',
    'ads_requests' => 'Advertising Requests',
    'plan' => 'Plan',
    'new_banner' => 'New Banner',
    'position' => 'Position',
    'homepage_slider' => 'Homepage-Slider beside',
    'homepage_articles' => 'Homepage-Articles beside',
    'cat_page_sidebar' => 'Category Page - Sidebar',
    'cat_page_bottom' => 'Category Page - Bottom',
    'product_page' => 'Product Page - Sidebar',
    'banner_size' => 'Banner Size',
    'original' => 'Original',
    'link_address' => 'Link Address',
    'edit_banner' => 'Edit Banner',
    //admin/ads/boxes.blade.php---
    'corner_fixed_banners' => 'Corner Fixed Banners',
    'banners_list' => 'Banners List',
    'top_left' => 'Top Left Banner',
    'bottom_left' => 'Bottom Left Banner',
    'bottom_sticky' => 'Bottom Sticky Content (HTML)',
    'top_left_link' => 'Top Left Banner Link',
    'bottom_left_link' => 'Bottom Left Banner Link',
    //admin/ads/vip.blade.php---
    'submit_featured_product' => 'Submit Featured Product',
    'start_end' => 'Start/End',
    'short_description' => 'Short Description',
    'featured_list' => 'Featured List',
    'homepage_slider' => 'Homepage Slider',
    'top_category' => 'Top of courses in cat. page.',
    'expired' => 'Expired',
    'edit_featured' => 'Edit Featured Product',
    //admin/blog/list.blade.php---
    'author' => 'Author',
    'comments' => 'Comments',
    'edit_post' => 'Edit Post',
    'tags' => 'Tags',
    'comments_enabled' => 'Enable Comments?',
    'publish' => 'Publish Item',
    'blog_categories' => 'Blog Categories',
    'posts' => 'Posts',
    'post' => 'Post',
    'reply_comments' => 'Reply Comments',
    'reply_comment' => 'Reply Comment',
    //admin/blog/list.blade.php---
    'created_date' => 'Created Date',
    'last_update' => 'Last Update',
    'tickets_list' => 'Messages List',
    'invited_users' => 'Invited Users',
    'department' => 'Department',
    'replied' => 'Replied',
    'closed' => 'Closed',
    'closed_tickets_list' => 'Closed messages list',
    'send' => 'Send',
    'departments' => 'Departments',
    'new_department' => 'New Department',
    'add_user_conversation' => 'Add User To Conversation',
    'users_in' => 'Users in',
    'go_to_ticket' => 'Go to Conversation',
    'reply_ticket' => 'Reply message',
    'ticket_created_by' => 'This conversation created by',
    'and_this_users_invited' => 'and these users invited to this conversation:',
    'support_staff' => 'Support Staff',
    'user' => 'User',
    'attachments' => 'Attachments',
    'close_ticket' => 'Close conversation',
    'open_ticket' => 'Open conversation',
    //admin/notification/templates.blade.php---
    'templates' => 'Templates',
    'template_data_tags' => 'Template Data Tags',
    'financial_doc_type' => 'Financial Document Type',
    'notification_template' => 'Notification Template',
    'course_req_title' => 'Course Request Title',
    'support_ticket_title' => 'Support message title',
    'financial_doc_amount' => 'Financial Doc. Amount',
    'financial_doc_desc' => 'Financial Doc. Description',
    'notification_send_failed' => 'Sorry, an error occurred during sending the notification.',
    'notification_sent_successfully' => 'Notification Sent Successfully',
    'receipts' => 'Receipts',
    'single_user' => 'Single User',
    'users_list' => 'Users List',
    'vendors' => 'Vendors',
    'customers' => 'Customers',
    'males' => 'Males',
    'females' => 'Females',
    'user_group' => 'User Group',
    'sent_date' => 'Sent Date',
    'sender' => 'Sender',
    //admin/email/new.blade.php---
    'email_send_failed' => 'Sorry, an error occurred during sending the email.',
    'email_sent_successfully' => 'Email Sent Successfully',
    'user_activation_link' => 'User Activation Link',
    'change_password_link' => 'Password Change Link',
    'email_template' => 'Email Template',
    //admin/discount/new.blade.php---
    'expire_date' => 'Expire Date',
    'discount_card' => 'Discount Card',
    'gift_code' => 'Gift Code',
    'single_course' => 'Specific course',
    'category_discount' => 'All videos in the category',
    'all_courses_discount' => 'All courses',
    'promotion_role' => 'Promotion Role',
    'giftcard' => 'Gift card',
    'discounts' => 'Discounts',
    'promotions' => 'Sales Promotions',
    'new_promotion' => 'New Sale Promotion',
    //admin/setting/new.blade.php---
    'logo' => 'Logo',
    'logotype' => 'Logotype',
    'videos_watermark' => 'Videos Watermark',
    'invoice' => 'Invoice',
    'payment' => 'Payment',
    'popup' => 'Popup',
    'video_ads' => 'Video Advertising',
    'home_hero' => 'Home Hero Section',
    'requests_icon' => 'Course Requests Icon',
    'upload_bg' => 'Upload Page Background',
    'login_bg' => 'Login Page Background',
    'days_graph' => 'Number of Days in Graphs',
    'disable_website' => 'Disable Website',
    'approver' => 'Approver Name',
    'financial_manager_name' => 'Financial Manager Name',
    'invoice_logo' => 'Invoice Logo',
    'gateway_id' => 'Gateway Id.',
    'exclusive_courses_comm' => 'Exclusive Courses Commission (For website)',
    'open_courses_comm' => 'Open Courses Commission (For website)',
    'enable' => 'Enable',
    'popup_image' => 'Popup Image',
    'popup_link' => 'Popup Link',
    'video_file' => 'Video File',
    'player_cover' => 'Player Cover',
    'ads_link' => 'Ads Link',
    'minimum_time_to_skip' => 'Minimum time to skip',
    'hero_bg' => 'Hero Background',
    'first_button' => 'First button title',
    'second_button' => 'Second button title',
    'first_button_link' => 'First button link',
    'secound_button_link' => 'Second button link',
    'course_settings' => 'Course Settings',
    'enable_featured' => 'Show featured courses in the homepage',
    'enable_latest' => 'Show the latest courses in the homepage',
    'enable_popular' => 'Show popular items in the homepage',
    'enable_top_sales' => 'Show top sales in the homepage',
    'add_courses_slider' => 'Select Sliding Courses',
    'slider_time' => 'Slider duration (ms)',
    'items_in_category_page' => 'Items in the category page',
    'input_css' => 'Input CSS',
    'input_js' => 'Input JS',
    'user_setting' => 'User Setting',
    'activation_method' => 'Activation Method',
    'quick_activation' => 'Quick - No Verification Required',
    'email_verification' => 'Email Verification',
    'email_verification_template' => 'Email Verification Template',
    'pass_change_email_template' => 'Password Change Email Template',
    'new_pass_email_template' => 'New Password Email Template',
    'notification_email_template' => 'Notification Email Template',
    'user_welcome_email' => 'User Welcome Email Template',
    'vendor_settings' => 'Vendor Settings',
    'not_identity_verified_alert' => 'Not Identity Verified Vendors Alert',
    'request_rules' => 'Course Request Rules',
    'publish_course' => 'Publish Course Rules',
    'blog_settings' => 'Blog Settings',
    'article_settings' => 'Article Settings',
    'contents_in_each_page' => 'Contents in Each Page',
    'contents_in_homepage' => 'Contents in Homepage',
    'sell_purchase' => 'Sell/Purchase',
    'user_gp_change' => 'User Group Change',
    'new_badge' => 'New Badge',
    'remove_badge' => 'Badge Remove',
    'submit_course' => 'Course Submit',
    'approve_course' => 'Course Approve',
    'course_changes' => 'Course Changes',
    'course_reject' => 'Course Reject',
    'new_comment' => 'New Comment',
    'new_support_message' => 'New Support Message',
    'request_submit' => 'Request Submit',
    'request_publish' => 'Request Publish',
    'request_reject' => 'Request Reject',
    'course_production_request' => 'Course Production Request',
    'request_followed' => 'Request Followed',
    'new_support_ticket' => 'New Support message',
    'new_reply' => 'New Reply',
    'withdraw_doc' => 'Payout Document',
    'new_purchase' => 'New Purchase',
    'new_sale' => 'New Sale',
    'postal_sale_feedback' => 'Physical Sale Feedback',
    'postal_sent' => 'Physical Package Sent',
    'footer_settings' => 'Footer Settings',
    'first_col' => 'First Column',
    'second_col' => 'Second Column',
    'third_col' => 'Third Column',
    'forth_col' => 'Fourth Column',
    'preview' => 'Preview',
    'contact' => 'Contact',
    'about' => 'About',
    'help' => 'Help',
    'extra1' => 'Extra1',
    'extra2' => 'Extra2',
    'default_images' => 'Default Images',
    'user_avatar' => 'User Avatar',
    'user_profile_cover' => 'User Profile Cover',
    'withdraw_period' => 'Monthly payout',
    'unpublished' => 'Unpublished',
    'not_defined' => 'Not defined',
    'pass_confirm_alert' => 'Password and the confirmation does not match.',
    'password_changed' => 'Password changed successfully.',
    'user_rate_badge_gift' => 'User badge gift charge',
    'user_rate_new_badge_gift' => 'New badge gift',
    'item_purchased' => 'Item purchased: ',
    'by' => 'By',
    'payment_failed' => 'Payment failed, Try again.',
    'charge_account_rep' => 'Charge account',
    'charge_account_desc' => 'Account charged with payment gateway.',
    'charge_account_success' => 'Account charged successfully.',
    'no_charge_error' => 'You havent enough charge to purchase this item',
    'item_sold' => 'Item sold: ',
    'item_sold_desc' => 'Paid by customer account charge.',
    'item_purchased_desc' => 'Paid by customer account charge.',
    'item_profit' => 'Item Profit: ',
    'item_profit_desc' => 'Your business profit from sold item.',
    'item_purchased_success' => 'Item purchased successfully, You can access files in your panel now.',
    'search_title' => 'Search by title',
    'search_id' => 'Search by ID.',
    'search_vendor' => 'Search by vendor',
    'search_filters' => 'Search filters',
    'searching' => 'Searching',
    'login_alert' => 'Please login to your account.',
    'request_sent_alert' => 'Request sent successfully.',
    'request_sent_approve' => 'Request sent successfully, it will be published after approval process.',
    'login_to_play_video' => 'Please login to play video.',
    'login_to_comment' => 'Please login to leave comment.',
    'comment_success' => 'Your comment created, it will be displayed after approval process.',
    'support_success' => 'Support request created successfully.',
    'support_failed' => 'Failed to create support request. Support requests are only available for course students.',
    'rate_login' => 'Please login to rate.',
    'rate_alert' => 'Rating must be between 1 and 5 stars.',
    'rating_success' => 'Rating submitted successfully.',
    'rating_students' => 'Sorry, Rating is available only for course students.',
    'content_not_found' => 'Content not found.',
    'charge_user_account' => 'Charge user account',
    'charge_user_account_gateway' => 'User account charged by payment gateway.',
    'account_charged_successfully' => 'Account charged successfully.',
    'account_charge_failed' => 'Failed to charge your account.',
    'email_sent' => 'Email sent successfully',
    'email_unable' => 'Unable to send email!',
    'reports' => 'Reports',
    'blog' => 'Blog',
    'administrators' => 'Administrators',
    'course_rate' => 'Course rate',
    'support_rate' => 'Support rate',
    'physical_sales_rate' => 'Physical sales rate',
	'site_name' => 'Site Name',
	'site_email' => 'Site Email',
	'site_description' => 'Description',
    'vendor'=>'Vendor',
    'subscribe'=>'Subscribe',
	'site_language'=>'Language',
	'preloader'=>'Enable Preloader',
	'become_vendor'=>'Users can request to be instructor',
	'customer_dashboard_cover'=>'Customer dashboard cover',
	'instructors' => 'Instructors',
];
