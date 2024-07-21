<?php

namespace WPForms\Requirements;

/**
 * Requirements management.
 *
 * @since 1.8.2.2
 */
class Requirements {

	/**
	 * Whether deactivate addon if requirements not met.
	 *
	 * @since 1.8.2.2
	 */
	const DEACTIVATE_IF_NOT_MET = true;

	/**
	 * Whether to show PHP version notice.
	 *
	 * @since 1.8.2.2
	 */
	const SHOW_PHP_NOTICE = true;

	/**
	 * Whether to show PHP extension notice.
	 *
	 * @since 1.8.2.2
	 */
	const SHOW_EXT_NOTICE = true;

	/**
	 * Whether to show WordPress version notice.
	 *
	 * @since 1.8.2.2
	 */
	const SHOW_WP_NOTICE = true;

	/**
	 * Whether to show WPForms version notice.
	 *
	 * @since 1.8.2.2
	 */
	const SHOW_WPFORMS_NOTICE = true;

	/**
	 * Whether to show license level notice.
	 *
	 * @since 1.8.2.2
	 */
	const SHOW_LICENSE_NOTICE = false;

	/**
	 * Whether to show addon version notice.
	 *
	 * @since 1.8.2.2
	 */
	const SHOW_ADDON_NOTICE = true;

	/**
	 * Keys of the requirements' arrays.
	 *
	 * @since 1.8.2.2
	 */
	const PHP                    = 'php';
	const EXT                    = 'ext';
	const WP                     = 'wp';
	const WPFORMS                = 'wpforms';
	const LICENSE                = 'license';
	const PRIORITY               = 'priority';
	const ADDON                  = 'addon';
	const ADDON_VERSION_CONSTANT = 'addon_version_constant';
	const VERSION                = 'version';
	const COMPARE                = 'compare';
	const COMPARE_DEFAULT        = '>=';

	/**
	 * Development version of WPForms. Can be specified in an addon.
	 *
	 * @since 1.8.2.2
	 */
	const WPFORMS_DEV_VERSION_IN_ADDON = '{WPFORMS_VERSION}';

	/**
	 * Plus, Pro and Top level licenses.
	 * Must be a list separated by comma and space.
	 *
	 * @since 1.8.2.2
	 */
	const PLUS_PRO_AND_TOP = [ 'plus', 'pro', 'elite', 'agency', 'ultimate' ];

	/**
	 * Pro and Top level licenses.
	 * Must be a list separated by comma and space.
	 *
	 * @since 1.8.2.2
	 */
	const PRO_AND_TOP = [ 'pro', 'elite', 'agency', 'ultimate' ];

	/**
	 * Top level licenses.
	 * Must be a list separated by comma and space.
	 *
	 * @since 1.8.2.2
	 */
	const TOP = [ 'elite', 'agency', 'ultimate' ];

	/**
	 * Default minimal addon requirements.
	 *
	 * @since 1.8.2.2
	 *
	 * @var string[]
	 */
	private $defaults = [
		self::PHP      => '7.0',
		self::WP       => '5.5',
		self::WPFORMS  => self::WPFORMS_DEV_VERSION_IN_ADDON,
		self::LICENSE  => self::PRO_AND_TOP,
		self::PRIORITY => 10,
	];

	/**
	 * Some things to do.
	 *
	 * @todo Add custom message for form-templates-pack.
	 */

