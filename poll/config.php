<?php
/****************************************************************************
 * DRBPoll
 * http://www.dbscripts.net/poll/
 * 
 * Copyright © 2007-2010 Don B 
 ****************************************************************************/

require_once(dirname(__FILE__) . '/class.php');	// For the Poll class definition

// Modify this string to reflect the URL where DRBPoll is installed.
// A trailing slash must be included.  This URL will be used in the generated 
// HTML for the URL for the form submission.  This may be a relative or 
// absolute URL.
$POLL_URL = 'poll/';

// Names of the form input elements in the poll form.
// You probably won't need to change these unless the names conflict with some 
// other element on your pages.
$POLL_ID_PARAM_NAME = "pollid";
$VOTE_PARAM_NAME = "vote";

// Maximum width of a bar of the poll results, in pixels
// Change this if you want to make the poll bar chart larger 
// or smaller in width.
$MAX_POLL_BAR_WIDTH = 200;

// Whether or not the script should prevent the same IP address 
// from voting multiple times on the same poll.
// Set to FALSE to allow duplicate votes.  
$PREVENT_DUPLICATE_VOTES = TRUE;

// Whether or not vote counts should be displayed. 
// If set to FALSE, only the percentages will be shown.  
$SHOW_COUNTS = TRUE;

// These are the strings that are displayed in the poll control 
// and the result page.
// Modify these to customize what is displayed to the user.
$SUBMIT_BUTTON_STRING = 'Einsenden';
$NUMBER_OF_VOTES_STRING = 'Insgesamt stimmen: %s';
$VOTE_STRING = 'Stimmen:';						// Used as label for combobox control type
$VOTE_LIST_DEFAULT_LABEL = 'Bitte wählen';	// This is the "empty" option when using a combobox
$VIEW_RESULTS_STRING = 'Aktuelle Ergebnisse';
$DUPLICATE_VOTE_ERROR_MSG = 'Du hast bereits abgestimmt!';
$NO_VOTE_SELECTED_ERROR_MSG = 'Sie haben vergessen, einen Wert zu wählen!';

// List of valid polls.  All vote requests are checked against this list 
// to ensure that malicious users do not submit invalid poll IDs through a 
// cross-site request forgery.  
//
// Add or modify the $VALID_POLLS array to add, modify, or remove polls.   
// The key of the $VALID_POLLS associative array represents the poll ID; 
// this value must be a string.  In addition, it must only use alphanumeric 
// characters (A-Z, a-z, and 0-9).
//
// Set the question property of the Poll object to a string representing 
// the question to be displayed.
//
// Call add_value() on the Poll object to add a new value.  The first 
// parameter represents the value ID, which must be a alphanumeric string.  
// The second parameter is the string to display to the user for this value.

$VALID_POLLS = array();	// The keys of this associative array are the poll IDs

// First poll definition
$p = new Poll;
$p->question = "Wie gefällt Ihnen die neue Website?";	// Question displayed to the user
$p->returnToURL = "http://umr-reinigung.com/";				// Specify the URL to return to for this poll; may be relative or absolute
$p->legend = "Umfrage";						// Form legend; leave empty for none
$p->control_type = $CONTROL_RADIOBUTTONS;		// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
$p->add_value("1", "Gefällt mir");
$p->add_value("2", "Gefällt mir nicht");
	// Poll value ID and a display string
$VALID_POLLS["1"] = $p;							// "1" is the poll ID

?>
