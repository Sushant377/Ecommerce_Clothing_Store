<?php
namespace WPForms\Lite\Emails;

use WPForms\Lite\Reports\EntriesCount;
use WPForms\Emails\Summaries as BaseSummaries;

/**
 * Email Summaries.
 *
 * @since 1.8.8
 */
class Summaries extends BaseSummaries {

	/**
	 * Whether counting entries is allowed for Lite users.
	 *
	 * @since 1.8.8
	 *
	 * @var bool
	 */
	private $allow_entries_count_lite;

	/**
	 * Constructor for the class.
	 * Initializes the object and registers the Lite weekly entries count cron schedule.
	 *
	 * @since 1.8.8
	 */
	public function __construct() {

		// phpcs:disable WPForms.PHP.ValidateHooks.InvalidHookName

		// Disabling this filter will prevent entries submission count from being updated.
		/** This filter is documented in /lite/wpforms-lite.php */
		$this->allow_entries_count_lite = apply_filters( 'wpforms_dash_widget_allow_entries_count_lite', true );

		// phpcs:enable WPForms.PHP.ValidateHooks.InvalidHookName

		parent::__construct();

		// Register the Lite weekly entries count cron schedule.
		$this->register_entries_count_schedule();
	}

	/**
	 * Hooks.
	 *
	 * @since 1.8.8
	 */
	public function hooks() {

		parent::hooks();

		// The following schedule is essential for the Lite version.
		// Regardless of the "Weekly Summaries" feature being disabled or enabled,
		// it ensures that entries numbers are consistently updated.
		if ( ! $this->allow_entries_count_lite ) {
			return;
		}

		add_filter( 'cron_schedules', [ $this, 'weekly_entries_count' ] ); // phpcs:ignore
		add_action( 'wpforms_weekly_entries_count_cron', [ $this, 'entries_count_cron' ] );
	}

	/**
	 * Adjusts the Lite weekly entries count cron schedule.
	 *
	 * This function modifies the Lite weekly entries count cron schedule by reducing the interval by 5 seconds.
	 *
	 * @since 1.8.8
	 *
	 * @param array $schedules WP cron schedules.
	 *
	 * @return array
	 */
	public function weekly_entries_count( $schedules ) {

		$schedules['wpforms_weekly_entries_count'] = [
			'interval' => $this->get_weekly_entries_count_interval() - time(),
			'display'  => esc_html__( 'Calculate WPForms Lite Weekly Entries Count', 'wpforms-lite' ),
		];

		return $schedules;
	}

	/**
	 * Run the cron job to update entries count for Lite users.
	 *
	 * This function retrieves the current entries count for Lite users, calculates the count for the
	 * previous week, and updates the necessary post meta data for trend calculations.
	 *
	 * @since 1.8.8
	 */
	public function entries_count_cron() {

		// Get entries count for Lite users.
		$entries = ( new EntriesCount() )->get_by_form();

		// Exit if there are no form entries to update.
		if ( empty( $entries ) ) {
			return;
		}

		foreach ( $entries as $form_id => &$form ) {
			// Set total entries count to the current count.
			$form['total'] = $form['count'];

			// Retrieve the previous week's count data from post meta.
			$previous_week_count = get_post_meta( $form_id, 'wpforms_entries_count_previous_week', true );

			// Continue to the next form if the count data is not valid.
			if ( ! is_array( $previous_week_count ) || count( $previous_week_count ) !== 3 ) {
				$prev_count_previous_week = $form['total'];

				// Set the previous week's count zero "0" if the form was published less than or equal to 7 days ago.
				if ( $this->is_form_created_in_7days( $form_id ) ) {
					$prev_count_previous_week = 0;
				}

				update_post_meta( $form_id, 'wpforms_entries_count_previous_week', [ $form['total'], $form['total'], $prev_count_previous_week ] );

				continue;
			}

			list( $total_previous_week, $count_previous_week ) = $previous_week_count;

			// Calculate count, count_previous_week, and trends.
			$form['count'] = $form['total'] - $total_previous_week;

			if ( count( array_unique( $previous_week_count ) ) === 1 ) {
				// If the previous week's count is the same as the current count, skip trends calculation.
				update_post_meta( $form_id, 'wpforms_entries_count_previous_week_skip_trends', true );
			} else {
				// If the previous week's count is different from the current count, calculate trends.
				delete_post_meta( $form_id, 'wpforms_entries_count_previous_week_skip_trends' );
			}

			// Update post meta data for trend calculations.
			update_post_meta( $form_id, 'wpforms_entries_count_previous_week', [ $form['total'], $form['count'], $count_previous_week ] );
		}
	}

	/**
	 * Get form entries.
	 *
	 * @since 1.8.8
	 *
	 * @return array
	 */
	protected function get_entries(): array {

		return ( new EntriesCount() )->get_form_trends();
	}

	/**
	 * Register entries count schedule.
	 *
	 * @since 1.8.8
	 */
	private function register_entries_count_schedule() {

		// Leave early if WPForms Pro is active, and clear the schedule if it exists.
		if ( ! $this->allow_entries_count_lite && wp_next_scheduled( 'wpforms_weekly_entries_count_cron' ) ) {
			wp_clear_scheduled_hook( 'wpforms_weekly_entries_count_cron' );

			return;
		}

		// Register the schedule if it doesn't exist.
		if ( $this->allow_entries_count_lite && ! wp_next_scheduled( 'wpforms_weekly_entries_count_cron' ) ) {
			wp_schedule_event( $this->get_weekly_entries_count_interval(), 'wpforms_weekly_entries_count', 'wpforms_weekly_entries_count_cron' );
		}
	}

	/**
	 * Get the interval for the Lite weekly entries count cron schedule.
	 *
	 * This function calculates the interval for the Lite weekly entries count cron schedule.
	 * It goes back 14 hours from the timestamp of the next Monday at 2pm.
	 *
	 * @since 1.8.8
	 *
	 * @return int
	 */
	private function get_weekly_entries_count_interval(): int {

		$interval = strtotime( 'next monday 2pm' ) - 14 * HOUR_IN_SECONDS;

		return absint( $interval - ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS ) );
	}

	/**
	 * Check if the given form_id was published less than or equal to 7 days ago.
	 *
	 * @since 1.8.8
	 *
	 * @param int $form_id The ID of the form (post).
	 *
	 * @return bool
	 */
	private function is_form_created_in_7days( int $form_id ): bool {

		// Get the form (post) publish date.
		$date_created = get_post_field( 'post_date', $form_id, 'raw' );

		// If the form date is not available, return false.
		if ( empty( $date_created ) ) {
			return false;
		}

		// Calculate the time difference between the post date and the current date.
		$time_difference = time() - strtotime( $date_created );

		// Compare the time difference with 7 days in seconds.
		return $time_difference <= 7 * DAY_IN_SECONDS;
	}
}