	// phpcs:disable WordPress.Arrays.MultipleStatementAlignment.DoubleArrowNotAligned, WordPress.Arrays.MultipleStatementAlignment.LongIndexSpaceBeforeDoubleArrow
	/**
	 * Addon requirements.
	 *
	 * Array has the format 'addon basename' => 'addon requirements array'.
	 * The requirement array can have the following keys:
	 * self::PHP ('php') for the minimal PHP version required,
	 * self::EXT ('ext') for the PHP extensions required,
	 * self::WP ('wp') for the minimal WordPress version required,
	 * self::WPFORMS ('wpforms') for the minimal WPForms version required,
	 * self::LICENSE ('license') for the license level required,
	 * self::ADDON ('addon') for the minimal addon version required,
	 * self::ADDON_VERSION_CONSTANT ('addon_version_constant') for the addon version constant.
	 * self::PRIORITY ('priority') for the priority of the current requirements.
	 *
	 * 'php' value can be string like '5.6' or an array like 'php' => [ 'version' => '7.2', compare => '=' ].
	 * 'ext' value can be string like 'curl' or an array like 'ext' => [ 'curl', 'mbstring' ].
	 * 'wp' value can be string like '5.5' or an array like 'wp' => [ 'version' => '6.4', compare => '=' ].
	 * 'wpforms' value can be string like '1.8.2' or an array like 'wpforms' => [ 'version' => '1.7.5', compare => '=' ].
	 *   When 'wpforms' value is '{WPFORMS_VERSION}', it is not checked and should be used for development.
	 * 'license' value can be string like 'elite, agency, ultimate', an array like 'license' => [ 'elite', 'agency', 'ultimate' ].
	 *    When 'license' value is an empty like null, false, [], it is not checked.
	 * 'addon' value can be string like '2.0.1' or an array like 'addon' => [ 'version' => '2.0.1', 'compare' => '<=' ].
	 * 'addon_version_constant' must be a string like 'WPFORMS_ACTIVECAMPAIGN_VERSION'.
	 * 'priority' must be an integer like 20. By default, it is 10.
	 *
	 * By default, 'compare' is '>='.
	 *
	 * Default addon version constant is formed from addon directory name like this:
	 * wpforms-activecampaign -> WPFORMS_ACTIVECAMPAIGN_VERSION.
	 *
	 * Requirements can be specified here or in the addon as a parameter of wpforms_requirements().
	 * The priorities from lower to higher (if PRIORITY is not set or equal):
	 * 1. Default parameters from $this->defaults.
	 * 2. Current array $this->requirements.
	 * 3. Parameter of wpforms_requirements() call in the addon.
	 * Settings with a higher priority overwrite lower priority settings.
	 *
	 * Minimal required version of WPForms should be specified in the addons.
	 * Minimal required version of addons should be specified here, in $this->requirements array.
	 *
	 * We do not plan to restrict the lower addon version so far.
	 * However, if in the future we may need to do so,
	 * we should add to the addon-related requirement array the line like
	 * self::ADDON => '1.x.x' or
	 * self::ADDON => '{WPFORMS_ACTIVECAMPAIGN_VERSION}'.
	 * Here 1.x.x is the specific addon version, and
	 * WPFORMS_ACTIVECAMPAIGN_VERSION is the addon version constant name.
	 * The script will replace the addon version constant name during the addon release.
	 *
	 * @since 1.8.2.2
	 *
	 * @var array
	 */
	private $requirements = [
		'wpforms-activecampaign/wpforms-activecampaign.php'             => [
			self::LICENSE => self::TOP,
		],
		'wpforms-authorize-net/wpforms-authorize-net.php'               => [
			self::LICENSE => self::TOP,
		],
		'wpforms-aweber/wpforms-aweber.php'                             => [
			self::EXT     => 'curl',
			self::LICENSE => self::PLUS_PRO_AND_TOP,
		],
		'wpforms-calculations/wpforms-calculations.php'                 => [],
		'wpforms-campaign-monitor/wpforms-campaign-monitor.php'         => [
			self::LICENSE => self::PLUS_PRO_AND_TOP,
		],
		'wpforms-captcha/wpforms-captcha.php'                           => [
			self::LICENSE  => 'basic, plus, pro, elite, agency, ultimate',
			self::WPFORMS  => [
				self::VERSION  => [ '1.8.3', '1.8.7' ],
				self::COMPARE  => [ '>=', '<' ],
			],
			self::PRIORITY => 20,
		],
		'wpforms-conversational-forms/wpforms-conversational-forms.php' => [],
		'wpforms-convertkit/wpforms-convertkit.php'                     => [
			self::LICENSE => self::PLUS_PRO_AND_TOP,
			self::PHP     => '7.4',
		],
		'wpforms-coupons/wpforms-coupons.php'                           => [],
		'wpforms-drip/wpforms-drip.php'                                 => [
			self::LICENSE => self::PLUS_PRO_AND_TOP,
		],
		'wpforms-form-abandonment/wpforms-form-abandonment.php'         => [],
		'wpforms-form-locker/wpforms-form-locker.php'                   => [],
		'wpforms-form-pages/wpforms-form-pages.php'                     => [],
		'wpforms-form-templates-pack/wpforms-form-templates-pack.php'   => [
			self::WPFORMS => [
				self::VERSION => '1.6.8',
				self::COMPARE => '<',
			],
		],
		'wpforms-geolocation/wpforms-geolocation.php'                   => [],
		'wpforms-getresponse/wpforms-getresponse.php'                   => [
			self::LICENSE => self::PLUS_PRO_AND_TOP,
		],
		'wpforms-google-sheets/wpforms-google-sheets.php'               => [],
		'wpforms-hubspot/wpforms-hubspot.php'                           => [
			self::LICENSE => self::TOP,
		],
		'wpforms-lead-forms/wpforms-lead-forms.php'                     => [],
		'wpforms-mailchimp/wpforms-mailchimp.php'                       => [
			self::LICENSE => self::PLUS_PRO_AND_TOP,
		],
		'wpforms-mailerlite/wpforms-mailerlite.php'                     => [
			self::LICENSE => self::PLUS_PRO_AND_TOP,
		],
		'wpforms-offline-forms/wpforms-offline-forms.php'               => [],
		'wpforms-paypal-commerce/wpforms-paypal-commerce.php'           => [],
		'wpforms-paypal-standard/wpforms-paypal-standard.php'           => [],
		'wpforms-post-submissions/wpforms-post-submissions.php'         => [],
		'wpforms-salesforce/wpforms-salesforce.php'                     => [
			self::LICENSE => self::TOP,
		],
		'wpforms-save-resume/wpforms-save-resume.php'                   => [
			self::LICENSE => self::PLUS_PRO_AND_TOP,
		],
		'wpforms-sendinblue/wpforms-sendinblue.php'                     => [
			self::LICENSE => self::PLUS_PRO_AND_TOP,
		],
		'wpforms-signatures/wpforms-signatures.php'                     => [
			self::EXT     => 'gd',
		],
		'wpforms-square/wpforms-square.php'                             => [
			self::PHP => '7.2',
		],
		'wpforms-stripe/wpforms-stripe.php'                             => [],
		'wpforms-surveys-polls/wpforms-surveys-polls.php'               => [],
		'wpforms-user-journey/wpforms-user-journey.php'                 => [],
		'wpforms-user-registration/wpforms-user-registration.php'       => [],
		'wpforms-webhooks/wpforms-webhooks.php'                         => [
			self::LICENSE => self::TOP,
		],
		'wpforms-zapier/wpforms-zapier.php'                             => [],
	];
	// phpcs:enable WordPress.Arrays.MultipleStatementAlignment.DoubleArrowNotAligned, WordPress.Arrays.MultipleStatementAlignment.LongIndexSpaceBeforeDoubleArrow

