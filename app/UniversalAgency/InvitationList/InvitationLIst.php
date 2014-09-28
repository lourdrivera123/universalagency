<?php namespace UniversalAgency\Invitations;

interface InvitationList {

	function subscribeTo($list, $email);

	function unSubscribeFrom($list, $email);
}