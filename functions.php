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
		voctech_create_custom_pages();
        // add_role( 'busary', 'Bursary', array( 'read' => true, 'level_0' => true ) );
        add_role( 'collector', 'Collector', array( 'read' => true, 'level_0' => true ) );
        add_role( 'student', 'Student', array( 'read' => true, 'level_0' => true ) );
		voctech_add_table_fees_dues();
        update_option( 'custom_roles_version', 1 );
    }
	
    // add_theme_support( 'post-thumbnails', array( 'training', 'store' ) ); // Posts and Movies
    
}
add_action( 'init', 'voctech_update_custom_roles' );

// ADD USER - COLLECTOR 
add_action('wp_ajax_register-collector','voctech_register_artisan');
add_action('wp_ajax_nopriv_register-collector','voctech_register_artisan');
function voctech_register_artisan(){
	$formData = [];
	wp_parse_str($_POST['register-collector'], $formData);
	$errors = [];

	// FORM VALIDATION STARTS

	if(!isset($formData['email']) || !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)){
		$errors[] = 'Email format not correct';
	}

	if(!isset($formData['password']) || strlen($formData['password']) <= 1){
		$errors[] = 'Password is empty. Please provide a valid password';
	}

	if(!isset($formData['fname']) || strlen($formData['fname']) <= 1){
		$errors[] = 'First name cannot be empty';
	}

	if(!isset($formData['lname']) || strlen($formData['lname']) <= 1){
		$errors[] = 'Last name cannot be empty';
	}

	if(!isset($formData['name']) || strlen($formData['name']) <= 1){
		$errors[] = 'Collection name cannot be empty. Provide a valid and official name of collector';
	}

	if(count($errors) >= 1){
		return wp_send_json_error($errors);
	}

	// FORM VALIDATION ENDS
	$userdata = array(
		'user_pass' => $formData['password'],
		'user_login' => $formData['email'],
		'user_nicename' => $formData['name'],
		'user_email'=> $formData['email'],
		'display_name'=> $formData['name'],
		'first_name'=> $formData['fname'],
		'last_name'=> $formData['lname'],
		'role' => 'collector',
		'meta_input'=>[
			'balance' => 0
		]
	);

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


// ADD USER - STUDENT 
add_action('wp_ajax_register-student','voctech_register_student');
add_action('wp_ajax_nopriv_register-student','voctech_register_student');
function voctech_register_student(){
	$formData = [];
	wp_parse_str($_POST['register-student'], $formData);
	$errors = [];

	// FORM VALIDATION STARTS
	if(!isset($formData['matric']) || strlen($formData['matric']) <= 1){
		$errors[] = 'Matric number is empty. Please provide a matric password';
	}
	if(!isset($formData['email']) || !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)){
			$errors[] = 'Email format not correct';
	}
	if(!isset($formData['fname']) || strlen($formData['fname']) <= 1){
		$errors[] = 'First name is empty. Please provide a valid First name';
	}
	if(!isset($formData['lname']) || strlen($formData['lname']) <= 1){
		$errors[] = 'Last name is empty. Please provide a valid Last name';
	}
	if(!isset($formData['state']) || strlen($formData['state']) <= 1){
		$errors[] = 'State of origin is empty. Please provide a valid State of origin';
	}
	if(!isset($formData['lga']) || strlen($formData['lga']) <= 1){
		$errors[] = 'Local Government area is empty. Please provide a valid Local Government area';
	}
	if(!isset($formData['gender']) || strlen($formData['gender']) <= 1){
		$errors[] = 'Gender cannot be empty. Please select a gender';
	}
	if(!isset($formData['faculty']) || strlen($formData['faculty']) <= 1){
		$errors[] = 'Faculty is empty. Please provide a valid Faculty';
	}
	if(!isset($formData['department']) || strlen($formData['department']) <= 1){
		$errors[] = 'Department is empty. Please provide a valid department';
	}
	if(!isset($formData['level']) || strlen($formData['level']) <= 1){
		$errors[] = 'Level is empty. Please provide a valid Level';
	}
	if(!isset($formData['faith']) || strlen($formData['faith']) <= 1){
		$errors[] = 'Faith is empty. Please provide a valid Faith';
	}
	if(!isset($formData['password']) || strlen($formData['password']) <= 1){
		$errors[] = 'Password is empty. Please provide a valid password';
	}

	if(count($errors) >= 1){
		return wp_send_json_error($errors);
	}

	// FORM VALIDATION ENDS
	$userdata = array(
		'user_pass' => $formData['password'],
		'user_login' => $formData['matric'],
		'user_nicename' => $formData['name'],
		'user_email'=> $formData['email'],
		'display_name'=> $formData['fname']." ".$formData['lname'],
		'first_name'=> $formData['fname'],
		'last_name'=> $formData['lname'],
		'role' => 'student',
		'meta_input'=>[
			'matric' => $formData['matric'],
			'state' => $formData['state'],
			'lga' => $formData['lga'],
			'faculty' => $formData['faculty'],
			'department' => $formData['department'],
			'gender' => $formData['gender'],
			'level' => $formData['level'],
			'faith' => $formData['faith'],
		]
	);

	try{

		$user_id = wp_insert_user( $userdata ) ;
		// On success.
		if ( ! is_wp_error( $user_id ) ) {
		    wp_send_json_success(['user_id'=>$user_id]);
		}else{
		    wp_send_json_error(['Unable to create student account. Please try again', $user_id->get_error_message()]);
		}
	}catch(Exception $e){
		wp_send_json_error($e);
	}
}