	/**
	 * Addon requirements.
	 *
	 * @since 1.8.2.2
	 *
	 * @var array
	 */
	private $addon_requirements = [];

	/**
	 * Addon basename.
	 *
	 * @since 1.8.2.2
	 *
	 * @var string
	 */
	private $basename = '';

	/**
	 * Validated addons.
	 *
	 * @since 1.8.2.2
	 *
	 * @var array
	 */
	private $validated = [];

	/**
	 * Not validated addons.
	 *
	 * @since 1.8.2.2
	 *
	 * @var array
	 */
	private $not_validated = [];

	/**
	 * Get a single instance of the addon.
	 *
	 * @since 1.8.2.2
	 *
	 * @return Requirements
	 */
	public static function get_instance(): Requirements {

		static $instance;

		if ( ! $instance ) {
			$instance = new self();

			$instance->init();
		}

		return $instance;
	}

	/**
	 * Init class.
	 *
	 * @since 1.8.2.2
	 */
	private function init() {

		foreach ( $this->requirements as $basename => $requirement ) {
			$this->init_addon_requirements( $basename );
		}

		$this->hooks();
	}

	/**
	 * Add hooks.
	 *
	 * @since 1.8.2.2
	 */
	private function hooks() {

		add_action( 'admin_init', [ $this, 'deactivate' ] );
		add_action( 'admin_notices', [ $this, 'show_notices' ] );
		add_action( 'network_admin_notices', [ $this, 'show_notices' ] );
	}

