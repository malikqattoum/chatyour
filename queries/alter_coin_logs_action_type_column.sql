ALTER TABLE gr_coin_actions_log
MODIFY COLUMN action_type ENUM('send', 'receive', 'grant', 'remove', 'ban send', 'unban send', 'ban receive', 'unban receive', 'purchase') NOT NULL;