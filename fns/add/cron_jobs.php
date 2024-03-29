<?php

$result = array();
$result['success'] = false;
$result['error_message'] = Registry::load('strings')->something_went_wrong;
$result['error_key'] = 'something_went_wrong';
$noerror = true;
$cron_jobs = ["delete_group_messages", "delete_private_messages", "delete_site_users", "delete_user_files", "delete_coin_actions_log"];

if (role(['permissions' => ['super_privileges' => 'cron_jobs']])) {

    if (!isset($data['cron_job']) || empty(trim($data['cron_job'])) || !in_array($data['cron_job'], $cron_jobs)) {
        $noerror = false;
        $result = array();
        $result['success'] = false;
        $result['error_message'] = Registry::load('strings')->invalid_value;
        $result['error_key'] = 'invalid_value';
        $result['error_variables'][] = ['cron_job'];
    }

    if ($noerror) {

        include 'fns/filters/load.php';

        $disabled = 0;
        $remove = ['update', 'process', 'add', 'cron_job', 'cron_job_identifier', 'cron_job_url', 'command'];
        $parameters = sanitize_array($data);
        $parameters = array_diff_key($parameters, array_flip($remove));
        $parameters = json_encode($parameters);
        $access_code = random_string('5');

        DB::connect()->insert("cron_jobs", [
            "cron_job" => $data['cron_job'],
            "cron_job_parameters" => $parameters,
            "cron_job_access_code" => $access_code,
            "created_on" => Registry::load('current_user')->time_stamp,
            "updated_on" => Registry::load('current_user')->time_stamp,
        ]);

        if (!DB::connect()->error) {

            $cron_job_id = DB::connect()->id();
            
            $result = array();
            $result['success'] = true;
            $result['todo'] = 'load_form';
            $result['force_reload_aside'] = 'cron_jobs';
            $result['attributes'] = [
                'data-cron_job_id' => $cron_job_id,
                'form' => 'cron_jobs'
            ];
        } else {
            $result['error_message'] = Registry::load('strings')->something_went_wrong;
            $result['error_key'] = 'something_went_wrong';
        }

    }
}
?>