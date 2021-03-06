<?php


class Brizy_Public_BlockScreenshotProxy extends Brizy_Public_AbstractProxy {

	const ENDPOINT = '_block_screenshot';
	const ENDPOINT_POST = '_post';

	/**
	 * @return string
	 */
	protected function get_endpoint_keys() {
		return array( Brizy_Editor::prefix( self::ENDPOINT), Brizy_Editor::prefix( self::ENDPOINT_POST) );
	}

	public function process_query() {
		global $wp_query;
		$vars = $wp_query->query_vars;

		// Check if user is not querying API
		$endpoint = Brizy_Editor::prefix( self::ENDPOINT );
		$endpointPost = Brizy_Editor::prefix( self::ENDPOINT_POST );
		if ( ! isset( $vars[ $endpoint ] ) || ! is_string( $vars[ $endpoint ] ) ) {
			return;
		}
		$noCacheHeaders = array(
			'Cache-Control' => 'max-age=600'
		);
		session_write_close();

		$screenUID = $vars[ $endpoint ];
		$postID    = isset( $vars[ $endpointPost ] ) ? $vars[ $endpointPost] : null;

		$manager = new Brizy_Editor_Screenshot_Manager( new Brizy_Editor_UrlBuilder( null ) );

		$screenPath = $manager->getScreenshot( $screenUID, $postID );

		if ( $screenPath ) {
			$this->send_file( $screenPath, $noCacheHeaders );
			return;
		}

		// try to get the screenshot from cloud
		$client = new Brizy_Admin_Cloud_Client( Brizy_Editor_Project::get(), new WP_Http() );
		$url    = $client->getScreenshotUrl( $screenUID );

		$result = $manager->saveScreenshot( $screenUID, 'saved', file_get_contents( $url ), null );

		if ( $result ) {
			$screenPath = $manager->getScreenshot( $screenUID, $postID );
			$this->send_file( $screenPath, $noCacheHeaders );
		}

		return;
	}
}
