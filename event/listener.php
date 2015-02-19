<?php

/**
* @package Always Agree Registration
* @copyright (c) 2015 Anvar [apwa.ru]
* @link http://bb3.mobi
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*/

namespace bb3mobi\agreed\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/** @var \phpbb\template\template */
	protected $template;

	/** @var string phpbb_root_path */
	protected $phpbb_root_path;

	/** @var string phpEx */
	protected $php_ext;

	/**
	* Constructor
	*
	* @param \phpbb\template\template            $template          Template object
	* @param string                              $root_path         phpBB root path
	* @param string                              $php_ext           phpEx
	* @return \bb3mobi\agreed\event\listener
	* @access public
	*/

	public function __construct(\phpbb\template\template $template, $phpbb_root_path, $php_ext)
	{
		$this->template = $template;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
	}

	static public function getSubscribedEvents()
	{
		return array('core.page_header_after' => 'ucp_register_agreed');
	}

	public function ucp_register_agreed()
	{
		$this->template->assign_var('U_REGISTER', append_sid("{$this->phpbb_root_path}ucp.$this->php_ext", 'mode=register&amp;agreed=true'));
	}
}