	/**
	 * Validate an addon.
	 *
	 * @since 1.8.2.2
	 *
	 * @param array $addon_requirements Addon requirements.
	 *
	 * @return bool
	 */
	public function validate( array $addon_requirements ): bool {

		$this->addon_requirements = $addon_requirements;

		// Requirements' array must contain the addon main filename.
		if ( ! isset( $this->addon_requirements['file'] ) ) {
			return false;
		}

		$this->basename = plugin_basename( $this->addon_requirements['file'] );

		$this->init_addon_requirements( $this->basename );

		$this->addon_requirements = $this->merge_requirements(
			$this->defaults,
			$this->requirements[ $this->basename ],
			$this->addon_requirements
		);

		$php_valid     = $this->validate_php();
		$ext_valid     = $this->validate_ext();
		$wp_valid      = $this->validate_wp();
		$wpforms_valid = $this->validate_wpforms();
		$license_valid = $this->validate_license();
		$addon_valid   = $this->validate_addon();

		if ( $php_valid && $ext_valid && $wp_valid && $wpforms_valid && $license_valid && $addon_valid ) {
			$this->validated[] = $this->basename;
		}

		$this->requirements[ $this->basename ] = $this->addon_requirements;

		return empty( $this->not_validated[ $this->basename ] );
	}

	/**
	 * Merge requirements by priority.
	 *
	 * @since 1.8.7
	 *
	 * @param array $defaults           Default requirements.
	 * @param array $requirements       Requirements.
	 * @param array $addon_requirements Addon requirements.
	 *
	 * @return array
	 */
	private function merge_requirements( array $defaults, array $requirements, array $addon_requirements ): array {

		$chunks = [ $defaults, $requirements, $addon_requirements ];

		usort(
			$chunks,
			static function ( $chunk1, $chunk2 ) {
				// phpcs:ignore WPForms.Formatting.EmptyLineBeforeReturn.AddEmptyLineBeforeReturnStatement
				return ( $chunk1[ self::PRIORITY ] ?? 10 ) <=> ( $chunk2[ self::PRIORITY ] ?? 10 );
			}
		);

		return array_merge( ...$chunks );
	}

	/**
	 * Try to deactivate not valid addon.
	 *
	 * @since 1.8.2.2
	 *
	 * @param string $plugin Path to the plugin file relative to the plugins' directory.
	 *
	 * @return bool True if addon was deactivated.
	 */
	public function deactivate_not_valid_addon( string $plugin ): bool {

		if ( ! self::DEACTIVATE_IF_NOT_MET ) {
			// No more actions if we not demand deactivation.
			return false;
		}

		if ( ! $this->is_wpforms_addon( $plugin ) ) {
			// No more actions if it is not a wpforms addon.
			return false;
		}

		// Finalise activation of wpforms addon.
		$addon_load_function = $this->get_addon_load_function( $plugin );

		if ( ! is_callable( $addon_load_function ) ) {
			return false;
		}

		// Invoke addon loading function, which checks requirements.
		$addon_load_function();

		// Addon may get deactivated after this statement.
		$this->deactivate();

		return ! is_plugin_active( $plugin );
	}

	/**
	 * Check whether a plugin is a wpforms addon.
	 *
	 * @since 1.8.2.2
	 *
	 * @param string $plugin Path to the plugin file relative to the plugins' directory.
	 *
	 * @return bool
	 */
	private function is_wpforms_addon( string $plugin ): bool {

		if ( strpos( $plugin, 'wpforms-' ) !== 0 ) {
			// No more actions for general plugin.
			return false;
		}

		/**
		 * There are some forks of our plugins having the 'wpforms-' prefix.
		 * We have to check the Author name in the plugin header.
		 */
		$plugin_data   = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
		$plugin_author = isset( $plugin_data['Author'] ) ? strtolower( $plugin_data['AuthorName'] ) : '';

		// No more actions on forks.
		return $plugin_author === 'wpforms';
	}

