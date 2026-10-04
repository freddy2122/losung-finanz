<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class App extends Controller
{
	
	/**
	 * Page d'accueil
	 */
	public function index(){
		return view('pages.index');
	}
	
	/**
	 * Politique de confidentialité privée
	 */
	public function legal_notice(){
		return view('pages.legal-notice');
	}

	/**
	 * Politique de confidentialité
	 */
	public function privacy_policy(){
		return view('pages.privacy-policy');
	}

	/**
	 * Politique de cookie
	 */
	public function cookie_policy(){
		return view('pages.cookie-policy');
	}

	/**
	 * Déclaration d'accessibilité
	 */
	public function accessibility_statement(){
		return view('pages.accessibility-statement');
	}

	/**
	 * Politique de divulgation de vulnérabilités
	 */
	public function vulnerability_disclosure(){
		return view('pages.vulnerability-disclosure');
	}

	/**
	 * Risques de fraude
	 */
	public function fraud_risks(){
		return view('pages.fraud-risks');
	}

	/**
	 * Modalités de remboursement
	 */
	public function repayment_policy(){
		return view('pages.repayment-policy');
	}

	/**
	 * Comment ça marche ?
	 */
	public function how_it_works(){
		return view('pages.how-it-works');
	}


	/**
	 * Nos offres de prêt
	 */
	public function loan_offers( Request $request ){
		$type = $request->route('type') ?? false;
		$records = loanOffersLists( $type );

		return view('pages.loan-offers', compact('type', 'records'));
	}


	/**
	 * Nos assurances
	 */
	public function assurances( Request $request ){
		$type = $request->route('type') ?? false;
		$records = assuranceOffersLists( $type );

		return view('pages.insurances', compact('type', 'records'));
	}
}
