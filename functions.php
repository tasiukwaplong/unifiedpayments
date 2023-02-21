<?php

function voctech_create_custom_pages() {
    $pages = array(
        array(
            'title' => 'Sign in',
            'slug' => 'sign-in',
            'template' => 'template-sign-in.php'
        ),
        array(
            'title' => 'Collector dashboard',
            'slug' => 'collector-dashboard',
            'template' => 'template-collector-dashboard.php'
        ),
        array(
            'title' => 'Student dashboard',
            'slug' => 'student-dashboard',
            'template' => 'template-student-dashboard.php'
		),
		array(
            'title' => 'Administrator dashboard',
            'slug' => 'administrator-dashboard',
            'template' => 'template-administrator-dashboard.php'
        )
    );

    foreach ($pages as $page) {
        $existing_page = get_page_by_path($page['slug']);

        if ($existing_page) {
            continue;
        }

        $page_id = wp_insert_post(array(
            'post_title' => $page['title'],
            'post_name' => $page['slug'],
            'post_type' => 'page',
            'post_status' => 'publish',
        ));

        if ($page_id && $page['template']) {
            update_post_meta($page_id, '_wp_page_template', $page['template']);
        }
    }
}


function voctech_update_custom_roles() {
    if ( get_option( 'custom_roles_version' ) < 1 ) {
    	//voctech_add_table_quotation_request();
    	//voctech_add_table_jobs();
		voctech_create_custom_pages();
        add_role( 'busary', 'Bursary', array( 'read' => true, 'level_0' => true ) );
        add_role( 'collector', 'Collector', array( 'read' => true, 'level_0' => true ) );
        add_role( 'student', 'Student', array( 'read' => true, 'level_0' => true ) );
        update_option( 'custom_roles_version', 1 );
    }
	

    add_theme_support( 'post-thumbnails', array( 'training', 'store' ) ); // Posts and Movies
    //voctech_add_category();

}
add_action( 'init', 'voctech_update_custom_roles' );




add_action('wp_ajax_register','voctech_already_registered_user');
function voctech_already_registered_user(){
	$logoutUrl = "<a href='".wp_logout_url('/')."'>Logout</a>";
	wp_send_json_error(['You are already registered. To register another account, you have to log out of your account '.$logoutUrl]);
}


// ADD USER - CLIENT 
add_action('wp_ajax_nopriv_register','voctech_register_user');
function voctech_register_user(){
	// add new user
	// $data = json_encode($_POST);
	$formData = [];
	wp_parse_str($_POST['register'], $formData);
	$errors = [];

	// FORM VALIDATION STARTS
	if(!isset($formData['password1']) || !isset($formData['password2']) ){
		$errors[] = 'Password field empty';
	}

	if($formData['password1'] !== $formData['password2']){
		$errors[] = 'Passwords do not match';
	}

	if(!isset($formData['email']) || !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)){
		$errors[] = 'Email format not correct';
	}

	if(count($errors) >= 1){
		return wp_send_json_error($errors);
	}
	// FORM VALIDATION ENDS

	$userdata = array(
		'user_pass' => $formData['password1'],
		'user_login' => $formData['email'],
		'user_nicename' => $formData['name'],
		'user_email'=> $formData['email'],
		'display_name'=> $formData['name'],
		'first_name'=> explode(' ',$formData['name'])[0] ?? '',
		'last_name'=> explode(' ',$formData['name'])[1] ?? '',
		'role' => 'client',
		'meta_input'=>[
			'activited'=>'0',
			'phone' => $formData['phone'],
			'occupation'=>$formData['occupation']
		]
	);

	try{

		$user_id = wp_insert_user( $userdata ) ;
		// On success.
		if ( ! is_wp_error( $user_id ) ) {
			//format: mail@gmail.com=|||=phone
			$token = voctech_hash_unhash($formData['email'].'=|||='.$formData['phone'], 'encrypt');

			voctech_send_email([
				'email' => $formData['email'],
				'subject' => '[ACTION REQUIRED] Verify email',
				'message' => 'Hello '.$formData['name'].' <br> Click on this link to complete your registration: '.home_url().'/verify/?token='.$token,
			]);
		    wp_send_json_success(['user_id'=>$user_id]);
		}else{
		    wp_send_json_error(['Unable to create user account. Please try again', $user_id->get_error_message()]);
		}
	}catch(Exception $e){
		wp_send_json_error($e);
	}

}