// ADD FEES OR DUES
add_action('wp_ajax_add-feesdues','voctech_add_feesdues');
function voctech_add_feesdues(){
	$formData = [];
	wp_parse_str($_POST['add-feesdues'], $formData);
	$errors = [];

	// FORM VALIDATION STARTS
	if(!isset($formData['session']) || strlen($formData['session']) <= 1){
		$errors[] = 'Session is empty. Please provide a valid session/year';
	}
	
	if(!isset($formData['amount']) || strlen($formData['amount']) <= 1){
		$errors[] = 'Amount is empty. Please provide a valid number for amount';
	}

	if($formData['amount'] <= 100 || $formData['amount'] > 1000000 ){
		$errors[] = 'Amount is not within the range of 100 -  1M';
	}

	if(count($errors) >= 1){
		return wp_send_json_error($errors);
	}

	// FORM VALIDATION ENDS
	$feesduesData = array(
		'ref' => rand()+rand()+rand()+5,
		'collector' => get_current_user_id(),
		'session_' => $formData['session'],
		'amount' => $formData['amount'],
		'reason' => $formData['reason'],
		'condition1' => $formData['condition1'] ?? '',
		'condition2' => $formData['condition2']  ?? '',
		'condition3' => $formData['condition3']  ?? '',
		'condition4' => $formData['condition4']  ?? '',
		'condition5' => $formData['condition5']  ?? '',
		'comment' => $formData['comment'],
		'status_' => '0',
		'session_reason_amount' => $formData['session'].'_'.'_'.$formData['amount'].'_'.$formData['condition1'].'_'.$formData['condition2'] .'_'.$formData['condition3'] .'_'.$formData['condition4'] .'_'.$formData['condition5'].$formData['reason']
	);

	try{
		global $wpdb;
		$table = $wpdb->prefix.'fees_dues';
		$format = array('%s','%d');

		// On success.
		if ( $wpdb->insert($table,$feesduesData,$format) ) {
		    wp_send_json_success('Added succesfully. It will be reviewed and added by the bursary unit');
		}else{
		    wp_send_json_error(['Unable to add. Possible duplicate record. Try again']);
		}
	}catch(Exception $e){
		wp_send_json_error($e);
	}
}

