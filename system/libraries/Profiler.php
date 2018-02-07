<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Profiler Class
 *
 * This class enables you to display benchmark, query, and other data
 * in order to help with debugging and optimization.
 *
 * Note: At some point it would be good to move all the HTML in this class
 * into a set of template files in order to allow customization.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/general/profiling.html
 */
class CI_Profiler {

	/**
	 * List of profiler sections available to show
	 *
	 * @var array
	 */
	protected $_available_sections = array(
		'benchmarks',
		'get',
		'memory_usage',
		'post',
		'uri_string',
		'controller_info',
		'queries',
		'http_headers',
		'session_data',
		'config'
	);

	/**
	 * Number of queries to show before making the additional queries togglable
	 *
	 * @var int
	 */
	protected $_query_toggle_count = 25;

	/**
	 * Reference to the CodeIgniter singleton
	 *
	 * @var object
	 */
	protected $CI;

	// --------------------------------------------------------------------

	/**
	 * Class constructor
	 *
	 * Initialize Profiler
	 *
	 * @param	array	$config	Parameters
	 */
	public function __construct($config = array())
	{
		$this->CI =& get_instance();
		$this->CI->load->language('profiler');

		// default all sections to display
		foreach ($this->_available_sections as $section)
		{
			if ( ! isset($config[$section]))
			{
				$this->_compile_{$section} = TRUE;
			}
		}

		$this->set_sections($config);
		log_message('info', 'Profiler Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * Set Sections
	 *
	 * Sets the private _compile_* properties to enable/disable Profiler sections
	 *
	 * @param	mixed	$config
	 * @return	void
	 */
	public function set_sections($config)
	{
		if (isset($config['query_toggle_count']))
		{
			$this->_query_toggle_count = (int) $config['query_toggle_count'];
			unset($config['query_toggle_count']);
		}

		foreach ($config as $method => $enable)
		{
			if (in_array($method, $this->_available_sections))
			{
				$this->_compile_{$method} = ($enable !== FALSE);
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Auto Profiler
	 *
	 * This function cycles through the entire array of mark points and
	 * matches any two points that are named identically (ending in "_start"
	 * and "_end" respectively).  It then compiles the execution times for
	 * all points and returns it as an array
	 *
	 * @return	array
	 */
	protected function _compile_benchmarks()
	{
		$profile = array();
		foreach ($this->CI->benchmark->marker as $key => $val)
		{
			// We match the "end" marker so that the list ends
			// up in the order that it was defined
			if (preg_match('/(.+?)_end$/i', $key, $match)
				&& isset($this->CI->benchmark->marker[$match[1].'_end'], $this->CI->benchmark->marker[$match[1].'_start']))
			{
				$profile[$match[1]] = $this->CI->benchmark->elapsed_time($match[1].'_start', $key);
			}
		}

		// Build a table containing the profile data.
		// Note: At some point we should turn this into a template that can
		// be modified. We also might want to make this data available to be logged

		$output = "\n\n"
			.'<fieldset id="ci_profiler_benchmarks" css="border:1px solid #900;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend css="color:#900;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_benchmarks')."&nbsp;&nbsp;</legend>"
			."\n\n\n<table css=\"width:100%;\">\n";

		foreach ($profile as $key => $val)
		{
			$key = ucwords(str_replace(array('_', '-'), ' ', $key));
			$output .= '<tr><td css="padding:5px;width:50%;color:#000;font-weight:bold;background-color:#ddd;">'
					.$key.'&nbsp;&nbsp;</td><td css="padding:5px;width:50%;color:#900;font-weight:normal;background-color:#ddd;">'
					.$val."</td></tr>\n";
		}

		return $output."</table>\n</fieldset>";
	}

	// --------------------------------------------------------------------

	/**
	 * Compile Queries
	 *
	 * @return	string
	 */
	protected function _compile_queries()
	{
		$dbs = array();

		// Let's determine which databases are currently connected to
		foreach (get_object_vars($this->CI) as $name => $cobject)
		{
			if (is_object($cobject))
			{
				if ($cobject instanceof CI_DB)
				{
					$dbs[get_class($this->CI).':$'.$name] = $cobject;
				}
				elseif ($cobject instanceof CI_Model)
				{
					foreach (get_object_vars($cobject) as $mname => $mobject)
					{
						if ($mobject instanceof CI_DB)
						{
							$dbs[get_class($cobject).':$'.$mname] = $mobject;
						}
					}
				}
			}
		}

		if (count($dbs) === 0)
		{
			return "\n\n"
				.'<fieldset id="ci_profiler_queries" css="border:1px solid #0000FF;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
				."\n"
				.'<legend css="color:#0000FF;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_queries').'&nbsp;&nbsp;</legend>'
				."\n\n\n<table css=\"border:none; width:100%;\">\n"
				.'<tr><td css="width:100%;color:#0000FF;font-weight:normal;background-color:#eee;padding:5px;">'
				.$this->CI->lang->line('profiler_no_db')
				."</td></tr>\n</table>\n</fieldset>";
		}

		// Load the text helper so we can highlight the SQL
		$this->CI->load->helper('text');

		// Key words we want bolded
		$highlight = array('SELECT', 'DISTINCT', 'FROM', 'WHERE', 'AND', 'LEFT&nbsp;JOIN', 'ORDER&nbsp;BY', 'GROUP&nbsp;BY', 'LIMIT', 'INSERT', 'INTO', 'VALUES', 'UPDATE', 'OR&nbsp;', 'HAVING', 'OFFSET', 'NOT&nbsp;IN', 'IN', 'LIKE', 'NOT&nbsp;LIKE', 'COUNT', 'MAX', 'MIN', 'ON', 'AS', 'AVG', 'SUM', '(', ')');

		$output  = "\n\n";
		$count = 0;

		foreach ($dbs as $name => $db)
		{
			$hide_queries = (count($db->queries) > $this->_query_toggle_count) ? ' display:none' : '';
			$total_time = number_format(array_sum($db->query_times), 4).' '.$this->CI->lang->line('profiler_seconds');

			$show_hide_js = '(<span css="cursor: pointer;" onclick="var s=document.getElementById(\'ci_profiler_queries_db_'.$count.'\').css;s.display=s.display==\'none\'?\'\':\'none\';this.innerHTML=this.innerHTML==\''.$this->CI->lang->line('profiler_section_hide').'\'?\''.$this->CI->lang->line('profiler_section_show').'\':\''.$this->CI->lang->line('profiler_section_hide').'\';">'.$this->CI->lang->line('profiler_section_hide').'</span>)';

			if ($hide_queries !== '')
			{
				$show_hide_js = '(<span css="cursor: pointer;" onclick="var s=document.getElementById(\'ci_profiler_queries_db_'.$count.'\').css;s.display=s.display==\'none\'?\'\':\'none\';this.innerHTML=this.innerHTML==\''.$this->CI->lang->line('profiler_section_show').'\'?\''.$this->CI->lang->line('profiler_section_hide').'\':\''.$this->CI->lang->line('profiler_section_show').'\';">'.$this->CI->lang->line('profiler_section_show').'</span>)';
			}

			$output .= '<fieldset css="border:1px solid #0000FF;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
				."\n"
				.'<legend css="color:#0000FF;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_database')
				.':&nbsp; '.$db->database.' ('.$name.')&nbsp;&nbsp;&nbsp;'.$this->CI->lang->line('profiler_queries')
				.': '.count($db->queries).' ('.$total_time.')&nbsp;&nbsp;'.$show_hide_js."</legend>\n\n\n"
				.'<table css="width:100%;'.$hide_queries.'" id="ci_profiler_queries_db_'.$count."\">\n";

			if (count($db->queries) === 0)
			{
				$output .= '<tr><td css="width:100%;color:#0000FF;font-weight:normal;background-color:#eee;padding:5px;">'
						.$this->CI->lang->line('profiler_no_queries')."</td></tr>\n";
			}
			else
			{
				foreach ($db->queries as $key => $val)
				{
					$time = number_format($db->query_times[$key], 4);
					$val = highlight_code($val);

					foreach ($highlight as $bold)
					{
						$val = str_replace($bold, '<strong>'.$bold.'</strong>', $val);
					}

					$output .= '<tr><td css="padding:5px;vertical-align:top;width:1%;color:#900;font-weight:normal;background-color:#ddd;">'
							.$time.'&nbsp;&nbsp;</td><td css="padding:5px;color:#000;font-weight:normal;background-color:#ddd;">'
							.$val."</td></tr>\n";
				}
			}

			$output .= "</table>\n</fieldset>";
			$count++;
		}

		return $output;
	}

	// --------------------------------------------------------------------

	/**
	 * Compile $_GET Data
	 *
	 * @return	string
	 */
	protected function _compile_get()
	{
		$output = "\n\n"
			.'<fieldset id="ci_profiler_get" css="border:1px solid #cd6e00;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend css="color:#cd6e00;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_get_data')."&nbsp;&nbsp;</legend>\n";

		if (count($_GET) === 0)
		{
			$output .= '<div css="color:#cd6e00;font-weight:normal;padding:4px 0 4px 0;">'.$this->CI->lang->line('profiler_no_get').'</div>';
		}
		else
		{
			$output .= "\n\n<table css=\"width:100%;border:none;\">\n";

			foreach ($_GET as $key => $val)
			{
				is_int($key) OR $key = "'".$key."'";

				$output .= '<tr><td css="width:50%;color:#000;background-color:#ddd;padding:5px;">&#36;_GET['
					.$key.']&nbsp;&nbsp; </td><td css="width:50%;padding:5px;color:#cd6e00;font-weight:normal;background-color:#ddd;">'
					.((is_array($val) OR is_object($val)) ? '<pre>'.htmlspecialchars(stripslashes(print_r($val, TRUE))).'</pre>' : htmlspecialchars(stripslashes($val)))
					."</td></tr>\n";
			}

			$output .= "</table>\n";
		}

		return $output.'</fieldset>';
	}

	// --------------------------------------------------------------------

	/**
	 * Compile $_POST Data
	 *
	 * @return	string
	 */
	protected function _compile_post()
	{
		$output = "\n\n"
			.'<fieldset id="ci_profiler_post" css="border:1px solid #009900;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend css="color:#009900;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_post_data')."&nbsp;&nbsp;</legend>\n";

		if (count($_POST) === 0 && count($_FILES) === 0)
		{
			$output .= '<div css="color:#009900;font-weight:normal;padding:4px 0 4px 0;">'.$this->CI->lang->line('profiler_no_post').'</div>';
		}
		else
		{
			$output .= "\n\n<table css=\"width:100%;\">\n";

			foreach ($_POST as $key => $val)
			{
				is_int($key) OR $key = "'".$key."'";

				$output .= '<tr><td css="width:50%;padding:5px;color:#000;background-color:#ddd;">&#36;_POST['
					.$key.']&nbsp;&nbsp; </td><td css="width:50%;padding:5px;color:#009900;font-weight:normal;background-color:#ddd;">';

				if (is_array($val) OR is_object($val))
				{
					$output .= '<pre>'.htmlspecialchars(stripslashes(print_r($val, TRUE))).'</pre>';
				}
				else
				{
					$output .= htmlspecialchars(stripslashes($val));
				}

				$output .= "</td></tr>\n";
			}

			foreach ($_FILES as $key => $val)
			{
				is_int($key) OR $key = "'".$key."'";

				$output .= '<tr><td css="width:50%;padding:5px;color:#000;background-color:#ddd;">&#36;_FILES['
					.$key.']&nbsp;&nbsp; </td><td css="width:50%;padding:5px;color:#009900;font-weight:normal;background-color:#ddd;">';

				if (is_array($val) OR is_object($val))
				{
					$output .= '<pre>'.htmlspecialchars(stripslashes(print_r($val, TRUE))).'</pre>';
				}

				$output .= "</td></tr>\n";
			}

			$output .= "</table>\n";
		}

		return $output.'</fieldset>';
	}