// ADD USER - ARTISAN 
add_action('wp_ajax_register-artisan','voctech_register_artisan');
add_action('wp_ajax_nopriv_register-artisan','voctech_register_artisan');
function voctech_register_artisan(){
	// add new artisan
	// $data = json_encode($_POST);
	// return wp_send_json_success($data);

	$formData = [];
	wp_parse_str($_POST['register-artisan'], $formData);
	$errors = [];

	// FORM VALIDATION STARTS
	if(!isset($formData['password1']) || !isset($formData['password2']) ){
		$errors[] = 'Password field empty';
	}

	if($formData['password1'] !== $formData['password2']){
		$errors[] = 'Passwords do not match';
	}

	if(!isset($formData['email']) || !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)){
		$errors[] = 'Email format not correct';
	}

	if(count($errors) >= 1){
		return wp_send_json_error($errors);
	}
	// FORM VALIDATION ENDS

	$userdata = array(
		'user_pass' => $formData['password1'],
		'user_login' => $formData['email'],
		'user_nicename' => $formData['name'],
		'user_email'=> $formData['email'],
		'display_name'=> $formData['name'],
		'first_name'=> explode(' ',$formData['name'])[0] ?? '',
		'last_name'=> explode(' ',$formData['name'])[1] ?? '',
		'role' => 'artisan',
		'meta_input'=>[
			'activited'=>'0',
			'phone' => $formData['phone'],
			'business_name' => $formData['business_name'],
			'business_state' => $formData['business_state'],
			'business_lga' => $formData['business_lga'],
			'available_balance'=>0,
			'business_type' => $formData['business_type'],
			'business_sub_category' => $formData['business_sub_category']
		]
	);

	try{

		$user_id = wp_insert_user( $userdata ) ;
		// On success.
		if ( ! is_wp_error( $user_id ) ) {
			$token = voctech_hash_unhash($formData['email'].'=|||='.$formData['phone'], 'encrypt');

			voctech_send_email([
				'email' => $formData['email'],
				'subject' => '[ACTION REQUIRED] Verify email',
				'message' => 'Hello '.$formData['business_name'].' <br> Click on this link to verify your email address: '.home_url().'/verify/?token='.$token,
			]);

		    wp_send_json_success(['user_id'=>$user_id]);
		}else{
		    wp_send_json_error(['Unable to create user account. Please try again', $user_id->get_error_message()]);
		}
	}catch(Exception $e){
		wp_send_json_error($e);
	}
}

// REQUEST SERVICE/JOB
add_action('wp_ajax_quotation-request','voctech_quotation_request');
// add_action('wp_ajax_nopriv_register-artisan','voctech_quotation_request');
function voctech_quotation_request(){
	// Submit quotation request

	$formData = [];
	wp_parse_str($_POST['quotation-request'], $formData);
	$errors = [];

	// FORM VALIDATION STARTS
	
	if(!isset($formData['title']) || strlen($formData['title']) <= 1){
		$errors[] = 'Service title cannot be empty';
	}

	if(!isset($formData['service_type']) || strlen($formData['service_type']) <= 1){
		$errors[] = 'Service type cannot be empty. You may select "other" if not in drop down';
	}

	if(!isset($formData['service_sub_type']) || strlen($formData['service_sub_type']) <= 1){
		$errors[] = 'Service sub-type cannot be empty. You may select "other" if not in drop down';
	}


	if(count($errors) >= 1){
		return wp_send_json_error($errors);
	}
	// FORM VALIDATION ENDS

	$quotationData = array(
		'title'=>$formData['title'],
		'request_id'=>rand()+rand()+rand()+3,
		'category'=>$formData['service_type'],
		'sub_category'=>$formData['service_sub_type'],
		'description'=>$formData['comment'],
		'last_description'=>$formData['comment'],
		'status'=>'pending',
		'client_id'=>get_current_user_id()
	);


	try{
		global $wpdb;
		$table = $wpdb->prefix.'quotation_request';
		$format = array('%s','%d');
		// $my_id = $wpdb->insert_id;

		// On success.
		if ( $wpdb->insert($table,$quotationData,$format) ) {
		    wp_send_json_success('Quotation request submitted successfully. We are currently reviewing and will get back to you');
		}else{
		    wp_send_json_error(['Unable to submit quotation request. Try again']);
		}
	}catch(Exception $e){
		wp_send_json_error($e);
	}
}