// UPDATE FEES OR DUES
add_action('wp_ajax_update-feesdues','voctech_update_feesdues');
function voctech_update_feesdues(){
	$formData = [];
	wp_parse_str($_POST['update-feesdues'], $formData);
	$errors = [];

	// FORM VALIDATION STARTS
	if(!isset($formData['id']) || strlen($formData['id']) < 1){
		$errors[] = 'Fee ID is empty. Please select a valid fee';
	}
	
	if(!isset($formData['priority']) || strlen($formData['priority']) < 1){
		$errors[] = 'Priority level is empty. Please provide a valid priority level';
	}

	if(count($errors) >= 1){
		return wp_send_json_error($errors);
	}

	// FORM VALIDATION ENDS
	$feesduesData = array(
		'priority_' => $formData['priority'],
		'status_' => ( $formData['priority'] === '0') ? '0' : '1',
	);

	try{
		global $wpdb;
		$table = $wpdb->prefix.'fees_dues';

		// On success.
		if ($wpdb->update($table,$feesduesData,['id'=> $formData['id']]) ) {
		    wp_send_json_success('Status updated successfully. You will redirected in 5 secs');
		}else{
		    wp_send_json_error(['Unable to complete request. Try again']);
		}
	}catch(Exception $e){
		wp_send_json_error($e);
	}
}

// DELETE FEES/DUES
function voctech_delete_feesdues($id){
	try{
		global $wpdb;
		$table = $wpdb->prefix.'fees_dues';

		// On success.
		if ($wpdb->delete($table,['id'=> $id]) ) {
		    return 'Record deleted successfully. <br> You will be redirected in 5 secs..';
		}else{
		    return 'Unable to delete record. <br> You will be redirected in 5 secs..';
		}
	}catch(Exception $e){
		return 'Unable to delete record. Server error.  <br> You will be redirected in 5 secs..';
	}
}

//GET LIST OF fees/dues
function voctech_get_feesdues($data = []){
	// Submit fees/dues

	$collector_id = (isset($data['collector_id'])) ? htmlentities($data['collector_id']) : get_current_user_id();

	try{
		global $wpdb;
		$table = $wpdb->prefix.'fees_dues';
		
		$qry = "SELECT * FROM $table WHERE collector = $collector_id ";
		$qry = (isset($data['is_admin'])) ? "SELECT * FROM $table " : $qry;
		$qry .= (isset($data['id'])) ? "WHERE id = '".$data['id']."'" : '';
		$qry .= " ORDER BY id DESC";
		
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

function voctech_add_table_fees_dues(){
	// table: fees_dues
	global $wpdb;
    $table_name = $wpdb->prefix . 'fees_dues';
    $wpdb_collate = $wpdb->collate;

	$sql = "CREATE TABLE {$table_name} (
	    id int(10) NOT NULL AUTO_INCREMENT,
	    ref int(10) NOT NULL,
	    collector varchar(255) NOT NULL,
	    session_ varchar(255) NOT NULL,
	    amount varchar(255) NOT NULL,
	    reason varchar(255) NOT NULL,
	    condition1 varchar(255) NOT NULL,
	    condition2 varchar(255) NOT NULL,
	    condition3 varchar(255) NOT NULL,
	    condition4 varchar(255) NOT NULL,
	    condition5 varchar(255) NOT NULL,
	    comment tinytext NULL,
	    status_ varchar(10) DEFAULT '0',
	    priority_ varchar(10) DEFAULT '0',
		session_reason_amount varchar(255) NOT NULL UNIQUE,
	    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	    PRIMARY KEY  (id, ref)
	)
	COLLATE {$wpdb_collate}";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

// ====================

add_action('wp_ajax_register','voctech_already_registered_user');
function voctech_already_registered_user(){
	$logoutUrl = "<a href='".wp_logout_url('/')."'>Logout</a>";
	wp_send_json_error(['You are already registered. To register another account, you have to log out of your account '.$logoutUrl]);
}






// REQUEST SERVICE/JOB
add_action('wp_ajax_quotation-request','voctech_quotation_request');
// add_action('wp_ajax_nopriv_register-collector','voctech_quotation_request');
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
		'collector_id'=>get_current_user_id()
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
		

	$collector_id = (isset($data['collector_id'])) ? htmlentities($data['collector_id']) : get_current_user_id();
	$query = (isset($data['request_id'])) 
	  ? "SELECT * FROM $table WHERE collector_id = '$collector_id' AND request_id = '".$data['request_id']."' AND status='processed';" 
	  : "SELECT * FROM $table WHERE collector_id = '$collector_id' AND status='processed'";

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
