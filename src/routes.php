<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
require  '/var/www/html/api.synpat.com/src/DataController.php';
/*$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});*/
// Routes for API version 1

$app->group('/v1', function () use ($app) {
	/* For Authentication 
	   path:/v1/auth
	   return Valid Token Or Bad Inputs
	*/
	$app->post('/auth',  function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::auth($app, $req, $resp, $args);
		}
	});
	
	/*
		For Docket Details
		path: /v1/data/{docket_number}
		parameter: Valid Token
		return JSON docket data or empty
	*/
	
	$app->get('/docket_details/{docket_number}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::docket_data($app, $req, $resp, $args);
		}		
	});
	
	$app->get('/encode/{number}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::encode($app, $req, $resp, $args);
		}
	});
	$app->get('/decode/{number}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::decode($app, $req, $resp, $args);
		}		
	});
	
	/*
		For Docket Scope
		path: /v1/docket_scope/{docket_number}/{values}
		values = all or patent number
		parameter: Valid Token
		return JSON docket data or empty
	*/
	
	$app->get('/docket_scope/{docket_number}/{values}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::docket_scope($app, $req, $resp, $args);
		}
	});
	
	/*
		For Docket Claim Illustration file
		path: /v1/docket_claim/{docket_number}
		parameter: Valid Token
		return JSON docket data or empty
	*/
	
	$app->get('/docket_claim_files/{docket_number}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::docket_claim($app, $req, $resp, $args);
		}		
	});
	/*
		For Docket Invention data
		path: /v1/docket_invention/{docket_number}/{value}
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->get('/docket_invention/{docket_number}/{value}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::docket_invention($app, $req, $resp, $args);
		}
	});
	
	/*
		For Docket Evidence Of Use data
		path: /v1/docket_invention/{docket_number}/{value}
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->get('/docket_evidence_of_use/{docket_number}/{value}/{t}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::docket_evidence_of_use($app, $req, $resp, $args);
		}
	});
	
	/*
		For Docket Buy Report 
		path: /v1/buy_report/{docket_number}
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->post('/buy_report/{docket_number}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::claimchart_buy_report($app, $req, $resp, $args);
		}
	});
	
	
	/*
		For Docket Comparables list of agreements
		path: /v1/docket_comparables/{docket_number}
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->get('/docket_comparables/{docket_number}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::docket_comparables($app, $req, $resp, $args);
		}		
	});
	
	/*
		For Docket Royalties list of agreements
		path: /v1/docket_royalties/{docket_number}
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->get('/docket_royalties/{docket_number}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::docket_royalties($app, $req, $resp, $args);
		}
	});
	
	/*
		For Docket Citation company logos
		path: /v1/docket_clogos/{docket_number}
		post: type and list
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->post('/docket_companies_logos', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::docket_clogos($app, $req, $resp, $args);
		}
	});
	
	/*
		For Docket Citation 
		path: /v1/docket_citations/{docket_number}
		post: type and list
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->get('/docket_citations/{docket_number}/{t}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::docket_citations($app, $req, $resp, $args);
		}
	});
	
	/*
		For Docket Companies Logos 
		path: /v1/docket_companies_logos_by_patent/{docket_number}/{citation_id}
		get: docket_number and citation_id
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->get('/docket_companies_logos_by_patent/{docket_number}/{citation_id}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::docket_clogos_by_id($app, $req, $resp, $args);
		}
		/*return DataController::docket_clogos_by_id($app, $req, $resp, $args);*/
	});
	
	
	/*
		For Docket Seller 
		path: /v1/docket_seller/{docket_number}/{value}
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->get('/docket_seller/{docket_number}/{value}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::docket_seller($app, $req, $resp, $args);
		}
	});
	
	
	/*
		For Docket PDF files
		path: /v1/docket_pdf/{docket_number}
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->get('/docket_pdf_files/{docket_number}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::docket_pdf($app, $req, $resp, $args);
		}
	});
	
	/*
		For Docket Validity 
		path: /v1/docket_validity/{docket_number}/{value}
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->get('/docket_validity/{docket_number}/{value}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::docket_validity($app, $req, $resp, $args);
		}
	});
	
	/*
		For Docket Companies 
		path: /v1/docket_companies/{docket_number}
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->get('/docket_companies/{docket_number}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::docket_companies($app, $req, $resp, $args);
		}
	});
	
	
	/*
		For Docket Patents 
		path: /v1/docket_patents/{docket_number}
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->get('/docket_patents/{docket_number}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::docket_patents($app, $req, $resp, $args);
		}
	});
	
	/*
		For Child Category list
		path: /v1/category/{parent_category}
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->get('/category/{parent_category}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::categories($app, $req, $resp, $args);
		}
	});
	
	/*
		For Main Category list
		path: /v1/category
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->get('/category', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::main_categories($app, $req, $resp, $args);
		}
	});
	
	/*
		For Portfolio list
		path: /v1/portfolio/{category}/{invitation}
		parameter: Valid Token
		return JSON docket data or empty
	*/
	
	/*
		For Login
		path: /v1/login
		post: email and password
		return Auth Token
	*/
	$app->post('/login', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::login($app, $req, $resp, $args);
		}
	});
	
	/*
		For Forgot Password
		path: /v1/forgot_password
		post: email
		return Auth Token
	*/
	$app->post('/forgot_password', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::forgot_password($app, $req, $resp, $args);
		}
	});
	
	/*
		For portfolio details
		path: /v1/portfolio/{category}
		parameter category and invitation number
		return list of portfolios under given category or show portfolio according to invitation
	*/
	
	$app->get('/portfolio/{category}', function($req, $resp, $args) use ($app){		
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::portfolio_list($app, $req, $resp, $args);
		}
	});
	
	/*
		For Login
		path: /v1/portfolio/{category}/{invitation}
		parameter category and invitation number
		return list of portfolios under given category or show portfolio according to inviation
	*/
	
	$app->get('/portfolio/{category}/{invitation}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::portfolio_list($app, $req, $resp, $args);
		}
	});
	
	/*
		For Demo Portfolio
		path: /v1/demo_portfolio
		return list of demo portfolios
	*/
	
	$app->get('/demo_portfolio', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::demo_portfolio_list($app, $req, $resp, $args);
		}
	});
	
	/*
		For Login
		path: /v1/search_portfolios/{q}/{order_by}
		parameter search string and order_by earliest or highest
		return list of portfolios according to search string
	*/
	
	$app->post('/search_portfolios', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::search_portfolio($app, $req, $resp, $args);
		}
	});
	
	/*
		For Check Availability
		path: /v1/portfolio_check_availability
		post: check_available_company
		return object
	*/
	$app->post('/check_availability', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::check_availability($app, $req, $resp, $args);
		}
	});
	
	/*
		For Customize Document
		path: /v1/customize
		post: new customer register information or send old customer login information
		return object wth Google Doc Link
	*/
	$app->post('/customize', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::customize_document($app, $req, $resp, $args);
		}
	});
	
	/*
		For Send Message 
		path: /v1/portfolio_send_message
		post: new customer login information or send old customer login information
		return object with successful message
	*/
	$app->post('/portfolio_send_message', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::send_message($app, $req, $resp, $args);
		}
	});	
	
	/*
		For Download 
		path: /v1/download
		post: send old customer login information
		return object with successful message
	*/
	$app->post('/download', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::download_file($app, $req, $resp, $args);
		}
	});
	
	/*
		For pending_list_of_documents 
		path: /v1/pending_list_of_documents
		post: send old customer login information
		return object with successful message
	*/
	$app->post('/pending_list_of_documents', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::pending_list_of_documents($app, $req, $resp, $args);
		}
	});
	
	/*
		For Request for participate 
		path: /v1/request_for_participate
		post: send customer login information and signed pdf file by customer
		return object with successful message
	*/
	$app->post('/request_for_participate', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::request_for_participate($app, $req, $resp, $args);
		}
	});
	
	/*
		For Deal Flow
		path: /v1/user_deal_flow
		parameter: Token
		return list of deals flow
	*/
	
	$app->get('/customer_deal_flow', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::user_deal_flow($app, $req, $resp, $args);
		}		
	});
	
	/*
		For Customer Transaction
		path: /v1/customer_transactions
		parameter: Token
		return list of licenses
	*/
	
	$app->get('/customer_transactions', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::user_transaction($app, $req, $resp, $args);
		}
	});
	
	/*
		For Porfolio Info
		path: /v1/portfolio_info
		parameter: Token
		return portfolio detail
	*/
	
	$app->post('/portfolio_info', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::portfolio_info($app, $req, $resp, $args);
		}		
	});
	
	/*
		For Request for License
		path: /v1/request_for_license
		parameter: Token
		return object
	*/
	
	$app->post('/request_for_license', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::uploadAgreementOrProofOfPayment($app, $req, $resp, $args);
		}
	});
	
	/*
		For Customer Wishlist
		path: /v1/customer_wishlist
		parameter: Token
		return list of wishlist
	*/
	
	$app->get('/customer_wishlist', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::user_wishlist($app, $req, $resp, $args);
		}
	});
	
	/*
		For Add Portfolio to customer wishlist
		path: /v1/add_customer_wishlist
		parameter: Token
		return list of preferences
	*/
	
	$app->post('/add_customer_wishlist', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::add_customer_wishlist($app, $req, $resp, $args);
		}
	});
	
	/*
		For Delete Portfolio from customer Wishlisdt
		path: /v1/delete_portfolio_customer_wishlist
		parameter: Token
		return list of preferences
	*/
	
	$app->post('/delete_portfolio_customer_wishlist', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::delete_customer_wishlist($app, $req, $resp, $args);
		}
	});
	
	/*
		For Customer Preferences
		path: /v1/customer_preferences
		parameter: Token
		return list of preferences
	*/
	
	$app->get('/customer_preferences', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::user_preferences($app, $req, $resp, $args);
		}
	});
	
	
	/*
		For Customer Preferences
		path: /v1/preferences_list
		parameter: Token
		return list of preferences
	*/ 
	
	$app->get('/preferences_list', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::get_all_parent_child_category($app, $req, $resp, $args);
		}
	});
	
	
	/*
		For Customer Update Preferences
		path: /v1/customer_update_preferences
		parameter: Token
		return list of preferences
	*/ 
	
	$app->post('/customer_update_preferences', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::update_user_preferences($app, $req, $resp, $args);
		}
	});
	
	/*
		For Customer Membership
		path: /v1/my_membership
		parameter: Token
		return list of preferences
	*/
	
	$app->get('/my_membership', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::my_membership($app, $req, $resp, $args);
		}
	});
	
	/*
		For Company Info
		path: /v1/company_info
		parameter: Token
		return company information
	*/
	
	$app->get('/company_info', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::company_info($app, $req, $resp, $args);
		}
	});
	
	/*
		For Logged User Info
		path: /v1/user_info
		parameter: Token
		return company information
	*/
	
	$app->get('/user_info', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::user_info($app, $req, $resp, $args);
		}
	});
	
	/*
		For Membership ProofOfPayment
		path: /v1/upload_membership_payment
		parameter: Token
		return object
	*/
	
	$app->post('/upload_membership_payment', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::membership_payment($app, $req, $resp, $args);
		}
	});
	
	/*
		For Company Users list
		path: /v1/company_users_list
		parameter: Token
		return company users list
	*/
	
	$app->get('/company_users_list', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::users_list($app, $req, $resp, $args);
		}
	});
	
	/*
		For Update customer account
		path: /v1/update_account
		parameter: Token
		return string message
	*/
	$app->post('/update_account', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::update_user_account($app, $req, $resp, $args);
		}
	});
	
	/*
		For remove user from customer account
		path: /v1/remove_user
		parameter: Token
		return string message
	*/
	$app->post('/remove_user', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::remove_user($app, $req, $resp, $args);
		}
	});
	
	/*
		For Search Company list
		path: /v1/search_companies
		parameter: Valid Token
		return JSON docket data or empty
	*/
	$app->post('/search_companies', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::search_companies($app, $req, $resp, $args);
		}
	});
	
	/*
		For Docket Scope
		path: /v1/patent_family_illustration/{docket_number}/{values}
		values = all or patent number
		parameter: Valid Token
		return JSON docket data or empty
	*/
	
	$app->get('/patent_family_illustration/{values}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::patent_family_illustration($app, $req, $resp, $args);
		}
	});
	
	/*
		For Docket Litigation Scrape Data
		path: /v1/litigation_data/{docket_number}
		parameter: Valid Token
		return JSON docket litigation data or empty
	*/
	
	$app->get('/litigation_data/{docket_number}', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::litigation_data($app, $req, $resp, $args);
		}		
	});
	
	/*
		Get Time Slots
	*/
	$app->post('/timeslots', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::find_free_busy_time_slot($app, $req, $resp, $args);
		}
	});
	$app->post('/create_appointment', function($req, $resp, $args) use ($app){
		$method = $req->getMethod();
		if($method == "OPTIONS"){
			return $resp->withJSON(array(),200);
		} else {
			return DataController::create_appointment($app, $req, $resp, $args);
		}
	});
});