// ACCEPT/REJECT ARTISAN REGISTRATION
add_action('wp_ajax_manage-artisan','voctech_manage_artisan_registration');
function voctech_manage_artisan_registration(){
	// admin accept/decline/ban artisan registration using the following:
        // 0 - registered
        // 1 - verified email
        // 2 - Approved by admin
        // 3 - Banned

	$formData = $_POST['manage-artisan'];
	// wp_parse_str($_POST['manage-artisan'], $formData);
	$formData = json_decode(stripslashes($_POST['manage-artisan']));
	$errors = [];

	//check if its admin
	$current_user   = wp_get_current_user();
	$role_name      = $current_user->roles[0];

	if($role_name !== 'administrator'){
		$errors[] = 'Only an admin can perform this action. You are not an admin';
	}

	

	// FORM VALIDATION STARTS
	
	if(!isset($formData->artisan_id)){
		$errors[] = 'Cannot process request. Missing artisan ID';
	}

	if(!isset($formData->action)){
		$errors[] = 'Action to take cannot be completed as action is empty';
	}


	if(count($errors) >= 1){
		return wp_send_json_error($errors);
	}
	// FORM VALIDATION ENDS
	$updated = update_user_meta( $formData->artisan_id, 'activited', $formData->action );

		// So check and make sure the stored value matches $new_value.
		if ( $formData->action != get_user_meta( $formData->artisan_id,  'activited', true ) ) {
			$errors[] = 'Artisan not updated';
			return wp_send_json_error($errors);
		}
		return wp_send_json_success('Artisan record updated successfully');
	
}

// MANAGE QUOTATION REQUEST
add_action('wp_ajax_manage-quotation','voctech_manage_quotation');
function voctech_manage_quotation(){
	// 'pending
    // 'rejected
    // 'processing
    // 'done
	// $formData = $_POST['manage-quotation'];
	$formData = json_decode(stripslashes($_POST['manage-quotation']));
	$errors = [];

	//check if its admin
	$current_user   = wp_get_current_user();
	$role_name      = $current_user->roles[0];
	
	if($role_name !== 'administrator'){
		$errors[] = 'Only an admin can perform this action. You are not an admin';
	}

	// FORM VALIDATION STARTS	
	if(!isset($formData->quotationID)){
		$errors[] = 'Cannot process request. Missing quotation ID';
	}

	if(!isset($formData->action)){
		$errors[] = 'Action to take cannot be completed as action is empty';
	}

	if(!isset($formData->action) && $formData->action === 'rejected' && !isset($formData->comment)){
		$errors[] = 'Must have a comment section';
	}


	if(count($errors) >= 1){
		return wp_send_json_error($errors);
	}


	$quotationData = array(
		'comment'=>htmlspecialchars($formData->comment),
		'status_changed_by'=>$current_user->ID,
		'status'=>$formData->action
	);

	$quotationData = (!isset($formData->artisan)) ? $quotationData : array(
		'status_changed_by'=>$current_user->ID,
		'artisan_id'=>$formData->artisan,
		'status'=>$formData->action,
		'comment'=>$formData->comment,
		
	);

	try{
		global $wpdb;
		$table = $wpdb->prefix.'quotation_request';

		// On success.
		if ($wpdb->update($table,$quotationData,['request_id'=>$formData->quotationID]) ) {
		    wp_send_json_success('Action completed successfully');
		}else{
		    wp_send_json_error(['Unable to complete request. Try again']);
		}
	}catch(Exception $e){
		wp_send_json_error($e);
	}
	
}


