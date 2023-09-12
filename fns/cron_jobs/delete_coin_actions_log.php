<?php

$parameters = json_decode($cron_job['cron_job_parameters']);

DB::connect()->query('TRUNCATE TABLE gr_coin_actions_log');

DB::connect()->update("cron_jobs", ["last_run_time" => Registry::load('current_user')->time_stamp], ['cron_job_id' => $cron_job['cron_job_id']]);

$output = array();
$output['success'] = true;

?>