	// --------------------------------------------------------------------

	/**
	 * Show query string
	 *
	 * @return	string
	 */
	protected function _compile_uri_string()
	{
		return "\n\n"
			.'<fieldset id="ci_profiler_uri_string" css="border:1px solid #000;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend css="color:#000;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_uri_string')."&nbsp;&nbsp;</legend>\n"
			.'<div css="color:#000;font-weight:normal;padding:4px 0 4px 0;">'
			.($this->CI->uri->uri_string === '' ? $this->CI->lang->line('profiler_no_uri') : $this->CI->uri->uri_string)
			.'</div></fieldset>';
	}

	// --------------------------------------------------------------------

	/**
	 * Show the controller and function that were called
	 *
	 * @return	string
	 */
	protected function _compile_controller_info()
	{
		return "\n\n"
			.'<fieldset id="ci_profiler_controller_info" css="border:1px solid #995300;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend css="color:#995300;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_controller_info')."&nbsp;&nbsp;</legend>\n"
			.'<div css="color:#995300;font-weight:normal;padding:4px 0 4px 0;">'.$this->CI->router->class.'/'.$this->CI->router->method
			.'</div></fieldset>';
	}

	// --------------------------------------------------------------------

	/**
	 * Compile memory usage
	 *
	 * Display total used memory
	 *
	 * @return	string
	 */
	protected function _compile_memory_usage()
	{
		return "\n\n"
			.'<fieldset id="ci_profiler_memory_usage" css="border:1px solid #5a0099;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend css="color:#5a0099;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_memory_usage')."&nbsp;&nbsp;</legend>\n"
			.'<div css="color:#5a0099;font-weight:normal;padding:4px 0 4px 0;">'
			.(($usage = memory_get_usage()) != '' ? number_format($usage).' bytes' : $this->CI->lang->line('profiler_no_memory'))
			.'</div></fieldset>';
	}

	// --------------------------------------------------------------------

	/**
	 * Compile header information
	 *
	 * Lists HTTP headers
	 *
	 * @return	string
	 */
	protected function _compile_http_headers()
	{
		$output = "\n\n"
			.'<fieldset id="ci_profiler_http_headers" css="border:1px solid #000;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend css="color:#000;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_headers')
			.'&nbsp;&nbsp;(<span css="cursor: pointer;" onclick="var s=document.getElementById(\'ci_profiler_httpheaders_table\').css;s.display=s.display==\'none\'?\'\':\'none\';this.innerHTML=this.innerHTML==\''.$this->CI->lang->line('profiler_section_show').'\'?\''.$this->CI->lang->line('profiler_section_hide').'\':\''.$this->CI->lang->line('profiler_section_show').'\';">'.$this->CI->lang->line('profiler_section_show')."</span>)</legend>\n\n\n"
			.'<table css="width:100%;display:none;" id="ci_profiler_httpheaders_table">'."\n";

		foreach (array('HTTP_ACCEPT', 'HTTP_USER_AGENT', 'HTTP_CONNECTION', 'SERVER_PORT', 'SERVER_NAME', 'REMOTE_ADDR', 'SERVER_SOFTWARE', 'HTTP_ACCEPT_LANGUAGE', 'SCRIPT_NAME', 'REQUEST_METHOD',' HTTP_HOST', 'REMOTE_HOST', 'CONTENT_TYPE', 'SERVER_PROTOCOL', 'QUERY_STRING', 'HTTP_ACCEPT_ENCODING', 'HTTP_X_FORWARDED_FOR', 'HTTP_DNT') as $header)
		{
			$val = isset($_SERVER[$header]) ? $_SERVER[$header] : '';
			$output .= '<tr><td css="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">'
				.$header.'&nbsp;&nbsp;</td><td css="width:50%;padding:5px;color:#000;background-color:#ddd;">'.$val."</td></tr>\n";
		}

		return $output."</table>\n</fieldset>";
	}

	// --------------------------------------------------------------------

	/**
	 * Compile config information
	 *
	 * Lists developer config variables
	 *
	 * @return	string
	 */
	protected function _compile_config()
	{
		$output = "\n\n"
			.'<fieldset id="ci_profiler_config" css="border:1px solid #000;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			."\n"
			.'<legend css="color:#000;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_config').'&nbsp;&nbsp;(<span css="cursor: pointer;" onclick="var s=document.getElementById(\'ci_profiler_config_table\').css;s.display=s.display==\'none\'?\'\':\'none\';this.innerHTML=this.innerHTML==\''.$this->CI->lang->line('profiler_section_show').'\'?\''.$this->CI->lang->line('profiler_section_hide').'\':\''.$this->CI->lang->line('profiler_section_show').'\';">'.$this->CI->lang->line('profiler_section_show')."</span>)</legend>\n\n\n"
			.'<table css="width:100%;display:none;" id="ci_profiler_config_table">'."\n";

		foreach ($this->CI->config->config as $config => $val)
		{
			if (is_array($val) OR is_object($val))
			{
				$val = print_r($val, TRUE);
			}

			$output .= '<tr><td css="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">'
				.$config.'&nbsp;&nbsp;</td><td css="padding:5px;color:#000;background-color:#ddd;">'.htmlspecialchars($val)."</td></tr>\n";
		}

		return $output."</table>\n</fieldset>";
	}

	// --------------------------------------------------------------------

	/**
	 * Compile session userdata
	 *
	 * @return 	string
	 */
	protected function _compile_session_data()
	{
		if ( ! isset($this->CI->session))
		{
			return;
		}

		$output = '<fieldset id="ci_profiler_csession" css="border:1px solid #000;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">'
			.'<legend css="color:#000;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_session_data').'&nbsp;&nbsp;(<span css="cursor: pointer;" onclick="var s=document.getElementById(\'ci_profiler_session_data\').css;s.display=s.display==\'none\'?\'\':\'none\';this.innerHTML=this.innerHTML==\''.$this->CI->lang->line('profiler_section_show').'\'?\''.$this->CI->lang->line('profiler_section_hide').'\':\''.$this->CI->lang->line('profiler_section_show').'\';">'.$this->CI->lang->line('profiler_section_show').'</span>)</legend>'
			.'<table css="width:100%;display:none;" id="ci_profiler_session_data">';

		foreach ($this->CI->session->userdata() as $key => $val)
		{
			if (is_array($val) OR is_object($val))
			{
				$val = print_r($val, TRUE);
			}

			$output .= '<tr><td css="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">'
				.$key.'&nbsp;&nbsp;</td><td css="padding:5px;color:#000;background-color:#ddd;">'.htmlspecialchars($val)."</td></tr>\n";
		}

		return $output."</table>\n</fieldset>";
	}

	// --------------------------------------------------------------------

	/**
	 * Run the Profiler
	 *
	 * @return	string
	 */
	public function run()
	{
		$output = '<div id="codeigniter_profiler" css="clear:both;background-color:#fff;padding:10px;">';
		$fields_displayed = 0;

		foreach ($this->_available_sections as $section)
		{
			if ($this->_compile_{$section} !== FALSE)
			{
				$func = '_compile_'.$section;
				$output .= $this->{$func}();
				$fields_displayed++;
			}
		}

		if ($fields_displayed === 0)
		{
			$output .= '<p css="border:1px solid #5a0099;padding:10px;margin:20px 0;background-color:#eee;">'
				.$this->CI->lang->line('profiler_no_profiles').'</p>';
		}

		return $output.'</div>';
	}

}