// MANAGE JOBS INSERT/UPDATE
add_action('wp_ajax_manage-jobs','voctech_manage_jobs');
function voctech_manage_jobs(){
	$formData = json_decode(stripslashes($_POST['manage-jobs']));
	$errors = [];

	//check if its admin
	$current_user   = wp_get_current_user();
	$role_name      = $current_user->roles[0];
	
	if($role_name !== 'administrator'){
		$errors[] = 'Only an admin can perform this action. You are not an admin';
	}

	// FORM VALIDATION STARTS	
	if(!isset($formData->quotationID)){
		$errors[] = 'Cannot process request. Missing quotation ID';
	}

	if(!isset($formData->items) || gettype($formData->items) !== 'array'){
		$errors[] = 'Action to take cannot be completed as items is empty';
	}

	if(!isset($formData->other_expenses)){
		$errors[] = 'Action to take cannot be completed as other expenses is empty';
	}

	if(!isset($formData->completion_days)){
		$errors[] = 'Action to take cannot be completed as completion days is empty';
	}

	if(!isset($formData->total)){
		$errors[] = 'Action to take cannot be completed as total field is empty';
	}
	

	if(count($errors) >= 1){
		return wp_send_json_error($errors);
	}


	$jobData = array(
		'request_id' => $formData->quotationID,
		'status' => 'Awaiting confirmation',
		'items' => serialize($formData->items),
		'other_expenses' => $formData->other_expenses,
		'completion_days' => $formData->completion_days,
		'total_amount' => $formData->total,
		'artisan_id' => $current_user->ID
	);
		// return wp_send_json_error($jobData);

	try{
		global $wpdb;
		$table = $wpdb->prefix.'jobs';
		$format = array('%s','%d');


		// On success.
		if ( $wpdb->insert($table,$jobData,$format) ) {
		    return wp_send_json_success('Invoice has been sent to client');
		}else{
		    return wp_send_json_error(['Unable to submit invoice. Try again']);
		}

	}catch(Exception $e){
		return wp_send_json_error($e);
	}
	
}

// get categories and sub-categories
function voctech_get_categories(){
	$args = [
		'numberposts'=>10,
		'order'=> 'DESC',
		'post_type'=>'artisan-category'
	];

	$categories = [];
	$postslist = get_posts( $args );
	foreach ($postslist as $indx=>$post){
		$categories = get_post_meta( $post->ID);
		if(isset($categories['_edit_lock'])) unset($categories['_edit_lock']);
		if(isset($categories['_edit_last'])) unset($categories['_edit_last']);
	}
	return (count($categories) > 0) ? $categories : [];
}

//GET LIST OF quotation request
function voctech_get_quotation_request($data = []){
	// Submit quotation request

	$client_id = (isset($data['client_id'])) ? htmlentities($data['client_id']) : get_current_user_id();

	try{
		global $wpdb;
		$table = $wpdb->prefix.'quotation_request';
		$qry = "SELECT * FROM $table WHERE payment_id IS NULL AND client_id = $client_id ORDER BY id DESC";
		$qry = (isset($data['is_admin'])) ? "SELECT * FROM $table WHERE payment_id IS NULL ORDER BY id DESC" : $qry;
		$results = $wpdb->get_results($qry);
		if ($wpdb->last_error) {
		    // return $wpdb->last_error;
		    return 'Could not fetch data';
		}else{
		    return (isset($results)) ? $results : [];
		}
	}catch(Exception $e){
		return $e;
	}

}

//GET quotation request and job
function voctech_get_quotation_and_jobs($requestID, $whatToSearch){
	global $wpdb;
	$table = ($whatToSearch === 'quotation_request') ? $wpdb->prefix.'quotation_request' : $wpdb->prefix.'jobs';
	$qry = "SELECT * FROM $table WHERE request_id ='".$requestID."' ORDER BY id DESC LIMIT 1";

	try{
		$results = $wpdb->get_results($qry);
		if ($wpdb->last_error) {
		    return $wpdb->last_error;
		}else{
		    return (isset($results)) ? $results : [];
		}
	}catch(Exception $e){
		return $e;
	}

}

