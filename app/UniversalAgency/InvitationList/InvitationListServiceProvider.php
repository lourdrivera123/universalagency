<?php namespace UniversalAgency\InvitationList;

use Illuminate\Support\ServiceProvider;

class InvitationListServiceProvider extends ServiceProvider {

	function register()
	{
		$this->app->bind(
			'UniversalAgency\Invitation\InvitationList',
			'UniversalAgency\Invitation\Mailchimp\InvitationList'
		);
	}

}