	/**
	 * Get addon function hooked on wpforms_load.
	 *
	 * @since 1.8.2.2
	 *
	 * @param string $plugin Path to the plugin file relative to the plugins' directory.
	 *
	 * @return string
	 */
	private function get_addon_load_function( string $plugin ): string {

		global $wp_filter;

		$callbacks           = $wp_filter['wpforms_loaded']->callbacks;
		$prefix              = explode( '/', $plugin, 2 )[0];
		$prefix              = str_replace( '-', '_', $prefix );
		$addon_load_function = '';

		// Find addon load function.
		foreach ( $callbacks as $callbacks_at_priority ) {
			foreach ( $callbacks_at_priority as $key => $callback ) {
				if ( strpos( $key, $prefix ) === 0 ) {
					$addon_load_function = $key;

					break 2;
				}
			}
		}

		return $addon_load_function;
	}

	/**
	 * Normalize version-based requirement.
	 *
	 * @since 1.8.2.2
	 *
	 * @param string $key Requirements key.
	 *
	 * @return array[]
	 */
	private function normalize_version_requirement( string $key ): array {

		if ( ! isset( $this->addon_requirements[ $key ] ) ) {
			$this->addon_requirements[ $key ] = [];

			return [];
		}

		$requirement = (array) $this->addon_requirements[ $key ];

		$version = isset( $requirement[0] ) ?
			array_map( 'trim', (array) $requirement[0] ) :
			[ '' ];
		$version = isset( $requirement[ self::VERSION ] ) ?
			array_map( 'trim', (array) $requirement[ self::VERSION ] ) :
			$version;
		$compare = isset( $requirement[ self::COMPARE ] ) ?
			array_map( 'trim', (array) $requirement[ self::COMPARE ] ) :
			[ self::COMPARE_DEFAULT ];
		$compare = array_pad( $compare, count( $version ), self::COMPARE_DEFAULT );

		$requirement = [
			self::VERSION => $version,
			self::COMPARE => $compare,
		];

		$this->addon_requirements[ $key ] = $requirement;

		return $requirement;
	}

	/**
	 * Normalize array-based requirement.
	 *
	 * @since 1.8.2.2
	 *
	 * @param string $key Requirements key.
	 *
	 * @return string[]
	 */
	private function normalize_array_requirement( string $key ): array {

		if ( ! isset( $this->addon_requirements[ $key ] ) ) {
			$this->addon_requirements[ $key ] = [];

			return [];
		}

		$requirement = $this->addon_requirements[ $key ];

		if ( is_string( $requirement ) ) {
			$requirement = explode( ',', $requirement );
		}

		if ( ! is_array( $requirement ) ) {
			$requirement = [];
		}

		$requirement                      = array_map( 'trim', $requirement );
		$this->addon_requirements[ $key ] = $requirement;

		return $requirement;
	}

	/**
	 * Validate php.
	 *
	 * @since 1.8.2.2
	 *
	 * @return bool
	 */
	private function validate_php(): bool {

		$php = $this->normalize_version_requirement( self::PHP );

		if ( empty( $php ) ) {
			return true;
		}

		if (
			$php[ self::VERSION ] &&
			! $this->version_compare( PHP_VERSION, $php )
		) {
			$this->not_validated[ $this->basename ][] = self::PHP;

			return false;
		}

		return true;
	}

	/**
	 * Validate php extensions.
	 *
	 * @since 1.8.2.2
	 *
	 * @return bool
	 */
	private function validate_ext(): bool {

		foreach ( $this->normalize_array_requirement( self::EXT ) as $extension ) {
			if ( ! extension_loaded( $extension ) ) {
				$this->not_validated[ $this->basename ][] = self::EXT;

				return false;
			}
		}

		return true;
	}

	/**
	 * Validate WP.
	 *
	 * @since 1.8.2.2
	 *
	 * @return bool
	 */
	private function validate_wp(): bool {

		global $wp_version;

		$wp = $this->normalize_version_requirement( self::WP );

		if ( empty( $wp ) ) {
			return true;
		}

		if (
			$wp[ self::VERSION ] &&
			! $this->version_compare( $wp_version, $wp )
		) {
			$this->not_validated[ $this->basename ][] = self::WP;

			return false;
		}

		return true;
	}