//GET invoice
function voctech_get_quotation_invoice($data = []){
	// Submit quotation request
	global $wpdb;
	$table = $wpdb->prefix.'quotation_request';
		

	$client_id = (isset($data['client_id'])) ? htmlentities($data['client_id']) : get_current_user_id();
	$query = (isset($data['request_id'])) 
	  ? "SELECT * FROM $table WHERE client_id = '$client_id' AND request_id = '".$data['request_id']."' AND status='processed';" 
	  : "SELECT * FROM $table WHERE client_id = '$client_id' AND status='processed'";

	try{
		$results = $wpdb->get_results($query);
		if ($wpdb->last_error) {
		    return $wpdb->last_error;
		    // return 'Could not fetch data';
		}else{
		    return (isset($results)) ? $results : [];
		}
	}catch(Exception $e){
		return $e;
	}

}


// LOGIN USER
add_action('wp_ajax_login','voctech_login_user');
add_action('wp_ajax_nopriv_login','voctech_login_user');
function voctech_login_user(){
	// login in either as artisan or client
	
	$formData = [];
	wp_parse_str($_POST['login'], $formData);
	$errors = [];

	// FORM VALIDATION STARTS
	if(!isset($formData['password1']) ){
		$errors[] = 'Password field empty';
	}

	// if(!isset($formData['email']) || !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)){
	// 	$errors[] = 'Email format not correct';
	// }

	if(count($errors) >= 1){
		return wp_send_json_error($errors);
	}
	// FORM VALIDATION ENDS

	// function wpdocs_custom_login() {
	$creds = array(
		'user_login'    => $formData['email'],
		'user_password' => $formData['password1'],
		'remember'      => ($formData['remember_me'] === 'on')
	);

	$user = wp_signon( $creds, false );

	if ( is_wp_error( $user ) ) {
		return wp_send_json_error(['Invalid username or password entered. Try again with correct login credentials']);
	}else{
		return wp_send_json_success($user->roles[0]);
	}

	try{

		$user_id = wp_insert_user( $userdata ) ;
		// On success.
		if ( ! is_wp_error( $user_id ) ) {
		    wp_send_json_success(['user_id'=>$user_id]);
		}else{
		    wp_send_json_error(['Unable to create user account. Please try again', $user_id->get_error_message()]);
		}
	}catch(Exception $e){
		wp_send_json_error($e);
	}

}





function voctech_add_category(){
	$args = [
		'labels'=>[
			'name' => 'Artisan categories',
			'singular_name'=> 'Artisan category'
		],
		'public' => true,
		'supports'=> ['title', 'custom-fields'],
		'menu_icon'=>'dashicons-groups'
	];

	$training = [
		'labels'=>[
			'name' => 'Trainings',
			'singular_name'=> 'Training'
		],
		'public' => true,
		'supports'=> ['title', 'editor', 'thumbnail', 'comments','author'],
		'menu_icon'=>'dashicons-clipboard'
	];


	$store = [
		'labels'=>[
			'name' => 'Store items',
			'singular_name'=> 'Store item'
		],
		'public' => true,
		'supports'=> ['title', 'thumbnail','editor', 'custom-fields'],
		'menu_icon'=>'dashicons-store'
	];


	register_post_type('artisan-category', $args);
	register_post_type('training', $training);
	register_post_type('store', $store);
}
// add_action( 'init', 'voctech_add_category' );

// add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) ); // Posts and Movies


// function somethingabeg(){
// 	add_post_type_support( 'store', 'my_feature',
// 		['field' => 'value']
// 	);
// }

