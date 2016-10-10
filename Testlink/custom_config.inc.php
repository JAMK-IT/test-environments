<?php
/**
 * TestLink Open Source Project - http://testlink.sourceforge.net/ 
 * This script is distributed under the GNU General Public License 2 or later. 
 *
 * @filesource	custom_config.inc.php.example
 * @author      franciscom
 *
 * SCOPE:
 * Constants and configuration parameters used throughout TestLink DEFINED BY USERS.
 *
 * Use this file to overwrite configuration parameters (variables and defines)
 * present in:
 *             config.inc.php
 *             cfg/const.inc.php
 *-----------------------------------------------------------------------------
*/

// *******************************************************************************
// *******************************************************************************
// Hint: After doing configuration changes, clean you Browser's cookies and cache 
//
// use contents of this file as an example of custom configuration
//
// *******************************************************************************
//
// This configuration has been created to solve:
// http://itsecuritysolutions.org/2012-08-13-TestLink-1.9.3-multiple-vulnerabilities/
// Give a look to:
// http://mantis.testlink.org/view.php?id=5147
// http://mantis.testlink.org/view.php?id=5148
// http://mantis.testlink.org/view.php?id=4977
// http://mantis.testlink.org/view.php?id=4906
// 
// You need to be certain that these folders have correct permissions in order
// to allow the user/daemon used to run the webserver service/daemon read/write access.
//
// $tlCfg->log_path = '/var/testlink-ga-testlink-code/logs/'; /* unix example */
// $g_repositoryPath = '/var/testlink-ga-testlink-code/upload_area/';  /* unix example */
//
// 
// ********************************************************************************************
// Uncomment this if you want:
// 1. dBug() display info
// 2. debug_print_backtrace() on database.class.php
//    instead of debug_print_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS)
// define('DBUG_ON',1);
//
// ********************************************************************************************
//
// Example of Logger config
// After this config:
// 					 $tlCfg->loggerFilter = array('DEBUG','AUDIT','WARNING','ERROR');
//
// This will be written to TL event viewer
// 					tLog("SOAP Fault: (code: {$f->faultcode}, string: {$f->faultstring})","DEBUG");
//
//
// To use a different version of ADODB that provided with TL, use a similar bunch of lines
// on custom_config.inc.php
// if( !defined('TL_ADODB_RELATIVE_PATH') )
// {
//     define('TL_ADODB_RELATIVE_PATH','/../../third_party/[WHERE YOU HAVE INSTALLED adodb YOU WANT TO TEST]/adodb.inc.php' );
// }
//
// /** in this way you can switch ext js version in easy way,
// 	To use a different version of Sencha (Old EXT-JS) that provided with TL */
// if( !defined('TL_EXTJS_RELATIVE_PATH') )
// {
//     define('TL_EXTJS_RELATIVE_PATH','third_party/ext-js' );
// }

// *******************************************************************************
// If you want you have a different login template
// key: original TL template name WITHOUT extension
// value: whatever name you want, only constrain you have to copy your template
//        ON SAME FOLDER where original template is. 
//        
// $g_tpl = array('login'	=> 'customLogin.tpl');
// 
// *******************************************************************************
//
// If you create your OWN reports and add something like this:
//
// ------------------------------------------------------------
// $tlCfg->reports_list['tcases_with_rca'] = array( 
//	'title' => 'link_report_tcases_with_cf',
//	'url' => 'lib/results/testCasesWithCF.php',
//	'enabled' => 'all',
//	'format' => 'format_html'
// );
// -----------------------------------------------------------
// Your reports WILL BE ON TOP OF standard TL Reports on left frame
//
//
// $tlCfg->gui->text_editor['all'] = array( 'type' => 'fckeditor', 
//                                          'toolbar' => 'tl_default', 
//                                          'configFile' => 'cfg/tl_fckeditor_config.js');
//
// Copy this to custom_config.inc.php if you want use 'tinymce' as default.
//$tlCfg->gui->text_editor['all'] = array( 'type' => 'tinymce');
// 
// Copy this to custom_config.inc.php if you want use 'nome' as default.
// $tlCfg->gui->text_editor['all'] = array( 'type' => 'none');
//
// Suggested for BETTER Performance with lot of testcases
//$tlCfg->gui->text_editor['execution'] = array( 'type' => 'none');
//
// Enable and configure this if you want to have different
// webeditor type in different TL areas
// You can not define new areas without making changes to php code
//
// $tlCfg->gui->text_editor['execution'] = array( 'type' => 'none');  // BETTER Performance with lot of testcases
// 
// This configuration is useful only if default type is set to 'fckeditor'
// $tlCfg->gui->text_editor['design'] = array('toolbar' => 'tl_mini');
// 
// $tlCfg->gui->text_editor['testplan'] = array( 'type' => 'none');
// $tlCfg->gui->text_editor['build'] = array( 'type' => 'fckeditor','toolbar' => 'tl_mini');
// $tlCfg->gui->text_editor['testproject'] = array( 'type' => 'tinymce');
// $tlCfg->gui->text_editor['role'] = array( 'type' => 'tinymce');
// $tlCfg->gui->text_editor['requirement'] = array( 'type' => 'none');
// $tlCfg->gui->text_editor['requirement_spec'] = array( 'type' => 'none');
//
//
// SMTP server Configuration ("localhost" is enough in the most cases)
//$g_smtp_host        = 'localhost';  # SMTP server MUST BE configured  