	/**
	 * Validate wpforms.
	 *
	 * @since 1.8.2.2
	 *
	 * @return bool
	 */
	private function validate_wpforms(): bool {

		$wpforms = $this->normalize_version_requirement( self::WPFORMS );

		if ( empty( $wpforms ) ) {
			return true;
		}

		if ( $wpforms[ self::VERSION ] === self::WPFORMS_DEV_VERSION_IN_ADDON ) {
			return true;
		}

		if (
			$wpforms[ self::VERSION ] &&
			! $this->version_compare( wpforms()->version, $wpforms )
		) {
			$this->not_validated[ $this->basename ][] = self::WPFORMS;

			return false;
		}

		return true;
	}

	/**
	 * Version compare.
	 *
	 * @since 1.8.7
	 *
	 * @param string $version     Version to compare.
	 * @param array  $requirement Requirement.
	 *
	 * @return bool
	 */
	private function version_compare( string $version, array $requirement ): bool {

		$compare_arr = $this->get_compare_array( $requirement );

		foreach ( $compare_arr as $version2 => $compare ) {
			$result = version_compare( $version, $version2, $compare );

			if ( ! $result ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Validate license.
	 *
	 * @since 1.8.2.2
	 *
	 * @return bool
	 */
	private function validate_license(): bool {

		$license = $this->normalize_array_requirement( self::LICENSE );

		if ( empty( $license ) ) {
			return true;
		}

		if ( ! in_array( wpforms_get_license_type(), $license, true ) ) {
			$this->not_validated[ $this->basename ][] = self::LICENSE;

			return false;
		}

		return true;
	}

	/**
	 * Validate addon.
	 *
	 * @since 1.8.2.2
	 *
	 * @return bool
	 */
	private function validate_addon(): bool {

		$addon                  = $this->normalize_version_requirement( self::ADDON );
		$addon_version_constant = trim( $this->addon_requirements[ self::ADDON_VERSION_CONSTANT ] );

		if ( empty( $addon ) || empty( $addon_version_constant ) ) {
			return true;
		}

		if ( preg_grep( '/{.+_VERSION}/', $addon[ self::VERSION ] ) ) {
			return true;
		}

		if (
			$addon[ self::VERSION ] &&
			! $this->version_compare( constant( $addon_version_constant ), $addon )
		) {
			$this->not_validated[ $this->basename ][] = self::ADDON;

			return false;
		}

		return true;
	}

	/**
	 * Deactivate not validated addons.
	 *
	 * @since 1.8.2.2
	 */
	public function deactivate() {

		if ( ! self::DEACTIVATE_IF_NOT_MET ) {
			return;
		}

		if ( empty( $this->not_validated ) ) {
			return;
		}

		// phpcs:disable WordPress.Security.NonceVerification.Recommended
		unset( $_GET['activate'] );

		if ( empty( $this->validated ) ) {
			unset( $_GET['activate-multi'] );
		}
		// phpcs:enable WordPress.Security.NonceVerification.Recommended

		require_once ABSPATH . 'wp-admin/includes/plugin.php';

		foreach ( $this->not_validated as $basename => $errors ) {
			if ( $errors === [ 'license' ] ) {
				continue;
			}

			deactivate_plugins( $basename );
		}
	}

	/**
	 * Show admin notices.
	 *
	 * @since 1.8.2.2
	 */
	public function show_notices() {

		foreach ( $this->get_notices() as $notice ) {
			$this->show_notice( $notice );
		}
	}

	/**
	 * Get admin notices.
	 *
	 * @since 1.8.2.2
	 *
	 * @return string[]
	 *
	 * @noinspection HtmlUnknownTarget
	 */
	public function get_notices(): array {

		$notices = [];

		if ( empty( $this->not_validated ) ) {
			return $notices;
		}

		$read_more = sprintf(
		/* translators: %s - required PHP version. */
			__( '<a href="%s" target="_blank" rel="noopener noreferrer">Read more</a> for additional information.', 'wpforms-lite' ),
			esc_url( wpforms_utm_link( 'https://wpforms.com/docs/supported-php-version/', 'all-plugins', 'Addon PHP Notice' ) )
		);

		foreach ( $this->not_validated as $basename => $errors ) {
			if ( ! $errors ) {
				continue;
			}

			$message = $this->get_validation_message( $errors, $basename );

			if ( ! $message ) {
				continue;
			}

			$plugin_headers = get_plugin_data( $this->requirements[ $basename ]['file'] );
			$notice         = sprintf(
				/* translators: translators: %1$s - WPForms addon name, %2$d - requirements message. */
				__( 'The %1$s addon requires %2$s to work.', 'wpforms-lite' ),
				$plugin_headers['Name'],
				$message
			);

			if ( self::SHOW_PHP_NOTICE && in_array( self::PHP, $errors, true ) ) {
				$notice .= ' ' . $read_more;
			}

			/**
			 * Filter the requirements notice.
			 *
			 * @since 1.8.7
			 *
			 * @param string $notice       Notice.
			 * @param array  $errors       Validation errors.
			 * @param string $basename     Plugin basename.
			 * @param array  $requirements Addon requirements.
			 */
			$notice = apply_filters( 'wpforms_requirements_notice', $notice, $errors, $basename, $this->requirements[ $basename ] );

			$notices[] = $notice;
		}

		return $notices;
	}

	/**
	 * Get a validation message.
	 *
	 * @since 1.8.2.2
	 *
	 * @param array  $errors   Validation errors.
	 * @param string $basename Plugin basename.
	 *
	 * @return string
	 */
	private function get_validation_message( array $errors, string $basename ): string {

		$messages = [];

		$messages[] = $this->get_php_validation_message( $errors, $basename );
		$messages[] = $this->get_ext_validation_message( $errors, $basename );
		$messages[] = $this->get_wp_validation_message( $errors, $basename );
		$messages[] = $this->get_wpforms_validation_message( $errors, $basename );
		$messages[] = $this->get_license_validation_message( $errors, $basename );
		$messages[] = $this->get_addon_validation_message( $errors, $basename );

		$messages = array_filter( $messages );

		return $this->list_array( $messages );
	}

	/**
	 * Get PHP validation message.
	 *
	 * @since 1.8.2.2
	 *
	 * @param array  $errors   Validation errors.
	 * @param string $basename Plugin basename.
	 *
	 * @return string
	 */
	private function get_php_validation_message( array $errors, string $basename ): string {

		if ( self::SHOW_PHP_NOTICE && in_array( self::PHP, $errors, true ) ) {
			return 'PHP ' . $this->list_version( $this->requirements[ $basename ][ self::PHP ] );
		}

		return '';
	}

	/**
	 * Get EXT validation message.
	 *
	 * @since 1.8.2.2
	 *
	 * @param array  $errors   Validation errors.
	 * @param string $basename Plugin basename.
	 *
	 * @return string
	 */
	private function get_ext_validation_message( array $errors, string $basename ): string {

		if ( self::SHOW_EXT_NOTICE && in_array( self::EXT, $errors, true ) ) {
			$extension = $this->list_array( $this->requirements[ $basename ][ self::EXT ] );

			return sprintf(
			/* translators: %s - PHP extension name(s). */
				_n(
					'%s PHP extension',
					'%s PHP extensions',
					count( $this->requirements[ $basename ][ self::EXT ] ),
					'wpforms-lite'
				),
				$extension
			);
		}

		return '';
	}

	/**
	 * Get WP validation message.
	 *
	 * @since 1.8.2.2
	 *
	 * @param array  $errors   Validation errors.
	 * @param string $basename Plugin basename.
	 *
	 * @return string
	 */
	private function get_wp_validation_message( array $errors, string $basename ): string {

		if ( self::SHOW_WP_NOTICE && in_array( self::WP, $errors, true ) ) {
			return 'WordPress ' . $this->list_version( $this->requirements[ $basename ][ self::WP ] );
		}

		return '';
	}

	/**
	 * Get WPFORMS validation message.
	 *
	 * @since 1.8.2.2
	 *
	 * @param array  $errors   Validation errors.
	 * @param string $basename Plugin basename.
	 *
	 * @return string
	 */
	private function get_wpforms_validation_message( array $errors, string $basename ): string {

		if ( self::SHOW_WPFORMS_NOTICE && in_array( self::WPFORMS, $errors, true ) ) {
			return 'WPForms ' . $this->list_version( $this->requirements[ $basename ][ self::WPFORMS ] );
		}

		return '';
	}

	/**
	 * Get LICENSE validation message.
	 *
	 * @since 1.8.2.2
	 *
	 * @param array  $errors   Validation errors.
	 * @param string $basename Plugin basename.
	 *
	 * @return string
	 */
	private function get_license_validation_message( array $errors, string $basename ): string {

		if ( self::SHOW_LICENSE_NOTICE && in_array( self::LICENSE, $errors, true ) ) {
			$license = $this->list_array(
				array_map( 'ucfirst', $this->requirements[ $basename ][ self::LICENSE ] ),
				false
			);

			return sprintf(
			/* translators: %s - license name(s). */
				__( '%s license', 'wpforms-lite' ),
				$license
			);
		}

		return '';
	}

	/**
	 * Get ADDON validation message.
	 *
	 * @since 1.8.2.2
	 *
	 * @param array  $errors   Validation errors.
	 * @param string $basename Plugin basename.
	 *
	 * @return string
	 */
	private function get_addon_validation_message( array $errors, string $basename ): string {

		if ( self::SHOW_ADDON_NOTICE && in_array( self::ADDON, $errors, true ) ) {
			$self_version = $this->list_version( $this->requirements[ $basename ][ self::ADDON ] );

			return sprintf(
			/* translators: %s - addon self version. */
				__( 'self version %s', 'wpforms-lite' ),
				$self_version
			);
		}

		return '';
	}

	/**
	 * Show admin notice.
	 *
	 * @since 1.8.2.2
	 *
	 * @param string $notice Message.
	 */
	private function show_notice( string $notice ) {

		echo '<div class="notice notice-error"><p>';
		echo wp_kses_post( $notice );
		echo '</p></div>';
	}

	/**
	 * Init addon requirements.
	 *
	 * @since 1.8.2.2
	 *
	 * @param string $basename Addon basename.
	 */
	private function init_addon_requirements( string $basename ) {

		if ( ! array_key_exists( $basename, $this->requirements ) ) {
			$this->requirements[ $basename ] = [];
		}

		// Set default addon version constant.
		if ( array_key_exists( self::ADDON_VERSION_CONSTANT, $this->requirements[ $basename ] ) ) {
			return;
		}

		$const = str_replace(
			'-',
			'_',
			strtoupper( explode( '/', $basename, 2 )[0] ) . '_VERSION'
		);

		$this->requirements[ $basename ][ self::ADDON_VERSION_CONSTANT ] = $const;
	}

	/**
	 * Get comma-separated list string from requirements' array.
	 *
	 * @since 1.8.2.2
	 *
	 * @param array $arr Array containing a list.
	 * @param bool  $sep Separator of the last element.
	 *
	 * @return string
	 */
	private function list_array( array $arr, bool $sep = true ): string {

		$separator = $sep ?
			__( 'and', 'wpforms-lite' ) :
			__( 'or', 'wpforms-lite' );

		$last  = array_slice( $arr, - 1 );
		$first = implode( ', ', array_slice( $arr, 0, - 1 ) );
		$both  = array_filter( array_merge( [ $first ], $last ) );

		return implode( ' ' . $separator . ' ', $both );
	}

	/**
	 * Get version from requirements array.
	 *
	 * @since 1.8.2.2
	 *
	 * @param array $requirement Array containing a requirement.
	 *
	 * @return string
	 */
	public function list_version( array $requirement ): string {

		$compare_arr = $this->get_compare_array( $requirement );
		$list        = [];

		foreach ( $compare_arr as $version2 => $compare ) {
			$list[] = $compare . $version2;
		}

		return implode( ', ', $list );
	}

	/**
	 * Get a compare array in the following format: [ 'version' => 'compare', ... ].
	 *
	 * @since 1.8.7
	 *
	 * @param array $requirement Requirement.
	 *
	 * @return array
	 */
	public function get_compare_array( array $requirement ): array {

		$versions = $requirement[ self::VERSION ];
		$compares = $requirement[ self::COMPARE ];

		return array_combine( $versions, $compares );
	}

	/**
	 * Get requirements.
	 *
	 * @since 1.8.8
	 *
	 * @return array
	 */
	public function get_requirements(): array {

		return $this->requirements;
	}
}