function voctech_add_table_quotation_request(){
	// table: quotation_request
	global $wpdb;
    $table_name = $wpdb->prefix . 'quotation_request';
    $wpdb_collate = $wpdb->collate;

	$sql = "CREATE TABLE {$table_name} (
	    id int(10) NOT NULL AUTO_INCREMENT,
	    request_id int(10) NOT NULL,
	    title varchar(255) NOT NULL,
	    category varchar(255) NOT NULL,
	    sub_category varchar(255) NOT NULL,
	    description text NULL,
	    last_description text NULL,
	    comment tinytext NULL,
	    status varchar(10) NOT NULL,
	    status_changed_by varchar(10) NULL,
	    payment_id varchar(10) NULL,
	    job_id varchar(10) NULL,
	    artisan_id varchar(10) NULL,
	    client_id varchar(10) NULL,
	    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	    PRIMARY KEY  (id, request_id)
	)
	COLLATE {$wpdb_collate}";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}


function voctech_add_table_jobs(){
	// table: jobs
	global $wpdb;
    $table_name = $wpdb->prefix . 'jobs';
    $wpdb_collate = $wpdb->collate;

	$sql = "CREATE TABLE {$table_name} (
	    id int(10) NOT NULL AUTO_INCREMENT,
	    request_id varchar(20) NOT NULL,
	    status varchar(255) NOT NULL,
	    payment_id varchar(10) NULL,
	    items text NULL,
	    other_expenses text NULL,
	    completion_days varchar(10) NULL,
	    total_amount varchar(10) NULL,
	    artisan_id varchar(10) NULL,
	    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	    PRIMARY KEY  (id, request_id)
	)
	COLLATE {$wpdb_collate}";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}


function voctech_send_email($data = []){
  // send email

  if (!isset($data['email']) || !isset($data['subject']) || !isset($data['message'])) {
    return ['errored'=>true, 'message'=>'Cannot send email. One or more values missing'];
  }

  if (empty($data['email']) || empty($data['subject']) || empty($data['message'])) {
    return ['errored'=>true, 'message'=>'Cannot send email. One or more values missing'];
  }

  $email = str_replace("'",'"', $data['email']);
  $subject = str_replace("'",'"', $data['subject']);
  $message = str_replace("'",'"', $data['message']);


  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://script.google.com/macros/s/AKfycbz3LMDqWj2FPG2V5-3w5iFiuRm_VzSv0EwD2eIIk03hkU_wde79IR8pSsQwKgj4kzRP/exec',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
      "sk":"vb_57dhdj06c1g4yu4312u501134be78eb5dcdf30989c387c0dhdh3",
      "email": "'.$email.'",
      "subject": "'.$subject.'",
      "body": "'.$message.'"
  }',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json'
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  return $response;
}

function voctech_hash_unhash($data, $action = 'encrypt'){
	// encrypt or decrypt data
	//format: mail@gmail.com=|||=phone

	if (!isset($data) || $data === '') return '';

	//format: mail@gmail.com=|||=phone
	if ($action === 'encrypt') {
		$encText = strrev(base64_encode($data));
		return $encText;
	}

	if ($action === 'decrypt') {
		$decText = base64_decode(strrev($data));
		return $decText;
	}

	return '';
}

function voctech_verify_user($email, $phone){
	// verify user account
	$user = get_user_by( 'email', $email);

	if (!empty( $user ) ) {
		$userData = get_user_meta( $user->ID);
		$registeredPhone = (isset($userData['phone'])) ? $userData['phone'][0] : '';
		
		if($userData['activited'][0] != '0'){
			return 'Account already verified. Please proceed to login';
		}

		if($phone === $registeredPhone){
			// phone number auth
			$updated = update_user_meta( $user->ID, 'activited', '1' );

			// So check and make sure the stored value matches $new_value.
			if ( '1' === get_user_meta( $user->ID,  'activited', true ) ) {
				return 'Account verified successfully. Please proceed to login';
			}

			return 'Sorry, we tried to verify your account but could not. Please try again later';

			

		}else{
			return 'Cannot verify this account. Please check the link again';
		}
		// print_r([$phone, $registeredPhone, $user->email]);
	}
	// echo voctech_hash_unhash('encrypt','tasiukwaplong=|||=09031514346');
		// echo "stuff2".$email;

}
// function voctech_add_query_vars_filter( $vars ){
//     $vars[] = "p";
//     return $vars;
// }
// add_filter( 'query_vars', 'voctech_add_query_vars_filter' );