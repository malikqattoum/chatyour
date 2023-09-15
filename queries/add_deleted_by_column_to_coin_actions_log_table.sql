ALTER TABLE gr_coin_actions_log
ADD COLUMN deleted_by JSON DEFAULT NULL AFTER coins_amount ;