# Configure using custom_config.inc.php
//$g_tl_admin_email     = 'tl_admin@127.0.0.1'; # for problem/error notification 
//$g_from_email         = 'testlink@127.0.0.1';  # email sender
//$g_return_path_email  = 'francisco@127.0.0.1';

# Urgent = 1, Not Urgent = 5, Disable = 0
// $g_mail_priority = 5;   

# Taken from mantis for phpmailer config
#define ("SMTP_SEND",2);
#$g_phpMailer_method = SMTP_SEND;

// Configure only if SMTP server requires authentication
//$g_smtp_username    = '';  # user  
//$g_smtp_password    = '';  # password 
//

// TRUE  -> the whole execution history for the choosen build will be showed
// FALSE -> just last execution for the choosen build will be showed [STANDARD BEHAVIOUR]
//$tlCfg->exec_cfg->history_on = TRUE;

//$tlCfg->exec_cfg->show_testsuite_contents = ENABLED;

// TRUE  ->  test case VERY LAST (i.e. in any build) execution status will be displayed
// FALSE -> only last result on current build.  [STANDARD BEHAVIOUR]
//$tlCfg->exec_cfg->show_last_exec_any_build = TRUE;

// TRUE  ->  History for all builds will be shown
// FALSE ->  Only history of the current build will be shown  [STANDARD BEHAVIOUR]
//$tlCfg->exec_cfg->show_history_all_builds = TRUE;

// $tlCfg->gui->custom_fields->types = array(100 => 'radio head');
// $tlCfg->gui->custom_fields->possible_values_cfg = array('radio head' => 1);

//$g_log_level='DEBUG';

/** Define your own test status(es) by modifying
 *   - $tlCfg->results['status_code'] (in this file)
 *   - $tlCfg->results['status_label'] (in this file)
 *   - $tlCfg->results['status_label_for_exec_ui'] (in this file)
 *   - $tlCfg->results['charts']['status_colour'] (in this file)
 *   - /locale/<your_language>/custom_strings.txt (see custom_strings.txt.example)
 *   - /gui/themes/default/css/custom.css (see custom.css.example)
 */

// This Example shows how to add the status 'my_status'

//$tlCfg->results['status_code'] = array (
//	'failed'        => 'f',
//	'blocked'       => 'b',
//	'passed'        => 'p',
//	'not_run'       => 'n',
//	'not_available' => 'x',
//	'unknown'       => 'u',
//	'all'           => 'a',
//	'my_status'     => 'm'
//); 
//
//// For localization example see /locale/<your_language>/custom_strings.txt.example
//$tlCfg->results['status_label'] = array(
//	'not_run'       => 'test_status_not_run',
//	'passed'        => 'test_status_passed',
//	'failed'        => 'test_status_failed',
//	'blocked'       => 'test_status_blocked',
//	'my_status'     => 'test_status_my_status'
////	'all'           => 'test_status_all_status',
////	'not_available' => 'test_status_not_available',
////	'unknown'       => 'test_status_unknown'
//);
//
//$tlCfg->results['status_label_for_exec_ui'] = array(
//	'not_run'   => 'test_status_not_run',
//	'passed'    => 'test_status_passed',
//	'failed'    => 'test_status_failed',
//	'blocked'   => 'test_status_blocked',
//	'my_status' => 'test_status_my_status'
//);
//
//$tlCfg->results['default_status'] = 'not_run';
//
//$tlCfg->results['charts']['status_colour'] = array(
//	'not_run'   => '000000',
//	'passed'    => '006400',
//	'failed'    => 'B22222',
//	'blocked'   => '00008B',
//	'my_status' => 'FF8C11'
//);
//
// -------------------------------------------------------------------------------------------------
// Item templates
//
// $tlCfg->testplan_template->notes->type = 'string';
// $tlCfg->testplan_template->notes->value = 'this is a test plan';
// 
// $tlCfg->build_template->notes->type = 'string';
// $tlCfg->build_template->notes->value = 'what a build';
// $tlCfg->requirement_template->scope->type = 'string';
// $tlCfg->requirement_template->scope->value = 'what a Requirement';
// $tlCfg->requirement_template->scope->type = 'file';
// $tlCfg->requirement_template->scope->value = 'c:\usr\local\xampp-1.7.2\xampp\htdocs\head-20090909\item_templates\requirement.txt';
// $tlCfg->req_spec_template->scope->type = 'string';
// $tlCfg->req_spec_template->scope->value = 'what a req_spec';
// $tlCfg->req_spec_template->scope->type = 'file';
// $tlCfg->req_spec_template->scope->value = 'c:\usr\local\xampp-1.7.2\xampp\htdocs\head-20090909\item_templates\req_spec.txt';

$tlCfg->config_check_warning_mode = 'SILENT';

$g_interface_bugs='MANTIS';
?>
