<?php
/**
 * Created by PhpStorm.
 * User: steevenz
 * Date: 11/5/2015
 * Time: 12:44 PM
 */

namespace O2System\File\Factory;

use O2System\File;
use Upload\Storage\FileSystem;

/**
 * File Uploading Class
 *
 * @package        O2System
 * @subpackage     Libraries
 * @category       Uploads
 * @author         Circle Creative Dev Team
 * @link           http://codeigniter.com/wiki/#Upload
 */
class Upload
{
	protected $_config = array();

	protected $_storage = NULL;

	public function __construct( $config = array() )
	{
		if ( empty( $config ) )
		{
			if ( class_exists( 'O2System' ) )
			{
				$config = \O2System::$config[ 'upload' ];
			}
		}

		$this->_config = array_merge_recursive( $this->_config, $config );

		if ( isset( $this->_config[ 'path' ] ) )
		{
			if ( is_dir( $this->_config[ 'path' ] ) )
			{
				$this->_storage = new FileSystem( $this->_config[ 'path' ] );
			}
		}
	}

	public function do_upload( $field )
	{
		// Is $_FILES[$field] set? If not, no reason to continue.
		if ( isset( $_FILES[ $field ] ) )
		{
			$_file = $_FILES[ $field ];
		}
	}
}